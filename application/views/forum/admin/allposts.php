<main>
	<div class="container-fluid">
		<div class="">
			<div class="post-titlee"><h3>All posts</h3></div>
			<div class="cari-form">
				<?=form_open('miemin/carip');?>
			  <input type="text" name="post-cari" class="in-cari" placeholder="Cari sesuatu . . ."/>
			  <button type="submit" class="b-cari">cari</button>
			</form>
			</div>
			<?php
			foreach($posts as $u)
			{?>
		<div style="margin:1px -7px;background-color:#fff;padding:5px;border:1px solid #ddd;">
			<a href="<?=$u->slug;?>"><?=$u->judul?></a>	<br/>[Dibaca: <?=$u->dilihat?>]
			[Dibalas: <?php foreach($this->forum->get_comment_count($u->tlid)->result() as $com){ echo $com->c;}?>]</span><br/>
			Dibuat: <?=time_ago($u->date)?><br/>
			<a class="text-danger small" onclick="return confirm('yakin ingin menghapus')" href="/miemin/delpost/<?=$u->tlid?>">delete</a>  - 
<?php
if($u->banned == 'n'){ ?>
<a class="text-danger small" onclick="return confirm('yakin ingin membanned?')" href="/miemin/banned_post/y/<?=$u->tlid?>">banned</a> 
<?php } else { ?>
	<a class="text-success small" href="/miemin/banned_post/n/<?=$u->tlid?>">bebaskan</a> 
	<?php } ?>
		</div>
		<?php }
			?>
				
		</div>
		<div class="pagination">
<ul>
	<?php
	foreach($links as $link)
	{ 
		echo $link;
	}
	?>
</ul>
</div>
	</div>
</main>