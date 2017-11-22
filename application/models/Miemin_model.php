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
	
	function get_allpost($tabel)
  {
    return $this->db->query("Select f.id as tlid,f.id_user,f.judul,f.slug,f.isi,f.date,f.dilihat,f.banned,u.id,u.username from $tabel as f inner join users as u where f.id_user = u.id order by date desc limit 10");
  }
  
  function total_count($tabel)
  {
  	$total = $this->db->query("select count(*) as c from $tabel");
	foreach($total->result() as $tu)
	{
		return $tu->c;
	}
 }
 
 function banned_user($id,$data)
		{
			$this->db->where("id",$id);
			return $this->db->update("users",$data);
		}
	 function banned_post($id,$data)
		{
			$this->db->where("id",$id);
			return $this->db->update("timeline",$data);
		}
		
		function delpost($id)
		{
			return $this->db->where("id",$id)->delete("timeline");
		}
 function cari($kata)
   {
   	$car = $this->db->like('username',$kata)->get('users');
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
   
   function get_user_n($n)
   {
   	$this->db->where('username',$n);
   	return $this->db->get('users');
   }
   function count_users()
   {
   	return $this->db->count_all("users");
   }
   
       public function fetch_users($limit, $start) {
        $this->db->order_by('id','DESC');
        $this->db->limit($start,$limit);
        $query = $this->db->get("users");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;

            }
         
            return $data;
        }
        return false;
   }
   
       public function fetch_posts($limit, $start) {
        $query = $this->db->query("Select f.id as tlid,f.id_user,f.judul,f.slug,f.isi,f.date,f.dilihat,f.banned,u.id,u.username from timeline as f inner join users as u where f.id_user = u.id order by date desc limit $start, $limit");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;

            }
         
            return $data;
        }
        return false;
   }
   
   
}
