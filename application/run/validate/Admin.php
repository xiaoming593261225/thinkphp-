<?php
/**
 * @Author 张超.
 * @Copyright http://www.zhangchao.name
 * @Email 416716328@qq.com
 * @DateTime 2018/5/9 19:42
 * @Desc
 */
namespace app\run\validate;
use think\Validate;
class Admin extends Validate
{
    protected $rule = [
        'name'  =>  'require',
        'password' =>  'require',
    ];
    protected $message  =   [
        'name.require' => '请先输入账号！',
        'password.require'     => '请先输入密码！'
    ];
    // 自定义验证规则
    protected function checkName($value,$rule,$data=[])
    {
        return $rule == $value ? true : '名称错误';
    }
}