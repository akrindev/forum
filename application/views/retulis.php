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
	</section>
    <!-- /.content -->
    </div> 
  <!-- /.content-wrapper -->
  