<div class="row wrapper border-bottom page-heading">
	<div class="col-lg-10">
		<h2 style="color:#e65445;font-weight:bold;float:left;">参数配置</h2>
		<h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Parameter configuration</h3>
	</div>
</div>
<div class="wrapper feed-element">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<form method="get" class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-1 control-label">商家名称</label>
						<div class="col-md-6">
							<input class="form-control" type="text" value="" placeholder="用于小票打印和与平板端店名显示"/>
						</div>
						<div class="col-md-4">
							<label class="control-label text-muted" style="font-weight:normal;color: #a0a0a0;">还能输入<span class="text-danger">5</span>个字</label>
						</div>
					</div>
					<!--
					<div class="form-group">
						<label class="col-sm-1 control-label">餐具费用</label>
						<div class="col-md-2">
							<input class="form-control" type="number" value="" placeholder="0.00"/>
						</div>
						<div class="col-md-4">
							<label class="control-label" style="font-weight:normal;">元/人</label>
						</div>
						<div class="col-md-4">
							<label class="control-label text-muted" style="font-weight:normal;color: #a0a0a0;">不填写则不收取</label>
						</div>
					</div>\
					-->
					<div class="form-group">
						<label class="col-sm-1 control-label">联系方式</label>
						<div class="col-md-6">
							<input class="form-control" type="text" value="" />
						</div>
						<div class="col-md-4">
							<label class="control-label text-muted" style="font-weight:normal;color: #a0a0a0;">不设置则不打印联系方式</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label">地址设置</label>
						<div class="col-md-6">
							<input class="form-control" type="text" value="" />
						</div>
						<div class="col-md-4">
							<label class="control-label text-muted" style="font-weight:normal;color: #a0a0a0;">不设置则不打印地址</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label">其他信息</label>
						<div class="col-md-6">
							<textarea class="form-control"></textarea>
						</div>
						<div class="col-md-4">
							<label class="control-label text-muted" style="font-weight:normal;color: #a0a0a0;">不设置则不打印其他信息</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label">打印设置</label>
						<div class="col-md-3">
							<div class="radio i-checks radio-inline radio-item" style="margin-right: 20px;">
								<input type="radio" class="type" value="1" name="type" style="position: absolute; opacity: 0;" checked>
								&nbsp;&nbsp;58mm
							</div>
							<div class="radio i-checks radio-inline radio-item">
								<input type="radio" class="type" value="2" name="type" style="position: absolute; opacity: 0;">
								&nbsp;&nbsp;80mm
							</div>
						</div>
						<div class="col-md-1">
							<label class="control-label text-muted" style="font-weight:normal;"><a href="#">测试打印</a></label>
						</div>
						<div class="col-md-2">
							<label class="control-label text-muted" style="font-weight:normal;"><a href="#">打印机配置帮助手册</a></label>
						</div>
					</div>
					<div class="form-group" style="margin-left: 15px;">
						<button class="btn btn-w-m btn-primary" type="button">确&nbsp;&nbsp;定</button>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<button class="btn btn-w-m btn-white" type="cancel">重&nbsp;&nbsp;置</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('.i-checks').iCheck({
			checkboxClass: 'icheckbox_square-green',
			radioClass: 'iradio_square-green'
		});
	});
</script>