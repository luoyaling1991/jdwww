<?php  header("Content-type: text/html; charset=utf-8");
class Admin_login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		session_start();
	}
	
	public function index(){
		$this->load->view('account/login');
	}
	
	public function login_out(){
		unset($_SESSION['admin_user']);
		redirect('admin/admin_login');
	}

}
?>