<?php  header("Content-type: text/html; charset=utf-8");

class Admin_bar extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/admin_shop_model');
		$this->load->model('admin/admin_bar_model');
		if(!isset($_SESSION)){
			session_start();
		}
	}
	public function index(){
		$data_one=$this->admin_shop_model->get_sum();
		if($data_one['one']['yz_03']==1 || $data_one['one']['yz_04']==1 ){
			echo "<script>alert('暂无餐桌信息，无法进入吧台管理!');</script>";
			$this->load->view('platform/index');
		}else{
			//获取基本信息
			$data_list=$this->admin_bar_model->get_bar();
			$type_list=$this->JSON($data_list['type_list']);
			$order_no_list=$this->JSON($data_list['order_no_list']);
			$data['type_list']=$type_list;
			$data['order_no_list']=$order_no_list;
			$this->load->view('old/admin/bar/index',$data);
		}
		
	}
	//结账
	public function order_checkout(){
		$table_id=&$_POST['table_id'];//桌号
		$zk=&$_POST['zk'];//折扣
		$ss=&$_POST['ss'];//实收
		$bz=&$_POST['bz'];//备注
		$yy=&$_POST['yy'];//原因
		$data=$this->admin_bar_model->order_checkout($table_id,$zk,$ss,$bz,$yy);
		//$data=$this->admin_bar_model->get_bar();
		//$data=$this->JSON($data);
		echo $data;
	}
	//修改餐桌状态
	public function upd_tab(){
		$tab_id=&$_POST['t_id'];
		$tab_state=&$_POST['tab_state'];
		$this->admin_bar_model->upd_tab($tab_id,$tab_state);
		$data=$this->admin_bar_model->get_bar();
		$data=$this->JSON($data);
		echo $data;
	}
	//处理订单
	public function order_do(){
		$type=&$_POST['type'];
		$order_id=&$_POST['order_id'];
		$bl=$this->admin_bar_model->order_do($type,$order_id);
		$data=$this->admin_bar_model->get_bar();
		$data['bl']=$bl;
		$data=$this->JSON($data);
		echo $data;
	}
	//删除其中某个菜品
	public function del_log(){
		$log_id=&$_POST['log_id'];
		$this->admin_bar_model->del_log($log_id);
		$data=$this->admin_bar_model->get_bar();
		$data=$this->JSON($data);
		echo $data;
	}
	public function order_do_1(){
		$type=1;
		$order_id=181;
		$bl=$this->admin_bar_model->order_do($type,$order_id);
		$data=$this->admin_bar_model->get_bar();
		$data['bl']=$bl;
		$data=$this->JSON($data);

		echo $data;
	}
	public function ajax(){
		//获取基本信息
		$data=$this->admin_bar_model->get_bar();
		$data=$this->JSON($data);
		echo $data;
	}
	
}
?>