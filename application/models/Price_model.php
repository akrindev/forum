<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Price_model extends CI_Model
 {
		function __construct()
		{
			parent::__construct();
		}
 
 	function get_item($type,$name)
 	{
 		$data = [
 			'type'	   => $type,
 			'slug'	=> $name
 		];
 		return $this->db->get_where('price',$data);
 	}
 
 	function insert_item($data)
 	{
 		return $this->db->insert('price',$data);
 	}
 
 	function update_item($id,$data)
 	{
 		$this->db->where('id',$id);
 		return $this->db->update('price',$data);
 	}
 
 }