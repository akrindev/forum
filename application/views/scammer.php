 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Scammer <small>Watch out from scam</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/scam">Scams</a></li>
        
      </ol>
    </section>

<section class="content">
  <div class="row">
    
    
    <div class="col-md-12">
      <a href="/scam/create" class="btn btn-primary margin-bottom"><i class="fa fa-plus"></i> Add data</a>
      
      <?php
      if($page):
      foreach($page as $p):
      ?>
      
      <div class="box box-primary">
        <div class="box-body">
          <div class="row">
            <div class="col-md-3">
              <?php
              if(strlen($p->pics) > 2): 
              ?>
              <img src="<?=$p->pics;?>" class="img-responsive" style="max-height:200px" alt="">
            <?php endif; ?>
            </div>
            <div class="col-md-3">
              <strong>Posted by:</strong> 
              <span class="text-muted">
              <a>@<?=$p->username;?></a>
              </span> <br>
            <strong><?=lang('case');?></strong><br>
              <p class="text-muted">
                <?=$this->bbcode->bbcode_to_html($p->kasus);?>
              </p>
            </div>
            <div class="col-md-3">
              <strong>Scammer IGN:</strong> <span class="text-muted"><?=$this->bbcode->bbcode_to_html($p->s_ign);?></span> <br>
              <strong>Scammer FB: </strong> <?=$this->bbcode->bbcode_to_html($p->s_fb);?> <br>
              <strong>Date:</strong> <span class="text-muted"><?=pisah_waktu($p->date);?></span> <div style="margin-bottom:5px"></div>
            </div>
            <div class="col-md-3">
              <strong><?=lang('kronologi');?></strong><br>
              <p class="text-muted">
                <?=str_replace('<br />',' ',$this->bbcode->bbcode_to_html(character_limiter($p->kronologi)));?>
              </p>
              <a href="/scam/read/<?=$p->slug;?>" class="btn btn-link">Read more . . .</a>
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
    
    
    
    
    <div class="col-md-12">
      <div class="box box-danger">
      <div class="box-header">
        <h3 class="box-title">Scammer list</h3>
        </div>
        <div class="box-body no-padding">
        <div style="margin:7px">
          <div class="callout callout-info">
            <?=lang('info');?>
          </div>
         </div>
         
          <div class="table-responsive">
            <table class="table table-hovered table-bordered" id="scammer">
            <thead>
              <tr>
					<th>-</th>
                <th>IGN</th>
                <th> FB Name</th>
                <th>Other FB</th>
                <th>Kasus / Case</th>
                <th>Date</th>
                <th>Link fb</th>
              </tr>
             </thead>
            <tbody>
       <?php foreach($csv as $k): ;?>
              <tr>
					<td><?=$k['ABJAD'];?></td>
                <td><?=$k['IGN'];?></td>
              
                <td><?=$k['FB NAME'];?></td>
                <td><?=$k['OTHER NAME'];?></td>
                <td><?=$k['KASUS'];?></td>
                <td><?=$k['DATE'];?></td>
                <td><?=strlen($k['FB LINK']) > 1 ? '<a href='.$k['FB LINK'].' class="btn btn-primary">Fb link</a>' : '';?></td>
              </tr>
       <?php endforeach; ?>
            </tbody>
            </table>
          </div>
          
        </div>
      </div>
      
    </div>
   </div>
</section>
    
</div>


<script>

    $("#scammer").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "info": true,
      "autoWidth": true,
      "pageLength": 20,
		"ordering": false
    });
</script>