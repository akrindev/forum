
<script src="/assets/js/sweetalert.min.js"></script>
<link rel="stylesheet" href="/assets/css/sweetalert.css">


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
         Iruna Online Quiz <small>My score</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/quiz">Quiz</a></li>
        <li class="active">My score</li>
        
      </ol>
    </section>

<section class="content">
   
   
  <div class="row">
    
      <div class="col-md-3">
                
        <a href="/quiz/quizUser/1" class="btn btn-success btn-block margin-bottom"><i class="fa fa-envelope-o"></i> Accepted (<?=$this->quiz_model->howMany(1);?>)</a>
        <a href="/quiz/quizUser/0" class="btn btn-warning btn-block margin-bottom"><i class="fa fa-filter"> </i> Pending (<?=$this->quiz_model->howMany(0);?>)</a>
        
        <?php
        if($this->session->level == 'admin'):
        ?>
        
        
        <a href="/quiz/quizAdmin" class="btn btn-primary btn-block margin-bottom"><i class="fa fa-user"> </i> Panel quiz admin</a>
        
        <?php
        
        endif;
        ?>
        
        <div class="box box-solid">
          <h4 class="box-header">
           <i class="fa fa-trophy"></i> My Quiz
          </h4>
          <div class="box-body no-padding">
            <ul class="nav nav-stacked nav-pills">
            <li><a class=""><i class="fa fa-circle-o text-success"></i> Correct <span class="label label-success pull-right"><?=$skor;?></span></a></li>
              <li><a class="text-danger"><i class="fa fa-circle-o text-danger"></i> Wrong <span class="label label-danger pull-right"><?=$slah;?></span></a></li>
              <li><a class="text-info"><i class="fa fa-circle-o text-info"></i> Point <span class="label label-info pull-right"><?=$pnt;?></span></a></li>
              <li><a class="text-info"><i class="fa fa-check text-success"></i> Quiz accepted <span class="label label-success pull-right"><?=$this->quiz_model->howMany(1);?></span></a></li>
              <li><a class="text-info"><i class="fa fa-filter text-danger"></i> Quiz pending <span class="label label-danger pull-right"><?=$this->quiz_model->howMany(0);?></span></a></li>
              <li><a class="text-info"><i class="fa fa-envelope-o text-info"></i> Total quiz submited <span class="label label-info pull-right"><?=$this->quiz_model->howMany(0)+$this->quiz_model->howMany(1);?></span></a></li>
              <li><a class="text-info"><i class="fa fa-comments text-primary"></i> Total users answered <span class="label label-primary pull-right"><?=$this->quiz_model->howMany(0)+$this->quiz_model->howManyAnswered();?></span></a></li>
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
        <div class="<?= $p->status == 1 ? 'label label-success' : 'label label-danger';?>">
        <?= $p->status == 1 ? 'Accepted!' : 'Pending';?>
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
  ?>
       <br> <strong>Users answered:</strong> <?=$p->terjawab;?>x
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