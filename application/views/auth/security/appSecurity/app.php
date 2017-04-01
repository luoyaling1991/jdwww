<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">APP密码</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">APP password</h3>
    </div>
</div>
<div class="wrapper feed-element">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <form action="<?php echo site_url('admin/admin_user/update_shop_pwd')?>" onsubmit ="return check_submit()" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-1 control-label">APP登录ID</label>
                        <div class="col-sm-6">
<!--                            <p class="form-control-static">123123123123123123</p>-->
                            <p class="form-control-static"><?php echo $_SESSION['admin_user']['reg_num']?></p>
                        </div>
                        <div class="col-sm-4">
                            <p class="form-control-static" style="color: #a0a0a0;">统一登录ID，不可修改</p>
                        </div>
                    </div>
                    <div class="form-group">

                        <label class="col-sm-1 control-label">新密码</label>
                        <div class="col-sm-6">
                            <input name="pad_pwd" id="pad_pwd" type="password" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <span id="new_pwd_msg" class="help-block m-b-none" style="color: #a0a0a0;">请至少输入<span style="color:#e65445;">6</span>位数密码，区分大小写</span>
                        </div>

                    </div>
                    <div class="form-group">

                        <label class="col-sm-1 control-label">再次输入</label>
                        <div class="col-sm-6">
                            <input name="re_pad_pwd" id="re_pad_pwd" type="password" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <span id="re_pwd_msg" class="help-block m-b-none" style="color: #a0a0a0;">请再次输入相同密码以验证正确性</span>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                            <button class="btn btn-w-m btn-primary" type="submit">完&nbsp;&nbsp;成</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="application/javascript">
    
    $("#pad_pwd").blur(function () {
        if ($("#pad_pwd").val().length<6){
            $("#new_pwd_msg").text('至少输入6位密码')
            $("#new_pwd_msg").css('color','red')
        }else {
            $("#new_pwd_msg").html('请至少输入<span style="color:#e65445;">6</span>位数密码，区分大小写')
            $("#new_pwd_msg").css('color','#a0a0a0')
        }
    });

    $("#re_pad_pwd").blur(function () {
        if ($("#re_pad_pwd").val() != $("#pad_pwd").val()){
            $("#re_pwd_msg").text('两次密码不正确')
            $("#re_pwd_msg").css('color','red')
        }else {
            $("#re_pwd_msg").text('请再次输入相同密码以验证正确性')
            $("#re_pwd_msg").css('color','#a0a0a0')
        }
    });
    
    function check_submit() {
        if($("#pad_pwd").val().length<6){
            return false;
        }
        if($("#pad_pwd").val()!=$("#pad_pwd").val()){
            return false;
        }
        
        return true;
    }
</script> 