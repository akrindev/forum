  <!-- Content Wrapper. Contains page content -->

<script src="/assets/js/sweetalert.min.js"></script>
<link rel="stylesheet" href="/assets/css/sweetalert.css">


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Iruna Online Quiz 
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/quiz">Quiz</a></li>
        <li class="active">Quiz started</li>
      </ol>
    </section>

			  <?=form_open('quiz/submitAjax/',['id'=>'form-quiz']);?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
    
              <div class="callout callout-info">
                <p><?=lang('info_save');?></p>
              </div>
    </div>
    <div class="col-md-7">
      
      
  <div class="box box-primary">
    <div id="oper" class="overlay">
    <i class="fa fa-spinner fa-spin"></i>
    </div>
  <div class="box-header">
    Quiz: <?=$id;?> / 10
  </div>
            <div class="box-body">
				<div class="text-center"><?=$this->bbcode->bbcode_to_html($question);?></div>
			  <div class="pull-right text-muted small">quiz by <?=$by;?></div>
			</div>
        <div class="box-footer">
                <!-- radio -->
                <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="answer-<?=$id;?>" id="optionsRadios1" value="1" <?= ($this->session->userdata('answer-'.$id) == 1 ? 'checked' : '');?>> <?=$this->bbcode->bbcode_to_html($answer_a);?>
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="answer-<?=$id;?>" id="optionsRadios2" value="2"  <?= ($this->session->userdata('answer-'.$id) == 2 ? 'checked' : '');?>>
          <?=$this->bbcode->bbcode_to_html($answer_b);?>
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="answer-<?=$id;?>" id="optionsRadios3" value="3" <?= ($this->session->userdata('answer-'.$id) == 3 ? 'checked' : '');?>> <?=$this->bbcode->bbcode_to_html($answer_c);?>
                    </label>
                  </div>
                  
                  <div class="radio">
                    <label>
                      <input type="radio" name="answer-<?=$id;?>" id="optionsRadios3" value="4" <?= ($this->session->userdata('answer-'.$id) == 4 ? 'checked' : '');?>> <?=$this->bbcode->bbcode_to_html($answer_d);?>
                    </label>
                  </div>
                </div>
<input type="hidden" name="qid" value="<?=$quiz_id;?>">
          
<input type="hidden" name="certid" value="<?=$id;?>">
                <!-- select -->
        <?php
          $back = $id-1;
          echo ($id != 1 ? '<a id="backq" qid="'.$back.'" class="btn btn-default pull-left" onClick="kembali()">Back</a>&nbsp;&nbsp;&nbsp;&nbsp;' : '');?> 
          
          <button type="submit" id="submit" class="btn btn-primary"><?=lang('save_q');?></button>
          
          <?php
          $link = $id+1;
          echo ($id != 10 ? '<a id="nextq" qid="'.$link.'" class="btn btn-default pull-right" onClick="lanjut()">Next</a>' : '<span onclick="ok()" class="btn btn-success pull-right">Submit!</span>');?>
          
		</div>
            <!-- /.box-body -->
          </div>
    </div>
    <div class="col-md-5">
      
<div class="box box-default">
  <div class="box-header with-padding">
    <?=lang('answered');?>: <?php
    $terjwb = 0;
    for($o=1;$o<=10;$o++)
    {
      $terjwb += count($this->session->userdata('answer-'.$o));
    }
    echo "<span id='terjwb' c='$terjwb'>$terjwb/10</span>";
    ?>
  </div>
       <div class="box-body">
         <?php
         for($i=1;$i<=10;$i++)
         {
         ?>
         <a onClick="tabel(<?=$i;?>)" style="padding:10px;display:inline-block;border:1px solid grey;margin:1px">
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
    
      <?=form_close();?>
</div>


<script>
  var dijawab = 0;
  
	$('#form-quiz').submit(function(e) {
		e.preventDefault();
      
    	$("#submit").addClass('disabled')
    				.html('<i class="fa fa-spinner fa-spin"></i> <?=lang('save_q');?>');
      
    	
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			success: function(response) {
              
              dijawab = response.dijawab;
              
                $("section.content").load('/quiz/beginAjax/'+response.me, function(){
                    
                    $("#oper").hide();
                  
                swal('success!','Answer saved!','success');
                })
                
              
    	$("#submit").removeClass('disabled')
    			.text('<?=lang('save_q');?>');
            }
        })
      return false;
    })
</script>

<script>
   $("#oper").hide();
  function lanjut(){
    var me = $("#nextq").attr('qid');
     $("#oper").show();    
     $("section.content").load('/quiz/beginAjax/'+me,function(){
       
  		$("#oper").hide()
        
     });    
  }
  
  function kembali(){
    var me = $("#backq").attr('qid');
     $("#oper").show();    
     $("section.content").load('/quiz/beginAjax/'+me,function(){
  		$("#oper").hide();
     });    
  }
  
  
  function tabel(me){
     $("#oper").show();    
     $("section.content").load('/quiz/beginAjax/'+me,function(){
  		$("#oper").hide();
     });    
  }
 
  function ok()
  {
    swal({
  title: "<?=lang('u_sure');?>",
  text: "<?=lang('u_will');?> \n <?=lang('answered');?>: "+dijawab+" / 10",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-success",
  confirmButtonText: "Yup!",
  closeOnConfirm: false
},
function(){
  swal("Great!", "Quiz submited", "success");
      document.location.href = '/quiz/submitQuiz';
});
  }
</script>