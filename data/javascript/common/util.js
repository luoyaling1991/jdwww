/**
 * Created by Administrator on 2017/3/24.
 */
Utils = (function($, window) {
    var getKeyTimer = function (_obj) {
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

})($, window);
