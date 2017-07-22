<?php  header("Content-type: text/html; charset=utf-8");

class Admin_table extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/system_table_model');
		$this->load->model('util_model');
		if(!isset($_SESSION)){
			session_start();
		}
	}
	//餐桌
	public function table_list(){
		$data=$this->system_table_model->get_table_list("","");
		$this->load->view('base/table/list',$data);
		/*if(empty($data['type_list'])){
			$data['tishi']="您还没有餐桌分类信息，请先添加餐桌分类信息.";
			$this->load->view('admin/table/shop_table_type_add',$data);
		}else{
			if(empty($data['table_list']) && count($data['type_list'])==1){
				$data['tishi']="您还没有餐桌信息，请先添加餐桌信息.";
				$this->load->view('admin/table/shop_table_add',$data);
			}else{
				$this->load->view('admin/table/shop_table',$data);
			}
		}*/
	}
	public function table_find(){
		$type_id=&$_POST['type_id'];
		$tab_state=&$_POST['tab_state'];
		$data=$this->system_table_model->get_table_list($type_id,$tab_state);
		$this->load->view('base/table/list',$data);
	}
	//添加餐桌分类
	public function table_type_add_show(){
		$data['tishi']="";
			$this->load->view('base/table/list',$data);
	}
	//添加餐桌分类
	public function table_type_add(){
	    //记录当前添加的分类名称，用于重复提示操作人
        $type_name = $_POST['type_name'];
		$bl=$this->system_table_model->table_type_add();
		if((int)$bl==-1){
//			echo "<script>alert('已存在同名的餐桌分类，请核实!');history.go(-1);</script>";
            echo '{"state":-1,"msg":"已存在[ '.$type_name.' ]同名的餐桌分类，请核实!"}';
		}else{
			if($bl){
//				$this->table_type_list();
				echo '{"state":1,"msg":"/admin/admin_table/table_list"}';
			}else{
				echo '{"state":-1,"msg":"操作执行失败，请重试!"}';
			}
		}
	}
	//添加餐桌
	public function table_add_show(){
		$data=$this->system_table_model->get_table_list("","");
		$data['tishi']="";
		$this->load->view('base/table/list',$data);
	}
	public function table_add(){
		$bl=$this->system_table_model->table_add();
		if((int)$bl==-1){
//			echo "<script>alert('已存在同名的餐桌，请核实!');history.go(-1);</script>";
			echo "-1";
		}else{
			if($bl){
//				$this->table_list();
                echo "0";
			}else{
//				echo "<script>alert('操作执行失败，请重试!');history.go(-1);</script>";
				echo "-2";
			}
		}
	}
	
	//餐桌分类管理
	public function table_type_list(){
		$data['type_list']=$this->system_table_model->get_table_type_list();
		$this->load->view('admin/table/shop_table_type',$data);
	}
	//餐桌批量处理
	public function table_batch(){
		$tab_name="shop_table";
		$tab_id_name="tab_id";
		$tab_id=&$_POST['tab_id'];
		$state_name="tab_state";
		$batch_value=$_POST['batch_value'];
		if($tab_id!=""){
			$this->util_model->batch_do($tab_name,$tab_id_name,$tab_id,$state_name,$batch_value);
		}
		$this->table_find();
	}
	//餐桌分类批量处理
	public function table_type_batch(){
		$tab_name="shop_table_type";
		$tab_id_name="type_id";
		$tab_id=&$_POST['type_id'];
		$state_name="type_state";
		$batch_value=$_POST['batch_value'];
		if($tab_id!=""){
			$this->util_model->batch_do($tab_name,$tab_id_name,$tab_id,$state_name,$batch_value);
		}
		echo "<script>history.go(-1);</script>";
	}
	//删除餐桌
	public function table_delete(){
		$tab_name="shop_table";
		$tab_id_name="tab_id";
		$tab_id=$_GET['tab_id'];
		$table=$this->system_table_model->select_table_bl($tab_id);
		if($table['tab_state']==2){
//			echo "<script>alert('该餐桌正在使用，请勿删除！');history.go(-1);</script>";
			echo '{"state":-1,"msg":"该餐桌正在使用，请勿删除！"}';
		}else{
			$this->util_model->delete_do($tab_name,$tab_id_name,$tab_id);
//			echo "<script>history.go(-1);</script>";
			echo '{"state":1,"msg":"/admin/admin_table/table_list"}';
		}
		
	}
	//删除餐桌分类
	public function table_type_delete(){
		$tab_name="shop_table_type";
		$tab_id_name="type_id";
		$tab_id=$_GET['type_id'];
		//先验证该分类下是否有餐桌
		$list=$this->system_table_model->select_type_bl($tab_id);
		if(count($list)>0){
//			echo "<script>alert('该餐桌分类下有餐桌，请勿删除！');history.go(-1);</script>";
            echo '{"state":-1,"msg":"该餐桌分类下有餐桌，请勿删除！"}';
		}else{
			$this->util_model->delete_do($tab_name,$tab_id_name,$tab_id);
//			echo "<script>history.go(-1);</script>";
            echo '{"state":1,"msg":"/admin/admin_table/table_list"}';
		}
	}
	//餐桌编辑
	public function table_update_show(){
		$tab_id=$_GET['tab_id'];
		$data=$this->system_table_model->get_table($tab_id);
		echo $this->JSON($data);
	}
	public function table_update(){
		$bl=$this->system_table_model->table_update();
		if((int)$bl==-1){
			echo "-1";
		}else{
			if($bl){
				echo '0';
			}else{
				echo "-2";
			}
		}
	}
	//餐桌编辑
	public function table_type_update_show(){
		$type_id=$_GET['type_id'];
		$data=$this->system_table_model->get_table_type($type_id);

		$this->load->view('admin/table/shop_table_type_upd',$data);
	}
	public function table_type_update(){
		$bl=$this->system_table_model->table_type_update();
		if((int)$bl==-1){
			echo "<script>alert('已存在同名的餐桌分类，请核实!');history.go(-1);</script>";
		}else{
			if($bl){
				$this->table_type_list();
			}else{
				echo "<script>alert('操作执行失败，请重试!');history.go(-1);</script>";
			}
		}
	}
	//分类排序
	public function table_type_sort(){
		$sort_id=$_GET['sort_id'];
		$sort_value_1=$_GET['sort_value_1'];
		$sort_value_2=$_GET['sort_value_2'];
		$sort_type=$_GET['sort_type'];
		$tab_name="shop_table_type";
		$tab_asc="type_asc";
		$asc_type=$sort_type;
		$upd_arr=array("type_id"=>$sort_id);
		$where_arr=array('shop_id'=>$_SESSION['admin_user']['shop_id']);
		
		$sort_value=$_GET['sort_value'];
		$sort_id_1=$_GET['sort_id_1'];
		$sort_id_2=$_GET['sort_id_2'];
		$tab_sort_id="type_id";
		$this->util_model->sort_do_1($tab_sort_id,$sort_value,$sort_id_1,$sort_id_2,$tab_name,$tab_asc,$asc_type,$where_arr,$upd_arr,$sort_value_1,$sort_value_2);
		//$this->util_model->sort_do($tab_name,$tab_asc,$asc_type,$where_arr,$upd_arr,$sort_value_1,$sort_value_2);
		$this->table_list();
	}
	//餐桌排序
	public function table_sort(){
		$type_id=$_GET['type_id'];
		$sort_id=$_GET['sort_id'];
		$sort_value_1=$_GET['sort_value_1'];
		$sort_value_2=$_GET['sort_value_2'];
		$sort_type=$_GET['sort_type'];
		$tab_name="shop_table";
		$tab_asc="tab_asc";
		
		$sort_value=$_GET['sort_value'];
		$sort_id_1=$_GET['sort_id_1'];
		$sort_id_2=$_GET['sort_id_2'];
		$tab_sort_id="tab_id";
		
		$asc_type=$sort_type;
		$upd_arr=array("tab_id"=>$sort_id);
		$where_arr=array('type_id'=>$type_id);
		//$this->util_model->sort_do($tab_name,$tab_asc,$asc_type,$where_arr,$upd_arr,$sort_value_1,$sort_value_2);
		$this->util_model->sort_do_1($tab_sort_id,$sort_value,$sort_id_1,$sort_id_2,$tab_name,$tab_asc,$asc_type,$where_arr,$upd_arr,$sort_value_1,$sort_value_2);
		/*$tab_state="";
		$data=$this->system_table_model->get_table_list($type_id,$tab_state);
		$this->load->view('base/table/list',$data);*/
		$this->table_list();
	}
	
}
?>