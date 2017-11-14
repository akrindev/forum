
	<main>
	  
	  <div class="container-fluid">
		
		<!--breadcrumb-->
		<div style="margin-top:10px"></div>
		<nav aria-label="breadcrumb" role="navigation">
		  <ol class="breadcrumb" itemscope="" itemtype="http://schema.org/
			BreadcrumbList">
			<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">Timeline</li>
			
			<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="divider"><span itemprop="item">/</span></li>
			<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="active"><a itemprop="item" href="/"><span itemprop="name">Beranda</span></a></li>
		  </ol>
		</nav>
	  
	  
	<div class="row">
		<div class="col-12">
				<div class="dropdrop">
		<div class="drop-head">Arsip <span>+</span></div>
		<div class="drop-body">
		  <div class="liest">
			<?php
			foreach($this->forum->get_kategori()->result() as $kate)
			{
				
			  echo "<a href=\"/arsip/$kate->id_kat\"> $kate->kat</a>";
			}
			?>
		  </div><!--liest-->
</div><!--drop body-->
			</div><!--drop drop-->
				</div>
	</div>
		<div class="row">
			
         <div class="col-12">
           <div class="zone">Timeline</div>
          </div>
            <div class="col-12">
     <?php foreach($timeline as $post){?>
     	
       <?php    $coco = $this->forum->get_comment_count($post->tlid)->result();
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
		  <?php } ?>
           </div><!--col-->
		 <div class="col-12">
			
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
			
			</div>
		</div><!--row-->
		
		
	  </div><!--container-->
	  
	</main><!--maiinnn-->
	
	<footer>
	  <div class="footer-forum">Copyright 2017 - All Right Reserved</div>
	</footer>
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
  </body>
</html>		