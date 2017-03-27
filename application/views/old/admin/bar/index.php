<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?php echo constant('SYS_NAME');?>|吧台管理</title>
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
				<a class="brand" href='http://www.jdmenu.cn' target="_blank">
					<img src="<?php echo constant('ADMIN_SRC');?>media/image/logo.png" alt="logo"/>
				</a>
				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
					<img src="<?php echo constant('ADMIN_SRC');?>media/image/menu-toggler.png" alt="" />
				</a>                     
				<ul class="nav pull-right">
					<li class="dropdown user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img alt="" src="<?php echo constant('ADMIN_SRC');?>media/image/avatar1_small.jpg" />
						<span class="username"><?php echo $_SESSION['admin_user']['shop_name']?></span>
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
                            <span>欢迎使用'简点•点餐'系统，24小时联系热线18501376808!</span>
                        </marquee>
            		</td>
                </tr>
            </table>
         	
			
        </div>
		<div class="page-sidebar nav-collapse collapse">
			<ul class="page-sidebar-menu" id="tab_type_div">
				<li class="active" id="tab_type_div_1" >
					<a href="javascript:show_tab_div('1');">无餐桌分类</a>
				</li>
				
			</ul>
		</div>
		<div class="page-content"  style="background-color:#D2D2D2;">
					<div class="left_div" id="left_div" style="margin-left:30px;width:66%;height:auto;">
                    	
                    </div>
                    <div class="right_div" id="right_div"  style="width:27%;height:500px;overflow:auto;">
                    	<table width="100%">
                        	<thead>
                                <tr>
                                    <th colspan="4" style="background-color:#E25345;color:#fff;height:30px;font-size:18px;">(<font id="order_num"></font>)个未处理订单</th>
                                </tr>
                                <tr style="background-color:#968A8A;height:30px;font-size:16px;color:#fff;" id="tr_bt">
                                    <th width="10%">ID</th>
                                    <th width="45%">桌号</th>
                                    <th width="20%">时间</th>
                                    <th width="25%">总价</th>
                                </tr>
                            </thead>
                            <tbody id='tbody_1'>
                                
                            </tbody>
                            <thead>
                                <tr>
                                    <th colspan="4" style="background-color:#AB615A;color:#fff;height:30px;font-size:18px;">(<font id="order_now_num">0</font>)个订单正在使用</th>
                                </tr>
                            </thead>
                            <tbody id='tbody_2'>
                                
                                
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
			<div class="modal-body" id="wcldd_div" style="background-color:#F5F5F5;">
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
                                <button type="button" style="margin-top:5px;" class="btn_2" id="order_delete" onclick="order_do('0','29');">取消订单</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="button" style="margin-top:5px;" class="btn_1" id="order_submit" onclick="order_do('1','29');">确认并打印</button>
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
    <!-- <script src="<?php echo constant('ADMIN_SRC');?>media/js/ui-do.js"></script> -->
    <script src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap-modal.js" type="text/javascript" ></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap-modalmanager.js" type="text/javascript" ></script>      
	<script>
	var type_list=eval(<?php echo $type_list;?>);
	var order_no_list=eval(<?php echo $order_no_list;?>);
	var max_table=0;
	var int;
	int=self.setInterval('ajax_get()',3000);
	function open_int(){
		int=self.setInterval('ajax_get()',3000);
	}
	function close_int(){
		window.clearInterval(int);
	}
	var yy_arr=new Dictionary();
	
	
	function tab_now_show(do_tab_id){
		close_int();
		$("#tab_order_"+do_tab_id).click();
	}
	
	var upd_tab_url='<?php echo site_url("admin/admin_bar/upd_tab")?>';
	var order_do_url='<?php echo site_url("admin/admin_bar/order_do")?>';
	var del_log_url='<?php echo site_url("admin/admin_bar/del_log")?>';
	var ajax_get_url='<?php echo site_url("admin/admin_bar/ajax")?>';
	var ajax_submit_url='<?php echo site_url("admin/admin_bar/order_checkout")?>';
	var del_img="<?php echo constant('ADMIN_SRC');?>media/img/btn_del.png";
	var img_user="<?php echo constant('ADMIN_SRC');?>media/img/user.png";
	var print_img="<?php echo constant('ADMIN_SRC');?>media/img/btn_dy.png";
	var type_id_value=type_list[0]['type_id'];
	//选择展示餐桌
	function show_tab_div(tab_num){
		$('#tab_type_div>li').removeClass('active');
	    $("#tab_type_div_"+tab_num).addClass('active');
		
		$("[name='tab_show']").hide();
		$("#tab_show_"+tab_num).show();
		type_id_value=tab_num;
	}
		jQuery(document).ready(function() {    
		   table_show();
		   order_show();
		   show_order_tab();
		   set_height();
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
	function set_height(){
		var p_height=window.innerHeight;//document.documentElement.clientHeight;
		var modal_height=p_height-318;
		p_height=p_height-70;
	    //21+151*排数
	    var hang=Math.ceil(max_table/3);
	    var y_height=21+151*hang;
	    if(y_height>p_height){
	    	$(".page-content").css("min-height",y_height); //左边区域高度
		}else{
			$(".page-content").css("min-height",p_height); //左边区域高度
		}
	    $("#right_div").css("min-height",p_height-110); //设置右边的宽度
	    $("#wcldd_div").css("height",p_height-110);
	}
	function open_print(order_print_id){
		window.open("<?php echo site_url('admin/admin_print/print_one?order_id=')?>"+order_print_id);    
	}
	//确认订单
	function order_do(type_value,order_id_value){
		$.ajax({
		       url:order_do_url,
		       type: "POST",
		       data:{type:type_value,order_id:order_id_value},
		       dataType: "json", 
		       error: function(){  
		            //alert('系统故障，请联系我们的客户人员！');  
		       },  
		       success: function(data,status){//如果调用php成功  
		    	   	 data=eval(data);
			         if(data['bl']==0){
						alert('该餐桌还有未订单结单，请先结单再来处理该订单！');
				     }else{
					     if(type_value==1){
					    	 print(order_id_value);
						 }
			             type_list=data['type_list'];
			             order_no_list=data['order_no_list'];
			             table_show();
				  		 order_show();
				  		 show_order_tab();
					  	 close_wcldd();
						
					 }  
		    	   	 
					 //window.open("<?php echo site_url('admin/admin_print/print_one?order_id=')?>"+order_id_value); 
		       }
		   });
		
	}

  
function print(order_id_value){
	$.ajax({
	       url:"<?php echo site_url('admin/admin_print/print_one_do')?>",
	       type: "POST",
	       data:{order_id:order_id_value},
	       dataType: "json", 
	       error: function(){  
	            //alert('系统故障，请联系我们的客户人员！');  
	       },  
	       success: function(data,status){//如果调用php成功    
	    	   var print_data=eval(data);
	    	   try {  
		              // 创建ActiveXObject对象  
		              wdapp = new ActiveXObject("Word.Application");  
		         }  
		         catch (e) {  
		        	alert("打印失败，请确认浏览器ActiveX控件和插件全部启用以及浏览器使用IE10！");
		            wdapp = null;  
		            return;  
		         }
		         wdapp.Documents.Open(print_data['print_type']); //打开本地(客户端)word模板
		         wddoc = wdapp.ActiveDocument;  
		         wddoc.Bookmarks("print_name").Range.Text =print_data['print_name'];
		         wddoc.Bookmarks("order_no").Range.Text = print_data['order']['order_no']+"\n就餐餐桌："+print_data['tab_name']+"\n点单工号："+print_data['order']['waiter_id'];
		         wddoc.Bookmarks("insert_time").Range.Text = print_data['order']['insert_time'];
		         wddoc.Bookmarks("call_num").Range.Text = print_data['call_num'];
		         if(print_data['other']!==""){
		        	 wddoc.Bookmarks("call_address").Range.Text = print_data['call_address']+"\n"+print_data['other'];
			     }else{
			    	 wddoc.Bookmarks("call_address").Range.Text = print_data['call_address'];
				 }
		         var log_sum=0;
		         var log_name_list="";
		         var log_count_list="";
		         var log_money_list="";
		         var log_list=print_data['order_list'];
		         $.each(log_list,function(i, item){
		        	 log_name_list+=item.log_name+"\n";
		        	 log_count_list+=item.log_count+"\n";
		        	 log_money_list+=item.log_money+"\n";
		        	 log_sum=parseFloat(log_sum)+parseFloat(item.log_money);
			    });
		        
			   	wddoc.Bookmarks("log_name").Range.Text = log_name_list;
			   	wddoc.Bookmarks("log_count").Range.Text = log_count_list;
			   	wddoc.Bookmarks("log_money").Range.Text = log_money_list;
			  
		         wddoc.Bookmarks("sum").Range.Text =log_sum;
		         wddoc.saveAs("d:\\PrinterTemp_cnblogs.doc"); //保存临时文件word
		         //wdapp.ActiveDocument.ActiveWindow.View.Type = 1;
		         wdapp.visible = false; //word模板是否可见  
		         wdapp.Application.Printout(); //调用自动打印功能  
		         wdapp.quit();
		         wdapp = null;  
	       }
	   });
		        
	 }
function print_jz(sub_tab_id,ss_1){
	$.ajax({
	       url:"<?php echo site_url('admin/admin_print/print_two_do')?>",
	       type: "POST",
	       data:{tab_id:sub_tab_id},
	       dataType: "json", 
	       error: function(){  
	            //alert('系统故障，请联系我们的客户人员！');  
	       },  
	       success: function(data,status){//如果调用php成功    
	    	   var print_data=eval(data);
	    	   try {  
		              // 创建ActiveXObject对象  
		              wdapp = new ActiveXObject("Word.Application");  
		         }  
		         catch (e) {  
		        	alert("打印失败，请确认浏览器ActiveX控件和插件全部启用以及浏览器使用IE10！");
		            wdapp = null;  
		            return;  
		         }
		         wdapp.Documents.Open(print_data['print_type']); //打开本地(客户端)word模板
		         wddoc = wdapp.ActiveDocument;  
		         wddoc.Bookmarks("print_name").Range.Text =print_data['print_name'];
		         wddoc.Bookmarks("order_no").Range.Text = print_data['order']['order_no']+"\n就餐餐桌："+print_data['tab_name']+"\n点单工号："+print_data['order']['waiter_id'];
		         wddoc.Bookmarks("insert_time").Range.Text = print_data['order']['insert_time'];
		         wddoc.Bookmarks("call_num").Range.Text = print_data['call_num'];
		         if(print_data['other']!==""){
		        	 wddoc.Bookmarks("call_address").Range.Text = print_data['call_address']+"\n"+print_data['other'];
			     }else{
			    	 wddoc.Bookmarks("call_address").Range.Text = print_data['call_address'];
				 }
		         var log_sum=0;
		         var log_name_list="";
		         var log_count_list="";
		         var log_money_list="";
		         var log_list=print_data['order_list'];
		         $.each(log_list,function(i, item){
		        	 log_name_list+=item.log_name+"\n";
		        	 log_count_list+=item.log_count+"\n";
		        	 log_money_list+=item.log_money+"\n";
		        	 log_sum=parseFloat(log_sum)+parseFloat(item.log_money);
			    });
		        
			   	wddoc.Bookmarks("log_name").Range.Text = log_name_list;
			   	wddoc.Bookmarks("log_count").Range.Text = log_count_list;
			   	wddoc.Bookmarks("log_money").Range.Text = log_money_list;
			  
		         wddoc.Bookmarks("sum").Range.Text =log_sum+"    实收："+ss_1;
		         wddoc.saveAs("d:\\PrinterTemp_cnblogs.doc"); //保存临时文件word
		         //wdapp.ActiveDocument.ActiveWindow.View.Type = 1;
		         wdapp.visible = false; //word模板是否可见  
		         wdapp.Application.Printout(); //调用自动打印功能  
		         wdapp.quit();
		         wdapp = null;  
	       }
	   });
	return "ok";
	 }
	 //---------------------------------------------------------------------------------
//修改餐桌
function upd_tab(t_id,t_state){
	$.ajax({
	       url:upd_tab_url,
	       type: "POST",
	       data:{t_id:t_id,tab_state:t_state},
	       dataType: "json", 
	       error: function(){  
	            //alert('系统故障，请联系我们的客户人员！');  
	       },  
	       success: function(data,status){//如果调用php成功    
	    	   	 data=eval(data);
	             type_list=data['type_list'];
	             order_no_list=data['order_no_list'];
	             table_show();
		  		 order_show();
		  		 show_order_tab();
			  	 close_wcldd()
	       }
	   });
}

function del_log(do_tab_id,do_log_id){
	var result = confirm('您确认要删除该订单菜品吗？');
	if(result){
		$("#close_tab_"+do_tab_id).click();
		$.ajax({
		       url:del_log_url,
		       type: "POST",
		       data:{log_id:do_log_id},
		       dataType: "json", 
		       error: function(){  
		            alert('系统故障，请联系我们的客户人员！');  
		       },  
		       success: function(data,status){//如果调用php成功    
		    	   	// data=eval(data);
		            // type_list=data['type_list'];
		            // order_no_list=data['order_no_list'];
		             //table_show();
			  		 //order_show();
			  		// show_order_tab();
				  	 window.location.reload();
				  	//$("#tab_order_"+do_tab_id).click();
					// $("#close_tab_"+do_tab_id).click();
		       }
		   });
	}
}
//更新数据ajax
function ajax_get(){
	$.ajax({
		       url:ajax_get_url,
		       type: "POST",
		       data:{},
		       dataType: "json", 
		       error: function(){  
		            //alert('系统故障，请联系我们的客户人员！');  
		       },  
		       success: function(data,status){//如果调用php成功    
		             data=eval(data);
		             type_list=data['type_list'];
		             order_no_list=data['order_no_list'];
		             table_show();
			  		 order_show();
			  		 show_order_tab();
		         }
		   });
		       
}
//解析订单信息数据
function show_order_tab(){
	$("#order_show_div").html("");
	$("#tbody_2").html("");
	var order_now_num=0;
	$.each(type_list,function(i1, item1){
		var tab_one_list=item1.tab_list;
		$.each(tab_one_list,function(i2, item2){
			var tab_id=item2.tab_id;
			var tab_state=item2.tab_state;
			var order_show_div_html="";
			if(tab_state==2){
				order_now_num++;
				order_now_num_show=order_now_num;
				if(order_now_num<10){
					order_now_num_show="0"+order_now_num;
				}
				var type_name=item1.type_name;
				var tab_name=item2.tab_name;
				var tab_person=item2.tab_person;
				var order_list=item2.order_list;
				var order_person=order_list[0]['order_person'];
				var modal_height=window.innerHeight-318;
				order_show_div_html+="<div id='show_order_"+tab_id+"' class='modal hide fade' tabindex='-1' data-replace='true' style='width:800px;'>";
				order_show_div_html+="	<div class='modal-header' style='color:#FFF;background-color:#292929;height:30px;'>";
				order_show_div_html+="		<button type='button' id='close_tab_"+tab_id+"' onclick='open_int();' class='close' data-dismiss='modal' aria-hidden='true'></button>";
				order_show_div_html+="		<h3 style='float:left;width:530px;'>"+type_name+tab_name+"</h3>";
				order_show_div_html+="		<h5 style='margin-right:20px;float:right;'>就餐人数"+order_person+"/"+tab_person+"</h5>";
				order_show_div_html+="	</div>";
				order_show_div_html+="	<div class='modal-body' style='background-color:#F5F5F5;height:"+modal_height+"px;'><form method='post' action='' >";
				order_show_div_html+="	<table class='table table-striped table-bordered table-hover tab_border_no' id='sample_3' style='margin-top:25px;margin-left:25px;width:750px;'>";

				var order_sum=0;
				var order_money=0;
				$.each(order_list,function(i3, item3){
					var order_id=item3.order_id;
					var order_type=item3.order_type;
					var order_no=item3.order_no;
					var waiter_id=item3.waiter_id;
						var order_no_show="订单号："+order_no+"<font color='red'>("+waiter_id+")</font>";
						if(order_type==1){
							order_no_show="追单号："+order_no+"<font color='red'>("+waiter_id+")</font>";
						}
					var waiter_id=item3.waiter_id;
					var insert_time=item3.insert_time;
					var log_list=item3.log_list;
					order_show_div_html+="<thead>";
					order_show_div_html+="        <tr>";
					order_show_div_html+="				<th colspan='6' style='background-color:#6EC169;'>";
					order_show_div_html+="                            	<span style='float:left'>"+order_no_show+"</span>";
					order_show_div_html+="                                <span style='float:right;margin-left:50px;' ><a href='javascript:open_print(&quot;"+order_id+"&quot;);'><img src='"+print_img+"'/></a></span>";
					order_show_div_html+="                                <span style='float:right'>"+insert_time+"</span>";
					order_show_div_html+="               </th>";
					order_show_div_html+="        </tr>";
					order_show_div_html+="		 <tr style='background-color:#D2D2D2'>";
				    order_show_div_html+="				<th style='width:100px;' >序号</th>";
					order_show_div_html+="               <th style='width:220px;'>菜品名称</th>";
					order_show_div_html+="			    <th style='width:120px;'>单价</th>";
					order_show_div_html+="				<th style='width:100px;' class='sorting'>数量</th>";
					order_show_div_html+="				<th style='width:130px;'>总价</th>";
					order_show_div_html+="				<th style='width:70px;' >操作</th>";
					order_show_div_html+="		</tr>";
					order_show_div_html+="</thead>";
					order_show_div_html+="<tbody>";
					var log_num=0;
					$.each(log_list,function(i4, item4){
						log_num++;
						log_num_show="";
						if(log_num<10){
							log_num_show="00"+log_num;
						}else if(log_num<100 && log_num>9){
							log_num_show="0"+log_num;
						}else{
							log_num_show=log_num;
						}
						var log_id=item4.log_id;
						var log_name=item4.log_name;
						var log_price=item4.log_price;
						var log_count=item4.log_count;
						var log_money=item4.log_money;
						var href_del="javascript:del_log(&quot;"+tab_id+"&quot;,&quot;"+log_id+"&quot;);";
						    order_sum=Number(order_sum)+Number(log_count);
						    order_money=Number(order_money)+Number(log_money);
						    if(log_num%2==1){
						    	order_show_div_html+="<tr class='odd gradeX bg_color'>";
							}else{
								order_show_div_html+="<tr class='odd gradeX'>";
							}
						    order_show_div_html+="		<td>"+log_num_show+"</td>";
						    order_show_div_html+="		<td>"+log_name+"</td>";
						    order_show_div_html+="        <td style='color:#F00;'>"+log_price+"</td>";
						    order_show_div_html+="       <td>"+log_count+"份</td>";
						    order_show_div_html+="		<td style='color:#F00;'>"+log_money+"</td>";
						    order_show_div_html+="		<td>";
						    order_show_div_html+="            <a href='"+href_del+"' class='btn_a_del'>";
						    order_show_div_html+="           	<img src='"+del_img+"'/>";
						    order_show_div_html+="          </a>";
						    order_show_div_html+="    </td>";
						    order_show_div_html+="</tr>";
						    
				});
			});
				order_show_div_html+="		</table>";
				order_show_div_html+="</div>";
				order_show_div_html+="<div class='modal-footer' style='padding:0px;'>";
				order_show_div_html+="	<table class='table table-striped table-bordered table-hover tab_border_no' id='sample_3'style='margin-bottom:0px;margin-left:25px;width:750px;'>";
				order_show_div_html+="		<thead>";
				order_show_div_html+="			<tr style='color:#FFF;background-color:#E02222;'>";
			    order_show_div_html+="				<th style='width:400px;text-align:right'>合计：</th>";
				order_show_div_html+="				<th style='width:90px;'>"+order_sum+"份</th>";
				order_show_div_html+="				<th>"+order_money+"元</th>";
				order_show_div_html+="			</tr>";
				order_show_div_html+="		</thead>";
				order_show_div_html+="	</table>";
				order_show_div_html+="	<table id='sample_3' style='margin-top:5px;text-align:left;margin-left:25px;width:750px;'>";
				order_show_div_html+="		<tr>";
				order_show_div_html+="     		<td style='width:45px'>";
				order_show_div_html+="          		 <b>折扣</b>";
				order_show_div_html+="   		</td>";
				order_show_div_html+="    		<td style='width:140px'>";
				order_show_div_html+="        		<input type='text' id='zk_"+tab_id+"' onchange='zk_change(&quot;"+tab_id+"&quot;,&quot;"+order_money+"&quot;)' style='color:#000;font-weight:bold;margin-top:10px;height:20px;width:100px;'/>";
				order_show_div_html+="  			</td>";
				order_show_div_html+="   		<td style='width:45px'>";
				order_show_div_html+=" 				<b>实收</b>";
				order_show_div_html+="			</td>";
				order_show_div_html+="			<td style='width:140px'>";
				order_show_div_html+="              <input type='text' id='ss_"+tab_id+"' onchange='ss_change(&quot;"+tab_id+"&quot;,&quot;"+order_money+"&quot;)' style='color:#000;font-weight:bold;margin-top:10px;height:20px;width:100px;'/>";
				order_show_div_html+="        	</td>";
				order_show_div_html+="   		<td style='color:#67BB5C;'>";
				order_show_div_html+="       		<b>差额&nbsp;&nbsp;&nbsp;<font id='ce_"+tab_id+"'>0</font>元&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style='color:red;' id='tishi_"+tab_id+"'></font></b>";
				order_show_div_html+="  			</td>";
				order_show_div_html+=" 		</tr>";
				order_show_div_html+=" 		<tr>";
				order_show_div_html+="          	<td >";
				order_show_div_html+="				<b>原因</b>";
				order_show_div_html+="       	</td>";
				order_show_div_html+=" 			<td colspan='4' id='checkbox_"+tab_id+"'>";
				order_show_div_html+="    			<label class='checkbox' style='margin-top:5px;margin-left:20px;float:left;width:88px;'>";
				order_show_div_html+="					<input type='checkbox' value='抹零' name='yy_"+tab_id+"' onclick='push_yy(&quot;抹零、&quot;,&quot;"+tab_id+"&quot;)'/>抹零";
				order_show_div_html+="  				</label>";
				order_show_div_html+="   			<label class='checkbox' style='margin-top:5px;float:left;width:110px;'>";
				order_show_div_html+="					<input type='checkbox' value='活动减免' name='yy_"+tab_id+"' onclick='push_yy(&quot;活动减免、&quot;,&quot;"+tab_id+"&quot;)'/>活动减免";
				order_show_div_html+="  				</label>";
				order_show_div_html+=" 				<label class='checkbox' style='margin-top:5px;float:left;width:110px;'>";
			    order_show_div_html+="					<input type='checkbox' value='会员折扣' name='yy_"+tab_id+"' onclick='push_yy(&quot;会员折扣、&quot;,&quot;"+tab_id+"&quot;)'/>会员折扣";
			    order_show_div_html+="			  	</label>";
			    order_show_div_html+="              	<label class='checkbox' style='margin-top:5px;float:left;width:88px;'>";
			    order_show_div_html+="					<input type='checkbox' value='免单' name='yy_"+tab_id+"' onclick='push_yy(&quot;免单、&quot;,&quot;"+tab_id+"&quot;)'/>免单";
				order_show_div_html+="			  	</label>";
				order_show_div_html+="            	<label class='checkbox' style='margin-top:5px;float:left;width:88px;'>";
				order_show_div_html+="					<input type='checkbox' value='签单' name='yy_"+tab_id+"' onclick='push_yy(&quot;签单、&quot;,&quot;"+tab_id+"&quot;)'/>签单";
				order_show_div_html+="		 		</label>";
				order_show_div_html+="           	<label class='checkbox' style='margin-top:5px;float:left;width:88px;'>";
				order_show_div_html+="					<input type='checkbox' value='其它' name='yy_"+tab_id+"' onclick='push_yy(&quot;其它、&quot;,&quot;"+tab_id+"&quot;)'/>其它";
				order_show_div_html+="	  			</label>";
				order_show_div_html+="   	  </td>";
				order_show_div_html+="	</tr>";
				order_show_div_html+=" 	<tr>";
				order_show_div_html+="		<td >";
                order_show_div_html+="         <b>备注</b>";
                order_show_div_html+=" 		</td>";
                order_show_div_html+="     	<td colspan='4'>";
                order_show_div_html+="			<input type='text' id='bz_"+tab_id+"' style='color:#000;font-weight:bold;margin-top:10px;height:20px;width:530px;'/>";
                order_show_div_html+="    	</td>";
                order_show_div_html+="	</tr>";
                order_show_div_html+="  	<tr>";
                order_show_div_html+=" 		<td >&nbsp;</td>";
                order_show_div_html+="  		<td colspan='4'>";
                order_show_div_html+="    		<label class='checkbox' style='margin-top:5px;margin-left:20px;float:left;width:88px;'>";
                order_show_div_html+="				<input type='checkbox' value='1' name='xiaopiao' id='xiaopiao_"+tab_id+"' checked/>小票";
				order_show_div_html+="  			</label>";
				order_show_div_html+="			<!--<label class='checkbox' style='margin-top:5px;float:left;width:88px;'>";
                order_show_div_html+="				<input type='checkbox' value='' />预览";
                order_show_div_html+="			</label>-->";
				order_show_div_html+=" 		</td>";
				order_show_div_html+="  </tr>";
                order_show_div_html+="  <tr >";
                order_show_div_html+="		<td >&nbsp;</td>";
                order_show_div_html+=" 		<td colspan='4'>";
                order_show_div_html+="      		<button type='button' onclick='ajax_submit(&quot;"+tab_id+"&quot;);' style='margin-top:5px;' class='btn_1' >结账</button>&nbsp;&nbsp;&nbsp;&nbsp;";
                order_show_div_html+="   		<button type='reset' style='margin-top:5px;' class='btn_2' >重置所有</button>";
                order_show_div_html+="    	</td>";
                order_show_div_html+="	</tr>";
                order_show_div_html+="</table></form>";
                order_show_div_html+="<br>&nbsp;";
                order_show_div_html+="</div>";
                order_show_div_html+="</div>";
                
                $("#order_show_div").append(order_show_div_html);
                //右下角的正在使用的订单数据
                
                var insert_time_no1=order_list[0]['insert_time'];
                insert_time_no1=insert_time_no1.substr(insert_time_no1.length-8);
                var tbody_2_html="<tr onclick='tab_now_show(&quot;"+tab_id+"&quot;);'>";
                	tbody_2_html+="<td >"+order_now_num_show+"</td>";
                	tbody_2_html+="<td >"+type_name+tab_name+"</td>";
                	tbody_2_html+="<td >"+insert_time_no1+"</td>";
                	tbody_2_html+="<td style='color:red;'>"+order_money+"</td>";
                	tbody_2_html+="</tr>";
                $("#tbody_2").append(tbody_2_html);
			}
				
		});
	});
	$("#order_now_num").html("");
	$("#order_now_num").append(order_now_num);
}
//解析餐桌数据
function table_show(){
	//左边部分解析
	$("#tab_type_div").html("");
	$(".left_div").html("");
	
	$.each(type_list,function(i, item){
		var type_id=item.type_id;//分类id
		var type_name=item.type_name;//分类名称
		var tab_list=item.tab_list;//餐桌集合
		$("#tab_type_div").append("<li id='tab_type_div_"+type_id+"' ><a href='javascript:show_tab_div(&quot;"+type_id+"&quot;);'>"+type_name+"</a></li>"); 
		$("#left_div").append("<table width='100%' id='tab_show_"+type_id+"' name='tab_show'>");
        var tr_num=0;
        var tab_show_html="";
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
				var tab_state_a="<a class='btn_border' href='javascript:upd_tab(&quot;"+tab_id+"&quot;,&quot;1&quot;)'>启用餐桌</a>";
				var tab_state_class="work_no";
				if(tab_state==2){
					tab_state_class="working";
					tab_state_show="<td class='table_state'>正在使用</td>";
					tab_state_a="<a href='#show_order_"+tab_id+"' data-toggle='modal' id='tab_order_"+tab_id+"'></a><a class='btn_border'   onclick='tab_now_show(&quot;"+tab_id+"&quot;)'>查看详情</a> ";
				}else if(tab_state==1){
					tab_state_class="work_for";
					tab_state_show="<td class='table_state'>空闲状态</td>";
					tab_state_a="<a class='btn_border' href='javascript:upd_tab(&quot;"+tab_id+"&quot;,&quot;0&quot;)'>停用餐桌</a>";
				}
			var order_list=itab.order_list;
				var order_person=0;
				if(tab_state==2){
					order_person=order_list[0]['order_person'];
				}
			if(tr_num%3==1){
				tab_show_html+="<tr>";
			}
			tab_show_html+="<td width='33%'><div class='responsive state_div_1' style='width:96%;'><div class='dashboard-stat "+tab_state_class+"'><table width='100%' ><tr><td width='65%' class='"+class_table_num+"'>"+tab_name+"</td><td rowspan='2' width='35%' class='table_person'><img src='"+img_user+"' width='35px'/><br>"+order_person+"&nbsp;/&nbsp;"+tab_person+"</td></tr><tr>"+tab_state_show+"</tr><tr><td colspan='2' class='table_do'>"+tab_state_a+"</td></tr></table></div></div></td>";
			if(tr_num%3==0){
				tab_show_html+="</tr>";
			}
		});
		if(tr_num%3==1){
			tab_show_html+="<td></td><td><td></tr>";
		}else if(tr_num%3==2){
			tab_show_html+="<td><td></tr>";
		}
		if(tr_num>max_table){
			max_table=tr_num;
		}
		$("#tab_show_"+type_id).append(tab_show_html);
		$("#left_div").append("</table>");
	});
	$('#tab_type_div>li:first-child').addClass('active');
	show_tab_div(type_id_value);
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
         if(order_type==0){
        	 $("#tbody_1").append("<tr onClick='show_one(&quot;"+i+"&quot;)'><td >"+order_no_show+"</td><td>"+type_name+tab_name+"</td><td>"+insert_time+"</td><td style='color:#F00;'>"+order_money+"</td></tr>");
         }else{
        	 $("#tbody_1").append("<tr onClick='show_one(&quot;"+i+"&quot;)'><td style='color:#6BD814;'>"+order_no_show+"</td><td style='color:#6BD814;'>"+type_name+tab_name+"</td><td style='color:#6BD814;'>"+insert_time+"</td><td style='color:#F00;'>"+order_money+"</td></tr>");
         }
    });
    if(order_num==0){
    	$("#tbody_1").append("<tr><td colspan='4' style='color:#F00;'>暂无未处理订单！</td></tr>");
    }
	$("#order_num").html("");
	$("#order_num").append(order_num);
}

