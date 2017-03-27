<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class System extends CI_Controller {

	public function index()
	{
		redirect('sys/admin_login');
	}
}
