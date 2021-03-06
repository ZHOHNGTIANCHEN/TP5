<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
//use think\Route;
// 注册路由到index模块的News控制器的read操作
//Route::rule('/new','index/user/add');
//Route::resource('user','index/user');

return [
    //定义资源路由
    '__rest__' =>[
      'user'=>'index/user'
    ],
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        //':id'   => ['index/user/add', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
