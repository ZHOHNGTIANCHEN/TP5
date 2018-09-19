<?php
/**
 * Created by PhpStorm.
 * User: ztc
 * Date: 2018-06-25
 * Time: 11:27
 */

namespace app\index\logic;
use think\Loader;
use think\Model;
use think\Validate;
use think\Db;

class User extends Model
{
    /**
     * 获取用户列表
     * */
    public function Getalluser($page,$pagesize=10){
        $offset = $page*$pagesize;
        $user =  Db::table('user')->limit($offset,$pagesize)->order('id ASC')->select();
        return $user;
    }

    /**
     * 添加用户
     * @param $data
     * @return array
     */
    public function adduser($data){
        $User = Loader::model('User');
        //先检测是否有该用户
        $userdata = $User->FindByName($data['username']);
        if(empty($userdata)){
            $insert['password'] = $data['password'];
            $insert['username'] = $data['username'];
            $re = $User->add($insert);
            if($re==1) {
                //添加成功再添加公司信息

                //用户其他操作

                return ['error' => 0, 'msg' => '添加成功'];
            }else {
                return ['error' => 1002, 'msg' => $re];
            }
        }else{
            return ['error'=>1001,'msg'=>'用户名已存在'];
        }
    }


}