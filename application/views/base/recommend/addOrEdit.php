<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;"><?php if (isset($big)){echo '编辑推荐';}else{echo '添加推荐';} ?></h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Add recommendation</h3>
    </div>
</div>
<div class="wrapper feed-element">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <form method="POST" class="form-horizontal" id="form" enctype="multipart/form-data">
                    <input type="hidden" name="show_id" value="<?php echo isset($big['show_id']) ? $big['show_id'] : '' ?>">
                    <input type="hidden" name="dish_type_id" value="<?php if (isset($type_id)){echo $type_id;}else if (isset($big['dish_type_id'])){echo $big['dish_type_id'];}?>">
                    <input type="hidden" name="data_id" id="data_id" value="<?php echo isset($big['data_id']) ? $big['data_id'] : ''?>">
                    <input type="hidden" name="big_img_1_value" />
                    <div class="form-group">
                        <label class="col-sm-1 control-label">推荐类型</label>
                        <div class="col-md-6">
                            <div class="radio i-checks radio-inline radio-item" style="margin-right: 20px;">
                                <input type="radio" class="type" value="0" name="show_type" <?php if (!isset($big['show_type'])){echo 'checked';}else if ($big['show_type'] == 0){echo 'checked';} ?>>
                                &nbsp;&nbsp;活动推荐
                            </div>
                            <div class="radio i-checks radio-inline radio-item">
                                <input type="radio" class="type" value="1" name="show_type" <?php if (isset($big['show_type']) && $big['show_type'] == 1){echo 'checked';}?>>
                                &nbsp;&nbsp;菜品推荐
                            </div>
                            <div class="radio i-checks radio-inline radio-item">
                                <input type="radio" class="type" value="2" name="show_type"<?php if (isset($big['show_type']) && $big['show_type'] == 2){echo 'checked';}?>>
                                &nbsp;&nbsp;套餐推荐
                            </div>
                        </div>
                    </div>
                    <div id="active-content" class="show">
                        <div class="form-group">
                            <label class="col-sm-1 control-label">活动标题</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="show_name" id="show_name" value="<?php if(isset($big['show_name'])){echo $big['show_name'];} ?>"/>
                                </br><span id="show_name_1"></span>
                            </div>
                            <label class="control-label" style="font-weight:normal;">&nbsp;还能输入<span class="text-danger">10</span>个字</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">活动内容</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="show_desc" id="show_desc"><?php if(isset($big['show_desc'])){echo $big['show_desc'];}?></textarea>
                                </br><span id="show_desc_1"></span>
                            </div>
                            <label class="control-label" style="font-weight:normal;">&nbsp;还能输入<span class="text-danger">100</span>个字</label>
                        </div>
                    </div>
                    <div id="dishes-content" class="hidden">
                        <div class="form-group">
                            <label class="col-sm-1 control-label">选择菜品</label>
                            <div class="col-md-9" style="border:1px solid #ddd;background-color:#fff;">
                                <div style="width:78%;float:left;">
                                    <table class="table" style="margin-bottom:0;">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>全部菜品</th>
                                            <th>单价</th>
                                            <th>销量</th>
                                        </tr>
                                        </thead>
                                    </table>
                                    <div style="height:300px;overflow-y:scroll;">
                                        <table class="table table-hover top-no-border" style="max-height:250px;">
                                            <tbody id="tab_dish_list">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <table class="table" style="width:22%;">
                                    <thead>
                                    <th>筛选</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="checkbox i-checks">
                                                <label class="">
                                                    <input type="radio" value="0" name="sys_type" style="position: absolute; opacity: 0;"/>

                                                    <label style="margin-left:5px;font-weight:normal;">全部</label>
                                                </label>
                                            </div>
                                            <div class="checkbox i-checks">
                                                <label class="">
                                                    <input type="radio" value="1" name="sys_type" style="position: absolute; opacity: 0;">

                                                    <label style="margin-left:5px;font-weight:normal;">菜品</label>
                                                </label>
                                            </div>
                                            <div class="checkbox i-checks">
                                                <label class="">
                                                    <input type="radio" value="2" name="sys_type" style="position: absolute; opacity: 0;">

                                                    <label style="margin-left:5px;font-weight:normal;">汤类</label>
                                                </label>
                                            </div>
                                            <div class="checkbox i-checks">
                                                <label class="">
                                                    <input type="radio" value="3" name="sys_type" style="position: absolute; opacity: 0;">

                                                    <label style="margin-left:5px;font-weight:normal;">小吃</label>
                                                </label>
                                            </div>
                                            <div class="checkbox i-checks">
                                                <label class="">
                                                    <input type="radio" value="4" name="sys_type" style="position: absolute; opacity: 0;">

                                                    <label style="margin-left:5px;font-weight:normal;">酒水</label>
                                                </label>
                                            </div>
                                            <div class="checkbox i-checks">
                                                <label class="">
                                                    <input type="radio" value="5" name="sys_type" style="position: absolute; opacity: 0;">

                                                    <label style="margin-left:5px;font-weight:normal;">其他</label>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <span id="check_show_1"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">优惠价钱</label>
                            <div class="col-md-2">
                                <input class="form-control" type="number" name="dish_price" id="dish_price" value="<?php if(isset($big['dish_price'])){echo $big['dish_price'];}?>"/>
                            </div>
                            <label class="control-label" style="font-weight:normal;">&nbsp;元&nbsp;<span id="old_price"></span></label>
                        </div>
                    </div>
                    <div id="set-content" class="hidden">
                        <div class="form-group">
                            <label class="col-sm-1 control-label">选择套餐</label>
                            <div class="col-md-9" style="border:1px solid #ddd;background-color:#fff;">
                                <table class="table" style="margin-bottom:0;">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>全部套餐</th>
                                        <th>单价</th>
                                        <th>销量</th>
                                    </tr>
                                    </thead>
                                </table>
                                <div style="height:300px;overflow-y:scroll;">
                                    <table class="table table-hover top-no-border" style="max-height:250px;">
                                        <tbody id="tab_set_list">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group show" id="upload_image">
                        <label class="col-sm-1 control-label">上传图片</label>
                        <div class="col-sm-6">
                            <ul class="nav nav-tabs" id="avatar-tab">
                                <li style="margin-top: 10px;">提示：请选择上传一张宽高比<span style="color:red;">3:1</span>的推荐栏大图，建议图片大小勿超过2M</li>
                            </ul>
                            <div class="m-t m-b" id="tab_show_img">

                            </div>
                            <br><span id="show_img_1"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">是否上架</label>
                        <div class="col-md-6">
                            <div class="radio i-checks radio-inline" style="margin-right: 20px;">

                                <input type="radio" value="1" name="show_state" <?php if(!isset($big['show_state'])){echo 'checked';}else if($big['show_state'] == 1){echo 'checked';}?>>

                                &nbsp;&nbsp;立即上架

                            </div>
                            <div class="radio i-checks radio-inline">

                                <input type="radio" value="0" name="show_state" <?php if(isset($big['show_state'])&& $big['show_state'] == 0){echo 'checked';}?>>

                                &nbsp;&nbsp;暂不上架

                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:55px;">
                        <div class="col-sm-3">
                            <button class="btn btn-w-m btn-primary" id="push" type="button" onclick="add_show();">确&nbsp;&nbsp;定</button>
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
        float:right;
        text-align: right;
        margin-right:5px;
    }
    .btn_group ul {
        list-style: none;
    }
    .btn_group ul li {
        margin-top:30px;
    }
