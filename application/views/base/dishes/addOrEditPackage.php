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
                <form method="get" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-1 control-label">名称设置</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" value=""/>
                        </div>
                        <label class="control-label" style="font-weight:normal;color: #a0a0a0;">还能输入<span class="text-danger">6</span>个字</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">套餐介绍</label>
                        <div class="col-md-6">
                            <textarea class="form-control"></textarea>
                        </div>
                        <label class="control-label" style="font-weight:normal;color: #a0a0a0;">还能输入<span class="text-danger">7</span>个字</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">菜品分类</label>
                        <div class="col-md-4">
                            <div class="checkbox i-checks checkbox-inline" style="margin-right: 20px;">

                                <input type="checkbox" value="02" name="type">

                                &nbsp;&nbsp;火爆川菜

                            </div>
                            <div class="checkbox i-checks checkbox-inline" style="margin-right: 20px;">

                                <input type="checkbox" value="02" name="type">

                                &nbsp;&nbsp;湘菜

                            </div>
                            <div class="checkbox i-checks checkbox-inline" style="margin-right: 20px;">

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
                        <label class="col-sm-1 control-label">添加单品</label>
                        <div class="col-md-9" style="border:1px solid #ddd;background-color:#fff;">
                            <div style="width:44%;float:left;">
                                <table class="table" style="margin-bottom:0;">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>套餐单品</th>
                                        <th>单价</th>
                                        <th>数量</th>
                                        <th>排序</th>
                                    </tr>
                                    </thead>
                                </table>
                                <div style="height:300px;overflow-y:scroll;">
                                    <table class="table table-hover" style="height:250px;">
                                        <tbody style="position: relative;">
                                        <tr>
                                            <td>01</td>
                                            <td>张三</td>
                                            <td>男</td>
                                            <td>23</td>
                                            <td>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>02</td>
                                            <td>李四</td>
                                            <td>男</td>
                                            <td>27</td>
                                            <td>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>03</td>
                                            <td>王麻子</td>
                                            <td>男</td>
                                            <td>65</td>
                                            <td>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>04</td>
                                            <td>张三</td>
                                            <td>男</td>
                                            <td>23</td>
                                            <td>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>05</td>
                                            <td>李四</td>
                                            <td>男</td>
                                            <td>27</td>
                                            <td>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>06</td>
                                            <td>王麻子</td>
                                            <td>男</td>
                                            <td>65</td>
                                            <td>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>07</td>
                                            <td>张三</td>
                                            <td>男</td>
                                            <td>23</td>
                                            <td>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>08</td>
                                            <td>李四</td>
                                            <td>男</td>
                                            <td>27</td>
                                            <td>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>09</td>
                                            <td>王麻子</td>
                                            <td>男</td>
                                            <td>65</td>
                                            <td>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>张三</td>
                                            <td>男</td>
                                            <td>23</td>
                                            <td>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>李四</td>
                                            <td>男</td>
                                            <td>27</td>
                                            <td>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td>王麻子</td>
                                            <td>男</td>
                                            <td>65</td>
                                            <td>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                                                <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                            </td>
                                        </tr>
                                        <tfoot style="position: absolute;left:-1px;border:1px solid #ddd;top: 300px;background: #f2f2f2;width: 42.3%;">
                                        <th>共计：</th>
                                        <th></th>
                                        <th><span class="text-danger">9999</span>元</th>
                                        <th><span class="text-danger">9999</span>份</th>
                                        </tfoot>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div style="width:40%;float:left;">
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
                                    <table class="table table-hover" style="height:250px;">
                                        <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td>张三</td>
                                            <td>男</td>
                                            <td>23</td>

                                        </tr>
                                        <tr>
                                            <td>02</td>
                                            <td>李四</td>
                                            <td>男</td>
                                            <td>27</td>

                                        </tr>
                                        <tr>
                                            <td>03</td>
                                            <td>王麻子</td>
                                            <td>男</td>
                                            <td>65</td>


                                        </tr>
                                        <tr>
                                            <td>04</td>
                                            <td>张三</td>
                                            <td>男</td>
                                            <td>23</td>


                                        </tr>
                                        <tr>
                                            <td>05</td>
                                            <td>李四</td>
                                            <td>男</td>
                                            <td>27</td>

                                        </tr>
                                        <tr>
                                            <td>06</td>
                                            <td>王麻子</td>
                                            <td>男</td>
                                            <td>65</td>

                                        </tr>
                                        <tr>
                                            <td>07</td>
                                            <td>张三</td>
                                            <td>男</td>
                                            <td>23</td>

                                        </tr>
                                        <tr>
                                            <td>08</td>
                                            <td>李四</td>
                                            <td>男</td>
                                            <td>27</td>

                                        </tr>
                                        <tr>
                                            <td>09</td>
                                            <td>王麻子</td>
                                            <td>男</td>
                                            <td>65</td>

                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>张三</td>
                                            <td>男</td>
                                            <td>23</td>

                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>李四</td>
                                            <td>男</td>
                                            <td>27</td>

                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td>王麻子</td>
                                            <td>男</td>
                                            <td>65</td>

                                        </tr>
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
                                            <label class="">
                                                <input type="checkbox" value="02" name="type" style="position: absolute; opacity: 0;"/>
                                                <ins class="iCheck-helper"></ins>
                                                <label style="margin-left:2px;font-weight:normal;">全部</label>
                                            </label>
                                        </div>
                                        <div class="checkbox i-checks">
                                            <label class="">
                                                <input type="checkbox" value="02" name="type" style="position: absolute; opacity: 0;">
                                                <ins class="iCheck-helper"></ins>
                                                <label style="margin-left:5px;font-weight:normal;">套餐</label>
                                            </label>
                                        </div>
                                        <div class="checkbox i-checks">
                                            <label class="">
                                                <input type="checkbox" value="02" name="type" style="position: absolute; opacity: 0;">
                                                <ins class="iCheck-helper"></ins>
                                                <label style="margin-left:5px;font-weight:normal;">菜品</label>
                                            </label>
                                        </div>
                                        <div class="checkbox i-checks">
                                            <label class="">
                                                <input type="checkbox" value="02" name="type" style="position: absolute; opacity: 0;">
                                                <ins class="iCheck-helper"></ins>
                                                <label style="margin-left:5px;font-weight:normal;">汤类</label>
                                            </label>
                                        </div>
                                        <div class="checkbox i-checks">
                                            <label class="">
                                                <input type="checkbox" value="02" name="type" style="position: absolute; opacity: 0;">
                                                <ins class="iCheck-helper"></ins>
                                                <label style="margin-left:5px;font-weight:normal;">小吃</label>
                                            </label>
                                        </div>
                                        <div class="checkbox i-checks">
                                            <label class="">
                                                <input type="checkbox" value="02" name="type" style="position: absolute; opacity: 0;">
                                                <ins class="iCheck-helper"></ins>
                                                <label style="margin-left:5px;font-weight:normal;">酒水</label>
                                            </label>
                                        </div>
                                        <div class="checkbox i-checks">
                                            <label class="">
                                                <input type="checkbox" value="02" name="type" style="position: absolute; opacity: 0;">
                                                <ins class="iCheck-helper"></ins>
                                                <label style="margin-left:5px;font-weight:normal;">其他</label>
                                            </label>
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
                            <input class="form-control" type="number" value=""/>
                        </div>
                        <label class="control-label" style="font-weight:normal;">&nbsp;元</label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">是否上架</label>
                        <div class="col-md-6">
                            <div class="radio i-checks radio-inline" style="margin-right: 20px;">

                                <input type="radio" value="01" name="isUp" style="position: absolute; opacity: 0;" checked>
                                <ins class="iCheck-helper"></ins>
                                &nbsp;&nbsp;立即上架

                            </div>
                            <div class="radio i-checks radio-inline" style="margin-right: 20px;">

                                <input type="radio" value="02" name="isUp" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper"></ins>
                                &nbsp;&nbsp;暂不上架

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
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
