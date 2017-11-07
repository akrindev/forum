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
	function daftar($username,$fullname,$ign,$email,$gender,$password,$kota,$bio)
	{
		
		$tambahuser = array( 'id' => '',
											'username' => $username,
                            				  'fullname' => $fullname,
											'ign' 		=> $ign,
											'email'		=> $email,
											'password'	=> $password,
											'kota'		 => $kota,
											'gender' => $gender,
											'date' => date('Y-m-d H:i:s'),
											'quotes'		=> $bio);
		return $this->db->insert('users',$tambahuser);
		
	}   
function get_user_post($tabel,$id){
   	$data = [
   		'id_user' => $id,
   	];
   	return $this->db->get_where($tabel,$data);
  }
	
	}