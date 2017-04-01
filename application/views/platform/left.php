<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse" id="sidebar">
        <ul class="nav">
            <li>
                <a href="javascript:void(0);"
                   onclick="setContentUrl('<?php echo site_url('admin/admin_user/user_info') ?>')"><i
                            class="fa fa-th-large"></i> <span class="nav-label">账户信息</span></a>
                <!--<ul class="nav-second-level"></ul>-->
            </li>
            <li>
                <a><i class="fa fa-table"></i> <span class="nav-label">日程管理</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="javascript:void(0);"
                           onclick="setContentUrl('<?php echo site_url('admin/admin_dish/dish_list') ?>')">品类管理</a>
                    </li>
                    <li><a href="javascript:void(0);"
                           onclick="setContentUrl('<?php echo site_url('admin/admin_type/type_list') ?>')">品种分类</a>
                    </li>
                    <li><a href="javascript:void(0);"
                           onclick="setContentUrl('<?php echo site_url('admin/admin_big/big_list') ?>')">推荐管理</a>
                    </li>
                    <li><a href="javascript:void(0);"
                           onclick="setContentUrl('<?php echo site_url('admin/admin_table/table_list') ?>')">餐桌管理</a>
                    </li>
                    <li><a href="javascript:void(0);"
                           onclick="setContentUrl('<?php echo site_url("admin/admin_waiter/waiter_list") ?>')">工号管理</a>
                    </li>
                    <li><a href="javascript:void(0);"
                           onclick="setContentUrl('<?php echo site_url("admin/admin_sell/set_show") ?>')">参数配置</a>
                    </li>
                </ul>
            </li>
            <li>
                <a><i class="fa fa-bar-chart-o"></i> <span class="nav-label">营业数据</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="javascript:void(0);" onclick="setContentUrl('<?php
                        if ($_SESSION['admin_user']['two'] != 1 || ($_SESSION['admin_user']['two'] == 1 && $_SESSION['admin_user']['is_check'] == 1)) {
                            echo site_url('admin/admin_sell/index_1');
                        } else {
                            echo site_url('admin/admin_two/show_two_1');
                        } ?>')">营业状况</a>
                    </li>
                    <li><a href="javascript:void(0);" onclick="setContentUrl('<?php
                        if ($_SESSION['admin_user']['two'] != 1 || ($_SESSION['admin_user']['two'] == 1 && $_SESSION['admin_user']['is_check'] == 1)) {
                            echo site_url('admin/admin_sell/index_2');
                        } else {
                            echo site_url('admin/admin_two/show_two_1');
                        } ?>')">热销查询</a>
                    </li>
                    <li><a href="javascript:void(0);" onclick="setContentUrl('<?php
                        if ($_SESSION['admin_user']['two'] != 1 || ($_SESSION['admin_user']['two'] == 1 && $_SESSION['admin_user']['is_check'] == 1)) {
                            echo site_url('admin/admin_sell/index_3');
                        } else {
                            echo site_url('admin/admin_two/show_two_1');
                        } ?>')">销售详情</a>
                    </li>
                </ul>
            </li>
            <li>
                <a><i class="fa fa-cutlery"></i> <span class="nav-label">安全设置</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="javascript:void(0);" onclick="setContentUrl('<?php
                        if ($_SESSION['admin_user']['two'] != 1 ||
                            (($_SESSION['admin_user']['two'] == 1
                                && $_SESSION['admin_user']['is_check'] == 1))
                        ) {
                            echo site_url('admin/admin_two/shop_setting');
                        } else {
                            echo site_url('admin/admin_two/show_two_1');
                        }
                        
                        ?>')">后台权限</a>
                    </li>
                    <li><a href="javascript:void(0);" onclick="setContentUrl('<?php
                        if ($_SESSION['admin_user']['two'] != 1
                            || ($_SESSION['admin_user']['two'] == 1
                                && $_SESSION['admin_user']['is_check'] == 1)
                        ) {
                            echo site_url('admin/admin_user/shop_pad_1');
                        } else {
                            echo site_url('admin/admin_two/show_two_1');
                        }
                        ?>')">APP密码</a>
                    </li>
                    <li><a href="javascript:void(0);" onclick="setContentUrl('<?php
                        if ($_SESSION['admin_user']['two'] != 1
                            || (($_SESSION['admin_user']['two'] == 1
                                && $_SESSION['admin_user']['is_check'] == 1))
                        ) {
                            echo site_url('admin/admin_pwd/index');
                        } else {
                            echo site_url('admin/admin_two/show_two_1');
                        } ?>')">修改登录密码</a>
                    </li>
                    <li><a href="javascript:void(0);" onclick="setContentUrl('<?php
                        if ($_SESSION['admin_user']['two'] != 1
                            || (($_SESSION['admin_user']['two'] == 1
                                && $_SESSION['admin_user']['is_check'] == 1))
                        ) {
                            echo site_url('admin/admin_yz/index');
                        } else {
                            echo site_url('admin/admin_two/show_two_1');
                        } ?>')">修改权限密码</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<div class="logo" style="text-align:center;position: absolute;bottom:20px;left:16px;">
    <div>
        <img src="/data/images/logo2.png">
    </div>
    <p style="color:#818181;">成都火夫餐饮管理有限公司<br>
        Copyright&copy; 2015 Systems Incorporated.</p>
</div>