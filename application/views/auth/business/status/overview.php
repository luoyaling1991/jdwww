<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">营业状况</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Business overview</h3>
    </div>
</div>
<div class="wrapper feed-element">
    <div class="col-sm-6">
        <h3>销售排名</h3>
        <div class="ibox float-e-margins m-t">
            <div class="ibox-title" style="padding:7px 20px 0;">
                <ul class="nav nav-pills  pull-right" style="margin-left: 10px;">
                    <li><button class="btn btn-white" type="button" onclick="show_hot_detail();"><i></i>查看详情</button>
                    </li>
                </ul>
                <!--<div data-toggle="buttons" class="btn-group  pull-right">
                    <label class="btn btn-sm btn-white active">
                        <input type="radio" id="option1" name="options">日</label>
                    <label class="btn btn-sm btn-white">
                        <input type="radio" id="option2" name="options">周</label>
                    <label class="btn btn-sm btn-white">
                        <input type="radio" id="option3" name="options">月</label>
                </div>-->

            </div>
            <div class="ibox-content">
                <div class="table-responsive" style="height:285px;">
                    <table class="table table-striped dataTable">
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th>菜品</th>
                            <th>单价</th>
                            <th style="width:75px;">
                                <div style="float:left;">销量</div>
                                <div style="margin-left:15px;float:left;">
                                    <img onclick="sort_do('dish_count','asc')" data-type="asc" src="<?php echo constant('ADMIN_SRC')."/media/img/s.png";?>" style="display:block;width:8px;cursor:pointer;">
                                    <img onclick="sort_do('dish_count','desc')" data-type="desc" src="<?php echo constant('ADMIN_SRC')."/media/img/xx_1.png";?>" style="display:block;width:8px;cursor:pointer;">
                                </div>
                            </th>
                            <th style="width:75px;">
                                <div style="float:left;">总价</div>
                                <div style="margin-left:15px;float:left;">
                                    <img onclick="sort_do('sum','asc')" data-name="sum" data-type="asc" src="<?php echo constant('ADMIN_SRC')."/media/img/s.png";?>" style="display:block;width:8px;cursor:pointer;">
                                    <img onclick="sort_do('sum','desc')" data-name="sum" data-type="desc" src="<?php echo constant('ADMIN_SRC')."/media/img/xx.png";?>" style="display:block;width:8px;cursor:pointer;">
                                </div>
                            </th>
                            <th>发布时间</th>
                        </tr>
                        </thead>
                        <tbody id="tab_dish_list">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <h3>客流量</h3>
        <div class="ibox float-e-margins m-t">
            <div class="ibox-title" style="padding:7px 20px 0;">
                <div data-toggle="buttons" class="btn-group  pull-right">
                    <label class="btn btn-sm btn-white active" name="custom">
                        <input type="radio" id="option1"  value="1">日</label>
                    <label class="btn btn-sm btn-white" name="custom">
                        <input type="radio" id="option2"  value="2">周</label>
                    <label class="btn btn-sm btn-white" name="custom">
                        <input type="radio" id="option3" value="3">月</label>
                </div>
            </div>
            <div class="ibox-content">
                <div id="custom-line-chart" style="height:287px;"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12 m-t">
        <h3>销售统计</h3>
        <div class="ibox float-e-margins m-t">
            <div class="ibox-title" style="padding:7px 20px 0;">
                <div class="ibox-title" style="padding:7px 20px 0;">
                    <div data-toggle="buttons" class="btn-group  pull-right">
                        <label class="btn btn-sm btn-white active" name="sale">
                            <input type="radio" id="option1"  value="1">日</label>
                        <label class="btn btn-sm btn-white" name="sale">
                            <input type="radio" id="option2"  value="2">周</label>
                        <label class="btn btn-sm btn-white" name="sale">
                            <input type="radio" id="option3" value="3">月</label>
                    </div>
                </div>
                <!--<ul class="nav nav-pills  pull-right">
                    <li><button class="btn btn-white" type="button" data-toggle="modal" data-target="#addTable"><i></i>查看详情</button>
                    </li>
                </ul>-->
            </div>
            <div class="ibox-content">
                <div id="sale-line-chart" style="height:285px;"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var list=eval(<?php echo $list;?>);
    var person=<?php echo $list_day_person;?>;//线条数据
    var dish=<?php echo $list_day;?>;
    var week_dish=<?php echo $list_week;?>;
    var month_dish=<?php echo $list_month;?>;
    var day = <?php echo $list_day_labels;?>;
    var week_person=<?php echo $list_week_person;?>;
    var week = <?php echo $list_week_labels;?>;
    var month = <?php echo $list_month_labels;?>;
    var month_person =<?php echo $list_month_person;?>;
    var custom_checked_date = 1;
    var dish_checked_date = 1;
    var dish_day = day;
    var dish_data = dish;
    var data_day = day;
    var data_person = person;
    $(document).ready(function(){
        show_dish_list();
        draw_line_custom();
        draw_line_sale();
        check_line_custom();
        check_line_sale();
    });
    function check_line_custom(){
        $("label[name='custom']").click(function(){
            $("label[name='date']").removeClass('active');
            $(this).addClass('active');
            custom_checked_date = $(this).find('input').eq(0).val();
            if (custom_checked_date == 2){
                data_person = week_person;
                data_day = week;
            } else if (custom_checked_date == 3){
                data_person = month_person;
                data_day = month;
            }else {
                data_person = person;
                data_day = day
            }
            draw_line_custom();
        });
    }
    function check_line_sale(){
        $("label[name='sale']").click(function(){
            $("label[name='sale']").removeClass('active');
            $(this).addClass('active');
            dish_checked_date = $(this).find('input').eq(0).val();
            if (dish_checked_date == 2){
                dish_data = week_dish;
                dish_day = week;
            } else if (dish_checked_date == 3){
                dish_data = month_dish;
                dish_day = month;
            }else {
                dish_data = dish;
                dish_day = day
            }
            draw_line_sale();
        });
    }
    function draw_line_custom(){
        var data = {
            categories:data_day,
            yText:'人数',
            seriesName:'客流量',
            seriesData:data_person
        }
        draw_line('custom-line-chart',data);
    }
    function draw_line_sale(){
        var data = {
            categories:dish_day,
            yText:'数量',
            seriesName:'菜品销量',
            seriesData:dish_data
        }
        draw_line('sale-line-chart',data);
    }
    function draw_line(container,data){
        $('#'+container).highcharts({
            chart: {
                type: 'line'
            },
            title:{
                text:''
            },
            xAxis: {
                categories: data.categories
            },
            yAxis: {
                title: {
                    text: data.yText
                }
            },
            credits: { enabled: false},
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true          // 开启数据标签
                    },
                    enableMouseTracking: false // 关闭鼠标跟踪，对应的提示框、点击事件会失效
                },
                allowPointSelect:true,
                enabled:true
            },
            series: [{
                name: data.seriesName,
                data: data.seriesData
            }]
        });
    }
    function show_dish_list() {
        var num = 0;
        var dish_list_str = "";
        $.each(list, function(i, item) {
            num++;
            if(num<=5){
                dish_list_str+="<tr>"+
                                "<td>"+num+"</td>"+
                                "<td>"+item.dish_name+"</td>"+
                                "<td>"+item.dish_price+"元</td>"+
                                "<td>"+item.dish_count+"</td>"+
                                "<td>"+item.sum+"元</td>"+
                                "<td>"+item.insert_time+"</td>"+
                                "</tr>";
            }
        });
        $("#tab_dish_list").html(dish_list_str);
    }
    function sort_do(field,flag) {
        var e = event || window.event;
        var target = e.target || e.srcElement;
        var queryData = {
            asc_name: field,
            asc_type:flag
        };
        $.ajax({
            url:"<?php echo site_url('admin/admin_sell/sort');?>",
            type:"POST",
            data:queryData,
            dataType:"json",
            success:function(data){
                list = data;
                show_dish_list();
                parse_sort_class(target);
            }
        });
    }
    function parse_sort_class(target){
        var data_type = $(target).attr("data-type");
        if (data_type == 'asc'){
            $("img[data-type='asc']").attr("src",'/data/media/img/s.png');
            $("img[data-type='desc']").attr("src",'/data/media/img/xx.png');
            $(target).attr("src",'/data/media/img/s_1.png');
        }else {
            $("img[data-type='asc']").attr("src",'/data/media/img/s.png');
            $("img[data-type='desc']").attr("src",'/data/media/img/xx.png');
            $(target).attr("src",'/data/media/img/xx_1.png');

        }
    }
    function show_hot_detail(){
        setContentUrl("<?php echo site_url('admin/admin_sell/index_2');?>");
    }
</script>