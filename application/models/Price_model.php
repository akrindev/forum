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
 
  	function get_item_type($type)
 	{
 		$data = [
 			'type'	   => $type
 		];

		$this->db->order_by('name','ASC');
 		return $this->db->get_where('price',$data);
 	}
 
 function ajax_edit($id)
 {
 		$data = [
 			'id'	   => $id
 		];
 		$datanya = $this->db->get_where('price',$data);
 
        if ($datanya->num_rows() > 0) {
            foreach ($datanya->result() as $row) {
                $data = [
							'id'	=> $row->id,
							'name' => $row->name,
							'price' => $row->price,
							'stk' => $row->stk,
							'npc' => $row->npc
						];

            }
         
            return $data;
        }
        return false;
 }
 
 	function insert_item($tabel,$data)
 	{
 		return $this->db->insert($tabel,$data);
 	}
 
 	function update_item($id,$data)
 	{
 	
 		$this->db->where('id',$id);
 		return $this->db->update('price',$data);
 }
 
 function delete_item($id)
 {
 	return $this->db->where('id',$id)->delete('price');
 }
 
 function typenya()
 {
 	return $this->db->query("select distinct(type) from price");
 }
 	function cari($nama)
 	{
 		
		$this->db->order_by('name','ASC');
		$this->db->like('name',$nama);
 	   $car =  $this->db->get('price');
    	if($car->num_rows() > 0)
   	{
   			foreach($car->result() as $kena)
   			{
   					$data[] = $kena;
   			}
   		return $data;
   	}
   	return false;
 	}
  	function single($slug)
 	{
		$this->db->where('slug',$slug);
 	   $car =  $this->db->get('price');
    	if($car->num_rows() > 0)
   	{
   			foreach($car->result() as $kena)
   			{
   					$data[] = $kena;
   			}
   		return $data;
   	}
   	return false;
 	}
 
 	function get_history($id)
 	{
 		return $this->db->where('id_parent',$id)->get('price_history');
 	}
 }