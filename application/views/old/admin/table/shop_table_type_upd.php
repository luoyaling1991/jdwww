<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?php echo constant('SYS_NAME');?>|添加餐桌分类</title>
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
								<a href="<?php echo site_url("admin/admin_table/table_type_list")?>">日常管理</a>
								<span class="icon-angle-right"></span>
							</li>
                            <li>
								<a href="<?php echo site_url("admin/admin_table/table_type_list")?>">餐桌分类管理</a>
								<span class="icon-angle-right"></span>
							</li>
							<li><a href="<?php echo site_url("admin/admin_table/table_type_update_show?type_id=").$type['type_id'];?>">编辑餐桌分类</a></li>
						</ul>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="portlet box myself">
							<div class="portlet-title">
								<div class="caption">&nbsp;&nbsp;&nbsp;编辑餐桌分类</div>
							</div>
							<div class="portlet-body form">
								<form method="post" action="<?php echo site_url("admin/admin_table/table_type_update")?>" onsubmit="return check_submit();" class="form-horizontal">
									
                                    
									<div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>餐桌分类名称：</label>
										<div class="controls">
											<input type="text" class="span6 m-wrap"  style="width:500px" name="type_name" id="type_name" value="<?php echo $type['type_name']?>"/>
											<span class="help-inline" id="type_name_1">餐桌分类请控制在4个字符以内.</span>
											<input type="hidden" name="type_id" id="type_id" value="<?php echo $type['type_id']?>" >
										</div>
									</div>
                                    
                                     <div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>是否上架：</label>
										<div class="controls">
											<label class="radio">
												<input type="radio" name="type_state" value="1" <?php if($type['type_state']==1){ echo "checked";}?>/>立即上架
											</label>
                                            <label class="radio">
												<input type="radio" name="type_state" value="0" <?php if($type['type_state']==0){ echo "checked";}?>/>暂不上架
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
			if($("#type_name").val()==""){
					$("#type_name").focus();
					$("#type_name_1").html("餐桌分类不能为空.");
					$("#type_name_1").css("color","red");				
					$num++;
			}
			if($("#type_name").val().length>4){
					$("#type_name").focus();
					$("#type_name_1").html("餐桌分类请控制在4个字符以内.");
					$("#type_name_1").css("color","red");
					$num++;
			}
			if($num>0){
				return false;
			}$(".btn_1").attr("disabled", "disabled");
		}
	</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
</body>
</html>