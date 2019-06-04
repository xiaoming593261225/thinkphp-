<?php
/**
 * Created by PhpStorm.
 * User: slkj
 * Date: 2019/3/20
 * Time: 13:05
 */

namespace app\run\controller;


use think\Controller;
use think\Db;

class Cases extends Controller
{
    /**
     *案例列表
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $name = input('title');
        $datas = Db::name('case e')
            ->leftJoin('case_class s', 'e.case_class_id = s.id')
            ->where('e.titles', 'like', "%{$name}%")
            ->order('e.id', 'desc')
            ->field('e.id,e.titles,e.icon,e.code_img,e.intro,e.create_time,e.update_time,e.case_class_id,s.name as class_name')
            ->paginate('10', false, ['query' => request()->param]);
        $fens = Db::name('case_class')->select();
        $page = $datas->render();
        $this->assign('page', $page);
        return $this->fetch('case_list', compact('datas', 'fens'));
    }

    public function caseListAdd()
    {
        if ($_POST) {
            $data = input("post.data/a");
            unset($data["file"]);
            $data["create_time"] = date("Y-m-d H:i:s");
            $data["update_time"] = date("Y-m-d H:i:s");
            if ($_POST['id'] != null) {
                Db::name('case')->where('id', '=', $_POST['id'])
                    ->update(['titles' => $data['titles'], 'icon' => $data['icon'], 'code_img' => $data['code_img'], 'intro' => $data['intro'], 'case_class_id' => $data['case_class_id'], 'update_time' => $data['update_time']]);
                echo 200;
            } else {
                $info = ['titles' => $data['titles'], 'icon' => $data['icon'], 'code_img' => $data['code_img'], 'intro' => $data['intro'], 'case_class_id' => $data['case_class_id'], 'create_time' => $data['create_time'], 'update_time' => $data['update_time']];
                Db::name('case')->insert($info);
                echo 200;
            }
        }
    }

    /**
     * 案例的列表编辑回显
     * @return array|\PDOStatement|string|\think\Model|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function caseListShow()
    {
        return Db::name('case_class')->select();
    }

    /**
     * 案例的删除
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function caseListDel()
    {
        if ($_POST) {
            $id = isset($_POST['id']) ? $_POST['id'] : "";
            Db::name('case')->where('id=' . $id)->delete();
            echo 200;
        }
    }


    /**
     * 案例分类的添加与编辑
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function cassClassAdd()
    {
        if ($_POST) {
            $data = $_POST;
            $data["create_time"] = date("Y-m-d H:i:s");
            $data["update_time"] = date("Y-m-d H:i:s");
            if ($data['id'] != null) {
                Db::name('case_class')->where('id', '=', $data['id'])
                    ->update(['name' => $data['name'], 'parent_id' => $data['parent_id'], 'update_time' => $data['update_time']]);
                echo 200;
            } else {
                Db::name('case_class')->insert($data);
                echo 200;
            }
        } else {
            echo 300;
        }
    }

    /**
     * 案例分类编辑中的回显
     * @return array|\PDOStatement|string|\think\Model|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function caseShow()
    {
        return Db::name('case_class')->select();
    }

    /**
     * 案例分类的列表
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function caseClass()
    {
        $name = input('name');
        $datas = Db::name('case_class')->where('name', 'like', "%{$name}%")
            ->paginate(10, false, ["query" => request()->param]);
        $page = $datas->render();
        $this->assign("page", $page);
        $fens = Db::name('case_class')->field('id,name')->select();
        return $this->fetch('case_class', compact('datas', 'fens'));
    }

    /**
     * 案例分类的删除
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function caseClassDel()
    {
        if ($_POST) {
            $id = isset($_POST['id']) ? $_POST['id'] : "";
            $info = Db::name('case_class')->where('parent_id!=' . 0)->where('id=' . $id)->delete();
            if ($info) {
                echo 200;
            } else {
                echo 300;
            }
        }
    }
}