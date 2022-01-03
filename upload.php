<?php
    include("checker.php");
    // @Author: lym12321
    // @Date:   2021/12/24
    // Happy Christmas!
    
    function done($success, $message){
        die(json_encode(array('success'=>$success, 'message'=>$message)));
    }
    
    // 判断参数 id
    if(!$_POST['id']){
        if(!$_GET['id']){
            done(false, "缺少参数");
        }
        $id = $_GET['id'];
    }else{
        $id = $_POST['id'];
    }
    
    // 判断参数 name
    if(!$_POST['name']){
        if(!$_GET['name']){
            done(false, "缺少参数");
        }
        $inputName = $_GET['name'];
        $saveName = $_GET['name'] ."-". $id .".jpg";
    }else{
        $inputName = $_POST['name'];
        $saveName = $_POST['name'] ."-". $id .".jpg";
    }
    
    if(!checkName($inputName)){
        done(false, "您输入了不合法的姓名：".$inputName);
    }
    
    
    if($_FILES['file']['error'] > 0){
        done(false, "未知错误，请叫 lym12321 来 debug.");
    }else{
        $fileName = $_FILES['file']['name'];
        $fileType = $_FILES['file']['type'];
        $fileSize = $_FILES['file']['size'];
        $fileTemp = $_FILES['file']['tmp_name'];
        
        check($fileName, $fileType, $fileSize);
        
        if(file_exists("upload_files/". $saveName)){
            done(false, "文件已经存在");
        }else{
            move_uploaded_file($fileTemp, "upload_files/". $saveName);
            done(true, "上传成功");
        }
    }
?>