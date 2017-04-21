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
                <li style="margin-right: 20px;margin-left: 12px;margin-top: 6px;"><input type="checkbox" class="i-checks" name="input[]">&nbsp;&nbsp;全选</li>
                <li><button class="btn btn-white" type="button">批量删除</button>
                </li>
            </ul>
        </div>
        <div class="ibox-content">
            <div class="table-responsive" style="margin-bottom:10px;">
                <table class="table dataTable">
                    <thead>
                    <tr>
                        <th>
                            <input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">
                        </th>
                        <th>分类名称</th>
                        <th>排序</th>
                        <!-- <th>餐桌使用费(包间费)</th> -->
                        <th>容客数</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody id="table_list_show">
<!--                    <tr class="parent">-->
<!--                        <td>-->
<!--                            <input type="checkbox" class="i-checks" name="input[]">-->
<!--							<span class="pull-right">-->
<!--							   <i class="fa fa-sort-desc"></i>-->
<!--							</span>-->
<!--                        </td>-->
<!--                        <td>-->
<!--                            <i class="fa fa-edit pointer" onclick="edit(this)">&nbsp;&nbsp;</i>-->
<!--                            <input id="tab_name" name="tab_name" class="hidden form-control edit" type="text" value="--><?php //echo $type['type_name'];?><!--"/>-->
<!--                            <label class="control-label" style="font-weight:normal;">--><?php //echo $type['type_name']?><!--</label>-->
<!--                        </td>-->
<!--                        <td>-->
<!--                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","0");' class="max_a">&nbsp;</a>-->
<!--                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>-->
<!--                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>-->
<!--                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","3");' class="min_a">&nbsp;</a>-->
<!--                        </td>-->
<!--                         <td></td> -->
<!--                        <td>90</td>-->
<!--                        <td><a href="#">删除</a></td>-->
<!--                    </tr>-->
<!--                    <tr class="gray-bg">-->
<!--                        <td>-->
<!--                            <input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">-->
<!---->
<!--                        </td>-->
<!--                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/data/images/zhe.png">&nbsp;&nbsp;&nbsp;&nbsp;--><?php //echo $table_list[0]['tab_name']?><!--</td>-->
<!--                        <td>-->
<!--                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>-->
<!--                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>-->
<!--                        </td>-->
<!--                        <!-- <td>22</td> -->
<!--                        <td>--><?php //echo $table_list[0]['tab_person']?><!--</td>-->
<!--                        <td><a href="#">编辑</a>｜<a href="#">删除</a></td>-->
<!--                    </tr>-->
<!--                    <tr class="gray-bg">-->
<!--                        <td>-->
<!--                            <input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">-->
<!--                        </td>-->
<!--                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/data/images/zhe.png">&nbsp;&nbsp;&nbsp;&nbsp;--><?php //echo $table_list[1]['tab_name']?><!--</td>-->
<!--                        <td>-->
<!--                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>-->
<!--                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>-->
<!--                        </td>-->
<!--                        <!-- <td>22</td> -->
<!--                        <td>--><?php //echo $table_list[1]['tab_person']?><!--</td>-->
<!--                        <td><a href="#">编辑</a>｜<a href="#">删除</a></td>-->
<!--                    </tr>-->
<!--                    <tr class="gray-bg">-->
<!--                        <td>-->
<!--                            <input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">-->
<!--                        </td>-->
<!--                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/data/images/zhe.png">&nbsp;&nbsp;&nbsp;&nbsp;--><?php //echo $table_list[2]['tab_name']?><!--</td>-->
<!--                        <td>-->
<!--                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>-->
<!--                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>-->
<!--                        </td>-->
<!--                        <!-- td>22</td> -->
<!--                        <td>--><?php //echo $table_list[2]['tab_person']?><!--</td>-->
<!--                        <td><a href="#">编辑</a>｜<a href="#">删除</a></td>-->
<!--                    </tr>-->
                    
<!--                    <tr style="border-bottom: 1px solid #e7eaec;">-->
<!--                        <td></td>-->
<!--                        <td colspan="5">-->
<!--                            <span><a href="#"><i class="fa fa-plus-square"></i>&nbsp;添加分类</a></span>-->
<!--                        </td>-->
<!--                    </tr>-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-12 m-t-sm">
        <div class="col-sm-6">
            <div class="dataTables_info" id="editable_info" role="alert" aria-live="polite" aria-relevant="all">显示 1 到 10 项，共 57 项</div>
        </div>
        <div class="col-sm-6">
            <div class="dataTables_paginate paging_simple_numbers" id="editable_paginate">
                <ul class="pagination">
                    <li class="paginate_button previous disabled" aria-controls="editable" tabindex="0" id="editable_previous"><a href="#">上一页</a></li>
                    <li class="paginate_button active" aria-controls="editable" tabindex="0"><a href="#">1</a></li>
                    <li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">2</a></li>
                    <li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">3</a></li>
                    <li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">4</a></li>
                    <li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">5</a></li>
                    <li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">6</a></li>
                    <li class="paginate_button next" aria-controls="editable" tabindex="0" id="editable_next"><a href="#">下一页</a></li>
                </ul>
            </div>
        </div>
        <div class="m-t-sm"><button id="save_type" onclick="save_type()" class="hidden btn btn-w-m btn-primary" type="button">保&nbsp;&nbsp;存</button></div>
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

