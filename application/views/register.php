  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        	Register
      </h1>
      <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?=base_url();?>"><i class="fa fa-dashboard"></i><span itemprop="name"> Home</span></a></li>
        <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="active"><span itemprop="item"><span itemprop="name">Register</span></span></li>
      </ol>
    </section>
	
	<div class="register-box">
  <div class="register-logo">
    <a href="/"><b>Rokoko</b>-Iruna</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Daftar jadi member baru</p>

<?= form_open('user/ndaftar',array('id'=>'form-register'));?>
      <div class="form-group">
        <input type="text" name="username" class="form-control" placeholder="Username" value="<?=set_value('username');?>">
        <?php if(form_error('username')) echo form_error('username','<div class="text-danger">','</div>');?>
      </div>
      <div class="form-group">
        <input type="text" name="ign" class="form-control" placeholder="IGN" value="<?=set_value('ign');?>">

      </div>
      <div class="form-group">
        <input type="text" name="fullname" class="form-control" placeholder="Full name" value="<?=set_value('fullname');?>">
        	 <?php if(form_error('fullname')) echo form_error('fullname','<div class="text-danger">','</div>');?>
      </div>
      <div class="form-group">
        <input type="text" name="kota" class="form-control" placeholder="city" value="<?=set_value('kota');?>">
              <?php if(form_error('kota')) echo form_error('kota','<div class="text-danger">','</div>');?>
      </div>
        <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Email" value="<?=set_value('email');?>">
              <?php if(form_error('email')) echo form_error('email','<div class="text-danger">','</div>');?>
      </div>
          <div class="form-group">
<select id="gender" class="form-control" name="gender">
   <option value="cowok">Male</option>
   <option value="cewek">Female</option>
   <option value="hode">Hode</option>
</select>
<br/>
              <?php if(form_error('gender')) echo form_error('gender','<div class="text-danger">','</div>');?>
      </div>
      <div class="form-group">
			  <textarea id="quotes" class="form-control" name="quotes" placeholder="Signature"><?=set_value('quotes');?></textarea>
	    <?php if(form_error('quotes')) echo form_error('quotes','<div class="text-danger">','</div>');?>
      </div>
          <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="password">
              <?php if(form_error('password')) echo form_error('password','<div class="text-danger">','</div>');?>
      </div>
             <div class="form-group">
        <input type="password" name="re-password" class="form-control" placeholder="Confirm password">
              <?php if(form_error('re-password')) echo form_error('re-password','<div class="text-danger">','</div>');?>
      </div>
      <div class="form-group">
      	  <p class="center-block"><?=$this->recaptcha->getWidget()?></p>
      </div>
      <div class="row">
        <div class="col-xs-6">
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
        <!-- /.col -->
      </div>
    <?=form_close();?>
  </div>
  <!-- /.form-box -->
</div>
    <section class="content"></section>
    </div> 
  <!-- /.content-wrapper -->