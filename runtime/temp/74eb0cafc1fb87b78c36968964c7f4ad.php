<?php /*a:1:{s:33:"../Template/run/menus\modify.html";i:1528798689;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>编辑菜单</title>
    <link rel="stylesheet" href="/static/run/static/font-awesome-4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/static/run/static/layui/css/layui.css"/>
    <style type="text/css">
        #form_box {
            padding-right: 30px;
            margin-top: 20px;
            position: relative;
        }

        #icons {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: auto;
            top: 0px;
            bottom: 0px;
            left: 0px;
            background-color: rgba(255, 255, 255, 1);
            z-index: 1;
            display: none;
            transition: all .5s;
        }

        #icons ul li {
            width: 26px;
            height: 26px;
            line-height: 24px;
            text-align: center;
            border: 1px solid #f2f2f2;
            cursor: pointer;
            margin-left: 10px;
            margin-bottom: 5px;
        }

        .close-icon {
            color: red;
            width: 24px;
            height: 24px;
            z-index: 9999;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div id="form_box">
    <form class="layui-form" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">菜单名称</label>
            <div class="layui-input-block">
                <input type="text" name="title" placeholder="请输入菜单名称" autocomplete="off" class="layui-input" value="<?php echo htmlentities($result['title']); ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">Icon图标</label>
            <div class="layui-input-inline">
                <input type="text" id="icon" style="width: 55%;float: left" name="icon" value="<?php echo htmlentities($result['icon']); ?>" placeholder="请输入Icon图标"
                       autocomplete="off" class="layui-input">
                <button id="select-icons" class="layui-btn" style="width: 40%;float: right;"><i
                        class="fa fa-hand-rock-o" aria-hidden="true"></i> 选择图标
                </button>
            </div>
        </div>
        <div id="icons">
            <span class="close-icon layui-icon layui-icon-close"
                  style="float: right;margin: 5px;position: fixed;top: -2px;right: 20px;"></span>
            <ul style="clear: both">
                <?php foreach($icons as $key=>$val): ?>
                <li class="fa <?php echo htmlentities($val); ?>" aria-hidden="true" data-icon="<?php echo htmlentities($val); ?>"></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">控制器名</label>
            <div class="layui-input-inline">
                <input type="text" value="<?php echo htmlentities($result['controller']); ?>" name="controller" placeholder="请输入控制器名" autocomplete="off" class="layui-input">
            </div>
        </div>
        <input type="hidden" value="<?php echo htmlentities($result['id']); ?>" name="id">
        <input type="hidden" value="true" name="form">
        <div class="layui-form-item">
            <label class="layui-form-label">方法名</label>
            <div class="layui-input-inline">
                <input type="text" name="action" value="<?php echo htmlentities($result['action']); ?>" placeholder="请输入方法名" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">是否菜单</label>
            <div class="layui-input-block">
                <input type="radio" name="ismenu" value="1" title="是" <?php if(($result['ismenu'] == 1)): ?> checked <?php else: endif; ?> />
                <input type="radio" name="ismenu" value="2" title="否" <?php if(($result['ismenu'] == 2)): ?> checked <?php else: endif; ?> />
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="subBtn">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="/static/run/static/layui/layui.js"></script>
<script type="text/javascript">
    //Demo
    layui.use(['form', 'jquery'], function () {
        var $ = layui.jquery,
            form = layui.form;
        $(function () {
            form.render("select");
        })
        //选择图标
        $("#select-icons").click(function () {
            $("#icons").toggle();
            return false;
        });
        //关闭图标选择
        $(".close-icon").click(function () {
            $("#icons").toggle();
        });
        //确定选择图标
        $("#icons ul li").click(function () {
            //获取icon input
            $("#icon").val($(this).attr("data-icon"));
            $("#icons").toggle();
        });
        //监听提交
        form.on('submit(subBtn)', function (data) {
            $.ajax({
                type: "post",
                async: true,
                url: "<?php echo url('Menus/modify'); ?>",
                data: data.field,
                dataType: "json",
                success: function (res) {
                    if (res && res['status'] == 200) {
                        layer.msg(res.msg, {icon: 1}, function () {
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