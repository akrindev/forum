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


		<div class="row">
		  <div class="col-sm-12 col-md-5">
	      	<div class="propil" style="word-wrap:break-word">
			  <div class="propil-img">
				<img src="<?=$this->gravatar->get($nyun['email']);?>" class="img center-block img-fluid"/>
				  
				</div>
			  <div class="propil-u"><span class="fn"><?=$nyun['fullname'];?></span><br/>
			  <span class="gnr"><?=$nyun['gender'];?></span><br/>
			  <span class="kt"><?=$nyun['kota'];?></span><br/>
				<a class="text-primary" href="/user/setting" id="sunting">[sunting profil]</a>
				</div>
			  <div class="propil-info">
				<div class="quote"><?=$nyun['quotes'];?></div>
                <br/>

				<table class="table table-sm table-hover table-striped">

				  <tr>
					<th scope="row">Username</th>
					  <td>:</td>
					  <td>@<?=$nyun['username'];?></td>
				  </tr>
				  <tr>
					<th scope="row">IGN</th>
					  <td>:</td>
					  <td><?=$nyun['ign'];?></td>
				  </tr>
				  <tr>
					<th scope="row">Email</th>
					  <td>:</td>
					  <td><?=$nyun['email'];?></td>
				  </tr>
				  <tr>
					<th scope="row">dibuat</th>
					  <td>:</td>
					  <td><?=$nyun['date'];?></td>
				  </tr>
				  <!-- <tr>
				  <td>Facebook</td>
				  <td>:</td>
				  <td>Akrin Min</td>
				  </tr>-->

				  <tr>
					<th scope="row">facebook</th>
					  <td>:</td>
					<td><a href="<?=$nyun['fb'];?>"><?=$nyun['fb'];?></a></td>
				  </tr>
				
				  <tr>
					<th scope="row">Topics</th>
					  <td>:</td>
					  <td><?=$this->user->get_user_post("timeline",$nyun['id'])->num_rows();?></td>
				  </tr>
				
				  <tr>
					<th scope="row">Replies</th>
					<td>:</td>
					<td><?=$this->user->get_user_post("komentar",$nyun['id'])->num_rows();?></td>
				  </tr>
				  <tr>
					<th scope="row">Images</th>
					<td>:</td>
					<td><?=$this->user->get_user_post("image",$nyun['id'])->num_rows();?></td>
				  </tr> 
				</table>

			  </div>
			</div><!--propil-->

		  </div><!--col-->
		  <div class="col-sm-12 col-md-7">
			<div class="propil-top">
			  <div class="jdl"><?=$nyun['username'];?>'s topics</div>
			  <div class="list-propil-p">
				<?php
				foreach($this->user->get_user_post("timeline",$nyun['id'])->result() as $put)
				{
					?>
				<a class="list-group-i" href="/forum/tl/<?=$put->slug;?>"><?=$put->judul;?><br/><span class="waktu"><?=$put->date;?></span></a>
				<?php } ?>
			  </div>
			</div>
		  </div>



		</div><!--row-->


	  </div><!--comtainer-->

	</main>

	<footer>
	  <div class="footer-forum">Copyright 2017 - All Right Reserved</div>
	</footer>

  </body>
</html>