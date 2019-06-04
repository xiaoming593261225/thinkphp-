<?php
/**
 * @Author 张超.
 * @Copyright http://www.zhangchao.name
 * @Email 416716328@qq.com
 * @DateTime 2018/5/28 11:06
 * @Desc
 */

namespace app\run\controller;

use app\common\controller\Run;
use think\Db;

class Addons extends Run
{
    /**
     * @author by 张超 <Email:416716328@qq.com web:http://www.zhangchao.name>
     * @name 插件访问方式
     * @version 1.0.0
     * @funName execute
     * @param null $m 插件模块名
     * @param string $c 插件控制器名
     * @param string $a 插件方法名
     * @return  Obj
     */
    public function execute($m = null, $c = "Index", $a = "index")
    {
        if (!$m || !$c) {
            $this->ajaxRuturn(400, "访问参数有误！");
        }
        $addon_class = DS . ADDONS_PATH_NAME . DS . $m . DS . "controller" . DS . ucfirst($c);
        $class = new $addon_class();
        return $class->$a();//输出访问的插件
    }

    public function lists()
    {
        if ($this->request->isAjax()) {
            //检测插件目录
            $dirList = getDirList(ROOT_PATH);
            $addonsDir = "";
            foreach ($dirList as $key => $val) {
                if ($val == 'addons') {
                    $addonsDir = $val;
                }
            }
            if ($addonsDir) {
                $addonsDir = ROOT_PATH . DS . $addonsDir;
            } else {
                $this->ajaxRuturn(400, "插件目录不存在！");
            }
            $addonsDir = getDirList($addonsDir);
            //读取插件配置文件
            foreach ($addonsDir as $k => $v) {
                $configFile = ROOT_PATH . "addons" . DS . $v . DS . "config" . DS . "app.php";
                $configList = include $configFile;
                $configList['id'] = $k + 1;
//                array_push($k,$configList);
                $config[$k] = $configList;
            }
            foreach ($config as $key => &$val) {
                $val['url'] = addonsUrl($val['index_url']);
                $val['install_url'] = "/run/addons/install?module=" . $val['name'];
            }
            //分页
            $result = paging(input("get.page"), input("get.limit"), $config);
            $this->layAjax(200, "数据获取成功！", count($config), $result);
        } else {
            return $this->fetch();
        }
    }

    public function install($module)
    {
        $module = strtolower($module);
        $installPath = ROOT_PATH . "addons" . DS . $module . DS;
        $configFile = $installPath . "config" . DS . "app.php";
        //插件的配置文件内容
        $config = include $configFile;
        //检测是否已经安装
        $lockFile = $installPath . "install" . DS . "install.lock";
        if (file_exists($lockFile)) {
            $this->ajaxRuturn(400, "您已安装过此插件！");
        }
        $sql = $installPath . "install.sql";
        if (file_exists($sql)) {
            //如果存在sql、则执行sql语句
            $sqlArr = explode(';', $sql);
            foreach ($sqlArr as $key => $val) {
                if ($val) {
                    Db::query($val);
                }
            }
            //开启插件状态
            $config['status'] = 1;
            $putConfig = @file_put_contents($configFile, "<?php\nreturn \n" . var_export($config, true) . "\n;");
            $result = @file_put_contents($lockFile, 1);
            if (!$putConfig || !$result) {
                $this->ajaxRuturn(400, "请先确认插件的读写权限！");
            }
        } else {
            //否则本插件不用sql、类似于配置文件的插件
            $config['status'] = 1;
            $putConfig = @file_put_contents($configFile, "<?php\nreturn \n" . var_export($config, true) . "\n;");
            $result = @file_put_contents($lockFile, 1);
            if (!$putConfig || !$result) {
                $this->ajaxRuturn(400, "安装失败、请稍后再试！");
            } else {
                $this->ajaxRuturn(200, "安装成功！");
            }
        }
    }

    public function uninstall()
    {

    }
}