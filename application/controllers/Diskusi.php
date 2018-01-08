<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Diskusi extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('adminlte');
		$this->load->js('https://code.jquery.com/jquery-3.2.1.min.js');
	}

	public function index()
	{
		redirect('/forum');
	}

	public function timeline($slug)
	{
		    $o = $this->forum->getone('timeline',$slug);
 		   $c = $o->num_rows();
		    $x = $o->result();
		
			if($c > 0)
		    {
     			foreach($x as $d)
				 {
    					$idtl = $d->tlid;
    					$katego =  $d->slug;
    					$taggs = $d->tags;
    					$this->db->where('slug',$d->slug);
      				  $this->db->update('timeline',['dilihat' => $d->dilihat+1]);
 
    					$data = [
    							'id' 		=>	$d->tlid,
    							'judul'   =>	$d->judul,
    							'slug'     =>	$d->slug,
    							'isi'		 =>	$this->bbcode->bbcode_to_html($d->isi),
    							'username'	=> $d->username,
    							'email'	 =>	$d->email,
    							'date'		=>	$d->date,
    							'banned'  =>	$d->banned,
    							'pinned'   =>	$d->pinned,
    							'dilihat'	=>	$d->dilihat,
   							 'tags'		=>	explode(",",$d->tags)
   						];
   
          		
 			    }	//end foreach
 
 			$getkat = $this->forum->get_nama_kat($katego);
 			foreach($getkat->result() as $kat)
			{
				$data['kategori'] = $kat->kat;
  		   }
  
  			/* sudah ada berapa komentar */
  			$coco = $this->forum->get_comment_count($idtl)->result();
    		  foreach($coco as $coc)
		      {
			      $data['coco'] = $coc->c;
 		     }
 
 			/* mendapatkan list komen */
 			$k = $this->forum->get_comment($idtl);
			 $data['k'] = $v = $k->result();
			
			if($this->session->userdata('user'))
			{
				$this->load->js('assets/js/v.js');
			    $this->load->js('assets/js/te.js');
			}
			
			$deskripsi = htmlentities(strip_tags($data['isi']),ENT_QUOTES,'UTF-8');
			$this->output->set_common_meta($data['judul'],$deskripsi,$taggs);
			
	    	$this->output->set_output_data('deskripsi',$deskripsi);
        	$this->output->set_output_data('og',$data['isi']);
			$this->load->view('single',$data);
		}	//jika ditemukan
		
		
	}

	
  public function tulis()
  {
  	   /* nyimpen sesi user dan sesi id */
		$sesi = $this->session->userdata('user');
  	  $sesiid = $this->session->userdata('iduser');
    
    	/* jika sesi masih kosong */
	    if(!$sesi)
	    {
			/* lalu redirect ke login */
    		redirect(site_url('login'));
 	   }
    
		$this->output->set_title('Tulis artikel');
    
	    if($this->form_validation->run('tulis') != FALSE)
	    {
		      $j = substr(sha1(date('Y-m-d H:i:s')),0,5);
 		     $t = strtolower(url_title($this->input->post('judul')).'-'.$j);
 		 	$isinya = $this->input->post('isi');
 		     $data = [
 			       'id_user' => $sesiid,
			        'judul' => $this->input->post('judul' ,TRUE),
			        'slug' => $t,
 			       'kat_id' => $this->input->post('kategori'),
  			      'tags' => $this->input->post('tags',TRUE),
  			      'isi' => $this->bbcode->html_to_bbcode(addslashes($isinya)),
 			       'date' => date('Y-m-d H:i:s'),
   				];

		      $this->session->set_flashdata('post_terbit','Thread berhasil di terbitkan!! :)');
      
   	 	  if($this->forum->post_data('timeline',$data))
			  { 
   	  		   redirect(base_url().'forum/thread/'.$t);
		      } //end if
 	   } 
 	   else
 	   {

 		   $this->load->js('assets/js/te.js');
			$this->output->set_title("Tulis baru");
			$this->output->set_output_data('deskripsi','rules atau peraturan  harus di patuhi');
        	$this->output->set_output_data('og','none');
        	$this->load->view('tulis');
	    } // end validation
  }
  
  public function komentar($slug)
  {
		$sessid = $this->session->userdata('iduser');
 	   $url = $slug;
  	  $datta = [   
   		   'id_user' 	=> $sessid,
		      'id_timeline' => $this->input->post('idtl'),
		      'isi'			=> $this->input->post('isi'),
		      'date'		=> date('Y-m-d H:i:s')
    		];
    
    if($this->form_validation->run('komentar') != FALSE){
    	$d = [ 'updated' => date('Y-m-d H:i:s') ];
    	$this->forum->post_komentar($datta);
    	$this->forum->update_post($this->input->post('idtl'),$d);
    	redirect(base_url("forum/thread/$slug"));
	}
	else
	{
		echo "kesalahan yang kamu buat :(";
	}
  }
  
  
  /* fungsi arsip */
	function arsip($kat = 'Curhat')
    {
 	
		$this->output->set_common_meta("Arsip $kat","Semua arsip dari kategori $kat","arsip $kat");   
    	$data['nmarsip'] = $kat;
 
 
 	   $this->config->load('pagination',TRUE);
 	   $configg = $this->config->item('pagination');
        $configg["base_url"] = base_url() . "diskusi/arsip/$kat";
        $total_row = $this->forum->count_arsip($kat);
        $configg["total_rows"] = $total_row;

        
        $this->pagination->initialize($configg);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
     
        $data["arsip"] = $this->forum->fetch_data_arsip($kat,$configg["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );
        
        
	    	$this->output->set_output_data('deskripsi','Forum kategori '.$kat.'');
        	$this->output->set_output_data('og','no');
 
 	$this->load->view("arsip",$data);
	}
  
  
   public function page(){
        $this->config->load('pagination',TRUE);
 	   $configg = $this->config->item('pagination');
        $configg["base_url"] = base_url() . "diskusi/page";
        $total_row = $this->forum->record_count();
        
        $configg["total_rows"] = $total_row;
 
        $this->pagination->initialize($configg);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
   
        $data["timeline"] = $this->forum->fetch_data($configg["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );

   		 $this->output->set_common_meta("Iruna ID","Iruna online best game MMORPG android and iOS, 3D with 1billion quest and dress","iruna online,best game mmorpg android,android mmorpg,3d mmorpg android!");
        	$this->output->set_output_data('deskripsi','Forum iruna online indonesia');
        	$this->output->set_output_data('og','noo');
	   	 $this->load->view('pageindex',$data);
       }
  
    function cari()
    {
	  	$kata = strip_tags($this->input->post('cari',TRUE));
	
	  	$data['cari'] = $this->forum->cari($kata);
 	 	$data['carikata'] = $kata;
  
  		$this->output->set_common_meta("Cari $kata iruna","Cari $kata dalam thread",$kata);
     	$this->output->set_output_data('deskripsi','cari sesuatu mas?');
          $this->output->set_output_data('og','enggak');
 	 	$this->load->view('cari',$data);
 	 }
  
    //hapus
  function erase($id)
  {
  	$sess = $this->session->userdata('user');
      $sessid = $this->session->userdata('iduser');
  	if(!$sess)
  	{
  		redirect(base_url());
  	}else{
  	
  		if($this->forum->cocok($sessid,$id)->num_rows() > 0){
  
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
  		if(!$this->session->userdata('user'))
  		{
  			redirect(base_url());
	  	}else{
 		 	$user = $this->session->userdata('iduser');
			  $cocok = $this->forum->cocok($user,$id);
			
  			if($cocok->num_rows() > 0)
			  {
  				foreach($cocok->result() as $ya)
  				{
  					$data = [
									 'id' 		=> $ya->id,
									 'judul'   => $ya->judul,
  									'slug' 	=> $ya->slug,
  									'isi'		=> $ya->isi,
  									'tag'	   => $ya->tags 
									];
  				}
  			 $this->load->js('assets/js/te.js');
			
  				$this->output->set_output_data('deskripsi','edit');
				  $this->output->set_title('edit artikel');
			  	$this->output->set_output_data('og','none');
  				$this->load->view('retulis',$data);
  			}else{
  				echo "<script>alert('tidak punya akses')</script>";
  			}
		  }
  }
  
  
  function retulis($id)
  {
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
        'judul' => strip_tags($this->input->post('edjudul')),
        'tags' => strip_tags($this->input->post('tags')),
        'isi' => addslashes($this->input->post('edisi')),
      );
     
      $this->session->set_flashdata('post_ubah','Thread berhasil diubah!! :)');
      
      if($this->forum->update_post($dan['id'],$data)){ 
        redirect(base_url().'forum/thread/'.$dan['slug']);
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
  	    	$this->output->set_output_data('og','none');
			  $this->output->set_output_data('deskripsi','edit');
			  $this->output->set_title('edit artikel');
  			$this->load->view('retulis',$data);

    }
    
  
  	}else{
  		echo "<script>alert('tidak punya akses')</script>";
  	}
  }
  }
  
	function rules()
	{
			$this->output->set_title("Rules / Peraturan");
			$this->output->set_output_data('deskripsi','rules atau peraturan yang harus di patuhi');
        	$this->output->set_output_data('og','none');
        	$this->load->view('rules');
	}
	
	function kprivasi()
	{
			$this->output->set_title("Kebijakan Privasi");
			$this->output->set_output_data('deskripsi','kebijakan privasi');
        	$this->output->set_output_data('og','none');
        	$this->load->view('privacy');
	}
	
	function bbcode()
	{
			$this->output->set_title("BBCode Support");
			$this->output->set_output_data('deskripsi','Format penulisan menggunakan bbcode');
        	$this->output->set_output_data('og','none');
        	$this->load->view('bbcode');
	}
  
  function intro()
	{
			$this->output->set_title("Iruna Online ID");
			$this->output->set_output_data('deskripsi','Iruna online adalah game mmorpg terbaik android dan iOS. dikembangkan oleh ASOBIMO INC');
        	$this->output->set_output_data('og','none');
        	$this->load->view('intro');
	}
	
}