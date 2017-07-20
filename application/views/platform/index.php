<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">
    <title>欢迎进入黄鹤天厨后台管理系统</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="/data/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link href="/data/font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet">
    <!-- Morris -->
    <link href="/data/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="/data/css/style.css?v=2.2.0" rel="stylesheet">
    <link href="/data/css/default.css" rel="stylesheet">
    <link href="/data/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link  href="/data/css/plugins/cropper/cropper.css" rel="stylesheet">
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
        .navbar-default .nav > li > a:hover, .navbar-default .nav > li > a:focus{
            background:#747576;
        }
        .nav-second-level{
            background: #404040;
        }
        .navbar-default .nav li .active a{
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
        .col-sm-1{
            width: 100px;
            text-align: right;
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
        #sidebar ul.nav-second-level {
            display: none;
        }
    </style>
</head>
<body>
<div id="wrapper" style="background: #3f3f3f;">
    <?php
    include_once "top.php";
    include_once "left.php";
    ?>
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row wrapper border-bottom page-heading">
            <div class="col-lg-10">
                <h2 style="color:#e65445;font-weight:bold;float:left;">系统介绍</h2>
                <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">System information</h3>
            </div>
        </div>
        <div class="wrapper feed-element">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="portlet-body form" id="div_from">
                            &nbsp;&nbsp;&nbsp;欢迎进入"简点"点餐系统商家后台管理！<br>&nbsp;<br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mainly scripts -->
<script src="/data/javascript/jquery-2.1.1.min.js"></script>
<script src="/data/javascript/template/template.js"></script>
<script src="/data/javascript/bootstrap.min.js?v=3.4.0"></script>
<script src="/data/javascript/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/data/javascript/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<script src="/data/javascript/hplus.js?v=2.2.0"></script>
<script src="/data/javascript/plugins/pace/pace.min.js"></script>
<script src="/data/javascript/plugins/gritter/jquery.gritter.min.js"></script>
<script src="/data/javascript/jquery.cookie.min.js"></script>
<script src="/data/javascript/plugins/iCheck/icheck.min.js"></script>
<script src="/data/javascript/highcharts.js"></script>

<script src="/data/javascript/plugins/layer/laydate/laydate.js"></script>
<script src="/data/javascript/plugins/cropper/cropper.js"></script>
<script type="text/javascript">
    function setContentUrl (_url, _data) {
        $.ajax({
            type: 'POST',
            url: _url,
            data: _data,
            success: function(data) {
                // $.cookie('url', _url);
                $("#page-wrapper").html(data);
                setScrollTop();
                $(document).ready(function(){
                    $('.i-checks').iCheck({
                        checkboxClass: 'icheckbox_square-green',
                        radioClass: 'iradio_square-green'
                    });
                })

            }
        });
    }
    //回到顶部
    function setScrollTop(){
        document.documentElement.scrollTop = 0;
        document.body.scrollTop = 0;
    }
    $(function() {
        setContentUrl("<?php echo site_url('admin/admin_index/main_right')?>");
        var $sec_ul = $('#sidebar ul.nav-second-level');
        var $sec_li = $sec_ul.find("li");
        $sec_ul.prev().click(function () {
            if ($(this).parent().find("ul.nav-second-level").is(":hidden")){
                $('#sidebar ul li').first().removeClass('active');
                $sec_ul.parent().removeClass('active');
                $(this).parent().addClass('active');
                $sec_ul.hide();
                $(this).parent().find("ul.nav-second-level").show();
            } else {
                $(this).parent().find("ul.nav-second-level").hide();
            }
        });
        $sec_li.click (function () {
            if (!$(this).hasClass('active')){
                $sec_li.removeClass('active');
                $(this).addClass('active');
            }
        })
        $('#sidebar ul li').first().click(function () {
            if (!$(this).hasClass('active')) {
                $sec_ul.parent().removeClass('active');
                $sec_li.removeClass('active');
                $(this).addClass('active');
                $sec_ul.hide();
            }
        })
    })

</script>
</body>
</html>
