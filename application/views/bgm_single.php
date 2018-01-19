 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Iruna Online <small>Background music</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/background_music">Background music</a></li>
        <li><a href="/background_music/episode/<?=$epis == 1 ? '1' : $epis;?>">Episode <?=$epis == 1 ? '1-2' : $epis;?></a></li>
        <li class="active"><?=$title;?></li>
      </ol>
    </section>

<section class="content">
  
  <?php
  if($isi):
  	foreach($isi->result() as $o):
  ?>
  
  <div class="box box-solid">
    <div class="box-header">
      <h3 class="box-title"><?=$o->title;?></h3>
    </div>
    <div class="box-body">
    <span class="text-muted"><?=pisah_waktu($o->publishedAt);?></span><br><br>
      <p class="text-center">
          <img src="http://ytimg.googleusercontent.com/vi/<?=$o->videoId;?>/sddefault.jpg" alt="Iruna Online Background Music" class="img-responsive">
      </p>
      <p> <?=$o->title;?> </p>
      <br><br>
      <p><?php
   	$u=1;
    foreach($mp->find('a') as $a)
    {
    	$dt[$u] = $a->plaintext;
      	$pl[$u] = $a->href;
      $u++;
    } ?>
        <br>
        <strong>Play</strong><br>
         <audio controls loop="loop" preload="none">
            <source src="<?=$pl[5];?>" >
                Browser Anda tidak mendukung HTML5 Audio <!---  -----bool(false)
-->
            </audio>
        <br><br><br>
        <strong>Download</strong><br>
        <?php
     
    for($i=1;$i < $u;$i++)
    {
      echo "<a rel='nofollow' href='/background_music/download/$o->videoId/quality/$i' class='btn btn-link'>";
      echo str_replace('s','s ',$dt[$i]);
      echo "</a>";
    }
        ?>
      </p>
    </div>
  </div>
  
  
  <?php 
  	endforeach;
  endif;
  ?>
  <h4>Related Episode <?=$epis;?></h4>
  <?php
  $ho = $this->db->where('episode',$epis)->order_by('id','RANDOM')->limit(10)->get('bgm');
  $hi = $this->db->order_by('id','RANDOM')->limit(5)->get('bgm');
  
  echo "<ul>";
  foreach($ho->result() as $go)
  {
  ?>
      <li><a href="/background_music/episode/<?=$epis;?>/<?=$go->slug;?>"><?=$go->title;?></a></li>
  
  <?php
  }
  echo "</ul>";
  echo "
  <h4>Random Background Music</h4>";
  echo "<ul>";
  foreach($hi->result() as $gu)
  {
    ?>
  <li><a href="/background_music/episode/<?=$gu->episode;?>/<?=$gu->slug;?>"><?=$gu->title;?></a></li>
  
  <?php
  } 
  
  echo "</ul>";
  ?>
  
</section>
    
</div>