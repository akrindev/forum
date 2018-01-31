<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guild extends CI_Controller {
  
  
  
  function __construct(){
    
    parent::__construct();
    
    $this->load->model('guild_model','guild');
    
    
	require APPPATH.'third_party/cloudinary/Cloudinary.php';
    require APPPATH.'third_party/cloudinary/Uploader.php';
    require APPPATH.'third_party/cloudinary/Api.php';
   
	\Cloudinary::config([
        "cloud_name" => "-- cloud name--",
        "api_key" => "-- api key --",
        "api_secret" => "-- api secret --"
	]);
    
    $this->load->helper('language');
    
    /**
    * mendapatkan informasi bahasa browser
    * jika bahasa indonesia maka bahasa yg
    * di tampilkan adalah bahasa indonesia
    * jika tidak bahasa = english
    */
    $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'en';
      
    if(substr($lang,0,2) == 'id')
    {
		$this->lang->load('msg','indonesia');
    }
    $this->_init();
  }
  
	private function _init()
	{

		$this->output->set_template('adminlte');
		$this->load->js('https://code.jquery.com/jquery-3.2.1.min.js');
      
      
  		$this->output->set_title('Iruna Online Guilds');
		$this->output->set_output_data('deskripsi','Iruna Online Guild, the way you connect with each other. Your guild is your family');
        $this->output->set_output_data('og','none');
	}
  
  	function index()
    {
 	   $this->config->load('pagination',TRUE);
 	   $configg = $this->config->item('pagination');
    
       $configg["base_url"] = base_url() . "guild/index";
       $total_row = $this->db->count_all('guilds');
       $configg["total_rows"] = $total_row;

        
       $this->pagination->initialize($configg);
    
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
     
       $data["page"] = $this->guild->fetch_data($configg["per_page"],$page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links);
    
    	$this->load->view('guild_index',$data);
    }
  
  	public function i()
    {
      $slug = $this->uri->segment(3);
      
      if(!$slug) return redirect('guild');
      
      $q = $this->guild->getGuild($slug)->result();
      $data = [];
      if(count($q) > 0)
      {
        foreach($q as $r)
        {
          $data = [
            'identify' => $r->id,
          	'logo' => $r->logo,
            'name' => $r->name,
            'level' => $r->level,
            'members' => $r->members,
            'slogan' => $r->slogan,
            'rules' => $r->rules,
            'slug'  => $r->slug,
          	'gm'	=> $r->username,
            'ign'	=> $r->ign
          ];
 
          
        }
      } else {
        $this->output->unset_template();
       
       return redirect('notfound');
      }
      
      $this->load->view('guild_single',$data);
    }
   
  	public function action()
    {
      if(!$this->session->user)
      {
        $this->session->set_flashdata('gagal_login','You are not login');
        return redirect('login');
      }
      
      $request = $this->input->get('request');
    
      if($request == 'join')
      {
        $this->db->insert('guild_members',[
        	'user_id' => $this->session->iduser,
          	'guild_id' => $this->input->get('gid'),
            'status' => 1
        ]);
        
        return redirect('guild/i/'. $this->input->get('url'));
      } else {
        $this->db->insert('guild_members',[
        	'user_id' => $this->session->iduser,
          	'guild_id' => $this->input->get('gid'),
            'status' => 0
        ]);
      }
      
        return redirect('guild/i/'. $this->input->get('url'));
    }
  
  	public function create()
    {
      
      if($this->form_validation->run('guild') === FALSE)
      {
    		$this->load->view('guild_add');
      } else  {
        
        $this->output->unset_template();
        
        if(isset($_FILES)){
        	$o = 'hehe'; //$this->doo();
        }
        
        $sl = url_title(substr(convert_accented_characters($this->input->post('name')),0,20).'-'.substr(sha1(date('Y-m-d H:i:s')),0,7));
        $data = [
        	'user_id' => $this->session->iduser,
          	'name' => $this->input->post('name'),
          	'level' => $this->input->post('level'),
          	'members' => $this->input->post('members'),
          	'slogan' => $this->input->post('slogan'),
          	'logo' => $o['secure_url'] ?? '-',
          	'rules' => $this->input->post('rulez'),
            'created_at' => date('Y-m-d H:i:s'),
          	'slug' => $sl
        ];
        
        if($this->guild->insert('guilds',$data))
        {
          echo "sukses";
        }
        
      }
      
    }
  
  	private function doo()
    {
      $this->load->library('image_lib');
        
        $config['upload_path'] = './uploads/';
    	$config['allowed_types'] = 'gif|jpg|png|jpeg';
    	$config['max_size'] = 1000;
    	$config['max_width'] = 1024;
    	$config['max_height'] = 768;
    
    	$this->load->library('upload', $config);
    
    	if($this->upload->do_upload('file'))
    	{
      		$src = $this->upload->data();
    
            $config['source_image'] = $src['full_path'];
            $config['wm_text'] = '(c) rokoko-iruna.com';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_hor_alignment'] = 'L';
            $config['wm_shadow_color'] = '#000000';
            $config['wm_shadow_distance'] = 3;
          

      		$this->image_lib->initialize($config);

      		if($this->image_lib
               		->watermark()):
      			$data = \Cloudinary\Uploader::upload($src['full_path']);
      		endif;
      		unlink($src['full_path']);
          
          return $data;
        }
    
    }
  
}