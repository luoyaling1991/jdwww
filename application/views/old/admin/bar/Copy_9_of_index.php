<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
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
                                    <th colspan="4" style="background-color:#AB615A;color:#fff;height:30px;font-size:18px;">(<font id="order_now_num">4</font>)个订单正在使用</th>
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
    <script src="<?php echo constant('ADMIN_SRC');?>media/js/ui-do.js"></script>
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
		var p_height=window.innerHeight;
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
		             type_list=data['type_list'];
		             order_no_list=data['order_no_list'];
		             table_show();
			  		 order_show();
			  		 show_order_tab();
				  	 close_wcldd();
					 window.open("<?php echo site_url('admin/admin_print/print_one?order_id=')?>"+order_id_value); 
		       }
		   });
	}
	</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>

<!-- END BODY -->

</html>