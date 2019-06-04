<?php
/**
 * @Author 张超.
 * @Copyright http://www.zhangchao.name
 * @Email 416716328@qq.com
 * @DateTime 2018/5/22 9:36
 * @Desc
 */

namespace app\run\controller;


use app\common\controller\Run;

class System extends Run
{
    public function lists()
    {
        //读取系统配置
        $config = read_cache("develop");
        $this->assign("develop",$config);
        return $this->fetch();
    }
    public function created(){
        if ($this->request->isAjax()){
            //处理系统设置项
            $develop = write_cache("develop",input("post."));
            //写入前台配置文件
            $home = set_config("home","template",['view_path'=>input("post.view_path")]);
            if ($develop === true && $home == true){
                $this->ajaxRuturn(200,"系统设置成功！");
            }else{
                $this->ajaxRuturn(400,"系统设置失败！");
            }
        }else{
            return $this->fetch();
        }
    }
}