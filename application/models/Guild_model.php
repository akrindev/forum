<?php

class Guild_model extends CI_Model
{
  	public function __construct()
    {
      parent::__construct();
    }
  
  function fetch_data($limit,$start)
  {
    
    $a = $this->db
      			->select('guilds.*,users.id,users.username,users.ign')
      			->from('guilds')
      			->join('users','guilds.user_id=users.id')
      			->where('status',1)
      			->order_by('created_at','DESC')
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
  
  	public function insert($table, $data)
    {
      $q = $this->db->insert($table, $data);
      
      if($q) return true;
      
      return false;
    }
  
  	public function getGuild($slug)
    {
      $sql = "select guilds.*,users.id,users.username,users.ign from guilds join users on guilds.user_id=users.id where slug='$slug'";
    	return $this->db->query($sql);

 
    }
}