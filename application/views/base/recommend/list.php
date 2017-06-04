<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">推荐管理</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Recommened management</h3>
    </div>
</div>
<div class="wrapper feed-element">
    <div class="ibox float-e-margins" style="margin-top:15px;">

        <div class="ibox-title">
            <ul class="nav nav-pills">
                <li style="margin-right: 20px;margin-left: 12px;margin-top: 6px;"><input id="check_all" type="checkbox" class="i-checks">&nbsp;&nbsp;全选</li>
                <li><button class="btn btn-white" type="button" onclick="batch_do('-1');">批量删除</button>
                </li>
                <li><button class="btn btn-white" type="button" onclick="batch_do('1');">批量启用</button>
                </li>
                <li><button class="btn btn-white" type="button" onclick="batch_do('0');">批量停用</button>
                </li>
            </ul>
        </div>
        <div class="ibox-content">
            <div class="table-responsive" style="margin-bottom:10px;">
                <table class="table dataTable">
                    <thead>
                    <tr>
                        <th>
                        </th>
                        <th>推荐标题</th>
                        <th>排序</th>
                        <th>推荐类型</th>
                        <th>状态</th>
                        <th>发布时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody id="recommend_list">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--<div class="col-sm-12 m-t-sm" style="padding-left: 0px;"><button class="btn btn-w-m btn-primary" type="button">保&nbsp;&nbsp;存</button></div>-->
