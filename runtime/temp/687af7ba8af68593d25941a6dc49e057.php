<?php /*a:1:{s:34:"../Template/theme/index\index.html";i:1553138034;}*/ ?>
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
                <li><a href="<?php echo url('Recruit/index'); ?>">诚聘英才</a></li>
                <li><a href="#">会员套餐</a></li>
                <div class="clear"></div>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
</div>

<!-- 头部banner -->
<div class="head">
    <div class="banner-arrow">
        <span class="arrow-left" onclick="changeBanner(0)"></span>
        <span class="arrow-right" onclick="changeBanner(1)"></span>
    </div>

    <div class="banner-int" id="banner_1">
        <div class="banner-background">
            <div class="banner-content">
                <div class="banner-logo">
                    <img src="/static/home/img/banner_logo.png">
                </div>
                <div class="banner-middle">
                    <div class="banner-left">
                        <img src="/static/home/img/banner_computer.png">
                        <div class="banner-pl">
                            <p class="banner-p-1">大数据分销</p>
                            <p class="banner-p-2">零售业全渠道电商整体解决方案</p>
                        </div>
                    </div>
                    <div class="banner-left">
                        <img src="/static/home/img/banner_magnifier.png">
                        <div class="banner-pl">
                            <p class="banner-p-1">微信小程序</p>
                            <p class="banner-p-2">几分钟即可创建专业个性化小程序，便捷迅速，节省时间</p>
                        </div>
                    </div>
                    <div class="banner-left">
                        <img src="/static/home/img/banner_pen.png">
                        <div class="banner-pl">
                            <p class="banner-p-1">超级投票</p>
                            <p class="banner-p-2">全面设置，随心所欲</p>
                        </div>
                    </div>
                    <div class="banner-left">
                        <img src="/static/home/img/banner_message.png">
                        <div class="banner-pl">
                            <p class="banner-p-1">微商城</p>
                            <p class="banner-p-2">小程序+公众号一体化微信商城，助力企业快速进入移动社交电商新时代</p>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="banner-online">
                    <div class="online-line">
                        <p>在线咨询</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-int" id="banner_2">
        <div class="banner-background">
            <div class="banner-content">
                <div class="banner-middle">
                    <div class="banner-left">
                        <p class="banner-p1">大数据分销 SDP</p>
                        <p class="banner-p2">打通全网身份证数据，秒杀市场上其他分销系统</p>
                        <p class="banner-p3">三大分销系统，任君选择</p>
                        <div class="banner-online">
                            <div class="online-line">
                                <p>在线咨询</p>
                            </div>
                        </div>
                    </div>
                    <div class="banner-right">
                        <img src="/static/home/img/banner_computer_1.png">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-int" id="banner_3">
        <div class="banner-background">
            <div class="banner-content">
                <div class="banner-middle">
                    <div class="banner-left">
                        <p class="banner-p1">微商城 / Shop</p>
                        <p class="banner-p2">利用微信社交关系快速发展SDP分销商<br/>实现裂变式传播的销售模式</p>
                        <p class="banner-p3">可实现商品在线购买交易及订单管理</p>
                        <div class="banner-online">
                            <div class="online-line">
                                <p>在线咨询</p>
                            </div>
                        </div>
                    </div>
                    <div class="banner-right">
                        <img src="/static/home/img/banner_house.png">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-int" id="banner_4">
        <div class="banner-background">
            <div class="banner-content">
                <div class="banner-middle">
                    <div class="banner-left">
                        <p class="banner-p1">微酒店 / Hotel</p>
                        <p class="banner-p2">在线订房融入微信，酒店营销多一条有利途径</p>
                        <p class="banner-p3"></p>
                        <div class="banner-online">
                            <div class="online-line">
                                <p>在线咨询</p>
                            </div>
                        </div>
                    </div>
                    <div class="banner-right">
                        <img src="/static/home/img/banner_travel.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>

