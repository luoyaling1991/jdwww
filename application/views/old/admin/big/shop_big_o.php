<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo constant('SYS_NAME');?>|推荐位管理</title>
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
                        <a href="<?php echo site_url("admin/admin_index/main_right")?>">系统介绍</a>
                        <span class="icon-angle-right"></span>
                    </li>
                    <li>
                        <a href="<?php echo site_url("admin/admin_big/big_list")?>">日常管理</a>
                        <span class="icon-angle-right"></span>
                    </li>
                    <li><a href="<?php echo site_url("admin/admin_big/big_list")?>">推荐位管理</a></li>
                </ul>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box myself">
                    <div class="portlet-title">
                        <div class="caption">&nbsp;&nbsp;&nbsp;推荐位管理</div>
                    </div>
                    <div class="portlet-body" style="padding:8px 25px 25px 25px;">
                        <form action="<?php echo site_url("admin/admin_big/big_batch")?>" id="batch_form" method="post" style="margin-bottom:0px;">
                            <table class="table table-striped table-bordered table-hover tab_border_no"  id="sample_3">
                                <thead>
                                <tr>
                                    <td colspan="9" style="padding-left:0px;">

                                        <select style="width:200px;height:33px;" name="type_id" id="type_id">

                                            <?php
                                            $type_id_check=$type_id;

                                            foreach ($type_list as $row){
                                                $type_id=$row['type_id'];
                                                $type_name=$row['type_name'];
                                                if($type_id_check==$type_id){
                                                    echo "<option value='$type_id' selected>$type_name</option>";
                                                }else{
                                                    echo "<option value='$type_id' >$type_name</option>";
                                                }


                                            }
                                            ?>
                                        </select>&nbsp;&nbsp;&nbsp;
                                        <input type="button" onclick="javascript:find_submit();" class="btn_ss" style="width:68px;height:34px;margin-top:-10px;" value="搜索"/>

                                    </td>
                                </tr>
                                <tr style="background-color:#D2D2D2;">
                                    <th style="width:8px;">
                                    </th>
                                    <th width="28%">推荐标题</th>
                                    <th width="15%">排序</th>
                                    <th width="15%">推荐类型</th>
                                    <th width="10%">状态</th>
                                    <th width="18%">添加时间</th>
                                    <th width="10%">操作</th>
                                </tr>

                                <tr style="background-color:#EAEAEA;border-bottom:1px #D8D8D8 solid;">
                                    <td >
                                        <input type="checkbox" class="group-checkable"  data-set="#sample_3 .checkboxes" />
                                    </td>
                                    <td colspan="6">
                                        <a href="javascript:batch_do('-1')" class="stach_btn_a">批量删除</a>
                                        <a href="javascript:batch_do('1')" class="stach_btn_a">批量启用</a>
                                        <a href="javascript:batch_do('0')" class="stach_btn_a">批量停用</a>
                                        <input type="hidden"  name="batch_value" id="batch_value" value="">
                                        <input type="hidden" name="batch_id" value="">
                                    </td>
                                </tr>

                                </thead>
                                <tbody>
                                <?php
                                $num=0;
                                $count=count($big_list)-1;
                                for($num=0;$num<=$count;$num++){
                                    $row=$big_list[$num];
                                    $type_id=$row['dish_type_id'];
                                    $show_id=$row['show_id'];
                                    $show_type=$row['show_type'];
                                    $show_type_show="活动推荐";
                                    if($show_type==1){
                                        $show_type_show="菜品推荐";
                                    }else if($show_type==2){
                                        $show_type_show="套餐推荐";
                                    }
                                    $show_name=$row['show_name'];
                                    $show_state=$row['show_state'];
                                    $show="<font color='red'>未上架</font>";
                                    if($show_state==1){
                                        $show="<font color='#5BB04B'>已上架</font>";
                                    }
                                    $insert_time=$row['insert_time'];

                                    $show_asc=$row['show_asc'];
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
                                    $sort_value_1=$big_list[$num_1]['show_asc'];
                                    $sort_value_2=$big_list[$num_2]['show_asc'];

                                    $sort_value=$big_list[$num]['show_asc'];
                                    $tab_id_1=$big_list[$num_1]['show_id'];
                                    $tab_id_2=$big_list[$num_2]['show_id'];

                                    $href_0="javascript:sort_do(&quot;$sort_value&quot;,&quot;$tab_id_1&quot;,&quot;$tab_id_2&quot;,&quot;$type_id&quot;,&quot;$show_id&quot;,&quot;$sort_value_1&quot;,&quot;$sort_value_2&quot;,&quot;0&quot;);";
                                    $href_1="javascript:sort_do(&quot;$sort_value&quot;,&quot;$tab_id_1&quot;,&quot;$tab_id_2&quot;,&quot;$type_id&quot;,&quot;$show_id&quot;,&quot;$sort_value_1&quot;,&quot;$sort_value_2&quot;,&quot;1&quot;);";
                                    $href_2="javascript:sort_do(&quot;$sort_value&quot;,&quot;$tab_id_1&quot;,&quot;$tab_id_2&quot;,&quot;$type_id&quot;,&quot;$show_id&quot;,&quot;$sort_value_1&quot;,&quot;$sort_value_2&quot;,&quot;2&quot;);";
                                    $href_3="javascript:sort_do(&quot;$sort_value&quot;,&quot;$tab_id_1&quot;,&quot;$tab_id_2&quot;,&quot;$type_id&quot;,&quot;$show_id&quot;,&quot;$sort_value_1&quot;,&quot;$sort_value_2&quot;,&quot;3&quot;);";
                                    $max="<a href='{$href_0}' class='max_a'>&nbsp;</a>";
                                    $shang="<a href='{$href_1}' class='shang_a'>&nbsp;</a>";
                                    $xia="<a href='{$href_2}' class='xia_a'>&nbsp;</a>";
                                    $min="<a href='{$href_3}' class='min_a'>&nbsp;</a>";

                                    $upd_a=site_url("admin/admin_big/big_update_show?show_id=").$show_id;
                                    $del_a=site_url("admin/admin_big/big_delete?show_id=").$show_id."&type_id=".$type_id;

                                    $upd="<a href='{$upd_a}' class='btn_a_del'>
															<img src='".constant('ADMIN_SRC')."media/img/btn_upd.png'/>
													  </a>";
                                    $del="<a href='{$del_a}' onclick='return del_do();' class='btn_a_del'>
														<img src='".constant('ADMIN_SRC')."media/img/btn_del.png'/>
													  </a>";

                                    echo "<tr class='odd gradeX'>
														<td><input type='checkbox' class='checkboxes' value='$show_id' name='show_id[]' /></td>
			                                            <td>{$show_name}</td>
			                                            <td>
			                                            	{$max}{$shang}{$xia}{$min}
			                                            </td>
														<td>$show_type_show</td>
			                                            <td>$show</td>
														<td style='color:#454545'>$insert_time</td>
														<td style='padding-bottom:4px;padding-top:6px;'>
			                                            	{$upd}{$del}
			                                            </td>
													</tr>";
                                }

                                if(count($type_list)==0){
                                    echo "<tr><td></td><td colspan='6' style='color:red;'>您还没有菜品分类信息，请先维护菜品分类信息，再来维护推荐信息!</td></tr>";
                                }else{
                                    if($count==-1){
                                        echo "<tr><td></td><td colspan='6' style='color:red;'>没有找到推荐位信息，您还可以在该分类下添加3条推荐信息哟!</td></tr>";
                                    }
                                }
                                ?>

                                </tbody>

                            </table>
                        </form>
                        <div class="row-fluid" >
                            <div class="span8">
                                <div class="dataTables_info" id="sample_2_info">
                                    <input type="hidden" id="type_num" value="<?php echo count($type_list);?>"/>
                                    <input type="hidden" id="list_num" value="<?php echo count($big_list);?>"/>
                                    <a href="javascript:add_big_show();" class="btn_1_a_add" id="add_a"  style="float:left;">&nbsp;&nbsp;添加推荐</a>
                                        	<span class="help-inline"  id="add_a_1">&nbsp;&nbsp;&nbsp;
                                                <?php
                                                if(count($type_list)==0){
                                                    echo "您还没有菜品分类信息，请先维护菜品分类信息，再来维护推荐信息!";
                                                }else{
                                                    if(count($big_list)==3){
                                                        echo "该推荐位位置您已经添加了3条推荐信息了，无法继续添加推荐信息!";
                                                    }else{
                                                        $big_num=3-count($big_list);
                                                        echo "该推荐位置您还可以添加<font color='red'>{$big_num}</font>条推荐信息!";
                                                    }
                                                }
                                                ?>
                                        	</span>
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
<script src="media/js/form-components.js"></script>
<script>
    jQuery(document).ready(function() {
        App.init();
        check_a();
        TableManaged.init();
        FormComponents.init();
    });
    function  check_a(){
        var type_num=$("#type_num").val();
        var list_num=$("#list_num").val();
        if(type_num==0){
            $("#add_a").removeClass("btn_1_a_add");//移除样式
            $("#add_a").addClass("btn_1_a_add_no");//添加样式
        }else{
            if(list_num==3){
                $("#add_a").removeClass("btn_1_a_add");//移除样式
                $("#add_a").addClass("btn_1_a_add_no");//添加样式
            }
        }
    }
    function add_big_show(){
        var type_num=$("#type_num").val();
        var list_num=$("#list_num").val();
        if(type_num==0){
            $("#add_a_1").css("color","red");
        }else{
            if(list_num==3){
                $("#add_a_1").css("color","red");
            }else{
                var type_id=$("#type_id").val();
                window.location.href="<?php echo site_url("admin/admin_big/big_add_show?type_id=")?>"+type_id;
            }
        }

    }
    function find_submit(){
        $("#batch_form").attr("action","<?php echo site_url("admin/admin_big/big_find")?>");
        $("#batch_form").submit();
    }
    function sort_do(sort_value,tab_id_1,tab_id_2,type_id,sort_id,sort_value_1,sort_value_2,sort_type){
        window.location.href="<?php echo site_url('admin/admin_big/big_sort?sort_id=');?>"+sort_id+"&sort_value="+sort_value+"&tab_id_1="+tab_id_1+"&tab_id_2="+tab_id_2+"&sort_value_1="+sort_value_1+"&sort_value_2="+sort_value_2+"&sort_type="+sort_type+"&type_id="+type_id;
    }
</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>

<!-- END BODY -->

</html>