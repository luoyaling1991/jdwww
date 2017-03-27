<div class="row wrapper border-bottom page-heading">
	<div class="col-lg-10">
		<h2 style="color:#e65445;font-weight:bold;float:left;">账户信息</h2>
		<h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Accont information</h3>
	</div>
</div>
<div class="wrapper feed-element">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<form method="get" class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-1 control-label">企业注册号</label>
						<div class="col-md-6">
							<label class="control-label" style="font-weight:normal;">1234567890</label>
						</div>
						<div class="col-md-4">
							<label class="control-label text-muted" style="font-weight:normal;color: #a0a0a0;">用于登录唯一号</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label">企业全名</label>
						<div class="col-md-6">
							<i class="fa fa-edit pointer" onclick="edit(this);">&nbsp;&nbsp;</i>
							<input class="hidden form-control" value="成都市xxx大酒店有限公司"/>
							<label class="control-label" style="font-weight:normal;">成都市xxx大酒店有限</label>
						</div>
						<div class="col-md-4">
							<label class="control-label text-muted" style="font-weight:normal;color: #a0a0a0;">企业注册全称</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label">账户到期</label>
						<div class="col-md-6">
							<label class="control-label" style="font-weight:normal;">2017-12-12&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="javascript:void(0);" onclick="setContentUrl('<?php echo site_url('admin/admin_mall')?>')">立即充值</a></span></label>
						</div>
						<div class="col-md-4">
							<label class="control-label text-muted" style="font-weight:normal;color: #a0a0a0;">为不影响正常营业，请提前充值</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label">企业简介</label>
						<div class="col-md-6">
							<i class="fa fa-edit pointer" onclick="edit(this);">&nbsp;&nbsp;</i>
							<textarea class="hidden form-control" autofocus>请完善以下信息，方便我们更好的为你服务</textarea>
							<label class="control-label" style="font-weight:normal;text-align:justify;">请完善以下信息，方便我们更好的为你服务请完善以下信息，方便我们更好的为你服务请完善以下信息，方便我们
								更好的为你服务请完善以下信息，方便我们更好的为你服务请完善以下信息，方便我们更好的为你服务请完善以下信息，
								方便我们更好的为你服务请完善以下信息，方便我们更好的为你服务请完善以下信息，方便我们更好的为你服务请完善以
								下信息，方便我们更好的为你服务请完善以下信息，方便我们更好的为你服务请完善以下信息，方便我们更好的为你服务
								请完善以下信息，方便我们更好的为你服务请完善以下信息，方便我们更好的为你服务请完善以下信息，方便我们更好的
								为你服务请完善以下信息，方便我们更好的为你服务请完善以下信息，方便我们更好的为你服务请完善以下信息，方便我
								们更好的为你服务请完善以下信息，方便我们更好的为你服务请完善以下信息，方便我们更好的为你服务
							</label>
						</div>
						<div class="col-md-4">
							<label class="control-label text-muted" style="font-weight:normal;color: #a0a0a0;">请填写xxx字以内的简介</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label">联系人</label>
						<div class="col-md-6">
							<i class="fa fa-edit pointer" onclick="edit(this);">&nbsp;&nbsp;</i>
							<input class="hidden form-control" type="text" value="张三"/><label class="control-label" style="font-weight:normal;">张三</label>
						</div>
						<div class="col-md-4">
							<label class="control-label text-muted" style="font-weight:normal;color: #a0a0a0;">请填写联系人姓名，以方便联系</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label">联系电话</label>
						<div class="col-md-6">
							<i class="fa fa-edit pointer" onclick="edit(this);">&nbsp;&nbsp;</i>
							<input class="hidden form-control" type="text" value="028-12345678"/><label class="control-label" style="font-weight:normal;">028-12345678</label>
						</div>
						<div class="col-md-4">
							<label class="control-label text-muted" style="font-weight:normal;color: #a0a0a0;">请填写联系人电话，以方便联系</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label">所在区域</label>
						<div class="col-md-6">
							<i class="fa fa-edit pointer" onclick="edit(this);">&nbsp;&nbsp;</i>
							<section class="hidden">
								<select class="form-control" style="width:30%;float:left;">
									<option value="01">四川省</option>
									<option value="02">浙江省</option>
								</select>
								<select class="form-control" style="width:30%;float:left;">
									<option value="01">成都市</option>
									<option value="02">达州市</option>
								</select>
								<select class="form-control" style="width:30%;float:left;">
									<option value="01">高新区</option>
									<option value="02">武侯区</option>
								</select>
							</section>
							<label class="control-label" style="font-weight:normal;">四川省&nbsp;成都市&nbsp;高新区</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label">具体地址</label>
						<div class="col-md-6">
							<i class="fa fa-edit pointer" onclick="edit(this);">&nbsp;&nbsp;</i>
							<input class="hidden form-control" type="text" value="xx路xx号，xx-xx"/>
							<label class="control-label" style="font-weight:normal;">xx路xx号，xx-xx</label>
						</div>
						<div class="col-md-4">
							<label class="control-label text-muted" style="font-weight:normal;color: #a0a0a0;">请填写联系地址，以便联系</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label">安全手机</label>
						<div class="col-md-6">
							<label class="control-label" style="font-weight:normal;color: #e84e40;">13809229878&nbsp;&nbsp;&nbsp;&nbsp;<span><a  href="javascript:void(0);" onclick="setContentUrl('<?php
									if($_SESSION['admin_user']['two']!=1 || ($_SESSION['admin_user']['two']==1 && $_SESSION['admin_user']['is_check']==1) ){
										echo site_url('admin/admin_phone/index');}
									else{
										echo site_url('admin/admin_two/show_two_1');
									}?>')">修改</a></span></label>
						</div>
						<div class="col-md-4">
							<label class="control-label text-muted" style="font-weight:normal;color: #e84e40;">用于密码修改，接收验证码等重要信息</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label">安全邮箱</label>
						<div class="col-md-6">
							<label class="control-label" style="font-weight:normal;color: #e84e40;">456780123@qq.com&nbsp;&nbsp;&nbsp;&nbsp;<span><a  href="javascript:void(0);" onclick="setContentUrl('<?php
									if($_SESSION['admin_user']['two']!=1 || ($_SESSION['admin_user']['two']==1 && $_SESSION['admin_user']['is_check']==1) ){
										echo site_url('admin/admin_email/check_email');}
									else{
										echo site_url('admin/admin_two/show_two_1');
									}?>')">修改</a></span></label>
						</div>
						<div class="col-md-4">
							<label class="control-label text-muted" style="font-weight:normal;color: #e84e40;">用于密码修改，接收验证码等重要信息</label>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4">
							<button class="btn btn-w-m btn-primary" type="submit">确&nbsp;&nbsp;定</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function edit(obj){
		if($(obj).next().hasClass("hidden")){
			$(obj).hide();
			$(obj).next().removeClass("hidden").addClass("show").focus();
			$(obj).next().next().hide();
		}
	}
</script>