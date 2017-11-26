<?php   
  defined('BASEPATH') OR exit('No direct script access allowed');   
  class Reset_model extends CI_Model{   
     
   public function getUserInfo($id)  
   {  
     $q = $this->db->get_where('users', array('id' => $id), 1);   
     if($this->db->affected_rows() > 0){  
       $row = $q->row();  
       return $row;  
     }else{  
       return false;  
     }  
   }  
   
  public function getUserEmail($email){  
     $q = $this->db->get_where('users', array('email' => $email), 1);   
     if($this->db->affected_rows() > 0){  
       $row = $q->row();  
       return $row;  
     }  
   }  
   
   public function insertToken($user_id)  
   {    
     $token = substr(sha1(rand()), 0, 20);   
     $date = date('Y-m-d');  
       
     $string = array(  
         'token'=> $token,  
         'user_id'=>$user_id,  
         'created'=>$date  
       );  
      $this->db->insert('tokens',$string);  
     return $token;
       
   }  
   
   public function isTokenValid($token)  
   {  
       
     $q = $this->db->get_where('tokens', array(  
       'tokens.token' => $token,   
		'tokens.aktif' => 1), 1);               
           
     if($this->db->affected_rows() > 0){  
       $row = $q->row();         
         
       $created = $row->created;  
       $createdTS = strtotime($created);  
       $today = date('Y-m-d');   
       $todayTS = strtotime($today);  
         
       if($createdTS != $todayTS){  
         return false;  
       }  
         
       $user_info = $this->getUserInfo($row->user_id);  
       return $user_info;  
         
     }else{  
       return false;  
     }  
       
   }   
   
   public function updatePassword($id,$pw)  
   {    
     $this->db->where('id', $id);  
     $this->db->update('users', array('password' => $pw));     
     return true;  
   }   
   function gantih($id)
   {
   	$this->db->where('user_id',$id);
   	return $this->db->update('tokens',array('aktif' => 0));
   }
   //End: method tambahan untuk reset code  
 }