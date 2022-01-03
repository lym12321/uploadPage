<?php
    // @Author: lym12321
    function check( $fileName, $fileType, $fileSize ){
        $allowedExts = array("jpeg", "jpg", "png");
        $ext = end(explode(".", $fileName));
        // echo "Ext = ". $ext ."<br>";
        if((($fileType == "image/jpg") || ($fileType == "image/jpeg") || ($fileType == "image/png") || ($fileType == "image/x-png") || ($fileType == "image/pjpeg")) && ($fileSize <= 20480000) && in_array($ext, $allowedExts)){
            
        }else{
            done(false, "不被允许的文件类型：".$ext);
        }
    }
    function checkName( $inputName ){
        $len = iconv_strlen($inputName);
        if($len < 2 || $len > 4){
            return false;
        }else{
            return true;
        }
    }
?>