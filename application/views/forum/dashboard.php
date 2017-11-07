
	<main>

	  <div class="container-fluid">

		<!--breadcrumb-->
		<div style="margin-top:10px"></div>
		<nav aria-label="breadcrumb" role="navigation">
		<ol class="breadcrumb">
		  <li class="breadcrumb-item"><a href="/forum">Forum</a></li>
		  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
		</ol>
</nav>

<?php $gr = $this->gravatar->get($nyun['email']);?>

		<div class="row">
		  <div class="col-12">
	      	<div class="propil" style="word-wrap:break-word">
			  <div class="propil-img">
<img src="<?=$gr;?>" class="img center-block img-fluid"/></div>
			  <div class="propil-info">
				<div class="quote"><?=$nyun['quotes'];?></div>
                <a class="btn btn-danger"  href="user/logout">Keluar</a><br/><div style="margin-top:10px"></div>
                
				<table class="table table-sm table-hover table-striped">
			
					<tr>
					  <th scope="row">Username</td>
					  <td>:</td>
					  <td><?php echo $nyun['username'];?></td>
					</tr>
<tr>
					  <th scope="row">IGN</td>
					  <td>:</td>
					  <td><?php echo $nyun['ign'];?></td>
					</tr>
	<tr>
					  <th scope="row">Email</td>
					  <td>:</td>
					  <td><?php echo $nyun['email'];?></td>
					</tr>
				  <tr>
					<th scope="row">kota</td>
					<td>:</td>
					<td><?php echo $nyun['kota'];?></td>
				  </tr>
				 <!-- <tr>
					<td>Facebook</td>
					<td>:</td>
					<td>Akrin Min</td>
				  </tr>-->
				  
				  <tr>
					<th scope="row">Nama Lengkap</td>
					<td>:</td>
					<td><?=$nyun['fullname'];?></td>
				  </tr>
				  <tr>
					<th scope="row">Gender</td>
					<td>:</td>
					<td><?php echo $nyun['gender'];?></td>
				  </tr>
				  
				</table>
             
			  </div>
			</div><!--propil-->
			
		  </div><!--col-->



		</div><!--row-->


	  </div><!--comtainer-->

	</main><!--maiinnn-->

	<footer>
	  <div class="footer-forum">Copyright 2017 - All Right Reserved</div>
	</footer>

  </body>
</html>