<?php  header("Content-type: text/html; charset=utf-8");

class Admin_set extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/system_set_model');
		$this->load->model('util_model');
		if(!isset($_SESSION)){
			session_start();
		}
	}
	//套餐展示
	public function set_list(){
		$where_arr="";
		$sys_where="";
		//获取搜索条件
		$type_id=&$_POST['type_id'];//菜品分类
		
		$set_name=&$_POST['set_name'];//菜品名称
		if($set_name!=""){
			$where_arr.=" and a.set_name like '%{$set_name}%'";
		}
		
		$set_state=&$_POST['state'];//菜品状态
		if($set_state!="" && $set_state!=-1){
			$where_arr.=" and a.set_state={$set_state}";
		}
		
		$asc_name="insert_time";
		$asc_type="desc";
		$page=1;
		$data=$this->system_set_model->set_list($where_arr,$type_id,$asc_name,$asc_type,$page);
		$this->load->view('admin/set/set_dish_list.php',$data);
	}
	public function set_list_do(){
		$where_arr=$_GET['where_arr'];
		$sys_where="";
		//获取搜索条件
		$type_id=&$_GET['type_id'];//菜品分类
		$asc_name=&$_GET['asc_name'];
		$asc_type=&$_GET['asc_type'];
		$page=&$_GET['page'];
		$data=$this->system_set_model->set_list($where_arr,$type_id,$asc_name,$asc_type,$page);
		$this->load->view('admin/set/set_dish_list.php',$data);
	}
	//校验套餐名称
	public function check_name(){
		$set_name=&$_POST['set_name'];
		$set_id=&$_POST['set_id'];
		$data=$this->system_set_model->check_name($set_name,$set_id);
		echo $data;
	}
	//套餐批量处理
	public function set_batch(){
		$tab_name="shop_set";
		$tab_id_name="set_id";
		$tab_id=&$_POST['set_id'];
		$state_name="set_state";
		$batch_value=$_POST['batch_value'];
		if($tab_id!=""){
			$this->util_model->batch_do($tab_name,$tab_id_name,$tab_id,$state_name,$batch_value);
			//批量删除时删除类型关联表信息
			if($batch_value==-1){
				$tab_id_name="dish_id";
				$this->util_model->batch_do_1("shop_dish_type_log",$tab_id_name,'1',$tab_id,$state_name,$batch_value);
				//删除推荐位
				$this->util_model->batch_do_2("shop_big_show","data_id",'2',$tab_id);
			}if($batch_value==0){
				//下架推荐位
				$this->util_model->batch_do_3("shop_big_show","data_id",'2',$tab_id);
			}
		}
		$this->set_list();
	}
	//删除套餐
	public function set_delete(){
		$tab_name="shop_set";
		$tab_id_name="set_id";
		$tab_id=$_GET['set_id'];
		$this->util_model->delete_do($tab_name,$tab_id_name,$tab_id);//删除菜品
		$tab_id_name="dish_id";
		$this->util_model->delete_do_1("shop_dish_type_log",$tab_id_name,$tab_id,'1');//删除菜品关联的分类
		$this->util_model->delete_do_2("shop_big_show","data_id",$tab_id,'2');//删除菜品关联的推荐位
		$this->set_list();
	}
	//编辑套餐
	public function set_update_show(){
		$set_id=$_GET['set_id'];
		$data=$this->system_set_model->get_set($set_id);
		$this->load->view('base/dishes/addOrEditPackage',$data);
	}
	public function set_update(){
		$bl=$this->system_set_model->set_upd();
		if((int)$bl==-1){
			echo "<script>alert('已存在同名的套餐，请核实!');history.go(-1);</script>";
		}else{
			if($bl){
				$this->set_list();
			}else{
				echo "<script>alert('操作执行失败，请重试!');</script>";
				$set_id=$_POST['set_id'];
				$data=$this->system_set_model->get_set($set_id);
				$this->load->view('base/dishes/addOrEditPackage',$data);
			}
		}
	}
	//添加套餐
	public function set_add_show(){
		$data=$this->system_set_model->get_dish_list();
		$this->load->view('base/dishes/addOrEditPackage',$data);
	}
	public function set_add(){
		$bl=$this->system_set_model->set_add();
		if((int)$bl==-1){
			echo "<script>alert('已存在同名的套餐，请核实!');history.go(-1);</script>";
		}else{
			if($bl){
				$this->set_list();
			}else{
				echo "<script>alert('操作执行失败，请重试!');history.go(-1);</script>";
			}
		}
	}
}
?>