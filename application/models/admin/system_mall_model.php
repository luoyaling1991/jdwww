<?php
class System_mall_model extends MY_Model {
	function __construct(){
		parent::__construct();$this->load->database();
		if(!isset($_SESSION)){  
		   session_start();  
		}  
	}
	function vip_list(){
		$res = $this->db->select('*')->where(array('v_state'=>1))->order_by('v_time','desc')->get('sys_vip');
		$list = $res->result_array();
		return array("list"=>$list);
	}
	//购买商品
	function buy(){
		//首先根据v_id查看其基本信息
		$v_id=$this->input->post('vip_type');
		$res = $this->db->select('*')->where(array('v_id'=>$v_id))->get('sys_vip');
		$one= $res->row_array();
		$price=$one['v_money'];
		$count=$this->input->post('count');
		$money=$count*$price;
		$this->shop_id 		   = $_SESSION['admin_user']['shop_id'];
		$this->log_no		   ="test_".date("Ymd_His",time());
		$this->v_id       	   = $v_id;
		$this->count      	   = $count;
		$this->price  		   = $price;
		$this->money	       = $money;
		$this->state      	   =0;
		$this->log_txt         ="";
		$this->b_time	       ="";
		$this->i_time       =date("Y-m-d H:i:s",time());
		$this->db->insert('sys_vip_log', $this);
		//查询其基本信息
		$res=$this->db->select('*')->where(array('i_time'=>$this->i_time))->get('sys_vip_log');
		$log= $res->row_array();
		
		return $log;
	}
	function log_do($out_trade_no,$trade_no){
		//先查询该订单的状态
		$res=$this->db->select('*')->where(array('log_no'=>$out_trade_no))->get('sys_vip_log');
		$log= $res->row_array();
		$state=$log['state'];
		$vip_count=$log['count'];
		$log_id=$log['log_id'];
		if($state==0){
			//订单状态没执行
			//执行订单状态
			$this->state      	   =1;
			$this->log_txt         ="支付宝交易号:$trade_no";
			$this->b_time	       =date("Y-m-d H:i:s",time());
			$bl = $this->db->where('log_id',$log_id)->update('sys_vip_log',$this);

			//执行会员充值
			$v_id=$log['v_id'];
			$res=$this->db->select('*')->where(array('v_id'=>$v_id))->get('sys_vip');
			$vip= $res->row_array();
			$v_month=$vip['v_month'];
			$v_add_month=$vip['v_add_month'];
			//查询用户的基本情况
			$shop_id=$log['shop_id'];
			$res=$this->db->select('shop_date')->where(array('shop_id'=>$shop_id))->get('sys_shop');
			$shop=$res->row_array();
			
			$count=($v_month+$v_add_month)*$vip_count;
			$new_shop_date=date("Y-m-d",strtotime("+$count month",strtotime($shop["shop_date"])));
			$shop_data=array("shop_date"=>$new_shop_date);
			$bl = $this->db->where('shop_id',$shop_id)->update('sys_shop',$shop_data);
			
			$this->state      	   =3;
			$this->month      	   =$count;
			$bl = $this->db->where('log_id',$log_id)->update('sys_vip_log',$this);
			return 1;
		}else{
			//订单状态已执行
			return 1;
		}
	}
}

