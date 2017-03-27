<?php
class MY_Model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	//密码加密方式
	function md5_pwd($pwd){
		$md5=md5($pwd);
		$md5=substr($md5,0,strlen($md5)-1);
		$md5=md5($md5);
		return $md5;
	}
	function jsonArray($str) {
		$strdd = preg_replace('/\\\\/i', '', $str);;
		$sttrn = str_replace(array('n',' '),'',$strdd);
		$array = json_decode($sttrn);
		return $array;
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
	function mybase_url(&$arr){
		foreach ((array)$arr as $key => $item){
			if(!is_array($item)){
				$arr[$key] = urlencode($item);
			}else{
				$item = str_replace("\"","",$item);
				$item = str_replace("[","",$item);
				$item = str_replace("]","",$item);
				$item = str_replace("{","",$item);
				$item = str_replace("}","",$item);
				$item = str_replace("}","",$item);
				$arr[$key] = $this->mybase_url($item);
			}
		}
		return $arr;
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
	//删除
	function delete($sql){
		mysql_query($sql);
		if(mysql_affected_rows())
			return true;
		else
			return false;
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
	
}
