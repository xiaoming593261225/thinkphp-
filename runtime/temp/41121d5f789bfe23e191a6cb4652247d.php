<?php /*a:1:{s:36:"../Template/run/consulting\list.html";i:1553226946;}*/ ?>
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
    <form class="layui-form" action="<?php echo url('Consulting/index'); ?>" method="post">
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">名称</label>
                <div class="layui-input-block">
                    <input type="text" name="name" placeholder="请输入名称或类型" id="name" autocomplete="off"
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

    </div>
    <table class="layui-table">
        <tr>
            <th>ID</th>
            <th>问题名称</th>
            <th>问题类型</th>
            <th>解答</th>
            <th>状态</th>
            <th>创建时间</th>
            <th>修改时间</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($datas) || $datas instanceof \think\Collection || $datas instanceof \think\Paginator): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo htmlentities($data['id']); ?></td>
            <td style="width: 10%"><?php echo htmlentities($data['name']); ?></td>
            <td><?php echo htmlentities($data['className']); ?></td>
            <td style="width: 35%"><?php echo htmlentities($data['content']); ?></td>
            <td>
                <?php if($data['status'] != '20'): ?>已解答
                <?php else: ?> 未回答
                <?php endif; ?>
            </td>
            <td><?php echo htmlentities($data['create_time']); ?></td>
            <td><?php echo htmlentities($data['update_time']); ?></td>
            <td>
                <a href="javascript:;" class="layui-btn edit layui-btn-radius" id="<?php echo htmlentities($data['id']); ?>"><i
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
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">问题</label>
            <div class="layui-input-block">
                <textarea name="explain" id="explain" placeholder="请输入内容" class="layui-textarea" readonly></textarea>
            </div>
        </div>
        <input type="hidden" id="explain_id" name="explain_id">
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">解答</label>
            <div class="layui-input-block">
                <textarea name="answer" id="answer" placeholder="请输入解答的内容" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button onclick="explainEdit()" class="layui-btn" lay-submit="" lay-filter="adddd">立即提交</button>
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
    $(".edit").click(function () {
        var id = $(this).attr('id');
        $('#explain_id').val(id);
        $.post('<?php echo url("Consulting/ConsultingShow"); ?>', {id: id}, function (data) {
            $('#explain').val(data.name);
            $('#answer').val(data.content);
        });
        layer.open({
            type: 1,
            shade: false,
            maxmin: true,
            title: "问答的回答、编辑", //标题
            content: $('#doc'), //捕获的元素，注意：最好该指定的元素要存放在body最外层，否则可能被其它的相对元素所影响
            area: ['35%', '80%'],
            cancel: function () {
                $('#doc').css('display', 'none');
            }
        });
    });

    function explainEdit() {
        var id = $("#explain_id").val()
        var answer = $("#answer").val();
        $.post('<?php echo url("Consulting/explainEdit"); ?>', {explain_id: id, content: answer}, function (data) {
            if (data == 200) {
                layer.msg("操作成功");
                location.reload();
            } else {
                layer.msg("操作失败");
            }
        });
    }

    $('.delete').click(function () {
        var id = $(this).attr('id');
        layer.confirm('确定要删除！', {btn: ['确认', '取消']}, function () {
            alert(id);return false;
            $.post('<?php echo url("explainDel"); ?>', {id: id}, function (data) {
                if (data == 200) {
                    layer.msg('操作成功');
                    location.reload();
                } else {
                    layer.msg('操作失败');
                }
            });
        });
    });
</script>