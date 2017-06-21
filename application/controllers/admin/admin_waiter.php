<?php header("Content-type: text/html; charset=utf-8");

class Admin_waiter extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/system_waiter_model');
        $this->load->model('util_model');
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    //全部员工
    public function waiter_list()
    {
        $data = $this->system_waiter_model->waiter_list();
        $this->load->view('base/employee/list', $data);
    }

    //分页员工列表
    public function waiter_limit_list()
    {
        $data = $this->system_waiter_model->waiter_limit_list();
        echo $this->util_model->JSON($data);
    }

    //添加
    public function waiter_add_show()
    {
        $waiterId = $_GET['waiterId'];
        if (isset($waiterId)) {
            $data = array("waiterId" => $waiterId);
            $this->load->view('base/employee/addOrEdit', $data);
        } else {
            $this->load->view('base/employee/addOrEdit');
        }
    }

    public function waiter_add()
    {
        $bl = $this->system_waiter_model->add_waiter();
        if ($bl == 1) {
//			$this->waiter_list();
            echo '{"state":1,"msg":"admin/admin_waiter/waiter_list"}';
        } else if ($bl == 0) {
            echo '{"state":0,"msg":"操作执行失败，请重试!"}';
//			echo "<script>alert('操作执行失败，请重试!');history.go(-1);</script>";
        } else if ($bl == -1) {
            echo '{"state":-1,"msg":"该编号已存在，请核实再操作!"}';
//			echo "<script>alert('该编号已存在，请核实再操作!');history.go(-1);</script>";
        }
    }

    //批量操作
    public function waiter_batch()
    {
        $tab_name = "shop_waiter";
        $tab_id_name = "waiter_id";
        $tab_id =& $_POST['waiter_id'];
        $state_name = "waiter_state";
        $batch_value = $_POST['batch_value'];
        if ($tab_id != "") {
            $this->util_model->batch_do($tab_name, $tab_id_name, $tab_id, $state_name, $batch_value);
        }
        $this->waiter_list();
    }

    //编辑
    public function waiter_update_show()
    {
        $waiter_id = $_GET['waiter_id'];
        $data = $this->system_waiter_model->get_waiter($waiter_id);
        $this->load->view('base/employee/addOrEdit', $data);
    }

    public function waiter_upd()
    {
        $bl = $this->system_waiter_model->waiter_upd();
        if ($bl == 1) {
            $this->waiter_list();
        } else if ($bl == 0) {
            echo "<script>alert('操作执行失败，请重试!');history.go(-1);</script>";
        } else if ($bl == -1) {
            echo "<script>alert('该编号已存在，请核实再操作!');history.go(-1);</script>";
        }
    }

    //删除
    public function waiter_delete()
    {
        $tab_name = "shop_waiter";
        $tab_id_name = "waiter_id";
        $tab_id = $_GET['waiter_id'];
        $this->util_model->delete_do($tab_name, $tab_id_name, $tab_id);
        echo "<script>history.go(-1);</script>";
    }

    //修改后的删除
    public function waiterDelete()
    {
        $tab_name = "shop_waiter";
        $tab_id_name = "waiter_id";
        $tab_id = $_GET['waiter_id'];
        $this->util_model->delete_do($tab_name, $tab_id_name, $tab_id);
        echo '{"state":0,"msg":"删除成功!"}';
    }
}

?>