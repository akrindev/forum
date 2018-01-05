 <!-- Content Wrapper. Contains page content -->
<?php
              if($this->session->userdata('user'))
              { ?>
<script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
<link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css">
<?php } ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Iruna Quiz
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/quiz">Submit quiz</a></li>
        
      </ol>
    </section>

<section class="content">
  <div class="row">
    <div class="col-md-10">
      <div class="box box-widget">
        <div class="box-header">
          Submit quiz
        </div>
            <div class="box-body">
              <?php
              if(!$this->session->userdata('user'))
              {
                echo "<strong> Ups!! silahkan <a href='/login'>login</a> terlebih dahulu!</strong>";
              } else {
              ?>
              
              <?=form_open('quiz/submitNewQuiz',['id'=>'addquiz']);?>
              <div class="form-group">
                <label>Pertanyaan</label>
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
                <label>Jawaban a</label>
                <input type="text" class="form-control" name="ja" id="ja">
                <?=form_error('ja','<div class="text-danger">','</div>');?>

              </div>
              
              <div class="form-group">
                <label>Jawaban b</label>
                <input type="text" class="form-control" name="jb" id="jb">
                <?=form_error('jb','<div class="text-danger">','</div>');?>

              </div>
              
              <div class="form-group">
                <label>Jawaban c</label>
                <input type="text" class="form-control" name="jc" id="jc">
                <?=form_error('jc','<div class="text-danger">','</div>');?>

              </div>
              
              <div class="form-group">
                <label>Jawaban d</label>
                <input type="text" class="form-control" name="jd" id="jd">
                <?=form_error('jd','<div class="text-danger">','</div>');?>

              </div>
              <div class="form-group">
                <label>Jawaban benar</label>
                <input type="hidden" id="correct">
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
              <button class="btn btn-success btn-block" id="submitbtn" type="submit">Ajukan quiz</button>
              <?=form_close();?>
           <?php } ?>
			</div>                
            <!-- /.box-body -->
        </div>
    </div>
    <div class="col-md-10">
      
      <div class="box box-widget">
        <div class="box-header">
          Peraturan membuat quiz
        </div>
            <div class="box-body">
           
             <ol>
               <li> Quiz bersangkutan dengan iruna </li>
               <li> Quiz tidak merendahkan seseorang / organisasi </li>
               <li> Berbahasa yang sopan </li>
               <li> Jawaban a, b, c, d harus diisi / tidak boleh kosong</li>
               <li> Koreksi terlebih dahulu sebelum mensubmit quiz</li>
               <li> Quiz tidak bisa di edit atau di ubah, hubungi <a href="mailto:admin@rokoko-iruna.com">admin@rokoko-iruna.com</a>
                 jika ingin melakukan tindakan tertentu </li>
              </ol>
              
              <strong> Quiz yang di submit akan di moderasi</strong>
              
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
      
      	$("#submitbtn").html('Mengirim <i class="fa fa-spinner" aria-hidden="true"></i>');
        $("#submitbtn").addClass('disabled');

		// perform ajax
		$.ajax({
			url: me.attr('action'),
			type: 'post',
			data: me.serialize(),
			dataType: 'json',
			success: function(response) {
				if (response.success == true) {
					// if success we would show message
           swal({
  title: "Selesai!",
  text: "Quiz telah di submit",
  type: "success",
  showCancelButton: false,
  closeOnConfirm: false,
  showLoaderOnConfirm: true
}, function () {
  setTimeout(function () {
    swal("Submit lebih banyak quiz!",":)","success");
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
                  $("#submitbtn").text('Ajukan quiz');
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