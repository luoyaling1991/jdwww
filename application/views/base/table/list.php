<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">餐桌管理</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Table management</h3>
    </div>
</div>
<div class="wrapper feed-element">
    <div class="ibox float-e-margins" style="margin-top:15px;">
        <button class="btn btn-w-m btn-white" type="button" data-toggle="modal" data-target="#addTable" style="margin-bottom: 20px;">添加餐桌</button>
        <div class="ibox-title">
            <ul class="nav nav-pills">
                <li style="margin-right: 20px;margin-left: 12px;margin-top: 6px;"><input type="checkbox" class="i-checks" name="input[]" id="check_all">&nbsp;&nbsp;全选</li>
                <li><button class="btn btn-white" type="button" onclick="batchDel();">批量删除</button>
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
                        <th>分类名称</th>
                        <th>排序</th>
                        <!-- <th>餐桌使用费(包间费)</th> -->
                        <th>容客数</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody id="table_list_show">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--添加餐桌弹出框-->
<div class="modal inmodal in" id="addTable" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title text-danger">添加餐桌&nbsp;&nbsp;<span style="color: #a0a0a0;font-size: 20px;font-weight: normal;">Add table</span></h4>
            </div>
            <div class="modal-body">
                <form method="get" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 control-label">餐桌名称</label>
                        <div class="col-md-8">
                            <input class="form-control" id="input_tab_name" name="input_tab_name" type="text" value="" placeholder="四个字以内"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">额定人数</label>
                        <div class="col-md-8">
                            <input class="form-control" id="tab_person" name="tab_person" type="text" value="" placeholder="不影响实际上客数">
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">所属分类</label>
                        <div class="col-md-6">
                            <select class="form-control" name="type_id" id="type_id">
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="add_table()">保存</button>
                <button id="dismiss" type="button" class="btn btn-white" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>

<!--编辑餐桌弹出框-->
<div class="modal inmodal in" id="editTable" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title text-danger">编辑餐桌&nbsp;&nbsp;<span style="color: #a0a0a0;font-size: 20px;font-weight: normal;">Edit table</span></h4>
            </div>
            <div class="modal-body">
                <form method="get" class="form-horizontal">
                    <input type="hidden" name="tab_id" id="tab_id"/>
                    <div class="form-group">
                        <label class="col-md-3 control-label">餐桌名称</label>
                        <div class="col-md-8">
                            <input class="form-control" id="e_input_tab_name" name="e_input_tab_name" type="text" value="" placeholder="四个字以内"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">额定人数</label>
                        <div class="col-md-8">
                            <input class="form-control" id="e_tab_person" name="e_tab_person" type="text" value="" placeholder="不影响实际上客数">
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">所属分类</label>
                        <div class="col-md-6">
                            <select class="form-control" name="e_type_id" id="e_type_id">
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="update_table()">保存</button>
                <button id="dismiss" type="button" class="btn btn-white" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>

