<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?php echo constant('SYS_NAME');?>|管理平台登陆</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
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

	<link href="<?php echo constant('ADMIN_SRC');?>media/css/login-soft.css" rel="stylesheet" type="text/css"/>
	<link rel="shortcut icon" href="<?php echo constant('ADMIN_SRC');?>media/image/favicon.ico" />
<script>
 window.onload = function() {
            if (window.applicationCache) {
                
            } else {
				 //var r=confirm("您的浏览器不支持html5,访问的效果可能不是特别好，请选择是否更换浏览器访问！")
 				 //if (r==true){
				//	 window.location.href="check_html5.html";
				 // }
            }
        }
</script>
</head>
<body class="login">
	<div class="logo">
		<img src="<?php echo constant('ADMIN_SRC');?>media/image/logo-big.png" alt="" /> 
	</div>
	<div class="content">
		<form class="form-vertical login-form" id="login_form" action="" onsubmit="return login_submit();">
			<h3 class="form-title">"简点"点餐管理平台</h3>
			<div class="alert alert-danger hide">
				<span id="alert_login">您填写的登陆账户或登陆密码不正确.</span>
			</div>
			<div class="control-group">
				<label class="control-label visible-ie8 visible-ie9">Username</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-user"></i>
						<input class="m-wrap placeholder-no-fix" type="text" placeholder="登陆账号" name="username" id="username"/>
					</div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label visible-ie8 visible-ie9">Password</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-lock"></i>
						<input class="m-wrap placeholder-no-fix" type="password" placeholder="登陆密码"  name="password" id="password"/>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<label class="checkbox">
				<input type="checkbox" name="remember" value="1"/>记住密码
				</label>
				<button type="submit" class="btn blue pull-right">
				登陆<i class="m-icon-swapright m-icon-white"></i>
				</button>            
			</div>
            <div class="forget-password">
				<h4>忘记密码?</h4>
				<p>
					如果您有账号，但是忘记了密码,请点击<a href="<?php echo site_url("web/lose");?>" class="">这里</a>找回你的密码！
				</p>
			</div>
		</form>
	</div>
	<div class="copyright">
		<?php echo constant('COPYRIGHT');?>
	</div>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.uniform.min.js" type="text/javascript" ></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.backstretch.min.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/app_1.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/login-soft.js" type="text/javascript"></script>      
	<script>
		jQuery(document).ready(function() {     
		  App.init();
		  Login.init();
		});
	</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
<script type="text/javascript">
	function login_submit(){
		if($("#username").val()!="" && $("#password").val()!=""){
			var action ="<?php echo site_url('admin/admin_index/login')?>";
			var form_data = {
					username: $("#username").val(),
					password: $("#password").val(),
					is_ajax: 1
			};
			$.ajax({
				type: "POST",
				url: action,
				data: form_data,
				success: function(data)
				{
					if(data=='0'){
						$('.alert-danger', $('.login-form')).show();
						$("#username").val("");
						$("#username").focus();
					 }else if(data=='-1'){
						$("#alert_login").html("您填写的登陆账户不存在，请核实.");
						$('.alert-danger', $('.login-form')).show();
						$("#username").val("");
						$("#username").focus();
					 }else if(data=='-2'){
							$("#alert_login").html("对不起，您的账户已被停用，请联系客服！");
							$('.alert-danger', $('.login-form')).show();
							$("#username").val("");
							$("#password").val("");
					 }else{

						location.href ="<?php echo site_url('admin/admin_index/check_login')?>";
					 }

				}
			});
			return false;
		}
	}
</script>
</body>
</html>