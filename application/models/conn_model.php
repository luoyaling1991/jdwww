<?php
class Conn_model extends CI_Model  {
	function __construct(){
		parent::__construct();
	}
	function getDb($name){
		$db = array();
		switch ($name){
			case 'cook':
				$db = $this->load->database('cook',true);
				break;
		}
		return $db;
	}
}
