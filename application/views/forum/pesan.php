<main>

	  <div class="container-fluid">
		<div class="row">
		  <div class="col-12">	
			<div class="mow">
			  <div class="mow-head">Pesan<a href="#" class="text-muted float-right small">Lebih banyak</a></div>
			 <?php
				foreach($pesan->result() as $pe){
					?>
			  <div class="mow-user">
				<a href="<?=base_url('pesan/x/'.$pe->keamanan);?>" class="mow-pesan text-primary"><?=$pe->tentang;?></a>
				<div class="mow-infor small text-muted">
				<span class="mow-user-name">Dari: <?=$pe->dari?></span>
				<span class="mow-user-date">Pada: <?=pisah_waktu($pe->date);?></span>
				</div>
			  </div>
			<?php } ?>
			</div>
		  </div>
		  
		</div>
	  </div><!--container-->

	</main>
	
		<footer>
	  <div class="footer-forum">Copyright 2017 - All Right Reserved</div>
	</footer>
  </body>
</html>		