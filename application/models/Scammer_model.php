<?php

class Scammer_model extends CI_Model {
  
  function __construct()
  {
    parent::__construct();
  }
  
  function fetch_data($limit,$start)
  {
    
    $a = $this->db
      			->select('scammers.*,users.id,users.username,users.email')
      			->from('scammers')
      			->join('users','scammers.user_id=users.id')
      			->where('status',1)
      			->order_by('date','DESC')
      			->get();
    
    if($a->num_rows() > 0)
    {
      foreach($a->result() as $row)
      {
        $data[] = $row;
      }
      
      return $data;
    }
    return false;
  }
  
  function single($slug)
  {
    $a = $this->db
      			->select('scammers.*,users.id,users.username,users.email')
      			->from('scammers')
      			->join('users','scammers.user_id=users.id')
      			->where('slug',$slug)
      			->where('status',1)
      			->get();
    
    if($a->num_rows() > 0)
    {
      foreach($a->result() as $row)
      {
        $data[] = $row;
      }
      
      return $data;
    }
    return false;
  }
  
  function insert($tabel,$data)
  {
    $this->db->insert($tabel,$data);
    
    return true;
  }
  
  function updateData($id,$data)
  {
    $this->db->where('ids',$id)->update('scammers',$data);
    
    return true;
  }
  
  function update($table,$id,$data)
  {
    $field = $table == 'scammers' ? 'ids' : 'id';
    
    $this->db->where($field,$id)
      		->update($table,$data);
    
    return true;
  }
  
  function delete($field,$id,$tabel)
  {
    $this->db->where($field,$id)
      		->delete($tabel);
    
    return true;
  }
  
}