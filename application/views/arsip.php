  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         <?=$nmarsip?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/forum"><?=$nmarsip?></a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <div class="row">
    	<div class="col-md-8">
    <section class="content">
	  
	  <div id="single-post">
		<h4> Arsip: <?=$nmarsip;?> </h4>
	     <?php if($arsip){
		foreach($arsip as $post){?>
			
       <?php    $coco = $this->forum->get_comment_count($post->iid)->result();
?>
	<a class="hover" title="<?=$post->judul?>" href="<?php echo base_url()?>forum/thread/<?=$post->slug?>">
	<div class="box box-widget">
			  <div class="box-header with-border">
				<div class="section-header">
				  <h4><?php echo $post->judul ?></h4>
				</div>
			  </div>
			  <!-- /.box-header -->
			  <div class="box-body"><div class="user-block">
				  <img class="img-circle" src="<?=$this->gravatar->get($post->email);?>" alt="User Image">
				  <span data-author="<?=$post->username?>" class="description">By: <span class="text-primary">@<?=$post->username?></span> </span>
				  <span class="description"><?php 
echo time_ago($post->date); 
?> . dibaca: <?=$post->dilihat;?>x . <i class="glyphicon glyphicon-comment"></i>  <?php
foreach($coco as $coc)
      { 
      echo $coc->c;
      }
?></span>
				</div></div>
			  <!-- /.box-body -->
			</div>
	</a>
<?php }
  }else{
  	echo "Belum ada data dalam arsip ini";
  }
?>
        </div>
	 <div style="display:block;" class="pagin">
<ul class="pagination">
	<?php
	foreach($links as $link)
	{ 
		echo $link;
	}
	?>
</ul>
</div>
		
		<!-- ending -->
	</section>
	</div>
	<div class="col-md-4">
		<section class="content">
			<div class="box box-warning">
              <div class="box-header">Terakhir dikomentari
                </div>
				  <div class="box-body no-padding">
						<ul class="nav nav-pills nav-stacked">
	<?php
                foreach($this->forum->get_recent_post_comment()->result() as $ost)
                { ?>
                	<li><a href="/forum/thread/<?=$ost->slug;?>" ><?=$ost->judul;?><br/><span class="text-muted small"><?=time_ago($ost->date);?> . dibaca: <?=$ost->dilihat;?></span></a> </li>
                
             <?php } ?>
						</ul>
				</div>
			  <!-- /.box-body -->
			</div>
			
		</section>
	</div>
	</div> <!-- endrow -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->