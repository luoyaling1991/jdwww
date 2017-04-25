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
                <?php
                    $num = 0;
                    foreach ($type_list as $row) {
                        $type_id=$row['type_id'];//分类id
                        $type_name=$row['type_name'];//分类名称
                        $tab_list=$row['tab_list'];//餐桌集合
                        if ($num == 0) {
                            echo " <li class='active'>
                            <a href='javascript:void(0);' id='first_tab' onclick='show_tables($type_id,this);'><span class='nav-label'>$type_name</span></a>
                            </li>";
                        }else {
                            echo " <li >
                            <a href='javascript:void(0);' onclick='show_tables($type_id,this);'><span class='nav-label'>$type_name</span></a>
                            </li>";
                        }
                        $num++;
                    }
                    if ($num == 0) {
                        echo "<li class='active' ><a href='javascript:show_tab_div(1);'>无餐桌分类</a>
				        </li>";
                    }
                ?>
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
            <div class="table" style="width: 68%;float: left;">
                <?php
                    foreach($type_list as $type) {
                        $tab_list = $type['tab_list'];
                        $type_id = $type['type_id'];
                        if ($tab_list){
                            foreach($tab_list as $row){
                                $tab_id = $row['tab_id'];
                                $tab_name = $row['tab_name'];
                                $tab_person = $row['tab_person'];
                                $tab_state = $row['tab_state'];
                                $order_list = $row['order_list'];
                                $state_text = '空闲中';
                                $order_person=0;
                                if($tab_state==2){
                                    $order_title = "";
                                    $log_text = "";
                                    $order_count = 0;
                                    $order_money = 0;
                                    $sub_order_title = "";
                                    $sub_log_text = "";
                                    foreach ($order_list as $order) {
                                        $order_id = $order['order_id'];
                                        $order_type = $order['order_type'];
                                        $order_no = $order['order_no'];
                                        $order_waiter = $order['waiter_id'];
                                        $insert_time = $order['insert_time'];
                                        $log_list = $order['log_list'];
                                        if ($order_type == 0) {
                                            $order_title = "<h4 class='text-danger' style='font-size: 20px;text-align: left;'>$order_no<span style='font-size: 16px;'>&nbsp;&nbsp;{$insert_time}（{$tab_name}）</span></h4>";
                                            $log_num = 0;
                                            foreach($log_list as $log) {
                                                $log_num++;
                                                $log_num_show="";
                                                if($log_num<10){
                                                    $log_num_show="00".$log_num;
                                                }else if($log_num<100 && $log_num>9){
                                                    $log_num_show="0".$log_num;
                                                }else{
                                                    $log_num_show=$log_num;
                                                }
                                                $log_name = $log['log_name'];
                                                $log_price = $log['log_price'];
                                                $log_count = $log['log_count'];
                                                $log_money = $log['log_money'];
                                                $order_count = $order_count + $log_count;
                                                $order_money = $order_money + $log_money;
                                                $log_text .= "<tr>
                                                            <td>$log_num_show</td>
                                                            <td>$log_name</td>
                                                            <td>$log_price</td>
                                                            <td>$log_count</td>
                                                            <td>$log_money</td>
                                                            <td><a href=''>删除</a></td>
                                                        </tr>";
                                            }
                                        } else {
                                            $sub_order_title = "<tr style='background:#91d08f;'>
                                                                <td class='text-danger'>$order_no</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>";
                                            $sub_log_num = 0;
                                            foreach($log_list as $log) {
                                                $sub_log_num++;
                                                $sub_log_num_show = "";
                                                if ($sub_log_num < 10) {
                                                    $sub_log_num_show = "00" . $sub_log_num;
                                                } else if ($sub_log_num < 100 && $sub_log_num > 9) {
                                                    $sub_log_num_show = "0" . $sub_log_num;
                                                } else {
                                                    $sub_log_num_show = $sub_log_num;
                                                }
                                                $log_name = $log['log_name'];
                                                $log_price = $log['log_price'];
                                                $log_count = $log['log_count'];
                                                $log_money = $log['log_money'];
                                                $order_count = $order_count + $log_count;
                                                $order_money = $order_money + $log_money;
                                                $sub_log_text .= "<tr>
                                                            <td>$sub_log_num_show</td>
                                                            <td>$log_name</td>
                                                            <td>$log_price</td>
                                                            <td>$log_count</td>
                                                            <td>$log_money</td>
                                                            <td><a href=''>删除</a></td>
                                                        </tr>";
                                            }

                                        }

                                    }
                                    $order_person=$order_list[0]['order_person'];
                                    $state_text = '查看订单';
                                    echo "<div class='table-menu' name='show_tab_{$type_id}'>
                                    <div class='table-on'>
                                        <h1>$tab_name</h1>
                                    </div>
                                    <div class='table-text'>
                                        <h3><span style='color:#e65445;'>$order_person</span>/$tab_person</h3>
                                        <h4 data-toggle='modal' data-target='#$tab_id'>$state_text
                                        </h4>
                                    </div>
                                    <div class='modal inmodal' id='$tab_id' tabindex='-1' role='dialog'  aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content animated fadeIn'>
                                                <div class='modal-header waiting' style='padding: 15px;''>
                                                    <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                                                    {$order_title}
                                                </div>
                                                <div class='modal-body'>
                                                    <div class='ibox-content'>
                                                        <table class='table table-striped'>
                                                            <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>菜品</th>
                                                                <th>单价</th>
                                                                <th>数量</th>
                                                                <th>总价</th>
                                                                <th>删除</th>
                                                            </tr>
                                                            </thead>
                                                            {$log_text}
                                                            {$sub_order_title}
                                                            {$sub_log_text}
                                                            <tr class='waiting'>
                                                                <th>共计</th>
                                                                <th></th>
                                                                <th></th>
                                                                <th>{$order_count}份</th>
                                                                <th>{$order_money}元</th>
                                                                <th></th>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-primary'>确认打印</button>
                                                    <button type='button' class='btn btn-white' data-dismiss='modal'>关闭</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                                } else {
                                    echo "<div class='table-menu' name='show_tab_{$type_id}'>
                                    <div class='table-on'>
                                        <h1>$tab_name</h1>
                                    </div>
                                    <div class='table-text'>
                                        <h3><span style='color:#e65445;'>$order_person</span>/$tab_person</h3>
                                        <h4 style='color:#676a6c;cursor:default;'>$state_text</h4>
                                    </div>
                                </div>";
                                }
                            }
                        }
                    }

                ?>
            </div>
            <aside style="width:30%;float:right;">
                <div class="ibox float-e-margins">
                    <div class="ibox-title waiting">
                        <h5>待确定订单<span class="text-danger">（3）</span></h5>
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
                            <tbody>
                            <tr>
                                <td data-toggle="modal" data-target="#myModal4" style="cursor:pointer;">1
                                    <div class="modal inmodal" id="myModal4" tabindex="-1" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content animated fadeIn">
                                                <div class="modal-header waiting" style="padding: 15px;">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="text-danger" style="font-size: 20px;text-align: left;">201633214111212<span style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;22:22:22（满汉全席6人）</span></h4>

                                                </div>
                                                <div class="modal-body">
                                                    <div class="ibox-content">

                                                        <table class="table table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>菜品</th>
                                                                <th>单价</th>
                                                                <th>数量</th>
                                                                <th>总价</th>
                                                                <th>删除</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>5,
                                                                </td>
                                                                <td>张三</td>
                                                                <td>40%</td>
                                                                <td>40%</td>
                                                                <td><a href="">删除</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>5,
                                                                </td>
                                                                <td>张三</td>
                                                                <td>40%</td>
                                                                <td>40%</td>
                                                                <td><a href="">删除</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>5,
                                                                </td>
                                                                <td>张三</td>
                                                                <td>40%</td>
                                                                <td>40%</td>
                                                                <td><a href="">删除</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>5,
                                                                </td>
                                                                <td>张三</td>
                                                                <td>40%</td>
                                                                <td>40%</td>
                                                                <td><a href="">删除</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>5,
                                                                </td>
                                                                <td>张三</td>
                                                                <td>40%</td>
                                                                <td>40%</td>
                                                                <td><a href="">删除</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>5,
                                                                </td>
                                                                <td>张三</td>
                                                                <td>40%</td>
                                                                <td>40%</td>
                                                                <td><a href="">删除</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>5,
                                                                </td>
                                                                <td>张三</td>
                                                                <td>40%</td>
                                                                <td>40%</td>
                                                                <td><a href="">删除</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>5,
                                                                </td>
                                                                <td>张三</td>
                                                                <td>40%</td>
                                                                <td>40%</td>
                                                                <td><a href="">删除</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>5,
                                                                </td>
                                                                <td>张三</td>
                                                                <td>40%</td>
                                                                <td>40%</td>
                                                                <td><a href="">删除</a></td>
                                                            </tr>
                                                            </tbody>
                                                            <tfoot class="waiting">
                                                            <tr>
                                                                <th>共计：</th>
                                                                <th></th>
                                                                <th></th>
                                                                <th>9999份</th>
                                                                <th>9999元</th>
                                                                <th></th>
                                                            </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-primary">确认打印</button>
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </td>
                                <td>5,3,2,-1,-3,-2,2,3,5,2
                                </td>
                                <td>张三</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>5,3,9,6,5,9,7,3,5,2</td>
                                <td>李四</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>1,6,3,9,5,9,5,3,9,6,4</td>
                                <td>王麻子</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title ing">
                        <h5>正在使用订单<span class="text-danger">（4）</span></h5>
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
                            <tbody>
                            <tr>
                                <td data-toggle="modal" data-target="#myModal5" style="cursor:pointer;">1
                                    <div class="modal inmodal" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog" style="width: 1000px;">
                                            <div class="modal-content animated fadeIn" style="float: left;width: 600px;height: 860px;">
                                                <div class="modal-header ing" style="padding: 15px;">

                                                    <h4 class="text-danger" style="font-size: 20px;text-align: left;">201633214111212<span style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;22:22:22（满汉全席6人）</span></h4>

                                                </div>
                                                <div class="modal-body">
                                                    <div class="ibox-content">

                                                        <table class="table table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>菜品</th>
                                                                <th>单价</th>
                                                                <th>数量</th>
                                                                <th>总价</th>
                                                                <th>删除</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>5,
                                                                </td>
                                                                <td>张三</td>
                                                                <td>40%</td>
                                                                <td>40%</td>
                                                                <td><a href="">删除</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>5,
                                                                </td>
                                                                <td>张三</td>
                                                                <td>40%</td>
                                                                <td>40%</td>
                                                                <td><a href="">删除</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>5,
                                                                </td>
                                                                <td>张三</td>
                                                                <td>40%</td>
                                                                <td>40%</td>
                                                                <td><a href="">删除</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>小计：</td>
                                                                <td>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>&yen;9999.50</td>
                                                                <td><a href="">补打小票</a></td>
                                                            </tr>
                                                            <tr style="background:#91d08f;">
                                                                <td class="text-danger">2016343444444444-1</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>5,
                                                                </td>
                                                                <td>张三</td>
                                                                <td>40%</td>
                                                                <td>40%</td>
                                                                <td><a href="">删除</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>5,
                                                                </td>
                                                                <td>张三</td>
                                                                <td>40%</td>
                                                                <td>40%</td>
                                                                <td><a href="">删除</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>5,
                                                                </td>
                                                                <td>张三</td>
                                                                <td>40%</td>
                                                                <td>40%</td>
                                                                <td><a href="">删除</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>5,
                                                                </td>
                                                                <td>张三</td>
                                                                <td>40%</td>
                                                                <td>40%</td>
                                                                <td><a href="">删除</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>小计：</td>
                                                                <td>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>&yen;9999.50</td>
                                                                <td><a href="">补打小票</a></td>
                                                            </tr>
                                                            </tbody>
                                                            <tfoot class="ing">
                                                            <tr>
                                                                <th>共计：</th>
                                                                <th></th>
                                                                <th></th>
                                                                <th><span class="text-danger">9999</span>&nbsp;份</th>
                                                                <th><span class="text-danger">9999.99</span>&nbsp;元</th>
                                                                <th></th>
                                                            </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                    <div class="form-group" style="margin-top:20px;height:40px;">
                                                        <div style="float:left;width:33%;">
                                                            <label class="label-control" style="float:left;">折扣</label>

                                                            <input type="text" class="form-control text-danger" style="float:left;width:70%;margin-left:10px;">
                                                        </div>
                                                        <div style="float:left;width:33%;">
                                                            <label class="label-control" style="float:left;">实收</label>

                                                            <input type="text" class="form-control text-danger" style="float:left;width:70%;margin-left:10px">
                                                        </div>
                                                        <div style="float:left;width:33%;">
                                                            <label class="label-control" style="float:left;">差额</label>
                                                            <p style="float:left;width:70%;margin-left:10px;color: red;">123456</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="height:40px;">
                                                        <label class="checkbox-inline i-checks">
                                                            <input type="checkbox" value="option3">&nbsp;&nbsp;&nbsp;&nbsp;结账打票</label>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <label class="label-control">备注</label>
                                                        <input type="text" class="form-control" name="" style="display:inline;width:60%;margin-left:10px;">
                                                    </div>
                                                </div>

                                                <div class="modal-footer" style="text-align: left;">
                                                    <button type="button" class="btn btn-primary">仅结账</button>
                                                    <button type="button" class="btn btn-primary">结账/清桌</button>
                                                    <button type="button" class="btn btn-white" data-dismiss="modal" style="float: right;">关闭</button>

                                                </div>
                                            </div>
                                            <div class="modal-content animated fadeIn" style="float: right;width: 400px;height: 860px;">
                                                <div class="modal-header" style="padding: 15px;">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 style="font-size: 20px;text-align: left;">操作记录</h4>

                                                </div>
                                                <div class="modal-body" style="background: #fff;">
                                                    <div class="do-time">
                                                        <h4>12:22:22<br>工号001</h4>
                                                        <div class="do-detail">
                                                            <div class="do-part">
                                                                <h5>创建订单</h5>
                                                                <p>一二三四五六起吧</p>

                                                            </div>
                                                            <div class="do-part">
                                                                <h5>创建订单</h5>
                                                                <p>一二三四五六起吧</p>
                                                                <p>一二三四五六起吧</p>
                                                                <p>一二三四五六起吧</p>
                                                                <p>一二三四五六起吧</p>

                                                            </div>
                                                        </div>
                                                        <div style="clear: both;"></div>
                                                    </div>
                                                    <div class="do-time">
                                                        <h4>12:22:22<br>工号001</h4>
                                                        <div class="do-part">

                                                            <h5>创建订单</h5>
                                                            <p>一二三四五六起吧</p>

                                                        </div>
                                                        <div style="clear: both;"></div>
                                                    </div>
                                                    <div class="do-time">
                                                        <h4>12:22:22<br>工号001</h4>
                                                        <div class="do-part">
                                                            <h5>创建订单</h5>
                                                            <p>一二三四五六起吧</p>
                                                        </div>
                                                        <div style="clear: both;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>5,3,2,-1,-3,-2,2,3,5,2</td>
                                <td>张三</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>5,3,9,6,5,9,7,3,5,2</td>
                                <td>李四</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>1,6,3,9,5,9,5,3,9,6,4</td>
                                <td>王麻子</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>1,6,3,9,5,9,5,3,9,6,4</td>
                                <td>王麻子</td>
                            </tr>
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
        var type_id_value="<?php echo $type_list[0]['type_id'] ?>";
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });
            var active = document.getElementById('first_tab');
            show_tables(type_id_value, active);
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
        function show_tables(_index, o) {
            /*if (!$(o).parent().hasClass('active')) {*/
                $("#side-menu li").removeClass('active');
                $(o).parent().addClass('active');
                $(".table-menu").hide();
                $(".table-menu[name='show_tab_"+_index+"']").show();
           /* }*/
        }
    </script>


</body>

</html>
