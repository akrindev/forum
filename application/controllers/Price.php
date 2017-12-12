<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Price extends CI_Controller {


	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('price_model');
		$this->_init();
	}

	private function _init()
	{

		$this->output->set_template('adminlte');
		$this->load->js('https://code.jquery.com/jquery-3.2.1.min.js');
	}
	
	
	
	function get_item($type,$slug)
	{
		/*
		* routes = /price/sword/red-tengu (example)
		*/
			$ini = $this->price_model->get_item($type,$slug);

	
			if($ini->num_rows() > 0)
			{
			foreach($ini->result() as $uni)
			{
				$data = [
					'type' => $uni->type,
					'name' => $uni->name,
					'price' => $uni->price,
					'stk' => $uni->stk,
					'npc' => $uni->npc,
					'date' => $uni->latest_updated
				];
			}
			}
			$this->output->set_title('Iruna online items price');
			$this->output->set_output_data('deskripsi','Iruna online items price');
        	$this->output->set_output_data('og','none');
			$this->load->view('price_index',$data);
	}


}