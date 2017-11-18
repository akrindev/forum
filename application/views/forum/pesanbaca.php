<main>

	  <div class="container-fluid">
		<div class="row">
			
		  <div class="col-12">	
		<div class="mow">
		  <div class="mow-head"><?=$tentang;?></div>
		  <div class="row">
			<div class="col-12">
				<div class="mow-user">
					<span class="text-warning"><?=$dari?> </span>
					<span class="text-muted"> <?=$date?></span>
				</div>
				<p style="padding:10px 4px;"><?=$pesan?></p>
			</div><!--col-->
		  </div><!--row-->
		</div><!--mow-->

		  </div>
		  <?php
		if($jawaban)
		{ ?>
		  <div class="col-12">	
		<div class="mow">
			  <div class="mow-head text-danger">Admin</div>
		  <div class="row">
			<div class="col-12">
				<div class="mow-user">
					<span class="text-muted small"> <?=$terjawab?></span>
				</div>
				<p style="padding:10px 4px;"><?=$jawaban?></p>
			</div><!--col-->
		  </div><!--row-->
		</div><!--mow-->

		  </div>
		  <?php } ?>
		</div>
	  </div><!--container-->

	</main>
	
		<footer>
	  <div class="footer-forum">Copyright 2017 - All Right Reserved</div>
	</footer>
  </body>
</html>		