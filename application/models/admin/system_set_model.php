<?php
class System_set_model extends MY_Model {
	function __construct(){
		parent::__construct();$this->load->database();
		if(!isset($_SESSION)){  
		   session_start();  
		}  
	}
	/*查询套餐
	 * $where_arr查询条件 $asc_name排序列名  $asc_type排序类型 (asc/desc) $page页码值 
	 * */
	function set_list($where_arr,$type_id,$asc_name,$asc_type,$page){
		$page--;
		$size =15;//每页显示数据
		$page_sum= $size*$page;
	
		if($type_id!="" && $type_id!=-1){
			$str="select count(*) as count  from shop_set a where a.set_id in (select b.dish_id from shop_dish_type_log b where  b.log_type=1 and b.shop_id={$_SESSION['admin_user']['shop_id']} and b.type_id={$type_id}) {$where_arr}";
		}else{
			$str="select count(*) as count  from shop_set a where a.shop_id={$_SESSION['admin_user']['shop_id']} {$where_arr}";
		}
		$set_rows=$this->select_one($str);
		$count=$set_rows->count;
		$totalPage = ceil($count/$size);//总页码值
		if($totalPage <= 0){
			$totalPage = 1;
		}
		if($type_id!="" && $type_id!=-1){
			$str="select a.set_id,a.set_name,a.set_price,a.set_count,a.set_state,a.insert_time  from shop_set a where a.set_id in (select b.dish_id from shop_dish_type_log b where  b.log_type=1 and b.shop_id={$_SESSION['admin_user']['shop_id']} and b.type_id={$type_id}) {$where_arr} order by $asc_name $asc_type limit $page_sum,$size";
		}else{
			$str="select a.set_id,a.set_name,a.set_price,a.set_count,a.set_state,a.insert_time  from shop_set a where a.shop_id={$_SESSION['admin_user']['shop_id']} {$where_arr}  order by $asc_name $asc_type limit $page_sum,$size";
		}
		$set_list=$this->select_all($str);
		$list_1=$set_list;
		$list_2=$set_list;
		$num=0;
		//查询所属分类
		foreach ($list_1 as $row){
			$dish_id=$row['set_id'];
			//根据菜品id查询菜品所属分类信息
			$str="select b.type_name from shop_dish_type_log a,shop_dish_type b where  a.type_id=b.type_id and a.log_type=1 and a.dish_id=$dish_id";
			$arr=$this->select_all($str);
			$type_name="";
			foreach ($arr as $row_1){
				$type_name.=$row_1['type_name']."、";
			}
			$set_list[$num]['type_name']=substr($type_name,0,strlen($type_name)-3);
			$num++;
		}
		//查询所属菜品
		$num=0;
		foreach ($list_1 as $row){
			$set_id=$row['set_id'];
			//查询菜品的信息
			$str="select a.dish_name,a.dish_price,b.count from shop_dish a,shop_set_log b where a.dish_id=b.dish_id and b.set_id={$set_id} order by b.sort ";
			$dish_list=$this->select_all($str);
			$set_list[$num]['dish_list']=$dish_list;
			$num++;
		}
		$type_list=$this->get_dish_type();
		return array("where_arr"=>$where_arr,"type_id"=>$type_id,"asc_name"=>$asc_name,"asc_type"=>$asc_type,"page"=>$page,"totalPage"=>$totalPage,"set_list"=>$set_list,"type_list"=>$type_list['type_list']);
	}
	
