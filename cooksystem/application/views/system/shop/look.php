<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title><?php echo constant('SYS_NAME');?>|商家管理</title>
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
	<link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/select2_metro.css" />
	<link rel="stylesheet" href="<?php echo constant('ADMIN_SRC');?>media/css/DT_bootstrap.css" />
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
								<a href="<?php echo site_url("sys/admin_index/main_right")?>">系统介绍</a> 
								<span class="icon-angle-right"></span>
							</li>
							<li>
								<a href="<?php echo site_url("sys/admin_shop")?>">日常管理</a>
								<span class="icon-angle-right"></span>
							</li>
							<li><a href="<?php echo site_url("sys/admin_shop")?>">商家管理</a>
								<span class="icon-angle-right"></span>
							</li>
							<li><a href="<?php echo site_url("sys/admin_shop/shop_look?shop_id=").$shop['shop_id'];?>">商家详情</a></li>
						</ul>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">&nbsp;&nbsp;&nbsp;商家详情</div>
							</div>
							<div class="portlet-body form">
								
									<div class="control-group">
										<table class="table table-striped table-bordered table-hover" id="sample_3"
	                            		style="margin-top:-15px;">
											<thead>
												<tr>
													<th colspan="4">商家基本信息
														<a href="javascript:history.go(-1);" class="btn" style="float:right;">返 回 上 一 页</a> 
													</th>
												</tr>
										    </thead>
										    <tbody>
										    	<tr>
										    		<th>工商注册号：</th>
										    		<td ><?php echo $shop['reg_num'];?></td>
										    		<th>状态：</th>
										    		<td><?php 
										    			$shop_state=$shop['shop_state'];
										    			$show="<font color='red'><b>【</b>暂停<b>】</b></font>";
										    			$upd="启用操作";
										    			if($shop_state==1){
										    				$show="<font color='#5BB04B'><b>【</b>启用<b>】</b></font>";
										    				$upd="暂停操作";
														}
										    			echo $show;
										    			echo "&nbsp;&nbsp;&nbsp;";
										    			$href=site_url("sys/admin_shop/upd_shop?shop_id=").$shop['shop_id']."&shop_state=".$shop_state;
										    			echo "<a class='label label-info' href='{$href}'>{$upd}</a>";
										    			?>
										    			
										    		</td>
										    	</tr>
										    	<tr>
										    		<th width="15%">商家名称：</th>
										    		<td width="35%">
										    			<?php echo $shop['shop_name'];?>
										    			
										    		</td>
													<th width="15%">联系人：</th>
													<td width="35%"><?php echo $shop['shop_person'];?></td>
										    	</tr>
										    	<tr>
													<th>联系电话：</th>
													<td><?php echo $shop['shop_phone'];?></td>
													<th>联系地址：</th>
													<td><?php echo $shop['shop_address'];?></td>
												</tr>
												<tr>
													<th>绑定手机：</th>
													<td><?php echo $shop['shop_mobile'];?></td>
													<th>绑定邮箱：</th>
													<td><?php echo $shop['shop_email'];?></td>
												</tr>
												<tr>
													<th>订单总量：</th>
													<td><?php echo $shop['order_count'];?></td>
													<th>营业总额：</th>
													<td><?php echo $shop['money_count'];?>元</td>
												</tr>
												<tr>
													<th>最近登录：</th>
													<td><?php echo $shop['login_time'];?></td>
													<th>注册时间：</th>
													<td><?php echo $shop['insert_time'];?></td>
												</tr>
												<tr>
													<th>到期时间：</th>
													<td>
														<form class="form-horizontal" action="<?php echo site_url('sys/admin_shop/shop_upd_date');?>" method="post">
															<input type="date"   name="shop_date" value="<?php echo $shop['shop_date'];?>"/>
															<input type="hidden" name="shop_id" value="<?php echo $shop['shop_id'];?>"/>
															<input type="submit" class="btn blue" value="修改" />
														</form>
													</td>
												</tr>
										    </tbody>
										    <thead>
													<tr>
														<th colspan="4">商家菜品信息
														<a href="javascript:history.go(-1);" class="btn" style="float:right;">返 回 上 一 页</a> 
														</th>
													</tr>
													<tr>
														<th>菜品合计：</th>
														<td><?php echo count($dish_list);?></td>
														<th>开启：</th>
														<td><?php 
																$num=0;
																foreach ($dish_list as $row){
																	if($row['dish_state']==1){
																		$num++;
																	}
																}
																echo $num;
															?></td>
													</tr>
													<tr>
														<th>套餐合计：</th>
														<td><?php echo count($set_list);?></td>
														<th>开启：</th>
														<td><?php 
																$num=0;
																foreach ($set_list as $row){
																	if($row['set_state']==1){
																		$num++;
																	}
																}
																echo $num;
															?></td>
													</tr>
													<tr>
														<th>餐桌分类合计：</th>
														<td><?php echo count($type_list);?></td>
														<th>开启：</th>
														<td><?php 
																$num=0;
																foreach ($type_list as $row){
																	if($row['type_state']==1){
																		$num++;
																	}
																}
																echo $num;
															?></td>
													</tr>
													<tr>
														<th>餐桌合计：</th>
														<td><?php echo count($table_list);?></td>
														<th>开启：</th>
														<td><?php 
																$num=0;
																foreach ($table_list as $row){
																	if($row['tab_state']==1){
																		$num++;
																	}
																}
																echo $num;
															?></td>
													</tr>
											 </thead>
										     <thead>
													<tr>
														<th colspan="4">商家消费记录
														<a href="javascript:history.go(-1);" class="btn" style="float:right;">返 回 上 一 页</a> 
														</th>
													</tr>
											    </thead>
											 <tbody>
										    	<tr>
													<th>金额(时长)</th>
													<th>状态</th>
													<th>操作时间</th>
													<th>支付宝交易号</th>
												</tr>
												<?php 
													foreach ($vip_list as $row){
														$money=$row['money'];
														$state=$row['state'];
														$i_time=$row['i_time'];
														$month=$row['month'];
														$log_txt=$row['log_txt'];
														$show="<font color='red'>未生效</font>";
														if($state==3){
															$show="<font color='#5BB04B'>已生效</font>";
														}
														echo "
															<tr>
																<td>{$money}元({$month}个月)</td>
																<td>{$show}</td>
																<td>{$i_time}</td>
																<td>{$log_txt}</td>
															</tr>
															";
													}
												?>
										    </tbody>
										 </table>
										
										
									</div>
									</div>
                                    <div class="form-actions">
										
											&nbsp;&nbsp;&nbsp;
										<a href="javascript:history.go(-1);" class="btn">返 回 上 一 页</a>                            
									</div>
                                </div>
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
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/DT_bootstrap.js"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/app.js"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/table-managed.js"></script>     
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/form-components.js"></script>     
	<script>

		jQuery(document).ready(function() {      
		   App.init();
		   TableManaged.init();
		   FormComponents.init();
		});
		
	</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
</body>
</html>