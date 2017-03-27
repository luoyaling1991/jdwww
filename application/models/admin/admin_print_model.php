<?php
class Admin_print_model extends MY_Model {
	function __construct(){
		parent::__construct();$this->load->database();
		$this->load->database();
		if(!isset($_SESSION)){  
		   session_start();  
		}  
		
	}
	//查询打印设置信息
	function get_info(){
		$res = $this->db->select('name5,cutlery,shop_name,print_type,print_name,call_num,call_address,other')->where('shop_id',$_SESSION['admin_user']['shop_id'])->get('sys_shop');
		$info = $res->row_array();
		return $info;
	}
	//修改信息
	function upd_info(){
			$this->cutlery=$this->input->post('cutlery');
			$this->name5=$this->input->post('name5');
			$this->print_type=$this->input->post('print_type');
			$this->print_name=$this->input->post('print_name');
			$this->call_num=$this->input->post('call_num');
			$this->call_address=$this->input->post('call_address');
			$this->other=$this->input->post('other');
			
		return $this->db->where('shop_id',$_SESSION['admin_user']['shop_id'])->update('sys_shop',$this);
	}
	//查询一条订单信息
	function print_one($order_id){
		//查询基本信息
		$res = $this->db->select('order_no,waiter_id,order_type,insert_time')->where('order_id',$order_id)->get('shop_order');
		$order_one=$res->row_array();
		//查询所有菜品信息
		$res = $this->db->select('log_name,log_price,log_count,log_money')->where('order_id',$order_id)->get('shop_order_log');
		$order_list=$res->result_array();
		//查询餐桌名称
		$str="select b.tab_name,c.type_name from shop_order a,shop_table b,shop_table_type c where a.order_id={$order_id} and a.table_id=b.tab_id and b.type_id=c.type_id";
		$table=$this->select_one($str);
		return array('order'=>$order_one,'tab_name'=>$table->type_name.$table->tab_name,'order_list'=>$order_list);
	}
	//查询餐桌信息
	function print_two($tab_id){
		$res = $this->db->select('order_id,order_no,waiter_id,order_type,insert_time')->where(array('table_id'=>$tab_id,'order_type'=>0,'order_state'=>1))->get('shop_order');
		$order_one=$res->row_array();
		

		//查询子订单
		$res=$this->db->select('order_id')->where('father_id',$order_one['order_id'])->get('shop_order');
		$log_list=$res->result_array();
		$order_ids="";
		$order_ids.=$order_one['order_id'].",";
		if(count($log_list)>0){
			foreach ($log_list as $row){
				$order_ids.=$row['order_id'].",";
			}
		}
		$order_ids=substr($order_ids,0,strlen($order_ids)-1);
		//查询所有菜品信息
		$str="select log_name,log_price,log_count,log_money from shop_order_log where order_id in ($order_ids)";
		$order_list=$this->select_all($str);
		
		$str="select b.tab_name,c.type_name from shop_order a,shop_table b,shop_table_type c where a.order_id={$order_one['order_id']} and a.table_id=b.tab_id and b.type_id=c.type_id";
		$table=$this->select_one($str);
		return array('order'=>$order_one,'tab_name'=>$table->type_name.$table->tab_name,'order_list'=>$order_list);

	}
	//查询订单
	function print_two_1($order_id){
		$res = $this->db->select('order_id,order_no,waiter_id,order_type,insert_time,order_price')->where(array('order_id'=>$order_id))->get('shop_order');
		$order_one=$res->row_array();
	
	
		//查询子订单
		$res=$this->db->select('order_id')->where('father_id',$order_id)->get('shop_order');
		$log_list=$res->result_array();
		$order_ids="";
		$order_ids.=$order_one['order_id'].",";
		if(count($log_list)>0){
			foreach ($log_list as $row){
				$order_ids.=$row['order_id'].",";
			}
		}
		$order_ids=substr($order_ids,0,strlen($order_ids)-1);
		//查询所有菜品信息
		$str="select log_name,log_price,log_count,log_money from shop_order_log where order_id in ($order_ids)";
		$order_list=$this->select_all($str);
	
		$str="select b.tab_name,c.type_name from shop_order a,shop_table b,shop_table_type c where a.order_id={$order_one['order_id']} and a.table_id=b.tab_id and b.type_id=c.type_id";
		$table=$this->select_one($str);
		return array('order'=>$order_one,'tab_name'=>$table->type_name.$table->tab_name,'order_list'=>$order_list);
	
	}
	//查询配置信息
	function print_info(){
		$res = $this->db->select('print_type,print_name,call_num,call_address,other')->where('shop_id',$_SESSION['admin_user']['shop_id'])->get('sys_shop');
		$info = $res->row_array();
		return $info;
	}
	
}

