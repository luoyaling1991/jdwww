<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?php echo constant('SYS_NAME');?>|新建菜品分类</title>
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
								<a href="<?php echo site_url("admin/admin_index/main_right")?>">系统管理</a> 
								<span class="icon-angle-right"></span>
							</li>
							<li>
								<a href="<?php echo site_url("admin/admin_type/type_list")?>">日常管理</a>
								<span class="icon-angle-right"></span>
							</li>
							<li>
								<a href="<?php echo site_url("admin/admin_type/type_list")?>">菜品分类管理</a>
								<span class="icon-angle-right"></span>
							</li>
							<li><a href="<?php echo site_url("admin/admin_type/type_add_show")?>">新建菜品分类</a></li>
						</ul>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="portlet box myself border_none">
							<div class="portlet-title">
								<div class="caption">&nbsp;&nbsp;&nbsp;新建菜品分类</div>
							</div>
							<div class="portlet-body form ">
								<form action="<?php echo site_url("admin/admin_type/type_upd");?>" method="post" onsubmit="return check_submit();" class="form-horizontal">
									<div class="control-group">
										<label class="control-label"><span class="required">*&nbsp;</span>分类名称：</label>
										<div class="controls">
											<input type="text" class="span4 m-wrap" style="width:500px;" name="type_name" id="type_name" value="<?php echo $type['type_name'];?>"/>
											<span class="help-inline" id="type_name_1">套餐名称请控制在4个字以内.</span>
											<input type="hidden" name="type_id" id="type_id" value="<?php echo $type['type_id'];?>">
										</div>
									</div>
                                    <div class="control-group">
										<label class="control-label">分配菜品：</label>
										<div class="controls">
										<input type="hidden" name="set_list" id="set_list" value=""/>
                                        	<div  style="float:left;width:340px;">
                                                 <table width="100%" style="text-align:left;">
                                                 		<tr style="color:#FFF;line-height:34px;background-color:#E02222;" >
                                                        	<th colspan="6" align="left">
                                                           			&nbsp;&nbsp;&nbsp;所属菜品
                                                            </th> 
                                                        </tr>
                                                        <tr style="line-height:28px;background-color:#D2D2D2;" >
                                                            <th width="30px" style="padding-left:15px;">ID</th>
                                                            <th width="100px">排序</th>
                                                            <th width="105px">单品名称</th>
                                                            <th width="65px">单价</th>
                                                            <th width="20px"></th>
                                                        </tr>
                                                  </table>
												<div style="width:99.5%;height:230px;border:1px #ccc solid;overflow-y:auto;">
                                                    <table width="100%" class="tab_set" id="tab_set_list">
                                                        <tr>
                                                            <td  style="padding-left:15px;color:red;">请从右侧菜品中选择菜品添加至分类.</td>
                                                        </tr>
                                                        
                                                    </table>
                                                 </div>
                                            </div>
                                            <div style="width:44px;float:left;">
                                            	<img src="<?php echo constant('ADMIN_SRC');?>media/img/jt.png" width="34px" style="margin-left:5px;margin-right:5px;margin-top:130px"/>
                                            </div>
											<div style="float:left;width:300px;">
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
                                                    <table width="100%" class="tab_set"  id="tab_dish_list">
                                                        
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="mydiv_white" >
                                            	<label class="radio line ">
                                                    <input type="radio" name="sys_type" id="sys_type" value="0" onChange="check_type('0');" checked/>全部
                                                </label>
                                                <label class="radio line line_height">
                                                    <input type="radio" name="sys_type" value="-1"  onChange="check_type('-1');"/>套餐
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
										<label class="control-label"><span class="required">*&nbsp;</span>是否启用：</label>
										<div class="controls">
											<label class="radio">
												<input type="radio" name="type_state" value="1" <?php if($type['type_state']==1){echo "checked";}?>/>立即启用
											</label>
                                            <label class="radio">
												<input type="radio" name="type_state" value="0" <?php if($type['type_state']==0){echo "checked";}?>/>暂不启用
											</label>
                                        </div>
                                     </div>
                                     <div class="control-group">
										<div class="controls">
                                            <button type="submit" class="btn_1">确认提交</button>
    										&nbsp;&nbsp;&nbsp;
                                            <button type="button" class="btn_2">重置所有</button>                            
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
		if($("#type_name").val()==""){
				$("#type_name").focus();
				$("#type_name_1").html("分类名称不能为空.");
				$("#type_name_1").css("color","red");				
				err_num++;
		}else{
			if($("#type_name").val().length>4){
				$("#type_name").focus();
				$("#type_name_1").html("分类名称请控制在4个字符以内.");
				$("#type_name_1").css("color","red");
				err_num++;
			}else{
				$("#type_name_1").css("color","#999999");
			}
		}
		var set_sum=0;
	    $.each(set_list, function(i, item) {
	    	set_sum++;
	  	});
	  	if(set_sum==0){
	  		//err_num++;
	    }else{
	    	$("#set_list").val(JSON.stringify(set_list));
	    }
		if(err_num>0){
			return false;
		}$(".btn_1").attr("disabled", "disabled");
	}
		var dish_list=eval(<?php echo $dish_list;?>); 
		var set_list=eval(<?php echo $set_list;?>);
		jQuery(document).ready(function() {       
		   App.init();
		   height_set();
		   FormComponents.init();
		   dish_list_show();
		   set_list_show();
		});
		function height_set(){
			var	wid=window.screen.availHeight-600;
			if(wid<230){
				wid=230;	
			}
			$("#height_div_1").css("height",wid); 
			$("#height_div_2").css("height",wid); 
		}
		//分类菜品数据解析
		function set_list_show(){
			 var objectList = new Array();//申明存储对象
		     function Persion(dish_id,sort,dish_name,dish_price,dish_count,sys_type){
		            this.dish_id=dish_id;
		            this.sort=sort;
		            this.dish_name=dish_name;
		            this.dish_price=dish_price;
		            this.dish_count=dish_count;
		            this.sys_type=sys_type;
		      }
		      var sum=0;
		      $.each(set_list, function(i, item) {
					objectList.push(new Persion(item.dish_id,item.sort,item.dish_name,item.dish_price,item.dish_count,item.sys_type));
					sum++;
			  });
		      sum--;
			  //按sort值从小到大排序
		      objectList.sort(function(a,b){
		            return a.sort-b.sort});

		    set_list=objectList;
			var num=0;
			$("#tab_set_list").html("");
			
			$.each(objectList, function(i, item) {
				//自己的排序值
				var href_max="javascript:sort_do(&quot;"+i+"&quot;,&quot;"+sum+"&quot;,&quot;0&quot;);";
				var href_shang="javascript:sort_do(&quot;"+i+"&quot;,&quot;"+sum+"&quot;,&quot;1&quot;);";
				var href_xia="javascript:sort_do(&quot;"+i+"&quot;,&quot;"+sum+"&quot;,&quot;2&quot;);";
				var href_min="javascript:sort_do(&quot;"+i+"&quot;,&quot;"+sum+"&quot;,&quot;3&quot;);";
                var onclick_remove="onClick='remove_do(&quot;"+i+"&quot;);'";
				
				var max="<a href='"+href_max+"' class='max_a'>&nbsp;</a>";
				var shang="<a href='"+href_shang+"' class='shang_a'>&nbsp;</a>";
			    var xia="<a href='"+href_xia+"' class='xia_a'>&nbsp;</a>";
				var min="<a href='"+href_min+"' class='min_a'>&nbsp;</a>";
				
				num++;
				var num_show=num;
				if(num<10){
					num_show="0"+num;
				}
				$("#tab_set_list").append("<tr style='text-align:left;'><td width='30px' style='padding-left:15px;' "+onclick_remove+">"+num_show+"</td><td width='95px'>"+max+shang+xia+min+"</td><td width='105px' "+onclick_remove+">"+item.dish_name+"</td><td "+onclick_remove+" width='65px' style='font-weight:bold;color:#F00;' colspan='2'>"+item.dish_price+"</td></tr>");	
			});
			if(num==0){
				$("#tab_set_list").append("<tr><td  style='padding-left:15px;color:red;'>请从右侧菜品中选择菜品添加至套餐.</td></tr>");
			}
		}
		//数量处理
		function remove_do(num){
			var dish=set_list[num];
			var lenght=0;
			$.each(dish_list, function(i, item) {
				lenght++;
			});
		    dish_list[lenght]=dish;
		    set_list.remove(set_list[num]);
			dish_list_show();
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
		//解析所有菜品
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
	</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
</body>
</html>