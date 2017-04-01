<?php  header("Content-type: text/html; charset=utf-8");
class Admin_two extends CI_Controller {
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('admin/admin_user_model');
	}
	public function upd_two(){
		$data=array("two"=>$_POST['two']);
		$_SESSION['admin_user']['two']=$_POST['two'];
		$condition="shop_id = ".$_SESSION['admin_user']['shop_id'];
		$bl=$this->admin_user_model->upd_phone($data,$condition);
		if($bl){
			echo "1";
		}else{
			echo "-1";
		}
	}
	public function shop_setting(){
		$data['user']=$this->admin_user_model->user_info();
		$this->load->view('auth/security/backAuth/auth',$data);
	}
	public function show_two(){
		$data['time']=time();
		$this->load->view('admin/two/two',$data);
	}
	public function show_two_1(){
		$data['time']=time();
		$this->load->view('auth/login_auth',$data);
	}
	public function login_two(){
		$time=$_POST['time'];
		if($_SESSION['admin_user']['yz_pwd']==$this->md5_pwd($_POST['again_pwd_'.$time])){
			$_SESSION['admin_user']['is_check']=1;
			redirect('admin/admin_index/system');
		}else{
//			echo "<script>alert('二次验证密码错误，请重试!');</script>";
			$data['time']=time();
//            redirect('admin/admin_index/system');
			$this->load->view('auth/login_auth',$data);
//			$this->load->view(site_url('admin/admin_index/system'),$data);
            echo "<script>alert('二次验证密码错误，请重试!');</script>";
		}
	}
	public function login_two_1(){
		$time=$_POST['time'];
		if($_SESSION['admin_user']['yz_pwd']==$this->md5_pwd($_POST['again_pwd_'.$time])){
			$_SESSION['admin_user']['is_check']=1;
			echo "<script>top.location='".site_url('admin/admin_index/system')."'</script>";			
		}else{
			echo "<script>alert('二次验证密码错误，请重试!');</script>";
			$data['time']=time();
			$this->load->view('admin/two/two_1',$data);
		}
	}
	public function login_out(){
		$_SESSION['admin_user']['is_check']=0;
		redirect('admin/admin_index/system');
	}
	function md5_pwd($pwd){
		$md5=md5($pwd);
		$md5=substr($md5,0,strlen($md5)-1);
		$md5=md5($md5);
		return $md5;
	}

}
?>