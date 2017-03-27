<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_mi extends CI_Controller {

	public function index()
	{
		redirect('admin/admin_login');
	}
}
