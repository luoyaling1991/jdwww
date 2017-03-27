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
							<a href="<?php echo site_url("sys/admin_shop/index")?>" target='rightFrame'>商家管理</a>
						</li>
                        <li >
							<a href="<?php echo site_url("sys/admin_vip/vip_log")?>" target='rightFrame'>订单管理</a>
						</li>
						<li >
							<a href="<?php echo site_url("sys/admin_vip/index")?>" target='rightFrame'>充值商品</a>
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