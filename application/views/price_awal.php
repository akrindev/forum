<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Items price
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Items price</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="error-page">
        <h3 class="headline text-success">Iruna items prices</h3>

        <div class="error-content">
          <p>
            Write below and press enter :)
          </p>

 <div class="">
		<?php
		foreach($this->price_model->typenya()->result() as $r)
		{ ?>
			<a href="/harga/items/<?=$r->type;?>"><?=$r->type;?></a>&nbsp; . &nbsp;
	<?php } ?>
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
          <?=form_open('harga/cari');?>
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search">

              <div class="input-group-btn">
                <button type="submit" name="submit" class="btn btn-danger btn-flat"><i class="fa fa-search"></i>
                </button>
              </div>
            </div>
            <!-- /.input-group -->
          </form>
        </div>
      </div>
      <!-- /.error-page -->

    </section>
    <!-- /.content -->
  </div>