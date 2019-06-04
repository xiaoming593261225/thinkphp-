<?php
/**
 * @Author 张超.
 * @Copyright http://www.zhangchao.name
 * @Email 416716328@qq.com
 * @DateTime 2018/5/9 18:44
 * @Desc
 */

return [
    //允许访问的目录
    'NOT_ALLOW_AUTH' => [
        'index/index',//后台首页
        'login/index',//登录页面
        'login/captcha',//验证码输出
        'login/do_login',//执行登录
        'login/out_login',//退出登录
        'common/get_lock',//获取锁屏密码
    ],
    //如果没有权限是否也读取出菜单栏目
    'IS_SHOW_AUTH' => true,
    'DEFAULT_LOGIN_SESSION' => 'u_info'
];