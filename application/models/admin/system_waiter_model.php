<?php
class System_waiter_model extends MY_Model {
	function __construct(){
		parent::__construct();$this->load->database();
		if(!isset($_SESSION)){  
		   session_start();  
		}  
	}
	/*查询工号
	 * */
	function waiter_list($page_no, $page_size){
		$start_size = ($page_no - 1) * $page_size;
		//先查询员工数量
		$count_str = "select count(1) as count from shop_waiter where shop_id={$_SESSION['admin_user']['shop_id']} order by insert_time asc";
		$count_rows=$this->select_one($count_str);
		$count=$count_rows->count;
		$totalPage = ceil($count/$page_size);//总页码值
		if($totalPage <= 0){
			$totalPage = 1;
		}
		$str="select * from shop_waiter where shop_id={$_SESSION['admin_user']['shop_id']} order by insert_time asc limit {$start_size},{$page_size}";
		$waiter_list=$this->select_all($str);
		$waiter_list_1 = array();
		foreach ($waiter_list as $row){
			$waiter_jurisdiction = $row['waiter_jurisdiction'];
			$waiter_jurisdiction_str = "";
			if (!is_null($waiter_jurisdiction)){
				$waiter_jurisdiction_arr = explode(",", $waiter_jurisdiction);
				if (in_array("1",$waiter_jurisdiction_arr)) {
					$waiter_jurisdiction_str.= '常用操作，';
				}
				if (in_array("2",$waiter_jurisdiction_arr)){
					$waiter_jurisdiction_str.= '删除单品，';
				}
				if (in_array("3",$waiter_jurisdiction_arr)){
					$waiter_jurisdiction_str.= '结账，';
				}
				if (in_array("4",$waiter_jurisdiction_arr)){
					$waiter_jurisdiction_str.= '清桌，';
				}
				if (in_array("5",$waiter_jurisdiction_arr)){
					$waiter_jurisdiction_str.= '营业统计，';
				}
				if (in_array("6",$waiter_jurisdiction_arr)){
					$waiter_jurisdiction_str.= '前台，';
				}
			}
			$row['waiter_jurisdiction'] = $waiter_jurisdiction_str;
			$waiter_list_1[] = $row;
		}
		return array("waiter_list"=>$waiter_list_1,'count'=>$count,'totalPage'=>$totalPage,'page'=>$page_no,'page_size'=>$page_size,);
	}
	//添加
	function waiter_add(){
		$this->shop_id =$_SESSION['admin_user']['shop_id'];
		$this->waiter_name       = $this->input->post('waiter_name');
		$this->waiter_phone      = $this->input->post('waiter_phone');
		$this->waiter_no       = $this->input->post('waiter_no');
		$waiter_pwd = $this->input->post('waiter_pwd');
		$this->waiter_pwd = $this->md5_pwd($waiter_pwd);
		$waiter_jurisdiction_arr = $this->input->post('waiter_jurisdiction');
		$waiter_jurisdiction = "";
		foreach ($waiter_jurisdiction_arr as $row_1){
			$waiter_jurisdiction.=$row_1.",";
		}
		$this->waiter_jurisdiction = $waiter_jurisdiction;
		$this->waiter_state       = $this->input->post('waiter_state');
		$this->insert_time       =date("Y-m-d H:i:s",time());
		
		//先查询是否存在该工号
		$res = $this->db->select('*')->where(array('shop_id'=>$_SESSION['admin_user']['shop_id'],'waiter_no'=>$this->waiter_no))->get('shop_waiter');
		$waiter_list = $res->result_array();
		$bl_1=0;
		if(count($waiter_list)>0){
			//已存在
			$bl_1=-1;
		}else{
			$bl=$this->db->insert('shop_waiter', $this);
			if($bl){
				$bl_1=1;
			}
		}
		return $bl_1;
	}
	//获取单条
	function get_waiter($waiter_id){
		$res = $this->db->select('*')->where('waiter_id',$waiter_id)->get('shop_waiter');
		$waiter = $res->row_array();
		$waiter_jurisdiction_str = $waiter['waiter_jurisdiction'];
		$waiter_jurisdiction_arr = explode(",", $waiter_jurisdiction_str);
		$waiter['waiter_jurisdiction'] = $waiter_jurisdiction_arr;
		return array("waiter"=>$waiter);
	}
	//编辑
	function waiter_upd(){
		$waiter_id =    $this->input->post('waiter_id');
		$this->waiter_name       = $this->input->post('waiter_name');
		$this->waiter_phone      = $this->input->post('waiter_phone');
		$this->waiter_no       = $this->input->post('waiter_no');
		$waiter_pwd = $this->input->post('waiter_pwd');
		$waiter_jurisdiction_arr = $this->input->post('waiter_jurisdiction');
		$waiter_jurisdiction = "";
		foreach ($waiter_jurisdiction_arr as $row_1){
			$waiter_jurisdiction.=$row_1.",";
		}
		$this->waiter_jurisdiction = $waiter_jurisdiction;
		$this->waiter_state       = $this->input->post('waiter_state');
		$waiter = $this->get_waiter($waiter_id);
		if ($waiter['waiter']['waiter_pwd'] != $waiter_pwd) {
			$this->waiter_pwd = $this->md5_pwd($waiter_pwd);
		}
		//先查询是否存在该工号
		$str="select * from shop_waiter where waiter_no=".$this->waiter_no." and shop_id=".$_SESSION['admin_user']['shop_id']." and waiter_id!=".$waiter_id;
		$waiter_list = $this->select_all($str);
		$bl_1=0;
		if(count($waiter_list)>0){
			//已存在
			$bl_1=-1;
		}else{
			$bl = $this->db->where('waiter_id',$waiter_id)->update('shop_waiter',$this);
			if($bl){
				$bl_1=1;
			}
		}
		return $bl_1;
	}
	
}

