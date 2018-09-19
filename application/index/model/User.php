<?php
/**
 * Created by PhpStorm.
 * User: ztc
 * Date: 2018-06-25
 * Time: 11:14
 */

namespace app\index\model;
use think\Db;
use think\Loader;
use think\Model;

class User extends Model
{
    //只读字段
    protected $readonly = ['id','username'];

    //类型转换
    /*protected $type = [
        'status'    =>  'integer',
        'score'     =>  'float',
        'birthday'  =>  'datetime',
        'info'      =>  'array',
    ];*/
    protected $type = ['addtime'=>'integer'];

    //自动完成
    protected $auto = [];
    protected $insert = ['addtime'];
    protected $update = [];
    //配置addtime时间戳
    protected function setaddtimeAttr()
    {
        return time();
    }

    //自定义初始化
    protected function initialize()
    {
        //需要调用`Model`的`initialize`方法
        parent::initialize();
        //TODO:自定义的初始化
    }

    /**
     * 查找用户根据ID
     * @param $id
     * @return array|false|mixed|\PDOStatement|string|\think\Collection|Model
     */
    public function find($id){
        $data = Db::table('user')->where('id',$id)->select();
        return $data;
    }

    /**
     * 根据用户名查找用户
     * @param $name
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function FindByName($name){
        return Db::table('user')->where('username = :username',['username'=>$name])->limit(1)->select();
    }

    /**
     * 添加用户
     * @param mixed|string $data
     * @return int|mixed|string
     */
    public function add($data){
        $re= $this->Validate(true)->save($data);
        if($re!=1)
            return $this->getError();
        return $re;

    }

    /**
     * 更新用户信息
     * @param array $data
     * @return int|string
     */
    public function updateuser($id,array $data){
        //验证合法性
        $validate = Loader::validate('User');
        if(!$validate->check($data))
            return ['code'=>1001,'msg'=>$validate->getError()];

        $restul = db('user')->where('id',$id)->update($data);

        if($restul)
            return ['code'=>0,'msg'=>'更新成功'];
        else
           return ['code'=>1002,'msg'=>'更新失败'];
    }

    public function del($id){
        return db('User')->where('id',$id)->delete();
    }


    /*public function findgtid($id){
        return $this->field('id')
                    ->where('id','gt',$id)
                    ->limit(10)
                    ->select();
    }*/


}