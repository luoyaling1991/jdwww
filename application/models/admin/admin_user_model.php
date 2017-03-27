<?php
class admin_user_model extends MY_Model{
	function __construct(){
		parent::__construct();
		if (!isset($_SESSION)) {
			session_start();
		}
		$this->load->model('util_model');
	}
	//编辑密码
	public function upd_pwd($upd_pwd){
		$data=array("shop_pwd"=>$this->md5_pwd($upd_pwd));
		$condition="shop_id = ".$_SESSION['admin_user']['shop_id'];
		$this->db->update('sys_shop',$data,$condition);
		return $this->db->last_query();
	}
	//编辑密码
	public function upd_pwd_1($upd_pwd){
		$data=array("yz_pwd"=>$this->md5_pwd($upd_pwd));
		$_SESSION['admin_user']['yz_pwd']=$this->md5_pwd($upd_pwd);
		$condition="shop_id = ".$_SESSION['admin_user']['shop_id'];
		$this->db->update('sys_shop',$data,$condition);
		return $this->db->last_query();
	}
	
	//获取信息
	public function user_info(){
		$re=$this->db->get_where('sys_shop',array('shop_id'=>$_SESSION['admin_user']['shop_id']))->result_array();
		return $re['0'];
	}
	//更新绑定手机号码
	public function upd_phone($data,$condition){
		$this->db->update('sys_shop',$data,$condition);
		return $this->db->last_query();
	}
	//更新logo标志
	public function update_logo($data,$condition){
		$this->db->update('sys_shop',$data,$condition);
		return $this->db->last_query();
	}
	//省市县三级数据
	public function get_addr($province,$city,$area){
		$re=$this->db->get_where('sys_province',array('code'=>$province))->result_array();
		$p=$re['0']['name'];
		$re=$this->db->get_where('sys_city',array('code'=>$city))->result_array();
		$c=$re['0']['name'];
		$re=$this->db->get_where('sys_area',array('code'=>$area))->result_array();
		$a=$re['0']['name'];
		unset($re);
		return array('p'=>$p,'c'=>$c,'a'=>$a);
	}
	//更新店铺信息
	public function update_userinfo($data,$condition){
		return $this->db->update('sys_shop', $data,$condition);
	}
	//获取店铺信息
	public function get_user_info($reg_num){
		$re=$this->db->get_where('sys_shop',array('reg_num'=>$reg_num))->result_array();
		return $re['0'];
	}
	//插入数据
	public function insert($table_name,$data){
		return $this->db->insert($table_name,$data);
	} 
	//获取省
	public function get_p(){
		return $this->db->get('sys_province')->result_array();		
	}
	public function get_c(){
		return $this->db->get_where('sys_city',array('provincecode'=>$_SESSION['admin_user']['shop_qx_1']))->result_array();
	}
	public function get_a(){
		return $this->db->get_where('sys_area',array('citycode'=>$_SESSION['admin_user']['shop_qx_2']))->result_array();
	}
	public function  get_c_a(){
		$c=$this->db->get('sys_city')->result_array();
		$a=$this->db->get('sys_area')->result_array();
		$jc=$this->util_model->JSON($c);$ja=$this->util_model->JSON($a);
		return array('city_list'=>$jc,'area_list'=>$ja);
	}
	//检测是否存在未使用的验证码
	public function isalreadycheck($data){
		$re=$this->db->get_where('shop_check_log',array('log_dx'=>$data,'log_state'=>0))->result_array();
		return $re;
	}
	//更新验证码
	public function update_num($data,$log_id){
		return $this->db->update('shop_check_log', $data, array('log_id' => $log_id));
	}
	//更新token
	public function update_token($pad_pwd,$shop_id){
		$token=$this->md5_pwd($pad_pwd);
		$this->token=$token."__".$shop_id;
		//编辑该数据入库
		$this->db->where('shop_id',$shop_id)->update('sys_shop',$this);
	}
	//用于ajax异步检测验证码
	public function check_num($data,$log_txt){
		$re=$this->db->get_where('shop_check_log',array('log_dx'=>$data,'log_txt'=>$log_txt,'log_state'=>0))->result_array();
		if (!empty($re)) {
			$time1=strtotime($re['0']['insert_time']);
			$time2=time();
			if($time2-$time1>300){return 0;}
			else{return 1;}
		}
		else {
			return 0;
		}
	}
	//检测验证码有效性
	public function check_num_again($data,$log_txt){
		$re=$this->db->get_where('shop_check_log',array('log_dx'=>$data,'log_txt'=>$log_txt,'log_state'=>0))->result_array();
		$time1=strtotime($re['0']['insert_time']);
		$time2=time();
		if($time2-$time1>300){
			return false;
		}else{
			return true;
		}
	}
	//更新
	public function update($table_name,$data,$where){
		return $this->db->update($table_name, $data, $where);
	}
	//查询
	public function select($table_name,$where,$cont="*"){
		$this->db->select($cont);
		$re=$this->db->get_where($table_name,$where)->result_array();
		return $re;
	}
	
}