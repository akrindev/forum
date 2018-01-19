  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        	Login
      </h1>
      <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?=base_url();?>"><i class="fa fa-dashboard"></i><span itemprop="name"> Home</span></a></li>
        <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="active"><span itemprop="item"><span itemprop="name">Login</span></span></li>
      </ol>
    </section>
	
	
    <!-- Main content -->
    
	
	<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>Rokoko</b>-Iruna</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in</p>
       <?php 
              if($this->session->flashdata('cukses'))
              {
                echo "<div class=\"alert alert-success\">".$this->session->flashdata('cukses')."</div>";
                
              }
              ?>
        
       <?php 
              if($this->session->flashdata('gagal_login'))
              {
                echo '<div class="alert alert-danger">'.$this->session->flashdata('gagal_login').'</div>';}?>
              
<?= form_open('user/login');?>
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="username" value="<?=set_value('username');?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
               <?= form_error('username','<div class="alert alert-danger">','</div>');?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
       <?= form_error('password','<div class="alert alert-danger">','</div>');?>
      </div>
      <div class="row">
        <div class="col-xs-6">
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>



    <a href="/reset">Forgot your password?</a><br>
    <a href="/register" class="text-center">Register</a>

  </div>
  <!-- /.login-box-body -->
</div>
	<section class="content"></section>
	
    <!-- /.content -->
    </div> 
  <!-- /.content-wrapper -->