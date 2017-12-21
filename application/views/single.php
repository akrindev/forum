  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb" itemscope="itemscope" itemtype="http://schema.org/BreadcrumbList">
        <li itemscope="itemscope" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?=base_url();?>"><i class="fa fa-dashboard"></i><span itemprop="name"> Home</span></a></li>
   <li itemscope="itemscope" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?=base_url();?>forum"><span itemprop="name"> forum</span></a></li>
        <li itemscope="itemscope" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?= base_url('arsip/'.$kategori);?>"><span itemprop="name"><?=$kategori;?></span></a></li>
        <li itemscope="itemscope" itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="active"><span itemprop="item"><span itemprop="name"><?=$judul;?></span></span></li>
      </ol>
    </section>
	
	
    <!-- Main content -->
    <section class="content">
	  <article itemscope='itemscope' itemtype='http://schema.org/BlogPosting'>
	<link href='<?=current_url();?>' itemprop='mainEntityOfPage'/>
	  <div id="single-post">
		<h1 class='post-title entry-title' itemprop='headline'>
<?=$judul;?>
</h1>
		<div class="tags" style="margin:5px 0;">
			 <span class="glyphicon glyphicon-tags"></span>&nbsp; 
		 <?php
            foreach($tags as $key => $value)
            {
            	echo '<a href="#" data-toggle="tooltip" data-placement="top" title="'.$value.'" class="badge badge-pill bg-warning">'.$value.' </a>&nbsp;' ;
            }
            ?>
            	</div>
	  <div class="box box-widget">
		
		<div class="box-header with-border">
		  <div class="user-block">
<div itemprop='author' itemscope='itemscope' itemtype='https://schema.org/Person'
>
	<span content='<?=base_url('profile/'.$username);?>' itemprop='url'></span>
			<img class="img-circle" src="<?=$this->gravatar->get($email);?>" alt="User Image">
			<span data-author="<?=$username;?>" class="username"><a href="<?=base_url('profile/'.$username);?>">@<span itemprop='name'><?=$username;?></span></a></span>
			</div>
			<span itemprop='publisher' itemscope='itemscope' itemtype='https://schema.org/Organization'>
			<span itemprop='logo' itemscope='itemscope' itemtype='https://schema.org/ImageObject'>
<span content='<?=base_url()?>logo.jpg' itemprop='url'></span>
<span content='600' itemprop='width'></span>
<span content='60' itemprop='height'></span>
</span>
<span content='Rokoko Iruna Online Forum Indonesia' itemprop='name'></span>
</span>
			<span content='<?=current_url();?>' itemprop='url'></span>
			<span class="description post-meta"><abbr content='<?=$date;?>' itemprop='datePublished dateModified' title='<?=$date;?>'><?=pisah_waktu($date);?> </abbr><span class="glyphicon glyphicon-tag"></span><?=$kategori;?></span>
		  </div>
		  <div class="box-tools">
			<i class="glyphicon glyphicon-eye-open"></i> <?=$dilihat;?> <i class="glyphicon glyphicon-comment"></i> <?=$coco;?>
		</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
		
			<?=$isi;?>
			
			<p>
				<?php
				if($this->session->userdata('level') == 'admin'){ ?>
				<?php
				if($banned == 'n'){ ?>
				<a class="text-danger small" onclick="return 							 confirm('yakin ingin membanned?')" href="/miemin/banned_post/y/<?=$id?>">banned</a> 
<?php } else { ?>
	<a class="text-success small" href="/miemin/banned_post/n/<?=$id?>">bebaskan</a> 
	<?php } ?> |
		<?php
if($pinned == 1){ ?>
<a class="text-success small" onclick="return confirm('Pinned?')" href="/miemin/pinned/0/<?=$id?>">pinned</a> 
<?php } else { ?>
	<a class="text-danger small" href="/miemin/pinned/1/<?=$id?>">unpinned</a> 
	<?php } ?>
<?php } ?>
	</p>
		</div>
		<!-- /.box-body -->
	  </div>
	  </div>
	  
</article>
	  <!-- komen start -->
		
<?php
		if(!$k)
		{
			echo "";
		}else{
			foreach($k as $r)
			{?>
	  <div class="box box-widget">

		<div class="box-header with-border">
		  <div class="user-block">
			<img class="img-circle" src="<?=$this->gravatar->get($r->email);?>" alt="User Image">
			<span class="username"><a href="<?=base_url('profile/'.$r->username);?>">@<?=$r->username?></a></span>
			<span class="description"><?=pisah_waktu($r->date);?></span>
		  </div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
		<?= $this->bbcode->bbcode_to_html($r->isi);?>
 <?php
if($this->session->userdata('level') == 'admin') 
{ 
echo "<br/><br/><a class='text-danger' href='/miemin/komdel/$r->koid'>hapus</a>"; }
 ?>
		</div>
		<!-- /.box-body -->
	  </div>
	  <?php } } ?>
	    <?php
 		//jika ada sesi user
		 if($this->session->userdata('user') != ''){

		if($banned != 'y'){
		?>
		<!--form komentarmu-->
	<div class="box box-widget">
		<div class="box-header with-border">
			Komentari
		</div>
		<div class="box-body">
			     <?= form_open("diskusi/komentar/$slug",array('id'=>'comment_form','name' => 'comment_form'));?>
<div class="btn-group pull-right">
			  <div id="b_btn" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-bold"></span></div>
			  <div id="i_btn" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-italic"></span></div>
			 <div id="url_btn" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-paperclip"></span></div>
			 <div id="img_btn" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-picture"></span></div>
			 <div id="yt_btn" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-film"></span></div>
			</div>
			<textarea style="display:block;border:1px solid #ddd;padding:7px;width:99%;margin-bottom:10px;" rows=4 class="form-log" id="subject_textarea" name="isi" placeholder="mau komentar kak?" title="minimal 5 karakter"  required="required"></textarea>
  	<input type="hidden" name="idtl" value=<?=$id;?> />
				
			<button type="submit" class="btn btn-primary">kirim</button>

			</form>
		</div>
	</div>

<script type="text/javascript">
var form = new Validator("comment_form");
form.addValidation('isi','minlen=5','Minimal 5 karakter kak');
</script>

		<!--endkomentarmu-->
		
		  <?php
			}
			else {	?>
				
				<div class="col-xs-12"><div class="nokomen">Komentar telah di nonaktifkan</div> </div>
		<?php
				}

 } else {?>
<a href="<?=base_url('login');?>" class="btn bg-maroon btn-block">Masuk untuk berkomentar</a>
<?php } ?>
		<!-- ending -->
<a href="/forum" title="back to forum" class="btn bg-navy btn-block">Back to forum</a>
	</section>
    <!-- /.content -->
    </div> 
  <!-- /.content-wrapper -->
