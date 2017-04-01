<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">后台权限</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Background authority</h3>
    </div>
</div>
<div class="wrapper feed-element">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <form method="get" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-1 control-label">权限设置</label>
                        <div class="col-md-4">
                            <div class="radio i-checks radio-inline">
                                <label>
                                    <input class="authType" type="radio" value="1" <?php if ($user['two'] == 1) echo "checked"; ?> name="two" style="position: absolute; opacity: 0;" checked>
                                    <ins class="iCheck-helper"></ins>
                                    <label>开启权限验证</label>
                                </label>
                            </div>
                            <div class="radio i-checks radio-inline">
                                <label>
                                    <input class="authType" type="radio" value="0" <?php if ($user['two'] == 0) echo "checked"; ?>  name="two" style="position: absolute; opacity: 0;">
                                    <ins class="iCheck-helper"></ins>
                                    <label>关闭权限验证</label>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label class="control-label" style="font-weight:normal;color: #a0a0a0;">开启后，进入后台需要管理员密码</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <button class="btn btn-w-m btn-primary" type="button" onclick="change_two()">完&nbsp;&nbsp;成</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="application/javascript">
    function change_two() {
        var two = $('input[name="two"]:checked').val();
        console.log(two);
        $.post('<?php echo site_url('admin/admin_two/upd_two')?>', {two: two}, function (e) {
            if (e == -1) {
                alert('修改失败，请重试!');
            } else {
                top.location = "<?php echo site_url('admin/admin_index/system')?>";
            }
        });

        
    }
</script>