<script type="application/javascript">
    
    //餐桌数据
    var table_list_json = eval(<?php echo $table_list?>);
    //分类数据
    var tab_list_json = eval(<?php echo $type_list?>);
    console.log(tab_list_json);
    isEdit = 0;
    var table_ids = [];
    $(function(){
        showTableList(table_list_json,tab_list_json,0);
        checkAll();
        sub_check();
        leaf_check();
    })
    
    //显示table分类及餐桌分类信息
    function showTableList(_table_list_json,_tab_list_json,_page){
        //添加餐桌数据下拉框
        $.each(_tab_list_json,function (i,data) {
            $("#type_id").append('<option value='+data.type_id+'>'+data.type_name+'</option>');
        });

        //显示餐桌与分类
        var num_1 = 0;
        var num_2 = 0;
        $.each(_tab_list_json,function (i,item) {
            var count =_tab_list_json.length -1;
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
            var type_id=item['type_id'];
            var tab_asc=item['type_asc'];
            var tab_id = item['type_id'];
            var sort_value_1=_tab_list_json[num_1]['type_asc'];
            var sort_value_2=_tab_list_json[num_2]['type_asc'];

            var sort_value=item['type_asc'];
            var tab_id_1=_tab_list_json[num_1]['type_id'];
            var tab_id_2=_tab_list_json[num_2]['type_id'];
            var href_0="javascript:sort_do_1(&quot;"+type_id+"&quot;,&quot;"+sort_value+"&quot;,&quot;"+tab_id_1+"&quot;,&quot;"+tab_id_2+"&quot;,&quot;"+tab_id+"&quot;,&quot;"+sort_value_1+"&quot;,&quot;"+sort_value_2+"&quot;,&quot;0&quot;);";
            var href_1="javascript:sort_do_1(&quot;"+type_id+"&quot;,&quot;"+sort_value+"&quot;,&quot;"+tab_id_1+"&quot;,&quot;"+tab_id_2+"&quot;,&quot;"+tab_id+"&quot;,&quot;"+sort_value_1+"&quot;,&quot;"+sort_value_2+"&quot;,&quot;1&quot;);";
            var href_2="javascript:sort_do_1(&quot;"+type_id+"&quot;,&quot;"+sort_value+"&quot;,&quot;"+tab_id_1+"&quot;,&quot;"+tab_id_2+"&quot;,&quot;"+tab_id+"&quot;,&quot;"+sort_value_1+"&quot;,&quot;"+sort_value_2+"&quot;,&quot;2&quot;);";
            var href_3="javascript:sort_do_1(&quot;"+type_id+"&quot;,&quot;"+sort_value+"&quot;,&quot;"+tab_id_1+"&quot;,&quot;"+tab_id_2+"&quot;,&quot;"+tab_id+"&quot;,&quot;"+sort_value_1+"&quot;,&quot;"+sort_value_2+"&quot;,&quot;3&quot;);";
            //分类行
            var tab = '<tr class="parent" id="table_type_'+item.type_id+'">'+
                '<td>'+
                '<input type="checkbox" class="i-checks" name="type" value="'+item.type_id+'">'+
                '<span class="pull-right"  onclick="in_expand('+item.type_id+');">'+
                '<i class="fa fa-caret-right" id="icon_'+item.type_id+'"></i>'+
                '</span>'+
                '</td>'+
                '<td>'+
                '<i class="fa fa-edit pointer" onclick="edit(this)">&nbsp;&nbsp;</i>'+
                '<input id="tab_name" name="tab_name" class="hidden form-control edit" type="text" value="'+item.type_name+'"/>'+
                '<label class="control-label" style="font-weight:normal;">'+item.type_name+'</label>'+
                '</td>'+
                '<td>'+
                '<a href="'+href_0+'" class="max_a">&nbsp;</a>'+
                '<a href="'+href_1+'" class="shang_a">&nbsp;</a>'+
                '<a href="'+href_2+'" class="xia_a">&nbsp;</a>'+
                '<a href="'+href_3+'" class="min_a">&nbsp;</a>'+
                '</td>'+
                '<td></td>'+
                '<td><a onclick="del_table_type('+item.type_id+');" href="javascript:(<?php echo 0?>)">删除</a></td>'+
                '</tr>';



            $("#table_list_show").append(tab);

            var table_list = eval(_table_list_json[i]);
            var num_1 = 0;
            var num_2 = 0;
            $.each(table_list,function (i,table) {
                var count =table_list.length -1;
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
                var type_id=table['type_id'];
                var tab_asc=table['tab_asc'];
                var tab_id = table['tab_id'];
                var sort_value_1=table_list[num_1]['tab_asc'];
                var sort_value_2=table_list[num_2]['tab_asc'];

                var sort_value=table['tab_asc'];
                var tab_id_1=table_list[num_1]['tab_id'];
                var tab_id_2=table_list[num_2]['tab_id'];
                var href_1="javascript:sort_do(&quot;"+type_id+"&quot;,&quot;"+sort_value+"&quot;,&quot;"+tab_id_1+"&quot;,&quot;"+tab_id_2+"&quot;,&quot;"+tab_id+"&quot;,&quot;"+sort_value_1+"&quot;,&quot;"+sort_value_2+"&quot;,&quot;1&quot;);";
                var href_2="javascript:sort_do(&quot;"+type_id+"&quot;,&quot;"+sort_value+"&quot;,&quot;"+tab_id_1+"&quot;,&quot;"+tab_id_2+"&quot;,&quot;"+tab_id+"&quot;,&quot;"+sort_value_1+"&quot;,&quot;"+sort_value_2+"&quot;,&quot;2&quot;);";
                //餐桌名称行
                var table = '<tr class="gray-bg gray-bg_'+item.type_id+'" style="display:none;">'+
                    '<td>'+
                    '<input type="checkbox" class="i-checks table_checks" name="table_'+item.type_id+'" value="'+table.tab_id+'" style="position: absolute; opacity: 0;">'+
                    '</td>'+
                    '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/data/images/zhe.png">&nbsp;&nbsp;&nbsp;&nbsp;'+table.tab_name+'</td>'+
                    '<td>'+
                    '<a href="'+href_1+'" class="shang_a">&nbsp;</a>'+
                    '<a href="'+href_2+'" class="xia_a">&nbsp;</a>'+
                    '</td>'+
                    '<td>'+table.tab_person+'</td>'+
                    '<td><a href="javascript:void(0);" onclick="edit_table(&quot;'+table.tab_id+'&quot;);">编辑</a>｜<a onclick="del_table('+table.tab_id+');" href="javascript:(<?php echo 0?>)">删除</a></td>'+
                    '</tr>';
                $("#table_list_show").append(table);
            })
        });
        
        var add_type_line = '<tr id="add_type" style="border-bottom: 1px solid #e7eaec;">'+
                            '<td></td>'+
                            '<td colspan="5">'+
                            '<span><a href="javascript:(0)" onclick="addType()"><i class="fa fa-plus-square"></i>&nbsp;添加分类</a></span>'+
                            '</td>'+
                            '</tr>';
        
        $("#table_list_show").append(add_type_line);
        
    }
    
    //添加分类
    function addType() {//分类行
        var add_type = '<tr class="parent">'+
                        '<td>'+
                        '<input type="checkbox" class="i-checks" name="input[]">'+
                        '<span class="pull-right">'+
                        '<i class="fa fa-sort-desc"></i>'+
                        '</span>'+
                        '</td>'+
                        '<td>'+
//                        '<i class="fa fa-edit pointer" onclick="edit(this)">&nbsp;&nbsp;</i>'+
                        '<input name="add_tab_name" class="form-control edit" type="text" placeholder="四个字符"/>'+
//                        '<label class="control-label" style="font-weight:normal;">添加的行</label>'+
                        '</td>'+
                        '<td>'+
                        '<a href="javascript:sort_do();" class="max_a">&nbsp;</a>'+
                        '<a href="javascript:sort_do();" class="shang_a">&nbsp;</a>'+
                        '<a href="javascript:sort_do();" class="xia_a">&nbsp;</a>'+
                        '<a href="javascript:sort_do();" class="min_a">&nbsp;</a>'+
                        '</td>'+
                        '<td>90</td>'+
                        '<td><a href="#">删除</a></td>'+
                        '</tr>';
        $("#add_type").before(add_type);
        $("#save_type").removeClass('hidden')
    }
    
    //添加新的分类
    function save_type() {
        var add_type_list = $("input[name='add_tab_name']");
        for(i=0;i<add_type_list.length;i++){
            var obj = add_type_list[i]
            $.post("<?php echo site_url('admin/admin_table/table_type_add')?>",{type_name:obj.value,type_state:1},function (e) {
                
                var data = eval("("+e+")");

                var state = data.state;
                if( state === 1){
                    setContentUrl("<?php echo site_url("admin/admin_table/table_list") ?>");
                }else {
                    alert(data.msg)
                }
            });
        }
    }
    
    

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
    
    /**
     * 添加餐桌
     */
    function add_table() {
        var tab_name = $("#input_tab_name").val();
        var tab_person = $("#tab_person").val();
        var type_id = $("#type_id").val();
        
        $.post("<?php echo site_url("admin/admin_table/table_add")?>",{tab_name:tab_name,tab_person:tab_person,type_id:type_id},function (e) {
            if(parseInt(e) === -1){
                alert('已存在同名的餐桌，请核实!')
            }else if(parseInt(e) === -2) {
                alert('操作执行失败，请重试!')
            }else {
                $("#addTable").modal('hide');
                setContentUrl("<?php echo site_url("admin/admin_table/table_list") ?>");

//                $("#addtable").css("aria-hidden","true")
////                window.top.href = setContentUrl('< ?php ////echo site_url('/')?>////'+e)
//                console.log(e)
            }
        });
    }

    function update_table () {
        var tab_name = $("#e_input_tab_name").val();
        var tab_person = $("#e_tab_person").val();
        var type_id = $("#e_type_id").val();
        var tab_id = $("#tab_id").val();

        $.post("<?php echo site_url("admin/admin_table/table_update")?>",{tab_name:tab_name,tab_person:tab_person,type_id:type_id,tab_id:tab_id},function (e) {
            if(parseInt(e) === -1){
                alert('已存在同名的餐桌，请核实!')
            }else if(parseInt(e) === -2) {
                alert('操作执行失败，请重试!')
            }else {
                $("#editTable").modal('hide');
                setContentUrl("<?php echo site_url("admin/admin_table/table_list") ?>");
            }
        });
    }
    
    //删除餐桌
    function del_table(_tab_id){
        var isDel = false;
        if(confirm("确定要执行删除操作吗？")){
            isDel = true;
        }else{
            isDel = false;
        }
        //不删除
        if(!isDel){
            return;
        }else {
            $.get("<?php echo site_url('admin/admin_table/table_delete')?>",{tab_id:_tab_id},function (e) {
                var data = eval("("+e+")");
                var state = data.state;
                if(state === 1){
                    setContentUrl("<?php echo site_url("admin/admin_table/table_list") ?>");
                }else{
                    alert(data.msg)
                }
            })
        }
    }

    //删除餐桌分类
    function del_table_type(_type_id){
        var isDel = false;
        if(confirm("确定要执行删除操作吗？")){
            isDel = true;
        }else{
            isDel = false;
        }
        //不删除
        if(!isDel){
            return;
        }else {
            $.get("<?php echo site_url('admin/admin_table/table_type_delete')?>",{type_id:_type_id},function (e) {
                var data = eval("("+e+")");
                var state = data.state;
                if(state === 1){
                    setContentUrl("<?php echo site_url("admin/admin_table/table_list") ?>");
                }else{
                    alert(data.msg)
                }
            })
        }
    }

    function in_expand(type_id){
        var $obj = $(".gray-bg_"+type_id);
        if ($obj.is(':visible')){
            $obj.hide();
            $("#icon_"+type_id).addClass('fa-caret-right').removeClass('fa-sort-desc');

        }else {
            $obj.show();
            $("#icon_"+type_id).addClass('fa-sort-desc').removeClass('fa-caret-right');
        }
    }

    function checkAll(){
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
                $("input[name='table_"+type_id+"']").iCheck('check');
            } else {
                $("input[name='table_"+type_id+"']").iCheck('uncheck');
            }

        });
    }
    function leaf_check() {
        $(".table_checks").on('ifChanged', function(event){
            var show_id = $(this).val();
            if ($(this).is(':checked')){
                if ($.inArray(show_id,table_ids) == -1){
                    table_ids.push(show_id);
                }
            } else {
                var index = $.inArray(show_id,table_ids);
                table_ids.splice(index,1);
            }
        });
    }
    function batchDel(){
        if (table_ids.length <= 0){
            alert("请选择要进行删除的餐桌");
            return false;
        }
        if(!confirm("确定要执行批量删除吗？")){
            return false;
        }
        var queryData = {
            tab_id: table_ids,
            batch_value: -1
        };
        setContentUrl("<?php echo site_url("admin/admin_table/table_batch");?>",queryData);
    }
    function sort_do_1(type_id,sort_value,sort_id_1,sort_id_2,sort_id,sort_value_1,sort_value_2,sort_type){
        setContentUrl("<?php echo site_url('admin/admin_table/table_type_sort?sort_id=');?>"+sort_id+"&sort_value="+sort_value+"&sort_id_1="+sort_id_1+"&sort_id_2="+sort_id_2+"&sort_value_1="+sort_value_1+"&sort_value_2="+sort_value_2+"&sort_type="+sort_type+"&type_id="+type_id);
    }
    function sort_do(type_id,sort_value,sort_id_1,sort_id_2,sort_id,sort_value_1,sort_value_2,sort_type){
        setContentUrl("<?php echo site_url('admin/admin_table/table_sort?sort_id=');?>"+sort_id+"&sort_value="+sort_value+"&sort_id_1="+sort_id_1+"&sort_id_2="+sort_id_2+"&sort_value_1="+sort_value_1+"&sort_value_2="+sort_value_2+"&sort_type="+sort_type+"&type_id="+type_id);
    }

    function edit_table(tab_id){
        $.ajax({
            url:"<?php echo site_url('/admin/admin_table/table_update_show')?>?tab_id="+tab_id,
            type:'GET',
            dataType:'json',
            success:function(data){
                $("#e_input_tab_name").val('');
                $("#tab_id").val('');
                $("#e_tab_person").val('');
                $("#e_type_id").html('');
                $("#e_input_tab_name").val(data.table.tab_name);
                $("#tab_id").val(data.table.tab_id);
                $("#e_tab_person").val(data.table.tab_person);
                var checked = data.table.type_id;
                $.each(data.type_list,function (i,data) {
                    if (data.type_id == checked){
                        $("#e_type_id").append('<option value='+data.type_id+' selected>'+data.type_name+'</option>');
                    } else {
                        $("#e_type_id").append('<option value='+data.type_id+'>'+data.type_name+'</option>');
                    }
                });
                $('#editTable').modal('show');
            }
        });
    }

    
</script>
