<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller {

function index()
{

$data = "";
$data .= '
<?xml version="1.0" encoding="UTF-8"?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
';
   

foreach($this->db->order_by('date','DESC')->get('timeline')->result() as $r)
{ 
	
	$data .= '
	<url>
      <loc>';

	$data .= base_url('forum/thread/'.$r->slug.'/');
	$data .= "</loc>
   </url>
   ";
	}
$data .= "</urlset>";


$this->output
        ->set_status_header(200)
        ->set_content_type('text/xml', 'utf-8')
        ->set_output($data)
        ->_display();
     exit;



	}

function price()
{

$data = "";
$data .= '
<?xml version="1.0" encoding="UTF-8"?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
';
   

foreach($this->db->order_by('name','ASC')->get('price')->result() as $r)
{ 
	
	$data .= '
	<url>
      <loc>';

	$data .= base_url('harga/item/'.$r->slug.'');
	$data .= "</loc>
   </url>
   ";
	}
$data .= "</urlset>";


$this->output
        ->set_status_header(200)
        ->set_content_type('text/xml', 'utf-8')
        ->set_output($data)
        ->_display();
     exit;



	}
  
  
function bgm()
{

$data = "";
$data .= '
<?xml version="1.0" encoding="UTF-8"?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
';
   

foreach($this->db->order_by('id','ASC')->get('bgm')->result() as $r)
{ 
	
	$data .= '
	<url>
      <loc>';

	$data .= base_url('background_music/episode/'.$r->episode.'/'.$r->slug.'');
	$data .= "</loc>
   </url>
   ";
	}
$data .= "</urlset>";


$this->output
        ->set_status_header(200)
        ->set_content_type('text/xml', 'utf-8')
        ->set_output($data)
        ->_display();
     exit;



	}

}