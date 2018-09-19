<?php
/**
 * Created by PhpStorm.
 * User: ztc
 * Date: 2018-08-24
 * Time: 10:39
 */

namespace app\index\controller;
use think\Controller;

class Swiper extends Common
{
    public function index()
    {
        //
        $client = WebClient();
        $res = $client->itemType1('swiper_price', '1234');var_dump($res);die;
    }
}
