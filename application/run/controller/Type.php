<?php
/**
 * Created by PhpStorm.
 * User: hdkj
 * Date: 2018/6/9
 * Time: 14:39
 */

namespace app\run\controller;


use app\common\controller\Run;

class Type extends Run
{
    public function lists(){
        if ($this->request->isAjax()){
            $typeModel = new \app\run\model\Type();
            $result = $typeModel->getTypeList(input("get.limit"),input("get.page"));
            $this->layAjax(200,"数据获取成功！",$result['total'],$result['data']);
        }else{
            return $this->fetch();
        }
    }
    public function created(){
        if ($this->request->isAjax()){

        }else{
            //如果传递了父级id
            if (!empty(input("get.pid"))){
                $map[] = ['id','eq',input("get.pid")];
                $model = new MenusRule();
                $menus = $model->where($map)->find()->toArray();
                $menus['path'] = $menus['path'].input("get.pid").",";
                $this->assign("menus",$menus);
            }
            return $this->fetch();
        }
    }
}