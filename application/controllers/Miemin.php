<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

class Miemin extends CI_Controller
 {

	public function __construct()
	{
		parent::__construct();
		
		$this->_init();
	}
	
	
	private function _init()
	{
		if($this->session->userdata('level') == 'user' || !$this->session->userdata('user'))
		{
			redirect(base_url('dashboard'));
		}
		$this->load->model('miemin_model');
		
		$this->output->set_template('default');

		$this->load->js('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js');
		$this->load->js('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js');
		$this->load->css('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css');
		$this->load->css('assets/css/styles.css');
	}
	
	function index()
	{
		$this->load->js('https://unpkg.com/vue');
		$this->load->js('https://unpkg.com/axios/dist/axios.min.js');
		$this->load->js('https://unpkg.com/lodash');
		$data["users"] = $this->miemin_model->get_last_users();
		$data["posts"] = $this->miemin_model->get_allpost("timeline");
		$this->load->view('forum/admin/dash',$data);
	}
	function user_get($n)
	{
		
		$this->output->unset_template();
		$ha = $this->miemin_model->get_user_n($n);
		if($ha->num_rows() > 0)
		{
			foreach($ha->result() as $row)
			{
				$data['username'] = $row->username;
				$data['email'] = $row->email;
			}
		}else{
			   $data['error'] = "gak ditemukan";
		}
		$this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
exit;
	}
	function banned($param,$id)
	{
		$data = [
			'banned' => $param
			];
			
			if($this->miemin_model->banned_user($id,$data))
			{
				redirect(base_url('miemin'));
				echo "<script>alert('sukses')</script>";
			}
		
	}
	
	function banned_post($param,$id)
	{
		$data = [
			'banned' => $param
			];
			
			if($this->miemin_model->banned_post($id,$data))
			{
				redirect(base_url('miemin'));
				echo "<script>alert('sukses')</script>";
			}
		
	}
	
	
	function delpost($id)
	{
		if($this->miemin_model->delpost($id))
			{
				redirect(base_url('miemin'));
				echo "<script>alert('sukses')</script>";
			}else{
				echo "<script>alert('gagal, mungkin tidak ada')</script>";
			}
	}
	
	function not_found()
	{
		$this->load->view('forum/404');
	}
	
	function bbcode()
	{
		$this->load->view('forum/bbcode');
	}
	
	
  function usercari()
  {
  	$kata = $this->input->post('user-cari');
  	$data['cari'] = $this->miemin_model->cari($kata);

  	$data['carikata'] = $kata;
  
  	$this->load->view('forum/admin/cari',$data);
  	
  }
  function carip()
  {
  	$kata = $this->input->post('post-cari');
  	$data['cari'] = $this->forum->cari($kata);

  	$data['carikata'] = $kata;
  
  	$this->load->view('forum/admin/carip',$data);
  	
  }
  
     public function allusers(){
        $this->config->load('pagination',TRUE);
 	   $configg = $this->config->item('pagination');
        $configg["base_url"] = base_url() . "miemin/allusers";
        $total_row = $this->miemin_model->count_users();
        
        $configg["total_rows"] = $total_row;
 
        $this->pagination->initialize($configg);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['judul'] = 'ID';
        $data['isi'] = 'Iruna online forum, tutorial iruna, Production iruna';
        
        $data["users"] = $this->miemin_model->fetch_users($configg["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );
        
        // View data according to array.
    $this->load->view('forum/admin/allusers',$data);
        //$this->load->view("pagination_view", $data);
        }
  
	     public function allposts(){
        $this->config->load('pagination',TRUE);
 	   $configg = $this->config->item('pagination');
        $configg["base_url"] = base_url() . "miemin/allusers";
        $total_row = $this->forum->record_count();
        
        $configg["total_rows"] = $total_row;
 
        $this->pagination->initialize($configg);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['judul'] = 'ID';
        $data['isi'] = 'Iruna online forum, tutorial iruna, Production iruna';
        
        $data["posts"] = $this->miemin_model->fetch_posts($configg["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );
        
        // View data according to array.
    $this->load->view('forum/admin/allposts',$data);
        //$this->load->view("pagination_view", $data);
        }
  
   

}