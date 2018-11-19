<?php

use RealTime\Base\Event;
use Swoole\WebSocket\Server;

/**
 * @desc:
 * @author: wanghongfeng
 * @date: 2018/10/25
 * @time: 下午3:29
 */

class ConnectEvent extends Event
{
    public function execute(Server $server = null, int $fd = null, int $reactorId = null)
    {
        //connect 不能发送消息
    }

}