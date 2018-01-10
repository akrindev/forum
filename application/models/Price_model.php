<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Price_model extends CI_Model
 {
		function __construct()
		{
			parent::__construct();
		}
		
	function last_price()
	{
		$this->db->limit(1);
		$this->db->order_by('id','DESC');
		return $this->db->get('price');
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
							'npc' => $row->npc,
							'slug' => $row->slug
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
 		return $this->db
          			->where('id_parent',$id)
          			->order_by('date','DESC')
          			->get('price_history');
 	}
  
  	function saran($data)
    {
      $this->db->insert('price_filter',$data);
      
      return true;
    }
  
  	function getFilterHarga()
    {
      
      
      return $this->db
        	->query("select price_filter.*,price.id,price.name from price_filter join price on price_filter.parent_id=price.id")->result();
      
    }
  
  	function getFilterSingle($id)
    {
      return $this->db->where('idn',$id)
        				->get('price_filter');
    }
  
  	function updatePrice($a,$b)
    {
      $this->db->where('id',$a)
        		->update('price',$b);
      
      
    }
  
  	function clear($id)
    {
      return $this->db->where('idn',$id)
        				->delete('price_filter');
    }
  
  
 }