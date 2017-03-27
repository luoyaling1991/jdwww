<?php
class Util_model extends MY_Model {
	function __construct(){
		parent::__construct();$this->load->database();
		if(!isset($_SESSION)){  
		   session_start();  
		}  
	}
	/**排序
	 *$tab_name 要操作的表明  $tab_asc 要操作的排序字段   $asc_type 0置顶  1是上一  2是下一  3是置底   
	 *$where_arr查询条件数组  $upd_arr更改条件数组  $sort_value_1下一个值  $sort_value_2 上一个值
	 * */
	function sort_do($tab_name,$tab_asc,$asc_type,$where_arr,$upd_arr,$sort_value_1,$sort_value_2){
		if($asc_type==0){
			$max= $this->db->select("max({$tab_asc}) as max")->where($where_arr)->get($tab_name);
			$max_asc = $max->row_array();
			$max_asc=$max_asc['max']+1;
			$data = array("{$tab_asc}" => $max_asc);
		}else if($asc_type==1){
			$data = array("{$tab_asc}" => $sort_value_1+1);
		}else if($asc_type==2){
			$data = array("{$tab_asc}" => $sort_value_2-1);
		}else if($asc_type==3){
			$min= $this->db->select("min({$tab_asc}) as min")->where($where_arr)->get($tab_name);
			$min_asc = $min->row_array();
			$min_asc=$min_asc['min']-1;
			$data = array("{$tab_asc}" => $min_asc);
		}

		$this->db->where($upd_arr)->update($tab_name,$data);

	}
	/*批量启用/停用/删除
	 * $tab_name要操作的表名   $tab_id_name要操作的id列名  $tab_id要操作存储的id数组  $state_name要操作的状态列名 $batch_value要操作的状态值
	 * -1为批量删除
	 * 1为批量启用
	 * 0为批量暂停
	 * */
	function batch_do($tab_name,$tab_id_name,$tab_id,$state_name,$batch_value){
		if($batch_value>=0){
			$data = array(
					"{$state_name}" => $batch_value
			);
			foreach ($tab_id as $row){
			    $this->db->where($tab_id_name,$row)->update($tab_name,$data);
			}
		}else{
			foreach ($tab_id as $row){
				$this->db->where($tab_id_name,$row)->delete($tab_name);
			}
		}
	}
	//批量操作热销查询
	function batch_do_sell($tab_id,$batch_value){
		foreach ($tab_id as $row){
			$arr=explode('_',$row);
			$type=$arr[0];
			$id=$arr[1];
			if($type==1){
				$data=array('set_state'=>$batch_value);
				$this->db->where("set_id",$id)->update("shop_set",$data);
			}else{
				$data=array('dish_state'=>$batch_value);
				$this->db->where("dish_id",$id)->update("shop_dish",$data);
			}
		}
	}
	//修改单个的状态
	function state_do($tab_name,$tab_id_name,$tab_id,$state_name,$state_value){
			$data = array(
					"{$state_name}" => $state_value
			);
			$this->db->where($tab_id_name,$tab_id)->update($tab_name,$data);
	}
	//删除菜品、套餐关联信息表 $type_value为类型值，0为菜品，1为套餐
	function batch_do_1($tab_name,$tab_id_name,$type_value,$tab_id,$state_name,$batch_value){
		if($batch_value>=0){
			$data = array(
					"{$state_name}" => $batch_value
			);
			foreach ($tab_id as $row){
				$this->db->where(array($tab_id_name=>$row,'log_type'=>$type_value))->update($tab_name,$data);
			}
		}else{
			foreach ($tab_id as $row){
				$this->db->where(array($tab_id_name=>$row,'log_type'=>$type_value))->delete($tab_name);
			}
		}
	}
	/*删除
	 * 
	 * */
	function delete_do($tab_name,$tab_id_name,$tab_id){
		$this->db->where($tab_id_name,$tab_id)->delete($tab_name);
	}
	//删除菜品、套餐关联分类信息表
	function delete_do_1($tab_name,$tab_id_name,$tab_id,$type_value){
		$this->db->where(array($tab_id_name=>$tab_id,'log_type'=>$type_value))->delete($tab_name);
	}
	
	
	//密码加密方式
	function md5_pwd($pwd){
		$md5=md5($pwd);
		$md5=substr($md5,0,strlen($md5)-1);
		$md5=md5($md5);
		return $md5;
	}
	
	//更新
	function update($str){
		mysql_query($str);
		if(mysql_affected_rows()){
			return true;
		}
		else{
			return false;
		}
	}
	//插入
	function insert($str){
		mysql_query($str);
		if(mysql_affected_rows())
			return true;
		else
			return false;
	}
	//删除
	function delete($sql){
		mysql_query($sql);
		if(mysql_affected_rows())
			return true;
		else
			return false;
	}
	//判断是否有数据
	function select_bl($str){
		$query=$this->db->query($str);
		$res=$query->result();
		if(count($res)>0){
			return true;
		}
		else{
			return false;
		}
	}
	//查询
	function select_all($str){
		$query=$this->db->query($str);
		return $query->result_array();
	}
	//查询单条(查询单个数据，返回对象)
	function select_one($str){
		$query=$this->db->query($str);
		return $query->row();
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
	//获取时间戳，精确到毫秒
	function microtime_float()
	{
		list($usec, $sec) = explode(" ", microtime());
		return  date("Y_m_d_H_i_s__",time()).((float)$usec + (float)$sec);
	}
	//格式化时间戳
	function microtime_format($tag, $time)
	{
		list($usec, $sec) = explode(".", $time);
		$date = date($tag,$usec);
		return str_replace('x', $sec, $date);
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
		return urldecode($json);
	}
}

