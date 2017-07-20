<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">销售详情</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Sales details</h3>
    </div>
</div>
<div class="wrapper feed-element">
    <div class="row m-t-sm">
        <div class="col-lg-12">
            <input placeholder="开始日期" class="laydate-icon form-control layer-date" id="start" value="<?php echo $date_1?>" name="date_1">&nbsp;
            <input placeholder="结束日期" class="laydate-icon form-control layer-date" id="end" value="<?php echo $date_2?>" name="date_2">&nbsp;
            <button class="btn btn-primary" type="button" style="margin-top:14px;" onclick="sousuo_sub()">搜索</button>
            <div data-toggle="buttons" class="btn-group" style="margin-top:14px;margin-left: 20px;">
                <label class="btn btn-sm btn-white active" name="date">
                    <input type="radio" id="option1" name="options" value="1">日</label>
                <label class="btn btn-sm btn-white" name="date">
                    <input type="radio" id="option2" name="options" value="2">周</label>
                <label class="btn btn-sm btn-white" name="date">
                    <input type="radio" id="option3" name="options" value="3">月</label>
            </div>
        </div>
    </div>
    <div class="ibox float-e-margins m-t">
        <div class="ibox-title">
            <ul class="nav nav-pills">
                <li style="margin-left: 32px;margin-top: 8px;margin-right: 10px;"><input type="checkbox" name="" class="i-checks" id="check_all">&nbsp;&nbsp;全选</li>
                <li style="margin-left:10px; "><button class="btn btn-white" type="button" onclick="batchDel();">批量删除</button>
                </li>
                <li style="margin-left:10px; "><button class="btn btn-white" type="button" onclick="exportData();">导出数据</button>
                </li>
            </ul>
        </div>
        <div class="ibox-content" style="background-color:#fff;padding-top:0px;">
            <div style="margin-bottom:10px;">
                <table class="table table-hover m-n">
                    <thead style="background: #e1e4eb;">
                    <tr>
                        <th>
                        </th>
                        <th>订单号</th>
                        <th>
                            <div style="float:left;">开桌时间</div>
                            <div style="margin-left:15px;float:left;">
                                <img onclick="sort_do('insert_time','asc')" src="<?php if($asc_name=="insert_time" && $asc_type=="asc"){echo constant('ADMIN_SRC')."media/img/s_1.png";}else{echo constant('ADMIN_SRC')."media/img/s.png";}?>" style="display:block;width:8px;cursor:pointer;"/>
                                <img onclick="sort_do('insert_time','desc')" src="<?php if($asc_name=="insert_time" && $asc_type=="desc"){echo constant('ADMIN_SRC')."media/img/xx_1.png";}else{echo constant('ADMIN_SRC')."media/img/xx.png";}?>" style="display:block;width:8px;cursor:pointer;"/>
                            </div>
                        </th>
                        <th>
                            <div style="float:left;">应收</div>
                            <div style="margin-left:15px;float:left;">
                                <img onclick="sort_do('order_2','asc')" src="<?php if($asc_name=="order_2" && $asc_type=="asc"){echo constant('ADMIN_SRC')."media/img/s_1.png";}else{echo constant('ADMIN_SRC')."media/img/s.png";}?>" style="display:block;width:8px;cursor:pointer;"/>
                                <img onclick="sort_do('order_2','desc')" src="<?php if($asc_name=="order_2" && $asc_type=="desc"){echo constant('ADMIN_SRC')."media/img/xx_1.png";}else{echo constant('ADMIN_SRC')."media/img/xx.png";}?>" style="display:block;width:8px;cursor:pointer;"/>
                            </div>
                        </th>
                        <th>
                            <div style="float:left;">实收</div>
                            <div style="margin-left:15px;float:left;">
                                <img onclick="sort_do('order_price','asc')" src="<?php if($asc_name=="order_price" && $asc_type=="asc"){echo constant('ADMIN_SRC')."media/img/s_1.png";}else{echo constant('ADMIN_SRC')."media/img/s.png";}?>" style="display:block;width:8px;cursor:pointer;"/>
                                <img onclick="sort_do('order_price','desc')" src="<?php if($asc_name=="order_price" && $asc_type=="desc"){echo constant('ADMIN_SRC')."media/img/xx_1.png";}else{echo constant('ADMIN_SRC')."media/img/xx.png";}?>" style="display:block;width:8px;cursor:pointer;"/>
                            </div>
                        </th>
                        <th>
                            <div style="float:left;">差价</div>
                            <div style="margin-left:15px;float:left;">
                                <img onclick="sort_do('order_1','asc')" src="<?php if($asc_name=="order_1" && $asc_type=="asc"){echo constant('ADMIN_SRC')."media/img/s_1.png";}else{echo constant('ADMIN_SRC')."media/img/s.png";}?>" style="display:block;width:8px;cursor:pointer;"/>
                                <img onclick="sort_do('order_1','desc')" src="<?php if($asc_name=="order_1" && $asc_type=="desc"){echo constant('ADMIN_SRC')."media/img/xx_1.png";}else{echo constant('ADMIN_SRC')."media/img/xx.png";}?>" style="display:block;width:8px;cursor:pointer;"/>
                            </div>
                        </th>
                        <th>详情</th>
                    </tr>
                    </thead>
                    <tbody id="tab_order_list">
                   <!-- <tfoot style="background: #ffde7d">
                    <th>共计</th>
                    <th>9999（单）</th>
                    <th>9999（份）</th>
                    <th>9999（元）</th>
                    <th>9999（元）</th>
                    <th>9999（元）</th>
                    <th></th>
                    </tfoot>-->
                </table>
            </div>
        </div>
    </div>
    <!--分页-->
    <div class="col-sm-12 m-t-sm">
        <div class="col-sm-6">
            <div class="dataTables_info" id="editable_info" role="alert" aria-live="polite" aria-relevant="all">显示&nbsp;<span id="start_no"><?php echo $count==0 ? 0 : $start_size+1 ?></span>&nbsp;到&nbsp;<span id="end_no"><?php echo $start_size + $page_size > $count ? $count : $start_size + $page_size ?></span>&nbsp;项，共&nbsp;<span id="order_count"><?php echo $count;?></span>&nbsp;份订单</div>
        </div>
        <div class="col-sm-6">
            <div class="dataTables_paginate paging_simple_numbers" id="editable_paginate">
                <ul class="pagination" id="pagination">
                    <li class="paginate_button previous disabled" aria-controls="editable" tabindex="0" id="editable_previous"><a href="javascript:flip_do(-1);">上一页</a></li>
                    <?php
                       for($i=1;$i<=$totalPage;$i++){
                            $href="javascript:flip_do(&quot;$i&quot;);";
                            if($i==$page){
                                echo "<li class='paginate_button active'><a href='javascript:void(0);'>$i</a></li>";
                            }else{
                                echo "<li class='paginate_button'><a href='$href'>$i</a></li>";
                            }

                       }
                    ?>
                    <li class="paginate_button next" aria-controls="editable" tabindex="0" id="editable_next"><a href="javascript:flip_do(0);">下一页</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    var order_list = eval(<?php echo $list;?>);
    console.log(order_list);
    var totalPage=parseInt(<?php echo $totalPage;?>);
    var page=parseInt(<?php echo $page;?>);
    orderArr = [];
    $(document).ready(function () {
        //日期范围限制
        var start = {
            elem: '#start',
            format: 'YYYY-MM-DD',
            min: '1970-01-01', //设定最小日期为当前日期
            max: laydate.now(), //最大日期
            istime: false,
            issure: true,
            istoday: true,
            start: laydate.now(),
            choose: function (datas) {
                end.min = datas; //开始日选好后，重置结束日的最小日期
                end.start = datas //将结束日的初始值设定为开始日
                $("#start").val(datas);
            }
        };
        var end = {
            elem: '#end',
            format: 'YYYY-MM-DD',
            min: '1970-01-01',
            max: laydate.now(),
            istime: false,
            issure: true,
            istoday: true,
            start: laydate.now(),
            choose: function (datas) {
                start.max = datas; //结束日选好后，重置开始日的最大日期
                $("#end").val(datas);
            }
        };
        laydate(start);
        laydate(end);
        check_date();
        show_order_list();
        parse_paginate();
        checkAll();
        checkOrders();
    });
    function parse_paginate(){
        if (totalPage ==1){
            $("#editable_previous").addClass("disabled");
            $("#editable_next").addClass("disabled");
        }else if(page <=1 ) {
            $("#editable_previous").addClass("disabled");
            $("#editable_next").removeClass("disabled");
        } else if (page>=totalPage) {
            $("#editable_next").addClass("disabled");
            $("#editable_previous").removeClass("disabled");
        }else{
            $("#editable_previous").removeClass("disabled");
            $("#editable_next").removeClass("disabled");
        }
    }
    function check_date(){
        $("label[name='date']").click(function(){
            $("label[name='date']").removeClass('active');
            $(this).addClass('active');
            var date_mode = $(this).find('input').eq(0).val();
            if (date_mode == 2){
                $("#start").val("<?php echo date("Y-m-d",strtotime("-6 day"));?>");
                $("#end").val("<?php echo date("Y-m-d",time());?>");
            } else if (date_mode == 3){
                $("#start").val("<?php echo date("Y-m-d",strtotime("last month"));?>");
                $("#end").val("<?php echo date("Y-m-d",time());?>");
            }else {
                $("#start").val("<?php echo date("Y-m-d",time());?>");
                $("#end").val("<?php echo date("Y-m-d",time());?>");
            }
        });
    }
    function show_order_list(){
        $("#tab_order_list").html("");
        var num=0;
        var money_sum_1=0;
        var money_sum_2=0;
        var money_sum_3=0;
        var count_sum=0;
        var order_list_str="";
        var waiter_logs_str = "";
        $.each (order_list,function(i,row){
            num++;
            var order_id=row['order_id'];
            var order_1=row['order_1'];//差价，折扣
            var order_no=row['order_no'];
            var order_2=row['order_2'];//应收
            var order_price=row['order_price'];//实收
            money_sum_1+=order_1;
            money_sum_2+=order_2;
            money_sum_3+=order_price;
            var order_by=row['order_by'];
            var order_desc=row['order_desc'];
            var waiter_logs = row['waiter_logs'];
            if(order_desc!=""){
                order_desc="<font color='green'>备注:</font>"+order_desc;
            }
            var insert_time=row['insert_time'];
            var main_log=row['main_log'];
            var sub_order=row['sub_order'];
            var num_str="";
            var main_log_str="";
            var sub_order_str="";
            var sub_order_detail_str="";
            var main_detail_log="";
            var total_num=0;
            var total_amount=0;
            $.each(main_log,function(i,main){
                num_str = i+1;
                total_num += Number(main['log_count']);
                if (i+1 > 10){
                    num_str = "0"+(i+1);
                }
                var sum_price = Number(main['log_price']) * Number(main['log_count']);
                if(main['log_type']<2){
                    count_sum+=main['log_count'];
                }
                main_log_str+='<tr class="gray-bg" name="order_'+order_id+'" style="display:none;">'+
                '<td></td>'+
                '<td></td>'+
                '<td>'+main['log_name']+'</td>'+
                '<td>'+main['log_price']+'&nbsp;元</td>'+
                '<td>'+main['log_count']+'</td>'+
                '<td>'+sum_price+'元</td>'+
                '<td></td>'+
                '</tr>';
                main_detail_log+='<tr>'+
                '<td>'+num_str+'</td>'+
                '<td>'+main['log_name']+'</td>'+
                '<td>'+main['log_price']+'&nbsp;元</td>'+
                '<td>'+main['log_count']+'</td>'+
                '<td>'+sum_price+'&nbsp;元</td>'+
                '</tr>'+
                '<tr>';
                total_amount += sum_price;
            });
            $.each (sub_order,function(i,order){
                var sub_log_str="";
                var detail_log_str="";
                var log_list = order['log_list'];
                var sub_order_no = order['order']['order_no'];
                var sub_insert_time = order['order']['insert_time'];
                sub_order_str += '<tr class="checkDetail" name="order_'+order_id+'" style="display:none;">'+
                                    '<td>'+
                                    /*'<div class="checkbox i-checks m-n">'+
                                    '<label class="">'+
                                    '<input type="checkbox" value=""  style="position: absolute; opacity: 0;">'+
                                    '<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>'+
                                    '</label>'+
                                    '</div>'+*/
                                    '</td>'+
                                    '<td>'+sub_order_no+'</td>'+
                                    '<td>'+sub_insert_time+'</td>'+
                                    '</tr>';
                sub_order_detail_str += '<tr class="checkDetail">'+
                '<td>'+sub_order_no+'</td>'+
                '<td colspan="5">'+sub_insert_time+'</td>'+
                '</tr>';
                var sub_num = 0;
                $.each(log_list,function(i,one){
                    num_str = i+1;
                    total_num += Number(one['log_count']);
                        sub_num++;
                    if (i+1 > 10){
                        num_str = "0"+(i+1);
                    }
                    var sum_price = Number(one['log_price']) * Number(one['log_count']);
                    if(one['log_type']<2){
                        count_sum+=one['log_count'];
                    }
                    sub_log_str+='<tr class="gray-bg" name="order_'+order_id+'" style="display:none;">'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td>'+one['log_name']+'</td>'+
                    '<td>'+one['log_price']+'&nbsp;元</td>'+
                    '<td>'+one['log_count']+'</td>'+
                    '<td>'+sum_price+'元</td>'+
                    '<td></td>'+
                    '</tr>';
                    detail_log_str+='<tr>'+
                    '<td>'+num_str+'</td>'+
                    '<td>'+one['log_name']+'</td>'+
                    '<td>'+one['log_price']+'&nbsp;元</td>'+
                    '<td>'+one['log_count']+'</td>'+
                    '<td>'+sum_price+'&nbsp;元</td>'+
                    '</tr>'+
                    '<tr>';
                    total_amount += sum_price;

                });
                if (sub_num == 0){
                    sub_order_str += "<tr><td></td><td></td><td colspan='6' style='font-weight:bold;color:#F00;'>没有找到您想要的数据.</td></tr>";
                    sub_order_detail_str += "<tr><td></td><td></td><td colspan='6' style='font-weight:bold;color:#F00;'>没有找到您想要的数据.</td></tr>";
                }
                sub_order_str += sub_log_str;
                sub_order_detail_str += detail_log_str;

            });
            main_log_str += sub_order_str;
            main_detail_log += sub_order_detail_str;
            var href_1="<?php echo site_url('admin/admin_print/print_two_do_1?order_id=') ?>"+order_id;
            var href_2="<?php echo site_url('admin/admin_sell/del_order?order_id=')?>"+order_id;
            var img_1="<?php echo constant('ADMIN_SRC')."media/img/btn_dy.png";?>";
            var img_2="<?php echo constant('ADMIN_SRC')."media/img/btn_del.png";?>";
            order_list_str += '<tr class="checkDetail">'+
                        '<td>'+
                        '<div class="checkbox i-checks m-n">'+
                        '<label class="">'+
                        '<input type="checkbox" name="input" value="'+order_id+'"  style="position: absolute; opacity: 0;">'+
                        '<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>'+
                        '</label>'+
                        '</div>'+
                        '</td>'+
                        '<td onclick="showOrder('+order_id+');"><a>'+order_no+'</a></td>'+
                        '<td>'+insert_time+'</td>'+
                        '<td>'+row['order_2']+'&nbsp;元</td>'+
                        '<td>'+row['order_price']+'&nbsp;元</td>'+
                        '<td>'+row['order_1']+'&nbsp;元</td>'+
                        '<td data-toggle="modal" data-target="#order_info_'+order_id+'" style="cursor: pointer;color: #3376df;">查看'+
                        '</td>'+
                        '</tr>'+
                        '<tr class="gray-bg" name="order_'+order_id+'" style="display:none;">'+
                        '<td></td>'+
                        '<td></td>'+
                        '<th>单品名称</th>'+
                        '<th>单价</th>'+
                        '<th>数量</th>'+
                        '<th>合计</th>'+
                        '<th></th>'+
                        '</tr>'+main_log_str;
            $.each(waiter_logs,function(index,value) {
                waiter_logs_str +="<div class='do-time'>" +
                "<h4>"+value['i_time']+"<br>工号"+value['waiter_no']+"</h4>" +
                "<div class='do-detail'>" +
                "<div class='do-part'>" +
                    /* "<h5>创建订单</h5>" +*/
                " <p>"+value['log_desc']+"</p>" +
                "</div>";
            });
            $("#wrapper").append('<div class="modal inmodal" id="order_info_'+order_id+'" tabindex="-1" role="dialog"  aria-hidden="true" data-dismiss="modal">'+
            '<div class="modal-dialog" style="width: 1000px;">'+
            '<div class="modal-content animated fadeIn" style="float: left;width: 600px;height: 660px;">'+
            '<div class="modal-header ing" style="padding: 15px;">'+
            '<h4 class="text-danger" style="font-size: 20px;text-align: left;">201633214111212<span style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;22:22:22（满汉全席6人）</span></h4>'+
            '</div>'+
            '<div class="modal-body">'+
            '<div class="ibox-content">'+
            '<table class="table table-striped">'+
            '<thead>'+
            '<tr>'+
            '<th>ID</th>'+
            '<th>菜品</th>'+
            '<th>单价</th>'+
            '<th>数量</th>'+
            '<th>总价</th>'+
            '</tr>'+
            '</thead>'+
            '<tbody>'+
            main_detail_log+
            '</tbody>'+
            '<tfoot class="ing">'+
            '<tr>'+
            '<th>共计：</th>'+
            '<th></th>'+
            '<th></th>'+
            '<th><span class="text-danger">'+total_num+'</span>&nbsp;份</th>'+
            '<th><span class="text-danger">'+total_amount+'</span>&nbsp;元</th>'+
            '<th></th>'+
            '</tr>'+
            '</tfoot>'+
            '</table>'+
            '</div>'+
            '</div>'+
            '<div class="modal-footer">'+
            '<button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>'+
            '</div>'+
            '</div>'+
            '<div class="modal-content animated fadeIn" style="float: right;width: 400px;height: 660px;">'+
            '<div class="modal-header" style="padding: 15px;">'+
            '<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'+
            '<h4 style="font-size: 20px;text-align: left;">操作记录</h4>'+
            '</div>'+
            '<div class="modal-body" style="background: #fff;">'+
            waiter_logs_str+
            '</div>'+
            '</div>'+
            '</div>'+
            '</div>'+
            '</div>');
        });
        if(num==0){
            order_list_str = "<tr><td colspan='8' style='font-weight:bold;color:#F00;'>没有找到您想要的数据.</td></tr>";
        }
        $("#tab_order_list").html(order_list_str);
    }
    function sousuo_sub(){
        var start = $("#start").val();
        var end = $("#end").val();
        var queryData = {
            date_1:start,
            date_2:end
        };
        setContentUrl("<?php echo site_url("admin/admin_sell/index_3")?>",queryData);
        /*$.ajax({
            url:"<?php echo site_url("admin/admin_sell/index_3_get")?>",
            type:'POST',
            dataType:'json',
            data:queryData,
            success:function(data){
                order_list = data['list'];
                show_order_list();
                $("#order_count").text(data['count']);
                $("#start_no").text(data['count'] == 0 ? 0 : (data['page'] -1)*data['page_size']+1);
                $("#end_no").text(data['page']*data['page_size'] > data['count'] ? data['count'] : data['page']*data['page_size']);
            }
        });*/
    }
    function flip_do(page_no){
        page_no=parseInt(page_no);
        if(page_no==-1){
            //上一页
            if(page>1){
                page_no=page-1;
            }else{
                page_no=1;
            }
        }else if(page_no==0){
            //下一页
            if(page<totalPage){
                page_no=page+1;
            }else{
                page_no=totalPage;
            }
        }
        var queryData = {
            page_no: page_no,
            date_1:"<?php echo $date_1?>",
            date_2:"<?php echo $date_2?>",
            asc_name:"<?php echo $asc_name?>",
            asc_type:"<?php echo $asc_type?>"

        }
        setContentUrl("<?php echo site_url('admin/admin_sell/index_3');?>",queryData);
    }
    function showOrder(order_id) {
        if ($("tr[name='order_"+order_id+"']").is(":visible")){
            $("tr[name='order_"+order_id+"']").hide();
        } else {
            $("tr[name='order_"+order_id+"']").show();
        }
    }
    function checkAll(){
        $('#check_all').on('ifChecked ifUnchecked', function(event) {
            if (event.type == 'ifChecked') {
                $("input[name='input']").iCheck('check');
            } else {
                $("input[name='input']").iCheck('uncheck');
            }
        })
    }
    function checkOrders(){
        $("input[name='input']").on('ifChanged', function (event) {
            var order_id = $(this).val();
            if ($(this).is(':checked')) {
                orderArr.push(order_id);
            } else {
                var index = $.inArray(order_id,orderArr);
                orderArr.splice(index,1);
            }
        })
    }
    function batchDel(){
        if(!confirm("确定要执行批量删除吗？")){
            return false;
        }
        var start = $("#start").val();
        var end = $("#end").val();
        var queryData = {
            order_id: orderArr,
            batch_value: -1,
            date_1:start,
            date_2:end
        };
        setContentUrl("<?php echo site_url("admin/admin_sell/batch_3");?>",queryData);
    }
    function sort_do(asc_name,asc_type){
        var start = $("#start").val();
        var end = $("#end").val();
        setContentUrl("<?php echo site_url('admin/admin_sell/index_3_get?asc_name=');?>"+asc_name+"&asc_type="+asc_type+"&date_1="+start+"&date_2="+end);

    }
    function exportData(){
        var start = $("#start").val();
        var end = $("#end").val();
        var queryData = {
            order_id: orderArr,
            batch_value: 3,
            date_1:start,
            date_2:end
        };
        $.ajax({
            url:"<?php echo site_url("admin/admin_sell/batch_3");?>",
            type:'POST',
            dataType:'json',
            data:queryData,
            success:function(data){
            }
        });

    }
</script>