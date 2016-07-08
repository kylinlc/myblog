<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze UI Admin table Examples</title>
    <meta name="description" content="这是一个 table 页面">
    <meta name="keywords" content="table">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <base href="<?php echo site_url();?>">

    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<?php include 'admin-header.php'; ?>

<div class="am-cf admin-main">
    <?php include 'admin-sidebar.php'; ?>

    <!-- content start -->
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">表格</strong> / <small>Table</small></div>
        </div>

        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <button type="button" class="am-btn-insert am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
                        <button type="button" class="am-btn-deletes am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="am-g">
            <div class="am-u-sm-12">
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th class="table-check"><input type="checkbox" /></th>
                        <th class="table-id">ID</th>
                        <th class="table-title">用户名</th>
                        <th class="table-type">邮箱</th>
                        <th class="table-type">website</th>
                        <th class="table-type">subject</th>
                        <th class="table-type">add_time</th>
                        <th class="table-type">blog_id</th>
                        <th class="table-set">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($comments as $admin){
                        ?>
                        <tr>
                            <td><input data-id="<?php echo $admin -> comment_id; ?>" class="table-input" type="checkbox" /></td>
                            <td class="admin-id"><?php echo $admin -> comment_id; ?></td>
                            <td><a href="#"><?php echo $admin -> username; ?></a></td>
                            <td><?php echo $admin -> email; ?></td>
                            <td><?php echo $admin -> website; ?></td>
                            <td><?php echo $admin -> subject; ?></td>
                            <td><?php echo $admin -> add_time; ?></td>
                            <td><?php echo $admin -> blog_id; ?></td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button data-id="<?php echo $admin -> comment_id; ?>" class="am-btn-update am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                                        <button data-id="<?php echo $admin -> comment_id; ?>" class="am-btn-delete am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- content end -->
</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
    <hr>
    <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>
<script>

    $(function(){
        $('.am-btn-delete').on('click', function(){
            var commentId =  $(this).data('id');
            if(confirm('确定是否删除记录，不可恢复!?')){
                location.href = 'admin/delete_comment?comment_id=' + commentId;
            }
        });

        $('.am-btn-update').on('click', function(){
            var commentId = $(this).data('id');
            if(confirm('确定是否修改记录，不可恢复！？')){
                var Subject = prompt('请输入修改的内容:',"");
                if(Subject){
                    location.href = 'admin/update_comment?comment_id=' + commentId + '&subject=' + Subject;
                }
            }
        });

        $('.am-btn-insert').on('click', function(){
            var userName = prompt("输入新增的名字:","");
            var Email = prompt("输入新增的email","");
            var Website = prompt("输入新增的website","");
            var Subject = prompt("输入新增的subject","");
            if(userName && Email && Website && Subject){
                $.get('admin/insert_comment?username='+userName + "&email=" + Email + "&website=" + Website + "&subject=" + Subject, function(res){
                    if(res){
                        location.href = 'admin/admin_comment';
                    }
                });
            }
        });

        var $tableCheck = $('.table-check input');
        var $tableInput = $('.table-input');
        $tableCheck.on('click', function(){
            if($tableCheck.prop('checked')){
                $tableInput.prop('checked', 'checked');
            }else{
                $tableInput.prop('checked', false);
            }
        });

        //var adminId = $(this).data('id');
        var array = new Array(); //用于保存 选中的那一条数据的ID
        var flag; //判断是否一个未选
        $('.am-btn-deletes').on('click', function() {

            $tableInput.each(function () {
                if ($(this).prop("checked")) { //判断是否选中
                    flag = true; //只要有一个被选择 设置为 true
                }
            });
            if(flag){
                $tableInput.each(function(){
                    if($(this).prop('checked')){
//           console.log($(this).data('id'));
                        array.push($(this).data('id'));
                    }
                });
                for(var i= 0; i<array.length; i++){
                    //console.log(array[i]);
                    $.get('admin/deletes_comment?comment_id='+array[i], function(res){
                        if(res){
                            location.href = 'admin/admin_comment';
                        }
                    });
                }

            }else{
                alert("请至少选择一个用户");
            }
        });
    });
</script>
</body>
</html>
