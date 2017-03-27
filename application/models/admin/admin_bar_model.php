<?php
class Admin_bar_model extends MY_Model {
	function __construct(){
		parent::__construct();$this->load->database();
		$this->load->database();
		if(!isset($_SESSION)){  
		   session_start();  
		}  
		
	}
	//处理吧台订单数据
	function order_do($type,$order_id){
		$bl_num=1;
		//确认订单
		if($type==1){
			//查询该订单基本信息
			$res = $this->db->select('*')->where('order_id',$order_id)->get('shop_order');
			$order_one=$res->row_array();
			if($order_one['order_type']==0){
				//主订单，需要改变餐桌的状态
				$table_id=$order_one['table_id'];
				//先查询该餐桌是否有主订单未结单
				$str="select * from shop_order where order_state=1 and order_type=0 and table_id=$table_id";
				$order_list=$this->select_all($str);
				if(count($order_list)>0){
					$bl_num=0;//还有订单未处理
				}else{
					$table= array(
							'tab_state' =>2,
					);
					$this->db->where('tab_id',$table_id)->update('shop_table',$table);
					$order= array(
							'order_state' =>1,
					);
					$this->db->where('order_id',$order_id)->update('shop_order',$order);
				}
			}else{
				$order= array(
						'order_state' =>1,
				);
				$this->db->where('order_id',$order_id)->update('shop_order',$order);
			}
			
			
		}else{
			$this->db->where(array('order_id'=>$order_id))->delete('shop_order');
			$this->db->where(array('order_id'=>$order_id))->delete('shop_order_log');
		}
		return $bl_num;
	}
	//获取吧台信息
	function get_bar(){
		$shop_id =$_SESSION['admin_user']['shop_id'];
		//获取所有餐桌信息
		//先查询餐桌类型（排序 ），根据餐桌类型查询相关的餐桌信息（排序）
		$str="select type_id,type_name from shop_table_type where shop_id=$shop_id and type_state=1 order by type_asc desc";
		$type_list=$this->select_all($str);
		 
		for ($i=0;$i<count($type_list);$i++){
			$row=$type_list[$i];
			$type_id=$row['type_id'];
			
			//根据分类查询相应的餐桌信息
			$str="select tab_id,tab_name,tab_person,tab_price,tab_state from shop_table where type_id=$type_id  order by tab_asc desc";
			$tab_list=$this->select_all($str);
			//遍历餐桌集合，如果餐桌的状态为1，则查询该餐桌的订单信息
			for ($j=0;$j<count($tab_list);$j++){
				$order_list=array();
				$row_1=$tab_list[$j];
				$tab_state=$row_1['tab_state'];
				if($tab_state==2){
					$tab_id=$row_1['tab_id'];
					//待查询订单信息
					$str="select order_id,order_type,father_id,order_no,waiter_id,order_person,insert_time from shop_order where table_id={$tab_id} and order_state=1";
					$order_one_list=$this->select_all($str);
					for ($z=0;$z<count($order_one_list);$z++){
						$one=$order_one_list[$z];
						$order_id=$one['order_id'];
						$str="select log_id,log_name,log_price,log_count,log_money from shop_order_log where order_id=$order_id";
						$order_one_list[$z]['log_list']=$this->select_all($str);
					}
					$order_list=$order_one_list;
				}
			   
				$tab_list[$j]['order_list']=$order_list;
			}
		
			$type_list[$i]['tab_list']=$tab_list;
		}
        //等待处理的订单
        $str="select a.order_id,a.order_type,a.father_id,a.order_no,a.waiter_id,a.order_person,a.insert_time,b.tab_name,b.tab_person,c.type_name from shop_order a,shop_table b,shop_table_type c where a.shop_id=$shop_id and a.order_state=0 and a.table_id=b.tab_id and b.type_id=c.type_id";
        $order_no_list=$this->select_all($str);
        for ($z=0;$z<count($order_no_list);$z++){
        	$one=$order_no_list[$z];
        	$order_id=$one['order_id'];
        	$str="select log_id,log_name,log_price,log_count,log_money from shop_order_log where order_id=$order_id";
        	$order_no_list[$z]['log_list']=$this->select_all($str);
        }
        
        return array("type_list"=>$type_list,"order_no_list"=>$order_no_list);
	}
	//餐桌状态
	function upd_tab($tab_id,$tab_state){
		$table= array(
				'tab_state' =>$tab_state
		);
		//餐桌还原
		$this->db->where('tab_id',$tab_id)->update('shop_table',$table);
	}
	//结账
	function order_checkout($table_id,$zk,$ss,$bz,$yy){
		if(strlen($yy)>0){
			$yy=substr($yy,0,strlen($yy)-1);
		}
		
		
		//先查询该餐桌的所有订单
		$str="select order_id,order_type,father_id,order_no,waiter_id,order_person,insert_time from shop_order where table_id={$table_id} and order_state=1";
		$order_one_list=$this->select_all($str);
		$time=date("Y-m-d H:i:s",time());
		for ($z=0;$z<count($order_one_list);$z++){
			$one=$order_one_list[$z];
			$order_id=$one['order_id'];
			//先查询该主订单有无未确认的追单
			$str="select * from shop_order where father_id=$order_id and order_state=0";
			$no_list=$this->select_all($str);
			if(count($no_list)>0){
			  return "-1";
			}else{
				$order_type=$one['order_type'];
				if($order_type==0){
					$order= array(
							'order_1' =>$zk,
							'order_2' =>$zk+$ss,
							'order_price' =>$ss,
							'order_by'=>$yy,
							'order_desc'=>$bz,
							'order_state'=>2,
							'order_time'=>$time
					);
					//主单结账
					$this->db->where('order_id',$order_id)->update('shop_order',$order);
				}else{
					$order= array(
							'order_state'=>2,
							'order_time'=>$time
					);
					//追单结账
					$this->db->where('order_id',$order_id)->update('shop_order',$order);
				}
				$table= array(
						'tab_state' =>1
				);
				$str="update  sys_shop set order_count=order_count+1,money_count=money_count+{$ss} where shop_id=".$_SESSION['admin_user']['shop_id'];
				mysql_query($str);
				//餐桌还原
				$this->db->where('tab_id',$table_id)->update('shop_table',$table);
				return "0";
			}
		}
			
	}
	function del_log($log_id){
		$this->db->where(array('log_id'=>$log_id))->delete('shop_order_log');
	}
}

