<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title;?> | Iruna Online Indonesia</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/lte/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="/lte/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="/lte/dist/css/skins/skin-green.min.css">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" sizes="any" />

<meta name="google-site-verification" content="Uszxxo6fNkYbiVyMjjN3Cgbd_dXG-hgf3Gz3uv3BMCI" />
<meta name='language' content='id_id'/>
<meta name='robots' content='all,index,follow'/>
	<meta content='follow, all' name='alexabot'/>
<meta content='-5;120' name='geo.position'/>

<meta content='id' name='language'/>
<meta content='Indonesia' name='geo.placename'/>
<meta content='global' name='target'/>
<meta content='Indonesia' name='geo.country'/>
<meta content='all' name='googlebot'/>
<meta content='all' name='msnbot'/>
<meta content='all' name='Googlebot-Image'/>
<meta content='all' name='Slurp'/>
<meta content='all' name='ZyBorg'/>
<meta content='all' name='Scooter'/>
<meta content='ALL' name='spiders'/>
<meta content='general' name='rating'/>
<meta content='2 days' name='revisit-after'/>
<meta content='2 days' name='revisit'/>
<meta content='all' name='WEBCRAWLERS'/>


<script type='application/ld+json'>
{
	 "@context": "http://schema.org",
	 "@type": "WebSite", 
	 "url": "<?=base_url();?>"
 }</script>
	
 <meta property="og:url"                content="<?=base_url($this->uri->uri_string());?>" />
<meta property="og:type"               content="article" />
<meta content='Iruna Online Indonesia' property='og:site_name'/>
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

<!-- Google Analytics -->
<script>
window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
ga('create', 'UA-109854426-1', 'auto');
ga('send', 'pageview');
</script>
<script async src='https://www.google-analytics.com/analytics.js'></script>
<!-- End Google Analytics -->


  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-green sidebar-mini">
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

      <div class="navbar-custom-menu"  itemscope='itemscope' itemtype='http://schema.org/WPSideBar'>
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
                 	Selamat datang kak <?=$uup->username;?> 
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
  <aside class="main-sidebar" itemscope='itemscope' itemtype='http://schema.org/SiteNavigationElement' role='navigation'>

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
      <?=form_close();?>
      <!-- /.search form -->

      <ul class="sidebar-menu">
        <li class="header">NAVIGATION</li>
                <?php
        if($this->session->user)
        {
        ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/dashboard"><i class="fa fa-circle-o"></i> Dashboard</a></li>
            <li><a href="/quiz/quizUser"><i class="fa fa-circle-o"></i> Dashboard Quiz</a></li>
          </ul>
        </li>
        
        <?php
        }
          ?>
        <li class="treeview" itemprop='url'>
          <a title="forum" href="/forum">
            <i class="fa fa-comments-o"></i> <span itemprop='name'>Forum</span>
          </a>
        </li>
        <li class="treeview" itemprop='url'>
        	<a title="pinned thread" href="/pinned">
        		<i class="glyphicon glyphicon-pushpin"></i> <span itemprop='name'>Pinned</span></a>
        	
        </li>
 <li class="treeview" itemprop='url'>
        	<a title="Items price" href="/price">
        		<i class="fa fa-bar-chart"></i> <span itemprop='name'>Items price</span></a>
        	
        </li>
        
        
          <li class="treeview">
          <a href="#">
            <i class="fa fa-headphones"></i> <span>Background Music</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/background_music"><i class="fa fa-circle-o"></i> Background music</a></li>
            <li><a href="/background_music/episode/1"><i class="fa fa-circle-o"></i> Episode 1-2</a></li>
            <li><a href="/background_music/episode/3"><i class="fa fa-circle-o"></i> Episode 3</a></li>
            <li><a href="/background_music/episode/4"><i class="fa fa-circle-o"></i> Episode 4</a></li>
            <li><a href="/background_music/episode/5"><i class="fa fa-circle-o"></i> Episode 5</a></li>
            <li><a href="/background_music/episode/6"><i class="fa fa-circle-o"></i> Episose 6</a></li>
          </ul>
        </li>
        
       <li itemprop='url'><a title="Quiz" href="/quiz">
		<i class="fa fa-trophy"></i> 
		<span itemprop='name'>Iruna Quiz</span></a>
		  
		</li>

