
	<main>

	  <div class="container-fluid">

		<!--breadcrumb-->
		<div style="margin-top:10px"></div>
		<nav aria-label="breadcrumb" role="navigation">
		  <ol class="breadcrumb" itemscope="" itemtype="http://schema.org/
			BreadcrumbList">
			<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><span itemprop="item"><a href="/" itemprop="name">Home</a></span></li>
			<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem" class="divider">/</li>
			
			<li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem" itemprop="item" class="active"><span itemprop="name">Daftar</span></li>
			
		  </ol>
		</nav>
	  

   		<!--<?php echo validation_errors(); ?>-->

		<div class="row">
		  <div class="col-12">
			<div class="login-card">
			<?= form_open('user/ndaftar',array('id'=>'form-register'));?>
			<div class="showw">
			  <label for="username" class="badge badge-dark">Username</label>
			  <input id="username" type="text" class="form-log" name="username" placeholder="username"/>      <?php if(form_error('username')) echo form_error('username','<div class="error-msg">','</div>');?>
           </div>
 
              <label class="badge badge-dark">IGN <small>(in game)</small></label>
			  <input id="ign" type="text" class="form-log" name="ign" placeholder="IGN in game"/>
              <?php if(form_error('ign')) echo form_error('ign','<div class="error-msg">','</div>');?>
              
               <label class="badge badge-dark">Fullname</label>
			  <input id="fullname" type="text" class="form-log" name="fullname" placeholder="fullname"/>
			 <?php if(form_error('fullname')) echo form_error('fullname','<div class="error-msg">','</div>');?>
			  <label class="badge badge-dark">kata sandi</label>
			  <input id="password" type="password" class="form-log" name="password" placeholder="password"/>
              <?php if(form_error('password')) echo form_error('password','<div class="error-msg">','</div>');?>
			  <label class="badge badge-dark">Ulangi kata sandi</label>
			  <input id="re-password" type="password" class="form-log" name="re-password" placeholder="ulangi password"/>
              <?php if(form_error('re-password')) echo form_error('re-password','<div class="error-msg">','</div>');?>
			  <label class="badge badge-dark">Kota</label>
			  <input id="kota" type="text" class="form-log" name="kota" placeholder="kota"/>
              <?php if(form_error('kota')) echo form_error('kota','<div class="error-msg">','</div>');?>
   		  <label class="badge badge-dark">email</label>
			  <input id="email"  type="text" class="form-log" name="email" placeholder="email"/>
              <?php if(form_error('email')) echo form_error('email','<div class="error-msg">','</div>');?>
<label class="badge badge-dark">Gender</label>
<br/>
<select id="gender" class="form-log" name="gender">
   <option value="cowok">cowok</option>
   <option value="cewek">cewek</option>
   <option value="hode">hode</option>
</select>
<br/>
              <?php if(form_error('gender')) echo form_error('gender','<div class="error-msg">','</div>');?>
			  <label class="badge badge-dark">Quotes</label>

              <?php if(form_error('quotes')) echo form_error('quotes','<div class="error-msg">','</div>');?>
			  <textarea id="quotes" class="form-log" name="quotes" placeholder=""></textarea>
			
			  <p class="center-block"><?=$this->recaptcha->getWidget()?></p>
			  <button type="submit" class="btn btn-outline-success bll">Daftar</button>
			<?= form_close();?>
				<div style="margin-top:10px"></div>
			</div>
		  </div><!--col-->


		</div><!--row-->


	  </div><!--comtainer-->

	</main><!--maiinnn-->

	<footer>
	  <div class="footer-forum">Copyright 2017 - All Right Reserved</div>
	</footer>
	<script>

		
</script>
  </body>
</html>