</style>
<script>
    var dish_list = eval(<?php echo isset($dish_list) ? $dish_list : "({})"?>);
    var set_list = eval(<?php echo isset($set_list) ? $set_list : "({})"?>);
    var $selectedvalue = "<?php echo isset($big['show_type']) ? $big['show_type'] : 0?>";
    var show_img = "<?php echo isset($big['show_img']) ? $big['show_img'] : ''?>";
    var data_id = "<?php echo isset($big['data_id']) ? $big['data_id'] : ''?>";
    $(document).ready(function () {
        $("input[name='show_type']").on('ifChecked', function(event){ //ifCreated 事件应该在插件初始化之前绑定
            $selectedvalue = $(this).val();
            select_show();
        });
        $("input[name='sys_type']").on('ifChecked',function(event){
            show_dish_list();
        });
        select_show();
        show_dish_list();
        show_set_list();
        show_image();

    });
    function select_show() {
        if ($selectedvalue == 1) {
            $("#active-content").removeClass("show").addClass("hidden");
            $("#dishes-content").removeClass("hidden").addClass("show");
            $("#set-content").removeClass("show").addClass("hidden");
            $("#upload_image").removeClass("hidden").addClass("show");
        } else if ($selectedvalue == 2){
            $("#active-content").removeClass("show").addClass("hidden");
            $("#dishes-content").removeClass("show").addClass("hidden");
            $("#set-content").removeClass("hidden").addClass("show");
            $("#upload_image").removeClass("show").addClass("hidden");
        } else {
            $("#active-content").removeClass("hidden").addClass("show");
            $("#dishes-content").removeClass("show").addClass("hidden");
            $("#set-content").removeClass("show").addClass("hidden");
            $("#upload_image").removeClass("hidden").addClass("show");
        }
    }
    function show_dish_list() {
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
            var dish_id = item.dish_id;
            if(sys_type== 0 || sys_type == undefined || sys_type == ''){
                num++;
                if (dish_id == data_id){
                    $("#old_price").text('(原价为：'+item.dish_old_price +'元)');
                    $("#tab_dish_list").append("<tr class='active' onclick='check_one(this,&quot;"+item.dish_id+"&quot;,&quot;"+item.dish_name+"&quot;,&quot;"+item.dish_old_price+"&quot;)'><td>"+num_show+"</td><td>"+item.dish_name+"</td><td>"+item.dish_old_price+"</td><td>"+item.dish_count+"</td></tr>");
                }else {
                    $("#tab_dish_list").append("<tr onclick='check_one(this,&quot;"+item.dish_id+"&quot;,&quot;"+item.dish_name+"&quot;,&quot;"+item.dish_old_price+"&quot;)'><td>"+num_show+"</td><td>"+item.dish_name+"</td><td>"+item.dish_old_price+"</td><td>"+item.dish_count+"</td></tr>");
                }
            }else{
                if(i_sys_type==sys_type){
                    num++;
                    if (dish_id == data_id){
                        $("#old_price").text('(原价为：'+item.dish_old_price +'元)');
                        $("#tab_dish_list").append("<tr class='active' onclick='check_one(this,&quot;"+item.dish_id+"&quot;,&quot;"+item.dish_name+"&quot;,&quot;"+item.dish_old_price+"&quot;)'><td>"+num_show+"</td><td>"+item.dish_name+"</td><td>"+item.dish_old_price+"</td><td>"+item.dish_count+"</td></tr>");
                    }else {
                        $("#tab_dish_list").append("<tr onclick='check_one(this,&quot;"+item.dish_id+"&quot;,&quot;"+item.dish_name+"&quot;,&quot;"+item.dish_old_price+"&quot;)'><td>"+num_show+"</td><td>"+item.dish_name+"</td><td>"+item.dish_old_price+"</td><td>"+item.dish_count+"</td></tr>");
                    }
                }
            }

        });
        if (num == 1){
            $("#tab_dish_list").append("<tr><td  style='padding-left:15px;color:red;'>没有找到您想要的菜品.</td></tr>");
        }
    }
    function show_set_list() {
        var num = 1;
        var set_list_str = "";
        $.each(set_list,function(i,item){
            var num_show = num;
            if(num<10){
                num_show="0"+num;
            }
            var set_id = item.set_id;
            if (set_id == data_id){
                set_list_str += '<tr class="active" onclick="check_one(this,&quot;'+item.set_id+'&quot;)">'+
                '<td>'+num_show+'</td>'+
                '<td>'+item.set_name+'</td>'+
                '<td>'+item.set_price+'</td>'+
                '<td am-mode="no-border">'+item.set_count+'</td>'+
                '</tr>';
            } else {
                set_list_str += '<tr onclick="check_one(this,&quot;'+item.set_id+'&quot;)">'+
                '<td>'+num_show+'</td>'+
                '<td>'+item.set_name+'</td>'+
                '<td>'+item.set_price+'</td>'+
                '<td am-mode="no-border">'+item.set_count+'</td>'+
                '</tr>';
            }

            num++;
        });
        if (num == 1){
            set_list_str += "<tr><td  style='padding-left:15px;color:red;'>没有找到您想要的套餐.</td></tr>";
        }
        $("#tab_set_list").html(set_list_str);
    }
    function show_image() {
        var show_img_str = "";
        $("#tab_show_img").html("");
        if (show_img){
            var url = '/'+show_img;
            show_img_str = '<div style="width:360px;height:120px;float:left;margin:0 15px 15px 0;">' +
                                '<img id="show_img" src="'+url+'" width="360" height="120" style="cursor:pointer;border:2px solid rgb(175,175,180);" data-toggle="modal" data-target="#editImage" onclick="edit_img(this);"/><div class="div_class_img_small_a">'+
                                '<p><a href="javascript:del_img();">'+
                                '<img src="/data/media/img/red_x.png" style="margin-right:0;margin-bottom:4px;">'+
                                '</a></p>'+
                                '</div></div>';

        } else {
            show_img_str = '<img src="/data/images/add_img.png" width="136" height="100" onclick="selectFile();" style="margin:0 0 15px 0;cursor:pointer;" id="addContainer"/>'+
                            '<input type="file" name="file1" id="file1" accept="image/jpg,image/jpeg,image/png,image/gif"  style="display:none;" onchange="return preFile(this);" />';

        }
        $("#tab_show_img").html(show_img_str);
    }
    function del_img() {
        show_img = "";
        show_image();
    }
    function preFile(o) {
        if (!o.files){
            alert('请使用支持HTML5的浏览器,如IE10+,Chrome,FireFox等.');
            return false;
        }else {
            var file = o.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(file);
            var show_img_str = "";
            reader.onload = function(e){
                show_img_str = '<div style="width:360px;height:120px;float:left;margin:0 15px 15px 0;">' +
                '<img id="show_img" src="'+this.result+'" width="360" height="120" style="cursor:pointer;border:2px solid rgb(175,175,180);" data-toggle="modal" data-target="#editImage" onclick="edit_img(this);"/><div class="div_class_img_small_a">'+
                '<p><a href="javascript:del_img();">'+
                '<img src="/data/media/img/red_x.png" style="margin-right:0;margin-bottom:4px;">'+
                '</a></p>'+
                '</div></div>';
                $("#tab_show_img").html(show_img_str);
                $('#file1').val('');
            }
        }
    }
    function selectFile () {
        $("#file1").click();
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
    });
    function check_one(o,dish_id,dish_name,old_price){
        $("#old_price").text("");
        $("#tab_dish_list tr").removeClass('active');
        $("#tab_set_list tr").removeClass('active');
        $(o).addClass('active');
        data_id = dish_id;
        $("#data_id").val(dish_id);
        $("#show_name").val(dish_name);
        if (old_price){
            $("#old_price").text('(原价为：'+old_price +'元)');
        }
    }
    function add_show() {
        var valid = check_submit ();
        if (valid == false) {
            return false;
        }else {
            uploadBase64Images();
        }
    }
    function check_submit(){
        var err_num=0;
        var show_type=$('input[name="show_type"]:checked ').val();
        if(show_type==0){
            if($("#show_name").val()==""){
                $("#show_name").focus();
                $("#show_name_1").html("活动名称不能为空.");
                $("#show_name_1").css("color","red");
                err_num++;
            }else{
                if($("#show_name").val().length>20){
                    $("#show_name").focus();
                    $("#show_name_1").html("活动名称请控制在10个字符以内.");
                    $("#show_name_1").css("color","red");
                    err_num++;
                }else{
                    $("#show_name_1").css("color","#999999");
                }
            }
            if(!$("#show_img")){
                $("#show_img_1").html("请上传推荐图片.");
                $("#show_img_1").css("color","red");
                err_num++;
            }
            if($("#show_desc").val()==""){
                $("#show_desc").focus();
                $("#show_desc_1").html("活动介绍不能为空.");
                $("#show_desc_1").css("color","red");
                err_num++;
            }else{
                if($("#show_desc").val().length>500){
                    $("#show_desc").focus();
                    $("#show_desc_1").html("活动介绍请控制在500个字符以内.");
                    $("#show_desc_1").css("color","red");
                    err_num++;
                }else{
                    $("#show_desc_1").css("color","#999999");
                }
            }
        }else if(show_type==1){
            if(data_id==""){
                $("#check_show_1").html("请先选择推荐菜品.");
                $("#check_show_1").css("color","red");
                err_num++;
            }else{
                $("#check_show_1").hide();
            }
            if($("#dish_price").val()==""){
                $("#dish_price").focus();
                $("#dish_price_1").html("请填写优惠现价.");
                $("#dish_price_1").css("color","red");
                err_num++;
            }else{
                if(isNaN($('#dish_price').val())){
                    $("#dish_price").focus();
                    $("#dish_price_1").html("优惠现价只能填写数字.");
                    $("#dish_price_1").css("color","red");
                    err_num++;
                }else{
                    $("#dish_price_1").hide();
                }
            }
            if(!$("#show_img")){
                $("#show_img_1").html("请上传推荐图片.");
                $("#show_img_1").css("color","red");
                err_num++;
            }else{
                $("#show_img_1").css("color","#999999");
            }
        }else if(show_type==2){
            if(data_id==""){
                $("#check_show_1").html("请先选择推荐套餐.");
                $("#check_show_1").css("color","red");
                err_num++;
            }else{
                $("#check_show_1").hide();
            }
        }
        if(err_num>0){
            return false;
        }$("#push").attr("disabled", "disabled");
    }
    function uploadBase64Images () {
        var imgObj = $('#show_img');
        var imgs = [];
        var oldImgs = [];
        var data = [];
        if (imgObj.length > 0) {
            var obj = {
                'sort': 1,
                'src': imgObj.attr('src')
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
                    if (result) {
                        result = JSON.parse(result);
                        oldImgs = oldImgs.concat(result);
                        $.each(oldImgs,function(index, value) {
                            $("input[type='hidden'][name='big_img_1_value']").val(value['src']);
                        })
                    }
                    // 新增修改记录
                    var formData = $('#form').serialize();
                    var show_id = "<?php if (isset($big['show_id'])){echo $big['show_id'];}?>";
                    var url = '<?php echo site_url("admin/admin_big/big_add");?>';
                    if (show_id) {
                        url = '<?php echo site_url("admin/admin_big/big_upd");?>';
                    }
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: formData,
                        dataType: "json",
                        success: function (data, status) {//如果调用php成功
                            if (!data){
                                alert('操作执行失败，请重试!');
                            } else {
                                setContentUrl('<?php echo site_url('admin/admin_big/big_list')?>');
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
                $("input[type='hidden'][name='big_img_1_value']").val(value['src']);
            })
            var formData = $('#form').serialize();
            var show_id = "<?php if (isset($big['show_id'])){echo $big['show_id'];}?>";
            var url = '<?php echo site_url("admin/admin_big/big_add");?>';
            if (show_id) {
                url = '<?php echo site_url("admin/admin_big/big_upd");?>';
            }
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                dataType: "json",
                success: function (data, status) {//如果调用php成功
                    if (!data){
                        alert('操作执行失败，请重试!');
                    } else {
                        setContentUrl('<?php echo site_url('admin/admin_big/big_list')?>');
                    }
                }
            });
        }
    }
</script>