<?php /*a:1:{s:33:"../Template/run/widget\menus.html";i:1528798690;}*/ ?>
<li data-name="home" class="layui-nav-item" style="text-align: center;">
    <a href="/run" lay-tips="主页" lay-direction="2">
        <cite>系统首页</cite>
    </a>
</li>
<?php if(is_array($menus) || $menus instanceof \think\Collection || $menus instanceof \think\Paginator): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<li data-name="component" class="layui-nav-item">
    <a href="javascript:;" lay-tips="组件" lay-direction="2">
        <i class="fa <?php echo htmlentities($vo['icon']); ?>"></i>
        <cite><?php echo htmlentities($vo['title']); ?></cite>
        <span class="layui-nav-more"></span>
    </a>
    <?php if(( isset($vo['children'] ))): ?>
    <dl class="layui-nav-child">
        <?php foreach($vo['children'] as $key => $val): ?>
        <dd <?php if(($thisurl == $val['name'])): ?>  class="layui-nav-itemed" <?php else: ?>  class="" <?php endif; ?>>
            <a <?php if((isset($val['children']))): ?> href="javascript:;" <?php else: ?> href="<?php echo url($val['name']); ?>" <?php endif; ?>>
        <i class="fa <?php echo htmlentities($val['icon']); ?>"></i>
        <cite><?php echo htmlentities($val['title']); ?></cite>
                <?php if(( isset($val['children']))): ?>
                    <span class="layui-nav-more"></span>
                <?php endif; ?>
            </a>
            <?php if(( isset($val['children']) )): ?>
            <dl class="layui-nav-child">
                <?php foreach($val['children'] as $k => $v): ?>
                <dd data-name="list">
                    <a <?php if((isset($v['children']))): ?> href="javascript:;" <?php else: ?> href="<?php echo url($v['name']); ?>" <?php endif; ?>>
                    <cite><?php echo htmlentities($v['title']); ?></cite>
                    </a>
                </dd>
                <?php endforeach; ?>
            </dl>
            <?php endif; ?>
        </dd>
        <?php endforeach; ?>
    </dl>
    <?php endif; ?>
</li>
<?php endforeach; endif; else: echo "" ;endif; ?>
<span class="layui-nav-bar" style="top: 84.4618px; height: 0px; opacity: 0;"></span>