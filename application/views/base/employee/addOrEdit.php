<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;"><?php
                if (isset($waiter)){
                    echo "编辑员工";
                } else {
                    echo "添加工号";
                }
            ?></h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Add a work number</h3>
    </div>
</div>
<div class="wrapper feed-element">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <form method="POST" class="form-horizontal" id="form">
                    <input type="hidden" name="waiter_id" value="<?php echo isset($waiter['waiter_id']) ? $waiter['waiter_id'] : ""?>"/>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">员工编号</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="waiter_no" id="waiter_no" value="<?php echo isset($waiter['waiter_no']) ? $waiter['waiter_no'] : ""?>"/></br>
                            <span id="waiter_no_1"></span>
                        </div>
                        <label class="control-label" style="font-weight:normal;">&nbsp;<span class="text-danger">*</span>请输入编号</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">员工姓名</label>
                        <div class="col-md-6">
                            <input type="text" name="waiter_name" id="waiter_name" class="form-control" value="<?php echo isset($waiter['waiter_name']) ? $waiter['waiter_name'] : ""?>"/></br>
                            <span id="waiter_name_1"></span>
                        </div>
                        <label class="control-label" style="font-weight:normal;">&nbsp;请输入姓名</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">联系电话</label>
                        <div class="col-md-6">
                            <input  class="form-control" name="waiter_phone" id="waiter_phone" value="<?php echo isset($waiter['waiter_phone']) ? $waiter['waiter_phone'] : ""?>"/></br>
                            <span id="waiter_phone_1"></span>
                        </div>
                        <label class="control-label" style="font-weight:normal;">&nbsp;请输入常用手机号码</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">设置密码</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="waiter_pwd" id="waiter_pwd" value="<?php echo isset($waiter['waiter_pwd']) ? $waiter['waiter_pwd'] : ""?>"/></br>
                            <span id="waiter_pwd_1"></span>
                        </div>
                        <label class="control-label" style="font-weight:normal;">&nbsp;<span class="text-danger">*</span>请输入独立工号密码</label>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">是否启用</label>
                        <div class="col-md-6">
                            <div class="radio i-checks radio-inline" style="margin-right: 20px;">

                                <input type="radio" value="1" name="waiter_state" <?php if(!isset($waiter['waiter_state'])){echo 'checked';}else if($waiter['waiter_state'] == 1){echo 'checked';}?>>

                                &nbsp;&nbsp;立即启用

                            </div>
                            <div class="radio i-checks radio-inline">

                                <input type="radio" value="0" name="waiter_state" <?php if(isset($waiter['waiter_state'])&& $waiter['waiter_state'] == 0){echo 'checked';}?>>

                                &nbsp;&nbsp;暂不启用

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">权限设置</label>
                        <div class="col-md-9">

                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">

                                <input type="checkbox" value="1" name="waiter_jurisdiction[]" <?php if(isset($waiter['waiter_jurisdiction']) && in_array("1",$waiter['waiter_jurisdiction'])){echo 'checked';}?>>&nbsp;&nbsp;常用权限

                            </div>
                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">

                                <input type="checkbox" value="2" name="waiter_jurisdiction[]" <?php if(isset($waiter['waiter_jurisdiction']) && in_array("2",$waiter['waiter_jurisdiction'])){echo 'checked';}?>>

                                &nbsp;&nbsp;删除单品

                            </div>
                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">

                                <input type="checkbox" value="3" name="waiter_jurisdiction[]" <?php if(isset($waiter['waiter_jurisdiction']) && in_array("3",$waiter['waiter_jurisdiction'])){echo 'checked';}?>>

                                &nbsp;&nbsp;结账权限

                            </div>
                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">

                                <input type="checkbox" value="4" name="waiter_jurisdiction[]" <?php if(isset($waiter['waiter_jurisdiction']) && in_array("4",$waiter['waiter_jurisdiction'])){echo 'checked';}?>>

                                &nbsp;&nbsp;清桌权限

                            </div>
                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">

                                <input type="checkbox" value="5" name="waiter_jurisdiction[]" <?php if(isset($waiter['waiter_jurisdiction']) && in_array("5",$waiter['waiter_jurisdiction'])){echo 'checked';}?>>

                                &nbsp;&nbsp;营业统计

                            </div>
                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">

                                <input type="checkbox" value="6" name="waiter_jurisdiction[]" <?php if(isset($waiter['waiter_jurisdiction']) && in_array("6",$waiter['waiter_jurisdiction'])){echo 'checked';}?>>

                                &nbsp;&nbsp;前台权限

                            </div>
                            <ul style="margin: 10px 0;padding: 0;line-height: 2.5em;">
                                <li>常用权限---可进行“开桌、追单、换桌、变更人数、备注、清桌”操作；</li>
                                <li>删除单品---可删除未结账单品；</li>
                                <li>结账权限---可进行“结账”操作；</li>
                                <li>清桌权限---可进行“清桌”操作；</li>
                                <li>营业统计---开启后方可在APP端查看“营业统计”</li>
                                <li>前台权限---开启后方可使用前台，进行“结账、删除单品、清桌、备注、打印小票”等操作；</li>
                            </ul>
                        </div>
                    </div>
                </form>
                <div class="col-sm-2 m-t-sm"><button class="btn btn-w-m btn-primary" id="submit" type="button" onclick="submit();">保&nbsp;&nbsp;存</button></div>
                <div class="col-sm-2 m-t-sm"><button class="btn btn-w-m btn-primary" type="button" onclick="backUserList();">取&nbsp;&nbsp;消</button></div>
            </div>
        </div>
    </div>
