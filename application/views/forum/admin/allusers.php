<main>
	<div class="container-fluid">
		<div class="">
			<div class="post-titlee"><h3>All users</h3></div>
			<div class="cari-form">
				<?=form_open('miemin/usercari');?>
			  <input type="text" name="user-cari" class="in-cari" placeholder="Cari sesuatu . . ."/>
			  <button type="submit" class="b-cari">cari</button>
			</form>
			</div>
			<?php
			foreach($users as $u)
			{?>
		<div style="margin:1px -7px;background-color:#fff;padding:5px;border:1px solid #ddd;">
			<img style="margin-right:5px;" src="<?=$this->gravatar->get($u->email)?>" heigh=100 width=100 class="float-left rounded"/>
			username: <?=$u->username;?>	<br/>kota: <?=$u->kota?><br/>
			email: <?=$u->email?><br/>
			dibuat: <?=time_ago($u->date)?><br/>
			<?php
if($u->banned == 'n')
				{
					echo "<a href='/miemin/banned/y/$u->id' class=\"text-danger\">banned</a>";
				}
				else
				{
					echo "<a href='/miemin/banned/n/$u->id' class=\"text-success\">bebaskan</a>";
				} ?>
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