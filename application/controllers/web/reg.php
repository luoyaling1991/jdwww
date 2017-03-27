<?php header("content-type:text/html;charset=utf-8");
class Reg extends CI_Controller{
	function __construct(){
		parent::__construct();
		if (!isset($_SESSION)) {
			session_start();
		}
		$this->load->model('admin/admin_shop_model');
		$this->load->model('admin/admin_user_model');
		$this->load->model('sms/sms_model');
	}
	public function index(){
		$this->load->view('account/register.php');
	}
	//注册用户
	public function reg_do(){
		$bl=$this->admin_shop_model->reg_do();
		if($bl==1){
			redirect('admin/admin_index/system');
		}if($bl==0){
			echo "<script>alert('注册用户失败，请重试!');history.go(-1);</script>";
		}else{
			echo "<script>alert('该注册号已经在我们平台注册了账户，请核实!');history.go(-1);</script>";
		}
	}
	//发送短信验证码
	public function send_mail_phone(){
				$data=&$_POST['shop_mobile'];
				$log_type=0;
				$log_yz=0;
				$num=rand(1000, 9999);
				$insert_time=date("Y-m-d H:i:s",time());
				
				$arr=array('shop_id'=>0,'log_yz'=>$log_yz,'log_type'=>$log_type,'log_dx'=>$data,'log_txt'=>$num,'log_state'=>0,'insert_time'=>$insert_time);
				$re=$this->admin_user_model->insert('shop_check_log',$arr);
				
				//发送短信验证码
				$this->sms_model->sendSMS($data,array("{$num}"),55221);
				echo $num;//发送短信成功
	}

}