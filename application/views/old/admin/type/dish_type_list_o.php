<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo constant('SYS_NAME');?>|菜品分类管理</title>
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
                        <a href="<?php echo site_url("admin/admin_type/type_list")?>">日常管理</a>
                        <span class="icon-angle-right"></span>
                    </li>
                    <li><a href="<?php echo site_url("admin/admin_type/type_list")?>">菜品分类管理</a></li>
                </ul>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box myself">
                    <div class="portlet-title">
                        <div class="caption">&nbsp;&nbsp;&nbsp;菜品分类管理</div>

                    </div>
                    <div class="portlet-body" style="padding:25px 25px 25px 25px;">
                        <form action="<?php echo site_url("admin/admin_type/type_batch")?>" id="batch_form" method="post" style="margin-bottom:0px;">
                            <table class="table table-striped table-bordered table-hover tab_border_no"  id="sample_3">
                                <thead>
                                <tr style="background-color:#D2D2D2;">
                                    <th style="width:8px;">
                                    </th>
                                    <th width="15%">分类名称</th>
                                    <th width="20%">排序</th>
                                    <th width="15%">菜品数量</th>
                                    <th width="15%">状态</th>
                                    <th width="20%">发布时间</th>
                                    <th width="15%">操作</th>
                                </tr>
                                <tr style="background-color:#EAEAEA;border-bottom:1px #D8D8D8 solid;">
                                    <td >
                                        <input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes" />
                                    </td>
                                    <td colspan="6">
                                        <a href="javascript:batch_do('-1')" class="stach_btn_a">批量删除</a>
                                        <a href="javascript:batch_do('1')" class="stach_btn_a">批量启用</a>
                                        <a href="javascript:batch_do('0')" class="stach_btn_a">批量暂停</a>
                                        <input type="hidden"  name="batch_value" id="batch_value" value="">
                                    </td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count=count($type_list)-1;
                                for($num=0;$num<=$count;$num++){
                                    $row=$type_list[$num];
                                    $type_id=$row['type_id'];
                                    $type_name=$row['type_name'];
                                    $type_state=$row['type_state'];
                                    $show="<font color='red'>未上架</font>";
                                    if($type_state==1){
                                        $show="<font color='#5BB04B'>已上架</font>";
                                    }
                                    if($num==0){
                                        $num_1=$count;
                                    }else{
                                        $num_1=$num-1;
                                    }
                                    if($num==$count){
                                        $num_2=0;
                                    }else{
                                        $num_2=$num+1;
                                    }
                                    $type_asc=$row['type_asc'];
                                    $type_asc_1=$type_list[$num_1]['type_asc'];
                                    $type_asc_2=$type_list[$num_2]['type_asc'];;
                                    $insert_time=$row['insert_time'];
                                    $dish_list=$row['dish_list'];

                                    $sort_value=$type_list[$num]['type_asc'];
                                    $tab_id_1=$type_list[$num_1]['type_id'];
                                    $tab_id_2=$type_list[$num_2]['type_id'];

                                    $href_0="javascript:sort_do(&quot;$sort_value&quot;,&quot;$tab_id_1&quot;,&quot;$tab_id_2&quot;,&quot;$type_id&quot;,&quot;$type_asc_1&quot;,&quot;$type_asc_2&quot;,&quot;0&quot;);";
                                    $href_1="javascript:sort_do(&quot;$sort_value&quot;,&quot;$tab_id_1&quot;,&quot;$tab_id_2&quot;,&quot;$type_id&quot;,&quot;$type_asc_1&quot;,&quot;$type_asc_2&quot;,&quot;1&quot;);";
                                    $href_2="javascript:sort_do(&quot;$sort_value&quot;,&quot;$tab_id_1&quot;,&quot;$tab_id_2&quot;,&quot;$type_id&quot;,&quot;$type_asc_1&quot;,&quot;$type_asc_2&quot;,&quot;2&quot;);";
                                    $href_3="javascript:sort_do(&quot;$sort_value&quot;,&quot;$tab_id_1&quot;,&quot;$tab_id_2&quot;,&quot;$type_id&quot;,&quot;$type_asc_1&quot;,&quot;$type_asc_2&quot;,&quot;3&quot;);";
                                    $max="<a href='{$href_0}' class='max_a'>&nbsp;</a>";
                                    $shang="<a href='{$href_1}' class='shang_a'>&nbsp;</a>";
                                    $xia="<a href='{$href_2}' class='xia_a'>&nbsp;</a>";
                                    $min="<a href='{$href_3}' class='min_a'>&nbsp;</a>";

                                    $upd_a=site_url("admin/admin_type/type_update_show?type_id=").$type_id;
                                    $del_a=site_url("admin/admin_type/type_delete?type_id=").$type_id;

                                    $upd="<a href='{$upd_a}' class='btn_a_del'>
														<img src='".constant('ADMIN_SRC')."media/img/btn_upd.png'/>
												  </a>";
                                    $del="<a href='{$del_a}' onclick='return del_do();' class='btn_a_del'>
														<img src='".constant('ADMIN_SRC')."media/img/btn_del.png'/>
												  </a>";
                                    $onclick="onClick='click_show(&quot;{$num}&quot;);'";

                                    $dish_name_arr="";
                                    $dish_count=0;
                                    foreach ($dish_list as $row_1){
                                        $dish_name=$row_1['dish_name'];
                                        $dish_name_arr.=" <div class='dish_type_div'>$dish_name</div>";
                                        $dish_count++;
                                    }
                                    if($dish_count==0){
                                        $dish_name_arr="<div style='color:red;'>该分类下暂无菜品信息!</div>";
                                    }
                                    echo "<tr class='odd gradeX'>
														<td>
			                                            	<input type='checkbox' class='checkboxes' value='$type_id' name='type_id[]' />
			                                            	<input type='hidden' id='show_value_$num' value='0'/>
			                                            </td>
														<td $onclick>$type_name</td>
			                                            <td>
			                                            	{$max}{$shang}{$xia}{$min}
			                                            </td>
			                                            <td $onclick>$dish_count 份</td>
			                                            <td $onclick>
			                                            	$show
			                                            </td>
														<td $onclick style='color:#454545'>$insert_time</td>
														<td style='padding-bottom:4px;padding-top:6px;'>
			                                            	{$upd}{$del}
			                                            </td>
													</tr>
			                                        <tr style='display:none;'>
			                                        	<td colspan='7'>&nbsp;</td>
			                                        </tr>
			                                        <tr style='display:none;' id='show_$num'>
			                                        	<td colspan='6' style='padding-left:55px;'>
						                                    $dish_name_arr
			                                            </td>
			                                             <td>&nbsp;</td>
			                                        </tr>";
                                }
                                if($count==-1){
                                    echo "<tr><td></td><td colspan='7' style='color:red;'>您还没有菜品分类信息，请尽快添加吧!</td></tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </form>
                        <div class="row-fluid" >
                            <div class="span4">
                                <div class="dataTables_info" id="sample_2_info">
                                    <a href="<?php echo site_url("admin/admin_type/type_add_show")?>" class="btn_1_a_add">&nbsp;&nbsp;添加分类</a>
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
    function sort_do(sort_value,tab_id_1,tab_id_2,sort_id,sort_value_1,sort_value_2,sort_type){
        window.location.href="<?php echo site_url('admin/admin_type/type_sort?sort_id=');?>"+sort_id+"&sort_value="+sort_value+"&tab_id_1="+tab_id_1+"&tab_id_2="+tab_id_2+"&sort_value_1="+sort_value_1+"&sort_value_2="+sort_value_2+"&sort_type="+sort_type;
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