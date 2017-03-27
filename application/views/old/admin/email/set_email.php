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
<script>
function body_function(){
	var	wid=window.screen.availWidth-213;
	if(wid<1200){
		wid=1200;	
	}
	$("body").css("width",wid); 
}
</script>
</head>
<body class="page-header-fixed" onLoad="body_function();">
<div id="time"></div>
	<div >
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<br>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo site_url("admin/admin_index/main_right")?>">系统管理</a> 
								<span class="icon-angle-right"></span>
							</li>
							<li>
								<a href="<?php echo site_url('admin/admin_user/user_info');?>">账户设置</a>
								<span class="icon-angle-right"></span>
							</li>
							<li><a href="<?php echo site_url('admin/admin_email/set_email');?>">绑定邮箱</a></li>
						</ul>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span12">
                    <div class="portlet box myself">
						<div class="portlet-title">
							<div class="caption">&nbsp;&nbsp;&nbsp;绑定邮箱</div>
						</div>
                       <div class="portlet-body form" style="background-color:#fff;">
											<form action="<?php echo site_url('admin/admin_email/update_email')?>" class="form-horizontal" onsubmit="return check_num()" method="post">
												<div class="row-fluid">
														<div class="control-group">
															<label class="control-label">绑定邮箱地址：</label>
															<div class="controls">
																<input type="email" class="span4 m-wrap" style="width:320px;"name="shop_email" id="shop_email" />
																<span class="help-inline">填写您要绑定的邮箱地址.</span>
															</div>
														</div>
                                                        <div class="control-group">
                                                            <label class="control-label">验证码：
                                                            </label>
                                                            <div class="controls">
                                                                <input type="text" class="span2 m-wrap" style="width:160px;" name="log_txt" id="log_txt"/>
                                                                <input type="button" class="btn red" value="获取验证码" onclick="get_num()" id="btn_1" />
                                                            </div>
														</div>
												</div>
												<div class="controls">
                                                        <button type="submit" class="btn_1">确认提交</button>      <br>&nbsp;                     
                                                    </div>
											</form>     
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
	<script>
	var shop_phone_1="<?php echo $user['shop_email']?>";
	var check_phone="";
	var ss=60;
	var bl=0;
	function get_num(){		
		var shop_mobile=$("#shop_email").val();
		if(shop_phone_1!=shop_mobile || shop_phone_1==""){
			//异步传输获取验证码
			$.post('<?php echo site_url('admin/admin_email/get_new_num')?>', {shop_mobile:shop_mobile}, function (e) {
				if (e==-1){
					alert('获取验证码失败，输入的新邮箱和原邮箱一样，请重新输入!');
				}else{
					check_phone=e;
					timer();
					bl=1;
				}
			});
		}else{
				alert('输入的新邮箱和原邮箱一样，请核实!');
		}
		
		alert(e);
		return false;
	}
	function timer(){
		if(ss>0){
		document.getElementById('btn_1').value=ss+"秒后可重新获取";  
		document.getElementById('btn_1').disabled=true; 
	    setTimeout("timer(1)",1000);  
	    ss--;
		}else{
			document.getElementById('btn_1').value='没收到？重新获取';  
			document.getElementById('btn_1').disabled=false;
			ss=60; 
			}
		}
	function check_num(){
			if(check_phone==""){
				alert("请点击获取验证码！");
				return false;
			}
			else{
				var log_txt=$("#log_txt").val();
				if(parseInt(check_phone)!=log_txt_1){
					alert("验证码不正确，请重新输入！");
					return false;
				}
				else{
					return true;
				}
			}
		}
	</script>
	
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
</body>
</html>