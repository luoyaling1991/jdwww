<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">品类管理</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Category Manegement</h3>
    </div>
</div>
<div class="wrapper feed-element">
    <!--筛选及搜索行-->
    <div class="ibox row">
        <div class="col-lg-12" style="height:34px;line-height:34px;">
            <form id="form">
                <label class="control-label pull-left">筛选</label>
                <div class="col-md-7">
                    <div class="i-checks checkbox-inline">
                        <label class="">
                            <input type="checkbox" name="sys_type[]" value="0" style="position: absolute; opacity: 0;"/>
                            <label style="margin-left:5px;font-weight:normal;">全部</label>
                        </label>
                    </div>
                    <div class="i-checks checkbox-inline">
                        <label class="">
                            <input type="checkbox" name="sys_type[]" value="1" style="position: absolute; opacity: 0;">
                            <label style="margin-left:5px;font-weight:normal;">套餐</label>
                        </label>
                    </div>
                    <div class="i-checks checkbox-inline">
                        <label class="">
                            <input type="checkbox" name="sys_type[]" value="2" style="position: absolute; opacity: 0;">
                            <label style="margin-left:5px;font-weight:normal;">菜品</label>
                        </label>
                    </div>
                    <div class="i-checks checkbox-inline">
                        <label class="">
                            <input type="checkbox" name="sys_type[]" value="3" style="position: absolute; opacity: 0;">
                            <label style="margin-left:5px;font-weight:normal;">汤类</label>
                        </label>
                    </div>
                    <div class="i-checks checkbox-inline">
                        <label class="">
                            <input type="checkbox" name="sys_type[]" value="4" style="position: absolute; opacity: 0;">
                            <label style="margin-left:5px;font-weight:normal;">小吃</label>
                        </label>
                    </div>
                    <div class="i-checks checkbox-inline">
                        <label class="">
                            <input type="checkbox" name="sys_type[]" value="5" style="position: absolute; opacity: 0;">
                            <label style="margin-left:5px;font-weight:normal;">酒水</label>
                        </label>
                    </div>
                    <div class="i-checks checkbox-inline">
                        <label class="">
                            <input type="checkbox" name="sys_type[]" value="6" style="position: absolute; opacity: 0;">
                            <label style="margin-left:5px;font-weight:normal;">其他</label>
                        </label>
                    </div>
                </div>
                <label class="control-label pull-left" style="margin-right:12px;">状态</label>
                <select class="form-control pull-left" name="state" style="width:10%;">
                    <option value='-1'>全部</option>
                    <option value='1'>已上架</option>
                    <option value='0'>未上架</option>
                </select>
                <div class="input-group col-md-3 pull-right">
                    <input type="text" class="form-control"name="dish_name" placeholder="输入菜品名称"/>
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-primary" onclick="search();">搜索</button>
                    </span>
                </div>
            </form>
            <input type="hidden" name="sousuo_1" id="sousuo_1" value="{<?php echo "where_arr:$where_arr,type_id:$type_id"?>}">
            <input type="hidden" name="sousuo_2" id="sousuo_2" value="{<?php echo "where_arr:$where_arr,type_id:$type_id,asc_name:$asc_name,asc_type:$asc_type"?>}">
        </div>
    </div>
    <div class="float-e-margins m-t">
        <div class="ibox-title">
            <ul class="nav nav-pills">
                <li style="margin-top: 8px;margin-left: 12px;margin-right: 20px;"><input type="checkbox" class="i-checks" name="input[]">&nbsp;&nbsp;全选</li>
                <li style="margin-right: 10px;"><button class="btn btn-white" type="button">上架</button>
                </li>
                <li style="margin-right: 10px;"><button class="btn btn-white" type="button">下架</button>
                </li>
                <li style="margin-right: 10px;"><button class="btn btn-white" type="button">批量删除</button>
                </li>
            </ul>
        </div>
        <div class="ibox-content" style="height:500px;background-color:#fff;padding-top:0px;">
            <div class="table-responsive" style="margin-bottom:10px; height:95%;">
                <table class="table table-striped dataTable">
                    <thead>
                    <tr>
                        <th>
                            <div class="icheckbox_square-green" style="position: relative;">
                                <input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">

                            </div>
                        </th>
                        <th>ID</th>
                        <th>菜名</th>
                        <th class="sorting">单价</th>
                        <th class="sorting">销量</th>
                        <th>所属分类</th>
                        <th>状态</th>
                        <th class="sorting">发布时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $num=0;
                    $id = $page_sum;
                    foreach ($dish_list as $row) {
                    $num++;
                    $id++;
                    $type_name = $row['type_name'];
                    if (strlen($type_name) > 27) {
                        $type_name = substr($type_name, 0, 27) . "...";
                    }
                    $dish_id = $row['dish_id'];
                    $dish_name = $row['dish_name'];
                    $dish_price = $row['dish_price'];
                    $dish_count = $row['dish_count'];
                    $dish_state = $row['dish_state'];
                    $show_state = "<span color='red'>未上架</span>";
                    if ($dish_state == 1) {
                        $show_state = "<span color='#5BB04B'>已上架</span>";
                    }
                    $insert_time = $row['insert_time'];
                    $upd_a = site_url("admin/admin_dish/dish_update_show?dish_id=") . $dish_id;
                    $del_a = site_url("admin/admin_dish/dish_delete?dish_id=") . $dish_id;
                    echo "
                    <tr>
                        <td>
                            <input type='checkbox' class='i-checks' name='input[]' style='position: absolute; opacity: 0;'>
                        </td>
                        <td>{$id}</td>
                        <td><i class='fa fa-edit'></i>&nbsp;&nbsp;{$dish_name}</td>
                        <td>
                            <i class='fa fa-edit'></i>&nbsp;&nbsp;$dish_price
                        </td>
                        <td>$dish_count</td>
                        <td>$type_name</td>
                        <td>
                            $show_state
                        </td>
                        <td>$insert_time</td>
                        <td><a href='#'>编辑</a>｜<a href='#'>删除</a></td>
                    </tr>";
                    }
                    if($num==0){
                        echo "<tr><td colspan='9' style='color:red; text-align: center;'>没有找到您想要的数据!</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-6" style="font-size: 14px;font-weight: 400;">
                <span><a href="release_dishes.html"><i class="fa fa-plus-square"></i>&nbsp;发布新品</a></span>
				<span class="col-sm-offset-1"><a href="release_package.html"><i class="fa fa-plus-square"></i>&nbsp;发布套餐</a>
				</span>
            </div>
        </div>
    </div>
    <div class="col-sm-12 m-t-sm">
        <div class="col-sm-6">
            <div class="dataTables_info" id="editable_info" role="alert" aria-live="polite" aria-relevant="all">显示 <?php echo $page_sum +1?> 到 <?php echo $page_sum + $size > $count ? $count : $page_sum + $size ?> 项，共 <?php echo $count?> 菜品</div>
        </div>
        <div class="col-sm-6">
            <div class="dataTables_paginate paging_simple_numbers" id="editable_paginate">
                <ul class="pagination">
                    <li class="paginate_button previous" id="editable_previous"><a href="javascript:flip_do(-1);">上一页</a></li>
                    <?php
                    for($i=1;$i<=$totalPage;$i++){
                        $href="javascript:flip_do(&quot;$i&quot;);";
                        if($i==$page+1){
                            echo "<li class='paginate_button active'><a href='javascript:void(0);'>$i</a></li>";
                        }else{
                            echo "<li class='paginate_button'><a href='$href'>$i</a></li>";
                        }

                    }
                    ?>
                    <li class="paginate_button next" id="editable_next"><a href="javascript:flip_do(0);">下一页</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    var totalPage=parseInt(<?php echo $totalPage;?>);
    var page=parseInt(<?php echo $page;?>)+1;
    $(function(){
        if (totalPage ==1){
            $("#editable_previous").addClass("disabled");
            $("#editable_next").addClass("disabled");
        }else if(page <=1 ) {
            $("#editable_previous").addClass("disabled");
            $("#editable_next").removeClass("disabled");
        } else if (page>=totalPage) {
            $("#editable_next").addClass("disabled");
            $("#editable_previous").removeClass("disabled");
        }
    })
    function search(){
        console.log($('#form').serialize());
        setContentUrl("<?php echo site_url('admin/admin_dish/dish_list');?>",$("#form").serialize());
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
            page: page_no,
            where_arr:"<?php echo $where_arr?>",
            type_id:"<?php echo $type_id?>",
            asc_name:"<?php echo $asc_name?>",
            asc_type:"<?php echo $asc_type?>"

        }
        setContentUrl("<?php echo site_url('admin/admin_dish/dish_list_do');?>",queryData);
    }
</script>