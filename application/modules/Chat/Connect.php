<?php

use RealTime\Base\Event;

/**
 * @desc:
 * @author: wanghongfeng
 * @date: 2018/10/25
 * @time: 下午3:29
 */

class ConnectEvent extends Event
{
    public function execute()
    {
        echo ' chat ConnectEvent', "\n";

    }

}