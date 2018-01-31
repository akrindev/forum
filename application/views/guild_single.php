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
        <li><a href="/guild">Guild</a></li>
        <li class="active"><?=ucfirst($name);?></li>
      </ol>
    </section>

<section class="content">
  <div class="row">  
     
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <div class="row">
            <div class="col-md-4">
              <img src="/logo.png" alt="" class="img-responsive">
            </div>
            <div class="col-md-4">
              <strong><?=$name;?></strong><br>
            <div class="progress-group">
                    <span class="progress-text">Members</span>
                    <span class="progress-number"><b><?=$members;?></b>/100</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-warning" style="width: <?=$members;?>%"></div>
                    </div>
                  </div>
                <div class="progress-group">
                    <span class="progress-text">Level</span>
                    <span class="progress-number"><b><?=$level;?></b>/100</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-success" style="width: <?=$level;?>%"></div>
                    </div>
                  </div>
              
              <blockquote>
                <?=$this->bbcode->bbcode_to_html(str_replace('<br />','',$slogan));?>
              </blockquote>
        <strong>GM</strong> <br>
              <span class="text-muted"><?=$gm;?> &rarr; <?=$ign;?></span>
              <br><br>
              <?php
      $query = $this->db->where('user_id',$this->session->iduser ?? '0')->where('guild_id',$identify)->get('guild_members');
              
       if($query->num_rows() > 0)
       {
         foreach($query->result() as $q)
         {
           $status = $q->status;
         }
         
         switch($status){
             
           case 0:
             echo "<a class='btn btn-success' href='/guild/action?request=join&gid=$identify&url=$slug'>Join guild</a>";
             break;
             
           case 1:
             echo "<a class='btn btn-warning' href='/guild/action?request=cancel&gid=$identify&url=$slug'>Pending (cancel ?)</a>";
             break;
             
           case 2:
             echo "<a class='btn btn-danger' href='/guild/action?request=leave&gid=$identify&url=$slug'>Leave guild</a>";
             break;
         }
       } else {
             echo "<a class='btn btn-success' href='/guild/action?request=join&gid=$identify&url=$slug'>Join guild</a>";
            
       }
        
        ?>
            </div>
            <div class="col-md-4">
              <strong>Description</strong><br>
              <p class="text-muted">
                <?=$this->bbcode->bbcode_to_html(str_replace('<br />','',character_limiter($slogan)));?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

   <div class="col-md-12">
      <a href="/guild" class="btn bg-navy btn-block">go back</a>
   </div>
 </div>
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