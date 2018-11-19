<?php

use RealTime\Base\Controller;

/**
 * @desc:
 * @author: wanghongfeng
 * @date: 2018/11/8
 * @time: 下午6:50
 */

class IndexController extends Controller
{
    public $actions = [
        'Message'=>APP_PATH .'/application/modules/Index/Event/Action/Message'
    ];
    public function __construct()
    {
//        echo 'IndexController',"\n";
    }

//    public function messageAction($message)
//    {
////        print_r($message);
//    }


}