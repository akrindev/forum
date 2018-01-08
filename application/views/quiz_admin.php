

<script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
<link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css">

<?php
                foreach($this->quiz_model->getUserScore($this->session->userdata('iduser'))->result() as $yes){
                $skor = $yes->score;
                $slah = $yes->salah;
                $pnt = $yes->point;
                }
                
                ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Iruna Online Quiz <small>Admin Panel Quiz</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/quiz">Quiz</a></li>
        <li class="active">Admin panel quiz</li>
        
      </ol>
    </section>
    
 <section class="content">
   
   
  <div class="row">
    
      <div class="col-md-3">
                
        <a href="/quiz/quizAdmin/1" class="btn btn-success btn-block margin-bottom"><i class="fa fa-envelope-o"></i> Diterima</a>
        <a href="/quiz/quizAdmin/0" class="btn btn-warning btn-block margin-bottom"><i class="fa fa-filter"> </i> Dalam moderasi</a>
        
        
        <div class="box box-solid">
          <h4 class="box-header">
           <i class="fa fa-trophy"></i> My score
          </h4>
          <div class="box-body no-padding">
            <ul class="nav nav-stacked nav-pills">
            <li><a class=""><i class="fa fa-circle-o text-success"></i> Benar <span class="label label-success pull-right"><?=$skor;?></span></a></li>
              <li><a class="text-danger"><i class="fa fa-circle-o text-danger"></i> Salah <span class="label label-danger pull-right"><?=$slah;?></span></a></li>
              <li><a class="text-info"><i class="fa fa-circle-o text-info"></i> Point <span class="label label-info pull-right"><?=$pnt;?></span></a></li>
            </ul>
          </div>
          
        </div>
      </div>

      <div class="col-md-9">

        
<?php
  if($page):
foreach($page as $p)
{ ?>
  <div>
    <div id="ngani<?=$p->quiz_id;?>" class="box box-solid">
      <div id="nganu<?=$p->quiz_id;?>" class="box-body">
        <div class="<?= $p->status == 1 ? 'text-success' : 'text-danger';?>">
        <?= $p->status == 1 ? 'Diterima!' : 'Moderasi';?>
        </div>
      <strong>Q:</strong>
        <?=$this->bbcode->bbcode_to_html($p->question);?> <br><br>
        <strong>A:</strong> <?=$this->bbcode->bbcode_to_html($p->answer_a);?> <br>
        <strong>B:</strong> <?=$this->bbcode->bbcode_to_html($p->answer_b);?> <br>
        
        <strong>C:</strong> <?=$this->bbcode->bbcode_to_html($p->answer_c);?> <br>
        <strong>D:</strong> <?=$this->bbcode->bbcode_to_html($p->answer_d);?> <br> <br>
        <strong>Correct: </strong>
        <?php
  		switch($p->correct)
        {
          case 1:
            echo "a";
            break;
            
          case 2:
            echo "b";
            break;
            
          case 3:
            echo "c";
            break;
            
          case 4:
            echo "d";
            break;
            
          default:
            echo "-";
            break;
        }
  ?> <br>
        <strong>By:</strong> <?=$p->username;?>
       <br> <strong>Dijawab sebanyak:</strong> <?=$p->terjawab;?>x
        <br><br>
        <?php 
 			if($p->status == 1){
            	echo "<span class='btn btn-danger' onclick='decline($p->quiz_id)'>Buang ke moderasi?</span>";
            } else {
                   	echo "<span class='btn btn-success' onclick='accept($p->quiz_id)'>Terima quiz ini?</span>";
            }
        ?>
        <span onClick="edit(<?=$p->quiz_id;?>)" class="btn btn-default">Edit</span>
      </div>
    </div>
  </div>
<?php
}
else:
  echo "<div style='margin-left:20px;'>Tidak ada data! <a href='/quiz/newQuiz'>Buat quiz??</a></div>";
endif;
?>

<ul id="pagin" class="pagination">
<?php
  foreach($links as $link)
  {
    echo $link;
  }
  ?>
