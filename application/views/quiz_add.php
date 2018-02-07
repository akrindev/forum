 <!-- Content Wrapper. Contains page content -->
<?php
              if($this->session->userdata('user'))
              { ?>

<script src="/assets/js/sweetalert.min.js"></script>
<link rel="stylesheet" href="/assets/css/sweetalert.css">

<?php } ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Iruna Online Quiz <small>create your quiz</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/quiz">Quiz</a></li>
        <li class="active">Create quiz</li>
      </ol>
    </section>

<section class="content">
  <div class="row">
    <div class="col-md-10">
      <div class="box box-widget">
        <div class="box-header">
          Create quiz
        </div>
            <div class="box-body">
              <?php
              if(!$this->session->userdata('user'))
              {
                echo "<strong> Ups!! silahkan <a href='/login'>login</a> terlebih dahulu!</strong>";
              } else {
              ?>
              
              <form action='/quiz/submitNewQuiz' id='addquiz' method="POST">
                
                <input id="csrfp" type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
                
              <div class="form-group">
                <label><?=$this->lang->line('question');?></label>
                <div class="btn-group pull-right">
			  <div id="b_btn" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-bold"></span></div>
			  <div id="i_btn" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-italic"></span></div>
			 <div id="img_btn" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-picture"></span></div>
			</div>
                <textarea id="subject_textarea" class="form-control" name="pertanyaan" rows="6"></textarea>
                <div id="pertanyaan"></div>
                <?=form_error('pertanyaan','<div class="text-danger">','</div>');?>
		  
              </div>
              <div class="form-group">
                <label><?=$this->lang->line('answer_a');?></label>
                <input type="text" class="form-control" name="ja" id="ja">
                <?=form_error('ja','<div class="text-danger">','</div>');?>

              </div>
              
              <div class="form-group">
                <label><?=$this->lang->line('answer_b');?></label>
                <input type="text" class="form-control" name="jb" id="jb">
                <?=form_error('jb','<div class="text-danger">','</div>');?>

              </div>
              
              <div class="form-group">
                <label><?=$this->lang->line('answer_c');?></label>
                <input type="text" class="form-control" name="jc" id="jc">
                <?=form_error('jc','<div class="text-danger">','</div>');?>

              </div>
              
              <div class="form-group">
                <label><?=$this->lang->line('answer_d');?></label>
                <input type="text" class="form-control" name="jd" id="jd">
                <?=form_error('jd','<div class="text-danger">','</div>');?>

              </div>
              <div class="form-group">
                <label><?=$this->lang->line('correct');?></label>
                <input type="hidden" id="correct"><br>
                <label class="radio-inline">
                  <input type="radio" name="correct" value="1" checked> a
                </label>
                <label class="radio-inline">
                  <input type="radio" name="correct" value="2"> b
                </label>
                <label class="radio-inline">
                  <input type="radio" name="correct" value="3"> c
                </label>
                <label class="radio-inline">
                  <input type="radio" name="correct" value="4"> d
                </label>
                
<?=form_error('correct','<div class="text-danger">','</div>');?>
              </div>
                <div class="form-group">
                  <div id="lang"></div>
                <label><?=$this->lang->line('language');?></label><br>
                <div class="radio">
                  <label>
                  <input type="radio" name="lang" value="id"> Indonesia
                 </label>
                  </div>
                 
                  <div class="radio"><label>
                  <input type="radio" name="lang" value="en" checked> English
                 </label>
                </div>
                </div>
              <button class="btn btn-success btn-block" id="submitbtn" type="submit">Send quiz</button>
              </form>
           <?php } ?>
			</div>                
            <!-- /.box-body -->
        </div>
    </div>
    <div class="col-md-10">
      
      <div class="box box-widget">
        <div class="box-header">
          Rules for creating quiz
        </div>
            <div class="box-body">
           
             <?=$this->lang->line('rules_q');?>
              
			</div>                
            <!-- /.box-body -->
        </div>
    </div>
  </div>
</section>
    
</div>
<?php
              if($this->session->userdata('user'))
              {
                ?>

<script>
	$('#addquiz').submit(function(e) {
		e.preventDefault();

		var me = $(this);
      
      	$("#submitbtn").html('Sending <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
        $("#submitbtn").addClass('disabled');

		// perform ajax
		$.ajax({
			url: me.attr('action'),
			type: 'post',
			data: me.serialize(),
			dataType: 'json',
			success: function(response) {
            
            	$("#csrfp").val(response.csrfHash);
              
				if (response.success == true) {
					// if success we would show message
           swal({
  title: "Success!",
  text: "Quiz submited",
  type: "success",
  showCancelButton: false,
  closeOnConfirm: false,
  showLoaderOnConfirm: true
}, function () {
  setTimeout(function () {
    swal("Yay!","Lets create more quiz! :)","success");
  }, 1000);
});
					// and also remove the error class
					
					$('.form-group').removeClass('has-error')
									.removeClass('has-success');
					$('.text-danger').remove();

					// reset the form
					me[0].reset();
				$("#submitbtn").text('Ajukan quiz');
                  $("#submitbtn").removeClass('disabled');
				}
				else {
                  		$("#submitbtn").removeClass('disabled');
                  $("#submitbtn").text('Send quiz');
					$.each(response.messages, function(key, value) {
						var element = $('#' + key);
						
						element.closest('div.form-group')
						.removeClass('has-error')
						.addClass(value.length > 0 ? 'has-error' : 'has-success')
						.find('.text-danger')
						.remove();
						
						element.after(value);
					});
				}
			}
		});
	});
</script>
<?php } ?>