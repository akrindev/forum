
	<main>

	  <div class="container-fluid">

		<!--breadcrumb-->
		<div style="margin-top:10px"></div>
		<nav aria-label="breadcrumb" role="navigation">
		<ol class="breadcrumb">
		  <li class="breadcrumb-item"><a href="/forum">Forum</a></li>
		  <li class="breadcrumb-item active" aria-current="page">Login</li>
		</ol>
</nav>


		<div class="row">
		  <div class="col-12">
			<div class="login-card">
              
       <?php 
              if($this->session->flashdata('cukses'))
              {
                echo "<div class=\"alert alert-success\">".$this->session->flashdata('cukses')."</div>";
                
              }
              ?>
        
       <?php 
              if($this->session->flashdata('gagal_login'))
              {
                echo '<div class="error-msg">'.$this->session->flashdata('gagal_login').'</div>';}?>
              
       <!--  <div class="propil">-->
<?= form_open('user/login');?>
			  <label  class="badge badge-dark" for="username">Username</label>
			  <input type="text" class="form-control" name="username" placeholder="username"/>
  <?php if(form_error('username')){echo form_error('username','<div class="error-msg">','</div>');}?>
			  <label  class="badge badge-dark" for"password">kata sandi</label>
			  <input type="password" class="form-control" name="password" placeholder="password"/>
  <div style="margin-top:10px"></div>
  <?php if(form_error('password')){echo form_error('password','<div class="error-msg">','</div>');}?>
			  
			  <button type="submit" class="btn btn-outline-primary bll">Masuk</button>
<?= form_close();?>
            <hr>
              <a href="<?=base_url();?>register" class="btn btn-outline-success bll">Daftar</a>
			</div>
		  </div><!--col-->


		</div><!--row-->


	  </div><!--comtainer-->

	</main><!--maiinnn-->

	<footer>
	  <div class="footer-forum">Copyright 2017 - All Right Reserved</div>
	</footer>

  </body>
</html>