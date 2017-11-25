
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
	  
      <div class="post-titlee"><h3>Tulis Catatan</h3></div>
   		<!--<?php echo validation_errors(); ?>-->

		<div class="row">
		  <div class="col-12">
			<div class="propil">
			<?= form_open('diskusi/tulis');?>
			  <label for="judul" class="float-left badge badge-pill badge-dark">Judul</label>
			  <input type="text" class="form-log" name="judul" placeholder="judul"/>
              <?php if(form_error('judul')) 
				{
		echo form_error('judul','<div class="error-msg">','</div>');
}?>
	  <label for="kategori" class="float-left badge badge-pill badge-dark">Arsip</label>
			  <select name="kategori" class="form-log">
				<?php 
				foreach($this->forum->get_kategori()->result() as $kat)
				{
					echo "<option value='$kat->id_kat'>$kat->kat</option>";
				}?>
			</select>
              <?php if(form_error('kategori')) 
				{
		echo form_error('kategori','<div class="error-msg">','</div>');
}?>
			  <label class="float-left badge badge-pill badge-dark">Isi Post</label>
     
			  <textarea class="form-log" name="isi" rows=5></textarea>
			         <?php if(form_error('isi')) {echo form_error('isi','<div class="error-msg">','</div>');}?>
			  <p class="center-block"></p>
			  <label for="tags" class="float-left badge badge-pill badge-dark">Tags</label><p class="float-left text-sm text-muted"> (optional)</p> 
			  <input type="text" class="form-log" name="tags" id="tags" value=""/><span style="font-size:10px" class="text-danger float-left">*pisahkan dengan koma ( , ) </span>
     <br/> 
			  <button type="submit" class="btn btn-outline-warning bll">Kirim</button>
			<?=form_close();?>
			</div>
		  </div><!--col-->


		</div><!--row-->


	  </div><!--comtainer-->

	</main><!--maiinnn-->

	
<script>
	$("#tags").tagsInput({
		 'height':'50px', 
   'defaultText':'add a tag'

});
	</script>
  