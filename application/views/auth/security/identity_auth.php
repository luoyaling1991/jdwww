<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">身份验证</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Authentication</h3>
    </div>
</div>
<div class="wrapper feed-element" id="first_content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <form method="get" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-1 control-label">验证方式</label>
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
                            <label class="col-sm-1 control-label">安全邮箱</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" value=""/>
                            </div>
                            <div class="col-md-4">
                                <span class="text-danger">*</span>
                                <label class="control-label" style="font-weight:normal;color:#a0a0a0">请输入安全邮箱地址</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">验证码</label>
                            <div class="col-md-4">
                                <input class="form-control" type="text" value=""/>
                            </div>
                            <div class="col-md-2">
                                <input type="button" class="btn btn-w-m btn-white" onclick="getKey(this);" value="获取验证码"></button>
                            </div>
                            <div class="col-md-4">
                                <span class="text-danger">*</span>
                                <label class="control-label" style="font-weight:normal;color:#a0a0a0">注意查看邮件</label>
                            </div>
                        </div>
                    </div>
                    <div id="mobileType" class="show">
                        <div class="form-group">
                            <label class="col-sm-1 control-label">安全手机</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" value=""/>
                            </div>
                            <div class="col-md-4">
                                <span class="text-danger">*</span>
                                <label class="control-label" style="font-weight:normal;color:#a0a0a0">请输入原安全手机号码</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">验证码</label>
                            <div class="col-md-4">
                                <input class="form-control" type="text" value=""/>
                            </div>
                            <div class="col-md-2">
                                <input type="button" class="btn btn-w-m btn-white" onclick="getKey(this);" value="获取验证码"></button>
                            </div>
                            <div class="col-md-4">
                                <span class="text-danger">*</span>
                                <label class="control-label" style="font-weight:normal;color:#a0a0a0">注意查看手机拦截短信</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <button class="btn btn-w-m btn-primary" type="submit">下一步</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="wrapper feed-element hidden" id="next_content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <form method="get" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2 control-label">新密码</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" value=""/>
                        </div>
                        <div class="col-md-4">
                            <span class="text-danger">*</span>
                            <label class="control-label text-muted" style="font-weight:normal;">请至少输入<span class="text-danger">6</span>数密码，区分大小写</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">再次输入</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" value=""/>
                        </div>
                        <div class="col-md-4">
                            <span class="text-danger">*</span>
                            <label class="control-label text-muted" style="font-weight:normal;">请再次输入相同密码以验证正确性</label>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:55px;">
                        <div class="col-md-4 col-sm-offset-4">
                            <button class="btn btn-w-m btn-primary" type="submit" >完成</button>
                            <label class="col-sm-offset-1 control-label"><a href="#">想起密码了？</a></label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.authType').on('ifChecked', function(event){ //ifCreated 事件应该在插件初始化之前绑定
            var $selectedvalue = $(this).val();
            if ($selectedvalue == 1) {
                $("#emailType").removeClass("show").addClass("hidden");
                $("#mobileType").removeClass("hidden").addClass("show");
            }
            else {
                $("#emailType").removeClass("hidden").addClass("show");
                $("#mobileType").removeClass("show").addClass("hidden");
            }
        });

    });

    function getKey(obj){
        var current = 60;
        $(obj).attr('disabled','disabled');
        var val = $(obj).val(current+"秒后重新获取验证码");
        var interval = setInterval(function(){
            current--;
            if(current >= 0){
                $(obj).val(current+"秒后重新获取验证码");
            }else{
                $(obj).val("重新获取验证码").removeAttr('disabled');
                clearInterval(interval);
            }

        },1000);
    }
    function changeCode(){
        $("#verify_code").attr('src',"http://www.jdmenu.cn/index.php/web/yzm/verify_image?r="+Math.random());
    }
</script>