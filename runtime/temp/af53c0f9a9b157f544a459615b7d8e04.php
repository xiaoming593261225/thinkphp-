<?php /*a:1:{s:32:"../Template/theme/news\news.html";i:1553241291;}*/ ?>
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
    <link rel="stylesheet" href="/static/home/css/paging.css">
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
                <li><a href="<?php echo url('Recruit/index'); ?>">诚聘英才</a></li>
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
        <img src="/static/home/img/newbanner.jpg">
    </div>
</div>
<!-- 内容 -->
<div class="nrow">
    <div class="nrow_2">
        <div class="nrow_2_left">
            <div class="nrow_1">
                <div class="nrow_1_1"><span>新闻动态</span>/<i>NEWS</i></div>
                <div class="nrow_1_2"><a>首页</a>/<a>新闻列表</a>/<a style="color: #f80000;">所有新闻</a></div>
            </div>
            <ul>
                <?php if(is_array($datas) || $datas instanceof \think\Collection || $datas instanceof \think\Paginator): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                <li>
                    <div class="nrow_2_left_1">
                        <div class="nrow_2_left_1_1"><img src="<?php echo htmlentities($data['icon']); ?>" alt="" style="width: 250px;height: 190px">
                        </div>
                        <div class="nrow_2_left_1_2">
                            <div class="nrow_2_left_1_2_1">
                                <h4><?php echo htmlentities($data['title']); ?></h4>
                                <div class="nrow_2_left_1_2_1_1">
                                    <div class="nrow_2_left_1_2_1_1_1">
                                        <span><a>作者：</a><?php echo htmlentities($data['author']); ?></span>&nbsp;|&nbsp;<span><a>浏览量：</a><?php echo htmlentities($data['views']); ?></span>
                                    </div>
                                    <div class="nrow_2_left_1_2_1_1_2">
                                        <span><?php echo htmlentities(date('Y-m-d',!is_numeric($data['create_time'])? strtotime($data['create_time']) : $data['create_time'])); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="nrow_2_left_1_2_2">
                                <p>
                                    <?php echo $data['content'];?>
                                </p>
                                <a href="<?php echo url('News/more'); ?>?id=<?php echo htmlentities($data['id']); ?>">查看更多</a>
                            </div>
                        </div>
                    </div>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="nrow_3">
                <?php echo $page; ?>
            </div>
        </div>
        <div class="nrow_2_right">
            <div class="nrow_2_right_1">
                <div class="nrow_1">
                    <div class="nrow_1_1"><span>搜索</span>/<i>SEARCH</i></div>
                </div>
                <form action="<?php echo url('News/news'); ?>" method="">
                    <div class="nrow_2_right_1_1">
                        <input type="text" placeholder="搜索新闻" name="keyWords" id="keyWords">
                        <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
                </form>
            </div>
            <div class="nrow_2_right_1">
                <div class="nrow_1">
                    <div class="nrow_1_1"><span>相关分类</span>/<i>POPULAR TAGS</i></div>
                </div>
                <div class="nrow_2_right_1_2">
                    <ul>
                        <li><a href="<?php echo url('News/news'); ?>" class="nrow_2_right_1_2_x">所有新闻</a>
                            <?php if(is_array($newsClass) || $newsClass instanceof \think\Collection || $newsClass instanceof \think\Paginator): $i = 0; $__LIST__ = $newsClass;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$news): $mod = ($i % 2 );++$i;?>
                        <li><a href="<?php echo url('News/news'); ?>?class_id=<?php echo htmlentities($news['id']); ?>"><?php echo htmlentities($news['news_name']); ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
            <div class="nrow_2_right_2">
                <div class="nrow_1">
                    <div class="nrow_1_1"><span>热门新闻</span>/<i>HOT NEWS</i></div>
                </div>
                <div class="nrow_2_right_2_1">
                    <ul>
                        <?php if(is_array($newsHot) || $newsHot instanceof \think\Collection || $newsHot instanceof \think\Paginator): $i = 0; $__LIST__ = $newsHot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hot): $mod = ($i % 2 );++$i;?>
                        <li>
                            <div class="nrow_2_right_2_1_1">
                                <a href="<?php echo url('News/more'); ?>?id=<?php echo htmlentities($data['id']); ?>">
                                    <div class="nrow_2_right_2_1_1_1"
                                    ><img src="<?php echo htmlentities($hot['icon']); ?>" alt="" style="width: 90px;height: 50px"></div>
                                    <div class="nrow_2_right_2_1_1_2">
                                        <h4><?php echo htmlentities($hot['title']); ?></h4>
                                        <p><?php echo htmlentities(date('Y-m-d',!is_numeric($hot['create_time'])? strtotime($hot['create_time']) : $hot['create_time'])); ?></p>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
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
