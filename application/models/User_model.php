<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	
  
  // mengecek login
	function ceklogin($username,$password)
	{
		
		$where = array( 'username' => $username);
		 				
		$gwt = $this->db->get_where('users',$where);
		if($gwt->num_rows() > 0)
		{
			foreach($gwt->result() as $pass)
			{
				$pwd = $pass->password;
			}
			
			if(password_verify($password,$pwd))
			{
				return $gwt;
			}else{
				return "fail";
			}
			
		}
		return "fail";
	}
	
  
  // info user
  function tampiluser($user)
  {
    $eh = array('username'=>$user);
    return $this->db->get_where('users',$eh);
  }
  
  
  
  // fungsi mendaftar
	function daftar($data)
	{
		return $this->db->insert('users',$data);
		
	}   
  
  // mendapatkan user post
function get_user_post($tabel,$id){
   	$data = [
   		'id_user' => $id,
   	];
   	$this->db->order_by('date','DESC');
   	return $this->db->get_where($tabel,$data);
  }
  
    // mendapatkan user total views
function get_user_total_views($tabel,$id){
   	$da = $this->db->query("select sum(dilihat) as d from $tabel where id_user=$id");
   	foreach($da->result() as $k)
   	{
   			$data= $k->d;
   	}
   if(!$data) {
		echo 0;
		}
		else
		{
		echo  $data;
		}
  }
  
      // mendapatkan user total dikomentati
function get_user_total_comments($id){
   	$da = $this->db->query("select count(*) as d from timeline as t join komentar as k where t.id_user=$id and t.id=k.id_timeline");
   	foreach($da->result() as $k)
   	{
   			$data= $k->d;
   	}
   	echo $data;
  }
  
  function sett_update($id,$fullname,$ign,$email,$kota,$bio,$fb)
  {
  	if($fb == '')
  	{
  		$fb= "#";
  	}
  	
  	$data =[
  		'fullname' => $fullname,
  		'ign'			=> $ign,
  		'email'		=> $email ,
  		'kota'			=> $kota,
  		'quotes' 		=> $bio,
  		'fb'				=> $fb

		];
  	$this->db->where('id',$id);
  	return $this->db->update('users',$data);
  }
  
  function change_password($user,$new)
  {
  	$options = [
    'cost' => 12,
];
  	$newl = password_hash($new, PASSWORD_BCRYPT, $options);
  	$opt = [ 'password' => $newl ];
  	$this->db->where("username",$user);
  	$this->db->update("users",$opt);
  }
  
  
  function get_pesan($username)
  {
  	
  	$data = [ 'dari' => $username ];
  	return $this->db->get_where("pesan",$data);
  }
  
    function get_pesan_p($k)
  {
  	
  	$data = [ 'keamanan' => $k ];
  	return $this->db->get_where("pesan",$data);
  }
  
}