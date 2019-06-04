<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/18
 * Time: 22:17
 */

namespace app\run\controller;


use app\common\controller\Run;

class Upload extends Run
{
    public function upload(){
        $file = $_FILES["file"];
        $file_path = "./upload/".date("Ymd");
        $filepath = iconv("UTF-8","gb2312",$file_path);
        if (!file_exists($filepath)){
            mkdir($filepath,0777,true);
        }
        $filename = $filepath."/".time().substr($_FILES["file"]["name"], strripos($_FILES["file"]["name"],"."));
        move_uploaded_file($file["tmp_name"],$filename);
        return $this->ajaxRuturn($file["error"],substr($filename,1));
    }
}