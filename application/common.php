<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

//定义系统的缓存设置目录
define('APP_CACHE_DIR', APP_PATH . 'common' . DS . 'cache' . DS);

use \think\Loader;
use \think\Request;

function success($msg='',$extra=array()) {
    return result($msg,true,$extra,true);
}

/**
 * 写入缓存
 * @access public
 * @param string $oldFile 原文件名
 * @param array $params 键值
 * @return boolean
 */
function write_cache($oldFile, $params)
{
    //检测文件是否存在
    $exists = file_exists(APP_CACHE_DIR . $oldFile . '.php');
    if ($exists) {
        $config = file_get_contents(APP_CACHE_DIR . $oldFile . '.php');
        $config = include(APP_CACHE_DIR . $oldFile . '.php');
        $newVal = $data = array_merge($config,$params);;
        //如果存在配置文件、则直接写入
        $file = file_put_contents(APP_CACHE_DIR . $oldFile . '.php', "<?php\nreturn \n" . var_export($newVal, true) . "\n;");
        if (count($file)>0) {
            return true;
        } else {
            return "文件写入失败！";
        }
    } else {
        //创建新的文件、并写入
        if (($TxtRes = fopen(APP_CACHE_DIR . $oldFile . '.php', "w+")) === FALSE) {
            return "文件创建失败！";
        } else {
            //创建新的文件、并写入
            $file = file_put_contents(APP_CACHE_DIR . $oldFile . '.php', "<?php\nreturn " . var_export($val, true) . "\n;");
            if ($file === false) {
                return "文件写入失败！";
            } else {
                return true;
            }
        }
    }
}

//写入模块下的配置文件、如果存在、则直接替换、否则写入
/**
 * @author by 张超 <Email:416716328@qq.com web:http://www.zhangchao.name>
 * @name 方法注释
 * @version 1.0.0
 * @funName set_config 写入当前模块下的配置文件
 * @param $confiName 配置的文件名
 * @param array $params 需要写入的参数
 * @return  Obj
 */
function set_config($module , $confiName,$params = [])
{
    //检测文件是否存在
    $exists = file_exists(APP_PATH . $module . DS . "config" . DS . $confiName . '.php');
    if ($exists) {
        $path = APP_PATH . $module . DS . "config" . DS . $confiName . '.php';
        $config = include $path;
        if (count($params)<=0 || !is_array($params)){
            return "参数错误、请传入键值对！";
        }
        $data = array_merge($config,$params);
        //如果存在配置文件、则直接写入
        $file = file_put_contents($path, "<?php\nreturn \n" . var_export($data, true) . "\n;");
        if (!is_numeric($file)) {
            return "文件写入失败！";
        } else {
            return true;
        }
    } else {
        return "请先创建配置文件！";
    }
}
function get_config($module,$confiName,$key){
    //检测文件是否存在
    $exists = file_exists(APP_PATH . $module . DS . "config" . DS . $confiName . '.php');
    if ($exists) {
        $path = APP_PATH . $module . DS . "config" . DS . $confiName . '.php';
        $config = include $path;
        if (is_array($key) || !$key){
            return "参数错误、请传入支字符串！";
        }
        return get_config_arr($config,$key);
    } else {
        return "请先创建配置文件！";
    }
}
function get_config_arr($config,$key){
    foreach ($config as $k=>$v){
        if ($key == $k){
            return $v;
        }else if (is_array($v)){
            get_config_arr($v,$key);
        }
    }
}
/**
 * 读取缓存
 * @access public
 * @param string $oldFile 原文件名
 * @param string $key 键
 * @return boolean
 */
function read_cache($oldFile, $get_key = "")
{
    //检测文件是否存在
    $exists = file_exists(APP_CACHE_DIR . $oldFile . '.php');
    if ($exists && $get_key) {
        $config = include(APP_CACHE_DIR . $oldFile . '.php');
        if (!$config) {
            return false;
        }
        $newConfig = [];
        foreach ($config as $key => $val) {
            $newConfig[$key] = $val;
        }
        if (!$get_key || $get_key == '') {
            return $newConfig;
        }
        foreach ($newConfig as $key => $val) {
            if ($get_key == $key) {
                return $val;
            }
        }
    } else if ($exists) {
        $config = include(APP_CACHE_DIR . $oldFile . '.php');
        return $config;
    }else{
        return false;
    }
}

/**
 * 对象 转 数组 *
 * @param object $obj 对象
 * @return array
 */
function object_to_array($obj)
{
    $obj = (array)$obj;
    foreach ($obj as $k => $v) {
        if (gettype($v) == 'resource') {
            return;
        }
        if (gettype($v) == 'object' || gettype($v) == 'array') {
            $obj[$k] = (array)object_to_array($v);
        }
    }
    return $obj;
}

/**
 * 对查询结果集进行排序
 * @access public
 * @param array $list 查询结果
 * @param string $field 排序的字段名
 * @param array $sortby 排序类型
 * asc正向排序 desc逆向排序 nat自然排序
 * @return array
 */
