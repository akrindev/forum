<main>

	  <div class="container-fluid">

		<div class="none">
		  <div class="post-titlee"><h4>【Introduction of Iruna Online】</h4></div>
		  <div class="text-center mow"><div class="embed-responsive embed-responsive-16by9"> <iframe class="embed-responsive-item" width="400" height="315" src="https://www.youtube.com/embed/jsr8PI72Tq4" frameborder="0" allowfullscreen></iframe></div></div>
		<!--  <div class="text-center mow" style="clear:both;padding:2px;"><a href="https://play.google.com/store/apps/details?id=com.asobimo.iruna_en"><img width=48% height=12% src="https://play.google.com/intl/en_us/badges/images/generic/en_badge_web_generic.png" class="float-sm-left"/></a>
			<a href="https://itunes.apple.com/us/app/rpg-iruna-online-mmorpg/id669929173?mt=8"><img width=48% height=10% src="http://pluspng.com/img-png/download-on-app-store-png-how-to-download-the-app-1945.png" class="float-sm-right"/></a></div>
-->
		  <div class="text-left mow">
			<img class="float-right" src="http://iruna-online.com/img/new_img/img_graph_02.jpg" width=140 heigh=280/>
			<p class="small">
			  <b> "Iruna Online"</b>  adalah RPG online nomor satu (Peringkat 1 dalam kategori RPG yang dijalankan oleh NTT DoCoMo, Inc., perusahaan nomor satu untuk perangkat seluler di Jepang) untuk perangkat seluler yang dimainkan oleh lebih dari satu juta pengguna di Jepang. <b>"Iruna Online"</b> menampilkan grafis 3D, permainan kooperatif, dan chatting seperti pada RPG online PC. Rasakan petualangan seru di smartphone Anda dengan para pemain di seluruh dunia.
			</p>
<br/><br/>
			<p>
			  <img width=260 height=350 class="text-center" alt="iruna online" src="https://asobimo.com/corporate_us/wp-content/uploads/2017/06/20170613_iruna-4-318x565.png"/>
			</p>
			
			<h4 class="text-center"> [ Screenshot ] </h4>
			<p>

			  <img class="text-center img-fluid" alt="iruna online" src="https://asobimo.com/corporate_us/wp-content/uploads/2017/06/20170613_iruna-3-655x273.jpg"/><br/><br/>
			  <img class="text-center img-fluid" alt="iruna online" src="https://asobimo.com/corporate_us/wp-content/uploads/2017/06/20170613_iruna-9-655x387.jpg"/>
			  <br/><br/>
			  <img class="text-center img-fluid" alt="iruna online" src="https://asobimo.com/corporate_us/wp-content/uploads/2017/06/20170613_iruna-10-655x387.jpg"/><br/><br/>
			  <img class="text-center img-fluid" alt="iruna online" src="https://asobimo.com/corporate_us/wp-content/uploads/2017/06/20170613_iruna-11-655x368.jpg"/><br/><br/>
			  <img class="text-center img-fluid" alt="iruna online" src="https://asobimo.com/corporate_us/wp-content/uploads/2017/06/20170613_iruna-13-655x368.jpg"/><br/><br/>
			  
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

		</div>
<div style="margin:10px 3px;">

 <div class="zone">Aktifitas terakhir forum</div>
                	<?php
                foreach($this->forum->get_recent_post_comment()->result() as $ost)
                { ?>
           <a href="/forum/tl/<?=$ost->slug;?>" class="post"> <?=$ost->judul;?> <div class="post-info"><?=time_ago($ost->date);?> . dibaca: <?=$ost->dilihat;?></div></a> 
           <?php } ?>
</div>
	  </div>
	  <!--container-->
	</main>