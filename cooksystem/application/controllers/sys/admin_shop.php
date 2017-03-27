<?php  header("Content-type: text/html; charset=utf-8");

class Admin_shop extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('system/system_model');
		if(!isset($_SESSION)){
			session_start();
		}
	}
	//商家
	public function index(){
		$where_arr="";
		$sys_where="";
		//获取搜索条件
		
		$shop_name=&$_POST['shop_name'];//商家名称
		if($shop_name!=""){
			$where_arr.=" and a.shop_name like '%{$shop_name}%'";
		}
		$reg_num=&$_POST['reg_num'];//商家名称
		if($reg_num!=""){
			$where_arr.=" and a.reg_num like '%{$reg_num}%'";
		}
		
		$page=1;
		$data=$this->system_model->shop_list($where_arr,$page);
		$this->load->view('system/shop/list',$data);
	}
	//翻页
	public function list_do(){
		$where_arr=$_GET['where_arr'];
		$page=&$_GET['page'];
		$data=$this->system_model->shop_list($where_arr,$page);
		$this->load->view('system/shop/list',$data);
	}
	public function shop_look(){
		$shop_id=$_GET['shop_id'];
		$data=$this->system_model->shop_look($shop_id);
		$this->load->view('system/shop/look',$data);
	}
	public function shop_del(){
		$shop_id=$_GET['shop_id'];
		$data=$this->system_model->shop_del($shop_id);
		$this->index();
	}
	public function upd_shop(){
		$shop_id=$_GET['shop_id'];
		$shop_state=$_GET['shop_state'];
		$this->system_model->shop_upd($shop_id,$shop_state);
		$data=$this->system_model->shop_look($shop_id);
		$this->load->view('system/shop/look',$data);
	}
	public function shop_upd_date(){
		$shop_date=$_POST['shop_date'];
		$shop_id=$_POST['shop_id'];
		$bl=$this->system_model->shop_upd_date($shop_id,$shop_date);
		if($bl){
			echo "<script>alert('操作执行成功！');history.go(-1);</script>";
		}else{
			echo "<script>alert('操作执行失败！');history.go(-1);</script>";
		}
		
	}
}
?>