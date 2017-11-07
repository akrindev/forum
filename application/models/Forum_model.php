<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum_model extends CI_Model
 {
	
	function __construct()
	{
		parent::__construct();
	}
  
  function get_allpost($tabel)
  {
    return $this->db->query("Select f.id,f.id_user,f.judul,f.slug,f.isi,f.date,u.id,u.username from $tabel as f inner join users as u where f.id_user = u.id order by date desc limit 10");
  }
  
  function post_data($table,$data)
  {
    return $this->db->insert($table,$data);
  }
  
  function getone($tabel,$slug)
  {
    return $this->db->query("Select f.id as tlid,f.id_user,f.judul,f.slug,f.isi,f.tags,f.date,f.dilihat,u.id,u.email,u.username from $tabel as f inner join users as u where f.id_user = u.id and f.slug ='$slug'");
  }
  
  
  public function post_komentar($data)
  {
  	return $this->db->insert('komentar',$data);
  }
  
  public function get_comment($id)
  {
  	return $this->db->query('select tl.id,tl.slug,k.id_user,u.username,u.email,k.id_timeline,k.isi,k.date from komentar as k inner join timeline as tl inner join users as u where k.id_user = u.id and k.id_timeline= '.$id.' and k.id_timeline = tl.id limit 10');
  }
  public function get_comment_count($id)
  {
  	 	return $this->db->query("select count(*) as c from komentar where id_timeline = $id");
  }
  
  //pagination
  public function record_count() {
        return $this->db->count_all("timeline");
    }
    
    // Fetch data according to per_page limit.
    public function fetch_data($limit, $start) {
        
        $datanya = $this->db->query("Select f.id as tlid,f.id_user,f.judul,f.slug,f.isi,f.date,f.dilihat,u.id,u.username from timeline as f inner join users as u where f.id_user = u.id order by date desc limit $start, $limit");
        
        $query = $this->db->get("timeline");
        if ($query->num_rows() > 0) {
            foreach ($datanya->result() as $row) {
                $data[] = $row;

            }
         
            return $data;
        }
        return false;
   }
   
       public function fetch_data_image($limit, $start) {
        
        $datanya = $this->db->query("Select f.id as tlid,f.id_user,f.url,f.isi,f.date,u.id,u.username,u.email from image as f inner join users as u where f.id_user = u.id order by f.id desc limit $start, $limit");
        
        $query = $this->db->get("image");
        if ($query->num_rows() > 0) {
            foreach ($datanya->result() as $row) {
                $data[] = $row;

            }
         
            return $data;
        }
        return false;
   }
   
  
}