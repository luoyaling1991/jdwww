<?php
class System_type_model extends MY_Model {
	function __construct(){
		parent::__construct();$this->load->database();
		if(!isset($_SESSION)){  
		   session_start();  
		}  
	}
	function my_sort($arrays,$sort_key,$sort_order=SORT_ASC,$sort_type=SORT_NUMERIC ){
		if(is_array($arrays)){
			foreach ($arrays as $array){
				if(is_array($array)){
					$key_arrays[] = $array[$sort_key];
				}else{
					return false;
				}
			}
		}else{
			return false;
		}
		array_multisort($key_arrays,$sort_order,$sort_type,$arrays);
		return $arrays;
	}
	
	/*查询菜品分类
	 * */
	function type_list(){
		$res = $this->db->select('type_id,type_name,type_state,type_asc,insert_time')->where(array('shop_id'=>$_SESSION['admin_user']['shop_id']))->order_by('type_asc','desc')->get('shop_dish_type');
		$type_list = $res->result_array();
		$type_list_1=$type_list;
		for($i=0;$i<count($type_list);$i++){
			$type_id=$type_list[$i]['type_id'];
			$res = $this->db->select('*')->where('type_id',$type_id)->get('shop_dish_type');
			$type= $res->row_array();
			$res = $this->db->select('*')->where('type_id',$type_id)->get('shop_dish_type_log');
			$type_log_list= $res->result_array();

			$dish_ids="";//存储菜品id集合
			$set_ids="";//存储套餐id集合
			foreach ($type_log_list as $row){
				$log_type=$row['log_type'];
				$dish_id=$row['dish_id'];
				if (isset($dish_id)){
					if($log_type==0){
						$dish_ids.=$dish_id.",";
					}else{
						$set_ids.=$dish_id.",";
					}
				}
			}
			$dish_ids=substr($dish_ids,0,strlen($dish_ids)-1);
			$set_ids=substr($set_ids,0,strlen($set_ids)-1);

			$dish_list_1=array();//查询所属分类的菜品
			$dish_list_2=array();//查询不属于分类的菜品
			if($dish_ids!=""){
				$str="select a.dish_id,a.dish_name,a.dish_price,a.dish_count,a.sys_type,a.sys_type_1,a.sys_type_2,b.log_asc as sort from shop_dish a ,shop_dish_type_log b where b.log_type=0 and b.type_id=$type_id and a.dish_id=b.dish_id and a.dish_id in ($dish_ids) and a.shop_id=".$_SESSION['admin_user']['shop_id'];
				$dish_list_1=$this->select_all($str);

				$str="select a.dish_id,a.dish_name,a.dish_price,a.dish_count,a.sys_type,a.sys_type_1,a.sys_type_2 from shop_dish a where a.dish_id not in ($dish_ids) and shop_id=".$_SESSION['admin_user']['shop_id'];
				$dish_list_2=$this->select_all($str);
			}else{
				$str="select a.dish_id,a.dish_name,a.dish_price,a.dish_count,a.sys_type,a.sys_type_1,a.sys_type_2 from shop_dish a where  shop_id=".$_SESSION['admin_user']['shop_id'];
				$dish_list_2=$this->select_all($str);
			}

			$set_list_1=array();//查询所属分类的套餐
			$set_list_2=array();//查询不属于分类的套餐
			if($set_ids!=""){
				$str="select a.set_id,a.set_name,a.set_price,a.set_count,b.log_asc as sort from shop_set a,shop_dish_type_log b where b.log_type=1 and a.set_id=b.dish_id and b.type_id=$type_id and   a.set_id in ($set_ids) and a.shop_id=".$_SESSION['admin_user']['shop_id'];
				$set_list_1=$this->select_all($str);

				$str="select set_id,set_name,set_price,set_count from shop_set where set_id not in ($set_ids) and shop_id=".$_SESSION['admin_user']['shop_id'];
				$set_list_2=$this->select_all($str);
			}else{
				$str="select set_id,set_name,set_price,set_count from shop_set where shop_id=".$_SESSION['admin_user']['shop_id'];
				$set_list_2=$this->select_all($str);
			}

			$set_list=array();//存储所属分类信息菜品
			foreach ($dish_list_1 as $row){
				$set_list[]=$row;
			}
			foreach ($set_list_1 as $row){

				$dish_one=array();
				$dish_one['dish_id']=$row['set_id'];
				$dish_one['dish_name']=$row['set_name'];
				$dish_one['dish_price']=$row['set_price'];
				$dish_one['dish_count']=$row['set_count'];
				$dish_one['sys_type']=-1;
				$dish_one['sort']=$row['sort'];
				$set_list[]=$dish_one;
			}
			$dish_list=array();//存储不所属分类信息菜品
			foreach ($dish_list_2 as $row){
				$dish_list[]=$row;
			}
			foreach ($set_list_2 as $row){
				$dish_one=array();
				$dish_one['dish_id']=$row['set_id'];
				$dish_one['dish_name']=$row['set_name'];
				$dish_one['dish_price']=$row['set_price'];
				$dish_one['dish_count']=$row['set_count'];
				$dish_one['sys_type']=-1;
				$dish_list[]=$dish_one;
			}
			if(sizeof($set_list) > 0){
				$set_list = $this->my_sort($set_list,'sort',SORT_DESC,SORT_STRING);
			}

			$type_list[$i]['set_list']=$set_list;
			$type_list[$i]['dish_list']=$dish_list;
		}
		$type_list1 = $this->JSON($type_list);
		return array("type_list"=>$type_list1,"type_list_1"=>$type_list);
	}
	//查询所有菜品、套餐
	public function get_dish_list(){
		$res = $this->db->select('dish_id,dish_name,dish_price,dish_count,sys_type,sys_type_1,sys_type_2')->where('shop_id',$_SESSION['admin_user']['shop_id'])->order_by('insert_time','desc')->get('shop_dish');
		$dish_list = $res->result_array();
		
		$res = $this->db->select('set_id,set_name,set_price,set_count')->where('shop_id',$_SESSION['admin_user']['shop_id'])->order_by('insert_time','desc')->get('shop_set');
		$set_list = $res->result_array();
		
		$dish_list_1=array();
		//遍历
		foreach ($dish_list as $row){
			$dish_list_1[]=$row;
		}
		foreach ($set_list as $row){
			$dish_one=array();
			$dish_one['dish_id']=$row['set_id'];
			$dish_one['dish_name']=$row['set_name'];
			$dish_one['dish_price']=$row['set_price'];
			$dish_one['dish_count']=$row['set_count'];
			$dish_one['sys_type']=-1;
			$dish_one['sys_type_1']=0;
			$dish_one['sys_type_2']=0;
			$dish_list_1[]=$dish_one;
		}
		
		$dish_list_1=$this->JSON($dish_list_1);
	
		return array("dish_list"=>$dish_list_1);
	}
	//查询分类信息
	public function get_type($type_id){
		//查询基本信息
		$res = $this->db->select('*')->where('type_id',$type_id)->get('shop_dish_type');
		$type= $res->row_array();
		$res = $this->db->select('*')->where('type_id',$type_id)->get('shop_dish_type_log');
		$type_log_list= $res->result_array();
		
		$dish_ids="";//存储菜品id集合
		$set_ids="";//存储套餐id集合
		foreach ($type_log_list as $row){
			$log_type=$row['log_type'];
			$dish_id=$row['dish_id'];
			if (isset($dish_id)){
				if($log_type==0){
					$dish_ids.=$dish_id.",";
				}else{
					$set_ids.=$dish_id.",";
				}
			}
		}
		$dish_ids=substr($dish_ids,0,strlen($dish_ids)-1);
		$set_ids=substr($set_ids,0,strlen($set_ids)-1);
	    
		$dish_list_1=array();//查询所属分类的菜品
		$dish_list_2=array();//查询不属于分类的菜品
	    if($dish_ids!=""){
	    	$str="select a.dish_id,a.dish_name,a.dish_price,a.dish_count,a.sys_type,a.sys_type_1,a.sys_type_2,b.log_asc as sort from shop_dish a ,shop_dish_type_log b where b.log_type=0 and b.type_id=$type_id and a.dish_id=b.dish_id and a.dish_id in ($dish_ids) and a.shop_id=".$_SESSION['admin_user']['shop_id'];
	    	$dish_list_1=$this->select_all($str);

	    	$str="select a.dish_id,a.dish_name,a.dish_price,a.dish_count,a.sys_type,a.sys_type_1,a.sys_type_2 from shop_dish a where a.dish_id not in ($dish_ids) and shop_id=".$_SESSION['admin_user']['shop_id'];
	    	$dish_list_2=$this->select_all($str);
	    }else{
	    	$str="select a.dish_id,a.dish_name,a.dish_price,a.dish_count,a.sys_type,a.sys_type_1,a.sys_type_2 from shop_dish a where  shop_id=".$_SESSION['admin_user']['shop_id'];
	    	$dish_list_2=$this->select_all($str);
	    }
		
		$set_list_1=array();//查询所属分类的套餐
		$set_list_2=array();//查询不属于分类的套餐
		if($set_ids!=""){
	    	$str="select a.set_id,a.set_name,a.set_price,a.set_count,b.log_asc as sort from shop_set a,shop_dish_type_log b where b.log_type=1 and a.set_id=b.dish_id and b.type_id=$type_id and   a.set_id in ($set_ids) and a.shop_id=".$_SESSION['admin_user']['shop_id'];
	    	$set_list_1=$this->select_all($str);
	    	
	    	$str="select set_id,set_name,set_price,set_count from shop_set where set_id not in ($set_ids) and shop_id=".$_SESSION['admin_user']['shop_id'];
	    	$set_list_2=$this->select_all($str);
		}else{
			$str="select set_id,set_name,set_price,set_count from shop_set where shop_id=".$_SESSION['admin_user']['shop_id'];
			$set_list_2=$this->select_all($str);
		}
	  
	    $set_list=array();//存储所属分类信息菜品
	    foreach ($dish_list_1 as $row){
	    	$set_list[]=$row;
	    }
	    foreach ($set_list_1 as $row){
	    	$dish_one=array();
			$dish_one['dish_id']=$row['set_id'];
			$dish_one['dish_name']=$row['set_name'];
			$dish_one['dish_price']=$row['set_price'];
			$dish_one['dish_count']=$row['set_count'];
			$dish_one['sys_type']=-1;
			$dish_one['sys_type_1']=0;
			$dish_one['sys_type_2']=0;
			$set_list[]=$dish_one;
	    }
	    $dish_list=array();//存储不所属分类信息菜品
	    foreach ($dish_list_2 as $row){
	    	$dish_list[]=$row;
	    }
	    foreach ($set_list_2 as $row){
	    	$dish_one=array();
	    	$dish_one['dish_id']=$row['set_id'];
	    	$dish_one['dish_name']=$row['set_name'];
	    	$dish_one['dish_price']=$row['set_price'];
	    	$dish_one['dish_count']=$row['set_count'];
	    	$dish_one['sys_type']=-1;
	    	$dish_one['sys_type_1']=0;
	    	$dish_one['sys_type_2']=0;
	    	$dish_list[]=$dish_one;
	    }
		//$dish_list=$this->JSON($dish_list);
		//$set_list=$this->JSON($set_list);
	

		return array('type'=>$type,'set_list'=>$set_list,"dish_list"=>$dish_list);
	}
	//添加分类
	public function type_add($type_name){
		//先添加分类数据
		$this->shop_id =$_SESSION['admin_user']['shop_id'];
		$this->type_name=$type_name;
		$this->type_state = 0;
		//查询排序值最小的
		$res = $this->db->select('min(type_asc) as min')->where('shop_id',$this->shop_id)->get('shop_dish_type');
		$min_asc = $res->row_array();
		$min_asc=$min_asc['min'];
		if($min_asc==""){
			$this->type_asc=0;
		}else{
			$this->type_asc=$min_asc-1;
		}
		$this->insert_time       =date("Y-m-d H:i:s",time());
		$bl=$this->db->insert('shop_dish_type', $this);
	
		//查询新增数据
		if($bl){
			$res = $this->db->select('type_id')->where(array('insert_time'=>$this->insert_time,'type_name'=>$this->type_name))->get('shop_dish_type');
			$type= $res->row_array();
			$type_id=$type['type_id'];
			//添加分类关联菜品信息
			$dish_list=json_decode($this->input->post('set_list'));
			if(count($dish_list)>0){
				foreach ($dish_list as $row){
					$dish_id=$row->dish_id;
					$sort=$row->sort;
					$type=$row->sys_type;
					$log_type=0;
					if($type==-1){
						$log_type=1;
					}
		
					$log = array(
							'shop_id' => $_SESSION['admin_user']['shop_id'],
							'log_type'=>$log_type,
							'dish_id' =>$dish_id,
							'type_id' =>$type_id,
							'log_asc' => $sort,
							'insert_time' => date("Y-m-d H:i:s",time())
					);
					$this->db->insert('shop_dish_type_log', $log);
				}
			}
		}
		return $bl;
	}
	//添加分类和菜品间的关系
	public function type_add_log($type_id,$dish_list_log){
		//先删除原分类和菜品(套餐)间的关系
		$bl=$this->db->where(array('shop_id'=>$_SESSION['admin_user']['shop_id'],'type_id'=>$type_id))->delete('shop_dish_type_log');
		//添加新的分类和菜品（套餐)间的关系
		if ($bl){
			foreach ($dish_list_log as $row){
				//查询排序值最小的
				$res = $this->db->select('max(log_asc) as min')->where('type_id',$type_id)->get('shop_dish_type_log');
				$min_asc = $res->row_array();
				$min_asc=$min_asc['min'];
				if($min_asc==""){
					$log_asc=0;
				}else{
					$log_asc=$min_asc+1;
				}
				$log_type='0';
				if ($row['sys_type'] == "-1"){
					$log_type="1";
				}
				$log = array(
					'shop_id' => $_SESSION['admin_user']['shop_id'],
					'log_type' => $log_type ,
					'dish_id' => $row['dish_id'],
					'type_id' => $type_id,
					'log_asc' => $log_asc,
					'insert_time' => date("Y-m-d H:i:s",time())
				);
				$bl = $this->db->insert('shop_dish_type_log', $log);
			}
		}
		return $bl;

	}
	//编辑分类
	public function type_upd(){
		//先添加套餐数据
		$type_id               = $this->input->post('type_id');
		//先添加分类数据
		$this->shop_id =$_SESSION['admin_user']['shop_id'];
		$this->type_name       = $this->input->post('type_name');
		$this->type_state      = $this->input->post('type_state');
		$this->insert_time       =date("Y-m-d H:i:s",time());
	
		$bl = $this->db->where('type_id',$type_id)->update('shop_dish_type',$this);
		if($bl){
			//先删除原分类关联信息
			$this->db->where(array('type_id'=>$type_id))->delete('shop_dish_type_log');
			//添加分类关联菜品信息
			$dish_list=json_decode($this->input->post('set_list'));
			foreach ($dish_list as $row){
				$dish_id=$row->dish_id;
				$sort=&$row->sort;
				$type=$row->sys_type;
				$log_type=0;
				if($type==-1){
					$log_type=1;
				}
			
				$log = array(
						'shop_id' => $_SESSION['admin_user']['shop_id'],
						'log_type'=>$log_type,
						'dish_id' =>$dish_id,
						'type_id' =>$type_id,
						'log_asc' => $sort,
						'insert_time' => date("Y-m-d H:i:s",time())
				);
				$this->db->insert('shop_dish_type_log', $log);
			}
		}
		return $bl;
	}
	
}

