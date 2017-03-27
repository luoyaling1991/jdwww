<?php  header("Content-type: text/html; charset=utf-8");

class Admin_vip extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('system/system_model');
		if(!isset($_SESSION)){
			session_start();
		}
	}
	//订单信息管理
	public function vip_log(){
		$page=1;
		$data=$this->system_model->vip_log_list($page);
		$this->load->view('system/vip_log/list',$data);
	}
	public function vip_log_do(){
		$page=$_GET['page'];
		$data=$this->system_model->vip_log_list($page);
		$this->load->view('system/vip_log/list',$data);
	}
	//信息列表
	public function index(){
		$data=$this->system_model->vip_list();
		$this->load->view('system/vip/list',$data);
	}
	//新增
	public function add_show(){
		$this->load->view('system/vip/add');
	}
	public function add(){
		$bl=$this->system_model->add_vip();
		if($bl){
			$this->index();
		}else{
			echo "<script>alert('操作执行失败，请重试!');history.go(-1);</script>";
		}
	}
	//查看编辑
	public function upd_show(){
		$v_id=$_GET['v_id'];
		$data=$this->system_model->get_vip($v_id);
		$this->load->view('system/vip/upd',$data);
	}
	public function upd(){
		$bl=$this->system_model->upd_vip();
		if($bl){
			$this->index();
		}else{
			echo "<script>alert('操作执行失败，请重试!');history.go(-1);</script>";
		}
	}
}
?>