<script type="application/javascript">
    
    //餐桌数据
    var table_list_json = eval(<?php echo $table_list?>);
    //分类数据
    var tab_list_json = eval(<?php echo $type_list?>);
    
    //显示table分类及餐桌分类信息
    function showTableList(_table_list_json,_tab_list_json,_page){
        //添加餐桌数据下拉框
        $.each(_tab_list_json,function (i,data) {
            $("#type_id").append('<option value='+data.type_id+'>'+data.type_name+'</option>');
        });

        //显示餐桌与分类
        $.each(_tab_list_json,function (i,item) {

            //分类行
            var tab = '<tr class="parent">'+
                '<td>'+
                '<input type="checkbox" class="i-checks" name="input[]">'+
                '<span class="pull-right">'+
                '<i class="fa fa-sort-desc"></i>'+
                '</span>'+
                '</td>'+
                '<td>'+
                '<i class="fa fa-edit pointer" onclick="edit(this)">&nbsp;&nbsp;</i>'+
                '<input id="tab_name" name="tab_name" class="hidden form-control edit" type="text" value="'+item.type_name+'"/>'+
                '<label class="control-label" style="font-weight:normal;">'+item.type_name+'</label>'+
                '</td>'+
                '<td>'+
                '<a href="javascript:sort_do();" class="max_a">&nbsp;</a>'+
                '<a href="javascript:sort_do();" class="shang_a">&nbsp;</a>'+
                '<a href="javascript:sort_do();" class="xia_a">&nbsp;</a>'+
                '<a href="javascript:sort_do();" class="min_a">&nbsp;</a>'+
                '</td>'+
                '<td>90</td>'+
                '<td><a onclick="del_table_type('+item.type_id+');" href="javascript:(<?php echo 0?>)">删除</a></td>'+
                '</tr>';



            $("#table_list_show").append(tab);

            var table_list = eval(_table_list_json[i])
            $.each(table_list,function (j,table) {

                //餐桌名称行
                var table = '<tr class="gray-bg">'+
                    '<td>'+
                    '<input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">'+
                    '</td>'+
                    '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/data/images/zhe.png">&nbsp;&nbsp;&nbsp;&nbsp;'+table.tab_name+'</td>'+
                    '<td>'+
                    '<a href="javascript:sort_do("-5","41","21","20","-13","-6","1");" class="shang_a">&nbsp;</a>'+
                    '<a href="javascript:sort_do("-5","41","21","20","-13","-6","2");" class="xia_a">&nbsp;</a>'+
                    '</td>'+
                    '<td>'+table.tab_person+'</td>'+
                    '<td><a href="#">编辑</a>｜<a onclick="del_table('+table.tab_id+');" href="javascript:(<?php echo 0?>)">删除</a></td>'+
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
    showTableList(table_list_json,tab_list_json,0);
    
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
            console.log(obj.value)
            $.post("<?php echo site_url('admin/admin_table/table_type_add')?>",{type_name:obj.value,type_state:1},function (e) {
                
                var data = eval("("+e+")");
                console.log(data)

                var state = data.state;
                if( state === 1){
                    setContentUrl('<?php echo site_url("")?>'+data.msg);
                }else {
                    alert(data.msg)
                }
            });
        }
    }
    
    
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
            console.log(isEdit);
        }
    }
    
    /**
     * 添加餐桌
     */
    function add_table() {
        var tab_name = $("#input_tab_name").val();
        var tab_person = $("#tab_person").val();
        var type_id = $("#type_id").val();
        
        console.log(tab_name)
        console.log(tab_person)
        console.log(type_id)
        
        $.post("<?php echo site_url("admin/admin_table/table_add")?>",{tab_name:tab_name,tab_person:tab_person,type_id:type_id},function (e) {
            if(parseInt(e) === -1){
                alert('已存在同名的餐桌，请核实!')
            }else if(parseInt(e) === -2) {
                alert('操作执行失败，请重试!')
            }else {
//                $("#addtable").css("aria-hidden","true")
////                window.top.href = setContentUrl('< ?php ////echo site_url('/')?>////'+e)
//                console.log(e)
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
            console.log(_tab_id)
            $.get("<?php echo site_url('admin/admin_table/table_delete')?>",{tab_id:_tab_id},function (e) {
                var data = eval("("+e+")");
                var state = data.state;
                if(state === 1){
                    setContentUrl('<?php echo site_url("")?>' + data.msg)
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
            console.log(_type_id)
            $.get("<?php echo site_url('admin/admin_table/table_type_delete')?>",{type_id:_type_id},function (e) {
                var data = eval("("+e+")");
                var state = data.state;
                if(state === 1){
                    setContentUrl('<?php echo site_url("")?>' + data.msg)
                }else{
                    alert(data.msg)
                }
            })
        }
    }
    
</script>
