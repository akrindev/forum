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
 <div class="row">
      <?php
      if($episode):
        foreach($episode->result() as $p):
        ?>
       
          
          <div class="col-xs-12">
          <i class="fa fa-headphones"></i> <a href="/background_music/episode/<?=$p->episode;?>/<?=$p->slug;?>"><?=htmlentities($p->title,ENT_QUOTES,'UTF-8');?></a>
            <br><br>
          </div>
      
      <?php 
      
      endforeach;
   ?>
   
      </div>
      
      <?php
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