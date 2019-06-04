<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
namespace think;
// 定义应用目录
define('DS', DIRECTORY_SEPARATOR);
define('APP_PATH', dirname(dirname(__FILE__)) . DS . 'application' . DS);
define('WWW_ROOT', dirname(__FILE__) . DS);
defined('ROOT_PATH') or define('ROOT_PATH', dirname(dirname(__FILE__)) . DS);
// 检测是否已安装
if (!is_file(WWW_ROOT . "install" . DS . "install.lock")) {
    header("location:" . "/install.php?c=word");
    exit;
}
// 加载基础文件
require __DIR__ . '/../thinkphp/base.php';
// 支持事先使用静态方法设置Request对象和Config对象

// 执行应用并响应
Container::get('app')->run()->send();