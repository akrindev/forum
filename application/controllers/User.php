<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
 {
	
	function __construct()
	{
		parent::__construct();
	}
	
  
	function index()
	{
		    $header['judul'] = "Dashboard";
    $header["isi"] = "Dashboard user";
		if(!$this->session->userdata('user')){
		redirect(site_url('login'));
		}else
		{
    $user = $this->session->userdata('user');


 $hh = $this->user->tampiluser($user);
    $data['nyun'] = $hh->row_array();
    

$this->load->view('forum/header',$header);
    $this->load->view('forum/dashboard',$data);
    
		}
	}
  
  
	function register()
	{
    $header['judul'] = "Register";
    $header["isi"] = "Form registreasi";
    
$this->load->view('forum/header',$header);
		$this->load->view('forum/register');
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
  public function dashboard()
  {
    if($this->session->userdata('user') == '')
    {
      redirect(base_url());
    }
    $user = $this->session->userdata('user');
	$uid = $this->session->userdata('iduser');
	
    $header['judul'] = "Dashboard";
    $header["isi"] = "Dashboard user";
    
 $hh = $this->user->tampiluser($user);
    $ava = $hh->row_array();
    $email = $ava['email'];
    $data['nyun'] = $hh->row_array();
    //$data['nyun'] .= array('avatar' => $this->gravatar->get($email))
   

    $this->load->view('forum/header',$header);
    $this->load->view('forum/dashboard',$data);
    
  }
  
  
	public function login()
	{
		if($this->session->userdata('user'))
		{
			redirect(base_url('user'));
		}
		    $header['judul'] = "Login";
    $header["isi"] = "Form login";
         $this->form_validation->set_rules('username','Username','required|alpha_numeric|trim');
         $this->form_validation->set_rules('password','Password','required');
      
		$username = $this->input->post('username');
		$password = $this->input->post('password');
      
      if($this->form_validation->run() != FALSE)
      {
        
        $ini = $this->user->ceklogin($username,$password);
        
        if($ini != "fail"){          
          $date = $ini->row_array();
		  $user = $this->session->set_userdata(
			array(
            'iduser' => $date['id'],
            'user'=>$username,   
     	   'level'=> $date['role']   
                                ));
			$this->session->set_flashdata('sukses','sukses login');
		 redirect('user');
        }//if ada data
        else
        {
          $this->session->set_flashdata('gagal_login','Username atau password salah');

$this->load->view('forum/header',$header);
          $this->load->view('forum/login');
        }
      }
		else
        {

$this->load->view('forum/header',$header);
		  $this->load->view('forum/login');
		}
    }
	
	
	
	//action daftat
	function ndaftar()
	{
		    $header['judul'] = "Register";
    $header["isi"] = "Form registreasi";
    
    
		$this->form_validation->set_rules('username','Username','required|min_length[4]|max_length[8]|trim|alpha_numeric|is_unique[users.username]',array('is_unique'=>'Username sudah digunakan'));
$this->form_validation->set_rules('ign','IGN','required|max_length[8]|trim|is_unique[users.ign]',array('is_unique'=>'IGN sudah digunakan'));

		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]',array('is_unique'=>'email sudah digunakan'));
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('re-password','Ulangi Password','required|matches[password]');
		$this->form_validation->set_rules('quotes','Quotes','min_length[5]');
      	$this->form_validation->set_rules('kota','Kota','required|min_length[5]');
      	$this->form_validation->set_rules('fullname','Fullname','required|min_length[5]');
      $this->form_validation->set_rules('gender','Gender','required');
    
  $this->form_validation->set_error_delimiters('<div class="error-msg">', '</div>');
      
		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('forum/header',$header);
			$this->load->view('forum/register');
			
          
		}//jika gagal
		
      else
      //jika benar
      {
		$options = [
    'cost' => 12,
];
		
		$username = strtolower($this->input->post('username'));
		$ign = $this->input->post('ign');
		$fullname = $this->input->post('fullname');
		$email = $this->input->post('email');
		$password = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
		$kota = $this->input->post('kota');
		$bio = $this->input->post('quotes');
		$gender = $this->input->post('gender');
		//$tgal = date(Y-m-d h:i:s);
        //masukkan ke db
		if($this->user->daftar($username,$fullname,$ign,$email,$gender,$password,$kota,$bio))
		{
          
             $this->session->set_flashdata('cukses','Berhasil mendaftar! silahkan login <br/> Username: <b>'.$username.'</b>');
          
       
			redirect('login');
		}
      
	}
	}
	
	//setting
	function setting()
	{
		    $header['judul'] = "Setting";
    $header["isi"] = "Setting";
    
		if(!$this->session->userdata('user'))
		{
			redirect(base_url('login'));
		}
		else
		{
			$user = $this->session->userdata('user');
			$datq['se'] = $this->user->tampiluser($user)->row_array();
		
			$this->load->view('forum/header',$header);
			$this->load->view('forum/setting',$datq);
		}
	}
	function setting_p()
	{
		if(!$this->session->userdata('user'))
		{
			redirect(base_url('login'));
		}
		
		
		
		    $header['judul'] = "Setting";
    $header["isi"] = "Setting";
    
		
		$options = [
    'cost' => 12,
];
		$id = $this->session->userdata('iduser');
		$ign = $this->input->post('ign');
		$fullname = $this->input->post('fullname');
		$email = $this->input->post('email');
		$kota = $this->input->post('kota');
		$bio = $this->input->post('quotes');
		$fb = $this->input->post('fb');
		
		if($this->user->sett_update($id,$fullname,$ign,$email,$kota,$bio,$fb))
		{
			redirect(base_url('user'));
		return true;
		}
		
		return false;
	}
	
}