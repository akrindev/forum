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
		return $this->db->insert('users',$tambahuser);
		
	}   
  
  // mendapatkan user post
function get_user_post($tabel,$id){
   	$data = [
   		'id_user' => $id,
   	];
   	return $this->db->get_where($tabel,$data);
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
  
}