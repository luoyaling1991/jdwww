<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">
	<title>"简点"点餐|免费注册</title>
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
				<div style="float:left;margin-right: 20px;"><img src="/data/images/logo1.png"></div>
				<h2 style="color:#e65445;font-weight:bold;float:left;">欢迎注册</h2>
				<h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Welcome registration</h3>
			</div>
		</div>
		<div class="wrapper feed-element">
			<div class="row">
				<div class="col-lg-12">
					<div class="ibox float-e-margins">
						<form name="registerForm" id='registerForm' action="<?php echo site_url('web/reg/reg_do')?>" class="form-horizontal" onSubmit="return check_form();" method="post">
							<div class="form-group">
								<label class="col-sm-2 control-label">企业注册号</label>
								<div class="col-md-6">
									<input class="form-control" type="text" id="reg_num" name="reg_num" value=""  maxlength="18"/>
									<span id="reg_num_1"></span>
								</div>								<div class="col-md-4">
									<span class="text-danger">*</span>
									<label class="control-label" style="font-weight:normal;color:#a0a0a0;">用于登录系统的唯一账号</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">企业全名</label>
								<div class="col-md-6">
									<input class="form-control" type="text" id="shop_name" name="shop_name" value="" maxlength="20"/>
									<span id="shop_name_1"></span>
								</div>
								<div class="col-md-4">
									<span class="text-danger">*</span>
									<label class="control-label" style="font-weight:normal;color:#a0a0a0;">企业注册全称</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">登录密码</label>
								<div class="col-md-6">
									<input class="form-control" type="password"  id="password1" name="password1" value="" maxlength="32"/>
									<span id="password1_1"></span>
								</div>
								<div class="col-md-4">
									<span class="text-danger">*</span>
									<label class="control-label" style="font-weight:normal;color:#a0a0a0;">请输入至少6位数密码，区分大小写</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">确认密码</label>
								<div class="col-md-6">
									<input class="form-control" type="password" id="password2" name="password2" value="" maxlength="32"/>

								</div>
								<div class="col-md-4">
									<span class="text-danger">*</span>
									<label class="control-label" style="font-weight:normal;color:#a0a0a0;">请再次输入相同密码以验证准确性</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">权限密码</label>
								<div class="col-md-6">
									<input class="form-control" type="password" id="yz_password1" name="yz_password1" value=""/>
									<span id="yz_password1_1"></span>
								</div>
								<div class="col-md-4">
									<span class="text-danger">*</span>
									<label class="control-label" style="font-weight:normal;color:#a0a0a0;">请输入至少6位数密码，区分大小写，用于重要信息的查看、管理</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">确认密码</label>
								<div class="col-md-6">
									<input class="form-control" type="password" id="yz_password2" name="yz_password2" value=""/>
									<span id="yz_password2_1"></span>
								</div>
								<div class="col-md-4">
									<span class="text-danger">*</span>
									<label class="control-label" style="font-weight:normal;color:#a0a0a0;">请再次输入相同密码以验证准确性</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">安全邮箱</label>
								<div class="col-md-6">
									<input class="form-control" type="text" name="useremail" id="useremail" value=""/>
									<span id="useremail_1"></span>
								</div>
								<div class="col-md-4">
									<span class="text-danger">*</span>
									<label class="control-label text-danger" style="font-weight:normal;">用于密码修改、接收验证码等重要信息</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">安全手机</label>
								<div class="col-md-6">
									<input class="form-control" type="text" id="shop_mobile" name="shop_mobile" value=""/>
									<span id="shop_mobile_1"></span>
								</div>
								<div class="col-md-4">
									<span class="text-danger">*</span>
									<label class="control-label text-danger" style="font-weight:normal;">用于密码修改、接收验证码等重要信息</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">图形验证码</label>
								<div class="col-md-4">
									<input class="form-control" type="text" id="verify_text" name="verify_text" value="" maxlength="4"/>
									<span id="verify_text_1"></span>
								</div>
								<div class="col-md-2">
									<img src="<?php echo site_url("/web/yzm/verify_image");?>" onclick="changeCode();" alt="验证码" id="verify_code" class="yz_img" style="cursor: pointer;">
								</div>
								<div class="col-md-2">
									<span class="text-danger">*</span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">手机验证码</label>
								<div class="col-md-4">
									<input class="form-control" type="text" id="mail_no" name="mail_no" value="" maxlength="6"/>
								</div>
								<div class="col-md-2">
									<input type="button" class="btn btn-w-m btn-white" onclick="getKey(this);" value="获取验证码"></button><br>
									<span id="mail_no_1"></span>
								</div>
								<div class="col-md-2">
									<span class="text-danger">*</span>
									<label class="control-label" style="font-weight:normal;color:#a0a0a0;">注意查看手机拦截短信</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label"><input type="checkbox" id="agreement" value=""/></label>
								<label class="control-label"><a href="/user_agreement.html" target="_blank">我已阅读并接受《"简点"点餐用户注册服务协议》</a></label>
								<span id="input_div8"></span>
							</div>
							<div class="form-group" style="margin-top:55px;">
								<label class="col-sm-2 control-label"></label>
								<div class="col-md-6">
									<button id="btn" class="btn btn-w-m btn-primary" type="submit" >立即注册</button>
									<label class="col-sm-offset-1 control-label"><a href="<?php echo config_item("base_url") ?>">已有账号？</a></label>
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
	// 对用户的注册信息进行验证
	function check_form(){
		var agreenMent=$("#agreement").is(":checked");
		$("#shop_mobile_1").html('');
		var num_error=0;
		var reg_num= $("#reg_num").val();
		var shop_name= $("#shop_name").val();
		var shop_mobile=$("#shop_mobile").val();
		var mail_no=$("#mail_no").val();
		var userEmail=$("#useremail").val();
		var password1 =$("#password1").val();
		var password2 =$("#password2").val();
		var yz_password1 =$("#yz_password1").val();
		var yz_password2 =$("#yz_password2").val();
		try {
			$("#btn").text('注册中...').attr('disabled','disabled');
			if((reg_num.length!=18 && reg_num.length!=15) || isNaN(reg_num) || reg_num==""){
				$("#reg_num_1").html('<span style="color:red;">工商注册号格式不正确!</span>');
				$("#reg_num").focus();
				$("#btn").text('立即注册').removeAttr('disabled');
				num_error++;
			}else{
				$("#reg_num_1").html('');
			}
			if(shop_name==""){
				$("#shop_name_1").html('<span style="color:red;">商家名称不能为空哟!</span>');
				$("#shop_name").focus();
				$("#btn").text('立即注册').removeAttr('disabled');
				num_error++;
			}else{
				$("#shop_name_1").html('');
			}
			if(shop_mobile==""){
				check_phone="";
				$("#shop_mobile_1").html('<span style="color:red;">请填写手机号码!</span>');
				$("#shop_mobile").focus();
				$("#btn").text('立即注册').removeAttr('disabled');
				num_error++;
			}else{
				if(check_phone==""){
					$("#mail_no_1").html('<span style="color:red;">请先获取验证码再填写!</span>');
					$("#mail_no").focus();
					$("#btn").text('立即注册').removeAttr('disabled');
					num_error++;
				}else{
					if(shop_mobile!=shop_mobile_1 ){
						check_phone="";
						$("#shop_mobile_1").html('<span style="color:red;">手机号码变了，需要重新验证!</span>');
						$("#shop_mobile").focus();
						$("#btn").text('立即注册').removeAttr('disabled');
						num_error++;
					}else{
						if(parseInt(mail_no)!=parseInt(check_phone)){
							$("#mail_no_1").html('<span style="color:red;">验证码输入不正确!</span>');
							$("#mail_no").focus();
							$("#btn").text('立即注册').removeAttr('disabled');
							num_error++;
						}else{
							$("#mail_no_1").html('');
						}
					}
				}
			}
			if(!isEmail(userEmail) || userEmail==""){
				$("#useremail_1").html('<span style="color:red;">邮箱输入格式不正确!</span>');
				$("#useremail").focus();
				$("#btn").text('立即注册').removeAttr('disabled');
				num_error++;
			}else{
				$("#useremail_1").html('');
			}
			if(password1.length <6){
				$("#password1_1").html('<span style="color:red;">用户密码至少为6位!</span>');
				$("#password1").focus();
				$("#btn").text('立即注册').removeAttr('disabled');
				num_error++;
			}else{
				$("#password1_1").html('');
			}
			if(password2!=password1){
				$("#password2_1").html('<span style="color:red;">两次输入的密码不一致!</span>');
				$("#password2").focus();
				$("#btn").text('立即注册').removeAttr('disabled');
				num_error++;
			}else{
				$("#password2_1").html('');
			}
			if(yz_password1.length <6){
				$("#yz_password1_1").html('<span style="color:red;">用户管理权限密码至少为6位!</span>');
				$("#yz_password1").focus();
				$("#btn").text('立即注册').removeAttr('disabled');
				num_error++;
			}else{
				$("#yz_password1_1").html('');
			}
			if(yz_password2!=yz_password1){
				$("#yz_password2_1").html('<span style="color:red;">两次输入的密码不一致!</span>');
				$("#yz_password2").focus();
				$("#btn").text('立即注册').removeAttr('disabled');
				num_error++;
			}else{
				$("#yz_password2_1").html('');
			}
			if(agreenMent !== true){
				if(num_error==0){
					$("#input_div8").html('<span style="color:red;">请先同意用户条款!</span>');
					$("#btn").text('立即注册').removeAttr('disabled');
					return false;
					num_error++;
				}else{
					$("#input_div8").html('');
				}
			}else{
				$("#input_div8").html('');
			}
		}catch(e) {
			return false
		}
		if(num_error>0){
			//$("html,body").animate({scrollTop:0},200);
			return false;
		}
	}
	function isEmail(email){
		var myreg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
		if(!myreg.test(email)) return false;
		return true;
	}
	// 获取验证码计时器
	function getKeyTimer(obj){
		var current = 60;
		$(obj).attr('disabled','disabled');
		var val = $(obj).val(current+"秒后重新获取验证码");
		var interval = setInterval(function(){
			current--;
			if(current >= 0){
				$(obj).val(current+"秒后重新获取验证码");
			}else{
				$(obj).val("重新获取验证码").removeAttr('disabled');
				clearInterval(interval);
			}

		},1000);
	}
	// 发送短信验证码
	function getKey(obj){
		check_phone="";
		shop_mobile_1="";
		var reg = /^0?1[3|4|5|7|8][0-9]\d{8}$/;
		var shop_mobile=$("#shop_mobile").val();
		if(shop_mobile.length==11 && !isNaN(shop_mobile) && reg.test(shop_mobile)){
			//异步传输获取验证码
			$("#shop_mobile_1").html('');
			$.post('<?php echo site_url('/web/yzm/get_yzm')?>', function (e) {
				if(e==$("#verify_text").val()){
					$("#verify_text_1").html('');
					$.post('<?php echo site_url('/web/reg/send_mail_phone')?>', {shop_mobile:shop_mobile}, function (e) {
						check_phone=e;
						shop_mobile_1=shop_mobile;
						getKeyTimer(obj);
					});
				}else{
					$("#verify_text_1").html('<span style="color:red;">图形验证码不正确!</span>');
					$("#verify_text").focus();
				}
			});

		}
		else{
			$("#shop_mobile_1").html('<span style="color:red;">手机号码输入格式不正确!</span>');
			$("#shop_mobile").focus();
		}
	}
	// 刷新图形验证码
	function changeCode(){
		$("#verify_code").attr('src',"<?php echo site_url("/web/yzm/verify_image?r=");?>"+Math.random());
	}
</script>

</body>

</html>
