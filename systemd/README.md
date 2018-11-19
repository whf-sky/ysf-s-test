**编写Service脚本**
Systemd的Service配置在`/etc/systemd/system/`目录中，可以创建一个`echo.service`文件，实际项目应当改为对应的名称。编辑此文件，添加下列内容：
````
[Unit]
Description=Echo Http Server
After=network.target
After=syslog.target

[Service]
Type=forking
PIDFile=/opt/servers/echo/server.pid
ExecStart=/home/htf/bin/php /opt/servers/echo/server.php
ExecStop=/bin/kill $MAINPID
ExecReload=/bin/kill -USR1 $MAINPID
Restart=always

[Install]
WantedBy=multi-user.target graphical.target
````
- `After` 指令约定了启动的顺序，必须在`network`和`syslog`启动后才启动`echo`服务
- `Service` 中填写了应用程序的路径信息，请修改为实际项目对应的路径
- `Restart=always` 表示如果进程挂掉会自动拉起
- `WantedBy` 约定了在哪些环境下启动，multi-user.target graphical.target表示在图形界面和命令行环境都会启动

编写完成后需要reload守护进程使其生效
````
sudo systemctl --system daemon-reload
````


**管理服务**

````
#启动服务
sudo systemctl start echo.service
#reload服务
sudo systemctl reload echo.service
#关闭服务
sudo systemctl stop echo.service
````
**查看服务状态**

````
sudo systemctl status echo.service
````

**swoole服务器如何做到无人值守100%可用**

/data/script/check_server.sh：
````
count=`ps -fe |grep "server.php" | grep -v "grep" | grep "master" | wc -l`
 
 echo $count
 if [ $count -lt 1 ]; then
 ps -eaf |grep "server.php" | grep -v "grep"| awk '{print $2}'|xargs kill -9
 sleep 2
 ulimit -c unlimited
 /usr/local/bin/php /data/webroot/server.php
 echo "restart";
 echo $(date +%Y-%m-%d_%H:%M:%S) >/data/log/restart.log
 fi
````
如果在系统的crontab中加入：

``
*/1 * * * * /data/script/check_server.sh
``
