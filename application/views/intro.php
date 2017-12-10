 <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			【Introduction of Iruna Online】
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
			
			<li class="active">【Introduction of Iruna Online】</li>
		  </ol>
		</section>
<div class="row">
				<div class="col-md-8">
		<!-- Main content -->
		<section class="content">
			
		  <div id="single-post">
			
			<div class="box box-widget">
			  <div class="box-header with-border">
				<div class="section-header">
					<h4>【Introduction of Iruna Online】</h4>
				</div>
			  </div>
			  <!-- /.box-header -->
			
			  <div class="box-body">
				   <div style="margin-bottom:15px;" class="text-center"><div class="embed-responsive embed-responsive-16by9"> <iframe class="embed-responsive-item" width="400" height="315" src="https://www.youtube.com/embed/jsr8PI72Tq4" frameborder="0" allowfullscreen></iframe></div></div>
		
		  <div class="text-left">
			<img class="pull-right" src="http://iruna-online.com/img/new_img/img_graph_02.jpg" width=140 heigh=280/>
			<p class="small">
			  <b> "Iruna Online"</b>  adalah RPG online nomor satu (Peringkat 1 dalam kategori RPG yang dijalankan oleh NTT DoCoMo, Inc., perusahaan nomor satu untuk perangkat seluler di Jepang) untuk perangkat seluler yang dimainkan oleh lebih dari satu juta pengguna di Jepang. <b>"Iruna Online"</b> menampilkan grafis 3D, permainan kooperatif, dan chatting seperti pada RPG online PC. Rasakan petualangan seru di smartphone Anda dengan para pemain di seluruh dunia.
			</p>
<br/><br/>
			<p>
			  <img width=260 height=350 class="text-center" alt="iruna online" src="https://asobimo.com/corporate_us/wp-content/uploads/2017/06/20170613_iruna-4-318x565.png"/>
			</p>
			
			<h4 class="text-center"> [ Screenshot ] </h4>
			<p>

			  <img class="text-center img-responsive" alt="iruna online" src="https://asobimo.com/corporate_us/wp-content/uploads/2017/06/20170613_iruna-3-655x273.jpg"/><br/><br/>
			  <img class="text-center img-responsive" alt="iruna online" src="https://asobimo.com/corporate_us/wp-content/uploads/2017/06/20170613_iruna-9-655x387.jpg"/>
			  <br/><br/>
			  <img class="text-center img-responsive" alt="iruna online" src="https://asobimo.com/corporate_us/wp-content/uploads/2017/06/20170613_iruna-10-655x387.jpg"/><br/><br/>
			  <img class="text-center img-responsive" alt="iruna online" src="https://asobimo.com/corporate_us/wp-content/uploads/2017/06/20170613_iruna-11-655x368.jpg"/><br/><br/>
			  <img class="text-center img-responsive" alt="iruna online" src="https://asobimo.com/corporate_us/wp-content/uploads/2017/06/20170613_iruna-13-655x368.jpg"/><br/><br/>
			  
			</p>
			<hr>
			<h5>	Iruna Online Additional Information</h5>
			<p class="small">
			<b>Developer</b>: Asobimo Inc.<br/>
			<b>Publisher</b>: Asobimo Inc.<br/><br/>

			<b>Platforms: </b>iOS, Android<br/><br/>

			<b>Beta Release Date: </b>April 2012<br/>
			<b>Release Date (Android):</b> March 12, 2013<br/>
			<b>Release Date (iOS):</b> March 12, 2013<br/><br/>
			</p>
			<h3>Development History / Background:</h3>
<p class="small">
			Iruna Online is developed and published by Asobimo Inc., known for developing high quality mobile MMORPGs that include Avabel Online, Izanagi Online, and Toram Online. Iruna Online is notable for being one of the first MMORPGs ever made available on mobile devices, and has been downloaded over 1 million times. The game, along with many of Asobimo's other games, saw great success in Japanese markets and was translated for the Western audience in 2012, its beta beginning in April of that year. The game saw a release on Android and iOS platforms on March 12, 2013, and has continually been updated with events and new content.
</p>
			</div>
			  <!-- /.box-body -->
			</div>
			
			
			
		  </div>
	</section>
</div> <!--col-->
	<div class="col-md-4">
		<section class="content">
			<h4 style="display:block;"> Terakhir dikomentari </h3>
			<div class="box no-padding">
				  <div class="box-body no-padding">
						<ul class="nav nav-pills nav-stacked">
	<?php
                foreach($this->forum->get_recent_post_comment()->result() as $ost)
                { ?>
                	<li><a href="/forum/tl/<?=$ost->slug;?>" ><?=$ost->judul;?><br/><span class="text-muted small"><?=time_ago($ost->date);?> . dibaca: <?=$ost->dilihat;?></span></a> </li>
                
             <?php } ?>
						</ul>
				</div>
			  <!-- /.box-body -->
			</div>
			
	</div>
		  <!-- ending -->
		</div>
	</div> <!--row-->
		<!-- /.content -->
	  </div>