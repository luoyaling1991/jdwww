<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom:0px;background: #282830;">
    <div class="navbar-header">
        <span style="float:left;font-size:26px;font-weight:bold;color:#e65445;line-height:58px;margin:0 60px;"><?php echo $_SESSION['admin_user']['shop_name'] ?></span>

        <ul class="nav" style="float:left;">
            <li style="color:#999;float:left;font-size:16px;line-height:58px;">
                账户到期: <span class="welcome-message" style="color: #e65445"><?php echo $_SESSION['admin_user']['shop_date'] ?></span>
            </li>
            <li style="color:#999;float:left;font-size:16px;line-height:58px;margin-left:20px;">
                <span class="m-r-sm text-muted welcome-message"><a href="javascript:void(0);" onclick="setContentUrl('<?php echo site_url('admin/admin_mall')?>')" title="我要充值" style="color:#999;">我要充值</a></span>
            </li>
            <li style="color:#6f6f6f;float:left;font-size:14px;line-height:58px;margin:0 60px;">
                最后登录<span class="welcome-message">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['admin_user']['login_time'] ?></span>
            </li>
        </ul>
    </div>
    <div>
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <span class="dropdown-toggle count-info dropdown-title" data-toggle="dropdown">
                <i class="fa fa-sign-out"></i><strong>操作管理</strong>
            </span>
            <ul class="dropdown-menu">
                <li><a href="javascript:void(0);" onclick="back();"><i class="fa fa-desktop"></i>&nbsp;&nbsp;吧台管理</a>
                </li>
                <li><a href="javascript:void(0);" onclick="login_out();"><i class="fa fa-power-off"></i>&nbsp;&nbsp;账户注销</a>
                </li>
            </ul>
        </li>
    </ul>
    </div>
    <!--<div class="button-group" style="float:right;margin-right:20px;margin-top: 12px;">
        <button class="btn btn-w-m btn-primary dropdown-toggle" >操作管理</button>
        <ul class="dropdown-menu">
            <li><a href="default.html"><i class="fa fa-desktop"></i>&nbsp;&nbsp;系统管理</a>
            </li>
            <li><a href="index.html"><i class="fa fa-power-off"></i>&nbsp;&nbsp;账户注销</a>
            </li>
        </ul>
    </div>-->
</nav>
<div class="page-container">
    <div style="background-color:#76c873;height:30px;padding-left:20px;padding-right:20px;color:#333;">
        <table style="width: 100%;">
            <tbody><tr>
                <td>
                    <img src="/data/images/mess.png" style="margin-bottom: 6px;margin-right: 10px;">
                </td>
                <td>
                    <marquee scrolldelay="1" scrollamount="2" direction="Left">
                        <span style="line-height: 30px;">欢迎使用'简点•点餐'系统，24小时联系热线18501376808!</span>
                    </marquee>
                </td>
            </tr>
            </tbody></table>
    </div>
</div>
<script>
    function login_out(){
        if (confirm('确定要注销账户吗？')) {
            top.location="<?php echo site_url('admin/admin_login/login_out')?>";
        }else {
            return false;
        }
    }
    function back(){
        top.location="<?php echo site_url('admin/admin_bar/index')?>";
    }
</script>