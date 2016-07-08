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
                        <th class="table-title">标题</th>
                        <th class="table-type">内容</th>
                        <th class="table-type">时间</th>
                        <th class="table-type">作者</th>
                        <th class="table-type">图片</th>
                        <th class="table-set">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($blogs as $admin){
                        ?>
                        <tr>
                            <td><input data-id="<?php echo $admin -> blog_id; ?>" class="table-input" type="checkbox" /></td>
                            <td class="admin-id"><?php echo $admin -> blog_id; ?></td>
                            <td><a href="#"><?php echo $admin -> title; ?></a></td>
                            <td><?php echo $admin -> content; ?></td>
                            <td><?php echo $admin -> add_time; ?></td>
                            <td><?php echo $admin -> author; ?></td>
                            <td>default</td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button data-id="<?php echo $admin -> blog_id; ?>" class="am-btn-update am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                                        <button data-id="<?php echo $admin -> blog_id; ?>" class="am-btn-delete am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
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
            var blogId =  $(this).data('id');
            if(confirm('确定是否删除记录，不可恢复!?')){
                location.href = 'admin/delete_blog?blog_id=' + blogId;
            }
        });

        $('.am-btn-update').on('click', function(){
            var blogId = $(this).data('id');
            if(confirm('确定是否修改记录。不可恢复？！')){
                var Content = prompt("输入修改后的内容:","");
                if(Content){
                    location.href = 'admin/update_blog?blog_id='+blogId + "&content=" + Content;
                }

            }
        });

        $('.am-btn-insert').on('click', function(){
            var Title = prompt("输入新增的题目:","");
            var Content = prompt("输入文章内容：","");
            var Author = prompt("输入作者","");
            if(Title && Content && Author){
                $.get('admin/insert_blog?title='+ Title + "&author=" + Author+ "&content=" + Content, function(res){
                    if(res){
                        location.href = 'admin/admin_blog';
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
                    $.get('admin/deletes_blog?blog_id='+array[i], function(res){
                        if(res){
                            location.href = 'admin/admin_blog';
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