<?php
/**
 * @Author 张超.
 * @Copyright http://www.zhangchao.name
 * @Email 416716328@qq.com
 * @DateTime 2018/5/24 16:03
 * @Desc
 */

namespace app\common\controller;


use think\Controller;

class Error extends Controller
{
    public function _empty($name)
    {
        return $this->showError($name);
    }
    protected function showError($name)
    {
        abort(404,"页面不存在！");
    }
}