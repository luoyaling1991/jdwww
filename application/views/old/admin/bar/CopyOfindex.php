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
<style type="text/css">
#wcldd{
  position: absolute;
  right:30px;
  top:40px;

}
</style>
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
							<li><a href="index_main.html"><i class="icon-tasks"></i>进入系统管理</a></li>
							<li class="divider"></li>
							<li><a href="login_soft.html"><i class="icon-key"></i>注销账户</a></li>

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
			<ul class="page-sidebar-menu">
				<li class="start active ">
					<a href="#">1楼大厅</a>
				</li>
				<li class="">
					<a href="#">2楼大厅</a>
				</li>
			</ul>
		</div>
		<div class="page-content" style="background-color:#D2D2D2;">
					<div class="left_div" style="margin-left:30px;width:68%;">
                    	<table width="100%" id="left_div_tab">
                        	<tr>
                            	<td width="33%">
                                	<div class="responsive state_div_1" style="width:100%;">
										<div class="dashboard-stat work_no">
                                        	<table width="100%" >
                                            	<tr>
                                                	<td width="65%" class='table_num'>001</td>
                                                    <td rowspan="2" width="35%" class='table_person'>
                                                    	<img src="<?php echo constant('ADMIN_SRC');?>media/img/user.png" width="35px"/><br>
                                                    	0&nbsp;/&nbsp;7
                                                    </td>
                                                </tr>
                                                <tr>
                                                	<td class="table_state">停用状态</td>
                                                </tr>
                                                <tr>
                                                	<td colspan="2" class="table_do">
                                                    	<a class="btn_border" href="#">启用餐桌</a> 
                                                    </td>
                                                </tr>
                                            </table>        
										</div>
									</div>
                                </td>
                                <td width="33%">
                                	<div class="responsive state_div_1" style="width:100%;">
										<div class="dashboard-stat working">
                                            <table width="100%">
                                            	<tr>
                                                	<td width="65%" class='table_num'>002</td>
                                                    <td rowspan="2" width="35%" class='table_person'>
                                                    	<img src="<?php echo constant('ADMIN_SRC');?>media/img/user.png" width="35px"/><br>
                                                    	3&nbsp;/&nbsp;7
                                                    </td>
                                                </tr>
                                                <tr>
                                                	<td class="table_state">正在使用</td>
                                                </tr>
                                                <tr>
                                                	<td colspan="2" class="table_do">
                                                    	<a class="btn_border" data-toggle="modal" href="#long">查看详情</a> 
                                                    </td>
                                                </tr>
                                            </table>             
										</div>
									</div>
                                </td>
                                <td width="33%">
                                	<div class="responsive state_div_1" style="width:100%;">
										<div class="dashboard-stat work_for">
                                           <table width="100%">
                                            	<tr>
                                                	<td width="65%" class='table_num'>003</td>
                                                    <td rowspan="2" width="35%" class='table_person'>
                                                    	<img src="<?php echo constant('ADMIN_SRC');?>media/img/user.png" width="35px"/><br>
                                                    	0&nbsp;/&nbsp;7
                                                    </td>
                                                </tr>
                                                <tr>
                                                	<td class="table_state">空闲状态</td>
                                                </tr>
                                                <tr>
                                                	<td colspan="2" class="table_do">
                                                    	<a class="btn_border" href="#">停用餐桌</a> 
                                                    </td>
                                                </tr>
                                            </table>             
										</div>
									</div>
                                </td>
                            </tr>
                            
                        </table>
                    </div>
                    <div class="right_div" style="width:25%;height:500px;">
                    	<table width="100%">
                        	<thead>
                                <tr>
                                    <th colspan="4" style="background-color:#E25345;color:#fff;height:30px;font-size:18px;">(3)个未处理订单</th>
                                </tr>
                                <tr style="background-color:#968A8A;height:30px;font-size:16px;color:#fff;" id="tr_bt">
                                    <th width="15%">ID</th>
                                    <th width="35%">桌号</th>
                                    <th width="25%">时间</th>
                                    <th width="25%">总价</th>
                                </tr>
                            </thead>
                            <tbody id='tbody_1'>
                                <tr onClick="show_one()">
                                    <td width="15%">01</td>
                                    <td width="35%">1楼大厅001</td>
                                    <td width="25%">18:34:23</td>
                                    <td width="25%" style="color:#F00;">1580.00</td>
                                </tr>
                                <tr>
                                    <td width="15%">02</td>
                                    <td width="35%">1楼大厅002</td>
                                    <td width="25%">18:34:23</td>
                                    <td width="25%" style="color:#F00;">1580.00</td>
                                </tr>
                                <tr>
                                    <td width="15%">03</td>
                                    <td width="35%">1楼大厅003</td>
                                    <td width="25%">18:34:23</td>
                                    <td width="25%" style="color:#F00;">1580.00</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th colspan="4" style="background-color:#AB615A;color:#fff;height:30px;font-size:18px;">(4)个订单正在使用</th>
                                </tr>
                            </thead>
                            <tbody id='tbody_2'>
                                <tr>
                                    <td width="15%"><a  data-toggle="modal" href="#long">01</a></td>
                                    <td width="35%"><a  data-toggle="modal" href="#long">1楼大厅001</a></td>
                                    <td width="25%"><a  data-toggle="modal" href="#long">18:34:23</a></td>
                                    <td width="25%" style="color:#F00;"><a  data-toggle="modal" href="#long">1580.00</a></td>
                                </tr>
                                <tr>
                                    <td width="15%">02</td>
                                    <td width="35%">1楼大厅002</td>
                                    <td width="25%">18:34:23</td>
                                    <td width="25%" style="color:#F00;">1580.00</td>
                                </tr>
                                <tr>
                                    <td width="15%">03</td>
                                    <td width="35%">1楼大厅003</td>
                                    <td width="25%">18:34:23</td>
                                    <td width="25%" style="color:#F00;">1580.00</td>
                                </tr>
                            </tbody>
                            
                        </table>
                    </div>
		</div>
	</div>
    <div id="long" class="modal hide fade" tabindex="-1" data-replace="true" style="width:800px;">
			<div class="modal-header" style="color:#FFF;background-color:#292929;height:30px;">
			    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h3 style="float:left;width:530px;">1楼大厅龙泉厅包厢</h3>
                <h5 style="float:left;width:100px;">就餐人数6/10</h5>
                <button type="submit" style="margin-top:-20px;margin-right:20px;float:right;" class="btn_4" >换桌</button>
            </div>
			<div class="modal-body" style="background-color:#F5F5F5;height:300px;">
				<table class="table table-striped table-bordered table-hover tab_border_no" id="sample_3" 
                	style="margin-top:25px;margin-left:25px;width:750px;">
									<thead>
                                    	<tr>
                                        	<th colspan="6" style="background-color:#6EC169;">
                                            	<span style="float:left">订单号：1507280001</span>
                                                <span style="float:right">2015-07-28 18:54:23</span>
                                            </th>
                                        </tr>
										<tr style="background-color:#D2D2D2">
											<th style="width:100px;" >序号</th>
                                            <th style="width:220px;">菜品名称</th>
											<th style="width:120px;">单价</th>
											<th style="width:100px;" class="sorting">数量</th>
											<th style="width:130px;">总价</th>
											<th style="width:70px;" >操作</th>
										</tr>
									</thead>
									<tbody>
                                    	<tr class="odd gradeX bg_color">
											<td>001</td>
											<td>宫爆鸡丁仔仔</td>
                                            <td style="color:#F00;">28.00</td>
                                            <td>1份</td>
											<td style="color:#F00;">28.00</td>
											<td>
                                                <a href="#" class="btn_a_del">
                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/btn_del.png"/>
                                                </a>
                                            </td>
										</tr>
                                        <tr class="odd gradeX ">
											<td>002</td>
											<td>宫爆鸡丁仔仔</td>
                                             <td style="color:#F00;">28.00</td>
                                            <td>1份</td>
											<td style="color:#F00;">28.00</td>
											<td>
                                                <a href="#" class="btn_a_del">
                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/btn_del.png"/>
                                                </a>
                                            </td>
										</tr>
                                        <tr class="odd gradeX bg_color">
											<td>003</td>
											<td>宫爆鸡丁仔仔</td>
                                             <td style="color:#F00;">28.00</td>
                                            <td>1份</td>
											<td style="color:#F00;">28.00</td>
											<td>
                                                 <a href="#" class="btn_a_del">
                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/btn_del.png"/>
                                                </a>
                                            </td>
										</tr>
                                        <tr class="odd gradeX ">
											<td>003</td>
											<td>宫爆鸡丁仔仔</td>
                                             <td style="color:#F00;">28.00</td>
                                            <td>1份</td>
											<td style="color:#F00;">28.00</td>
											<td>
                                                 <a href="#" class="btn_a_del">
                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/btn_del.png"/>
                                                </a>
                                            </td>
										</tr>
                                        <tr class="odd gradeX bg_color ">
											<td>003</td>
											<td>宫爆鸡丁仔仔</td>
                                             <td style="color:#F00;">28.00</td>
                                            <td>1份</td>
											<td style="color:#F00;">28.00</td>
											<td>
                                                 <a href="#" class="btn_a_del">
                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/btn_del.png"/>
                                                </a>
                                            </td>
										</tr>
                                        <tr class="odd gradeX ">
											<td>003</td>
											<td>宫爆鸡丁仔仔</td>
                                             <td style="color:#F00;">28.00</td>
                                            <td>1份</td>
											<td style="color:#F00;">28.00</td>
											<td>
                                                 <a href="#" class="btn_a_del">
                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/btn_del.png"/>
                                                </a>
                                            </td>
										</tr>
                                      </tbody>
                                      <thead>
                                    	<tr>
                                        	<th colspan="6" style="background-color:#6EC169;">
                                            	<span style="float:left">追单1：1507280002</span>
                                                <span style="float:right">2015-07-28 18:54:23</span>
                                            </th>
                                        </tr>
										<tr style="background-color:#D2D2D2">
											<th style="width:100px;" >序号</th>
                                            <th style="width:220px;">菜品名称</th>
											<th style="width:120px;">单价</th>
											<th style="width:100px;" class="sorting">数量</th>
											<th style="width:130px;">总价</th>
											<th style="width:70px;" >操作</th>
										</tr>
									</thead>
									<tbody>
                                    	<tr class="odd gradeX bg_color">
											<td>003</td>
											<td>宫爆鸡丁仔仔</td>
                                            <td style="color:#F00;">28.00</td>
                                            <td>1份</td>
											<td style="color:#F00;">28.00</td>
											<td>
                                                 <a href="#" class="btn_a_del">
                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/btn_del.png"/>
                                                </a>
                                            </td>
										</tr>
                                        <tr class="odd gradeX ">
											<td>003</td>
											<td>宫爆鸡丁仔仔</td>
                                             <td style="color:#F00;">28.00</td>
                                            <td>1份</td>
											<td style="color:#F00;">28.00</td>
											<td>
                                                 <a href="#" class="btn_a_del">
                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/btn_del.png"/>
                                                </a>
                                            </td>
										</tr>
                                        <tr class="odd gradeX bg_color">
											<td>003</td>
											<td>宫爆鸡丁仔仔</td>
                                             <td style="color:#F00;">28.00</td>
                                            <td>1份</td>
											<td style="color:#F00;">28.00</td>
											<td>
                                                 <a href="#" class="btn_a_del">
                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/btn_del.png"/>
                                                </a>
                                            </td>
										</tr>
                                        <tr class="odd gradeX ">
											<td>003</td>
											<td>宫爆鸡丁仔仔</td>
                                             <td style="color:#F00;">28.00</td>
                                            <td>1份</td>
											<td style="color:#F00;">28.00</td>
											<td>
                                                 <a href="#" class="btn_a_del">
                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/btn_del.png"/>
                                                </a>
                                            </td>
										</tr>
                                        <tr class="odd gradeX bg_color ">
											<td>003</td>
											<td>宫爆鸡丁仔仔</td>
                                             <td style="color:#F00;">28.00</td>
                                            <td>1份</td>
											<td style="color:#F00;">28.00</td>
											<td>
                                                 <a href="#" class="btn_a_del">
                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/btn_del.png"/>
                                                </a>
                                            </td>
										</tr>
                                        <tr class="odd gradeX ">
											<td>003</td>
											<td>宫爆鸡丁仔仔</td>
                                             <td style="color:#F00;">28.00</td>
                                            <td>1份</td>
											<td style="color:#F00;">28.00</td>
											<td>
                                                 <a href="#" class="btn_a_del">
                                                	<img src="<?php echo constant('ADMIN_SRC');?>media/img/btn_del.png"/>
                                                </a>
                                            </td>
										</tr>
                                      </tbody>
                                      </table>

			</div>
			<div class="modal-footer" style="padding:0px;">
            	<table class="table table-striped table-bordered table-hover tab_border_no" id="sample_3" 
                	style="margin-bottom:0px;margin-left:25px;width:750px;">
									<thead>
                                    	<tr style="color:#FFF;background-color:#E02222;">
                                        	<th style="width:400px;text-align:right">合计：</th>
                                            <th style="width:90px;">12份</th>
                                            <th>345.00</th>
                                        </tr>
                                     </thead>
                </table>
                <table id="sample_3" 
                	style="margin-top:5px;text-align:left;margin-left:25px;width:750px;">
						<tr>
                           	<td style="width:45px">
                                 <b>折扣</b>
                            </td>
                            <td style="width:140px">
                                 <input type="text" style="color:#000;font-weight:bold;margin-top:10px;height:20px;width:100px;"/>
                            </td>
                            <td style="width:45px">
                                 <b>实收</b>
                            </td>
                            <td style="width:140px">
                                 <input type="text" style="color:#000;font-weight:bold;margin-top:10px;height:20px;width:100px;"/>
                            </td>
                            <td style="color:#67BB5C;">
                                 <b>差额&nbsp;&nbsp;&nbsp;-212元</b>
                            </td>
                        </tr>
                        <tr>
                           	<td >
                                 <b>原因</b>
                            </td>
                            <td colspan="4">
                              <label class="checkbox" style="margin-top:5px;margin-left:20px;float:left;width:88px;">
									<input type="checkbox" value="" />抹零
							  </label>
                              <label class="checkbox" style="margin-top:5px;float:left;width:110px;">
									<input type="checkbox" value="" />活动减免
							  </label>
                              <label class="checkbox" style="margin-top:5px;float:left;width:110px;">
									<input type="checkbox" value="" />会员折扣
							  </label>
                              <label class="checkbox" style="margin-top:5px;float:left;width:88px;">
									<input type="checkbox" value="" />免单
							  </label>
                              <label class="checkbox" style="margin-top:5px;float:left;width:88px;">
									<input type="checkbox" value="" />签单
							  </label>
                              <label class="checkbox" style="margin-top:5px;float:left;width:88px;">
									<input type="checkbox" value="" />其它
							  </label>
                            </td>
                        </tr>
                        <tr>
                        	<td >
                                 <b>备注</b>
                            </td>
                            <td colspan="4">
                             	<input type="text" style="color:#000;font-weight:bold;margin-top:10px;height:20px;width:530px;"/>
                            </td>
                        </tr>
                        <tr>
                           	<td >&nbsp;
                                
                            </td>
                            <td colspan="4">
                              <label class="checkbox" style="margin-top:5px;margin-left:20px;float:left;width:88px;">
									<input type="checkbox" value="" />小票
							  </label>
                              <label class="checkbox" style="margin-top:5px;float:left;width:88px;">
									<input type="checkbox" value="" />预览
							  </label>
                            </td>
                        </tr>
                        <tr >
                           	<td >&nbsp;
                                
                            </td>
                            <td colspan="4">
                               <button type="submit" style="margin-top:5px;" class="btn_1" >结账</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="submit" style="margin-top:5px;" class="btn_2" >重置所有</button>
                            </td>
                        </tr>
                </table>
                <br>&nbsp; 
			</div>
	</div>
    <div id="wcldd" class="hide"  style="background-color:#FFF;width:490px;">
			<div class="modal-header" style="color:#FFF;background-color:#292929;height:30px;">
			    <button type="button" onClick="close_wcldd()" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h3 style="float:left;width:330px;">1楼大厅龙泉厅包厢</h3>
                <h5 style="float:left;width:100px;">就餐人数6/10</h5>
            </div>
			<div class="modal-body" style="background-color:#F5F5F5;height:440px;">
				<table class="table table-striped table-bordered table-hover tab_border_no" id="sample_3" 
                	style="margin-top:5px;margin-left:5px;width:480px;">
									<thead>
                                    	<tr>
                                        	<th colspan="5" style="background-color:#6EC169;">
                                            	<span style="float:left">订单号：1507280001</span>
                                                <span style="float:right">2015-07-28 18:54:23&nbsp;&nbsp;</span>
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
									<tbody>
                                    	<tr class="odd gradeX bg_color">
											<td>001</td>
											<td>宫爆鸡丁仔仔</td>
                                            <td style="color:#F00;">28.00</td>
                                            <td>1份</td>
											<td style="color:#F00;">28.00</td>
										</tr>
                                      </tbody>
                                      </table>

			</div>
			<div class="modal-footer" style="padding:0px;">
            	<table class="table table-striped table-bordered table-hover tab_border_no"  
                	style="margin-bottom:0px;margin-left:5px;width:480px;">
									<thead>
                                    	<tr style="color:#FFF;background-color:#E02222;">
                                        	<th style="width:400px;text-align:right">合计：</th>
                                            <th style="width:90px;">12份</th>
                                            <th>345.00元</th>
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
		jQuery(document).ready(function() {    
		   App_1.init(); // initlayout and core plugins
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
		function show_one(){
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