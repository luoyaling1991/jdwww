<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">系统介绍</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">System information</h3>
    </div>
</div>
<div class="wrapper feed-element">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="portlet-body form" id="div_from">
                    &nbsp;&nbsp;&nbsp;欢迎进入"简点"点餐系统商家后台管理！<br>&nbsp;<br>
                    <?php
                    if($one['yz_01']==1 || $one['yz_02']==1 || $one['yz_03']==1 || $one['yz_04']==1 || $one['yz_05']==1 || $one['yz_06']==1 || $one['yz_07']==1 || $one['yz_08']==1){
                        echo "&nbsp;&nbsp;&nbsp;您还没有完整的使用过我们系统吧？为避免使用障碍，请参照下面我们的引导项一步步的使用我们的系统吧！<br>&nbsp;<br>";
                    }else{
                        echo "";
                    }
                    ?>
                    <?php if($one['yz_01']==1){?>
                        &nbsp;&nbsp;&nbsp;<a href="<?php echo site_url("admin/admin_user/shop_user_info_update")?>" class="btn red">完善账户基本信息<i class="m-icon-swapright m-icon-white"></i></a>&nbsp;&nbsp;&nbsp;
                    <?php }?>
                    <?php if($one['yz_02']==1){?>
                        &nbsp;&nbsp;&nbsp;<a href="<?php echo site_url("admin/admin_user/shop_pad_1")?>" class="btn blue">维护平板账户密码<i class="m-icon-swapright m-icon-white"></i></a>&nbsp;&nbsp;&nbsp;
                    <?php }?>
                    <?php if($one['yz_03']==1){?>
                        &nbsp;&nbsp;&nbsp;<a href="<?php echo site_url("admin/admin_table/table_list")?>" class="btn purple">新建一个餐桌分类<i class="m-icon-swapright m-icon-white"></i></a>&nbsp;&nbsp;&nbsp;
                    <?php }?>
                    <?php if($one['yz_03']==0 && $one['yz_04']==1){?>
                        &nbsp;&nbsp;&nbsp;<a href="<?php echo site_url("admin/admin_table/table_list")?>" class="btn purple">新建第一张餐桌<i class="m-icon-swapright m-icon-white"></i></a>&nbsp;&nbsp;&nbsp;
                    <?php }?>
                    <?php if($one['yz_05']==1){?>
                        &nbsp;&nbsp;&nbsp;<a href="<?php echo site_url("admin/admin_type/type_add_show")?>" class="btn green">新建一个菜品分类<i class="m-icon-swapright m-icon-white"></i></a>&nbsp;&nbsp;&nbsp;
                    <?php }?>
                    <?php if($one['yz_05']==0 && $one['yz_06']==1){?>
                        &nbsp;&nbsp;&nbsp;<a href="<?php echo site_url("admin/admin_dish/dish_add_show")?>" class="btn green">新建第一个菜品<i class="m-icon-swapright m-icon-white"></i></a>&nbsp;&nbsp;&nbsp;
                    <?php }?>
                    <?php if($one['yz_07']==1){?>
                        &nbsp;&nbsp;&nbsp;<a href="<?php echo site_url("admin/admin_waiter/waiter_add_show")?>" class="btn btn black">新建第一个使用者<i class="m-icon-swapright m-icon-white"></i></a>&nbsp;&nbsp;&nbsp;
                    <?php }?>
                    <?php if($one['yz_08']==1){?>
                        &nbsp;&nbsp;&nbsp;<a href="<?php echo site_url("admin/admin_sell/set_show")?>" class="btn red">配置打印机信息<i class="m-icon-swapright m-icon-white"></i></a>
                    <?php }?>
                    <br>&nbsp;<br>
                </div>
            </div>
        </div>
    </div>
</div>