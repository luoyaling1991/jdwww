<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">工号管理</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Work number
            management</h3>
    </div>
</div>
<div class="wrapper feed-element">
    <div class="ibox float-e-margins" style="margin-top:15px;">
        <div class="ibox-title">
            <ul class="nav nav-pills">
                <li>
                    <button class="btn btn-white" type="button"><a href="#"
                                                                   onclick="setContentUrl('<?php echo site_url("admin/admin_waiter/waiter_add_show") ?>')"
                                                                   style="color: inherit;">添加工号</a></button>
                </li>
                <li>
                    <button class="btn btn-white" type="button">批量删除</button>
                </li>
            </ul>
        </div>
        <div class="ibox-content" style="height:440px;background-color:#fff;padding-top:0px;">
            <div class="table-responsive" style="margin-bottom:10px;">
                <table id="ddd" class="table table-striped dataTable">
                    <thead>
                    <tr>
                        <th>
                            <input type="checkbox" class="i-checks" name="input[]"
                                   style="position: absolute; opacity: 0;">
                        </th>
                        <th>ID</th>
                        <th>编号</th>
                        <th>姓名</th>
                        <th>电话</th>
                        <th>权限设置</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody id="listData">
                    <!--                                        <tr>-->
                    <!--                                            <td>-->
                    <!--                                                <input type="checkbox" class="i-checks" name="input[]"-->
                    <!--                                                       style="position: absolute; opacity: 0;">-->
                    <!--                                            </td>-->
                    <!--                                            <td>01</td>-->
                    <!--                                            <td>00001</td>-->
                    <!--                                            <td>-->
                    <!--                                                张三-->
                    <!--                                            </td>-->
                    <!--                                            <td>13456780987</td>-->
                    <!--                                            <td>常用权限</td>-->
                    <!--                                            <td><a href="#">编辑</a>｜<a href="#">删除</a></td>-->
                    <!--                                        </tr>-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-12 m-t-sm">
        <div class="col-sm-6">
            <div class="dataTables_info" id="editable_info" role="alert" aria-live="polite" aria-relevant="all">显示 1 到
                10 项，共 57 项
            </div>
        </div>
        <div class="col-sm-6">
            <div class="dataTables_paginate paging_simple_numbers" id="editable_paginate">
                <ul class="pagination" id="tabIndex">
                    <!--                    <li class="paginate_button previous disabled" aria-controls="editable" tabindex="0"-->
                    <!--                        id="editable_previous"><a href="javascript:(0)">上一页</a></li>-->
                    <!--                    <li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">1</a></li>-->
                    <!--                    <li class="paginate_button active" aria-controls="editable" tabindex="0"><a href="#">2</a></li>-->
                    <!--                    <li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">3</a></li>-->
                    <!--                    <li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">4</a></li>-->
                    <!--                    <li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">5</a></li>-->
                    <!--                    <li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">6</a></li>-->
                    <!--                    <li class="paginate_button next" aria-controls="editable" tabindex="0" id="editable_next"><a-->
                    <!--                                href="javascript:(0)">下一页</a></li>-->
                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-12 m-t-sm">
        <button class="btn btn-w-m btn-primary" type="button">保&nbsp;&nbsp;存</button>
    </div>
