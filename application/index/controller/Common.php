<?php
/**
 * Created by PhpStorm.
 * User: ztc
 * Date: 2018-07-05
 * Time: 13:55
 */

namespace app\index\controller;

use think\Controller;
use think\Request;

class Common extends Controller
{
    public function _initialize()
    {
        parent::_initialize();
        $this->request = Request::instance();
    }

    protected function Returnjson($code,$msg,$arr)
    {

       return json($arr);die;
    }

    /**
     * 检测数据里的keys是否被设置
     * @param $data
     * @param $keys
     */
    protected function Check_Arr($data,$keys)
    {
        if(is_array($data)&&is_array($keys)&&!empty($data))
        {
            foreach ($keys as $v){
                if(!isset($data[$v])) {
                    header('Content-Type:application/json; charset=utf-8');
                    echo json_encode(['code' => 1004,'msg'=>"$v 参数错误"],500);exit();
                }
            }
        }

    }

}