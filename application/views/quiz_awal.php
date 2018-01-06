
<script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
<link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css">

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Iruna Quiz
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="/quiz">Iruna quiz</a></li>
        
      </ol>
    </section>

<section class="content">
  <div class="row">
    <div class="col-md-10">
  <div class="box box-widget">
    <div class="box-header">
      Top Scores
    </div>
    <div class="box-body no-padding">
      
      <ul class="nav nav-stacked">
        <?php
        $ke = 1;
      foreach($tops as $top)
      {
        ?>
      
        <li><a><?=$ke;?>. <?=$top->username;?> <span class="text-success">Correct: <?=$top->score;?></span> <span class="text-danger">Incorrect: <?=$top->salah;?></span>  <span class="text-warning">Point: <?=$top->point;?></span></a></li>
      <?php
        $ke++;
      } 
  
  ?>
      </ul>
	</div>     <!-- /.box-body -->
          </div>
    </div>
    <div class="col-md-10">
  <div class="box box-widget">
    <div class="box-header">
       Sistem quiz
    </div>
     <div class="box-body">
       <strong> --- Quiz --- </strong><br>
<p><br>
Quiz berisi 10 pertanyaan.<br>
tidak ada batasan waktu saat mengerjakan. Quiz berasal dari user yang telah mensubmit pertanyaan, kamu juga dapat mensubmit pertanyaan <a href="/quiz/newQuiz">disini!</a>
<br>
Quiz hanya untuk mengetes pengetahuanmu tentang iruna
</p>

<strong> --- Point yang di dapat --- </strong>
<p><br>
Point di dapat ketika kamu telah selesai mensubmit quiz dan otomatis di tambahkan ke total pointmu saat ini.<br><br>
jika jawaban benar kurang dari 3 kamu medapat +2 point<br>
jika jawaban benar 3-5 kamu mendapat +5 point<br>
jika jawaban benar 6-7 kamu mendapat +12 point<br>
jika jawaban benar lebih dari 8 kamu mendapat +20 point<br>
</p>


<strong> --- Top Score --- </strong>
<p><br>
Data user yang tampil pada Top score berdasarkan banyaknya point yang di dapat
</p><br><br>
       <a onclick="mulaiMas()" class="btn btn-primary btn-block">Mulai quiz</a>
    </div>
      </div>
    </div>
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
  title: "Mulai!",
  text: "Mulai quiz?",
  type: "info",
  showCancelButton: true,
  closeOnConfirm: false,
  showLoaderOnConfirm: true
}, function () {
  setTimeout(function () {
    swal("Kamu belum login");
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
  title: "Mulai!",
  text: "Memulai quiz!",
  type: "success",
  showCancelButton: false,
  closeOnConfirm: false,
  showLoaderOnConfirm: true
}, function () {
  setTimeout(function () {
    window.location.href = '/quiz/begin';
  }, 2000);
});
  }

</script>


<?php
}


?>