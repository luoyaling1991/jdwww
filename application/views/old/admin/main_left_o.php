<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <TITLE><?php echo constant('SYS_NAME');?>|系统管理</TITLE>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <link href="<?php echo constant('ADMIN_SRC');?>media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/style-metro.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/style.css" rel="stylesheet" type="text/css"/>

    <link href="<?php echo constant('ADMIN_SRC');?>media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <SCRIPT src="<?php echo constant('ADMIN_SRC');?>media/js/jquery-1.9.1.min.js" type="text/javascript"></SCRIPT>
    <script type="text/javascript">
        //为点击二级模块后赋值样式
        $(function(){
            $('.sub-menu li a').click(function(){
                $('.sub-menu li').removeClass('start active');
                $('.page-sidebar-menu li').removeClass('start active');
                $(this).parent().addClass('start active');
                $(this).parent().parent().parent().addClass('start active');
            })
        })
        //为第一个一级模块单独写点击后的样式
        function a_click_0(){
            $('.sub-menu li').removeClass('start active');
            $('.page-sidebar-menu li').removeClass('start active');
            $("#a_model_0").parent().addClass('start active');
        }
    </script>



</head>
<body >
<div class="page-container">
    <div class="page-sidebar nav-collapse collapse">
        <ul class="page-sidebar-menu">
            <li class="start active">
                <a href="<?php echo site_url("admin/admin_index/main_right")?>" target='rightFrame'  id="a_model_0" onClick="a_click_0()">
                    <i class="icon-home"></i>系统介绍</a>
            </li>
            <li class="">
                <a href="javascript:;" ><i class="icon-user" ></i>日常管理<span class="arrow "></span></a>
                <ul class="sub-menu">
                    <li >
                        <a href="<?php echo site_url("admin/admin_dish/dish_add_show")?>" target='rightFrame'>发布菜品</a>
                    </li>
                    <li >
                        <a href="<?php echo site_url("admin/admin_set/set_add_show")?>" target='rightFrame'>发布套餐</a>
                    </li>
                    <li >
                        <a href="<?php echo site_url("admin/admin_dish/dish_list")?>" target='rightFrame'>菜品管理</a>
                    </li>
                    <li >
                        <a href="<?php echo site_url("admin/admin_set/set_list")?>" target='rightFrame'>套餐管理</a>
                    </li>
                    <li >
                        <a href="<?php echo site_url("admin/admin_type/type_list")?>" target='rightFrame'>菜品分类管理</a>
                    </li>
                    <li >
                        <a href="<?php echo site_url("admin/admin_big/big_list")?>" target='rightFrame'>推荐位管理</a>
                    </li>
                    <li >
                        <a href="<?php echo site_url("admin/admin_table/table_list")?>" target='rightFrame'>餐桌管理</a>
                    </li>
                    <li >
                        <a href="<?php echo site_url("admin/admin_waiter/waiter_list")?>" target='rightFrame'>工号管理</a>
                    </li>
                    <li >
                        <a href="<?php echo site_url("admin/admin_sell/set_show")?>" target='rightFrame'>参数配置</a>
                    </li>
                </ul>
            </li>
            <li  >
                <a href="javascript:;" ><i class="icon-th" ></i>营业数据<span class="arrow "></span></a>
                <ul class="sub-menu">
                    <li>
                        <a href="<?php
                        if($_SESSION['admin_user']['two']==1){
                            if($_SESSION['admin_user']['is_check']==1){
                                echo site_url('admin/admin_sell/index_1');}
                            else{echo site_url('admin/admin_two/show_two_1');}
                        }else{
                            echo site_url('admin/admin_sell/index_1');
                        } ?>" target='rightFrame'>营业概况</a>
                    </li>
                    <li>
                        <a href="<?php if($_SESSION['admin_user']['two']==1){if($_SESSION['admin_user']['is_check']==1){echo site_url('admin/admin_sell/index_2');}else{echo site_url('admin/admin_two/show_two_1');}}else{echo site_url('admin/admin_sell/index_2');} ?>" target='rightFrame'>热销查询</a>
                    </li>
                    <li>
                        <a href="<?php if($_SESSION['admin_user']['two']==1){if($_SESSION['admin_user']['is_check']==1){echo site_url('admin/admin_sell/index_3');}else{echo site_url('admin/admin_two/show_two_1');}}else{echo site_url('admin/admin_sell/index_3');} ?>" target='rightFrame'>销售查询</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:;"><i class="icon-cogs"></i>账户设置<span class="arrow "></span></a>
                <ul class="sub-menu">
                    <li >
                        <a href="<?php if($_SESSION['admin_user']['two']==1){if($_SESSION['admin_user']['is_check']==1){echo site_url('admin/admin_user/user_info');}else{echo site_url('admin/admin_two/show_two_1');}}else{echo site_url('admin/admin_user/user_info');} ?>" target='rightFrame'>账户信息</a>
                    </li>
                    <li >
                        <a href="<?php if($_SESSION['admin_user']['two']==1){if($_SESSION['admin_user']['is_check']==1){echo site_url('admin/admin_user/shop_pad_1');}else{echo site_url('admin/admin_two/show_two_1');}}else{echo site_url('admin/admin_user/shop_pad_1');} ?>" target='rightFrame'>平板管理</a>
                    </li>
                    <li >
                        <a href="<?php if($_SESSION['admin_user']['two']==1){if($_SESSION['admin_user']['is_check']==1){echo site_url('admin/admin_phone/index');}else{echo site_url('admin/admin_two/show_two_1');}}else{echo site_url('admin/admin_phone/index');} ?>" target='rightFrame'>绑定手机</a>
                    </li>
                    <li >
                        <a href="<?php if($_SESSION['admin_user']['two']==1){if($_SESSION['admin_user']['is_check']==1){echo site_url('admin/admin_email/check_email');}else{echo site_url('admin/admin_two/show_two_1');}}else{echo site_url('admin/admin_email/check_email');} ?>" target='rightFrame'>绑定邮箱</a>
                    </li>
                    <li >
                        <a href="<?php if($_SESSION['admin_user']['two']==1){if($_SESSION['admin_user']['is_check']==1){echo site_url('admin/admin_two/shop_setting');}else{echo site_url('admin/admin_two/show_two_1');}}else{echo site_url('admin/admin_two/shop_setting');} ?>" target='rightFrame'>权限设置</a>
                    </li>
                    <li >
                        <a href="<?php if($_SESSION['admin_user']['two']==1){if($_SESSION['admin_user']['is_check']==1){echo site_url('admin/admin_pwd/index');}else{echo site_url('admin/admin_two/show_two_1');}}else{echo site_url('admin/admin_pwd/index');} ?>" target='rightFrame'>修改登录密码</a>
                    </li>
                    <li >
                        <a href="<?php if($_SESSION['admin_user']['two']==1){if($_SESSION['admin_user']['is_check']==1){echo site_url('admin/admin_yz/index');}else{echo site_url('admin/admin_two/show_two_1');}}else{echo site_url('admin/admin_yz/index');} ?>" target='rightFrame'>修改验证密码</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

</div>


<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/app_1.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/index.js" type="text/javascript"></script>
<script>
    jQuery(document).ready(function() {
        App.init(); // initlayout and core plugins
        Index.init();
        Index.initJQVMAP(); // init index page's custom scripts
        Index.initCalendar(); // init index page's custom scripts
        Index.initCharts(); // init index page's custom scripts
        Index.initChat();
        Index.initMiniCharts();
        Index.initDashboardDaterange();
        Index.initIntro();
    });

</script>
</body>
</html>