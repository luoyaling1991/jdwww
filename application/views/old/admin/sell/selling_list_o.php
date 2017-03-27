<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo constant('SYS_NAME');?>|热销查询</title>
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
                        <a href="<?php echo site_url("admin/admin_sell/index_2")?>">营业数据</a>
                        <span class="icon-angle-right"></span>
                    </li>
                    <li><a href="<?php echo site_url("admin/admin_sell/index_2")?>">热销查询</a></li>
                </ul>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box myself">
                    <div class="portlet-title">
                        <div class="caption">&nbsp;&nbsp;&nbsp;热销查询</div>

                    </div>
                    <div class="portlet-body" style="padding:8px 25px 8px 25px;">
                        <table  class="table table-striped table-bordered table-hover tab_border_no"  id="sample_3">
                            <thead>
                            <tr>
                                <td colspan="9" style="padding-left:0px;">
                                    <form action="<?php echo site_url("admin/admin_sell/index_2")?>" method="post" style="margin-bottom:0px;">
                                        <div class="controls" style="float:left;">
                                            <label class="radio">
                                                <input type="radio" name="sys_type" value="0" onChange="check_out();" <?php if($sys_type==0)echo "checked";?>/>全部
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="sys_type" value="1" onChange="check_ed();" <?php if($sys_type==1)echo "checked";?>/>菜
                                            </label>
                                            <select class="check_ed_class"  name="sys_type_1" id="sys_type_1"
                                                    style="margin-left:-10px;margin-top:-1px;width:70px;font-size:12px;height:26px;<?php if($sys_type!=1)echo "display:none;"?>">
                                                <option value="0">不限</option>
                                                <option value="1" <?php if($sys_type_1==1)echo "selected";?>>荤菜</option>
                                                <option value="2" <?php if($sys_type_1==2)echo "selected";?>>素菜</option>
                                            </select>
                                            <select class="check_ed_class" name="sys_type_2" id="sys_type_2"
                                                    style="margin-right:15px;margin-top:-1px;width:70px;font-size:12px;height:26px;<?php if($sys_type!=1)echo "display:none;"?>">
                                                <option value="0">不限</option>
                                                <option value="1" <?php if($sys_type_2==1)echo "selected";?> >凉菜</option>
                                                <option value="2" <?php if($sys_type_2==2)echo "selected";?>>热菜</option>
                                            </select>
                                            <label class="radio">
                                                <input type="radio" name="sys_type" value="2" onChange="check_out();" <?php if($sys_type==2)echo "checked";?>/>汤
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="sys_type" value="3" onChange="check_out();" <?php if($sys_type==3)echo "checked";?>/>小吃
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="sys_type" value="4" onChange="check_out();" <?php if($sys_type==4)echo "checked";?>/>酒水
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="sys_type" value="5" onChange="check_out();" <?php if($sys_type==5)echo "checked";?>/>其它
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="sys_type" value="6" onChange="check_out();" <?php if($sys_type==6)echo "checked";?>/>套餐
                                            </label>
                                        </div>
                                        <select style="width:100px;height:33px;" name="state" >
                                            <option value='-1' <?php if($dish_state==-1)echo "selected";?>>不限状态</option>
                                            <option value='0' <?php if($dish_state==0)echo "selected";?>>未上架</option>
                                            <option value='1' <?php if($dish_state==1)echo "selected";?>>已上架</option>
                                        </select>
                                        <input class="m-wrap placeholder-no-fix span2" style="width:100px;" type="text" placeholder="选择日期"
                                               name="date_1" id="date_1" value="<?php echo $date_1;?>" onClick="WdatePicker()"  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})"/>
                                        <span style="vertical-align:top">--</span>
                                        <input class="m-wrap placeholder-no-fix span2" type="text" placeholder="选择日期"
                                               name="date_2" id="date_2" value="<?php echo $date_2;?>" style="width:100px;" onClick="WdatePicker()"  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})"/>
                                        <input type="submit" class="btn_ss" style="width:68px;height:34px;margin-top:-9px;" value="查询"/>
                                        <div class="pull-right" >

                                            <div class="btn-group pull-right" data-toggle="buttons-radio">
                                                <a href="javascript:check_date('1');" class="btn mini" >&nbsp;日&nbsp;</a>
                                                <a href="javascript:check_date('2');" class="btn mini" >&nbsp;周&nbsp;</a>
                                                <a href="javascript:check_date('3');" class="btn mini" >&nbsp;月&nbsp;</a>
                                            </div>
                                        </div>

                                    </form>
                                </td>
                            </tr>

                            <tr style="background-color:#D2D2D2;">
                                <th style="width:8px;">
                                    <input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes" />
                                </th>
                                <th width="10%">排名</th>
                                <th width="15%">菜品名称</th>
                                <th width="10%">
                                    单价
                                </th>
                                <th width="10%">
                                    <div style="float:left;">销量</div>
                                    <div style="margin-left:15px;float:left;" id="xl_px">
                                        <img src="<?php echo constant('ADMIN_SRC');?>media/img/s.png" style="display:block"/>
                                        <img src="<?php echo constant('ADMIN_SRC');?>media/img/xx.png" style="display:block"/>
                                    </div>
                                </th>
                                <th width="10%">
                                    <div style="float:left;">总价</div>
                                    <div style="margin-left:15px;float:left;" id="zj_px">
                                        <img src="<?php echo constant('ADMIN_SRC');?>media/img/s_1.png" style="display:block"/>
                                        <img src="<?php echo constant('ADMIN_SRC');?>media/img/xx.png" style="display:block"/>
                                    </div>
                                </th>
                                <th width="10%">状态</th>
                                <th width="20%">
                                    发布时间
                                </th>
                                <th width="15%">操作</th>
                            </tr>

                            </thead>
                        </table>

                        <div style="margin-top:-6px;background-color:#F5F5F5;">
                            <form action="<?php echo site_url("admin/admin_sell/batch_do_2")?>" id="batch_form" method="post" style="margin-bottom:0px;">
                                <table  class="table table-striped table-bordered table-hover tab_border_no"  id="sample_3">
                                    <thead>
                                    <tr style="background-color:#EAEAEA;border-bottom:1px #D8D8D8 solid;">
                                        <td >
                                            <input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes" />
                                        </td>
                                        <td colspan="8">
                                            <a href="javascript:batch_do('1')" class="stach_btn_a">批量上架</a>
                                            <a href="javascript:batch_do('0')" class="stach_btn_a">批量下架</a>
                                            <input type="hidden"  name="batch_value" id="batch_value" value="">
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody">


                                    </tbody>
                                </table>
                            </form>
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
    var  asc_value=0;
    function check_date(one){
        if(one==1){
            $("#date_1").val("<?php echo date("Y-m-d",time());?>");
            $("#date_2").val("<?php echo date("Y-m-d",time());?>");
        }else if(one==2){
            $("#date_1").val("<?php echo date("Y-m-d",strtotime("-6 day"));?>");
            $("#date_2").val("<?php echo date("Y-m-d",time());?>");
        }else if(one==3){
            $("#date_1").val("<?php echo date("Y-m-d",strtotime("last month"));?>");
            $("#date_2").val("<?php echo date("Y-m-d",time());?>");
        }
    }
    var list=eval(<?php echo $list;?>);
    var objectList = new Array();//申明存储对象
    function px_list_1(){
        asc_value=1;
        //排序显示
        $("#xl_px").html("");
        $("#zj_px").html("");
        var xl_px_html="";
        var zj_px_html="";
        xl_px_html+="<img  onclick='px_list_3()' src='<?php echo constant('ADMIN_SRC');?>media/img/s.png' style='display:block'/>";
        xl_px_html+="<img  onclick='px_list_4()' src='<?php echo constant('ADMIN_SRC');?>media/img/xx.png' style='display:block'/>";
        zj_px_html+="<img onclick='px_list_1()' src='<?php echo constant('ADMIN_SRC');?>media/img/s_1.png' style='display:block'/>";
        zj_px_html+=" <img  onclick='px_list_2()' src='<?php echo constant('ADMIN_SRC');?>media/img/xx.png' style='display:block'/>";
        $("#xl_px").append(xl_px_html);
        $("#zj_px").append(zj_px_html);
        //按sort值从小到大排序
        objectList.sort(function(a,b){
            return b.sum-a.sum});
        list_show(objectList);
    }
    function px_list_2(){
        asc_value=2;
        //排序显示
        $("#xl_px").html("");
        $("#zj_px").html("");
        var xl_px_html="";
        var zj_px_html="";
        xl_px_html+="<img  onclick='px_list_3()' src='<?php echo constant('ADMIN_SRC');?>media/img/s.png' style='display:block'/>";
        xl_px_html+="<img  onclick='px_list_4()' src='<?php echo constant('ADMIN_SRC');?>media/img/xx.png' style='display:block'/>";
        zj_px_html+="<img onclick='px_list_1()' src='<?php echo constant('ADMIN_SRC');?>media/img/s.png' style='display:block'/>";
        zj_px_html+=" <img  onclick='px_list_2()' src='<?php echo constant('ADMIN_SRC');?>media/img/xx_1.png' style='display:block'/>";
        $("#xl_px").append(xl_px_html);
        $("#zj_px").append(zj_px_html);
        //按sort值从小到大排序
        objectList.sort(function(a,b){
            return a.sum-b.sum});
        list_show(objectList);
    }
    function px_list_3(){
        asc_value=3;
        //排序显示
        $("#xl_px").html("");
        $("#zj_px").html("");
        var xl_px_html="";
        var zj_px_html="";
        xl_px_html+="<img  onclick='px_list_3()' src='<?php echo constant('ADMIN_SRC');?>media/img/s_1.png' style='display:block'/>";
        xl_px_html+="<img  onclick='px_list_4()' src='<?php echo constant('ADMIN_SRC');?>media/img/xx.png' style='display:block'/>";
        zj_px_html+="<img onclick='px_list_1()' src='<?php echo constant('ADMIN_SRC');?>media/img/s.png' style='display:block'/>";
        zj_px_html+=" <img  onclick='px_list_2()' src='<?php echo constant('ADMIN_SRC');?>media/img/xx.png' style='display:block'/>";
        $("#xl_px").append(xl_px_html);
        $("#zj_px").append(zj_px_html);
        //按sort值从小到大排序
        objectList.sort(function(a,b){
            return b.count-a.count});
        list_show(objectList);
    }
    function px_list_4(){
        asc_value=4;
        //排序显示
        $("#xl_px").html("");
        $("#zj_px").html("");
        var xl_px_html="";
        var zj_px_html="";
        xl_px_html+="<img  onclick='px_list_3()' src='<?php echo constant('ADMIN_SRC');?>media/img/s.png' style='display:block'/>";
        xl_px_html+="<img  onclick='px_list_4()' src='<?php echo constant('ADMIN_SRC');?>media/img/xx_1.png' style='display:block'/>";
        zj_px_html+="<img onclick='px_list_1()' src='<?php echo constant('ADMIN_SRC');?>media/img/s.png' style='display:block'/>";
        zj_px_html+=" <img  onclick='px_list_2()' src='<?php echo constant('ADMIN_SRC');?>media/img/xx.png' style='display:block'/>";
        $("#xl_px").append(xl_px_html);
        $("#zj_px").append(zj_px_html);
        //按sort值从小到大排序
        objectList.sort(function(a,b){
            return a.count-b.count});
        list_show(objectList);
    }
    function list_show(dish_list){

        $("#tbody").html("");
        var tbody_html="";
        var num=0;
        $.each(dish_list, function(i, item) {
            num++;
            var id="";
            if(item.type==0){
                id="0_"+item.dish_id;
            }else{
                id="1_"+item.dish_id;
            }
            var state="<font color='#F00'>未上架</font>";;
            var img="<?php echo constant('ADMIN_SRC');?>media/img/btn_sj.png";
            if(item.dish_state==1){
                state="<font color='#5BB04B'>已上架</font>";
                img="<?php echo constant('ADMIN_SRC');?>media/img/btn_xj.png";
            }
            href="javascript:upd_state(&quot;"+item.dish_id+"&quot;,&quot;"+item.type+"&quot;,&quot;"+item.dish_state+"&quot;)";
            tbody_html+="<tr class='odd gradeX'>";
            tbody_html+="	<td style='width:8px;'><input type='checkbox' class='checkboxes' name='dish_id[]' value='"+id+"' /></td>";
            tbody_html+="	<td width='10%'>"+num+"</td>";
            tbody_html+="   <td width='15%'>"+item.dish_name+"</td>";
            tbody_html+="	<td width='10%' style='color:#454545'>"+item.dish_price+"元</td>";
            tbody_html+="	<td width='10%'>"+item.count+"份</td>";
            tbody_html+="	<td width='10%' style='font-weight:bold;color:#F00;'>"+item.sum+"元</td>";
            tbody_html+="	<td width='10%' >"+state+"</td>";
            tbody_html+="	<td width='20%' style='color:#454545'>"+item.insert_time+"</td>";
            tbody_html+="	<td width='15%' style='padding-bottom:4px;padding-top:6px;'>";
            tbody_html+="	<a href='"+href+"' class='btn_a_del'>";
            tbody_html+="	<img src='"+img+"'/>";
            tbody_html+="	</a>";
            tbody_html+="	</td>";
            tbody_html+="</tr>";
        });
        if(num==0){
            tbody_html+="<tr><td colspan='10' style='font-weight:bold;color:#F00;'>没有找到您想要的数据.</td></tr>";
        }
        $("#tbody").append(tbody_html);
    }
    function upd_state(d_id,d_type,state){
        //异步修改状态
        $.post('<?php echo site_url('admin/admin_sell/upd_state')?>',
            {d_id:d_id,
                d_type:d_type,
                state:state,
                where_arr:'<?php echo $where_arr?>',
                where_arr_1:'<?php echo $where_arr_1?>',
                sys_type_1:'<?php echo $sys_type_1?>',
                sys_type_2:'<?php echo $sys_type_2?>',
                sys_type:'<?php echo $sys_type?>',
                dish_state:'<?php echo $dish_state;?>',
                date_1:'<?php echo $date_1;?>',
                date_2:'<?php echo $date_2;?>'
            }, function (new_list) {
                objectList = []; //清空数组
                list=eval(new_list);
                paixv();
                if(asc_value==1){
                    px_list_1();
                }else if(asc_value==2){
                    px_list_2();
                }else if(asc_value==3){
                    px_list_3();
                }else if(asc_value==4){
                    px_list_4();
                }
            });
        return false;
    }
    function paixv(){
        function Persion(dish_id,dish_name,dish_price,count,sum,insert_time,type,dish_state){
            this.dish_id=dish_id;
            this.dish_name=dish_name;
            this.dish_price=dish_price;
            this.count=count;
            this.sum=sum;
            this.insert_time=insert_time;
            this.type=type;
            this.dish_state=dish_state;
        }
        var count=0;
        $.each(list, function(i,item) {
            count++;
            objectList.push(
                new Persion(
                    item.dish_id,
                    item.dish_name,
                    item.dish_price,
                    item.count,
                    item.sum,
                    item.insert_time,
                    item.type,
                    item.dish_state));
        });
    }
    jQuery(document).ready(function(){
        paixv();
        px_list_1();
        App.init();
        TableManaged.init();
        FormComponents.init();
    });
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