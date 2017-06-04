<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">品种分类</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Variety classification</h3>
    </div>
</div>
<div class="wrapper feed-element">
    <div class="float-e-margins" style="width:24%;float:left;">
        <div style="text-align: center;background: #999;color: #fff;">
            <h4 style="line-height: 40px;margin-bottom: 0px;">分类名称</h4>
        </div>
        <div class="ibox-content" style="background-color:#edeef3;padding:10px 0 20px 0;min-height:600px;">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th></th>
                        <th>分类名称</th>
                        <th>排序</th>
                        <th>删除</th>
                    </tr>
                    </thead>
                    <tbody id="tab_type_list">

                    </tbody>
                </table>
            </div>
            <div><a href="javascript:void(0);" onclick="addType();"><i class="fa fa-plus"> 添加分类</i></a></div>
        </div>
    </div>
    <div class="float-e-margins" style="width:36%;float:left;">
        <div style="text-align: center;background: #999;color: #fff;">
            <h4 style="line-height: 40px;margin-bottom: 0px;">所属分类菜品</h4>
        </div>
        <div class="ibox-content" style="background-color:#f7f7f7;padding-top:10px;height:600px;">
            <div class="table-responsive">
                <table class="table  table-hover">
                    <thead>
                    <tr>

                        <th>ID</th>
                        <th>所属分类菜品</th>
                        <th>单价</th>
                        <th>排序</th>
                    </tr>
                    </thead>
                    <tbody id="tab_set_list">

                    </tbody>

                </table>

            </div>
        </div>
    </div>
    <div class="float-e-margins" style="width:40%;float:left;">
        <div style="text-align: center;background: #999;color: #fff;">
            <h4 style="line-height: 40px;margin-bottom: 0px;">全部菜品</h4>
        </div>
        <div class="ibox-content" style="background-color:#edeef3;padding-top:10px;height:600px;">
            <div style="margin:20px auto;text-align: justify;">
                <input type="radio" class="i-checks" value="0" name="sys_type">&nbsp;&nbsp;全部&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" class="i-checks" value="-1" name="sys_type">&nbsp;&nbsp;套餐&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" class="i-checks" value="1" name="sys_type">&nbsp;&nbsp;菜品&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio"  class="i-checks" value="2" name="sys_type">&nbsp;&nbsp;汤类&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio"  class="i-checks" value="3" name="sys_type">&nbsp;&nbsp;小吃&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio"  class="i-checks" value="4" name="sys_type">&nbsp;&nbsp;酒水&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio"  class="i-checks" value="5" name="sys_type">&nbsp;&nbsp;其他&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>

                        <th>ID</th>
                        <th>全部菜品</th>
                        <th class="sorting">单价</th>
                        <th class="sorting">销量</th>
                    </tr>
                    </thead>
                    <tbody id="tab_dish_list">


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <p class="col-sm-12" style="color: #e85d52;margin-top: 20px;">提示：左侧选择分类-->单击右侧菜品可将菜品添加至该分类，单击中间菜品可将该菜品移除分类！</p>
    <div class="col-sm-12 hidden" id="options" >
        <button type="button" class="btn btn-w-m btn-primary" onclick="saveType();" style="margin-top: 10px;">保存更改</button>
        <button type="button" class="btn btn-w-m" onclick="cancelType();" style="margin-top: 10px;">取消</button>
    </div>
