<?php
class App_pad_model extends MY_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('util_model');
	}
	//平板登录
	public function pad_login($pad_user,$pad_pwd,$phone_no){
		//返回值
		$is_success="";//是否成功
		$reason="";//原因
		$token="";//token值
		$type_list="";
		$menu_list="";
		//先验证账户和密码
		$res = $this->db->select('shop_id,pad_pwd,token,shop_state,name5')->where('pad_user',$pad_user)->get('sys_shop');
		$result = $res->row_array();
		$name5="";
		if(empty($result)){
			$is_success="0";//是否成功
			$reason="没有找到该账户，请核实登录账户.";//原因
		}else{
			if($this->md5_pwd($pad_pwd) == $result['pad_pwd']){
				if($result['shop_state']!=0){
					$is_success="1";
					$reason="登录成功";
					$name5=$result['name5'];
					$token=$result['token'];
					if($token==""){
						$token=$this->md5_pwd($result['pad_pwd']);
						
						$this->token=$token."__".$result['shop_id'];
						//编辑该数据入库
						$this->db->where('shop_id',$result['shop_id'])->update('sys_shop',$this);
					}
					$list=$this->get_list($token);
					$type_list=$list['type_list'];
					$menu_list=$list['menu_list'];
					
					$data = array(
							'shop_id' =>$result['shop_id'],
							'phone_no'=>$phone_no,
							'insert_time'=>date('Y-m-d H:i:s',time())
					);
					$bl=$this->db->insert('shop_pad_login_log', $data);//添加登陆日志
				}else{
					$is_success="0";
				    $reason="您的账户已被暂停，请联系 我们客服.";
				}
		
			}else{
				$is_success="0";
				$reason="账户或密码不正确，请核实.";
			}
		}
		return array("is_success"=>$is_success,"reason"=>$reason,'name5'=>$name5,'gg'=>constant('GG'),"token"=>$token,"type_list"=>$type_list,"menu_list"=>$menu_list);
	}
	//寻找shop_id的值
	public function get_shop_id($token){
		$num=strpos($token,'__')+2;
		$shop_id=substr($token,$num,strlen($token));
		return $shop_id;
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
    	$str="select type_id,type_name from shop_dish_type where shop_id={$shop_id} and type_state=1 order by type_asc desc";
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
    //验证token是否正确
    public function is_ok($token){
    	$shop_id=$this->get_shop_id($token);
    	
    	$is_success="0";//是否成功
    	$reason="登陆状态丢失，请重新登陆.";//原因
    	$type_list="";
    	$menu_list="";
    	$name5="";
    	$res = $this->db->select('token,name5')->where('shop_id',$shop_id)->get('sys_shop');
    	$result = $res->row_array();
    	if(empty($result)){
    		$is_success="0";//是否成功
    		$reason="非法侵入，已被记录，请谨慎操作.";//原因
    	}else{
    		if($token==$result['token']){
    			$is_success="1";//验证成功
    			$reason="验证成功.";
    			$name5=$result['name5'];
    			$list=$this->get_list($token);
    			$type_list=$list['type_list'];
    			$menu_list=$list['menu_list'];
    		}
    	}
    	
    	return array("is_success"=>$is_success,"reason"=>$reason,'name5'=>$name5,'gg'=>constant('GG'),"type_list"=>$type_list,"menu_list"=>$menu_list);
    }
    //切换餐桌信息
    public function table_upd($token,$order_id,$tab_id_old,$tab_id_new){
    	$shop_id=$this->get_shop_id($token);
    	
    	$is_success="0";//是否成功
    	$reason="登陆状态丢失，请重新登陆.";//原因
    	$type_list="";
    	$menu_list="";
    	
    	$insert_time=date('Y-m-d H:i:s',time());
    	$date=date('Y-m-d',time());
    	$res = $this->db->select('token')->where('shop_id',$shop_id)->get('sys_shop');
    	$result = $res->row_array();
    	if(empty($result)){
    		$is_success="-1";//是否成功
    		$reason="登录状态丢失，请重新登录！";//原因
    	}else{
    		if($token==$result['token']){
    			//先查询两个餐桌的基本信息
    			$res = $this->db->select('tab_name,tab_price,tab_state')->where('tab_id',$tab_id_old)->get('shop_table');
    			$tab_old= $res->row_array();
    			
    			$res = $this->db->select('tab_name,tab_price,tab_state')->where('tab_id',$tab_id_new)->get('shop_table');
    			$tab_new= $res->row_array();
    			
    			//先判断新的餐桌是否已经使用了
    			if($tab_new['tab_state']!=2){
    				//先换桌
    				$order_data=array('table_id'=>$tab_id_new);
    				$bl = $this->db->where('order_id',$order_id)->update('shop_order',$order_data);
    				//在修改追单都是
    			    $this->db->where('father_id',$order_id)->update('shop_order',$order_data);
    				if($bl){
    					//变更餐桌状态
    					$table= array(
    							'tab_state' =>1,
    					);
    					$this->db->where('tab_id',$tab_id_old)->update('shop_table',$table);
    					$table= array(
    							'tab_state' =>2,
    					);
    					$this->db->where('tab_id',$tab_id_new)->update('shop_table',$table);
    					
    					//新的旧的价格都为0
    					//新的价格不为0，旧的为0
    					if($tab_new['tab_price']>0 && $tab_old['tab_price']==0){
    						$order_log=array(
    								'order_id' =>$order_id,
    								'shop_id' =>$shop_id,
    								'log_type' =>2,
    								'data_id' =>$tab_id_new,
    								'log_name' =>$tab_new['tab_name']."餐桌",
    								'log_price' =>$tab_new['tab_price'],
    								'log_count' =>1,
    								'log_money' =>$tab_new['tab_price'],
    								'day' =>$date,
    								'insert_time' =>$insert_time
    						);
    
    						$this->db->insert('shop_order_log', $order_log);
    					}
    					//新的为0，旧的不为0
    					if($tab_new['tab_price']==0 && $tab_old['tab_price']>0){
    						$this->db->where(array('order_id'=>$order_id,'data_id'=>$tab_id_new,'log_type'=>2))->delete('shop_order_log');
    					}
    					//新的、旧的都不为0
    					if($tab_new['tab_price']>0 && $tab_old['tab_price']>0){
    						$order_log=array(
    								'order_id' =>$order_id,
    								'log_type' =>2,
    								'data_id' =>$tab_id_new,
    								'log_name' =>$tab_new['tab_name']."餐桌",
    								'log_price' =>$tab_new['tab_price'],
    								'log_count' =>1,
    								'log_money' =>$tab_new['tab_price'],
    								'day' =>$date,
    								'insert_time' =>$insert_time
    						);
    						$this->db->where(array('order_id'=>$order_id,'data_id'=>$tab_id_new,'log_type'=>2))->update('shop_order_log',$order_log);
    					}
    					$is_success="1";//验证成功
    					$reason="餐桌信息更新成功.";
    					
    					$list=$this->get_list($token);
    					$type_list=$list['type_list'];
    					$menu_list=$list['menu_list'];
    				}else{
    					$is_success="0";//是否成功
    					$reason="服务器异常，请重新提交.";//原因
    				}
    			}else{
    				$is_success="0";//是否成功
    				$reason="换桌失败，".$tab_new['tab_name']."餐桌正在使用中.";//原因
    			}
    		}
    	}
    	return array("is_success"=>$is_success,"reason"=>$reason,"type_list"=>$type_list,"menu_list"=>$menu_list);
    }
    //切换餐桌信息1
    public function table_upd_1($token,$tab_id_old,$tab_id_new){
    	$shop_id=$this->get_shop_id($token);
    	 
    	$is_success="0";//是否成功
    	$reason="登陆状态丢失，请重新登陆.";//原因
    	$type_list="";
    	$menu_list="";
    	 
    	$insert_time=date('Y-m-d H:i:s',time());
    	$date=date('Y-m-d',time());
    	$res = $this->db->select('token')->where('shop_id',$shop_id)->get('sys_shop');
    	$result = $res->row_array();
    	if(empty($result)){
    		$is_success="-1";//是否成功
    		$reason="登录状态丢失，请重新登录！";//原因
    	}else{
    		if($token==$result['token']){
    			//查询订单ID$order_id
    			$str="select order_id from shop_order where table_id={$tab_id_old} and order_state!=2 and order_type=0";
    			$str_arr=$this->select_all($str);
    			$order_id=$str_arr[0]['order_id'];
    			//先查询两个餐桌的基本信息
    			$res = $this->db->select('tab_name,tab_price,tab_state')->where('tab_id',$tab_id_old)->get('shop_table');
    			$tab_old= $res->row_array();
    			 
    			$res = $this->db->select('tab_name,tab_price,tab_state')->where('tab_id',$tab_id_new)->get('shop_table');
    			$tab_new= $res->row_array();
    			 
    			//先判断新的餐桌是否已经使用了
    			if($tab_new['tab_state']!=2){
    				//先换桌
    				$order_data=array('table_id'=>$tab_id_new);
    				$bl = $this->db->where('order_id',$order_id)->update('shop_order',$order_data);
    				if($bl){
    					//变更餐桌状态
    					$table= array(
    							'tab_state' =>1,
    					);
    					$this->db->where('tab_id',$tab_id_old)->update('shop_table',$table);
    					$table= array(
    							'tab_state' =>2,
    					);
    					$this->db->where('tab_id',$tab_id_new)->update('shop_table',$table);
    						
    					//新的旧的价格都为0
    					//新的价格不为0，旧的为0
    					if($tab_new['tab_price']>0 && $tab_old['tab_price']==0){
    						$order_log=array(
    								'order_id' =>$order_id,
    								'shop_id'=>$shop_id,
    								'log_type' =>2,
    								'data_id' =>$tab_id_new,
    								'log_name' =>$tab_new['tab_name']."餐桌",
    								'log_price' =>$tab_new['tab_price'],
    								'log_count' =>1,
    								'log_money' =>$tab_new['tab_price'],
    								'day' =>$date,
    								'insert_time' =>$insert_time
    						);
    
    						$this->db->insert('shop_order_log', $order_log);
    					}
    					//新的为0，旧的不为0
    					if($tab_new['tab_price']==0 && $tab_old['tab_price']>0){
    						$this->db->where(array('order_id'=>$order_id,'data_id'=>$tab_id_new,'log_type'=>2))->delete('shop_order_log');
    					}
    					//新的、旧的都不为0
    					if($tab_new['tab_price']>0 && $tab_old['tab_price']>0){
    						$order_log=array(
    								'order_id' =>$order_id,
    								'log_type' =>2,
    								'data_id' =>$tab_id_new,
    								'log_name' =>$tab_new['tab_name']."餐桌",
    								'log_price' =>$tab_new['tab_price'],
    								'log_count' =>1,
    								'log_money' =>$tab_new['tab_price'],
    								'day' =>$date,
    								'insert_time' =>$insert_time
    						);
    						$this->db->where(array('order_id'=>$order_id,'data_id'=>$tab_id_new,'log_type'=>2))->update('shop_order_log',$order_log);
    					}
    					$is_success="1";//验证成功
    					$reason="餐桌信息更新成功.";
    						
    					$list=$this->get_list($token);
    					$type_list=$list['type_list'];
    					$menu_list=$list['menu_list'];
    				}else{
    					$is_success="0";//是否成功
    					$reason="服务器异常，请重新提交.";//原因
    				}
    			}else{
    				$is_success="0";//是否成功
    				$reason="换桌失败，".$tab_new['tab_name']."餐桌正在使用中.";//原因
    			}
    		}
    	}
    	return array("is_success"=>$is_success,"reason"=>$reason,"type_list"=>$type_list,"menu_list"=>$menu_list);
    }
    //变更就餐人
    public function person_upd($token,$order_id,$order_person){
    	$shop_id=$this->get_shop_id($token);
    	
    	$is_success="0";//是否成功
    	$reason="登陆状态丢失，请重新登陆.";//原因
    	$type_list="";
    	$menu_list="";
    	 
    	$insert_time=date('Y-m-d H:i:s',time());
    	
    	$res = $this->db->select('token')->where('shop_id',$shop_id)->get('sys_shop');
    	$result = $res->row_array();
    	if(empty($result)){
    		$is_success="-1";//是否成功
    		$reason="登录状态丢失，请重新登录！";//原因
    	}else{
    		if($token==$result['token']){
    			$order_data=array('order_person'=>$order_person);
    			$bl = $this->db->where('order_id',$order_id)->update('shop_order',$order_data);
    			if($bl){
    				//是否增加餐具使用费用
    				$res = $this->db->select('cutlery_state,cutlery')->where('shop_id',$shop_id)->get('sys_shop');
    				$shop= $res->row_array();
    				if($shop['cutlery_state']==1){
    					$order_log=array(
    							'order_id' =>$order_id,
    							'log_type' =>3,
    							'data_id' =>0,
    							'log_name' =>"餐具费用",
    							'log_price' =>$shop['cutlery'],
    							'log_count' =>$order_person,
    							'log_money' =>$order_person*$shop['cutlery'],
    							'insert_time' =>$insert_time
    					);
    					$this->db->where(array('order_id'=>$order_id,'log_type'=>3))->update('shop_order_log',$order_log);
    				}
    				$is_success="1";//验证成功
    				$reason="就餐人数信息更新成功.";
    					
    				$list=$this->get_list($token);
    				$type_list=$list['type_list'];
    				$menu_list=$list['menu_list'];
    			}else{
    				$is_success="0";//是否成功
    				$reason="服务器异常，请重新提交.";//原因
    			}
    		}
    	}
    	return array("is_success"=>$is_success,"reason"=>$reason,"type_list"=>$type_list,"menu_list"=>$menu_list);
    }
    //提交单条订单信息
    public function sub_order($token,$order){
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
    			//先获取订单数据
    			$order =json_decode($order);//转译
    			
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
    			//先获取订单数据
    			if($order->order_type==0){//首单提交，要验证餐桌状态的
    				//查询餐桌和碗筷费用
    				$res = $this->db->select('tab_name,tab_price,tab_state')->where('tab_id',$order->table_id)->get('shop_table');
    				$tab= $res->row_array();
    				//查询该餐桌有无没有处理的订单
    				$str="select * from shop_order where table_id={$order->table_id} and order_state=0";
    				$str_arr=$this->select_all($str);
    				$str_count=count($str_arr);
    				if($tab['tab_state']!=2 && $str_count==0){
    					$order_data = array(
    							'shop_id' =>$shop_id,
    							'order_type'=>$order->order_type,
    							'father_id'=>$order->father_id,//上级订单id
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
    				}else{
    					$is_success="0";//是否成功
    					$reason="餐桌：".$tab['tab_name']."正在使用中，请联系吧台核实数据.";//原因
    					if($str_count>0){
    						$reason="餐桌：".$tab['tab_name']."还有订单数据未处理，请联系吧台处理.";//原因
    					}
    				}
    			}else{
    				//追单数据提交
    				$str="select order_id,order_no from shop_order where table_id={$order->table_id} and order_state!=2";
    				$order_father=$this->select_one($str);
    				//查询该订单下的追单数量
    				$str="select *  from shop_order where father_id=".$order_father->order_id;
    				$order_num=$this->select_all($str);
    				$num=count($order_num);
    				$num++;
    				$order_no=$order_father->order_no."_".$num;
    					$order_data = array(
    							'shop_id' =>$shop_id,
    							'order_type'=>$order->order_type,
    							'father_id'=>$order_father->order_id,//上级订单id
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
    						$res = $this->db->select('order_id')->where(array('shop_id'=>$shop_id,'order_no'=>$order_no))->get('shop_order');
    						$order_id = $res->row_array();
    						$order_id=$order_id['order_id'];
    						//改变餐桌状态
    						//$tab_data=array('tab_state'=>2);
    						//$bl = $this->db->where('tab_id',$order->table_i)->update('shop_table',$tab_data);
    						
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
    							if($log_type==0){
    								$str="update shop_dish set dish_count=dish_count+$log_count where dish_id={$data_id}";
    								$this->update($str);
    							}else if($log_type==1){
    								$str="update shop_set set set_count=set_count+$log_count where set_id={$data_id}";
    								$this->update($str);
    							}
    							$this->db->insert('shop_order_log', $order_log);
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
    	$order['order_type']=1;//订单类型，0主单  1追单
    	$order['father_id']="7";//父级订单，即主订单号
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

    	$order=$this->JSON($order);

    	return $order;
    }
}