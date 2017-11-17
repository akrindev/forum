
	<main>

	  <div class="container-fluid">

		<!--breadcrumb-->
		<div style="margin-top:10px"></div>
		<nav aria-label="breadcrumb" role="navigation">
		  <ol class="breadcrumb" itemscope="" itemtype="http://schema.org/
			BreadcrumbList">
			<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><span itemprop="item"><a href="/" itemprop="name">Home</a></span></li>
			<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="divider">/</li>
			
			<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?= base_url('arsip/'.$kategori);?>"><span itemprop="name"><?=$kategori?></span></a></li>
			<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="divider">/</li>
			
			<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="active"><span itemprop="item" itemprop="name"><?=$judul;?></span></a></li>
		  </ol>
		</nav>


		<div class="row">
		  <div class="col-12">
			Tags:
            <?php
            foreach($tags as $key => $value)
            {
            	echo '<a href="#" title="'.$value.'" class="badge badge-pill badge-warning">'.$value.' </a>&nbsp;&nbsp;' ;
            }
            ?>
            <?php
  if($this->session->flashdata('post_terbit'))
{ ?>
	
		<input type="hidden" id="terbit" value="ok"/>
		<?php
	
}?>
        <div class="post-titlee"><h3><?=$judul?></h3></div>
	      	<div class="post-single">
			   
		      <div class="post-header">
		        
				<div class="post-info"><div class=""><img style="height:40px;width:40px" class="u-img" src="<?=$this->gravatar->get($email);?>"/></div> <b>Oleh:</b><span data-author="<?=$username?>"> <a href="<?=base_url('profile/'.$username);?>">@<?=$username?></a></span> <b>Pada:</b><span class="post-date"> <?=pisah_waktu($date);?></span> <br/><b>Komen:</b> <?=$coco;?> <b>Dibaca:</b> <?=$dilihat;?> <b>Arsip:</b> <a href="<?= base_url('arsip/'.$kategori);?>"><?=$kategori?></a></div>
	    	  </div><!--post header-->
			  <div class="post-isi" data-description="<?=character_limiter($isi,160);?>">
				<p><?=$isi?></p>
				<div id="sharing" class="sharing">
					
					</div>
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
	   <h5> Comments</h5>
	   </div>
	   <div class="commentar-list">
		 <ul>
			<?php
			if($this->session->flashdata('nokomen')){
				echo '<li>'.$this->session->flashdata('nokomen').'</li>';
				}
			?>
			<?php
			foreach($k as $r)
			{?>
			<li id="<?=$r->koid;?>">
						  <div class="c-head">
							
							<div class=""><img style="height:40px;width:40px" class="u-img" src="<?=$this->gravatar->get($r->email);?>"/></div><div class="u-c">
						  <span class="c-user"><a href="<?=base_url('profile/'.$r->username);?>">@<?=$r->username?></a></span> 
						  
						  <span class="c-time"><?=pisah_waktu($r->date);?></span>
						<div class="reply">#<?=$r->koid;?></div>
							  </div>
						  </div>
						  <p class="c-isi"><?= $this->bbcode->bbcode_to_html($r->isi);?></p>
						</li>
		<?php }?>
</ul>
</div>
</div>
</div>
</div> <!-- col -->
		  <?php
 		//jika ada sesi user
		 if($this->session->userdata('user') != ''){?>
			
			
		  <div class="col-12">
			<div class="komentar-form">
				
				
              <?= form_open("diskusi/komentar/$slug",array('id'=>'comment_form'));?>
              	
              <div class="badge badge-dark">komentar</div>
			  <div class="komentar-form-isi">
				<textarea id="isi" class="form-isi" name="isi" minlength="5" cols=7></textarea>
				</div>	
              
			  	<input type="hidden" name="idtl" value=<?=$id;?> />
				
			  <button type="submit" name="submit" id="submit" class="btn btn-outline-primary">kirim</button>   <button type="reload" id="reload" class="btn btn-sm btn-outline-danger" onclick="javascript:location.reload(true);">reload</button>
			<span class="req text-danger"></span>
              <?= form_close();?>
              	
              
			</div><!--komentar-->
		  </div><!--col xs 12-->
		  <?php } else {?>
<div class="col-xs-12"><div class="nokomen"> <a href="<?=base_url('login');?>">Masuk</a> untuk berkomentar</div> </div>
<?php } ?>
		  </div><!--row-->
		  
		  
		</div><!--comtainer-->

	</main><!--maiinnn-->

	<footer>
	  <div class="footer-forum">Copyright 2017 - All Right Reserved</div>
	</footer>
	
	<script type="application/ld+json">
	{
  "@context": "http://schema.org", 
 "@type": "Article",
 "headline": "<?=$judul;?>",
 "image": "http://i.cubeupload.com/a6W64O.jpeg",
 "author": "<?=$username;?>", 
 "mainEntityOfPage": {
         "@type": "WebPage",
         "@id": "<?=current_url();?>"
      },
 "genre": "<?=$kategori;?>", 
 "keywords": "<?=$value;?>",
 "publisher": "Iruna Notes Publisher Inc",
 "url": "<?=current_url();?>",
 "datePublished": "<?=$date;?>",
 "dateCreated": "<?=$date;?>",
 "dateModified": "<?=$date;?>",
 "description": "<?=character_limiter($isi,160);?>",
 "articleBody": "<?=$isi;?>"
 }
</script>
    
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
	
	    <script type="text/javascript">
$(document).ready(function(){

$(".tangkap").click(function(e){
	e.preventDefault();
	
		var m = $(this);
				var y = m.attr("href");
				var f = $("li"+y);
				var a = f.clone();
				m.after(a).slideDown("slow");
				m.hide();
})

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
 		
	}
	
	$('#comment_form').submit(function(e){
	e.preventDefault();
	var aku = $(this);
	
 $.ajax({
 	url: aku.attr("action"),
 	dataType: 'json',
 	data: aku.serialize(),
 	type: 'post',
 	beforeSend: function(){
$("#submit").text("Sending...");
},
 	
success: function(response) {
		$("#submit").text("kirim");
				if (response.success == true) {
				$('.nothing').load("<?=base_url('diskusi/c/'.$id);?>");
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
 		aku[0].reset();
				}
				else {
							$("#submit").text("kirim");
					$.each(response.msg, function(key, value) {
						var element = $('#' + key);
						
						element.after(value);
					});
				}
			}
		
		
	 
	 })
	})
        
        
/*
	$('.coli').load("<?=base_url('diskusi/c/'.$id);?>");
	*/
	/*
	
	$('#comment_form').submit(function(e) {
		e.preventDefault();

		var me = $(this);
	$("#submit").text("Sending...");
		// perform ajax
		$.ajax({
			url: me.attr('action'),
			type: 'post',
			data: me.serialize(),
			dataType: 'json',
			success: function(response) {
				if (response.success == true) {
						$('.nothing').load("<?=base_url('diskusi/c/'.$id);?>");
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
		me[0].reset();
 			$("#submit").text("kirim");
				}
				else {
					$.each(response.msg, function(key, value) {
						var element = $('#' + key);
						
						element.after(value);
					});
				}
			}
		});
	});
	*/
	$("#sharing").jsSocials({
    showLabel: false,
    showCount: false,
    shares: ["email", "twitter", "facebook", "googleplus", "whatsapp"]
});
});

        
		
</script>


  </body>
</html>