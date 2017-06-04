<?php
class System_dish_model extends MY_Model {
	function __construct(){
		parent::__construct();$this->load->database();
		if(!isset($_SESSION)){  
		   session_start();  
		}  
	}
	/*查询菜品
	 *$where_arr查询条件 $asc_name排序列名  $asc_type排序类型 (asc/desc) $page页码值 
	 * */
	function dish_list($where_arr,$type_id,$asc_name,$asc_type,$page,$size){
		$page--;
		$page_sum= $size*$page;

		if($type_id!="" && $type_id!=-1){
			$str="select count(*) as count  from shop_dish a where a.dish_id in (select b.dish_id from shop_dish_type_log b where b.log_type=0 and b.shop_id={$_SESSION['admin_user']['shop_id']} and b.type_id={$type_id}) {$where_arr}";
		}else{
			$str="select count(*) as count  from shop_dish a where a.shop_id={$_SESSION['admin_user']['shop_id']} {$where_arr}";
		}
        $dish_rows=$this->select_one($str);
        $count=$dish_rows->count;
		$totalPage = ceil($count/$size);//总页码值
		if($totalPage <= 0){
			$totalPage = 1;
		}
		if($type_id!="" && $type_id!=-1){
			$str="select a.dish_id,a.dish_name,a.dish_price,a.dish_count,a.dish_state,a.insert_time  from shop_dish a where a.dish_id in (select b.dish_id from shop_dish_type_log b where  b.log_type=0 and b.shop_id={$_SESSION['admin_user']['shop_id']} and b.type_id={$type_id}{$where_arr} order by $asc_name $asc_type limit $page_sum,$size";
		}else{
			$str="select a.dish_id,a.dish_name,a.dish_price,a.dish_count,a.dish_state,a.insert_time  from shop_dish a where a.shop_id={$_SESSION['admin_user']['shop_id']} {$where_arr}  order by $asc_name $asc_type limit $page_sum,$size";
		}
		$dish_list=$this->select_all($str);
        $list=$dish_list;
        $num=0;
        foreach ($list as $row){
        	$dish_id=$row['dish_id'];
        	//根据菜品id查询菜品所属分类信息
        	$str="select b.type_name from shop_dish_type_log a,shop_dish_type b where  a.type_id=b.type_id and a.log_type=0 and a.dish_id=$dish_id";
        	$arr=$this->select_all($str);
        	$type_name="";
        	foreach ($arr as $row_1){
        		$type_name.=$row_1['type_name']."、";
        	}
        	$dish_list[$num]['type_name']=substr($type_name,0,strlen($type_name)-3);
        	$num++;
        }
       	$type_list=$this->get_dish_type();
		return array("where_arr"=>$where_arr,"type_id"=>$type_id,"asc_name"=>$asc_name,"asc_type"=>$asc_type,"page"=>$page,"totalPage"=>$totalPage,"count"=>$count,"page_sum"=>$page_sum,"size"=>$size,"dish_list"=>$dish_list,"type_list"=>$type_list['type_list']);
	}
	function dish_list_all ($where_arr,$type_id,$asc_name,$asc_type) {
		if($type_id!="" && $type_id!=-1){
			$str="select a.dish_id,a.dish_name,a.dish_price,a.dish_count,a.dish_state,a.insert_time  from shop_dish a where a.dish_id in (select b.dish_id from shop_dish_type_log b where  b.log_type=0 and b.shop_id={$_SESSION['admin_user']['shop_id']} and b.type_id={$type_id}) {$where_arr}";
		}else{
			$str="select a.dish_id,a.dish_name,a.dish_price,a.dish_count,a.dish_state,a.insert_time  from shop_dish a where a.shop_id={$_SESSION['admin_user']['shop_id']} {$where_arr}";
		}
		$dish_list=$this->select_all($str);
		$list=$dish_list;
		$num=0;
		foreach ($list as $row){
			$dish_id=$row['dish_id'];
			//根据菜品id查询菜品所属分类信息
			$str="select b.type_name from shop_dish_type_log a,shop_dish_type b where  a.type_id=b.type_id and a.log_type=0 and a.dish_id=$dish_id";
			$arr=$this->select_all($str);
			$type_name="";
			foreach ($arr as $row_1){
				$type_name.=$row_1['type_name']."、";
			}
			$dish_list[$num]['type_name']=substr($type_name,0,strlen($type_name)-3);
			$num++;
		}
		$type_list=$this->get_dish_type();
		return array("where_arr"=>$where_arr,"type_id"=>$type_id,"asc_name"=>$asc_name,"asc_type"=>$asc_type,"dish_list"=>$dish_list,"type_list"=>$type_list['type_list']);
	}
	//查找单个菜品信息
	function get_dish($dish_id){
		$res = $this->db->select('*')->where('dish_id',$dish_id)->get('shop_dish');
		$dish= $res->row_array();
		$res = $this->db->select('type_id')->where(array('dish_id'=>$dish_id,'log_type'=>0))->get('shop_dish_type_log');
		$type_id_list= $res->result_array();
		$type_id=array();
		foreach ($type_id_list as $row){
			$type_id[]=$row['type_id'];
		}
		
		$res = $this->db->select('*')->where('shop_id',$_SESSION['admin_user']['shop_id'])->order_by('type_asc','desc')->get('shop_dish_type');
		$type_list = $res->result_array();
		return array("type_id_list"=>$type_id,"dish"=>$dish,"type_list"=>$type_list);
	}
	//查找所有菜品分类信息
	function get_dish_type(){
		$res = $this->db->select('*')->where('shop_id',$_SESSION['admin_user']['shop_id'])->order_by('type_asc','desc')->get('shop_dish_type');
		$type_list = $res->result_array();
		return array("type_list"=>$type_list);
	}
	function check_name($dish_name,$dish_id){
		$shop_id=$_SESSION['admin_user']['shop_id'];
		if($dish_id==0){
			$res = $this->db->select('*')->where(array('shop_id'=>$shop_id,'dish_name'=>$dish_name))->get('shop_dish');
			$name_list= $res->result_array();
			if(count($name_list)>0){
				return "0";
			}
		}else{
			$str="select * from shop_dish where shop_id=".$shop_id." and dish_name='".$dish_name."' and dish_id!=".$dish_id;
			$name_list= $this->select_all($str);
			if(count($name_list)>0){
				return "0";
			}
		}
		return "1";
	}
	//修改菜品
	function dish_upd(){
		$this->shop_id =$_SESSION['admin_user']['shop_id'];
		$this->dish_name       = $this->input->post('dish_name');
		$this->dish_price      = $this->input->post('dish_price');
		$this->dish_old_price  = $this->input->post('dish_price');
		$this->dish_desc       = $this->input->post('dish_desc');
		$this->dish_img_1       = $this->input->post('value_1');
		$this->dish_img_2       = $this->input->post('value_2');
		$this->dish_img_3       = $this->input->post('value_3');
		$this->dish_img_4       = $this->input->post('value_4');
		$this->dish_img_5       = $this->input->post('value_5');
		$this->dish_img_6       = $this->input->post('value_6');
		$this->sys_type       = $this->input->post('sys_type');
		$this->sys_type_1       = $this->input->post('sys_type_1');
		$this->sys_type_2       = $this->input->post('sys_type_2');
		if($this->sys_type!=1){
			$this->sys_type_1       = 0;
			$this->sys_type_2       = 0;
		}
		$this->dish_state       = $this->input->post('dish_state');
		$this->insert_time       =date("Y-m-d H:i:s",time());
		
		$str="select * from shop_dish where shop_id=".$this->shop_id." and dish_name='".$this->dish_name."' and dish_id!=".$this->input->post('dish_id');
		$name_list= $this->select_all($str);
		if(count($name_list)>0){
			return "-1";
		}else{
			if($this->dish_state==0){
				$tab_id=array($this->input->post('dish_id'));
				$this->util_model->batch_do_3("shop_big_show","data_id",'1',$tab_id);
			}
			//修改菜品基本信息
			$bl = $this->db->where('dish_id',$this->input->post('dish_id'))->update('shop_dish',$this);
			//查询菜品
			if($bl){
				$this->db->where(array('dish_id'=>$this->input->post('dish_id'),'log_type'=>0))->delete('shop_dish_type_log');
				$type_id_list=$this->input->post('dish_type');
				foreach ($type_id_list as $row){
					//查询排序值最小的
					$res = $this->db->select('max(log_asc) as min')->where('type_id',$row)->get('shop_dish_type_log');
					$min_asc = $res->row_array();
					$min_asc=$min_asc['min'];
					if($min_asc==""){
						$log_asc=0;
					}else{
						$log_asc=$min_asc+1;
					}
					$log = array(
							'shop_id' => $_SESSION['admin_user']['shop_id'],
							'log_type' => '0' ,//菜品
							'dish_id' => $this->input->post('dish_id'),
							'type_id' => $row,
							'log_asc' => $log_asc,
							'insert_time' => date("Y-m-d H:i:s",time())
					);
					$this->db->insert('shop_dish_type_log', $log);
				}
			}
			return $bl;
		}
	}
	//添加菜品
	function dish_add(){
		$this->shop_id =$_SESSION['admin_user']['shop_id'];
		$this->dish_name       = $this->input->post('dish_name');
		$this->dish_price      = $this->input->post('dish_price');
		$this->dish_old_price  = $this->input->post('dish_price');
		$this->dish_desc       = $this->input->post('dish_desc');
		$this->dish_img_1       = $this->input->post('value_1');
		$this->dish_img_2       = $this->input->post('value_2');
		$this->dish_img_3       = $this->input->post('value_3');
		$this->dish_img_4       = $this->input->post('value_4');
		$this->dish_img_5       = $this->input->post('value_5');
		$this->dish_img_6       = $this->input->post('value_6');
		$this->sys_type       = $this->input->post('sys_type');
		$this->sys_type_1       = $this->input->post('sys_type_1');
		$this->sys_type_2       = $this->input->post('sys_type_2');
		if($this->sys_type!=1){
			$this->sys_type_1       = 0;
			$this->sys_type_2       = 0;
		}
		$this->dish_state       = $this->input->post('dish_state');
		$this->dish_count       = 0;
		$this->insert_time       =date("Y-m-d H:i:s",time());
		//先查询该是否存在相同名称
		$res = $this->db->select('*')->where(array('shop_id'=>$this->shop_id,'dish_name'=>$this->dish_name))->get('shop_dish');
		$name_list= $res->result_array();
		if(count($name_list)>0){
			return "-1";
		}else{
			//添加菜品
			$bl=$this->db->insert('shop_dish', $this);
			//查询菜品
			if($bl){
				$res = $this->db->select('dish_id')->where(array('insert_time'=>$this->insert_time,'dish_name'=>$this->dish_name))->get('shop_dish');
				$dish= $res->row_array();
				$type_id_list=$this->input->post('dish_type');
				foreach ($type_id_list as $row){
					//查询排序值最小的
					$res = $this->db->select('max(log_asc) as min')->where('type_id',$row)->get('shop_dish_type_log');
					$min_asc = $res->row_array();
					$min_asc=$min_asc['min'];
					if($min_asc==""){
						$log_asc=0;
					}else{
						$log_asc=$min_asc+1;
					}
					$log = array(
							'shop_id' => $_SESSION['admin_user']['shop_id'],
							'log_type' => '0' ,//菜品
							'dish_id' => $dish['dish_id'],
							'type_id' => $row,
							'log_asc' => $log_asc,
							'insert_time' => date("Y-m-d H:i:s",time())
					);
					$this->db->insert('shop_dish_type_log', $log);
				}
			}
			return $bl;
		}
	}
	//添加菜品分类
	function dish_type_add(){
		$this->type_name       = $this->input->post('type_name');
		$this->type_state = 0;
		$this->shop_id =$_SESSION['admin_user']['shop_id'];
		$this->insert_time       =date("Y-m-d H:i:s",time());
		
		//查询排序值最小的
		$res = $this->db->select('min(type_asc) as min')->where('shop_id',$_SESSION['admin_user']['shop_id'])->get('shop_dish_type');
		$min_asc = $res->row_array();
		$min_asc=$min_asc['min'];
		if($min_asc==""){
			$this->type_asc=0;
		}else{
			$this->type_asc=$min_asc-1;
		}
		$bl=$this->db->insert('shop_dish_type', $this);
		if($bl){
			$res = $this->db->select('type_id,type_name')->where(array('insert_time'=>$this->insert_time,'type_name'=>$this->type_name))->get('shop_dish_type');
			$one= $res->row_array();
		}else{
			$one=array('type_id'=>'','type_name'=>'');
		}
		return $one;
	}
	
}

