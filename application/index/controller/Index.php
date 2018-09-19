<?php
namespace app\index\controller;

use think\Request;

class Index
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ad_bd568ce7058a1091"></think>';
    }

    public function test()
    {
        $server = new SoapServer();
        $soap->addFunction('minus_func');                                                 //Register the function
        $soap->addFunction(SOAP_FUNCTIONS_ALL);
        $soap->handle();
    }

    function minus_func($i, $j){
        $res = $i - $j;
        return $res;
    }





    /**
     * per_page 每页数量
     * page 当前页码
     *
     * return json
     */
    public function test_pack(){
        $r = Request::instance();
        $data = $r->get();
        $arr['errno'] = 0;
        $arr['error'] = 'succ';
        if(!isset($data['per_page']))
            $data['per_page'] = 0;
        $arr['data']['total'] = 100;
        $arr['data']['pages'] = ceil($arr['data']['total']/$data['per_page']);//总页数
        $arr['data']['size'] = 0;
        $arr['data']['pageNum'] = intval(isset($data['page'])?$data['page']:0);
        $curren = ($arr['data']['total']-$data['per_page']*$data['page'])>$data['per_page']?$data['per_page']:($arr['data']['total']-$data['per_page']*$data['page']);
        for($i=0;$i<$curren;$i++){
            $arr['data']['size']++;
            $username = $this->generateRandomString(5);
            $arr['data']['list'][]=['utdid'=>md5($username),'create_time'=>time(),'package_id'=>rand(10,5000)];
        }

        exit(json_encode($arr));
    }

    /**
     * per_page 每页数量
     * page 当前页码
     *
     * return json
     */
    public function test_dev(){
        $r = Request::instance();
        $data = $r->get();

        $arr['errno'] = 0;
        $arr['error'] = 'succ';
        if(!isset($data['per_page']))
            $data['per_page'] = 0;
        $arr['data']['total'] = 100;
        $arr['data']['pages'] = ceil($arr['data']['total']/$data['per_page']);
        $arr['data']['size'] = 0;
        $arr['data']['pageNum'] = isset($data['page'])?$data['page']:0;
        $curren = ($arr['data']['total']-$data['per_page']*$data['page'])>$data['per_page']?$data['per_page']:($arr['data']['total']-$data['per_page']*$data['page']);
        for($i=0;$i<$curren;$i++){
            $arr['data']['size']++;
            $username = $this->generateRandomString(5);
            $arr['data']['list'][]=['utdid'=>md5($username),'create_time'=>time()];
        }

        exit(json_encode($arr));
    }

    /**
     * @param int $length
     * @return string
     */
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}
