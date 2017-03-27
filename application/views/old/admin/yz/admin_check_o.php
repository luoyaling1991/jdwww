<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo constant('SYS_NAME');?>|绑定手机号码 </title>
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
                    <li><a href="<?php echo site_url('admin/admin_yz/index');?>">修改验证密码</a></li>
                </ul>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box myself">
                    <div class="portlet-title">
                        <div class="caption">&nbsp;&nbsp;&nbsp;验证身份</div>
                    </div>
                    <div class="tabbable tabbable-custom boxless" style="background-color:#FFF;" >
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">通过手机验证</a></li>
                            <li><a class="" href="#tab_2" data-toggle="tab">通过邮箱验证</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="portlet-body form" style="background-color:#fff;">
                                    <form action="#" class="form-horizontal">
                                        <div class="row-fluid">
                                            <div class="control-group">
                                                <label class="control-label">绑定手机号码：</label>
                                                <div class="controls">
                                                    <input type="text" class="span4 m-wrap" style="width:320px;" name="shop_phone" id="shop_phone"/>
                                                    <span class="help-inline">填写您绑定的手机号码.</span>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">验证码：
                                                </label>
                                                <div class="controls">
                                                    <input type="text" class="span2 m-wrap" style="width:160px;" name="log_txt_1" id="log_txt_1"/>
                                                    <input type="button" class="btn red" value="获取验证码" id="btn_1" onclick="get_num(&quot;1&quot;)"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions clearfix">
                                            <a href="javascript:check_num(&quot;1&quot;);" class="btn blue button-next"> 继续下一步<i class="m-icon-swapright m-icon-white"></i>
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                <div class="portlet-body form" style="background-color:#fff;">
                                    <form action="#" class="form-horizontal">
                                        <div class="row-fluid">
                                            <div class="control-group">
                                                <label class="control-label">绑定邮箱地址：
                                                </label>
                                                <div class="controls">
                                                    <input type="email" class="span4 m-wrap" style="width:320px;"name="email" id="shop_mail"/>
                                                    <span class="help-inline">填写您原绑定的邮箱地址.</span>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">验证码：
                                                </label>
                                                <div class="controls">
                                                    <input type="text" class="span2 m-wrap" style="width:160px;" name="log_txt_2" id="log_txt_2"/>
                                                    <input type="button" class="btn red" value="获取验证码" onclick="get_num(&quot;2&quot;)" id="btn_2"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions clearfix">
                                            <a href="javascript:check_num(&quot;2&quot;);" class="btn blue button-next" >继续下一步<i class="m-icon-swapright m-icon-white"></i>
                                            </a>
                                        </div>
                                    </form>
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
<script src="<?php echo constant('ADMIN_SRC');?>media/js/app.js"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/form-samples.js"></script>
<script>
    jQuery(document).ready(function() {
        App.init();
        FormSamples.init();
    });
</script>
<script>
    var shop_phone_1="<?php echo $user['shop_mobile']?>";
    var shop_email_1="<?php echo $user['shop_email']?>";
    var check_phone="";
    var check_email="";
    var ss=60;
    var bl=0;
    function get_num(num){
        if(num==2){
            var shop_mail=$("#shop_mail").val();
            if(shop_email_1==""){
                alert('您还没有绑定邮箱哟!');
            }
            else{
                if(shop_email_1==shop_mail){
                    //异步传输获取验证码
                    $.post('<?php echo site_url('admin/admin_pwd/get_num')?>', {data: shop_mail,type:num }, function (e) {
                        if (e==-1){
                            alert('获取验证码失败，输入的原邮箱地址不正确，请重新输入!');
                        }
                        else{
                            check_email=e;
                            timer(num);
                            bl=1;
                        }
                    });
                }
                else{
                    alert('邮箱输入不正确，请重新输入!');
                }
            }
        }else//手机验证
        {
            var shop_phone=$("#shop_phone").val();
            if(shop_phone_1==shop_phone){
                //异步传输获取验证码
                $.post('<?php echo site_url('admin/admin_pwd/get_num')?>', {data:shop_phone,type:num }, function (e) {
                    if (e==-1){
                        alert('获取验证码失败，输入的原手机号码不正确，请重新输入!');
                    }
                    else{
                        check_phone=e;
                        timer(num);
                        bl=1;
                    }
                });
            }
            else{
                alert('原始手机号码输入不正确，请重新输入!');
            }
        }
        return false;
    }
    function timer(num){
        if(ss>0){
            document.getElementById('btn_'+num).value=ss+"秒后可重新获取";
            document.getElementById('btn_'+num).disabled=true;
            setTimeout("timer("+num+")",1000);
            ss--;
        }else{
            document.getElementById('btn_'+num).value='没收到？重新获取';
            document.getElementById('btn_'+num).disabled=false;
            ss=60;
        }
    }
    function check_num(num){
        //检测验证码是否正确
        if(num==1){//短信验证
            if(check_phone==""){
                alert("请点击获取验证码！");
                return false;
            }
            else{
                var log_txt_1=$("#log_txt_1").val();
                if(parseInt(check_phone)!=log_txt_1){
                    alert("验证码不正确，请重新输入！");
                    return false;
                }
                else{
                    window.location.href="<?php echo site_url("admin/admin_yz/upd_pwd_show");?>";
                }
            }
        }else{//邮箱验证
            if(check_email==""){
                alert("请点击获取验证码！");
                return false;
            }
            else{
                var log_txt_1=$("#log_txt_2").val();
                if(parseInt(check_email)!=parseInt(log_txt_1)){
                    alert("验证码不正确，请重新输入！");
                    return false;
                }
                else{
                    window.location.href="<?php echo site_url("admin/admin_yz/upd_pwd_show");?>";
                }
            }
        }
    }

</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
</body>
</html>