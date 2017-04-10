<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">账户信息</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Accont information</h3>
    </div>
</div>
<div class="wrapper feed-element">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <form method="POST" class="form-horizontal" id="form">
                    <div class="form-group">
                        <label class="col-sm-1 control-label">企业注册号</label>
                        <div class="col-md-6">
                            <label class="control-label" style="font-weight:700;"><?php echo $user['reg_num']?></label>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label text-muted" style="font-weight:normal;color: #a0a0a0;">用于登录唯一号</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">企业全名</label>
                        <div class="col-md-6">
                            <i class="fa fa-edit pointer" onclick="edit(this);">&nbsp;&nbsp;</i>
                            <input id="shop_name" class="hidden form-control edit" name="shop_name" value="<?php echo $user['shop_name']?>" placeholder="未设置企业全名"/>
                            <label class="control-label" style="margin-bottom:18px;font-weight:normal;"><?php echo $user['shop_name'] ? $user['shop_name'] : '未设置企业全名'?></label>
                            <br/>
                            <span id="shop_name_1"></span>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label text-muted" style="font-weight:normal;color: #a0a0a0;">企业注册全称</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">账户到期</label>
                        <div class="col-md-6">
                            <label class="control-label" style="font-weight:normal;">
                                <?php echo $user['shop_date']?>&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="javascript:void(0);" onclick="setContentUrl('<?php echo site_url('admin/admin_mall')?>')">立即充值</a></span></label>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label text-muted" style="font-weight:normal;color: #a0a0a0;">为不影响正常营业，请提前充值</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">企业简介</label>
                        <div class="col-md-6">
                            <i class="fa fa-edit pointer" onclick="edit(this);">&nbsp;&nbsp;</i>
                            <textarea id="shop_desc" name="shop_desc" class="hidden form-control edit" autofocus rows="3" placeholder="未设置企业简介"><?php echo $user['shop_desc'] ?></textarea>
                            <label class="control-label" style="margin-bottom:18px;font-weight:normal;text-align:justify;">
                                <?php echo $user['shop_desc'] ? $user['shop_desc'] : '未设置企业简介'?>
                            </label>
                            <br/>
                            <span id="shop_desc_1"></span>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label text-muted" style="font-weight:normal;color: #a0a0a0;">请填写200字以内的简介</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">联系人</label>
                        <div class="col-md-6">
                            <i class="fa fa-edit pointer" onclick="edit(this);">&nbsp;&nbsp;</i>
                            <input id="shop_person" name="shop_person" class="hidden form-control edit" type="text" value="<?php echo $user['shop_person']?>" placeholder="未设置联系人"/>
                            <label class="control-label" style="margin-bottom:18px;font-weight:normal;"><?php echo $user['shop_person'] ? $user['shop_person'] : '未设置联系人' ?></label>
                            <br/>
                            <span id="shop_person_1"></span>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label text-muted" style="font-weight:normal;color: #a0a0a0;">请填写联系人姓名，以方便联系</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">联系电话</label>
                        <div class="col-md-6">
                            <i class="fa fa-edit pointer" onclick="edit(this);">&nbsp;&nbsp;</i>
                            <input id="shop_phone" name="shop_phone" class="hidden form-control edit" type="text" value="<?php echo $user['shop_phone']?>" placeholder="未设置联系电话"/>
                            <label class="control-label" style="margin-bottom:18px;font-weight:normal;"><?php echo $user['shop_phone'] ? $user['shop_phone'] : '未设置联系电话' ?></label>
                            <br/>
                            <span id="shop_phone_1"></span>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label text-muted" style="font-weight:normal;color: #a0a0a0;">请填写联系人电话，以方便联系</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">所在区域</label>
                        <div class="col-md-6">
                            <i class="fa fa-edit pointer" onclick="edit(this);">&nbsp;&nbsp;</i>
                            <section class="hidden edit">
                                <select id="province" name="province" class="form-control" style="width:30%;float:left;" onchange="link_city(this.value);">
                                    <option value="0">请选择省份</option>
                                    <?php foreach ($province as $p){?>
                                        <option value="<?php echo $p['code']?>" <?php if ($_SESSION['admin_user']['shop_qx_1']== $p['code']) {
                                            echo "selected";
                                        }?>><?php echo $p['name']?></option>
                                    <?php }?>
                                </select>
                                <select name="city" class="form-control" style="width:30%;float:left;" id="city_id" onchange="link_area(this.value);">
                                    <option value="0">请选择城市</option>
                                    <?php foreach ($city as $c){?>
                                        <option value="<?php echo $c['code']?>"<?php if ($_SESSION['admin_user']['shop_qx_2']== $c['code']) {
                                            echo "selected";
                                        }?>><?php echo $c['name']?></option>
                                    <?php }?>
                                </select>
                                <select name="area" class="form-control" style="width:30%;float:left;" id="area_id">
                                    <option value="0">请选择区县</option>
                                    <?php foreach ($area as $a){?>
                                        <option value="<?php echo $a['code']?>"<?php if ($_SESSION['admin_user']['shop_qx_3']== $a['code']) {
                                            echo "selected";
                                        }?>><?php echo $a['name']?></option>
                                    <?php }?>
                                </select>
                            </section>
                            <label class="control-label" style="margin-bottom:18px;font-weight:normal;"><?php echo $addr['p']?>&nbsp;<?php echo $addr['c']?>&nbsp;<?php echo $addr['a']?></label>
                            <br/>
                            <span id="area_id_1"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">具体地址</label>
                        <div class="col-md-6">
                            <i class="fa fa-edit pointer" onclick="edit(this);">&nbsp;&nbsp;</i>
                            <input id="shop_address" name="shop_address" class="hidden form-control edit" type="text" value="<?php echo $user['shop_address']?>" placeholder="未设置具体地址"/>
                            <label class="control-label" style="margin-bottom:18px;font-weight:normal;"><?php echo $user['shop_address']?$user['shop_address']:'未设置具体地址' ?></label>
                            <br/>
                            <span id="area_id_2"></span>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label text-muted" style="font-weight:normal;color: #a0a0a0;">请填写联系地址，以便联系</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">安全手机</label>
                        <div class="col-md-6">
                            <label class="control-label" style="font-weight:normal;color: #e84e40;">
                                <?php
                                if($user['shop_mobile']!=null){
                                    echo "".substr($user['shop_mobile'],0,3).'****'.substr($user['shop_mobile'],7,4);
                                    $href2=site_url('admin/admin_user/shop_phone_1?type=1');$a="修改";
                                }else{
                                    echo "未绑定手机号";$href2=site_url('admin/admin_user/shop_phone');
                                    $a="绑定";
                                }
                                ?>&nbsp;&nbsp;&nbsp;&nbsp;<span><a  href="javascript:void(0);" onclick="setContentUrl('<?php
                                    if($_SESSION['admin_user']['two']!=1 || ($_SESSION['admin_user']['two']==1 && $_SESSION['admin_user']['is_check']==1) ){
                                        echo site_url('admin/admin_phone/index');}
                                    else{
                                        echo site_url('admin/admin_two/show_two_1');
                                    }?>', false)"><?php echo $a?></a></span></label>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label text-muted" style="font-weight:normal;color: #e84e40;">用于密码修改，接收验证码等重要信息</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">安全邮箱</label>
                        <div class="col-md-6">
                            <label class="control-label" style="font-weight:normal;color: #e84e40;">
                                <?php
                                if(!$user['shop_email']){
                                    $href="/admin_email/set_email";echo "未绑定邮箱";
                                    $mailText = '绑定';
                                }else{
                                    $href="/admin_email/upd_email_show?type=2";
                                    $mail=substr($user['shop_email'],0,3).'****'.substr($user['shop_email'],
                                            strrpos($_SESSION['admin_user']['shop_email'],'@')) ;
                                    echo $mail;
                                    $mailText = '修改';
                                }
                                ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;<span><a  href="javascript:void(0);" onclick="setContentUrl('<?php
                                    if($_SESSION['admin_user']['two']!=1 || ($_SESSION['admin_user']['two']==1 && $_SESSION['admin_user']['is_check']==1) ){
                                        echo site_url('admin/admin_email/check_email');}
                                    else{
                                        echo site_url('admin/admin_two/show_two_1');
                                    }?>', false)"><?php echo $mailText?></a></span></label>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label text-muted" style="font-weight:normal;color: #e84e40;">用于密码修改，接收验证码等重要信息</label>
                        </div>
                    </div>
                    <div class="form-group hidden" id="options">
                            <div class="col-sm-2">
                            <button class="btn btn-w-m btn-primary" type="button" onclick="updateAction();">确&nbsp;&nbsp;定</button>
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-w-m btn-primary" type="button" onclick="cancel()">取&nbsp;&nbsp;消</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    isEdit = 0;
    function edit (obj){
        if($(obj).next().hasClass("hidden")){
            $(obj).hide();
            $(obj).next().removeClass("hidden").addClass("show").focus().val($(obj).next().val());
            $(obj).next().next().hide();
            isEdit++;
            if (isEdit == 1){
                $("#options").removeClass('hidden');
            }
        }
    }
    var city_list=<?php echo $city_list?>;
    var area_list=<?php echo $area_list?>;
    // 选择省份时联动城市
    function link_city(code) {
        var data=eval(city_list);
        $("#city_id").html("<option value='0'>请选择城市</option>");
        var num=0;
        $.each(data, function(i, item) {
            if(code==item.provincecode){
                $("#city_id").append("<option value='"+item.code+"'>"+item.name+"</option>");
                num++;
            }
        });
        if(num==0){
            $("#city_id").append("<option value='0' style='color:red;'>暂无数据！</option>");
        }
        $("#area_id").html("<option value='0'>请选择区县</option>");
    }
    // 选择城市时联动地区
    function link_area(code) {
        var data=eval(area_list);
        $("#area_id").html("<option value='0'>请选择区县</option>");
        var num=0;
        $.each(data, function(i, item) {
            if(code==item.citycode){
                $("#area_id").append("<option value='"+item.code+"'>"+item.name+"</option>");
                num++;
            }
        });
        if(num==0){
            $("#area_id").append("<option value='0' style='color:red;'>暂无数据！</option>");
        }
    }
    // 提交form数据
    function updateAction() {
        var isValid = check_submit();
        if (isValid != false) {
            setContentUrl('<?php echo site_url('admin/admin_user/update_user')?>', $('#form').serialize());
        }
    }
    // 检验提交数据
    function check_submit() {
        var num=0;
        var shop_name=$("#shop_name").val();
        var shop_person=$("#shop_person").val();
        var shop_phone=$("#shop_phone").val();
        var shop_desc=$("#shop_desc").val();
        var prvoince=$("#province").val();
        var city= $("#city_id").val();
        var area= $("#area_id").val();
        var reg = /^0?1[3|4|5|7|8][0-9]\d{8}$/;
        if(shop_name==''){
            $("#shop_name").focus();
            $("#shop_name_1").html("餐厅名称不能为空.");
            $("#shop_name_1").css("color","red");
            num++;
        }else if(shop_name.length>20){
            $("#shop_name").focus();
            $("#shop_name_1").html("餐厅名称不能超过20.");
            $("#shop_name_1").css("color","red");
            num++;
        }
        if(shop_desc.length > 200){
            $("#shop_desc").focus();
            $("#shop_desc_1").html("餐厅简介不能超过200.");
            $("#shop_desc_1").css("color","red");
            num++;
        }
        if(shop_person==''){
            $("#shop_preson").focus();
            $("#shop_person_1").html("联系人不能为空.");
            $("#shop_person_1").css("color","red");
            num++;
        }else if(shop_person.length>10){
            $("#shop_preson").focus();
            $("#shop_person_1").html("联系人名字不能超过10.");
            $("#shop_person_1").css("color","red");
            num++;
        }
        if (shop_phone == '') {
            $("#shop_phone").focus();
            $("#shop_phone_1").html("联系电话不能为空.");
            $("#shop_phone_1").css("color","red");
            num++;
        }else if(!reg.test(shop_phone)){
            $("#shop_phone").focus();
            $("#shop_phone_1").html("联系电话不正确.");
            $("#shop_phone_1").css("color","red");
            num++;
        }
        if(province==0||city==0||area==0){
            $("#area_id_1").text('区县不能为空').css("color","red");
            num++;
        }
        if($.trim($("#shop_address").val())==''){
            $("#area_id_2").text('具体地址不能为空').css("color","red");
            num++;
        }
        if(num>0){
            return false;
        }else{
            $(".btn_1").attr("disabled", "disabled");
        }
    }
    // 重置编辑数据
    function cancel() {
        setContentUrl('<?php echo site_url('admin/admin_user/user_info')?>')
    }
</script>