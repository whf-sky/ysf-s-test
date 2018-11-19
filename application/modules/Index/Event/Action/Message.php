<?php

use RealTime\Base\Action;
use Swoole\WebSocket\Frame;
use Swoole\WebSocket\Server;

/**
 * @desc:
 * @author: wanghongfeng
 * @date: 2018/11/9
 * @time: 下午2:01
 */

class MessageAction extends Action
{
    public function execute($id = null, $data = null, Server $server = null, Frame $frame = null)
    {
        $this->emit('message', $data);
        $this->ack($id, $data);
    }
}