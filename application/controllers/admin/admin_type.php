<?php  header("Content-type: text/html; charset=utf-8");

class Admin_type extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/system_type_model');
		$this->load->model('util_model');
		if(!isset($_SESSION)){
			session_start();
		}
	}
	//菜品分类
	public function type_list(){
		$data=$this->system_type_model->type_list();
		$this->load->view('base/dishType/list',$data);
	}
	// 获取分类下的菜品
	public function get_dish_list(){
		$type_id=$_GET['type_id'];
		$data=$this->system_type_model->get_type($type_id);
		$data=$this->JSON($data);
		echo $data;
	}
	//分类编辑
	public function type_update_show(){
		
		$type_id=$_GET['type_id'];
		$data=$this->system_type_model->get_type($type_id);
		$this->load->view('base/dishType/list',$data);
	}
	public function type_upd(){
		$bl=$this->system_type_model->type_upd();
		if($bl){
			$this->type_list();
		}else{
			echo "<script>alert('操作执行失败，请重试!');</script>";
			$type_id=$_POST['type_id'];
			$data=$this->system_type_model->get_type($type_id);
			$this->load->view('base/dishType/list',$data);
		}
	}
	//分类添加
	public function type_add_show(){
		$data=$this->system_type_model->get_dish_list();
		$this->load->view('base/dishType/list',$data);
	}
	public function type_add(){
		$type_name = $_POST['type_name'];
		$bl=$this->system_type_model->type_add($type_name);
		if($bl){
			$data=$this->system_type_model->type_list();
			$data=$this->JSON($data['type_list_1']);
			echo $data;
		}else{
			echo "1";
		}
	}
	//删除分类信息
	public function type_delete(){
		$tab_name="shop_dish_type";
		$tab_id_name="type_id";
		$tab_id=$_GET['type_id'];
		$this->util_model->delete_do($tab_name,$tab_id_name,$tab_id);//删除菜品
		$this->util_model->delete_do("shop_dish_type_log",$tab_id_name,$tab_id);//删除菜品关联的分类
		$data=$this->system_type_model->type_list();
		$data=$this->JSON($data['type_list_1']);
		echo $data;
		//$this->type_list();
	}
	//分类排序
	public function type_sort(){
		$sort_id=$_POST['sort_id'];
		$sort_value_1=$_POST['sort_value_1'];
		$sort_value_2=$_POST['sort_value_2'];
		$sort_type=$_POST['sort_type'];
		$tab_name="shop_dish_type";
		$tab_asc="type_asc";
		$asc_type=$sort_type;
		$upd_arr=array("type_id"=>$sort_id);
		$where_arr=array('shop_id'=>$_SESSION['admin_user']['shop_id']);
		
		$sort_value=$_POST['sort_value'];
		$sort_id_1=$_POST['tab_id_1'];
		$sort_id_2=$_POST['tab_id_2'];
		$tab_sort_id="type_id";
		$this->util_model->sort_do_1($tab_sort_id,$sort_value,$sort_id_1,$sort_id_2,$tab_name,$tab_asc,$asc_type,$where_arr,$upd_arr,$sort_value_1,$sort_value_2);
		//$this->util_model->sort_do($tab_name,$tab_asc,$asc_type,$where_arr,$upd_arr,$sort_value_1,$sort_value_2);
		$data=$this->system_type_model->type_list();
		$data=$this->JSON($data['type_list_1']);
		echo $data;
		//$this->type_list();
	}
	//批量处理
	public function type_batch(){
		$tab_name="shop_dish_type";
		$tab_id_name="type_id";
		$tab_id=&$_POST['type_id'];
		$state_name="type_state";
		$batch_value=$_POST['batch_value'];
		if($tab_id!=""){
			$this->util_model->batch_do($tab_name,$tab_id_name,$tab_id,$state_name,$batch_value);
			if($batch_value==-1){
				//删除菜品分类关联信息表
				$this->util_model->batch_do("shop_dish_type_log",$tab_id_name,$tab_id,$state_name,$batch_value);
			}
		}
		$data=$this->system_type_model->type_list();
		echo $data;
	}
	public function type_list_do(){
		$where_arr=$_GET['where_arr'];
		$sys_where="";
		//获取搜索条件
		$type_id=&$_GET['type_id'];//菜品分类
		$asc_name=&$_GET['asc_name'];
		$asc_type=&$_GET['asc_type'];
		$page=&$_GET['page'];
		$data=$this->system_dish_model->dish_list($where_arr,$type_id,$asc_name,$asc_type,$page);
		$this->load->view('base/dishType/list',$data);
	}
	public function  add_type_log() {
		$type_id = $_POST['type_id'];
		// 分类下选中的菜品
		$dish_list_log = $_POST['dish_list_log'];
		$bl=$this->system_type_model->type_add_log($type_id,$dish_list_log);
		unset($dish_list_log);
		if($bl){
			$data=$this->system_type_model->type_list();
			$data=$this->JSON($data['type_list_1']);
			echo $data;
		}else{
			echo "1";
		}
	}
	
}
?>