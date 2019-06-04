<?php /*a:2:{s:32:"../Template/run/index\index.html";i:1528798690;s:32:"../Template/run/common\base.html";i:1552875866;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?php echo htmlentities($dev['site_name']); ?></title>
    <link rel="stylesheet" href="/static/run/static/font-awesome-4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/static/run/static/layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="/static/run/static/style/common.css"/>
    
</head>

<body>
<div id="app">
    <!--
        作者：416716328@qq.com
        时间：2018-05-07
        描述：头部导航
    -->
    <header id="header">
        <div class="logo">
            <a href="">
            </a>
        </div>
        <ul class="layui-nav top-nav-left">
            <li class="layui-nav-item" id="shrink-nav">
                <a href="javascript:;" title="侧边伸缩">
                    <i class="layui-icon layui-icon-shrink-right"></i>
                </a>
            </li>
            <li class="layui-nav-item layui-hide-xs">
                <a href="javascript:void(0);" target="_blank" title="前台">
                    <i class="layui-icon layui-icon-website"></i>
                </a>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;" title="刷新">
                    <i class="layui-icon layui-icon-refresh-3"></i>
                </a>
            </li>
            <span class="layui-nav-bar" style="width: 0px; left: 0px; opacity: 0;"></span>
        </ul>

        <ul class="layui-nav top-nav-right">
            <li class="layui-nav-item" lay-unselect="" style="">
                <a lay-href="app/message/index.html" lay-text="消息中心">
                    <i class="layui-icon layui-icon-notice"></i>
                    <!-- 如果有新消息，则显示小圆点 -->
                    <span class="layui-badge-dot"></span>
                </a>
            </li>
            <li class="layui-nav-item layui-hide-xs">
                <a href="javascript:;" id="theme">
                    <i class="layui-icon layui-icon-theme"></i>
                </a>
            </li>
            <li class="layui-nav-item layui-hide-xs">
                <a href="javascript:;" id="lock">
                    <i class="fa fa-lock fa-3x" aria-hidden="true" style="color: green;"></i>
                </a>
            </li>
            <li class="layui-nav-item layui-hide-xs" style="">
                <a href="<?php echo url('Login/out_login'); ?>" layadmin-event="about"><i class="fa fa-sign-out"
                                                                              aria-hidden="true"></i></a>
            </li>
            <span class="layui-nav-bar" style="left: 0px; top: 48px; width: 0px; opacity: 0;"></span>
        </ul>
        <span></span>
    </header>
    <!--
        作者：416716328@qq.com
        时间：2018-05-07
        描述：内容区域
    -->
    <section id="container">
        <!--
            作者：416716328@qq.com
            时间：2018-05-07
            描述：左侧菜单
        -->
        <nav id="left-nav">

            <a href="<?php echo url('Member/a'); ?>"></a>

            <div id="user-head">
                <a>
                    <img src="/static/run/static/images/lock-bg.jpg"/>
                </a>
                <p>Welcome <?php echo htmlentities($user['name']); ?></p>
            </div>
            <ul class="layui-nav layui-nav-tree">
                <?php echo widget('common/menus'); ?>
            </ul>
        </nav>
        <div id="content" style="height: 100%;">
            <div class="body" style="height: 100%;">
                
                <div id="tab-list">
                    <div class="layui-tab layui-tab-brief" id="tab-box" lay-allowClose="true" lay-filter="tabs">
                        <ul class="layui-tab-title" id="main-tab">
                            <div class="layui-icon layui-icon-prev" id="leftPage"></div>
                            <div class="layui-icon layui-icon-next" id="rightPage"></div>
                            <li lay-id="1" class="layui-this">
                                <i class="layui-icon layui-icon-home"></i>
                                <i class="layui-icon layui-unselect layui-tab-close" style="display: none">ဆ</i>
                            </li>
                        </ul>
                        <div class="layui-tab-content">
                            <div class="layui-tab-item layui-show">
                                <iframe src="<?php echo url('run/common/main'); ?>" frameborder="0" class="content-iframe"></iframe>
                            </div>
                        </div>
                    </div>
                    <div style="height: 50px;"></div>
                </div>
                
            </div>
            <!--
                作者：416716328@qq.com
                时间：2018-05-07
                描述：底部版权部分
            -->
            <footer id="footer" style="z-index: 999">
                <p>CopyRight © <?php echo htmlentities($dev['site_name']); ?> 版权所有 2018 - 2019</p>
            </footer>
        </div>
    </section>
</div>
<!--锁屏样式-->
<div class="lock-screen">
    <canvas id="Snow" width="100%" height="100%"></canvas>
    <div class="get-lock-block">
        <div class="lock-head">
            <img src="/static/run/static/images/head.jpg" width="120" height="120"/>
        </div>
        <div class="input-div">
            <input type="password" class="layui-input" placeholder="请输入解锁密码"/>
        </div>
        <div class="lock-btn">
            <button class="layui-btn layui-btn-normal" id="get-lock">立即解锁</button>
        </div>
        <p style="font-size: 12px;text-align: center;margin-top: 10px;">CopyRight © <?php echo htmlentities($dev['site_name']); ?> 版权所有</p>
    </div>
</div>
<script type="text/javascript" src="/static/run/static/layui/layui.js"></script>
<script type="text/javascript" src="/static/run/static/js/xue.js"></script>
<script type="application/javascript">
    layui.config({
        base: '/static/run/modules/'
    }).use(['element', 'home', 'jquery', 'tabs'], function () {
        var element = layui.element,
            $ = layui.jquery,
            tabs = layui.tabs,
            home = layui.home;
        tabs.openTabs();
        home.top_nav();
        home.shrink();
        home.shrink_nav();
        home.skin("<?php echo url('Common/skin'); ?>");
        home.lock("<?php echo htmlentities($user['password']); ?>", "<?php echo url('Common/get_lock'); ?>");
        element.on('tabDelete(tabs)', function (data) {
            var index = $("." + $(this).parent("li").attr("lay-id")).parent(".layui-tab-item").index();
            $("." + $(this).parent("li").attr("lay-id")).parent(".layui-tab-item").siblings(".layui-tab-item").eq(index - 1).addClass("layui-show");
            $("." + $(this).parent("li").attr("lay-id")).parent(".layui-tab-item").remove();
        });
    });
</script>
</body>

</html>