<!-- 内容 -->
<div class="content">
    <div class="confuse">
        <div class="confuse-title">
            <p>您是否正在为这些事情而困惑困扰？</p>
        </div>
        <div class="confuse-middle">
            <div class="confuse-left">
                <div class="confuse-question">
                    <p>想做微信公众号推广，不知道该<font>该怎么做？</font></p>
                </div>
                <div class="confuse-question">
                    <p>想抢占微信红利 却不知道<font>从何下手？</font></p>
                </div>
                <div class="confuse-question">
                    <p>公众号搭建需要<font>多少钱？</font></p>
                </div>
            </div>
            <div class="confuse-right">
                <div class="confuse-question">
                    <p>开发不完善，想<font>增加功能？</font></p>
                </div>
                <div class="confuse-question">
                    <p>想法需求很多，<font>怕无法满足？</font></p>
                </div>
                <div class="confuse-question">
                    <p>公众号类型那么多，究竟哪一种<font>适合我？</font></p>
                </div>
            </div>
            <div class="confuse-person">
                <img src="/static/home/img/confuse_person.png">
            </div>
        </div>
    </div>
    <div class="clear"></div>

    <div class="can">
        <div class="confuse-title">
            <p>接下来您是否想问，我能为您做什么？</p>
        </div>
        <div class="can-middle">
            <div class="can-answer">
                <div class="answer-ring">
                    <!-- <img src="/static/home/img/can_hook.png"> -->
                    <i class="fa fa-check-square-o"></i>
                </div>
                <p>公众号小程序注册认证</p>
            </div>
            <div class="can-answer">
                <div class="answer-ring">
                    <!-- <img src="/static/home/img/can_spanner.png"> -->
                    <i class="fa fa-wrench"></i>
                </div>
                <p>公众号小程序搭建开发</p>
            </div>
            <div class="can-answer">
                <div class="answer-ring">
                    <!-- <img src="/static/home/img/can_light.png"> -->
                    <i class="fa fa-lightbulb-o"></i>
                </div>
                <p>公众号小程序托管运营</p>
            </div>
            <div class="can-answer">
                <div class="answer-ring">
                    <!-- <img src="/static/home/img/can_forefinger.png"> -->
                    <i class="fa fa-share-square-o"></i>
                </div>
                <p>公众号文章个人朋友圈转发</p>
            </div>
            <div class="can-answer">
                <div class="answer-ring">
                    <!-- <img src="/static/home/img/can_flag.png"> -->
                    <i class="fa fa-flag"></i>
                </div>
                <p>公众号评选拉票</p>
            </div>
            <div class="can-answer">
                <div class="answer-ring">
                    <!-- <img src="/static/home/img/can_person.png"> -->
                    <i class="fa fa-user-plus"></i>
                </div>
                <p>公众号增粉增关注</p>
            </div>
            <div class="can-answer can-active">
                <div class="answer-ring">
                    <!-- <img src="/static/home/img/can_click.png"> -->
                    <i class="fa fa-hand-pointer-o"></i>
                </div>
                <p>公众号文章增阅读量</p>
            </div>
            <div class="can-answer">
                <div class="answer-ring">
                    <!-- <img src="/static/home/img/can_thumb.png"> -->
                    <i class="fa fa-thumbs-up"></i>
                </div>
                <p>公众号文章点赞评论</p>
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <div class="introduce">
        <div class="introduce-content">
            <div class="introduce-title">
                <img class="title" src="/static/home/img/introduce_title.png">
                <div class="introduce-read">
                    <a href="#">
                        <img src="/static/home/img/introduce_read.png">
                        <font>Read more</font>
                    </a>
                </div>
                <div class="clear"></div>
            </div>
            <div class="introduce-lunbo">
                <div class="lunbo-background" id="lunbo_1" onclick="clickLunbo(1)">
                    <img src="/static/home/img/introduce_money.png">
                    <div class="lunbo-words">
                        <p class="lunbo-title">O2O超级店</p>
                        <p class="lunbo-content">O2O超级店</p>
                        <p class="lunbo-content">线上线下完美结合</p>
                        <p class="lunbo-content">增强用户沉淀</p>
                    </div>
                </div>
                <div class="lunbo-background" id="lunbo_2" onclick="clickLunbo(2)">
                    <img src="/static/home/img/introduce_fork.png">
                    <div class="lunbo-words">
                        <p class="lunbo-title">微餐饮商圈版</p>
                        <p class="lunbo-content">智能排号，智能打单外卖</p>
                        <p class="lunbo-content">商圈化，多店化餐饮</p>
                        <p class="lunbo-content"></p>
                    </div>
                </div>
                <div class="lunbo-background" id="lunbo_3" onclick="clickLunbo(3)">
                    <img src="/static/home/img/introduce_group.png">
                    <div class="lunbo-words">
                        <p class="lunbo-title">微拼团</p>
                        <p class="lunbo-content">玩法新颖独特</p>
                        <p class="lunbo-content">分享给自己的小伙伴拼团</p>
                        <p class="lunbo-content"></p>
                    </div>
                </div>
                <div class="lunbo-background" id="lunbo_4" onclick="clickLunbo(4)">
                    <img src="/static/home/img/introduce_open.png">
                    <div class="lunbo-words">
                        <p class="lunbo-title">开放平台</p>
                        <p class="lunbo-content">开放 创新 共赢</p>
                        <p class="lunbo-content">助力移动营销生态圈</p>
                        <p class="lunbo-content"></p>
                    </div>
                </div>
                <div class="lunbo-background" id="lunbo_5" onclick="clickLunbo(5)">
                    <img src="/static/home/img/introduce_mike.png">
                    <div class="lunbo-words">
                        <p class="lunbo-title">微夜店KTV</p>
                        <p class="lunbo-content">遇上钟意的TA不敢搭讪</p>
                        <p class="lunbo-content">那就进入邻座的TA吧</p>
                        <p class="lunbo-content"></p>
                    </div>
                </div>
                <div class="lunbo-background" id="lunbo_6" onclick="clickLunbo(6)">
                    <img src="/static/home/img/introduce_mike.png">
                    <div class="lunbo-words">
                        <p class="lunbo-title">微夜店KTV</p>
                        <p class="lunbo-content">遇上钟意的TA不敢搭讪</p>
                        <p class="lunbo-content">那就进入邻座的TA吧</p>
                        <p class="lunbo-content"></p>
                    </div>
                </div>
                <div class="lunbo-background" id="lunbo_7" onclick="clickLunbo(7)">
                    <img src="/static/home/img/introduce_mike.png">
                    <div class="lunbo-words">
                        <p class="lunbo-title">微夜店KTV</p>
                        <p class="lunbo-content">遇上钟意的TA不敢搭讪</p>
                        <p class="lunbo-content">那就进入邻座的TA吧</p>
                        <p class="lunbo-content"></p>
                    </div>
                </div>
                <div class="lunbo-background" id="lunbo_8" onclick="clickLunbo(8)">
                    <img src="/static/home/img/introduce_mike.png">
                    <div class="lunbo-words">
                        <p class="lunbo-title">微夜店KTV</p>
                        <p class="lunbo-content">遇上钟意的TA不敢搭讪</p>
                        <p class="lunbo-content">那就进入邻座的TA吧</p>
                        <p class="lunbo-content"></p>
                    </div>
                </div>
                <div class="lunbo-background" id="lunbo_9" onclick="clickLunbo(9)">
                    <img src="/static/home/img/introduce_mike.png">
                    <div class="lunbo-words">
                        <p class="lunbo-title">微夜店KTV</p>
                        <p class="lunbo-content">遇上钟意的TA不敢搭讪</p>
                        <p class="lunbo-content">那就进入邻座的TA吧</p>
                        <p class="lunbo-content"></p>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="lunbo-page">
                <ul>
                    <li id="li_1" onclick="clickLunbo(1)">1</li>
                    <li id="li_2" onclick="clickLunbo(2)">2</li>
                    <li><a href="javascript: changeLunbo(0)"><img src="/static/home/img/introduce_left.png"></a></li>
                    <li id="li_3" onclick="clickLunbo(3)" class="page-active">3</li>
                    <li><a href="javascript: changeLunbo(1)"><img src="/static/home/img/introduce_right.png"></a></li>
                    <li id="li_4" onclick="clickLunbo(4)">4</li>
                    <li id="li_5" onclick="clickLunbo(5)">5</li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </div>

    <div class="about">
        <div class="about-title">
            <img src="/static/home/img/about_title.png">
        </div>
        <div class="about-middle">
            <img class="about-code" src="/static/home/img/about_code.png">
            <div class="about-right">
                <p class="right-title">微信营销解决方案，微信第三方开放平台！·让世界为您的产品点赞！</p>
                <p class="right-content">微星球是重庆互联网旗下一款微信第三方支持平台。</p>
                <p class="right-content">多种功能，注重用户体验，一体化设计，一站式服务！为企业打造微信智慧营销和微信营销策划解决方案！</p>
                <div class="right-more">
                    <div class="more-box">
                        <a href="#">
                            <img src="/static/home/img/about_arrow.png">
                            <p>查看更多</p>
                        </a>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

    <div class="cooperation">
        <div class="cooperation-middle">
            <div class="cooperation-title">
                <img src="/static/home/img/cooperation_title.png">
            </div>
            <div class="cooperation-content">
                <div class="cooperation-area">
                    <div class="co-ring-1">
                        <p>咨询</p>
                    </div>
                    <div class="co-ring-1">
                        <p>咨询</p>
                    </div>
                </div>
                <div class="cooperation-area">
                    <div class="co-ring-2"></div>
                </div>
                <div class="cooperation-area">
                    <div class="co-ring-3">
                        <p>签协议</p>
                    </div>
                </div>
                <div class="cooperation-area">
                    <div class="co-ring-4"></div>
                </div>
                <div class="cooperation-area">
                    <div class="co-ring-5">
                        <p>规划</p>
                    </div>
                </div>
                <div class="cooperation-area">
                    <div class="co-ring-4"></div>
                </div>
                <div class="cooperation-area">
                    <div class="co-ring-6">
                        <p>确定功能</p>
                    </div>
                </div>
                <div class="cooperation-area">
                    <div class="co-ring-4"></div>
                </div>
                <div class="cooperation-area">
                    <div class="co-ring-7">
                        <p>开发</p>
                    </div>
                </div>
                <div class="cooperation-area">
                    <div class="co-ring-4"></div>
                </div>
                <div class="cooperation-area">
                    <div class="co-ring-8">
                        <p>全款</p>
                    </div>
                    <div class="co-ring-8">
                        <p>分期</p>
                    </div>
                </div>
                <div class="cooperation-area">
                    <div class="co-ring-4"></div>
                </div>
                <div class="cooperation-area">
                    <div class="co-ring-9">
                        <p>完成</p>
                    </div>
                </div>
                <div class="cooperation-area">
                    <div class="co-ring-4"></div>
                </div>
                <div class="cooperation-area">
                    <div class="co-ring-10">
                        <p>点评</p>
                    </div>
                </div>
                <div class="cooperation-area">
                    <div class="co-ring-4"></div>
                </div>
                <div class="cooperation-area">
                    <div class="co-ring-11">
                        <p>售后服务</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

    <div class="join">
        <div class="join-middle">
            <div class="join-title">
                <img src="/static/home/img/join_title.png">
            </div>
            <div class="join-subtitle">
                <p>我们是一支年轻的IT及设计领域精英团队，专业于PC端/手机端应用的开发、微信公众号功能、php网站开发等。</p>
            </div>
            <div class="join-content">
                <div class="join-top">
                    <div class="top-title top-left">
                        <p>销售代表</p>
                    </div>
                    <div class="top-content">
                        <div class="top-words p-left">
                            <p class="p-title">岗位职责</p>
                            <p class="p-content">负责对公司提供的客户资料进行沟通，挖掘客户；通过电话沟通了解客户需求，约谈拜访并完成销售业绩；开发新客户，拓展与老客户的业务。</p>
                            <p class="p-title">任职要求</p>
                            <p class="p-content">口齿清晰，普通话流利，语音富有感染力；具备较强的学习能里和优秀的沟通能力；对销售有较高热情，具备良好的应变能力和承压能力。</p>
                            <p class="p-title">招聘人数：1</p>
                            <p class="p-title">工作地点：<font class="p-content">重庆南岸区南坪百盛浪高凯悦国际商务大厦B座24-C1</font></p>
                            <p class="p-content">请发简历到：sl@cqslkj.cn</p>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="join-content">
                <div class="join-top">
                    <div class="top-title top-right">
                        <p>PHP开发工程师</p>
                    </div>
                    <div class="top-content">
                        <div class="top-words p-right">
                            <p class="p-title">岗位职责</p>
                            <p class="p-content">负责网站或相关产品的PHP研发工作；能与团队成员高效配合，完成项目工作。</p>
                            <p class="p-title">任职要求</p>
                            <p class="p-content">
                                至少两年相关工作经验；一年以上PHP开发及维护工作经验；熟练掌握MySQL数据库，LA/NMP；熟练应用HTML/JavaScript；熟悉相关开发工具和测试工具的使用；学习能力强，有较强分析解决问题的能力。</p>
                            <p class="p-title">招聘人数：1</p>
                            <p class="p-title">工作地点：<font class="p-content">重庆南岸区南坪百盛浪高凯悦国际商务大厦B座24-C1</font></p>
                            <p class="p-content">请发简历到：sl@cqslkj.cn</p>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>

    <div class="partner">
        <div class="partner-edge edge-top"></div>
        <div class="partner-middle">
            <div class="partner-title">
                <img src="/static/home/img/partner_title.png">
            </div>
            <div class="partner-content">
                <ul>
                    <li><img src="/static/home/img/partner_1.png"></li>
                    <li><img src="/static/home/img/partner_2.png"></li>
                    <li><img src="/static/home/img/partner_3.png"></li>
                    <li><img src="/static/home/img/partner_4.png"></li>
                    <li><img src="/static/home/img/partner_5.png"></li>
                    <li><img src="/static/home/img/partner_6.png"></li>
                    <li><img src="/static/home/img/partner_7.png"></li>
                    <li><img src="/static/home/img/partner_8.png"></li>
                    <li><img src="/static/home/img/partner_9.png"></li>
                    <li><img src="/static/home/img/partner_10.png"></li>
                    <li><img src="/static/home/img/partner_11.png"></li>
                    <li><img src="/static/home/img/partner_12.png"></li>
                    <li><img src="/static/home/img/partner_13.png"></li>
                    <li><img src="/static/home/img/partner_14.png"></li>
                    <li><img src="/static/home/img/partner_15.png"></li>
                    <li><img src="/static/home/img/partner_16.png"></li>
                    <li><img src="/static/home/img/partner_17.png"></li>
                    <li><img src="/static/home/img/partner_18.png"></li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
        <div class="partner-edge edge-bottom"></div>
    </div>

    <div class="dynamics">
        <div class="dynamics-middle">
            <div class="introduce-title">
                <img class="title" src="/static/home/img/dynamics_title.png" alt="">
                <div class="introduce-read">
                    <a href="#">
                        <img src="/static/home/img/dynamics_read.png" alt="">
                        <font class="dynamics-font">Read more</font>
                    </a>
                </div>
            </div>
            <div class="dynamics-content">
                <div class="dynamics-block">
                    <div class="dynamics-back dynamics-1"></div>
                    <div class="dynamics-p">
                        <p class="dynamics-p-title">智能小程序带来体验大升级 开发者变现更高效</p>
                        <p class="dynamics-p-content">
                            11月1日，百度世界大会内容生态论坛于北京举办，备受行业关注的百度智能小程序迎来了重要的更新迭代。百度App业务部总经理平晓黎在会上着重讲解了百度智能小程序在服务体验、场景融合</p>
                    </div>
                    <div class="dynamics-more">
                        <a href="#"> <font>Read more</font> <img src="/static/home/img/dynamics_arrow.png" alt=""> </a>
                    </div>
                </div>
                <div class="dynamics-block">
                    <div class="dynamics-back dynamics-2"></div>
                    <div class="dynamics-p">
                        <p class="dynamics-p-title">高通全球副总裁：微信5年内很可能出VR版</p>
                        <p class="dynamics-p-content">高通全球副总裁John
                            Smee在世界互联网大会压轴的5G网络发展的分论坛上表示：“微信的VR版，很可能在5年内发生，高通已经为此做好准备。”</p>
                    </div>
                    <div class="dynamics-more">
                        <a href="#"> <font>Read more</font> <img src="/static/home/img/dynamics_arrow.png" alt=""> </a>
                    </div>
                </div>
                <div class="dynamics-block">
                    <div class="dynamics-back dynamics-3"></div>
                    <div class="dynamics-p">
                        <p class="dynamics-p-title">苏宁小萌狮与日系舞娘霸屏苏宁广场，引路人围观</p>
                        <p class="dynamics-p-content">
                            11月9日晚，苏宁的北京慈云寺店、上海闵一店、武汉的光谷门店，播放了一段动感十足的3D全息投影，引得众人围观拍照。这段3D全息投影以苏宁吉祥物小萌狮“苏格拉宁”和一位日漫风</p>
                    </div>
                    <div class="dynamics-more">
                        <a href="#"> <font>Read more</font> <img src="/static/home/img/dynamics_arrow.png" alt=""> </a>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>

    <div class="conditions">
        <div class="dynamics-middle">
            <div class="introduce-title">
                <img class="title" src="/static/home/img/conditions_title.png" alt="">
                <div class="introduce-read">
                    <img src="/static/home/img/dynamics_read.png" alt="">
                    <font class="dynamics-font">Read more</font>
                </div>
            </div>
            <div class="dynamics-content">
                <div class="conditions-block">
                    <div class="conditions-box">
                        <img src="/static/home/img/conditions_code.png" alt="">
                    </div>
                    <p>OLG运动商城</p>
                </div>
                <div class="conditions-block">
                    <div class="conditions-box">
                        <img src="/static/home/img/conditions_code.png" alt="">
                    </div>
                    <p>OLG运动商城</p>
                </div>
                <div class="conditions-block">
                    <div class="conditions-box">
                        <img src="/static/home/img/conditions_code.png" alt="">
                    </div>
                    <p>OLG运动商城</p>
                </div>
                <div class="conditions-block">
                    <div class="conditions-box">
                        <img src="/static/home/img/conditions_code.png" alt="">
                    </div>
                    <p>OLG运动商城</p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
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
                                微信二维码</a>
                            </li>
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
<script type="text/javascript" src="/static/home/js/jquery-v1.10.2.min.js"></script>
<script type="text/javascript" src="/static/home/js/script.js"></script>