</div>
<script>

    function backUserList () {
        var url = '<?php echo site_url("admin/admin_waiter/waiter_list") ?>';
        setContentUrl(url);
    }
    function submit () {
        var valid = check_submit();
        if (valid == false) {
            return false;
        }else {
            // 新增员工
            var formData = $('#form').serialize();
            var waiter_id = "<?php echo isset($waiter['waiter_id'])? $waiter['waiter_id'] : ""?>";
            var url = "<?php echo site_url("admin/admin_waiter/waiter_add");?>";
            if (waiter_id != "") {
                url = "<?php echo site_url("admin/admin_waiter/waiter_upd");?>";
            }
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                dataType: "json",
                success: function (data, status) {//如果调用php成功
                    if (!data){
                        alert('操作执行失败，请重试!');
                    } else if (data == -1) {
                        alert('员工编号已经存在，请重试!');
                    }else{
                        setContentUrl('<?php echo site_url('admin/admin_waiter/waiter_list')?>');
                    }
                }
            });
        }
    }

    function check_submit(){
        var err_num=0;
        if($("#waiter_no").val()==""){
            $("#waiter_no").focus();
            $("#waiter_no_1").html("员工编号不能为空.");
            $("#waiter_no_1").css("color","red");
            err_num++;
        }else{
            if($("#waiter_no").val().length>6){
                $("#waiter_no").focus();
                $("#waiter_no_1").html("员工编号请控制在6个字符以内.");
                $("#waiter_no_1").css("color","red");
                err_num++;
            }else{
                $("#type_name_1").css("color","#999999");
            }
        }
        if($("#waiter_name").val()==""){
            $("#waiter_name").focus();
            $("#waiter_name_1").html("员工姓名不能为空.");
            $("#waiter_name_1").css("color","red");
            err_num++;
        }else{
            if($("#waiter_name").val().length>6){
                $("#waiter_name").focus();
                $("#waiter_name_1").html("员工姓名请控制在6个字符以内.");
                $("#waiter_name_1").css("color","red");
                err_num++;
            }else{
                $("#type_name_1").css("color","#999999");
            }
        }
        if ($("#waiter_phone").val().trim() != "") {
            var reg = /^1[0-9]{10}$/;
            if (!reg.test($("#waiter_phone").val())){
                $("#waiter_pwd").focus();
                $("#waiter_phone_1").html("手机号码格式不正确");
                $("#waiter_phone_1").css("color","red");
                err_num++;
            }else {
                $("#waiter_phone_1").css("color","#999999");
            }
        }
        if ($("#waiter_pwd").val().trim() == "") {
            $("#waiter_pwd").focus();
            $("#waiter_pwd_1").html("密码不能为空");
            $("#waiter_pwd_1").css("color","red");
            err_num++;
        } else {
            $("#waiter_pwd_1").css("color","#999999");
        }
        if(err_num>0){
            return false;
        }
        $("#submit").attr("disabled", "disabled");
    }
</script>