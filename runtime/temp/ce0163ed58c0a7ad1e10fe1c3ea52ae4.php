<?php /*a:1:{s:32:"../Template/run/common\skin.html";i:1528798690;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>主题样式切换</title>
    <link rel="stylesheet" href="/static/run/static/layui/css/layui.css" />
    <style type="text/css">
        .skin-block{
            padding: 10px;
        }
        .skin-block ul li{
            float: left;
            width: 40%;
            height: 100px;
            margin: 5px;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0px 0px 5px #E2E2E2;
            cursor: pointer;
        }
        .clearfix{
            clear: both;
            display: block;
        }
    </style>
</head>
<body>
<div class="skin-block">
    <ul class="clearfix">
        <li data-skin="#008B8B">
            <div class="left-menu" style="background-color: #008B8B;height: 100%;width: 20%;float: left;"></div>
            <div class="right-content" style="background-color: #F2F2F2;height: 100%;width: 80%;float: left;"></div>
        </li>
        <li data-skin="#35495e">
            <div class="left-menu" style="background-color: #35495e;height: 100%;width: 20%;float: left;"></div>
            <div class="right-content" style="background-color: #F2F2F2;height: 100%;width: 80%;float: left;"></div>
        </li>
        <li data-skin="#FF5722">
            <div class="left-menu" style="background-color: #FF5722;height: 100%;width: 20%;float: left;"></div>
            <div class="right-content" style="background-color: #F2F2F2;height: 100%;width: 80%;float: left;"></div>
        </li>
    </ul>
</div>
<script type="text/javascript" src="/static/run/static/layui/layui.js" ></script>
<script type="text/javascript" src="/static/run/modules/skin.js" ></script>
<script type="application/javascript">
    layui.config({
        base: '/static/run/modules/'
    }).use(['element', 'skin'], function() {
        var element = layui.element,
            skin = layui.skin;
        skin.skin();
    });
</script>
</body>
</html>