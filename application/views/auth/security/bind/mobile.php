<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">修改手机</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Modify mobile phone</h3>
    </div>
</div>
<div class="wrapper feed-element">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <form action="#" method="post" class="form-horizontal">
                    <div class="form-group" style="margin-top:20px;">
                        <label class="col-sm-1 control-label">修改手机</label>
                        <div class="col-md-6">
                            <input type="text" id="shop_mobile" name="shop_mobile" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <span id="msg" class="help-block m-b-none"><span style="color:#e65445;">*</span>请输入新的安全手机号码</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label" style="text-align:right;">验证码</label>
                        <div class="col-sm-4">
                            <input id="input_yzm" type="text"  class="form-control">
                        </div>
                        <div class="col-sm-2">
                            <input type="button" class="btn btn-w-m btn-white" onclick="getKey(this);" value="获取验证码">
                        </div>
                        <div class="col-sm-4">
                            <span class="help-block m-b-none" style="clear:both;"><span style="color:#e65445;">*</span>注意查看手机拦截短信</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <button class="btn btn-w-m btn-primary" type="button" onclick="check_yzm()">完&nbsp;&nbsp;成</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var phone_number = "<?php echo $user['shop_mobile']?>"
    var is_ok = false;//是否验证成功
    var yzm = '';
    $("#shop_mobile").blur(function () {
        var input_phone = $("#shop_mobile").val()
        if(input_phone == ''){
            $("#msg").text('手机号码为空')
            $("#msg").css('color','red')
        }else if(phone_number == input_phone){
            $("#msg").text('新手机号码和原手机号码一样，请核实!')
            $("#msg").css('color','red')
        }else if(!(/^1[34578]\d{9}$/.test(input_phone))) {
            $("#msg").text('手机号码有误，请重填！')
            $("#msg").css('color','red')
        }else {
                $("#msg").html('<span style="color:#e65445;">*</span>请输入新的安全手机号码');
                $("#msg").css('color','#737373')
            is_ok = true;
        }
    });
    
    function getKey(obj){
        if(!is_ok){
            return;
        }
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
        
        var input_mobile=$("#shop_mobile").val();
            //异步传输获取验证码
        $.post('<?php echo site_url('admin/admin_phone/get_new_num')?>', {shop_mobile:input_mobile}, function (e) {
            if (e==-1){
                    alert('获取验证码失败，输入的新手机号码和原手机号码一样，请重新输入!');
            }else{
                yzm=e.replace(/(^\s*)|(\s*$)/g, "");;
                console.log(yzm)
            }
        });
    }
    function check_yzm() {
        var input_yzm = $("#input_yzm").val();
        if(input_yzm == ''){
            alert("请点击获取验证码！");
            return false;
        }else if(input_yzm != yzm){
            alert("验证码不正确，请重新输入！");
            return false;
        }
        submit();
        return true;
    }

    /**
     * 提交后台修改手机号码
     * 成功跳转个人信息页面，失败则提示
     */
    function submit() {
        var shop_mobile=$("#shop_mobile").val();
        $.post('<?php echo site_url('admin/admin_phone/upd_phone')?>', {shop_mobile:shop_mobile}, function (e) {
            if (e==-1){
                alert('操作执行失败，请重试!');
            }else{
                var url = e;
                setContentUrl(url)
            }
        });
    }
</script>

<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
