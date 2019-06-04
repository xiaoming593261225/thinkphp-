<?php
/**
 * Created by PhpStorm.
 * User: slkj
 * Date: 2019/3/18
 * Time: 14:46
 */

namespace app\run\controller;


use think\Controller;
use think\Db;
use think\Model;

class NewsClass extends Controller
{
    /**
     * 新闻分类的列表
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index()
    {

        $ser = input("title");
        $infos = Db::name("news_class")->where("news_name", "like", "%{$ser}%")
                ->paginate(10, false, ["query" => request()->param]);
        $page = $infos->render();
        $this->assign("page", $page);
        return $this->fetch("newsClass", compact('infos'));
    }

    /**
     * 新闻分类的添加
     */
    public function newsClassAdd()
    {
        if ($_POST && $_POST != null) {
            $data = $_POST;
            $data['create_time'] = date('Y-m-d H:i:s', time());
            $data['update_time'] = date('Y-m-d H:i:s', time());
            if ($data['id'] != null) {
                $info = Db::name('news_class')->where('id', '=', $data['id'])->update(['news_name' => $data['news_name'], 'update_time' => $data['update_time']]);
            } else {
                $info = Db::name('news_class')->insert($data);
            }
            if ($info) {
                echo 200;
            } else {
                echo 300;
            }
        }
    }

    /**
     * 编辑的回显
     * @return array|null|\PDOStatement|string|Model
     */
    public function newsClassShow(){
        if ($_POST) {
            $id = isset($_POST['id'])?$_POST['id']:"";
            return Db::name('news_class')->where('id='.$id)->field('news_name')->find();
        }
    }

    /**
     * 新闻分类的编辑
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function newsClassEdit()
    {
        if ($_GET) {
            $id = isset($_GET['id']) ? $_GET['id'] : "";
            if ($id != null) {
                $data = $_GET;
                $data['update_time'] = date('Y-m-d H:i:s', time());
                if (Db::name('news_class')->where('id=', $id)->update($data)) {
                    echo 200;
                } else {
                    echo 300;
                }
            }
        }
    }

    /**
     * 新闻分类的删除
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public
    function newClassDelete()
    {
        $id = isset($_POST['delete_id']) ? $_POST['delete_id'] : '';
        if (Db::name('news_class')->where('id', '=', $id)->delete()) {
            echo 200;
        }
    }
}