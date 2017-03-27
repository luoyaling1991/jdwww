<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">
    <title>"简点"点餐&nbsp;|&nbsp;找回密码</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="/data/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link href="/data/font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet">
    <link href="/data/css/style.css?v=2.2.0" rel="stylesheet">
    <link href="/data/css/plugins/iCheck/custom.css" rel="stylesheet">
</head>
<style type="text/css">
    .form-group{
        margin:30px auto;
    }
</style>
<body class="gray-bg">
<div id="wrapper">
    <div class="dashbard-1">
        <div class="row wrapper border-bottom page-heading">
            <div class="col-lg-10" style="margin-left:12%;margin-top:30px;">
                <div style="float:left;"><img src="/data/images/logo1.png"></div>
                <h2 style="color:#e65445;font-weight:bold;float:left;margin-left:30px;">找回密码</h2>
                <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Find password</h3>
            </div>
        </div>
        <div class="wrapper feed-element" id="first_content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <form name="registerForm" id='registerForm' action="<?php echo site_url("web/lose/check_lose")?>"  onSubmit="return check_form();" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">注册号</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" id="reg_num" name="reg_num" value=""/>
                                    <span id="reg_num_1"></span>
                                </div>
                                <div class="col-md-4">
                                    <span class="text-danger">*</span>
                                    <label class="control-label" style="font-weight:normal;color: #a0a0a0;">用于登录系统的唯一账号</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">验证方式</label>
                                <div class="col-md-6">
                                    <div class="radio i-checks radio-inline" style="margin-right: 20px;">
                                        <input class="authType" type="radio" value="01" name="authType" style="position: absolute; opacity: 0;" checked>
                                        &nbsp;&nbsp;手机验证
                                    </div>
                                    <div class="radio i-checks radio-inline">
                                        <input class="authType" type="radio" value="02" name="authType" style="position: absolute; opacity: 0;">
                                        &nbsp;&nbsp;邮箱验证
                                    </div>
                                </div>
                            </div>
                            <div id="emailType" class="hidden">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">安全邮箱</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" id="useremail" name="useremail" value=""/>
                                        <span id="useremail_1"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="text-danger">*</span>
                                        <label class="control-label" style="font-weight:normal;color:#a0a0a0">请输入安全邮箱地址</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">邮箱验证码</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" id="email_no" name="email_no" value=""/>
                                        <span id="email_no_1"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="button" class="btn btn-w-m btn-white btn_email" onclick="send_email(this);" value="获取验证码"/>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="text-danger">*</span>
                                        <label class="control-label" style="font-weight:normal;color:#a0a0a0">注意查看邮件</label>
                                    </div>
                                </div>
                            </div>
                            <div id="mobileType" class="show">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">安全手机</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" id="shop_mobile" name="shop_mobile" value=""/>
                                        <span id="shop_mobile_1"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="text-danger">*</span>
                                        <label class="control-label" style="font-weight:normal;color:#a0a0a0">请输入原安全手机号码</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">短信验证码</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" id="mail_no" name="mail_no" value=""/>
                                        <span id="mail_no_1"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="button" class="btn btn-w-m btn-white btn_email" onclick="send_mail(this);" value="获取验证码"/>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="text-danger">*</span>
                                        <label class="control-label" style="font-weight:normal;color:#a0a0a0">注意查看手机拦截短信</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <button class="btn btn-w-m btn-primary" type="submit" id="btn">下一步</button>
                                    <label class="col-sm-offset-1 control-label"><a href="<?php echo config_item("base_url"); ?>">想起密码了？</a></label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mainly scripts -->
