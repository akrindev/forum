 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Scammer <small>Watch out from scammer</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/quiz">Scammer</a></li>
        <li class="active">Edit post</li>
      </ol>
    </section>

<section class="content">
  <div class="row">
    
    <?php
    foreach($edit as $e):
    ?>
    <div class="col-md-12">
      
      
      <div class="box box-primary">
        <div class="box-body">
          <?=form_open_multipart('scam/edit/'.$e->slug);?>
          
          <div class="form-group">
          <label>Kasus</label>
            <input type="text" class="form-control" name="kasus" placeholder="kasus scam" value="<?=$e->kasus;?>">
            <?=form_error('kasus','<span class="text-danger">','</span>');?>
          </div>
           
          <div class="form-group">
          <label>Ign scammer</label>
            <input type="text" class="form-control" name="ign" placeholder="jika diketahui" value="<?=$e->s_ign;?>">
          </div>
           
          <div class="form-group">
          <label>Fb scammer</label>
            <input type="text" class="form-control" name="fb" placeholder="link fb / nama fb (jika diketahui)"  value="<?=$e->s_fb;?>">
          </div>
           
          <div class="form-group">
          <label>Kronologi</label>
            <textarea name="kronologi" id="subject_textarea" rows="6" class="form-control" placeholder="Ceritakan bagaimana hal ini bisa terjadi"><?=$e->kronologi;?></textarea>
            <?=form_error('kronologi','<span class="text-danger">','</span>');?>
          </div>
          
          
          <button class="btn btn-primary"><i class="fa fa-plus"></i> publish</button>
          
          <?=form_close();?>
        </div>
      </div>
      
      
    </div>
    
    <?php
    endforeach;
    ?>
    
   </div>
</section>
    
</div>


<script>
</script>