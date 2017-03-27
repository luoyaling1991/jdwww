<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo constant('SYS_NAME');?>|工号管理</title>
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
                        <a href="<?php echo site_url("admin/admin_index/main_right")?>">系统管理</a>
                        <span class="icon-angle-right"></span>
                    </li>
                    <li>
                        <a href="<?php echo site_url("admin/admin_waiter/waiter_list")?>">日常管理</a>
                        <span class="icon-angle-right"></span>
                    </li>
                    <li><a href="<?php echo site_url("admin/admin_waiter/waiter_list")?>">工号管理</a></li>
                </ul>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box myself">
                    <div class="portlet-title">
                        <div class="caption">&nbsp;&nbsp;&nbsp;工号管理</div>

                    </div>
                    <div class="portlet-body" style="padding:25px;">
                        <form action="<?php echo site_url("admin/admin_waiter/waiter_batch")?>" id="batch_form" method="post" style="margin-bottom:0px;">
                            <table class="table table-striped table-bordered table-hover tab_border_no"  id="sample_3">
                                <thead>
                                <tr style="background-color:#D2D2D2;">
                                    <th style="width:8px;">
                                    </th>
                                    <th width="10%">员工编号</th>
                                    <th width="20%">员工姓名</th>
                                    <th width="20%">联系电话</th>
                                    <th width="10%">状态</th>
                                    <th width="20%">添加时间</th>
                                    <th width="15%">操作</th>
                                </tr>
                                <tr style="background-color:#EAEAEA;border-bottom:1px #D8D8D8 solid;">
                                    <td >
                                        <input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes" />
                                    </td>
                                    <td colspan="7">
                                        <a href="javascript:batch_do('-1')" class="stach_btn_a">批量删除</a>
                                        <a href="javascript:batch_do('1')" class="stach_btn_a">批量启用</a>
                                        <a href="javascript:batch_do('0')" class="stach_btn_a">批量暂停</a>
                                        <input type="hidden"  name="batch_value" id="batch_value" value="">
                                    </td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($waiter_list as $row){
                                    $waiter_id=$row['waiter_id'];
                                    $waiter_name=$row['waiter_name'];
                                    $waiter_phone=$row['waiter_phone'];
                                    $waiter_no=$row['waiter_no'];
                                    $waiter_state=$row['waiter_state'];
                                    $show="<font color='red'>暂停</font>";
                                    if($waiter_state==1){
                                        $show="<font color='#5BB04B'>启用</font>";
                                    }
                                    $insert_time=$row['insert_time'];

                                    $upd_a=site_url("admin/admin_waiter/waiter_update_show?waiter_id=").$waiter_id;
                                    $del_a=site_url("admin/admin_waiter/waiter_delete?waiter_id=").$waiter_id;

                                    $upd="<a href='{$upd_a}' class='btn_a_del'>
															<img src='".constant('ADMIN_SRC')."media/img/btn_upd.png'/>
												 	 </a>";
                                    $del="<a href='{$del_a}' onclick='return del_do();' class='btn_a_del'>
															<img src='".constant('ADMIN_SRC')."media/img/btn_del.png'/>
													  </a>";

                                    echo "<tr class='odd gradeX'>
														<td><input type='checkbox' class='checkboxes' value='$waiter_id' name='waiter_id[]'/></td>
														<td>$waiter_no</td>
			                                            <td>$waiter_name</td>
			                                            <td style='color:#454545'>$waiter_phone</td>
			                                            <td><font color='#5BB04B'>$show</font></td>
														<td style='color:#454545'>$insert_time</td>
														<td>
			                                            	{$upd}{$del}
			                                            </td>
													</tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </form>
                        <div class="row-fluid" >
                            <div class="span4">
                                <div class="dataTables_info" id="sample_2_info">
                                    <a href="<?php echo site_url("admin/admin_waiter/waiter_add_show")?>" class="btn_1_a_add">&nbsp;&nbsp;添加员工</a>
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
    jQuery(document).ready(function() {
        App.init();
        TableManaged.init();
        FormComponents.init();
    });
</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>

<!-- END BODY -->

</html>