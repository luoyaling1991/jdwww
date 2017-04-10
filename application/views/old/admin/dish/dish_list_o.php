<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo constant('SYS_NAME');?>|菜品管理</title>
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
                        <a href="<?php echo site_url("admin/admin_dish/dish_list")?>">日常管理</a>
                        <span class="icon-angle-right"></span>
                    </li>
                    <li><a href="<?php echo site_url("admin/admin_dish/dish_list")?>">菜品管理</a></li>
                </ul>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box myself">
                    <div class="portlet-title">
                        <div class="caption">&nbsp;&nbsp;&nbsp;菜品管理</div>
                        <input type="hidden" name="sousuo_1" id="sousuo_1" value="{<?php echo "where_arr:$where_arr,type_id:$type_id"?>}">
                        <input type="hidden" name="sousuo_2" id="sousuo_2" value="{<?php echo "where_arr:$where_arr,type_id:$type_id,asc_name:$asc_name,asc_type:$asc_type"?>}">
                    </div>
                    <div class="portlet-body" style="padding:8px 25px 8px 25px;">
                        <form action="<?php echo site_url("admin/admin_dish/dish_batch")?>" id="batch_form" method="post">
                            <table  class="table table-striped table-bordered table-hover tab_border_no"  id="sample_3">
                                <thead>
                                <tr>
                                    <td colspan="8" style="padding-left:0px;">
                                        <div >
                                            <div style="float:left;">
                                                <input class="m-wrap placeholder-no-fix span2"
                                                       type="text" placeholder="输入菜品名称" name="dish_name" style="width:200px;line-height:30px;height:30px;">


                                                <select style="width:100px;height:33px;" name="type_id" >
                                                    <option value='-1'>不限分类</option>
                                                    <?php
                                                    foreach ($type_list as $row){
                                                        $type_id=$row['type_id'];
                                                        $type_name=$row['type_name'];
                                                        echo "<option value='{$type_id}'>{$type_name}</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <select style="width:100px;height:33px;"  name="state" >
                                                    <option value='-1'>不限状态</option>
                                                    <option value='1'>已上架</option>
                                                    <option value='0'>未上架</option>
                                                </select>
                                                <input type="button" onclick="sousuo_sub()" class="btn_ss" style="width:68px;height:34px;margin-top:-10px;" value="搜索"/>
                                                &nbsp;&nbsp;&nbsp;
                                            </div>
                                            <div class="controls" style="float:left;">
                                                <label class="radio">
                                                    <input type="radio" name="sys_type" value="0" onChange="check_out();" checked/>全部
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="sys_type" value="1" onChange="check_ed();"/>菜
                                                </label>
                                                <select class="check_ed_class"  name="sys_type_1" id="sys_type_1"
                                                        style="margin-left:-10px;margin-top:-1px;width:70px;font-size:12px;height:26px;display:none;">
                                                    <option value="0">不限</option>
                                                    <option value="1">荤菜</option>
                                                    <option value="2">素菜</option>
                                                </select>
                                                <select class="check_ed_class" name="sys_type_2" id="sys_type_2"
                                                        style="margin-right:15px;margin-top:-1px;width:70px;font-size:12px;height:26px;display:none;">
                                                    <option value="0">不限</option>
                                                    <option value="1">凉菜</option>
                                                    <option value="2">热菜</option>
                                                </select>
                                                <label class="radio">
                                                    <input type="radio" name="sys_type" value="2" onChange="check_out();" />汤
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="sys_type" value="3" onChange="check_out();"/>小吃
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="sys_type" value="4" onChange="check_out();"/>酒水
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="sys_type" value="5" onChange="check_out();"/>其它
                                                </label>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                                <tr style="background-color:#D2D2D2;">

                                    <th style="width:8px;">
                                    </th>
                                    <th width="15%">菜品名称</th>
                                    <th width="20%">所属分类</th>
                                    <th width="10%">
                                        <div style="float:left;">单价</div>
                                        <div style="margin-left:15px;float:left;">
                                            <img onclick="sort_do('dish_price','asc')" src="<?php if($asc_name=="dish_price" && $asc_type=="asc"){echo constant('ADMIN_SRC')."media/img/s_1.png";}else{echo constant('ADMIN_SRC')."media/img/s.png";}?>" style="display:block"/>
                                            <img onclick="sort_do('dish_price','desc')" src="<?php if($asc_name=="dish_price" && $asc_type=="desc"){echo constant('ADMIN_SRC')."media/img/xx_1.png";}else{echo constant('ADMIN_SRC')."media/img/xx.png";}?>" style="display:block"/>
                                        </div>
                                    </th>
                                    <th width="10%">
                                        <div style="float:left;">销量</div>
                                        <div style="margin-left:15px;float:left;">
                                            <img onclick="sort_do('dish_count','asc')"  src="<?php if($asc_name=="dish_count" && $asc_type=="asc"){echo constant('ADMIN_SRC')."media/img/s_1.png";}else{echo constant('ADMIN_SRC')."media/img/s.png";}?>" style="display:block"/>
                                            <img onclick="sort_do('dish_count','desc')" src="<?php if($asc_name=="dish_count" && $asc_type=="desc"){echo constant('ADMIN_SRC')."media/img/xx_1.png";}else{echo constant('ADMIN_SRC')."media/img/xx.png";}?>" style="display:block"/>
                                        </div>
                                    </th>
                                    <th width="10%">状态</th>
                                    <th width="20%">
                                        <div style="float:left;">发布时间</div>
                                        <div style="margin-left:15px;float:left;">
                                            <img onclick="sort_do('insert_time','asc')" src="<?php if($asc_name=="insert_time" && $asc_type=="asc"){echo constant('ADMIN_SRC')."media/img/s_1.png";}else{echo constant('ADMIN_SRC')."media/img/s.png";}?>" style="display:block"/>
                                            <img onclick="sort_do('insert_time','desc')" src="<?php if($asc_name=="insert_time" && $asc_type=="desc"){echo constant('ADMIN_SRC')."media/img/xx_1.png";}else{echo constant('ADMIN_SRC')."media/img/xx.png";}?>" style="display:block"/>
                                        </div>
                                    </th>
                                    <th width="10%">操作</th>
                                </tr>
                                <tr style="background-color:#EAEAEA;border-bottom:1px #D8D8D8 solid;">
                                    <td >
                                        <input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes" />
                                    </td>
                                    <td colspan="7">
                                        <a href="javascript:batch_do('-1')" class="stach_btn_a">批量删除</a>
                                        <a href="javascript:batch_do('1')" class="stach_btn_a">批量上架</a>
                                        <a href="javascript:batch_do('0')" class="stach_btn_a">批量下架</a>
                                        <input type="hidden"  name="batch_value" id="batch_value" value="">
                                    </td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $num=0;
                                foreach ($dish_list as $row){
                                    $num++;
                                    $type_name=$row['type_name'];
                                    if(strlen($type_name)>27){
                                        $type_name=substr($type_name,0,27)."...";
                                    }
                                    $dish_id=$row['dish_id'];
                                    $dish_name=$row['dish_name'];
                                    $dish_price=$row['dish_price'];
                                    $dish_count=$row['dish_count'];
                                    $dish_count=$row['dish_count'];
                                    $dish_state=$row['dish_state'];
                                    $show="<font color='red'>未上架</font>";
                                    if($dish_state==1){
                                        $show="<font color='#5BB04B'>已上架</font>";
                                    }
                                    $insert_time=$row['insert_time'];

                                    $upd_a=site_url("admin/admin_dish/dish_update_show?dish_id=").$dish_id;
                                    $del_a=site_url("admin/admin_dish/dish_delete?dish_id=").$dish_id;

                                    $upd="<a href='{$upd_a}' class='btn_a_del'>
															<img src='".constant('ADMIN_SRC')."media/img/btn_upd.png'/>
													  </a>";
                                    $del="<a href='{$del_a}' onclick='return del_do();' class='btn_a_del'>
														<img src='".constant('ADMIN_SRC')."media/img/btn_del.png'/>
														</a>";
                                    echo "<tr class='odd gradeX'>
															<td><input type='checkbox' class='checkboxes' value='{$dish_id}' name='dish_id[]'/></td>
															<td>{$dish_name}</td>
				                                            <td style='color:#454545'>{$type_name}</td>
				                                            <td style='font-weight:bold;color:#F00;'>{$dish_price}</td>
				                                            <td>{$dish_count}</td>
				                                            <td>{$show}</td>
															<td style='color:#454545'>{$insert_time}</td>
															<td style='padding-bottom:4px;padding-top:6px;'>
				                                            	{$upd}{$del}
				                                            	
				                                            </td>
														</tr>";
                                }
                                if($num==0){
                                    echo "<tr><td></td><td colspan='8' style='color:red;'>没有找到您想要的数据!</td></tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </form>
                        <div class="row-fluid" >
                            <div class="span4">
                                <div class="dataTables_info" id="sample_2_info">
                                    <a href="<?php echo site_url("admin/admin_dish/dish_add_show")?>" class="btn_1_a_add">&nbsp;&nbsp;添加菜品</a>
                                </div>
                            </div>
                            <div class="span8">
                                <div class="dataTables_paginate paging_bootstrap pagination" style="padding-top:8px;">


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
    function sousuo_sub(){
        $("#batch_form").attr("action","<?php echo site_url("admin/admin_dish/dish_list")?>");
        $("#batch_form").submit();
    }
    function sort_do(asc_name,asc_type){
        window.location.href="<?php echo site_url('admin/admin_dish/dish_list_do?asc_name=');?>"+asc_name+"&asc_type="+asc_type+"&page=1"+$("#sousuo_1").val();
    }
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
        window.location.href="<?php echo site_url('admin/admin_dish/dish_list_do?page=');?>"+page_no+$("#sousuo_2").val();
    }
</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>

<!-- END BODY -->

</html>