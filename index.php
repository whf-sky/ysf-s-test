<?php
define('APP_PATH', dirname(__FILE__));//app 路径

include APP_PATH.'/../ysf/Autoload.php';
\Ysf::swoole(APP_PATH . "/config/application.ini");//启动服务