<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">发布菜品</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Release dishes</h3>
    </div>
</div>
<div class="wrapper feed-element">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <form method="get" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-1 control-label">名称设置</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" value=""/>
                        </div>
                        <label class="control-label" style="font-weight:normal;">还能输入<span class="text-danger">6</span>个字</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">设置价格</label>
                        <div class="col-md-2">
                            <input class="form-control" type="number" value=""/>
                        </div>
                        <label class="control-label" style="font-weight:normal;">&nbsp;元</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">新品介绍</label>
                        <div class="col-md-6">
                            <textarea class="form-control"></textarea>
                        </div>
                        <label class="control-label" style="font-weight:normal;">&nbsp;还能输入<span class="text-danger">7</span>个字</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">新品属性</label>
                        <div class="col-md-9">

                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">

                                <input type="checkbox" value="02" name="type">&nbsp;&nbsp;菜品

                            </div>
                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">

                                <input type="checkbox" value="02" name="type">

                                &nbsp;&nbsp;汤类

                            </div>
                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">

                                <input type="checkbox" value="02" name="type" style="position: absolute; opacity: 0;">

                                &nbsp;&nbsp;小吃

                            </div>
                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">

                                <input type="checkbox" value="02" name="type">

                                &nbsp;&nbsp;酒水

                            </div>
                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">

                                <input type="checkbox" value="02" name="type">

                                &nbsp;&nbsp;其他

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">菜品分类</label>
                        <div class="col-md-4">
                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">

                                <input type="checkbox" value="02" name="type">

                                &nbsp;&nbsp;火爆川菜

                            </div>
                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">

                                <input type="checkbox" value="02" name="type">

                                &nbsp;&nbsp;湘菜

                            </div>
                            <div class="checkbox i-checks checkbox-inline" style="margin-right:20px;">

                                <input type="checkbox" value="02" name="type">

                                &nbsp;&nbsp;甜品

                            </div>
                        </div>
                        <label class="control-label" style="font-weight:normal;"><a href="#"><i class="fa fa-plus">添加分类</i></a></label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">上传图片</label>
                        <div class="col-sm-6">
                            <ul class="nav nav-tabs" id="avatar-tab">
                                <li class="active" id="upload"><a href="javascript:;">本地上传</a>
                                </li>
                                <li id="albums"><a href="javascript:;">相册选取</a>
                                </li>
                                <li style="margin-top: 10px;">提示：建议图片大小勿超过1M</li>
                            </ul>
                            <div class="m-t m-b">
                                <div id="flash1">
                                    <object type="application/x-shockwave-flash" id="swf1" name="swf1" data="plugins/fullavatareditor/fullAvatarEditor.swf" width="320" height="205" style="visibility: visible;">
                                        <param name="menu" value="true">
                                        <param name="scale" value="noScale">
                                        <param name="allowFullscreen" value="true">
                                        <param name="allowScriptAccess" value="always">
                                        <param name="wmode" value="transparent">
                                        <param name="flashvars" value="id=swf1&amp;upload_url=upload.php&amp;tab_visible=false&amp;button_visible=false&amp;src_upload=2&amp;checkbox_visible=false&amp;browse_box_align=left&amp;webcam_box_align=left&amp;avatar_sizes=258*200&amp;avatar_sizes_desc=258*200像素&amp;avatar_intro=     最终会生成下面这个尺寸的图片&amp;avatar_tools_visible=true">
                                    </object>
                                </div>
                                <div id="editorPanelButtons" style="display:none">
                                    <p class="m-t">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="src_upload">是否上传原图片？
                                        </label>
                                    </p>
                                    <p>
                                        <a href="javascript:;" class="btn btn-w-m btn-primary button_upload"><i class="fa fa-upload"></i> 上传</a>
                                        <a href="javascript:;" class="btn btn-w-m btn-white button_cancel">取消</a>
                                    </p>
                                </div>
                                <p id="webcamPanelButton" style="display:none">
                                    <a href="javascript:;" class="btn btn-w-m btn-info button_shutter"><i class="fa fa-camera"></i> 拍照</a>
                                </p>
                                <div id="userAlbums" style="display:none">
                                    <a href="img/a1.jpg" class="fancybox" title="选取该照片">
                                        <img src="img/a1.jpg" alt="示例图片1">
                                    </a>
                                    <a href="img/a2.jpg" class="fancybox" title="选取该照片">
                                        <img src="img/a2.jpg" alt="示例图片2">
                                    </a>
                                    <a href="img/a3.jpg" class="fancybox" title="选取该照片">
                                        <img src="img/a3.jpg" alt="示例图片2">
                                    </a>
                                    <a href="img/a4.jpg" class="fancybox" title="选取该照片">
                                        <img src="img/a4.jpg" alt="示例图片2">
                                    </a>
                                    &gt;
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">是否上架</label>
                        <div class="col-md-6">
                            <div class="radio i-checks radio-inline" style="margin-right:20px;">

                                <input type="radio" value="01" name="isUp">

                                &nbsp;&nbsp;立即上架

                            </div>
                            <div class="radio i-checks radio-inline" style="margin-right:20px;">

                                <input type="radio" value="02" name="isUp">

                                &nbsp;&nbsp;暂不上架

                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:55px;">
                        <div class="col-sm-4">
                            <button class="btn btn-w-m btn-primary" type="submit" >发&nbsp;&nbsp;布</button>
                            <button class="btn btn-white btn-w-m pull-right" type="cancel">重&nbsp;&nbsp;置</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>
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
    });
</script>