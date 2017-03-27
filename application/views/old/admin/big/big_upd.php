<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?php echo constant('SYS_NAME');?>|添加推荐</title>
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
								<a href="<?php echo site_url("admin/admin_index/main_right")?>">系统介绍</a> 
								<span class="icon-angle-right"></span>
							</li>
							<li>
								<a href="<?php echo site_url("admin/admin_big/big_list")?>">日常管理</a>
								<span class="icon-angle-right"></span>
							</li>
							<li>
								<a href="<?php echo site_url("admin/admin_big/big_list")?>">推荐位管理</a>
								<span class="icon-angle-right"></span>
							</li>
							<li><a href="<?php echo site_url("admin/admin_big/big_upd_show?show_id=").$big['show_id'];?>">编辑推荐</a></li>
						</ul>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="portlet box myself">
							<div class="portlet-title">
								<div class="caption">&nbsp;&nbsp;&nbsp;添加推荐</div>
							</div>
							<div class="portlet-body form">
								<form action="<?php echo site_url("admin/admin_big/big_upd");?>" class="form-horizontal" method="post" onsubmit="return check_submit();" enctype='multipart/form-data'>
                                	<div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>推荐类型：</label>
										<div class="controls">
											<label class="radio">
												<input type="radio" name="show_type" value="0" onChange="choose_1();" <?php if($big['show_type']==0)echo "checked";?> />活动推荐
											</label>
                                            <label class="radio">
												<input type="radio" name="show_type" value="1" onChange="choose_2();" <?php if($big['show_type']==1)echo "checked";?>/>菜品推荐
											</label>
                                            <label class="radio">
												<input type="radio" name="show_type" value="2" onChange="choose_3();" <?php if($big['show_type']==2)echo "checked";?>/>套餐推荐
											</label>
                                            <span class="help-inline" id="check_show_1"></span>
										</div>
									</div>
									<div class="control-group" name="activity_name">
										<label class="control-label"><span class="required">*&nbsp;</span>活动标题：</label>
										<div class="controls">
											<input type="text" class="span6 m-wrap" style="width:500px;" name="show_name" id="show_name" value="<?php echo $big['show_name'];?>"/>
											<span class="help-inline" id="show_name_1">活动标题请控制在10个字符以内.</span>
										</div>
									</div>
									
                                    
                                    <div class="control-group" name="dish_name" style="display:none;">
										<label class="control-label"><span class="required">*&nbsp;</span>选择菜品：</label>
										<div class="controls">
                                        	<div 	style="float:left;width:500px;">
                                                 <table width="100%">
                                                        <tr style="text-align:left;line-height:28px;background-color:#D2D2D2;">
                                                            <th width="70px" style="padding-left:20px;">ID</th>
                                                            <th width="160px" >菜品名称</th>
                                                            <th width="130px" >单价</th>
                                                            <th >销量</th>
                                                        </tr>
                                                 </table>
												<div style="width:99.3%;height:230px;border:1px #ccc solid;overflow-y:auto;">
                                                    <table width="100%" class="tab_set" name="tab_dish" id="tab_dish_list">	
                                                        
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
                                    <div class="control-group" name="dish_name" style="display:none;">
										<label class="control-label"><span class="required">*&nbsp;</span>优惠现价：</label>
										<div class="controls">
                                        	<input type="text" class="span2 m-wrap"  placeholder="只能填写数字" style="float:left;width:200px;" name="dish_price" id="dish_price" value="<?php if($big['show_type']==1) echo $big["dish_price"];?>"/>
                                            <span style="float:left;margin-top:5px;display:block;color:#999999;">&nbsp;元&nbsp;<font id="old_price">(原价为:<?php if($big['show_type']==1) echo $big['dish_old_price'];?>)</font>&nbsp;&nbsp;</span>
                                            <span style="float:left;margin-top:5px;display:block;" id="dish_price_1"></span>
                                        </div>
                                    </div>
                                    
                                    
                                     <div class="control-group" name="set_dish_name" style="display:none;">
										<label class="control-label"><span class="required">*&nbsp;</span>选择套餐：</label>
										<div class="controls">
                                        	<div 	style="float:left;width:500px;">
                                                 <table width="100%">
                                                        <tr style="text-align:left;line-height:28px;background-color:#D2D2D2;">
                                                            <th width="70px" style="padding-left:20px;">ID</th>
                                                            <th width="160px" >套餐名称</th>
                                                            <th width="130px" >单价</th>
                                                            <th >销量</th>
                                                        </tr>
                                                 </table>
												<div style="width:99.3%;height:230px;border:1px #ccc solid;overflow-y:auto;">
                                                    <table width="100%" class="tab_set" name="tab_set" id="tab_set_list">

                                                    </table>
                                                </div>
                                            </div>
                                            
										</div>
									</div>
                                    
                                    
                                    <div class="control-group" name="pic_big">
										<label class="control-label"><span class="required">*&nbsp;</span>图片上传：</label>
										<div class="controls">
											<span class="btn green fileinput-button">
                                                <i class="icon-plus icon-white"></i>
                                                <span>选择上传图片</span>
                                                <input type="file" name="file1" id="file1" onchange="return ajaxFileUpload();" />
											</span>
                                            <span class="help-inline" id="show_img_1">请选择上传一张推荐栏大图.</span>
										</div>
									</div>
                                    <div class="control-group" style="margin-top:-20px" name="pic_big">
										<label class="control-label"></label>
										<div class="controls">
                                        	<div style="margin-top:15px;background-color:#D2D2D2;width:500px;height:150px;">
                                                <img src="<?php 
                                                			if($big['show_type']==0){
                                                				echo base_url().$big['show_img'];
                                                			}else if($big['show_type']==1){
                                                				echo base_url().$big['dish_img_6'];
                                                			}
                                                ?>" style="margin-left:15px;margin-top:15px;
                                                    width:360px;height:120px;" class="tooltips" id="big_img_1"/>
                                                    <input type="hidden" name="big_img_1_value" id="big_img_1_value" value="<?php 
                                                			if($big['show_type']==0){
                                                				echo $big['show_img'];
                                                			}else if($big['show_type']==1){
                                                				echo $big['dish_img_6'];
                                                			}
                                                ?>"/>
                                                 <p style="float:right;display:block;width:95px;margin-top:15px;margin-right:15px;">
                                                 	请上传宽高比3:1的推荐图片。(其他文字描述待定)
                                                 </p>
                                            </div>
										</div>
									</div>
                                    
									<div class="control-group" name="activity_name">
										<label class="control-label"><span class="required">*&nbsp;</span>活动内容：</label>
										<div class="controls">
                                        	<textarea class="span6 m-wrap" style="width:500px;height:150px;
                                            	max-width: 500px;max-height: 150px;" name="show_desc" id="show_desc"><?php echo $big['show_desc'];?></textarea>
											<span class="help-inline" style="padding-top:115px;" id="show_desc_1">活动内容介绍.</span>
										</div>
									</div>

                                    <div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>是否发布：</label>
										<div class="controls">
											<label class="radio">
												<input type="radio" name="show_state" value="1" <?php if($big['show_state']==1){echo "checked";}?>/>立即发布
											</label>
                                            <label class="radio">
												<input type="radio" name="show_state" value="0" <?php if($big['show_state']==0){echo "checked";}?>/>暂不发布
											</label>
                                        </div>
                                     </div>
                                    <div class="control-group">
										<div class="controls">
											<input type="hidden" id="big_img" name="big_img" value="<?php 
                                                			if($big['show_type']==0){
                                                				echo base_url().$big['show_img'];
                                                			}else if($big['show_type']==1){
                                                				echo base_url().$big['dish_img_6'];
                                                			}
                                                ?>"/>
											<input type="hidden" id="show_id" name="show_id" value="<?php echo $big['show_id'];?>"/>
											<input type="hidden" id="dish_type_id" name="dish_type_id" value="<?php echo $big['dish_type_id'];?>"/>
											<input type="hidden" id="dish_id" name="dish_id" value="<?php echo $big['data_id'];?>"/>
											<input type="hidden" id="set_id" name="set_id" value="<?php echo $big['data_id'];?>"/>
											<input type="hidden" id="type_id" name="type_id" value="<?php echo $big['dish_type_id'];?>"/>
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
		var show_type=$('input[name="show_type"]:checked ').val();
		
		if(show_type==0){
			if($("#show_name").val()==""){
				$("#show_name").focus();
				$("#show_name_1").html("活动名称不能为空.");
				$("#show_name_1").css("color","red");				
				err_num++;
			}else{
				if($("#show_name").val().length>20){
					$("#show_name").focus();
					$("#show_name_1").html("活动名称请控制在20个字符以内.");
					$("#show_name_1").css("color","red");
					err_num++;
				}else{
					$("#show_name_1").css("color","#999999");
				}
			}
			if($("#big_img_1_value").val()==""){
				$("#show_img_1").html("请上传推荐图片.");
				$("#show_img_1").css("color","red");
				err_num++;
			}else{
				$("#show_img_1").css("color","#999999");
			}
			if($("#show_desc").val()==""){
				$("#show_desc").focus();
				$("#show_desc_1").html("活动介绍不能为空.");
				$("#show_desc_1").css("color","red");				
				err_num++;
			}else{
				if($("#show_desc").val().length>500){
					$("#show_desc").focus();
					$("#show_desc_1").html("活动介绍请控制在500个字符以内.");
					$("#show_desc_1").css("color","red");
					err_num++;
				}else{
					$("#show_desc_1").css("color","#999999");
				}
			}
		}else if(show_type==1){
			if($("#dish_id").val()==""){
					$("#check_show_1").html("请先选择推荐菜品.");
					$("#check_show_1").css("color","red");
					err_num++;
			}else{
				$("#check_show_1").hide();
			}
			if($("#dish_price").val()==""){
				$("#dish_price").focus();
				$("#dish_price_1").html("请填写优惠现价.");
				$("#dish_price_1").css("color","red");				
				err_num++;
			}else{
				if(isNaN($('#dish_price').val())){
					$("#dish_price").focus();
					$("#dish_price_1").html("优惠现价只能填写数字.");
					$("#dish_price_1").css("color","red");				
					err_num++;
				}else{
					$("#dish_price_1").hide();
				}
			}
			if($("#big_img_1_value").val()==""){
				$("#show_img_1").html("请上传推荐图片.");
				$("#show_img_1").css("color","red");
				err_num++;
			}else{
				$("#show_img_1").css("color","#999999");
			}
		}else if(show_type==2){
			if($("#set_id").val()==""){
				$("#check_show_1").html("请先选择推荐菜品.");
				$("#check_show_1").css("color","red");
				err_num++;
			}else{
				$("#check_show_1").hide();
			}
		}
		if(err_num>0){
			return false;
		}
		$(".btn_1").attr("disabled", "disabled");
	}
		jQuery(document).ready(function() {       
		   App.init();
		   start_choose();
		   dish_list_show();
		   set_list_show();
		   FormComponents.init();
		});
		var dish_list=eval(<?php echo $dish_list;?>);
	    var set_list=eval(<?php echo $set_list;?>);
	    var big_data_id=<?php if($big['show_type']==0){echo "-1";}else{echo $big['data_id'];}?>;
		//遍历菜品
		function dish_list_show(){
			//获取选中的属性值
			var sys_type= $('input[name="sys_type"]:checked').val();
			var sys_type_1=$("#sys_type_1").val(); 
			var sys_type_2=$("#sys_type_2").val(); 

			var num=1;
			$("#tab_dish_list").html("");
			$.each(dish_list, function(i, item) {
				var num_show=num;
				if(num<10){
					num_show="0"+num;
				}
				var i_sys_type=item.sys_type;
				var i_sys_type_1=item.sys_type_1;
				var i_sys_type_2=item.sys_type_2;
				if(sys_type==0){
					num++;
					$("#tab_dish_list").append("<tr onclick='choose_dish(&quot;"+num+"&quot;,&quot;"+item.dish_id+"&quot;,&quot;"+item.dish_old_price+"&quot;,&quot;"+item.dish_img_6+"&quot;)'><td width='70px' name='td_"+num+"' style='padding-left:20px;'>"+num_show+"</td><td width='160px' name='td_"+num+"'>"+item.dish_name+"</td><td width='130px' name='td_"+num+"' style='font-weight:bold;color:#F00;'>"+item.dish_old_price+"</td><td  name='td_"+num+"'>"+item.dish_count+"</td></tr>");	
				}else if(sys_type==1){
					if(sys_type_1==-1 && sys_type_2==-1){
						//都没选值
						if(i_sys_type==1){
							num++;
							$("#tab_dish_list").append("<tr onclick='choose_dish(&quot;"+num+"&quot;,&quot;"+item.dish_id+"&quot;,&quot;"+item.dish_old_price+"&quot;,&quot;"+item.dish_img_6+"&quot;)'><td width='70px' name='td_"+num+"' style='padding-left:20px;'>"+num_show+"</td><td width='160px' name='td_"+num+"'>"+item.dish_name+"</td><td width='130px' name='td_"+num+"' style='font-weight:bold;color:#F00;'>"+item.dish_old_price+"</td><td  name='td_"+num+"'>"+item.dish_count+"</td></tr>");	
						}
					}else if(sys_type_1!=-1 && sys_type_2!=-1){
						//都选值
						if(i_sys_type==sys_type && i_sys_type_1==sys_type_1 && i_sys_type_2==sys_type_2){
							num++;
							$("#tab_dish_list").append("<tr onclick='choose_dish(&quot;"+num+"&quot;,&quot;"+item.dish_id+"&quot;,&quot;"+item.dish_old_price+"&quot;,&quot;"+item.dish_img_6+"&quot;)'><td width='70px' name='td_"+num+"' style='padding-left:20px;'>"+num_show+"</td><td width='160px' name='td_"+num+"'>"+item.dish_name+"</td><td width='130px' name='td_"+num+"' style='font-weight:bold;color:#F00;'>"+item.dish_old_price+"</td><td  name='td_"+num+"'>"+item.dish_count+"</td></tr>");	
						}
					}else if(sys_type_1==-1 && sys_type_2!=-1){
						//选了第一个值
						if(i_sys_type==sys_type && i_sys_type_2==sys_type_2){
							num++;
							$("#tab_dish_list").append("<tr onclick='choose_dish(&quot;"+num+"&quot;,&quot;"+item.dish_id+"&quot;,&quot;"+item.dish_old_price+"&quot;,&quot;"+item.dish_img_6+"&quot;)'><td width='70px' name='td_"+num+"' style='padding-left:20px;'>"+num_show+"</td><td width='160px' name='td_"+num+"'>"+item.dish_name+"</td><td width='130px' name='td_"+num+"' style='font-weight:bold;color:#F00;'>"+item.dish_old_price+"</td><td  name='td_"+num+"'>"+item.dish_count+"</td></tr>");	
						}
					}else if(sys_type_1!=-1 && sys_type_2==-1){
						//选了第二个值
						if(i_sys_type==sys_type && i_sys_type_1==sys_type_1){
							num++;
							$("#tab_dish_list").append("<tr onclick='choose_dish(&quot;"+num+"&quot;,&quot;"+item.dish_id+"&quot;,&quot;"+item.dish_old_price+"&quot;,&quot;"+item.dish_img_6+"&quot;)'><td width='70px' name='td_"+num+"' style='padding-left:20px;'>"+num_show+"</td><td width='160px' name='td_"+num+"'>"+item.dish_name+"</td><td width='130px' name='td_"+num+"' style='font-weight:bold;color:#F00;'>"+item.dish_old_price+"</td><td  name='td_"+num+"'>"+item.dish_count+"</td></tr>");	
						}
					}
				}else{
					if(i_sys_type==sys_type){
						num++;
						$("#tab_dish_list").append("<tr onclick='choose_dish(&quot;"+num+"&quot;,&quot;"+item.dish_id+"&quot;,&quot;"+item.dish_old_price+"&quot;,&quot;"+item.dish_img_6+"&quot;)'><td width='70px' name='td_"+num+"' style='padding-left:20px;'>"+num_show+"</td><td width='160px' name='td_"+num+"'>"+item.dish_name+"</td><td width='130px' name='td_"+num+"' style='font-weight:bold;color:#F00;'>"+item.dish_old_price+"</td><td  name='td_"+num+"'>"+item.dish_count+"</td></tr>");	
					}
				}

				if(item.dish_id==big_data_id){	
					$("[name='td_"+num+"']").css("background-color", "#FFF1C5");
				}
			});
			if(num==1){
				$("#tab_dish_list").append("<tr><td  style='padding-left:15px;color:red;'>没有找到您想要的菜品.</td></tr>");
			}
		}
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
		//遍历套餐
		function set_list_show(){
			var num=1;
			$("#tab_set_list").html("");
			$.each(set_list, function(i, item) {
				var num_show=num;
				if(num<10){
					num_show="0"+num;
				}
				num++;
				$("#tab_set_list").append("<tr onclick='choose_set(&quot;"+num+"&quot;,&quot;"+item.set_id+"&quot;)'><td width='70px' name='td_set"+num+"' style='padding-left:20px;'>"+num_show+"</td><td width='160px' name='td_set"+num+"'>"+item.set_name+"</td><td width='130px' name='td_set"+num+"' style='font-weight:bold;color:#F00;'>"+item.set_price+"</td><td  name='td_set"+num+"'>"+item.set_count+"</td></tr>");	
                if(item.set_id==big_data_id){	
                	$("[name='td_set"+num+"']").css("background-color", "#FFF1C5");
                }
				
			});
			if(num==1){
				$("#tab_set_list").append("<tr><td  style='padding-left:15px;color:red;'>没有找到您想要的套餐.</td></tr>");
			}
		}
		function start_choose(){
			var value=<?php echo $big['show_type'];?>;
			if(value==0){
				$("[name='activity_name']").show();
				$("[name='dish_name']").hide();
				$("[name='pic_big']").show();
				$("[name='set_dish_name']").hide();
			}else if(value==1){
				$("[name='activity_name']").hide();
				$("[name='dish_name']").show();
				$("[name='pic_big']").show();
				$("[name='set_dish_name']").hide();
			}else if(value==2){
				$("[name='activity_name']").hide();
				$("[name='dish_name']").hide();
				$("[name='pic_big']").hide();
				$("[name='set_dish_name']").show();
			}
		}
		function choose_1(){
			$("[name='activity_name']").show();
			$("[name='dish_name']").hide();
			$("[name='pic_big']").show();
			$("[name='set_dish_name']").hide();
		}
		function choose_2(){
			$("[name='activity_name']").hide();
			$("[name='dish_name']").show();
			$("[name='pic_big']").show();
			$("[name='set_dish_name']").hide();
		}
		function choose_3(){
			$("[name='activity_name']").hide();
			$("[name='dish_name']").hide();
			$("[name='pic_big']").hide();
			$("[name='set_dish_name']").show();
		}
		function choose_dish(td_num,dish_id,dish_old_price,dish_img_6){
			if(dish_img_6==""){
				$("#big_img_1").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/dish_4.png");
				$("#big_img").val("");
				$("#big_img_1_value").val(dish_img_6);
			}else{
				$("#big_img_1").attr("src","<?php echo base_url();?>"+dish_img_6);
				$("#big_img").val(dish_img_6);
				$("#big_img_1_value").val(dish_img_6);
			}
			$("#dish_id").val(dish_id);
			$("#dish_price").val(dish_old_price);
			$("#old_price").html("(菜品原价:"+dish_old_price+")");
			$("[name='tab_dish'] tr td").css("background-color","#F0F0F0");
		    $("[name='td_"+td_num+"']").css("background-color", "#FFF1C5");
		}
		function choose_set(td_num,set_id){
			$("#set_id").val(set_id);
			$("[name='tab_set'] tr td").css("background-color","#F0F0F0");
		    $("[name='td_set"+td_num+"']").css("background-color", "#FFF1C5");
		}
	</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/ajaxfileupload.js" ></script>
<script type="text/javascript">
var str = '';
var num=5;
var file_src="<?php echo base_url();?>";
function ajaxFileUpload(){
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
						$("#big_img_1").attr("src","<?php echo base_url();?>"+data);
						$("#big_img_1_value").val(data);    
	              }
	           }
	       }
	    );
	 return false;
}
</script>
</body>
</html>