<!doctype html>
<html>
    <head>
        <title>uploadPage</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <link href="https://cdn.bootcdn.net/ajax/libs/bootstrap-fileinput/5.2.3/css/fileinput.min.css" rel="stylesheet">
    </head>
    <body>
        <script>
            var outName = "<?php include 'checker.php'; if($_GET['name'] && checkName($_GET['name'])) echo $_GET['name'];  ?>";
        </script>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div id="title" class="navbar-header">
                    <a class="navbar-brand" href="#">{{ title }}</a>
                </div>
            </div>
        </nav>
        
        <div class="container">
            <div id="notice">
                <div class="alert alert-info" role="alert" v-if="seen">
                    <!-- notice  -->
                    <center>{{ text }}</center>
                </div>
            </div>
            
            <div id="list">
                    <label for="name">输入你的姓名：</label>
                    <input id="name" name="name" v-model="inputName">
                    <div v-for="item in items">
                        <h2>{{ item.title }}</h2>
                        <div v-if = "check(inputName, item.id) || item.uploaded === true">
                            <!-- 已经提交 -->
                            <img :src="item.imgSrc" width="250" class="img-thumbnail">
                        </div>
                        <div v-if="item.uploaded === false">
                            <form enctype="multipart/form-data" hidden>
                                <input
                                    type = "file"
                                    :id = "item.id"
                                    v-on:change = "upload($event, inputName, item.id)"
                                    accept = "image/jpg, image/jpeg, image/png"
                                />
                            </form>
                            <a> <label :for="item.id">点击上传</label> </a>
                        </div>
                    </div>
                    <br>
            </div>
        </div>
        
        <br>
        <center>
            <p>Author: lym12321 | Version: 20211226</p>
        </center>
        
        <!-- axios -->
        <script src="https://cdn.bootcdn.net/ajax/libs/axios/0.21.1/axios.min.js"></script>
        <!-- jQuery -->
        <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
        <!-- Vue.js -->
        <script src="https://cdn.bootcdn.net/ajax/libs/vue/3.2.0-beta.7/vue.global.min.js"></script>
        <script src="src/getConfig.php"></script>
        
    </body>
</html>