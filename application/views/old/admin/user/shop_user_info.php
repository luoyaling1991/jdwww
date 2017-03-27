<!doctype html>
<html>
<head>
    <meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <TITLE><?php echo constant('SYS_NAME');?>|系统管理</TITLE> 
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
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/jquery.fileupload-ui.css" rel="stylesheet" />
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
								<a href="index.html">系统管理</a> 
								<span class="icon-angle-right"></span>
							</li>
							<li>
								<a href="#">账户设置</a>
								<span class="icon-angle-right"></span>
							</li>
							<li><a href="#">基本信息</a></li>
						</ul>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="portlet box myself">
							<div class="portlet-title">
								<div class="caption">&nbsp;&nbsp;&nbsp;基本信息</div>
							</div>
							<div class="portlet-body form">
                            	<table style="width:960px;margin-left:20px;margin-top:-10px;" class="form_show_tab">
                                    <tr>
                                    	<th width="100px">
                                        	<label class="control-label" for="firstName">企业注册号:</label>
                                        </th>
                                        <td width="500px">
                                        	<span class="text" style="padding-bottom:3px;display:block;"><?php echo $user['reg_num']?></span>
                                        </td>
                                        <form action="" enctype='multipart/form-data'>
                                        <td width="360px" rowspan="8" style="vertical-align:text-top;text-align:left;">
                                        	<img src="<?php echo base_url().$user['shop_logo']?>" id="shop_log" style="width: 200px;height: 121px"/>
                                            <div class="controls" style="width:200px;">
											<span class="btn green fileinput-button" style="width:173px;">
                                                <i class="icon-retweet icon-white"></i>
                                                <span>修改logo</span>
                                                <input type="file" name="file" id='file' onchange="updat_img()">
											</span>
										</div>
                                        </td>
                                        </form>
                                    </tr>
                                    <tr>
                                    	<th >
                                        	<label class="control-label" for="firstName">餐厅名称:</label>
                                        </th>
                                        <td >
                                        	<span class="text style="padding-bottom:3px;display:block;""><?php echo $user['shop_name']?></span><font color="green">【已认证】</font>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<th >
                                        	<label class="control-label" for="firstName">有效时长:</label>
                                        </th>
                                        <td >
                                        	<span class="text style="padding-bottom:3px;display:block;""><?php echo $user['shop_date']?></span>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('admin/admin_mall')?>" target="_blank" style="color:green;">立即充值</a>
                                        </td>
                                    </tr>
                                     <tr>
                                    	<th >
                                        	<label class="control-label" for="firstName">绑定手机:</label>
                                        </th>
                                        <td >
                                        	<span class="text" style="padding-bottom:3px;display:block;">
                                        	<?php
											if($user['shop_mobile']!=null){
												echo "".substr($user['shop_mobile'],0,3).'****'.substr($user['shop_mobile'],7,4);
												$href2=site_url('admin/admin_user/shop_phone_1?type=1');$a="更换";
            								 }else{
												echo "未绑定手机号";$href2=site_url('admin/admin_user/shop_phone');
												$a="绑定";
											}
											?>&nbsp;&nbsp;&nbsp;<a href='<?php echo $href2;?>' target='rightFrame'><?php echo $a?></a>
			</span>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<th>
                                        	<label class="control-label" for="firstName">绑定邮箱:</label>
                                        </th>
                                        <td >
                                        	<span class="text" style="padding-bottom:3px;display:block;">
                                            	<font color="#FF9B4E" >
													<?php
													if(!$user['shop_email']){$href="/admin_email/set_email";echo "未绑定邮箱";
													}else{
														$href="/admin_email/upd_email_show?type=2";
														$mail=substr($user['shop_email'],0,3).'****'.substr($user['shop_email'],
																strrpos($_SESSION['admin_user']['shop_email'],'@')) ;
														echo $mail;}
													?>
												</font>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('admin').$href?>" target='rightFrame'><?php if(!$user['shop_email']){echo "绑定";}else{echo "更换";}?></a>
                                            </span>
                                        
                                        </td>
                                    </tr>
                                    <tr>
                                    	<th>
                                        	<label class="control-label" for="firstName">联系人:</label>
                                        </th>
                                        <td>
                                        	<span class="text" style="padding-bottom:3px;display:block;"><?php echo $user['shop_person']?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<th>
                                        	<label class="control-label" for="firstName">联系电话:</label>
                                        </th>
                                        <td >
                                        	<span class="text" style="padding-bottom:3px;display:block;"><?php echo $user['shop_phone']?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<th>
                                        	<label class="control-label" for="firstName">所在区域:</label>
                                        </th>
                                        <td width="40%">
                                        	<span class="text" style="padding-bottom:3px;display:block;"><?php echo $addr['p']?> -  <?php echo $addr['c']?> - <?php echo $addr['a']?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<th>
                                        	<label class="control-label" for="firstName">联系地址:</label>
                                        </th>
                                        <td width="40%">
                                        	<span class="text" style="padding-bottom:3px;display:block;"><?php echo $user['shop_address']?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<th>
                                        	<label class="control-label" for="firstName">餐厅简介:</label>
                                        </th>
                                        <td  style="line-height:20px;" colspan="2">
                                        	<p><?php echo $user['shop_desc']?></p>
                                        </td>
                                    </tr>
                                </table>
								<form action="#" class="form-horizontal" onSubmit="go();">
                                    <div class="form-actions">
                                        <a href="<?php echo site_url('admin/admin_user/shop_user_info_update')?>"  class="btn_1_a" >编辑信息</a>
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
	<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/select2.min.js"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/app.js"></script>
	<script src="<?php echo constant('ADMIN_SRC');?>media/js/form-samples.js"></script>   
	<script>
		
		jQuery(document).ready(function() {    
		   App.init();
		   FormSamples.init();
		});
	</script>
	 <script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/ajaxfileupload.js" ></script>
	
	<script>
	function updat_img(){
		$.ajaxFileUpload(
			    {
			       url:'<?php echo site_url("admin/admin_user/change_img")?>',
			       secureuri:false,
			       fileElementId:'file',
			       dataType: 'text',
			       success: function(data){
			    	   if(data=='error'){
			                 alert("文件上传失败！");
			              }
			    	   else{
			    		 $("#shop_log").attr("src","<?php echo base_url();?>"+data);
						//alert(data);
				    	   }
			           }
			       }
			    );
		}

	</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>

<!-- END BODY -->

</html>