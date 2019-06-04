<?php /*a:1:{s:33:"../Template/run/system\lists.html";i:1528798690;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>系统设置</title>
    <link rel="stylesheet" href="/static/run/static/font-awesome-4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/static/run/static/layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="/static/run/static/style/common.css"/>
    <link rel="stylesheet" type="text/css" href="/static/run/static/style/system.css"/>
</head>
<body>
<div class="layui-tab-content" style="background-color: rgba(255,255,255,1);">
    <div class="layui-tab-item layui-show">
        <div id="system-form">
            <form class="layui-form">
                <div class="layui-form-item">
                    <label class="layui-form-label">网站名称</label>
                    <div class="layui-input-block">
                        <input name="site_name" placeholder="请输入" autocomplete="off" class="layui-input"
                               type="text" value="<?php echo htmlentities($develop['site_name']); ?>">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">LOGO地址</label>
                    <div class="layui-input-block">
                        <input name="site_logo" placeholder="请输入" autocomplete="off" class="layui-input"
                               type="text" value="<?php echo htmlentities($develop['site_logo']); ?>">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">关键词</label>
                    <div class="layui-input-block">
                        <input name="site_keywords" placeholder="请用','隔开" autocomplete="off"
                               class="layui-input" type="text" value="<?php echo htmlentities($develop['site_keywords']); ?>">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">描述</label>
                    <div class="layui-input-block">
                        <textarea placeholder="请输入内容" class="layui-textarea" name="site_desc"><?php echo htmlentities($develop['site_desc']); ?></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">ICP备案号</label>
                    <div class="layui-input-block">
                        <input name="site_icp" placeholder="请输入ICP备案号" autocomplete="off"
                               class="layui-input" type="text" value="<?php echo htmlentities($develop['site_icp']); ?>">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label" style="padding: 9px 0px;width: 100px;">前端模板路径</label>
                    <div class="layui-input-block">
                        <input name="view_path" placeholder="请输入" autocomplete="off" class="layui-input"
                               type="text" value="<?php echo htmlentities($develop['view_path']); ?>">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">版权信息</label>
                    <div class="layui-input-block">
                        <textarea placeholder="请输入版权信息" class="layui-textarea" name="site_copyright_desc"><?php echo htmlentities($develop['site_copyright_desc']); ?></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">统计代码</label>
                    <div class="layui-input-block">
                        <textarea placeholder="请输入完整的统计代码" class="layui-textarea" name="count_code"><?php echo htmlentities($develop['count_code']); ?></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit="" lay-filter="submit">立即提交</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="/static/run/static/layui/layui.js"></script>
<script type="text/javascript">
    layui.config({
        base: '/static/run/modules/'
    }).use(['layer', 'element', 'jquery', 'home'], function () {
        var layer = layui.layer,
            $ = layui.jquery,
            form = layui.form,
            home = layui.home,
            element = layui.element;
        //监听提交
        form.on('submit(submit)', function(data){
            $.ajax({
                type: "post",
                async: true,
                url: "<?php echo url('System/created'); ?>",
                data: data.field,
                dataType: "json",
                success: function (res) {
                    if (res && res['status'] == 200) {
                        layer.msg(res.msg, {icon: 1},function () {
                            window.location.reload();
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