<?php  header("Content-type: text/html; charset=utf-8");

class Admin_big extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/system_big_model');
		$this->load->model('util_model');
		if(!isset($_SESSION)){
			session_start();
		}
	}
	//推荐位管理
	public function big_list(){
		$type_list=array();
		$big_list=array();
		$type_list=$this->system_big_model->type_list();
		/*if(count($type_list)>0){
			$big_list=$this->system_big_model->big_list($type_list['0']['type_id']);
			$data['type_id']=$type_list['0']['type_id'];
		}*/
		$data['type_list']=$this->JSON($type_list);
		/*$data['big_list']= $this->JSON($big_list);*/
		$this->load->view('base/recommend/list',$data);
	}
	//搜索推荐位
	public function big_find(){
		$type_list=array();
		$big_list=array();
		$type_list=$this->system_big_model->type_list();
		$type_id=$_POST['type_id'];
		$big_list=$this->system_big_model->big_list($type_id);
		$data['type_id']=$type_id;
		$data['type_list']=$type_list;
		$data['big_list']=$big_list;
		$this->load->view('base/recommend/list',$data);
	}
	//添加推荐
	public function big_add_show(){
		$data=$this->system_big_model->get_dish_list();
		$data['type_id']=$_GET['type_id'];
		$this->load->view('base/recommend/addOrEdit',$data);
	}
	public function big_add(){
		$bl=$this->system_big_model->big_add();
		echo $bl;
	}
	//推荐排序
	public function big_sort(){
		$type_id=$_GET['type_id'];
		$sort_id=$_GET['sort_id'];
		$sort_value_1=$_GET['sort_value_1'];
		$sort_value_2=$_GET['sort_value_2'];
		$sort_type=$_GET['sort_type'];
		$tab_name="shop_big_show";
		$tab_asc="show_asc";
		$asc_type=$sort_type;
		$upd_arr=array("show_id"=>$sort_id);
		$where_arr=array('dish_type_id'=>$type_id);
		
		$sort_value=$_GET['sort_value'];
		$sort_id_1=$_GET['tab_id_1'];
		$sort_id_2=$_GET['tab_id_2'];
		$tab_sort_id="show_id";
		$this->util_model->sort_do_1($tab_sort_id,$sort_value,$sort_id_1,$sort_id_2,$tab_name,$tab_asc,$asc_type,$where_arr,$upd_arr,$sort_value_1,$sort_value_2);
		//$this->util_model->sort_do($tab_name,$tab_asc,$asc_type,$where_arr,$upd_arr,$sort_value_1,$sort_value_2);

		$type_list=array();
		$big_list=array();
		$type_list=$this->system_big_model->type_list();
		//$big_list=$this->system_big_model->big_list($type_id);
		//$data['type']= $this->JSON($type_list['0']);
		$data['type_list']=$type_list;
		//$data['big_list']=$this->JSON($big_list);
		$data = $this->JSON($data);
		// $this->load->view('base/recommend/list',$data);
		echo $data;
	}
	//批量操作
	public function big_batch(){
		$tab_name="shop_big_show";
		$tab_id_name="show_id";
		$tab_id=&$_POST['show_id'];
		$state_name="show_state";
		$batch_value=$_POST['batch_value'];
		if($tab_id!=""){
			$this->util_model->batch_do($tab_name,$tab_id_name,$tab_id,$state_name,$batch_value);
		}
		
		//$type_id=$_POST['type_id'];
		$type_list=array();
		//$big_list=array();
		$type_list=$this->system_big_model->type_list();
		//$big_list=$this->system_big_model->big_list($type_id);
		//$data['type']=$type_list['0'];
		$data['type_list']=$type_list;
		//$data['big_list']=$big_list;
		$data = $this->JSON($data);
		//$this->load->view('base/recommend/list',$data);
		echo $data;
	}
	//删除
	public function big_delete(){
		$tab_name="shop_big_show";
		$tab_id_name="show_id";
		$tab_id=$_GET['show_id'];
		$this->util_model->delete_do($tab_name,$tab_id_name,$tab_id);
		
		$type_id=$_GET['type_id'];
		$type_list=array();
		//$big_list=array();
		$type_list=$this->system_big_model->type_list();
		//$big_list=$this->system_big_model->big_list($type_id);
		//$data['type']=$type_list['0'];
		$data['type_list']=$type_list;
		//$data['big_list']=$big_list;
		//$this->load->view('base/recommend/list',$data);
		$data = $this->JSON($data);
		echo $data;
	}
	//编辑推荐信息
	public function big_update_show(){
		$show_id=$_GET['show_id'];
		$data=$this->system_big_model->get_big($show_id);
		$this->load->view('base/recommend/addOrEdit',$data);
	}
	public function big_upd(){
		$bl=$this->system_big_model->big_upd();
		echo $bl;
	}
	
}
?>