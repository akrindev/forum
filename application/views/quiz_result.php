 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Iruna Quiz Result
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/quiz">Result quiz</a></li>
        
      </ol>
    </section>

<section class="content">
  <div class="row">
    <div class="col-md-9">
<div class="box box-warning">
            <div class="box-body no-padding">
              <div class="">
                <div style="margin-left:10px"><h3>Result Iruna Quiz</h3></div>
                <ul class="nav nav-stacked">
                  <li><a>  <span class="text-success">Correct = <?=$score;?></span></a></li>
                  <li><a> <span class="text-danger"> Incorrect = <?=$salah;?></span></a></li>
                  <li><a><span class="text-warning"> Point = <?=$point;?></span></a></li>
                </ul>
                <div style="margin-left:10px"> <h3>Total score</h3> </div>
                
                <?php
                foreach($this->quiz_model->getUserScore($this->session->userdata('iduser'))->result() as $yes){
                $skor = $yes->score;
                $slah = $yes->salah;
                $pnt = $yes->point;
                }
                
                ?>
                
                <ul class="nav nav-stacked">
                  <li><a>  <span class="text-success">Correct = <?=$skor;?></span></a></li>
                  <li><a> <span class="text-danger"> Incorrect = <?=$slah;?></span></a></li>
                  <li><a><span class="text-warning"> Point = <?=$pnt;?></span></a></li>
                </ul>
                
              <div style="margin:8px">  <a href="/quiz" class="btn btn-primary btn-block"> Mulai lagi?</a>
                  <a href="/quiz/newQuiz" class="btn btn-default btn-block"> Buat quiz!</a></div>
              </div>
			</div>      
                
            <!-- /.box-body -->
          </div>
    </div>
  </div>
</section>
    
</div>