<?php
/**
 * Created by PhpStorm.
 * User: slkj
 * Date: 2019/3/21
 * Time: 10:39
 */

namespace app\home\controller;


use think\Controller;
use think\Db;

class Functions extends Controller
{
    public function index()
    {
        if ($_GET) {
            $id = isset($_GET['id']) ? $_GET['id'] : "";
            $name = input('brand');
            if (empty($id)) {
                $infos = Db::name('brand')
                    ->where('name', 'like', "%$name%")
                    ->paginate(9, false, ["query" => request()->param]);
                $page = $infos->render();
                $this->assign("page", $page);
            } else {
                $infos = Db::name('brand')->where('function_class_id', '=', $id)
                    ->paginate(9, false, ["query" => request()->param]);
                $page = $infos->render();
                $this->assign("page", $page);
            }
        }
        $datas = Db::name('function_class')->select();
        return $this->fetch('function', compact('datas', 'infos', 'page'));
    }


}