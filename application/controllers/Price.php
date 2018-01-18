<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Price extends CI_Controller {
  
  	public $_browser = '';
  	public $_lang = 'indonesia';


	function __construct()
	{
		parent::__construct();
      
      	$this->load->helper('language');

       $lang = isset( $_SERVER['HTTP_ACCEPT_LANGUAGE']) ?? 'en';
      
      	if(substr($lang,0,2) == 'id')
        {
			$this->lang->load('msg',$this->_lang);
        }
      
      
		$this->load->helper('url');
		$this->load->model('price_model');
		$this->_init();
	}

	private function _init()
	{

		$this->output->set_template('price');
		$this->load->js('https://code.jquery.com/jquery-3.2.1.min.js');
	}
	
	
	function index()
	{ 
  $this->output->set_title('Iruna online items price');
			$this->output->set_output_data('deskripsi','Iruna online items price');
        	$this->output->set_output_data('og','none');
		$this->load->view('price_awal');
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
			'slug' => url_title($this->input->post('slug')),
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
	
	
	
	function ajax_tambah()
	{
		$this->output->unset_template();
		
		foreach($this->price_model->last_price()->result() as $oo)
  { 
  	$ohya = $oo->id;
  	$id = $ohya+1;
  
  }
		
		$data = [
			'id' => $id,
			'name' => $this->input->post('name'),
			'slug' => url_title($this->input->post('name')),
			'price' => $this->input->post('price'),
			'stk' => $this->input->post('stk'),
			'type' => $this->input->post('type'),
			'npc' => $this->input->post('npc'),
			'latest_updated' => date('Y-m-d')
		];
		
		 if($this->price_model->insert_item('price',$data))
		{
			
			
			$qq = [
				'id_parent' => $id,
				'price' => $this->input->post('price'),
				'stk' => $this->input->post('stk'),
				'date' => date('Y-m-d')
			];
			
			if($this->price_model->insert_item('price_history',$qq))
			{
				echo json_encode(['status'=>true]);
			}
		}
	}
	
	
	function hps_i($id)
	{
		$this->output->unset_template();

		$zz = $this->price_model->delete_item($id);
		
		if($zz)
		{
			echo json_encode(['status' => true]);
		}
	}
	
function cari()
	{
		/*
		* routes = /price/sword/red-tengu (example)
		*/
		$nama = $this->input->post('search');
		
			$ini['cari'] = $this->price_model->cari($nama);
			$ini['q'] = $nama;
			
			$this->output->set_title('Iruna online '.$nama.' items price');
			$this->output->set_output_data('deskripsi','Iruna online items price');
        	$this->output->set_output_data('og','none');
			$this->load->view('price_cari',$ini);
	}
	
	
	function single($slug)
	{
			$ini = $this->price_model->single($slug);
			if(!$ini)
            {
              redirect('/notfound');
            }
			foreach($ini as $u)
			{
				$data =[
					'id' => $u->id,
					'name' => $u->name,
					'type' => $u->type,
					'price' => $u->price,
					'stk' => $u->stk,
					'npc' => $u->npc,
					'latest_updated' => $u->latest_updated
				];
			}
			$data['lang'] = $this->lang->line('price');
			
			$this->output->set_title(''.$data['name'].' [Price]');
			$this->output->set_output_data('deskripsi', ''.$data['name'].' [Price]');
        	$this->output->set_output_data('og','none');
			$this->load->view('price_single',$data);
	}
  
  	function saran()
    {
      if(!$this->input->is_ajax_request())
      {
        exit('no direct script allowed!');
      }
      
      $this->output->unset_template();
      
      $data = [
      	'parent_id'	=> $this->input->post('id'),
        'price' => $this->input->post('price') ?? '-',
        'stk' => $this->input->post('stk') ?? '-',
        'username' => $this->session->user ?? 'guest',
        'date' => date('Y-m-d')
      ];
      
      $respon['status'] = true;
      
      if($this->price_model->saran($data))
      {
        $respon['status'] = true;
      }
      
      echo json_encode($respon);
    }
  
  	function kasus($id)
    {
      $this->output->unset_template();
      if($this->session->user == 'user' || !$this->session->user)
      {
        redirect('price');
      }
      
      $a = $this->price_model->getFilterSingle($id);
      
      if(!$a)
      {
        $respon['stats'] = false;
      }
      if($a->num_rows() > 0){
          foreach($a->result() as $b)
          {
            $parent = $b->parent_id;
            $harga = $b->price;
            $stk = $b->stk;
            $thl = $b->date;
          }
      }
      
      $data = [
      	'price' => $harga,
        'stk' => $stk,
        'latest_updated' => $thl
      ];
      
      $updet = $this->price_model->updatePrice($parent,$data);
      $qq = [
			'id_parent' => $parent,
			'price' => $harga,
			'stk' => $stk,
			'date' => $thl
			];
			
	  
  
        $this->price_model->insert_item('price_history',$qq);
        $respon['stats'] = true;
        $this->price_model->clear($id);
        
      redirect('price/admin');
      
    }
  
  	function admin()
    {
      if($this->session->user == 'user' || !$this->session->user)
      {
        redirect('price');
      }
      
      $this->output->set_title('Admin harga');
			$this->output->set_output_data('deskripsi', 'Admin [Price]');
      $this->output->set_output_data('og','none');
      
      
	  $this->load->view('price_admin');
	
    }
	
}