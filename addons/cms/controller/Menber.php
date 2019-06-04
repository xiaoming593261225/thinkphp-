<?php
/**
 * @Author 张超.
 * @Copyright http://www.zhangchao.name
 * @Email 416716328@qq.com
 * @DateTime 2018/5/28 14:27
 * @Desc
 */

namespace addon\cms\controller;


use app\common\controller\Addon;

class Menber extends Addon
{
    public function index(){
        $this->addonView("member/index");
    }
}