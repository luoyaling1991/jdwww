<div class="row wrapper border-bottom page-heading">
    <div class="col-lg-10">
        <h2 style="color:#e65445;font-weight:bold;float:left;">餐桌管理</h2>
        <h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Table management</h3>
    </div>
</div>
<div class="wrapper feed-element">
    <div class="ibox float-e-margins" style="margin-top:15px;">
        <button class="btn btn-w-m btn-white" type="button" data-toggle="modal" data-target="#addTable" style="margin-bottom: 20px;">添加餐桌</button>
        <div class="ibox-title">
            <ul class="nav nav-pills">
                <li style="margin-right: 20px;margin-left: 12px;margin-top: 6px;"><input type="checkbox" class="i-checks" name="input[]">&nbsp;&nbsp;全选</li>
                <li><button class="btn btn-white" type="button">批量删除</button>
                </li>
            </ul>
        </div>
        <div class="ibox-content">
            <div class="table-responsive" style="margin-bottom:10px;">
                <table class="table dataTable">
                    <thead>
                    <tr>
                        <th>
                            <input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">
                        </th>
                        <th>分类名称</th>
                        <th>排序</th>
                        <!-- <th>餐桌使用费(包间费)</th> -->
                        <th>容客数</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="parent">
                        <td>
                            <input type="checkbox" class="i-checks" name="input[]">
							<span class="pull-right">
							   <i class="fa fa-sort-desc"></i>
							</span>
                        </td>
                        <td><i class="fa fa-edit"></i>&nbsp;&nbsp;一楼</td>
                        <td>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","0");' class="max_a">&nbsp;</a>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","3");' class="min_a">&nbsp;</a>
                        </td>
                        <!-- <td></td> -->
                        <td>90</td>
                        <td><a href="#">删除</a></td>
                    </tr>
                    <tr class="gray-bg">
                        <td>
                            <input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">

                        </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/data/images/zhe.png">&nbsp;&nbsp;&nbsp;&nbsp;一楼1</td>
                        <td>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                        </td>
                        <!-- <td>22</td> -->
                        <td>90</td>
                        <td><a href="#">编辑</a>｜<a href="#">删除</a></td>
                    </tr>
                    <tr class="gray-bg">
                        <td>
                            <input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">
                        </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/data/images/zhe.png">&nbsp;&nbsp;&nbsp;&nbsp;一楼2</td>
                        <td>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                        </td>
                        <!-- <td>22</td> -->
                        <td>90</td>
                        <td><a href="#">编辑</a>｜<a href="#">删除</a></td>
                    </tr>
                    <tr class="gray-bg">
                        <td>
                            <input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">
                        </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/data/images/zhe.png">&nbsp;&nbsp;&nbsp;&nbsp;一楼3</td>
                        <td>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                        </td>
                        <!-- td>22</td> -->
                        <td>90</td>
                        <td><a href="#">编辑</a>｜<a href="#">删除</a></td>
                    </tr>
                    <tr class="parent">
                        <td>
                            <input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">
									<span class="pull-right">
									   <i class="fa fa-sort-desc"></i>
									</span>
                        </td>
                        <td><i class="fa fa-edit"></i>&nbsp;&nbsp;二楼</td>
                        <td>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","0");' class="max_a">&nbsp;</a>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","3");' class="min_a">&nbsp;</a>
                        </td>
                        <!-- <td>99</td> -->
                        <td>26</td>
                        <td><a href="#">删除</a></td>
                    </tr>
                    <tr class="gray-bg">
                        <td>
                            <input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">
                        </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/data/images/zhe.png">&nbsp;&nbsp;&nbsp;&nbsp;一楼1</td>
                        <td>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                        </td>
                        <!-- <td>22</td> -->
                        <td>90</td>
                        <td><a href="#">编辑</a>｜<a href="#">删除</a></td>
                    </tr>
                    <tr class="gray-bg">
                        <td>
                            <input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">
                        </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/data/images/zhe.png">&nbsp;&nbsp;&nbsp;&nbsp;一楼1</td>
                        <td>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                        </td>
                        <!-- <td>22</td> -->
                        <td>90</td>
                        <td><a href="#">编辑</a>｜<a href="#">删除</a></td>
                    </tr>
                    <tr class="gray-bg">
                        <td>
                            <input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">
                        </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/data/images/zhe.png">&nbsp;&nbsp;&nbsp;&nbsp;一楼1</td>
                        <td>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                        </td>
                        <!-- <td>22</td> -->
                        <td>90</td>
                        <td><a href="#">编辑</a>｜<a href="#">删除</a></td>
                    </tr>
                    <tr class="parent">
                        <td>
                            <input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">
									 <span class="pull-right">
									   <i class="fa fa-sort-desc"></i>
									</span>
                        </td>
                        <td><i class="fa fa-edit"></i>&nbsp;&nbsp;六楼</td>
                        <td>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","0");' class="max_a">&nbsp;</a>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","3");' class="min_a">&nbsp;</a>
                        </td>
                        <!-- <td>499</td> -->
                        <td>20</td>
                        <td><a href="#">删除</a></td>
                    </tr>
                    <tr class="gray-bg">
                        <td>
                            <input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">
                        </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/data/images/zhe.png">&nbsp;&nbsp;&nbsp;&nbsp;一楼1</td>
                        <td>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                        </td>
                        <!-- <td>22</td> -->
                        <td>90</td>
                        <td><a href="#">编辑</a>｜<a href="#">删除</a></td>
                    </tr>
                    <tr class="gray-bg">
                        <td>
                            <input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">
                        </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/data/images/zhe.png">&nbsp;&nbsp;&nbsp;&nbsp;一楼1</td>
                        <td>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                        </td>
                        <!-- <td>22</td> -->
                        <td>90</td>
                        <td><a href="#">编辑</a>｜<a href="#">删除</a></td>
                    </tr>
                    <tr class="gray-bg">
                        <td>
                            <input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">
                        </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/data/images/zhe.png">&nbsp;&nbsp;&nbsp;&nbsp;一楼1</td>
                        <td>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","1");' class="shang_a">&nbsp;</a>
                            <a href='javascript:sort_do("-5","41","21","20","-13","-6","2");' class="xia_a">&nbsp;</a>
                        </td>
                        <!-- <td>22</td> -->
                        <td>90</td>
                        <td><a href="#">编辑</a>｜<a href="#">删除</a></td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e7eaec;">
                        <td></td>
                        <td colspan="5">
                            <span><a href="#"><i class="fa fa-plus-square"></i>&nbsp;添加分类</a></span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-12 m-t-sm">
        <div class="col-sm-6">
            <div class="dataTables_info" id="editable_info" role="alert" aria-live="polite" aria-relevant="all">显示 1 到 10 项，共 57 项</div>
        </div>
        <div class="col-sm-6">
            <div class="dataTables_paginate paging_simple_numbers" id="editable_paginate">
                <ul class="pagination">
                    <li class="paginate_button previous disabled" aria-controls="editable" tabindex="0" id="editable_previous"><a href="#">上一页</a></li>
                    <li class="paginate_button active" aria-controls="editable" tabindex="0"><a href="#">1</a></li>
                    <li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">2</a></li>
                    <li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">3</a></li>
                    <li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">4</a></li>
                    <li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">5</a></li>
                    <li class="paginate_button " aria-controls="editable" tabindex="0"><a href="#">6</a></li>
                    <li class="paginate_button next" aria-controls="editable" tabindex="0" id="editable_next"><a href="#">下一页</a></li>
                </ul>
            </div>
        </div>
        <div class="m-t-sm"><button class="btn btn-w-m btn-primary" type="button">保&nbsp;&nbsp;存</button></div>
    </div>
</div>
