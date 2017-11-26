	<main>

	  <div class="container-fluid">
		
		
		<div class="rset text-center">
			<?php
			if($this->session->flashdata('gagal'))
			{
				echo "<div class='alert alert-danger'>";
				echo $this->session->flashdata('gagal');
				echo "</div>";
			}
			if($this->session->flashdata('sukses'))
			{
				echo "<div class='alert alert-success'>";
				echo $this->session->flashdata('sukses');
				echo "</div>";
			}
			
			echo form_error('email','<div class="alert alert-danger">','</div>');
			?>
		  <?=form_open('reset');?>
			<label>Verifikasi email</label>
			<input type="text" name="email" class="form-log"/>
			<button class="btn btn-primary bll" type="submit">kirim</button>
		  </form>
		  
		</div>
		
		
	  </div><!--container-->

	</main><!--maiinnn-->
