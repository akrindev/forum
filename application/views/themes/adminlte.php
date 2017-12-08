<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title;?> - Iruna Online Indonesia</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../lte/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  Theme style -->
  <link rel="stylesheet" href="../../lte/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="../../lte/dist/css/skins/skin-purple.min.css">
 <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />

<meta name="google-site-verification" content="Uszxxo6fNkYbiVyMjjN3Cgbd_dXG-hgf3Gz3uv3BMCI" />
<meta name='language' content='id_id'>
<meta name='robots' content='all,index,follow'>
	
	
 <meta property="og:url"                content="<?=base_url($this->uri->uri_string());?>" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="<?=$title;?>" />
<meta property="og:description"        content="<?=htmlentities(character_limiter(strip_tags($deskripsi),160), ENT_QUOTES , 'UTF-8');?> " />
<meta property="og:image"              content="<?=get_gambar($og);?>" />
<meta property="fb:app_id" content="2008283499456981"/>
<meta name="generator" content="WordPress 4.8.3" />
<?=$this->recaptcha->getScriptTag();?>
  <?php
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

  ?>
  
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-purple sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url();?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Ro</b>Iruna</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Rokoko</b>-Iruna</span>
    </a>

    <nav class="navbar navbar-static-top">

      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        	<?php
        if(!$this->session->userdata('user'))
        {
        ?>
		  	<li>
					<a title="Masuk" href="/login">
					<span class="glyphicon glyphicon-log-in"></span> login
					</a>
			  </li>
			<li>
					<a title="Mendaftar" href="/register">
					<span class="glyphicon glyphicon-user"></span> register
					</a>
			  </li>
			<?php } else { ?>
				<li>
					<a href="/tulis">
					<span class="glyphicon glyphicon-pencil"></span> tulis
					</a>
			  </li>
				<?php
				foreach($this->user->tampiluser($this->session->userdata('user'))->result() as $uup){
				?>
				<li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=$this->gravatar->get($uup->email);?>" class="user-image" alt="User Image">
              <span class=""><?=$uup->fullname;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=$this->gravatar->get($uup->email);?>" class="img-circle" alt="User Image">

                <p>
                 	@<?=$uup->username;?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-12 text-center">
                  <?=$uup->quotes;?>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/dashboard" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
			<?php } } ?>
		</ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->


  <aside class="main-sidebar">

    <section class="sidebar">
<?php 
if($this->session->userdata('user')){
foreach($this->user->tampiluser($this->session->userdata('user'))->result() as $up){
?>
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=$this->gravatar->get($up->email);?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$up->username;?></p>
          <a href="/user"><i class="fa fa-circle-o text-success"></i> <?=$up->kota;?></a>
        </div>
      </div>
      <?php } } ?>
      <!-- search form -->
    <?=form_open('diskusi/cari',['class'=>'sidebar-form']);?>
        <div class="input-group">
          <input type="text" name="cari" class="form-control" placeholder="Nyari apa kak ?">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a title="forum" href="/forum">
            <i class="fa fa-dashboard"></i> <span>Forum</span>
          </a>
        </li>
        <li class="treeview">
        	<a title="pinned thread" href="/pinned">
        		<i class="glyphicon glyphicon-pushpin"></i> <span>Pinned</span></a>
        	
        </li>
        <li class="treeview">
          <a title="rules" href="/rules">
            <i class="fa fa-user-md"></i>
            <span>Rules / Peraturan</span>
            <span class="pull-right-container">
              <span class="label label-danger pull-right">!</span>
            </span>
          </a>
          
        </li>
        <li>
          <a title="BBCODE support" href="/tutorial">
            <i class="fa fa-th"></i> <span>BBCode support</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">Hot</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a title="kebijakan privasi" href="/kebijakan-privasi">
            <i class="fa fa-heart"></i>
            <span>Kebijakan privasi</span>
          </a>
          
        </li>
       
        <li><a title="home dokumentasi" href="/">
		<i class="fa fa-book"></i> 
		<span>Documentation</span></a>
		  
		</li>
        <li class="header">ARSIP</li>
        <?php
     
			foreach($this->forum->get_kategori()->result() as $kate)
			{ 
   $a = ['red','green','aqua','yellow'];
        $b = count($a)-1;
		$q = $a[rand(0,$b)];
   
?>
        <li><a href="/arsip/<?=$kate->kat;?>"><i class="fa fa-circle-o text-<?=$q;?>"></i> <span><?=$kate->kat;?></span></a></li>
        <?php } ?>
        	<li class="header">
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
<noscript><img  src="//sstatic1.histats.com/0.gif?3962278&101" alt="free geoip" border="0"></noscript>
<!-- Histats.com  END  -->
        
        	</li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

	<?=$output;?>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Rokoko</b> Iruna
    </div>
    <strong>Copyright &copy; 2017 <a href="https://rokoko-iruna.com/">rokoko-iruna.com</a>.</strong> All rights
    reserved.
  </footer>

  
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../lte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../../lte/bootstrap/js/bootstrap.min.js"></script>
<script src="../../lte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../../lte/plugins/fastclick/fastclick.js"></script>
<script src="../../lte/dist/js/app.min.js"></script>
</body>
</html>