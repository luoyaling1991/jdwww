<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">热销查询</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Hot inquiry</h3>
    </div>
</div>
<div class="wrapper animated" style="height:80px;">
    <form method="post" id="form">
        <div class="form-group" style="margin-top:15px;">
            <label class="control-label">筛选：</label>
            <label class="checkbox-inline">
                <input type="checkbox" class="i-checks" name="sys_type[]" value="0">&nbsp;&nbsp;全部</label>
            <label class="checkbox-inline">
                <input type="checkbox" class="i-checks" name="sys_type[]" value="-1">&nbsp;&nbsp;套餐</label>
            <label class="checkbox-inline">
                <input type="checkbox" class="i-checks" name="sys_type[]" value="1">&nbsp;&nbsp;菜品</label>
            <label class="checkbox-inline">
                <input type="checkbox" class="i-checks" name="sys_type[]" value="2">&nbsp;&nbsp;汤类</label>
            <label class="checkbox-inline">
                <input type="checkbox" class="i-checks" name="sys_type[]" value="3">&nbsp;&nbsp;小吃</label>
            <label class="checkbox-inline">
                <input type="checkbox" class="i-checks" name="sys_type[]" value="4">&nbsp;&nbsp;酒水</label>
            <label class="checkbox-inline">
                <input type="checkbox" class="i-checks" name="sys_type[]" value="5">&nbsp;&nbsp;其他</label>
        </div>
        <div class="m-b-xs" style="float:right;">
            <div data-toggle="buttons" class="btn-group">
                <label class="btn btn-sm btn-white active" name="date">
                    <input type="radio" id="option1" name="options" value="1">日</label>
                <label class="btn btn-sm btn-white" name="date">
                    <input type="radio" id="option2" name="options" value="2">周</label>
                <label class="btn btn-sm btn-white" name="date">
                    <input type="radio" id="option3" name="options" value="3">月</label>
            </div>
        </div>
        <button type="button" class="btn btn-primary" style="float:right;margin-right:20px;line-height:18px;" onclick="search();">搜索</button>
        <div style="width:500px;float:right;">
            <input placeholder="开始日期" class="laydate-icon form-control layer-date" id="start" name="date_1" value="<?php echo date("Y-m-d",time());?>">&nbsp;
            <input placeholder="结束日期" class="laydate-icon form-control layer-date" id="end" name="date_2"value="<?php echo date("Y-m-d",time());?>">&nbsp;
        </div>
    </form>
</div>
<div class="wrapper wrapper-content animated">
    <div class="col-lg-12" >
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <table class="table table-striped table-hover dataTables-example">
                    <thead style="background: #e1e4eb;">
                    <tr>
                        <th>销量排名</th>
                        <th>菜品</th>
                        <th>
                            <div style="float:left;">销量</div>
                            <div style="margin-left:15px;float:left;">
                                <img onclick="sort_do('dish_count','asc')" src="<?php if($asc_name=='dish_count'&&$asc_type=='asc'){echo constant('ADMIN_SRC')."/media/img/s_1.png";}else{echo constant('ADMIN_SRC')."/media/img/s.png";}?>" style="display:block;width:8px;cursor:pointer;">
                                <img onclick="sort_do('dish_count','desc')" src="<?php if($asc_name=='dish_count'&&$asc_type=='desc'){echo constant('ADMIN_SRC')."/media/img/xx_1.png";}else{echo constant('ADMIN_SRC')."/media/img/xx.png";}?>" style="display:block;width:8px;cursor:pointer;">
                            </div>
                        </th>
                        <th>单价</th>
                        <th>
                            <div style="float:left;">总价</div>
                            <div style="margin-left:15px;float:left;">
                                <img onclick="sort_do('sum','asc')" src="<?php if($asc_name=='sum'&&$asc_type=='asc'){echo constant('ADMIN_SRC')."/media/img/s_1.png";}else{echo constant('ADMIN_SRC')."/media/img/s.png";}?>" style="display:block;width:8px;cursor:pointer;">
                                <img onclick="sort_do('sum','desc')" src="<?php if($asc_name=='sum'&&$asc_type=='desc'){echo constant('ADMIN_SRC')."/media/img/xx_1.png";}else{echo constant('ADMIN_SRC')."/media/img/xx.png";}?>" style="display:block;width:8px;cursor:pointer;">
                            </div>
                        </th>
                        <th>状态</th>
                        <th>发布时间</th>
                    </tr>
                    </thead>
                    <tbody id="show_hot_list">

                    </tbody>
                    <tfoot style="background: #ffde7d;">
                    <tr>
                        <th>共计</th>
                        <th></th>
                        <th id="count"></th>
                        <th></th>
                        <th id="sum"></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!--<div class="col-sm-12 m-t-sm">-->
