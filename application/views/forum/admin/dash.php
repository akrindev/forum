


<main>

	  <div class="container-fluid">
		
		 
			<div class="post-titlee"><h3>Last users</h3></div>
			<div class="mow">
		<div class="cari-form">
				<?=form_open('miemin/cari');?>
			  <input type="text" name="user-cari" class="in-cari" placeholder="Cari sesuatu . . ."/>
			  <button type="submit" class="b-cari">cari</button>
			</form>
			</div>
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
				<a href="/miemin/allusers" class="btn btn-outline-dark bll">Total users: <?=$this->miemin_model->total_count("users");?></a>
	
			</div>
	
	
	<div class="post-titlee"><h3>Last Post</h3></div>
			<div class="mow">
				<div class="cari-form">
				<?=form_open('miemin/carip');?>
			  <input type="text" name="post-cari" class="in-cari" placeholder="Cari sesuatu . . ."/>
			  <button type="submit" class="b-cari">cari</button>
			</form>
			</div>
	<?php
	foreach($posts->result() as $post)
	{ ?>
		<a href="/forum/tl/<?=$post->slug;?>"><?=$post->judul?></a> <span class="text-muted small">[Dibaca: <?=$post->dilihat?>]</span> <span class="text-info small"> [Dibalas: <?php foreach($this->forum->get_comment_count($post->tlid)->result() as $com){ echo $com->c;}?>]</span><br/>
		<span class="text-muted small"><?=time_ago($post->date);?></span> <span class="small">Oleh: </span> <span class="text-warning"><?=$post->username?></span> <a class="text-danger small" onclick="return confirm('yakin ingin menghapus')" href="/miemin/delpost/<?=$post->tlid?>">delete</a>  - 
<?php
if($post->banned == 'n'){ ?>
<a class="text-danger small" onclick="return confirm('yakin ingin membanned?')" href="/miemin/banned_post/y/<?=$post->tlid?>">banned</a> 
<?php } else { ?>
	<a class="text-success small" href="/miemin/banned_post/n/<?=$post->tlid?>">bebaskan</a> 
	<?php } ?> |
		<?php
if($post->pinned == 1){ ?>
<a class="text-success small" onclick="return confirm('yakin ingin membanned?')" href="/miemin/pinned/0/<?=$post->tlid?>">pinned</a> 
<?php } else { ?>
	<a class="text-danger small" href="/miemin/pinned/1/<?=$post->tlid?>">unpinned</a> 
	<?php } ?>
<br/>
		
<?php
	}
	
	?>
		
		</br>
				<a href="/miemin/allposts" class="btn btn-outline-dark bll">Total Post: <?=$this->miemin_model->total_count("timeline");?></a>
	</div>
	
	  </div><!--container-->

	</main>
	
		