  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         <?=ucfirst($name);?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=base_url();?>/price"> Price</a></li>
        <li class="active"><?=$name;?></li>
      </ol>
    </section>

    <!-- Main content -->
   
    <section class="content">
	  
	<div class="">
		<?php
		foreach($this->price_model->typenya()->result() as $r)
		{ ?>
			<a href="/harga/items/<?=$r->type;?>"><?=$r->type;?></a>&nbsp; . &nbsp;
	<?php } ?>
	</div>
      <div class="price">
        <div class="h">
            	<?=form_open('harga/cari',['class' => 'search-form']);?>
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
	   <div style="margin:20px 0;">
			<?php 
if($this->session->userdata('level') == 'admin'){ ?>
	
      <div class="">
      	<button class="btn btn-block bg-navy" onClick="tambahkan()"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
       </div>
       
       <?php
       }    
       ?>
	  </div>
	  <!-- price items -->
<article>
	<div class="row">
	  <div class="col-md-9">
		<div class="box box-warning">
		  <div class="box-body yamete-<?=$id;?>">
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
				  <td> <?=$latest_updated?></td>
				  <td> <?=$price?> </td>
				  <td> <?=$stk?> </td>
				  <td> <?=$npc?> </td>
				</tr>
			</table>
	<p style="padding:5px" class="text-muted"><?=$lang;?></p>
			<?php 
if($this->session->userdata('level') == 'admin'){ ?>
			<button class="btn uio-<?=$id;?> btn-primary" onClick="edit(<?=$id;?>)">edit</button> <button class="btn nno-<?=$id;?> btn-danger" onClick="hps(<?=$id;?>)">delete</button>
			<?php } ?>
		  </div>
		<?php
			$in = $this->price_model->get_history($id);
			if($in->num_rows() > 0){
				?>
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
			
				<?php
				foreach($in->result() as $g){
			?>
			  <tr>
				<td> <?=$g->date;?></td>
				<td> <?=$g->price;?> </td>
				<td> <?=$g->stk;?></td>
			  </tr>
			<?php } ?>
			</table>
		  </div>
		<?php } ?>
		</div>
	  </div>
	
	</div> <!-- row -->
</article>
	<!-- / price item -->
      <!-- uuhh -->
	
	</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  