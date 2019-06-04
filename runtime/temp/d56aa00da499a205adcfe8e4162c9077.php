<?php /*a:1:{s:38:"../Template/run/auth_group\modify.html";i:1528798690;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/static/run/static/font-awesome-4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/static/run/static/layui/css/layui.css"/>
    <link rel="stylesheet" href="/static/run/static/ztree/css/zTreeStyle/zTreeStyle.css"/>
    <style type="text/css">
        body .layui-tree-skin-treeskin .layui-tree-branch {
            color: #35495e;
        }
    </style>
</head>
<body>
<form class="layui-form" action="" style="margin-right: 20px;margin-top: 20px;">
    <div class="layui-form-item">
        <label class="layui-form-label">权限组名称</label>
        <div class="layui-input-block">
            <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入权限组名称"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">权限规则</label>
        <div class="layui-input-block">
            <ul id="authTree" class="ztree"></ul>
        </div>
    </div>
    <input type="hidden" value="" name="rules" id="rules">
    <input value="<?php echo htmlentities($rules); ?>" type="hidden" id="this-rules">
    <input type="hidden" value="" name="id">
    <div class="layui-form-item">
        <label class="layui-form-label">权限开关</label>
        <div class="layui-input-block">
            <input type="radio" name="status" value="1" title="开启" checked>
            <input type="radio" name="status" value="0" title="关闭">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn layui-btn-radius" lay-submit="" lay-filter="subBtn"
                    style="width: 100%;background-color: #35495e">立即提交
            </button>
        </div>
    </div>
</form>


<script type="text/javascript" src="/static/run/static/layui/layui.js"></script>
<script type="text/javascript" src="/static/run/static/ztree/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="/static/run/static/ztree/jquery.ztree.all.min.js"></script>
<script type="text/javascript">
    var zTreeObj;
    // zTree 的参数配置，深入使用请参考 API 文档（setting 配置详解）
    var setting = {
        async:{
            enable:true,
            url:"<?php echo url('AuthGroup/getAuth'); ?>",
            type:"get",
            dataFilter:ajaxDataFilter
        },
        data:{
            simpleData:{
                enable: true,
                idKey: "id",
                pIdKey: "pid"
            }
        },
        check : {
            chkStyle : "checkbox",
            enable : true
            //设置是否显示checkbox复选框
        },
        view: {
            showIcon: true
        },
        callback: {
            onCheck: zTreeOnClick,
            onAsyncSuccess:checkedTree
        }
    };
    function ajaxDataFilter(treeId, parentNode, responseData) {
        return responseData['data'];//取得返回的数据
    }
    function zTreeOnClick() {
        var treeObj = $.fn.zTree.getZTreeObj("authTree");
        var nodes = treeObj.getCheckedNodes(true);
        var rules = "";
        $.each(nodes,function (x,y) {
            rules += y.id + ",";
        })
        $("#rules").val(rules.substring(0,rules.length-1));
    }
    function checkedTree() {
        //获取当前角色所拥有的
        var rules = JSON.parse($("#this-rules").val());
        $("input[name='title']").val(rules['title']);
        $("input[name='id']").val(rules['id']);
        $('input:radio[name="status"]').each(function (x,y) {
            if (rules['status'] == $(this).val()){
                $(this).attr("checked",true);
            }
        })
        var treeObj = $.fn.zTree.getZTreeObj("authTree");

        var nodes = treeObj.transformToArray(treeObj.getNodes());
        for (var i = 0;i<rules['rules'].length;i++){
            for (var j=0; j<nodes.length;j++){
                if (rules['rules'][i] == nodes[j]['id']){
                    treeObj.checkNode(nodes[j], true, false);
                }
            }
        }
        var nodes = treeObj.getCheckedNodes(true);
        var rules = "";
        $.each(nodes,function (x,y) {
            rules += y.id + ",";
        })
        $("#rules").val(rules.substring(0,rules.length-1));
    }
    $(document).ready(function () {
        zTreeObj = $.fn.zTree.init($("#authTree"), setting,null);
    });
    layui.use(['form', 'jquery'], function () {
        var $ = layui.jquery,
            form = layui.form;
        //监听提交
        form.on('submit(subBtn)', function (data) {
            $.ajax({
                type: "post",
                async: true,
                url: "<?php echo url('AuthGroup/modify'); ?>",
                data: data.field,
                dataType: "json",
                success: function (res) {
                    if (res && res['status'] == 200) {
                        layer.msg(res.msg, {icon: 1},function () {
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