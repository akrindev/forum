 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Iruna Online Quiz
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/quiz">Quiz</a></li>
        <li class="active">Start quiz</li>
      </ol>
    </section>

<section class="content">
  <div class="row">
    <div class="col-md-9">
<div class="box">
            <div class="box-body">
              <div class=""><strong class="text-center"><?=$this->lang->line('select_lang');?></strong><br/>
                <strong></strong><br><br>
                <a href="/quiz/begin?lang=id" class="btn btn-default margin-bottom btn-block">Indonesia</a> 
                <br>
                <a href="/quiz/begin?lang=en" class="btn btn-default margin-bottom btn-block">English</a> 
</div>
			</div>      
                
            <!-- /.box-body -->
          </div>
    </div>
  </div>
</section>
    
</div>