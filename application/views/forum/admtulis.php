
	<main>

	  <div class="container">

		<!--breadcrumb-->
		<div style="margin-top:10px"></div>
		<nav aria-label="breadcrumb" role="navigation">
		<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/">Forum</a></li>
		  <li class="breadcrumb-item active" aria-current="page">Tulis</li>
		</ol>
</nav>
	  
      <div class="post-titlee"><h3>Kontak admin</h3></div>
   		<!--<?php echo validation_errors(); ?>-->
<?php
if(!$this->session->userdata('user'))
		{
			echo 'Diperlukan login untuk menghubungi admin!!';
		}else{?>
		<div class="row">
		  <div class="col-12">
			<div class="propil">
			<?= form_open('user/kontak_admin');?>
			
			  <label for="tentang" class="float-left badge badge-pill badge-dark">Tentang</label>
			  <input type="text" class="form-log" name="tentang" placeholder="Tentang apa?"/>
              <?php if(form_error('tentang')) 
				{
		echo form_error('tentang','<div class="error-msg">','</div>');
}?>
	
			  <label class="float-left badge badge-pill badge-dark">Isi pesan</label>
     
			  <textarea class="form-log" name="pesan" placeholder=""></textarea>
			         <?php if(form_error('pesan')) {echo form_error('pesan','<div class="error-msg">','</div>');}?>
			  <p class="center-block"></p>
			
     <br/> 
			  <button type="submit" class="btn btn-outline-primary bll">Kirim</button>
			<?=form_close();?>
			</div>
		  </div><!--col-->


		</div><!--row-->

<?php } ?>
	  </div><!--comtainer-->

	</main><!--maiinnn-->

	<footer>
	  <div class="footer-forum">Copyright 2017 - All Right Reserved</div>
	</footer>
  </body>
</html>