<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo constant('SYS_NAME');?>|系统管理</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/style-metro.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/fullcalendar.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/jqvmap.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="shortcut icon" href="<?php echo constant('ADMIN_SRC');?>media/image/favicon.ico" />
    <script type="text/javascript">
        function login_out(){
            if (confirm('确定要注销账户吗？')) {
                top.location="<?php echo site_url('admin/admin_login/login_out')?>";
            }else {
                return false;
            }
        }

        function do_check(){
            top.location="<?php echo site_url('admin/admin_two/show_two')?>";
        }
        function out_check(){
            top.location="<?php echo site_url('admin/admin_two/login_out')?>";
        }
        function back(){
            top.location="<?php echo site_url('admin/admin_bar/index')?>";
        }
    </script>
</head>
<body >
<div class="header navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a href='http://www.jdmenu.cn' target="_blank" class="brand">
                <img src="<?php echo constant('ADMIN_SRC');?>media/image/logo.png" alt="logo"/>
            </a>

            <ul class="nav pull-right">
                <li class="dropdown user">
                    <a href="#" onclick="back();" class="dropdown-toggle" data-toggle="dropdown">
                        <img alt="" src="<?php echo constant('ADMIN_SRC');?>media/image/avatar1_small.jpg" />
                        <span class="username"><?php echo $_SESSION['admin_user']['shop_name']?>【返回吧台】</span>
                    </a>
                </li>
                <?php
                if($_SESSION['admin_user']['two']==1){
                    if($_SESSION['admin_user']['is_check']==1){
                        echo "<li class='dropdown user'  style='padding-top:2px;'>
											<a href='#' onclick='out_check();' class='dropdown-toggle' data-toggle='dropdown'>
												<span class='username'>
													退出验证
												</span>
											</a>
										</li>";
                    }else{
                        echo "<li class='dropdown user'  style='padding-top:2px;'>
											<a href='#' onclick='do_check();' class='dropdown-toggle' data-toggle='dropdown'>
												<span class='username'>
													我要验证
												</span>
											</a>
										</li>
									";
                    }
                }
                ?>


                <li>
                    <a href="#" onclick="login_out();" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-key"></i>注销账户
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="page-container">
        <div style="background-color:#6EC169;height:30px;padding-left:10px;padding-right:20px;">
            <table width="100%">
                <tr>
                    <td width="12px" style="padding-top:5px;">
                        <img src="<?php echo constant('ADMIN_SRC');?>media/img/gg.png" style="margin-top:-7px;"/>
                    </td>
                    <td style="padding-top:5px;">
                        <marquee scrolldelay="1" scrollamount="2" direction="Left">
                            <span>欢迎使用'简点•点餐'系统，24小时联系热线18501376808!</span>
                        </marquee>
                    </td>
                </tr>
            </table>


        </div>
    </div>
</div>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>