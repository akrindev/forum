<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bgm extends CI_Controller {

	//private $key = 'AIzaSyCWwW42diksVdsP2SStI52HZWzI5oS8rrM';
	private $key = 'AIzaSyA_j1Z6Boqg-XAaEHSHMZY_8KOrkK6yn_k';
	
  function __construct()
  {
    parent::__construct();
    
    $this->load->model('bgm_model');
    
    $this->output->set_template('adminlte');
    $this->load->js('https://code.jquery.com/jquery-3.2.1.min.js');
    
    $this->output->set_common_meta('Iruna Online BGM','Iruna Online BGM full episode play online or download','iruna bgm, iruna online bgm, iruna online background music');
    $this->output->set_output_data('deskripsi','Iruna Online BGM full episode play online or download');
    $this->output->set_output_data('og','og:=https://rokoko-iruna.com/a-iruna-bgm.jpg=:og');
  }
  
  
	
	function index()
    {
      
      $this->load->view('bgm');
    }
  
  
  	function episode($i)
    {
      $data['episode'] = $this->bgm_model->fetch_episode($i == 2 ? 1 : $i);
      $data['ep'] = $i == 2 ? 1 : $i;
      
      $this->output->set_title('Iruna Online BGM: Episode '.$i);
      $this->load->view('bgm_episode',$data);
    }
  
  function single($ep,$slug)
  {
    $ep = $ep == 2 ? 1 : $ep;
    $data['isi'] = $this->bgm_model->fetch_single($ep,$slug);
    
    
    if($data['isi']->num_rows() > 0)
    {
      foreach($data['isi']->result() as $k)
      {
        $title = $k->title;
        $v = $k->videoId;
        $epis = $k->episode;
      }
    }
    
    
	$a = $this->cokot('https://youtubemp3api.com/@grab?vidID='.$v.'&format=mp3&streams=mp3&api=button');
      
		
	$data['mp'] = $this->simple_html_dom->load($a);
    $data['title'] = $title;
    $data['epis'] = $epis;
    
    $jdl = strlen($title) > 1 ? $title : 'not found';
    
    $this->output->set_title($jdl.' : BGM');
    $this->load->view('bgm_single',$data);
  }

  function unduh($id,$q)
  {
    $this->output->unset_template();
    
    $v = $id;
    
	$a = $this->cokot('https://youtubemp3api.com/@grab?vidID='.$v.'&format=mp3&streams=mp3&api=button');
      
		
	$data = $this->simple_html_dom->load($a);
    
    
    $u=1;
    foreach($data->find('a') as $a)
    {
      $mp[$u] = $a->href;
      $u++;
    }
    
    $this->load->helper('download');
    
    $key = $this->db->where('videoId',$v)->get('bgm');
    
    if($key->num_rows() > 0)
    {
      foreach($key->result() as $t)
      {
        $judul = $t->title;
      }
      
      
      switch($q)
      {
        case 1:
          $lagu = file_get_contents($mp[1]);
          $titl = $judul.'[rokoko-iruna.com].mp3';
          force_download($titl,$lagu);
          exit;
          break;
        case 2:
          $lagu = file_get_contents($mp[2]);
          $titl = $judul.'[rokoko-iruna.com].mp3';
          force_download($titl,$lagu);
          exit;
          break;
        case 3:
          $lagu = file_get_contents($mp[3]);
          $titl = $judul.'[rokoko-iruna.com].mp3';
          force_download($titl,$lagu);
          exit;
          break;
        case 4:
          $lagu = file_get_contents($mp[4]);
          $titl = $judul.'[rokoko-iruna.com].mp3';
          force_download($titl,$lagu);
          exit;
          break;
        case 5:
          $lagu = file_get_contents($mp[5]);
          $titl = $judul.'[rokoko-iruna.com].mp3';
          force_download($titl,$lagu);
          exit;
          break;
        default:
          redirect('notfound');
          break;
      }
      
    } else {
      redirect('notfound');
    }
    
    
  }

function cokot($url){
$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$uaa = $_SERVER['HTTP_USER_AGENT'];
    curl_setopt($ch, CURLOPT_USERAGENT, "User-Agent: $uaa");
	//curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
 // curl_setopt($ch, CURLOPT_TIMEOUT, 20);
  
curl_setopt($ch, CURLOPT_REFERER, ' https://youtubemp3api.com/');

    return curl_exec($ch);
}

	
  
}