<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo constant('SYS_NAME');?>|营业概况</title>
    <!--[if IE]>
    <script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/html5.js"></script>
    <script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/css3-mediaqueries.js"></script>
    <![endif]-->
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
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/fullcalendar.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/jqvmap.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="<?php echo constant('ADMIN_SRC');?>media/css/DT_bootstrap.css" />
    <link rel="shortcut icon" href="<?php echo constant('ADMIN_SRC');?>media/image/favicon.ico" />
    <script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/ichart.1.2.1.min.js"></script>
    <script type="text/javascript">
        function  line_show_1(){
            var flow=<?php echo $list_day;?>;//线条数据
            var person=<?php echo $list_day_person;?>;//线条数据
            var data = [
                {
                    name : '菜品销量',//线条名称
                    value:flow,//数据
                    color:'#ec4646',//定义线条的颜色
                    line_width:2//线条宽度
                },
                {
                    name : '客流量',//线条名称
                    value:person,//数据
                    color:'#80FF00',//定义线条的颜色
                    line_width:2//线条宽度
                }
            ];

            var labels = <?php echo $list_day_labels;?>;//横坐标

            var chart = new iChart.LineBasic2D({
                render : 'canvasDiv',
                data: data,
                align:'center',
                title : {
                    text:'餐厅菜品日销量',
                    font : '微软雅黑',
                    fontsize:24,
                    color:'#b4b4b4'
                },
                subtitle : {
                    text:'最近12天的销量数据',
                    font : '微软雅黑',
                    color:'#b4b4b4'
                },
                footnote : {
                    text:'简点点餐',
                    font : '微软雅黑',
                    fontsize:11,
                    fontweight:600,
                    padding:'0 28',
                    color:'#b4b4b4'
                },
                width : 1000,
                height : 400,
                shadow:true,
                shadow_color : '#202020',
                shadow_blur : 8,
                shadow_offsetx : 0,
                shadow_offsety : 0,
                background_color:'#2e2e2e',
                legend : {
                    enable : true,
                    row:1,//设置在一行上显示，与column配合使用
                    column : 'max',
                    valign:'top',
                    sign:'bar',
                    background_color:"#fff",//设置透明背景
                    offsetx:-68,//设置x轴偏移，满足位置需要
                    offsety:-12,
                    border : true
                },
                tip:{
                    enable:true,
                    shadow:true
                },
                crosshair:{
                    enable:true,
                    line_color:'#ec4646'
                },
                sub_option : {
                    smooth : true,
                    label:false,
                    hollow:false,
                    hollow_inside:false,
                    point_size:8
                },
                coordinate:{
                    width:840,
                    height:260,
                    striped_factor : 0.18,
                    grid_color:'#4e4e4e',
                    axis:{
                        color:'#252525',
                        width:[0,0,4,4]
                    },
                    scale:[{
                        position:'left',
                        start_scale:0,
                        end_scale:500,
                        scale_space:50,
                        scale_size:2,
                        scale_enable : false,
                        label : {color:'#9d987a',font : '微软雅黑',fontsize:11,fontweight:600},
                        scale_color:'#9f9f9f'
                    },{
                        position:'bottom',
                        label : {color:'#9d987a',font : '微软雅黑',fontsize:11,fontweight:600},
                        scale_enable : false,
                        labels:labels
                    }]
                }
            });
            //利用自定义组件构造左侧说明文本
            chart.plugin(new iChart.Custom({
                drawFn:function(){
                    //计算位置
                    var coo = chart.getCoordinate(),
                        x = coo.get('originx'),
                        y = coo.get('originy'),
                        w = coo.width,
                        h = coo.height;
                    //在左上侧的位置，渲染一个单位的文字
                    chart.target.textAlign('start')
                        .textBaseline('bottom')
                        .textFont('600 11px 微软雅黑')
                        .fillText('数量',x-40,y-12,false,'#9d987a')
                        .textBaseline('top')
                        .fillText('(时间)',x+w+12,y+h+10,false,'#9d987a');

                }
            }));
            //开始画图
            chart.draw();
        }
        function  line_show_3(){
            var flow=<?php echo $list_month;?>;//线条数据
            var person=<?php echo $list_month_person;?>;//线条数据
            var data = [
                {
                    name : '菜品销量',//线条名称
                    value:flow,//数据
                    color:'#ec4646',//定义线条的颜色
                    line_width:2//线条宽度
                },
                {
                    name : '客流量',//线条名称
                    value:person,//数据
                    color:'#80FF00',//定义线条的颜色
                    line_width:2//线条宽度
                }
            ];

            var labels = <?php echo $list_month_labels;?>;//横坐标

            var chart = new iChart.LineBasic2D({
                render : 'canvasDiv',
                data: data,
                align:'center',
                title : {
                    text:'餐厅菜品月销量',
                    font : '微软雅黑',
                    fontsize:24,
                    color:'#b4b4b4'
                },
                subtitle : {
                    text:'最近12个月的销量数据',
                    font : '微软雅黑',
                    color:'#b4b4b4'
                },
                footnote : {
                    text:'简点点餐',
                    font : '微软雅黑',
                    fontsize:11,
                    fontweight:600,
                    padding:'0 28',
                    color:'#b4b4b4'
                },
                width : 1000,
                height : 400,
                shadow:true,
                shadow_color : '#202020',
                shadow_blur : 8,
                shadow_offsetx : 0,
                shadow_offsety : 0,
                background_color:'#2e2e2e',
                legend : {
                    enable : true,
                    row:1,//设置在一行上显示，与column配合使用
                    column : 'max',
                    valign:'top',
                    sign:'bar',
                    background_color:"#fff",//设置透明背景
                    offsetx:-68,//设置x轴偏移，满足位置需要
                    offsety:-12,
                    border : true
                },
                tip:{
                    enable:true,
                    shadow:true
                },
                crosshair:{
                    enable:true,
                    line_color:'#ec4646'
                },
                sub_option : {
                    smooth : true,
                    label:false,
                    hollow:false,
                    hollow_inside:false,
                    point_size:8
                },
                coordinate:{
                    width:840,
                    height:260,
                    striped_factor : 0.18,
                    grid_color:'#4e4e4e',
                    axis:{
                        color:'#252525',
                        width:[0,0,4,4]
                    },
                    scale:[{
                        position:'left',
                        start_scale:0,
                        end_scale:5000,
                        scale_space:500,
                        scale_size:2,
                        scale_enable : false,
                        label : {color:'#9d987a',font : '微软雅黑',fontsize:11,fontweight:600},
                        scale_color:'#9f9f9f'
                    },{
                        position:'bottom',
                        label : {color:'#9d987a',font : '微软雅黑',fontsize:11,fontweight:600},
                        scale_enable : false,
                        labels:labels
                    }]
                }
            });
            //利用自定义组件构造左侧说明文本
            chart.plugin(new iChart.Custom({
                drawFn:function(){
                    //计算位置
                    var coo = chart.getCoordinate(),
                        x = coo.get('originx'),
                        y = coo.get('originy'),
                        w = coo.width,
                        h = coo.height;
                    //在左上侧的位置，渲染一个单位的文字
                    chart.target.textAlign('start')
                        .textBaseline('bottom')
                        .textFont('600 11px 微软雅黑')
                        .fillText('数量',x-40,y-12,false,'#9d987a')
                        .textBaseline('top')
                        .fillText('(时间)',x+w+12,y+h+10,false,'#9d987a');

                }
            }));
//开始画图
            chart.draw();
        }
        function  line_show_2(){
            var flow=<?php echo $list_week;?>;//线条数据
            var person=<?php echo $list_week_person;?>;//线条数据
            var data = [
                {
                    name : '菜品销量',//线条名称
                    value:flow,//数据
                    color:'#ec4646',//定义线条的颜色
                    line_width:2//线条宽度
                },
                {
                    name : '客流量',//线条名称
                    value:person,//数据
                    color:'#80FF00',//定义线条的颜色
                    line_width:2//线条宽度
                }
            ];

            var labels = <?php echo $list_week_labels;?>;//横坐标

            var chart = new iChart.LineBasic2D({
                render : 'canvasDiv',
                data: data,
                align:'center',
                title : {
                    text:'餐厅菜品周销量',
                    font : '微软雅黑',
                    fontsize:24,
                    color:'#b4b4b4'
                },
                subtitle : {
                    text:'最近12周的销量数据',
                    font : '微软雅黑',
                    color:'#b4b4b4'
                },
                footnote : {
                    text:'简点点餐',
                    font : '微软雅黑',
                    fontsize:11,
                    fontweight:600,
                    padding:'0 28',
                    color:'#b4b4b4'
                },
                width : 1000,
                height : 400,
                shadow:true,
                shadow_color : '#202020',
                shadow_blur : 8,
                shadow_offsetx : 0,
                shadow_offsety : 0,
                background_color:'#2e2e2e',
                legend : {
                    enable : true,
                    row:1,//设置在一行上显示，与column配合使用
                    column : 'max',
                    valign:'top',
                    sign:'bar',
                    background_color:"#fff",//设置透明背景
                    offsetx:-68,//设置x轴偏移，满足位置需要
                    offsety:-12,
                    border : true
                },
                tip:{
                    enable:true,
                    shadow:true
                },
                crosshair:{
                    enable:true,
                    line_color:'#ec4646'
                },
                sub_option : {
                    smooth : true,
                    label:false,
                    hollow:false,
                    hollow_inside:false,
                    point_size:8
                },
                coordinate:{
                    width:840,
                    height:260,
                    striped_factor : 0.18,
                    grid_color:'#4e4e4e',
                    axis:{
                        color:'#252525',
                        width:[0,0,4,4]
                    },
                    scale:[{
                        position:'left',
                        start_scale:0,
                        end_scale:1000,
                        scale_space:100,
                        scale_size:2,
                        scale_enable : false,
                        label : {color:'#9d987a',font : '微软雅黑',fontsize:11,fontweight:600},
                        scale_color:'#9f9f9f'
                    },{
                        position:'bottom',
                        label : {color:'#9d987a',font : '微软雅黑',fontsize:11,fontweight:600},
                        scale_enable : false,
                        labels:labels
                    }]
                }
            });
            //利用自定义组件构造左侧说明文本
            chart.plugin(new iChart.Custom({
                drawFn:function(){
                    //计算位置
                    var coo = chart.getCoordinate(),
                        x = coo.get('originx'),
                        y = coo.get('originy'),
                        w = coo.width,
                        h = coo.height;
                    //在左上侧的位置，渲染一个单位的文字
                    chart.target.textAlign('start')
                        .textBaseline('bottom')
                        .textFont('600 11px 微软雅黑')
                        .fillText('数量',x-40,y-12,false,'#9d987a')
                        .textBaseline('top')
                        .fillText('(时间)',x+w+12,y+h+10,false,'#9d987a');

                }
            }));
//开始画图
            chart.draw();
        }
    </script>