</div>
<script type="text/javascript">
    var type_list = eval(<?php echo isset($type_list) ? $type_list : "({})"?>);
    var open_type = [];
    var show_ids = [];
    $(document).ready(function() {
        show_recommend_list();
        all_check();
        sub_check();
        leaf_check();

    });
    function all_check() {
        $('#check_all').on('ifChecked ifUnchecked', function(event) {
            if (event.type == 'ifChecked') {
                $("input[type='checkbox']").iCheck('check');
            } else {
                $("input[type='checkbox']").iCheck('uncheck');
            }
        })

    }
    function sub_check() {
        $("input[name='type']").on('ifChanged', function(event){
            var type_id = $(this).val();
            if ($(this).is(':checked')){
                $("input[name='show_"+type_id+"']").iCheck('check');
            } else {
                $("input[name='show_"+type_id+"']").iCheck('uncheck');
            }

        });
    }
    function leaf_check() {
        $(".show-checks").on('ifChanged', function(event){
            var show_id = $(this).val();
            if ($(this).is(':checked')){
                if ($.inArray(show_id,show_ids) == -1){
                    show_ids.push(show_id);
                }
            } else {
                var index = $.inArray(show_id,show_ids);
                show_ids.splice(index,1);
            }
            console.log(show_ids);
        });
    }
    function show_recommend_list() {
        $("#recommend_list").html("");
        var recommend_list_str="";
        $.each(type_list,function(i,row){
            var big_list = row['big_list'];
            var type_id = row['type_id'];
            var sub_big_list_str = "";
            var max_recommend_num = 3;
            var recommend_num = big_list.length;
            var enable_recommend_num = max_recommend_num - recommend_num < 0 ? 0 : max_recommend_num - recommend_num;
            recommend_list_str += '<tr class="parent" id="type_'+type_id+'">'+
                                '<td style="width:87px;">'+
                                '<input type="checkbox" class="i-checks" name="type" value="'+type_id+'">'+
                                '<span class="pull-right" style="width:15px;height:15px;" onclick="in_expand('+type_id+');">'+
                                '<i id="icon_'+type_id+'" class="fa fa-caret-right"></i>'+
                                '</span>'+
                                '</td>'+
                                '<td>'+row['type_name']+'</td>'+
                                '<td style="color: #b5b5b6">该分类还可添加<span style="color: #e84e40">'+enable_recommend_num+'</span>个推荐'+
                                '</td>'+
                                '<td></td>'+
                                '<td></td>'+
                                '<td></td>'+
                                '<td></td>'+
                                '</tr>';
            var count=big_list.length -1;
            $.each(big_list,function(i,row){
                var show_type = row['show_type'];
                var show_state = row['show_state'];
                var show_text = "";
                var state_text = "";
                if (show_type == 0){
                    show_text = "活动推荐";
                }else if (show_type == 1){
                    show_text = "菜品推荐";
                }else if (show_type == 2){
                    show_text = "套餐推荐";
                }
                if (show_state == 0){
                    state_text = '<span style="color:red;">暂停</span>';
                }else if (show_state == 1){
                    state_text = '<span style="color:green;">启用</span>';
                }
                var num_1 = 0;
                var num_2 = 0;
                if(i==0){
                    num_1=count;
                }else{
                    num_1=i-1;
                }
                if(i==count){
                    num_2=0;
                }else{
                    num_2=i+1;
                }
                var sort_value_1=big_list[num_1]['show_asc'];
                var sort_value_2=big_list[num_2]['show_asc'];

                var sort_value=big_list[i]['show_asc'];
                var tab_id_1=big_list[num_1]['show_id'];
                var tab_id_2=big_list[num_2]['show_id'];
                sub_big_list_str += '<tr class="gray-bg gray-bg_'+type_id+'" style="display:none;">'+
                '<td>'+
                '<input type="checkbox" class="i-checks show-checks" name="show_'+type_id+'" value="'+row['show_id']+'" style="position: absolute; opacity: 0;">'+
                '</td>'+
                '<td><img src="/data/images/zhe.png">&nbsp;&nbsp;&nbsp;&nbsp;'+row['show_name']+'</td>'+
                '<td>'+
                '<a href="javascript:void(0);" onclick="sort_do(&quot;'+sort_value+'&quot;,&quot;'+tab_id_1+'&quot;,&quot;'+tab_id_2+'&quot;,&quot;'+type_id+'&quot;,&quot;'+row['show_id']+'&quot;,&quot;'+sort_value_1+'&quot;,&quot;'+sort_value_2+'&quot;,&quot;1&quot;);" class="shang_a">&nbsp;</a>'+
                '<a href="javascript:void(0);" onclick="sort_do(&quot;'+sort_value+'&quot;,&quot;'+tab_id_1+'&quot;,&quot;'+tab_id_2+'&quot;,&quot;'+type_id+'&quot;,&quot;'+row['show_id']+'&quot;,&quot;'+sort_value_1+'&quot;,&quot;'+sort_value_2+'&quot;,&quot;2&quot;);" class="xia_a">&nbsp;</a>'+
                '</td>'+
                '<td>'+show_text+'</td>'+
                '<td>'+state_text+'</td>'+
                '<td>'+row['insert_time']+'</td>'+
                '<td><a href="javascript:edit_recommend('+row['show_id']+');">编辑</a>｜<a href="javascript:del_big('+row['show_id']+','+type_id+');">删除</a></td>'+
                '</tr>';
            });
            if (enable_recommend_num > 0){
                sub_big_list_str += '<tr class="gray-bg gray-bg_'+type_id+'" style="display:none;">'+
                '<td></td>'+
                '<td>'+
                '<span><img src="/data/images/zhe.png">&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:add_recommend('+type_id+');"><i class="fa fa-plus-square"></i>&nbsp;添加推荐</a></span>'+
                '</td>'+
                '<td></td>'+
                '<td></td>'+
                '<td></td>'+
                '<td></td>'+
                '<td></td>'+
                '</tr>';

            }
            recommend_list_str +=  sub_big_list_str;

        });
        $("#recommend_list").html(recommend_list_str);
    }
    function in_expand(type_id){
        var $obj = $(".gray-bg_"+type_id);
        if ($obj.is(':visible')){
            $obj.hide();
            $("#icon_"+type_id).addClass('fa-caret-right').removeClass('fa-sort-desc');
            if ($.inArray(type_id,open_type) != -1){
                open_type.splice($.inArray(type_id,open_type),1);
            }

        }else {
            $obj.show();
            $("#icon_"+type_id).addClass('fa-sort-desc').removeClass('fa-caret-right');
            if ($.inArray(type_id,open_type) == -1){
                open_type.push(type_id);
            }
        }
    }
    function add_recommend(type_id){
        setContentUrl('<?php echo site_url('admin/admin_big/big_add_show') ?>'+'?type_id='+type_id);
    }
    function edit_recommend(show_id){
        setContentUrl('<?php echo site_url('admin/admin_big/big_update_show') ?>'+'?show_id='+show_id);
    }
    function sort_do(sort_value,tab_id_1,tab_id_2,type_id,sort_id,sort_value_1,sort_value_2,sort_type){
        var e = e || window.event;
        e.stopPropagation();
        $.ajax({
            url:"<?php echo site_url('admin/admin_big/big_sort?sort_id=');?>"+sort_id+"&sort_value="+sort_value+"&tab_id_1="+tab_id_1+"&tab_id_2="+tab_id_2+"&sort_value_1="+sort_value_1+"&sort_value_2="+sort_value_2+"&sort_type="+sort_type+"&type_id="+type_id,
            type:'GET',
            dataType:'json',
            success:function(data){
                if (data){
                    type_list = eval(data)['type_list'];
                    show_recommend_list();
                    $.each(open_type,function(i,value){
                        in_expand(value);
                        init_check();
                    });
                    all_check();
                    sub_check();
                    leaf_check();
                }
            }
        });
    }
    function init_check(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });
    }
    function del_big(show_id,type_id){
        $.ajax({
            url:"<?php echo site_url("admin/admin_big/big_delete")?>"+"?show_id="+show_id+"&type_id="+type_id,
            type:"GET",
            dataType:"json",
            success:function(data){
                if (data){
                    type_list = eval(data)['type_list'];
                    show_recommend_list();
                    $.each(open_type,function(i,value){
                        in_expand(value);
                        init_check();
                    });
                    all_check();
                    sub_check();
                    leaf_check();
                }
            }
        });
    }
    function batch_do (value) {
        if (show_ids.length <= 0) {
            if(value==1){
                alert('请选择要启用的推荐位');
            } else if (value==0){
                alert('请选择要停用的推荐位');
            }else if (value==-1){
                alert('请选择要删除的菜品');
            }
        } else {
            if(value==-1) {
                if(!confirm("确定要执行批量删除吗？")){
                    return false;
                }
            }
            var queryData = {
                show_id: show_ids,
                batch_value:value
            }
            $.ajax({
                url:"<?php echo site_url('admin/admin_big/big_batch');?>",
                type:"POST",
                dataType:"json",
                data:queryData,
                success:function(data){
                   if (data){
                       type_list = eval(data)['type_list'];
                       show_recommend_list();
                       $.each(open_type,function(i,value){
                           in_expand(value);
                           init_check();
                       });
                       all_check();
                       sub_check();
                       leaf_check();
                       show_ids = [];
                   }else{
                       alert("操作失败，请稍后重试!");
                   }
                }
            });
        }
    }
</script>