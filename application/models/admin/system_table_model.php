<?php

class System_table_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('util_model');
        if (!isset($_SESSION)) {
            session_start();
        }
    }
    
    //查询餐桌
    function get_table_list($type_id, $tab_state)
    {
        
        $res = $this->db->select('*')->where('shop_id', $_SESSION['admin_user']['shop_id'])->order_by('type_asc', 'desc')->get('shop_table_type');
        $type_list = $res->result_array();
        $tab_list = array();
        if (!empty($type_list) && $type_id == "") {
            
            foreach ($type_list as $row){
                $type_id = $row['type_id'];
                if ($tab_state == "") {
                    $str_arr = array('shop_id' => $_SESSION['admin_user']['shop_id'], 'type_id' => $type_id);
                } else {
                    $str_arr = array('shop_id' => $_SESSION['admin_user']['shop_id'], 'type_id' => $type_id, 'tab_state' => $tab_state);
                }
    
                $res = $this->db->select('*')->where($str_arr)->order_by('tab_asc', 'desc')->get('shop_table');
//                $tab_list = $res->result_array();
                array_push($tab_list,$res->result_array());
                //查询信息
                $res = $this->db->select('type_id,type_name')->where('type_id', $type_id)->get('shop_table_type');
                $type = $res->row_array();
            }
            
//            $type_id = $type_list[0]['type_id'];
//            if ($tab_state == "") {
//                $str_arr = array('shop_id' => $_SESSION['admin_user']['shop_id'], 'type_id' => $type_id);
//            } else {
//                $str_arr = array('shop_id' => $_SESSION['admin_user']['shop_id'], 'type_id' => $type_id, 'tab_state' => $tab_state);
//            }
//
//            $res = $this->db->select('*')->where($str_arr)->order_by('tab_asc', 'desc')->get('shop_table');
//            $tab_list = $res->result_array();
//            //查询信息
//            $res = $this->db->select('type_id,type_name')->where('type_id', $type_id)->get('shop_table_type');
//            $type = $res->row_array();
        } else if (!empty($type_list) && $type_id != "") {
            if ($tab_state == "") {
                $str_arr = array('shop_id' => $_SESSION['admin_user']['shop_id'], 'type_id' => $type_id);
            } else {
                $str_arr = array('shop_id' => $_SESSION['admin_user']['shop_id'], 'type_id' => $type_id, 'tab_state' => $tab_state);
            }
            
            $res = $this->db->select('*')->where($str_arr)->order_by('tab_asc', 'desc')->get('shop_table');
            $tab_list = $res->result_array();
            //查询信息
            $res = $this->db->select('type_id,type_name')->where('type_id', $type_id)->get('shop_table_type');
            $type = $res->row_array();
        } else {
            $tab_list = array();
            $type = "";
        }
        $json_table_list = $this->util_model->JSON($tab_list);
        $json_type_list = $this->util_model->JSON($type_list);
        return array("type_list" => $json_type_list, "table_list" => $json_table_list, 'type' => $type);
    }
    
    function select_type_bl($type_id)
    {
        $res = $this->db->select('*')->where('type_id', $type_id)->get('shop_table');
        $type_list = $res->result_array();
        return $type_list;
    }
    
    function select_table_bl($table_id)
    {
        $res = $this->db->select('*')->where('tab_id', $table_id)->get('shop_table');
        $table = $res->row_array();
        return $table;
    }
    
    //查询餐桌分类
    function get_table_type_list()
    {
        $res = $this->db->select('*')->where('shop_id', $_SESSION['admin_user']['shop_id'])->order_by('type_asc', 'desc')->get('shop_table_type');
        $type_list = $res->result_array();
        return $type_list;
    }
    
    //添加餐桌分类
    function table_type_add()
    {
        $this->shop_id = $_SESSION['admin_user']['shop_id'];
        $this->type_name = $this->input->post('type_name');
        $this->type_state = $this->input->post('type_state');
        //先查询该是否存在相同名称
        $res = $this->db->select('*')->where(array('shop_id' => $this->shop_id, 'type_name' => $this->type_name))->get('shop_table_type');
        $name_list = $res->result_array();
        if (count($name_list) > 0) {
            return -1;
        } else {
            //查询排序值最小的
            $res = $this->db->select('min(type_asc) as min')->where('shop_id', $_SESSION['admin_user']['shop_id'])->get('shop_table_type');
            $min_asc = $res->row_array();
            $min_asc = $min_asc['min'];
            if ($min_asc == "") {
                $this->type_asc = 0;
            } else {
                $this->type_asc = $min_asc - 1;
            }
            $this->insert_time = date("Y-m-d H:i:s", time());
            $bl = $this->db->insert('shop_table_type', $this);
            return $bl;
        }
        
        
    }
    
    //添加餐桌
    function table_add()
    {
        $this->shop_id = $_SESSION['admin_user']['shop_id'];
        $this->tab_name = $this->input->post('tab_name');
        $this->type_id = $this->input->post('type_id');
        $this->tab_price = $this->input->post('tab_price');
        $this->tab_person = $this->input->post('tab_person');
        $this->tab_state = $this->input->post('tab_state');
        
        //先查询该是否存在相同名称
        $res = $this->db->select('*')->where(array('type_id' => $this->type_id, 'tab_name' => $this->tab_name))->get('shop_table');
        $name_list = $res->result_array();
        if (count($name_list) > 0) {
            return -1;
        } else {
            //查询排序值最小的
            $res = $this->db->select('min(tab_asc) as min')->where('shop_id', $_SESSION['admin_user']['shop_id'])->get('shop_table');
            $min_asc = $res->row_array();
            $min_asc = $min_asc['min'];
            if ($min_asc == "") {
                $this->tab_asc = 0;
            } else {
                $this->tab_asc = $min_asc - 1;
            }
            $this->insert_time = date("Y-m-d H:i:s", time());
            $bl = $this->db->insert('shop_table', $this);
            return $bl;
        }
    }
    
    //查看餐桌信息
    function get_table($tab_id)
    {
        $res = $this->db->select('*')->where('tab_id', $tab_id)->get('shop_table');
        $table = $res->row_array();
        
        $res = $this->db->select('*')->where('shop_id', $_SESSION['admin_user']['shop_id'])->order_by('type_asc', 'desc')->get('shop_table_type');
        $type_list = $res->result_array();
        
        return array("type_list" => $type_list, "table" => $table);
    }
    
    function table_update()
    {
        $this->shop_id = $_SESSION['admin_user']['shop_id'];
        $this->tab_name = $this->input->post('tab_name');
        $this->type_id = $this->input->post('type_id');
        $this->tab_price = $this->input->post('tab_price');
        $this->tab_person = $this->input->post('tab_person');
        $this->insert_time = date("Y-m-d H:i:s", time());
        
        $str = "select * from shop_table where shop_id=" . $this->shop_id . " and tab_name='" . $this->tab_name . "' and tab_id!=" . $this->input->post('tab_id');
        $name_list = $this->select_all($str);
        if (count($name_list) > 0) {
            return "-1";
        } else {
            $bl = $this->db->where('tab_id', $this->input->post('tab_id'))->update('shop_table', $this);
            return $bl;
        }
    }
    
    //分类编辑
    public function get_table_type($type_id)
    {
        $res = $this->db->select('*')->where('type_id', $type_id)->get('shop_table_type');
        $type = $res->row_array();
        return array("type" => $type);
    }
    
    public function table_type_update()
    {
        $this->shop_id = $_SESSION['admin_user']['shop_id'];
        $this->type_name = $this->input->post('type_name');
        $this->type_state = $this->input->post('type_state');
        $this->insert_time = date("Y-m-d H:i:s", time());
        
        //查询排序值最小的
        $res = $this->db->select('min(type_asc) as min')->where('shop_id', $_SESSION['admin_user']['shop_id'])->get('shop_table_type');
        $min_asc = $res->row_array();
        $min_asc = $min_asc['min'];
        if ($min_asc == "") {
            $this->type_asc = 0;
        } else {
            $this->type_asc = $min_asc - 1;
        }
        $str = "select * from shop_table_type where shop_id=" . $this->shop_id . " and type_name='" . $this->type_name . "' and type_id!=" . $this->input->post('type_id');
        $name_list = $this->select_all($str);
        if (count($name_list) > 0) {
            return "-1";
        } else {
            $bl = $this->db->where('type_id', $this->input->post('type_id'))->update('shop_table_type', $this);
            return $bl;
        }
    }
    
}

