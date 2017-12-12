  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         <?=$name;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=base_url();?>/price"><i class="fa fa-dashboard"></i> Price</a></li>
        <li><a href="<?=base_url();?>/price/<?=$type?>"><?=$type?></a></li>
        <li class="active"><a href="/forum"><?=$name;?>s</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
   
    <section class="content">
	  
	
      <div class="price">
        <div class="h">
          <form class="search-form">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search">

              <div class="input-group-btn">
                <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
                </button>
              </div>
            </div>
            <!-- /.input-group -->
          </form>
        </div>
        <!-- /.error-content -->
      </div>
	  <div style="margin:20px;"></div>
	  <!-- price items -->
	<div class="row">
	  <div class="col-xs-12">
		<div class="box box-warning">
		  <div class="box-body">
			<h4 class="text-primary"><?=$name?><small><?=$type?></small></h4>
			<table class="table table-striped table-condensed">
			<thead>
			  <tr>
				  <th>Latest</th>
				  <th>Price</th>
			  	  <th>Stk</th>
			  	  <th>NPC</th>
			  </tr>
			</thead>
				<tr>
				  <td> <?=$date?></td>
				  <td> <?=$price?> </td>
				  <td> <?=$stk?> </td>
				  <td> <?=$npc?> </td>
				</tr>
			</table>
		  </div>
		<!--
		  <div class="box-footer">
			<h5><i class="fa fa-hourglass-half"></i> History</h5>
			<table class="table table-striped table-condensed">
			  <thead>
				<tr>
				  <th>Date</th>
				  <th>Price</th>
				  <th>Stk</th>
				</tr>
			  </thead>
			  <tr>
				<td> December 12, 2017</td>
				<td> 200m </td>
				<td> 200k</td>
			  </tr>
			</table>
		  </div>
		-->
		</div>
	  </div>
	</div> <!-- row -->
	<!-- / price item -->
      <!-- uuhh -->
	
	</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->