
	<main>
	  
	  <div class="container-fluid">
		
		<!--breadcrumb-->
		<div style="margin-top:10px"></div>
		<nav aria-label="breadcrumb" role="navigation">
		  <ol class="breadcrumb" itemscope="" itemtype="http://schema.org/
			BreadcrumbList">
			<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><span itemprop="item"><a href="/" itemprop="name">Home</a></span></li>
			<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="divider">/</li>
			
			<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem" itemprop="item"><span itemprop="name"><?=$nmarsip?></span></li>
			
		  </ol>
		</nav>
		
		
		
		
	    <div class="row">
		  <div class="col-12">
			<div class="cari-form">
				<?=form_open('diskusi/cari');?>
			  <input type="text" name="cari" class="in-cari" placeholder="Cari sesuatu . . ."/>
			  <button type="submit" class="b-cari">cari</button>
			</form>
			</div>
		  </div>
		</div>
	  
	  
	 	<div style="margin-top:10px"></div>
		<div class="row">
			
         <div class="col-12 col-md-7">
           <div class="zone">Arsip: <?=$nmarsip;?></div>    
     <?php if($arsip){
		foreach($arsip as $post){?>
     	
       <?php    $coco = $this->forum->get_comment_count($post->iid)->result();
?>
     
		<a class="post" href="<?php echo base_url()?>forum/tl/<?=$post->slug?>">
	      
		        <div class="post-title"><h4><?php echo $post->judul ?></h4></div>
				<div class="post-info"><b>By:</b> <span class="author small"> <?php echo $post->username ?></span> <b>.</b> <span class="timeago"><?php 
echo time_ago($post->date); 
?></span> . <b>dilihat:</b> <?=$post->dilihat;?>      <?php
foreach($coco as $coc)
      { 
      echo '<b>balasan:';
	echo "</b> ". $coc->c;
      }
?></div>
	    
		</a>
		  <?php } 
  }else{
  	echo "Belum ada data dalam arsip ini";
  }
?>
	<div class="pagination">
<ul>
	<?php
	foreach($links as $link)
	{ 
		echo $link;
	}
	?>
</ul>
</div>
           </div><!--col-->
		 <div class="col-12 col-md-5">
           <div class="zone">Terakhir di komentari</div>
                	<?php
                foreach($this->forum->get_recent_post_comment()->result() as $ost)
                { ?>
           <a href="/forum/tl/<?=$ost->slug;?>" class="post"> <?=$ost->judul;?> <div class="post-info"><?=time_ago($ost->date);?> . dibaca: <?=$ost->dilihat;?></div></a> 
           <?php } ?>
           	
                      <!--arsip-->
           	  <div style="margin-top:10px">
				<div class="dropdrop">
		<div class="drop-head">Arsip <span>+</span></div>
		<div class="drop-body">
		  <div id="arsip menu" class="liest">
			<?php
			foreach($this->forum->get_kategori()->result() as $kate)
			{
				
			  echo "<a title=\"$kate->kat\" href=\"/arsip/$kate->kat\"> $kate->kat</a>";
			}
			?>
		  </div><!--liest-->
</div><!--drop body-->
			</div><!--drop drop-->
				</div>
           <!--arsip-->
           
          </div>
		</div><!--row-->
		
		
	  </div><!--container-->
	  
	</main><!--maiinnn-->
		
<script type="text/javascript">
		$(".drop-body").not('.drop-bodyzz').hide();

  $(".drop-head").click( function(){
      var current = $(this).next(".drop-body");
      current.slideToggle(400);

      //---------------------- change plus to -----------------------
      if( $(this).find("span").html() == '+' ){
        $(this).find("span").html('-');
        $(this).addClass('box_head_active');

        //-------------------- close other active box -----------------
        $(".drop-body").not(current).slideUp(400);
        $(".drop-head").not($(this)).find("span").html('+');
      }

      else{
        $(this).find("span").html('+');
      }
  })
  

</script>	