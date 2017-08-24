<?php
class Form extends CI_Model
{
	function __construct() {
	parent::__construct();
	}
	
	function insert($data){
		$this->db->insert('users', $data);
	}
}