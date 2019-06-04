<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/20
 * Time: 21:38
 */

namespace app\run\controller;


use think\Controller;
use think\Db;

class Consulting extends Controller
{
    /**
     * 问答的列表
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $name = input('name');
        $datas = Db::name('explain e')
            ->leftJoin('response r', 'r.explain_id=e.id')
            ->leftJoin('explain_class s', 'e.explain_class_id=s.id')
            ->where('e.name', 'like', "%$name%")
            ->whereOr('s.name', 'like', "%$name%")
            ->field('e.id,e.name,e.status,e.create_time,e.update_time,r.content,s.name as className')
            ->paginate(10, false, ['query' => request()->param]);
        $page = $datas->render();
        $this->assign('page', $page);
        return $this->fetch('list', compact('datas'));
    }

    /**
     * 问答的回显
     * @return mixed
     */
    public function ConsultingShow()
    {
        if ($_POST) {
            $id = isset($_POST['id']) ? $_POST['id'] : "";
            return Db::name('explain e')
                ->leftJoin('response r', 'r.explain_id=e.id')
                ->where('e.id=' . $id)
                ->field('e.name,r.content')
                ->find();
        }
    }

    /**
     * 问答列表数据的删除
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function explainDel()
    {
        if ($_POST) {
            $id = isset($_POST['id']) ? $_POST['id'] : "";
            if (Db::name('explain')->where('id=' . $id)->delete() && Db::name('response')->where('explain_id=' . $id)->delete()) {
                echo 200;
            }
        }
    }

    /**
     * 问答的解答
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function explainEdit()
    {
        if ($_POST) {
            $data = $_POST;
            $data['user_id'] = 1;
            $data['create_time'] = date('Y-m-d H:i:s');
            $data['update_time'] = date('Y-m-d H:i:s');
            if (Db::name('response')->where('explain_id=' . $data['explain_id'])->select()) {
                Db::name('response')->where('explain_id=' . $data['explain_id'])->update(['content' => $data['content'], 'update_time' => $data['update_time']]);
                echo 200;
            } else {
                if (Db::name('response')->insert($data)) {
                    Db::name('explain')->where('id=' . $data['explain_id'])->update(['status' => 10]);
                    echo 200;
                }
            }

        }
    }


    /**
     * 问答分类的列表
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function management()
    {
        $name = input('name');
        $explains = Db::name('explain_class')
            ->where('name', "like", "%$name%")
            ->paginate(10, false, ["query" => request()->param]);
        $page = $explains->render();
        $this->assign("page", $page);
        return $this->fetch('management_list', compact('explains'));
    }

    public function explainClassAdd()
    {
        if ($_POST) {
            $data = $_POST;
            $data["create_time"] = date("Y-m-d H:i:s");
            $data["update_time"] = date("Y-m-d H:i:s");
            Db::name('explain_class')->insert($data);
            echo 200;
        }
    }

    /**
     * 编辑的回显
     * @return array|\PDOStatement|string|\think\Model|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function explainClassShow()
    {
        if ($_POST) {
            $id = isset($_POST['id']) ? $_POST['id'] : "";
            return Db::name('explain_class')->where('id=' . $id)->field('name')->find();
        }
    }

    /**
     * 问答分类的删除
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function explainClassDel()
    {
        if ($_POST) {
            $id = isset($_POST['id']) ? $_POST['id'] : "";
            if (Db::name('explain')->where('explain_class_id=' . $id)->select()) {
                return 300;
            } else {
                Db::name('explain_class')->where('id=' . $id)->delete();
                return 200;
            }
        }
    }
}