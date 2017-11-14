<main>

		  <div class="container-fluid">

			<!--breadcrumb-->
			<div style="margin-top:10px"></div>
			<nav aria-label="breadcrumb" role="navigation">

			  <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/forum">Forum</a></li>
				<li class="breadcrumb-item"><a href="/videos">videos</a></li>
				<li class="breadcrumb-item active" aria-current="page">maze</li>
			  </ol>
			</nav>
			<?php
			if($this->session->userdata('iduser'))
			{
				?>
				
			<div class="row">
			  <div class="col-12">
				<?=form_open('diskusi/tulis_img' ,array('class'=>'form'));?>
				
				  <label class="badge badge-dark" for="url">Url</label>
				  <input type="text" class="form-log" id="url" name="url" placeholder="termasuk http://"/>
				<?php echo form_error('url'); ?>
				  <label class="badge badge-dark" for="isi">Deskripsi singkat</label>
				  <textarea class="form-log" name="isi" placeholder="max 140 character" id="isi"></textarea>
				<?php echo form_error('isi'); ?>
					<button type="submit" class="btn btn-dark bll">kirim</button><br/>
					<button type="button" class="btn btn-dark bll" data-toggle="modal" data-target="#unggahModal">
						Unggah disini
				  </button>
				  <?=form_close();?>
					
				</div>
			
			</div>
<?php } ?>

			<div class="wrapper">
			  

                <div class="row">
                	     <?php foreach($image as $img){?>
				  <div class="col-sm-12 col-md-6">
					
					<div class="card cad">
					  <div class="caa">
						<div>

						  <div class=""><img class="u-img" src="<?=$this->gravatar->get($img->email);?>"/></div><div class="u-c">
							<span class="c-user">@<?=$img->username;?></span> 

							<span class="c-time"><?=$img->date;?></span>
						  </div>
						</div>
					  </div>
					  <div class="image">
						<img class="img-fluid" onerror='this.src="http://i.imgur.com/bQ3ZTii.png"' src="<?=$img->url;?>" data-url="<?=$img->url;?>"/>
						<div class="img-caption"><?=time_ago($img->date);?></div>
					  </div>
					  <div class="card-footer bg-white">
					<?=$img->isi;?>
					  </div>
					</div>
					
				  </div><!-- Col-12 -->
				  <?php } ?>
				</div><!-- Row -->
				
				<!--post-->
			  </div><!--col-->
				


		  </div><!--comtainer-->

		</main><!--maiinnn-->

		<footer>
		  <div class="footer-forum">Copyright 2017 - All Right Reserved</div>
		</footer>
		
		
<script>
// If missing.png is missing, it is replaced 
$( "img" )
  .error(function() {
    $( this ).attr( "src", "http://i.imgur.com/bQ3ZTii.png" );
  })
  .attr( "src", "http://i.imgur.com/bQ3ZTii.png" );

		</script>
		
		
<div class="modal fade" id="unggahModal" tabindex="-1" role="dialog" aria-labelledby="unggahModel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Upload image</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
<div class="modal-body">
<div class="card">
	<div class="card-body">
	<h4>Tutorial </h4>
	1. Chose image to upload<br/>
	2. click upload now<br/>
	<img style="width:200px;height:150px;" src="https://i.imgur.com/B9TeREs.png" alt="tutorial"/><br/>
	3. copy img url <br/>
	<img style="width:200px;height:150px;" src='https://i.imgur.com/96qtSy5.png' />
	<br/>
	4. paste url and click kirim<br/>
	<img style="width:200px;height:150px;" src='https://i.imgur.com/2dst9Qk.png' />
	<br/>
	
	another image hosting <a href="https://ctrlq.org/images/" alt="img hosting"/>CTRLQ.org</a> <a href="https://cubeupload.com/">cubeupload.com</a>
	</div>
	</div>
	<script type="text/javascript">
tinypic_layout = 'narrow';
tinypic_type = 'images';
tinypic_links = 'url';
tinypic_language = 'en';
tinypic_search = 'false';
tinypic_autoload = false;
</script>
			<script src="http://plugin.tinypic.com/j/plugin.js" type="text/javascript"></script>
			<input type="button" class="btn btn-dark" value="Click here!!" onclick="javascript:showTinypicPlugin();"/><br/>
			<script src="http://plugin.tinypic.com/j/plugin.js" type="text/javascript"></script>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			
		  </div>
		</div>
	  </div>
	</div>