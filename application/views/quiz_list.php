  <!-- Content Wrapper. Contains page content -->
<script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
<link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Iruna Quiz
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/quiz">quiz</a></li>
        
      </ol>
    </section>

<section class="content">
  <div class="row">
    <div class="col-md-9">
<div class="box box-warning">
  <div class="box-header">
    Quiz: <?=$id;?> / 10
  </div>
			  <?=form_open('quiz/beginQuiz/'.$id);?>
            <div class="box-body">
				<div class="text-center"><?=$question;?></div>
			  <div class="pull-right text-muted small">quiz by <?=$by;?></div>
			</div>
        <div class="box-footer">
                <!-- radio -->
                <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="answer-<?=$id;?>" id="optionsRadios1" value="1" <?= ($this->session->userdata('answer-'.$id) == 1 ? 'checked' : '');?>><?=$answer_a;?>
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="answer-<?=$id;?>" id="optionsRadios2" value="2"  <?= ($this->session->userdata('answer-'.$id) == 2 ? 'checked' : '');?>>
          <?=$answer_b;?>
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="answer-<?=$id;?>" id="optionsRadios3" value="3" <?= ($this->session->userdata('answer-'.$id) == 3 ? 'checked' : '');?>><?=$answer_c;?>
                    </label>
                  </div>
                  
                  <div class="radio">
                    <label>
                      <input type="radio" name="answer-<?=$id;?>" id="optionsRadios3" value="4" <?= ($this->session->userdata('answer-'.$id) == 4 ? 'checked' : '');?>><?=$answer_d;?>
                    </label>
                  </div>
                </div>
<input type="hidden" name="qid" value="<?=$quiz_id;?>">
                <!-- select -->
        <?php $back = $id-1; echo ($id != 1 ? '<a href="/quiz/beginQuiz/'.$back.'" class="btn btn-default pull-left">Back</a>&nbsp;&nbsp;&nbsp;&nbsp;' : '');?>  <button class="btn btn-primary">Submit</button> <?php $link = $id+1; echo ($id != 10 ? '<a href="/quiz/beginQuiz/'.$link.'" class="btn btn-default pull-right">Next</a>' : '<span onclick="ok()" class="btn btn-success pull-right">Selesai!</span>');?>
		</div>
      <?=form_close();?>
            <!-- /.box-body -->
          </div>
    </div>
    <div class="col-md-9">
      
<div class="box box-danger">
  <div class="box-header">
    Terjawab: <?php
    $terjwb = 0;
    for($o=1;$o<=10;$o++)
    {
      $terjwb += count($this->session->userdata('answer-'.$o));
    }
    echo "$terjwb/10"
    ?>
  </div>
       <div class="box-body">
         <?php
         for($i=1;$i<=10;$i++)
         {
         ?>
         <a href="/quiz/beginQuiz/<?=$i;?>" style="padding:10px;display:inline-block;border:1px solid grey;margin:1px">
         Q: <?=$i;?> (<?php
           $jwb = $this->session->userdata('answer-'.$i);
           if($jwb == 1)
           {
             echo "a";
           } else if($jwb == 2)
           {
             echo "b";
           } else if($jwb == 3)
           {
             echo "c";
           } else if($jwb == 4)
           {
             echo "d";
           } else
           {
             echo "&nbsp;";
           }
           
           ?>)
         
         </a>
  <?php } ?>
  </div>
      </div>
    </div>
  </div>
</section>
    
</div>

<script>
  function ok()
  {
    swal({
  title: "Yakin?",
  text: "Kamu akan mensubmit quiz! \n Terjawab: "+<?=$terjwb;?>+"/10",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-success",
  confirmButtonText: "Ya, selesai!",
  closeOnConfirm: false
},
function(){
  swal("Selesai!", "Quiz di submit", "success");
      document.location.href = '/quiz/submitQuiz';
});
  }
</script>