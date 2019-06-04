<?php
/**
 * @Author 张超.
 * @Copyright http://www.zhangchao.name
 * @Email 416716328@qq.com
 * @DateTime 2018/4/10 15:46
 * @Desc
 */
// 定义分组路由
Route::group(['method'=>'post'],function (){
    //用户相关操作
    Route::group("v1/users",function (){
        Route::post("login","api/User/login",[],[]);//用户登录
    });
});