<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?php echo constant('SYS_NAME');?>|编辑菜品</title>
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
								<a href="<?php echo site_url("admin/admin_dish/dish_list")?>">日常管理</a>
								<span class="icon-angle-right"></span>
							</li>
                            <li>
								<a href="<?php echo site_url("admin/admin_dish/dish_list")?>">菜品管理</a>
								<span class="icon-angle-right"></span>
							</li>
							<li><a href="<?php echo site_url("admin/admin_dish/dish_update_show")?>">编辑菜品</a></li>
						</ul>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="portlet box myself">
							<div class="portlet-title">
								<div class="caption">&nbsp;&nbsp;&nbsp;编辑新品</div>
							</div>
							<div class="portlet-body form">
								<form action="<?php echo site_url("admin/admin_dish/dish_update");?>" class="form-horizontal" method="post" onsubmit="return check_submit();" enctype='multipart/form-data'>
									<div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>菜品名称：</label>
										<div class="controls">
											<input type="text" class="span4 m-wrap" style="width:500px;" name="dish_name" id="dish_name"  onchange="name_check('<?php echo $dish['dish_id'];?>');" value="<?php echo $dish['dish_name'];?>" />
											<span class="help-inline" id="dish_name_1">菜品名称请控制在6个字以内.</span>
											<input type="hidden" name="dish_id" id="dish_id" value="<?php echo $dish['dish_id'];?>">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>菜品价格：</label>
										<div class="controls">
                                              	<input type="text" class="span2 m-wrap"  style="float:left;width:200px;" name="dish_price" id="dish_price" value="<?php echo $dish['dish_price'];?>"/>
                                                <span style="float:left;margin-top:5px;display:block;color:#999999;">&nbsp;元&nbsp;&nbsp;</span>
												<span class="help-inline" id="dish_price_1"></span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>菜品介绍：</label>
										<div class="controls">
                                        	<textarea class="span6 m-wrap" style="width:500px;height:90px; 
                                            		max-width: 500px;max-height: 90px;" name="dish_desc" id="dish_desc" ><?php echo $dish['dish_desc'];?></textarea>
											<span class="help-inline" style="padding-top:55px;" id="dish_desc_1">菜品介绍请控制在100字以内.</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>菜品属性：</label>
										<div class="controls">
											<label class="radio">
												<input type="radio" name="sys_type" value="1" onChange="check_ed();" <?php if($dish['sys_type']==1){echo "checked";};?> />菜
											</label>
                                            <select class="check_ed_class"  name="sys_type_1" id="sys_type_1"
                                            	style="margin-left:-10px;margin-top:-15px;width:80px;font-size:12px;height:26px;<?php if($dish['sys_type']!=1){echo "display:none;";}?>">
                                                        <?php 
                                                       	 if($dish['sys_type_1']==1){
                                                       	 	echo "<option value='1'>荤菜</option>";
                                                       	 }else if($dish['sys_type_1']==2){
                                                       	 	echo "<option value='1'>素菜</option>";
                                                       	 }
                                                        ?>
                                                        <option value="0">不限</option>
                                                        <option value="1">荤菜</option>
                                                        <option value="2">素菜</option>
                                            </select>
                                            <select class="check_ed_class" name="sys_type_2" id="sys_type_2"
                                             style="margin-right:15px;margin-top:-15px;width:80px;font-size:12px;height:26px;<?php if($dish['sys_type']!=1){echo "display:none;";}?>">
                                                    	<?php 
                                                       	 if($dish['sys_type_2']==1){
                                                       	 	echo "<option value='1'>凉菜</option>";
                                                       	 }else if($dish['sys_type_2']==2){
                                                       	 	echo "<option value='1'>热菜</option>";
                                                       	 }
                                                        ?>
                                                    	<option value="0">不限</option>
                                                        <option value="1">凉菜</option>
                                                        <option value="2">热菜</option>
                                            </select>
											<label class="radio">
												<input type="radio" name="sys_type" value="2" onChange="check_out();" <?php if($dish['sys_type']==2){echo "checked";};?>/>汤
											</label>  
											<label class="radio">
												<input type="radio" name="sys_type" value="3" onChange="check_out();" <?php if($dish['sys_type']==3){echo "checked";};?>/>小吃
											</label> 
                                            <label class="radio">
												<input type="radio" name="sys_type" value="4" onChange="check_out();" <?php if($dish['sys_type']==4){echo "checked";};?>/>酒水
											</label> 
                                            <label class="radio">
												<input type="radio" name="sys_type" value="5" onChange="check_out();" <?php if($dish['sys_type']==5){echo "checked";};?>/>其它
											</label>  
                                            <span class="help-inline" style="margin-left:20px;margin-top:-15px;" id="sys_type_01"></span>
											
										</div>
									</div>
                                    
                                    <div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>图片上传：</label>
										<div class="controls" style="padding-top:13px;border:#D7D7D7 1px solid;
                                        							background-color:#F8F8F8;width:800px;height:350px;">
											<table>
                                            	<tr>
                                                	<td style="width:20px;">&nbsp;</td>
                                                	<td class="tab_class_td_active" id="show_1" onClick="active_show('1');">菜品图片</td>
                                                    <td style="width:10px;">&nbsp;</td>
                                                    <td class="tab_class_td" id="show_2" onClick="active_show('2');">推荐图片</td>
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
                                                                    	<span class="btn mini green fileinput-button" >
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
                                                                         		 您最多可以上传<font color="e02222">5</font>张图片。
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" style="padding-left:15px;padding-top:5px;color:#aaaaaa;">上传图片最佳尺寸
                                                    	&nbsp;&nbsp;<font color="e02222">800*600</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                	<td colspan="5">
                                                    	<table style="margin-left:15px;margin-top:10px;">
                                                        	<tr>
                                                            	<td>
                                                                   <div class="div_class_img_small border_red">
                                                                        	<img src="<?php if($dish['dish_img_1']!=""){echo base_url().$dish['dish_img_1'];}else{ echo constant('ADMIN_SRC')."media/upload/dish_1.png";}?>" style="width:136px;height:100px;" 
                                                                        		 class="tooltips" id="img_1"
                                                                            	 />
                                                                            <input type="hidden" id="value_1" name="value_1" value="<?php if($dish['dish_img_1']!=""){echo $dish['dish_img_1'];}?>">
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
                                                                	<div class="div_class_img_small">
                                                                        	<img src="<?php if($dish['dish_img_2']!=""){echo base_url().$dish['dish_img_2'];}else{ echo constant('ADMIN_SRC')."media/upload/dish_2.png";}?>" style="width:136px;height:100px;" 
                                                                        		class="tooltips" id="img_2"
                                                                            	 />
                                                                         	<input type="hidden" id="value_2" name="value_2" value="<?php if($dish['dish_img_2']!=""){echo $dish['dish_img_2'];}?>">	
                                                                         <div class="div_class_img_small_a">
                                                                         		<a href="javascript:switch_img('1','3','s','2');" >
                                                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/z.png" style="margin-bottom:5px;"/>
                                                                                </a>
                                                                                <a href="javascript:switch_img('1','3','x','2');" >
                                                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/Y.png" 
                                                                                    style="margin-left:10px;margin-bottom:5px;"/>
                                                                                </a>
                                                                                <a href="javascript:remove_img('2');" >
                                                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/red_x.png" 
                                                                                    style="margin-left:60px;margin-bottom:4px;"/>
                                                                                </a>
                                                                         </div>
                                                                    </div>
                                                                </td>
                                                               <td>
                                                                	<div class="div_class_img_small">
                                                                        	<img src="<?php if($dish['dish_img_3']!=""){echo base_url().$dish['dish_img_3'];}else{ echo constant('ADMIN_SRC')."media/upload/dish_2.png";}?>" style="width:136px;height:100px;" 
                                                                        		class="tooltips" id="img_3"
                                                                            	 />
                                                                            	 <input type="hidden" id="value_3" name="value_3" value="<?php if($dish['dish_img_3']!=""){echo $dish['dish_img_3'];}?>">
                                                                         <div class="div_class_img_small_a">
                                                                         		<a href="javascript:switch_img('2','4','s','3');" >
                                                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/z.png" style="margin-bottom:5px;"/>
                                                                                </a>
                                                                                <a href="javascript:switch_img('2','4','x','3');" >
                                                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/Y.png" 
                                                                                    style="margin-left:10px;margin-bottom:5px;"/>
                                                                                </a>
                                                                                <a href="javascript:remove_img('3');" >
                                                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/red_x.png" 
                                                                                    style="margin-left:60px;margin-bottom:4px;"/>
                                                                                </a>
                                                                         </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                	<div class="div_class_img_small">
                                                                        	<img src="<?php if($dish['dish_img_4']!=""){echo base_url().$dish['dish_img_4'];}else{ echo constant('ADMIN_SRC')."media/upload/dish_2.png";}?>" style="width:136px;height:100px;" 
                                                                        		class="tooltips" id="img_4"
                                                                            	 />
                                                                            	 <input type="hidden" id="value_4" name="value_4" value="<?php if($dish['dish_img_4']!=""){echo $dish['dish_img_4'];}?>">
                                                                         <div class="div_class_img_small_a">
                                                                         		<a href="javascript:switch_img('3','5','s','4');" >
                                                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/z.png" style="margin-bottom:5px;"/>
                                                                                </a>
                                                                                <a href="javascript:switch_img('3','5','x','4');" >
                                                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/Y.png" 
                                                                                    style="margin-left:10px;margin-bottom:5px;"/>
                                                                                </a>
                                                                                <a href="javascript:remove_img('4');" >
                                                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/red_x.png" 
                                                                                    style="margin-left:60px;margin-bottom:4px;"/>
                                                                                </a>
                                                                         </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                	<div class="div_class_img_small">
                                                                        	<img src="<?php if($dish['dish_img_5']!=""){echo base_url().$dish['dish_img_5'];}else{ echo constant('ADMIN_SRC')."media/upload/dish_2.png";}?>" style="width:136px;height:100px;" 
                                                                        		class="tooltips" id="img_5"/>
                                                                            	 <input type="hidden" id="value_5" name="value_5" value="<?php if($dish['dish_img_5']!=""){echo $dish['dish_img_5'];}?>">
                                                                         <div class="div_class_img_small_a">
                                                                         		<a href="javascript:switch_img('4','5','s','5');" >
                                                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/z.png" style="margin-bottom:5px;"/>
                                                                                </a>
                                                                                <a href="javascript:switch_img('4','5','x','5');" >
                                                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/Y.png" 
                                                                                    style="margin-left:10px;margin-bottom:5px;"/>
                                                                                </a>
                                                                                <a href="javascript:remove_img('5');" >
                                                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/red_x.png" 
                                                                                    style="margin-left:60px;margin-bottom:4px;"/>
                                                                                </a>
                                                                         </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <tbody id="tab_2" style="display:none;">
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
                                                                            <input type="file" name="file2" id="file2" onchange="return ajaxFileUpload_1();">
                                                           				</span><font color="e02222" id="show_2_tishi" style="display:none;">推荐图已上传.</font>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                	<td></td>
                                                                	<td style="padding-top:14px;color:#aaaaaa;">
                                                                   		提示：推荐图片选择性上传，用于菜品推荐时推荐位展示。
                                                                    </td>
                                                                </tr>
                                                                 <tr>
                                                                 	<td></td>
                                                                	<td style="padding-top:7px;color:#aaaaaa;">
                                                                   		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                          		本地上传图片大小不能超过<font color="e02222">500k</font>。
                                                                    </td>
                                                                </tr>
                                                                
                                                            </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" style="padding-left:15px;padding-top:5px;color:#aaaaaa;">上传图片最佳尺寸
                                                    	&nbsp;&nbsp;<font color="e02222">1600*600</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                	<td colspan="5">
                                                    	<div class="div_class_img_big">
                                                                    	<img src="<?php if($dish['dish_img_6']!=""){echo base_url().$dish['dish_img_6'];}else{ echo constant('ADMIN_SRC')."media/upload/dish_3.png";}?>" style="width:300px;height:100px;" 
                                                                        		class="tooltips" id="img_6"
                                                                            	 />
                                                                            	 <input type="hidden" id="value_6" name="value_6" value="<?php if($dish['dish_img_6']!=""){echo $dish['dish_img_6'];}?>">
                                                                         <div class="div_class_img_small_a">
                                                                                <a href="javascript:remove_img('6');" >
                                                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/red_x.png" 
                                                                                    style="float:right;margin-right:10px;margin-top:5px;"/>
                                                                                </a>
                                                                         </div>
                                                                    </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
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
													if (in_array($type_id, $type_id_list)) {
													   echo "<label class='checkbox'>
																<input type='checkbox' name='dish_type[]' value='{$type_id}' checked/>{$type_name}
															</label>";
													}else{
														echo "<label class='checkbox'>
																	<input type='checkbox' name='dish_type[]' value='{$type_id}' />{$type_name}
															  </label>";
													}
													
													
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
												<input type="radio" name="dish_state" value="1" <?php if($dish['dish_state']==1){echo "checked";}?>/>立即上架
											</label>
                                            <label class="radio">
												<input type="radio" name="dish_state" value="0" <?php if($dish['dish_state']==0){echo "checked";}?>/>暂不上架
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
		var name_ok=1;
		function name_check(dish_id){
			if($("#dish_name").val()==""){
				$("#dish_name").focus();
				$("#dish_name_1").html("菜品名称不能为空.");
				$("#dish_name_1").css("color","red");				
			}else{
				if($("#dish_name").val().length>6){
					$("#dish_name").focus();
					$("#dish_name_1").html("菜品名称请控制在6个字符以内.");
					$("#dish_name_1").css("color","red");
				}else{
					var dish_name=$("#dish_name").val();
					$.post('<?php echo site_url('admin/admin_dish/check_name')?>',{dish_name:dish_name,dish_id:dish_id},function (data){
						data=eval(data);
						if(data==0){
							$("#dish_name").focus();
							name_ok=0;
							$("#dish_name_1").html("已存在同名菜品，请核实后调整.");
							$("#dish_name_1").css("color","red");
						}else{
							name_ok=1;
							$("#dish_name_1").css("color","#999999");
						}
					});
				}
			}
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
		function active_show(num){
			if(num==1){
				$("#show_2").removeClass('tab_class_td_active').addClass("tab_class_td"); 
				$("#show_1").removeClass('tab_class_td').addClass("tab_class_td_active"); 
				$("#tab_2").hide();
				$("#tab_1").show();
			}else{
				$("#show_1").removeClass('tab_class_td_active').addClass("tab_class_td"); 
				$("#show_2").removeClass('tab_class_td').addClass("tab_class_td_active"); 
				$("#tab_1").hide();
				$("#tab_2").show();
			}
		}
		function check_submit(){
			var err_num=0;
			if($("#dish_name").val()==""){
					$("#dish_name").focus();
					$("#dish_name_1").html("菜品名称不能为空.");
					$("#dish_name_1").css("color","red");				
					err_num++;
			}else{
				if($("#dish_name").val().length>6){
					$("#dish_name").focus();
					$("#dish_name_1").html("菜品名称请控制在6个字符以内.");
					$("#dish_name_1").css("color","red");
					err_num++;
				}else{
					if(name_ok==0){
						$("#dish_name_1").html("已存在同名菜品，请核实后调整.");
						$("#dish_name_1").css("color","red");
						err_num++;
					}else{
						$("#dish_name_1").css("color","#999999");
					}
				}
			}

			if($("#dish_price").val()==""){
				$("#dish_price").focus();
				$("#dish_price_1").html("请填写菜品单价.");
				$("#dish_price_1").css("color","red");				
				err_num++;
			}else{
				if(isNaN($('#dish_price').val())){
					$("#dish_price").focus();
					$("#dish_price_1").html("菜品单价只能填写数字.");
					$("#dish_price_1").css("color","red");				
					err_num++;
				}else{
					$("#dish_price_1").hide();
				}
			}
			if($("#dish_desc").val()==""){
				$("#dish_desc").focus();
				$("#dish_desc_1").html("菜品介绍不能为空.");
				$("#dish_desc_1").css("color","red");				
				err_num++;
			}else{
				if($("#dish_desc").val().length>100){
					$("#dish_desc").focus();
					$("#dish_desc_1").html("菜品介绍请控制在100个字符以内.");
					$("#dish_desc_1").css("color","red");
					err_num++;
				}else{
					$("#dish_desc_1").css("color","#999999");
				}
			}
			if($('input[name="sys_type"]:checked ').val()==1 && ($("#sys_type_1").val()==0 || $("#sys_type_2").val()==0)){
				$("#sys_type_01").html("请选择菜品属性.");
				$("#sys_type_01").css("color","red");
			}else{
				$("#sys_type_01").css("color","#999999");
			}
			$check_num=$("input[type='checkbox']:checked").length;	
		    if($check_num==0){
		    	$("#dish_type_1").html("请为菜品分配菜品分类.");
				$("#dish_type_1").css("color","red");
			}else{
				$("#dish_type_1").css("color","#999999");
			}
		    if($("#value_1").val()==""){
		    	$("#show_1_tishi").show();
				$("#show_1_tishi").html("菜品图片首图必须上传.");			
				err_num++;
			}else{
				$("#show_1_tishi").hide();
			}

			if(err_num>0){
				return false;
			}$(".btn_1").attr("disabled", "disabled");
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
	    if($("#value_1").val()=="" || $("#value_2").val()==""|| $("#value_3").val()==""|| $("#value_4").val()==""|| $("#value_5").val()==""){
	    	if($("#value_1").val()==""){
	    		$("#img_1").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/43.gif");  
	         }else if($("#value_2").val()==""){
	    		$("#img_2").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/43.gif");  
	         }else if($("#value_3").val()==""){
	    		$("#img_3").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/43.gif");  
	         }else if($("#value_4").val()==""){
	    		$("#img_4").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/43.gif");  
	         }else if($("#value_5").val()==""){
	    		$("#img_5").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/43.gif");  
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
			             }else if($("#value_3").val()==""){
							$("#img_3").attr("src","<?php echo base_url();?>"+data); 
							$("#value_3").val(data);         
			             }else if($("#value_4").val()==""){
							$("#img_4").attr("src","<?php echo base_url();?>"+data);
							$("#value_4").val(data);          
			             }else if($("#value_5").val()==""){
							$("#img_5").attr("src","<?php echo base_url();?>"+data); 
							$("#value_5").val(data);         
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
function ajaxFileUpload_1(){
	if($("#value_6").val()==""){
		$("#img_6").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/83.gif"); 
	    $.ajaxFileUpload(
	    {
	       url:'<?php echo site_url("admin/admin_dish/add_img_2")?>',
	       secureuri:false,
	       fileElementId:'file2',
	       dataType: 'text',
	       success: function(data){
	              if(data=='error'){
	                 alert("文件上传失败！");
	              }else{
	            	  $("#img_6").attr("src","<?php echo base_url();?>"+data);
					  $("#value_6").val(data);    
	              }
	           }
	       }
	    );
	    return false;
    }else{
    	$("#show_2_tishi").show();
    	return false;
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
	value_3=$("#value_3").val();
	value_4=$("#value_4").val();
	value_5=$("#value_5").val();
	if(value_1==""){
		 $("#img_1").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/dish_1.png");
	}
	if(value_2==""){
		 $("#img_2").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/dish_2.png");
	}
	if(value_3==""){
		 $("#img_3").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/dish_2.png");
	}
	if(value_4==""){
		 $("#img_4").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/dish_2.png");
	}
	if(value_5==""){
		 $("#img_5").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/dish_2.png");
	}
	auto_sort();
}
function remove_img(num){
	 if(num==1){
		 $("#img_1").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/dish_1.png");
		 $("#value_1").val("");
		 auto_sort();  
	 }else if(num==2){
		 $("#img_2").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/dish_2.png");
		 $("#value_2").val("");  
		 auto_sort(); 
	 }else if(num==3){
		 $("#img_3").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/dish_2.png");
		 $("#value_3").val("");  
		 auto_sort(); 
	 }else if(num==4){
		 $("#img_4").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/dish_2.png");
		 $("#value_4").val(""); 
		 auto_sort();  
	 }else if(num==5){
		 $("#img_5").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/dish_2.png");
		 $("#value_5").val(""); 
		 auto_sort();  
	 }else if(num==6){
		 $("#img_6").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/dish_3.png");
		 $("#value_6").val("");  
	 }
}
function auto_sort(){
	src_2=$("#value_2").val();
	src_3=$("#value_3").val();
	src_4=$("#value_4").val();
	src_5=$("#value_5").val();
	//第2个
	if(src_2==""){
		if(src_3!=""){
			$("#img_2").attr("src","<?php echo base_url();?>"+src_3);
			$("#value_2").val(src_3);
			$("#img_3").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/dish_2.png");
			$("#value_3").val(""); 
			if(src_4!=""){
				$("#img_3").attr("src","<?php echo base_url();?>"+src_4);
				$("#value_3").val(src_4);
				$("#img_4").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/dish_2.png");
				$("#value_4").val(""); 
				if(src_5!=""){
					$("#img_4").attr("src","<?php echo base_url();?>"+src_5);
					$("#value_4").val(src_5);
					$("#img_5").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/dish_2.png");
					$("#value_5").val(""); 
				}
			}else{
				if(src_5!=""){
					$("#img_3").attr("src","<?php echo base_url();?>"+src_5);
					$("#value_3").val(src_5);
					$("#img_5").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/dish_2.png");
					$("#value_5").val(""); 
				}
			}
		}else{
			if(src_4!=""){
				$("#img_2").attr("src","<?php echo base_url();?>"+src_4);
				$("#value_2").val(src_4);
				$("#img_4").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/dish_2.png");
				$("#value_4").val(""); 
			}else{
				if(src_5!=""){
					$("#img_2").attr("src","<?php echo base_url();?>"+src_5);
					$("#value_2").val(src_5);
					$("#img_5").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/dish_2.png");
					$("#value_5").val(""); 
				}
			}
		}
	}
    //第3个
	if(src_3==""){
		if(src_4!=""){
			$("#img_3").attr("src","<?php echo base_url();?>"+src_4);
			$("#value_3").val(src_4);
			$("#img_4").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/dish_2.png");
			$("#value_4").val(""); 
			if(src_5!=""){
				$("#img_4").attr("src","<?php echo base_url();?>"+src_5);
				$("#value_4").val(src_5);
				$("#img_5").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/dish_2.png");
				$("#value_5").val(""); 
			}
		}else{
			if(src_5!=""){
				$("#img_3").attr("src","<?php echo base_url();?>"+src_5);
				$("#value_3").val(src_5);
				$("#img_5").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/dish_2.png");
				$("#value_5").val(""); 
			}
		}
	}
    //第4个
	if(src_4==""){
		if(src_5!=""){
			$("#img_4").attr("src","<?php echo base_url();?>"+src_5);
			$("#value_4").val(src_5);
			$("#img_5").attr("src","<?php echo constant('ADMIN_SRC');?>media/upload/dish_2.png");
			$("#value_5").val(""); 
		}
	}
}
</script>
</body>
</html>