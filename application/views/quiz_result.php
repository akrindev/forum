 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Quiz Result
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/quiz">Quiz Result</a></li>
        
      </ol>
    </section>

<section class="content">
  <div class="row">
    <div class="col-md-6">
      
<div class="box box-widget">
  <div class="box-header">Result quiz</div>
            <div class="box-body n">
              <div class="">
                <div class="progress-group">
                    <span class="progress-text">Correct</span>
                    <span class="progress-number"><b><?=$score;?></b>/10</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-success" style="width: <?=$score;?>0%"></div>
                    </div>
                  </div>
                
                
                <div class="progress-group">
                    <span class="progress-text">Wrong</span>
                    <span class="progress-number"><b><?=$salah;?></b>/10</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-danger" style="width: <?=$salah;?>0%"></div>
                    </div>
                  </div>
                
                
                
                <div class="progress-group">
                    <span class="progress-text">Point</span>
                    <span class="progress-number"><b><?=$point;?></b>/20</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-info" style="width: <?=$point/20*100;?>%"></div>
                    </div>
                  </div>
                
              <div style="margin:8px">  <a href="/quiz" class="btn btn-primary btn-block"> Start over?</a>
                  <a href="/quiz/newQuiz" class="btn btn-default btn-block"> Create quiz!</a></div>
              </div>
			</div>      
                
            <!-- /.box-body -->
          </div>
      
    </div>
    
      <div class="col-md-6">
      <div class="box box-widget">
        <div class="box-header">Total score</div>
        <div class="box-body">
        
                <?php
                foreach($this->quiz_model->getUserScore($this->session->userdata('iduser'))->result() as $yes){
                $skor = $yes->score;
                $slah = $yes->salah;
                $pnt = $yes->point;
                }
                
                ?>
          
          <table class="table table-striped table-bordered">
          <thead>
            <th class="text-success">Correct</th>
            <th class="text-danger">Wrong</th>
            <th class="text-info">Point</th>
            </thead>
            <tr>
            <td><?=$skor;?></td>
              <td><?=$slah;?></td>
              <td><?=$pnt;?></td>
            </tr>
          
          
          </table>
        
        </div>
        </div>
      </div>
  </div>
</section>
    
</div>