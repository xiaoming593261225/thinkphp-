<?php /*a:1:{s:32:"../Template/run/login\index.html";i:1528798690;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="/static/run/static/layui/css/layui.css" />
    <link rel="stylesheet" href="/static/run/static/style/login.css" />
    <style>
        html {
             height: 100%;
             background-image: -webkit-radial-gradient(ellipse farthest-corner at center top, #00CED1 0%, 	#008080 100%);
             background-image: radial-gradient(ellipse farthest-corner at center top, #00CED1 0%, #008080 100%);
             cursor: move;
         }
    </style>
</head>

<body>
<div class="login-box">
    <div class="logo">
        <img src="<?php echo htmlentities($dev['logo']); ?>" width="120" height="120" />
    </div>
    <form class="layui-form" id="form-block">
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">账号</label>
                <div class="layui-input-inline">
                    <input type="text" name="name" autocomplete="on" class="layui-input" placeholder="请输入账号">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">密码</label>
                <div class="layui-input-inline">
                    <input type="password" name="password" autocomplete="on" class="layui-input" placeholder="请输入密码">
                </div>
            </div>
            <input type="hidden" name="__token__" value="<?php echo htmlentities(app('request')->token()); ?>" />
            <div class="layui-inline">
                <label class="layui-form-label">验证码</label>
                <div class="layui-input-inline">
                    <div style="width: 55%;float: left;">
                        <input type="text" name="captcha" autocomplete="on" class="layui-input" placeholder="请输入验证码">
                    </div>
                    <div style="width: 44%;float: right;">
                        <img id="captcha" src="<?php echo url('Login/captcha'); ?>" onclick="this.src = this.src+'?rand='+Math.random()" width="100%" height="38" />
                    </div>
                </div>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">记住密码?</label>
            <div class="layui-input-block">
                <input type="radio" name="ispassword" value="1" title="记住" checked>
                <input type="radio" name="ispassword" value="0" title="不记住">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn layui-btn-radius" lay-submit lay-filter="login_admin" style="width: 70%;">立即登录</button>
            </div>
        </div>
    </form>
</div>
</div>
<p style="position: absolute;bottom: 30px;left: 45%;color: #fff;">©版权所有 后台管理系统 2018-2019</p>
<script type="text/javascript" src="/static/run/static/layui/layui.js"></script>
<script type="text/javascript">
    layui.use(['layer', 'element', 'table', 'jquery'], function() {
        var form = layui.form,
            $ = layui.jquery,
            layer = layui.layer;
        //监听提交
        form.on('submit(login_admin)', function(data) {
            $.ajax({
                type: "post",
                url: "<?php echo url('Login/do_login'); ?>",
                data: data.field,
                dataType: "json",
                success: function(data){
                    if (data['status'] == 200 && data){
                        layer.msg(data.msg,{icon:1},function () {
                            window.location.href = data['data'];
                        });
                    }else{
                        $("#captcha").click();
                        layer.msg(data.msg,{icon:2});
                    }
                },
                error :function (xhr) {

                }
            });
            return false;
        });
    });
</script>
</body>

</html>