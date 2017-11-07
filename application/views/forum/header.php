 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
        <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">
	<title><?=$judul;?> - Iruna online forum</title>
	<meta name="description" content="<?=character_limiter($isi,140);?> ">
	<meta name='language' content='id_ID">
		<meta name='robots' content='index,follow'>
			<meta name='HandheldFriendly' content='True'>
<meta name='apple-mobile-web-app-status-bar-style' content='black'> 
<meta name='format-detection' content='telephone=no'> 
<link href='/startup.png' rel='apple-touch-startup-image'> <link href='http://github.com/images/touch-icon-iphone4.png' sizes='114x114' rel='apple-touch-icon-precomposed'> 
<link href='http://github.com/images/touch-icon-ipad.png' sizes='72x72' rel='apple-touch-icon-precomposed'>
 <link href='http://github.com/images/apple-touch-icon-57x57.png' sizes='57x57' rel='apple-touch-icon-precomposed'>
 <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />

 <meta property="og:url"                content="<?=base_url($this->uri->uri_string());?>" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="<?=$judul;?>" />
<meta property="og:description"        content="<?=character_limiter($isi,140);?> " />
<meta property="og:image"              content="http://i.cubeupload.com/a6W64O.jpeg" />
<meta property="fb:app_id" content="2008283499456981"/>
<meta name="generator" content="WordPress 4.8.3" />
<link rel="stylesheet" type="text/css" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css' />
<link rel='dns-prefetch' href='//s0.wp.com' />
<link rel='dns-prefetch' href='//s1.wp.com' />
<link rel='dns-prefetch' href='//s2.wp.com' />
<link rel='dns-prefetch' href='//public-api.wordpress.com' />
<link rel='dns-prefetch' href='//0.gravatar.com' />
<link rel='dns-prefetch' href='//1.gravatar.com' />
<link rel='dns-prefetch' href='//2.gravatar.com' />


	<!-- CSS  -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link href="/assets/css/styles.css" rel="stylesheet" type ="text/css" media="screen"/>
    <link rel="stylesheet" href="/assets/css/iao-alert.css" type="text/css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script src="/assets/js/iao-alert.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script src="http://timeago.yarp.com/jquery.timeago.js"></script>
 <script src="http://malsup.github.com/jquery.form.js"></script>
 <script src="/assets/js/jquery.tagsinput.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/css/jquery.tagsinput.css" />
	
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>

<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />

<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />

    
 <!--   <script type="text/javascript" src=<?= base_url('js/scripts.js');?></script>-->
  </head>
  <body>
	<header>
	  <img alt="iruna-indonesia" src="/assets/img/iruna-indonesia-logo.png" class="img" style="width:270px;height:70px;max-height:100%"/>
	   <div class="atas">
		<div class="kpl-forum">
			
		  <a class="list-item" href="<?=base_url('forum');?>">Forum</a>
<?php if($this->session->userdata('user')){?>
		  <a class="list-item" href="<?=base_url('dashboard');?>">Profil</a>
          <a class="list-item" href="<?=base_url('forum/tulis');?>">Tulis</a>
<?php } else {?>

		  <a class="list-item" href="<?=base_url('login');?>">Login</a>
<?php } ?>
		  <a class="list-item" href="/image">Images</a>
<?php if($this->session->userdata('user')){?>
		  <a class="list-item" href="<?=base_url('logout');?>">Logout</a>
<?php }?>
	</div>
		
	</div>
	</header>