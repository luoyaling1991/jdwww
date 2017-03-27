<?php header("content-type:text/html;charset=utf-8");
class admin_user extends MY_Controller{
	function __construct(){
		parent::__construct();
		if (!isset($_SESSION)) {
			session_start();
		}
		
		$this->load->model('admin/admin_user_model');
	}
	public function user_info(){
		$data=array();
		//获取省市县三级数据
		$data['province']=$this->admin_user_model->get_p();
		$data['city']=$this->admin_user_model->get_c();
		$data['area']=$this->admin_user_model->get_a();
		$re=$this->admin_user_model->get_c_a();
		$data['city_list']=$re['city_list'];
		$data['area_list']=$re['area_list'];
		unset($re);
		$data['user']=$this->admin_user_model->user_info();
		//获取店铺位置
		$p=$_SESSION['admin_user']['shop_qx_1'];//省
		$c=$_SESSION['admin_user']['shop_qx_2'];//市
		$a=$_SESSION['admin_user']['shop_qx_3'];//县
		$area=$this->admin_user_model->get_addr($p,$c,$a);
		$data['addr']=$area;
		//$data=$this->JSON($data);
		$this->load->view('account/userInfo',$data);
	}
	public function change_img(){
		$extend = explode(".",$_FILES["file"]["name"]);
		$key= count($extend)-1;
		$ext= $extend[$key];
		if ($ext=="jpg" || $ext=="png" || $ext="gif"){
			$newfile = time().".".$ext;
			$filePath="data/upload/";
			
			if (!file_exists($filePath)){//如果指定文件夹不存在，则创建文件夹
				mkdir($filePath, 0777, true);
			}
			$name=$filePath.$newfile;
			if(move_uploaded_file($_FILES['file']['tmp_name'],$name))
			{
				$is_success=1;
				$reason=$name;
			}
			@unlink($_FILES['file']);
			$reg_num=$_SESSION['admin_user']['reg_num'];
			$data=array('shop_logo'=>$name);
			$condition="reg_num = $reg_num";
			$re=$this->admin_user_model->update_logo($data,$condition);
			$_SESSION['admin_user']['shop_logo']=$name;
			echo $name;
		}else {
			echo 'error';
		}
	}
	public function update_user(){
		$reg_num=$_SESSION['admin_user']['reg_num'];
		$data['shop_name']=$_POST['shop_name'];
		$data['shop_person']=$_POST['shop_person'];
		$data['shop_desc']=$_POST['shop_desc'];
		$data['shop_phone']=$_POST['shop_phone'];
		$data['shop_qx_1']=$_POST['province'];
		$data['shop_qx_2']=$_POST['city'];
		$data['shop_qx_3']=$_POST['area'];
		$data['shop_address']=$_POST['shop_address'];
		$condition=array('reg_num'=>$reg_num);
		$re=$this->admin_user_model->update_userinfo($data,$condition);
		if ($re) {
			$re2=$this->admin_user_model->get_user_info($reg_num);
			unset($_SESSION['admin_user']);
			$_SESSION['admin_user']=$re2;
			$this->user_info();
		}else{
			echo "<script>alert('编辑失败,请重试！');history.go(-1);</script>";
		}
	}
	public function shop_phone(){
		$data=array();
		$this->load->view('admin/user/shop_phone',$data);
	}
	public function shop_phone_1(){
		$data=array();
		$data['type']=@$_GET['type'];
		$this->load->view('admin/user/shop_phone_1',$data);		
	}
	public function shop_email(){
		$this->load->view('admin/user/shop_email_2');
	}
	//绑定获取验证码
	public function get_num(){
		$shop_id=$_SESSION['admin_user']['shop_id'];
		$insert_time=date("Y-m-d H:i:s",time());
		$data=$_POST['data'];
		$pattern="/^1[3|4|5|8][0-9]\\d{8}$/";
		$re=preg_match($pattern, $data);//匹配成功就是手机验证
		$num=rand(1000,9999);
		if($re){
			//发送短信
			$log_type=0;
			$lod_yz=2;
			echo '1';
		}else{		
			$log_type=1;
			$lod_yz=5;
			//发送邮件
			$re=$this->admin_user_model->isalreadycheck($data);	
			if(empty($re)){//没有使用过验证
				$arr=array('shop_id'=>$shop_id,'lod_yz'=>$lod_yz,'log_type'=>$log_type,'log_dx'=>$data,'log_txt'=>$num,'log_state'=>0,'insert_time'=>$insert_time);
				$re=$this->admin_user_model->insert('shop_check_log',$arr);
			}else{//存在未使用的验证码
				//判断时间是否过期
				if(time()-strtotime($re['0']['insert_time'])<300){
					$num=$re['0']['log_txt'];//没有过期
				}else{//过期了,更改验证码值，时间；
					$log_id=$re['0']['log_id'];
					$arr2=array('log_txt'=>$num,'insert_time'=>date("Y-m-d H:i:s",time()));
					$this->admin_user_model->update_num($arr2,$log_id);
				}
			}
			$body= "亲爱的：".$data."您好，您正在使用该邮件地址作为你绑的邮箱，您本次的获得的绑定信息为".$num."，如果不是本人操作请忽略此邮件。请于5分钟内完成验证，5分钟后验证码将失效。";
			$subject="'简点'点餐邮箱验证码";
			echo $this->send_email($data,$subject,$body);//data   接收对象，subject 主题，body 邮件内容
			}
		die;
		
	}
	//更换绑定获取验证码
	public function get_num_2(){
		$data=$_POST['data'];
		$type=$_POST['type'];//验证类型1手机，2邮箱
		if($type==2){
			//检测原邮箱是否正确
			$cont=array('shop_email');
			$where=array('shop_id'=>$_SESSION['admin_user']['shop_id']);
			$re=$this->admin_user_model->select('sys_shop',$where,$cont);
			if($re['0']['shop_email']!=$data){//原邮件地址不符合
				echo "3";
			}else{//验证成功发送邮件
				//验证信息使用状态；
				$log_type=3;
				$lod_yz=5;
				$shop_id=$_SESSION['admin_user']['shop_id'];
				$num=rand(1000, 9999);$insert_time=date("Y-m-d H:i:s",time());
				$re=$this->admin_user_model->isalreadycheck($data);
				if(empty($re)){//没有使用过验证
					$arr=array('shop_id'=>$shop_id,'lod_yz'=>$lod_yz,'log_type'=>$log_type,'log_dx'=>$data,'log_txt'=>$num,'log_state'=>0,'insert_time'=>$insert_time);
					$re=$this->admin_user_model->insert('shop_check_log',$arr);
				}
				else{//存在未使用的验证码
					//判断时间是否过期
					if(time()-strtotime($re['0']['insert_time'])<300){
						$num=$re['0']['log_txt'];//没有过期
					}else{//过期了,更改验证码值，时间；
						$log_id=$re['0']['log_id'];
						$arr2=array('log_txt'=>$num,'insert_time'=>date("Y-m-d H:i:s",time()));
						$this->admin_user_model->update_num($arr2,$log_id);
					}
				}
				$subject="更换绑定邮箱";
				$body="亲爱的用户，欢迎使用伙夫点餐系统邮箱更换功能，您本获得的验证信息为：".$num.",本验证信息5分钟后将失效，请尽快完成验证，如果不是本人操作请忽略此邮件";
				$re=$this->send_email($data, $subject, $body);
				echo "2";//发送邮件
			}
		}
		else{//验证原始手机
			
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
	//验证验证码
	public function check_num(){
		$data=$_POST['data'];
		$log_txt=$_POST['log_txt'];
		$re=$this->admin_user_model->check_num($data,$log_txt);
		echo $re;
	}
	public function update_mail(){
		//商家绑定的邮箱为空的情况下，更新商家邮箱信息，更新验证码信息为已使用
		$data=$_POST['shop_mail'];
		$log_txt=$_POST['log_txt'];
		//检测有效性
		$bl=$this->admin_user_model->check_num_again($data,$log_txt);
		if(!$bl){//超时
			echo "<script>alert('对不起，您的验证码已经失效了，请重新获取验证码');</script>";
			$arr['shop_mail']=$data;
			$this->load->view("admin/user/shop_email_2.php",$arr);
		}else{//更新验证码使用情况
			$up_data=array(
					'log_state'=>2
			);
			$where=array(
					'log_dx'=>$data,
					'log_txt'=>$log_txt
			);
			$re=$this->admin_user_model->update('shop_check_log',$up_data,$where);			
			if($re){
				//更新店铺邮箱
				$up_data=array('shop_email'=>$data);
				$where=array('shop_id'=>$_SESSION['admin_user']['shop_id']);
				$re=$this->admin_user_model->update('sys_shop',$up_data,$where);
				$_SESSION['admin_user']['shop_email']=$data;
				echo "<script>alert('恭喜您，绑定邮箱成功');</script>";
				$this->user_info();
			}else{
				echo "<script>alert('对不起，绑定邮箱失败');</script>";
			}
		}		
	}
	public function shop_pad_1(){
		$data=array();
		$this->load->view('auth/security/appSecurity/app',$data);
	}
	//密码加密方式
	function md5_pwd($pwd){
		$md5=md5($pwd);
		$md5=substr($md5,0,strlen($md5)-1);
		$md5=md5($md5);
		return $md5;
	}
	//更新pad密码
	public function update_shop_pwd(){
		$table_name='sys_shop';
		$data=array('pad_pwd'=>$this->md5_pwd($_POST['pad_pwd']));
		$where=array('shop_id'=>$_SESSION['admin_user']['shop_id']);
		$re=$this->admin_user_model->update($table_name,$data,$where);
		if($re){
			$this->admin_user_model->update_token($this->md5_pwd($_POST['pad_pwd']),$_SESSION['admin_user']['shop_id']);
			echo "<script>alert('更新成功');location.href='user_info';</script>";
		}else{
			echo "<script>alert('更新失败,请重试');history.go(-1);</script>";
		}
	}
	
	//用户修改登录密码
	public function  shop_update_pwd_1(){
		$this->load->view('admin/user/shop_update_pwd_1');
	}
}