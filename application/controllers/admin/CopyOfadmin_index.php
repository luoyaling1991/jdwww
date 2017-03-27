<?php  header("Content-type: text/html; charset=utf-8");
class Admin_index extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/admin_shop_model');
		$this->load->model('admin/admin_bar_model');
	}

	public function login(){
        echo $this->admin_shop_model->login_admin();
	}
	public function check_login(){
		if(isset($_SESSION['admin_user'])){
			//获取基本信息
			$data_list=$this->admin_bar_model->get_bar();
			$type_list=$this->JSON($data_list['type_list']);
			$order_no_list=$this->JSON($data_list['order_no_list']);
			$data['type_list']=$type_list;
			$data['order_no_list']=$order_no_list;
			$this->load->view('admin/bar/index',$data);
		}else{
			redirect('admin/admin_login');
		}
	}
    public function system(){
    	if(isset($_SESSION['admin_user'])){
    		$this->load->view('admin/index_main');
    	}else{
    		redirect('admin/admin_login');
    	}
    }
	public function main_top(){
		$this->load->view('admin/main_top');
	}
	public function main_left(){
		$this->load->view('admin/main_left');
	}
	public function main_right(){
		$this->load->view('admin/main_right');
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