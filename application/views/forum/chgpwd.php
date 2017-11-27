	<main>

	  <div class="container-fluid">
		
		
		<div class="rset text-center">
		  <?=form_open('');?>
			<label>Password baru</label>
			<input type="password" name="password" class="form-log"/>
			<?=form_error('password','<div class="alert alert-danger">','</div>');?>
			<label>Ulangi Password</label>
			<input type="password" name="repassword" class="form-log"/>
			<?=form_error('repassword','<div class="alert alert-danger">','</div>');?>
			<button class="btn btn-primary bll" type="submit">Ubah password</button>
		  </form>
		  
		</div>
		
		
	  </div><!--container-->

	</main><!--maiinnn-->
