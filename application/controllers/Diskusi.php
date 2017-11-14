<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diskusi extends CI_Controller
 {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
	}
  
  
  public function index()
  {
    
redirect(base_url());
      
  }
  
  public function timeline($slug = '')
  {
  	    $header['judul'] = "Timeline";
    $header["isi"] = "timeline";
 // $data = new stdClass();
    if($slug == '')
    {
    $y = $this->forum->get_allpost('timeline');
    
    $x['timeline'] = $y->result();
    
	$this->load->view('forum/header',$header);
    $this->load->view('forum/threadpost',$x);
    }
    
    $o = $this->forum->getone('timeline',$slug);
    $c = $o->num_rows();
    $x = $o->result();
 
  

    if($c > 0)
    {
      foreach($x as $d){
      	
    		$data['id'] = $d->tlid;
    		$idtl = $d->tlid;
    		$data['judul'] = $d->judul;
    		$data['slug'] = $d->slug;
    		$data['isi'] = $this->bbcode->bbcode_to_html($d->isi);
    		$data['username'] = $d->username;
    		$data['email']      = $d->email;
    		$data['date'] = $d->date;
    		$dil =  $d->dilihat+1;
    		$data['tags'] = explode(",",$d->tags);
          $this->db->where('slug',$data['slug']);
          $this->db->update('timeline',array(	'dilihat' => $dil));
    
      }
      
	
      
      $data['dilihat'] = $dil;
      $coco = $this->forum->get_comment_count($idtl)->result();
      foreach($coco as $coc)
      {
      $data['coco'] = $coc->c;
      }
    //  $data['dilihat'] = $dilihat;
         $k = $this->forum->get_comment($idtl);
	$t = $k->num_rows();
	$data['k'] = $v = $k->result();
      if($t > 0)
      {
      	foreach($v as $r)
      	{
      	
      		$data['kusername'] = $r->username;
      		$data['kisi'] = $r->isi;
      		$data['kdate'] = $r->date;
      	}
      }
		if($t == 0){
			
      	
	$this->session->set_flashdata('nokomen','jadilah komentator pertama!!');

      	}

	$this->load->view('forum/header' ,$data);
    $this->load->view('forum/threadpost',$data);
    }
  }
  
  
  public function c($id)
  {
  	$k = $this->forum->get_comment($id);
  //	$t = $k->num_rows();
  	$v['komen'] = $k->result();
  
  
  
  	$this->load->view('forum/kom',$v);
  }
  
  public function kom($id){
    $comment = $this->forum->get_comment($id);
    $ce = $comment->num_rows();
    $cmn = $comment->result();
    
    if($ce > 0)
    {
 $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($cmn, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))
      ->_display();
      exit;
    }
   }
    
   
    
  public function tulis()
  {
    
    if($this->session->userdata('user')  == '')
    {
    	redirect(site_url('login'));
    }
    
    $header['judul'] = "Tulis";
    $header["isi"] = "tulis post timeline sesuai dengan standar";
    
    $this->form_validation->set_rules('judul','Judul','required|min_length[5]|is_unique[timeline.judul]',array('is_unique' => 'Thread ini sudah ada'));
    $this->form_validation->set_rules('isi','isi post','required|min_length[15]');
    
    if($this->form_validation->run() != FALSE)
    {
      $u = $this->session->userdata('iduser');
      $t = strtolower(url_title($this->input->post('judul')));
      $data = array(
        'id_user' => $u,
        'judul' => $this->input->post('judul'),
        'slug' => $t, 
        'tags' => $this->input->post('tags'),
        'isi' => $this->input->post('isi'),
        'date' => date('Y-m-d H:i:s')
      );
     
      $this->session->set_flashdata('post_terbit','Thread berhasil di terbitkan!! :)');
      
      if($this->forum->post_data('timeline',$data)){ 
        redirect(base_url().'forum/tl/'.$t);
      }
    }
    else
    {

		$this->load->view('forum/header',$header);
        $this->load->view('forum/forum');
    }
    
    
  }
    public function tulis_img()
  {
    
    if($this->session->userdata('user')  == '')
    {
    	redirect(site_url('login'));
    }
    
    $header['judul'] = "Image";
    $header["isi"] = "Image fansart iruna post timeline sesuai dengan standar";
    
    $this->form_validation->set_rules('url','Url gambar','required|min_length[5]|valid_url|is_unique[image.url]',array('is_unique' => 'Image ini sudah ada'));
    $this->form_validation->set_rules('isi','isi post','required|min_length[5]');
    $this->form_validation->set_error_delimiters('<div class="error-msg">', '</div>');
    if($this->form_validation->run() != FALSE)
    {
      $u = $this->session->userdata('iduser');

      $data = array(
        'id_user' => $u,
        'url' => $this->input->post('url'),
        'isi' => $this->input->post('isi'),
        'date' => date('Y-m-d H:i:s')
      );
    
      
      if($this->forum->post_data('image',$data)){ 
        redirect(base_url().'image');
      }
    }
    else
    {
        $data['judul'] = 'ID';
        $data['isi'] = 'Fansart iruna, Meme iruna, Iruna online forum, tutorial iruna, Production iruna';
        
        $data["image"] = $this->forum->fetch_data_image(999, 0);
		$this->load->view('forum/header',$header);
        $this->load->view('forum/img',$data);
    }
    
    
  }
  
  
  public function komentar($slug)
  {
  	$respon = array('success' => false, 'msg' => array());
 
     $this->form_validation->set_rules('isi','isi komentar','min_length[5]|required');
     $this->form_validation->set_error_delimiters('<div class="error-msg">', '</div>');
    $iduser = $this->session->userdata('iduser');
    $url = $slug;
    $data = array(
      
      'id_user' 	=> $iduser,
      'id_timeline' => $this->input->post('idtl'),
      'isi'			=> $this->input->post('isi'),
      'date'		=> date('Y-m-d H:i:s')
    );
    
    if($this->form_validation->run() != FALSE){
		$respon['success'] = true;
    	$this->forum->post_komentar($data);
	}
	else {
			foreach ($_POST as $key => $value) {
				$respon['msg'][$key] = form_error($key);
			}
		}

		 $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($respon, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))
      ->_display();
      exit;
}
	
 
 
  
  
  
  //pagination image
  
     public function image(){
  
        $data['judul'] = 'ID';
        $data['isi'] = 'Fansart iruna, Meme iruna, Iruna online forum, tutorial iruna, Production iruna';
        
        $data["image"] = $this->forum->fetch_data_image(999, 0);

        
        // View data according to array.
     $this->load->view('forum/header', $data);
    $this->load->view('forum/img',$data);
        //$this->load->view("pagination_view", $data);
        }
  
    
     public function page(){
        $config = array();
        $config["base_url"] = base_url() . "diskusi/page";
        $total_row = $this->forum->record_count();
        
        $config["total_rows"] = $total_row;
        $config["per_page"] = 10;
        $config['use_page_numbers'] = false;
        $config['num_links'] =1;
        
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
         $config["first_tag_open"] = '<li class="pagination-list">';
  $config["first_tag_close"] = '</li>';
  $config["last_tag_open"] = '<li class="pagination-list">';
  $config["last_tag_close"] = '</li>';
  $config['next_link'] = '&gt;';
  $config["next_tag_open"] = '<li class="pagination-list">';
  $config["next_tag_close"] = '</li>';
  $config["prev_link"] = "&lt;";
  $config["prev_tag_open"] = '<li class="pagination-list">';
  $config["prev_tag_close"] = "</li>";
  $config["cur_tag_open"] = "<li class='pagination-list active'><a href='#'>";
  $config["cur_tag_close"] = "</a></li>";
  $config["num_tag_open"] = "<li class='pagination-list'>";
  $config["num_tag_close"] = "</li>";
        
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['judul'] = 'ID';
        $data['isi'] = 'Iruna online forum, tutorial iruna, Production iruna';
        
        $data["timeline"] = $this->forum->fetch_data($config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );
        
        // View data according to array.
     $this->load->view('forum/header', $data);
    $this->load->view('forum/forumd',$data);
        //$this->load->view("pagination_view", $data);
        }
  
  
  
  //hapus
  function erase($id)
  {
  	if(!$this->session->userdata('user'))
  	{
  		redirect(base_url());
  	}else{
  	$user = $this->session->userdata('iduser');

  	if($this->forum->cocok($user,$id)->num_rows() > 0){
  
  		if($this->forum->delpost($id))
  		{
  			redirect(base_url('user'));
  		}else{
  			redirect(base_url());
  		}
  	}else{
  		echo "<script>alert('tidak punya akses')</script>";
  	}
  }
  }
  
    function edit_post($id)
  {
  		$header['judul'] = "edit";
  		$header['isi'] = "edit data";
  
  
  	if(!$this->session->userdata('user'))
  	{
  		redirect(base_url());
  	}else{
  	$user = $this->session->userdata('iduser');
	  $cocok = $this->forum->cocok($user,$id);
  	if($cocok->num_rows() > 0){
  			foreach($cocok->result() as $ya)
  			{
  					$data = [ 'id' 		=> $ya->id,
									 'judul' => $ya->judul,
  									'slug' 	=> $ya->slug,
  									'isi'		=> $ya->isi,
  									'tag'		=> $ya->tags ];
  			}
  			
  			$this->load->view('forum/header',$header);
  			$this->load->view('forum/edpost',$data);
  
  	}else{
  		echo "<script>alert('tidak punya akses')</script>";
  	}
  }
  }
  
  function retulis($id)
  {
  		$header['judul'] = "edit";
  		$header['isi'] = "edit data";
  
  
  	if(!$this->session->userdata('user'))
  	{
  		redirect(base_url());
  	}else{
  	$user = $this->session->userdata('iduser');
	  $cocok = $this->forum->cocok($user,$id);
	  $dan = $cocok->row_array();
  	if($cocok->num_rows() > 0){
    
 	   $this->form_validation->set_rules('edjudul','Judul','required|min_length[5]');
    $this->form_validation->set_rules('edisi','isi post','required|min_length[15]');
    
    if($this->form_validation->run() != FALSE)
    {
      
      $data = array(
        'judul' => $this->input->post('edjudul'),
        'tags' => $this->input->post('tags'),
        'isi' => $this->input->post('edisi'),
      );
     
      $this->session->set_flashdata('post_ubah','Thread berhasil diubah!! :)');
      
      if($this->forum->update_post($dan['id'],$data)){ 
        redirect(base_url().'forum/tl/'.$dan['slug']);
      }
    }
    else
    {

		foreach($cocok->result() as $ya)
  			{
  					$data = [ 'id' 		=> $ya->id,
									 'judul' => $ya->judul,
  									'slug' 	=> $ya->slug,
  									'isi'		=> $ya->isi,
  									'tag'		=> $ya->tags ];
  			}
  			
  			$this->load->view('forum/header',$header);
  			$this->load->view('forum/edpost',$data);
    }
    
  
  	}else{
  		echo "<script>alert('tidak punya akses')</script>";
  	}
  }
  }
  
  
}