</div>
<script type="text/javascript">
    var type_list = eval(<?php echo isset($type_list) ? $type_list : "({})"?>);
    var default_type_id = '';
    var checked_type_id = ''
    var dish_arr = {};
    var set_arr = {};
    $(document).ready(function() {
        show_type_list();
        if(type_list.length > 0){
            default_type_id = type_list[0]['type_id'];
            checked_type_id = default_type_id;
            click_show(checked_type_id);
        }
        show_set_list(checked_type_id, set_arr[checked_type_id]);
        $("input[type='radio']").on('ifChecked', function(event){ //ifCreated 事件应该在插件初始化之前绑定
            check_dish_list(checked_type_id, dish_arr[checked_type_id]);
        });
    });
    function click_show(num){
        var e = e || window.event;
        $("#tab_set_list tr").hide();
        $('input[name="sys_type"]').iCheck('uncheck');
        $("#tab_type_list tr").removeClass('active');
        $("#type_"+num).addClass('active');
        checked_type_id = num;
        show_set_list(checked_type_id, set_arr[checked_type_id]);
        check_dish_list(checked_type_id, dish_arr[checked_type_id]);

    }
    function show_type_list() {
        var num = 0;
        var count=type_list.length - 1;
        var type_list_str = "";
        $.each(type_list,function(index,row){
                var type_id = row['type_id'];
                var type_name = row['type_name'];
                if(num==0){
                    num_1=count;
                }else{
                    num_1=num-1;
                }
                if(num==count){
                    num_2=0;
                }else{
                    num_2=num+1;
                }
                var set_list = row['set_list'];
                var dish_list = row['dish_list'];
                // show_set_list(type_id,set_list);
                set_arr[type_id] = set_list;
                dish_arr[type_id] = dish_list;
                var type_asc=row['type_asc'];
                var type_asc_1=type_list[num_1]['type_asc'];
                var type_asc_2=type_list[num_2]['type_asc'];
                var sort_value=type_list[num]['type_asc'];
                var tab_id_1=type_list[num_1]['type_id'];
                var tab_id_2=type_list[num_2]['type_id'];
                //var href_0="javascript:sort_do(&quot;$sort_value&quot;,&quot;$tab_id_1&quot;,&quot;$tab_id_2&quot;,&quot;$type_id&quot;,&quot;$type_asc_1&quot;,&quot;$type_asc_2&quot;,&quot;0&quot;);";
                //var href_1="javascript:sort_do(&quot;$sort_value&quot;,&quot;$tab_id_1&quot;,&quot;$tab_id_2&quot;,&quot;$type_id&quot;,&quot;$type_asc_1&quot;,&quot;$type_asc_2&quot;,&quot;1&quot;);";
                //var href_2="javascript:sort_do(&quot;$sort_value&quot;,&quot;$tab_id_1&quot;,&quot;$tab_id_2&quot;,&quot;$type_id&quot;,&quot;$type_asc_1&quot;,&quot;$type_asc_2&quot;,&quot;2&quot;);";
                //var href_3="javascript:sort_do(&quot;$sort_value&quot;,&quot;$tab_id_1&quot;,&quot;$tab_id_2&quot;,&quot;$type_id&quot;,&quot;$type_asc_1&quot;,&quot;$type_asc_2&quot;,&quot;3&quot;);";
                type_list_str +="<tr id='type_"+type_id+"' onclick='click_show(&quot;"+type_id+"&quot;)'>"+
                                "<td>"+
                                "<i class='fa fa-pencil-square-o pointer'></i>"+
                                "</td>"+
                                "<td>"+
                                    <!--参考jstree的样式,目不知道原因。 -->
                                "<i class='jstree-icon jstree-ocl'></i>"+
                                type_name+"</td>"+
                                "<td>"+
                                "<a href='javascript:void(0);' onclick='sort_do(&quot;"+sort_value+"&quot;,&quot;"+tab_id_1+"&quot;,&quot;"+tab_id_2+"&quot;,&quot;"+type_id+"&quot;,&quot;"+type_asc_1+"&quot;,&quot;"+type_asc_2+"&quot;,&quot;1&quot;);' class='shang_a'>&nbsp;</a>"+
                                "<a href='javascript:void(0);' onclick='sort_do(&quot;"+sort_value+"&quot;,&quot;"+tab_id_1+"&quot;,&quot;"+tab_id_2+"&quot;,&quot;"+type_id+"&quot;,&quot;"+type_asc_1+"&quot;,&quot;"+type_asc_2+"&quot;,&quot;2&quot;);' class='xia_a'>&nbsp;</a>"+
                                "</td>"+
                                "<td><a href='javascript:void(0);' onclick='del_type(&quot;"+type_id+"&quot;);'>删除</a></td>"+
                                "</tr>";
                num++;
            });

        if (num > 0){
            $("#tab_type_list").html(type_list_str);
        }else {
            $("#tab_set_list").html("<tr><td colspan='4' style='color:red;'>请先在左侧栏添加分类名称!</td></tr><tr><td colspan='4' style='color:red;'>单击右侧栏菜品添加至分类!</td></tr>")
        }
    }
    function sort_do(sort_value,tab_id_1,tab_id_2,sort_id,sort_value_1,sort_value_2,sort_type){
        var e = e || window.event;
        e.stopPropagation();
        var queryData = {
            sort_id: sort_id,
            sort_value:sort_value,
            tab_id_1:tab_id_1,
            tab_id_2:tab_id_2,
            sort_value_1:sort_value_1,
            sort_value_2:sort_value_2,
            sort_type:sort_type
        }
        $.ajax({
            url:"<?php echo site_url('admin/admin_type/type_sort');?>",
            type:'POST',
            data:queryData,
            success: function(data) {
                type_list = eval("("+data+")");
                $("#tab_type_list").html("");
                $("#tab_set_list").html("");
                show_type_list();
                if(type_list.length > 0){
                    var type_id = checked_type_id ? checked_type_id : default_type_id;
                    if (type_id){
                        click_show(checked_type_id);
                    }
                }
            }
        });
    }
    function del_type(type_id){
        var e = e || window.event;
        e.stopPropagation();
        if(confirm('是否要删除该菜品分类？')){
            var url = "<?php echo site_url("admin/admin_type/type_delete?type_id=")?>" + type_id;
            $.ajax({
                url:"<?php echo site_url("admin/admin_type/type_delete?type_id=")?>" + type_id,
                type:'GET',
                success: function(data) {
                    type_list = eval("("+data+")");
                    $("#tab_type_list").html("");
                    $("#tab_set_list").html("");
                    show_type_list();
                    if(type_list.length > 0){
                        if (type_id == checked_type_id){
                            checked_type_id = default_type_id;
                        }
                        if (checked_type_id){
                            click_show(checked_type_id);
                        }
                    }
                }
            });
        } else {
            return false;
        }
    }
    function show_set_list(type_id,set_list){
        var objectList = new Array();//申明存储对象
        function Persion(dish_id,sort,dish_name,dish_price,dish_count,count,sys_type){
            this.dish_id=dish_id;
            this.sort=sort;
            this.dish_name=dish_name;
            this.dish_price=dish_price;
            this.dish_count=dish_count;
            this.count=count;
            this.sys_type=sys_type;
        }
        var sum=0;
        $.each(set_list, function(i, item) {
            objectList.push(new Persion(item.dish_id,item.sort,item.dish_name,item.dish_price,item.dish_count,item.count,item.sys_type));
            sum++;
        });
        sum--;
        //按sort值从小到大排序
        objectList.sort(function(a,b){
            return a.sort-b.sort});
        set_list=objectList;
        set_arr[type_id]=set_list;
        $("#tab_set_list").html("");
        if(set_list && set_list.length > 0){
            var set_list_str="";
            $.each(set_list,function(i,row){
                set_list_str+="<tr name='set_"+type_id+"' onclick='remove_check(&quot;"+type_id+"&quot;,&quot;"+i+"&quot;)'>"+
                "<td>"+(i+1)+"</td>"+
                    <!--参考jstree的样式,目不知道原因。 -->
                "<td>"+row['dish_name']+"</td>"+
                "<td>"+row['dish_price']+"</td>"+
                "<td>"+
                "<a href='javascript:void(0);' onclick='cum_sort_do(&quot;"+type_id+"&quot;,&quot;"+i+"&quot;,&quot;"+sum+"&quot;,&quot;1&quot;);' class='shang_a'>&nbsp;</a>"+
                "<a href='javascript:void(0);' onclick='cum_sort_do(&quot;"+type_id+"&quot;,&quot;"+i+"&quot;,&quot;"+sum+"&quot;,&quot;2&quot;);' class='xia_a'>&nbsp;</a>"+
                "</td>"+
                "</tr>";
            });
            $("#tab_set_list").html(set_list_str);
        }else{
            $("#tab_set_list").html("<tr name='set_"+type_id+"'><td colspan='4' style='color:red;'>单击右侧栏菜品添加至分类</td></tr>");
        }
    }
    function check_dish_list(type_id,dish_list){
        if(dish_list && dish_list.length > 0){
            //获取选中的属性值
            var sys_type= $('input[name="sys_type"]:checked').val();
            var num=1;
            var dish_list_num=0;
            $("#tab_dish_list").html("");
            var dish_list_str="";
            $.each(dish_list,function(i,row){
                var num_show=num;
                dish_list_num++;
                var i_sys_type = row.sys_type;
                if(sys_type== 0 || sys_type == undefined || sys_type == ''){
                    num++;
                    dish_list_str+="<tr name='dish_"+type_id+"' onclick='check_one(&quot;"+type_id+"&quot;,&quot;"+i+"&quot;)'>"+
                    "<td>"+num_show+"</td>"+
                        <!--参考jstree的样式,目不知道原因。 -->
                    "<td>"+row['dish_name']+"</td>"+
                    "<td>"+row['dish_price']+"</td>"+
                    "<td>"+row['dish_count']+"</td>"+
                    "</tr>";
                }else{
                    if(i_sys_type==sys_type){
                        num++;
                        dish_list_str+="<tr name='dish_"+type_id+"' onclick='check_one(&quot;"+type_id+"&quot;,&quot;"+i+"&quot;)'>"+
                        "<td>"+num_show+"</td>"+
                            <!--参考jstree的样式,目不知道原因。 -->
                        "<td>"+row['dish_name']+"</td>"+
                        "<td>"+row['dish_price']+"</td>"+
                        "<td>"+row['dish_count']+"</td>"+
                        "</tr>";
                    }
                }
            });
            if(num==1){
                dish_list_str = "<tr><td  style='padding-left:15px;color:red;'>没有找到您想要的菜品.</td></tr>";
            }
            $("#tab_dish_list").html(dish_list_str);
        }else{
            $("#tab_dish_list").html("<tr name='dish_"+type_id+"' style='display:none;'><td colspan='4' style='color:red;'>无可选菜品</td></tr>");
        }
    }
    //选中数据
    function check_one(type_id,num){
        var dish = dish_arr[type_id][num];
        dish['count']=1;
        var lenght=0;
        var numbers=new Array();
        dish['sort']=0;
        $.each(set_arr[type_id], function(i, item) {
            numbers[lenght]=item.sort;
            lenght++;
        });
        var maxInNumbers = Math.max.apply(Math, numbers);
        if(maxInNumbers!="-Infinity"){
            dish['sort']=maxInNumbers+1;
        }
        set_arr[type_id][lenght]=dish;
        dish_arr[type_id].splice(num,1);
        show_set_list(type_id, set_arr[type_id]);
        check_dish_list(type_id, dish_arr[type_id]);
        $("#options").removeClass('hidden');
    }
    // 移除选中的数据
    function remove_check(type_id,num){
        var set=set_arr[type_id][num];
        set['count']=1;
        var lenght=0;
        var numbers=new Array();
        set['sort']=0;
        $.each(dish_arr[type_id], function(i, item) {
            numbers[lenght]=item.sort;
            lenght++;
        });
        var maxInNumbers = Math.max.apply(Math, numbers);
        if(maxInNumbers!="-Infinity"){
            set['sort']=maxInNumbers+1;
        }
        dish_arr[type_id][lenght]=set;
        set_arr[type_id].splice(num,1);
        show_set_list(type_id, set_arr[type_id]);
        check_dish_list(type_id, dish_arr[type_id]);
        $("#options").removeClass('hidden');
    }
    //排序处理
    function cum_sort_do(type_id,num,sum,sort_type){
        var e = e || window.event;
        e.stopPropagation();
        var sort_value_my=set_arr[type_id][num].sort;
        if(sort_type==0){
            //最高
            sort_min=set_arr[type_id][0].sort;
            set_arr[type_id][num].sort=sort_min-1;
        }else if(sort_type==1){
            //上次排序值
            var shang=num-1;
            if(num==0){
                shang=0;
            }
            var sort_value_1=set_arr[type_id][shang].sort;
            set_arr[type_id][num].sort=sort_value_1;
            if(num!=0){
                set_arr[type_id][shang].sort=sort_value_my;
            }
        }else if(sort_type==2){
            //下次排序值
            var xia=parseInt(num)+1;
            if(num==sum){
                xia=num;
            }
            var sort_value_2=set_arr[type_id][xia].sort;
            set_arr[type_id][num].sort=sort_value_2;
            if(num!=sum){
                set_arr[type_id][xia].sort=sort_value_my;
            }
        }else if(sort_type==3){
            //最后一个
            sort_max=set_arr[type_id][sum].sort;
            set_arr[type_id][num].sort=sort_max+1;
        }
        show_set_list(type_id, set_arr[type_id]);
        $("#options").removeClass('hidden');
    }
    //添加分类
    function addType() {//分类行
        if($('#add_type_name').length > 0){
            alert('请先保存已添加的菜品分类!');
        }else {
            var add_type = '<tr>'+
                '<td>'+
                '<i class="fa fa-pencil-square-o pointer"></i>'+
                '</td>'+
                '<td>'+
                '<input id="add_type_name" onblur="saveAddType(this);" style="width:90px;" type="text" placeholder="四个字符"/>'+
                '</td>'+
                '<td>'+
                '<a href="javascript:void(0);" class="shang_a">&nbsp;</a>'+
                '<a href="javascript:void(0);" class="xia_a">&nbsp;</a>'+
                '</td>'+
                '<td><a href="#">删除</a></td>'+
                '</tr>';
            $("#tab_type_list").append(add_type);
            $("#add_type_name").focus();
        }
    }
    function saveAddType(o){
        var e = e || window.event;
        var add_type_name = $(o).val();
        if (add_type_name.trim() == ""){
            $(o).parent().parent().remove();
        }else {
            if (add_type_name.length > 4){
                alert('菜品分类名称只能4个字以内');
            }else {
                $.post('<?php echo site_url('admin/admin_type/type_add')?>',{type_name:add_type_name},function (data){
                    if (data){
                        if (data == '1'){
                            alert('添加分类执行失败！请稍后重试')
                        }else {
                            data=JSON.parse(data);
                            type_list = data;
                            $("#tab_type_list").html("");
                            $("#tab_set_list").html("");
                            $("#tab_dish_list").html("");
                            show_type_list();
                            if(type_list.length > 0){
                                default_type_id = type_list[0]['type_id'];
                                checked_type_id = default_type_id;
                                click_show(checked_type_id);
                            }
                            show_set_list(checked_type_id, set_arr[checked_type_id]);
                        }
                    }
                });
            }
        }

    }
    function saveType(){
        var dish_list_log = [];
        var set_list = set_arr[checked_type_id];
        $.each(set_list,function(i,value){
            var dish_log = {};
            dish_log['dish_id']=value['dish_id'];
            dish_log['sys_type']=value['sys_type'];
            dish_list_log.push(dish_log);
        });
        $.post('<?php echo site_url('admin/admin_type/add_type_log')?>',{type_id:checked_type_id,dish_list_log:dish_list_log},function (data){
            if (data){
                if (data == '1'){
                    alert('更新所属分类下的菜品执行失败！请稍后重试')
                }else {
                    data=JSON.parse(data);
                    type_list = data;
                    $("#tab_type_list").html("");
                    $("#tab_set_list").html("");
                    $("#tab_dish_list").html("");
                    show_type_list();
                    if(type_list.length > 0){
                        default_type_id = type_list[0]['type_id'];
                        checked_type_id = default_type_id;
                        click_show(checked_type_id);
                    }
                    show_set_list(checked_type_id, set_arr[checked_type_id]);
                    $("#options").addClass('hidden');
                }
            }
        });
    }
    function cancelType(){
        type_list = eval(<?php echo isset($type_list) ? $type_list : "({})"?>);
        $("#tab_type_list").html("");
        $("#tab_set_list").html("");
        $("#tab_dish_list").html("");
        show_type_list();
        if(type_list.length > 0){
            default_type_id = type_list[0]['type_id'];
            checked_type_id = default_type_id;
            click_show(checked_type_id);
        }
        show_set_list(checked_type_id, set_arr[checked_type_id]);
        $("#options").addClass('hidden');
    }
</script>
