<?php
/**
 * Created by PhpStorm.
 * User: slkj
 * Date: 2019/3/18
 * Time: 10:38
 */

namespace app\run\controller;


use think\Controller;

class Banner extends Controller
{
    public function index()
    {
        return $this->fetch('index');
    }
}