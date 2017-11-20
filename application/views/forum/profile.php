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
					<th scope="row">dibuat</th>
					  <td>:</td>
					  <td><?=pisah_waktu($nyun['date']);?></td>
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
					<th scope="row">Posting</th>
					  <td>:</td>
					  <td><?=$this->user->get_user_posted("timeline",$nyun['id'])->num_rows();?><span class="text-muted">x</span></td>
				  </tr>
				
				  <tr>
					<th scope="row">Membalas</th>
					<td>:</td>
					<td><?=$this->user->get_user_posted("komentar",$nyun['id'])->num_rows();?><span class="text-muted">x</span></td>
				  </tr>
				  <tr>
					<th scope="row">Total dibaca</th>
					<td>:</td>
					<td><?=$this->user->get_user_total_views("timeline",$nyun['id'])?><span class="text-muted">x</span></td>
				  </tr> 
				<tr>
					<th scope="row">Total balasan</th>
					<td>:</td>
					<td><?=$this->user->get_user_total_comments($nyun['id'])?><span class="text-muted">x</span></td>
				  </tr> 
				</table>

			  </div>
			</div><!--propil-->

		  </div><!--col-->
		  <div class="col-sm-12 col-md-7">
			<div class="propil-top">
			  <div class="jdl"><?=$nyun['username'];?>'s topics</div>
			  <div class="list-propil-p">
				<ul>
				<?php
				if($posts)
				{
				foreach($posts as $put)
				{
					?><li class="list-group-i">
				<a href="/forum/tl/<?=$put->slug;?>"><?=$put->judul;?></a><br/><span class="waktu"><?=pisah_waktu($put->date);?></span> </li>
				<?php } 
					} else {
					echo "belum ada post";
					}
?>
					</ul>
			  </div>
			</div>
		  </div>



		</div><!--row-->


	  </div><!--comtainer-->

	</main>

	<footer>
	  <div class="footer-forum">Copyright 2017 - All Right Reserved</div>
	</footer>
<script>
		
	</script>
  </body>
</html>