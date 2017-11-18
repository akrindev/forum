<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

class Miemin extends CI_Controller
 {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('role') === 'user')
		{
			redirect(base_url('dashboard'));
		}
		$this->_init();
	}
	
	
	private function _init()
	{
		
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
		
		$this->load->view('forum/admin/dash',$data);
	}
	
}