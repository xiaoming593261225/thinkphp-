<?php /*a:1:{s:36:"../Template/run/cases\case_list.html";i:1553243963;}*/ ?>
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
    <form class="layui-form" action="<?php echo url('Cases/index'); ?>" method="post">
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">分类名称</label>
                <div class="layui-input-block">
                    <input type="text" name="title" placeholder="请输入分类名称" id="title" autocomplete="off"
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
        <th>案例名称</th>
        <th>案例类型</th>
        <th>图片</th>
        <th>二维码</th>
        <th>简介</th>
        <th>创建时间</th>
        <th>修改时间</th>
        <th>操作</th>
    </tr>
    <?php if(is_array($datas) || $datas instanceof \think\Collection || $datas instanceof \think\Paginator): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
    <tr>
        <td><?php echo htmlentities($data['id']); ?></td>
        <td><?php echo htmlentities($data['titles']); ?></td>
        <td><?php echo htmlentities($data['class_name']); ?></td>
        <td><img src="<?php echo htmlentities($data['icon']); ?>" alt="" width="50px;"></td>
        <td><img src="<?php echo htmlentities($data['code_img']); ?>" alt="" width="50px;"></td>
        <td><?php echo htmlentities($data['intro']); ?></td>
        <td><?php echo htmlentities($data['create_time']); ?></td>
        <td><?php echo htmlentities($data['update_time']); ?></td>
        <td>
            <a href="javascript:;" class="layui-btn edit layui-btn-radius" id="<?php echo htmlentities($data['id']); ?>" data-icon="<?php echo htmlentities($data['icon']); ?>"
               data-code_img="<?php echo htmlentities($data['code_img']); ?>" data-name="<?php echo htmlentities($data['titles']); ?>" data-content="<?php echo htmlentities($data['intro']); ?>"
               data-case_class_id="<?php echo htmlentities($data['case_class_id']); ?>"><i
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
                <input type="text" name="titles" required lay-verify="required" id="titles" placeholder="请输入名称"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">类型</label>
            <div class="layui-input-inline">
                <select name="case_class_id" id="case_class_id" lay-verify="required">
                    <option value="0">请选择类型</option>
                    <?php if(is_array($fens) || $fens instanceof \think\Collection || $fens instanceof \think\Paginator): $i = 0; $__LIST__ = $fens;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fen): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo htmlentities($fen['id']); ?>"><?php echo htmlentities($fen['name']); ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">Log</label>
            <button type="button" class="layui-btn" id="test2">
                <i class="layui-icon">&#xe67c;</i>上传图标
            </button>
            <input type="hidden" id="icon" name="icon">
            <div class="layui-upload-list" style="margin-left: 120px;margin-top: 50px;margin-bottom: 40px;">
                <img class="layui-upload-img" style="width: 100px;" id="demo2">
                <p id="demoText2"></p>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">二维码</label>
            <button type="button" class="layui-btn" id="test1">
                <i class="layui-icon">&#xe67c;</i>上传二维码图片
            </button>
            <input type="hidden" id="code_img" name="code_img">
            <div class="layui-upload-list" style="margin-left: 120px;margin-top: 50px;margin-bottom: 40px;">
                <img class="layui-upload-img" style="width: 100px;" id="demo1">
                <p id="demoText"></p>
            </div>
        </div>
        <input type="hidden" id="case_id" name="case_id">
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">简介</label>
            <div class="layui-input-block">
                <textarea name="intro" id="intro" placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit="" lay-filter="adddd">立即提交</button>
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
        $("#titles").val(null);
        $("#intro").val(null);
        layer.open({
            type: 1,
            shade: false,
            maxmin: true,
            title: "案例的添加", //标题
            content: $('#doc'), //捕获的元素，注意：最好该指定的元素要存放在body最外层，否则可能被其它的相对元素所影响
            area: ['35%', '80%'],
            cancel: function () {
                $('#doc').css('display', 'none');
            }
        });
    });

    layui.use(['form', 'upload'], function () {
        var upload = layui.upload;
        var form = layui.form;
        FORM = form
        //执行实例
        var uploadInst = upload.render({
            elem: '#test1' //绑定元素
            , url: '<?php echo url("Upload/upload"); ?>' //上传接口
            , before: function (obj) {
                //预读本地文件示例，不支持ie8
                obj.preview(function (index, file, result) {
                    $('#demo1').attr('src', result); //图片链接（base64）
                });
            }
            , done: function (res) {
                //如果上传失败
                if (res.status > 0) {
                    return layer.msg('上传失败');
                } else {
                    layer.msg('上传成功', {icon: 6, time: 1500});
                    $("input[name='code_img']").val(res.msg);
                }
                //上传成功
            }
            , error: function () {
                //演示失败状态，并实现重传
                var demoText = $('#demoText');
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function () {
                    uploadInst.upload();
                });
            }
        });
        var uploadInst = upload.render({
            elem: '#test2' //绑定元素
            , url: '<?php echo url("Upload/upload"); ?>' //上传接口
            , before: function (obj) {
                //预读本地文件示例，不支持ie8
                obj.preview(function (index, file, result) {
                    $('#demo2').attr('src', result); //图片链接（base64）
                });
            }
            , done: function (res) {
                //如果上传失败
                if (res.status > 0) {
                    return layer.msg('上传失败');
                } else {
                    layer.msg('上传成功', {icon: 6, time: 1500});
                    $("input[name='icon']").val(res.msg);
                }
                //上传成功
            }
            , error: function () {
                //演示失败状态，并实现重传
                var demoText = $('#demoText2');
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function () {
                    uploadInst.upload();
                });
            }
        });

        form.on('submit(adddd)', function (data) {
            $("#titles").val(null)
            var id = $('#case_id').val();
            $.post('<?php echo url("caseListAdd"); ?>', {
                    data: data.field,
                    id: id,
                }, function (e) {
                    if (e == 200) {
                        layer.msg('操作成功');
                        location.reload();
                    } else {
                        layer.msg('操作失败');
                    }
                }
            )
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        })
    });

    //回显
    $(".edit").click(function () {
        var id = $(this).attr('id');
        $("#case_id").val(id);
        var title = $(this).attr('data-name');
        var icon = $(this).attr('data-icon');
        $("#icon").val(icon);
        var code_img = $(this).attr('data-code_img');
        $('#code_img').val(code_img);
        var intro = $(this).attr('data-content');
        var case_class_id = $(this).attr('data-case_class_id');
        $("#titles").val(title);
        $("#intro").val(intro);
        $("#demo2").attr("src", icon);
        $("#demo1").attr("src", code_img);
        $.post('<?php echo url("caseListShow"); ?>', {}, function (e) {
            console.log(e);
            var list = e;
            var len = e.length;
            var str = '';
            str += '<option value="0">请选择分类</option>';
            for (var i = 0; i < len; i++) {
                str += '<option value="' + list[i].id + '">' + list[i].name + '</option>';
            }
            $("#case_class_id").html(str);
            $("#case_class_id").val(case_class_id);
            FORM.render();
        });
        layer.open({
            type: 1,
            shade: false,
            maxmin: true,
            title: "案例的编辑", //标题
            content: $('#doc'), //捕获的元素，注意：最好该指定的元素要存放在body最外层，否则可能被其它的相对元素所影响
            area: ['35%', '80%'],
            cancel: function () {
                $('#doc').css('display', 'none');
            }
        });
    });

    // 删除事件
    $(".delete").click(function () {
        var id = $(this).attr('id');
        layer.confirm('确定要删除！', {btn: ['确认', '取消']}, function () {
            $.post('<?php echo url("caseListDel"); ?>', {id: id}, function (data) {
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