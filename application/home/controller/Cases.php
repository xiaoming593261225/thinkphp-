<?php
/**
 * Created by PhpStorm.
 * User: slkj
 * Date: 2019/3/21
 * Time: 10:49
 */

namespace app\home\controller;


use think\Controller;
use think\Db;

class Cases extends Controller
{
    public function index()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        if ($id) {
            $infos = Db::name('case e')
                ->leftJoin('case_class s', 'e.case_class_id=s.id')
                ->where('s.id=' . $id)
//                ->where('s.parent_id=' . $id)
                ->field('e.titles,e.icon,e.code_img,e.intro,s.name')
                ->select();
        } else {
            $infos = Db::name('case e')
                ->leftJoin('case_class s', 'e.case_class_id=s.id')
                ->field('e.titles,e.icon,e.code_img,e.intro,s.name')
                ->select();
        }
        $datas = Db::name('case_class')->select();
        $dataClass = Db::name('case_class')->where('parent_id', '=', 0)->select();
        return $this->fetch('case', compact('dataClass', 'infos', 'datas'));
    }
}