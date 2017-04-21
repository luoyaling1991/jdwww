<?php  header("Content-type: text/html; charset=utf-8");

class Admin_dish extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/system_dish_model');
		$this->load->model('util_model');
		if(!isset($_SESSION)){
			session_start();
		}
	}
	//菜品
	public function dish_list(){
		$where_arr="";
		$sys_where="";
		//获取搜索条件
		$type_id=&$_POST['type_id'];//菜品分类
		
		$dish_name=&$_POST['dish_name'];//菜品名称
		if($dish_name!=""){
			$where_arr.=" and a.dish_name like '%{$dish_name}%'";
		}
		
		$sys_type=&$_POST['sys_type'];//菜品属性
		if($sys_type==""){
			$sys_type==0;
		} else {
			// $sys_types = implode(',',$sys_type);
			$where_arr.=" and a.sys_type = {$sys_type}";
		}

		/*if($sys_type==1){
			$where_arr.=" and a.sys_type={$sys_type}";
			$sys_type_1=&$_POST['sys_type_1'];//菜品属性1
			$sys_type_2=&$_POST['sys_type_2'];//菜品属性2
			if($sys_type_1!=0){
				$where_arr.=" and a.sys_type_1={$sys_type_1}";
			}
			if($sys_type_2!=0){
				$where_arr.=" and a.sys_type_2={$sys_type_2}";
			}
		}else if($sys_type!=0 && $sys_type!=1){
			$where_arr.=" and a.sys_type={$sys_type}";
		}*/
		
		$dish_state=&$_POST['state'];//菜品状态
		if($dish_state!="" && $dish_state!=-1){
			$where_arr.=" and a.dish_state={$dish_state}";
		}
		
		$asc_name="insert_time";
		$asc_type="desc";
		$page=isset($_POST['page']) || empty($_POST['page']) || $_POST['page'] == 0 ? 1 : $_POST['page'];
		$size = isset($_POST['size']) || empty($_POST['size']) || $_POST['size'] == 0 ? 10 :$_POST['size'];
		$data=$this->system_dish_model->dish_list($where_arr,$type_id,$asc_name,$asc_type,$page,$size);
		$this->load->view('base/dishes/list',$data);
	}
	public function dish_list_do(){
		$where_arr=$_POST['where_arr'];
		$sys_where="";
		//获取搜索条件
		$type_id=&$_POST['type_id'];//菜品分类
		$asc_name=&$_POST['asc_name'];
		$asc_type=&$_POST['asc_type'];
		$page=&$_POST['page'];
		$size = isset($_POST['size']) || empty($_POST['size']) || $_POST['size'] == 0 ? 10 :$_POST['size'];
		$data=$this->system_dish_model->dish_list($where_arr,$type_id,$asc_name,$asc_type,$page,$size);
		$this->load->view('base/dishes/list',$data);
	}
	//校验菜品名称
	public function check_name(){
		$dish_name=&$_POST['dish_name'];
		$dish_id=&$_POST['dish_id'];
		$data=$this->system_dish_model->check_name($dish_name,$dish_id);
		echo $data;
	}
	//菜品批量处理
	public function dish_batch(){
		$tab_name="shop_dish";
		$tab_id_name="dish_id";
		$tab_id=&$_POST['dish_id'];
		$state_name="dish_state";
		$batch_value=$_POST['batch_value'];
		if($tab_id!=""){
			$this->util_model->batch_do($tab_name,$tab_id_name,$tab_id,$state_name,$batch_value);
			//批量删除时删除类型关联表信息
			if($batch_value==-1){
				$this->util_model->batch_do_1("shop_dish_type_log",$tab_id_name,'0',$tab_id,$state_name,$batch_value);
				//删除推荐位
				$this->util_model->batch_do_2("shop_big_show","data_id",'1',$tab_id);
			}
			if($batch_value==0){
				//下架推荐位
				$this->util_model->batch_do_3("shop_big_show","data_id",'1',$tab_id);
			}
		}
		
		
		$this->dish_list();
	}
	//发布菜品
	public function dish_add_show(){
		$data=$this->system_dish_model->get_dish_type();
		$this->load->view('base/dishes/addOrEdit',$data);
	}
	public function dish_add(){
		$bl=$this->system_dish_model->dish_add();
		if((int)$bl==-1){
			echo "<script>alert('已存在同名的菜品，请核实!');history.go(-1);</script>";
		}else{
			if($bl){
				$this->dish_list();
			}else{
				echo "<script>alert('操作执行失败，请重试!');history.go(-1);</script>";
			}
		}
		
	}
	//新建分类信息
	public function dish_type_add(){
		$this->system_dish_model->dish_type_add();
		$data=$this->system_dish_model->get_dish_type();
		$data=$this->JSON($data['type_list']);
		echo $data;
	}
	//编辑菜品
	public function dish_update_show(){
		$dish_id=$_GET['dish_id'];
		$data=$this->system_dish_model->get_dish($dish_id);
		$images = array();
		array_push($images,$data['dish']['dish_img_1'],$data['dish']['dish_img_2'],$data['dish']['dish_img_3'],$data['dish']['dish_img_4'],$data['dish']['dish_img_5']);
		$data['dish']['images'] = $images;
		$this->load->view('base/dishes/addOrEdit',$data);
	}
	public function dish_update(){
	$bl=$this->system_dish_model->dish_upd();
		if((int)$bl==-1){
			echo "<script>alert('已存在同名的菜品，请核实!');history.go(-1);</script>";
		}else{
			if($bl){
				$this->dish_list();
			}else{
				echo "<script>alert('操作执行失败，请重试!');</script>";
				$dish_id=$_POST['dish_id'];
				$data=$this->system_dish_model->get_dish($dish_id);
				$this->load->view('base/dishes/addOrEdit',$data);
			}
		}
	}
	//删除菜品
	public function dish_delete(){
		$tab_name="shop_dish";
		$tab_id_name="dish_id";
		$tab_id=$_GET['dish_id'];
		$this->util_model->delete_do($tab_name,$tab_id_name,$tab_id);//删除菜品
		$this->util_model->delete_do_1("shop_dish_type_log",$tab_id_name,$tab_id,'0');//删除菜品关联的分类
		$this->util_model->delete_do_2("shop_big_show","data_id",$tab_id,'1');//删除菜品关联的推荐位
		$this->dish_list();
	}
    function add_img(){
		/*$extend = explode(".",$_FILES["file1"]["name"]);
		$key= count($extend)-1;
		$ext= $extend[$key];*/
		/*if ($ext=="jpg" || $ext=="png" || $ext="gif"){*/
		$data = array();
		$filePath="data/upload/";

		if (!file_exists($filePath)){//如果指定文件夹不存在，则创建文件夹
			mkdir($filePath, 0777, true);
		}

		/*if(move_uploaded_file($_FILES['file1']['tmp_name'],$name))
		{
			$is_success=1;
			$reason=$name;
		}*/
		$image_data = $_POST['data'];
		$index = 0;
		foreach ($image_data as $image) {
			$newfile = microtime().".jpg";
			$name=$filePath.$newfile;
			if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $image['src'], $result)){
				$type = $result[2];
				if (file_put_contents($name, base64_decode(str_replace($result[1], '', $image['src'])))){
					$data[$index]['sort'] = $image['sort'];
					$data[$index]['src'] = $name;
					$index++;
				}
			}
		}
		echo $data=$this->JSON($data);
		/*}else {
			echo 'error';
		}*/
	}
	function add_img_2(){
		$extend = explode(".",$_FILES["file2"]["name"]);
		$key= count($extend)-1;
		$ext= $extend[$key];
		if ($ext=="jpg" || $ext=="png" || $ext="gif"){
			$newfile = time().".".$ext;
			$filePath="data/upload/";
				
			if (!file_exists($filePath)){//如果指定文件夹不存在，则创建文件夹
				mkdir($filePath, 0777, true);
			}
			$name=$filePath.$newfile;
			if(move_uploaded_file($_FILES['file2']['tmp_name'],$name))
			{
				$is_success=1;
				$reason=$name;
			}
			@unlink($_FILES['file2']);
			echo $name;
		}else {
			echo 'error';
		}
	}
}
?>