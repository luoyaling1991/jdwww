<?php

class System_waiter_model extends MY_Model
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

    /*查询工号
     * */
    function waiter_list()
    {
        $res = $this->db->select('*')->where('shop_id', $_SESSION['admin_user']['shop_id'])->order_by('insert_time', 'asc')->get('shop_waiter');
        $waiter_list = $res->result_array();

        $waiter_list = $this->util_model->JSON($waiter_list);
        return array("waiter_list" => $waiter_list);
    }

    /*分页查询
     * */
    function waiter_limit_list()
    {

        $page = $this->input->post("page");
        //每页显示的数据大小
        $offset = 10;
        $page_sum = (($page > 0 ? $page : 1) - 1) * $offset;

        //查询总条数
        $sql = "select count(*) as count from shop_waiter where shop_id=" . $_SESSION['admin_user']['shop_id'];
        $count = $this->select_one($sql)->count;

        //计算总页码数
        $totlePage = ceil($count / $offset);
        if ($totlePage <= 0) {
            $totlePage = 1;
        }

        $res = $this->db->select('*')->where('shop_id', $_SESSION['admin_user']['shop_id'])->order_by('insert_time', 'asc')->limit($offset, $page_sum)->get('shop_waiter');
        $waiter_list = $res->result_array();

        $list = array("count" => $count, "totlePage" => $totlePage, "page" => $page, "list" => $waiter_list);

        return $list;
    }

    /**
     * 员工添加，修改后
     * @return int
     */
    function add_waiter()
    {
        $this->shop_id = $_SESSION['admin_user']['shop_id'];

        $this->waiter_name = $this->input->post('waiter_name');
        $this->waiter_phone = $this->input->post('waiter_phone');
        $this->waiter_no = $this->input->post('waiter_no');
        $this->waiter_jurisdiction = $this->input->post('waiter_jurisdiction');
        $this->waiter_pwd = $this->util_model->md5_pwd($this->input->post('waiter_pwd'));

        $this->waiter_state = 1;//默认1 $this->input->post('waiter_state');
        $this->insert_time = date("Y-m-d H:i:s", time());

        //先查询是否存在该工号
        $res = $this->db->select('*')->where(array('shop_id' => $_SESSION['admin_user']['shop_id'], 'waiter_no' => $this->waiter_no))->get('shop_waiter');
        $waiter_list = $res->result_array();
        $bl_1 = 0;
        if (count($waiter_list) > 0) {
            //已存在
            $bl_1 = -1;
        } else {
            $bl = $this->db->insert('shop_waiter', $this);
            if ($bl) {
                $bl_1 = 1;
            }
        }
        return $bl_1;
    }

    //添加
    function waiter_add()
    {
        $this->shop_id = $_SESSION['admin_user']['shop_id'];
        $this->waiter_name = $this->input->post('waiter_name');
        $this->waiter_phone = $this->input->post('waiter_phone');
        $this->waiter_no = $this->input->post('waiter_no');
        $this->waiter_state = $this->input->post('waiter_state');
        $this->insert_time = date("Y-m-d H:i:s", time());

        //先查询是否存在该工号
        $res = $this->db->select('*')->where(array('shop_id' => $_SESSION['admin_user']['shop_id'], 'waiter_no' => $this->waiter_no))->get('shop_waiter');
        $waiter_list = $res->result_array();
        $bl_1 = 0;
        if (count($waiter_list) > 0) {
            //已存在
            $bl_1 = -1;
        } else {
            $bl = $this->db->insert('shop_waiter', $this);
            if ($bl) {
                $bl_1 = 1;
            }
        }
        return $bl_1;
    }

    //获取单条
    function get_waiter($waiter_id)
    {
        $res = $this->db->select('*')->where('waiter_id', $waiter_id)->get('shop_waiter');
        $waiter = $res->row_array();
        return array("waiter" => $waiter);
    }

    //编辑
    function waiter_upd()
    {
        $waiter_id = $this->input->post('waiter_id');
        $this->waiter_name = $this->input->post('waiter_name');
        $this->waiter_phone = $this->input->post('waiter_phone');
        $this->waiter_no = $this->input->post('waiter_no');
        $this->waiter_state = $this->input->post('waiter_state');

        //先查询是否存在该工号
        $str = "select * from shop_waiter where waiter_no=" . $this->waiter_no . " and shop_id=" . $_SESSION['admin_user']['shop_id'] . " and waiter_id!=" . $waiter_id;
        $waiter_list = $this->select_all($str);
        $bl_1 = 0;
        if (count($waiter_list) > 0) {
            //已存在
            $bl_1 = -1;
        } else {
            $bl = $this->db->where('waiter_id', $waiter_id)->update('shop_waiter', $this);
            if ($bl) {
                $bl_1 = 1;
            }
        }
        return $bl_1;
    }

}