function show_one(i_check){
	$.each(order_no_list,function(i, item){
		if(i==i_check){
			var log_list=item.log_list;
			var order_id=item.order_id;//订单id
	        var order_type=item.order_type;//订单类型
	        var father_id=item.father_id;
	        var order_no=item.order_no;//订单编号
	        var waiter_id=item.waiter_id;//点餐员
	        var order_person=item.order_person;//订单人数
	        var insert_time=item.insert_time;//订单时间
	        var tab_name=item.tab_name;//餐桌名
	        var type_name=item.type_name;//楼层名
	        var tab_person=item.tab_person;
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
			$("#order_delete").removeAttr("onclick");
			$("#order_submit").removeAttr("onclick");
			$("#order_delete").attr("onclick","order_do('0','"+order_id+"');");
			$("#order_submit").attr("onclick","order_do('1','"+order_id+"');");
		}
		
	});	
}
function close_wcldd(){
	$("#wcldd").hide();
	$("#wcldd").attr("tabindex",1);
	$("#wcldd").attr("z-index","10050 !important;");
	$("#wcldd").attr("opacity","0.5");
}

function zk_change(one_table_id,money){
	var zk=$("#zk_"+one_table_id).val();
	if(isNaN(zk)){
		$("#zk_"+one_table_id).val("");
		alert("请正确填写！");
	}else{
		var ss=Number(money)-Number(zk);
		$("#ss_"+one_table_id).val(ss);
		$("#ce_"+one_table_id).html("");
		$("#ce_"+one_table_id).append(zk);
	}
}
function ss_change(one_table_id,money){
	var ss=$("#ss_"+one_table_id).val();
	if(isNaN(ss)){
		$("#ss_"+one_table_id).val("");
		alert("请正确填写！");
	}else{
		var zk=Number(money)-Number(ss);
		$("#zk_"+one_table_id).val(zk);
		$("#ce_"+one_table_id).html("");
		$("#ce_"+one_table_id).append(zk);
	}
}
function Dictionary(){
	 this.data = new Array();
	 
	 this.put = function(key,value){
	  this.data[key] = value;
	 };

	 this.get = function(key){
	  return this.data[key];
	 };

	 this.remove = function(key){
	  this.data[key] = null;
	 };
	 
	 this.isEmpty = function(){
	  return this.data.length == 0;
	 };

	 this.size = function(){
	  return this.data.length;
	 };
	}
