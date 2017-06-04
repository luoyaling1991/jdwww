<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">发布套餐</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Release package</h3>
    </div>
</div>
<div class="wrapper feed-element">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <form method="get" class="form-horizontal" id="form" enctype="multipart/form-data">
                    <input type="hidden" name="set_id" id="set_id" value="<?php if(isset($set['set_id'])) { echo $set['set_id'];}?>">
                    <div class="form-group">
                        <label class="col-sm-1 control-label">名称设置</label>
                        <div class="col-md-6">
                            <input class="form-control" name="set_name" id="set_name" type="text" value="<?php if(isset($set['set_name'])){echo $set['set_name'];}?>"/>
                            <span id="set_name_1"></span>
                        </div>
                        <label class="control-label" style="font-weight:normal;color: #a0a0a0;">还能输入<span class="text-danger">6</span>个字</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">套餐介绍</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="set_desc" id="set_desc"><?php if(isset($set['set_desc'])){echo $set['set_desc'];}?></textarea>
                            <span id="set_desc_1"></span>
                        </div>
                        <label class="control-label" style="font-weight:normal;color: #a0a0a0;">还能输入<span class="text-danger">100</span>个字</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">菜品分类</label>
                        <div class="col-md-8" id="dish_types">
                            <?php
                            $num=0;
                            if (isset($type_list)){
                                foreach ($type_list as $row){
                                    $num++;
                                    $type_id=$row['type_id'];
                                    $type_name=$row['type_name'];
                                    if (isset($type_id_list) && in_array($type_id, $type_id_list)) {
                                        echo "<div class='checkbox i-checks checkbox-inline' style='margin-right:20px;'>
                                    <input type='checkbox' value='{$type_id}' name='dish_type[]' checked>
                                    <label style='padding:0px;width:100px;'>{$type_name}</label>
                                    </div>";
                                    }else{
                                        echo "<div class='checkbox i-checks checkbox-inline' style='margin-right:20px;'>
                                    <input type='checkbox' value='{$type_id}' name='dish_type[]'>
                                    <label style='padding:0px;width:100px;'>{$type_name}</label>
                                    </div>";
                                    }
                                    if($num%4==0){
                                        echo "<br>";
                                    }
                                }
                            }
                            if($num==0){
                                echo "<font color='red'>请先添加菜品分类信息.</font>";
                            }
                            ?>
                            <span id="dish_type_1"></span>
                        </div>
                        <label class="control-label" style="font-weight:normal;" data-toggle='modal' data-target='#addType'><a href="javascript:void(0);"><i class="fa fa-plus">添加分类</i></a></label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">上传图片</label>
                        <div class="col-sm-6">
                            <ul class="nav nav-tabs" id="avatar-tab">
                                <li class="active" id="upload"><a href="javascript:;">套餐图片</a>
                                </li>
                                <li style="margin-top: 10px;">提示：建议图片大小勿超过1M</li>
                            </ul>
                            <div class="m-t m-b">
                                <?php
                                $num=0;
                                if (isset($set['images'])) {
                                    foreach ($set['images'] as $value){
                                        if ($value) {
                                            $url = '/'.$value;
                                            echo "<div class='dish' name='img_$num' style='width:136px;height:100px;float:left;margin:0 15px 15px 0;'><img class='set_img' src='$url' width='136' height='100' style='cursor:pointer;border:2px solid rgb(175,175,180);' data-toggle='modal' data-target='#editImage' onclick='edit_img(this);'/><div class='div_class_img_small_a'>
                                               <p style='width:13px;'><a name='next' href='javascript:l_remove($num);'>
                                               <img src='/data/media/img/z.png' style='margin-bottom:5px;'>
                                                </a></p>
                                                <p style='width:30px;text-align: left;'><a name='prev' href='javascript:r_remove($num);'>
                                                <img src='/data/media/img/y.png' style='margin-left:10px;margin-bottom:5px;'>
                                                </a></p>
                                                <p style='width:30px; text-align: left;'><span name='text'></span></p>
                                                <p style='width:45px;'><a href='javascript:del_img($num);'>
                                                <img src='/data/media/img/red_x.png' style='margin-right:0;margin-bottom:4px;'>
                                                </a></p>
                                                </div></div>";
                                            $num++;
                                        }
                                    }
                                }
                                ?>
                                <img src="/data/images/add_img.png" width="136" height="100" onclick="selectFile();" style="margin:0 0 15px 0;cursor:pointer;" id="addContainer"/>
                                <input type="file" name="file1" id="file1" multiple="multiple" accept="image/jpg,image/jpeg,image/png,image/gif"  style="display:none;" onchange="return preFiles(this);" />
                                <input type="hidden" name="value_1" />
                                <input type="hidden" name="value_2" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">添加单品</label>
                        <div class="col-md-10" style="border:1px solid #ddd;background-color:#fff;">
                            <div style="width:45%;float:left;">
                                <input type="hidden" name="set_list" id="set_list" value=""/>
                                <table class="table" style="margin-bottom:0;">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th style="width:105px;">套餐单品</th>
                                        <th>单价</th>
                                        <th style="width:65px;">数量</th>
                                        <th style="width:110px;">排序</th>
                                    </tr>
                                    </thead>
                                </table>
                                <div style="height:300px;overflow-y:scroll;">
                                    <table class="table table-hover">
                                        <tbody style="position: relative;" id="tab_set_list">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div style="width:35%;float:left;">
                                <table class="table" style="margin-bottom:0;">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>全部单品</th>
                                        <th>单价</th>
                                        <th>销量</th>
                                    </tr>
                                    </thead>
                                </table>
                                <div style="height:300px;overflow-y:scroll;">
                                    <table class="table table-hover">
                                        <tbody id="tab_dish_list">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <table class="table" style="width:16%;">
                                <thead>
                                <th>筛选</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="checkbox i-checks">
                                            <input type="radio" name="sys_type" value="0" />
                                            <label style="margin-left:2px;font-weight:normal;">全部</label>
                                        </div>
                                        <div class="checkbox i-checks">
                                            <input type="radio" name="sys_type" value="1"/>
                                            <label style="margin-left:5px;font-weight:normal;">菜品</label>
                                        </div>
                                        <div class="checkbox i-checks">
                                            <input type="radio" name="sys_type" value="2"/>
                                            <label style="margin-left:5px;font-weight:normal;">汤类</label>
                                        </div>
                                        <div class="checkbox i-checks">
                                            <input type="radio" name="sys_type" value="3"/>
                                            <label style="margin-left:5px;font-weight:normal;">小吃</label>
                                        </div>
                                        <div class="checkbox i-checks">
                                            <input type="radio" name="sys_type" value="4"/>
                                            <label style="margin-left:5px;font-weight:normal;">酒水</label>
                                        </div>
                                        <div class="checkbox i-checks">
                                            <input type="radio" name="sys_type" value="5"/>
                                            <label style="margin-left:5px;font-weight:normal;">其他</label>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">设置价格</label>
                        <div class="col-md-2">
                            <input class="form-control" type="number" id="set_price" name="set_price" value="<?php if(isset($set['set_price'])){echo $set['set_price'];}?>"/>
                            <span id="set_price_1"></span>
                        </div>
                        <label class="control-label" style="font-weight:normal;">&nbsp;元</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">是否上架</label>
                        <div class="col-md-6">
                            <div class="radio i-checks radio-inline" style="margin-right: 20px;">
                                <input type="radio" name="set_state" value="1" <?php if (!isset($set['set_state'])){echo "checked";}else if($set['set_state']==1){echo "checked";}?>>
                                &nbsp;&nbsp;立即上架

                            </div>
                            <div class="radio i-checks radio-inline" style="margin-right: 20px;">
                                <input type="radio" name="set_state" value="0" <?php if(isset($set['set_state']) && $set['set_state']==0){echo "checked";} ?>>
                                &nbsp;&nbsp;暂不上架

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <button class="btn btn-w-m btn-primary" type="button" onclick="push();" >发&nbsp;&nbsp;布</button>
                            <button class="btn btn-white btn-w-m pull-right" type="cancel">重&nbsp;&nbsp;置</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--编辑图片弹出框-->
