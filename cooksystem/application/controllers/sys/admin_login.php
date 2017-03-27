<?php  header("Content-type: text/html; charset=utf-8");
class Admin_login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		session_start();
	}
	
	public function index(){
		$this->load->view('system/login_soft.php');
	}
	
	public function login_out(){
		unset($_SESSION['system_user']);
		redirect('sys/admin_login');
	}

}
?>