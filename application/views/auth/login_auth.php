<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">二次登陆验证</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Authentication</h3>
    </div>
</div>
<div class="wrapper feed-element">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <form method="post" action="<?php echo site_url("admin/admin_two/login_two") ?>"
                      onsubmit="return check_pwd()" class="form-horizontal">
                    <div class="form-group">
                        <input type="hidden" name="time" value="<?php echo $time;?>"/>

                        <label class="col-sm-1 control-label">登录密码</label>
                        <div class="col-sm-6">
                            <input id="again_pwd" type="password" class="form-control"
                                   name="again_pwd_<?php echo $time; ?>"/>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-6" style="margin-left: 100px">
                            <span class="help-block" id="again_pwd_1">请填写验证密码.</span>
                            <a ref="javascript:void(0);"
                            onclick="setContentUrl('<?php echo site_url('admin/admin_yz/index') ?>')"">忘记密码？</a>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-1">
                            <button class="btn btn-w-m btn-primary" type="submit">确认提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function () {
//        App.init();
//        FormSamples.init();
    });
    function check_pwd() {
        if ($("#again_pwd").val() == "") {
            $("#again_pwd").focus();
            $("#again_pwd_1").html("登陆密码不能为空.");
            $("#again_pwd_1").css("color", "red");
            return false;
        } else {
            $("#again_pwd_1").css("color", "#999999");
            return true;
        }
    }
</script>
<script type="text/javascript">  var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-37564768-1']);
    _gaq.push(['_setDomainName', 'keenthemes.com']);
    _gaq.push(['_setAllowLinker', true]);
    _gaq.push(['_trackPageview']);
    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();</script>
