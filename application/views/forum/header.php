 <!DOCTYPE html>
      <html lang="en">
        <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">
	<title><?=$judul;?> - Iruna online forum</title>
	<meta name="description" content="<?=character_limiter($isi,140);?> ">
	<meta name='language' content='id_ID'>
		<meta name='robots' content='index,follow'>
			<meta name='HandheldFriendly' content='True'>

 <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
<meta name="google-site-verification" content="KepqXCIws9XJoRrMQkQQZqYnQOPDnFUuH5iIeXT9DNs" />
<meta name="title" content="<?=$judul;?> - Iruna online forum">
<meta name="description" content="<?=character_limiter($isi,160);?>"/>
 <meta property="og:url"                content="<?=base_url($this->uri->uri_string());?>" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="<?=$judul;?>" />
<meta property="og:description"        content="<?=character_limiter($isi,160);?> " />
<meta property="og:image"              content="http://i.cubeupload.com/a6W64O.jpeg" />
<meta property="fb:app_id" content="2008283499456981"/>
<meta name="generator" content="WordPress 4.8.3" />
<link rel="stylesheet" type="text/css" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css' />


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

 <script src="http://malsup.github.com/jquery.form.js"></script>

<link rel="stylesheet" type="text/css" href="/assets/css/jquery.tagsinput.css" />
	
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>

<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />

<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />

<!-- jQuery Modal -->
<style>
.blocker{position:fixed;top:0;right:0;bottom:0;left:0;width:100%;height:100%;overflow:auto;z-index:1;padding:20px;box-sizing:border-box;background-color:#000;background-color:rgba(0,0,0,0.75);text-align:center}.blocker:before{content:"";display:inline-block;height:100%;vertical-align:middle;margin-right:-0.05em}.blocker.behind{background-color:transparent}.modaljs{display:none;vertical-align:middle;position:relative;z-index:2;max-width:500px;box-sizing:border-box;width:90%;background:#fff;padding:15px 30px;-webkit-border-radius:8px;-moz-border-radius:8px;-o-border-radius:8px;-ms-border-radius:8px;border-radius:8px;-webkit-box-shadow:0 0 10px #000;-moz-box-shadow:0 0 10px #000;-o-box-shadow:0 0 10px #000;-ms-box-shadow:0 0 10px #000;box-shadow:0 0 10px #000;text-align:left}.modaljs a.close-modal{position:absolute;top:-12.5px;right:-12.5px;display:block;width:30px;height:30px;text-indent:-9999px;background-size:contain;background-repeat:no-repeat;background-position:center center;background-image:url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAAAXNSR0IArs4c6QAAA3hJREFUaAXlm8+K00Acx7MiCIJH/yw+gA9g25O49SL4AO3Bp1jw5NvktC+wF88qevK4BU97EmzxUBCEolK/n5gp3W6TTJPfpNPNF37MNsl85/vN/DaTmU6PknC4K+pniqeKJ3k8UnkvDxXJzzy+q/yaxxeVHxW/FNHjgRSeKt4rFoplzaAuHHDBGR2eS9G54reirsmienDCTRt7xwsp+KAoEmt9nLaGitZxrBbPFNaGfPloGw2t4JVamSt8xYW6Dg1oCYo3Yv+rCGViV160oMkcd8SYKnYV1Nb1aEOjCe6L5ZOiLfF120EjWhuBu3YIZt1NQmujnk5F4MgOpURzLfAwOBSTmzp3fpDxuI/pabxpqOoz2r2HLAb0GMbZKlNV5/Hg9XJypguryA7lPF5KMdTZQzHjqxNPhWhzIuAruOl1eNqKEx1tSh5rfbxdw7mOxCq4qS68ZTjKS1YVvilu559vWvFHhh4rZrdyZ69Vmpgdj8fJbDZLJpNJ0uv1cnr/gjrUhQMuI+ANjyuwftQ0bbL6Erp0mM/ny8Fg4M3LtdRxgMtKl3jwmIHVxYXChFy94/Rmpa/pTbNUhstKV+4Rr8lLQ9KlUvJKLyG8yvQ2s9SBy1Jb7jV5a0yapfF6apaZLjLLcWtd4sNrmJUMHyM+1xibTjH82Zh01TNlhsrOhdKTe00uAzZQmN6+KW+sDa/JD2PSVQ873m29yf+1Q9VDzfEYlHi1G5LKBBWZbtEsHbFwb1oYDwr1ZiF/2bnCSg1OBE/pfr9/bWx26UxJL3ONPISOLKUvQza0LZUxSKyjpdTGa/vDEr25rddbMM0Q3O6Lx3rqFvU+x6UrRKQY7tyrZecmD9FODy8uLizTmilwNj0kraNcAJhOp5aGVwsAGD5VmJBrWWbJSgWT9zrzWepQF47RaGSiKfeGx6Szi3gzmX/HHbihwBser4B9UJYpFBNX4R6vTn3VQnez0SymnrHQMsRYGTr1dSk34ljRqS/EMd2pLQ8YBp3a1PLfcqCpo8gtHkZFHKkTX6fs3MY0blKnth66rKCnU0VRGu37ONrQaA4eZDFtWAu2fXj9zjFkxTBOo8F7t926gTp/83Kyzzcy2kZD6xiqxTYnHLRFm3vHiRSwNSjkz3hoIzo8lCKWUlg/YtGs7tObunDAZfpDLbfEI15zsEIY3U/x/gHHc/G1zltnAgAAAABJRU5ErkJggg==')}.modal-spinner{display:none;position:fixed;top:50%;left:50%;transform:translateY(-50%) translateX(-50%);padding:12px 16px;border-radius:5px;background-color:#111;height:20px}.modal-spinner>div{border-radius:100px;background-color:#fff;height:20px;width:2px;margin:0 1px;display:inline-block;-webkit-animation:sk-stretchdelay 1.2s infinite ease-in-out;animation:sk-stretchdelay 1.2s infinite ease-in-out}.modal-spinner .rect2{-webkit-animation-delay:-1.1s;animation-delay:-1.1s}.modal-spinner .rect3{-webkit-animation-delay:-1.0s;animation-delay:-1.0s}.modal-spinner .rect4{-webkit-animation-delay:-0.9s;animation-delay:-0.9s}@-webkit-keyframes sk-stretchdelay{0%,40%,100%{-webkit-transform:scaleY(0.5)}20%{-webkit-transform:scaleY(1.0)}}@keyframes sk-stretchdelay{0%,40%,100%{transform:scaleY(0.5);-webkit-transform:scaleY(0.5)}20%{transform:scaleY(1.0);-webkit-transform:scaleY(1.0)}}
</style>
 <!--   <script type="text/javascript" src=<?= base_url('js/scripts.js');?></script>-->
  </head>
  <body>
	<header>
	 	<div class="brand"><a href="/" alt="Mobile iruna forum indonesia">Mobile Iruna Notes</a></div>
	   <div class="atas position-sticky">
		<div style="max-width:720px;text-align:left;margin:0 auto;">
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
	</div>
	</header>