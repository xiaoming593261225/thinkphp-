<?php
/**
 * Created by PhpStorm.
 * User: hdkj
 * Date: 2018/6/9
 * Time: 17:00
 */

namespace app\common\taglib;


use think\template\TagLib;

class Custom extends TagLib
{
    //定义标签列表
    protected $tags = [
        'icons' => ['attr' => '', 'close' => 0]
    ];

    public function tagIcons($tag, $content)
    {
        //读取icon数据
        $icons = get_icons();
        $parse = '';
        foreach ($icons as $key => $val) {
            $parse .='<li class="fa '.$val.'" aria-hidden="true" data-icon="'.$val.'"></li>';
        }
        return $parse;
    }
}