//添加数组
function push_yy(value,id){
	go_value=yy_arr.get(id);
	if(go_value==undefined){
		yy_arr.put(id,value);
	}else{
		//先判断是否存在
		cz_num=go_value.indexOf(value);
		if(cz_num<0){
			//不存在则添加
			go_value=go_value+value;
			yy_arr.put(id,go_value);
		}else{
			//存在则去除
			go_value = go_value.replace(value,"");
			yy_arr.put(id,go_value);
		}
	}
}
//提交订单
function ajax_submit(sub_tab_id){
	//先获取折扣实收
	var zk_1=$("#zk_"+sub_tab_id).val();
	var ss_1=$("#ss_"+sub_tab_id).val();
	//备注以及主单id
	var bz=$("#bz_"+sub_tab_id).val();  
	var yy=yy_arr.get(sub_tab_id);
	if(ss_1<0 || ss_1==""){
		$("#tishi_"+sub_tab_id).html("");
		$("#tishi_"+sub_tab_id).append("请填写实收金额！");
		return false;
	}else{
		if(yy==undefined && zk_1>0){
			$("#tishi_"+sub_tab_id).html("");
			$("#tishi_"+sub_tab_id).append("请选择则扣原因！");
			return false;
		}else{
			var v="";
			if($("#xiaopiao_"+sub_tab_id).attr('checked') == 'checked'){
				v=print_jz(sub_tab_id,ss_1);
			}else{
				v="ok";
			}
			
			$("#tishi_"+sub_tab_id).html("");
			$.ajax({
			       url:ajax_submit_url,
			       type: "POST",
			       data:{table_id:sub_tab_id,zk:zk_1,ss:ss_1,bz:bz,yy:yy},
			       dataType: "json", 
			       error: function(){  
			            //alert('系统故障，请联系我们的客户人员！');  
			       },  
			       success: function(data,status){//如果调用php成功
				       if(data==-1){
							alert("该订单还有追单未处理，请处理后结账！");
							if(v=="ok"){
					    		   window.location.reload();
							   }
					   }else{
						   if(v=="ok"){
				    		   window.location.reload();
						   }
					  }
			    	   	// $("#close_tab_"+sub_tab_id).click();
			    	   	// data=eval(data);
			            // type_list=data['type_list'];
			             //order_no_list=data['order_no_list'];
			             //table_show();
				  		 //order_show();
				  		 //show_order_tab();
			       }
			   });
		open_int();
		}
	}
}

	</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>

<!-- END BODY -->

</html>