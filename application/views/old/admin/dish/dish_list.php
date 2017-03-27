<div class="row wrapper border-bottom page-heading">
	<div class="col-lg-10">
		<h2 style="color:#e65445;font-weight:bold;float:left;">品类管理</h2>
		<h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Category Manegement</h3>
	</div>
</div>
<div class="wrapper feed-element" style="height:462px;">
	<!--筛选及搜索行-->
	<div class="row">
		<div class="col-lg-12" style="height:34px;line-height:34px;">
			<label class="control-label pull-left">筛选</label>
			<div class="col-md-7">
				<div class="i-checks checkbox-inline">
					<label class="">
						<input type="checkbox" value="02" name="type" style="position: absolute; opacity: 0;"/>

						<label style="margin-left:5px;font-weight:normal;">全部</label>
					</label>
				</div>
				<div class="i-checks checkbox-inline">
					<label class="">
						<input type="checkbox" value="02" name="type" style="position: absolute; opacity: 0;">
						<label style="margin-left:5px;font-weight:normal;">套餐</label>
					</label>
				</div>
				<div class="i-checks checkbox-inline">
					<label class="">
						<input type="checkbox" value="02" name="type" style="position: absolute; opacity: 0;">

						<label style="margin-left:5px;font-weight:normal;">菜品</label>
					</label>
				</div>
				<div class="i-checks checkbox-inline">
					<label class="">
						<input type="checkbox" value="02" name="type" style="position: absolute; opacity: 0;">

						<label style="margin-left:5px;font-weight:normal;">汤类</label>
					</label>
				</div>
				<div class="i-checks checkbox-inline">
					<label class="">
						<input type="checkbox" value="02" name="type" style="position: absolute; opacity: 0;">

						<label style="margin-left:5px;font-weight:normal;">小吃</label>
					</label>
				</div>
				<div class="i-checks checkbox-inline">
					<label class="">
						<input type="checkbox" value="02" name="type" style="position: absolute; opacity: 0;">

						<label style="margin-left:5px;font-weight:normal;">酒水</label>
					</label>
				</div>
				<div class="i-checks checkbox-inline">
					<label class="">
						<input type="checkbox" value="02" name="type" style="position: absolute; opacity: 0;">

						<label style="margin-left:5px;font-weight:normal;">其他</label>
					</label>
				</div>
			</div>
			<label class="control-label pull-left" style="margin-right:12px;">状态</label>
			<select class="form-control pull-left" style="width:10%;">
				<option value="01">全部</option>
				<option value="02">已上架</option>
				<option value="03">未上架</option>
				<option value="04">出售中</option>
			</select>
			<div class="input-group col-md-3 pull-right">
				<input type="text" class="form-control">
						<span class="input-group-btn">
							<button type="button" class="btn btn-primary">搜索</button>
						</span>
			</div>
		</div>
	</div>
	<div class="ibox float-e-margins m-t">
		<div class="ibox-title">
			<ul class="nav nav-pills">
				<li style="margin-top: 8px;margin-left: 12px;margin-right: 20px;"><input type="checkbox" class="i-checks" name="input[]">&nbsp;&nbsp;全选</li>
				<li style="margin-right: 10px;"><button class="btn btn-white" type="button">上架</button>
				</li>
				<li style="margin-right: 10px;"><button class="btn btn-white" type="button">下架</button>
				</li>
				<li style="margin-right: 10px;"><button class="btn btn-white" type="button">批量删除</button>
				</li>
			</ul>
		</div>
		<div class="ibox-content" style="height:329px;background-color:#fff;padding-top:0px;">
			<div class="table-responsive" style="margin-bottom:10px;">
				<table class="table table-striped dataTable">
					<thead>
					<tr>
						<th>
							<div class="icheckbox_square-green" style="position: relative;">
								<input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">

							</div>
						</th>
						<th>ID</th>
						<th>菜名</th>
						<th class="sorting">单价</th>
						<th class="sorting">销量</th>
						<th>所属分类</th>
						<th>状态</th>
						<th class="sorting">发布时间</th>
						<th>操作</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>
							<input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">
						</td>
						<td>01</td>
						<td><i class="fa fa-edit"></i>&nbsp;&nbsp;宫保鸡丁</td>
						<td>
							<i class="fa fa-edit"></i>&nbsp;&nbsp;18
						</td>
						<td>214</td>
						<td>烧菜</td>
						<td>
							已上架
						</td>
						<td>2014-11-11 15:46:32</td>
						<td><a href="#">编辑</a>｜<a href="#">删除</a></td>
					</tr>
					<tr>
						<td>
							<input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">
						</td>
						<td>02</td>
						<td>
							<i class="fa fa-edit"></i>&nbsp;&nbsp;鱼香肉丝
						</td>
						<td><i class="fa fa-edit"></i>&nbsp;&nbsp;22</td>
						<td>289</td>
						<td>烧菜</td>
						<td class="text-danger">未上架</td>
						<td>2014-11-11 15:46:32</td>
						<td><a href="#">编辑</a>｜<a href="#">删除</a></td>
					</tr>
					<tr>
						<td>
							<input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">
						</td>
						<td>03</td>
						<td><i class="fa fa-edit"></i>&nbsp;&nbsp;回锅肉</td>
						<td><i class="fa fa-edit"></i>&nbsp;&nbsp;28</td>
						<td>567</td>
						<td>烧菜</td>
						<td class="text-navy">出售中</td>
						<td>2014-11-11 15:46:32</td>
						<td><a href="#">编辑</a>｜<a href="#">删除</a></td>
					</tr>
					<tr>
						<td>
							<input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">
						</td>
						<td>04</td>
						<td><i class="fa fa-edit"></i>&nbsp;&nbsp;粉蒸排骨</td>
						<td><i class="fa fa-edit"></i>&nbsp;&nbsp;32</td>
						<td>453</td>
						<td>蒸菜</td>
						<td class="text-navy">出售中</td>
						<td>2014-11-11 15:46:32</td>
						<td><a href="#">编辑</a>｜<a href="#">删除</a></td>
					</tr>
					<tr>
						<td>
							<input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">
						</td>
						<td>03</td>
						<td><i class="fa fa-edit"></i>&nbsp;&nbsp;回锅肉</td>
						<td><i class="fa fa-edit"></i>&nbsp;&nbsp;28</td>
						<td>567</td>
						<td>烧菜</td>
						<td class="text-navy">出售中</td>
						<td>2014-11-11 15:46:32</td>
						<td><a href="#">编辑</a>｜<a href="#">删除</a></td>
					</tr>
					<tr>
						<td>
							<input type="checkbox" class="i-checks" name="input[]" style="position: absolute; opacity: 0;">
						</td>
						<td>04</td>
						<td><i class="fa fa-edit"></i>&nbsp;&nbsp;粉蒸排骨</td>
						<td><i class="fa fa-edit"></i>&nbsp;&nbsp;32</td>
						<td>453</td>
						<td>蒸菜</td>
						<td class="text-navy">出售中</td>
						<td>2014-11-11 15:46:32</td>
						<td><a href="#">编辑</a>｜<a href="#">删除</a></td>
					</tr>
					</tbody>
				</table>
			</div>
			<div class="col-sm-6" style="font-size: 14px;font-weight: 400;">
				<span><a href="release_dishes.html"><i class="fa fa-plus-square"></i>&nbsp;发布新品</a></span>
				<span class="col-sm-offset-1"><a href="release_package.html"><i class="fa fa-plus-square"></i>&nbsp;发布套餐</a>
				</span>
			</div>
		</div>
	</div>
</div>
<div class="col-sm-12 m-t-sm">
	<div class="col-sm-6">
		<div class="dataTables_info" id="editable_info" role="alert" aria-live="polite" aria-relevant="all">显示 1 到 10 项，共 57 菜品</div>
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
</div>