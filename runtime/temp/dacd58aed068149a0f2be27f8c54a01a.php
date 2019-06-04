<?php /*a:1:{s:37:"../Template/run/auth_group\lists.html";i:1528798690;}*/ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>权限组列表</title>
    <link rel="stylesheet" href="/static/run/static/font-awesome-4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/static/run/static/layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="/static/run/static/style/common.css"/>
</head>
<body>
<div class="search-block">
    <form class="layui-form" action="">
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">权限组名称</label>
                <div class="layui-input-block">
                    <input type="text" name="title" placeholder="请输入权限组名称" id="title" autocomplete="off"
                           class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <button class="layui-btn layui-btn-sm" id="search_btn">立即搜索</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="layui-tab-content" style="background-color: rgba(255,255,255,1);margin-top: 5px;">
    <div class="layui-tab-item layui-show">
        <div class="layui-btn-group demoTable" style="float: left;">
            <button class="layui-btn layui-btn-sm" id="created">添加权限组</button>
            <button class="layui-btn layui-btn-sm" id="delete">批量删除</button>
        </div>
        <span class="layui-clear"></span>
        <table class="layui-hide" id="table_list" lay-filter="lists"></table>
    </div>
</div>
<script type="text/html" id="tool">
    <a class="layui-btn layui-btn-xs layui-btn-primary layui-btn-radius" lay-event="modify">编辑权限</a>
    <a class="layui-btn layui-btn-primary layui-btn-xs layui-btn-radius" lay-event="delete">删除权限</a>
</script>

<script type="text/html" id="ismenu-tpl">
    <input type="checkbox" name="ismenu" data-id="{{d.id}}" value="{{d.ismenu}}" lay-skin="switch" lay-text="是|否"
           lay-filter="ismenu" {{ d.ismenu== 1 ? 'checked' : '' }}>
</script>
<script type="text/html" id="icon">
    <div style="text-align: center">
        <i class="fa {{d.icon}}" style="font-size: 20px;"></i>
    </div>
</script>
<script type="text/javascript" src="/static/run/static/layui/layui.js"></script>
<script>
    var table;
    layui.config({
        base: '/static/run/modules/'
    }).use(['layer', 'element', 'table', 'jquery', 'laydate', 'home'], function () {
        var layer = layui.layer,
            $ = layui.jquery,
            laydate = layui.laydate,
            form = layui.form,
            home = layui.home,
            element = layui.element;
        table = layui.table;
        //日期
        laydate.render({
            elem: '#create_time'
            , range: true
        });
        //保存当前页
        var page = 1;
        var limit = home.fitPage();
        //方法级渲染
        table.render({
            elem: '#table_list'
            , url: "<?php echo url('AuthGroup/lists'); ?>"
            , cols: [[
                {checkbox: true, fixed: true}
                , {field: 'id', title: 'ID', width: "5%"}
                , {field: 'title', title: '权限组名称', width: "78%", edit: "text"}
                , {fixed: 'right', width: "15%", align: 'center', toolbar: '#tool'}
            ]]
            , id: 'lists'
            , page: true
            , limit: limit
            , response: {
                statusName: 'code' //数据状态的字段名称，默认：code
                , statusCode: 200 //成功的状态码，默认：0
                , msgName: 'msg' //状态信息的字段名称，默认：msg
                , countName: 'count' //数据总数的字段名称，默认：count
                , dataName: 'data' //数据列表的字段名称，默认：data
            }, done: function (res, curr, count) {
                page = curr;
            }
        });
        //监听单元格编辑
        table.on('edit(lists)', function (obj) {
            var value = obj.value //得到修改后的值
                , data = obj.data //得到所在行所有键值
                , field = obj.field; //得到字段
            $.ajax({
                type: "POST",
                async: true,
                url: "<?php echo url('AuthGroup/modify'); ?>",
                data: data,
                dataType: "json",
                success: function (res) {
                    if (res && res['status'] == 200) {
                        layer.msg(res.msg, {icon: 1});
                    } else {
                        layer.msg(res.msg, {icon: 2});
                    }
                }
            });
        });
        $("#search_btn").click(function () {
            //名称
            var title = $("#title").val();
            table.reload('lists', {
                page: {
                    curr: page //重新从第 1 页开始
                }
                , where: {
                    name: name,
                    title: title,
                    ismenu: ismenu
                }
            });
            return false;
        });
        //监听工具条
        table.on('tool(lists)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
            var data = obj.data; //获得当前行数据
            var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
            var tr = obj.tr; //获得当前行 tr 的DOM对象

            if (layEvent === 'modify') { //编辑
                layer.open({
                    title: "编辑" + data.title + "权限",
                    type: 2,
                    area: ['400px', '320px'],
                    content: "<?php echo url('AuthGroup/modify'); ?>" + "?id=" + data.id,
                    success: function (layero, index) {

                    }
                });
            } else if (layEvent === 'delete') { //删除
                layer.confirm('数据无价、请谨慎操作？', function (index) {
                    $.ajax({
                        type: "post",
                        async: true,
                        url: "<?php echo url('AuthGroup/delete'); ?>",
                        data: {id: data.id},
                        dataType: "json",
                        success: function (res) {
                            if (res && res['status'] == 200) {
                                obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                                layer.close(index);
                            } else {
                                layer.msg(res.msg, {icon: 2});
                            }
                        }
                    });
                    //向服务端发送删除指令
                });
            } else if (layEvent === 'create-children') {
                layer.open({
                    title: "添加" + data.title + "的子菜单菜单",
                    type: 2,
                    area: ['400px', '400px'],
                    content: "<?php echo url('Menus/created'); ?>" + "?pid=" + data.id,
                    success: function (layero, index) {
                        console.log(layero, index);
                    }
                });
            }
        });
        //添加
        $("#created").click(function () {
            layer.open({
                title: "添加权限组",
                type: 2,
                area: ['400px', '300px'],
                content: "<?php echo url('AuthGroup/created'); ?>"
            });
        });
        //批量删除
        $("#delete").click(function () {
            var checkStatus = table.checkStatus('lists')
                , data = checkStatus.data;
            var ids = "";
            $.each(data, function (x, y) {
                ids += "," + y.id;
            })
            layer.confirm('数据无价、请谨慎操作？', function (index) {
                $.ajax({
                    type: "post",
                    async: true,
                    url: "<?php echo url('AuthGroup/delete'); ?>",
                    data: {id: ids},
                    dataType: "json",
                    success: function (res) {
                        if (res && res['status'] == 200) {
                            table.reload('lists', {
                                page: {
                                    curr: page
                                }
                            });
                            layer.close(index);
                        } else {
                            layer.msg(res.msg, {icon: 2});
                        }
                    }
                });
            });
        })
    });
</script>
</body>
</html>