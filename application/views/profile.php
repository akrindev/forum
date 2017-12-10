  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        	 <?=$user['fullname'];?>
      </h1>
      <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?=base_url();?>"><i class="fa fa-dashboard"></i><span itemprop="name"> Home</span></a></li>
        <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="active"><span itemprop="item"><span itemprop="name"> <?=$user['fullname'];?> </span></span></li>
      </ol>
    </section>
	
	
    <!-- Main content -->
    <section class="content">
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
                
                <li><a class="text-primary" href="<?=$user['fb'];?>"><?=$user['fb'];?> <span class="pull-right badge bg-blue"><i class="fa fa-facebook-square"></i></span></a></li>
              </ul>
            </div>
          </div>
	
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
	
	<div class="box">
            <div class="box-header">
              <h3 class="box-title"><?=$user['username'];?>'s Thread</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
            	<?php
				if($posts)
				{ ?>
					<table class="table table-striped">
                <tr>
                  <th>Judul</th>
             
                  <th>Views</th>
                </tr>
				<?php
				foreach($posts as $put)
				{
					?>
              
                <tr>
                  <td><a href="/forum/tl/<?=$put->slug;?>"><?=$put->judul;?></a><br/><span class="text-muted small"><?=pisah_waktu($put->date);?> </span></td>
                 
                  <td><span class="badge bg-blue"><?=$put->dilihat;?></span> </td>
                </tr>
              <?php 
					} 
       		       	echo "</table>";
					} else {
						  echo "belum ada post";
					}
			?>
            </div>
            <!-- /.box-body -->
   
          </div>
	
	</section>
    <!-- /.content -->
    </div> 
  <!-- /.content-wrapper -->