</head>
<body class="page-header-fixed">
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
                    <a href="<?php echo site_url("admin/admin_sell/index_1")?>">营业数据</a>
                    <span class="icon-angle-right"></span>
                </li>
                <li><a href="<?php echo site_url("admin/admin_sell/index_1")?>">营业概况</a></li>
            </ul>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="portlet box myself">
                <div class="portlet-title">
                    <div class="caption">&nbsp;&nbsp;&nbsp;营业概况</div>
                </div>
                <div class="portlet-body">
                    <div class="portlet solid bordered light-grey">
                        <div>
                            <div class="caption"><h4 style="float:left;><i class="icon-bar-chart"></i>热销排名</h4>
                                <a href="<?php echo site_url("admin/admin_sell/index_2")?>" style="float:right;">查看详情</a></div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_3"
                                   style="width:900px;margin-left:10px;margin-top:-10px;">
                                <thead id="thead">
                                <tr>
                                    <th style='width:100px;'>
                                        排名
                                    </th>
                                    <th class='span2'>菜品名称</th>
                                    <th class='hidden-480 span2'>单价</th>
                                    <th class='hidden-480 span2'>
                                        <div style='float:left;'>销量</div>
                                        <div style='margin-left:15px;float:right;'>
                                            <img onclick='list_show_3()' src='<?php echo constant('ADMIN_SRC').'media/img/s.png';?>' style='display:block'/>
                                            <img onclick='list_show_4()' src='<?php echo constant('ADMIN_SRC').'media/img/xx.png';?>' style='display:block'/>
                                        </div>
                                    </th>
                                    <th class='span2'>
                                        <div style='float:left;'>总价</div>
                                        <div style='margin-left:15px;float:right;'>
                                            <img onclick='list_show_1()' src='<?php echo constant('ADMIN_SRC').'media/img/s_1.png';?>' style='display:block'/>
                                            <img onclick='list_show_2()' src='<?php echo constant('ADMIN_SRC').'media/img/xx.png';?>' style='display:block'/>
                                        </div>
                                    </th>
                                    <th class='hidden-480 span3 '>发布时间</th>
                                </tr>
                                </thead>
                                <tbody id="tbody">

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="portlet solid bordered light-grey">
                        <div>
                            <div class="caption"><h4 style="float:left;><i class="icon-bar-chart"></i>销售统计</h4>
                            </div>

                            <div class="tools">
                                <div class="btn-group pull-right" data-toggle="buttons-radio">
                                    <a href="javascript:line_show_1();" class="btn mini active">&nbsp;日&nbsp;</a>
                                    <a href="javascript:line_show_2();" class="btn mini ">&nbsp;周&nbsp;</a>
                                    <a href="javascript:line_show_3();" class="btn mini">&nbsp;月&nbsp;</a>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div id='canvasDiv'></div>
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
<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.vmap.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.vmap.world.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.flot.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.flot.resize.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/date.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.gritter.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.easy-pie-chart.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/app.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/index.js" type="text/javascript"></script>
<script>
    var list=eval(<?php echo $list;?>);
    var objectList = new Array();//申明存储对象
    var dish_list="";
    function paixv(){
        function Persion(dish_id,dish_name,dish_price,dish_count,sum,insert_time,type){
            this.dish_id=dish_id;
            this.dish_name=dish_name;
            this.dish_price=dish_price;
            this.dish_count=dish_count;
            this.sum=sum;
            this.insert_time=insert_time;
            this.type=type;
        }
        var count=0;
        $.each(list, function(i,item) {
            count++;
            objectList.push(
                new Persion(
                    item.dish_id,
                    item.dish_name,
                    item.dish_price,
                    item.dish_count,
                    item.sum,
                    item.insert_time,
                    item.type));
        });
    }
    function list_show_1(){
        //按sort值从小到大排序
        objectList.sort(function(a,b){
            return b.sum-a.sum});

        dish_list=objectList;
        $("#thead").html("");
        $("#tbody").html("");
        var num=0;
        var thead="";
        thead+="<tr>";
        thead+="<th style='width:80px;'>排名</th>";
        thead+="<th class='span2'>菜品名称</th>";
        thead+="<th class='hidden-480 span2'>单价</th>";
        thead+="<th class='hidden-480 span2'>";
        thead+="<div style='float:left;'>销量</div>";
        thead+="<div style='margin-left:15px;float:right;'>";
        thead+="<img onclick='list_show_3()' src='<?php echo constant('ADMIN_SRC').'media/img/s.png';?>' style='display:block'/>";
        thead+="<img onclick='list_show_4()' src='<?php echo constant('ADMIN_SRC').'media/img/xx.png';?>' style='display:block'/>";
        thead+="</div>";
        thead+="</th>";
        thead+="<th class='span2'>";
        thead+="<div style='float:left;'>总价</div>";
        thead+="<div style='margin-left:15px;float:right;'>";
        thead+="<img onclick='list_show_1()' src='<?php echo constant('ADMIN_SRC').'media/img/s_1.png';?>' style='display:block'/>";
        thead+="<img onclick='list_show_2()' src='<?php echo constant('ADMIN_SRC').'media/img/xx.png';?>' style='display:block'/>";
        thead+=" </div>";
        thead+="</th>";
        thead+="<th class='hidden-480 span3 '>发布时间</th>";
        thead+="</tr>";
        $("#thead").append(thead);

        var tbody_html="";
        $.each(dish_list, function(i, item) {
            num++;
            if(num<=5){
                tbody_html+="<tr class='odd gradeX'>";
                tbody_html+="<td>"+num+"</td>";
                tbody_html+="<td>"+item.dish_name+"</td>";
                tbody_html+="<td>"+item.dish_price+"元</td>";
                tbody_html+="<td>"+item.dish_count+"</td>";
                tbody_html+="<td>"+item.sum+"元</td>";
                tbody_html+="<td class='hidden-480'>"+item.insert_time+"</td>";
                tbody_html+="</tr>";
            }
        });
        $("#tbody").append(tbody_html);
    }
    function list_show_2(){
        //按sort值从小到大排序
        objectList.sort(function(a,b){
            return a.sum-b.sum});

        dish_list=objectList;
        $("#thead").html("");
        $("#tbody").html("");
        var num=0;
        var thead="";
        thead+="<tr>";
        thead+="<th style='width:80px;'>排名</th>";
        thead+="<th class='span2'>菜品名称</th>";
        thead+="<th class='hidden-480 span2'>单价</th>";
        thead+="<th class='hidden-480 span2'>";
        thead+="<div style='float:left;'>销量</div>";
        thead+="<div style='margin-left:15px;float:right;'>";
        thead+="<img onclick='list_show_3()' src='<?php echo constant('ADMIN_SRC').'media/img/s.png';?>' style='display:block'/>";
        thead+="<img onclick='list_show_4()' src='<?php echo constant('ADMIN_SRC').'media/img/xx.png';?>' style='display:block'/>";
        thead+="</div>";
        thead+="</th>";
        thead+="<th class='span2'>";
        thead+="<div style='float:left;'>总价</div>";
        thead+="<div style='margin-left:15px;float:right;'>";
        thead+="<img onclick='list_show_1()' src='<?php echo constant('ADMIN_SRC').'media/img/s.png';?>' style='display:block'/>";
        thead+="<img onclick='list_show_2()' src='<?php echo constant('ADMIN_SRC').'media/img/xx_1.png';?>' style='display:block'/>";
        thead+=" </div>";
        thead+="</th>";
        thead+="<th class='hidden-480 span3 '>发布时间</th>";
        thead+="</tr>";
        $("#thead").append(thead);

        var tbody_html="";
        $.each(dish_list, function(i, item) {
            num++;
            if(num<=5){
                tbody_html+="<tr class='odd gradeX'>";
                tbody_html+="<td>"+num+"</td>";
                tbody_html+="<td>"+item.dish_name+"</td>";
                tbody_html+="<td>"+item.dish_price+"元</td>";
                tbody_html+="<td>"+item.dish_count+"</td>";
                tbody_html+="<td>"+item.sum+"元</td>";
                tbody_html+="<td class='hidden-480'>"+item.insert_time+"</td>";
                tbody_html+="</tr>";
            }
        });
        $("#tbody").append(tbody_html);
    }
    function list_show_4(){
        //按sort值从小到大排序
        objectList.sort(function(a,b){
            return a.dish_count-b.dish_count});

        dish_list=objectList;
        $("#thead").html("");
        $("#tbody").html("");
        var num=0;
        var thead="";
        thead+="<tr>";
        thead+="<th style='width:80px;'>排名</th>";
        thead+="<th class='span2'>菜品名称</th>";
        thead+="<th class='hidden-480 span2'>单价</th>";
        thead+="<th class='hidden-480 span2'>";
        thead+="<div style='float:left;'>销量</div>";
        thead+="<div style='margin-left:15px;float:right;'>";
        thead+="<img onclick='list_show_3()' src='<?php echo constant('ADMIN_SRC').'media/img/s.png';?>' style='display:block'/>";
        thead+="<img onclick='list_show_4()' src='<?php echo constant('ADMIN_SRC').'media/img/xx_1.png';?>' style='display:block'/>";
        thead+="</div>";
        thead+="</th>";
        thead+="<th class='span2'>";
        thead+="<div style='float:left;'>总价</div>";
        thead+="<div style='margin-left:15px;float:right;'>";
        thead+="<img onclick='list_show_1()' src='<?php echo constant('ADMIN_SRC').'media/img/s.png';?>' style='display:block'/>";
        thead+="<img onclick='list_show_2()' src='<?php echo constant('ADMIN_SRC').'media/img/xx.png';?>' style='display:block'/>";
        thead+=" </div>";
        thead+="</th>";
        thead+="<th class='hidden-480 span3 '>发布时间</th>";
        thead+="</tr>";
        $("#thead").append(thead);

        var tbody_html="";
        $.each(dish_list, function(i, item) {
            num++;
            if(num<=5){
                tbody_html+="<tr class='odd gradeX'>";
                tbody_html+="<td>"+num+"</td>";
                tbody_html+="<td>"+item.dish_name+"</td>";
                tbody_html+="<td>"+item.dish_price+"元</td>";
                tbody_html+="<td>"+item.dish_count+"</td>";
                tbody_html+="<td>"+item.sum+"元</td>";
                tbody_html+="<td class='hidden-480'>"+item.insert_time+"</td>";
                tbody_html+="</tr>";
            }
        });
        $("#tbody").append(tbody_html);
    }
    function list_show_3(){
        //按sort值从小到大排序
        objectList.sort(function(a,b){
            return b.dish_count-a.dish_count});

        dish_list=objectList;
        $("#thead").html("");
        $("#tbody").html("");
        var num=0;
        var thead="";
        thead+="<tr>";
        thead+="<th style='width:80px;'>排名</th>";
        thead+="<th class='span2'>菜品名称</th>";
        thead+="<th class='hidden-480 span2'>单价</th>";
        thead+="<th class='hidden-480 span2'>";
        thead+="<div style='float:left;'>销量</div>";
        thead+="<div style='margin-left:15px;float:right;'>";
        thead+="<img onclick='list_show_3()' src='<?php echo constant('ADMIN_SRC').'media/img/s_1.png';?>' style='display:block'/>";
        thead+="<img onclick='list_show_4()' src='<?php echo constant('ADMIN_SRC').'media/img/xx.png';?>' style='display:block'/>";
        thead+="</div>";
        thead+="</th>";
        thead+="<th class='span2'>";
        thead+="<div style='float:left;'>总价</div>";
        thead+="<div style='margin-left:15px;float:right;'>";
        thead+="<img onclick='list_show_1()' src='<?php echo constant('ADMIN_SRC').'media/img/s.png';?>' style='display:block'/>";
        thead+="<img onclick='list_show_2()' src='<?php echo constant('ADMIN_SRC').'media/img/xx.png';?>' style='display:block'/>";
        thead+=" </div>";
        thead+="</th>";
        thead+="<th class='hidden-480 span3 '>发布时间</th>";
        thead+="</tr>";
        $("#thead").append(thead);

        var tbody_html="";
        $.each(dish_list, function(i, item) {
            num++;
            if(num<=5){
                tbody_html+="<tr class='odd gradeX'>";
                tbody_html+="<td>"+num+"</td>";
                tbody_html+="<td>"+item.dish_name+"</td>";
                tbody_html+="<td>"+item.dish_price+"元</td>";
                tbody_html+="<td>"+item.dish_count+"</td>";
                tbody_html+="<td>"+item.sum+"元</td>";
                tbody_html+="<td class='hidden-480'>"+item.insert_time+"</td>";
                tbody_html+="</tr>";
            }
        });
        $("#tbody").append(tbody_html);
    }
    jQuery(document).ready(function(){
        paixv();
        list_show_1();
        line_show_1();
        App.init();
        Index.init();
    });
</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
</body>
</html>