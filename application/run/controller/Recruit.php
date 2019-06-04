<?php
/**
 * Created by PhpStorm.
 * User: slkj
 * Date: 2019/3/19
 * Time: 14:35
 */

namespace app\run\controller;


use think\Controller;
use think\Db;
use think\exception\DbException;

class Recruit extends Controller
{
    /**
     * 招聘列表
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $name = input('title');
        $datas = $datas = Db::name('views')
            ->alias('s')
            ->join('recruit', 's.commonality_id=recruit.id')
            ->where('s.type', '=', '20')
            ->where('recruit.name', 'like', "%{$name}%")
            ->paginate(10, false, ["query" => request()->param]);
        $page = $datas->render();
        $this->assign("page", $page);
        return $this->fetch('index', compact('datas'));
    }

    /**
     * 招聘中编辑的回显
     * @return array|\PDOStatement|string|\think\Model|null
     * @throws DbException
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function recruitShow()
    {
        if ($_POST) {
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $datas = $datas = Db::name('views')
                ->alias('s')
                ->join('recruit', 's.commonality_id=recruit.id')
                ->where('s.type', '=', '20')
                ->where('recruit.id', '=', $id)
                ->field('recruit.name,recruit.keyword,recruit.description,recruit.minute,recruit.min_price,recruit.max_price,recruit.email,recruit.address')
                ->find();
            return $datas;
        }
    }

    /**
     * 招聘的添加与编辑
     * @return int
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function recruitAdd()
    {
        if ($_POST) {
            $data = $_POST;
            $data['create_time'] = date('Y-m-d H:i:s');
            $data['update_time'] = date('Y-m-d H:i:s');
            if ($_POST['id'] != null) {
                Db::name('recruit')->where('id', '=', $_POST['id'])
                    ->update(['name' => $data['name'], 'keyword' => $data['keyword'], 'description' => $data['description'], 'minute' => $data['minute'], 'update_time' => $data['update_time'], 'min_price' => $data['min_price'], 'max_price' => $data['max_price'], 'email' => $data['email'], 'address' => $data['address']]);
                return 200;
            }
            Db::startTrans();
            try {
                $id = Db::name('recruit')->insertGetId($data);
                Db::name("views")->insert(["commonality_id" => $id, "type" => 20]);
                Db::commit();
                echo 200;
            } catch (DbException $exception) {
                Db::rollback();
                echo 300;
            }
        }
    }

    /**
     * 招聘的删除
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function recruitDelete()
    {
        if ($_POST) {
            $id = isset($_POST['id']) ? $_POST['id'] : "";
            if (Db::name('recruit')->where('id', '=', $id)->delete() && Db::name('views')->where('commonality_id', '=', $id)->where('type', '=', 20)->delete()) {
                echo 200;
            }
        }
    }
}