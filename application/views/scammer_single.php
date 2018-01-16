 <!-- Content Wrapper. Contains page content -->

<?php if($this->session->user): ?>

<script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
<link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css">

<?php endif; ?>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/scam">Scammer</a></li>
        
      </ol>
    </section>

<section class="content">
  <div class="row">
    
    
    <div class="col-md-12">
      
      <?php if($scam): ?>
      <?php foreach($scam as $s): ?>
      
      <div class="box box-solid">
		<div class="box-header with-border">
		  <div class="user-block">
<div itemprop='author' itemscope='itemscope' itemtype='https://schema.org/Person'
>
	<span content='<?=base_url('profile/'.$s->username);?>' itemprop='url'></span>
			<img class="img-circle" src="<?=$this->gravatar->get($s->email);?>" alt="User Image">
			<span data-author="<?=$s->username;?>" class="username"><a href="<?=base_url('profile/'.$s->username);?>">@<span itemprop='name'><?=$s->username;?></span></a></span>
			</div>
			<span itemprop='publisher' itemscope='itemscope' itemtype='https://schema.org/Organization'>
			<span itemprop='logo' itemscope='itemscope' itemtype='https://schema.org/ImageObject'>
<span content='<?=base_url()?>logo.jpg' itemprop='url'></span>
<span content='600' itemprop='width'></span>
<span content='60' itemprop='height'></span>
</span>
<span content='Rokoko Iruna Online Forum Indonesia' itemprop='name'></span>
</span>
			<span content='<?=current_url();?>' itemprop='url'></span>
			<span class="description post-meta"><abbr content='<?=$s->date;?>' itemprop='datePublished dateModified' title='<?=$s->date;?>'><?=pisah_waktu($s->date);?> </abbr></span>
		  </div>
		</div>
		<!-- /.box-header -->
        <div class="box-body">
        <?=strlen($s->pics) > 2 ? "<img src='$s->pics' alt='iruna online' class='img-responsive'/>" : '';?>
          <hr>
          <strong><?=lang('case');?></strong><br>
          <p class="text-muted">
          <?=$this->bbcode->bbcode_to_html($s->kasus);?>
          </p>
          <hr>
          <strong>Scammer IGN: </strong><br>
          <span class="text-muted"><?=$this->bbcode->bbcode_to_html($s->s_ign);?></span><br>
          <br>
          <strong>Fb scammer:</strong><br>
          <span class="text-primary"><?=$this->bbcode->bbcode_to_html($s->s_fb);?></span>
          <hr>
          <strong><?=lang('kronologi');?></strong>
          <p>
          <?=$this->bbcode->bbcode_to_html($s->kronologi);?>
          </p>
          <br>
          <?php
          if($s->user_id == $this->session->iduser):
          ?>
          <a href="/scam/edit/<?=$s->slug;?>" class="btn btn-default">Edit</a> 

<a onclick="hapus(<?=$s->ids;?>)" class="btn btn-danger">Hapus</a>
          <br><br>
          <?php endif;

if( $this->session->level == 'admin' ): ?> 


<a onclick="hapus(<?=$s->ids;?>)" class="btn btn-danger">Hapus</a>
<br />
<?php endif; ?>
          

          
          <div class="callout callout-warning"><?=lang('warning');?> </div>
        </div>
		<!-- /.box-body -->
	  </div>
      
      <?php
      $pics = $this->db->where('parent_id',$s->ids)->where('status',1)->get('scammers_pics');
      
      if($pics->num_rows() > 0): ?>
      
  <?php foreach($pics->result() as $u): ?>
      <div id="senpai-<?=$u->id;?>" class="box box-solid">
        <div class="box-body">
          <img class="img-responsive" src="<?=$u->pics;?>" alt="iruna online">
          <p class="text-muted"> <?=time_ago($u->date);?></p>
          
          <?php
          if($s->user_id == $this->session->iduser):
          ?><a onclick="hapusbukti(<?=$u->id;?>)" class="btn btn-danger">Hapus</a>
          
          <?php endif; ?>
        </div>
      </div>
   <?php endforeach; ?>
      
      <?php endif; ?>
      
      
      <?php if($s->user_id == $this->session->iduser): ?>
      <div class="box box-solid">
      <div class="box-body">
        <?=form_open_multipart('scam/pics/'.$s->slug,['id'=>'uploadForm']);?>
        <label>Tambah gambar barang bukti</label>
        <input type="file" id="files" name="file">
        <br>
        <button type="submit" class="btn btn-primary">Publish</button>
        <?=form_close();?>
       </div>
      </div>
      <?php endif; ?>
	  
      <?php endforeach; ?>
      <?php endif; ?>
      
    </div>
    
    
   </div>
  
  <a href="/scammers" class="btn bg-navy btn-block">go back</a>
</section>
    
</div>

<?php
if($this->session->user): ?>

<script>
  function hapus(i)
  {
   swal({
  	title: "Trash!",
  	text: "Delete this data?",
  	type: "warning",
  	showCancelButton: true,
  	closeOnConfirm: false,
  	showLoaderOnConfirm: true
	}, function () {
  		
     	$.ajax({
        	url: '/scam/delete/post/'+i,
            method: 'GET',
            dataType: 'json',
            success: function(r){
              if(r.status)
                {
                  swal('Success','Data deleted','success');
                  setTimeout(function(){
                  window.location.href = '/scam';
                  }, 3000);
                } else {
                	swal('gagal');
                }
            }
            
        })
     
	});
  }
  
  function hapusbukti(a)
  {
    swal({
  	title: "Trash!",
  	text: "Delete this data?",
  	type: "warning",
  	showCancelButton: true,
  	closeOnConfirm: true,
  	showLoaderOnConfirm: true
	}, function () {
  		
     	$.ajax({
        	url: '/scam/delete/pics/'+a,
            method: 'GET',
            dataType: 'json',
            success: function(r){
              if(r.status)
                {
                  $('#senpai-'+a).slideUp();
                  setTimeout(function(){
                  swal('Success','Data deleted','success');
                  }, 2000);
                }
            }
            
        })
     
	});
  }
 

function fileReader(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            
            $('#uploadForm').before('<img src="'+e.target.result+'" width="400px" height="250px" class="img-responsive"/>');
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

<?php endif; ?>