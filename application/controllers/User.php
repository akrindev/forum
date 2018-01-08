<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
 {
	
	function __construct()
	{
		parent::__construct();
		$this->_init();
	}
	
  private function _init()
	{
		$this->output->set_template('adminlte');
		$this->load->js('https://code.jquery.com/jquery-3.2.1.min.js');
	}
	
	function index()
	{
			if(!$this->session->userdata('user')){
				redirect(site_url('login'));
			}else{
    			$user = $this->session->userdata('user');
    			$userid = $this->session->userdata('iduser');

				$hh = $this->user->tampiluser($user);
			    $data['user'] = $hh->row_array();
				
     	   	$this->config->load('pagination',TRUE);
		 	   $configg = $this->config->item('pagination');
   		     $configg["base_url"] = base_url() . "user/index";			        $total_row = $this->user->get_user_c('timeline',$userid)->num_rows();
       	     $configg["total_rows"] = $total_row;
 		       $this->pagination->initialize($configg);
		        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
  		      $data["posts"] = $this->user->get_user_post("timeline",$userid,$configg["per_page"], $page);
 	           $str_links = $this->pagination->create_links();
		        $data["links"] = explode('&nbsp;',$str_links );
	
				$this->output->set_common_meta('Dashboard','Dashboard','a');
			
	    		$this->output->set_output_data('deskripsi','Halaman dashboard');
        		$this->output->set_output_data('og','gak tau');
			    $this->load->view('dashboard',$data);
			    
    
		}
	}
  
    function profile($user)
	{
			if(!$user)
			{
					redirect('dashboard');
			}

		    $hh = $this->user->tampiluser($user);
		    $data['user'] = $hh->row_array();
    
		    foreach($hh->result() as $gg)
  		  {
    			$iduserr = $gg->id;
 		   }
    
     	   $this->config->load('pagination',TRUE);
 		   $configg = $this->config->item('pagination');
     	   $configg["base_url"] = base_url() . "user/index";
    	    $total_row = $this->user->get_user_c('timeline',$iduserr)->num_rows();
        
            $configg["total_rows"] = $total_row;
 
      	  $this->pagination->initialize($configg);
     	   $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
      	  $data["posts"] = $this->user->get_user_post("timeline",$iduserr,$configg["per_page"], $page);
            $str_links = $this->pagination->create_links();
            $data["links"] = explode('&nbsp;',$str_links );
	
			$this->output->set_common_meta($user.'- profile',$user,'a');
			
    		$this->output->set_output_data('deskripsi',$user.'- profile');
        	$this->output->set_output_data('og','gak tau');
    		$this->load->view('profile',$data);

}
		

	function register()
	{
      if($this->session->userdata('user'))
      {
        redirect('user');
      }
      
			$this->output->set_common_meta('Mendaftar','Form untuk mendaftar','daftar');
			
    		$this->output->set_output_data('deskripsi','Registrasi');
        	$this->output->set_output_data('og','gak tau');
    
		$this->load->view('register');
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('/forum');
	}
  
	public function login()
	{
		if($this->session->userdata('user'))
		{
			redirect(base_url('user'));
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');
      
      $this->output->set_common_meta('Login','Login form, lets start','a');
			
    		$this->output->set_output_data('deskripsi','login');
        	$this->output->set_output_data('og','gak tau');
      
       if($this->form_validation->run('login') != FALSE)
       {
        
	        $ini = $this->user->ceklogin($username,$password);
        
  	      if($ini == "success")
			{    
		       $date = $this->user->tampiluser($username)->row_array();      
			   $this->session->set_userdata(
				[
   		         'iduser' => $date['id'],
  		          'user'=>$username,   
		     	   'level'=> $date['role']   
 	           ]);
			 redirect('user');
        }
        else if($ini == "banned")
        {
        	    $this->session->set_flashdata('gagal_login','Akun di tangguhkan, baca Rules!');

				
   	         $this->load->view('login');
			
        }
        else
        {
        	
    		    $this->session->set_flashdata('gagal_login','Username atau password salah');

   	         $this->load->view('login');
        }
        
      }
	else
        {

		  $this->load->view('login');
		}
    }
	
	
	//action daftat
	function ndaftar()
	{
  	    if($this->session->userdata('user'))
	      {
     		   redirect('user');
	      }
		
 
           $recaptcha = $this->input->post('g-recaptcha-response');
           $response = $this->recaptcha->verifyResponse($recaptcha);
           
           
		if($this->form_validation->run('register') == FALSE || !isset($response['success']) || $response['success'] <> true)
		{
			      $this->output->set_common_meta('Register','Register form, lets start','a');
			
    		$this->output->set_output_data('deskripsi','daftar');
        	$this->output->set_output_data('og','gak tau');
      
			$this->load->view('register');
          
		}
        else
       {
			$options = [
			    'cost' => 12,
			];
			
			$data = [
				'username' => strtolower($this->input->post('username')),
				'ign' => $this->input->post('ign'),
				'fullname' => $this->input->post('fullname'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options),
				'kota' => $this->input->post('kota'),
				'quotes' => $this->input->post('quotes'),
				'gender' => $this->input->post('gender'),
 		       'date' => date('Y-m-d H:i:s')
			];
        
		if($this->user->daftar($data))
		{
          
             $this->session->set_flashdata('cukses','Berhasil mendaftar! silahkan login <br/> Username: <b>'.$data['username'].'</b>');
          
			redirect('login');
		}
      
	}
}
	
	//setting
	function setting()
	{

		if(!$this->session->userdata('user'))
		{
			redirect(base_url('login'));
		}
		else
		{
			$user = $this->session->userdata('user');
			$datq['se'] = $this->user->tampiluser($user)->row_array();
		      $this->output->set_common_meta('Setting','Setting form, lets start','a');
			
    		$this->output->set_output_data('deskripsi','setting');
        	$this->output->set_output_data('og','gak tau');
      
			$this->load->view('setting',$datq);
		}
	}
  
  //post input setting
	function setting_p()
	{
		if(!$this->session->userdata('user'))
		{
			redirect(base_url('login'));
		}
		
		  $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    
			$options = [
			    'cost' => 12,
			];
			
			$id = $this->session->userdata('iduser');
			$ign = $this->input->post('sign');
			$fullname = $this->input->post('sfullname');
			$email = $this->input->post('semail');
			$kota = $this->input->post('skota');
			$bio = $this->input->post('quotes');
			$fb = $this->input->post('fb');
      
		if($this->form_validation->run('setting') != FALSE)
		{
			
      		if($this->user->sett_update($id,$fullname,$ign,$email,$kota,$bio,$fb))
			  {
    		  		redirect(base_url('user'));
    		  }
    
     	 }else{
     		$user = $this->session->userdata('user');
			 $datq['se'] = $this->user->tampiluser($user)->row_array();
		
      $this->output->set_common_meta('Setting','Setting form, lets start','a');
			
    		$this->output->set_output_data('deskripsi','setting');
        	$this->output->set_output_data('og','gak tau');
      
			$this->load->view('setting',$datq);
			
     	}
			
      }
	
	
	function ch_pw()
	{
		$rea =['success' =>false];
		$user = $this->session->userdata('user');
		$get = $this->user->tampiluser($user);
		
		foreach($get->result() as $b)
		{
			$oldpw = $b->password;
		}
		$old = $this->input->post('oldpw');
		$new = $this->input->post('newpw');
		
		if(password_verify($old,$oldpw))
		{
			if(strlen($new) <= 6)
			{
				$rea['success'] = false;
			}else{
			$this->user->change_password($user,$new);
			$rea['success'] = true;
			}
		}else{
			$rea['success'] = false;
		}
		echo json_encode($rea);
	}
	
}