<?php
/**
 * Created by PhpStorm.
 * User: slkj
 * Date: 2019/3/21
 * Time: 11:12
 */

namespace app\home\controller;


use think\Controller;
use think\Db;

class Problem extends Controller
{
    /**
     * 问题分类列表
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $name = input('keyWords');
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        if ($id) {
            $infos = Db::name('explain')->where('explain_class_id', '=', $id)->select();
        } else {
            $infos = Db::name('explain')->where('name', 'like', "%$name%")->select();
        }
        $datas = Db::name('explain_class')->select();
        return $this->fetch('problem', compact('datas', 'infos'));
    }

    public function problem_1()
    {

        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $datas = Db::name('response r')
            ->leftJoin('explain e', 'r.explain_id=e.id')
            ->where('e.id', '=', $id)
            ->field('e.name,r.content')
            ->select();
        if ($datas == null) {
            $datas = Db::name('explain')->where('id', '=', $id)->field('name')->select();
        }
        $infos = Db::name('explain_class')->select();
        return $this->fetch('problem_1', compact('datas', 'infos'));
    }


    public function problem_2()
    {
        $datas = Db::name('explain_class')->select();
        return $this->fetch('problem_2', compact('datas'));
    }
}