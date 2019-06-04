<?php /*a:1:{s:32:"../Template/run/common\main.html";i:1528798690;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>系统主页</title>
    <link rel="stylesheet" href="/static/run/static/font-awesome-4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/static/run/static/layui/css/layui.css"/>
</head>
<body style="width: 99%">
<div class="layui-row layui-col-space10">
    <div class="layui-col-md6">
        <div style="background-color: #fff;">
            <blockquote class="layui-elem-quote" style="background-color: #fff;">一周访客统计</blockquote>
            <div id="main" style="width: 100%;height:175px;"></div>
        </div>
    </div>
    <div class="layui-col-md6">
        <div style="background-color: #fff;">
            <blockquote class="layui-elem-quote" style="background-color: #fff;">系统版本信息</blockquote>
            <table class="layui-table">
                <colgroup>
                    <col width="100">
                    <col>
                </colgroup>
                <tbody>
                <tr>
                    <td>当前版本</td>
                    <td>
                        <script type="text/html" template="">
                            v{{ layui.admin.v }}
                            <a href="" target="_blank"
                               style="padding-left: 15px;">更新日志</a>
                        </script>
                        v1.0.0-beta
                        <a href="" target="_blank"
                           style="padding-left: 15px;">更新日志</a>
                    </td>
                </tr>
                <tr>
                    <td>基于框架</td>
                    <td>
                        layui-v2.2.6 ThinkPHP5.1.*
                    </td>
                </tr>
                <tr>
                    <td>主要特色</td>
                    <td>简单 / 实用 / 清爽 / 极简 / 可扩展</td>
                </tr>
                <tr>
                    <td>获取渠道</td>
                    <td style="padding-bottom: 0;">
<!--                        <div class="layui-btn-container">-->
<!--                            <a href="https://gitee.com/zhangandchao/Yes-Admin" target="_blank"-->
<!--                               class="layui-btn layui-btn-warm">GitHub</a>-->
<!--                            <a href="https://gitee.com/zhangandchao/Yes-Admin" target="_blank"-->
<!--                               class="layui-btn">Download</a>-->
<!--                        </div>-->
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="layui-row layui-col-space10">
    <div class="layui-col-md6">
        <blockquote class="layui-elem-quote" style="background-color: #fff;">开发进度</blockquote>
        <ul class="layui-timeline" style="background-color: #fff;">
            <li class="layui-timeline-item">
                <i class="layui-icon layui-timeline-axis" style="color: red">&#xe63f;</i>
                <div class="layui-timeline-content layui-text">
                    <h3 class="layui-timeline-title">2018-05-30</h3>
                    <p>
                        ①、后台页面布局更换为iframe
                        <br/>②、插件功能的基本实现
                    </p>
                </div>
            </li>
            <li class="layui-timeline-item">
                <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                <div class="layui-timeline-content layui-text">
                    <h3 class="layui-timeline-title">2018-05-20</h3>
                    <p>
                        ①、后台权限的进一步完善
                        <br/>②、系统的安装向导
                        <br/>③、后台锁屏
                    </p>
                </div>
            </li>
            <li class="layui-timeline-item">
                <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                <div class="layui-timeline-content layui-text">
                    <h3 class="layui-timeline-title">2018-05-08</h3>
                    <p>
                        ①、后台首页改进
                        <br/>②、颜色主题改进
                        <br/>③、后台锁屏
                    </p>
                </div>
            </li>
            <li class="layui-timeline-item">
                <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                <div class="layui-timeline-content layui-text">
                    <h3 class="layui-timeline-title">2018-05-07</h3>
                    <p>
                        YesAdmin着手开发
                        <br>①、后台页面基本布局
                        <br>②、左侧菜单收缩处理
                    </p>
                </div>
            </li>
            <li class="layui-timeline-item">
                <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                <div class="layui-timeline-content layui-text">
                    <div class="layui-timeline-title">出发</div>
                </div>
            </li>
        </ul>
    </div>
    <div class="layui-col-md6">
        <blockquote class="layui-elem-quote" style="background-color: #fff;">系统参数</blockquote>
        <table class="layui-table">
            <tr>
                <th width="25%">存储配额限制</th>
                <th width="25%">配额已使用</th>
                <th width="25%">配额续费日期</th>
                <th>域名到期日期</th>
            </tr>
            <tr>
                <td></td>
                <td class="skin">
                    <a href="<?php echo url("","",true,false);?>" class="javascript link" rel="get_site_size">『计算』
                        <span id="showSiteSize" class="layui-badge layui-bg-orange">0KB</span></a>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>操作系统</th>
                <th>服务器环境</th>
                <th>服务器IP</th>
                <th>上传最大限制</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <th>PDO支持</th>
                <th>CURL支持</th>
                <th>MBstring支持</th>
                <th>脚本超时时间</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>版本</th>
                <th>ThinkPHP版本</th>
                <th>PHP版本</th>
                <th>MYSQL版本</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

        </table>
    </div>
    <script type="text/javascript" src="/static/run/static/layui/layui.js"></script>
    <script type="text/javascript" src="/static/run/static/js/echarts.min.js"></script><script type="text/javascript">
    layui.config({
        base: '/static/run/modules/'
    }).use(['element', 'home'], function () {
        var element = layui.element,
            home = layui.home;
        home.data_count();
    });
</script>

</div>
</body>
</html>