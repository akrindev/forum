<main>

	  <div class="container-fluid">

		<!--breadcrumb-->
		<div style="margin-top:10px"></div>
		<nav aria-label="breadcrumb" role="navigation">
		  <ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/forum">Forum</a></li>
			<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
		  </ol>
		</nav>


		<div class="row">
			 <div class="col-sm-12 col-md-5">
	      	<div class="propil" style="word-wrap:break-word">
<div class="setting">
	<?=form_open('user/setting_p');?>
				<label for="image" class="badge badge-dark badge-pill">Photo profile</label>
				<p class="text-muted">avatar menggunakan gravatar ganti di <a href="http://gravatar.com">gravatar.com</a>
				</p><br/>
				
				<label for="fullname" class="badge badge-pill badge-dark">Nama Lengkap</label>
				<input type="text" class="form-log" name="fullname" value="<?=$se['fullname'];?>"/>
				<?=form_error('fullname');?>
					<label for="ign" class="badge badge-pill badge-dark">Ign</label>
				<input type="text" class="form-log" name="ign" value="<?=$se['ign'];?>"/>
				<?=form_error('ign');?>
				<label for="Kota" class="badge badge-pill badge-dark">Kota</label>
				<input type="text" class="form-log" name="kota" value="<?=$se['kota'];?>"/>
				<?=form_error('kota');?>
				<label for="email" class="badge badge-pill badge-dark">Email</label>
				<input type="text" class="form-log" name="email" value="<?=$se['email']?>"/>
				<?=form_error('email');?>
				<label for="fb" class="badge badge-pill badge-dark">Facebook</label>
				<input type="text" class="form-log" name="fb" placeholder="contoh http://fb.com/akrin22"/>
				<?=form_error('fb');?>
				
				
				<label for="quote" class="badge badge-pill badge-dark">quote</label>
				<textarea class="form-log" name="quotes"><?=$se['quotes'];?></textarea>
				<?=form_error('quotes');?>
				<button type="submit" class="btn btn-dark bll" id="submit">kirim</button>
				<?=form_close();?>
			  </div>
			
			</div>
			</div>
			  <div class="col-sm-12 col-md-7">
			<div class="propil-top">
			  <div class="jdl"><?=$se['username'];?>'s topics</div>
			  <div class="list-propil-p">
				<?php
				foreach($this->user->get_user_post("timeline",$se['id'])->result() as $put)
				{
					?>
				<a class="list-group-i" href="/forum/tl/<?=$put->slug;?>"><?=$put->judul;?><br/><span class="waktu"><?=$put->date;?></span></a>
				<?php } ?>
			  </div>
			</div>
		  </div>



		</div><!--row-->


	  </div><!--comtainer-->

	</main>

	<footer>
	  <div class="footer-forum">Copyright 2017 - All Right Reserved</div>
	</footer>

  </body>
</html>