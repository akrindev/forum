<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	 
	//Format Shortdate
	if ( ! function_exists('get_gambar'))
	{
	    function get_gambar($hh)
	    {
	 		
					if(strpos($hh,'"img-responsive" src="'))
					{
							$awal = explode('"img-responsive" src="',$hh);
							$akhir = explode('"',$awal[1]);
		
							echo $akhir[0];
					}else {
							//echo "http://i.cubeupload.com/a6W64O.jpeg";
							echo "https://i.ytimg.com/vi/jsr8PI72Tq4/hqdefault.jpg";
					}
		    }
	}
	 