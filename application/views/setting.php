  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        	Setting
      </h1>
      <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?=base_url();?>"><i class="fa fa-dashboard"></i><span itemprop="name"> Home</span></a></li>
        <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="active"><span itemprop="item"><span itemprop="name">Setting</span></span></li>
      </ol>
    </section>
    <section class="content">
    
	<div class="row">
		<div class="col-md-6">
			
	<div class="box box-danger">
		<div class="box-header">
			General
		</div>
		
		<div class="box-body">
			<?=form_open('user/setting_p',array('id'=>'setting-form'));?>
				<label for="image" class="label bg-blue">Photo profile</label>
				<p class="text-muted">avatar menggunakan gravatar ganti di <a href="http://gravatar.com">gravatar.com</a>
				</p>
		<div class="form-group">
			<input type="text" placeholder="Nama lengkap" class="form-control" name="sfullname" value="<?=$se['fullname'];?>"/>
				<?=form_error('sfullname');?>
		</div>
		<div class="form-group">
			<input type="text" class="form-control"  placeholder="ign" name="sign" value="<?=$se['ign'];?>"/>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" placeholder="kota" name="skota" value="<?=$se['kota'];?>"/>
				<?=form_error('skota');?>
		</div>
		<div class="form-group">
			<input type="email" placeholder="Email" class="form-control" name="semail" value="<?=$se['email']?>"/>
				<?=form_error('semail');?>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="fb" placeholder="contoh https://fb.com/irunaonline.en"/>
				<?=form_error('fb');?>
		</div>
		<div class="form-group">
			<textarea class="form-control" name="quotes"><?=$se['quotes'];?></textarea>
				<?=form_error('quotes');?>
		</div>
		<button type="submit" id="submit" class="btn bg-navy">ubah</button>
		</form>
		</div> <!--body-->
	</div><!--box-->
		
	</div><!--col-->
		
	<div class="col-md-6">
		<div class="box box-success">
			<div class="box-header">
					Password
			</div>
			<div class="box-body">
				<div class="mo"></div>
				
				<?=form_open('user/ch_pw',array('id'=>'pw-form'));?>
				<div class="form-group">
					  <input type="password" name="oldpw" class="form-control" placeholder="Old password"/>
				</div>
				<div class="form-group">
					  <input type="password" pattern=".{6,}" name="newpw" class="form-control" placeholder="New password (min. 7 karakter)"/>
				</div>
				
				  <button type="submit" id="submit" class="btn tt bg-navy">Ubah</button>
				  
			</form>
			<button onclick="location.reload();" style="display:none;" class="btn dd bg-navy">Refresh</button>
			</div>
		</div>
	</div>
	
	</div>
	</section>
    </div> 
  <!-- /.content-wrapper -->
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
	if(response.success == true)
	{
		$(".mo").html("<div class='alert alert-success'>Password telah di ubah!</div>");
      $(".tt").text("Ubah Password");
      $("#pw-form").hide();
 	} 
 	if(response.success== false)
 		{
				$(".mo").html("<div class='alert alert-danger'>Password gagal di ubah!</div>");
 		     $(".tt").hide();
 			$(".dd").show();
 		}
 
	}
	}
	$('#pw-form').ajaxForm(dat);

	</script>
	