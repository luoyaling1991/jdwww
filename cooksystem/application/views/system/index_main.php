<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8">
    <title><?php echo constant('SYS_NAME');?>|系统管理</title>

</head>
<frameset rows="70,*" cols="*" frameborder="no" border="0" framespacing="0">
  <frame src="<?php echo site_url("sys/admin_index/main_top")?>" name="topFrame" scrolling="no" noresize="noresize" id="topFrame"/>
	<frameset cols="213,*" frameborder="no" border="0" framespacing="0">
    <frame src="<?php echo site_url("sys/admin_index/main_left")?>" name="leftFrame" scrolling="auto" noresize="noresize" id="leftFrame"/>
    <frame src="<?php echo site_url("sys/admin_index/main_right")?>" name="rightFrame" id="rightFrame"/>
	</frameset>
    </frameset>

<noframes>
<body>
</body> 
</noframes>
</html>