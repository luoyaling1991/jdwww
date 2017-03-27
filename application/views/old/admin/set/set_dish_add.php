<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?php echo constant('SYS_NAME');?>|新建套餐</title>
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
</style>
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
<div >
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<br>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo site_url("admin/admin_index/main_right")?>">系统介绍</a> 
								<span class="icon-angle-right"></span>
							</li>
							<li>
								<a href="<?php echo site_url("admin/admin_set/set_list")?>">日常管理</a>
								<span class="icon-angle-right"></span>
							</li>
                            <li>
								<a href="<?php echo site_url("admin/admin_set/set_list")?>">套餐管理</a>
								<span class="icon-angle-right"></span>
							</li>
							<li><a href="<?php echo site_url("admin/admin_set/set_add_show")?>">发布套餐</a></li>
						</ul>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="portlet box myself border_none">
							<div class="portlet-title">
								<div class="caption">&nbsp;&nbsp;&nbsp;发布套餐</div>
							</div>
							<div class="portlet-body form ">
								<form action="<?php echo site_url("admin/admin_set/set_add");?>" class="form-horizontal" method="post" onsubmit="return check_submit();" enctype='multipart/form-data'>
									<div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>套餐名称：</label>
										<div class="controls">
											<input type="text" class="span4 m-wrap" style="width:500px;" name="set_name" id="set_name" onchange="name_check();"/>
											<span class="help-inline" id="set_name_1">套餐名称请控制在6个字以内.</span>
										</div>
									</div>
									
									<div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>套餐介绍：</label>
										<div class="controls">
                                        	<textarea class="span6 m-wrap" style="width:500px;height:90px;
                                            				max-width: 500px;max-height: 90px;" name="set_desc" id="set_desc"></textarea>
											<span class="help-inline" style="padding-top:55px;" id="set_desc_1">套餐介绍请控制在100字以内.</span>
										</div>
									</div>
									
                                    <div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>图片上传：</label>
										<div class="controls" style="padding-top:13px;border:#D7D7D7 1px solid;
                                        							background-color:#F8F8F8;width:800px;height:330px;">
											<table>
                                            	<tr>
                                                	<td style="width:20px;">&nbsp;</td>
                                                	<td class="tab_class_td_active" id="show_1" >套餐图片</td>
                                                    <td></td>
                                                </tr>
                                                <tbody id="tab_1">
                                                <tr style="position: relative;visibility: visible;z-index: 5;">
                                                	<td colspan="5" class="tab_upload">
                                                    		<table class="class_img_upload_tab">
                                                            	<tr>
                                                                	<td style="padding-bottom:8px;color:#404040;">
                                                                     选择本地图片：
                                                                    </td>
                                                                	<td>
                                                                    	<span class="btn mini green fileinput-button">
                                                                            <i class="icon-plus icon-white"></i>
                                                                            <span>图片上传</span>
                                                                            <input type="file" name="file1" id="file1" onchange="return ajaxFileUpload();" />
                                                           				</span><font color="e02222" id="show_1_tishi" style="display:none;">无法继续上传图片.</font>
                                                                    </td>
                                                                </tr>
                                                               <tr>
                                                                	<td></td>
                                                                	<td style="padding-top:14px;color:#aaaaaa;">
                                                                   		提示：本地上传图片大小不能超过<font color="e02222">500k</font>。
                                                                    </td>
                                                                </tr>
                                                                 <tr>
                                                                 	<td></td>
                                                                	<td style="padding-top:7px;color:#aaaaaa;">
                                                                   		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                          您需要上传<font color="e02222">1</font>张小图(用于一般显示)
                                                                          <font color="e02222">1</font>张大图(用于详情显示)。
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td style="padding-left:15px;padding-top:5px;color:#aaaaaa;">
                                                                    	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        上传图片最佳尺寸
                                                                        &nbsp;&nbsp;<font color="e02222">800*600</font>(小图)
                                                                        <font color="e02222">1600*600</font>(大图)
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                	<td colspan="5">
                                                    	<table style="margin-left:15px;margin-top:10px;">
                                                        	<tr>
                                       <td>
                                                                	<div class="div_class_img_small">
                                                                        <img src="<?php echo constant('ADMIN_SRC');?>media/upload/set_1.png" style="width:136px;height:100px;" 
                                                                        		class="tooltips" id="img_1"
                                                                            	 data-trigger="hover" data-original-title="点击查看大图"/>
                                                                         <input type="hidden" id="value_1" name="value_1">
                                                                         <div class="div_class_img_small_a">
                                                                         		<a href="javascript:switch_img('1','2','s','1');" >
                                                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/z.png" style="margin-bottom:5px;"/>
                                                                                </a>
                                                                                <a href="javascript:switch_img('1','2','x','1');" >
                                                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/Y.png" 
                                                                                    style="margin-left:10px;margin-bottom:5px;"/>
                                                                                </a>
                                                                                <a href="javascript:remove_img('1');" >
                                                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/red_x.png" 
                                                                                    style="margin-left:60px;margin-bottom:4px;"/>
                                                                                </a>
                                                                         </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                	<div class="div_class_img_small_1">
                                                                    	<img src="<?php echo constant('ADMIN_SRC');?>media/upload/set_2.png" style="width:300px;height:100px;" 
                                                                        		class="tooltips" id="img_2"
                                                                            	 data-trigger="hover" data-original-title="点击查看大图"/>
                                                                         <input type="hidden" id="value_2" name="value_2">
                                                                         <div class="div_class_img_small_a">
                                                                                <a href="javascript:switch_img('1','2','s','2');" >
                                                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/z.png" style="margin-bottom:5px;"/>
                                                                                </a>
                                                                                <a href="javascript:switch_img('1','2','x','2');" >
                                                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/Y.png" 
                                                                                    style="margin-left:10px;margin-bottom:5px;"/>
                                                                                </a>
                                                                                <a href="javascript:remove_img('2');" >
                                                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/red_x.png" 
                                                                                    style="margin-left:223px;margin-bottom:4px;"/>
                                                                                </a>
                                                                         </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                </tbody>
                                                
                                            </table>
										</div>
									</div>
                                    
                                    <div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>添加单品：</label>
										<div class="controls">
                                        	<div  style="float:left;width:400px;">
                                        	<input type="hidden" name="set_list" id="set_list" value=""/>
                                                 <table width="100%" style="text-align:left;">
                                                 		<tr style="color:#FFF;line-height:34px;background-color:#E02222;" >
                                                        	<th colspan="6" align="left">
                                                           			&nbsp;&nbsp;&nbsp;套餐菜品
                                                            </th> 
                                                        </tr>
                                                        <tr style="line-height:28px;background-color:#D2D2D2;" >
                                                            <th width="35px" style="padding-left:15px;">ID</th>
                                                            <th width="95px">排序</th>
                                                            <th width="105px">单品名称</th>
                                                            <th width="65px">单价</th>
                                                            <th width="60px" align="center">数量</th>
                                                            <th width="20px"></th>
                                                        </tr>
                                                  </table>
												<div style="width:99.5%;height:230px;border:1px #ccc solid;overflow-y:auto;">
                                                    <table width="100%" class="tab_set" id="tab_set_list">
                                                        <tr>
                                                            <td  style="padding-left:15px;color:red;">请从右侧菜品中选择菜品添加至套餐.</td>
                                                        </tr>
                                                        
                                                    </table>
                                                 </div>
                                            </div>
                                            <div style="width:44px;float:left;">
                                            	<img src="<?php echo constant('ADMIN_SRC');?>media/img/jt.png" width="34px" style="margin-left:5px;margin-right:5px;margin-top:130px"/>
                                            </div>
											<div 	style="float:left;width:300px;">
                                                 <table width="100%" style="text-align:left;">
                                                 		 <tr style="color:#FFF;line-height:34px;background-color:#6EC169;" >
                                                        	<th colspan="5" align="left">
                                                           			&nbsp;&nbsp;&nbsp;所有菜品
                                                            </th> 
                                                        </tr>
                                                        <tr style="line-height:28px;background-color:#D2D2D2;">
                                                            <th width="35px" style="padding-left:20px;" >ID</th>
                                                            <th width="105px" >单品名称</th>
                                                            <th width="63px" >单价</th>
                                                            <th width="50px">销量</th>
                                                            <th width="20px"></th>
                                                        </tr>
                                                 </table>
												<div style="width:99.3%;height:230px;border:1px #ccc solid;overflow-y:auto;">
                                                    <table width="100%" class="tab_set" id="tab_dish_list">
                                                    
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="mydiv_white" >
                                            	<label class="radio line ">
                                                    <input type="radio" name="sys_type" id="sys_type" value="0" onChange="check_type('0');" checked/>全部
                                                </label>
                                                
                                                <label class="radio line line_height">
                                                    <input type="radio" name="sys_type" id="sys_type" value="1"  onChange="check_type('1');" />菜
                                                </label>
                                                <label class="line line_height check_ed_class" id="show_select_1" style="display:none;padding-left:20px;">
                                                	<select  style="width:80px;font-size:12px;height:26px;" name="sys_type_1" id="sys_type_1" onChange="check_type('1');">
                                                        <option value="-1">不限</option>
                                                        <option value="1">荤菜</option>
                                                        <option value="2">素菜</option>
                                                 	</select>
                                                </label>
                                                <label class="line line_height check_ed_class"  id="show_select_2" style="display:none;padding-left:20px;">
                                                    <select  style="width:80px;font-size:12px;height:26px;" name="sys_type_2" id="sys_type_2" onChange="check_type('1');">
                                                    	<option value="-1">不限</option>
                                                        <option value="1">凉菜</option>
                                                        <option value="2">热菜</option>
                                                    </select>
                                                </label>
                                                <label class="radio line line_height">
                                                    <input type="radio" name="sys_type" id="sys_type" value="2"  onChange="check_type('2');"/>汤
                                                </label>  
                                                <label class="radio line line_height">
                                                    <input type="radio" name="sys_type" id="sys_type" value="3" onChange="check_type('3');"/>小吃
                                                </label> 
                                                <label class="radio line line_height">
                                                    <input type="radio" name="sys_type" id="sys_type" value="4" onChange="check_type('4');"/>酒水
                                                </label> 
                                                <label class="radio line line_height">
                                                    <input type="radio" name="sys_type" id="sys_type" value="5" onChange="check_type();"/>其它
                                                </label>  
                                                
											</div>
                                            
										</div>
									</div>
                                    <div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>套餐价格：</label>
										<div class="controls">
                                              	<input type="text" class="span2 m-wrap"  placeholder="只能填写数字" style="float:left;width:200px;" name="set_price" id="set_price"/>
                                                <span style="float:left;margin-top:5px;display:block;color:#999999;">&nbsp;元&nbsp;<font id="old_price"></font>&nbsp;&nbsp;</span>
                                                <span style="float:left;margin-top:5px;display:block;" id="set_price_1"></span>
                                                
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>所属分类：</label>
										<div class="controls" id="type_list_show">
										
											<?php 
												$num=0;
												foreach ($type_list as $row){
													$num++;
													$type_id=$row['type_id'];
													$type_name=$row['type_name'];
													echo "<label class='checkbox'>
															<input type='checkbox' name='dish_type[]' value='{$type_id}' />{$type_name}
														  </label>";
													if($num%8==0){
														echo "<br>";
													}
												}
												if($num==0){
													echo "<font color='red'>请先添加菜品分类信息.</font>";
												}
											?>
											<br>
                                          
                                            <button type="button" onclick="dish_type_add();" class="btn_3">添加分类</button>
                                            <span class="help-inline"  id="dish_type_1"></span>
										</div>
									</div>
                                    <div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>是否上架：</label>
										<div class="controls">
											<label class="radio">
												<input type="radio" name="set_state" value="1" checked/>立即上架
											</label>
                                            <label class="radio">
												<input type="radio" name="set_state" value="0" />暂不上架
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
	var name_ok=1;
	function name_check(){
		if($("#set_name").val()==""){
			$("#set_name").focus();
			$("#set_name_1").html("套餐名称不能为空.");
			$("#set_name_1").css("color","red");				
			err_num++;
		}else{
			if($("#set_name").val().length>6){
				$("#set_name").focus();
				$("#set_name_1").html("套餐名称请控制在6个字符以内.");
				$("#set_name_1").css("color","red");
				err_num++;
			}else{
				var set_name=$("#set_name").val();
				$.post('<?php echo site_url('admin/admin_set/check_name')?>',{set_name:set_name,set_id:0},function (data){
					data=eval(data);
					if(data==0){
						$("#set_name").focus();
						name_ok=0;
						$("#set_name_1").html("已存在同名套餐，请核实后调整.");
						$("#set_name_1").css("color","red");
					}else{
						name_ok=1;
						$("#set_name_1").css("color","#999999");
					}
				});
			}
		}

    }
	function check_submit(){
		var err_num=0;
		if($("#set_name").val()==""){
				$("#set_name").focus();
				$("#set_name_1").html("套餐名称不能为空.");
				$("#set_name_1").css("color","red");				
				err_num++;
		}else{
			if($("#set_name").val().length>6){
				$("#set_name").focus();
				$("#set_name_1").html("套餐名称请控制在6个字符以内.");
				$("#set_name_1").css("color","red");
				err_num++;
			}else{
				if(name_ok!=1){
					$("#set_name_1").html("已存在同名套餐，请核实后调整.");
					$("#set_name_1").css("color","red");
					err_num++;
				}else{
					$("#set_name_1").css("color","#999999");
				}
				
			}
		}
		if($("#set_price").val()==""){
			$("#set_price").focus();
			$("#set_price_1").html("请填写套餐价格.");
			$("#set_price_1").css("color","red");				
			err_num++;
		}else{
			if(isNaN($('#set_price').val())){
				$("#set_price").focus();
				$("#set_price_1").html("套餐价格只能填写数字.");
				$("#set_price_1").css("color","red");				
				err_num++;
			}else{
				$("#set_price_1").hide();
			}
		}
		if($("#set_desc").val()==""){
			$("#set_desc").focus();
			$("#set_desc_1").html("套餐介绍不能为空.");
			$("#set_desc_1").css("color","red");				
			err_num++;
		}else{
			if($("#set_desc").val().length>100){
				$("#set_desc").focus();
				$("#set_desc_1").html("套餐介绍请控制在100个字符以内.");
				$("#set_desc_1").css("color","red");
				err_num++;
			}else{
				$("#set_desc_1").css("color","#999999");
			}
		}
		$check_num=$("input[type='checkbox']:checked").length;
	    if($check_num==0){
	    	$("#dish_type_1").html("请为套餐分配菜品分类.");
			$("#dish_type_1").css("color","red");
			err_num++;
		}else{
			$("#set_type_1").css("color","#999999");
		}
	    if($("#value_1").val()=="" || $("#value_2").val()==""){
	    	$("#show_1_tishi").show();
			$("#show_1_tishi").html("套餐的大小图片必须上传.");			
			err_num++;
		}else{
			$("#show_1_tishi").hide();
		}
		var set_sum=0;
	    $.each(set_list, function(i, item) {
	    	set_sum++;
	  	});
	  	if(set_sum==0){
	  		err_num++;
	    }else{
	    	$("#set_list").val(JSON.stringify(set_list));
	    }
		if(err_num>0){
			return false;
		}$(".btn_1").attr("disabled", "disabled");
	}

	
		Array.prototype.indexOf = function(val) {
			for (var i = 0; i < this.length; i++) {
				if (this[i] == val) return i;
			}
			return -1;
		};
		Array.prototype.remove = function(val) {
			var index = this.indexOf(val);
			if (index > -1) {
				this.splice(index, 1);
				}
		};
		var dish_list=eval(<?php echo $dish_list_json;?>); 
		var set_list=new Array();
		jQuery(document).ready(function() {       
		   App.init();
		   FormComponents.init();
		   dish_list_show();
		});
		//解析新数据
		function dish_list_show(){
			//获取选中的属性值
			var sys_type= $('input[name="sys_type"]:checked').val();
			var sys_type_1=$("#sys_type_1").val(); 
			var sys_type_2=$("#sys_type_2").val(); 

			var num=1;
			var dish_list_num=0;
			$("#tab_dish_list").html("");
			$.each(dish_list, function(i, item) {
				var num_show=num;
				if(num<10){
					num_show="0"+num;
				}
				dish_list_num++;
				var i_sys_type=item.sys_type;
				var i_sys_type_1=item.sys_type_1;
				var i_sys_type_2=item.sys_type_2;
				if(sys_type==0){
					num++;
					$("#tab_dish_list").append("<tr style='text-align:left;' onclick='check_one(&quot;"+item.dish_id+"&quot;,&quot;"+dish_list_num+"&quot;)'><td width='35px' style='padding-left:18px;'>"+num_show+"</td><td width='105px'>"+item.dish_name+"</td><td width='63px' style='font-weight:bold;color:#F00;'>"+item.dish_price+"</td><td width='70px' colspan='2'>"+item.dish_count+"</td></tr>");	
				}else if(sys_type==1){
					if(sys_type_1==-1 && sys_type_2==-1){
						//都没选值
						if(i_sys_type==1){
							num++;
							$("#tab_dish_list").append("<tr style='text-align:left;' onclick='check_one(&quot;"+item.dish_id+"&quot;,&quot;"+dish_list_num+"&quot;)'><td width='35px' style='padding-left:18px;'>"+num_show+"</td><td width='105px'>"+item.dish_name+"</td><td width='63px' style='font-weight:bold;color:#F00;'>"+item.dish_price+"</td><td width='70px' colspan='2'>"+item.dish_count+"</td></tr>");	
						}
					}else if(sys_type_1!=-1 && sys_type_2!=-1){
						//都选值
						if(i_sys_type==sys_type && i_sys_type_1==sys_type_1 && i_sys_type_2==sys_type_2){
							num++;
							$("#tab_dish_list").append("<tr style='text-align:left;' onclick='check_one(&quot;"+item.dish_id+"&quot;,&quot;"+dish_list_num+"&quot;)'><td width='35px' style='padding-left:18px;'>"+num_show+"</td><td width='105px'>"+item.dish_name+"</td><td width='63px' style='font-weight:bold;color:#F00;'>"+item.dish_price+"</td><td width='70px' colspan='2'>"+item.dish_count+"</td></tr>");	
						}
					}else if(sys_type_1==-1 && sys_type_2!=-1){
						//选了第一个值
						if(i_sys_type==sys_type && i_sys_type_2==sys_type_2){
							num++;
							$("#tab_dish_list").append("<tr style='text-align:left;' onclick='check_one(&quot;"+item.dish_id+"&quot;,&quot;"+dish_list_num+"&quot;)'><td width='35px' style='padding-left:18px;'>"+num_show+"</td><td width='105px'>"+item.dish_name+"</td><td width='63px' style='font-weight:bold;color:#F00;'>"+item.dish_price+"</td><td width='70px' colspan='2'>"+item.dish_count+"</td></tr>");	
						}
					}else if(sys_type_1!=-1 && sys_type_2==-1){
						//选了第二个值
						if(i_sys_type==sys_type && i_sys_type_1==sys_type_1){
							num++;
							$("#tab_dish_list").append("<tr style='text-align:left;' onclick='check_one(&quot;"+item.dish_id+"&quot;,&quot;"+dish_list_num+"&quot;)'><td width='35px' style='padding-left:18px;'>"+num_show+"</td><td width='105px'>"+item.dish_name+"</td><td width='63px' style='font-weight:bold;color:#F00;'>"+item.dish_price+"</td><td width='70px' colspan='2'>"+item.dish_count+"</td></tr>");	
						}
					}
				}else{
					if(i_sys_type==sys_type){
						num++;
						$("#tab_dish_list").append("<tr style='text-align:left;' onclick='check_one(&quot;"+item.dish_id+"&quot;,&quot;"+dish_list_num+"&quot;)'><td width='35px' style='padding-left:18px;'>"+num_show+"</td><td width='105px'>"+item.dish_name+"</td><td width='63px' style='font-weight:bold;color:#F00;'>"+item.dish_price+"</td><td width='70px' colspan='2'>"+item.dish_count+"</td></tr>");	
					}
				}
				
			});
			if(num==1){
				$("#tab_dish_list").append("<tr><td  style='padding-left:15px;color:red;'>没有找到您想要的菜品.</td></tr>");
			}
		}
        //赛选数据
        function check_type(type){
			if(type==1){
				$("#show_select_1").show();
				$("#show_select_2").show();
			}else{
				$("#show_select_1").hide();
				$("#show_select_2").hide();
			}
			dish_list_show();
        }
		//套餐数据解析
		function set_list_show(){
			 var objectList = new Array();//申明存储对象
		     function Persion(dish_id,sort,dish_name,dish_price,dish_count,count,sys_type,sys_type_1,sys_type_2){
		            this.dish_id=dish_id;
		            this.sort=sort;
		            this.dish_name=dish_name;
		            this.dish_price=dish_price;
		            this.dish_count=dish_count;
		            this.count=count;
		            this.sys_type=sys_type;
		            this.sys_type_1=sys_type_1;
		            this.sys_type_2=sys_type_2;
		      }
		      var sum=0;
		      $.each(set_list, function(i, item) {
					objectList.push(new Persion(item.dish_id,item.sort,item.dish_name,item.dish_price,item.dish_count,item.count,item.sys_type,item.sys_type_1,item.sys_type_2));
					sum++;
			  });
		      sum--;
			  //按sort值从小到大排序
		      objectList.sort(function(a,b){
		            return a.sort-b.sort});

		    set_list=objectList;
			var num=0;
			var price_sum=0;
			$("#tab_set_list").html("");
			
			$.each(objectList, function(i, item) {
				price_sum=parseInt(price_sum)+parseInt(item.dish_price)*parseInt(item.count);
				//自己的排序值
				var href_max="javascript:sort_do(&quot;"+i+"&quot;,&quot;"+sum+"&quot;,&quot;0&quot;);";
				var href_shang="javascript:sort_do(&quot;"+i+"&quot;,&quot;"+sum+"&quot;,&quot;1&quot;);";
				var href_xia="javascript:sort_do(&quot;"+i+"&quot;,&quot;"+sum+"&quot;,&quot;2&quot;);";
				var href_min="javascript:sort_do(&quot;"+i+"&quot;,&quot;"+sum+"&quot;,&quot;3&quot;);";
				var href_jia="javascript:count_do(&quot;"+i+"&quot;,&quot;1&quot;);";
				var href_jan="javascript:count_do(&quot;"+i+"&quot;,&quot;2&quot;);";
				
				var max="<a href='"+href_max+"' class='max_a'>&nbsp;</a>";
				var shang="<a href='"+href_shang+"' class='shang_a'>&nbsp;</a>";
			    var xia="<a href='"+href_xia+"' class='xia_a'>&nbsp;</a>";
				var min="<a href='"+href_min+"' class='min_a'>&nbsp;</a>";
				var jia="<a href='"+href_jia+"' ><img src='<?php echo constant('ADMIN_SRC');?>media/img/sort/j.png'/></a>";
				var jan="<a href='"+href_jan+"' ><img src='<?php echo constant('ADMIN_SRC');?>media/img/sort/-.png'/></a>";
				num++;
				var num_show=num;
				if(num<10){
					num_show="0"+num;
				}
				$("#tab_set_list").append("<tr style='text-align:left;'><td width='35px' style='padding-left:15px;'>"+num_show+"</td><td width='95px'>"+max+shang+xia+min+"</td><td width='105px'>"+item.dish_name+"</td><td width='65px' style='font-weight:bold;color:#F00;'>"+item.dish_price+"</td><td width='80px' colspan='2'>"+jan+"&nbsp;"+item.count+"&nbsp;"+jia+"</td></tr>");	
			});
			$("#old_price").html("");
			$("#old_price").append("(总价:"+price_sum+"元)");
			if(num==0){
				$("#tab_set_list").append("<tr><td  style='padding-left:15px;color:red;'>请从右侧菜品中选择菜品添加至套餐.</td></tr>");
			}
		}
		//数量处理
		function count_do(num,type){
			if(type==1){
				count=set_list[num].count;
				set_list[num].count=parseInt(count)+parseInt(1);
			}else{
				count=set_list[num].count;
				if(count>1){
					set_list[num].count=count-1;
				}else{
					var dish=set_list[num];
					    dish['count']=1;
					var lenght=0;
					$.each(dish_list, function(i, item) {
						lenght++;
					});
		            dish_list[lenght]=dish;
		            set_list.remove(set_list[num]);
					dish_list_show();
				}
				
			}
			set_list_show();
		}
		//排序处理
		function sort_do(num,sum,sort_type){
			var sort_value_my=set_list[num].sort;
			if(sort_type==0){
				//最高
				sort_min=set_list[0].sort;
				set_list[num].sort=sort_min-1;
			}else if(sort_type==1){
				//上次排序值
				var shang=num-1;
				if(num==0){
					shang=0;
				}
				var sort_value_1=set_list[shang].sort;
				set_list[num].sort=sort_value_1;
				if(num!=0){
					set_list[shang].sort=sort_value_my;
				}
			}else if(sort_type==2){
				//下次排序值
				var xia=parseInt(num)+1;
				if(num==sum){
					xia=num;
				}
				var sort_value_2=set_list[xia].sort;
				set_list[num].sort=sort_value_2;
				if(num!=sum){
					set_list[xia].sort=sort_value_my;
				}
			}else if(sort_type==3){
				//最后一个
				sort_max=set_list[sum].sort;
				set_list[num].sort=sort_max+1;
			}
			set_list_show();
		}
		//选中数据
		function check_one(dish_id,num){
			num--;
			var dish=dish_list[num];
			    dish['count']=1;
			var lenght=0;
			var numbers=new Array();
			dish['sort']=0;
			$.each(set_list, function(i, item) {
			    numbers[lenght]=item.sort;
				lenght++;
			});
			var maxInNumbers = Math.max.apply(Math, numbers);
            if(maxInNumbers!="-Infinity"){
            	dish['sort']=maxInNumbers+1;
            }
			set_list[lenght]=dish;
			dish_list.remove(dish_list[num]);
			dish_list_show();
			set_list_show();
		}
		function dish_type_add(){
			var name=prompt("请输入菜品分类名称(4个字以内)","")
			if (name!=null && name!="" && name.length<5){
				$.post('<?php echo site_url('admin/admin_dish/dish_type_add')?>',{type_name:name},function (data){
					data=eval(data);
					$("#type_list_show").html("");
					num=0;
					$("#type_list_show").append("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
					$.each(data, function(i, item) {
						num++;
						$("#type_list_show").append("<label class='checkbox checkbox_class'><input type='checkbox' name='dish_type[]' value='"+item.type_id+"' />"+item.type_name+"</label>");
						if(num%8==0){
							$("#type_list_show").append("<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
						}
					});
					$("#type_list_show").append("<br><button type='button' onclick='dish_type_add();' class='btn_3'>添加分类</button><span class='help-inline'  id='dish_type_1'></span>");
				});
			}else{
				$("#dish_type_1").html("菜品分类名称只能4个字以内，且不能为空.");
				$("#dish_type_1").css("color","red");
			}
	    }
	   
	</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/ajaxfileupload.js" ></script>
<script type="text/javascript">
var str = '';
var num=5;
var file_src="<?php echo base_url();?>";
var is_go_on=1;
function ajaxFileUpload(){
	if(is_go_on==0){
		$("#show_1_tishi").html("图片正在上传中，请等待...");
    	$("#show_1_tishi").show();
    	return false;
	}else{
		is_go_on=0;
	    if($("#value_1").val()=="" || $("#value_2").val()==""){
	    	if($("#value_1").val()==""){
	    		$("#img_1").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/43.gif");   
	         }else if($("#value_2").val()==""){ 
				$("#img_2").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/83.gif");         
	         }
		    $.ajaxFileUpload(
		    {
		       url:'<?php echo site_url("admin/admin_dish/add_img")?>',
		       secureuri:false,
		       fileElementId:'file1',
		       dataType: 'text',
		       success: function(data){
		              if(data=='error'){
		                 alert("文件上传失败！");
		              }else{
		            	  
		            	 if($("#value_1").val()==""){
							$("#img_1").attr("src","<?php echo base_url();?>"+data);
							$("#value_1").val(data);    
			             }else if($("#value_2").val()==""){
							$("#img_2").attr("src","<?php echo base_url();?>"+data);   
							$("#value_2").val(data);       
			             }
		            	 is_go_on=1;
				    	   $("#show_1_tishi").html("");
				           $("#show_1_tishi").hide();
		              }
		           }
		       }
		    );
		    return false;
	    }else{
	    	$("#show_1_tishi").html("无法继续上传图片.");
	    	$("#show_1_tishi").show();
	    	return false;
	    }
	}
}
function switch_img(value_s,value_x,value_type,value_my){
	img_s=$("#value_"+value_s).val(); //上一个图片值
	img_x=$("#value_"+value_x).val(); //下一个图片值
	img_my=$("#value_"+value_my).val(); //自己的值 
	if(value_type=="s"){
		$("#img_"+value_s).attr("src","<?php echo base_url();?>"+img_my);
		$("#img_"+value_my).attr("src","<?php echo base_url();?>"+img_s);
		$("#value_"+value_s).val(img_my);
		$("#value_"+value_my).val(img_s);
	}else{
		$("#img_"+value_x).attr("src","<?php echo base_url();?>"+img_my);
		$("#img_"+value_my).attr("src","<?php echo base_url();?>"+img_x);
		$("#value_"+value_x).val(img_my);
		$("#value_"+value_my).val(img_x);
	}
	value_1=$("#value_1").val(); 
	value_2=$("#value_2").val();
	if(value_1==""){
		 $("#img_1").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/set_1.png");
	}
	if(value_2==""){
		 $("#img_2").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/set_2.png");
	}
}
function remove_img(num){
	 if(num==1){
		 $("#img_1").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/set_1.png");
		 $("#value_1").val("");
	 }else if(num==2){
		 $("#img_2").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/set_2.png");
		 $("#value_2").val("");  
	 }
}
</script>
</body>
</html>