<?php 
/*App接口--用户相关操作接口类
 * @张雪松
*V_1.0.0
* */
class Cook extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('app/app_pad_model');
		$this->load->model('app/app_pad_model2');
		$this->load->model('util_model');
	}
	//登陆
	public function login(){
		$pad_user=&$_POST['pad_user'];//用户名
		$pad_pwd=&$_POST['pad_pwd'];//用户密码
		$phone_no=&$_POST['phone_no'];
		
		$data=$this->app_pad_model->pad_login($pad_user,$pad_pwd,$phone_no);
		$data=$this->JSON($data);
		echo $data;
	}
    //根据token查询信息
    public function get_list(){
    	//先验证token是否正确
    	$token=&$_POST['token'];
    	
    	$data=$this->app_pad_model->is_ok($token);
    	$data=$this->JSON($data);
    	echo $data;
    }
    //提交单条订单信息
    public function sub_order(){
    	//先验证token是否正确
    	$token=&$_POST['token'];
    	$order=&$_POST['order'];
    	 
    	$data=$this->app_pad_model->sub_order($token,$order);
    	$data=$this->JSON($data);
    	echo $data;
    }
    //批量提交订单信息
    public function sub_orders(){
    	//先验证token是否正确
    	$token=&$_POST['token'];
    	$orders=&$_POST['orders'];
    
    	$data=$this->app_pad_model2->sub_orders($token,$orders);
    	$data=$this->JSON($data);
    	echo $data;
    }
    public function get_json(){
    	$data=$this->app_pad_model2->get_json();
    	$data=$this->JSON($data);
    	echo $data;
    }
    //餐桌换桌信息
    public function table_upd(){
    	//先验证token是否正确
    	$token=&$_POST['token'];
    	$order_id=&$_POST['order_id'];
    	$tab_id_old=&$_POST['tab_id_old'];
    	$tab_id_new=&$_POST['tab_id_new'];
    
    	$data=$this->app_pad_model->table_upd($token,$order_id,$tab_id_old,$tab_id_new);
    	$data=$this->JSON($data);
    	echo $data;
    }
    //餐桌换桌信息
    public function table_upd_1(){
    	//先验证token是否正确
    	$token=&$_POST['token'];
    	$tab_id_old=&$_POST['tab_id_old'];
    	$tab_id_new=&$_POST['tab_id_new'];
    
    	$data=$this->app_pad_model->table_upd_1($token,$tab_id_old,$tab_id_new);
    	$data=$this->JSON($data);
    	echo $data;
    }
    //变更就餐人数
    public function person_upd(){
    	//先验证token是否正确
    	$token=&$_POST['token'];
    	$order_id=&$_POST['order_id'];
    	$order_person=&$_POST['order_person'];
    
    	$data=$this->app_pad_model->person_upd($token,$order_id,$order_person);
    	$data=$this->JSON($data);
    	echo $data;
    }
   
	
	/**************************************************************
	 *
	*	将数组转换为JSON字符串（兼容中文）
	*	@param	array	$array		要转换的数组
	*	@return string		转换得到的json字符串
	*	@access public
	*
	*************************************************************/
	function JSON($array) {
		$this->arrayRecursive($array, 'urlencode', true);
		$json = json_encode($array);
		$json = urldecode($json);
		$json = str_replace("\n", '\n', $json);
		$json = str_replace("\r", '\n', $json);
		$json = str_replace(array("\r\n","\\\\"), array('\n',''), $json);
		return $json;
	}
	/**************************************************************
	 *
	*	使用特定function对数组中所有元素做处理
	*	@param	string	&$array		要处理的字符串
	*	@param	string	$function	要执行的函数
	*	@return boolean	$apply_to_keys_also		是否也应用到key上
	*	@access public
	*
	*************************************************************/
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
}
?>