  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        	Dashboard
      </h1>
      <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?=base_url();?>"><i class="fa fa-dashboard"></i><span itemprop="name"> Home</span></a></li>
        <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="active"><span itemprop="item"><span itemprop="name">Dashboard</span></span></li>
      </ol>
    </section>
	
	
    <!-- Main content -->
    <section class="content">
<div class="row">
	  <div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
		  <span class="info-box-icon bg-aqua"><span class="glyphicon glyphicon-book"></span></span>

		  <div class="info-box-content">
			<span class="info-box-text">Threads</span>
			<span class="info-box-number"><?=$this->user->get_user_posted("timeline",$user['id'])->num_rows();?><small>x</small></span>
		  </div>
		  <!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	  </div>
	  <!-- /.col -->
	  <div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
		  <span class="info-box-icon bg-red"><span class="glyphicon glyphicon-send"></span></span>

		  <div class="info-box-content">
			<span class="info-box-text">Topics</span>
			<span class="info-box-number"><?=$this->user->get_user_posted("komentar",$user['id'])->num_rows();?></span>
		  </div>
		  <!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	  </div>
	  <!-- /.col -->

	  <!-- fix for small devices only -->
	  <div class="clearfix visible-sm-block"></div>

	  <div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
		  <span class="info-box-icon bg-green"><span class="glyphicon glyphicon-eye-open"></span></span>

		  <div class="info-box-content">
			<span class="info-box-text">Views</span>
			<span class="info-box-number"><?=$this->user->get_user_total_views("timeline",$user['id'])?></span>
		  </div>
		  <!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	  </div>
	  <!-- /.col -->
	  <div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
		  <span class="info-box-icon bg-yellow"><span class="glyphicon glyphicon-pencil"></span></span>

		  <div class="info-box-content">
			<span class="info-box-text">Responses</span>
			<span class="info-box-number"><?=$this->user->get_user_total_comments($user['id'])?></span>
		  </div>
		  <!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	  </div>
	  <!-- /.col -->
	</div>
	
	<div class="box box-widget widget-user-2">
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="<?=$this->gravatar->get($user['email']);?>" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?=$user['fullname'];?></h3>
              <h5 class="widget-user-desc"><?=$user['quotes'];?></h5>
              <h6 class="widget-user-desc">Member since <?=pisah_waktu($user['date']);?></h6>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#"><?=$user['kota'];?> <span class="pull-right badge bg-yellow"><i class="fa fa-map-marker"></i></span></a></li>
                <li><a href="#"><?=$user['gender'];?> <span class="pull-right badge bg-aqua"><i class="fa fa-neuter"></i></span></a></li>
                <li><a href="#"><?=$user['ign'];?> <span class="pull-right badge bg-green"><i class="fa fa-hand-peace-o"></i></span></a></li>
                <li><a href="#"><?=$user['email'];?> <span class="pull-right badge bg-red"><i class="fa fa-envelope"></i></span></a></li>
                <li><a href="<?=$user['fb'];?>"><?=$user['fb'];?> <span class="pull-right badge bg-blue"><i class="fa fa-facebook-square"></i></span></a></li>
              </ul>
            </div>
          </div>
	
	<div class="box">
            <div class="box-header">
              <h3 class="box-title"><?=$user['username'];?>'s Threads</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
            	<?php
				if($posts)
				{ ?>
					<table class="table table-striped">
                <tr>
                  <th>Judul</th>
             
                  <th style="width:100px">Opsi</th>
                </tr>
				<?php
				foreach($posts as $put)
				{
					?>
              
                <tr>
                  <td><a href="/forum/tl/<?=$put->slug;?>"><?=$put->judul;?></a><br/><span class="text-muted small"><?=pisah_waktu($put->date);?> <span class="badge bg-yellow">views: <?=$put->dilihat;?></span></span></td>
                 
                  <td><div class="btn-group"><a class="btn btn-danger btn-sm" onclick="return confirm('yakin ingin menghapus? \n Data tidak bisa di kembalikan ketika terhapus!')" href="/diskusi/erase/<?=$put->id;?>"><span class="glyphicon glyphicon-remove"></span></a><a class="btn btn-primary btn-sm" href="/diskusi/edit_post/<?=$put->id;?>"><span class="glyphicon glyphicon-pencil"></span></a></div></td>
                </tr>
              <?php 
					} 
       		 ?></table><?php
					} else {
						  echo "belum ada post";
					}
			?>
            </div>
          
            <!-- /.box-body -->
<ul class="pagination">
	<?php
	foreach($links as $link)
	{ 
		echo $link;
	}
	?>
</ul>
          </div>
	
<?php
   $idku = $this->session->iduser;
   $gg = $this->db->where('user_id',$idku)->where('status',1)->get('scammers');
      
   if($gg->num_rows() > 0):
 ?>
      <div class="panel box box-danger">
        <div class="box-header">Posted on scammer</div>
        <div class="box-body">
          
          <?php
      foreach($gg->result() as $j):
?>
        <ul class="nav nav-stacked">
          <li><a href="/scammers/read/<?=$j->slug;?>" class="text-primary">
          <?=$j->kasus;?><br>
      <span class="text-muted"> <?=pisah_waktu($j->date);?>
</span>          </a></li>
      
      </ul>
<?php
      endforeach; ?>
         </div>
    </div>
        
 <?php
   endif;
  ?>
      
	</section>
    <!-- /.content -->
    </div> 
  <!-- /.content-wrapper -->