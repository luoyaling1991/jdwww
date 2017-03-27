<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo constant('SYS_NAME');?>|平板管理 </title>
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
                        <a href="<?php echo site_url('admin/admin_user/user_info');?>">账户设置</a>
                        <span class="icon-angle-right"></span>
                    </li>
                    <li><a href="<?php echo site_url('admin/admin_user/shop_pad_1');?>">平板管理</a></li>
                </ul>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box myself">
                    <div class="portlet-title">
                        <div class="caption">&nbsp;&nbsp;&nbsp;设置平板信息</div>
                    </div>
                    <div class="portlet-body form">
                        <form action="<?php echo site_url('admin/admin_user/update_shop_pwd')?>" class="form-horizontal" method="post" onsubmit="return check_submit()">
                            <div class="row-fluid">
                                <div class="control-group">
                                    <label class="control-label">平板登录账户:</label>
                                    <div class="controls">
                                        <input type="text" class="span6 m-wrap" style="width:320px;" value="<?php echo $_SESSION['admin_user']['reg_num']?>" disabled/>
                                        <span class="help-inline">您的平板登录账户名.</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">设置新密码：
                                    </label>
                                    <div class="controls">
                                        <input type="password" class="span6 m-wrap" style="width:320px;" name="pad_pwd" id="pad_pwd"/>
                                        <span class="help-block">请设置6位以上的平板登录密码.</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">再次输入密码：
                                    </label>
                                    <div class="controls">
                                        <input type="password" class="span6 m-wrap" style="width:320px;" name="re_pad_pwd" id="re_pad_pwd"/>
                                    </div>
                                </div>
                            </div>
                            <div class="controls">
                                <button type="submit" class="btn_1">确认提交</button>    <br>&nbsp;
                            </div>
                        </form>
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
<script src="<?php echo constant('ADMIN_SRC');?>media/js/app.js"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/form-samples.js"></script>
<script>
    jQuery(document).ready(function() {
        App.init();
        FormSamples.init();
    });
</script>
<script>
    function check_submit(){
        if($("#pad_pwd").val().length<6){alert('请输入至少6位数平板端登录密码!');return false;}
        if($("#pad_pwd").val()!=$("#re_pad_pwd").val()){alert('两次输入的密码不一致，请重新输入!');return false;}
    }
</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
</body>
</html>