	//查找所有菜品分类信息
	function get_dish_type(){
		$res = $this->db->select('*')->where('shop_id',$_SESSION['admin_user']['shop_id'])->order_by('type_asc','desc')->get('shop_dish_type');
		$type_list = $res->result_array();
		return array("type_list"=>$type_list);
	}
	//查询套餐信息
	public function get_set($set_id){
		//查询基本信息
		$res = $this->db->select('*')->where('set_id',$set_id)->get('shop_set');
		$set= $res->row_array();
		$res = $this->db->select('type_id')->where(array('dish_id'=>$set_id,'log_type'=>1))->get('shop_dish_type_log');
		$type_id_list= $res->result_array();
		$type_id=array();
		foreach ($type_id_list as $row){
			$type_id[]=$row['type_id'];
		}
		
		$str="select a.dish_id,a.dish_name,a.dish_price,a.dish_count,a.sys_type,a.sys_type_1,a.sys_type_2,b.sort,b.count from shop_dish a,shop_set_log b where b.set_id={$set_id} and a.dish_id=b.dish_id and b.shop_id=".$_SESSION['admin_user']['shop_id'];
		$set_list=$this->select_all($str);
		$set_list_1 = $set_list;
		$set_list=$this->JSON($set_list);
		//先查询存在的
		$str="select * from shop_set_log where set_id={$set_id} and shop_id=".$_SESSION['admin_user']['shop_id'];
		$arr_list=$this->select_all($str);
		$not_in="";
		if(count($arr_list)>0){
			foreach ($arr_list as $row){
				$not_in.=$row['dish_id'].",";
			}
		}
		$not_in.="0";

		$str="select a.dish_id,a.dish_name,a.dish_price,a.dish_count,a.sys_type,a.sys_type_1,a.sys_type_2 from shop_dish a where a.shop_id=".$_SESSION['admin_user']['shop_id']." and dish_id not in ($not_in)";
		$dish_list=$this->select_all($str);

		$dish_list_1 = $dish_list;
		$dish_list=$this->JSON($dish_list);
		
		$res = $this->db->select('*')->where('shop_id',$_SESSION['admin_user']['shop_id'])->order_by('type_asc','desc')->get('shop_dish_type');
		$type_list = $res->result_array();
		return array('set'=>$set,'type_id_list'=>$type_id,"set_list_json"=>$set_list,"set_list"=>$set_list_1,"dish_list_json"=>$dish_list,"dish_list"=>$dish_list_1,"type_list"=>$type_list);
	}
	//编辑套餐
	public function set_upd(){
		//先添加套餐数据
		$this->shop_id =$_SESSION['admin_user']['shop_id'];
		$set_id               = $this->input->post('set_id');
		$this->set_name       = $this->input->post('set_name');
		$this->set_price      = $this->input->post('set_price');
		$this->set_desc       = $this->input->post('set_desc');
		$this->set_img       = $this->input->post('value_1');
		$this->set_img_big       = $this->input->post('value_2');
		$this->set_state       = $this->input->post('set_state');
		$this->insert_time       =date("Y-m-d H:i:s",time());
		$str="select * from shop_set where shop_id=".$this->shop_id." and set_name='".$this->set_name."' and set_id!=".$set_id;
		$name_list= $this->select_all($str);
		if(count($name_list)>0){
			return "-1";
		}else{
			if($this->set_state==0){
				$tab_id=array($set_id);
				$this->util_model->batch_do_3("shop_big_show","data_id",'2',$tab_id);
			}
			$bl = $this->db->where('set_id',$set_id)->update('shop_set',$this);
			//查询套餐数据
			if($bl){
				//先删除原套餐信息
				$this->db->where(array('set_id'=>$set_id))->delete('shop_set_log');
				//删除原套餐排序日志信息
				$this->db->where(array('shop_id'=>$_SESSION['admin_user']['shop_id'],'log_type'=>1,'dish_id'=>$set_id))->delete('shop_dish_type_log');
				//添加套餐分类信息
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
							'log_type' => '1' ,//套餐
							'dish_id' => $set_id,
							'type_id' => $row,
							'log_asc' => $log_asc,
							'insert_time' => date("Y-m-d H:i:s",time())
					);
					$this->db->insert('shop_dish_type_log', $log);
				}
				//先删除原套餐菜品数据
				$this->db->where('dish_id',$set_id)->delete('shop_set_log');
				//添加套餐菜品数据
				
				$set_list=json_decode($this->input->post('set_list'));
				foreach ($set_list as $row){
					$dish_id=$row->dish_id;
					$sort=$row->sort;
					$count=$row->count;
			
					$log = array(
							'shop_id' => $_SESSION['admin_user']['shop_id'],
							'set_id' => $set_id,
							'dish_id' =>$dish_id,
							'sort' =>$sort,
							'count' => $count,
							'insert_time' => date("Y-m-d H:i:s",time())
					);
					$this->db->insert('shop_set_log', $log);
				}
			}
			return $bl;
		}
	}
	function check_name($set_name,$set_id){
		$shop_id=$_SESSION['admin_user']['shop_id'];
		if($set_id==0){
			$res = $this->db->select('*')->where(array('shop_id'=>$shop_id,'set_name'=>$set_name))->get('shop_set');
			$name_list= $res->result_array();
			if(count($name_list)>0){
				return "0";
			}
		}else{
			$str="select * from shop_set where shop_id=".$shop_id." and set_name='".$set_name."' and set_id!=".$set_id;
		$name_list= $this->select_all($str);
			if(count($name_list)>0){
				return "0";
			}
		}
		return "1";
	}
	//查询所有菜品
	public function get_dish_list(){
		$res = $this->db->select('dish_id,dish_name,dish_price,dish_count,sys_type,sys_type_1,sys_type_2')->where('shop_id',$_SESSION['admin_user']['shop_id'])->order_by('insert_time','desc')->get('shop_dish');
		$dish_list = $res->result_array();
		$dish_list_1 = $dish_list;
		$dish_list=$this->JSON($dish_list);
		
		$res = $this->db->select('*')->where('shop_id',$_SESSION['admin_user']['shop_id'])->order_by('type_asc','desc')->get('shop_dish_type');
		$type_list = $res->result_array();
		
        return array("dish_list_json"=>$dish_list,"dish_list"=>$dish_list_1,"type_list"=>$type_list);
	}
	//添加套餐
	public function set_add(){
		//先添加套餐数据
		$this->shop_id =$_SESSION['admin_user']['shop_id'];
		$this->set_name       = $this->input->post('set_name');
		$this->set_price      = $this->input->post('set_price');
		$this->set_desc       = $this->input->post('set_desc');
		$this->set_img       = $this->input->post('value_1');
		$this->set_img_big       = $this->input->post('value_2');
		$this->set_state       = $this->input->post('set_state');
		$this->set_count       = 0;
		$this->insert_time       =date("Y-m-d H:i:s",time());
		
		//先查询该是否存在相同名称
		$res = $this->db->select('*')->where(array('shop_id'=>$this->shop_id,'set_name'=>$this->set_name))->get('shop_set');
		$name_list= $res->result_array();
		if(count($name_list)>0){
			return "-1";
		}else{
		
			$bl=$this->db->insert('shop_set', $this);
			
			//查询套餐数据
			if($bl){
				$res = $this->db->select('set_id')->where(array('insert_time'=>$this->insert_time,'set_name'=>$this->set_name))->get('shop_set');
				$set= $res->row_array();
				//添加套餐分类信息
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
							'log_type' => '1' ,//套餐
							'dish_id' => $set['set_id'],
							'type_id' => $row,
							'log_asc' => $log_asc,
							'insert_time' => date("Y-m-d H:i:s",time())
					);
					$this->db->insert('shop_dish_type_log', $log);
				}
				//添加套餐菜品数据
				$set_list=json_decode($this->input->post('set_list'));
				foreach ($set_list as $row){
					$dish_id=$row->dish_id;
					$sort=$row->sort;
					$count=$row->count;
					
					$log = array(
							'shop_id' => $_SESSION['admin_user']['shop_id'],
							'set_id' => $set['set_id'],
							'dish_id' =>$dish_id,
							'sort' =>$sort,
							'count' => $count,
							'insert_time' => date("Y-m-d H:i:s",time())
					);
					$this->db->insert('shop_set_log', $log);
				}
			}
			return $bl;
		}
	}
	
}

