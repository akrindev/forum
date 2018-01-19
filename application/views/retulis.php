  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        	Mengedit
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Mengedit</li>
      </ol>
    </section>
	
	
    <!-- Main content -->
    <section class="content">
	  
	  <div id="single-post">
		<div class="box box-warning">
	  <div class="box-header with-border">
		<h3 class="box-title">Mengedit</h3>
	  </div>
	  <!-- /.box-header -->
	  <div class="box-body">
		<?= form_open('diskusi/retulis/'.$id);?>
		  <!-- text input -->
		  <div class="form-group">
			<label>Judul</label>
			<input type="text" name="edjudul" class="form-control" placeholder="Judulnya apa kak?" value="<?=$judul;?>"/>
			<?= form_error('edjudul','<div class="alert alert-danger">','</div>');
				?>
		  </div>

		  <!-- textarea -->
		  <div class="form-group">
			
			<label>Isi ...</label>
			<div class="btn-group pull-right">
			  <div id="b_btn" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-bold"></span></div>
			  <div id="i_btn" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-italic"></span></div>
			 <div id="url_btn" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-paperclip"></span></div>
			 <div id="img_btn" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-picture"></span></div>
			 <div id="yt_btn" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-film"></span></div>
			</div>
			<textarea name="edisi" class="form-control" id="subject_textarea" rows="7" placeholder="Isi . . ."><?=$isi;?></textarea>
			<?=form_error('edisi','<div class="alert alert-danger">','</div>');?>
		  </div>
		  
		  <div class="form-group">
			<label>Tags</label>
			<input type="text" name="tags" class="form-control" placeholder="pisahkan dengan koma" value="<?=$tag?>">
		  </div>
		  
		  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> kirim</button>
		</form>
	  </div>
	  <!-- /.box-body -->
	</div>
		</div>
		<!-- ending -->
    
<div class="box box-widget">
<div class="box-body">
  <h3> Baca sebelum menulis</h3>
<a href="/rules">Baca peraturan / rules </a>
<br>

<h3> Format penulisan </h3>
Beberapa tombol yang berada di atas area menulis<br>
input:
<div class="well">
this must be [b]Bold[/b]<br>
im [i]italic[/i]<br><br>

gambar <br>[img]<font color="red">https://rokoko-iruna.com/assets/img/iruna-indonesia-logo.png</font>[/img] <br><br>
<div class="text-muted">Url / link gambar lengkap dengan http dengan akhiran .jpg / .png / .jpeg / .gif </div><br><br>

membuat link ke [url]https://google.com[/url]
<br><br>

Embed video dari youtube https://youtu.be/<font color="red">EMRrsiVW9ao</font> <br>
  [youtube] <font color="red">EMRrsiVW9ao</font>[/youtube]

</div>
hasil:

<div class="well">
this must be <b>Bold</b><br>
im <i>italic</i><br><br>

gambar <img class="img-responsive pad" src="https://rokoko-iruna.com/assets/img/iruna-indonesia-logo.png" alt="logo"/><br>
membuat link ke <a href="https://google.com">https://google.com</a>

<br><br>
video akan di tampilkan dalam mode embed
</div>
</div>
</div>
	</section>
    <!-- /.content -->
    </div> 
  <!-- /.content-wrapper -->
  