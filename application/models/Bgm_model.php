<?php

class Bgm_model extends CI_Model {
  
  
  function __construct()
  {
    parent::__construct();
  }
  
  
  function fetch_episode($i)
  {
    return $this->db->where('episode',$i)
      			->get('bgm');  
  }
  
  function fetch_single($ep,$slug)
  {
    return $this->db->where('slug',$slug)
      				->where('episode',$ep)
      				->get('bgm');
  }
}