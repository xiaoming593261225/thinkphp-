<?php
/**
 * @Author 张超.
 * @Copyright http://www.zhangchao.name
 * @Email 416716328@qq.com
 * @DateTime 2018/5/11 17:39
 * @Desc
 */
namespace app\api\controller;
use app\common\controller\App;
use app\run\model\Admin;
use think\facade\Config;

class User extends App
{
    public function login(){
//        $admin = new Admin();
//        $result = $admin->where("id","eq",1)->find()->toArray();
//        //创建token
//        $token = $this->created_token($result,Config::get("develop.token_key"));
//        sleep(10);
//        //验证token
//        $after_token = $this->verify_token($token,Config::get("develop.token_key"));
//        var_dump($result);
    }
}