<div class="row wrapper border-bottom page-heading">
	<div class="col-lg-10">
		<h2 style="color:#e65445;font-weight:bold;float:left;">营业状况</h2>
		<h3 style="float:left;margin-left:10px;margin-top:28px;color:#a0a0a0;font-weight:normal;">Business overview</h3>
	</div>
</div>
<div class="wrapper feed-element">
	<div class="col-sm-6">
		<h3>销售排名</h3>
		<div class="ibox float-e-margins m-t">
			<div class="ibox-title" style="padding:7px 20px 0;">
				<ul class="nav nav-pills  pull-right" style="margin-left: 10px;">
					<li><button class="btn btn-white" type="button" data-toggle="modal" data-target="#addTable"><i></i>查看详情</button>
					</li>
				</ul>
				<div data-toggle="buttons" class="btn-group  pull-right">
					<label class="btn btn-sm btn-white active">
						<input type="radio" id="option1" name="options">日</label>
					<label class="btn btn-sm btn-white">
						<input type="radio" id="option2" name="options">周</label>
					<label class="btn btn-sm btn-white">
						<input type="radio" id="option3" name="options">月</label>
				</div>

			</div>
			<div class="ibox-content">
				<div class="table-responsive" style="height:285px;">
					<table class="table table-striped dataTable">
						<thead>
						<tr>
							<th>NO</th>
							<th>菜品</th>
							<th>销量</th>
							<th>单价</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>01</td>
							<td>宫保鸡丁</td>
							<td>214</td>
							<td>18.00</td>
						</tr>
						<tr>
							<td>02</td>
							<td>鱼香肉丝</td>
							<td>289</td>
							<td>22</td>
						</tr>
						<tr>
							<td>03</td>
							<td>回锅肉</td>
							<td>567</td>
							<td>28</td>
						</tr>
						<tr>
							<td>04</td>
							<td>粉蒸排骨</td>
							<td>453</td>
							<td>34</td>
						</tr>
						<tr>
							<td>03</td>
							<td>回锅肉</td>
							<td>567</td>
							<td>28</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<h3>客流量</h3>
		<div class="ibox float-e-margins m-t">
			<div class="ibox-title" style="padding:7px 20px 0;">
				<div data-toggle="buttons" class="btn-group  pull-right">
					<label class="btn btn-sm btn-white active">
						<input type="radio" id="option1" name="options">日</label>
					<label class="btn btn-sm btn-white">
						<input type="radio" id="option2" name="options">周</label>
					<label class="btn btn-sm btn-white">
						<input type="radio" id="option3" name="options">月</label>
				</div>
			</div>
			<div class="ibox-content">
				<div id="morris-one-line-chart" style="height:287px;"></div>
			</div>
		</div>
	</div>
	<div class="col-md-12 m-t">
		<h3>销售统计</h3>
		<div class="ibox float-e-margins m-t">
			<div class="ibox-title" style="padding:7px 20px 0;">
				<ul class="nav nav-pills  pull-right">
					<li><button class="btn btn-white" type="button" data-toggle="modal" data-target="#addTable"><i></i>查看详情</button>
					</li>
				</ul>
			</div>
			<div class="ibox-content">
				<div id="morris-area-chart" style="height:285px;"></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	Morris.Line({
		element: 'morris-one-line-chart',
		data: [
			{ year: '2008', value: 5 },
			{ year: '2009', value: 10 },
			{ year: '2010', value: 8 },
			{ year: '2011', value: 22 },
			{ year: '2012', value: 8 },
			{ year: '2014', value: 10 },
			{ year: '2015', value: 5 }
		],
		xkey: 'year',
		ykeys: ['value'],
		resize: true,
		lineWidth:4,
		labels: ['Value'],
		lineColors: ['#1ab394'],
		pointSize:5
	});
	Morris.Area({
		element: 'morris-area-chart',
		data: [{
			period: '2010 Q1',
			iphone: 2666,
			ipad: null,
			itouch: 2647
		}, {
			period: '2010 Q2',
			iphone: 2778,
			ipad: 2294,
			itouch: 2441
		}, {
			period: '2010 Q3',
			iphone: 4912,
			ipad: 1969,
			itouch: 2501
		}, {
			period: '2010 Q4',
			iphone: 3767,
			ipad: 3597,
			itouch: 5689
		}, {
			period: '2011 Q1',
			iphone: 6810,
			ipad: 1914,
			itouch: 2293
		}, {
			period: '2011 Q2',
			iphone: 5670,
			ipad: 4293,
			itouch: 1881
		}, {
			period: '2011 Q3',
			iphone: 4820,
			ipad: 3795,
			itouch: 1588
		}, {
			period: '2011 Q4',
			iphone: 15073,
			ipad: 5967,
			itouch: 5175
		}, {
			period: '2012 Q1',
			iphone: 10687,
			ipad: 4460,
			itouch: 2028
		}, {
			period: '2012 Q2',
			iphone: 8432,
			ipad: 5713,
			itouch: 1791
		}],
		xkey: 'period',
		ykeys: ['iphone', 'ipad', 'itouch'],
		labels: ['iPhone', 'iPad', 'iPod Touch'],
		pointSize: 2,
		hideHover: 'auto',
		resize: true,
		lineColors: ['#87d6c6', '#54cdb4','#1ab394'],
		lineWidth:2,
		pointSize:1
	});
</script>