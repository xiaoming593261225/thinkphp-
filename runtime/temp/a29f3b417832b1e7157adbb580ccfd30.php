<?php /*a:2:{s:33:"../Template/run/member\lists.html";i:1528798689;s:32:"../Template/run/common\base.html";i:1552875864;}*/ ?>
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
                
<div class="search-block">
    <form class="layui-form" action="">
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">菜单类型</label>
                <div class="layui-input-block">
                    <select name="ismenu" id="ismenu" lay-filter="status">
                        <option value="">请选择菜单类型</option>
                        <option value="1">菜单</option>
                        <option value="2">非菜单</option>
                    </select>
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">菜单名称</label>
                <div class="layui-input-block">
                    <input type="text" name="title" placeholder="请输入菜单名称" id="title" autocomplete="off"
                           class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">权限名称</label>
                <div class="layui-input-block">
                    <input type="text" name="name" placeholder="请输入权限名称" id="name" autocomplete="off"
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
        <div class="layui-btn-group demoTable" style="float: left;">
            <button class="layui-btn layui-btn-sm" id="export_excel">导出数据</button>
            <button class="layui-btn layui-btn-sm" id="created">添加会员</button>
            <button class="layui-btn layui-btn-sm">批量删除</button>
            <button class="layui-btn layui-btn-sm" id="print_page">打印本页</button>
        </div>
        <span class="layui-clear"></span>
        <table class="layui-hide" id="table_list" lay-filter="lists"></table>
        <!--<div class="layui-btn-group demoTable" style="float: right;">-->
        <!--<button class="layui-btn layui-btn-sm" data-type="getCheckData">删除全选</button>-->
        <!--<button class="layui-btn layui-btn-sm" data-type="getCheckLength">数据反选</button>-->
        <!--<button class="layui-btn layui-btn-sm" data-type="getCheckLength">导出数据</button>-->
        <!--&lt;!&ndash;<button class="layui-btn" data-type="isAll">验证是否全选</button>&ndash;&gt;-->
        <!--</div>-->
        <!--<span class="layui-clear"></span>-->
    </div>
</div>
<script type="text/html" id="tool">
    <a class="layui-btn layui-btn-primary layui-btn-xs layui-btn-radius" lay-event="detail">查看</a>
    <a class="layui-btn layui-btn-xs layui-btn-primary layui-btn-radius" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-xs layui-btn-primary layui-btn-radius" lay-event="create-children">添加子菜单</a>
    <a class="layui-btn layui-btn-primary layui-btn-xs layui-btn-radius" lay-event="del">删除</a>
</script>

<script type="text/html" id="ismenu-tpl">
    <input type="checkbox" name="ismenu" data-id="{{d.id}}" value="{{d.ismenu}}" lay-skin="switch" lay-text="是|否"
           lay-filter="ismenu" {{ d.ismenu== 1 ? 'checked' : '' }}>
</script>
<script type="text/html" id="icon">
    <div style="text-align: center">
        <i class="fa {{d.icon}}" style="font-size: 20px;"></i>
    </div>
</script>

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