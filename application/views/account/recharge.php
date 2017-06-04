<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">账户充值</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Accont recharge</h3>
    </div>
</div>
<div class="wrapper feed-element">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <form method="post" class="form-horizontal" action="<?php echo site_url("admin/admin_mall/buy")?>" onsubmit="return check_submit();" >
                    <div class="form-group">
                        <label class="control-label col-md-1">选择类型</label>
                        <div class="col-md-6">
                            <?php
                                $num = 0;
                                foreach ($list as $row) {
                                    $num++;
                                    $v_id = $row['v_id'];
                                    $v_name = $row['v_name'];
                                    $v_desc = $row['v_desc'];
                                    $v_money = $row['v_money'];
                                    $v_month = $row['v_month'];
                                    $v_old_money = $row['v_old_money'];
                                    if ($num==1) {
                                        echo " <div class='radio i-checks radio-inline' style='margin-right:20px;'>
                                                <input type='radio' value='{$v_id}' name='vip_type' data-money='{$v_money}' checked>
                                                &nbsp;&nbsp;${v_name} 优惠现价：<strong style='color:red;'>{$v_money}元</strong>&nbsp;/&nbsp;<s>{$v_old_money}元</s>
                                                </div><br/>";
                                    } else {
                                        echo " <div class='radio i-checks radio-inline' style='margin-right:20px;'>
                                                <input type='radio' value='{$v_id}' name='vip_type' data-money='{$v_money}'>
                                                &nbsp;&nbsp;${v_name} 优惠现价：<strong style='color:red;'>{$v_money}元</strong>&nbsp;/&nbsp;<s>{$v_old_money}元</s>
                                                </div><br/>";
                                    }
                                }
                            ?>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label text-muted" style="font-weight:normal;color: #a0a0a0;">均按自然月计算</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1">输入数量</label>
                        <div class="col-md-3">
                            <input id="count" type="number" name="count" class="form-control" value="1" onchange="money_change();">
                            <br/><span id="count_1"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1">应付金额</label>
                        <div>
                            <label class="control-label text-danger col-md-1" style="font-weight:normal;text-align:left;" id="money"></label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <button class="btn btn-w-m btn-primary" type="submit">确认提交</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var price="<?php echo $list[0]['v_money']?>";
    $(document).ready(function(){
        money_change();
        $("input[type='radio']").on("ifChecked",function(event){
            var v_money = $(this).attr('data-money');
            price=v_money;
            money_change();
        });
    });

    function money_change(){
        var count=$("#count").val();
        var money=count*price;
        $("#money").text(money+"元");
    }
    function check_submit(){
        if($("#count").val()=="" || $("#count").val()<1){
            $("#count").focus();
            $("#count_1").html("请正确填写购买数量.");
            $("#count_1").css("color","red");
            return false;
        }else{
            $("#count_1").css("color","#999999");
            return true;
        }
    }
</script>