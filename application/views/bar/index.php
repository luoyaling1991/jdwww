<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">
    <title><?php echo constant('SYS_NAME');?>|吧台管理</title>
    <link href="/data/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link href="/data/font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet">

    <!-- Data Tables -->
    <link href="/data/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <link href="/data/css/animate.css" rel="stylesheet">
    <link href="/data/css/style.css?v=2.2.0" rel="stylesheet">
    <link href="/data/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/data/css/default.css">
    <style type="text/css">
        .nav > li.active{
            border: none;
        }
        .nav > li.active > a{
            background: #747576;
        }
        .navbar-static-side li a{
            color: #fff;
            line-height: 30px;
        }
        .navbar-default .nav li a:hover{
            background:#747576;
        }
        .nav-second-level{
            background: #404040;
        }
        .navbar-default .nav li.active a{
            background: #edeef3;
            color: #000;
        }
        .form-group{
            margin:30px auto;
        }
        #page-wrapper{
            margin: 0 0 0 260px;
        }
        .navbar-static-side{
            width: 260px;
        }
        .arrow{
            margin-top: 8px;
        }
        @media ( min-width : 768px) {
            #page-wrapper {
                min-height: 1000px;
            }
        }
        @media ( min-width:1366px) {
            #page-wrapper{
                min-height: 760px;
            }
        }
        @media (min-width: 1400px) {
            #page-wrapper{
                min-height: 900px;
            }
        }
        @media (min-width: 1920px) {
            #page-wrapper{
                min-height:1060px;
            }
        }
        .pointer {
            cursor:pointer;
        }
        .dropdown-title {
            color: #999;
            float:right;
            margin-right:20px;
            margin-top: 20px;
            cursor: pointer;
        }
    </style>
</head>

