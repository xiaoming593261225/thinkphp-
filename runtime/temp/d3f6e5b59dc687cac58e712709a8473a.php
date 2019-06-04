<?php /*a:1:{s:40:"../Template/theme/recruit\recruit_1.html";i:1553153768;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>微星球</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/static/home/font-awesome-4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="/static/home/css/style.css">
    <script type="text/javascript" src="/static/home/js/jquery-v1.10.2.min.js"></script>
    <script type="text/javascript" src="/static/home/js/script.js"></script>
</head>
<body>
<!-- 导航 -->
<div class="nav">
    <div class="nav-background">
        <div class="nav-content">
            <div class="nav-logo">
                <img src="/static/home/img/nav_logo.png">
            </div>
            <div class="nav-vip">
                <a href="#">会员登录</a>
                <a href="#" class="nav_vip_1">会员注册</a>
            </div>
            <ul class="nav-menu">
                <li class="nav-active"><a href="<?php echo url('Index/index'); ?>">网站首页</a></li>
                <li><a href="<?php echo url('News/news'); ?>">新闻动态</a></li>
                <li><a href="<?php echo url('Functions/index'); ?>">功能展示</a></li>
                <li><a href="<?php echo url('Cases/index'); ?>">客户案例</a></li>
                <li><a href="<?php echo url('Problem/index'); ?>">产品问答</a></li>
                <li class="nav-active"><a href="<?php echo url('Recruit/index'); ?>">诚聘英才</a></li>
                <li><a href="#">会员套餐</a></li>
                <div class="clear"></div>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
</div>

<!-- 头部banner -->
<div class="nbanner">
    <div class="nbanner_1">
        <img src="/static/home/img/zpbanner.jpg">
    </div>
</div>
<div class="nnews_1_1">
    <div class="nrow_1">
        <div class="nrow_1_1"><span>招贤纳士</span>/<i>Recruitment</i></div>
    </div>
</div>
<!-- 内容 -->
<div class="nrow">
    <div class="recruit1_1">
        <?php if(is_array($details) || $details instanceof \think\Collection || $details instanceof \think\Paginator): $i = 0; $__LIST__ = $details;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$detail): $mod = ($i % 2 );++$i;?>
        <div class="recruit1_1_1">
            <div class="recruit1_1_1_1">
                <h4><?php echo htmlentities($detail['name']); ?></h4>
                <p>发布时间:<?php echo htmlentities(date('Y-m-d',!is_numeric($detail['create_time'])? strtotime($detail['create_time']) : $detail['create_time'])); ?></p>
                <p>地址：<?php echo htmlentities($detail['address']); ?></p>
            </div>
            <div class="recruit1_1_1_2">
                <span>薪资：<?php echo htmlentities($detail['min_price']); ?>~<?php echo htmlentities($detail['max_price']); ?>元/月</span>
            </div>
        </div>
        <div class="recruit1_1_2">
            <div class="recruit1_1_2_1">
                <h4>岗位职责</h4>
                <p><?php echo htmlentities($detail['description']); ?></p>
            </div>
            <div class="recruit1_1_2_1">
                <h4>岗位要求</h4>
                <p><?php echo htmlentities($detail['minute']); ?></p>
            </div>
            <div class="recruit1_1_2_1">
                <h4>联系我们</h4>
                <p>邮箱：<?php echo htmlentities($detail['email']); ?> </p>
                <p>地址：<?php echo htmlentities($detail['address']); ?> </p>
            </div>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>

<!-- 脚部 -->
<div class="foot">
    <div class="foot-background">
        <div class="foot-middle">
            <div class="foot-top">
                <div class="foot-logo">
                    <img src="/static/home/img/nav_logo.png" alt="">
                </div>
                <div class="foot-contact">
                    <div class="contact-detail">
                        <p class="contact-title">联系电话</p>
                        <p class="contact-content">+023 62897001/62891977</p>
                    </div>
                    <div class="contact-detail">
                        <p class="contact-title">公司地址</p>
                        <p class="contact-content">重庆南岸区南坪百盛浪高凯悦国际商务大厦B座24-C1</p>
                    </div>
                </div>
                <div class="foot-link">
                    <div class="link-detail">
                        <p>关于微星球</p>
                        <ul>
                            <li><a href="#">关于我们</a></li>
                            <li><a href="#">加入我们</a></li>
                            <li><a href="#">合作流程</a></li>
                        </ul>
                    </div>
                    <div class="link-detail">
                        <p>产品服务</p>
                        <ul>
                            <li><a href="#">功能展示</a></li>
                            <li><a href="#">客户案例</a></li>
                            <li><a href="#">产品问答</a></li>
                        </ul>
                    </div>
                    <div class="link-detail">
                        <p>友情链接</p>
                        <ul>
                            <li><a href="#">重庆网</a></li>
                            <li><a href="#">重庆百科</a></li>
                            <li><a href="#">圣灵科技</a></li>
                            <li><a href="#">重庆互联网</a></li>
                        </ul>
                    </div>
                    <div class="link-detail">
                        <p>联系我们</p>
                        <ul>
                            <li><a href="#" class="foot-button fb-1"> <img src="/static/home/img/foot_qq.png" alt="">
                                在线咨询</a></li>
                            <li><a href="#" class="foot-button fb-2"> <img src="/static/home/img/foot_sina.png" alt=""> 新浪微博</a>
                            </li>
                            <li><a href="#" class="foot-button fb-3"> <img src="/static/home/img/foot_wechat.png" alt="">
                                微信二维码</a></li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="foot-copy">
                <p>© weistar.net 微星球 版权所有：重庆圣灵科技信息有限公司 技术支持：重庆互联网渝ICP备17013859号-1</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
