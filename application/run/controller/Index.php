<?php
namespace app\run\controller;
use app\common\controller\Run;
class Index extends Run
{
    public function index()
    {
        return $this->fetch();
    }
}
