<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">
	<title>"简点"点餐&nbsp;|&nbsp;找回密码</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<link href="/data/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
	<link href="/data/font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet">
	<link href="/data/css/style.css?v=2.2.0" rel="stylesheet">
</head>
<style type="text/css">
	.form-group{
		margin:30px auto;
	}
</style>
<body class="gray-bg">
<div id="wrapper">
	<div class="dashbard-1">
		<div class="row wrapper border-bottom page-heading">
			<div class="col-lg-10" style="margin-left:12%;margin-top:30px;">
				<div style="float:left;"><img src="/data/images/logo1.png"></div>
				<h2 style="color:#e65445;font-weight:bold;float:left;margin-left:30px;">找回密码</h2>
				<h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Find password</h3>
			</div>
		</div>
		<div class="wrapper feed-element" id="next_content">
			<div class="row">
				<div class="col-lg-12">
					<div class="ibox float-e-margins">
						<form name="registerForm" id='registerForm' action="<?php echo site_url("web/lose/upd_pwd")?>"  onSubmit="return check_form();"
							  method="post" class="form-horizontal">
							<div class="form-group">
								<label class="col-md-2 control-label">新密码</label>
								<div class="col-md-6">
									<input class="form-control" type="password" id="password1" name="password1" value=""/>
									<span id="password1_1"></span>
									<input type="hidden" name="old_pwd" value="<?php echo $one['shop_pwd']?>" />
									<input type="hidden" name="shop_id" value="<?php echo $one['shop_id']?>" />
									<input type="hidden" name="reg_num" value="<?php echo $one['reg_num']?>" />
								</div>
									<div class="col-md-4">
									<span class="text-danger">*</span>
									<label class="control-label text-muted" style="font-weight:normal;">请至少输入<span class="text-danger">6</span>数密码，区分大小写</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">再次输入</label>
								<div class="col-md-6">
									<input class="form-control" type="password" id="password2" name="password2" value=""/>
									<span id="password2_1"></span>
								</div>
								<div class="col-md-4">
									<span class="text-danger">*</span>
									<label class="control-label text-muted" style="font-weight:normal;">请再次输入相同密码以验证正确性</label>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-2"></div>
								<div class="col-md-4">
									<button id="btn" class="btn btn-w-m btn-primary" type="submit" >完&nbsp;&nbsp;成</button>
									<label class="col-sm-offset-1 control-label"><a href="<?php echo config_item("base_url");?>">想起密码了？</a></label>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Mainly scripts -->
<script src="/data/javascript/jquery-2.1.1.min.js"></script>
<script src="/data/javascript/bootstrap.min.js?v=3.4.0"></script>
<script>
	var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
	document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F5d12e2b4eed3b554ae941c0ac43c330a' type='text/javascript'%3E%3C/script%3E"));
	function check_form(){
		var num_error=0;
		var password1 =$("#password1").val();
		var password2 =$("#password2").val();
		$("#btn").text('提交中...').attr('disabled','disabled');
		if(password1==""){
			$("#password1_1").html('<font color=red>用户密码不能为空!</font>');
			$("#password1").focus();
			$("#btn").text('完&nbsp;&nbsp;成').removeAttr('disabled');
			num_error++;
		}else{
			$("#password1_1").html('');
		}
		if(password2!=password1){
			$("#password2_1").html('<font color=red>两次输入的密码不一致!</font>');
			$("#password2").focus();
			$("#btn").text('完&nbsp;&nbsp;成').removeAttr('disabled');
			num_error++;
		}else{
			$("#password2_1").html('');
		}

		if(num_error>0){
			//$("html,body").animate({scrollTop:0},200);
			return false;
		}
	}
</script>
</body>
</html>
