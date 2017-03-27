<!DOCTYPE html>
<html lang="en">
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
	<link href="<?php echo constant('ADMIN_SRC');?>media/css/default_1.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo constant('ADMIN_SRC');?>media/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/bootstrap-fileupload.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/jquery.gritter.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/chosen.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/select2_metro.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/jquery.tagsinput.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/clockface.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/bootstrap-wysihtml5.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/datepicker.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/timepicker.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/colorpicker.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/bootstrap-toggle-buttons.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/daterangepicker.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/datetimepicker.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/multi-select-metro.css" />
	<link href="<?php echo constant('ADMIN_SRC');?>media/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/jquery.fancybox.css" rel="stylesheet" />
	<link href="<?php echo constant('ADMIN_SRC');?>media/css/jquery.fileupload-ui.css" rel="stylesheet" />
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/email.css" rel="stylesheet" type="text/css"/>
	<link rel="shortcut icon" href="<?php echo constant('ADMIN_SRC');?>media/image/favicon.ico" />
<style type="text/css">
.remove_img{
	display:block;
	position:relative;
	float:right;
	top:15px;
	background-color:#FFF;
}
.tab_set tr{
	border-bottom:1px #ccc solid;
}
.tab_set tr td{
	text-align:center;
}
#div_from a{
	margin-top: 10px;
}
</style>
</head>
<body class="page-header-fixed">
<div >
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<br>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo site_url("sys/admin_index/main_right")?>">系统介绍</a> 
							</li>
							
						</ul>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="portlet box myself">
							<div class="portlet-title">
								<div class="caption">&nbsp;&nbsp;&nbsp;系统介绍</div>
							</div>
							<div class="portlet-body form" id="div_from">
                            	&nbsp;&nbsp;&nbsp;欢迎进入"简点"点餐系统管理！<br>&nbsp;<br>
                            	
                                <br>&nbsp;<br>
                            </div>
						</div>
					</div>
				</div>
			</div>
    </div>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.uniform.min.js" type="text/javascript" ></script>
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/ckeditor.js"></script>  
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap-fileupload.js"></script>
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/chosen.jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/wysihtml5-0.3.0.js"></script> 
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap-wysihtml5.js"></script>
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.tagsinput.min.js"></script>
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.toggle.buttons.js"></script>
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap-datetimepicker.js"></script>
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/clockface.js"></script>
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/date.js"></script>
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/daterangepicker.js"></script> 
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap-colorpicker.js"></script>  
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap-timepicker.js"></script>
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.inputmask.bundle.min.js"></script>   
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.input-ip-address-control-1.0.min.js"></script>
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.multi-select.js"></script>   
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap-modal.js" type="text/javascript" ></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap-modalmanager.js" type="text/javascript" ></script> 
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/app.js"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/form-components.js"></script>     
	<script>
		jQuery(document).ready(function() {       
		   App.init();
		   FormComponents.init();
		});
	</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
</body>
</html>