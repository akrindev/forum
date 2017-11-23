


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
			 <div class="col-12" style="width:400px;margin:10px auto;">
	      	<div class="propil" style="word-wrap:break-word">
<div class="setting">
	<?=form_open('user/setting_p',array('id'=>'setting-form'));?>
				<label for="image" class="badge badge-dark badge-pill">Photo profile</label>
				<p class="text-muted">avatar menggunakan gravatar ganti di <a href="http://gravatar.com">gravatar.com</a>
				</p><br/>
				
				<label for="sfullname" class="badge badge-pill badge-dark">Nama Lengkap</label>
				<input type="text" class="form-log" name="sfullname" value="<?=$se['fullname'];?>"/>
				<?=form_error('sfullname');?>
					<label for="sign" class="badge badge-pill badge-dark">Ign</label>
				<input type="text" class="form-log" name="sign" value="<?=$se['ign'];?>"/>
				<?=form_error('sign');?>
				<label for="sKota" class="badge badge-pill badge-dark">Kota</label>
				<input type="text" class="form-log" name="skota" value="<?=$se['kota'];?>"/>
				<?=form_error('skota');?>
				<label for="semail" class="badge badge-pill badge-dark">Email</label>
				<input type="text" class="form-log" name="semail" value="<?=$se['email']?>"/>
				<?=form_error('semail');?>
				<label for="fb" class="badge badge-pill badge-dark">Facebook</label>
				<input type="text" class="form-log" name="fb" placeholder="contoh http://fb.com/akrin22"/>
				<?=form_error('fb');?>
				
				
				<label for="quotes" class="badge badge-pill badge-dark">quote</label>
				<textarea class="form-log" name="quotes"><?=$se['quotes'];?></textarea>
				<?=form_error('quotes');?>
					
				<button type="submit" id="submit" class="btn btn-dark bll">kirim</button>
				<?=form_close();?><br/>
				<a href="#pww" rel="modal:open" class="btn btn-dark bll"> Ubah password </a>
			  </div>
			
			</div>
			</div>




		</div><!--row-->


	  </div><!--comtainer-->

	</main>

	<footer>
	  <div class="footer-forum">Copyright 2017 - All Right Reserved</div>
	</footer>
<div class="modaljs mdl" id="pww">
	<?=form_open('user/ch_pw',array('id'=>'pw-form'));?>
	  <h6 class="mdl-head">Ubah Password</h6>
	  <label for="oldpw" class="badge badge-dark badge-pill">Password lama</label>
	  <input type="password" name="oldpw" class="form-log"/>

	  <label for="newpw" class="badge badge-dark badge-pill">Password baru</label>
	  <input type="password" name="newpw" class="form-log"/>


	  <button type="submit" id="submit" class="btn tt btn-dark bll">Ubah</button>
	  <?=form_close();?>
	</div>
	<script src="http://malsup.github.com/jquery.form.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
	<script>
   
      
var dat = {
 	url: "<?= base_url('/user/ch_pw');?>",
 	type: 'post',
 	dataType:'json',
 	beforeSend: function(){
$(".tt").text("Sending...");
},
 	
success: function(response) {
	$(".modaljs.mdl").text(response.success);
	if(response.success == true)
	{
		$(".modaljs.mdl").text("Password berhasil di ubah!!");
      $(".tt").text("Ubah Password");

 	} 
 	if(response.success== false)
 		{
		$(".modaljs.mdl").html("Gagal mengubah password!!<br\/><a class=\"text-danger\" href=\"\/user\">ulangi<\/a>");
 		}
 
	}
	}
	$('#pw-form').ajaxForm(dat);

	</script>
	
  </body>
</html>