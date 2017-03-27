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
								<a href="<?php echo site_url("sys/admin_shop")?>">日常管理</a>
								<span class="icon-angle-right"></span>
							</li>
							<li><a href="<?php echo site_url("sys/admin_shop")?>">商家管理</a></li>
						</ul>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="portlet box myself">
							<div class="portlet-title">
								<div class="caption">&nbsp;&nbsp;&nbsp;商家管理</div>

							</div>
							<div class="portlet-body" style="padding:8px 25px 25px 25px;">
							<form  style="margin-bottom:0px;" action="<?php echo site_url("sys/admin_shop/index")?>" id="batch_form" method="post">
								<table class="table table-striped table-bordered table-hover tab_border_no"  id="sample_3">
									<thead>
                                    	<tr>
											<td colspan="9" style="padding-left:0px;">
											<input class="m-wrap placeholder-no-fix span2" 
                                                type="text" placeholder="商家名称" name="shop_name" style="width:200px;line-height:30px;height:30px;">
											&nbsp;&nbsp;&nbsp;
											<input class="m-wrap placeholder-no-fix span2" 
                                                type="text" placeholder="注册码" name="reg_num" style="width:200px;line-height:30px;height:30px;">
                                            &nbsp;&nbsp;&nbsp;
                                           		 <input type="submit"  class="btn_ss" style="width:68px;height:34px;margin-top:-1px;" value="搜索"/>

											</td>
										</tr>
										<tr style="background-color:#D2D2D2;">
											<th style="width:8px;">
												ID
                                            </th>
											<th width="20%">商家名称</th>
											<th width="20%">注册号</th>
											<th width="15%">有效期</th>
											<th width="15%">单量</th>
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
												$shop_id=$row['shop_id'];
												$shop_name=$row['shop_name'];
												$reg_num=$row['reg_num'];
												$order_count=$row['order_count'];
												$shop_date=$row['shop_date'];
												$shop_state=$row['shop_state'];
												$login_time=$row['login_time'];
												$show="<font color='red'>暂停</font>";
												if($shop_state==1){
													$show="<font color='#5BB04B'>启用</font>";
												}
												$href=site_url("sys/admin_shop/shop_look?shop_id=").$shop_id;
												$href_1=site_url("sys/admin_shop/shop_del?shop_id=").$shop_id;
												echo "<tr class='odd gradeX'>
														<td>{$show_num}</td>
														<td>{$shop_name}</td>
														<td>{$reg_num}</td>
			                                            <td>{$shop_date}</td>
			                                            <td>{$order_count}</td>
			                                           <!-- <td>{$login_time}</td>-->
			                                            <td>{$show}</td>
														<td style='padding-bottom:4px;padding-top:6px;'>
			                                            	<a href='{$href}' class='label label-success'>查看详情</a>
			                                            	<a href='{$href_1}' onclick='return check_del();' class='label label-success'>删除商家</a>
			                                            </td>
													</tr>";
											}
											if($show_num==0){
												echo "<tr><td></td><td colspan='7' style='color:red;'>没有找到您想要的数据!</td></tr>";
											}
										?>
									</tbody>
							
								</table>
						    </form>
							<div class="row-fluid" >
                                	<div class="span4">
                                    	<input type="hidden" name="sousuo" id="sousuo" value="<?php echo "&where_arr=$where_arr"?>">
                                    </div>
                                    <div class="span8">
                                    	<div class="dataTables_paginate paging_bootstrap pagination" style="padding-top:8px;">
                                        	
                                        	共有<?php echo $dish_rows;?>个/<?php echo $totalPage?>页
                                        	<ul>
                                            	<li class="prev">
                                                	<a href="javascript:flip_do('-1');"><span class="hidden-480">上一页</span></a>
                                                </li>
                                                <?php 
                                                	for($i=1;$i<=$totalPage;$i++){
														$href="javascript:flip_do(&quot;$i&quot;);";
														if($i==$page+1){
															echo "<li class='active'><a href='$href'>$i</a></li>";
														}else{
															echo "<li><a href='$href'>$i</a></li>";
														}
                                                		
                                                	}
                                                ?>
                                                <li class="next">
                                                	<a href="javascript:flip_do('0');"><span class="hidden-480">下一页</span></a>
                                                </li>
                                             </ul>
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
		function flip_do(page_no){
			var totalPage=parseInt(<?php echo $totalPage;?>);
			var page=parseInt(<?php echo $page;?>)+1;
			page_no=parseInt(page_no);
			if(page_no==-1){
				//上一页
				if(page>1){
					page_no=page-1;
				}else{
					page_no=1;
				}
			}else if(page_no==0){
				//下一页
				if(page<totalPage){
					page_no=page+1;
				}else{
					page_no=totalPage;
				}
			}
			window.location.href="<?php echo site_url('sys/admin_shop/list_do?page=');?>"+page_no+$("#sousuo").val();
		}
		function check_del(){
			if(confirm("确定要删除商家吗？")){

			}else{
				return false;
			}
		}
	</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>

<!-- END BODY -->

</html>