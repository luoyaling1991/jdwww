<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?php echo constant('SYS_NAME');?>|添加餐桌</title>
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
								<a href="<?php echo site_url("admin/admin_index/main_right")?>">系统介绍</a> 
								<span class="icon-angle-right"></span>
							</li>
							<li>
								<a href="<?php echo site_url("admin/admin_table/table_list")?>">日常管理</a>
								<span class="icon-angle-right"></span>
							</li>
							<li>
                            	<a href="<?php echo site_url("admin/admin_table/table_list")?>">餐桌管理</a>
                            	<span class="icon-angle-right"></span>
                            </li>
							<li><a href="<?php echo site_url("admin/admin_table/table_add_show")?>">添加餐桌</a></li>
						</ul>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="portlet box myself">
							<div class="portlet-title">
								<div class="caption">&nbsp;&nbsp;&nbsp;添加餐桌</div>
							</div>
							<div class="portlet-body form">
								<form action="<?php echo site_url("admin/admin_table/table_add")?>" class="form-horizontal" method="post" onsubmit="return check_submit();">
									<?php 
										if($tishi!=""){
											echo "<div class='control-group'>
													<label class='control-label'></label>
													<div class='controls'>
														<span class='required' style='color:red;'>*系统提示：&nbsp;{$tishi}</span>
													</div>
												</div>";
										}
									?>
									<div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>餐桌桌号：</label>
										<div class="controls">
											<input type="text" class="span6 m-wrap" style="width:500px;" name="tab_name" id="tab_name"/>
											<span class="help-inline" id="tab_name_1">餐桌桌号请控制在4个字以内.</span>
										</div>
									</div>
                                    <div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>容客人数：</label>
										<div class="controls">
											<input type="text" class="span2 m-wrap"   style="float:left;width:200px;" name="tab_person" id="tab_person"/>
                                                <span style="float:left;margin-top:5px;display:block;color:#999999;">&nbsp;客&nbsp;&nbsp;&nbsp;</span>
                                                <span style="float:left;margin-top:5px;display:block;color:#999999;" id="tab_person_1"></span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>餐桌使用费：</label>
										<div class="controls">
                                                	<input type="text" class="span2 m-wrap"   style="float:left;width:200px;" value="0" name="tab_price" id="tab_price"/>
                                                <span style="float:left;margin-top:5px;display:block;color:#999999;">&nbsp;元&nbsp;&nbsp;&nbsp;(包间费)</span>
                                                <span style="float:left;margin-top:5px;display:block;color:#999999;" id="tab_price_1"></span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>所属分类：</label>
										<div class="controls">
                                        	<select  style="width:200px;" name="type_id" id="type_id">
                                        			<?php 
                                        				foreach ($type_list as $row){
                                        					$type_id=$row['type_id'];
                                        					$type_name=$row['type_name'];
                                        					echo "<option value='$type_id'>$type_name</option>";
                                        				}
                                        			?>
										   </select>
										   <span class="help-inline" id="">选择餐桌分类.</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>是否启用：</label>
										<div class="controls">
											<label class="radio">
												<input type="radio" name="tab_state" value="1" style="margin-left:0px;width:25px;" checked/>立即启用
											</label>
                                            <label class="radio">
												<input type="radio" name="tab_state" value="0" style="margin-left:10px;width:25px;"/>暂不启用
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
		jQuery(document).ready(function() {       
		   App.init();
		   FormComponents.init();
		});
		function check_submit(){
			$num=0;
			if($("#tab_name").val()==""){
					$("#tab_name").focus();
					$("#tab_name_1").html("餐桌桌号不能为空.");
					$("#tab_name_1").css("color","red");				
					$num++;
			}else{
				if($("#tab_name").val().length>4){
					$("#tab_name").focus();
					$("#tab_name_1").html("餐桌桌号请控制在4个字符以内.");
					$("#tab_name_1").css("color","red");
					$num++;
				}else{
					$("#tab_name_1").css("color","#999999");
				}
			}
			if($("#tab_price").val()==""){
				$("#tab_price").focus();
				$("#tab_price_1").html("请填写餐桌使用费，如果没有餐桌使用费请填写0.");
				$("#tab_price_1").css("color","red");				
				$num++;
			}else{
				if(isNaN($('#tab_price').val())){
					$("#tab_price").focus();
					$("#tab_price_1").html("餐桌使用费只能填写数字.");
					$("#tab_price_1").css("color","red");				
					$num++;
				}else{
					$("#tab_price_1").hide();
				}
			}
			
			if($("#tab_person").val()==""){
				$("#tab_person").focus();
				$("#tab_person_1").html("请填写容客人数.");
				$("#tab_person_1").css("color","red");
				$num++;
			}else{					
				if(isNaN($('#tab_person').val())){
					$("#tab_person").focus();
					$("#tab_person_1").html("容客数字只能填写数字.");
					$("#tab_person_1").css("color","red");
					$num++;
				}else{
					$("#tab_person_1").hide();
				}
			}

			if($num>0){
				return false;
			}$(".btn_1").attr("disabled", "disabled");
		}
	</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
</body>
</html>