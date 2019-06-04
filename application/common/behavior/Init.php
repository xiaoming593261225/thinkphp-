<?php
/**
 * @Author 张超.
 * @Copyright http://www.zhangchao.name
 * @Email 416716328@qq.com
 * @DateTime 2018/5/24 15:37
 * @Desc
 */

namespace app\common\behavior;

use think\Loader;

class Init
{
    public function run()
    {
        //初始化系统常量
        $this->initPath();
        //注册插件命名空间
        $this->registerNameSpace();
    }

    # 定义文件相关目录
    private function initPath()
    {
        //插件路径名称
        define("ADDONS_PATH_NAME", "addon");
        //插件绝对地址
        define("ADDONS_PATH", ROOT_PATH . "addons" . DS);
    }

    # 注册命名空间
    private function registerNameSpace()
    {
        Loader::addNamespace(ADDONS_PATH_NAME, ADDONS_PATH);
    }
}