function list_sort_by($list, $field, $sortby = 'asc')
{
    if (is_array($list)) {
        $refer = $resultSet = array();
        foreach ($list as $i => $data)
            $refer[$i] = &$data[$field];
        switch ($sortby) {
            case 'asc': // 正向排序
                asort($refer);
                break;
            case 'desc':// 逆向排序
                arsort($refer);
                break;
            case 'nat': // 自然排序
                natcasesort($refer);
                break;
        }
        foreach ($refer as $key => $val)
            $resultSet[] = &$list[$key];
        return $resultSet;
    }
    return false;
}

/**
 * 把返回的数据集转换成Tree
 * @param array $list 要转换的数据集
 * @param string $pid parent标记字段
 * @param string $level level标记字段
 * @return array
 */
function list_to_tree($list, $pk = 'id', $pid = 'pid', $child = 'children', $root = 0)
{
    // 创建Tree
    $tree = array();
    if (is_array($list)) {
        // 创建基于主键的数组引用
        $refer = array();
        foreach ($list as $key => $data) {
            $refer[$data[$pk]] =& $list[$key];
        }
        foreach ($list as $key => $data) {
            // 判断是否存在parent
            $parentId = $data[$pid];
            if ($root == $parentId) {
                $tree[] =& $list[$key];
            } else {
                if (isset($refer[$parentId])) {
                    $parent =& $refer[$parentId];
                    $parent[$child][] =& $list[$key];
                }
            }
        }
    }
    return $tree;
}

/**
 * 将list_to_tree的树还原成列表
 * @param  array $tree 原来的树
 * @param  string $child 孩子节点的键
 * @param  string $order 排序显示的键，一般是主键 升序排列
 * @param  array $list 过渡用的中间数组，
 * @return array        返回排过序的列表数组
 */
function tree_to_list($tree, $child = 'children', $order = 'id', &$list = array())
{
    if (is_array($tree)) {
        foreach ($tree as $key => $value) {
            $reffer = $value;
            if (isset($reffer[$child])) {
                unset($reffer[$child]);
                tree_to_list($value[$child], $child, $order, $list);
            }
            $list[] = $reffer;
        }
        $list = list_sort_by($list, $order, $sortby = 'asc');
    }
    return $list;
}

/**
 * 格式化字节大小
 * @param  number $size 字节数
 * @param  string $delimiter 数字和单位分隔符
 * @return string            格式化后的带单位的大小
 */
function format_bytes($size, $delimiter = '')
{
    $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
    for ($i = 0; $size >= 1024 && $i < 5; $i++) $size /= 1024;
    return round($size, 2) . $delimiter . $units[$i];
}

//基于数组创建目录和文件
function create_dir_or_files($files)
{
    foreach ($files as $key => $value) {
        if (substr($value, -1) == '/') {
            mkdir($value);
        } else {
            @file_put_contents($value, '');
        }
    }
}

/**
 * @author by 张超 <Email:416716328@qq.com web:http://www.zhangchao.name>
 * @name 获取 /采集图标、并返回
 * @version 1.0.0
 * @funName get_icons
 * @return  Obj
 */
function get_icons()
{
    $icons = read_cache("icons");
    if (empty($icons)) {
        //如果缓存为空、则写入文件
        $url = "http://fontawesome.dashgame.com/";
        $content = file_get_contents($url);
        preg_match_all('/<i\s+class="fa\s+([^"]+)"\s+aria-hidden="true">/is', $content, $icons);
        $icon_content = $icons[1] ? $icons[1] : [];
        $file = write_cache("icons", $icon_content);
        if ($file) {
            return $icon_content;
        } else {
            return false;
        }
    } else {
        return $icons;
    }
}

/**
 * @author by 张超 <Email:416716328@qq.com web:http://www.zhangchao.name>
 * @name 分页函数
 * @version 1.0.0
 * @funName paging
 * @param $pageSize
 * @param $pageNumber
 * @param $data
 * @return  Obj
 */
function paging($pageSize, $pageNumber, $data)
{
    $start = ($pageSize - 1) * $pageNumber;
    $list = array_slice($data, $start, $pageNumber);
    return $list;
}

/**
 * @author by 张超 <Email:416716328@qq.com web:http://www.zhangchao.name>
 * @name 创建随机字符串
 * @version 1.0.0
 * @funName createNonceStr
 * @param int $length 随机字符串的长度
 * @return  Obj
 */
function createNonceStr($length = 16)
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = "";
    for ($i = 0; $i < $length; $i++) {
        $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    }
    return $str;
}
function addonsUrl($param){
    $urlList = explode("/",$param);
    foreach ($urlList as $key=>$val){
        switch ($key){
            case 0:
                $url = "/run/Addons/execute?m=".$urlList[0];
                break;
            case 1:
                $url = "/run/Addons/execute?m=".$urlList[0]."&c=".$urlList[1];
                break;
            case 2:
                $url = "/run/Addons/execute?m=".$urlList[0]."&c=".$urlList[1]."&a=".$urlList[2];
                break;
        }
    }
    return $url;
}
//获取文件目录列表,该方法返回数组
function getDirList($dir)
{
    $dirArray[] = NULL;
    if (false != ($handle = opendir($dir))) {
        $i = 0;
        while (false !== ($file = readdir($handle))) {
            //去掉"“.”、“..”以及带“.xxx”后缀的文件
            if ($file != "." && $file != ".." && !strpos($file, ".")) {
                $dirArray[$i] = $file;
                $i++;
            }
        }
        //关闭句柄
        closedir($handle);
    }
    return $dirArray;
}