<?php
/**
 * Created by PhpStorm.
 * User: hdkj
 * Date: 2018/6/9
 * Time: 16:29
 */

namespace app\run\model;


use think\Model;

class Type extends Model
{
    public function getTypeList($listRow,$page){
        $result = $this->paginate($listRow,false,['page'=>$page])->each(function ($items,$key){
            return $items;
        })->toArray();
        return $result;
    }
}