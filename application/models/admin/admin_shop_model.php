<?php
class Admin_shop_model extends MY_Model {
	function __construct(){
		parent::__construct();$this->load->database();
		$this->load->database();
		if(!isset($_SESSION)){  
		   session_start();  
		}  
		
	}
	
	//注册用户的方法
	function reg_do(){
		$this->reg_num  =$this->input->post('reg_num');
		$this->shop_name=$this->input->post('shop_name');
		$this->shop_logo="data/media/upload/px_logo.jpg";
		$this->shop_desc="";
		$this->name5="";
		$this->shop_person="";
		$this->shop_phone=$this->input->post('shop_mobile');
		$this->shop_address="";
		$this->shop_mobile=$this->input->post('shop_mobile');
		$this->shop_email=$this->input->post('useremail');
		$this->shop_pwd=$this->md5_pwd($this->input->post('password1'));
		$this->yz_pwd=$this->md5_pwd($this->input->post('yz_password1'));
		$this->pad_user=$this->input->post('reg_num');
		$this->pad_pwd="";
		$this->token="";
		$this->shop_qx_1="510000";
		$this->shop_qx_2="510100";
		$this->shop_qx_3="510101";
		$this->cutlery="0";
		$this->cutlery_state="0";
		$this->two="0";
		$this->shop_mail="";
		$this->shop_integral="0";
		$this->shop_date=date('Y-m-d',strtotime('+3 month'));
		$this->shop_state="1";
		$this->insert_time=date("Y-m-d H:i:s",time());
		$this->login_time=date("Y-m-d H:i:s",time());
		$this->order_count="0";
		$this->money_count="0";
		
		$this->print_name=$this->input->post('shop_name');
		$this->call_num=$this->input->post('shop_mobile');
		$this->call_address="成都市";
		$this->other="";
		$this->print_type="1";
		//首先查询该注册码是否已经存在
		$res = $this->db->select('*')->where('reg_num',$this->reg_num)->get('sys_shop');
		$list = $res->result_array();
		if(count($list)>0){
			return '-1';
		}else{
			$bl=$this->db->insert('sys_shop', $this);
			if($bl){
				$res = $this->db->select('*')->where('reg_num',$this->reg_num)->get('sys_shop');
				$result = $res->row_array();
				$_SESSION['admin_user']=$result;
				return '1';
			}else{
				return '0';	
			}
		}
		
	}
	function select_email($reg_num){
		$res = $this->db->select('shop_email')->where('reg_num',$reg_num)->get('sys_shop');
		$list = $res->result_array();
		if(count($list)>0){
			return $list[0]['shop_email'];
		}else{
			return '-1';
		}
	}
	function select_phone($reg_num){
		$res = $this->db->select('shop_mobile')->where('reg_num',$reg_num)->get('sys_shop');
		$list = $res->result_array();
		if(count($list)>0){
			return $list[0]['shop_mobile'];
		}else{
			return '-1';
		}
	}
	function select_info($reg_num){
		$res = $this->db->select('shop_id,reg_num,shop_name,shop_pwd')->where('reg_num',$reg_num)->get('sys_shop');
		$list = $res->result_array();
		if(count($list)>0){
			return array('num'=>1,'one'=>$list[0]);
		}else{
			return array('num'=>-1,'one'=>"");
		}
	}
	function upd_pwd(){
		$data=array('shop_pwd'=>$this->md5_pwd($this->input->post('password1')));
		$res = $this->db->select('*')->where(array('shop_id'=>$this->input->post('shop_id'),'shop_pwd'=>$this->input->post('old_pwd')))->get('sys_shop');
		$list = $res->result_array();
		if(count($list)>0){
			$bl=$this->db->where(array('shop_id'=>$this->input->post('shop_id'),'shop_pwd'=>$this->input->post('old_pwd')))->update('sys_shop',$data);
			if($bl){
				return 1;
			}else{
				return 0;
			}
		}else{
			return -1;
		}
		
		
	}
	//获取账户基本信息
	function get_sum(){
		$shop_id=$_SESSION['admin_user']['shop_id'];
		$one=array();
		//首先获取账户基本信息
		$res = $this->db->select('*')->where('shop_id',$shop_id)->get('sys_shop');
		$shop= $res->row_array();
		//判断联系人、联系地址、餐厅简介；基本资料的编辑
			if($shop['shop_person']=="" || $shop['shop_address']=="" || $shop['shop_desc']==""){
				$one['yz_01']=1;
			}else{$one['yz_01']=0;}
		//判断平板密码设置了没有；平板管理
			if($shop['pad_pwd']==""){
				$one['yz_02']=1;
			}else{$one['yz_02']=0;}
		//判断餐桌分类是否有数据
			$res = $this->db->select('*')->where('shop_id',$shop_id)->get('shop_table_type');
			$list= $res->result_array();
			if(count($list)>0){
				$one['yz_03']=0;
			}else{$one['yz_03']=1;}
		//判断餐桌是否有数据
			$res = $this->db->select('*')->where('shop_id',$shop_id)->get('shop_table');
			$list= $res->result_array();
			if(count($list)>0){
				$one['yz_04']=0;
			}else{$one['yz_04']=1;}
		//判断是否有菜品分类
			$res = $this->db->select('*')->where('shop_id',$shop_id)->get('shop_dish_type');
			$list= $res->result_array();
			if(count($list)>0){
				$one['yz_05']=0;
			}else{$one['yz_05']=1;}
		//判断是否有菜品
			$res = $this->db->select('*')->where('shop_id',$shop_id)->get('shop_dish');
			$list= $res->result_array();
			if(count($list)>0){
				$one['yz_06']=0;
			}else{$one['yz_06']=1;}
		//判断是否有工号
			$res = $this->db->select('*')->where('shop_id',$shop_id)->get('shop_waiter');
			$list= $res->result_array();
			if(count($list)>0){
				$one['yz_07']=0;
			}else{$one['yz_07']=1;}
		//判断基本参数是否配置了
			if($shop['print_name']=="" || $shop['call_num']=="" || $shop['call_address']==""){
				$one['yz_08']=1;
			}else{$one['yz_08']=0;}
	    return array("one"=>$one);
	}
	//登陆的方法
	function login_admin(){
		$admin_name=$this->input->post('username');
		$admin_pwd=$this->input->post('password');
		$res = $this->db->select('*')->where('reg_num',$admin_name)->get('sys_shop');
		$result = $res->row_array();
		
		if(empty($result)){
			return "-1";//没有找到账户
		}else{
			if($this->md5_pwd($admin_pwd) == $result['shop_pwd']){
				if($result['shop_state']!=0){
					$_SESSION['admin_user']=$result;
					$one=array('login_time'=>date("Y-m-d H:i:s",time()));
					$condition="shop_id = ".$_SESSION['admin_user']['shop_id'];
					$this->db->update('sys_shop',$one,$condition);
					return "1";//账户和密码验证正确,且账户已启用
				}else{
					return "-2";//账户暂停了
				}
				
			}else{
				return "0";//密码不对
			}
		}
	}
	//登陆的方法
	function web_login($username,$password){
		$admin_name=$username;
		$admin_pwd=$password;
		$res = $this->db->select('*')->where('reg_num',$admin_name)->get('sys_shop');
		$result = $res->row_array();

		if(empty($result)){
			return "-1";//没有找到账户
		}else{
			if($this->md5_pwd($admin_pwd) == $result['shop_pwd']){
				if($result['shop_state']!=0){
					$_SESSION['admin_user']=$result;
					// 后台管理系统右边内容默认
					$_SESSION['content_url'] = config_item('content_url');
					$one=array('login_time'=>date("Y-m-d H:i:s",time()));
					$condition="shop_id = ".$_SESSION['admin_user']['shop_id'];
					$this->db->update('sys_shop',$one,$condition);
					return "1";//账户和密码验证正确,且账户已启用
				}else{
					return "-2";//账户暂停了
				}

			}else{
				return "0";//密码不对
			}
		}
	}

	// 员工登陆的方法
	function user_login() {
		$waiter_no=$this->input->post('waiter_no');
		$waiter_pwd=$this->input->post('waiter_pwd');
		$res = $this->db->select('*')->where(array('shop_id'=>$_SESSION['admin_user']['shop_id'],'waiter_no'=>$waiter_no))->get('shop_waiter');
		$result = $res->row_array();
		$waiter_jurisdiction = $result['waiter_jurisdiction'];
		if (!is_null($waiter_jurisdiction)) {
			$waiter_jurisdiction_arr = explode(",", $waiter_jurisdiction);
			$result['waiter_jurisdiction'] = $waiter_jurisdiction_arr;
		}
		if(empty($result)){
			return "-1";//没有找到账户
		}else{
			if($this->md5_pwd($waiter_pwd) == $result['waiter_pwd']){
				if($result['waiter_state']== 1){
					$_SESSION['waiter']=$result;
					return "1";//账户和密码验证正确,且账户已启用
				}else{
					return "-2";//账户暂停了
				}

			}else{
				return "0";//密码不对
			}
		}
	}
}