</ul>  
     </div>
    
   </div>
      
      
    </section>
    
</div> 


<script>
  function decline(a)
  {
            swal({
  title: "Buang!",
  text: "Jadikan moderasi?",
  type: "warning",
  showCancelButton: true,
  closeOnConfirm: false,
  showLoaderOnConfirm: true
}, function () {
 	$.ajax({
        url : "/quiz/modQuiz/0/"+a,
        type: "get",
        dataType: "JSON",
        success: function(data)
        {
          if(data.status == true){
            swal('Ok!','Berhasil dipindahkan ke Moderasi!','success');
            
            $("#nganu"+a).slideUp();
          } else {
            swal('gagal');
          }
        }
 })
});
  }
  
  function accept(b)
  {
            swal({
  title: "Terima!",
  text: "Terima quiz ini?",
  type: "warning",
  showCancelButton: true,
  closeOnConfirm: false,
  showLoaderOnConfirm: true
}, function () {
 	$.ajax({
        url : "/quiz/modQuiz/1/"+b,
        type: "get",
        dataType: "JSON",
        success: function(data)
        {
          if(data.status == true){
            swal('Ok!','Quiz di terima!!','success');
            
            $("#ngani"+b).slideUp();
          } else {
            swal('gagal');
          }
        }
 })
});
  }

  function edit(id)
  {
  	$("form")[0].reset();

 	$.ajax({
        url : "<?=base_url();?>quiz/quizEdit/" + id,
        type: "GET",
        dataType: "JSON",
			beforeSend: function()
			{
				swal('Mengambil data');
			},
        success: function(data)
        {
		    $('[name="id"]').val(data.quiz_id);
            $('[name="question"]').val(data.question);
            $('[name="answer_a"]').val(data.answer_a);
            $('[name="answer_b"]').val(data.answer_b);
            $('[name="answer_c"]').val(data.answer_c);
            $('[name="answer_d"]').val(data.answer_d);
          $('[name="correct"]').val(data.correct);
           
 
    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
    $('.modal-title').text('Edit Quiz'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    })

  }
  
  function oke()
  {
    
        	$('.gg').text('Save Changes');
          	$('#modal_form').modal('hide'); 
           	 swal('sukses, akan diperbarui ketika halaman di reload');
  }
</script>



  	<!--modal edit-->
        <div class="modal modal-default fade" id="modal_form" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Quiz</h4>
              </div>
              <?=form_open('quiz/quizEditPost',['id' => 'gnt']);?>
              <div class="modal-body">
<div class="form-group">
              	<label>Pertanyaan</label>
  <textarea type="text" name="question" class="form-control"></textarea>
</div>
<div class="form-group">
               	<label>Jawaban A</label>
               	<input type="text" class="form-control" name="answer_a">
</div>
<div class="form-group">
               	<label>Jawaban B</label>
               	<input type="text" class="form-control" name="answer_b">
</div>
<div class="form-group">
               	<label>Jawaban C</label>
               	<input type="text" class="form-control" name="answer_c">
</div>

<div class="form-group">
               	<label>Jawaban D</label>
               	<input type="text" class="form-control" name="answer_d">
</div>
                
<div class="form-group">
               	<label>Jawaban benar</label>
               	<input type="text" class="form-control" name="correct">
  <div class="text-danger">Note: 1 = a, 2 = b, 3 = c, 4 = d</div>
</div>
	<input type="hidden" name="id" class="form-control">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn gg btn-primary">Save changes</button>
              </div>
              <?=form_close();?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal edit -->


<script>
$('#gnt').submit(function(e){
  	e.preventDefault();
  
  var nyong = $(this);
  
 	$.ajax({
 	    url : nyong.attr('action'),
        type: "POST",
        dataType: "JSON", 
        data: nyong.serialize(),
        beforeSend: function()
        {
			$('.gg').text('mengubah...');
        },
        success: oke()
 		});
  	});
</script>