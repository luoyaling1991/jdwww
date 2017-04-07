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
                <form method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-1 control-label">验证方式</label>
                        <div class="col-md-6">
                            <div class="radio i-checks radio-inline" style="margin-right: 20px;">

                                <input class="authType" type="radio" value="1" name="authType" style="position: absolute; opacity: 0;" checked>

                                &nbsp;&nbsp;手机验证

                            </div>
                            <div class="radio i-checks radio-inline">

                                <input class="authType" type="radio" value="2" name="authType" style="position: absolute; opacity: 0;">

                                &nbsp;&nbsp;邮箱验证

                            </div>
                        </div>
                    </div>
                    <div id="emailType" class="hidden">
                        <div class="form-group">
                            <label class="col-sm-1 control-label">安全邮箱</label>
                            <div class="col-md-6">
                                <input class="form-control"  id="shop_mail" type="text" value=""/>
                            </div>
                            <div class="col-md-4">
                                <span class="text-danger">*</span>
                                <label class="control-label" style="font-weight:normal;color:#a0a0a0">请输入安全邮箱地址</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">验证码</label>
                            <div class="col-md-4">
                                <input class="form-control" id="yzm_email" type="text" value=""/>
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
                                <input class="form-control"  id="shop_phone" type="text" value=""/>
                            </div>
                            <div class="col-md-4">
                                <span class="text-danger">*</span>
                                <label class="control-label" style="font-weight:normal;color:#a0a0a0">请输入原安全手机号码</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">验证码</label>
                            <div class="col-md-4">
                                <input class="form-control" id="yzm_phone" type="text" value=""/>
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
                            <button class="btn btn-w-m btn-primary" type="button" onclick="check_input()">下一步</button>
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
        var interval;
            var current = 60;
            $(obj).attr('disabled','disabled');
            var val = $(obj).val(current+"秒后重新获取验证码");
            interval = setInterval(function(){
                current--;
                if(current >= 0){
                    $(obj).val(current+"秒后重新获取验证码");
                }else{
                    $(obj).val("重新获取验证码").removeAttr('disabled');
                    clearInterval(interval);
                }

            },1000);
        get_code(interval,obj);
    }
    
    var yzm_phone = ''; //手机验证码验证码
    var yzm_email = '';//邮箱验证码
    var type = $("input[name='authType']:checked").val(); //验证类型
    function get_code(_interval,_obj){
        var shop_mobile = "<?php echo $user['shop_mobile']?>";
        var shop_email = "<?php echo $user['shop_email']?>";
        var input_phone = '';
        var input_email = '';

        type = $("input[name='authType']:checked").val();
        var data = '';
        if(type == 1){//手机验证
            input_phone = $("#shop_phone").val();
            if(shop_mobile != input_phone){
                clearInterval(_interval)
                $(_obj).val("重新获取验证码").removeAttr('disabled');
                alert("原始手机号码输入不正确，请重新输入!")
                return false;
            }
            data = input_phone;
        }else {//邮箱验证
            input_email = $("#shop_mail").val();
            if(shop_email==''){
                clearInterval(_interval)
                $(_obj).val("重新获取验证码").removeAttr('disabled');
                alert("您还没有绑定邮箱哟!");
                return false;
            }
            if (shop_email != input_email){
                clearInterval(_interval)
                $(_obj).val("重新获取验证码").removeAttr('disabled');
                alert("邮箱输入不正确，请重新输入!");
                return false;
            }
            data = input_email;
        }

        //异步传输获取验证码
        $.post('<?php echo site_url('admin/admin_pwd/get_num')?>', {data: data,type:type }, function (e) {
            if (e==-1){
                clearInterval(_interval)
                $(_obj).val("重新获取验证码").removeAttr('disabled');
                alert('获取验证码失败，输入的原邮箱地址不正确，请重新输入!');
            }
            else{
                console.log(e)
                if(type==1)
                    yzm_phone = e.replace(/[\r\n]/g,"");
                else
                    yzm_email = e.replace(/[\r\n]/g,"");
            }
        });
        
        return true;
    }

    /**
     * 验证输入是否为空
     * 不为空发送请求
     */
    function check_input() {
        type = $("input[name='authType']:checked").val();
        var input_data = '';
        var input_yzm = '';
        if(type==1){//手机号码验证身份
            input_data = $("#shop_phone").val();
            input_yzm = $("#yzm_phone").val();
        }else {
            input_data = $("#shop_mail").val();
            input_yzm = $("#yzm_email").val();
        }

        if (input_data==''){
            alert('安全手机或邮箱不能为空！')
            return;
        }
        
        if(input_yzm==''){
            alert('验证码为空！请获取验证码。')
            return;
        }
        
        if(type==1 && input_yzm != yzm_phone){
            alert('手机短信验证码错误！请从新获取。')
            return;
        }else if (type==2&&input_yzm!=yzm_email){
            alert('邮箱验证码错误！请从新获取。')
            return;
        }
        var type_identity = '<?php echo $_SESSION['type_identity'] ?>';
        //验证成功，跳转修改密码页面
        if(type_identity == 'authority_pwd'){//修改权限密码
            window.top.href = setContentUrl('<?php echo site_url("admin/admin_yz/upd_pwd_show") ?>');
        }else if(type_identity == 'login_pwd') {//修改登录密码
            window.top.href = setContentUrl('<?php echo site_url("admin/admin_pwd/upd_pwd_show") ?>');
        }else if(type_identity == 'authority_mobile'){
            window.top.href = setContentUrl('<?php echo site_url("admin/admin_phone/show_phone_view") ?>');
        }else if(type_identity == 'authority_email'){
            window.top.href = setContentUrl('<?php echo site_url("admin/admin_email/show_email_view") ?>');
        }
        
    }
    
    function changeCode(){
        $("#verify_code").attr('src',"http://www.jdmenu.cn/index.php/web/yzm/verify_image?r="+Math.random());
    }
</script>
