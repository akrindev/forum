  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         <?=ucfirst($type);?>s
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=base_url();?>/price"> Price</a></li>
        
        <li class="active"><a href="/forum"><?=ucfirst($type);?>s</a></li>
        
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
		<?php
		foreach($ini->result() as $uni){
		?>
	  <div class="col-xs-12 col-md-9">
		<div class="box box-warning">
		  <div class="box-body">
			<h4 class="text-primary"><?=$uni->name?><small><?=$uni->type?></small></h4>
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
				  <td> <?=$uni->latest_updated?></td>
				  <td> <?=$uni->price?> </td>
				  <td> <?=$uni->stk?> </td>
				  <td> <?=$uni->npc?> </td>
				</tr>
			</table>
			<?php 
if($this->session->userdata('level') == 'admin'){ ?>
			<button class="btn uio-<?=$uni->id;?> btn-primary" onClick="edit(<?=$uni->id;?>)">edit</button> <button class="btn btn-danger" onClick="delete(<?=$uni->id;?>)">delete</button>
			<?php } ?>
		  </div>
	
		</div>
	  </div>
	<?php 
		}
?>
	</div> <!-- row -->
	<!-- / price item -->
      <!-- uuhh -->
	
	</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  