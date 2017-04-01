<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">修改权限密码</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Modify permission password</h3>
    </div>

</div>
<div class="wrapper feed-element">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <form method="post" action="<?php echo site_url("admin/admin_yz/upd_pwd")?>" class="form-horizontal" onsubmit="check_pwd()">
                    <div class="form-group">
                        <label class="col-sm-1 control-label">新密码</label>
                        <div class="col-sm-6">
                            <input type="password" id="shop_pwd_1" name="shop_pwd_1" class="form-control"/>
                        </div>
                        <div class="col-sm-4">
                            <span class="help-block m-b-none" id="shop_pwd_1_1" style="color: #a0a0a0"><span style="color:#e65445;">*</span>请至少输入<span style="color:#e65445;">6</span>位数密码，区分大小写</span>
                        </div>

                    </div>
                    <div class="form-group">

                        <label class="col-sm-1 control-label">再次输入</label>
                        <div class="col-sm-6">
                            <input type="password"  id="shop_pwd_2" name="shop_pwd_2" class="form-control"/>
                        </div>
                        <div class="col-sm-4">
                            <span id="shop_pwd_2_1" class="help-block m-b-none" style="color: #a0a0a0"><span style="color:#e65445;">*</span>请再次输入相同密码以验证正确性</span>
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
    jQuery(document).ready(function() {
//        App.init();
//        FormSamples.init();
    });
    function check_pwd(){
        if($("#shop_pwd_1").val().length <6){
            $("#shop_pwd_1").focus();
            $("#shop_pwd_1_1").html("新密码至少为6位.");
            $("#shop_pwd_1_1").css("color","red");
            return false;
        }else{
            $("#shop_pwd_1_1").css("color","#999999");
            if($("#shop_pwd_1").val()!=$("#shop_pwd_2").val()){
                $("#shop_pwd_2").focus();
                $("#shop_pwd_2_1").html("两次密码输入不一致.");
                $("#shop_pwd_2_1").css("color","red");
                return false;
            }else{
                $("#shop_pwd_2_1").css("color","#999999");
                return true;
            }
        }
    }
</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
