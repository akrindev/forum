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

		$this->output->set_template('price');
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

function get_item_type($type)
	{
		/*
		* routes = /price/sword/red-tengu (example)
		*/
			$ini['ini'] = $this->price_model->get_item_type($type);
			$ini['type'] = $type;
	
			$this->output->set_title('Iruna online '.$type.' items price');
			$this->output->set_output_data('deskripsi','Iruna online items price');
        	$this->output->set_output_data('og','none');
			$this->load->view('price_index',$ini);
	}
	
	function ajax_edit($id)
	{
		$this->output->unset_template();
		
		$data = $this->price_model->ajax_edit($id);
		
 	echo json_encode($data);
		
	}
	
	function ajax_edit_n()
	{
		$this->output->unset_template();
		$id = $this->input->post('id');
		
		$data = [
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'stk' => $this->input->post('stk'),
			'npc' => $this->input->post('npc'),
			'latest_updated' => date('Y-m-d')
		];
		
		$yes = $this->price_model->update_item($id,$data);
		if($yes)
		{
			$qq = [
			
			'id_parent' => $id,
			'price' => $this->input->post('price'),
			'stk' => $this->input->post('stk'),
			'date' => date('Y-m-d')
			];
			
			$this->price_model->insert_item('price_history',$qq);

		echo json_encode(['status'=>true]);
	}

		
	}
}