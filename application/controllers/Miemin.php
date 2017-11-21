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
		if($this->session->userdata('level') == 'user')
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
		$data["users"] = $this->miemin_model->get_last_users();
		$data["posts"] = $this->miemin_model->get_allpost("timeline");
		$this->load->view('forum/admin/dash',$data);
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

}