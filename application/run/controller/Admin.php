<?php
/**
 * @Author 张超.
 * @Copyright http://www.zhangchao.name
 * @Email 416716328@qq.com
 * @DateTime 2018/5/20 14:36
 * @Desc
 */

namespace app\run\controller;


use app\common\controller\Run;
use app\run\model\AuthGroupAccess;
use think\Db;
use think\facade\Request;

class Admin extends Run
{
    public function lists(){
        if ($this->request->isAjax()){
            $admin = new \app\run\model\Admin();
            $list = $admin->select()->toArray();
            //分页
            $result = paging(input("get.page"), input("get.limit"), $list);
            $this->layAjax(200, "数据获取成功！", count($list), $result);
        }else{
            return $this->fetch();
        }
    }
    public function created(){
        if ($this->request->isAjax()){
            $post = input("post.");
            //数据验证
            $validate = $this->validate($post,'app\run\validate\Admin');
            if ($validate !== true)$this->ajaxRuturn(400,$validate);
            Db::startTrans();
            try{
                $post['password'] = password_hash(input("password"),PASSWORD_BCRYPT);
                $admin = new \app\run\model\Admin();
                $result = $admin->allowField(true)->save($post);
                //插入权限关联
                $AuthGroupAccess = new AuthGroupAccess();
                $post['uid'] = $admin->getLastInsID();
                $resultAccess = $AuthGroupAccess->allowField(true)->save($post);
                if ($result && $resultAccess){
                    Db::commit();
                    $this->ajaxRuturn(200,"用户添加成功！");
                }else{
                    Db::rollback();
                    $this->ajaxRuturn(400,"用户添加失败！");
                }
            }catch (\Exception $e){
                $this->ajaxRuturn(400,$e->getMessage());
            }
        }else{
            $AuthGroup = new \app\run\model\AuthGroup();
            $result = $AuthGroup->select()->toArray();
            $this->assign("AuthGroup",$result);
            return $this->fetch();
        }
    }

    public function modify(){
        if ($this->request->isAjax()){
            $post = input("post.");
            if (isset($post['password'])){
                $post['password'] =password_hash($post['password'],PASSWORD_BCRYPT);
            }
            Db::startTrans();
            try{
                $model = new \app\run\model\Admin();
                //修改用户资料
                $admin = $model->allowField(true)->force()->save($post,['id'=>$post['id']]);
                //修改用户权限组
                $group = new AuthGroupAccess();
                $result = $group->force()->save(['group_id'=>$post['group_id']],['uid'=>$post['id']]);
                if ($result || $admin){
                    Db::commit();
                    $this->ajaxRuturn(200,"修改成功！");
                }else{
                    Db::rollback();
                    $this->ajaxRuturn(400,"修改失败！");
                }
            }catch (\Exception $e){
                Db::rollback();
                $this->ajaxRuturn(400,$e->getMessage());
            }
        }else{
            $AuthGroup = new \app\run\model\AuthGroup();
            $result = $AuthGroup->select()->toArray();
            $admin = new \app\run\model\Admin();
            $adminResult = $admin->alias("a")->field("a.id,a.name,c.id as group_id")
                ->join("auth_group_access b","a.id = b.uid")
                ->join("auth_group c","b.group_id = c.id")
                ->where("a.id","eq",input("get.id"))->find();
            $this->assign("AuthGroup",$result);
            $this->assign("admin",$adminResult);
            return $this->fetch();
        }
    }
    public function delete(){
        if ($this->request->isAjax()){
            $post = input("post.id");
            $ids = explode(",",ltrim($post,","));
            if (in_array(1,$ids)){
                $this->ajaxRuturn(400,"请勿对自己进行此操作！");
            }
            $model = new \app\run\model\Admin();
            //组装条件
            $map[] = ['id',"in",$ids];
            $result = $model->where($map)->delete();
            if ($result){
                $this->ajaxRuturn(200,"删除成功！");
            }else{
                $this->ajaxRuturn(400,"删除失败！");
            }
        }
    }
}