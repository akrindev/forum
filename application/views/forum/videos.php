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


			<div class="row">
				<div class="col-12">
					<?=
					form_open('fitur/youtube');?>
					judul:<input type="text" name="judul"/><br/>
					url:<input type="text" name="link"/><br/>
					Deskripsi:<br/><textarea cols=9 rows=3 name="isi"></textarea>
					<button type="submit" class="btn btn-warning">kirim</button>
					<?php
					form_close();?>
					
					</div>
			  <div class="col-12">


				<div class="post-single-v">

				  <div class="post-header">
					<div class="post-title"><h3>Maze tutorial 1-100</h3></div>
					<div class="post-info"><i class="glyphicon glyphicon-user"></i> <span class="badge badge-pill badge-dark small"> amin</span> <i class="glyphicon glyphicon-calendar"></i> 
					<span class="post-date">29 oktober 2017 18:15</span> 
					<i class="glyphicon glyphicon-comment"></i> 3 <i class="glyphicon glyphicon-eye-open"></i> 43</div>
				  </div><!--post header-->
				  <div class="post-isi">
					<p>katakan sesuatu disini</p>
			              <div class="embed-responsive embed-responsive-1by1">
							<iframe src="https://www.youtube.com/embed/T5hs7jh2900?rel=0" class="embed-responsive-item" allowfullscreen></iframe>
						  </div>
						  
						  
						  <table class="table table-hover table-bordered table-sm">
							<tr>
							  <th>Di unggah</th>
							  <td>2017-07-06 10:43</td>
							</tr>
							<tr>
							  <th>Judul</th>
							  <td>Iruna Online: HW vs Master SAURO 400 [story]</td>
							</tr>
							<!--<tr>
							  <th>Deskripsi</th>
							  <td>Story of master sauro... \n\nSauro update lv 400\n\nhow old is he?\nWhere did he come from?\n\nThis sauro is good ('-')// i like it\nSauro xtall stats:\nMaxHP+20% MaxMP+20%, Exp+5%. On weapon, ATK+15% MATK+20%, Melee&Magic; pierce +5%</td>
							  
							</tr>-->
							<tr>
							  <th>Oleh</th>
							  <td>Akarinrin が大好き</td>
							</tr>
							<tr>
							  <th>Durasi</th>
							  <td>4M 4S</td>
							</tr>
							<tr>
							  <th>Dilihat</th>
							  <td>1927</td>
							</tr>
						  </table>
				  </div>
				</div><!--post-->
			  </div><!--col-->

			  <!--
			  FORM KOMENTAR
			  -->

			  <div class="col-12">
				<div class="nothing">
				  <div class="commentar">
					<div class="commentar-title">
					  <h5> Komentar</h5>
					</div>
					<div class="commentar-list">
					  <ul>
						<li>
						  <span class="c-user">amin</span> 
						  <span class="c-isi">yeeeyyyy jadiii</span>
						  <span class="c-time">— 2017-10-29 18:15:55</span>
						</li>
						<li>
						  <span class="c-user">amin</span> 
						  <span class="c-isi">ceckkk
						  </span>
						  <span class="c-time">— 2017-10-30 00:14:41</span>
						</li>
						<li>
						  <span class="c-user">amin</span> 
						  <span class="c-isi">tea</span>
						  <span class="c-time">— 2017-10-30 03:09:41</span>
						</li>
						<li>
						  <span class="c-user">amin</span> 
						  <span class="c-isi">yes 222</span>
						  <span class="c-time">— 2017-10-30 03:23:11</span>
						</li>
						<li>
						  <span class="c-user">amin</span> 
						  <span class="c-isi">mntp njer :v</span>
						  <span class="c-time">— 2017-10-30 03:23:23</span>
						</li>
						<li>
						  <span class="c-user">amin</span> 
						  <span class="c-isi">up up :v</span>
						  <span class="c-time">— 2017-10-30 03:23:39</span>
						</li>
						<li>
						  <span class="c-user">amin</span> 
						  <span class="c-isi">e.e</span>
						  <span class="c-time">— 2017-10-30 03:23:56</span>
						</li>
						<li>
						  <span class="c-user">amin</span> 
						  <span class="c-isi">Cek 123</span>
						  <span class="c-time">— 2017-10-30 03:26:55</span>
						</li>
						<li>
						  <span class="c-user">amin</span> 
						  <span class="c-isi">Cek komentar panjanfs acgfsxcfdcfrdcdss dssxfswsdcfdssf fsschfsxxv FDD
							ddddddddddddddddddddddddddddddddddddddddddddddddddddddd</span>
						  <span class="c-time">— 2017-10-30 03:27:54</span>
						</li>
						<li>
						  <span class="c-user">xenolog</span> 
						  <span class="c-isi">:'v</span>
						  <span class="c-time">— 2017-10-31 19:17:12</span>
						</li>
					  </ul>
					</div>
				  </div>
				</div>
			  </div> <!-- col -->


			  <div class="col-12">
				<div class="komentar-form">


				  <form action="http://inko-chan.net/forum/tl/sekali-lagi-plis" id="comment_form" method="post" accept-charset="utf-8">
					<input type="hidden" name="csrf_iruna_name" value="fff6dc600e2d9d8df100e0387355224a" />                                     

					<div class="badge badge-dark">komentar</div>
					<div class="komentar-form-isi">
					  <textarea id="comment_text" class="form-isi" name="isi" cols=7></textarea>
					</div>	

					<input type="hidden" name="idtl" value=14 />

					<button type="submit" name="submit" id="submit" class="btn btn-outline-primary">kirim</button>

				  </form>              	

				</div><!--komentar-->
			  </div><!--col xs 12-->
			</div><!--row-->


		  </div><!--comtainer-->

		</main><!--maiinnn-->

		<footer>
		  <div class="footer-forum">Copyright 2017 - All Right Reserved</div>
		</footer>


<script type="text/javascript">
$(document).ready(function(){


 	var terbit = $('#terbit').val();
 if(terbit == "ok")
 {
		$.iaoAlert({ 
			msg: "Posting telah diterbitkan!!", 
			type: "success", 
			mode: "dark",
			autoHide: true, 
			alertTime: "8000", 
			fadeTime: "1000", 
			closeButton: true, 
			closeOnClick: true, 
			fadeOnHover: false, 
			position: "top-right", 
			zIndex: "999" 
		});
 		
	};
 	var data = {
 	url: "http://inko-chan.net/diskusi/komentar/sekali-lagi-plis",
 	beforeSend: function(){
 		
 		$("#submit").text("Sending...");
 	},
 	
 	success: function(){
 	$('.nothing').load("http://inko-chan.net/diskusi/c/14");
		$.iaoAlert({ 
			msg: "Komentar berhasil ditambahkan!!", 
			type: "success", 
			mode: "light",
			 autoHide: true, 
			alertTime: "5000", 
			fadeTime: "1000", 
			closeButton: false, 
			closeOnClick: true, 
			fadeOnHover: true, 
			position: "top-right", 
			zIndex: "999" 
		});
 		
 		
 		$('#submit').text("kirim");
 	 	
		 },
		
		
	  resetForm: true,
	 };
	
	$('#comment_form').ajaxForm(data);
        
        
/*
 $('.coli').load("http://inko-chan.net/diskusi/c/14");
 */
});

        
		
</script>
	  </body>
	</html>