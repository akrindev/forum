
	<main>
	  
	  <div class="container-fluid">
		
		<!--breadcrumb-->
		<div style="margin-top:10px"></div>
		
	    <div class="row">
		  <div class="col-12">
			<div class="cari-form animated fadeInDown">
				<?=form_open('diskusi/cari');?>
			  <input type="text" name="cari" class="in-cari" placeholder="Cari sesuatu . . ."/>
			  <button type="submit" class="b-cari">cari</button>
			</form>
			</div>
		  </div>
		</div>
	  
	<div style="margin:10px">
		
	</div>
		<div class="row">
			<!--
	<div class="col-12">
           <div class="zone">Informasi</div>
      </div>
      -->
         <div class="col-12 col-md-7">
           <div class="zone animated fadeInLeft">Terakhir di posting</div>
     <?php foreach($timeline as $post){?>
     	
       <?php    $coco = $this->forum->get_comment_count($post->tlid)->result();
?>
     
		<a class="post animated fadeInDown" title="<?=$post->judul?>" href="<?php echo base_url()?>forum/tl/<?=$post->slug?>">
	      
		        <div class="post-title"><h4><?php echo $post->judul ?></h4></div>
				<div class="post-info">oleh: <span class="author small" data-author="<?=$post->username?>"> <?php echo $post->username ?></span> <b>.</b> <span class="timeago"><?php 
echo time_ago($post->date); 
?></span> . <b>dibaca: </b> <?=$post->dilihat;?>      <?php
foreach($coco as $coc)
      { 
      echo '<b>balasan:';
	echo "</b> ". $coc->c;
      }
?></div>
	    
		</a>
		  <?php } ?>
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
           </div><!--col--><!-- col page -->
			
			    
           	      <div class="col-12 col-md-5">
           <div class="zone animated fadeInLeft">Terakhir di komentari</div>
                	<?php
                foreach($this->forum->get_recent_post_comment()->result() as $ost)
                { ?>
           <a href="/forum/tl/<?=$ost->slug;?>" class="post animated fadeInDown"> <?=$ost->judul;?> <div class="post-info"><?=time_ago($ost->date);?> . dibaca: <?=$ost->dilihat;?></div></a> 
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
  