<!--    <div class="col-sm-6">-->
<!--        <div class="dataTables_info" id="editable_info" role="alert" aria-live="polite" aria-relevant="all">显示 1 到 10 项，共 57 菜品</div>-->
<!--    </div>-->
<!--    <div class="col-sm-6">-->
<!--        <div class="dataTables_paginate paging_simple_numbers" id="editable_paginate">-->
<!--            <ul class="pagination">-->
<!--                <li class="paginate_button previous disabled" aria-controls="editable" tabindex="0" id="editable_previous"><a href="#">上一页</a></li>-->
<!--                <li class="paginate_button active" aria-controls="editable" tabindex="0"><a href="#">1</a></li>-->
<!--                <li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">2</a></li>-->
<!--                <li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">3</a></li>-->
<!--                <li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">4</a></li>-->
<!--                <li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">5</a></li>-->
<!--                <li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">6</a></li>-->
<!--                <li class="paginate_button next" aria-controls="editable" tabindex="0" id="editable_next"><a href="#">下一页</a></li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<div style="clear:both"></div>
<script>
    var list=eval(<?php echo $list;?>);
    var count=<?php echo $count;?>;
    var sum=<?php echo $sum;?>;
    // Page-Level Scripts
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
        show_hot_list();
        show_total();
    });
    function show_total(){
        $("#count").text(count+'份');
        $("#sum").text(sum+'元');
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
    function show_hot_list(){
        $("#show_hot_list").html("");
        var show_hot_list_str="";
        var num=0;
        $.each(list, function(i, item) {
            num++;
            var id="";
            if(item.type==0){
                id="0_"+item.dish_id;
            }else{
                id="1_"+item.dish_id;
            }
            var state="<font color='#F00'>未上架</font>";;
            var img="<?php echo constant('ADMIN_SRC');?>media/img/btn_sj.png";
            if(item.dish_state==1){
                state="<font color='#5BB04B'>已上架</font>";
                img="<?php echo constant('ADMIN_SRC');?>media/img/btn_xj.png";
            }
            href="javascript:upd_state(&quot;"+item.dish_id+"&quot;,&quot;"+item.type+"&quot;,&quot;"+item.dish_state+"&quot;)";
            show_hot_list_str+="<tr class='gradeA'>";
            show_hot_list_str+="	<td width='10%'>"+num+"</td>";
            show_hot_list_str+="   <td width='15%'>"+item.dish_name+"</td>";
            show_hot_list_str+="	<td width='10%' style='color:#454545'>"+item.dish_count+"份</td>";
            show_hot_list_str+="	<td width='10%'>"+item.dish_price+"元</td>";
            show_hot_list_str+="	<td width='10%' style='font-weight:bold;color:#F00;'>"+item.sum+"元</td>";
            show_hot_list_str+="	<td width='10%' >"+state+"</td>";
            show_hot_list_str+="	<td width='20%' style='color:#454545'>"+item.insert_time+"</td>";
            show_hot_list_str+="</tr>";
        });
        if(num==0){
            show_hot_list_str+="<tr><td colspan='10' style='font-weight:bold;color:#F00;'>没有找到您想要的数据.</td></tr>";
        }
        $("#show_hot_list").append(show_hot_list_str);
    }
    function sort_do(field,flag) {
        var e = event || window.event;
        var target = e.target || e.srcElement;
        var queryData = {
            asc_name: field,
            asc_type:flag
        };
        setContentUrl("<?php echo site_url('admin/admin_sell/index_2');?>",queryData);
    }
    function search(){
        var queryData = $("#form").serialize();
        setContentUrl("<?php echo site_url("admin/admin_sell/index_2")?>",queryData);
    }
</script>