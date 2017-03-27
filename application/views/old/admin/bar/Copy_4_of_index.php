<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>"伙夫"点餐|吧台管理</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link href="<?php echo constant('ADMIN_SRC');?>media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo constant('ADMIN_SRC');?>media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo constant('ADMIN_SRC');?>media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo constant('ADMIN_SRC');?>media/css/style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo constant('ADMIN_SRC');?>media/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo constant('ADMIN_SRC');?>media/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo constant('ADMIN_SRC');?>media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo constant('ADMIN_SRC');?>media/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo constant('ADMIN_SRC');?>media/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo constant('ADMIN_SRC');?>media/css/daterangepicker.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo constant('ADMIN_SRC');?>media/css/fullcalendar.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo constant('ADMIN_SRC');?>media/css/jqvmap.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="<?php echo constant('ADMIN_SRC');?>media/css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
	<link rel="shortcut icon" href="<?php echo constant('ADMIN_SRC');?>media/image/favicon.ico" />

</head>
<body class="page-header-fixed">
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="brand" href="index.html">
					<img src="<?php echo constant('ADMIN_SRC');?>media/image/logo.png" alt="logo"/>
				</a>
				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
					<img src="<?php echo constant('ADMIN_SRC');?>media/image/menu-toggler.png" alt="" />
				</a>                     
				<ul class="nav pull-right">
					<li class="dropdown user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img alt="" src="<?php echo constant('ADMIN_SRC');?>media/image/avatar1_small.jpg" />
						<span class="username">飘香酒楼</span>
						<i class="icon-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo site_url("admin/admin_index/system")?>"><i class="icon-tasks"></i>进入系统管理</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo site_url("admin/admin_login/login_out")?>"><i class="icon-key"></i>注销账户</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="page-container">
         <div style="background-color:#6EC169;height:30px;padding-left:10px;padding-right:20px;">	
         	<table width="100%">
            	<tr>
                	<td width="12px" style="padding-top:5px;">
                    	<img src="<?php echo constant('ADMIN_SRC');?>media/img/gg.png" style="margin-top:-7px;"/>
                    </td>
                    <td style="padding-top:5px;">
                    	<marquee scrolldelay="1" scrollamount="2" direction="Left">
                            <span>欢迎使用伙夫点餐系统，24小时联系热线400-8856-277!</span>
                        </marquee>
            		</td>
                </tr>
            </table>
         	
			
        </div>
		<div class="page-sidebar nav-collapse collapse">
			<ul class="page-sidebar-menu" id="tab_type_div">
				<li class="active" id="tab_type_div_1" >
					<a href="javascript:show_tab_div('1');">1楼大厅</a>
				</li>
				<li class="" id="tab_type_div_2" >
					<a href="javascript:show_tab_div('2');">2楼大厅</a>
				</li>
			</ul>
		</div>
		<div class="page-content"  style="background-color:#D2D2D2;">
					<div class="left_div" id="left_div" style="margin-left:30px;width:66%;">
                    	
                    </div>
                    <div class="right_div" id="right_div"  style="width:27%;height:500px;">
                    	<table width="100%">
                        	<thead>
                                <tr>
                                    <th colspan="4" style="background-color:#E25345;color:#fff;height:30px;font-size:18px;">(3)个未处理订单</th>
                                </tr>
                                <tr style="background-color:#968A8A;height:30px;font-size:16px;color:#fff;" id="tr_bt">
                                    <th width="10%">ID</th>
                                    <th width="40%">桌号</th>
                                    <th width="25%">时间</th>
                                    <th width="25%">总价</th>
                                </tr>
                            </thead>
                            <tbody id='tbody_1'>
                                
                            </tbody>
                            <thead>
                                <tr>
                                    <th colspan="4" style="background-color:#AB615A;color:#fff;height:30px;font-size:18px;">(4)个订单正在使用</th>
                                </tr>
                            </thead>
                            <tbody id='tbody_2'>
                                <tr>
                                    <td ><a  data-toggle="modal" href="#long">01</a></td>
                                    <td ><a  data-toggle="modal" href="#long">1楼大厅001</a></td>
                                    <td ><a  data-toggle="modal" href="#long">18:34:23</a></td>
                                    <td style="color:#F00;"><a  data-toggle="modal" href="#long">1580.00</a></td>
                                </tr>
                                
                            </tbody>
                            
                        </table>
                    </div>
		</div>
		
	</div>

	<div id="order_show_div">
	
	</div>
    <div id="wcldd" class="hide"  style="background-color:#FFF;width:490px;">
			<div class="modal-header" style="color:#FFF;background-color:#292929;height:30px;">
			    <button type="button" onClick="close_wcldd()" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h3 style="float:left;width:330px;" id="wcldd_name">1楼大厅龙泉厅包厢</h3>
                <h5 style="float:left;width:100px;" id="wcldd_person">就餐人数6/10</h5>
            </div>
			<div class="modal-body" style="background-color:#F5F5F5;height:440px;">
				<table class="table table-striped table-bordered table-hover tab_border_no" id="sample_3" 
                	style="margin-top:5px;margin-left:5px;width:480px;">
									<thead>
                                    	<tr>
                                        	<th colspan="5" style="background-color:#6EC169;">
                                            	<span style="float:left" id="wcldd_order"></span>
                                                <span style="float:right" id="wcldd_time"></span>
                                            </th>
                                        </tr>
										<tr style="background-color:#D2D2D2">
											<th style="width:50px;" >序号</th>
                                            <th style="width:150px;">菜品名称</th>
											<th style="width:80px;">单价</th>
											<th style="width:80px;" class="sorting">数量</th>
											<th style="width:100px;">总价</th>
										</tr>
									</thead>
									<tbody id="wcldd_log">
                                    	
                                      </tbody>
                                      </table>

			</div>
			<div class="modal-footer" style="padding:0px;">
            	<table class="table table-striped table-bordered table-hover tab_border_no"  
                	style="margin-bottom:0px;margin-left:5px;width:480px;">
									<thead>
                                    	<tr style="color:#FFF;background-color:#E02222;">
                                        	<th style="width:270px;text-align:right">合计：</th>
                                            <th style="width:50px;" id="wcldd_sum"></th>
                                            <th id="wcldd_money"></th>
                                        </tr>
                                     </thead>
                </table>
                <table id="sample_3" 
                	style="margin-top:5px;text-align:left;margin-right:25px;margin-bottom:10px;width:480px;">
                        <tr >
                            <td align="right">
                                <button type="submit" style="margin-top:5px;" class="btn_2" >取消订单</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                 <button type="submit" style="margin-top:5px;" class="btn_1" >确认并打印</button>
                            </td>
                        </tr>
                </table>
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
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.vmap.js" type="text/javascript"></script>   
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.vmap.russia.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.vmap.world.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.vmap.europe.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.vmap.germany.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.vmap.usa.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.vmap.sampledata.js" type="text/javascript"></script>  
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.flot.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.flot.resize.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.pulsate.min.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/date.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/daterangepicker.js" type="text/javascript"></script>     
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.gritter.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/fullcalendar.min.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.easy-pie-chart.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.sparkline.min.js" type="text/javascript"></script>  
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/app_1.js" type="text/javascript"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/index.js" type="text/javascript"></script>      
    <script src="<?php echo constant('ADMIN_SRC');?>media/js/ui-modals.js"></script>      
	<script>
	var type_list=eval(<?php echo $type_list;?>);
	var type_list=eval(<?php echo $type_list;?>);
	var order_no_list=eval(<?php echo $order_no_list;?>);

	//解析订单信息数据
	function show_order_tab(){
		$("#order_show_div").html("");
		var del_img="<?php echo constant('ADMIN_SRC');?>media/img/btn_del.png";
		$.each(type_list,function(i1, item1){
			var tab_one_list=item1.tab_list;
			$.each(tab_one_list,function(i2, item2){
				var tab_id=item1.tab_id;
				var tab_state=item1.tab_state;
				if(tab_state==2){
					var type_name=item1.type_name;
					var tab_name=item2.tab_name;
					var tab_person=item2.tab_person;
					var order_list=item2.order_list;
					var order_person=order_list[0]['order_person'];
					$("#order_show_div").append("<div id='show_order_"+tab_id+"' class='modal hide fade' tabindex='-1' data-replace='true' style='width:800px;'>");
					$("#order_show_div").append("	<div class='modal-header' style='color:#FFF;background-color:#292929;height:30px;'>");
					$("#order_show_div").append("		<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>");
					$("#order_show_div").append("		<h3 style='float:left;width:530px;'>"+type_name+tab_name+"</h3>");
					$("#order_show_div").append("		<h5 style='margin-right:20px;float:right;'>就餐人数"+order_person}+"/"+tab_person+"</h5>");
					$("#order_show_div").append("	</div>");
					$("#order_show_div").append("	<div class='modal-body' style='background-color:#F5F5F5;height:300px;'>");
					$("#order_show_div").append("	<table class='table table-striped table-bordered table-hover tab_border_no' id='sample_3' style='margin-top:25px;margin-left:25px;width:750px;'>");
					$order_sum=0;
					$order_money=0;
					$.each(order_list,function(i3, item3){
						var order_id=item3.order_id;
						var order_type=item3.order_type;
						var order_no=item3.order_no;
							var order_no_show="订单号："+order_no;
							if(order_no==1){
								order_no_show="追单号："+order_no;
							}
						var waiter_id=item3.waiter_id;
						var insert_time=item3.insert_time;
						var log_list=item3.log_list;
						$("#order_show_div").append("<thead>");
						$("#order_show_div").append("        <tr>");
						$("#order_show_div").append("				<th colspan='6' style='background-color:#6EC169;'>");
						$("#order_show_div").append("                            	<span style='float:left'>{$order_no_show}</span>");
						$("#order_show_div").append("                                <span style='float:right'>{$insert_time}</span>");
						$("#order_show_div").append("               </th>");
						$("#order_show_div").append("        </tr>");
						$("#order_show_div").append("		 <tr style='background-color:#D2D2D2'>");
					    $("#order_show_div").append("				<th style='width:100px;' >序号</th>");
						$("#order_show_div").append("               <th style='width:220px;'>菜品名称</th>");
						$("#order_show_div").append("			    <th style='width:120px;'>单价</th>");
						$("#order_show_div").append("				<th style='width:100px;' class='sorting'>数量</th>");
						$("#order_show_div").append("				<th style='width:130px;'>总价</th>");
						$("#order_show_div").append("				<th style='width:70px;' >操作</th>");
						$("#order_show_div").append("		</tr>");
						$("#order_show_div").append("</thead>");
						$("#order_show_div").append("<tbody>");
						var log_num=0;
						$.each(log_list,function(i4, item4){
							log_num++;
							log_num_show="";
							if(log_num<10){
								log_num_show="00"+log_num;
							}else if(log_num<100 && log_num>10){
								log_num_show="0"+log_num;
							}else{
								log_num_show=log_num;
							}
							var log_id=item4.log_id;
							var log_name=item4.log_name;
							var log_price=item4.log_price;
							var log_count=item4.log_count;
							var log_money=item4.log_money;
							    order_sum+=log_count;
							    order_money+=log_money;
							    $("#order_show_div").append("<tr class='odd gradeX bg_color'>");
							    $("#order_show_div").append("		<td>"+log_num_show+"</td>");
							    $("#order_show_div").append("		<td>"+log_name+"</td>");
							    $("#order_show_div").append("        <td style='color:#F00;'>"+log_price+"</td>");
							    $("#order_show_div").append("       <td>"+log_count+"份</td>");
							    $("#order_show_div").append("		<td style='color:#F00;'>"+log_money+"</td>");
							    $("#order_show_div").append("		<td>");
							    $("#order_show_div").append("            <a href='#' class='btn_a_del'>");
							    $("#order_show_div").append("           	<img src='"+del_img+"'/>");
							    $("#order_show_div").append("          </a>");
							    $("#order_show_div").append("    </td>");
							    $("#order_show_div").append("</tr>");
					});
				});
				}
					$("#order_show_div").append("		</table>");
					$("#order_show_div").append("</div>";");
					$("#order_show_div").append("<div class='modal-footer' style='padding:0px;'>");
					$("#order_show_div").append("	<table class='table table-striped table-bordered table-hover tab_border_no' id='sample_3'style='margin-bottom:0px;margin-left:25px;width:750px;'>");
					$("#order_show_div").append("		<thead>");
					$("#order_show_div").append("			<tr style='color:#FFF;background-color:#E02222;'>");
				    $("#order_show_div").append("				<th style='width:400px;text-align:right'>合计：</th>");
					$("#order_show_div").append("				<th style='width:90px;'>{$order_sum}份</th>");
					$("#order_show_div").append("				<th>{$order_money}元</th>");
					$("#order_show_div").append("			</tr>");
					$("#order_show_div").append("		</thead>");
					$("#order_show_div").append("	</table>");
					$("#order_show_div").append("	<table id='sample_3' style='margin-top:5px;text-align:left;margin-left:25px;width:750px;'>");
					$("#order_show_div").append("		<tr>");
					$("#order_show_div").append("     		<td style='width:45px'>");
					$("#order_show_div").append("          		 <b>折扣</b>");
					$("#order_show_div").append("   		</td>");
					$("#order_show_div").append("    		<td style='width:140px'>");
					$("#order_show_div").append("        		<input type='text' style='color:#000;font-weight:bold;margin-top:10px;height:20px;width:100px;'/>");
					$("#order_show_div").append("  			</td>");
					$("#order_show_div").append("   		<td style='width:45px'>");
					$("#order_show_div").append(" 				<b>实收</b>");
					$("#order_show_div").append("			</td>");
					$("#order_show_div").append("			<td style='width:140px'>");
					$("#order_show_div").append("              <input type='text' style='color:#000;font-weight:bold;margin-top:10px;height:20px;width:100px;'/>");
					$("#order_show_div").append("        	</td>");
					$("#order_show_div").append("   		<td style='color:#67BB5C;'>");
					$("#order_show_div").append("       		<b>差额&nbsp;&nbsp;&nbsp;-212元</b>");
					$("#order_show_div").append("  			</td>");
					$("#order_show_div").append(" 		</tr>");
					$("#order_show_div").append(" 		<tr>");
					$("#order_show_div").append("          	<td >");
					$("#order_show_div").append("				<b>原因</b>");
					$("#order_show_div").append("       	</td>");
					$("#order_show_div").append(" 			<td colspan='4'>");
					$("#order_show_div").append("    			<label class='checkbox' style='margin-top:5px;margin-left:20px;float:left;width:88px;'>");
					$("#order_show_div").append("					<input type='checkbox' value='' />抹零");
					$("#order_show_div").append("  				</label>");
					$("#order_show_div").append("   			<label class='checkbox' style='margin-top:5px;float:left;width:110px;'>");
					$("#order_show_div").append("					<input type='checkbox' value='' />活动减免");
					$("#order_show_div").append("  				</label>");
					$("#order_show_div").append(" 				<label class='checkbox' style='margin-top:5px;float:left;width:110px;'>");
				    $("#order_show_div").append("					<input type='checkbox' value='' />会员折扣");
				    $("#order_show_div").append("			  	</label>");
				    $("#order_show_div").append("              	<label class='checkbox' style='margin-top:5px;float:left;width:88px;'>");
				    $("#order_show_div").append("					<input type='checkbox' value='' />免单");
					$("#order_show_div").append("			  	</label>");
					$("#order_show_div").append("            	<label class='checkbox' style='margin-top:5px;float:left;width:88px;'>");
					$("#order_show_div").append("					<input type='checkbox' value='' />签单");
					$("#order_show_div").append("		 		</label>");
					$("#order_show_div").append("           	<label class='checkbox' style='margin-top:5px;float:left;width:88px;'>");
					$("#order_show_div").append("					<input type='checkbox' value='' />其它");
					$("#order_show_div").append("	  			</label>");
					$("#order_show_div").append("   	  </td>");
					$("#order_show_div").append("	</tr>");
					$("#order_show_div").append(" 	<tr>");
					$("#order_show_div").append("		<td >");
	                $("#order_show_div").append("         <b>备注</b>");
	                $("#order_show_div").append(" 		</td>");
	                $("#order_show_div").append("     	<td colspan='4'>");
	                $("#order_show_div").append("			<input type='text' style='color:#000;font-weight:bold;margin-top:10px;height:20px;width:530px;'/>");
	                $("#order_show_div").append("    	</td>");
	                $("#order_show_div").append("	</tr>");
	                $("#order_show_div").append("  	<tr>");
	                $("#order_show_div").append(" 		<td >&nbsp;</td>");
	                $("#order_show_div").append("  		<td colspan='4'>");
	                $("#order_show_div").append("    		<label class='checkbox' style='margin-top:5px;margin-left:20px;float:left;width:88px;'>");
	                $("#order_show_div").append("				<input type='checkbox' value='' />小票");
					$("#order_show_div").append("  			</label>");
					$("#order_show_div").append("			<label class='checkbox' style='margin-top:5px;float:left;width:88px;'>");
	                $("#order_show_div").append("				<input type='checkbox' value='' />预览");
	                $("#order_show_div").append("			</label>");
					$("#order_show_div").append(" 		</td>");
					$("#order_show_div").append("  </tr>");
	                $("#order_show_div").append("  <tr >");
	                $("#order_show_div").append("		<td >&nbsp;</td>");
	                $("#order_show_div").append(" 		<td colspan='4'>");
	                $("#order_show_div").append("      		<button type='submit' style='margin-top:5px;' class='btn_1' >结账</button>&nbsp;&nbsp;&nbsp;&nbsp;");
	                $("#order_show_div").append("   		<button type='submit' style='margin-top:5px;' class='btn_2' >重置所有</button>");
	                $("#order_show_div").append("    	</td>");
	                $("#order_show_div").append("	</tr>");
	                $("#order_show_div").append("</table>");
	                $("#order_show_div").append("<br>&nbsp;");
	                $("#order_show_div").append("</div>");
	                $("#order_show_div").append("</div>");
			});
		});
	}
	//解析餐桌数据
	function table_show(){
		//左边部分解析
		$("#tab_type_div").html("");
		$(".left_div").html("");
		var img_user="<?php echo constant('ADMIN_SRC');?>media/img/user.png";
		$.each(type_list,function(i, item){
			var type_id=item.type_id;//分类id
			var type_name=item.type_name;//分类名称
			var tab_list=item.tab_list;//餐桌集合
			$("#tab_type_div").append("<li id='tab_type_div_"+type_id+"' ><a href='javascript:show_tab_div(&quot;"+type_id+"&quot;);'>"+type_name+"</a></li>"); 
			$("#left_div").append("<table width='100%' id='tab_show_"+type_id+"' name='tab_show'>");
            var tr_num=0;
			$.each(tab_list,function(j, itab){
				tr_num++;
				var tab_id=itab.tab_id;
				var tab_name=itab.tab_name;
					var class_table_num="table_num";
					if(isNaN(tab_name)){
						class_table_num="table_china";
					}
				var tab_person=itab.tab_person;
				var tab_state=itab.tab_state;
					var tab_state_show="<td class='table_state'>停用状态</td>";
					var tab_state_a="<a class='btn_border' href='#'>启用餐桌</a>";
					var tab_state_class="work_no";
					if(tab_state==2){
						tab_state_class="working";
						tab_state_show="<td class='table_state'>正在使用</td>";
						tab_state_a="<a class='btn_border' data-toggle='modal' href='#show_order_"+tab_id+"'>查看详情</a> ";
					}else if(tab_state==1){
						tab_state_class="work_for";
						tab_state_show="<td class='table_state'>空闲状态</td>";
						tab_state_a="<a class='btn_border' href='#'>停用餐桌</a>";
					}
				var order_list=itab.order_list;
					var order_person=0;
					if(tab_state==2){
						order_person=order_list[0]['order_person'];
					}
				if(tr_num%3==1){
					$("#tab_show_"+type_id).append("<tr>");
				}
				$("#tab_show_"+type_id).append("<td width='33%'><div class='responsive state_div_1' style='width:96%;'><div class='dashboard-stat "+tab_state_class+"'><table width='100%' ><tr><td width='65%' class='"+class_table_num+"'>"+tab_name+"</td><td rowspan='2' width='35%' class='table_person'><img src='"+img_user+"' width='35px'/><br>"+order_person+"&nbsp;/&nbsp;"+tab_person+"</td></tr><tr>"+tab_state_show+"</tr><tr><td colspan='2' class='table_do'>"+tab_state_a+"</td></tr></table></div></div></td>");
				if(tr_num%3==0){
					$("#tab_show_"+type_id).append("</tr>");
				}
			});
			if(tr_num%3==1){
				$("#tab_show_"+type_id).append("<td></td><td><td></tr>");
			}else if(tr_num%3==2){
				$("#tab_show_"+type_id).append("<td><td></tr>");
			}
			
			$("#left_div").append("</table>");
		});
		$('#tab_type_div>li:first-child').addClass('active');
	}
	function order_show(){
		//右边部分解析
		$("#tbody_1").html("");
		var order_num=0;
		$.each(order_no_list,function(i, item){
		 	 order_num++;
		 	 var order_no_show=order_num;
		 	 if(order_num<10){
			 		order_no_show="0"+order_num;
			 }
             var order_id=item.order_id;//订单id
             var order_type=item.order_type;//订单类型
             var father_id=item.father_id;
             var order_no=item.order_no;//订单编号
             var waiter_id=item.waiter_id;//点餐员
             var order_person=item.order_person;//订单人数
             var insert_time=item.insert_time;//订单时间
            	 insert_time=insert_time.substr(insert_time.length-8);

             var tab_name=item.tab_name;//餐桌名
             var type_name=item.type_name;//楼层名
             var log_list=item.log_list;
             var order_money=0;
             $.each(log_list,function(j, item_log){
            	 var log_money=item_log.log_money;
            	 order_money=Number(order_money)+Number(log_money);
             });
             $("#tbody_1").append("<tr onClick='show_one(&quot;"+i+"&quot;)'><td >"+order_no_show+"</td><td>"+type_name+tab_name+"</td><td>"+insert_time+"</td><td style='color:#F00;'>"+order_money+"</td></tr>");
		});
	}
	//选择展示餐桌
	function show_tab_div(tab_num){
		$('#tab_type_div>li').removeClass('active');
	    $("#tab_type_div_"+tab_num).addClass('active');
		
		$("[name='tab_show']").hide();
		$("#tab_show_"+tab_num).show();
	}
	
		jQuery(document).ready(function() {    
		   table_show();
		   order_show();
		   show_order_tab();
		   App.init(); // initlayout and core plugins
		   UIModals.init();
		   Index.init();
		   Index.initJQVMAP(); // init index page's custom scripts
		   Index.initCalendar(); // init index page's custom scripts
		   Index.initCharts(); // init index page's custom scripts
		   Index.initChat();
		   Index.initMiniCharts();
		   Index.initDashboardDaterange();
		   Index.initIntro();
		});
		function show_one(i){
			item=order_no_list[i];
			var order_id=item['order_id'];//订单id
            var order_type=item['order_type'];//订单类型
            var father_id=item['father_id'];
            var order_no=item['order_no'];//订单编号
            var waiter_id=item['waiter_id'];//点餐员
            var order_person=item['order_person'];//订单人数
            var insert_time=item['insert_time'];//订单时间
            var tab_name=item['tab_name'];//餐桌名
            var type_name=item['type_name'];//楼层名
            var log_list=item['log_list'];
            var tab_person=item['tab_person'];
            var order_money=0;
            $("#wcldd_name").html("");
            $("#wcldd_name").append(type_name+tab_name);
            $("#wcldd_person").html("");
            $("#wcldd_person").append("就餐人数"+order_person+"/"+tab_person);
            $("#wcldd_order").html("");
            if(order_type==0){
            	$("#wcldd_order").append("订单号："+order_no);
            }else{
            	$("#wcldd_order").append("追单号："+order_no);
            }
            $("#wcldd_time").html("");
            $("#wcldd_time").append(insert_time+"&nbsp;&nbsp;");
            $("#wcldd_log").html("");
            var order_num=0;
            var log_sum=0;
            $.each(log_list,function(j, item_log){
            	 order_num++;
      		 	 var order_no_show=order_num;
      		 	 if(order_num<10){
      			 		order_no_show="0"+order_num;
      			 }
           	 	var log_id=item_log.log_id;
            	var log_name=item_log.log_name;
            	var log_price=item_log.log_price;
            	var log_count=item_log.log_count;
            	var log_money=item_log.log_money;
            	$("#wcldd_log").append("<tr class='odd gradeX bg_color'><td>"+order_no_show+"</td><td>"+log_name+"</td><td style='color:#F00;'>"+log_price+"</td><td>"+log_count+"份</td><td style='color:#F00;'>"+log_money+"</td></tr>");
           	 	order_money=Number(order_money)+Number(log_money);
              	log_sum=Number(log_sum)+Number(log_count);
            });
            $("#wcldd_sum").html("");
            $("#wcldd_sum").append(log_sum+"份");
            $("#wcldd_money").html("");
            $("#wcldd_money").append(order_money+"元");
            
			$("#wcldd").show();
			$("#wcldd").attr("tabindex",1);
			$("#wcldd").attr("z-index","10050 !important;");
			$("#wcldd").attr("opacity","0.5");
		}
		function close_wcldd(){
			$("#wcldd").hide();
			$("#wcldd").attr("tabindex",1);
			$("#wcldd").attr("z-index","10050 !important;");
			$("#wcldd").attr("opacity","0.5");
		}
		
	</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>

<!-- END BODY -->

</html>