<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum_model extends CI_Model
 {
	
	function __construct()
	{
		parent::__construct();
	}
  
  
  function post_data($table,$data)
  {
    return $this->db->insert($table,$data);
  }
  
  function get_recent_post_comment()
  {
  	$this->db->order_by('updated','DESC');
  	$this->db->limit(5);
  	return $this->db->get("timeline");
  }
  
  function get_random_post()
  {
  	$this->db->order_by('id','RANDOM');
	$this->db->limit(4);
  	return $this->db->get('timeline');
  }
  
  function getone($tabel,$slug)
  {
    return $this->db->query("Select f.id as tlid,f.id_user,f.judul,f.slug,f.isi,f.tags,f.banned,f.date,f.dilihat,f.pinned,u.id,u.email,u.username from $tabel as f inner join users as u where f.id_user = u.id and f.slug ='$slug'");
  }
  
  
  public function post_komentar($data)
  {
  	return $this->db->insert('komentar',$data);
  }
  
  public function get_comment($id)
  {
  	return $this->db->query('select tl.id,tl.slug,k.id as koid,k.id_user,u.username,u.email,k.id_timeline,k.isi,k.date from komentar as k inner join timeline as tl inner join users as u where k.id_user = u.id and k.id_timeline= '.$id.' and k.id_timeline = tl.id limit 1000');
  }
  public function get_comment_count($id)
  {
  	 	return $this->db->query("select count(*) as c from komentar where id_timeline = $id");
  }
  
  //pagination
  public function record_count() {
        return $this->db->count_all("timeline");
    }
    
    public function count_arsip($kat)
    {
    	return $this->db->query("select f.id as iid,f.judul,f.slug,f.kat_id,f.dilihat,f.date,ka.id_kat,ka.kat,u.id,u.username from timeline as f join kategori as ka join users as u where f.id_user=u.id and ka.kat = '$kat' and f.kat_id = ka.id_kat order by date desc")->num_rows();
    }
        public function fetch_data_arsip($kat,$limit, $start) {
        
        $datanya = $this->db->query("select f.id as iid,f.judul,f.slug,f.kat_id,f.dilihat,f.date,ka.id_kat,ka.kat,u.id,u.username,u.email from timeline as f join kategori as ka join users as u where f.id_user=u.id and ka.kat = '$kat' and f.kat_id = ka.id_kat order by date desc limit $start, $limit");
      
        if ($datanya->num_rows() > 0) {
            foreach ($datanya->result() as $row) {
                $data[] = $row;

            }
         
            return $data;
        }
        return false;
   }
    //endof pagination
    
    // Fetch data according to per_page limit.
    public function fetch_data($limit, $start) {
        
        $datanya = $this->db->query("Select f.id as tlid,f.id_user,f.judul,f.slug,f.isi,f.date,f.dilihat,u.id,u.username,u.email from timeline as f inner join users as u where f.id_user = u.id order by date desc limit $start, $limit");
        
        $query = $this->db->get("timeline");
        if ($query->num_rows() > 0) {
            foreach ($datanya->result() as $row) {
                $data[] = $row;

            }
         
            return $data;
        }
        return false;
   }
   
   function cari($kata)
   {
   	$car = $this->db->like('judul',$kata)->get('timeline');
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

		function delpost($id)
		{
			return $this->db->where("id",$id)->delete("timeline");
		}
		
		function cocok($user,$id)
		{
			$opt =[ 'id_user' => $user, 'id' => $id ];
			return $this->db->get_where("timeline",$opt);
			
		}
		
		
		function update_post($id,$data)
		{
			$this->db->where("id",$id);
			return $this->db->update("timeline",$data);
		}
		
		function get_kategori()
		{
			return $this->db->get('kategori');
		}
		
		
		
		function get_nama_kat($slug)
		{
			return $this->db->query("select f.slug,f.kat_id,ka.id_kat,ka.kat from timeline as f join kategori as ka where f.slug='$slug' and f.kat_id = ka.id_kat");
		}
		
		
		
}