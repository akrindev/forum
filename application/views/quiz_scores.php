
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Iruna Online Quiz <small>all scores</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/quiz">Quiz</a></li>
        <li class="active">All scores</li>
      </ol>
    </section>

<section class="content">
  <div class="box box-widget">
    <div class="box-header">
     <i class="fa fa-trophy"></i> Seluruh peringkat
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
    <div class="box-footer">
    
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