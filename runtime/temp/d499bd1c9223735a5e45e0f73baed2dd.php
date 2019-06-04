<?php /*a:1:{s:45:"../Template/run/functions\function_class.html";i:1553232585;}*/ ?>
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
    <form class="layui-form" action="<?php echo url('Functions/functionClass'); ?>" method="post">
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">分类名称</label>
                <div class="layui-input-block">
                    <input type="text" name="name" placeholder="请输入分类名称" id="name" autocomplete="off"
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
        <div class="layui-btn-group demoTable" style="float: left;padding-top: 40px;">
            <a href="javascript:;" id="btn" class="layui-btn layui-btn-radius"><i class="fa fa-edit"></i> 新 增</a>
            <!--<button class="layui-btn layui-btn-sm" id="created">添加</button>-->
            <!--<button class="layui-btn layui-btn-sm" id="delete">批量删除</button>-->
        </div>
        <span class="layui-clear"></span>
        <table class="layui-hide" id="table_list" lay-filter="lists"></table>
    </div>
</div>
<table class="layui-table">
    <tr>
        <th>ID</th>
        <th>分类名称</th>
        <!--<th>品牌</th>-->
        <th>创建时间</th>
        <th>修改时间</th>
        <th>操作</th>
    </tr>
    <?php if(is_array($datas) || $datas instanceof \think\Collection || $datas instanceof \think\Paginator): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
    <tr>
        <td><?php echo htmlentities($data['id']); ?></td>
        <td><?php echo htmlentities($data['name']); ?></td>
        <!--<td>智慧，其他</td>-->
        <td><?php echo htmlentities($data['create_time']); ?></td>
        <td><?php echo htmlentities($data['update_time']); ?></td>
        <td>
            <a href="javascript:;" class="layui-btn functionEdit layui-btn-radius" functions_id="<?php echo htmlentities($data['id']); ?>"><i
                    class="fa fa-edit"></i> 编 辑</a>
            <a href="javascript:;" class="layui-btn delete layui-btn-radius layui-btn-danger"
               id="<?php echo htmlentities($data['id']); ?>"><i
                    class="fa fa-trash-o"></i> 删 除</a>
        </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<div class="page">
    <?php echo $page; ?>
</div>
</body>
</html>


<div id="doc" style="display: none;">
    <form class="layui-form" method="post" enctype="multipart/form-data" style="margin: 5%;margin-right: 10%;">
        <div class="layui-form-item">
            <label class="layui-form-label">名称</label>
            <div class="layui-input-block">
                <input type="text" name="class_name" required lay-verify="required" id="class_name" placeholder="请输入名称"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <input type="hidden" id="function_id" value="">
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button onclick="functionsAdd()" class="layui-btn" lay-submit="" lay-filter="adddd">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
</div>
<script src="/static/run/static/layui/layui.js"></script>
<script src="/static/run/static/layui/jquery-3.2.1.min.js"></script>
<script src="/static/run/static/layui/layui.all.js"></script>
<script src="/static/run/static/layer/layer.js"></script>
<script>
    $("#btn").click(function () {
        $("#name").val(null);
        layer.open({
            type: 1,
            shade: false,
            maxmin: true,
            title: "分类的添加", //标题
            content: $('#doc'), //捕获的元素，注意：最好该指定的元素要存放在body最外层，否则可能被其它的相对元素所影响
            area: ['20%', '28%'],
            cancel: function () {
                $('#doc').css('display', 'none');
            }
        });
    });

    //添加事件
    function functionsAdd() {
        var name = $('#class_name').val();
        var id = $('#function_id').val();
        $.post('<?php echo url("functionsAdd"); ?>', {name: name, id: id}, function (data) {
            if (data == 200) {
                layer.msg("操作成功");
                location.reload();
            } else {
                layer.msg("操作失败");
            }
        })
    }

    //编辑事件
    $(".functionEdit").click(function () {
        var id = $(this).attr('functions_id');
        $("#function_id").val(id);
        $.post('<?php echo url("functionClassEdit"); ?>', {id: id}, function (data) {
            $('#class_name').val(data.name);
        });
        layer.open({
            type: 1,
            shade: false,
            maxmin: true,
            title: "分类的编辑", //标题
            content: $('#doc'), //捕获的元素，注意：最好该指定的元素要存放在body最外层，否则可能被其它的相对元素所影响
            area: ['20%', '28%'],
            cancel: function () {
                $('#doc').css('display', 'none');
            }
        });
    });
    // 删除事件
    $(".delete").click(function () {
        var id = $(this).attr('id');
        layer.confirm('确定要删除！', {btn: ['确认', '取消']}, function () {
            $.post('<?php echo url("functionsDelete"); ?>', {id: id}, function (data) {
                if (data == 200) {
                    layer.msg("操作成功");
                    location.reload();
                } else {
                    layer.msg("操作失败,该分类使用中");
                }
            })
        })
    });
</script>