<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo constant('SYS_NAME');?>|参数配置</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/style-metro.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/default_1.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/chosen.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/select2_metro.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/jquery.tagsinput.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/clockface.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/bootstrap-toggle-buttons.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/multi-select-metro.css" />
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/jquery.fancybox.css" rel="stylesheet" />
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/jquery.fileupload-ui.css" rel="stylesheet" />
    <link href="<?php echo constant('ADMIN_SRC');?>media/css/email.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="<?php echo constant('ADMIN_SRC');?>media/image/favicon.ico" />
</head>
<body class="page-header-fixed">
<div >
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <br>
                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="<?php echo site_url("admin/admin_index/main_right")?>">系统管理</a>
                        <span class="icon-angle-right"></span>
                    </li>
                    <li>
                        <a href="<?php echo site_url("admin/admin_sell/set_show")?>">日常管理</a>
                        <span class="icon-angle-right"></span>
                    </li>
                    <li>
                        <a href="<?php echo site_url("admin/admin_sell/set_show")?>">参数配置</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box myself">
                    <div class="portlet-title">
                        <div class="caption">&nbsp;&nbsp;&nbsp;参数配置</div>
                    </div>
                    <div class="portlet-body form">
                        <form action="<?php echo site_url("admin/admin_sell/set_do")?>" onsubmit="return check_submit();" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label"><span class="required">*&nbsp;</span>5字店名：</label>
                                <div class="controls">
                                    <input name="name5" id="name5" value="<?php echo $name5;?>" type="text" class="span3 m-wrap"   style="float:left;width:300px;"/>
                                    <span class="help-inline" id="name5_1">请填写5个字的店名(用于平板端店名显示)</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span class="required">*&nbsp;</span>餐具费：</label>
                                <div class="controls">
                                    <input name="cutlery" id="cutlery" value="<?php echo $cutlery;?>" type="text" class="span3 m-wrap"  placeholder="只能填写数字" style="float:left;width:300px;"/>
                                    <span class="help-inline" id="cutlery_1">元/人 (不收费请填写0元)</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span class="required">*&nbsp;</span>打印机规格：<br>
                                </label>
                                <div class="controls" style="padding-left: 20px;">
                                    <label class="radio">
                                        <input type="radio" onclick="show_href('1');" name="print_type" value="1" <?php if($print_type==1)echo "checked";?>/>
                                        58mm
                                    </label>
                                    <label class="radio">
                                        <input type="radio" onclick="show_href('2');"  name="print_type" value="2" <?php if($print_type==2)echo "checked";?>/>
                                        80mm
                                    </label>
											<span class="help-inline" style="margin-top:-5px;">
											<a href="javascript:print_submit();">测试打印</a>   
											<a href="http://www.jdmenu.cn/help.html" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;打印机配置帮助手册</a>
											</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span class="required">*&nbsp;</span>小票抬头：<br>
                                    <!--  <a href="<?php if($print_type==1)echo base_url("data/print_type_01.docx");else{echo base_url("data/print_type_02.docx");}?>" id="href_open" target="_blank">&nbsp;&nbsp;&nbsp;样式预览&nbsp;&nbsp;&nbsp;</a>-->
                                </label>
                                <div class="controls">
                                    <input type="text" value="<?php echo $print_name;?>" id="print_name" name="print_name" class="span3 m-wrap"  placeholder="例如：XXX餐厅" style="float:left;width:300px;"/>
                                    <span class="help-inline" id="print_name_1">(不设置写默认为餐厅名称)</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span class="required">*&nbsp;</span>联系方式：</label>
                                <div class="controls">
                                    <input type="text" value="<?php echo $call_num;?>" id="call_num" name="call_num" class="span3 m-wrap"  placeholder="设置小票上您的联系电话" style="float:left;width:300px;"/>
                                    <span class="help-inline">(不设置则不显示联系电话.)</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span class="required">*&nbsp;</span>地址：</label>
                                <div class="controls">
                                    <input type="text" value="<?php echo $call_address;?>" id="call_address" name="call_address" class="span3 m-wrap"  placeholder="设置小票上您的地址" style="float:left;width:300px;"/>
                                    <span class="help-inline">(不设置则不显示地址.)</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span class="required">*&nbsp;</span>其他信息：</label>
                                <div class="controls">
										<textarea class="span6 m-wrap" id="other" name="other" placeholder="您还可以在小票上打印一些其他信息" style="width:300px;height:90px;
                                            									max-width: 300px;max-height: 90px;"><?php echo $other;?></textarea>
                                    <span class="help-inline">(不设置则不显示.)</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn_1">确认提交</button>
                                    &nbsp;&nbsp;&nbsp;
                                    <button type="button" class="btn_2">重置所有</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.uniform.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.toggle.buttons.js"></script>
<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/clockface.js"></script>
<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/date.js"></script>
<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.input-ip-address-control-1.0.min.js"></script>
<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/jquery.multi-select.js"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap-modal.js" type="text/javascript" ></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/bootstrap-modalmanager.js" type="text/javascript" ></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/app.js"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/form-components.js"></script>
<script>
    jQuery(document).ready(function() {
        App.init();
        FormComponents.init();
    });

    function check_submit(){
        $num=0;
        if($("#name5").val()==""){
            $("#name5").focus();
            $("#name5_1").html("5字店名不能为空");
            $("#name5_1").css("color","red");
            $num++;
        }else{
            if($("#name5").val().length>5){
                $("#name5").focus();
                $("#name5_1").html("餐桌桌号请控制在5个字符以内.");
                $("#name5_1").css("color","red");
                $num++;
            }else{
                $("#name5_1").css("color","#999999");
            }
        }
        if($("#cutlery").val()==""){
            $("#cutlery").focus();
            $("#cutlery_1").html("请填写就餐餐具费用.");
            $("#cutlery_1").css("color","red");
            $num++;
        }else{
            if(isNaN($('#cutlery').val())){
                $("#cutlery").focus();
                $("#cutlery_1").html("餐具费用只能填写数字.");
                $("#cutlery_1").css("color","red");
                $num++;
            }else{
                $("#cutlery_1").hide();
            }
        }

        if($("#print_name").val()==""){
            $("#print_name").val("<?php echo $shop_name;?>");
        }
        if($num>0){
            return false;
        }
    }
    function print_submit(){
        var result = confirm('提交更新后测试打印哟！是否确认测试打印？');
        if(result){
            window.open("<?php echo site_url('admin/admin_print/print_test')?>");
        }else{

        }


    }
    function show_href(num){
        if(num==1){
            $("#href_open").attr('href',"<?php echo base_url("data/print_type_01.docx");?>");
        }else{
            $("#href_open").attr('href',"<?php echo base_url("data/print_type_02.docx");?>");
        }
    }
</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
</body>
</html>