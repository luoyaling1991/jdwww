<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?php echo constant('SYS_NAME');?>|修改商品</title>
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
								<span class="icon-angle-right"></span>
							</li>
							<li>
								<a href="<?php echo site_url("sys/admin_vip")?>">日常管理</a>
								<span class="icon-angle-right"></span>
							</li>
							<li>
								<a href="<?php echo site_url("sys/admin_vip")?>">充值商品</a>
								<span class="icon-angle-right"></span>
							</li>
							<li>
								<a href="<?php echo site_url("sys/admin_vip/upd_show?v_id=").$one['v_id'];?>">编辑充值</a>
								<span class="icon-angle-right"></span>
							</li>
						</ul>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="portlet box myself">
							<div class="portlet-title">
								<div class="caption">&nbsp;&nbsp;&nbsp;新增充值</div>
							</div>
							<div class="portlet-body form">
								<form action="<?php echo site_url("sys/admin_vip/upd");?>" class="form-horizontal" method="post" 
									onsubmit="return check_submit();" enctype='multipart/form-data'>
									<div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>商品标题：</label>
										<div class="controls">
											<input type="text" class="span6 m-wrap" style="width:500px;" name="v_name" id="v_name" value="<?php echo $one['v_name'];?>"/>
											<input type="hidden" name="v_id" id="v_id" value="<?php echo $one['v_id'];?>"/>
											<span class="help-inline" id="v_name_1">商品标题请控制在30个字符以内.</span>
										</div>
									</div>
									<div class="control-group" >
										<label class="control-label"><span class="required">*&nbsp;</span>商品描述：</label>
										<div class="controls">
											<textarea style="width:485px;" name="v_desc" id="v_desc"><?php echo $one['v_desc'];?></textarea>
											<span class="help-inline" id="v_desc_1">商品描述请控制在300个字符以内.</span>
										</div>
									</div>
									<div class="control-group" >
										<label class="control-label"><span class="required">*&nbsp;</span>商品原价：</label>
										<div class="controls">
                                        	<input type="text" class="span2 m-wrap"  placeholder="只能填写数字" style="float:left;width:200px;" value="<?php echo $one['v_old_money'];?>" name="v_old_money" id="v_old_money"/>
                                            <span style="float:left;margin-top:5px;display:block;color:#999999;">&nbsp;元&nbsp;<font id="old_price"></font>&nbsp;&nbsp;</span>
                                            <span style="float:left;margin-top:5px;display:block;" id="v_old_money_1"></span>
                                        </div>
                                    </div>
                                    <div class="control-group" >
										<label class="control-label"><span class="required">*&nbsp;</span>优惠现价：</label>
										<div class="controls">
                                        	<input type="text" class="span2 m-wrap"  placeholder="只能填写数字" style="float:left;width:200px;" value="<?php echo $one['v_money'];?>" name="v_money" id="v_money"/>
                                            <span style="float:left;margin-top:5px;display:block;color:#999999;">&nbsp;元&nbsp;<font id="old_price"></font>&nbsp;&nbsp;</span>
                                            <span style="float:left;margin-top:5px;display:block;" id="v_money_1"></span>
                                        </div>
                                    </div>
                                    <div class="control-group" >
										<label class="control-label"><span class="required">*&nbsp;</span>续费时长：</label>
										<div class="controls">
                                        	<input type="text" class="span2 m-wrap"  placeholder="只能填写数字" style="float:left;width:200px;" value="<?php echo $one['v_month'];?>" name="v_month" id="v_month"/>
                                            <span style="float:left;margin-top:5px;display:block;color:#999999;">&nbsp;月&nbsp;<font id="old_price"></font>&nbsp;&nbsp;</span>
                                            <span style="float:left;margin-top:5px;display:block;" id="v_month_1"></span>
                                        </div>
                                    </div>
                                    <div class="control-group" >
										<label class="control-label"><span class="required">*&nbsp;</span>赠送时长：</label>
										<div class="controls">
                                        	<input type="text" class="span2 m-wrap"  placeholder="只能填写数字" style="float:left;width:200px;" value="<?php echo $one['v_add_month'];?>" name="v_add_month" id="v_add_month" value='0'/>
                                            <span style="float:left;margin-top:5px;display:block;color:#999999;">&nbsp;月&nbsp;<font id="old_price"></font>&nbsp;&nbsp;</span>
                                            <span style="float:left;margin-top:5px;display:block;" id="v_add_month_1"></span>
                                        </div>
                                    </div>
                                   
                                    <div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>是否启用：</label>
										<div class="controls">
											<label class="radio">
												<input type="radio" name="v_state" value="1" checked/>立即启用
											</label>
                                            <label class="radio">
												<input type="radio" name="v_state" value="0" />暂不启用
											</label>
                                        </div>
                                     </div>
                                    <div class="control-group">
										<div class="controls">
                                            <button type="submit" class="btn_1">确认提交</button>
    										&nbsp;&nbsp;&nbsp;
                                            <button type="reset" class="btn_2">重置所有</button>                            
										</div>
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
	function check_submit(){
		var err_num=0;
		if($("#v_name").val()==""){
			$("#v_name_1").html("商品标题不能为空.");
			$("#v_name_1").css("color","red");
			err_num++;
		}else{
			$("#v_name_1").hide();
		}
		if($("#v_desc").val()==""){
			$("#v_desc_1").html("商品描述不能为空.");
			$("#v_desc_1").css("color","red");
			err_num++;
		}else{
			$("#v_desc_1").hide();
		}
		if($("#v_old_money").val()==""){
			$("#v_old_money").focus();
			$("#v_old_money_1").html("请填写商品原价.");
			$("#v_old_money_1").css("color","red");				
			err_num++;
		}else{
			if(isNaN($('#v_old_money').val())){
				$("#v_old_money").focus();
				$("#v_old_money_1").html("商品原价只能填写数字.");
				$("#v_old_money_1").css("color","red");				
				err_num++;
			}else{
				$("#v_old_money_1").hide();
			}
		}
		if($("#v_money").val()==""){
			$("#v_money").focus();
			$("#v_money_1").html("请填写优惠现价.");
			$("#v_money_1").css("color","red");				
			err_num++;
		}else{
			if(isNaN($('#v_money').val())){
				$("#v_money").focus();
				$("#v_money_1").html("优惠现价只能填写数字.");
				$("#v_money_1").css("color","red");				
				err_num++;
			}else{
				$("#v_money_1").hide();
			}
		}
		if($("#v_month").val()==""){
			$("#v_month").focus();
			$("#v_month_1").html("请填写续费时长.");
			$("#v_month_1").css("color","red");				
			err_num++;
		}else{
			if(isNaN($('#v_month').val())){
				$("#v_month").focus();
				$("#v_month_1").html("续费时长只能填写数字.");
				$("#v_month_1").css("color","red");				
				err_num++;
			}else{
				$("#v_month_1").hide();
			}
		}
		if($("#v_add_month").val()==""){
			$("#v_add_month").focus();
			$("#v_add_month_1").html("请填写赠送时长.");
			$("#v_add_month_1").css("color","red");				
			err_num++;
		}else{
			if(isNaN($('#v_add_month').val())){
				$("#v_add_month").focus();
				$("#v_add_month_1").html("赠送时长只能填写数字.");
				$("#v_add_month_1").css("color","red");				
				err_num++;
			}else{
				$("#v_add_month_1").hide();
			}
		}
		
		if(err_num>0){
			return false;
		}
	}
		jQuery(document).ready(function() {       
		   App.init();
		   FormComponents.init();
		});
	</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
</body>
</html>