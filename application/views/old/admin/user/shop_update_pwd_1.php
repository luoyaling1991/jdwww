<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?php echo constant('SYS_NAME');?>|修改密码 </title>
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
	<link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/select2_metro.css" />
	<link rel="shortcut icon" href="<?php echo constant('ADMIN_SRC');?>media/image/favicon.ico" />
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
								<a href="index.html">系统管理</a> 
								<span class="icon-angle-right"></span>
							</li>
							<li>
								<a href="#">账户设置</a>
								<span class="icon-angle-right"></span>
							</li>
							<li><a href="#">修改密码</a></li>
						</ul>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span12">
                    <div class="portlet box myself">
						<div class="portlet-title">
							<div class="caption">&nbsp;&nbsp;&nbsp;验证身份</div>
						</div>
                        <div class="tabbable tabbable-custom boxless" style="background-color:#FFF;">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab_1" data-toggle="tab">通过手机验证修改密码</a></li>
								<li><a class="" href="#tab_2" data-toggle="tab">通过邮箱验证修改密码</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1">
										<div class="portlet-body form" style="background-color:#fff;">
											<form action="#" class="form-horizontal">
												<div class="row-fluid">
														<div class="control-group">
															<label class="control-label">绑定手机号码：</label>
															<div class="controls">
																<input type="text" class="span4 m-wrap" style="width:320px;"/>
																<span class="help-inline">填写您绑定的手机号码.</span>
															</div>
														</div>
                                                        <div class="control-group">
                                                            <label class="control-label">验证码：
                                                            </label>
                                                            <div class="controls">
                                                                <input type="text" class="span2 m-wrap" style="width:160px;"/>
                                                                <input type="submit" class="btn red" value="获取验证码"/>
                                                            </div>
														</div>
												</div>
												<div class="form-actions clearfix">
                                                    <a href="shop_update_pwd_2.html" class="btn blue button-next">
                                                    继续下一步<i class="m-icon-swapright m-icon-white"></i>
                                                    </a>
                                                </div>
											</form>     
									</div>
								</div>
                                <div class="tab-pane" id="tab_2">
										<div class="portlet-body form" style="background-color:#fff;">
											<form action="#" class="form-horizontal">
												<div class="row-fluid">
														<div class="control-group">
                                                            <label class="control-label">绑定邮箱地址：
                                                            </label>
                                                            <div class="controls">
                                                                <input type="text" class="span4 m-wrap" style="width:320px;" name="email"/>
                                                                <span class="help-inline">填写您绑定的邮箱地址.</span>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">验证码：
                                                            </label>
                                                            <div class="controls">
                                                                <input type="text" class="span2 m-wrap" style="width:160px;"/>
                                                                <input type="submit" class="btn red" value="获取验证码"/>
                                                            </div>
														</div>
												</div>
												<div class="form-actions clearfix">
                                                    <a href="shop_update_pwd_2.html" class="btn blue button-next">
                                                    继续下一步<i class="m-icon-swapright m-icon-white"></i>
                                                    </a>
                                                </div>
											</form>     
									</div>
								</div>
							</div>
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
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/select2.min.js"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/app.js"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/form-samples.js"></script>   
	<script>
		jQuery(document).ready(function() {    
		   App.init();
		   FormSamples.init();
		});
	</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
</body>
</html>