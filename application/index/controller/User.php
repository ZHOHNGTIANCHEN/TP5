<?php
/**
 * Created by PhpStorm.
 * User: ztc
 * Date: 2018-06-25
 * Time: 11:31
 */

namespace app\index\controller;

use \think\Loader;

class User extends Common
{
    public function _initialize()
    {
        parent::_initialize();
    }

    public function index(){
        $data = $this->request->get();
        $this->Check_Arr($data,['page','pagesize']);
        $User_logic = Loader::model('User','logic');
        $data = $User_logic->Getalluser($data['page'],$data['pagesize']);
        return json($data);
    }

    /**
     * 新增用户信息
     */
    public function save(){
        $data = $this->request->post();
        $this->Check_Arr($data,['username','password']);
        $User = Loader::model('User','logic');
        $restul = $User->adduser($data);
        return json($restul);
    }

    public function create(){
        exit('create');
    }

    public function update($id){
        $data = $this->request->get();
        $this->Check_Arr($data,['username','password']);
        $User = Loader::model('User');
        $result = $User->updateuser($id,$data);
        return json($result);
    }

    public function read($id){
        $User = Loader::model('User');
        $result = $User->find($id);
        return json($result);
    }
    public function edit($id){
        echo $id;exit('edit');
    }

    public function delete($id){
        $User = model('User');
        echo $User->del($id);
        echo $id;exit('delete');
    }

    public function div($id){
        echo $id;exit('div');
    }


    public function run(&$params){
        echo $params.'11';
    }
    /**
     * 添加用户
     */
    public function add(){
        $params ='钩子函数';
        \think\Hook::listen('add111',$params);;
        $request = Request::instance();
        $name = $request->get('name','123');
        $pwd  = $request->get('pwd','2');
        $arr = ['username'=>$name,'password'=>md5($pwd)];
        //检测合法性
        $vali = $this->Validate($arr,'User');
        if($vali !== true)
            $this->Returnjson(['code'=>1003,'msg'=>$vali]);

        $User_Logic = Loader::model('User','logic');
        $result = $User_Logic->adduser($arr);
        return json($result);
        $this->Returnjson($result);
    }

    public function updateuser(){
        $request = Request::instance();
        $data = $request->get();
        $User = Loader::model('User');
        $data = $User::get(1);
        $result = $User->updateuser(1,['username'=>'1']);
        dump($result);die;
    }


}