<div class="modal inmodal fade" id="editImage" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header" style="padding:12px 15px;border:0;">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span></button>
            </div>
            <div id="content" style="height: 460px;width:700px;float:left;">
                <img src="" style="margin:10px 18px 0 18px;max-width: 100%;" />
            </div>
            <div class="btn_group" style="float:right;height:460px;margin-right:20px;padding-top:100px;">
                <ul style="line-height: 30px;">
                    <li><button type="button" class="btn btn-w-m" data-method="rotate" data-option="-90" data-toggle="tooltip">左旋转</button></li>
                    <li><button type="button" class="btn btn-w-m" data-method="rotate" data-option="90" data-toggle="tooltip">右旋转</button></li>
                    <li><button type="button" class="btn btn-primary" data-method="getCroppedCanvas" data-toggle="tooltip" data-option='{"width": 800,"height": 600}'>保存</button></li>
                    <li><button type="button" class="btn btn-white" data-method="destroy" data-toggle="tooltip" data-dismiss="modal">取消</button></li>
                </ul>
            </div>
            <div class="modal-footer" style="border:0;">
            </div>
        </div>
    </div>
</div>
<!--添加分类弹出框-->
<div class="modal inmodal in" id="addType" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title text-danger">添加分类&nbsp;&nbsp;<span style="color: #a0a0a0;font-size: 20px;font-weight: normal;">Add Type</span></h4>
            </div>
            <div class="modal-body">
                <form method="post" class="form-horizontal" id="typeForm">
                    <div class="form-group">
                        <label class="col-md-3 control-label">分类名称</label>
                        <div class="col-md-8">
                            <input class="form-control" id="type_name" name="type_name" type="text" value="" placeholder="四个字以内"/>
                        </div>
                        <span id="dish_type_1"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="saveAddType();" data-dismiss="modal">保存</button>
                <button type="button" class="btn btn-white" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .div_class_img_small_a {
        padding-left: 10px;
        background-color: rgba(20,20,20,0.8);
        height: 20px;
        position: relative;
        top: -20px;
        color:#fff;
    }
    .div_class_img_small_a p {
        float:left;
        text-align: right;
    }
    .btn_group ul {
        list-style: none;
    }
    .btn_group ul li {
        margin-top:30px;
    }
