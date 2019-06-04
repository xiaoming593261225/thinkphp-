<?php
namespace app\home\controller;

use app\common\controller\Home;
use think\facade\Config;

class Index extends Home
{
    public function index()
    {
        return $this->fetch('index');
    }
}