<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">参数配置</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Parameter
            configuration</h3>
    </div>
</div>
<div class="wrapper feed-element">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <form method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-1 control-label">商家名称</label>
                        <div class="col-md-6">
                            <input id="shopName" class="form-control" type="text" value="<?php echo $name5; ?>"
                                   placeholder="用于小票打印和与平板端店名显示"/>
                        </div>
                        <div class="col-md-4">
                            <label id="hintSpace" class="control-label text-muted"
                                   style="font-weight:normal;color: #a0a0a0;">还能输入<span id="shopHint"
                                                                                        class="text-danger">5</span>个字</label>
                        </div>
                    </div>
                    <!--
                    <div class="form-group">
                        <label class="col-sm-1 control-label">餐具费用</label>
                        <div class="col-md-2">
                            <input class="form-control" type="number" value="" placeholder="0.00"/>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label" style="font-weight:normal;">元/人</label>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label text-muted" style="font-weight:normal;color: #a0a0a0;">不填写则不收取</label>
                        </div>
                    </div>\
                    -->
                    <div class="form-group">
                        <label class="col-sm-1 control-label">联系方式</label>
                        <div class="col-md-6">
                            <input id="mobile" class="form-control" type="text" value="<?php echo $call_num; ?>"/>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label text-muted" style="font-weight:normal;color: #a0a0a0;">不设置则不打印联系方式</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">地址设置</label>
                        <div class="col-md-6">
                            <input id="address" class="form-control" type="text" value="<?php echo $call_address; ?>"/>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label text-muted"
                                   style="font-weight:normal;color: #a0a0a0;">不设置则不打印地址</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">其他信息</label>
                        <div class="col-md-6">
                            <textarea id="otherInfo" class="form-control"><?php echo $other; ?></textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label text-muted" style="font-weight:normal;color: #a0a0a0;">不设置则不打印其他信息</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">打印设置</label>
                        <div class="col-md-3">
                            <div class="radio i-checks radio-inline radio-item" style="margin-right: 20px;">
                                <input id="type58" type="radio" class="type" value="1" name="type"
                                       style="position: absolute; opacity: 0;">
                                &nbsp;&nbsp;58mm
                            </div>
                            <div class="radio i-checks radio-inline radio-item">
                                <input id="type80" type="radio" class="type" value="2" name="type"
                                       style="position: absolute; opacity: 0;">
                                &nbsp;&nbsp;80mm
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label class="control-label text-muted" style="font-weight:normal;"><a
                                        href="#" onclick="printTest()">测试打印</a></label>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label text-muted" style="font-weight:normal;"><a
                                        href="http://www.jdmenu.cn/help.html" target="_blank">打印机配置帮助手册</a></label>
                        </div>
                    </div>
                    <div class="form-group" style="margin-left: 15px;">
                        <button onclick="return submit_check()" class="btn btn-w-m btn-primary" type="button">确&nbsp;&nbsp;定</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-w-m btn-white" type="reset">重&nbsp;&nbsp;置</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

    //餐桌名字是否合法 默认不合法
    var shopNameIsLegal = false;

    $(document).ready(function () {

        //加载完成后显示商家名称还能输入多少字
        $('#shopHint').text(5 - $('#shopName').val().length);

        //设置打印机的类型
        var printfType = <?php echo $print_type?>;
        if (printfType === 1) {
            $('#type58').attr('checked', true)
        } else if (printfType === 2) {
            $('#type80').attr('checked', true)
        }

        //监听商家名称输入框，改变提示
        $('#shopName').on('input propertychange', function (e) {
            var count = $('#shopName').val().length;
            if (count > 5) {
                $('#hintSpace').text("商家名称在5个字以内!")
                $('#hintSpace').css('color', 'red');
                shopNameIsLegal = false;
                return;
            } else {
                $('#hintSpace').html('还能输入<span id="shopHint" class="text-danger">5</span>个字')
                $('#hintSpace').css('color', '#a0a0a0');
                $('#shopHint').text(5 - count)
                shopNameIsLegal = true;
            }

        });
    })
    function submit_check() {
//        餐具费  默认0
        var cutlery = 0;
//        5字点名
        var name5 = $('#shopName').val();
//        打印机规格
        var print_type = $("input[name='type']:checked").val();
//        发票抬头 默认店名
        var print_name = "<?php echo $shop_name;?>";
//        联系方式
        var call_num = $('#mobile').val();
//        联系地址
        var call_address = $('#address').val();
//        其他信息
        var other = $('#otherInfo').val();

        if ($('#shopName').val().length === 0) {
            $('#hintSpace').text("商家名称不能为空!")
            $('#hintSpace').css('color', 'red');
            return;
        }

        if(!shopNameIsLegal){
            return;
        }

        $.post("<?php echo site_url("admin/admin_sell/updataPrintParam")?>", {
            cutlery: cutlery,
            name5: name5,
            print_type: print_type,
            print_name: print_name,
            call_address: call_address,
            call_num: call_num,
            other: other
        }, function (e) {
            var dataJson = eval('(' + e + ')')
            alert(dataJson.msg);
        });
    }

    //重置输入框内容为最近保存的配置
    function reset(){

    }

    //测试打印
    function printTest(){
        var result = confirm('提交更新后测试打印哟！是否确认测试打印？');
        if(result){
            window.open("<?php echo site_url('admin/admin_print/print_test')?>");
        }
    }
</script>