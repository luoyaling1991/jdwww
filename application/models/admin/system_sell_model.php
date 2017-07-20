<?php
class System_sell_model extends MY_Model {
	function __construct(){
		parent::__construct();$this->load->database();
		if(!isset($_SESSION)){  
		   session_start();  
		}  
	}
	//删除所有订单
	function del_all(){
		$str="select order_id,order_no,order_1,order_2,order_price,order_by,order_desc,insert_time,order_time from shop_order where shop_id={$_SESSION['admin_user']['shop_id']} and order_state=2 ";
		$list=$this->select_all($str);
		$arr_id="0,";
		foreach ($list as $row){
			$arr_id.=$row['order_id'].",";
		}
		$arr_id=substr($arr_id,0,strlen($arr_id)-1);
		$str="delete from shop_order where order_id in({$arr_id})";
		$this->delete($str);
		$str="delete from shop_order_log where order_id in({$arr_id})";
		$this->delete($str);
	}
	function get_list_3($date_1,$date_2,$asc_name,$asc_type,$page_no,$page_size){
		$start_size = ($page_no - 1) * $page_size;
		//先查询主订单数据
		$count_str="select count(1) as count from shop_order where shop_id={$_SESSION['admin_user']['shop_id']} and order_type=0 and order_state=2 and insert_time>'{$date_1}' and insert_time<'{$date_2}' order by $asc_name $asc_type";
		$count_rows=$this->select_one($count_str);
		$count=$count_rows->count;
		$totalPage = ceil($count/$page_size);//总页码值
		if($totalPage <= 0){
			$totalPage = 1;
		}
		$str="select order_id,order_no,order_1,order_2,order_price,order_by,order_desc,insert_time from shop_order where shop_id={$_SESSION['admin_user']['shop_id']} and order_type=0 and order_state=2 and insert_time>'{$date_1}' and insert_time<'{$date_2}' order by $asc_name $asc_type limit {$start_size},{$page_size}";
		$list=$this->select_all($str);
		$list_1=$list;
		for ($i=0;$i<count($list);$i++){
			$row=$list[$i];
			//根据主订单查询相应的子订单
			$order_id_list="";
			$order_id=$row['order_id'];
			$waiter_logs = array();
			$str="select w.id,w.log_type,w.order_id,w.log_desc,w.i_time,w.waiter_id,s.waiter_no,
        				s.waiter_name from waiter_log w left join shop_waiter s on w.waiter_id = s.waiter_id
        				where w.shop_id={$_SESSION['admin_user']['shop_id']} and w.order_id=$order_id and w.log_type=0";
			$waiter_logs = $this->select_all($str);
			//查询主菜单下的菜品数据
			//查询该订单的菜品数据
			$main_str="select log_name,log_type,log_price,log_count,log_money from shop_order_log where order_id =".$order_id;
			$main_log=$this->select_all($main_str);
			$list[$i]['main_log']=$main_log;
			//$order_id_list.=$order_id.",";
			$str="select order_id ,order_no,order_1,order_2,order_price,order_by,order_desc,insert_time from shop_order where father_id={$order_id}";
			$list_zi=$this->select_all($str);
			$sub_order = array();
			foreach ($list_zi as $one){
				//$order_id_list.=$one['order_id'].",";
				$sub_str="select log_name,log_type,log_price,log_count,log_money from shop_order_log where order_id =".$one['order_id'];
				$sub_log=$this->select_all($sub_str);
				$sub_order[] = array('order'=>$one,'log_list'=>$sub_log);

				$str="select w.id,w.log_type,w.order_id,w.log_desc,w.i_time,w.waiter_id,s.waiter_no,
        				s.waiter_name from waiter_log w left join shop_waiter s on w.waiter_id = s.waiter_id
        				where w.shop_id={$_SESSION['admin_user']['shop_id']} and w.order_id=$order_id and w.log_type=0";
				$waiter_logs = array_merge_recursive($waiter_logs,$this->select_all($str));
			}
			$list[$i]['sub_order']=$sub_order;
			$list[$i]['waiter_logs'] = $waiter_logs;

			//$order_id_list=substr($order_id_list,0,strlen($order_id_list)-1);
			//查询该订单的菜品数据
			/*$str="select log_name,log_type,log_price,log_count,log_money from shop_order_log where order_id in ($order_id_list)";
			$log_list=$this->select_all($str);*/
			//$list[$i]['log_list']=$log_list;
		}
		return array('list'=>$list,'count'=>$count,'totalPage'=>$totalPage,'page'=>$page_no,'page_size'=>$page_size,'start_size'=>$start_size,'date_1'=>$date_1,'date_2'=>$date_2,'asc_name'=>$asc_name,'asc_type'=>$asc_type);
	}
	//删除信息
	function del_order($order_id){
		$this->db->where(array("order_id"=>$order_id,"shop_id"=>$_SESSION['admin_user']['shop_id']))->delete("shop_order");
		$this->db->where(array("order_id"=>$order_id))->delete("shop_order_log");
		//查询追单信息
		$str="select * from shop_order where father_id=$order_id";
		$list=$this->select_all($str);
		$arr_id="";
		foreach ($list as $row){
			$arr_id.=$row['order_id'].",";
		}
		$arr_id=substr($arr_id,0,strlen($arr_id)-1);
		$str="delete from shop_order where order_id in({$arr_id})";
		$this->delete($str);
		$str="delete from shop_order_log where order_id in({$arr_id})";
		$this->delete($str);
	}
	/*查询菜品
	 *$where_arr查询条件 $asc_name排序列名  $asc_type排序类型 (asc/desc) $page页码值
	* */
	function get_list_2($where_arr,$where_arr_1,/*$sys_type_1,$sys_type_2,*/$dish_state,$date_1,$date_2,$sys_type,$asc_name,$asc_type,$flag){
		$set_list=array();
		$dish_list=array();
		$count_total=0;
		$sum_total=0;
		if($flag){
			//查询套餐
			$str="select a.set_id,a.set_name,a.set_price,a.set_state,a.insert_time from shop_set a where a.shop_id={$_SESSION['admin_user']['shop_id']} {$where_arr_1}  ";
			$list=$this->select_all($str);
			$num=0;
			foreach ($list as $row){
				$data_id=$row['set_id'];
				$price=$row['set_price'];
				//根据菜品查询销量
				$str="select SUM(log_count) as count from shop_order_log where data_id={$data_id} and insert_time>'{$date_1} 00:00:00' and insert_time<'{$date_2} 23:59:59' and log_type=1";
				$one=$this->select_one($str);
				$count=$one->count;
				if($count==""){$count=0;}
					
				$set_list[$num]['dish_id']=$row['set_id'];
				$set_list[$num]['dish_name']=$row['set_name'].'[套餐]';
				$set_list[$num]['dish_price']=$row['set_price'];
				$set_list[$num]['dish_state']=$row['set_state'];
				$set_list[$num]['insert_time']=$row['insert_time'];
				$set_list[$num]['type']=1;
				$set_list[$num]['dish_count']=$count;
				$set_list[$num]['sum']=$count*$price;
				$count_total += $count;
				$sum_total += $count*$price;
				$num++;
			}
		}
		//只看菜品
		//查询菜品
		$str="select a.dish_id,a.dish_name,a.dish_price,a.dish_state,a.insert_time  from shop_dish a where a.shop_id={$_SESSION['admin_user']['shop_id']} {$where_arr} ";
		$dish_list=$this->select_all($str);
		$list=$dish_list;
		$num=0;
		foreach ($list as $row){
			$data_id=$row['dish_id'];
			$price=$row['dish_price'];
			//根据菜品查询销量
			$str="select SUM(log_count) as count from shop_order_log where data_id={$data_id} and insert_time>'{$date_1} 00:00:00' and insert_time<'{$date_2} 23:59:59' and log_type=0";
			$one=$this->select_one($str);
			$count=$one->count;
			if($count==""){$count=0;}

			$dish_list[$num]['type']=0;
			$dish_list[$num]['dish_count']=$count;
			$dish_list[$num]['sum']=$count*$price;
			$count_total += $count;
			$sum_total += $count*$price;
			$num++;
		}

		//整合两个数据项
		$list=array();
		foreach ($dish_list as $row){
			$list[]=$row;
		}
		foreach ($set_list as $row){
			$list[]=$row;
		}
		return array('list'=>$list,'where_arr'=>$where_arr,'where_arr_1'=>$where_arr_1,/*'sys_type_1'=>$sys_type_1,'sys_type_2'=>$sys_type_2,*/'sys_type'=>$sys_type,'dish_state'=>$dish_state,'date_1'=>$date_1,'date_2'=>$date_2,'count'=>$count_total,'sum'=>$sum_total,'asc_name'=>$asc_name,'asc_type'=>$asc_type);
	}
	//查找所有菜品分类信息
	function get_dish_type(){
		$res = $this->db->select('*')->where('shop_id',$_SESSION['admin_user']['shop_id'])->order_by('type_asc','desc')->get('shop_dish_type');
		$type_list = $res->result_array();
		return array("type_list"=>$type_list);
	}
	//查询菜品销量与套餐销量
	public function get_list_1($asc_name,$asc_type){
		$data_id=$_SESSION['admin_user']['shop_id'];
		$str="select dish_id,dish_name,dish_price,dish_count,insert_time from shop_dish where shop_id=$data_id and dish_state=1";
		$dish_list=$this->select_all($str);
		
		$str="select set_id,set_name,set_price,set_count,insert_time from shop_set where shop_id=$data_id and set_state=1";
		$set_list=$this->select_all($str);

		$list=array();
		foreach ($dish_list as $row){
			$one=array();
			$one=$row;
			$one['type']=1;
			$one['sum']=$row['dish_price']*$row['dish_count'];
			$list[]=$one;
		}
		foreach ($set_list as $row){
			$one=array();
			$one['dish_id']=$row['set_id'];
			$one['dish_name']=$row['set_name']."[套餐]";
			$one['dish_price']=$row['set_price'];
			$one['dish_count']=$row['set_count'];
			$one['insert_time']=$row['insert_time'];
			$one['sum']=$row['set_price']*$row['set_count'];
			$one['type']=0;
			$list[]=$one;
		}

		//按日期统计
		$list_day="";
		$list_day_person="";
		$list_day_labels="";
		for ($i=11;$i>=0;$i--){
			$day=date("Y-m-d",strtotime("-$i day"));
			$str="select sum(log_count) as log_count from shop_order_log where shop_id=$data_id and day  ='{$day}' and log_type<2";
			$one=$this->select_one($str);
			$log_count=$one->log_count;
			if($one->log_count==""){
				$log_count=0;
			}
			$list_day.=$log_count.",";
			
			$str="select sum(order_person) as order_person from shop_order where shop_id=$data_id and day  ='{$day}'";
			$one=$this->select_one($str);
			$log_count=$one->order_person;
			if($one->order_person==""){
				$log_count=0;
			}
			$list_day_person.=$log_count.",";
			$day=date("m/d",strtotime("-$i day"));
			$list_day_labels.="'".$day."',";
		}
		$list_week="";
		$list_week_person="";
		$list_week_labels="";
		for ($i=11;$i>=0;$i--){
			$num_1=$i*7;
			$num_2=($i-1)*7;
			$day_1=date("Y-m-d",strtotime("-$num_1 day"));
			$day_2=date("Y-m-d",strtotime("-$num_2 day"));
			$str="select sum(log_count) as log_count from shop_order_log where shop_id=$data_id and day  between '{$day_1}' and '{$day_2}'";
			$one=$this->select_one($str);
			$log_count=$one->log_count;
			if($one->log_count==""){
				$log_count=0;
			}
			$list_week.=$log_count.",";
			
			$str="select sum(order_person) as order_person from shop_order where shop_id=$data_id and day  between '{$day_1}' and '{$day_2}'";
			$one=$this->select_one($str);
			$log_count=$one->order_person;
			if($one->order_person==""){
				$log_count=0;
			}
			$list_week_person.=$log_count.",";
			if($i==0){
				$list_week_labels.="'本周',";
			}else{
				$list_week_labels.="'上".$i."周',";
			}
			
		}
		$list_month="";
		$list_month_person="";
		$list_month_labels="";
		for ($i=11;$i>=0;$i--){
			$num_1=$i*30;
			$num_2=($i+1)*30;
			$day_2=date("Y-m-d",strtotime("-$num_1 day"));
			$day_1=date("Y-m-d",strtotime("-$num_2 day"));
			$str="select sum(log_count) as log_count from shop_order_log where shop_id=$data_id and day  between '{$day_1}' and '{$day_2}'";

			$one=$this->select_one($str);
			$log_count=$one->log_count;
			if($one->log_count==""){
				$log_count=0;
			}
			$list_month.=$log_count.",";
			
			$str="select sum(order_person) as order_person from shop_order where shop_id=$data_id and day  between '{$day_1}' and '{$day_2}'";
			$one=$this->select_one($str);
			$log_count=$one->order_person;
			if($one->order_person==""){
				$log_count=0;
			}
			$list_month_person.=$log_count.",";
			if($i==0){
				$list_month_labels.="'本月',";
			}else{
				$list_month_labels.="'上".$i."月',";
			}
			
		}
		$some_list['list']=$list;
		$some_list['asc_name']=$asc_name;
		$some_list['asc_type']=$asc_type;
		$some_list['list_day']="[".substr($list_day,0,strlen($list_day)-1)."]";
		$some_list['list_day_labels']="[".substr($list_day_labels,0,strlen($list_day_labels)-1)."]";
		$some_list['list_day_person']="[".substr($list_day_person,0,strlen($list_day_person)-1)."]";
		$some_list['list_week']="[".substr($list_week,0,strlen($list_week)-1)."]";
		$some_list['list_month_labels']="[".substr($list_month_labels,0,strlen($list_month_labels)-1)."]";
		$some_list['list_week_person']="[".substr($list_week_person,0,strlen($list_week_person)-1)."]";
		$some_list['list_month']="[".substr($list_month,0,strlen($list_month)-1)."]";
		$some_list['list_week_labels']="[".substr($list_week_labels,0,strlen($list_week_labels)-1)."]";
		$some_list['list_month_person']="[".substr($list_month_person,0,strlen($list_month_person)-1)."]";

		return $some_list;
	}
	
}

