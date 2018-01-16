<?php

class Scam extends CI_Controller {
  
  function __construct()
  {
    parent::__construct();


require APPPATH.'third_party/cloudinary/Cloudinary.php';
    require APPPATH.'third_party/cloudinary/Uploader.php';
    require APPPATH.'third_party/cloudinary/Api.php';
   
\Cloudinary::config(array(
    "cloud_name" => "-- cloud name--",
    "api_key" => "-- api key --",
    "api_secret" => "-- api secret --"
));



    $this->load->model('scammer_model');
    $this->load->helper('language');
    if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2) == 'id')
        {
			$this->lang->load('scam','indonesia');
        } else {
          	$this->lang->load('scam','english');
        }
    
    $this->output->set_template('adminlte');
    $this->load->js('https://code.jquery.com/jquery-3.2.1.min.js');

	 $this->output->set_title('Iruna online list of scammer');
    $this->output->set_output_data('deskripsi','List of Scammers Iruna Online');
    $this->output->set_output_data('og','og:=https://rokoko-iruna.com/a-iruna-scam.png=:og');
  }
  
  public function index() {
   
    $this->load->css('lte/plugins/datatables/dataTables.bootstrap.css');
    $this->load->css('lte/plugins/datatables/jquery.dataTables.min.css');
    
	$this->load->js('https://code.jquery.com/jquery-3.2.1.min.js');
    
    $this->load->js('lte/plugins/datatables/dataTables.bootstrap.min.js');
    $this->load->js('lte/plugins/datatables/jquery.dataTables.min.js');
    
    $this->load->library('csvimport');
    $file_path = 's.csv';
   
    if ($this->csvimport->get_array($file_path)) 
    {
      $data['csv'] = $this->csvimport->get_array($file_path);
    }
    
    
 	   $this->config->load('pagination',TRUE);
 	   $configg = $this->config->item('pagination');
    
       $configg["base_url"] = base_url() . "scam/index";
       $total_row = $this->db->count_all('scammers');
       $configg["total_rows"] = $total_row;

        
       $this->pagination->initialize($configg);
    
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
     
       $data["page"] = $this->scammer_model->fetch_data($configg["per_page"],$page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links);
    
    $this->load->view('scammer',$data);
  }
  
  	function create()
    {
      
      if($this->form_validation->run('scam') === FALSE)
      {
    		$this->load->view('scammer_add');
      } else  {
        
        $this->output->unset_template();
        
        if(isset($_FILES)){
        	$o = $this->doo();
        }
        
        $sl = url_title(substr($this->input->post('kasus'),0,20).'-'.substr(sha1(date('Y-m-d H:i:s')),0,7));
        $data = [
        	'user_id' => $this->session->iduser,
          	'kasus' => $this->input->post('kasus'),
          	's_ign' => $this->input->post('ign'),
          	's_fb' => $this->input->post('fb'),
          	'kronologi' => $this->input->post('kronologi'),
          	'pics' => $o['secure_url'] ?? '-',
            'date' => date('Y-m-d H:i:s'),
          	'slug' => $sl
        ];
        
        if($this->scammer_model->insert('scammers',$data))
        {
          redirect('scam/read/'.$sl);
        }
        
      }
      
    }
  
  function edit()
  {
    $slug = $this->uri->segment(3);
    
    $data['edit'] = $this->scammer_model->single($slug);
    
    if(!$slug || !$this->session->user || !$data)
    {
      redirect('notfound');
    }
    
    foreach($data['edit'] as $d)
    {
      $ids = $d->ids;
      $sl = $d->slug;
    }
    
    $this->output->set_title('Edit data');
    
    if($this->form_validation->run('s_edit') === FALSE)
    {
    	$this->load->view('scammer_edit',$data);
    } else {
      
      $dt = [
      	 'kasus' => $this->input->post('kasus'),
         's_ign' => $this->input->post('ign'),
         's_fb' => $this->input->post('fb'),
         'kronologi' => $this->input->post('kronologi')
      ];
      
      
      if($this->scammer_model->updateData($ids,$dt))
      {
        redirect('scam/read/'.$sl);
      }
      
    }
    
  }
  
  	function read()
    {
      $slug = $this->uri->segment(3);
      
      
      $data['scam'] = $this->scammer_model->single($slug);
      
      if(!$slug || $data['scam'] === false) redirect('notfound');
      
      foreach($data['scam'] as $j)
      {
        $judul = $j->kasus;
			$pic = $j->pics;
      }
      
      $this->output->set_title($judul);
       $this->output->set_output_data('og','og:='.$pic.'=:og');
      $this->load->view('scammer_single',$data);
    }
  
  
  	function delete()
    {
      $this->output->unset_template();
      
      $type = $this->uri->segment(3);
      $id = $this->uri->segment(4);
      
      if(!$this->input->is_ajax_request()
        || !$this->session->user)
      {
        exit('Access denied');
      }
      
      
      if($type == 'post')
      {
        $table = 'scammers';
        $s = $this->db->where('ids',$id)->get($table);
        foreach($s->result() as $u)
        {
          $identify = $u->user_id;
        }
        
        if($identify != $this->session->iduser)
        {
        	if($this->session->level != 'admin')
        	{
          	exit('access denied');
          }
        }
        
      } else {
        $table = 'scammers_pics';
        $s = $this->db->where('id',$id)->get($table);
        foreach($s->result() as $u)
        {
          $ident = $u->parent_id;
        }
        
        foreach($this->db->where('ids',$ident)->get('scammers')->result() as $t)
        {
          $idnt = $t->user_id;
        }
        
        if($idnt != $this->session->iduser)
        {
          exit('access denied');
        }
      }
      
      
      
        $data['status'] = false;
      
      if($this->scammer_model->update($table,$id,['status'=>0]))
      {
        $data['status'] = true;
      } 
      
      echo json_encode($data);
    }
  
  
  
  function pics()
  {
    $slug = $this->uri->segment(3);
    
    $data = $this->scammer_model->single($slug);
    
    if(!$slug || !$this->session->user || !$data)
    {
      exit('Access denied');
    }
    
    foreach($data as $d)
    {
      $key = $d->ids;
      $keys = $d->user_id;
      $sl = $d->slug;
    }
    
    if($this->session->iduser != $keys)
    {
      exit('Access denied');
    }
    
    if(isset($_FILES))
    {
      $o = $this->doo();
    }
    
    $dt = [
    	'parent_id' => $key,
      	'pics' => $o['secure_url'] ?? '-',
      	'date' => date('Y-m-d H:i:s')
    ];
    
    if($this->scammer_model->insert('scammers_pics',$dt))
    {
      redirect('scam/read/'.$sl);
    } else {
      redirect('notfound');
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