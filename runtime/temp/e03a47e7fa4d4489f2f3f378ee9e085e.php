<?php /*a:1:{s:41:"../Template/run/news_class\newsClass.html";i:1553179621;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>列表</title>
    <link rel="stylesheet" href="/static/run/static/font-awesome-4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/static/run/static/layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="/static/run/static/style/common.css"/>
    <link rel="stylesheet" type="text/css" href="/static/run/static/css/paging.css"/>
</head>
<body>
<div class="search-block" style="float: right;padding-top: 40px;">
    <form class="layui-form" action="<?php echo url('NewsClass/index'); ?>" method="post">
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">分类</label>
                <div class="layui-input-block">
                    <input type="text" name="title" placeholder="请输入分类名称" id="title" autocomplete="off"
                           class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <button class="layui-btn layui-btn-sm"  id="search_btn">立即搜索</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="layui-tab-content" style="background-color: rgba(255,255,255,1);margin-top: 5px;">
    <div class="layui-tab-item layui-show">
        <div class="layui-btn-group demoTable" style="float: left;padding-top: 40px;">
            <a href="javascript:;" id="btn" class="layui-btn layui-btn-radius"><i class="fa fa-edit"></i> 新 增</a>
        </div>
        <span class="layui-clear"></span>
        <table class="layui-hide" id="table_list" lay-filter="lists"></table>
    </div>
</div>
<table class="layui-table">
    <tr>
        <th>ID</th>
        <th>名称</th>
        <th>创建时间</th>
        <th>修改时间</th>
        <th>操作</th>
    </tr>
    <?php if(is_array($infos) || $infos instanceof \think\Collection || $infos instanceof \think\Paginator): $i = 0; $__LIST__ = $infos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?>
    <tr>
        <td><?php echo htmlentities($info['id']); ?></td>
        <td><?php echo htmlentities($info['news_name']); ?></td>
        <td><?php echo htmlentities($info['create_time']); ?></td>
        <td><?php echo htmlentities($info['update_time']); ?></td>
        <td>
            <a href="javascript:;" class="layui-btn edit layui-btn-radius" editClass_id="<?php echo htmlentities($info['id']); ?>"><i
                    class="fa fa-edit"></i> 编 辑</a>
            <a href="javascript:;" class="layui-btn delete layui-btn-radius layui-btn-danger"
               deleteClass_id="<?php echo htmlentities($info['id']); ?>"><i
                    class="fa fa-trash-o"></i> 删 除</a>
        </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<div class="page">
    <?php echo $page; ?>
</div>
<div id="demo1"></div>
<div id="doc" style="display: none">
    <form class="layui-form" id="postuser" action="" method="post" style="margin: 5%">
        <div class="layui-form-item">
            <label class="layui-form-label">分类名称</label>
            <div class="layui-input-block">
                <input type="text" name="news_name" id="news_name" value="" required lay-verify="required"
                       placeholder="请输入分类名称"
                       autocomplete="off"
                       class="layui-input newsEdit">
            </div>
            <input type="hidden" id="hidden_id" value="">
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo" onclick="submit_add()">提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
</div>

</body>
</html>
<script src="/static/run/static/layui/layui.js"></script>
<script src="/static/run/static/layui/jquery-3.2.1.min.js"></script>
<script src="/static/run/static/layui/layui.all.js"></script>
<script src="/static/run/static/layer/layer.js"></script>
<script>

    //分类的添加
    var btn = document.getElementById("btn");
    btn.onclick = function () {
        $('#news_name').val(null)
        layer.open({
            type: 1,
            shade: false,
            title: "分类的添加", //标题
            content: $('#doc'), //捕获的元素，注意：最好该指定的元素要存放在body最外层，否则可能被其它的相对元素所影响
            area: ['500px', '260px'],
            cancel: function () {
                $('#doc').css('display', 'none');
            }
        });
    }

    function submit_add() {
        var name = $("#news_name").val();
        var id = $('#hidden_id').val();
        $.post('<?php echo url("newsClassAdd"); ?>', {
            news_name: name,
            id: id,
        }, function (e) {
            if (e == 200) {
                layer.msg('成功');
                location.reload();
            } else {
                layer.msg('失败');
            }
        });
    }

    $('.edit').click(function () {
        var id = $(this).attr('editClass_id');
        $('#hidden_id').val(id);
        $.post('<?php echo url("newsClassShow"); ?>', {id: id}, function (data) {
            $('#news_name').val(data.news_name);
        });

        layer.open({
            type: 1,
            shade: false,
            title: "分类编辑", //标题
            content: $('#doc'), //捕获的元素，注意：最好该指定的元素要存放在body最外层，否则可能被其它的相对元素所影响
            area: ['500px', '260px'],
            cancel: function () {
                $('#doc').css('display', 'none');
            }
        });
    });

    /**
     * 新闻分类的删除
     */
    $('.delete').click(function () {
        var id = $(this).attr('deleteClass_id');
        var thiss = $(this)
        layer.confirm('确定要删除！', {btn: ['确认', '取消']}, function () {
            $.post('<?php echo url("newClassDelete"); ?>', {delete_id: id}, function (e) {
                if (e == 200) {
                    layer.msg('成功');
                    location.reload();
                } else {
                    layer.msg('失败');
                }
            });
        });
    });
</script>
