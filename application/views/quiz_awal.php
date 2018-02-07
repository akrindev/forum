
<script src="/assets/js/sweetalert.min.js"></script>
<link rel="stylesheet" href="/assets/css/sweetalert.css">

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Iruna Online Quiz
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/quiz">Quiz</a></li>
        
      </ol>
    </section>

<section class="content">
  <div class="row">
    <div class="col-md-7">
  <div class="box box-widget">
    <div class="box-header">
     <i class="fa fa-trophy"></i> 10 Top Scores
    </div>
    <div class="box-body no-padding">
    
      <table class="table table-striped">
        <thead>
          <th>No</th>
          <th>Username</th>
          <th>Correct</th>
          <th>Wrong</th>
          <th>Point</th>
        </thead>
        
        <?php
        $ke = 1;
      foreach($tops as $top)
      {
        ?>
      
        <tr>
          <td><?=$ke;?></td> 
          <td><?=$top->username;?></td>
          <td><span class="text-success"><?=$top->score;?></span></td>
          <td><span class="text-danger"><?=$top->salah;?></span></td>
          <td><span class="text-warning"><?=$top->point;?></span></td>
        </tr>
      <?php
        $ke++;
      } 
  
  ?>
      </table>
	</div>     <!-- /.box-body -->
    <div class="box-footer"><a href="/quiz/peringkat" class="btn btn-default"><?=
       $this->lang->line('seerank');
       ?></a></div>
          </div>
      
        <?php
      if($this->session->user)
      {
        echo '
      <a href="/quiz/quizUser" class="btn btn-primary">My Quiz !</a> <br><div style="margin:20px"></div>';
      }
      ?>
  <div class="box box-widget">
    <div class="box-header">
       The Quiz
    </div>
     <div class="box-body">
       <?=
       lang('quiz');
       ?>
    <br><br>
       <a onclick="mulaiMas()" class="btn btn-primary btn-block"><?=
       lang('start_quiz');
       ?></a>
    </div>
      </div>
    
    </div>
    <div class="col-md-5">
      
        <div class="box box-solid">
          <div class="box-header">
           <h4 class="box-title"><i class="fa fa-trophy"></i> <?=lang('statistic');?></h4>
          </div>
          <div class="box-body no-padding">
            <ul class="nav nav-stacked nav-pills">
            <li><a class=""><i class="fa fa-circle-o text-success"></i> Total correct answer <span class="label label-success pull-right"><?=$this->quiz_model->howManyTotal('score');?></span></a></li>
              <li><a class="text-danger"><i class="fa fa-circle-o text-danger"></i> Total wrong answer <span class="label label-danger pull-right"><?=$this->quiz_model->howManyTotal('salah');?></span></a></li>
              <li><a class="text-info"><i class="fa fa-circle-o text-info"></i> Total Points <span class="label label-info pull-right"><?=$this->quiz_model->howManyTotal('point');?></span></a></li>
              <li><a class="text-info"><i class="fa fa-check text-success"></i> Total quiz accepted <span class="label label-success pull-right"><?=$this->quiz_model->countQuizStatus(1);?></span></a></li>
              <li><a class="text-info"><i class="fa fa-filter text-danger"></i> Total quiz pending <span class="label label-danger pull-right"><?=$this->quiz_model->countQuizStatus(0);?></span></a></li>
              <li><a class="text-info"><i class="fa fa-envelope-o text-info"></i> Total quiz submited <span class="label label-info pull-right"><?=$this->quiz_model->countQuiz();?></span></a></li>
              <li><a class="text-info"><i class="fa fa-flag text-primary"></i> Indonesian quiz <span class="label label-primary pull-right"><?=$this->quiz_model->howManyLang('id');?></span></a></li>
              <li><a class="text-info"><i class="fa fa-flag text-primary"></i> English quiz <span class="label label-primary pull-right"><?=$this->quiz_model->howManyLang('en');?></span></a></li>
            </ul>
          </div>
          <div class="box-footer">
            <a href="/quiz/newQuiz" class="btn btn-success btn-block"><?=
       lang('newquiz');
       ?></a>
          </div>
        </div>
    </div>
    <!-- end -->
  </div>
    </section>
    
</div>

<?php
if(!$this->session->userdata('user'))
{ ?>
<script>
  function mulaiMas()
  {
            swal({
  title: "Start!",
  text: "Start quiz?",
  type: "info",
  showCancelButton: true,
  closeOnConfirm: false,
  showLoaderOnConfirm: true
}, function () {
  setTimeout(function () {
    swal("<?=
       $this->lang->line('notlogin');
       ?>");
  }, 1000);
});
  }

</script>

<?php
} else {  ?>

<script>
  function mulaiMas()
  {
            swal({
  title: "Start!",
  text: "Start quiz?",
  type: "success",
  showCancelButton: true,
  closeOnConfirm: false,
  showLoaderOnConfirm: true
}, function () {
  setTimeout(function () {
    window.location.href = '/quiz/quizLang';
  }, 2000);
});
  }

</script>


<?php
}


?>