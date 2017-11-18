<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Miemin_model extends CI_Model {

	
	public function __construct()
	{
		parent::__construct();
	}

	function get_last_users()
	{
		return $this->db->order_by('id','DESC')->limit(10)->get('users');
	}
	
	
}
