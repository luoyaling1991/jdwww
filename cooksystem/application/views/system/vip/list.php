<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
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
    
    <link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/bootstrap-fileupload.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/jquery.gritter.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/chosen.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/select2_metro.css" />
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
								<a href="<?php echo site_url("sys/admin_vip")?>">日常管理</a>
								<span class="icon-angle-right"></span>
							</li>
							<li><a href="<?php echo site_url("sys/admin_vip")?>">充值商品</a></li>
						</ul>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="portlet box myself">
							<div class="portlet-title">
								<div class="caption">&nbsp;&nbsp;&nbsp;充值商品</div>
								<div class="actions">
									<a href="<?php echo site_url("sys/admin_vip/add_show")?>" class="btn  purple"><i class="icon-plus"></i>&nbsp;&nbsp;&nbsp;新增充值</a>
								</div>
							</div>
							<div class="portlet-body" style="padding:8px 25px 25px 25px;">
							<form  style="margin-bottom:0px;" action="<?php echo site_url("sys/admin_vip/index")?>" id="batch_form" method="post">
								<table class="table table-striped table-bordered table-hover tab_border_no"  id="sample_3">
									<thead>
										<tr style="background-color:#D2D2D2;">
											<th style="width:8px;">
												ID
                                            </th>
											<th width="35%">商品标题</th>
											<th width="15%">价格</th>
											<th width="10%">时长(月数)</th>
                                            <th width="10%">销量</th>
                                            <th width="10%">状态</th>
                                            <th width="15%">操作</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										    $count=count($list)-1;
										    $show_num=0;
										    for($num=0;$num<=$count;$num++){
												$show_num++;	
										    	$row=$list[$num];
												$v_id=$row['v_id'];
												$v_name=$row['v_name'];
												$v_desc=$row['v_desc'];
												$v_month=$row['v_month'];
												$v_add_month=$row['v_add_month'];
												$v_money=$row['v_money'];
												$v_old_money=$row['v_old_money'];
												$v_state=$row['v_state'];
												$v_count=$row['v_count'];
												$show="<font color='red'>暂停</font>";
												if($v_state==1){
													$show="<font color='#5BB04B'>启用</font>";
												}
												$href_1=site_url("sys/admin_vip/upd_show?v_id=").$v_id;
												$href="javascript:show(&quot;$show_num&quot;)";
												echo "<tr class='odd gradeX'>
														<td>{$show_num}</td>
														<td>{$v_name}</td>
														<td>{$v_money}/<s>{$v_old_money}</s></td>
			                                            <td>{$v_month}+{$v_add_month}</td>
			                                            <td>{$v_count}</td>
			                                            <td>{$show}</td>
														<td style='padding-bottom:4px;padding-top:6px;'>
															<input type='hidden' id='show_value_{$show_num}' value='0'/>
			                                            	<a href='{$href}' id='href_show_{$show_num}' class='label label-success'>查看详情</a>
			                                            	<a href='{$href_1}'  class='label label-warning'>编辑信息</a>
			                                            </td>
													</tr>
												  	<tr class='odd gradeX' style='display:none;'>
			                                        	<td colspan='7'>&nbsp;</td>
			                                        </tr>
			                                        <tr class='odd gradeX' style='display:none;' id='show_{$show_num}'>
			                                        	<td>&nbsp;</td>
			                                        	<td colspan='6'>详情描述：{$v_desc}</td>
													</tr>";
											}
											if($show_num==0){
												echo "<tr><td></td><td colspan='7' style='color:red;'>没有找到您想要的数据!</td></tr>";
											}
										?>
									</tbody>
							
								</table>
						    </form>
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
    <script src="<?php echo constant('ADMIN_SRC');?>media/js/form-components.js"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/table-managed.js"></script>    
    <script src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap-modalmanager.js" type="text/javascript" ></script> 
    
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap-fileupload.js"></script>
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/chosen.jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/select2.min.js"></script>
    <script src="media/js/form-components.js"></script>     
	<script>
		jQuery(document).ready(function() {       
		   App.init();
		   TableManaged.init();
		   FormComponents.init();
		});
		function show(num){
			var show_val=$("#show_value_"+num).val();
			if(show_val==0){
				$("#show_value_"+num).val('1');
				//展开
				$("#show_"+num).show();
				$("#href_show_"+num).html('收拢详情');
			}else{
				$("#show_value_"+num).val('0');
				//收拢
				$("#show_"+num).hide();
				$("#href_show_"+num).html('查看详情');
			}
		}
	</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>

<!-- END BODY -->

</html>