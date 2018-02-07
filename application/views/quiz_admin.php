
<script src="/assets/js/sweetalert.min.js"></script>
<link rel="stylesheet" href="/assets/css/sweetalert.css">

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
                
         <a href="/quiz/quizAdmin/1" class="btn btn-success btn-block margin-bottom"><i class="fa fa-envelope-o"></i> Total Accepted (<?=$this->quiz_model->countQuizStatus(1);?>)</a>
        <a href="/quiz/quizAdmin/0" class="btn btn-warning btn-block margin-bottom"><i class="fa fa-filter"> </i> Total Pending (<?=$this->quiz_model->countQuizStatus(0);?>)</a>
        
        <div class="box box-solid">
          <h4 class="box-header">
           <i class="fa fa-trophy"></i> <?=lang('statistic');?>
          </h4>
          <div class="box-body no-padding">
            <ul class="nav nav-stacked nav-pills">
            <li><a class=""><i class="fa fa-circle-o text-success"></i> Total correct answer <span class="label label-success pull-right"><?=$this->quiz_model->howManyTotal('score');?></span></a></li>
              <li><a class="text-danger"><i class="fa fa-circle-o text-danger"></i> Total wrong answer <span class="label label-danger pull-right"><?=$this->quiz_model->howManyTotal('salah');?></span></a></li>
              <li><a class="text-info"><i class="fa fa-circle-o text-info"></i> Total Points <span class="label label-info pull-right"><?=$this->quiz_model->howManyTotal('point');?></span></a></li>
              <li><a class="text-info"><i class="fa fa-check text-success"></i> Total quiz accepted <span class="label label-success pull-right"><?=$this->quiz_model->countQuizStatus(1);?></span></a></li>
              <li><a class="text-info"><i class="fa fa-filter text-danger"></i> Total quiz pending <span class="label label-danger pull-right"><?=$this->quiz_model->countQuizStatus(0);?></span></a></li>
              <li><a class="text-info"><i class="fa fa-envelope-o text-info"></i> Total quiz submited <span class="label label-info pull-right"><?=$this->quiz_model->countQuiz();?></span></a></li>
              <li><a class="text-info"><i class="fa fa-comments text-primary"></i> Total users answered <span class="label label-primary pull-right"><?=$this->quiz_model->howManyTotalAnswered();?></span></a></li>
              <li><a class="text-info"><i class="fa fa-flag text-primary"></i> Indonesian quiz <span class="label label-primary pull-right"><?=$this->quiz_model->howManyLang('id');?></span></a></li>
              <li><a class="text-info"><i class="fa fa-flag text-primary"></i> English quiz <span class="label label-primary pull-right"><?=$this->quiz_model->howManyLang('en');?></span></a></li>
            </ul>
          </div>
          <div class="box-footer">
            <a href="/quiz/newQuiz" class="btn btn-success btn-block"><?=
       $this->lang->line('newquiz');
       ?></a>
          </div>
        </div>
      </div>

      <div class="col-md-9">
<div class="margin-bottom">
        <div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Indonesian</button>
  <ul class="dropdown-menu">
    <li><a href="/quiz/quizAdminLang/id/1">Accepted</a></li>
    <li><a href="/quiz/quizAdminLang/id/0">Pending</a></li>
  </ul>
</div>
  
    <div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">English</button>
  <ul class="dropdown-menu">
    <li><a href="/quiz/quizAdminLang/en/1">Accepted</a></li>
    <li><a href="/quiz/quizAdminLang/en/0">Pending</a></li>
  </ul>
</div>
        </div>
        
<?php
  if($page):
foreach($page as $p)
{ ?>
  <div>
    <div id="ngani<?=$p->quiz_id;?>" class="box box-solid">
      <div id="nganu<?=$p->quiz_id;?>" class="box-body">
        <div class="<?= $p->status == 1 ? 'label label-success' : 'label label-danger';?>">
        <?= $p->status == 1 ? 'Accepted!' : 'Pending';?>
        </div><br>
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
       <br> <strong>Answered:</strong> <?=$p->terjawab;?>x <br>
        <strong>Language:</strong> <?=$p->lang;?>
        <br><br>
        <?php 
 			if($p->status == 1){
            	echo "<span class='btn btn-danger' onclick='decline($p->quiz_id)'>Trash?</span>";
            } else {
                   	echo "<span class='btn btn-success' onclick='accept($p->quiz_id)'>Accept this quiz?</span>";
            }
        ?>
        <span onClick="edit(<?=$p->quiz_id;?>)" class="btn btn-default">Edit</span>
      </div>
    </div>
  </div>
<?php
}
else:
  echo "<div style='margin-left:20px;'>No data found! <a href='/quiz/newQuiz'>Create quiz??</a></div>";
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
  title: "Trash!",
  text: "Make it trash?",
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
            swal('Ok!','Success!','success');
            
            $("#nganu"+a).slideUp();
          } else {
            swal('failed');
          }
        }
 })
});
  }
  
  function accept(b)
  {
            swal({
  title: "Accept!",
  text: "Accept this quiz?",
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
            swal('Ok!','Quiz accepted!!','success');
            
            $("#ngani"+b).slideUp();
          } else {
            swal('failed');
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
				swal('Fetching data');
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
           	 swal('success, please reload the page to see changes');
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
              	<label>Question</label>
  <textarea type="text" name="question" class="form-control"></textarea>
</div>
<div class="form-group">
               	<label>Answer A</label>
               	<input type="text" class="form-control" name="answer_a">
</div>
<div class="form-group">
               	<label>Answer B</label>
               	<input type="text" class="form-control" name="answer_b">
</div>
<div class="form-group">
               	<label>Answer C</label>
               	<input type="text" class="form-control" name="answer_c">
</div>

<div class="form-group">
               	<label>Answer D</label>
               	<input type="text" class="form-control" name="answer_d">
</div>
                
<div class="form-group">
               	<label>Correct answer</label>
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
			$('.gg').text('processing...');
        },
        success: oke()
 		});
  	});
</script>