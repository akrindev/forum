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
      <li>Admin</li>
      </ol>
    </section>

<section class="content">
  
  <div class="box box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Iruna Online BGM: Admin panel</h3>
      </div>
    <div class="box-body">
 <div class="row">
      <?php
      if($episode):
        foreach($episode->result() as $p):
        ?>
       
          
          <div class="col-xs-12" id="ep-<?=$p->id;?>">
         >> <a href="/background_music/episode/<?=$p->episode;?>/<?=$p->slug;?>"><?=htmlentities($p->title,ENT_QUOTES,'UTF-8');?></a><br>
            <span class="text-muted">Epidode: <?=$p->episode;?></span> <span onClick="edit(<?=$p->id;?>)" class="btn btn-default btn-sm uio-<?=$p->id;?>">Edit</span>
          </div><br>
   <div class="margin-bottom"></div>
      
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

<script>
var key = 0;
  
function edit(i)
  {
    $("form")[0].reset();

 $.ajax({
        url : "<?=base_url();?>bgm/ajax/" + i,
        type: "GET",
        dataType: "JSON",
		beforeSend: function()
		{
			$('.uio-'+i).text('wait...');
		},
        success: function(data)
        {
          key = data.id;
 		$('.uio-'+i).text('Edit');
	   $('[name="id"]').val(data.id);
       $('[name="title"]').val(data.title);
           
 
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    })

  }

  $(function(){
  $('#gnt').submit(function(e){
  	e.preventDefault();
  
 		$.ajax({
 	  url : "<?=base_url();?>bgm/adminApi",
        type: "POST",
        dataType: "JSON", 
        data: $(this).serialize(),
        beforeSend: function()
        {
			$('.gg').text('Wait ...');
        },
        success: function(data)
        {
        	$('.gg').text('Save');
        	if(data.status == true){
		$('#modal_form').modal('hide'); 
              
         $("#ep-"+key).html("<span class='text-success'>Updated</span><hr>");
        	}
       }
 		});
  	})
  
  })
</script>




  	<!--modal edit-->
        <div class="modal modal-default modal-sm fade" id="modal_form" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit</h4>
              </div>
              <?=form_open('bgm/ajaxEd',['id' => 'gnt']);?>
              <div class="modal-body">
              <input type="hidden" name="id">
               <div class="form-group"><label for="title">title
                 <input type="text" name="title" class="form-control"></label></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary gg">Save</button>
              </div>
              <?=form_close();?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal edit -->