<li itemprop='url'><a href="/scam">
		<i class="fa fa-user-times"></i> 
		<span itemprop='name'>Scammers list</span></a>
		  
		</li>
        <li class="treeview" itemprop='url'>
          <a title="rules" href="/rules">
            <i class="fa fa-user-md"></i>
            <span itemprop='name'>Rules / Peraturan</span>
            <span class="pull-right-container">
              <span class="label label-danger pull-right">!</span>
            </span>
          </a>
          
        </li>
        <?php if($this->session->userdata('user')){ ?>
        <li>
          <a title="Pengaturan" href="/user/setting">
            <i class="fa fa-th"></i> <span>Pengaturan akun</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">♥</small>
            </span>
          </a>
        </li>
        <?php } ?>
        <li class="treeview" itemprop='url'>
          <a title="kebijakan privasi" href="/kebijakan-privasi">
            <i class="fa fa-heart"></i>
            <span itemprop='name'>Kebijakan privasi</span>
          </a>
          
        </li>
      
        
        <li itemprop='url'><a title="home dokumentasi" href="/">
		<i class="fa fa-book"></i> 
		<span itemprop='name'>Documentation</span></a>
		  
		</li>
        <li class="header">ARSIP</li>
        <?php
     
			foreach($this->forum->get_kategori()->result() as $kate)
			{ 
   $a = ['red','green','aqua','yellow'];
        $b = count($a)-1;
		$q = $a[rand(0,$b)];
   
?>
        <li itemprop='url'><a href="/arsip/<?=$kate->kat;?>"><i class="fa fa-circle-o text-<?=$q;?>"></i> <span itemprop='name'><?=$kate->kat;?></span></a></li>
        <?php } ?>
        	
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

	<?=$output;?>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <strong>{&nbsp;}</strong> with <font color="red">&hearts;</font> in Pekalongan, Indonesia </div>
    <strong>Copyright &copy; 2018 <a href="https://rokoko-iruna.com/">rokoko-iruna.com</a>.</strong> All rights
    reserved. <br/>
  
  </footer>

  
</div>
<!-- ./wrapper -->
<!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,3962278,4,0,0,0,00010000']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>

