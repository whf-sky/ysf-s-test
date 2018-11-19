<?php

use RealTime\Base\Event;
use Swoole\Http\Request;
use Swoole\WebSocket\Server;

/**
 * @desc:
 * @author: wanghongfeng
 * @date: 2018/10/25
 * @time: 下午3:29
 */

class OpenEvent extends Event
{
    public function execute(Server $server = null, Request $request = null)
    {
        $this->emit('fd', $request->fd);
        $this->emit('event', 'open');
    }

}