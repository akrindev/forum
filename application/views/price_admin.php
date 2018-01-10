  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Admin
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=base_url();?>/price"> Price</a></li>
        <li class="active">Admin</li>
      </ol>
    </section>
    
    <section class="content">
    
    <div class="box box-solid">
      <div class="box-header">
      <h4 class="box-title">Moderasi harga</h4>
      </div>
      
      <div class="box-body no-padding">
        <div class="table-responsive">
      <table class="table table-striped">
        
        <thead>
          <th>Name</th>
          <th>Price</th>
          <th>Stk</th>
          <th>Oleh</th>
          <th>Pada</th>
          <th>Aksi</th>
        </thead>
        <?php
        foreach($this->price_model->getFilterHarga() as $i):
        
        ?>
        <tr>
          <td><?=$i->name;?></td>
          <td><?=$i->price;?></td>
          <td><?=$i->stk;?></td>
          <td><?=$i->username;?></td>
          <td><?=$i->date;?></td>
          <td><a href="/price/kasus/<?=$i->idn;?>" class="btn btn-default">Terima</a></td>
        </tr>
        
        <?php
        endforeach;
        ?>
      </table>
     </div>
      </div>
      
    </div>
    
    
    
    </section>
    
</div>