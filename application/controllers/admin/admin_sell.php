<?php  header("Content-type: text/html; charset=utf-8");

class Admin_sell extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/system_sell_model');
		$this->load->model('admin/excel_model');
		$this->load->model('util_model');
		$this->load->model('admin/admin_print_model');
		if(!isset($_SESSION)){
			session_start();
		}
	}
	//打开打印机设置页面
	public function set_show(){
		$data=$this->admin_print_model->get_info();
		$this->load->view('base/paramSet/param',$data);
	}
	//修改配置
	public function set_do(){
	$bl=$this->admin_print_model->upd_info();
		if($bl){
			$this->set_show();
		}else{
			echo "<script>alert('操作执行失败，请重试!');history.go(-1);</script>";
		}
	}
	//营业概况
	public function index_1(){
		$asc_name = isset($_POST['asc_name']) ? $_POST['asc_name'] : 'dish_count';
		$asc_type = isset($_POST['asc_type']) ? $_POST['asc_type'] : 'desc';
		$data=$this->system_sell_model->get_list_1($asc_name, $asc_type);
		if($asc_name == 'dish_count') {
			if ($asc_type == 'desc') {
				usort($data['list'],array($this,'sort_by_count_desc'));
			}else if ($asc_type == 'asc') {
				usort($data['list'],array($this,'sort_by_count_asc'));
			}
		}else if($asc_name == 'sum') {
			if ($asc_type == 'desc') {
				usort($data['list'],array($this,'sort_by_sum_desc'));
			}else if ($asc_type == 'asc') {
				usort($data['list'],array($this,'sort_by_sum_asc'));
			}
		}

		$data['list']=$this->JSON($data['list']);
		$this->load->view('auth\business\status\overview',$data);
	}
	public function sort(){
		$asc_name = isset($_POST['asc_name']) ? $_POST['asc_name'] : 'dish_count';
		$asc_type = isset($_POST['asc_type']) ? $_POST['asc_type'] : 'desc';
		$data=$this->system_sell_model->get_list_1($asc_name, $asc_type);
		if($asc_name == 'dish_count') {
			if ($asc_type == 'desc') {
				usort($data['list'],array($this,'sort_by_count_desc'));
			}else if ($asc_type == 'asc') {
				usort($data['list'],array($this,'sort_by_count_asc'));
			}
		}else if($asc_name == 'sum') {
			if ($asc_type == 'desc') {
				usort($data['list'],array($this,'sort_by_sum_desc'));
			}else if ($asc_type == 'asc') {
				usort($data['list'],array($this,'sort_by_sum_asc'));
			}
		}

		$data['list']=$this->JSON($data['list']);
		echo $data['list'];
	}
	//删除订单信息
	public function del_order(){
		$order_id=$_GET['order_id'];
		$this->system_sell_model->del_order($order_id);
		$this->index_3();
	}
	//导出所有
	public function out_3(){
		$this->excel_model->out_all();
	}
	//删除所有
	public function del_all(){
		$data=$this->system_sell_model->del_all();
		$this->index_3();
	}
	//销量批量处理
	public function batch_3(){
		$order_id=&$_POST['order_id'];
		$batch_value=$_POST['batch_value'];
		if($batch_value==-1){
			//批量删除
			if(count($order_id)>0){
				foreach ($order_id as $row){
					$this->system_sell_model->del_order($row);
				}
			}
		}else{
			//批量导出
			$order_ids="0,";
			if(count($order_id)>0){
				foreach ($order_id as $row){
					$order_ids.=$row.",";
				}
			}
			$order_ids=substr($order_ids,0,strlen($order_ids)-1);
			$this->excel_model->out_some($order_ids);
		}
		$this->index_3();
	}
	//销售查询
	public function index_3(){
		//获取搜索条件
		$date_1=&$_POST['date_1'];//时间阶段1
		$date_2=&$_POST['date_2'];//时间阶段2
		if($date_1==""){
			$date_1=date("Y-m-d",time());
		}
		if($date_2==""){
			$date_2=date("Y-m-d",time());
		}
		$page_no = isset($_POST['page_no']) ? $_POST['page_no'] : 1;
		$page_size = 10;
		$asc_name="insert_time";
		$asc_type="desc";
		$data=$this->system_sell_model->get_list_3($date_1,$date_2,$asc_name,$asc_type,$page_no,$page_size);
		$data['list']=$this->JSON($data['list']);
		$this->load->view('auth\business\businessDetail\list',$data);
	}
	public function index_3_get(){
		//获取搜索条件
		$date_1=&$_GET['date_1'];//时间阶段1
		$date_2=&$_GET['date_2'];//时间阶段2
		$page_no = isset($_GET['page_no']) ? $_GET['page_no'] : 1;
		$page_size = 10;
		if($date_1==""){
			$date_1=date("Y-m-d",time())." 00:00:00";
		}
		if($date_2==""){
			$date_2=date("Y-m-d H:i:s",time());
		}
		$asc_name= isset($_GET['asc_name']) ? $_GET['asc_name'] : 'insert_time';
		$asc_type= isset($_GET['asc_type']) ? $_GET['asc_type'] : 'desc';
		$data=$this->system_sell_model->get_list_3($date_1,$date_2,$asc_name,$asc_type,$page_no,$page_size);
		$data['list']=$this->JSON($data['list']);
		$this->load->view('auth\business\businessDetail\list',$data);
	}
	//热销查询
	public function index_2(){
		$asc_name = isset($_POST['asc_name']) ? $_POST['asc_name'] : 'dish_count';
		$asc_type = isset($_POST['asc_type']) ? $_POST['asc_type'] : 'desc';
		$where_arr="";
		$where_arr_1="";
		$flag = false;
		//获取搜索条件
		$sys_type=&$_POST['sys_type'];//菜品属性
		/*$sys_type_1=&$_POST['sys_type_1'];//菜品属性1
		$sys_type_2=&$_POST['sys_type_2'];//菜品属性2*/
		if (count($sys_type) > 0) {
			if (in_array(0,$sys_type) || in_array(-1,$sys_type)){
				$flag = true;
			}
			$key = array_search(0, $sys_type);
			if ($key !== false)
				array_splice($sys_type, $key, 1);
			// var_dump($sys_type);
			$sys_types = implode(',',$sys_type);
			if (count($sys_type) > 0) {
				$where_arr.=" and a.sys_type in ({$sys_types})";
			}
		}
		/*if($sys_type==-1){
			$where_arr.=" and a.sys_type={$sys_type}";
			if($sys_type_1!=0){
				$where_arr.=" and a.sys_type_1={$sys_type_1}";
			}
			if($sys_type_2!=0){
				$where_arr.=" and a.sys_type_2={$sys_type_2}";
			}
		}else if($sys_type!=0 && $sys_type!=1 && $sys_type!=-1){
			$where_arr.=" and a.sys_type in ({$sys_type})";
		}*/
		$dish_state=isset($_POST['state']) ? $_POST['state'] : "" ;//菜品状态
		if($dish_state!="" && $dish_state!=-1){
			$where_arr.=" and a.dish_state={$dish_state}";
			$where_arr_1=" and a.set_state={$dish_state}";
		}else{
			$dish_state=-1;
		}
		
		$date_1=&$_POST['date_1'];
		$date_2=&$_POST['date_2'];
		if($date_1==""){
			$date_1=date("Y-m-d",time());
		}
		if($date_2==""){
			$date_2=date("Y-m-d",time());
		}
		

		$data=$this->system_sell_model->get_list_2($where_arr,$where_arr_1,/*$sys_type_1,$sys_type_2,*/$dish_state,$date_1,$date_2,$sys_type,$asc_name,$asc_type,$flag);
		if($asc_name == 'dish_count') {
			if ($asc_type == 'desc') {
				usort($data['list'],array($this,'sort_by_count_desc'));
			}else if ($asc_type == 'asc') {
				usort($data['list'],array($this,'sort_by_count_asc'));
			}
		}else if($asc_name == 'sum') {
			if ($asc_type == 'desc') {
				usort($data['list'],array($this,'sort_by_sum_desc'));
			}else if ($asc_type == 'asc') {
				usort($data['list'],array($this,'sort_by_sum_asc'));
			}
		}
		$data['list']=$this->JSON($data['list']);
		$this->load->view('auth\business\hot\list',$data);
	}
	//修改状态
	function upd_state(){
		$d_id=$_POST['d_id'];
		$d_type=$_POST['d_type'];
		$state=$_POST['state'];
		if($state==1){
			$state=0;
		}else{
			$state=1;
		}
		if($d_type==1){
			//套餐编辑
			$tab_name="shop_set";
			$tab_id_name="set_id";
			$tab_id=$d_id;
			$state_name="set_state";
			$state_value=$state;
			$this->util_model->state_do($tab_name,$tab_id_name,$tab_id,$state_name,$state_value);
		}else{
			$tab_name="shop_dish";
			$tab_id_name="dish_id";
			$tab_id=$d_id;
			$state_name="dish_state";
			$state_value=$state;
			$this->util_model->state_do($tab_name,$tab_id_name,$tab_id,$state_name,$state_value);
		}
		$where_arr=$_POST['where_arr'];
		$where_arr_1=$_POST['where_arr_1'];
		$sys_type_1=$_POST['sys_type_1'];
		$sys_type_2=$_POST['sys_type_2'];
		$dish_state=$_POST['dish_state'];
		$date_1=$_POST['date_1'];
		$date_2=$_POST['date_2'];
		$sys_type=$_POST['sys_type'];
		$data=$this->system_sell_model->get_list_2($where_arr,$where_arr_1,$sys_type_1,$sys_type_2,$dish_state,$date_1,$date_2,$sys_type);
		$list=$this->JSON($data['list']);
		echo $list;
	}
	function batch_do_2(){
		$tab_id=&$_POST['dish_id'];
		$batch_value=$_POST['batch_value'];
		if($tab_id!=""){
			$this->util_model->batch_do_sell($tab_id,$batch_value);
		}
		$this->index_2();
	}
	function sort_by_sum_desc($row1,$row2){
		$t1 = $row1['sum'];
		$t2 = $row2['sum'];
		return $t2 - $t1;
	}
	function sort_by_sum_asc($row1,$row2){
		$t1 = $row1['sum'];
		$t2 = $row2['sum'];
		return $t1 - $t2;
	}
	function sort_by_count_desc($row1,$row2){
		$t1 = $row1['dish_count'];
		$t2 = $row2['dish_count'];
		return $t2 - $t1;

	}
	function sort_by_count_asc($row1,$row2){
		$t1 = $row1['dish_count'];
		$t2 = $row2['dish_count'];
		return $t1 - $t2;
	}
}
?>