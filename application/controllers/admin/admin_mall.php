<?php  header("Content-type: text/html; charset=utf-8");

class Admin_mall extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/system_mall_model');
		$this->load->model('util_model');
		if(!isset($_SESSION)){
			session_start();
		}
	}
	//商品列表
	public function index(){
		$data=$this->system_mall_model->vip_list();
		$this->load->view('account/recharge',$data);
	}
	//本地处理
	public function log_do(){
		$out_trade_no = $_GET['out_trade_no'];
		//支付宝交易号
		$trade_no = $_GET['trade_no'];
		$this->system_mall_model->log_do($out_trade_no,$trade_no);
		redirect('admin/admin_index/system');
	}
	public function notify(){
		require_once "api/alipay.config.php";
		require_once "api/lib/alipay_notify.class.php";
		
		//计算得出通知验证结果
		$alipayNotify = new AlipayNotify($alipay_config);
		$verify_result = $alipayNotify->verifyNotify();
		
		if($verify_result) {//验证成功
			$out_trade_no = $_POST['out_trade_no'];
			//支付宝交易号
			$trade_no = $_POST['trade_no'];
			//交易状态
			$trade_status = $_POST['trade_status'];
		
			if($_POST['trade_status'] == 'TRADE_FINISHED' || $_POST['trade_status'] == 'TRADE_SUCCESS') {
				$this->system_mall_model->log_do($out_trade_no,$trade_no);
				echo "success";
			}else{
				echo "fail";
			}
				
		}
		else {
			//验证失败
			echo "fail";
		}
	}
	//购买商品
	public function buy(){
		$log=$this->system_mall_model->buy();
		
		require_once "api/alipay.config.php";
		require_once "api/lib/alipay_submit.class.php";
		
		/**************************请求参数**************************/
		//支付类型
		$payment_type = "1";
		//必填，不能修改
		//服务器异步通知页面路径
		$notify_url = site_url("admin/admin_mall/notify");
		//需http://格式的完整路径，不能加?id=123这类自定义参数
		//页面跳转同步通知页面路径return_url
		$return_url = base_url("/data/api/return_url.php");
		
		//商户订单号
		$out_trade_no = $log['log_no'];
		//商户网站订单系统中唯一订单号，必填
		//订单名称
		$subject ="会员充值";
		//必填
		//付款金额
		$total_fee = $log['money'];
		//必填
		//订单描述
		$body = $log['i_time'];
		//商品展示地址
		$show_url =BASE_URL;
		//需以http://开头的完整路径，例如：http://www.商户网址.com/myorder.html
		//防钓鱼时间戳
		$anti_phishing_key = "";
		//若要使用请调用类文件submit中的query_timestamp函数
		//客户端的IP地址
		$exter_invoke_ip = "";
		//非局域网的外网IP地址，如：221.0.0.1
		
		//构造要请求的参数数组，无需改动
		$parameter = array(
				"service" => "create_direct_pay_by_user",
				"partner" => trim($alipay_config['partner']),
				"seller_email" => trim($alipay_config['seller_email']),
				"payment_type"	=> $payment_type,
				"notify_url"	=> $notify_url,
				"return_url"	=> $return_url,
				"out_trade_no"	=> $out_trade_no,
				"subject"	=> $subject,
				"total_fee"	=> $total_fee,
				"body"	=> $body,
				"show_url"	=> $show_url,
				"anti_phishing_key"	=> $anti_phishing_key,
				"exter_invoke_ip"	=> $exter_invoke_ip,
				"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
		);
		
		//建立请求
		$alipaySubmit = new AlipaySubmit($alipay_config);
		$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
		echo $html_text;
	}
	
	
}
?>