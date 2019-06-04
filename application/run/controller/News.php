<?php
/**
 * Created by PhpStorm.
 * User: slkj
 * Date: 2019/3/18
 * Time: 10:52
 */

namespace app\run\controller;


use app\common\controller\Run;
use function PHPSTORM_META\type;
use think\Controller;
use think\Db;
use think\exception\DbException;

class News extends Controller
{
    /**
     * 新闻列表的展示
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $name = input('title');
        $datas = Db::name('news n')
            ->leftJoin('news_class s', 'n.news_class_id=s.id')
            ->leftJoin('views v', 'n.id = v.commonality_id')
            ->where('v.type=' . "10")
            ->where('n.title', 'like', "%{$name}%")
            ->field('n.id,n.title,n.content,n.author,n.icon,n.create_time,n.news_class_id,n.update_time,n.description,s.news_name,v.views')
            ->paginate(10, false, ["query" => request()->param]);
        $fens = Db::name('news_class')->select();
        $page = $datas->render();
        $this->assign("page", $page);
        return $this->fetch('list', compact('datas', 'fens'));

    }

    /**
     * 编辑的回显
     * @return array|null|\PDOStatement|string|\think\Model
     */
    public function newsShow()
    {
        $datas = Db::name('news_class')->select();
        return $datas;

    }

    /**
     * 新闻的添加与编辑
     * @throws \think\Exception
     */
    public function newsAdd()
    {
        if ($_POST) {
            $data = input("post.data/a");
            unset($data["file"]);
            $data["create_time"] = date("Y-m-d H:i:s");
            $data["update_time"] = date("Y-m-d H:i:s");
            if ($_POST['id'] != null) {
                Db::name('news')->where('id', '=', $_POST['id'])
                    ->update(['title' => $data['title'], 'icon' => $data['icon'], 'description' => $data['description'], 'content' => $data['content'], 'author' => $data['author'], 'news_class_id' => $data['news_class_id'], 'update_time' => $data['update_time']]);
                echo 200;
            } else {
                Db::startTrans();
                try {
                    $id = Db::name('news')
                        ->insertGetId(['news_class_id' => $data['news_class_id'], 'title' => $data['title'], 'description' => $data['description'], 'content' => $data['content'], 'author' => $data['author'], 'icon' => $data['icon'], 'create_time' => $data['create_time'], 'update_time' => $data['update_time']]);
                    Db::name("views")->insert(["commonality_id" => $id, "type" => 10]);
                    Db::commit();
                    echo 200;
                } catch (DbException $exception) {
                    Db::rollback();
                    echo 300;
                }
            }
        }
    }

    /**
     * 新闻的编辑
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function newsEdit()
    {
        if ($_POST) {
            $editClass_id = isset($_GET['news_id']) ? $_GET['news_id'] : '';
            if ($editClass_id != null) {
                if (Db::name('news')->where('id=' . $editClass_id)->update($_POST)) {
                    $this->success('编辑成功');
                } else {
                    $this->error('编辑失败');
                }
            }
        }
    }

    /**
     * 新闻的删除
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function newsDelete()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        if (Db::name('news')->where('id', '=', $id)->delete() && Db::name('views')->where('commonality_id', '=', $id)->where('type', '=', 20)->delete()) {
            echo 200;
        } else {
            echo 200;
        }
    }
}