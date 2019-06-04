<?php
/**
 * @Author 张超.
 * @Copyright http://www.zhangchao.name
 * @Email 416716328@qq.com
 * @DateTime 2018/5/8 16:57
 * @Desc
 */

namespace app\run\controller;


use app\common\controller\Run;

class Common extends Run
{
    public function skin(){
        return $this->fetch();
    }
    public function authError(){
        return $this->fetch();
    }
    public function get_lock(){
        if ($this->request->isAjax()){
            if (password_verify(input("password"),$this->userInfo['password'])){
                $this->ajaxRuturn(200,"解锁成功！");
            }else{
                $this->ajaxRuturn(400,"密码错误！");
            }
        }else{
            $this->ajaxRuturn(400,"请求方式不正确！");
        }
    }
    public function main(){
        return $this->fetch();
    }
}