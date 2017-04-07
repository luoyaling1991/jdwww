<?php header("content-type:text/html;charset=utf-8");
class admin_email extends MY_Controller{
	function __construct(){
		parent::__construct();
		if (!isset($_SESSION)) {
			session_start();
		}
		$this->load->model('admin/admin_user_model');
		$this->load->model('sms/sms_model');
	}
	//判断邮箱
	public function check_email(){
		$user=$this->admin_user_model->user_info();
		if($user['shop_email']==""){
			redirect('admin/admin_email/set_email');
		}else{
			redirect('admin/admin_email/upd_email_show');
		}
	}
	//绑定邮箱
	public function set_email(){
		$data['user']=$this->admin_user_model->user_info();
		$this->load->view('auth/security/bind/email',$data);
	}
	//更换绑定手机
	public function upd_email_show(){
        $_SESSION['type_identity'] = 'authority_email';
		$data['user']=$this->admin_user_model->user_info();
//		$this->load->view('auth/security/bind/email',$data);
        $this->load->view('auth/security/identity_auth',$data);
	}
    
    /**
     * 显示更新密码的view
     */
	public function show_email_view(){
        $data['user']=$this->admin_user_model->user_info();
		$this->load->view('auth/security/bind/email',$data);
    }
	
	//确认后填写新号码
	public function upd_email_show_1(){
		$data['user']=$this->admin_user_model->user_info();
		$this->load->view('admin/email/set_email',$data);
	}
	//编辑新地址
	public function update_email(){
		$data=array("shop_email"=>$_POST['shop_email']);
		$condition="shop_id = ".$_SESSION['admin_user']['shop_id'];
		$bl=$this->admin_user_model->upd_phone($data,$condition);
		if($bl){
//			redirect('admin/admin_user/user_info');
			echo site_url('admin/admin_user/user_info');
		}else{
//			echo "<script>alert('操作执行失败，请重试!');history.go(-1);</script>";
			echo "-1";
		}
		
	}
	//发送短信验证码
	public function get_num(){
		$data=$_POST['data'];
		$type=$_POST['type'];//验证类型1手机，2邮箱
		if($type==2){
			//检测原邮箱是否正确
			$cont=array('shop_email');
			$where=array('shop_id'=>$_SESSION['admin_user']['shop_id']);
			$re=$this->admin_user_model->select('sys_shop',$where,$cont);
			if($re['0']['shop_email']!=$data){//原邮件地址不符合
				echo "-1";
			}else{//验证成功发送邮件
				//验证信息使用状态；
				$log_type=1;
				$log_yz=2;
				$shop_id=$_SESSION['admin_user']['shop_id'];
				$num=rand(1000, 9999);
				$insert_time=date("Y-m-d H:i:s",time());
				
				$arr=array('shop_id'=>$shop_id,'log_yz'=>$log_yz,'log_type'=>$log_type,'log_dx'=>$data,'log_txt'=>$num,'log_state'=>0,'insert_time'=>$insert_time);
				$re=$this->admin_user_model->insert('shop_check_log',$arr);
				
				$subject="'简点'点餐邮箱验证码";
				$body="亲爱的".$_SESSION['admin_user']['shop_name']."用户，您在{$insert_time}本次获得的验证码为：<b>".$num."</b>,本验证信息仅用于本次操作验证，请尽快完成验证，如果不是本人操作请忽略此邮件！";
				$re=$this->send_email($data, $subject, $body);
				echo $num;//发送邮件成功
			}
		}
		else{//验证原始手机
			$cont=array('shop_mobile');
			$where=array('shop_id'=>$_SESSION['admin_user']['shop_id']);
			$re=$this->admin_user_model->select('sys_shop',$where,$cont);
			if($re['0']['shop_mobile']!=$data){//原手机号码不符合
				echo "-1";
			}else{//验证成功发送短信
				//验证信息使用状态；
				$log_type=0;
				$log_yz=2;
				$shop_id=$_SESSION['admin_user']['shop_id'];
				$num=rand(1000, 9999);
				$insert_time=date("Y-m-d H:i:s",time());
				
				$arr=array('shop_id'=>$shop_id,'log_yz'=>$log_yz,'log_type'=>$log_type,'log_dx'=>$data,'log_txt'=>$num,'log_state'=>0,'insert_time'=>$insert_time);
				$re=$this->admin_user_model->insert('shop_check_log',$arr);
				
			$this->sms_model->sendSMS($data,array("{$num}"),55221);
				echo $num;//发送短信成功
			}	
		}
	}
	
	public function get_new_num(){
		$shop_mobile=$_POST['shop_mobile'];
		$cont=array('shop_email');
		$where=array('shop_id'=>$_SESSION['admin_user']['shop_id']);
		$re=$this->admin_user_model->select('sys_shop',$where,$cont);
		if($re['0']['shop_email']==$shop_mobile && $re['0']['shop_email']!=""){//原手机号码不符合
			echo "-1";
		}else{//验证成功发送短信
			//验证信息使用状态；
			$log_type=1;
			$log_yz=5;
			$shop_id=$_SESSION['admin_user']['shop_id'];
			$num=rand(1000, 9999);
			$insert_time=date("Y-m-d H:i:s",time());
		
			$arr=array('shop_id'=>$shop_id,'log_yz'=>$log_yz,'log_type'=>$log_type,'log_dx'=>$shop_mobile,'log_txt'=>$num,'log_state'=>0,'insert_time'=>$insert_time);
			$re=$this->admin_user_model->insert('shop_check_log',$arr);
		
			$this->sms_model->sendSMS($shop_mobile,array("{$num}"),55221);
			echo $num;//发送短信成功
		}
	}

public function send_email($data,$subject,$body){//data收件人地址，subject主题，body内容
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
	
	public function send_mail($data,$subject,$body){//data接收地址，subject主题，body内容
		return true;
	}
	

}