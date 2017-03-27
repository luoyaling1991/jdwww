<!doctype html>
<html>
<head>
    <meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <TITLE><?php echo constant('SYS_NAME');?>|系统管理</TITLE> 
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
								<a href="#">系统管理</a> 
								<span class="icon-angle-right"></span>
							</li>
							<li>
								<a href="#">账户设置</a>
								<span class="icon-angle-right"></span>
							</li>
							<li><a href="#">基本信息</a></li>
						</ul>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="portlet box myself">
							<div class="portlet-title">
								<div class="caption">&nbsp;&nbsp;&nbsp;基本信息</div>
							</div>
							<div class="portlet-body form" >
								<form action="<?php echo site_url('admin/admin_user/update_user')?>" class="form-horizontal" method="POST" onsubmit="return check_submit()">
                                	<h3 style="margin-top:-20px;">请完善以下信息,方便我们更好的为您服务！</h3>
									<div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>企业注册号:</label>
										<div class="controls">
											<input type="text" class="span6 m-wrap" style="width:335px;" value="<?php echo $user['reg_num']?>" disabled="disabled" name="reg_num"/>
											<span class="help-inline"><!-- 请填写正确的15位企业注册号. --></span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>餐厅名称：</label>
										<div class="controls">
											<input type="text" class="span6 m-wrap" style="width:335px;" value="<?php echo $user['shop_name']?>" name="shop_name" id="shop_name"/>
											<span class="help-inline" id="shop_name_1">请填餐厅名称.</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">餐厅简介：</label>
										<div class="controls">
                                        	<textarea class="span6 m-wrap" style="width:335px;height:90px;
                                            									max-width: 335px;max-height: 90px;" name="shop_desc" id="shop_desc"><?php echo $user['shop_desc']?></textarea>
											<span class="help-inline" style="padding-top:55px;" id='shop_desc_1'>请填写餐厅200字以内的简介.</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>联系人:</label>
										<div class="controls">
											<input type="text" class="span6 m-wrap" style="width:335px;" value="<?php echo $user['shop_person']?>" name="shop_person" id="shop_person"/>
											<span class="help-inline" id="shop_person_1">请输入联系人.</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>联系电话:</label>
										<div class="controls">
											<input type="text" class="span6 m-wrap" style="width:335px;" value="<?php echo $user['shop_phone']?>" name="shop_phone" id="shop_phone"/>
											<span class="help-inline" id="shop_phone_1">请输入联系电话.</span>
										</div>
									</div>
                                    <div class="control-group">
										<label name="province" class="control-label"><span class="required">*&nbsp;</span>所在区域:</label>
										<div class="controls">
											<select name="province" class="span2 m-wrap" style="width:110px;" data-placeholder="请选择省份" tabindex="1" id="province" onchange="province_submit(this.value)">
												<option value="0">请选择省份</option>
												<?php foreach ($province as $p){?>
												<option value="<?php echo $p['code']?>" <?php if ($_SESSION['admin_user']['shop_qx_1']== $p['code']) {
													echo "selected";
												}?>><?php echo $p['name']?></option>
												<?php }?>
											</select>
                                            <select name="city" class="span2 m-wrap" style="width:110px;" data-placeholder="请选择城市" tabindex="1" id="city_id" onchange="city_submit(this.value)">
												<option value="0">请选择城市</option>
												<?php foreach ($city as $c){?>
												<option value="<?php echo $c['code']?>"<?php if ($_SESSION['admin_user']['shop_qx_2']== $c['code']) {
													echo "selected";
												}?>><?php echo $c['name']?></option>
												<?php }?>
											</select>
                                            <select name="area" class="span2 m-wrap" style="width:110px;" data-placeholder="请选择区县" tabindex="1" id="area_id">
												<option value="0">请选择区县</option>
												<?php foreach ($area as $a){?>
												<option value="<?php echo $a['code']?>"<?php if ($_SESSION['admin_user']['shop_qx_3']== $a['code']) {
													echo "selected";
												}?>><?php echo $a['name']?></option>
												<?php }?>
											</select>
											<span class="help-inline" id="area_id_1">请选择区域.</span>
										</div>
									</div>
                                    
                                    <div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>联系地址:</label>
										<div class="controls">
											<input type="text" class="span6 m-wrap" style="width:335px;" value="<?php echo $user['shop_address']?>" id="shop_address" name="shop_address"/>
											<span class="help-inline" id="area_id_2">请输入联系地址.</span>
										</div>
									</div>
                                   <div class="controls">
                                            <button type="submit" class="btn_1">确认提交</button>
    										&nbsp;&nbsp;&nbsp;
                                            <button type="reset" class="btn_2">重置所有</button>                            
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
	var city_list=<?php echo $city_list?>;
	var area_list=<?php echo $area_list?>;
	function province_submit(code){
		var data=eval(city_list);
		$("#city_id").html("");
	  	$("#city_id option").remove();
	    $("#city_id").append("<option value='0'>请选择城市</option>");
	    var num=0;
		 $.each(data, function(i, item) {
			if(code==item.provincecode){
				 $("#city_id").append("<option value='"+item.code+"'>"+item.name+"</option>");
				 num++;
			}
	     });		 
		 if(num==0){
			 $("#city_id").append("<option value='0' style='color:red;'>暂无数据！</option>");
		}
		 $("#area_id").html("");
		 $("#area_id option").remove();
		 $("#area_id").append("<option value='0'>请选择区县</option>");
		}
	function city_submit(code){
		var data=eval(area_list);
		$("#area_id").html("");
	  	$("#area_id option").remove();
	    $("#area_id").append("<option value='0'>请选择区县</option>");
	    var num=0;
		 $.each(data, function(i, item) {
			if(code==item.citycode){
				 $("#area_id").append("<option value='"+item.code+"'>"+item.name+"</option>");
				 num++;
			}
	     });
		 if(num==0){
			 $("#area_id").append("<option value='0' style='color:red;'>暂无数据！</option>");
		}
		}
	function check_submit(){
		var num=0;
		var shop_name=$("#shop_name").val();
		var shop_person=$("#shop_person").val();
		var shop_phone=$("#shop_phone").val();
		var shop_desc=$("#shop_desc").val();
		var prvoince=$("#province").val();
		var city= $("#city_id").val();
		var area= $("#area_id").val();
		var reg = /^0?1[3|4|5|7|8][0-9]\d{8}$/;
		if(shop_name==''){
			$("#shop_name").focus();
			$("#shop_name_1").html("餐厅名称不能为空.");
			$("#shop_name_1").css("color","red");				
			num++;
			}else if(shop_name.length>20){
			$("#shop_name").focus();
			$("#shop_name_1").html("餐厅名称不能超过20.");
			$("#shop_name_1").css("color","red");				
			num++;
			}else{
				$("#shop_name_1").html("请填餐厅名称.");
				$("#shop_name_1").css("color","#999999");
			}
			if(shop_desc.length > 200){
			$("#shop_desc").focus();
			$("#shop_desc_1").html("餐厅简介不能超过200.");
			$("#shop_desc_1").css("color","red");				
			num++;
			}else{
				$("#shop_desc_1").html("请填写餐厅200字以内的简介.");
				$("#shop_desc_1").css("color","#999999");	
				}
		if(shop_person==''){
			$("#shop_preson").focus();
			$("#shop_person_1").html("联系人不能为空.");
			$("#shop_person_1").css("color","red");	
			num++;	
			}else if(shop_person.length>10){
				$("#shop_preson").focus();
				$("#shop_person_1").html("联系人名字不能超过10.");
				$("#shop_person_1").css("color","red");	
				num++;
				}else{
					$("#shop_person_1").html("请输入联系人.");
					$("#shop_person_1").css("color","#999999");	
					}
		if(!reg.test(shop_phone)){
			$("#shop_phone").focus();
			$("#shop_phone_1").html("联系电话不正确.");
			$("#shop_phone_1").css("color","red");	
			num++;
			}else{
				$("#shop_phone_1").html("请输入联系电话.");
				$("#shop_phone_1").css("color","#999");	
				}
		if(province==0||city==0||area==0){
			$("#area_id_1").css("color","red");	
			num++;
			}
		else{
			$("#area_id_1").css("color","#999");	
			}
		if($("#shop_address").val()==''){
			$("#area_id_2").css("color","red");	
			num++;
			}
		else{
			$("#area_id_2").css("color","#999");	
			}
		if(num>0){
			return false;
			}else{
			$(".btn_1").attr("disabled", "disabled");
		}
		}
	
	</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>

<!-- END BODY -->

</html>