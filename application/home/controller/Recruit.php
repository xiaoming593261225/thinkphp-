<?php
/**
 * Created by PhpStorm.
 * User: slkj
 * Date: 2019/3/21
 * Time: 10:59
 */

namespace app\home\controller;


use think\Controller;
use think\Db;

class Recruit extends Controller
{
    public function index()
    {
        $datas = Db::name('recruit')->select();
        $total = Db::name('recruit')->count();
        $this->assign('total', $total);
        return $this->fetch('recruit', compact('datas'));
    }

    public function detail()
    {
        if ($_GET) {
            $id = isset($_GET['id']) ? $_GET['id'] : "";
            $details = Db::name('recruit')->where('id=' . $id)->select();
        }
        return $this->fetch('recruit_1', compact('details'));
    }
}