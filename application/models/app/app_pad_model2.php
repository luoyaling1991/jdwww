<?php
class App_pad_model2 extends MY_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('util_model');
	}
	//寻找shop_id的值
	public function get_shop_id($token){
		$num=strpos($token,'__')+2;
		$shop_id=substr($token,$num,strlen($token));
		return $shop_id;
	}
	//提交单条订单信息
	public function sub_orders($token,$orders){
		$shop_id=$this->get_shop_id($token);
	
		$is_success="0";//是否成功
		$reason="登陆状态丢失，请重新登陆.";//原因
		$type_list="";
		$menu_list="";
		 
		//$order=$this->get_json();//获取模拟订单
	
		$res = $this->db->select('token')->where('shop_id',$shop_id)->get('sys_shop');
		$result = $res->row_array();
		if(empty($result)){
			$is_success="-1";//是否成功
			$reason="登录状态丢失，请重新登录！";//原因
		}else{
			if($token==$result['token']){
				$orders =json_decode($orders);//转译
				//遍历订单数组
				foreach ($orders as $order){
					//查询该店今日订单数据
					$str="select max(order_no) as row from shop_order where date(insert_time) = curdate() and shop_id=$shop_id and order_type=0";
					$row=$this->select_one($str);
					$row_no=date('Ymd',time())."0000";
					
					if($row->row!=""){
						$row=$row->row-$row_no+1;
					}else{
						$row=1;
					}
					
					if(strlen($row)==1){
						$row="000".$row;
					}else if(strlen($row)==2){
						$row="00".$row;
					}else if(strlen($row)==3){
						$row="0".$row;
					}
					$order_no=date('Ymd',time()).$row;
					$insert_time=date('Y-m-d H:i:s',time());
					$date=date('Y-m-d',time());
						
					//查询餐桌和碗筷费用
					$res = $this->db->select('tab_name,tab_price,tab_state')->where('tab_id',$order->table_id)->get('shop_table');
					$tab= $res->row_array();
					$order_data = array(
									'shop_id' =>$shop_id,
									'order_type'=>0,
									'father_id'=>"",//上级订单id
									'order_no'=>$order_no,//订单号
									'waiter_id'=>$order->waiter_id,
									'table_id'=>$order->table_id,
									'order_person'=>$order->order_person,
									'order_state'=>0,
									'day' =>$date,
									'insert_time'=>$insert_time
					);
					$bl=$this->db->insert('shop_order', $order_data);
					if($bl){
							//添加成功，先查询该数据的id
							$res = $this->db->select('order_id,order_type')->where(array('shop_id'=>$shop_id,'order_no'=>$order_no))->get('shop_order');
							$order_one = $res->row_array();
							$order_id=$order_one['order_id'];
							$order_type=$order_one['order_type'];
							//改变餐桌状态
							//$tab_data=array('tab_state'=>2);
							//$bl = $this->db->where('tab_id',$order->table_i)->update('shop_table',$tab_data);
							//主单维护餐具、餐桌费用
								if($order_type==0){
									//先判断是否增加餐桌费用
									if($tab['tab_price']>0){
										$order_log=array(
												'order_id' =>$order_id,
												'shop_id'=>$shop_id,
												'log_type' =>2,
												'data_id' =>$order->table_id,
												'log_name' =>$tab['tab_name']."餐桌",
												'log_price' =>$tab['tab_price'],
												'log_count' =>1,
												'log_money' =>$tab['tab_price'],
												'day' =>$date,
												'insert_time' =>$insert_time
										);
										$this->db->insert('shop_order_log', $order_log);
									}
									//是否增加餐具使用费用()
									$res = $this->db->select('cutlery_state,cutlery')->where('shop_id',$shop_id)->get('sys_shop');
									$shop= $res->row_array();
									if($shop['cutlery_state']==1){
										$order_log=array(
												'order_id' =>$order_id,
												'shop_id'=>$shop_id,
												'log_type' =>3,
												'data_id' =>0,
												'log_name' =>"餐具费用",
												'log_price' =>$shop['cutlery'],
												'log_count' =>$order->order_person,
												'log_money' =>$order->order_person*$shop['cutlery'],
												'day' =>$date,
												'insert_time' =>$insert_time
										);
										$this->db->insert('shop_order_log', $order_log);
									}
								}
								//订单详细数据
								$list=$order->list;
					
								foreach ($list as $row){
									$log_type=$row->log_type;
									$data_id=$row->data_id;
									$log_name=$row->log_name;
									$log_price=$row->log_price;
									$log_count=$row->log_count;
									$log_money=$log_price*$log_count;
									$order_log=array(
											'order_id' =>$order_id,
											'shop_id'=>$shop_id,
											'log_type' =>$log_type,
											'data_id' =>$data_id,
											'log_name' =>$log_name,
											'log_price' =>$log_price,
											'log_count' =>$log_count,
											'log_money' =>$log_money,
											'day' =>$date,
											'insert_time' =>$insert_time
									);
									$this->db->insert('shop_order_log', $order_log);
									if($log_type==1){
										$str="update shop_set set set_count=set_count+{$log_count} where set_id={$data_id}";
										$this->update($str);
									}else{
										$str="update shop_dish set dish_count=dish_count+{$log_count} where dish_id={$data_id}";
										$this->update($str);
									}
										
								}
								$is_success="1";//验证成功
								$reason="提交服务器成功.";
					
								$list=$this->get_list($token);
								$type_list=$list['type_list'];
								$menu_list=$list['menu_list'];
							}else{
								$is_success="0";//是否成功
								$reason="服务器异常，请重新提交.";//原因
							}
				}
			}
		}
		return array("is_success"=>$is_success,"reason"=>$reason,"type_list"=>$type_list,"menu_list"=>$menu_list);
	}
	
	public function get_json(){
		$order=array();
		$order['waiter_id']="001";//员工id
		$order['table_id']=11;//餐桌id
		$order['order_person']=5;//就餐人数
		 
		$list=array();
		 
		$list_1=array();
		$list_1['log_type']=0;//菜品类型  0菜品 1套餐  2餐桌  3餐具
		$list_1['data_id']=10;//菜品id 套餐id  餐桌id
		$list_1['log_name']='糖醋糍粑鱼';//菜品名称 套餐名称  餐桌名称
		$list_1['log_price']='78';//单价
		$list_1['log_count']=1;//数量
	
		$list_2=array();
		$list_2['log_type']=0;
		$list_2['data_id']=29;
		$list_2['log_name']='冷锅鱼';
		$list_2['log_price']='98';
		$list_2['log_count']=2;
		 
		$list_3=array();
		$list_3['log_type']=1;
		$list_3['data_id']=7;
		$list_3['log_name']='百家宴';
		$list_3['log_price']='998';
		$list_3['log_count']=1;
		 
		$list[]=$list_1;
		$list[]=$list_2;
		$list[]=$list_3;
		$order['list']=$list;//就餐订单
		
		
		$order2=array();
		$order2['waiter_id']="002";//员工id
		$order2['table_id']=11;//餐桌id
		$order2['order_person']=6;//就餐人数
			
		$list=array();
			
		$list_1=array();
		$list_1['log_type']=0;//菜品类型  0菜品 1套餐  2餐桌  3餐具
		$list_1['data_id']=11;//菜品id 套餐id  餐桌id
		$list_1['log_name']='佛跳墙';//菜品名称 套餐名称  餐桌名称
		$list_1['log_price']='198';//单价
		$list_1['log_count']=1;//数量
		
		$list_2=array();
		$list_2['log_type']=0;
		$list_2['data_id']=1;
		$list_2['log_name']='宫爆鸡丁';
		$list_2['log_price']='38';
		$list_2['log_count']=2;
			
		$list_3=array();
		$list_3['log_type']=1;
		$list_3['data_id']=8;
		$list_3['log_name']='十人宴';
		$list_3['log_price']='1080';
		$list_3['log_count']=1;
			
		$list[]=$list_1;
		$list[]=$list_2;
		$list[]=$list_3;
		$order2['list']=$list;//就餐订单
		
		
		$orders=array();
		$orders[]=$order;
		$orders[]=$order2;
		$order2=$this->JSON($orders);
	
		return $orders;
	}
	//根据token查询平板相关数据
	public function get_list($token){
		$shop_id=$this->get_shop_id($token);
		 
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
		//print_r($type_list);
		 
		//查询菜单，先查询分类信息
		$str="select type_id,type_name from shop_dish_type where shop_id=$shop_id and type_state=1 order by type_asc desc";
		$menu_list=$this->select_all($str);
		//遍历菜品分类
		for ($i=0;$i<count($menu_list);$i++){
			$row=$menu_list[$i];
			$type_id=$row['type_id'];
			//根据分类信息，先查询该分类下面相关的菜品、套餐关联信息
			$str="select log_type,dish_id from shop_dish_type_log where type_id=$type_id order by log_asc desc";
			$list=$this->select_all($str);
			$menu_one=array();//一个菜品分类下的菜品集合
			foreach ($list as $row_1){
				$log_type=$row_1['log_type'];
				$dish_id=$row_1['dish_id'];
				 
				$one=array();
				if($log_type==0){
					//查询菜品
					$str="select dish_id,dish_name,dish_old_price as dish_price,dish_desc,dish_img_1,dish_img_2,dish_img_3,dish_img_4,dish_img_5,dish_count from shop_dish where dish_id=$dish_id and dish_state=1";
					$dish=$this->select_all($str);
					if(count($dish)>0){
						$one=$dish[0];
						$one['log_type']=0;
						$menu_one[]=$one;
					}
				}else{
					//查询套餐
					$str="select set_id,set_name,set_price,set_desc,set_img,set_img_big,set_count from shop_set where set_id=$dish_id and set_state=1";
					$set=$this->select_all($str);
					if(count($set)>0){
						$one=$set[0];
						$one['log_type']=1;
						//查询套餐的内容
						$str="select a.dish_name,a.dish_old_price as dish_price,a.dish_desc,a.dish_img_1,a.dish_img_2,a.dish_img_3,a.dish_img_4,a.dish_img_5,b.count from shop_dish a,shop_set_log b where a.dish_id=b.dish_id and b.set_id=$dish_id order by b.sort";
						$one['set_list']=$this->select_all($str);
						$menu_one[]=$one;
					}
				}
			}
			$str="select show_id,show_type,data_id,show_name,show_desc,show_img from shop_big_show where dish_type_id=$type_id and show_state=1 order by show_asc desc";
			$list=$this->select_all($str);
			$big_one=array();//查询该分类下的推荐位信息
			foreach ($list as $row_1){
				$show_id=$row_1['show_id'];
				$show_type=$row_1['show_type'];
				$data_id=$row_1['data_id'];
				$one=array();
				if($show_type==0){
					//活动信息
					$one['show_id']=$show_id;
					$one['show_type']=$show_type;
					$one['show_name']=$row_1['show_name'];
					$one['show_desc']=$row_1['show_desc'];
					$one['show_img']=$row_1['show_img'];
					$big_one[]=$one;
				}else if($show_type==1){
					//菜品信息
					$str="select dish_id,dish_name,dish_old_price,dish_price,dish_desc,dish_img_1,dish_img_2,dish_img_3,dish_img_4,dish_img_5,dish_img_6,dish_count from shop_dish where dish_id=$data_id and dish_state=1";
					$dish=$this->select_all($str);
					if(count($dish)>0){
						$one=$dish[0];
						$one['show_id']=$show_id;
						$one['show_type']=$show_type;
						$big_one[]=$one;
					}
				}else if($show_type==2){
					//套餐信息
					$str="select set_id,set_name,set_price,set_desc,set_img,set_img_big,set_count from shop_set where set_id=$data_id and set_state=1";
					$set=$this->select_all($str);
					if(count($set)>0){
						$one=$set[0];
						$one['show_id']=$show_id;
						$one['show_type']=$show_type;
						//查询套餐的内容
						$str="select a.dish_name,a.dish_old_price as dish_price,a.dish_desc,a.dish_img_1,a.dish_img_2,a.dish_img_3,a.dish_img_4,a.dish_img_5,b.count from shop_dish a,shop_set_log b where a.dish_id=b.dish_id and b.set_id=$data_id order by b.sort";
						$one['set_list']=$this->select_all($str);
						$big_one[]=$one;
					}
				}
			}
	
			$menu_list[$i]['big_list']=$big_one;
			$menu_list[$i]['dish_list']=$menu_one;
		}
		//print_r($menu_list);
		 
		return array("type_list"=>$type_list,"menu_list"=>$menu_list);
	}
}