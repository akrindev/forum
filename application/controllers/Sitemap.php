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
	$up = explode(' ',$r->date);
	$data .= '
	<url>
      <loc>';

	$data .= base_url('forum/tl/'.$r->slug.'/');
	$data .= '</loc>';

   $data .= "   
<lastmod>$up[0]</lastmod>";
	$data .= "
      <changefreq>monthly</changefreq>

      <priority>0.8</priority>

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