 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Iruna Online <small>Background Music</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/background_music">Background music</a></li>
      <li>Episode <?=$ep == 1 ? '1-2' : $ep;?></li>
      </ol>
    </section>

<section class="content">
  
  <div class="box box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Iruna Online BGM: Episode <?=$ep == 1 ? '1-2' : $ep;?></h3>
      </div>
    <div class="box-body">
 
      <?php
      if($episode):
        foreach($episode->result() as $p):
        ?>
        <div class="row">
          <div style="padding-left:8px" class="col-xs-4">
          <img src="http://ytimg.googleusercontent.com/vi/<?=$p->videoId;?>/mqdefault.jpg" alt="" class="img-responsive">
          </div>
          
          <div class="col-xs-8">
          <a href="/background_music/episode/<?=$p->episode;?>/<?=$p->slug;?>"><?=htmlentities($p->title,ENT_QUOTES,'UTF-8');?></a>
          </div>
        </div>
        <div class="margin-bottom"></div>
      
      <?php 
      
      endforeach; 
      
      else:
      
      ?>
      
      <h1>Not Found!</h1>
      
      <?php
      endif;
      ?>
    </div>
  </div>
  
  
</section>
    
</div>