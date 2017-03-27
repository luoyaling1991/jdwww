<?php header("content-type:text/html;charset=utf-8");
class Lose extends CI_Controller{
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
		$this->load->view('account/forget.php');
	}
	//验证账户信息
	public function check_lose(){
		$reg_num=&$_POST['reg_num'];
		$data=$this->admin_shop_model->select_info($reg_num);
		if($data['num']==-1){
			echo "<script>alert('请仔细核对账户信息!');history.go(-1);</script>";
		}else{
			$this->load->view('account/update_pass.php',$data);
		}
	}
	//修改密码
	public function upd_pwd(){
		$reg_num=&$_POST['reg_num'];
		$bl=$this->admin_shop_model->upd_pwd();
		if($bl==-1){
			echo "<script>alert('密码修改信息失败，请正确操作!');</script>";
			$reg_num=&$_POST['reg_num'];
			$data=$this->admin_shop_model->select_info($reg_num);
			if($data['num']==-1){
				echo "<script>alert('请仔细核对账户信息!');history.go(-1);</script>";
			}else{
				$this->load->view('account/update_pass.php',$data);
			}
		}else if($bl==0){
			echo "<script>alert('密码修改失败，请重试!');</script>";
			$reg_num=&$_POST['reg_num'];
			$data=$this->admin_shop_model->select_info($reg_num);
			if($data['num']==-1){
				echo "<script>alert('请仔细核对账户信息!');history.go(-1);</script>";
			}else{
				$this->load->view('account/update_pass.php',$data);
			}
		}else{
			echo "<script>alert('密码修改成功，请重新登录!');</script>";
			redirect('admin/admin_login');
		}
	}
	//发送邮件验证码
	public function send_email(){
		$reg_num=&$_POST['reg_num'];
		$check_email=$this->admin_shop_model->select_email($reg_num);
		$shop_email=&$_POST['useremail'];
		if($check_email==-1){
			//没找到这个注册码信息
			echo -1;
		}else{
			if($shop_email==$check_email){
				$log_type=1;
				$log_yz=3;
				$shop_id=$_SESSION['admin_user']['shop_id'];
				$num=rand(1000, 9999);
				$insert_time=date("Y-m-d H:i:s",time());
				
				$arr=array('shop_id'=>$shop_id,'log_yz'=>$log_yz,'log_type'=>$log_type,'log_dx'=>$shop_email,'log_txt'=>$num,'log_state'=>0,'insert_time'=>$insert_time);
				$re=$this->admin_user_model->insert('shop_check_log',$arr);
				
				$subject="'简点'点餐邮箱验证码";
				$body="亲爱的用户，本次获得的验证码为：".$num.",本验证信息仅用于本次操作验证，请尽快完成验证，如果不是本人操作请忽略此邮件！";
				$re=$this->send_gemail($shop_email, $subject, $body);
				echo $num;//发送邮件成功
			}else{
				echo -2;//邮箱地址没对
			}
		}
	}
	//发送短信验证码
	public function send_mail_phone(){
		$reg_num=&$_POST['reg_num'];
		$check_phone=$this->admin_shop_model->select_phone($reg_num);
		$data=&$_POST['shop_mobile'];
		if($check_phone==-1){
			//没找到这个注册码信息
			echo -1;
		}else{
			if($data==$check_phone){
				$log_type=0;
				$log_yz=0;
				$num=rand(1000, 9999);
				$insert_time=date("Y-m-d H:i:s",time());
				
				$arr=array('shop_id'=>0,'log_yz'=>$log_yz,'log_type'=>$log_type,'log_dx'=>$data,'log_txt'=>$num,'log_state'=>0,'insert_time'=>$insert_time);
				$re=$this->admin_user_model->insert('shop_check_log',$arr);
				
				//发送短信验证码
				$this->sms_model->sendSMS($data,array("{$num}"),55221);
				echo $num;//发送短信成功
			}else{
				echo -2;//手机号码没对
			}
		}
				
	}
	public function send_gemail($data,$subject,$body){//data收件人地址，subject主题，body内容
		require_once 'mail/class.phpmailer.php';
		//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
		$mail= new PHPMailer();
		$body= str_replace("\\n",'',$body);
		$mail->CharSet = "utf-8";   // 这里指定字符集！
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->Host       = "smtp.mxhichina.com"; // sets the SMTP server
		$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
		$mail->Username   = "service@jdmenu.cn"; // SMTP account username
		$mail->Password   = "Dc12121122a";        // SMTP account password
		$mail->SetFrom('service@jdmenu.cn', "'简点'点餐");
		$mail->AddReplyTo("$data","First Last");
		$mail->Subject    = $subject;
		$mail->AltBody    = $body; // optional, comment out and test
		$mail->MsgHTML($body);
		$address = "$data";
		$mail->AddAddress($address, "");
		// $mail->AddAttachment("images/phpmailer.gif");      // attachment
		// $mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
		if(!$mail->Send()) {
			return false;
		} else {
			return true;
		}
	}
}