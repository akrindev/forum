


<main>

	  <div class="container-fluid">
		
		 
			<div class="post-titlee"><h3>Last users</h3></div>
			<div class="mow">
		
			<?php
			foreach($users->result() as $user)
			{ 
				echo "<div style=\"font-size:10pt;display:block;padding:3px;\">";
				echo "$user->id";
				echo " | $user->username | $user->kota | $user->ign | $user->email<br/> ";
				echo "<span class=\"text-muted small\">";
				echo time_ago($user->date);
				echo "</span> ";
				if($user->banned == 'n')
				{
					echo "<a href='/miemin/banned/y/$user->id' class=\"text-danger\">banned</a>";
				}
				else
				{
					echo "<a href='/miemin/banned/n/$user->id' class=\"text-success\">bebaskan</a>";
				}
				echo "</div>";
			}
			?>
				</br>
				<div class="btn btn-outline-dark disabled bll">Total users: <?=$this->miemin_model->total_count("users");?></div>
	
			</div>
	
	
	<div class="post-titlee"><h3>Last Post</h3></div>
			<div class="mow">
	<?php
	foreach($posts->result() as $post)
	{ ?>
		<a href="/forum/tl/<?=$post->slug;?>"><?=$post->judul?></a> <span class="text-muted small">[Dibaca: <?=$post->dilihat?>]</span> <span class="text-info small"> [Dibalas: <?php foreach($this->forum->get_comment_count($post->tlid)->result() as $com){ echo $com->c;}?>]</span><br/>
		<span class="text-muted small"><?=time_ago($post->date);?></span> Oleh: <span class="text-warning"><?=$post->username?></span> <a class="text-danger small" onclick="return confirm('yakin ingin menghapus')" href="/miemin/delpost/<?=$post->tlid?>">delete</a><br/>
		
<?php
	}
	
	?>
		
		</br>
				<div class="btn btn-outline-dark disabled bll">Total Post: <?=$this->miemin_model->total_count("timeline");?></div>
	</div>
	
	  </div><!--container-->

	</main>
	
		