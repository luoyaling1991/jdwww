<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">添加工号</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Add a work number</h3>
    </div>
</div>
<div class="wrapper feed-element">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <form method="get" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-1 control-label">员工编号</label>
                        <div class="col-md-6">
                            <input id="waiterId" name="waiterId" class="form-control" type="text" value=""/>
                        </div>
                        <label class="control-label" style="font-weight:normal;" id="idWarn">&nbsp;<span
                                    class="text-danger">*</span>请输入编号</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">员工姓名</label>
                        <div class="col-md-6">
                            <input type="text" id="waiterName" name="waiterName" class="form-control"></input>
                        </div>
                        <label class="control-label" style="font-weight:normal;" id="nameWarn">&nbsp;请输入姓名</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">联系电话</label>
                        <div class="col-md-6">
                            <input class="form-control" id="waiterPhone" name="waiterPhone"/>
                        </div>
                        <label class="control-label" style="font-weight:normal;" id="phoneWarn">&nbsp;请输入常用手机号码</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">设置密码</label>
                        <div class="col-md-6">
                            <input id="waiterPwd" name="waiterPwd" type="password" class="form-control"/>
                        </div>
                        <label class="control-label" style="font-weight:normal;" id="pwdWarn">&nbsp;<span
                                    class="text-danger">*</span>请输入独立工号密码</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">权限设置</label>
                        <div class="col-md-9">

                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">

                                <input type="checkbox" value="1" name="auth">&nbsp;&nbsp;常用权限

                            </div>
                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">

                                <input type="checkbox" value="2" name="auth">

                                &nbsp;&nbsp;删除单品

                            </div>
                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">

                                <input type="checkbox" value="3" name="auth">

                                &nbsp;&nbsp;结账权限

                            </div>
                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">

                                <input type="checkbox" value="4" name="auth">

                                &nbsp;&nbsp;清桌权限

                            </div>
                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">

                                <input type="checkbox" value="6" name="auth">

                                &nbsp;&nbsp;吧台权限

                            </div>
                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">

                                <input type="checkbox" value="5" name="auth">

                                &nbsp;&nbsp;营业统计

                            </div>
                            <ul style="margin: 10px 0;padding: 0;line-height: 2.5em;">
                                <li>常用权限---可进行“开桌、追单、换桌、变更人数、备注、清桌”操作；</li>
                                <li>删除单品---可删除未结账单品；</li>
                                <li>结账权限---可进行“结账”操作；</li>
                                <li>清桌权限---可进行“清桌”操作；</li>
                                <li>吧台权限---开启后方可使用吧台，进行“结账、删除单品、清桌、备注、打印小票”等操作；</li>
                                <li>营业统计---开启后方可在APP端查看“营业统计”</li>
                            </ul>
                        </div>
                    </div>
                </form>
                <div class="col-sm-12 m-t-sm">
                    <button id="saveWaiter" class="btn btn-w-m btn-primary" type="button">保&nbsp;&nbsp;存</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    /**
     * 获得连接后面的参数
     */
    function GetQueryString(_name) {
        var reg = new RegExp("(^|&)" + _name + "=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if (r != null)
            return unescape(r[2]);
        return null;
    }

    $(document).ready(function () {
        console.log(GetQueryString(waiterId))
    })


    $("#saveWaiter").on("click", function () {
        var waiterId = $("#waiterId").val();            //员工编号
        var waiterName = $("#waiterName").val();        //员工姓名
        var waiterPhone = $("#waiterPhone").val();      //员工联系方式
        var waiterPwd = $("#waiterPwd").val();          //员工登录密码
        var authArr = [];                               //权限数组
        var auth = $("input[name='auth']:checked").each(function () {
            authArr.push($(this).val())
        })

        saveWaiter(waiterId, waiterName, waiterPhone, waiterPwd, authArr.toString())
    });

    /**
     * 保存添加的员工
     * @param _waiterId
     * @param _waiterName
     * @param _waiterPhone
     * @param _waiterPwd
     * @param _authStr
     */
    function saveWaiter(_waiterId, _waiterName, _waiterPhone, _waiterPwd, _authStr) {

        if ($.trim(_waiterId) == "") {
            $("#idWarn").css('color', 'red')
            $("#idWarn").text("员工编号不为空")
            $("#waiterId").focus()
            $("#waiterId").val('')
            return;
        }
        if ($.trim(_waiterName) == "") {
            $("#nameWarn").css('color', 'red')
            $("#nameWarn").text("员工姓名不为空")
            $("#waiterName").focus()
            $("#waiterName").val('')
            return;
        }

        console.log($.trim(_waiterPhone) == "" || $.trim(_waiterPhone).length < 11)

        if ($.trim(_waiterPhone) == "" || $.trim(_waiterPhone).length < 11) {
            $("#phoneWarn").css('color', 'red')
            $("#phoneWarn").text("员工联系电话不为空或号码格式不正确")
            $("#waiterPhone").focus()
            return;
        }
        if ($.trim(_waiterPwd) == "") {
            $("#pwdWarn").css('color', 'red')
            $("#pwdWarn").text("员工密码不为空")
            $("#waiterPwd").focus()
            $("#waiterPwd").val('')
            return;
        }


        $.post("<?php echo site_url("admin/admin_waiter/waiter_add");?>",
            {
                waiter_name: _waiterId,
                waiter_no: _waiterName,
                waiter_phone: _waiterPhone,
                waiter_pwd: _waiterPwd,
                waiter_jurisdiction: _authStr
            }
            , function (e) {
                var json = eval('(' + e + ')')
                if (json.state === 1) {
                    console.log(json.msg)
                    setContentUrl('<?php echo site_url("/")?>' + json.msg)
                } else {
                    console.log(json.msg)
                }
            })
    }

</script>