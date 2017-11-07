
	<main>
	  
	  <div class="container">
		
		<!--breadcrumb-->
		<div style="margin-top:10px"></div>
		<ol class="breadcrumb">
			<li> <a href="/forum"> Forum </a></li>
		  <li class="active">Zona Sofya</li>
		</ol>
	  
	  
	<div class="row">
		      <div class=" col-xs-12">
           <div class="new-post"><a href="#">Buat thread baru</a></div>
          
           <div class="zone">Zona Sofya</div>
          </div>
     <?php foreach($sofya as $post){?>
		  <div class="col-xs-12">
	      	<div class="post">
		      <div class="post-header">
		        <div class="post-title"><h4><a href="<?php echo base_url()?>forum/sofya/<?=$post->slug?>"><?php echo $post->judul ?></a></h4></div>
				<div class="post-info"><i class="glyphicon glyphicon-user"></i> <span class="author small"> <?php echo $post->username ?></span> <i class="glyphicon glyphicon-calendar"></i> <span class="post-date"><?php echo $post->date ?></span> <i class="glyphicon glyphicon-comment"></i> 0 <i class="glyphicon glyphicon-eye-open"></i> 3</div>
	    	  </div><!--post header-->
			 </div><!--post-->
		  </div><!--col-->
		  <?php } ?>
		 
		</div><!--row-->
		
		
	  </div><!--container-->
	  
	</main><!--maiinnn-->
	
	<footer>
	  <div class="footer-forum">Copyright 2017 - All Right Reserved</div>
	</footer>

    <script src="/js/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>		