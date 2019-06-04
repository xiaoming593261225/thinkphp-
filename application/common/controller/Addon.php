<?php
/**
 * @Author 张超.
 * @Copyright http://www.zhangchao.name
 * @Email 416716328@qq.com
 * @DateTime 2018/5/28 13:26
 * @Desc
 */

namespace app\common\controller;


class Addon extends Run
{
    protected function initialize()
    {
        $class = get_class($this);
        $arr = explode("\\", $class);
        $addons_name = strtolower($arr[1]);//取得当前的插件名称
        $view_path = ADDONS_PATH . "{$addons_name}" . DS . "view" . DS;
        $this->view->engine(['view_path' => $view_path, 'tpl_replace_string' => [
            '__ADMIN__' => '/static/run'
        ]]);//设置当前解析的模板地址
    }
}