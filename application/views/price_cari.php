  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         <?=ucfirst($q);?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=base_url();?>/price"> Price</a></li>
        <li class="active"><?=$q;?></li>
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
	  <div style="margin:20px;"></div>
	  <!-- price items -->
	<div class="row">
	<?php
	if($cari){
	foreach($cari as $i){
		?>
	  <div class="col-md-9">
		<div class="box box-warning">
		  <div class="box-body yamete-<?=$i->id;?>">
			<h4 class="text-primary"><a href="/harga/item/<?=$i->slug;?>" title="<?=$i->name;?>"><?=$i->name?><small><?=$i->type?></small></a></h4>
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
				  <td> <?=$i->latest_updated?></td>
				  <td> <?=$i->price?> </td>
				  <td> <?=$i->stk?> </td>
				  <td> <?=$i->npc?> </td>
				</tr>
			</table>
			<?php 
if($this->session->userdata('level') == 'admin'){ ?>
			<button class="btn uio-<?=$i->id;?> btn-primary" onClick="edit(<?=$i->id;?>)">edit</button> <button class="btn nno-<?=$i->id;?> btn-danger" onClick="hps(<?=$i->id;?>)">delete</button>
			<?php } ?>
		  </div>
	
		</div>
	  </div>
	<?php
	}
	}
	?>
	</div> <!-- row -->
	<!-- / price item -->
      <!-- uuhh -->
	
	</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  