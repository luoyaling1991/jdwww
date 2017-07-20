<?php  header("Content-type: text/html; charset=utf-8");
class Admin_print extends CI_Controller {
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('admin/admin_print_model');
	}
	//打印一条订单信息
	public function print_one(){
		$order_id=$_GET['order_id'];
		//查询该订单信息
		$data=$this->admin_print_model->print_one($order_id);
		$info=$this->admin_print_model->print_info();//配置信息
		$data['print_name']=$info['print_name'];
		$data['call_num']=$info['call_num'];
		$data['call_address']=$info['call_address'];
		if($info['print_type']==2){
			$data['print_type']=base_url("data/print_type_02.docx");
		}else{
			$data['print_type']=base_url("data/print_type_01.docx");
		}
		$data['other']=$info['other'];
		$this->load->view('admin/print',$data);
	}
	public function print_test(){
		$info=$this->admin_print_model->print_info();//配置信息
		$data['print_name']=$info['print_name'];
		$data['call_num']=$info['call_num'];
		$data['call_address']=$info['call_address'];
		if($info['print_type']==2){
			$data['print_type']=base_url("data/print_type_02.docx");
		}else{
			$data['print_type']=base_url("data/print_type_01.docx");
		}
		$data['other']=$info['other'];
		$this->load->view('print/print_test',$data);
	}
	
	public function print_one_do(){
		$order_id=$_POST['order_id'];
		//查询该订单信息
		$data=$this->admin_print_model->print_one($order_id);
		$info=$this->admin_print_model->print_info();//配置信息
		$data['print_name']=$info['print_name'];
		$data['call_num']=$info['call_num'];
		$data['call_address']=$info['call_address'];
		if($info['print_type']==2){
			$data['print_type']=base_url("data/print_type_02.docx");
		}else{
			$data['print_type']=base_url("data/print_type_01.docx");
		}
		$data['other']=$info['other'];
		$data=$this->JSON($data);
		echo $data;
	}
	public function print_two_do(){
		$tab_id=$_POST['tab_id'];;
		//查询该订单信息
		$data=$this->admin_print_model->print_two($tab_id);
		$info=$this->admin_print_model->print_info();//配置信息
		$data['print_name']=$info['print_name'];
		$data['call_num']=$info['call_num'];
		$data['call_address']=$info['call_address'];
		if($info['print_type']==2){
			$data['print_type']=base_url("data/print_type_02.docx");
		}else{
			$data['print_type']=base_url("data/print_type_01.docx");
		}
		$data['other']=$info['other'];
		$data=$this->JSON($data);
		echo $data;
	}
	public function print_two_do_1(){
		$order_id=$_GET['order_id'];;
		//查询该订单信息
		$data=$this->admin_print_model->print_two_1($order_id);
		$info=$this->admin_print_model->print_info();//配置信息
		$data['print_name']=$info['print_name'];
		$data['call_num']=$info['call_num'];
		$data['call_address']=$info['call_address'];
		if($info['print_type']==2){
			$data['print_type']=base_url("data/print_type_02.docx");
		}else{
			$data['print_type']=base_url("data/print_type_01.docx");
		}
		$data['other']=$info['other'];
		$this->load->view('admin/print_test_1',$data);
	}
	
	
	function arrayRecursive(&$array, $function, $apply_to_keys_also = false)
	{
		static $recursive_counter = 0;
		if (++$recursive_counter > 1000) {
			die('possible deep recursion attack');
		}
		foreach ($array as $key => $value) {
			if (is_array($value)) {
				$this->arrayRecursive($array[$key], $function, $apply_to_keys_also);
			} else {
				$array[$key] = $function($value);
			}
	
			if ($apply_to_keys_also && is_string($key)) {
				$new_key = $function($key);
				if ($new_key != $key) {
					$array[$new_key] = $array[$key];
					unset($array[$key]);
				}
			}
		}
		$recursive_counter--;
	}
	function JSON($array) {
		$this->arrayRecursive($array, 'urlencode', true);
		$json = json_encode($array);
		return urldecode($json);
	}
}
?>