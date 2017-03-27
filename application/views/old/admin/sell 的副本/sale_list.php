<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>"伙夫"点餐|销售查询</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
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
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>/My97DatePicker/WdatePicker.js"></script>
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
								<a href="<?php echo site_url("admin/admin_index/main_right")?>">系统管理</a> 
								<span class="icon-angle-right"></span>
							</li>
							<li>
								<a href="<?php echo site_url("admin/admin_sell/index_3")?>">营业数据</a>
								<span class="icon-angle-right"></span>
							</li>
							<li><a href="<?php echo site_url("admin/admin_sell/index_3")?>">销售查询</a></li>
						</ul>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="portlet box myself">
							<div class="portlet-title">
								<div class="caption">&nbsp;&nbsp;&nbsp;销售查询</div>

							</div>
							<div class="portlet-body" style="padding:8px 25px 8px 25px;">
							 <form action="<?php echo site_url("admin/admin_sell/batch_3");?>" id="batch_form" method="post" style="margin-bottom:0px;">
								<table class="table table-striped table-bordered table-hover tab_border_no"  id="sample_3">
									<thead>
                                    	<tr>
											<td colspan="8" style="padding-left:0px;">
                                           
                                             	<input class="m-wrap placeholder-no-fix span2" style="width:200px;" type="text" placeholder="选择时间" 
                                             		name="date_1" id="date_1" value="<?php echo $date_1;?>" onClick="WdatePicker()"  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"/>
                                                	<span style="vertical-align:top">--</span>
                                             <input class="m-wrap placeholder-no-fix span2" type="text" placeholder="选择时间" 
                                                	name="date_2" id="date_2" value="<?php echo $date_2;?>" style="width:200px;" onClick="WdatePicker()"  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"/>
                                                 <input type="button" onclick="sousuo_sub()" class="btn_ss" style="width:68px;height:34px;margin-top:0px;" value="查询"/>
                                             <div class="pull-right" >
                                                
                                                <div class="btn-group pull-right" data-toggle="buttons-radio">
                                                    <a href="javascript:check_date('1');" class="btn mini" >&nbsp;日&nbsp;</a>
                                                    <a href="javascript:check_date('2');" class="btn mini" >&nbsp;周&nbsp;</a>
                                                    <a href="javascript:check_date('3');" class="btn mini" >&nbsp;月&nbsp;</a>
												</div>
                                             </div>
											
											</td>
										</tr>
										<tr style="background-color:#D2D2D2;">
											<th style="width:8px;">
                                            </th>
											<th width="15%">订单号</th>
                                            <th width="17%">
                                            	 <div style="float:left;">开桌时间</div>
                                            	<div style="margin-left:15px;float:left;">
                                                	<img onclick="sort_do('insert_time','asc')" src="<?php if($asc_name=="insert_time" && $asc_type=="asc"){echo constant('ADMIN_SRC')."media/img/s_1.png";}else{echo constant('ADMIN_SRC')."media/img/s.png";}?>" style="display:block"/>
                                                    <img onclick="sort_do('insert_time','desc')" src="<?php if($asc_name=="insert_time" && $asc_type=="desc"){echo constant('ADMIN_SRC')."media/img/xx_1.png";}else{echo constant('ADMIN_SRC')."media/img/xx.png";}?>" style="display:block"/>
                                                </div>
                                            </th>
											<th width="10%">
                                                <div style="float:left;">应收</div>
                                            	<div style="margin-left:15px;float:left;">
                                                	<img onclick="sort_do('order_2','asc')" src="<?php if($asc_name=="order_2" && $asc_type=="asc"){echo constant('ADMIN_SRC')."media/img/s_1.png";}else{echo constant('ADMIN_SRC')."media/img/s.png";}?>" style="display:block"/>
                                                    <img onclick="sort_do('order_2','desc')" src="<?php if($asc_name=="order_2" && $asc_type=="desc"){echo constant('ADMIN_SRC')."media/img/xx_1.png";}else{echo constant('ADMIN_SRC')."media/img/xx.png";}?>" style="display:block"/>
                                                </div>
                                            </th>
											<th width="10%">
                                            	 <div style="float:left;">实收</div>
                                            	<div style="margin-left:15px;float:left;">
                                                	<img onclick="sort_do('order_price','asc')" src="<?php if($asc_name=="order_price" && $asc_type=="asc"){echo constant('ADMIN_SRC')."media/img/s_1.png";}else{echo constant('ADMIN_SRC')."media/img/s.png";}?>" style="display:block"/>
                                                    <img onclick="sort_do('order_price','desc')" src="<?php if($asc_name=="order_price" && $asc_type=="desc"){echo constant('ADMIN_SRC')."media/img/xx_1.png";}else{echo constant('ADMIN_SRC')."media/img/xx.png";}?>" style="display:block"/>
                                                </div>
                                            </th>
                                            <th width="10%">
                                            	<div style="float:left;">差价</div>
                                            	<div style="margin-left:15px;float:left;">
                                                	<img onclick="sort_do('order_1','asc')" src="<?php if($asc_name=="order_1" && $asc_type=="asc"){echo constant('ADMIN_SRC')."media/img/s_1.png";}else{echo constant('ADMIN_SRC')."media/img/s.png";}?>" style="display:block"/>
                                                    <img onclick="sort_do('order_1','desc')" src="<?php if($asc_name=="order_1" && $asc_type=="desc"){echo constant('ADMIN_SRC')."media/img/xx_1.png";}else{echo constant('ADMIN_SRC')."media/img/xx.png";}?>" style="display:block"/>
                                                </div>
                                            </th>
                                            <th width="23%">原因</th>
                                            <th width="12%">操作</th>
										</tr>
                                       <tr style="background-color:#EAEAEA;border-bottom:1px #D8D8D8 solid;">
                                        	<td >
                                            	<input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes" />
                                            </td>
                                            <td colspan="7">
                                            	<a href="javascript:batch_do('-1')" class="stach_btn_a">批量删除</a>
                                                <a href="javascript:batch_do('3')" class="stach_btn_a">批量打印</a>
                                                <input type="hidden"  name="batch_value" id="batch_value" value="">
                                            </td>
                                        </tr>
									</thead>
								</table>
								<div class="modal-body" id="txt_div" style="margin-top:-6px;background-color:#F5F5F5;height:140px;border-bottom:1px solid #D2D2D2;"  >
								<table class="table table-striped table-bordered table-hover tab_border_no"  id="sample_3">
									<tbody>
										<?php 
											$num=0;
											$money_sum_1=0;
											$money_sum_2=0;
											$money_sum_3=0;
											$count_sum=0;
											foreach ($list as $row){
												$num++;
												$order_id=$row['order_id'];
												$order_1=$row['order_1'];
												$order_no=$row['order_no'];
												$order_2=$row['order_2'];
												$order_price=$row['order_price'];
												$money_sum_1+=$order_1;
												$money_sum_2+=$order_2;
												$money_sum_3+=$order_price;
												$order_by=$row['order_by'];
												$order_desc=$row['order_desc'];
												if($order_desc!=""){
													$order_desc="<font color='green'>备注:</font>".$order_desc;
												}
												$insert_time=$row['insert_time'];
												$log_list=$row['log_list'];
												$name_list="";
												$price_list="";
												$num_list="";
												$money_list="";
												foreach ($log_list as $one){
													$name_list.="<br>".$one['log_name'];
													$price_list.="<br>".$one['log_price'];
													$num_list.="<br>".$one['log_count'];
													$money_list.="<br>".$one['log_money'];
													if($one['log_type']<2){
														$count_sum+=$one['log_count'];	
													}
												}
												
												$href_1="#";
												$href_2=site_url("admin/admin_sell/del_order?order_id=").$order_id;
												$img_1=constant('ADMIN_SRC')."media/img/btn_dy.png";
												$img_2=constant('ADMIN_SRC')."media/img/btn_del.png";
												echo "
														<tr class='odd gradeX'>
															<td style='width:8px;'>
				                                            	<input type='checkbox' class='checkboxes' value='$order_id' name='order_id[]'/>
				                                            	<input type='hidden' id='show_value_$num' value='0'/>
				                                            </td>
															<td width='15%' onClick='click_show(&quot;$num&quot;);'>{$order_no}</td>
				                                            <td width='17%' onClick='click_show(&quot;$num&quot;);'style='color:#454545'>$insert_time</td>
				                                            <td width='10%' onClick='click_show(&quot;$num&quot;);'>
				                                            	<font style='font-weight:bold;color:#F00;' >{$order_2}元</font>
				                                            </td>
				                                            <td width='10%' width='10%' onClick='click_show(&quot;$num&quot;);'>
				                                            	<font style='color:#454545;'>{$order_price}元</font>
				                                            </td>
				                                             <td width='10%' onClick='click_show(&quot;$num&quot;);'>
				                                            	<font style='font-weight:bold;color:#F00;' >{$order_1}元</font>
				                                            </td>
															<td width='23%' onClick='click_show(&quot;$num&quot;);'style='color:#454545'>
															{$order_by}
				                                            </td>
															<td width='12%' style='padding-bottom:4px;padding-top:6px;'>
				                                            	<a href='{$href_1}' class='btn_a_del'>
				                                                	<img src='{$img_1}'/>
				                                                </a>
				                                            	<a href='{$href_2}' class='btn_a_del'>
				                                                	<img src='{$img_2}'/>
				                                                </a>
				                                            </td>
														</tr>
				                                        <tr style='display:none;'>
				                                        	<td colspan='8'>&nbsp;</td>
				                                        </tr>
				                                        <tr style='display:none;' id='show_{$num}'>
				                                        	<td colspan='8'>
					                                        	<div style='width:40px;float:left;'>
							                                         &nbsp;
							                                    </div>
				                                                <div style='width:10%;float:left;'>
							                                          <b>单品名称</b>{$name_list}
							                                    </div>
				                                                <div style='width:10%;float:left;'>
							                                          <b>单价</b>{$price_list}
							                                    </div>
				                                                <div style='width:10%;float:left;'>
							                                          <b>数量</b>{$num_list}
							                                    </div>
				                                                
				                                                <div style='width:10%;float:left;'>
							                                          <b>合计</b>{$money_list}
							                                    </div>
							                                    <div style='width:50%;float:left;'>
							                                          {$order_desc}
							                                    </div>
															</td>
                                        				</tr>";
											}
											if($num==0){
												echo "<tr><td colspan='8' style='font-weight:bold;color:#F00;'>没有找到您想要的数据.</td></tr>";
											}
										?>
									</tbody>
								</table>
								
							</div>
							</form>
							<div class="row-fluid" >
                                	<div class="span8">
                                    	<div class="dataTables_info" id="sample_2_info">
                                        	合计实收：<font style='font-weight:bold;color:#F00;' ><?php echo $money_sum_3;?></font>元，
                                        	应收：<font style='font-weight:bold;color:#F00;' ><?php echo $money_sum_2;?></font>元，差额：
                                        	<font style='font-weight:bold;color:#F00;' ><?php echo $money_sum_1;?></font>元，
                                        	共<font style='font-weight:bold;color:#F00;' ><?php echo $count_sum;?></font>份。
                                        </div>
                                    </div>
                                    <div class="span4">
                                    		<div class="dataTables_paginate paging_bootstrap pagination" style="padding-top:10px;padding-right:20px;">
                                        	<a href="<?php echo site_url("admin/admin_sell/del_all")?>" onclick="return del_all();" class="btn_1_a" style="float:left;">删除所有</a>
                                            <a href="<?php echo site_url("admin/admin_sell/out_3")?>" class="btn_1_a" style="margin-left:20px;float:left;">导出数据</a><br>&nbsp;
                                        </div>
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
    <script src="<?php echo constant('ADMIN_SRC');?>media/js/form-components.js"></script>     
	<script>
	function del_all(){
		if(confirm("您确定要清空所有订单记录吗？")){
			return true;
		}else{
			return false;
		}
	}
	function sousuo_sub(){
		$("#batch_form").attr("action","<?php echo site_url("admin/admin_sell/index_3")?>");  
		$("#batch_form").submit();
	}
		function check_date(one){
			if(one==1){
				$("#date_1").val("<?php echo date("Y-m-d",time())." 00:00:00";?>");
				$("#date_2").val("<?php echo date("Y-m-d H:i:s",time());?>");
			}else if(one==2){
				$("#date_1").val("<?php echo date("Y-m-d",strtotime("-6 day"))." 00:00:00";?>");
				$("#date_2").val("<?php echo date("Y-m-d H:i:s",time());?>");
			}else if(one==3){
				$("#date_1").val("<?php echo date("Y-m-d",strtotime("last month"))." 00:00:00";?>");
				$("#date_2").val("<?php echo date("Y-m-d H:i:s",time());?>");
			}
		}
		function sort_do(asc_name,asc_type){
			window.location.href="<?php echo site_url('admin/admin_sell/index_3_get?asc_name=');?>"+asc_name+"&asc_type="+asc_type+"&date_1=<?php echo $date_1?>&date_2=<?php echo $date_2?>";
		}
		jQuery(document).ready(function() {       
		   App.init();
		   set_height();
		   TableManaged.init();
		   FormComponents.init();
		});
		function set_height(){
			var p_height=window.innerHeight;
			var modal_height=p_height-320;
		    $("#txt_div").css("height",modal_height); //设置右边的宽度
		}
		function click_show(num){
			if($("#show_value_"+num).val()=='0'){
				$("#show_value_"+num).val('1');
				$("#show_"+num).show();
			}else{
				$("#show_value_"+num).val('0');
				$("#show_"+num).hide();
			}
			
			
		}
	</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>

<!-- END BODY -->

</html>