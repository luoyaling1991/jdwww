<?php  header("Content-type: text/html; charset=utf-8");

class Admin_waiter extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/system_waiter_model');
		$this->load->model('util_model');
		if(!isset($_SESSION)){
			session_start();
		}
	}
	//员工
	public function waiter_list(){
		$page_no = isset($_POST['page_no']) ? $_POST['page_no'] : 1;
		$page_size = 10;
		$data=$this->system_waiter_model->waiter_list($page_no, $page_size);
		$data['waiter_list']=$this->JSON($data['waiter_list']);
		$this->load->view('base/employee/list',$data);
	}
	//添加
	public function waiter_add_show(){
		$this->load->view('base/employee/addOrEdit');
	}
	public function waiter_add(){
		$bl=$this->system_waiter_model->waiter_add();
		echo $bl;
	}
	//批量操作
	public function waiter_batch(){
		$tab_name="shop_waiter";
		$tab_id_name="waiter_id";
		$tab_id=&$_POST['waiter_id'];
		$state_name="waiter_state";
		$batch_value=$_POST['batch_value'];
		if($tab_id!=""){
			$this->util_model->batch_do($tab_name,$tab_id_name,$tab_id,$state_name,$batch_value);
		}
		$this->waiter_list();
	}
	//编辑
	public function waiter_update_show(){
		$waiter_id=$_GET['waiter_id'];
		$data=$this->system_waiter_model->get_waiter($waiter_id);
		$this->load->view('base/employee/addOrEdit',$data);
	}
	public function waiter_upd(){
		$bl=$this->system_waiter_model->waiter_upd();
		echo $bl;
	}
	//删除
	public function waiter_delete(){
		$tab_name="shop_waiter";
		$tab_id_name="waiter_id";
		$tab_id=$_GET['waiter_id'];
		$this->util_model->delete_do($tab_name,$tab_id_name,$tab_id);
		$this->waiter_list();
	}
}
?>