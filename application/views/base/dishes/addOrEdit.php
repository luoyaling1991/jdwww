<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">发布菜品</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Release dishes</h3>
    </div>
</div>
<?php
    function utf8_strlen($string = null)
    {
        // 将字符串分解为单元
        preg_match_all("/./us", $string, $match);
        // 返回单元个数
        return count($match[0]);
    }
?>
<div class="wrapper feed-element">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins" >
                <form method="post" class="form-horizontal" id="form">
                    <div class="form-group">
                        <label class="col-sm-1 control-label">名称设置</label>
                        <div class="col-md-6">
                            <input class="form-control" name="dish_name" id="dish_name" type="text" value="<?php echo $dish['dish_name'];?>" onchange="name_check('<?php echo $dish['dish_id'];?>');" onkeyup="getEnableTextNum(this, 6);" />
                            <span id="dish_name_1"></span>
                            <input type="hidden" name="dish_id" id="dish_id" value="<?php echo $dish['dish_id'];?>">
                        </div>
                        <label class="control-label" style="font-weight:normal;">还能输入<span class="text-danger" id="name_num"><?php
                                echo 6 -utf8_strlen($dish['dish_name']) < 0 ? 0 : 6 -utf8_strlen($dish['dish_name'])
                                ?></span>个字</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">设置价格</label>
                        <div class="col-md-2">
                            <input class="form-control" type="number" name="dish_price" id="dish_price" value="<?php echo $dish['dish_price'];?>"/>
                            <span id="dish_price_1"></span>
                        </div>
                        <label class="control-label" style="font-weight:normal;">&nbsp;元</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">新品介绍</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="dish_desc" id="dish_desc"><?php echo $dish['dish_desc'];?></textarea>
                            <span id="dish_desc_1"></span>
                        </div>
                        <label class="control-label" style="font-weight:normal;">&nbsp;还能输入<span class="text-danger"><?php echo 100 -utf8_strlen($dish['dish_desc']) < 0 ? 0 : 100 -utf8_strlen($dish['dish_desc'])?></span>个字</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">新品属性</label>
                        <div class="col-md-9">
                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">
                                <input type="radio" value="1" name="sys_type" <?php if(!isset($dish['sys_type'])){echo "checked";}else if($dish['sys_type']==1){echo "checked";};?>>&nbsp;&nbsp;菜品
                            </div>
                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">
                                <input type="radio" value="2" name="sys_type" <?php if($dish['sys_type']==2){echo "checked";};?>>
                                &nbsp;&nbsp;汤类
                            </div>
                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">
                                <input type="radio" value="3" name="sys_type" <?php if($dish['sys_type']==3){echo "checked";};?>>
                                &nbsp;&nbsp;小吃
                            </div>
                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">
                                <input type="radio" value="4" name="sys_type" <?php if($dish['sys_type']==4){echo "checked";};?>>
                                &nbsp;&nbsp;酒水
                            </div>
                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">
                                <input type="radio" value="5" name="sys_type" <?php if($dish['sys_type']==5){echo "checked";};?>>
                                &nbsp;&nbsp;其他
                            </div>
                        </div>
                        <span  id="sys_type_01"></span>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">菜品分类</label>
                        <div class="col-md-8">
                            <?php
                            $num=0;
                            foreach ($type_list as $row){
                                $num++;
                                $type_id=$row['type_id'];
                                $type_name=$row['type_name'];
                                if (in_array($type_id, $type_id_list)) {
                                    echo "<div class='checkbox i-checks checkbox-inline' style='margin-right:20px;'>
                                    <input type='checkbox' value='{$type_id}' name='dish_type[]' checked>
                                    &nbsp;&nbsp;{$type_name}
                                    </div>";
                                }else{
                                    echo "<div class='checkbox i-checks checkbox-inline' style='margin-right:20px;'>
                                    <input type='checkbox' value='{$type_id}' name='dish_type[]'>
                                    &nbsp;&nbsp;{$type_name}
                                    </div>";
                                }
                                if($num%8==0){
                                    echo "<br>";
                                }
                            }
                            if($num==0){
                                echo "<font color='red'>请先添加菜品分类信息.</font>";
                            }
                            ?>
                            <span id="dish_type_1"></span>
                        </div>
                        <label class="control-label" style="font-weight:normal;"><a href="#"><i class="fa fa-plus">添加分类</i></a></label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">上传图片</label>
                        <div class="col-sm-8">
                            <ul class="nav nav-tabs">
                                <li class="active" data-option="tabImages" data-target="dish_images"><a href="javascript:void(0);">菜品图片</a>
                                </li>
                                <li data-option="tabImages" data-target="recommen_images"><a href="javascript:void(0);">推荐位图片</a>
                                </li>
                                <li style="color:red;margin-top: 10px;">提示：建议单张图片大小勿超过1M</li>
                            </ul>
                            <div class="m-b" style="padding: 15px;background-color: #fff;">
                               <!--<ul>
                                   <li style="list-style-type:none;border:2px solid #ccc;width:136px;height:100px;"><icon>+</icon></li>
                               </ul>-->
                                <div id="dish_images">
                                    <?php
                                    $num=0;
                                    foreach ($dish['images'] as $value){
                                        if ($value) {
                                            $url = '/'.$value;
                                            echo "<div class='dish' name='img_$num' style='width:136px;height:100px;float:left;margin:0 15px 15px 0;'><img class='dish_img' src='$url' width='136' height='100' style='cursor:pointer;border:2px solid rgb(175,175,180);' data-toggle='modal' data-target='#editImage' onclick='edit_img(this);'/><div class='div_class_img_small_a'>
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
                                    ?>
                                    <img src="/data/images/add_img.png" width="136" height="100" onclick="selectFiles();" style="margin:0 0 15px 0;cursor:pointer;" id="addContainer"/>
                                    <span id="show_1_tishi" style="color:red;"></span>
                                    <div style="color:red;">可以同时上传多张图片，最多不超过5张</div>
                                    <input type="file" name="file1" id="file1" multiple="multiple" accept="image/jpg,image/jpeg,image/png,image/gif"  style="display:none;" onchange="return preFiles(this);" />
                                </div>
                                <div id="recommen_images" style="display: none;">
                                    <?php
                                        if ($dish['dish_img_6']) {
                                            $sort = '0.1';
                                            $url = '/'.$dish['dish_img_6'];
                                            echo "<div class='recommend' name='img_{$sort}' style='width:300px;height:100px;float:left;margin:0 15px 15px 0;'><img id='value_6' src='{$url}' width='300' height='100' style='cursor:pointer;border:2px solid rgb(175,175,180);' data-toggle='modal' data-target='#editImage' onclick='edit_img(this);'/><div class='div_class_img_small_a'>
                                                <p style='width:238px; text-align: left;'><span>推荐位显示图片</span></p>
                                                <p style='width:45px;'><a href='javascript:del_img({$sort});'>
                                                <img src='/data/media/img/red_x.png' style='margin-right:0;margin-bottom:4px;'>
                                                </a></p>
                                                </div></div>";
                                        } else {
                                            /*echo "<img src='/data/images/add_img.png' width='136' height='100' onclick='selectFile();' style='margin:0 0 15px 0;cursor:pointer;' id='addRecomment'/>
                                                <input type='file' name='file2' id='file2' accept='image/jpg,image/jpeg,image/png,image/gif'  style='display:none;' onchange='return preFile(this);' />";*/
                                        }
                                    ?>
                                    <img src="/data/images/add_img.png" width="136" height="100" onclick="selectFile();" style="margin:0 0 15px 0;cursor:pointer;" id="addRecomment"/>
                                    <input type="file" name="file2" id="file2" accept="image/jpg,image/jpeg,image/png,image/gif"  style="display:none;" onchange="return preFile(this);" />
                                   <!-- <a href="/data/images/a1.jpg" class="fancybox" title="选取该照片">
                                        <img src="/data/images/a1.jpg" alt="示例图片1">
                                    </a>
                                    <a href="/data/images/a2.jpg" class="fancybox" title="选取该照片">
                                        <img src="/data/images/a2.jpg" alt="示例图片2">
                                    </a>
                                    <a href="/data/images/a3.jpg" class="fancybox" title="选取该照片">
                                        <img src="/data/images/a3.jpg" alt="示例图片2">
                                    </a>
                                    <a href="/data/images/a4.jpg" class="fancybox" title="选取该照片">
                                        <img src="/data/images/a4.jpg" alt="示例图片2">
                                    </a>-->
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="value_1" />
                        <input type="hidden" name="value_2" />
                        <input type="hidden" name="value_3" />
                        <input type="hidden" name="value_4" />
                        <input type="hidden" name="value_5" />
                        <input type="hidden" name="value_6" />
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">是否上架</label>
                        <div class="col-md-6">
                            <div class="radio i-checks radio-inline" style="margin-right:20px;">

                                <input type="radio" name="dish_state" value="1" <?php if($dish['dish_state']==1){echo "checked";}?>>

                                &nbsp;&nbsp;立即上架

                            </div>
                            <div class="radio i-checks radio-inline" style="margin-right:20px;">

                                <input type="radio" name="dish_state" value="0" <?php if($dish['dish_state']==0){echo "checked";}?>>

                                &nbsp;&nbsp;暂不上架

                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:55px;">
                        <div class="col-sm-4">
                            <button class="btn btn-w-m btn-primary btn_1" type="button" onclick="push();" >发&nbsp;&nbsp;布</button>
                            <button class="btn btn-white btn-w-m pull-right" type="button">重&nbsp;&nbsp;置</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--弹出框-->
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
    $(document).ready(function () {
        $('.type').on('ifChecked', function(event){ //ifCreated 事件应该在插件初始化之前绑定
            var $selectedvalue = $(this).val();
            if ($selectedvalue == 1) {
                $("#active-content").removeClass("hidden").addClass("show");
                $("#dishes-content").removeClass("show").addClass("hidden");
            }
            else {
                $("#active-content").removeClass("show").addClass("hidden");
                $("#dishes-content").removeClass("hidden").addClass("show");
            }
        });
        var text = '首图';
        if ($("span[name='text']").eq(0)){
            $("span[name='text']").eq(0).text(text);
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
    });
    function selectFiles () {
        if ($('.dish').length >= 5) {
            alert("菜品图片最多五张");
            return false;
        }
        $("#file1").click();
    }
    function selectFile () {
        if ($('.recommend').length >= 1) {
            alert("推荐位图片最多一张");
            return false;
        }
        $("#file2").click();
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
                if (filesNum > 5) {
                    alert("上传图片超过5张了，请重新选择");
                    filesNum = 0;
                    return false;
                }else {
                    $.each(files,function(index,file){
                        var reader = new FileReader();
                        reader.readAsDataURL(file);
                        reader.onload = function(e){
                            sort += <?php echo count($dish['images']) ?>;
                            var that = this;
                            $('#addContainer').before("<div class='dish' name='img_"+sort+"' style='width:136px;height:100px;float:left;margin:0 15px 15px 0;'><img class='dish_img' src='"+that.result+"' width='136' height='100' style='cursor:pointer;border:2px solid rgb(175,175,180);' data-toggle='modal' data-target='#editImage' onclick='edit_img(this);'/><div class='div_class_img_small_a'>"
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
                            var text = '首图';
                            if ($("span[name='text']").eq(0)){
                                $("span[name='text']").eq(0).text(text);
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
    function preFile(o) {
        if (!o.files){
            alert('请使用支持HTML5的浏览器,如IE10+,Chrome,FireFox等.');
            return false;
        }else {
            var file = o.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(e){
                sort++;
                $('#addRecomment').before("<div class='recommend' name='img_"+sort+"' style='width:300px;height:100px;float:left;margin:0 15px 15px 0;'><img id='value_6' src='"+this.result+"' width='300' height='100' style='cursor:pointer;border:2px solid rgb(175,175,180);' data-toggle='modal' data-target='#editImage' onclick='edit_img(this);'/><div class='div_class_img_small_a'>"
                +"<p style='width:238px; text-align: left;'><span>推荐位显示图片</span></p>"
                +"<p style='width:45px;'><a href='javascript:del_img("+sort+");'>"
                +"<img src='/data/media/img/red_x.png' style='margin-right:0;margin-bottom:4px;'>"
                +"</a></p>"
                +"</div></div>");
                $('#file2').val('');
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
        var text = '首图';
        if ($("span[name='text']").eq(0)){
            $("span[name='text']").eq(0).text(text);
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
                            $(target).attr('data-dismiss', 'modal');
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
    $('[data-option="tabImages"]').click(function() {
        var $activeObj = $('.active[data-option="tabImages"]');
        var activeTab = $activeObj.attr('data-target');
        var tab = $(this).attr('data-target');
        if (!$(this).hasClass('active')) {
            $(this).addClass('active');
            $activeObj.removeClass('active');
            $('#'+tab).show();
            $('#'+activeTab).hide();
        }
    })
    function push () {
       var valid = check_submit ();
       if (valid == false) {
          return false;
       }else {
           uploadBase64Images();
       }
    }
    var name_ok=1;
    function name_check(dish_id){
        if($("#dish_name").val()==""){
            $("#dish_name").focus();
            $("#dish_name_1").html("菜品名称不能为空.");
            $("#dish_name_1").css("color","red");
        }else{
            if($("#dish_name").val().length>6){
                $("#dish_name").focus();
                $("#dish_name_1").html("菜品名称请控制在6个字符以内.");
                $("#dish_name_1").css("color","red");
            }else{
                var dish_name=$("#dish_name").val();
                $.post('<?php echo site_url('admin/admin_dish/check_name')?>',{dish_name:dish_name,dish_id:dish_id},function (data){
                    data=eval(data);
                    if(data==0){
                        $("#dish_name").focus();
                        name_ok=0;
                        $("#dish_name_1").html("已存在同名菜品，请核实后调整.");
                        $("#dish_name_1").css("color","red");
                    }else{
                        name_ok=1;
                        $("#dish_name_1").css("color","#999999");
                    }
                });
            }
        }
    }
    function check_submit(){
        var err_num=0;
        if($("#dish_name").val()==""){
            $("#dish_name").focus();
            $("#dish_name_1").html("菜品名称不能为空.");
            $("#dish_name_1").css("color","red");
            err_num++;
        }else{
            if($("#dish_name").val().length>6){
                $("#dish_name").focus();
                $("#dish_name_1").html("菜品名称请控制在6个字符以内.");
                $("#dish_name_1").css("color","red");
                err_num++;
            }else{
                if(name_ok==0){
                    $("#dish_name_1").html("已存在同名菜品，请核实后调整.");
                    $("#dish_name_1").css("color","red");
                    err_num++;
                }else{
                    $("#dish_name_1").css("color","#999999");
                }
            }
        }

        if($("#dish_price").val()==""){
            $("#dish_price").focus();
            $("#dish_price_1").html("请填写菜品单价.");
            $("#dish_price_1").css("color","red");
            err_num++;
        }else{
            if(isNaN($('#dish_price').val())){
                $("#dish_price").focus();
                $("#dish_price_1").html("菜品单价只能填写数字.");
                $("#dish_price_1").css("color","red");
                err_num++;
            }else{
                $("#dish_price_1").hide();
            }
        }
        if($("#dish_desc").val()==""){
            $("#dish_desc").focus();
            $("#dish_desc_1").html("菜品介绍不能为空.");
            $("#dish_desc_1").css("color","red");
            err_num++;
        }else{
            if($("#dish_desc").val().length>100){
                $("#dish_desc").focus();
                $("#dish_desc_1").html("菜品介绍请控制在100个字符以内.");
                $("#dish_desc_1").css("color","red");
                err_num++;
            }else{
                $("#dish_desc_1").css("color","#999999");
            }
        }
        $check_num=$("input[type='checkbox']:checked").length;
        if($check_num==0){
            $("#dish_type_1").html("请为菜品分配菜品分类.");
            $("#dish_type_1").css("color","red");
        }else{
            $("#dish_type_1").css("color","#999999");
        }
        if($('.dish').length <= 0){
            $("#show_1_tishi").show();
            $("#show_1_tishi").html("菜品图片首图必须上传.");
            err_num++;
        }else{
            $("#show_1_tishi").hide();
        }

        if(err_num>0){
            return false;
        }$(".btn_1").attr("disabled", "disabled");
    }
    function uploadBase64Images () {
        var imgObj = $('.dish_img');
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
        var img6 = $('#value_6');
        if (img6.length > 0) {
            var obj = {
                'sort': 6,
                'src': img6.attr('src')
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
            console.log(imgs);
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
                    setContentUrl('<?php echo site_url("admin/admin_dish/dish_update");?>', formData);
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
            setContentUrl('<?php echo site_url("admin/admin_dish/dish_update");?>', formData);
        }
    }
</script>