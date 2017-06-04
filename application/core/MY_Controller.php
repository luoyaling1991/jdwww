<?php
class MY_Controller extends CI_Controller  {
	function __construct()
	{
		parent::__construct();
		session_start();
		$this->is_login();
	}

	//验证是否登录
	public function is_login(){
		$uri=$_SERVER['REQUEST_URI'];
		if(strpos($uri,"/admin/")==-1)
		{
			
		}else{
			if(isset($_SESSION['admin_user'])){
				
			}else{
				redirect('admin/admin_login');
			}
		}
		
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
		if(is_array($array) && !empty($array)) {

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
		}
		$recursive_counter--;
	}
	function JSON($array) {
		$this->arrayRecursive($array, 'urlencode', true);
		$json = json_encode($array);
		return urldecode($json);
	}
	function sort_by_time($row1,$row2){
		$t1 = strtotime($row1['insert_time']);
		$t2 = strtotime($row2['insert_time']);
		return $t1 - $t2;
	}
	
	
}
