<?php /*a:1:{s:37:"../Template/run/cases\case_class.html";i:1553247408;}*/ ?>
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
    <form class="layui-form" action="<?php echo url('Cases/caseClass'); ?>" method="post">
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
        </div>
        <span class="layui-clear"></span>
        <table class="layui-hide" id="table_list" lay-filter="lists"></table>
    </div>
</div>
<table class="layui-table">
    <tr>
        <th>ID</th>
        <th>分类名称</th>
        <th>分类父级Id</th>
        <th>创建时间</th>
        <th>修改时间</th>
        <th>操作</th>
    </tr>
    <?php if(is_array($datas) || $datas instanceof \think\Collection || $datas instanceof \think\Paginator): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
    <tr>
        <td><?php echo htmlentities($data['id']); ?></td>
        <td><?php echo htmlentities($data['name']); ?></td>
        <td><?php echo htmlentities($data['parent_id']); ?></td>
        <td><?php echo htmlentities($data['create_time']); ?></td>
        <td><?php echo htmlentities($data['update_time']); ?></td>
        <td>
            <a href="javascript:;" class="layui-btn edit layui-btn-radius" data-name="<?php echo htmlentities($data['name']); ?>"
               data-parent_id="<?php echo htmlentities($data['parent_id']); ?>"
               id="<?php echo htmlentities($data['id']); ?>"><i
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
                <input type="text" name="name" required lay-verify="required" id="names" placeholder="请输入名称"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <input type="hidden" id="case_class_id" value="">
        <div class="layui-form-item">
            <label class="layui-form-label">分类</label>
            <div class="layui-input-inline">
                <select name="parent_id" id="parent_id" lay-verify="required">
                    <option value="0">请选择分类</option>
                    <?php if(is_array($fens) || $fens instanceof \think\Collection || $fens instanceof \think\Paginator): $i = 0; $__LIST__ = $fens;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fen): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo htmlentities($fen['id']); ?>"><?php echo htmlentities($fen['name']); ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <div class="layui-form-mid layui-word-aux">不选择就为顶级</div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button onclick="caseClassAdd()" class="layui-btn" lay-submit="" lay-filter="adddd">立即提交</button>
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
        layer.open({
            type: 1,
            shade: false,
            maxmin: true,
            title: "案例分类的添加", //标题
            content: $('#doc'), //捕获的元素，注意：最好该指定的元素要存放在body最外层，否则可能被其它的相对元素所影响
            area: ['30%', '40%'],
            cancel: function () {
                $('#doc').css('display', 'none');
            }
        });
    });
    layui.use(['form', 'upload'], function () {
        var upload = layui.upload;
        var form = layui.form;
        FORM = form;
    });
    $('.edit').click(function () {
        var id = $(this).attr('id');
        $('#case_class_id').val(id);
        var name = $(this).attr('data-name');
        var parent_id = $(this).attr('data-parent_id');
        $("#names").val(name);
        $.post('<?php echo url("caseShow"); ?>', {id: id}, function (e) {
            console.log(e);
            var list = e;
            var len = e.length;
            var str = '';
            str += '<option value="0">请选择分类</option>';
            for (var i = 0; i < len; i++) {
                str += '<option value="' + list[i].id + '">' + list[i].name + '</option>';
            }
            $("#parent_id").html(str);
            $("#parent_id").val(parent_id);
            FORM.render();
        });
        layer.open({
            type: 1,
            shade: false,
            maxmin: true,
            title: "案例分类的编辑", //标题
            content: $('#doc'), //捕获的元素，注意：最好该指定的元素要存放在body最外层，否则可能被其它的相对元素所影响
            area: ['30%', '40%'],
            cancel: function () {
                $('#doc').css('display', 'none');
            }
        });
    });

    function caseClassAdd() {
        var name = $('#names').val()
        var id = $('#case_class_id').val();
        var parent_id = $('#parent_id').val();
        $.post('<?php echo url("cassClassAdd"); ?>', {name: name, id: id, parent_id: parent_id}, function (data) {
            if (data == 200) {
                layer.msg('操作成功');
                location.reload();
            } else {
                layer.msg('操作失败');
            }
        });
    }

    // 删除事件
    $(".delete").click(function () {
        var id = $(this).attr('id');
        layer.confirm('确定要删除！', {btn: ['确认', '取消']}, function () {
            $.post('<?php echo url("caseClassDel"); ?>', {id: id}, function (data) {
                if (data == 200) {
                    layer.msg('操作成功');
                    location.reload();
                } else {
                    layer.msg('操作失败,存在子类');
                }
            })
        });
    });
</script>