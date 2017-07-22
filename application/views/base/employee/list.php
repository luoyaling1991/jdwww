<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">工号管理</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Work number management</h3>
    </div>
</div>
<div class="wrapper feed-element">
    <div class="ibox float-e-margins" style="margin-top:15px;">
        <div class="ibox-title">
            <ul class="nav nav-pills">
                <li><button class="btn btn-white" type="button"><a href="javascript:void(0);" onclick="add();" style="color: inherit;">添加工号</a></button>
                </li>
                <li><button class="btn btn-white" type="button" onclick="batch_del();">批量删除</button>
                </li>
            </ul>
        </div>
        <div class="ibox-content" style="height:500px;background-color:#fff;padding-top:0px;">
            <div class="table-responsive" style="margin-bottom:10px;">
                <table class="table table-striped dataTable">
                    <thead>
                    <tr>
                        <th>
                            <input id="check_all" type="checkbox" class="i-checks" style="position: absolute; opacity: 0;">
                        </th>
                        <th>ID</th>
                        <th>编号</th>
                        <th>姓名</th>
                        <th>电话</th>
                        <th>权限设置</th>
                        <th>员工状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody id="show_waiter_tab">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-12 m-t-sm">
        <div class="col-sm-6">
            <div class="dataTables_info" id="editable_info" role="alert" aria-live="polite" aria-relevant="all">显示 <span id="start_size"></span> 到 <span id="end_size"></span> 项，共 <?php echo $count; ?> 项</div>
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
    var waiter_list = eval(<?php echo $waiter_list ?>);
    var totalPage=parseInt(<?php echo $totalPage;?>);
    var page=parseInt(<?php echo $page;?>);
    var count=parseInt(<?php echo $count; ?>);
    var pageSize=parseInt(<?php echo $page_size; ?>);
    var userArr = [];
    $("#start_size").text(pageSize * (page -1)+1);
    $("#end_size").text(pageSize * page > count ? count : pageSize * page);
    console.log(waiter_list);
    $(document).ready(function() {
        show_waiter_list();
        parse_paginate();
        checkAll();
        checkUsers();
    });
    function show_waiter_list (){
        if (waiter_list.length > 0) {
            var show_waiter_str = "";
            var waiter_num = 0;
            var watier_num_str = "";
            var state = "";
            $.each(waiter_list, function(index, value){
                    console.log(value['waiter_state'] == '1');
                if (value['waiter_state'] == '1'){
                    state = "<span style='color:#5BB04B;'>启用</span>";
                } else {
                    state = "<span style='color:red;'>暂停</span>";
                }
                waiter_num = pageSize * (page -1) + index +1;
                if (waiter_num < 10) {
                    watier_num_str = "0"+waiter_num;
                } else {
                    watier_num_str = waiter_num;
                }
                show_waiter_str += '<tr>'+
                                '<td>'+
                                '<input type="checkbox" class="i-checks" name="input" value="'+value['waiter_id']+'" style="position: absolute; opacity: 0;">'+
                                '</td>'+
                                '<td>'+watier_num_str+'</td>'+
                                '<td>'+value['waiter_no']+'</td>'+
                                '<td>'+value['waiter_name']+'</td>'+
                                '<td>'+value['waiter_phone']+'</td>'+
                                '<td>'+value['waiter_jurisdiction']+'</td>'+
                                '<td>'+state+'</td>'+
                                '<td><a href="javascript:void(0);" onclick="update(&quot;'+value['waiter_id']+'&quot;);">编辑</a>｜<a href="javascript:void(0);" onclick="del(&quot;'+value['waiter_id']+'&quot;);">删除</a></td>'+
                                '</tr>';
            });
        }else {
            show_waiter_str = "<tr><td colspan='8' style='color:red; text-align: center;'>没有找到您想要的数据!</td></tr>";
        }
        $("#show_waiter_tab").html(show_waiter_str);
    }
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
            page_no: page_no

        }
        setContentUrl("<?php echo site_url('admin/admin_waiter/waiter_list');?>",queryData);
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
    function checkUsers(){
        $("input[name='input']").on('ifChanged', function (event) {
            var waiter_id = $(this).val();
            console.log(waiter_id);
            if ($(this).is(':checked')) {
                userArr.push(waiter_id);
            } else {
                var index = $.inArray(waiter_id,userArr);
                userArr.splice(index,1);
            }
        })
    }
    function batch_del () {
        if (userArr.length <= 0){
            alert("请选择要进行删除的员工");
            return false;
        }
        if(!confirm("确定要执行批量删除吗？")){
            return false;
        }
        var queryData = {
            waiter_id: userArr,
            batch_value: -1
        };
        setContentUrl("<?php echo site_url("admin/admin_waiter/waiter_batch");?>",queryData);
    }

    function del(waiter_id){
        if(!confirm("确定要执行批量删除吗？")){
            return false;
        }
        setContentUrl("<?php echo site_url("admin/admin_waiter/waiter_delete");?>?waiter_id="+waiter_id);
    }
    function add(){
        var url = '<?php echo site_url("admin/admin_waiter/waiter_add_show") ?>';
        setContentUrl(url);
    }

    function update(waiter_id) {
        var url = '<?php echo site_url("admin/admin_waiter/waiter_update_show") ?>?waiter_id='+waiter_id;
        setContentUrl(url);
    }
</script>
