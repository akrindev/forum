 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Guild <small>Connect with large community</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/guild">Guild</a></li>
        
      </ol>
    </section>

<section class="content">
  <div class="row">
    
    
    <div class="col-md-12">
      <a href="/guild/create" class="btn btn-primary margin-bottom"><i class="fa fa-plus"></i> Create guild</a>
      
      <?php
      if($page):
      foreach($page as $p):
      ?>
      
      <div class="box box-primary">
        <div class="box-body">
          <div class="row">
            <div class="col-md-3">
              <?php
              if(strlen($p->logo) > 2): 
              ?>
              <img src="<?=$p->logo;?>" class="img-responsive" style="max-height:200px" alt="Iruna online guild">
            <?php endif; ?>
            </div>
            <div class="col-md-3">
              <strong><?=$p->name;?></strong>
         <div class="progress-group">
                    <span class="progress-text">Level</span>
                    <span class="progress-number"><b><?=$p->level;?></b>/100</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-success" style="width: <?=$p->level;?>%"></div>
                    </div>
                  </div>
                <div class="progress-group">
                    <span class="progress-text">Members</span>
                    <span class="progress-number"><b><?=$p->members;?></b>/100</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-warning" style="width: <?=$p->members;?>%"></div>
                    </div>
                  </div>
              <strong>Guild Master</strong><br>
              <span class="text-muted">@<?=$p->username;?> &rarr; <?= $p->ign;?></span>
            </div>
            <div class="col-md-3">
              <blockquote>
              <?=$this->bbcode->bbcode_to_html($p->slogan);?> 
                </blockquote>
<div style="margin-bottom:5px"></div>
            </div>
            
            
            <div class="col-md-3">
              <strong>Rules</strong><br>
              <p class="text-muted">
                <?=str_replace('<br />',' ',$this->bbcode->bbcode_to_html(character_limiter($p->rules)));?>
              </p>
              <a href="/guild/i/<?=$p->slug;?>" class="btn btn-link">Read more info . . .</a>
            </div>
          </div>
        </div>
      </div>

      <?php
      endforeach;
      endif;
      ?>
      
      <ul class="pagination pagination-sm">
      <?php 
        foreach($links as $link){
  
  			echo $link;
		}
      ?>
      </ul>
      
    </div>
   
   </div>
</section>
    
</div>