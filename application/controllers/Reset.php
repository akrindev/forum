<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
   
 class Reset extends CI_Controller {  
   public function __construct()
	{
		parent::__construct();
		
		$this->_init();
	}
	
	
	private function _init()
	{
		$this->load->model('reset_model');
		
		$this->load->model('miemin_model');
		$this->output->set_template('default');

		$this->load->js('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js');
		$this->load->js('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js');
		$this->load->css('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css');
		$this->load->css('assets/css/styles.css');
	}
   
     public function index()  
     {  
         
         $this->form_validation->set_rules('email', 'Email', 'required|valid_email');   
         
         if($this->form_validation->run() == FALSE) {  
         
             $this->load->view('forum/rset');  
         }else{  
             $email = $this->input->post('email');   
             $clean = $this->security->xss_clean($email);  
             $userInfo = $this->reset_model->getUserEmail($clean);  
               
             if(!$userInfo){  
               $this->session->set_flashdata('gagal', 'email tidak ditemukan.');  
               $this->load->view('forum/rset');
             }    else {
                                $this->session->set_flashdata('sukses', 'Verifikasi password telah di kirim ke email anda');  

             $token = $this->reset_model->insertToken($userInfo->id);              
             $url = base_url('/klalen/x/token/' . $token);  
             $link = '<a href="' . $url . '">' . $url . '</a>';   
             
             $message = "
             <html>
             	<body>
             		<h1>Password reset token</h1>
             	<p>
             		Anda baru saja mengirim permintaan reset password, silahkan ikuti address di bawah:<br/><br/>
   		          $link<br/><br/>
   abaikan pesan ini jika anda merasa tidak melakukan reset password.
             	<p>
             	</body>
             </html>";
             
             
             $this->load->library('email');
             
             $config= array(
             	'protocol' => 'smtp',
             	'smtp_host' => '--- HOST ---',
             	'smtp_user' => '-- USER@USER.COM--',
             	'smtp_pass' => '--PASS--',
             	'smtp_port' => 25,
             	'mailtype'   => 'html',
             	'charset'	  => 'UTF-8'
             );
     
		   $this->email->initialize($config);
		   $this->email->from('admin@rokoko-iruna.com', 'Admin Tamvan Memvesona');
		   $this->email->to($email);
		
		   $this->email->subject('Password reset rokoko-iruna.com');
		   $this->email->message($message);

		   $this->email->send();
		
		
           $this->load->view('forum/rset');
         }  
       }  
     }  
   
     public function reset_password($tkn)  
     {  
     	
       $token = $tkn;
       $cleanToken = $this->security->xss_clean($token);  
         
       $user_info = $this->reset_model->isTokenValid($cleanToken); //either false or array();          
         

   

         
       $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');  
       $this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|matches[password]');         
         
       if ($this->form_validation->run() == FALSE) {    
       	       if(!$user_info){  
         $this->output->unset_template();
         echo "
<script>for(i = 0; i <=5;i++){ alert('token tidak valid') }</script>
";
       }    else {
         $this->load->view('forum/chgpwd');  
         }
       }else{  
             	$options = [
				    'cost' => 12,
				];                
         $newpw = $this->input->post('password');          
         $zeeb = $this->security->xss_clean($newpw);          
         $enc = password_hash( $zeeb, PASSWORD_BCRYPT, $options);          
 
         if(!$this->reset_model->updatePassword($user_info->id,$enc)){  
           $this->session->set_flashdata('cukses', 'Update password gagal.');  
         }else{  
         	$this->reset_model->gantih($user_info->id);
           $this->session->set_flashdata('cukses', 'Password anda
             diperbaharui. Silakan login.');  
         }  
         	$this->load->view('forum/login');
       }  
     }  
       function pinned_v()
  {
  	$this->config->load('pagination',TRUE);
 	   $configg = $this->config->item('pagination');
        $configg["base_url"] = base_url() . "this/pinned";
        $total_row = $this->miemin_model->count_pinned();
        
        $configg["total_rows"] = $total_row;
 
        $this->pagination->initialize($configg);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['judul'] = 'ID';
        $data['isi'] = 'Iruna online forum, tutorial iruna, Production iruna';
        
        $data["pinned"] = $this->miemin_model->pinned_fetch($configg["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );
        
        $this->load->view('forum/pinned',$data);
        
  }
  
       function not_found()
	{
		$this->load->view('forum/404');
	}
	
	function bbcode()
	{
		$this->load->view('forum/bbcode');
	}
function intro()
	{
		$this->load->view('forum/intro');
	}
function privacy()
	{
		$this->load->view('forum/privacy');
	}
function rules()
	{
		$this->load->view('forum/rules');
	}

 }