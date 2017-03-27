<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo constant('SYS_NAME');?>|账户充值</title>
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
    <link rel="stylesheet" type="text/css" href="<?php echo constant('ADMIN_SRC');?>media/css/select2_metro.css" />
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
                        <a href="<?php echo site_url("admin/admin_index/system")?>">账户充值</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="portlet box myself">
                    <div class="portlet-title">
                        <div class="caption">&nbsp;&nbsp;&nbsp;账户充值</div>
                    </div>
                    <div class="portlet-body form">
                        <form action="<?php echo site_url("admin/admin_mall/buy")?>" onsubmit="return check_submit();"  class="form-horizontal" method="post">
                            <div class="row-fluid">
                                <div class="control-group">
                                    <label class="control-label">选择充值模式：</label>
                                    <div class="controls">
                                        <?php
                                        $num=0;
                                        foreach ($list as $row){
                                            $num++;
                                            $v_id=$row['v_id'];
                                            $v_name=$row['v_name'];
                                            $v_desc=$row['v_desc'];
                                            $v_money=$row['v_money'];
                                            $v_old_money=$row['v_old_money'];
                                            if($num==1){
                                                echo "<label class='radio line'>
																					<input type='radio' name='vip_type' value='{$v_id}' onclick='type_change(&quot;{$v_money}&quot;)' checked/>{$v_name}<br>
																					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;优惠现价：<font color='red'><b>{$v_money}元</b></font>/<s>{$v_old_money}元</s>
																					<span class='help-block'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$v_desc}</span>
																					</label>";
                                            }else{
                                                echo "<label class='radio line'>
																					<input type='radio' name='vip_type' value='{$v_id}' onclick='type_change(&quot;{$v_money}&quot;)' />{$v_name}<br>
																					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;优惠现价：<font color='red'><b>{$v_money}元</b></font>/<s>{$v_old_money}元</s>
																					<span class='help-block'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$v_desc}</span>
																					</label>";
                                            }

                                        }
                                        ?>


                                    </div>
                                </div>
                                <div class='control-group'>
                                    <label class="control-label">购买数量：</label>
                                    <div class="controls">
                                        <input type="number" name="count" id="count" value="1" class="span6 m-wrap" style="width:220px;" onchange="money_change();"/>
																<span class="help-block" id="count_1">
                                                                	
                                                                </span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">应付金额：</label>
                                    <div class="controls">
                                        <input type="text" name="money" id="money" value="1" class="m-wrap medium" style="width:220px;" disabled />

                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn_1">确认提交</button>
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
<script type="text/javascript" src="<?php echo constant('ADMIN_SRC');?>media/js/select2.min.js"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/app.js"></script>
<script src="<?php echo constant('ADMIN_SRC');?>media/js/form-samples.js"></script>
<script>
    jQuery(document).ready(function() {
        money_change();
        App.init();
        FormSamples.init();
    });
    var price="<?php echo $list[0]['v_money']?>";

    function type_change(v_money){
        price=v_money;
        money_change();
    }
    function money_change(){
        var count=$("#count").val();
        var money=count*price;
        $("#money").val(money);
    }
    function check_submit(){
        if($("#count").val()=="" || $("#count").val()<1){
            $("#count").focus();
            $("#count_1").html("请正确填写购买数量.");
            $("#count_1").css("color","red");
            return false;
        }else{
            $("#count_1").css("color","#999999");
            return true;
        }
    }
</script>
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
</body>
</html>