</div>
<script>

    $(document).ready(function () {
        list_limit(1)
    })

    function showWaiterList(_page, _waiter_list) {
        for (var i = 0; i < _waiter_list.length; i++) {
            var htmlStr =
                '<tr>' +
                '<td>' +
                '<input id="check_box" type="checkbox" class="i-checks" name="input[]" >' +
                '</td>' +
                '<td>' + ((_page - 1) * 10 + i + 1) + '</td>' +
                '<td>' + (_waiter_list[i].waiter_no) + '</td>' +
                '<td>' + (_waiter_list[i].waiter_name) + '</td>' +
                '<td>' + (_waiter_list[i].waiter_phone) + '</td>' +
                '<td>' + (_waiter_list[i].waiter_jurisdiction) + '</td>' +
                '<td><a href="javascrpit:(0)" onclick="editWaiter(' + _waiter_list[i].waiter_id + ')">编辑</a>｜' +
                '<a href="javascrpit:(0)" onclick="deleteWaiter(' + _waiter_list[i].waiter_id + ')">删除</a></td>' +
                '</tr>';
            $("#listData").append(htmlStr)
            $("#check_box").addClass("i-checks")
//            $("#check_box").removeAttr("id")
//            $("#ddd").append(htmlStr)
//            $("#ddd").trigger("create")
        }
//        $.each(_waiter_list, function (i, waiter) {
//            var htmlStr = '<tr>' +
//                '<td>' +
//                '<input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">' +
//                '</td>' +
//                '<td>' + ((_page - 1) * 10 + i + 1) + '</td>' +
//                '<td>' + waiter.waiter_no + '</td>' +
//                '<td>' + waiter.waiter_name + '</td>' +
//                '<td>' + waiter.waiter_phone + '</td>' +
//                '<td>' + waiter.waiter_jurisdiction + '</td>' +
//                '<td><a href="#">编辑</a>｜<a href="#">删除</a></td>' +
//                '</tr>';
//            $("#listData").append(htmlStr)
//        })
    }

    function showNotice(_count, _page) {
        var start = _page === 1 ? 1 : (_page - 1) * 10 + 1;
        var end = _page * 10 > _count ? _count : _page * 10;
        $("#editable_info").text("显示 " + (_count == 0 ? 0 : start) + " 到 " + end + " 项，共 " + _count + " 项")
    }

    function showTabIndex(_totlePage, _page) {
        if (parseInt(_totlePage) === 1 || parseInt(_totlePage) <= 0) {
            $("#tabIndex").append('<li class="paginate_button previous disabled" aria-controls="editable" tabindex="0" id="editable_previous"><a href="javascript:(0)">上一页</a></li>')
            $("#tabIndex").append('<li class="paginate_button active" aria-controls="editable" tabindex="0"><a href="javascrpit:(0)">1</a></li>')
            $("#tabIndex").append('<li class="paginate_button next disabled" aria-controls="editable" tabindex="0" id="editable_next"><a href="javascript:(0)">下一页</a></li>')
        } else {
            if (parseInt(_page) == 1 || parseInt(_totlePage) <= 0) {
                $("#tabIndex").append('<li class="paginate_button previous disabled" aria-controls="editable" tabindex="0" id="editable_previous"><a href="javascript:(0)">上一页</a></li>')
            } else {
                $("#tabIndex").append('<li class="paginate_button previous" aria-controls="editable" tabindex="0" id="editable_previous"><a href="javascript:(0)">上一页</a></li>')
            }
            for (var i = 1; i <= _totlePage; i++) {
                if (i === parseInt(_page)) {
                    $("#tabIndex").append('<li class="paginate_button active" aria-controls="editable" tabindex="0"><a href="javascrpit:(0)">' + i + '</a></li>')

                } else {
                    $("#tabIndex").append('<li class="paginate_button" aria-controls="editable" tabindex="0"><a href="javascrpit:(0)" onclick="list_limit(' + i + ')">' + i + '</a></li>')
                }
            }
            if ((parseInt(_page) === 1 && parseInt(_totlePage) <= 0) || parseInt(_page) === parseInt(_totlePage)) {
                $("#tabIndex").append('<li class="paginate_button next disabled" aria-controls="editable" tabindex="0" id="editable_next"><a href="javascript:(0)">下一页</a></li>')
            } else {
                $("#tabIndex").append('<li class="paginate_button next" aria-controls="editable" tabindex="0" id="editable_next"><a href="javascript:(0)">下一页</a></li>')
            }
        }


    }

    function list_limit(_page) {
        $.post("<?php echo site_url("admin/admin_waiter/waiter_limit_list");?>", {
            page: _page
        }, function (result) {
            var json = eval('(' + result + ')')
            $("#listData").empty()
            $("#tabIndex").empty()
            console.log(json)
            showWaiterList(json.page, json.list)
            showNotice(json.count, json.page);
            showTabIndex(json.totlePage, json.page);
        })
    }

    function editWaiter(_waiter_id) {
        setContentUrl('<?php echo site_url("admin/admin_waiter/waiter_update_show") ?>' + "?waiter_id=" + _waiter_id)
    }

    function deleteWaiter(_waiter) {

        if (!confirm("是否删除员工？")) {
            return;
        }

        $.get("<?php echo site_url("admin/admin_waiter/waiterDelete");?>", {
            waiter_id: _waiter
        }, function (result) {
            var json = eval('(' + result + ')')
            console.log(json)
            list_limit(1)
        })
    }
</script>