<body>
<div id="wrapper" style="background: #3f3f3f;position: relative;">

    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom:0px;background: #282830;">
        <div class="navbar-header">
            <span style="float:left;font-size:26px;font-weight:bold;color:#e65445;line-height:58px;margin:0 60px;"><?php echo $_SESSION['admin_user']['shop_name'] ?></span>

            <ul class="nav" style="float:left;">
                <li style="color:#999;float:left;font-size:16px;line-height:58px;">
                    账户到期: <span class="welcome-message" style="color: #e65445"><?php echo $_SESSION['admin_user']['shop_date'] ?></span>
                </li>
                <li style="color:#999;float:left;font-size:16px;line-height:58px;margin-left:20px;">
                    <span class="m-r-sm text-muted welcome-message"><a href="javascript:void(0);" onclick="setContentUrl('<?php echo site_url('admin/admin_mall')?>')" title="我要充值" style="color:#999;">我要充值</a></span>
                </li>
                <li style="color:#6f6f6f;float:left;font-size:14px;line-height:58px;margin:0 60px;">
                    最后登录<span class="welcome-message">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['admin_user']['login_time'] ?></span>
                </li>
            </ul>
        </div>
        <div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <span class="dropdown-toggle count-info dropdown-title" data-toggle="dropdown">
                        <i class="fa fa-sign-out"></i><strong>操作管理</strong>
                    </span>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0);" onclick="toBackstage();"><i class="fa fa-desktop"></i>&nbsp;&nbsp;系统管理</a>
                        </li>
                        <li><a href="javascript:void(0);" onclick="login_out();"><i class="fa fa-power-off"></i>&nbsp;&nbsp;账户注销</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div class="page-container">
        <div style="background-color:#76c873;height:30px;padding-left:20px;padding-right:20px;color:#333;">
            <table style="width: 100%;">
                <tbody><tr>
                    <td>
                        <img src="/data/images/mess.png" style="margin-bottom: 6px;margin-right: 10px;">
                    </td>
                    <td>
                        <marquee scrolldelay="1" scrollamount="2" direction="Left">
                            <span style="line-height: 30px;">欢迎使用'简点•点餐'系统，24小时联系热线18501376808!</span>
                        </marquee>
                    </td>
                </tr>
                </tbody></table>
        </div>
    </div>
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
            </ul>
        </div>
    </nav>
    <div class="logo" style="text-align:center;position: absolute;bottom:20px;left:16px;">
        <div>
            <img src="/data/images/logo2.png">
        </div>

        <p style="color:#818181;">成都火夫餐饮管理有限公司<br>
            Copyright&copy; 2015 Systems Incorporated.</p>
    </div>
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="wrapper-content  animated fadeInRight">
            <!--餐桌列表-->
            <div class="table" style="width: 66%;float: left;" id="tables">

            </div>
            <aside style="width:34%;float:right;">
                <div class="ibox float-e-margins">
                    <div class="ibox-title waiting">
                        <h5>待确定订单<span class="text-danger">（<span id="no_deal_order_num"></span>）</span></h5>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>订单号</th>
                                <th>桌号</th>
                                <th>时间</th>
                            </tr>
                            </thead>
                            <tbody id="no_deal_list">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class='ibox float-e-margins'>
                    <div class='ibox-title ing'>
                        <h5>正在使用订单<span class='text-danger' id='order_now_num'></span></h5>
                    </div>
                    <div class='ibox-content'>
                        <table class='table table-hover'>
                            <thead>
                            <tr>
                                <th>订单号</th>
                                <th>桌号</th>
                                <th>时间</th>
                            </tr>
                            </thead>
                            <tbody id="doing_order">
                            </tbody>
                        </table>
                    </div>
                </div>
            </aside>
        </div>
    </div>


    <!-- Mainly scripts -->
    <script src="/data/javascript/jquery-2.1.1.min.js"></script>
    <script src="/data/javascript/bootstrap.min.js?v=3.4.0"></script>
    <script src="/data/javascript/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/data/javascript/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/data/javascript/hplus.js?v=2.2.0"></script>
    <script src="/data/javascript/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="/data/javascript/plugins/iCheck/icheck.min.js"></script>
    <script>
        var type_list=eval(<?php echo $type_list;?>);
        var order_no_list=eval(<?php echo $order_no_list;?>);
        var type_id_value=type_list[0]['type_id'];
        $(document).ready(function () {
            show_table_types();
            show_no_deal_order();
            show_doing_order();
            select_tables(type_id_value);
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });
            $("input[type='checkbox']").on('ifChecked', function(event){
                $(this).attr('checked',true);
            });
        });
        function login_out(){
            if (confirm('确定要注销账户吗？')) {
                top.location="<?php echo site_url('admin/admin_login/login_out')?>";
            }else {
                return false;
            }
        }
        function toBackstage () {
            top.location = "<?php echo site_url("admin/admin_index/system")?>";
        }
        // 桌面分类列表展示
        function show_table_types() {
            var num = 0;
            var text = "";
            var tab_text = "";
            $.each (type_list ,function(i,row) {
                var type_id=row.type_id;//分类id
                var type_name=row.type_name;//分类名称
                var tab_list=row.tab_list;//餐桌集合
                tab_text += show_tables(tab_list,type_id);
                if (num == 0) {
                    text += " <li class='active' id='type_"+type_id+"'>"+
                    "<a href='javascript:void(0);' onclick='select_tables(&quot;"+type_id+"&quot;);'><span class='nav-label'>"+type_name+"</span></a>"+
                    "</li>";
                }else {
                    text += " <li id='type_"+type_id+"'>"+
                    "<a href='javascript:void(0);' onclick='select_tables(&quot;"+type_id+"&quot;);'><span class='nav-label'>"+type_name+"</span></a>"+
                    "</li>";
                }
                num++;
            });
            if (num == 0) {
                text += "<li class='active' ><a href='javascript:show_tab_div(1);'>无餐桌分类</a>"+
                "</li>";
            }
            $("#side-menu").html(text);
            $("#tables").html(tab_text);
        }
        // 餐桌列表展示
        function show_tables(tab_list,type_id) {
            var tab_text="";
            $.each(tab_list, function(i, row){
                var tab_id = row['tab_id'];
                var tab_name = row['tab_name'];
                var tab_person = row['tab_person'];
                var order_list = row['order_list'];
                var order_person=0;
                var order_count = 0;
                var order_money = 0;
                if(row['tab_state']==2){
                    var order_title = "";
                    var log_text = "";
                    var main_order_count = 0;
                    var main_order_money = 0;
                    var sub_order_title = "";
                    var sub_log_text = "";
                    var sub_orders_count = 0;
                    var sub_orders_money = 0;
                    $.each (order_list,function(i,order){
                        var sub_order_count = 0;
                        var sub_order_money = 0;
                        //order_waiter = order['waiter_id'];
                        var order_id = order['order_id'];
                        var insert_time = order['insert_time'].substr(order['insert_time'].length -8);
                        if (order['order_type'] == 0) {
                            order_title = "<h4 class='text-danger' style='font-size: 20px;text-align: left;'>"+order['order_no']+"<span style='font-size: 16px;'>&nbsp;&nbsp;"+insert_time+"（"+tab_name+"）</span></h4>";
                            var log_num = 0;
                            $.each(order['log_list'],function(i,log) {
                                log_num++;
                                var log_num_show="";
                                if(log_num<10){
                                    log_num_show="00"+log_num;
                                }else if(log_num<100 && log_num>9){
                                    log_num_show="0"+log_num;
                                }else{
                                    log_num_show=log_num;
                                }
                                var log_id = log['log_id'];
                                var log_count = log['log_count'];
                                var log_money = log['log_money'];
                                main_order_count = Number(main_order_count) + Number(log_count);
                                main_order_money = Number(main_order_money) + Number(log_money);
                                log_text += "<tr class='log_"+order['order_no']+"_"+log_id+"'>"+
                                "<td>"+log_num_show+"</td>"+
                                "<td>"+log['log_name']+"</td>"+
                                "<td>"+log['log_price']+"</td>"+
                                "<td class='log_count'>"+log['log_count']+"</td>"+
                                "<td class='log_money'>"+log['log_money']+"</td>"+
                                "<td><a href='javascript:del_log(&quot;"+tab_id+"&quot;,&quot;"+order['order_no']+"&quot;,&quot;"+log_id+"&quot;);'>删除</a></td>"+
                                "</tr>";
                            });
                            log_text +="<tr>"+
                                        "<td>小计：</td>"+
                                        "<td></td>"+
                                        "<td></td>"+
                                        "<td class='sub_order_count_"+order['order_no']+"'>"+main_order_count+"</td>"+
                                        "<td class='sub_order_money_"+order['order_no']+"'>&yen;"+main_order_money+"</td>"+
                                        "<td></td>"+
                                        "</tr>";
                        } else {
                            sub_log_text += "<tr style='background:#91d08f;'>"+
                            "<td class='text-danger'>"+order['order_no']+"</td>"+
                            "<td></td>"+
                            "<td></td>"+
                            "<td></td>"+
                            "<td></td>"+
                            "<td></td>"+
                            "</tr>";
                            var sub_log_num = 0;
                            $.each(order['log_list'],function(i,log) {
                                var logs_count = 0;
                                var logs_money = 0;
                                sub_log_num++;
                                var sub_log_num_show = "";
                                if (sub_log_num < 10) {
                                    sub_log_num_show = "00"+sub_log_num;
                                } else if (sub_log_num < 100 && sub_log_num > 9) {
                                    sub_log_num_show = "0" + sub_log_num;
                                } else {
                                    sub_log_num_show = sub_log_num;
                                }
                                var log_id = log['log_id'];
                                var log_count = log['log_count'];
                                var log_money = log['log_money'];
                                sub_order_count = Number(sub_order_count) + Number(log_count);
                                sub_order_money = Number(sub_order_money) + Number(log_money);
                                sub_log_text += "<tr class='log_"+order['order_no']+"_"+log_id+"'>"+
                                "<td>"+sub_log_num_show+"</td>"+
                                "<td>"+log['log_name']+"</td>"+
                                "<td>"+log['log_price']+"</td>"+
                                "<td class='log_count'>"+log_count+"</td>"+
                                "<td class='log_money'>"+log_money+"</td>"+
                                "<td><a href='javascript:del_log(&quot;"+tab_id+"&quot;,&quot;"+order['order_no']+"&quot;,&quot;"+log_id+"&quot;);'>删除</a></td>"+
                                "</tr>";
                            });
                            sub_log_text += "<tr>"+
                                        "<td>小计：</td>"+
                                        "<td></td>"+
                                        "<td></td>"+
                                        "<td class='sub_order_count_"+order['order_no']+"'>"+sub_order_count+"</td>"+
                                        "<td class='sub_order_money_"+order['order_no']+"'>&yen;"+sub_order_money+"</td>"+
                                        "<td></td>"+
                                        "</tr>";
                        }
                        sub_orders_count += sub_order_count;
                        sub_orders_money += sub_order_money;

                    });
                    order_count = main_order_count + sub_orders_count;
                    order_money = main_order_money +sub_orders_money;
                    var order_person = 0;
                    var option = "";
                    if (order_list.length >0){
                        order_person=order_list[0]['order_person'];
                        option = "<h4 data-toggle='modal' data-target='#tab_"+tab_id+"'>查看详情</h4>";

                    }else {
                        option = "<h4 onclick='clear_table(&quot;"+tab_id+"&quot;,&quot;"+type_id+"&quot;);'>清桌</h4>";
                    }
                    tab_text += "<div class='table-menu' name='show_tab_"+type_id+"'>"+
                    "<div class='table-on'>"+
                    "<h1>"+tab_name+"</h1>"+
                    "</div>"+
                    "<div class='table-text'>"+
                    "<h3><span style='color:#e65445;'>"+order_person+"</span>/"+tab_person+"</h3>"+
                    "<h4 data-toggle='modal' data-target='#tab_"+tab_id+"'>"+option+"</h4>"+
                    "</div>"+
                    "</div>"+
                    "<div class='modal inmodal' id='tab_"+tab_id+"' tabindex='-1' role='dialog'  aria-hidden='true'>"+
                    "<div class='modal-dialog'>"+
                    "<div class='modal-content animated fadeIn'>"+

                    "<div class='modal-header waiting' style='padding: 15px;'>"+
                    "<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>"+
                    order_title+
                    "</div>"+

                    "<div class='modal-body'>"+
                    "<div class='ibox-content'>"+
                    "<table class='table table-striped'>"+
                    "<thead>"+
                    "<tr>"+
                    "<th>ID</th>"+
                    "<th>菜品</th>"+
                    "<th>单价</th>"+
                    "<th>数量</th>"+
                    "<th>总价</th>"+
                    "<th>删除</th>"+
                    "</tr>"+
                    "</thead>"+log_text+sub_order_title+sub_log_text+
                    "<tfoot class='waiting'>"+
                    "<tr>"+
                    "<th>共计</th>"+
                    "<th></th>"+
                    "<th></th>"+
                    "<th class='tab_order_count_"+tab_id+"'>"+order_count+"&nbsp;份</th>"+
                    "<th class='tab_order_money_"+tab_id+"'>"+order_money+"&nbsp;元</th>"+
                    "<th></th>"+
                    "</tr>"+
                    "</tfoot>"+
                    "</table>"+
                    "</div>"+
                    "</div>"+

                    "<div class='modal-footer'>"+
                   /* "<button type='button' class='btn btn-primary'>确认打印</button>"+*/
                    "<button type='button' class='btn btn-white' data-dismiss='modal'>关闭</button>"+
                    "</div>"+

                    "</div>"+
                    "</div>"+
                    "</div>";

                } else {
                    tab_text += "<div class='table-menu' name='show_tab_"+type_id+"'>"+
                    "<div class='table-off'>"+
                    "<h1>"+tab_name+"</h1>"+
                    "</div>"+
                    "<div class='table-text'>"+
                    "<h3><span style='color:#e65445;'>"+order_person+"</span>/"+tab_person+"</h3>"+
                    "<h4 style='color:#676a6c;cursor:default;'>空闲中</h4>"+
                    "</div>"+
                    "</div>";
                }
            });
            return tab_text;
        }
        function select_tables(_index) {
            /*if (!$(o).parent().hasClass('active')) {*/
                $("#side-menu li").removeClass('active');
                $("#type_"+_index).addClass('active');
                $(".table-menu").hide();
                $(".table-menu[name='show_tab_"+_index+"']").show();
           /* }*/
        }
        // 未处理订单
        function show_no_deal_order(){
            var order_money = 0;
            var order_count = 0;
            var order_list_text = "";
            var order_num = 0;
            $.each(order_no_list, function(i,row){
                order_num++;
                var tab_id = row['tab_id'];
                var insert_time=row['insert_time'].substr(row['insert_time'].length -8 );
                var log_text = "";
                var log_num = 0;
                var order_now_num_show = "";
                $.each(row['log_list'],function(i,log){
                    log_num++;
                    if(log_num<10){
                        order_now_num_show = "0"+log_num;
                    }
                    var log_id = log['log_id'];
                    order_money = order_money + Number(log['log_money']);
                    order_count = order_count + Number(log['log_count']);
                    log_text += "<tr class='log_"+row['order_no']+"_"+log_id+"'>"+
                    "<td>"+order_now_num_show+"</td>"+
                    "<td>"+log['log_name']+"</td>"+
                    "<td>"+log['log_price']+"</td>"+
                    "<td class='log_count'>"+log['log_count']+"</td>"+
                    "<td class='log_money'>"+log['log_money']+"</td>"+
                    "<td><a href='javascript:del_log(&quot;"+tab_id+"&quot;,&quot;"+row['order_no']+"&quot;,&quot;"+log_id+"&quot;);'>删除</a></td>"+
                    "</tr>";
                });
                order_list_text += "<tr>"+
                                "<td data-toggle='modal' data-target='#no_deal_"+row['order_id']+"' style='cursor:pointer;'>"+row['order_no']+
                                "</td>"+
                                "<td>"+row['tab_name']+"</td>"+
                                "<td>"+insert_time+"</td>"+
                                "</tr>";
                if ($("#no_deal_"+row['order_id']).length <= 0) {
                    $("#wrapper").append("<div class='modal inmodal' id='no_deal_" + row['order_id'] + "' tabindex='-1' role='dialog'  aria-hidden='true'>" +
                    "<div class='modal-dialog'>" +
                    "<div class='modal-content animated fadeIn'>" +

                    "<div class='modal-header waiting' style='padding: 15px;'>" +
                    "<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>" +
                    "<h4 class='text-danger' style='font-size: 20px;text-align: left;'>" + row['order_no'] + "<span style='font-size: 16px;'>&nbsp;&nbsp;" + insert_time + "（" + row['tab_name'] + "）</span></h4>" +
                    "</div>" +

                    "<div class='modal-body'>" +
                    "<div class='ibox-content'>" +
                    "<table class='table table-striped'>" +
                    "<thead>" +
                    "<tr>" +
                    "<th>ID</th>" +
                    "<th>菜品</th>" +
                    "<th>单价</th>" +
                    "<th>数量</th>" +
                    "<th>总价</th>" +
                    "<th>删除</th>" +
                    "</tr>" +
                    "</thead>" + log_text +
                    "<tfoot class='waiting'>" +
                    "<tr>" +
                    "<th>共计</th>" +
                    "<th></th>" +
                    "<th></th>" +
                    "<th class='sub_order_count_" + row['order_no'] + "'>" + order_count + "份</th>" +
                    "<th class='sub_order_money_" + row['order_no'] + "'>&yen;" + order_money + "</th>" +
                    "<th></th>" +
                    "</tr>" +
                    "</tfoot>" +
                    "</table>" +
                    "</div>" +
                    "</div>" +

                    "<div class='modal-footer'>" +
                    "<button type='button' class='btn btn-primary' onclick='order_do(&quot;1&quot;,&quot;" + row['order_id'] + "&quot;);'>确认打印</button>" +
                    "<button type='button' class='btn btn-white' data-dismiss='modal'>关闭</button>" +
                    "</div>");
                }
            });
            $("#no_deal_order_num").text(order_num);
            $("#no_deal_list").html(order_list_text);
        }
        // 正在进行中的订单
        function show_doing_order() {
            var order_now_num = 0;
            var main_order_text = "";
            var main_log_money = 0;
            var main_log_count = 0;
            var order_money = 0;
            var order_count = 0;
            var main_log_text = "";
            var sub_log_text = "";
            var main_order_id = "";
            var main_order_no = "";
            var main_tab_name = "";
            var main_insert_time="";
            $.each(type_list, function(i,type){
                var tab_list = type['tab_list'];
                var type_id = type['type_id'];
                if (tab_list) {
                    $.each (tab_list,function(i, row){
                        var tab_id = row['tab_id'];
                        var tab_state = row['tab_state'];
                        var order_list = row['order_list'];
                        var order_now_num_show = 0;
                        if (tab_state == 2) {
                            var sub_order_money = 0;
                            var sub_order_count = 0;
                            var waiter_logs_str= "";
                            $.each(order_list, function (i, order) {
                                var sub_log_money = 0;
                                var sub_log_count = 0;
                                var waiter_logs = order['waiter_logs'];
                                if (order['order_type'] == 0) {
                                    order_now_num++;
                                    if (order_now_num < 10) {
                                        order_now_num_show = "0" + order_now_num;
                                    }
                                    main_order_id = order['order_id'];
                                    main_order_no = order['order_no'];
                                    main_tab_name = row['tab_name'];
                                    main_insert_time = order['insert_time'];//订单时间
                                    main_insert_time = main_insert_time.substr(main_insert_time.length - 8);
                                    main_order_text += "<tr>" +
                                    "<td data-toggle='modal' data-target='#order_" + main_order_id + "' style='cursor:pointer;'>" + main_order_no +
                                    "</td>" +
                                    "<td>" + main_tab_name + "</td>" +
                                    "<td>" + main_insert_time + "</td>" +
                                    "</tr>";
                                    var log_list = order['log_list'];

                                    var main_log_num = 0;
                                    order_now_num_show = "";
                                    $.each(log_list, function (i, log) {
                                        main_log_num++;
                                        if (main_log_num < 10) {
                                            order_now_num_show = "0" + main_log_num;
                                        }
                                        var log_id = log['log_id'];
                                        main_log_money = main_log_money + Number(log['log_money']);
                                        main_log_count = main_log_count + Number(log['log_count']);
                                        main_log_text += "<tr class='log_" + order['order_no'] + "_" + log_id + "'>" +
                                        "<td>" + order_now_num_show + "</td>" +
                                        "<td>" + log['log_name'] + "</td>" +
                                        "<td>" + log['log_price'] + "</td>" +
                                        "<td>" + log['log_count'] + "</td>" +
                                        "<td>" + log['log_money'] + "</td>" +
                                        "<td><a href='javascript:del_log(&quot;" + tab_id + "&quot;,&quot;" + order['order_no'] + "&quot;,&quot;" + log_id + "&quot;);'>删除</a></td>" +
                                        "</tr>";
                                    });
                                } else {
                                    var sub_log_num = 0;
                                    var order_now_num_show = "";
                                    sub_log_text += "<tr style='background:#91d08f;'>" +
                                    "<td class='text-danger'>" + order['order_no'] + "</td>" +
                                    "<td></td>" +
                                    "<td></td>" +
                                    "<td></td>" +
                                    "<td></td>" +
                                    "<td></td>" +
                                    "</tr>";
                                    var log_list = order['log_list'];
                                    $.each(log_list, function (i, log) {
                                        sub_log_num++;
                                        sub_log_money = sub_log_money + Number(log['log_money']);
                                        sub_log_count = sub_log_count + Number(log['log_count']);
                                        var log_id = log['log_id'];
                                        if (sub_log_num < 10) {
                                            order_now_num_show = "0" + sub_log_num;
                                        }
                                        sub_log_text += "<tr class='log_" + order['order_no'] + "_" + log_id + "'>" +
                                        "<td>" + order_now_num_show + "</td>" +
                                        "<td>" + log['log_name'] + "</td>" +
                                        "<td>" + log['log_price'] + "</td>" +
                                        "<td>" + log['log_count'] + "</td>" +
                                        "<td>" + log['log_money'] + "</td>" +
                                        "<td><a href='javascript:del_log(&quot;" + tab_id + "&quot;,&quot;" + order['order_no'] + "&quot;,&quot;" + log_id + "&quot;);'>删除</a></td>" +
                                        "</tr>";
                                    });
                                    sub_log_text += "<tr>" +
                                    "<td>小计：</td>" +
                                    "<td></td>" +
                                    "<td></td>" +
                                    "<td></td>" +
                                    "<td class='sub_order_money_" + order['order_no'] + "'>&yen;" + sub_log_money + "</td>" +
                                    "<td><a href='javascript:void(0);' onclick='print(&quot;" + order['order_id'] + "&quot;);'>补打小票</a></td>" +
                                    "</tr>";
                                    sub_order_money += sub_log_money;
                                    sub_order_count += sub_log_count;
                                }
                                order_money = main_log_money + sub_order_money;
                                order_count = main_log_count + sub_order_count;
                                $.each(waiter_logs,function(index,value) {
                                    waiter_logs_str +="<div class='do-time'>" +
                                                    "<h4>"+value['i_time']+"<br>工号"+value['waiter_no']+"</h4>" +
                                                    "<div class='do-detail'>" +
                                                    "<div class='do-part'>" +
                                                   /* "<h5>创建订单</h5>" +*/
                                                    " <p>"+value['log_desc']+"</p>" +
                                                    "</div>";
                                });
                            });

                            if ($("#order_" + main_order_id).length <= 0) {
                                $("#wrapper").append("<div class='modal inmodal' id='order_" + main_order_id + "' tabindex='-1' role='dialog'  aria-hidden='true'>" +
                                "<div class='modal-dialog' style='width: 1000px;'>" +
                                "<div class='modal-content animated fadeIn' style='float: left;width: 600px;'>" +
                                "<div class='modal-header ing' style='padding: 15px;'>" +
                                "<h4 class='text-danger' style='font-size: 20px;text-align: left;'>" + main_order_no + "<span style='font-size: 16px;'>&nbsp;&nbsp;&nbsp;&nbsp;" + main_insert_time + "（" + main_tab_name + "）</span></h4>" +
                                "</div>" +
                                "<div class='modal-body'>" +
                                "<div class='ibox-content'>" +
                                "<table class='table table-striped'>" +
                                "<thead>" +
                                "<tr>" +
                                "<th>ID</th>" +
                                "<th>菜品</th>" +
                                "<th>单价</th>" +
                                "<th>数量</th>" +
                                "<th>总价</th>" +
                                "<th>删除</th>" +
                                "</tr>" +
                                "</thead>" +
                                "<tbody>" +
                                main_log_text +
                                "<tr>" +
                                "<td>小计：</td>" +
                                "<td>" +
                                "</td>" +
                                "<td></td>" +
                                "<td></td>" +
                                "<td class='sub_order_count_" + main_order_no + "'>&yen;" + main_log_money + "</td>" +
                                "<td><a href='javascript:void(0);' onclick='print(&quot;" + main_order_id + "&quot;);'>补打小票</a></td>" +
                                "</tr>" +
                                sub_log_text +
                                "</tbody>" +
                                "<tfoot class='ing'>" +
                                "<tr>" +
                                "<th>共计：</th>" +
                                "<th></th>" +
                                "<th></th>" +
                                "<th><span class='text-danger tab_order_count_" + tab_id + "'>" + order_count + "&nbsp;份</span></th>" +
                                "<th><span class='text-danger tab_order_money_" + tab_id + "''>" + order_money + "&nbsp;元</span></th>" +
                                "<th></th>" +
                                "</tr>" +
                                "</tfoot>" +
                                "</table>" +
                                "</div>" +
                                "<div class='form-group' style='margin-top:20px;height:40px;'>" +
                                "<div style='float:left;width:33%;'>" +
                                "<label class='label-control' style='float:left;'>折扣</label>" +

                                "<input type='text' class='form-control text-danger' id='zk_" + tab_id + "' onkeyup='zk_change(&quot;" + tab_id + "&quot;,&quot;" + order_money + "&quot;)'style='float:left;width:70%;margin-left:10px;'>" +
                                "</div>" +
                                "<div style='float:left;width:33%;'>" +
                                "<label class='label-control' style='float:left;'>实收</label>" +
                                "<input type='text' class='form-control text-danger' id='ss_" + tab_id + "' onkeyup='ss_change(&quot;" + tab_id + "&quot;,&quot;" + order_money + "&quot;)' style='float:left;width:70%;margin-left:10px'>" +
                                "</div>" +
                                "<div style='float:left;width:33%;'>" +
                                "<label class='label-control' style='float:left;'>差额</label>" +
                                "<p style='float:left;width:70%;margin-left:10px;color: red;' id='ce_" + tab_id + "'>0</p>" +
                                "</div>" +
                                "</div>" +
                                "<div class='form-group' style='height:40px;'>" +
                                "<div class='checkbox i-checks checkbox-inline' style='margin-right:10px;margin-top:0px;'>" +
                                "<input type='checkbox' value='1' id='xiaopiao_" + tab_id + "'>" +
                                "<label style='margin-bottom:0px;font-weight:700;'>结账打票</label>" +
                                "</div>" +
                                    /*"<div class='i-checks checkbox-inline'>"+
                                     "<label class='' style='margin-bottom:0px;'>"+
                                     "<div class='icheckbox_square-green' style='position: relative;'>"+
                                     "<input type='checkbox' value='1' id='xiaopiao_"+tab_id+"' style='position: absolute; opacity: 0;'>"+
                                     "<ins class='iCheck-helper' style='position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);'></ins></div>"+
                                     "<label style='margin-left:5px;margin-bottom:0px;'>结账打票</label>"+
                                     "</label>"+
                                     "</div>"+*/
                                "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" +
                                "<label class='label-control' style='margin-bottom:0px;'>备注</label>" +
                                "<input type='text' class='form-control' id='bz_" + tab_id + "' name='bz' style='display:inline;width:60%;margin-left:10px;'>" +
                                "</div>" +
                                "<span style='color:red;' id='tishi_" + tab_id + "'></span>" +
                                "</div>" +

                                "<div class='modal-footer' style='text-align: left;'>" +
                                "<button type='button' class='btn btn-primary' onclick='ajax_submit(&quot;"+main_order_id+"&quot;,&quot;" + tab_id + "&quot;,&quot;flase&quot;);'>仅结账</button>" +
                                "<button type='button' class='btn btn-primary' onclick='ajax_submit(&quot;"+main_order_id+"&quot;,&quot;" + tab_id + "&quot;,&quot;true&quot;);'>结账/清桌</button>" +
                                "<button type='button' class='btn btn-white' data-dismiss='modal' style='float: right;'>关闭</button>" +

                                "</div>" +
                                "</div>" +
                                "<div class='modal-content animated fadeIn' style='float: right;width: 400px;'>" +
                                "<div class='modal-header' style='padding: 15px;'>" +
                                "<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>" +
                                "<h4 style='font-size: 20px;text-align: left;'>操作记录</h4>" +

                                "</div>" +
                                "<div class='modal-body' style='background: #fff;'>" +
                                waiter_logs_str+
                                "</div>" +
                                "</div>" +
                                "</div>" +
                                "</div>" +
                                "</div>");

                            }
                        }
                    });
                }
            });
            $("#order_now_num").text("（"+order_now_num+"）");
            $("#doing_order").html(main_order_text);
        }
        // 删除预定菜品
        function del_log(do_tab_id,do_order_no,do_log_id){
            var result = confirm('您确认要删除该订单菜品吗？');
            if(result){
                $.ajax({
                    url:'<?php echo site_url("admin/admin_bar/del_log")?>',
                    type: "POST",
                    data:{log_id:do_log_id,order_id:do_order_no},
                    success: function(data,status){//如果调用php成功
                        if (data == "0"){
                            var order_count = Number($(".tab_order_count_"+do_tab_id).eq(0).text().replace('份',''));
                            var del_order_count = Number($(".log_"+do_order_no+"_"+do_log_id +" .log_count").eq(0).text());
                            var n_order_count = order_count - del_order_count;
                            var order_money = Number($(".tab_order_money_"+do_tab_id).eq(0).text().replace('元',''));
                            var del_order_money = Number($(".log_"+do_order_no+"_"+do_log_id +" .log_money").eq(0).text());
                            var n_order_money = order_money - del_order_money;
                            var sub_order_count = Number($(".sub_order_count_"+do_order_no).eq(0).text().replace('份',''));
                            var sub_order_money = Number($(".sub_order_money_"+do_order_no).eq(0).text().replace('\u00A5',''));
                            var n_sub_order_count = sub_order_count - del_order_count;
                            console.log($(".sub_order_money_"+do_order_no).eq(0).text().replace('\u00A5',''))
                            var n_sub_order_money = sub_order_money -del_order_money;
                            $(".sub_order_count_"+do_order_no).text(n_sub_order_count);
                            $(".sub_order_money_"+do_order_no).text('\u00A5'+n_sub_order_money);
                            $(".tab_order_count_"+do_tab_id).html(n_order_count+"&nbsp;份");
                            $(".tab_order_money_"+do_tab_id).html(n_order_money+"&nbsp;元");
                            $(".log_"+do_order_no+"_"+do_log_id).remove();
                        }else {
                            alert('删除菜品失败，请重试!');
                        }
                    }
                });
            }
        }
        //确认订单
        function order_do(type_value,order_id_value){
            $.ajax({
                url:'<?php echo site_url("admin/admin_bar/order_do")?>',
                type: "POST",
                data:{type:type_value,order_id:order_id_value},
                dataType: "json",
                error: function(){
                    //alert('系统故障，请联系我们的客户人员！');
                },
                success: function(data,status){//如果调用php成功
                    data=eval(data);
                    if(data['bl']==0){
                        alert('该餐桌还有未订单结单，请先结单再来处理该订单！');
                    }else{
                        $("#no_deal_"+order_id_value).modal('hide');
                        if(type_value==1){
                            print(order_id_value);
                        }
                        window.location.reload();
                        /*type_list=data['type_list'];
                         order_no_list=data['order_no_list'];
                         $("#side-menu").html("");
                         $("#tables").html("");
                         $("#no_deal_order_num").text("");
                         $("#no_deal_list").html("");
                         $("#order_now_num").text("（0）");
                         $("#doing_order").html("");
                         $("#no_deal_"+order_id_value).remove();
                         show_table_types();
                         show_no_deal_order();
                         show_doing_order();*/

                    }

                    //window.open("<?php echo site_url('admin/admin_print/print_one?order_id=')?>"+order_id_value);
                }
            });

        }
        function print(order_id_value){
            $.ajax({
                url:"<?php echo site_url('admin/admin_print/print_one_do')?>",
                type: "POST",
                data:{order_id:order_id_value},
                dataType: "json",
                error: function(){
                    //alert('系统故障，请联系我们的客户人员！');
                },
                success: function(data,status){//如果调用php成功
                    var print_data=eval(data);
                    try {
                        // 创建ActiveXObject对象
                        wdapp = new ActiveXObject("Word.Application");
                    }
                    catch (e) {
                        alert("打印失败，请确认浏览器ActiveX控件和插件全部启用以及浏览器使用IE10！");
                        wdapp = null;
                        return;
                    }
                    wdapp.Documents.Open(print_data['print_type']); //打开本地(客户端)word模板
                    wddoc = wdapp.ActiveDocument;
                    wddoc.Bookmarks("print_name").Range.Text =print_data['print_name'];
                    wddoc.Bookmarks("order_no").Range.Text = print_data['order']['order_no']+"\n就餐餐桌："+print_data['tab_name']+"\n点单工号："+print_data['order']['waiter_id'];
                    wddoc.Bookmarks("insert_time").Range.Text = print_data['order']['insert_time'];
                    wddoc.Bookmarks("call_num").Range.Text = print_data['call_num'];
                    if(print_data['other']!==""){
                        wddoc.Bookmarks("call_address").Range.Text = print_data['call_address']+"\n"+print_data['other'];
                    }else{
                        wddoc.Bookmarks("call_address").Range.Text = print_data['call_address'];
                    }
                    var log_sum=0;
                    var log_name_list="";
                    var log_count_list="";
                    var log_money_list="";
                    var log_list=print_data['order_list'];
                    $.each(log_list,function(i, item){
                        log_name_list+=item.log_name+"\n";
                        log_count_list+=item.log_count+"\n";
                        log_money_list+=item.log_money+"\n";
                        log_sum=parseFloat(log_sum)+parseFloat(item.log_money);
                    });

                    wddoc.Bookmarks("log_name").Range.Text = log_name_list;
                    wddoc.Bookmarks("log_count").Range.Text = log_count_list;
                    wddoc.Bookmarks("log_money").Range.Text = log_money_list;

                    wddoc.Bookmarks("sum").Range.Text =log_sum;
                    wddoc.saveAs("d:\\PrinterTemp_cnblogs.doc"); //保存临时文件word
                    //wdapp.ActiveDocument.ActiveWindow.View.Type = 1;
                    wdapp.visible = false; //word模板是否可见
                    wdapp.Application.Printout(); //调用自动打印功能
                    wdapp.quit();
                    wdapp = null;
                }
            });

        }
        function print_jz(sub_tab_id,ss_1){
            $.ajax({
                url:"<?php echo site_url('admin/admin_print/print_two_do')?>",
                type: "POST",
                data:{tab_id:sub_tab_id},
                dataType: "json",
                error: function(){
                    //alert('系统故障，请联系我们的客户人员！');
                },
                success: function(data,status){//如果调用php成功
                    var print_data=eval(data);
                    try {
                        // 创建ActiveXObject对象
                        wdapp = new ActiveXObject("Word.Application");
                    }
                    catch (e) {
                        alert("打印失败，请确认浏览器ActiveX控件和插件全部启用以及浏览器使用IE10！");
                        wdapp = null;
                        return;
                    }
                    wdapp.Documents.Open(print_data['print_type']); //打开本地(客户端)word模板
                    wddoc = wdapp.ActiveDocument;
                    wddoc.Bookmarks("print_name").Range.Text =print_data['print_name'];
                    wddoc.Bookmarks("order_no").Range.Text = print_data['order']['order_no']+"\n就餐餐桌："+print_data['tab_name']+"\n点单工号："+print_data['order']['waiter_id'];
                    wddoc.Bookmarks("insert_time").Range.Text = print_data['order']['insert_time'];
                    wddoc.Bookmarks("call_num").Range.Text = print_data['call_num'];
                    if(print_data['other']!==""){
                        wddoc.Bookmarks("call_address").Range.Text = print_data['call_address']+"\n"+print_data['other'];
                    }else{
                        wddoc.Bookmarks("call_address").Range.Text = print_data['call_address'];
                    }
                    var log_sum=0;
                    var log_name_list="";
                    var log_count_list="";
                    var log_money_list="";
                    var log_list=print_data['order_list'];
                    $.each(log_list,function(i, item){
                        log_name_list+=item.log_name+"\n";
                        log_count_list+=item.log_count+"\n";
                        log_money_list+=item.log_money+"\n";
                        log_sum=parseFloat(log_sum)+parseFloat(item.log_money);
                    });

                    wddoc.Bookmarks("log_name").Range.Text = log_name_list;
                    wddoc.Bookmarks("log_count").Range.Text = log_count_list;
                    wddoc.Bookmarks("log_money").Range.Text = log_money_list;

                    wddoc.Bookmarks("sum").Range.Text =log_sum+"    实收："+ss_1;
                    wddoc.saveAs("d:\\PrinterTemp_cnblogs.doc"); //保存临时文件word
                    //wdapp.ActiveDocument.ActiveWindow.View.Type = 1;
                    wdapp.visible = false; //word模板是否可见
                    wdapp.Application.Printout(); //调用自动打印功能
                    wdapp.quit();
                    wdapp = null;
                }
            });
            return "ok";
        }
        function zk_change(one_table_id,money){
            var zk=$("#zk_"+one_table_id).val();
            if(isNaN(zk)){
                $("#zk_"+one_table_id).val("");
                alert("请正确填写！");
            }else{
                var ss=Number(money)-Number(zk);
                $("#ss_"+one_table_id).val(ss);
                $("#ce_"+one_table_id).html("");
                $("#ce_"+one_table_id).append(zk);
            }
        }
        function ss_change(one_table_id,money){
            var ss=$("#ss_"+one_table_id).val();
            if(isNaN(ss)){
                $("#ss_"+one_table_id).val("");
                alert("请正确填写！");
            }else{
                var zk=Number(money)-Number(ss);
                $("#zk_"+one_table_id).val(zk);
                $("#ce_"+one_table_id).html("");
                $("#ce_"+one_table_id).append(zk);
            }
        }
        // 结账并清桌
        function ajax_submit(order_id,sub_tab_id,flag){
            //先获取折扣实收
            var zk_1=$("#zk_"+sub_tab_id).val();
            var ss_1=$("#ss_"+sub_tab_id).val();
            //备注以及主单id
            var bz=$("#bz_"+sub_tab_id).val();
            if(ss_1<0 || ss_1==""){
                $("#tishi_"+sub_tab_id).html("");
                $("#tishi_"+sub_tab_id).append("请填写实收金额！");
                return false;
            }else{
                if(zk_1>0&&(bz=="" || bz.trim() == "")){
                    $("#tishi_"+sub_tab_id).html("");
                    $("#tishi_"+sub_tab_id).append("请备注折扣原因！");
                    return false;
                }else{
                    var v="";
                    if($("#xiaopiao_"+sub_tab_id).attr('checked') == 'checked'){
                        v=print_jz(sub_tab_id,ss_1);
                    }else{
                        v="ok";
                    }

                    $("#tishi_"+sub_tab_id).html("");
                    $.ajax({
                        url:'<?php echo site_url("admin/admin_bar/order_checkout")?>',
                        type: "POST",
                        data:{order_id:order_id,table_id:sub_tab_id,zk:zk_1,ss:ss_1,bz:bz,flag:flag},
                        dataType: "json",
                        error: function(){
                            //alert('系统故障，请联系我们的客户人员！');
                        },
                        success: function(data,status){//如果调用php成功
                            console.log(data);
                            if(data==-1){
                                alert("该订单还有追单未处理，请处理后结账！");
                                if(v=="ok"){
                                    window.location.reload();
                                }
                            }else{
                                if(v=="ok"){
                                    window.location.reload();
                                }
                            }
                        }
                    });
                }
            }
        }
        // 清桌
        function clear_table(order_id,sub_tab_id,type_id){
            $.ajax({
            url:'<?php echo site_url("admin/admin_bar/upd_tab")?>',
            type: "POST",
            data:{order_id:order_id,t_id:sub_tab_id,tab_state:1},
            dataType: "json",
            error: function(){
                //alert('系统故障，请联系我们的客户人员！');
            },
            success: function(data,status){//如果调用php成功
                data=eval(data);
                type_list=data['type_list'];
                order_no_list=data['order_no_list'];
                $("#side-menu").html("");
                $("#tables").html("");
                $("#no_deal_order_num").text("");
                $("#no_deal_list").html("");
                $("#order_now_num").text("（0）");
                $("#doing_order").html("");
                show_table_types();
                show_no_deal_order();
                show_doing_order();
                select_tables(type_id);
            }
            });
        }
    </script>


</body>

</html>
