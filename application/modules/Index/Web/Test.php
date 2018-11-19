<?php

use RealTime\Base\WebController;
use Swoole\Http\Request;
use Swoole\Http\Response;

/**
 * @desc:
 * @author: wanghongfeng
 * @date: 2018/11/8
 * @time: 下午6:50
 */

class TestController extends WebController
{
    public function demoAction(Request $request, Response $response)
    {
        if(isset($request->get['fd']) && isset($request->get['msg'])){
            $this->to($request->get['fd'])->emit('web', $request->get['msg']);
        }

    }

}