</style>
<script>
    var dish_list=eval(<?php echo isset($dish_list_json) ? $dish_list_json : '({})';?>);
    var set_list=eval(<?php echo isset($set_list_json) ? $set_list_json : '({})';?>);
    $(document).ready(function () {
        set_list_show();
        dish_list_show();
        if ($("span[name='text']").eq(0)){
            $("span[name='text']").eq(0).text('小图');
        }
        if ($("span[name='text']").eq(1)){
            $("span[name='text']").eq(1).text('大图');
        }
        if ($("a[name='next']").eq(0).is(":visible")){
            $("a[name='next']").eq(0).hide();
        }
        $.each($("a[name='prev']"),function(index) {
            if(!$("a[name='prev']").eq(index).is(":visible")){
                $("a[name='prev']").eq(index).show();
            }
        })
        if ($("a[name='prev']").eq($("a[name='prev']").length - 1).is(":visible")){
            $("a[name='prev']").eq($("a[name='prev']").length - 1).hide();
        }
        $("input[type='radio']").on('ifChecked', function(event){ //ifCreated 事件应该在插件初始化之前绑定
            check_type();
        });
    });
    function saveAddType() {
        var e = event || window.event;
        var target = e.target || e.srcElement;
        var name = $('#type_name').val();
        if (name!=null && name!="" && name.length<5){
            $.post('<?php echo site_url('admin/admin_dish/dish_type_add')?>',{type_name:name},function (data){
                data=JSON.parse(data);
                $("#dish_types").append("<div class='checkbox i-checks checkbox-inline' style='margin-right:20px;'><input type='checkbox' value='"+data.type_id+"' name='dish_type[]' style='position: absolute; opacity: 0;'><label style='padding:0px;width:100px;'>"+data.type_name+"</label></div>");
                var num = $("#dish_types .i-checks").length;
                if(num%7==0){
                    $("#dish_types").append("<br>");
                }
                $("#addType").modal('hide');
                init_check();
            });
        }else{
            $("#dish_type_1").html("菜品分类名称只能4个字以内，且不能为空.");
            $("#dish_type_1").css("color","red");
        }
    }
    // 解析全部单品
    function dish_list_show(){
        //获取选中的属性值
        var sys_type= $('input[name="sys_type"]:checked').val();
        var num=1;
        var dish_list_num=0;
        $("#tab_dish_list").html("");
        $.each(dish_list, function(i, item) {
            var num_show=num;
            if(num<10){
                num_show="0"+num;
            }
            dish_list_num++;
            var i_sys_type = item.sys_type;
            if(sys_type== 0 || sys_type == undefined || sys_type == ''){
                num++;
                $("#tab_dish_list").append("<tr style='text-align:left;' onclick='check_one(&quot;"+item.dish_id+"&quot;,&quot;"+dish_list_num+"&quot;)'><td width='35px' style='padding-left:18px;'>"+num_show+"</td><td width='105px'>"+item.dish_name+"</td><td width='63px' style='font-weight:bold;color:#F00;'>"+item.dish_price+"</td><td width='70px' colspan='2'>"+item.dish_count+"</td></tr>");
            }else{
                if(i_sys_type==sys_type){
                    num++;
                    $("#tab_dish_list").append("<tr style='text-align:left;' onclick='check_one(&quot;"+item.dish_id+"&quot;,&quot;"+dish_list_num+"&quot;)'><td width='35px' style='padding-left:18px;'>"+num_show+"</td><td width='105px'>"+item.dish_name+"</td><td width='63px' style='font-weight:bold;color:#F00;'>"+item.dish_price+"</td><td width='70px' colspan='2'>"+item.dish_count+"</td></tr>");
                }
            }

        });
        if(num==1){
            $("#tab_dish_list").append("<tr><td  style='padding-left:15px;color:red;'>没有找到您想要的菜品.</td></tr>");
        }
    }
    //筛选数据
    function check_type(){
        dish_list_show();
    }
    //套餐数据解析
    function set_list_show(){
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
        var num=0;
        var price_sum=0;
        $("#tab_set_list").html("");

        $.each(objectList, function(i, item) {
            price_sum=parseInt(price_sum)+parseInt(item.dish_price)*parseInt(item.count);
            //自己的排序值
            var max="<a href='javascript:void(0);' onclick='sort_do(&quot;"+i+"&quot;,&quot;"+sum+"&quot;,&quot;0&quot;);' class='max_a'>&nbsp;</a>";
            var shang="<a href='javascript:void(0);' onclick='sort_do(&quot;"+i+"&quot;,&quot;"+sum+"&quot;,&quot;1&quot;);' class='shang_a'>&nbsp;</a>";
            var xia="<a href='javascript:void(0);' onclick='sort_do(&quot;"+i+"&quot;,&quot;"+sum+"&quot;,&quot;2&quot;);' class='xia_a'>&nbsp;</a>";
            var min="<a href='javascript:void(0);' onclick='sort_do(&quot;"+i+"&quot;,&quot;"+sum+"&quot;,&quot;3&quot;);' class='min_a'>&nbsp;</a>";
            var jia="<a href='javascript:void(0);' onclick='count_do(&quot;"+i+"&quot;,&quot;1&quot;);'><img src='<?php echo constant('ADMIN_SRC');?>media/img/sort/j.png' width='10'/></a>";
            var jan="<a href='javascript:void(0);' onclick='count_do(&quot;"+i+"&quot;,&quot;2&quot;);'><img src='<?php echo constant('ADMIN_SRC');?>media/img/sort/-.png' width='10'/></a>";
            num++;
            var num_show=num;
            if(num<10){
                num_show="0"+num;
            }
            $("#tab_set_list").append("<tr onclick='remove_check(&quot;"+item.dish_id+"&quot;,&quot;"+num+"&quot;)'><td style='width:41px;'>"+num_show+"</td><td style='width:105px;'>"+item.dish_name+"</td><td style='font-weight:bold;color:#F00;'>"+item.dish_price+"</td><td style='width:65px;'>"+jan+"&nbsp;"+item.count+"&nbsp;"+jia+"</td><td style='width:110px;'>"+max+shang+xia+min+"</td></tr>");
        });
        $("#old_price").html("");
        $("#old_price").append("(总价:"+price_sum+"元)");
        if(num==0){
            $("#tab_set_list").append("<tr><td  style='padding-left:15px;color:red;'>请从右侧菜品中选择菜品添加至套餐.</td></tr>");
        }
    }
    //选中数据
    function check_one(dish_id,num){
        num--;
        var dish=dish_list[num];
        dish['count']=1;
        var lenght=0;
        var numbers=new Array();
        dish['sort']=0;
        $.each(set_list, function(i, item) {
            numbers[lenght]=item.sort;
            lenght++;
        });
        var maxInNumbers = Math.max.apply(Math, numbers);
        if(maxInNumbers!="-Infinity"){
            dish['sort']=maxInNumbers+1;
        }
        set_list[lenght]=dish;
        dish_list.splice(num,1);
        dish_list_show();
        set_list_show();
    }
    // 移除选中的数据
    function remove_check(dish_id,num){
        num--;
        var dish=set_list[num];
        dish['count']=1;
        var lenght=0;
        var numbers=new Array();
        dish['sort']=0;
        $.each(dish_list, function(i, item) {
            numbers[lenght]=item.sort;
            lenght++;
        });
        var maxInNumbers = Math.max.apply(Math, numbers);
        if(maxInNumbers!="-Infinity"){
            dish['sort']=maxInNumbers+1;
        }
        dish_list[lenght]=dish;
        set_list.splice(num,1);
        dish_list_show();
        set_list_show();
    }
    // 套餐下的单品数量处理
    function count_do(num,type){
        var e = e || window.event;
        e.stopPropagation();
        if(type==1){
            count=set_list[num].count;
            set_list[num].count=parseInt(count)+parseInt(1);
        }else{
            count=set_list[num].count;
            if(count>1){
                set_list[num].count=count-1;
            }else{
                var dish=set_list[num];
                dish['count']=1;
            }
        }
        set_list_show();
    }
    //排序处理
    function sort_do(num,sum,sort_type){
        var e = e || window.event;
        e.stopPropagation();
        var sort_value_my=set_list[num].sort;
        if(sort_type==0){
            //最高
            sort_min=set_list[0].sort;
            set_list[num].sort=sort_min-1;
        }else if(sort_type==1){
            //上次排序值
            var shang=num-1;
            if(num==0){
                shang=0;
            }
            var sort_value_1=set_list[shang].sort;
            set_list[num].sort=sort_value_1;
            if(num!=0){
                set_list[shang].sort=sort_value_my;
            }
        }else if(sort_type==2){
            //下次排序值
            var xia=parseInt(num)+1;
            if(num==sum){
                xia=num;
            }
            var sort_value_2=set_list[xia].sort;
            set_list[num].sort=sort_value_2;
            if(num!=sum){
                set_list[xia].sort=sort_value_my;
            }
        }else if(sort_type==3){
            //最后一个
            sort_max=set_list[sum].sort;
            set_list[num].sort=sort_max+1;
        }
        set_list_show();
    }
    function push () {
        var valid = check_submit ();
        if (valid == false) {
            return false;
        }else {
            uploadBase64Images();
        }
    }
    var name_ok=1;
    function name_check(set_id){
        if($("#set_name").val()==""){
            $("#set_name").focus();
            $("#set_name_1").html("套餐名称不能为空.");
            $("#set_name_1").css("color","red");
            err_num++;
        }else{
            if($("#set_name").val().length>6){
                $("#set_name").focus();
                $("#set_name_1").html("套餐名称请控制在6个字符以内.");
                $("#set_name_1").css("color","red");
                err_num++;
            }else{
                var set_name=$("#set_name").val();
                $.post('<?php echo site_url('admin/admin_set/check_name')?>',{set_name:set_name,set_id:set_id},function (data){
                    data=eval(data);
                    if(data==0){
                        $("#set_name").focus();
                        name_ok=0;
                        $("#set_name_1").html("已存在同名套餐，请核实后调整.");
                        $("#set_name_1").css("color","red");
                    }else{
                        name_ok=1;
                        $("#set_name_1").css("color","#999999");
                    }
                });
            }
        }

    }
    function check_submit(){
        var err_num=0;
        if($("#set_name").val()==""){
            $("#set_name").focus();
            $("#set_name_1").html("套餐名称不能为空.");
            $("#set_name_1").css("color","red");
            err_num++;
        }else{
            if($("#set_name").val().length>6){
                $("#set_name").focus();
                $("#set_name_1").html("套餐名称请控制在6个字符以内.");
                $("#set_name_1").css("color","red");
                err_num++;
            }else{
                if(name_ok!=1){
                    $("#set_name_1").html("已存在同名套餐，请核实后调整.");
                    $("#set_name_1").css("color","red");
                    err_num++;
                }else{
                    $("#set_name_1").css("color","#999999");
                }

            }
        }
        if($("#set_price").val()==""){
            $("#set_price").focus();
            $("#set_price_1").html("请填写套餐价格.");
            $("#set_price_1").css("color","red");
            err_num++;
        }else{
            if(isNaN($('#set_price').val())){
                $("#set_price").focus();
                $("#set_price_1").html("套餐价格只能填写数字.");
                $("#set_price_1").css("color","red");
                err_num++;
            }else{
                $("#set_price_1").hide();
            }
        }
        if($("#set_desc").val()==""){
            $("#set_desc").focus();
            $("#set_desc_1").html("套餐介绍不能为空.");
            $("#set_desc_1").css("color","red");
            err_num++;
        }else{
            if($("#set_desc").val().length>100){
                $("#set_desc").focus();
                $("#set_desc_1").html("套餐介绍请控制在100个字符以内.");
                $("#set_desc_1").css("color","red");
                err_num++;
            }else{
                $("#set_desc_1").css("color","#999999");
            }
        }
        $check_num=$("input[type='checkbox']:checked").length;
        if($check_num==0){
            $("#dish_type_1").html("请为套餐分配菜品分类.");
            $("#dish_type_1").css("color","red");
            err_num++;
        }else{
            $("#set_type_1").css("color","#999999");
        }
        if($("#value_1").val()=="" || $("#value_2").val()==""){
            $("#show_1_tishi").show();
            $("#show_1_tishi").html("套餐的大小图片必须上传.");
            err_num++;
        }else{
            $("#show_1_tishi").hide();
        }
        var set_sum=0;
        $.each(set_list, function(i, item) {
            set_sum++;
        });
        if(set_sum==0){
            err_num++;
        }else{
            $("#set_list").val(JSON.stringify(set_list));
        }
        if(err_num>0){
            return false;
        }
        $(".btn_1").attr("disabled", "disabled");
    }
    function selectFile () {
        if ($('.set').length >= 2) {
            alert("套餐图片最多两张");
            return false;
        }
        $("#file1").click();
    }
    filesNum = 0 ;
    sort = 0;
    //预览图片
    function preFiles (o) {
        if (!o.files){
            alert('请使用支持HTML5的浏览器,如IE10+,Chrome,FireFox等.');
            return false;
        }else {
            var files = o.files;
            filesNum += files.length
            if (filesNum > 0) {
                if (filesNum > 2) {
                    alert("上传图片超过两张了，请重新选择");
                    filesNum = 0;
                    return false;
                }else {
                    $.each(files,function(index,file){
                        var reader = new FileReader();
                        reader.readAsDataURL(file);
                        reader.onload = function(e){
                            sort += <?php if (isset($set['images'])){echo count($set['images']);}else {echo 0;}  ?>;
                            var that = this;
                            $('#addContainer').before("<div class='set' name='img_"+sort+"' style='width:136px;height:100px;float:left;margin:0 15px 15px 0;'><img class='set_img' src='"+that.result+"' width='136' height='100' style='cursor:pointer;border:2px solid rgb(175,175,180);' data-toggle='modal' data-target='#editImage' onclick='edit_img(this);'/><div class='div_class_img_small_a'>"
                            +"<p style='width:13px;'><a name='next' href='javascript:l_remove("+sort+");'>"
                            +"<img src='/data/media/img/z.png' style='margin-bottom:5px;'>"
                            +"</a></p>"
                            +"<p style='width:30px;text-align: left;'><a name='prev' href='javascript:r_remove("+sort+");'>"
                            +"<img src='/data/media/img/y.png' style='margin-left:10px;margin-bottom:5px;'>"
                            +"</a></p>"
                            +"<p style='width:30px; text-align: left;'><span name='text'></span></p>"
                            +"<p style='width:45px;'><a href='javascript:del_img("+sort+");'>"
                            +"<img src='/data/media/img/red_x.png' style='margin-right:0;margin-bottom:4px;'>"
                            +"</a></p>"
                            +"</div></div>");
                            if ($("span[name='text']").eq(0)){
                                $("span[name='text']").eq(0).text('小图');
                            }
                            if ($("span[name='text']").eq(1)){
                                $("span[name='text']").eq(1).text('大图');
                            }
                            if ($("a[name='next']").eq(0).is(":visible")){
                                $("a[name='next']").eq(0).hide();
                            }
                            $.each($("a[name='prev']"),function(index) {
                                if(!$("a[name='prev']").eq(index).is(":visible")){
                                    $("a[name='prev']").eq(index).show();
                                }
                            })
                            if ($("a[name='prev']").eq($("a[name='prev']").length - 1).is(":visible")){
                                $("a[name='prev']").eq($("a[name='prev']").length - 1).hide();
                            }
                            sort++;
                        }
                    })
                    $('#file1').val('');
                }
            }
        }
    }
    // 图片向左移
    function l_remove(index) {
        var $currentImg = $("div[name='img_"+index+"']").eq(0).find("img").eq(0);
        var currentUrl = $currentImg.attr('src');
        var $nextImg = $("div[name='img_"+index+"']").eq(0).prev().find("img").eq(0);
        var nextUrl = $nextImg.attr('src');
        $currentImg.attr('src',nextUrl);
        $nextImg.attr('src',currentUrl);
    }
    // 图片向右移
    function r_remove(index) {
        var $currentImg = $("div[name='img_"+index+"']").eq(0).find("img").eq(0);
        var currentUrl = $currentImg.attr('src');
        var $nextImg = $("div[name='img_"+index+"']").eq(0).next().find("img").eq(0);
        var nextUrl = $nextImg.attr('src');
        $currentImg.attr('src',nextUrl);
        $nextImg.attr('src',currentUrl);
    }
    // 删除图片
    function del_img(index) {
        $("div[name='img_"+index+"']").eq(0).remove();
        filesNum--;
        if ($("span[name='text']").eq(0)){
            $("span[name='text']").eq(0).text('小图');
        }
        if ($("span[name='text']").eq(1)){
            $("span[name='text']").eq(1).text('大图');
        }
        if ($("a[name='next']").eq(0).is(":visible")){
            $("a[name='next']").eq(0).hide();
        }
        $.each($("a[name='prev']"),function(index) {
            if(!$("a[name='prev']").eq(index).is(":visible")){
                $("a[name='prev']").eq(index).show();
            }
        })
        if ($("a[name='prev']").eq($("a[name='prev']").length - 1).is(":visible")){
            $("a[name='prev']").eq($("a[name='prev']").length - 1).hide();
        }
    }
    var cropper;
    var currentImg;
    function edit_img(t) {
        currentImg = t;
        if (cropper) {
            $('#content > img').cropper('replace',$(t).attr('src'));
        }
        $('#content img').eq(0).attr('src', $(t).attr('src'));
        cropper = $('#content > img').cropper({
            minContainerWidth:700,
            minContainerHeight:460,
            minCanvasWidth:600,
            minCanvasHeight:400,
            crop: function(data) {
                // 出来裁切后的图片数据.
            }
        });
        // Tooltip
        $('[data-toggle="tooltip"]').tooltip();
        if (typeof document.createElement('cropper').style.transition === 'undefined') {
            $('button[data-method="rotateLeft"]').prop('disabled', true);
            $('button[data-method="rotateRight"]').prop('disabled', true);
        }
    }
    $('[data-toggle="tooltip"]').click(function() {
        var e = event || window.event;
        var target = e.target || e.srcElement;
        var result;
        var input;
        var data;
        if (!cropper) {
            return;
        }
        while (target !== this) {
            if (target.getAttribute('data-method')) {
                break;
            }
            target = target.parentNode;
        }
        if (target.disabled || target.className.indexOf('disabled') > -1) {
            return;
        }
        data = {
            method: target.getAttribute('data-method'),
            target: target.getAttribute('data-target'),
            option: target.getAttribute('data-option')
        };
        if (data.method) {
            if (data.method === 'getCroppedCanvas') {
                data.option = JSON.parse(data.option);
            }
            result = $('#content > img').cropper(data.method,data.option);
            switch (data.method) {
                case 'getCroppedCanvas':
                    if (result) {
                        fileImg = result.toDataURL('image/jpg');
                        $(currentImg).attr("src", fileImg);
                        $("#editImage").modal('hide');
                    }
                    break;

            }

            if (typeof result === 'object' && result !== cropper && input) {
                try {
                    input.value = JSON.stringify(result);
                } catch (e) {
                    console.log(e.message);
                }
            }
        }
    })
    function getEnableTextNum(t, num){
        $('#name_num').text(num - $(t).val().length < 0 ? 0 : num - $(t).val().length);
    }
    function uploadBase64Images () {
        var imgObj = $('.set_img');
        var imgs = [];
        var oldImgs = [];
        var data = [];
        for (var i = 0 ; i < imgObj.length; i++) {
            var obj = {
                'sort': i +1,
                'src': $(imgObj[i]).attr('src')
            }
            data.push(obj);
        }
        var grep = /\/data\/upload/;
        for(var i = 0; i < data.length; i++) {
            if(!grep.test(data[i].src)){
                imgs.push(data[i]);
            } else {
                data[i].src = data[i].src.replace('/', '');
                oldImgs.push(data[i]);
            }
        }
        if (imgs.length > 0) {
            $.ajax({
                url: '<?php echo site_url("admin/admin_dish/add_img")?>',
                type: 'POST',
                data: {data: imgs},
                timeout : 10000, //超时时间设置，单位毫秒
                success: function (result) {
                    console.log(result);
                    if (result) {
                        result = JSON.parse(result);
                        oldImgs = oldImgs.concat(result);
                        console.log(oldImgs);
                        $.each(oldImgs,function(index, value) {
                            var sort = value['sort'];
                            $("input[type='hidden'][name='value_"+sort+"']").val(value['src']);
                        })
                    }
                    // 新增修改记录
                    var formData = $('#form').serialize();
                    var set_id = "<?php if (isset($set['set_id'])){echo $set['set_id'];}?>";
                    var url = '<?php echo site_url("admin/admin_set/set_add");?>';
                    if (set_id) {
                        url = '<?php echo site_url("admin/admin_set/set_update");?>';
                    }
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: formData,
                        dataType: "json",
                        success: function (data, status) {//如果调用php成功
                            if (!data){
                                alert('操作执行失败，请重试!');
                            }else if (Number(data) == -1){
                                alert('已存在同名的套餐，请核实!');
                            } else {
                                setContentUrl('<?php echo site_url('admin/admin_dish_set/dish_set_list')?>');
                            }
                        }
                    });
                },
                error: function (returndata) {
                }
            });
        } else {
            // 新增修改记录
            $.each(oldImgs,function(index, value) {
                var sort = value['sort'];
                $("input[type='hidden'][name='value_"+sort+"']").val(value['src']);
            })
            var formData = $('#form').serialize();
            var set_id = "<?php if (isset($set['set_id'])){echo $set['set_id'];}?>";
            var url = '<?php echo site_url("admin/admin_set/set_add");?>';
            if (set_id) {
                url = '<?php echo site_url("admin/admin_set/set_update");?>';
            }
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                dataType: "json",
                success: function (data, status) {//如果调用php成功
                    if (!data){
                        alert('操作执行失败，请重试!');
                    }else if (Number(data) == -1){
                        alert('已存在同名的套餐，请核实!');
                    } else {
                        setContentUrl('<?php echo site_url('admin/admin_dish_set/dish_set_list')?>');
                    }
                }
            });
        }
    }
    function init_check(){
        $("#dish_types .i-checks").iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });
    }
</script>
