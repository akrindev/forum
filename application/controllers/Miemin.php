<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

class Miemin extends CI_Controller
 {

	function index($p = "dash")
	{
		$head['judul'] = "tes";
		$head['isi'] = "tes juga";
		
		$this->load->view('forum/header',$head);
		$this->load->view('forum/admin/'.$p);
		}
}