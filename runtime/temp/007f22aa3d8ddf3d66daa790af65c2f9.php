<?php /*a:1:{s:34:"../Template/run/recruit\index.html";i:1553155554;}*/ ?>
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
    <form class="layui-form" action="<?php echo url('Recruit/index'); ?>" method="post">
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">名称</label>
                <div class="layui-input-block">
                    <input type="text" name="title" placeholder="请输入名称" id="title" autocomplete="off"
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
        <th>名称</th>
        <th>关键字</th>
        <th>描述</th>
        <th>浏览量</th>
        <th>邮箱</th>
        <th>价位</th>
        <th>地址</th>
        <th>创建时间</th>
        <th>修改时间</th>
        <th>操作</th>
    </tr>
    <?php if(is_array($datas) || $datas instanceof \think\Collection || $datas instanceof \think\Paginator): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
    <tr>
        <td><?php echo htmlentities($data['id']); ?></td>
        <td><?php echo htmlentities($data['name']); ?></td>
        <td><?php echo htmlentities($data['keyword']); ?></td>
        <td style="width: 12%"><?php echo htmlentities($data['description']); ?></td>
        <td><?php echo htmlentities($data['views']); ?></td>
        <td><?php echo htmlentities($data['email']); ?></td>
        <td><?php echo htmlentities($data['min_price']); ?> ~ <?php echo htmlentities($data['max_price']); ?></td>
        <td style="width: 12%"><?php echo htmlentities($data['address']); ?></td>
        <td><?php echo htmlentities($data['create_time']); ?></td>
        <td><?php echo htmlentities($data['update_time']); ?></td>
        <td>
            <a href="javascript:;" class="layui-btn recruitEdit layui-btn-radius" recruit_id="<?php echo htmlentities($data['id']); ?>"><i
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
    <form class="layui-form" method="post" enctype="multipart/form-data" style="margin: 5%">
        <div class="layui-form-item">
            <label class="layui-form-label">名称</label>
            <div class="layui-input-block">
                <input type="text" name="name" required lay-verify="required" id="name" placeholder="请输入名称"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">关键字</label>
            <div class="layui-input-inline">
                <input type="text" name="keyword" id="keyword" required lay-verify="required" placeholder="请输入关键字"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">最低价位</label>
            <div class="layui-input-inline">
                <input type="text" name="min_price" id="min_price" required lay-verify="required" placeholder="请输入最低价位"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">最高价位</label>
            <div class="layui-input-inline">
                <input type="text" name="max_price" id="max_price" required lay-verify="required" placeholder="请输入最高价位"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">邮箱</label>
            <div class="layui-input-inline">
                <input type="email" name="email" id="email" required lay-verify="required" placeholder="请输入邮箱"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <input type="hidden" id="recruitId" value="">
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">描述</label>
            <div class="layui-input-block">
                <textarea name="description" id="description" placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">详情</label>
            <div class="layui-input-block">
                <textarea name="minute" id="minute" placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">地址</label>
            <div class="layui-input-block">
                <input type="text" name="address" required lay-verify="required" id="address" placeholder="请输入地址"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button onclick="recruitAdd()" class="layui-btn" lay-submit="" lay-filter="adddd">立即提交</button>
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
        $("#keyword").val(null);
        $("#description").val(null);
        $("#minute").val(null);
        $("#min_price").val(null);
        $("#max_price").val(null);
        $("#email").val(null);
        $("#address").val(null);
        layer.open({
            type: 1,
            shade: false,
            title: "招聘的添加", //标题
            content: $('#doc'), //捕获的元素，注意：最好该指定的元素要存放在body最外层，否则可能被其它的相对元素所影响
            area: ['50%', '60%'],
            cancel: function () {
                $('#doc').css('display', 'none');
            }
        });
    });

    // 招聘的添加
    function recruitAdd() {
        var id = $("#recruitId").val();
        var name = $("#name").val();
        var keyword = $("#keyword").val();
        var description = $("#description").val();
        var minute = $("#minute").val();
        var min_price = $("#min_price").val();
        var max_price = $("#max_price").val();
        var email = $("#email").val();
        var address = $("#address").val();
        $.post('<?php echo url("recruitAdd"); ?>', {
                id: id,
                name: name,
                keyword: keyword,
                description: description,
                minute: minute,
                min_price: min_price,
                max_price: max_price,
                email: email,
                address: address,
            }, function (data) {
                if (data == 200) {
                    layer.msg('操作成功');
                    location.reload();
                } else {
                    layer.msg('操作失败');
                }
            }
        )
    }

    // 编辑的回显
    $(".recruitEdit").click(function () {
        var id = $(this).attr('recruit_id');
        $('#recruitId').val(id);
        $.post('<?php echo url("recruitShow"); ?>', {id: id}, function (data) {
            $('#name').val(data.name);
            $("#keyword").val(data.keyword);
            $("#description").val(data.description);
            $("#minute").val(data.minute);
            $("#min_price").val(data.min_price);
            $("#max_price").val(data.max_price);
            $("#email").val(data.email);
            $("#address").val(data.address);
            layer.open({
                type: 1,
                shade: false,
                title: "招聘的编辑", //标题
                content: $('#doc'), //捕获的元素，注意：最好该指定的元素要存放在body最外层，否则可能被其它的相对元素所影响
                area: ['50%', '60%'],
                cancel: function () {
                    $('#doc').css('display', 'none');
                }
            });
        })
    });

    /**
     * 删除事件
     */
    $('.delete').click(function () {
        var id = $(this).attr('id');
        layer.confirm('确定要删除！', {btn: ['确认', '取消']}, function () {
            $.post('<?php echo url("recruitDelete"); ?>', {id: id}, function (e) {
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