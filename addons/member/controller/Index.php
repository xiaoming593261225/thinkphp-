<?php
/**
 * @Author 张超.
 * @Copyright http://www.zhangchao.name
 * @Email 416716328@qq.com
 * @DateTime 2018/5/28 10:11
 * @Desc
 */

namespace addon\member\controller;

use app\common\controller\Addon;

class Index extends Addon
{
    public function index()
    {
        return $this->fetch("index/index");
    }
}