<!-- Histats.com  END  -->

  
<script src="/lte/plugins/jQuery/jquery.min.js"></script>
<script src="/lte/bootstrap/js/bootstrap.min.js"></script>
<script src="/lte/dist/js/app.min.js"></script>


  	<script src="http://malsup.github.com/jquery.form.js"></script>
  <script>
  $(document).ready(function(){
    
  $('#saran').submit(function(e){
  	e.preventDefault();
  
 		$.ajax({
 	  url : "<?=base_url();?>price/saran",
        type: "POST",
        dataType: "JSON", 
        data: $("#saran").serialize(),
        beforeSend: function()
        {
			$('.anu').html('<i class="fa fa-spinner fa-spin"></i> Sending');
          	$('.anu').addClass('disabled');
        },
        success: function(data)
        {
          $('.yametesenpai').slideUp();
          
        	if(data.status == true){
				alert('Thank you!');
        	}
       }
 		});
  	});
  
  })
  </script>
  	<?php
  if($this->session->userdata('level') == 'admin')
  { ?>
  <script type="text/javascript">
  
  function tambahkan()
  {
  	$("#tbh")[0].reset();

  	 $('#modal_form_tambah').modal('show');
     $('.modal-title').text('Add Items');
	};
  	
  function edit(id)
  {
  	$("form")[0].reset();

 $.ajax({
        url : "<?=base_url();?>price/ajax_edit/" + id,
        type: "GET",
        dataType: "JSON",
			beforeSend: function()
			{
				$('.uio-'+id).text('wait...');
			},
        success: function(data)
        {
 $('.uio-'+id).text('edit');
		    $('[name="id"]').val(data.id);
            $('[name="name"]').val(data.name);
            $('[name="price"]').val(data.price);
            $('[name="stk"]').val(data.stk);
            $('[name="npc"]').val(data.npc);
            $('[name="slug"]').val(data.slug);
           
 
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Items'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    })

  };
  
  </script>
<script>

  
  function hps(id)
  {
if(confirm('Yakin mau hapus?'))
{
 $.ajax({
        url : "<?=base_url();?>price/hps_i/"+id,
        type: "delete",
        dataType: "JSON",
			beforeSend: function()
			{
				$('.nno-'+id).text('deleting...');
			},
        success: function(data)
        {
		if(data.status == true){
				$('.yamete-'+id).html('<span class="text-danger">berhasil dihapus</span>');
 }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    })
}
  };
 
</script>
  <script>
  $(function(){
  	$('#gnt').submit(function(e){
  	e.preventDefault();
  
 		$.ajax({
 	  url : "<?=base_url();?>price/ajax_edit_n/",
        type: "POST",
        dataType: "JSON", 
        data: $('#gnt').serialize(),
        beforeSend: function()
        {
			$('.gg').text('mengubah...');
        },
        success: function(data)
        {
        	$('.gg').text('Save Chages');
        	if(data.status == true){
				$('#modal_form').modal('hide'); 
           	 alert('sukses, akan diperbarui ketika halaman di reload');
        	}
       }
 		});
  	});
  
  $('#tbh').submit(function(e){
  	e.preventDefault();
  
 		$.ajax({
 	  url : "<?=base_url();?>price/ajax_tambah/",
        type: "POST",
        dataType: "JSON", 
        data: $('#tbh').serialize(),
        beforeSend: function()
        {
			$('.tamvan').text('Menambahkan...');
        },
        success: function(data)
        {
        	$('.tamvan').text('Tambahkan');
        	if(data.status == true){
				$('#modal_form_tambah').modal('hide'); 
   	     	 alert('sukses Menambahkan item ');
        	}
       }
 		});
  	});
  })
  </script>
  	<!--modal edit-->
        <div class="modal modal-primary fade" id="modal_form" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit items</h4>
              </div>
              <?=form_open('price/ajax_edit_n',['id' => 'gnt']);?>
              <div class="modal-body">
<div class="form-group">
              	<label>Name</label>
               	<input type="text" name="name" class="form-control">
</div>
<div class="form-group">
               	<label>Price</label>
               	<input type="text" class="form-control" name="price">
</div>
<div class="form-group">
               	<label>Stk</label>
               	<input type="text" class="form-control" name="stk">
</div>
<div class="form-group">
               	<label>Npc</label>
               	<input type="text" class="form-control" name="npc">
</div>

<div class="form-group">
               	<label>Slug <small class="text-danger">jangan di ubah</small></label>
               	<input type="text" class="form-control" name="slug">
</div>
	<input type="hidden" name="id" class="form-control">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn gg btn-outline">Save changes</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal edit -->
      
      
      
      <!--modal tambah-->
      	  <div class="modal modal-default fade" id="modal_form_tambah" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add item</h4>
              </div>
              <?=form_open('price/ajax_tambah',['id' => 'tbh']);?>
              <div class="modal-body">
<div class="form-group">
	
              	<label>Name</label>
               	<input type="text" name="name" class="form-control">
</div>
<div class="form-group">
               	<label>Price</label>
               	<input type="text" class="form-control" name="price">
</div>
<div class="form-group">
               	<label>Stk</label>
               	<input type="text" class="form-control" name="stk">
</div>
<div class="form-group">
               	<label>Npc</label>
               	<input type="text" class="form-control" name="npc">
</div>
<div class="form-group">
               	<label>Type</label>
 				<select name="type" class="form-control">
 		<?php
			foreach($this->price_model->typenya()->result() as $r)
		{ ?>
			<option value="<?=$r->type;?>"><?=$r->type;?></option>
			<?php } ?>
 				</select>
</div>
	
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn tamvan btn-primary">Tambahkan</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      <!--modal tambah-->
  <?php

} 

?>
 <!--/end modal-->

</body>
</html>