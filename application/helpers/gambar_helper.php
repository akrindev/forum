<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	 
	//Format Shortdate
	if ( ! function_exists('get_gambar'))
	{
	    function get_gambar($hh)
	    {
	 		
					if(strpos($hh,'"img-fluid" src="'))
					{
							$awal = explode('"img-fluid" src="',$hh);
							$akhir = explode('"',$awal[1]);
		
							echo $akhir[0];
					}else {
							echo "http://i.cubeupload.com/a6W64O.jpeg";
					}
		    }
	}
	 