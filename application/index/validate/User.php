<?php
/**
 * Created by PhpStorm.
 * User: ztc
 * Date: 2018-07-05
 * Time: 11:47
 */

namespace app\index\validate;

use \think\Validate;

class User extends Validate
{
    protected $rule = [
        'username'=>'require|max:20|min:3',
        'password'=>'require',
        'name'=>'unique:name'//判断用户名是否存在
    ];

    protected $message = [
        'name.require'=>'用户名必填',
        'name.max'=>'用户名最大20',
        'name.min'=>'用户名最大3',
        'password'=>'pwd必填',
        'name'=>'存在该用户名'

    ];

}