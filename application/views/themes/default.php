
 <!DOCTYPE html>
      <html lang="en">
        <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">
	<title>ID - Iruna online forum</title>
	<meta name="description" content="Iruna online forum, tutorial iruna, Production iruna ">
	<meta name='language' content='id_ID'>
		<meta name='robots' content='index,follow'>
			<meta name='HandheldFriendly' content='True'>

 <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
<meta name="google-site-verification" content="Uszxxo6fNkYbiVyMjjN3Cgbd_dXG-hgf3Gz3uv3BMCI"/>
<meta name="title" content="ID - Iruna online forum">
 <meta property="og:url"                content="http://inko-chan.net/" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="ID" />
<meta property="og:description"        content="Iruna online forum, tutorial iruna, Production iruna " />
<meta property="og:image"              content="http://i.cubeupload.com/a6W64O.jpeg" />
<meta property="fb:app_id" content="2008283499456981"/>
<meta name="generator" content="WordPress 4.8.3" />
<link rel="stylesheet" type="text/css" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css' />


	<?php
	/** -- Copy from here -- */
	if(!empty($meta))
	foreach($meta as $name=>$content){
		echo "\n\t\t";
		?><meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" /><?php
			 }
	echo "\n";

	if(!empty($canonical))
	{
		echo "\n\t\t";
		?><link rel="canonical" href="<?php echo $canonical?>" /><?php

	}
	echo "\n\t";

	foreach($css as $file){
	 	echo "\n\t\t";
		?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
	} echo "\n\t";

	foreach($js as $file){
			echo "\n\t\t";
			?><script src="<?php echo $file; ?>"></script><?php
	} echo "\n\t";

	/** -- to here -- */
?>
  </head>
  <body>
	<header>
 	<div class="brand"><a href="/">Rokoko Iruna<br/><span class="small">Para petualang dari desa Rokoko</span></a></div>
	   <div class="atas position-sticky">
		<div style="max-width:720px;text-align:left;margin:0 auto;">
		<div id="menu" class="kpl-forum">
			
		  <a class="list-item" href="<?=base_url('forum');?>">Forum</a>
<?php if($this->session->userdata('user')){?>
		  <a class="list-item" href="<?=base_url('dashboard');?>">Panel</a>
          <a class="list-item" href="<?=base_url('forum/tulis');?>">Tulis</a>
<?php } else {?>

		  <a class="list-item" href="<?=base_url('login');?>">Login</a>
<?php } ?>
		
		<a class="list-item" href="/pinned">Pinned</a>
<?php if($this->session->userdata('user')){?>
		  <a class="list-item" href="<?=base_url('logout');?>">Logout</a>
<?php }?>
	</div>
		</div>
	</div>
	</header>
	    <?php echo $output;?>
	 	<footer>

	  <div class="footer-forum">&copy; 2017 <a href="https://rokoko-iruna.com/" title="iruna online Indonesia">rokoko-iruna.com</a> - All Right Reserved
<br/>
<a href="/kebijakan-privasi" title="Privacy policy">Kebijakan privasi</a> . <a href="/rules" title="Privacy policy">Rules/peraturan</a> . <a href="/tutorial" title="BBCode Tutorial">BBCode support</a>
<br/>
<!-- Histats.com  (div with counter) --><div id="histats_counter"></div>
<!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,3962278,4,107,170,20,00010000']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?3962278&101" alt="free geoip" border="0"></a></noscript>
<!-- Histats.com  END  -->
</div>

	</footer>

  </body>
</html>