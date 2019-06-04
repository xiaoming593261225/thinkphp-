<?php /*a:1:{s:33:"../Template/run/admin\modify.html";i:1528798690;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/static/run/static/font-awesome-4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/static/run/static/layui/css/layui.css"/>
    <style type="text/css">
        body .layui-tree-skin-treeskin .layui-tree-branch {
            color: #35495e;
        }
    </style>
</head>
<body>
<form class="layui-form" action="" style="margin-right: 40px;margin-top: 20px;">
    <div class="layui-form-item">
        <label class="layui-form-label">所属权限</label>
        <div class="layui-input-block">
            <select name="group_id" lay-filter="aihao">
                <option value="">请选择用户所拥有的权限</option>
                <?php if(is_array($AuthGroup) || $AuthGroup instanceof \think\Collection || $AuthGroup instanceof \think\Paginator): $i = 0; $__LIST__ = $AuthGroup;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo htmlentities($vo['id']); ?>" <?php if(($admin['group_id'] == $vo['id'])): ?> selected <?php endif; ?>><?php echo htmlentities($vo['title']); ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <input type="hidden" value="<?php echo htmlentities($admin['id']); ?>" name="id">
    <div class="layui-form-item">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-block">
            <input type="text" name="name" value="<?php echo htmlentities($admin['name']); ?>" lay-verify="title" autocomplete="off" placeholder="请输入用户名"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-block">
            <input type="password" name="password" lay-verify="title" autocomplete="off" placeholder="请设置用户密码"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn layui-btn-radius" lay-submit="" lay-filter="subBtn"
                    style="width: 100%;background-color: #35495e">立即提交
            </button>
        </div>
    </div>
</form>


<script type="text/javascript" src="/static/run/static/layui/layui.js"></script>
<script type="text/javascript">
    layui.use(['form', 'jquery'], function () {
        var $ = layui.jquery,
            tree = layui.tree,
            form = layui.form;
        //监听提交
        form.on('submit(subBtn)', function (data) {
            $.ajax({
                type: "post",
                async: true,
                url: "<?php echo url('Admin/modify'); ?>",
                data: data.field,
                dataType: "json",
                success: function (res) {
                    if (res && res['status'] == 200) {
                        layer.msg(res.msg, {icon: 1},function () {
                            //刷新列表
                            window.parent.table.reload('lists', {
                                page: {
                                    curr: window.parent.page //重新从第 1 页开始
                                }
                            });
                            var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
                            parent.layer.close(index); //再执行关闭
                        });
                    } else {
                        layer.msg(res.msg, {icon: 2});
                    }
                }
            });
            return false;
        });
    });
</script>
</body>
</html>