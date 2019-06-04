<?php
/**
 * Created by PhpStorm.
 * User: slkj
 * Date: 2019/3/19
 * Time: 17:31
 */

namespace app\run\controller;


use think\Controller;
use think\Db;

class Functions extends Controller
{
    /**
     * 品牌的列表
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $name = input('name');
        $datas = Db::name('brand b')
            ->leftJoin('function_class s', 'b.function_class_id = s.id')
            ->where('b.name', 'like', "%{$name}%")
            ->order('b.id', 'desc')
            ->field('b.*,s.name as class_name')
            ->paginate(10, false, ["query" => request()->param]);
        $page = $datas->render();
        $this->assign("page", $page);
        $fens = Db::name('function_class')->select();
        return $this->fetch('index', compact('datas', 'fens'));
    }

    /**
     * 品牌的添加
     */
    public function brandAdd()
    {
        if ($_POST) {
            $data = input("post.data/a");
            unset($data["file"]);
            $data["create_time"] = date("Y-m-d H:i:s");
            $data["update_time"] = date("Y-m-d H:i:s");
            if ($_POST['id'] != null) {
                Db::name('brand')->where('id', '=', $data['brand_id'])
                    ->update(['name' => $data['name'], 'icon' => $data['icon'], 'intro' => $data['intro'], 'code_img' => $data['code_img'], 'update_time' => $data['update_time'], 'function_class_id' => $data['function_class_id']]);
                echo 200;
            } else {
                $info = ['name' => $data['name'], 'icon' => $data['icon'], 'intro' => $data['intro'], 'code_img' => $data['code_img'], 'update_time' => $data['update_time'], 'function_class_id' => $data['function_class_id'], 'create_time' => $data['create_time']];
                Db::name('brand')->insert($info);
                echo 200;
            }
        }
    }

    /**
     * 下拉的回显
     * @return array|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function brandEdit()
    {
        return Db::name('function_class')->select();
    }

    /**
     * 品牌的删除
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function brandDel()
    {
        if ($_POST) {
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            Db::name('brand')->where('id=' . $id)->delete();
            echo 200;
        }
    }

    /**
     * 功能分类的列表
     * @return array|mixed|null|\PDOStatement|string|\think\Collection|\think\Model
     */
    public function functionClass()
    {
        $name = input('name');
        $datas = Db::name('function_class')->where('name', 'like', "%{$name}%")
            ->order('id', 'desc')
            ->paginate(10, false, ["query" => request()->param]);
        $page = $datas->render();
        $this->assign("page", $page);
        return $this->fetch('', compact('datas'));
    }

    /**
     * 功能分类的编辑回显
     * @return array|\PDOStatement|string|\think\Model|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function functionClassEdit()
    {
        if ($_POST) {
            $id = isset($_POST['id']) ? $_POST['id'] : "";
            if ($id != null) {
                $datas = Db::name('function_class')->where('id=' . $id)->field('name')->find();
                return $datas;
            }
        }
    }

    /**
     * 功能分类的添加与编辑
     */
    public function functionsAdd()
    {
        if ($_POST) {
            $data = $_POST;
            $data["create_time"] = date("Y-m-d H:i:s");
            $data["update_time"] = date("Y-m-d H:i:s");
            if ($_POST['id'] != null) {
                Db::name('function_class')->where('id=' . $_POST['id'])
                    ->update(['name' => $data['name'], 'update_time' => $data['update_time']]);
                echo 200;
            } else {
                Db::name('function_class')->insert($data);
                echo 200;
            }

        }
    }

    /**
     * 功能分类的删除
     */
    public function functionsDelete()
    {
        if ($_POST) {
            $id = isset($_POST['id']) ? $_POST['id'] : "";
            Db::name('function_class')->where('id=' . $id)
                ->delete();
            echo 200;
        }
    }
}