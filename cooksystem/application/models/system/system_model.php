<?php
class System_model extends MY_Model{
	function __construct(){
		parent::__construct();
		if (!isset($_SESSION)) {
			session_start();
		}
		$this->load->model('util_model');
	}
	//查询订单日志
	function vip_log_list($page){
		$page--;
		$size =15;//每页显示数据
		$page_sum= $size*$page;
		
		$str="select count(*) as count  from sys_vip_log a where state>0 ";
		$dish_rows=$this->select_one($str);
		$count=$dish_rows->count;
		$totalPage = ceil($count/$size);//总页码值
		if($totalPage <= 0){
			$totalPage = 1;
		}
		$str="select a.*,b.shop_name from sys_vip_log a,sys_shop b where a.shop_id=b.shop_id and a.state>0 order by b_time desc limit $page_sum,$size";
		$list=$this->select_all($str);
		
		return array("page"=>$page,"dish_rows"=>$count,"totalPage"=>$totalPage,"list"=>$list);
	}
	function shop_del($shop_id){
		$this->db->where(array('shop_id'=>$shop_id))->delete("sys_shop");
	}
	//查询商家分页
	function shop_list($where_arr,$page){
			$page--;
			$size =15;//每页显示数据
			$page_sum= $size*$page;
		
			$str="select count(*) as count  from sys_shop a where 1=1 {$where_arr}";
			$dish_rows=$this->select_one($str);
			$count=$dish_rows->count;
			$totalPage = ceil($count/$size);//总页码值
			if($totalPage <= 0){
				$totalPage = 1;
			}
			$str="select a.* from sys_shop a where 1=1  {$where_arr}  order by insert_time desc limit $page_sum,$size";
			$list=$this->select_all($str);

			return array("where_arr"=>$where_arr,"page"=>$page,"dish_rows"=>$count,"totalPage"=>$totalPage,"list"=>$list);
	}
	//会员商品信息查询
	function vip_list(){
		$res = $this->db->select('*')->order_by('v_time','desc')->get('sys_vip');
		$list = $res->result_array();
		return array("list"=>$list);
	}
	//会员信息查询
	function shop_look($shop_id){
		//查询商家基本信息(单量)
		$res = $this->db->select('*')->where('shop_id',$shop_id)->get('sys_shop');
		$shop = $res->row_array();
		//查询商家菜品信息
		$res = $this->db->select('*')->where('shop_id',$shop_id)->get('shop_dish');
		$dish_list= $res->result_array();
		$res = $this->db->select('*')->where('shop_id',$shop_id)->get('shop_set');
		$set_list= $res->result_array();
		$res = $this->db->select('*')->where('shop_id',$shop_id)->get('shop_dish_type');
		$type_list= $res->result_array();
		$res = $this->db->select('*')->where('shop_id',$shop_id)->get('shop_table');
		$table_list= $res->result_array();
		//查询商家充值记录
		$str="select a.* from sys_vip_log a where a.shop_id={$shop_id} and a.state>0 order by b_time desc ";
		$vip_list=$this->select_all($str);

		return array("shop"=>$shop,"table_list"=>$table_list,"dish_list"=>$dish_list,"set_list"=>$set_list,"type_list"=>$type_list,"vip_list"=>$vip_list);
	}
	//变更商家状态
	function shop_upd($shop_id,$shop_state){
		if($shop_state==1){
			$shop_state=0;
		}else{
			$shop_state=1;
		}
		$this->shop_state=$shop_state;
		
		$bl=$this->db->where('shop_id',$shop_id)->update('sys_shop',$this);
		return $bl;
	}
	//变更商家信息
	function shop_upd_date($shop_id,$shop_date){
		$bl=false;
		if($shop_date!=""){
			$this->shop_date=$shop_date;
			$bl=$this->db->where('shop_id',$shop_id)->update('sys_shop',$this);
		}
		return $bl;
	}
	//新增商品信息
	function add_vip(){
		$this->v_time=date("Y-m-d H:i:s",time());
		$this->v_count=0;
		$this->v_name=$this->input->post('v_name');
		$this->v_desc=$this->input->post('v_desc');
		$this->v_month=$this->input->post('v_month');
		$this->v_add_month=$this->input->post('v_add_month');
		$this->v_money=$this->input->post('v_money');
		$this->v_old_money=$this->input->post('v_old_money');
		$this->v_state=$this->input->post('v_state');
		
		$bl=$this->db->insert('sys_vip',$this);
		return $bl;
	}
	//查询商品信息
	function get_vip($v_id){
		$res = $this->db->select('*')->where('v_id',$v_id)->get('sys_vip');
		$one= $res->row_array();
		return array("one"=>$one);
	}
	//编辑
	function upd_vip(){
		$this->v_time=date("Y-m-d H:i:s",time());
		$this->v_count=0;
		$this->v_name=$this->input->post('v_name');
		$this->v_desc=$this->input->post('v_desc');
		$this->v_month=$this->input->post('v_month');
		$this->v_add_month=$this->input->post('v_add_month');
		$this->v_money=$this->input->post('v_money');
		$this->v_old_money=$this->input->post('v_old_money');
		$this->v_state=$this->input->post('v_state');
		$this->v_time=date("Y-m-d H:i:s",time());
		
		$bl=$this->db->where('v_id',$this->input->post('v_id'))->update('sys_vip',$this);
		return $bl;
	}
	//登陆的方法
	function login_admin(){
		$admin_name=$this->input->post('username');
		$admin_pwd=$this->input->post('password');
		if($admin_name!="cook"){
			return "-1";//没有找到账户
		}else{
			if($admin_pwd=="zxszxs"){
				$_SESSION['system_user']="系统管理员";
				return "1";//账户和密码验证正确,且账户已启用
			}else{
				return "0";//密码不对
			}
		}
	}
	
}