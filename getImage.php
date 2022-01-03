<?php
    function done($code, $message){
        die(json_encode(array('code'=>$code, 'message'=>$message)));
    }
    if(!$_GET['name']){
        done(-1, 'error');
    }
    $name = $_GET['name'] .".jpg";
    if(file_exists("upload_files/" .$name)){
        // echo "upload_files/" .$name;
        done(1, 'upload_files/' .$name."?ts=".floor(time()/600));
        // done(1, 'upload_files/' .$name);
    }else{
        // echo "not found";
        done(-1, 'not found');
    }
?>