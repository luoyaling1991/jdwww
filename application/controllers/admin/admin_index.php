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
	public function turnUrl() {
		$url=$_POST['url'];
		$_SESSION['content_url'] = $url;
		echo 0;
	}
	public function web_login(){
			$username=$_POST['username'];
			$password=$_POST['password'];
			$bl=$this->admin_shop_model->web_login($username,$password);
			if($bl==-1){
				//没有账户
				echo "<script>alert('账户或密码不正确，请核实!');history.go(-1);</script>";
			}else if($bl==-2){
				//账户暂停了
				echo "<script>alert('对不起您的账户已被标注暂停，请联系客服人员!');history.go(-1);</script>";
			}else if($bl==1){
				//账户和密码验证正确,且账户已启用
				redirect('admin/admin_index/check_login');
			}else if($bl==0){
				//密码不对
				echo "<script>alert('账户或密码不正确，请核实!');history.go(-1);</script>";
			}

		
	}
	public function show(){
		$data_list=$this->admin_bar_model->get_bar();
		$order_no_list=$this->JSON($data_list['order_no_list']);
		$type_list=$this->JSON($data_list['type_list']);
		echo $type_list;
		//echo $type_list;
	}
	public function check_login(){
		if(isset($_SESSION['admin_user'])){
			$data_one=$this->admin_shop_model->get_sum();
			if($data_one['one']['yz_03']==1 || $data_one['one']['yz_04']==1 ){
				// 获取用户基本信息
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
		}else{
			redirect('admin/admin_login/index');
		}
	}
    public function system(){
    	if(isset($_SESSION['admin_user'])){
    		$this->load->view('platform/index');
    	}else{
    		redirect('admin/admin_login/index');
    	}
    }
	public function main_top(){
		$this->load->view('platform/top');
	}
	public function main_left(){
		$this->load->view('platform/left');
	}
	public function main_right(){
		$data=$this->admin_shop_model->get_sum();
		$this->load->view('account/info',$data);
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