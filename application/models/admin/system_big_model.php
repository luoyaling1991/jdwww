<?php
class System_big_model extends MY_Model {
	function __construct(){
		parent::__construct();$this->load->database();
		if(!isset($_SESSION)){  
		   session_start();  
		}  
	}
	//查询推荐分类及菜品分类
	public function type_list(){
		$res = $this->db->select('type_id,type_name')->where('shop_id',$_SESSION['admin_user']['shop_id'])->order_by('type_asc','desc')->get('shop_dish_type');
		$type_list = $res->result_array();
		$type_list_1 = array();
		if(count($type_list)>0){
			foreach($type_list as $row){
				$type_id = $row['type_id'];
				$big_list = $this->big_list($type_id);
				$row['big_list'] = $big_list;
				$type_list_1[] = $row;
			}
		}
		return $type_list_1;
	}
	//查询推荐位信息
	public function big_list($type_id){
		$res = $this->db->select('show_id,dish_type_id,show_type,data_id,show_name,show_state,show_asc,insert_time')->where('dish_type_id',$type_id)->order_by('show_asc','desc')->get('shop_big_show');
		$big_list = $res->result_array();
        for ($i=0;$i<count($big_list);$i++){
        	$row=$big_list[$i];
        	$show_type=$row['show_type'];
        	$data_id=$row['data_id'];
        	if($show_type==1){
        		$res = $this->db->select('dish_name,dish_img_6')->where('dish_id',$data_id)->get('shop_dish');
        		$one= $res->row_array();
        		$big_list[$i]['show_name']=$one['dish_name'];
        	}
        	if($show_type==2){
        		$res = $this->db->select('set_name')->where('set_id',$data_id)->get('shop_set');
        		$one= $res->row_array();
        		$big_list[$i]['show_name']=$one['set_name'];
        	}
        }
		return $big_list;
	}
	//查询套餐和单品信息
	public function get_dish_list(){
		$res = $this->db->select('dish_id,dish_name,dish_old_price,dish_img_6,dish_price,dish_count,sys_type,sys_type_1,sys_type_2')->where('shop_id',$_SESSION['admin_user']['shop_id'])->order_by('insert_time','desc')->get('shop_dish');
		$dish_list = $res->result_array();
		
		$res = $this->db->select('set_id,set_img_big,set_name,set_price,set_count')->where('shop_id',$_SESSION['admin_user']['shop_id'])->order_by('insert_time','desc')->get('shop_set');
		$set_list = $res->result_array();
		
		$dish_list=$this->JSON($dish_list);
		$set_list=$this->JSON($set_list);
		return array("dish_list"=>$dish_list,"set_list"=>$set_list);
	}
	//查询单条信息
	public function get_big($show_id){
		$res = $this->db->select('show_id,dish_type_id,show_name,show_desc,show_type,show_img,data_id,show_name,show_state,show_asc,insert_time')->where('show_id',$show_id)->order_by('show_asc','desc')->get('shop_big_show');
		$big = $res->row_array();
		
		$show_type=$big['show_type'];
		$data_id=$big['data_id'];
		if($show_type==1){
			$res = $this->db->select('dish_name,dish_price,dish_old_price,dish_img_6')->where('dish_id',$data_id)->get('shop_dish');
			$one= $res->row_array();
			$big['show_name']=$one['dish_name'];
			$big['dish_price']=$one['dish_price'];
			$big['dish_old_price']=$one['dish_old_price'];
			$big['show_img']=$one['dish_img_6'];
		}
		if($show_type==2){
			$res = $this->db->select('set_name')->where('set_id',$data_id)->get('shop_set');
			$one= $res->row_array();
			$big['show_name']=$one['set_name'];
		}
		
		$res = $this->db->select('dish_id,dish_name,dish_old_price,dish_img_6,dish_price,dish_count,sys_type,sys_type_1,sys_type_2')->where('shop_id',$_SESSION['admin_user']['shop_id'])->order_by('insert_time','desc')->get('shop_dish');
		$dish_list = $res->result_array();
		
		$res = $this->db->select('set_id,set_img_big,set_name,set_price,set_count')->where('shop_id',$_SESSION['admin_user']['shop_id'])->order_by('insert_time','desc')->get('shop_set');
		$set_list = $res->result_array();
		
		$dish_list=$this->JSON($dish_list);
		$set_list=$this->JSON($set_list);
		return array("big"=>$big,"dish_list"=>$dish_list,"set_list"=>$set_list);
	}
	//添加
	public function big_add(){
		$this->shop_id =$_SESSION['admin_user']['shop_id'];
		//首先判断添加的类型是
		$show_type= $this->input->post('show_type');
		$this->show_type=$show_type;
		$this->insert_time=date("Y-m-d H:i:s",time());
		$this->show_state=$this->input->post('show_state');
		$this->dish_type_id=$this->input->post('dish_type_id');
		//查询排序值最小的
		$res = $this->db->select('min(show_asc) as min')->where(array('shop_id'=>$this->shop_id,'dish_type_id'=>$this->dish_type_id))->get('shop_big_show');
		$min_asc = $res->row_array();
		$min_asc=$min_asc['min'];
		if($min_asc==""){
			$this->show_asc=0;
		}else{
			$this->show_asc=$min_asc-1;
		}
		
		if($show_type==0){
			//推荐活动信息
			$this->show_name=$this->input->post('show_name');
			$this->show_desc=$this->input->post('show_desc');
			$this->show_img=$this->input->post('big_img_1_value');
			
		}else if($show_type==1){
			//推荐菜品信息
			$this->data_id=$this->input->post('data_id');
			$show_img=$this->input->post('big_img_1_value');
			$dish_price=$this->input->post('dish_price');
			//先更新推荐菜品的基本
			$dish_upd = array(
					'dish_img_6' =>$show_img,
					'dish_price'=>$dish_price
			);
			$this->db->where('dish_id',$this->data_id)->update('shop_dish',$dish_upd);
		}else if($show_type==2){
			//推荐套餐信息
			$this->data_id=$this->input->post('data_id');
		}
		$bl=$this->db->insert('shop_big_show', $this);
		return $bl;
	}
	//编辑
	public function big_upd(){
		//首先判断添加的类型是
		$show_type= $this->input->post('show_type');
		$this->show_type=$show_type;
		$this->insert_time=date("Y-m-d H:i:s",time());
		$this->show_state=$this->input->post('show_state');
		if($show_type==0){
			//推荐活动信息
			$this->show_name=$this->input->post('show_name');
			$this->show_desc=$this->input->post('show_desc');
			$this->show_img=$this->input->post('big_img_1_value');
				
		}else if($show_type==1){
			//推荐菜品信息
			$this->data_id=$this->input->post('data_id');
			$show_img=$this->input->post('big_img_1_value');
			$dish_price=$this->input->post('dish_price');
			//先更新推荐菜品的基本
			$dish_upd = array(
					'dish_img_6' =>$show_img,
					'dish_price'=>$dish_price
			);
			$this->db->where('dish_id',$this->data_id)->update('shop_dish',$dish_upd);
		}else if($show_type==2){
			//推荐套餐信息
			$this->data_id=$this->input->post('data_id');
		}

		$bl = $this->db->where('show_id',$this->input->post('show_id'))->update('shop_big_show',$this);
		return $bl;
	}
}

