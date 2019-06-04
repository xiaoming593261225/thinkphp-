<?php
/**
 * Created by PhpStorm.
 * User: slkj
 * Date: 2019/3/21
 * Time: 10:22
 */

namespace app\home\controller;


use think\Controller;
use think\Db;

class News extends Controller
{
    /**
     * 新闻的列表
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function news()
    {
        $name = input('keyWords');
        $id = isset($_GET['class_id']) ? $_GET['class_id'] : "";
        if ($id) {
            $datas = Db::name('news n')
                ->leftJoin('news_class s', 'n.news_class_id=s.id')
                ->leftJoin('views v', 'n.id = v.commonality_id')
                ->where('s.id', '=', $id)
                ->where('v.type=' . "10")
                ->where('n.title', 'like', "%$name%")
                ->field('n.id,n.title,n.author,n.icon,n.create_time,n.update_time,n.description,s.news_name,v.views,n.content')
                ->paginate(6, false, ["query" => request()->param]);
        } else {
            $datas = Db::name('news n')
                ->leftJoin('news_class s', 'n.news_class_id=s.id')
                ->leftJoin('views v', 'n.id = v.commonality_id')
//            ->where('s.id', '=', $id)
                ->where('v.type=' . "10")
                ->where('n.title', 'like', "%$name%")
                ->field('n.id,n.title,n.author,n.icon,n.create_time,n.update_time,n.description,s.news_name,v.views,n.content')
                ->paginate(6, false, ["query" => request()->param]);
        }
        $page = $datas->render();
        $this->assign("page", $page);
        $newsHot = Db::name('news')->order('id desc')->limit(6)->select();
        $newsClass = Db::name('news_class')->select();
        return $this->fetch('news', compact('datas', 'newsHot', 'newsClass', 'page'));
    }

    /**
     * 新闻的详情（查看更多）
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function more()
    {
        if ($_GET) {
            $id = isset($_GET['id']) ? $_GET['id'] : "";
            $infos = Db::name('news n')
                ->leftJoin('news_class s', 'n.news_class_id=s.id')
                ->leftJoin('views v', 'n.id = v.commonality_id')
                ->where('v.type=' . "10")
                ->where('n.id=' . $id)
                ->field('n.id,n.title,n.author,n.icon,n.create_time,n.update_time,n.description,s.news_name,v.views,n.content')
                ->select();
            if ($infos) {
                Db::name('views')->where('commonality_id', '=', $id)->setInc('views');
            }
        }
        return $this->fetch('news_1', compact('infos'));
    }

}