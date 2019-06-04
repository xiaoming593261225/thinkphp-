<?php
/**
 * @Author 张超.
 * @Copyright http://www.zhangchao.name
 * @Email 416716328@qq.com
 * @DateTime 2018/5/10 18:53
 * @Desc
 */

namespace app\run\validate;
use think\Validate;

class Menus extends Validate
{
    protected $rule = [
        'name'  =>  'require',
        'title' =>  'require',
        'icon' =>  'require',
    ];
    protected $message  =   [
        'name.require' => '规则不能为空！',
        'title.require'     => '请先输入菜单名称！',
        'icon.require'     => '请先选择菜单图标！'
    ];
    // 自定义验证规则
    protected function checkName($value,$rule,$data=[])
    {
        return $rule == $value ? true : '名称错误';
    }
}