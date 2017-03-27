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
    </style>
</head>
<body>
<div id="wrapper" style="background: #3f3f3f;position: relative;">
    <?php $content_url= "main_right.php";
    include_once "main_top.php";
    include_once "main_left.php";
    ?>
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <?php include_once "main_right.php"?>
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
<script src="/data/javascript/plugins/gritter/jquery.gritter.min.js"></script>
<script src="/data/javascript/jquery.cookie.min.js"></script>
<script src="/data/javascript/plugins/iCheck/icheck.min.js"></script>
<!-- Morris -->
<script src="/data/javascript/plugins/morris/raphael-2.1.0.min.js"></script>
<script src="/data/javascript/plugins/morris/morris.js"></script>
<script src="/data/javascript/plugins/layer/laydate/laydate.js"></script>
<script type="text/javascript">
    /*$(function() {
        var url = $.cookie('url');
        if (!url) {
            url = '<?php echo site_url('admin/admin_index/main_right')?>'
        }
        setContentUrl($.cookie('url'));
    })*/
    function setContentUrl (_url) {
        $.ajax({
            type: 'POST',
            url: _url,
            success: function(data) {
                $.cookie('url', _url);
                $("#page-wrapper").html(data);
                $(document).ready(function(){
                    $('.i-checks').iCheck({
                        checkboxClass: 'icheckbox_square-green',
                        radioClass: 'iradio_square-green'
                    });
                })

            }
        });
    }
</script>
</body>
</html>
