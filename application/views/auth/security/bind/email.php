<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">修改邮箱</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Modify mailbox</h3>
    </div>
</div>
<div class="wrapper feed-element">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <form method="get" class="form-horizontal">
                    <div class="form-group" style="margin-top:20px;">
                        <label class="col-sm-1 control-label">修改邮箱</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <span class="help-block m-b-none"><span style="color:#e65445;">*</span>请输入新的邮箱地址</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label" style="text-align:right;">验证码</label>
                        <div class="col-sm-4">
                            <input id="password" type="password" name="password" class="form-control">
                        </div>
                        <div class="col-sm-2">
                            <input type="button" class="btn btn-w-m btn-white" onclick="getKey(this);" value="获取验证码">
                        </div>
                        <div class="col-sm-4">
                            <span class="help-block m-b-none" style="clear:both;"><span style="color:#e65445;">*</span>注意查看邮箱拦截邮件</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <button class="btn btn-w-m btn-primary" type="submit">完&nbsp;&nbsp;成</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
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
</script>