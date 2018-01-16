 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Scammer <small>Watch out from scammer</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/scam">Scammer</a></li>
        <li class="active">New post</li>
      </ol>
    </section>

<section class="content">
  <div class="row">
    
    
    <div class="col-md-12">
   <?php
      if(!$this->session->user):
   ?>
  <div class="box box-danger">
    <div class="box-body"><strong>Please <a href="/login">Login</a> to add data</strong></div>
  </div>    
      <?php
      else:
      ?>
      
      <div class="box box-primary">
        <div class="box-body">
          <?=form_open_multipart('scam/create');?>
          
          <div class="form-group">
          <label>Kasus</label>
            <input type="text" class="form-control" name="kasus" placeholder="kasus scam" value="<?=set_value('kasus');?>">
            <?=form_error('kasus','<span class="text-danger">','</span>');?>
          </div>
           
          <div class="form-group">
          <label>Ign scammer</label>
            <input type="text" class="form-control" name="ign" placeholder="jika diketahui" value="<?=set_value('ign');?>">
          </div>
           
          <div class="form-group">
          <label>Fb scammer</label>
            <input type="text" class="form-control" name="fb" placeholder="link fb / nama fb (jika diketahui)"  value="<?=set_value('fb');?>">
          </div>
           
          <div class="form-group">
          <label>Kronologi</label>
            <textarea name="kronologi" id="subject_textarea" rows="6" class="form-control" placeholder="Ceritakan bagaimana hal ini bisa terjadi"><?=set_value('kronologi');?></textarea>
            <?=form_error('kronologi','<span class="text-danger">','</span>');?>
          </div>
          
          <div class="form-group">
            <div id="preview"></div>
            <label>gambar unggulan</label>
          <input id="files" type="file" class="form-control" name="file">
            <?=form_error('file','<span class="text-danger">','</span>');?>
          </div>
          
          <button class="btn btn-primary"><i class="fa fa-plus"></i> publish</button>
          
          <?=form_close();?>
        </div>
      </div>
      
      <?php
      endif;
      ?>
    </div>
    
    
   </div>
</section>
    
</div>


<script>

function fileReader(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            
            $('#preview').html('<img src="'+e.target.result+'" width="400px" height="250px" class="img-responsive"/>');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<script>
 $("#files").change(function(){
   fileReader(this);
 })
</script>