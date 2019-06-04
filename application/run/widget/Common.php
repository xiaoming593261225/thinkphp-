<?php
/**
 * @Author 张超.
 * @Copyright http://www.zhangchao.name
 * @Email 416716328@qq.com
 * @DateTime 2018/5/8 16:35
 * @Desc
 */
namespace app\run\widget;
use app\common\controller\Run;

class Common extends Run
{
    public function menus(){
        $result = $this->get_menus();
        $result = list_to_tree($result);
        $this->assign("menus",$result);
        return $this->fetch("widget/menus");
    }
}