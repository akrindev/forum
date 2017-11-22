<main>
	<div class="container-fluid">
		<div class="post-titlee"><h3><?=$carikata?></h3></div>
		<div class="mow">
			<?php
			if(!$cari)
			{
				echo "tidak ditemukan";
			} else {
				foreach($cari as $ketemu)
				{
					?>
				<div class=""><a href="<?=$ketemu->slug?>"><?=$ketemu->judul?></a><br/>
					| Pada: <?=time_ago($ketemu->date)?>
					| Dibaca: <?=$ketemu->dilihat;?>
						</div>
						<?php
				if($ketemu->banned == 'n')
				{
					echo "<a href='/miemin/banned/y/$ketemu->id' class=\"text-danger\">banned</a>";
				}
				else
				{
					echo "<a href='/miemin/banned/n/$ketemu->id' class=\"text-success\">bebaskan</a>";
				}
			
}
 } ?>
		</div>
	</div>
</main>