<script src="/data/javascript/jquery-2.1.1.min.js"></script>
<script src="/data/javascript/bootstrap.min.js?v=3.4.0"></script>
<script src="/data/javascript/plugins/iCheck/icheck.min.js"></script>
<script src="/data/javascript/common/util.js"></script>
<script>
    var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F5d12e2b4eed3b554ae941c0ac43c330a' type='text/javascript'%3E%3C/script%3E"));
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green'
    });
    $(document).ready(function () {
        var type = $('input[name="authType"]:checked').val();
        bindCheck(type);
        $('.authType').on('ifChecked', function(event){ //ifCreated 事件应该在插件初始化之前绑定
            var $selectedvalue = $(this).val();
            bindCheck($selectedvalue);
        });
    });
    function bindCheck(_selected) {
        if (_selected == 1) {
            $("#emailType").removeClass("show").addClass("hidden");
            $("#mobileType").removeClass("hidden").addClass("show");
        }
        else {
            $("#emailType").removeClass("hidden").addClass("show");
            $("#mobileType").removeClass("show").addClass("hidden");
        }
    }
    function check_form(){
        var num_error=0;
        var reg_num= $("#reg_num").val();
        var shop_mobile=$("#shop_mobile").val();
        var userEmail=$("#useremail").val();
        try {
            $("#btn").val('验证中...').attr('disabled', 'disabled');
            if ((reg_num.length != 18 && reg_num.length != 15) || isNaN(reg_num) || reg_num == "") {
                $("#reg_num_1").html('<font color=red>工商注册号格式输入不正确!</font>');
                $("#reg_num").focus();
                $("#btn").text('下一步').removeAttr('disabled');
                num_error++;
            } else {
                $("#reg_num_1").html('');
            }
            //获取验证码
            $("#mail_no_1").html('');
            $("#email_no_1").html('');
            var type = $('input[name="authType"]:checked').val();
            if (type == 1) {
                if (shop_mobile == "") {
                    $("#shop_mobile_1").html('<font color=red>手机号码不能为空哟!</font>');
                    $("#shop_mobile").focus();
                    $("#btn").text('下一步').removeAttr('disabled');
                    num_error++;
                } else {
                    $("#shop_mobile_1").html('');
                }
                var mail_no = $("#mail_no").val();
                if (check_phone == "") {
                    $("#mail_no_1").html('<font color=red>请先获取短信验证码！</font>');
                    $("#mail_no").focus();
                    $("#btn").text('下一步').removeAttr('disabled');
                    num_error++;
                } else {
                    if (parseInt(check_phone) != parseInt(mail_no)) {

                        $("#mail_no_1").html('<font color=red>验证码输入不正确！</font>');
                        $("#mail_no").focus();
                        $("#btn").text('下一步').removeAttr('disabled');
                        num_error++;
                    }
                }
            } else {
                if (!isEmail(userEmail) || isEmail == "") {
                    $("#useremail_1").html('<font color=red>邮箱输入格式不正确!</font>');
                    $("#useremail").focus();
                    $("#btn").text('下一步').removeAttr('disabled');
                    num_error++;
                } else {
                    $("#useremail_1").html('');
                }
                var email_no = $("#email_no").val();
                if (check_email == "") {
                    $("#email_no_1").html('<font color=red>请先获取邮件验证码！</font>');
                    $("#email_no").focus();
                    $("#btn").text('下一步').removeAttr('disabled');
                    num_error++;
                } else {
                    if (parseInt(check_email) != parseInt(email_no)) {
                        $("#email_no_1").html('<font color=red>验证码输入不正确！</font>');
                        $("#email_no").focus();
                        $("#btn").text('下一步').removeAttr('disabled');
                        num_error++;
                    }
                }
            }
        }catch(e){
            return false;
        }
        if(num_error>0){
            //$("html,body").animate({scrollTop:0},200);
            return false;
        }
    }
    function isEmail(email){
        var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        if(!myreg.test(email)) return false;
        return true;
    }
    check_phone="";
    check_email="";
    function send_mail(obj){
        var reg = /^0?1[3|4|5|7|8][0-9]\d{8}$/;
        var shop_mobile=$("#shop_mobile").val();
        var reg_num=$("#reg_num").val();
        $("#reg_num_1").html('');
        $("#shop_mobile_1").html('');
        $(".btn_email").val('验证中...').attr('disabled', true);
        if(shop_mobile.length==11 && !isNaN(shop_mobile) && reg.test(shop_mobile)){
            //异步传输获取验证码
            $("#shop_mobile_1").html('');
            $.post('<?php echo site_url("/web/lose/send_mail_phone")?>', {shop_mobile:shop_mobile,reg_num:reg_num}, function (e) {
                $(obj).val('获取短信验证码').removeAttr("disabled");
                if(e==-1){
                    $("#reg_num_1").html('<font color=red>没有找到该账户名称!</font>');
                    $("#reg_num").focus();
                    $(obj).removeAttr("disabled").val('获取短信验证码');
                }else if(e==-2){
                    $("#shop_mobile_1").html('<font color=red>账户或者绑定手机号码错误!</font>');
                    $("#shop_mobile").focus();
                    $(obj).removeAttr("disabled").val('获取短信验证码');
                }else{
                    check_phone=e;
                    Utils.getKeyTimer(obj);
                }
            });
        }
        else{
            $("#shop_mobile_1").html('<font color=red>手机号码输入格式不正确!</font>');
            $("#shop_mobile").focus();
            $(obj).removeAttr("disabled").val('获取短信验证码');
        }
    }
    function send_email(obj){
        var useremail=$("#useremail").val();
        var reg_num=$("#reg_num").val();
        $("#reg_num_1").html('');
        $("#useremail_1").html('');
        $(obj).val('验证中...').attr('disabled',true);
        if(useremail==""){
            $("#useremail_1").html('<font color=red>请输入绑定邮箱地址!</font>');
            $("#useremail").focus();
            $(obj).val('获取邮箱验证码').removeAttr('disabled');
        }else{
            //异步传输获取验证码
            $("#shop_mobile_1").html('');
            $.post('<?php echo site_url("/web/lose/send_email")?>', {useremail:useremail,reg_num:reg_num}, function (e) {
                $(obj).val('获取邮箱验证码').removeAttr('disabled');
                    if(e==-1){
                    $("#reg_num_1").html('<font color=red>没有找到该账户名称!</font>');
                    $("#reg_num").focus();
                    $(obj).val('获取邮箱验证码').removeAttr('disabled');
                }else if(e==-2){
                    $("#useremail_1").html('<font color=red>账户或者绑定邮箱地址错误!</font>');
                    $("#useremail").focus();
                    $(obj).val('获取邮箱验证码').removeAttr('disabled');
                }else{
                    check_email=e;
                    Utils.getKeyTimer(obj);
                }
            });
        }
    }
</script>
</body>
</html>
