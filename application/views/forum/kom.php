
<div class="commentar">
	 <div class="commentar-title">
	   <h5> Comments</h5>
	   </div>
	   <div class="commentar-list">
		 <ul>
<?php

	foreach($komen as $i)
  		{
?>
			<li>
						  <div class="c-head">
							
							<div class=""><img style="height:40px;width:40px" class="u-img" src="<?=$this->gravatar->get($i->email);?>"/></div><div class="u-c">
						  <span class="c-user"><a href="<?=base_url('profile/'.$i->username);?>">@<?=$i->username?></a></span> 
						  
						  <span class="c-time"><?=$i->date;?></span>
							  </div>
						  </div>
						  <span class="c-isi"><?=$i->isi;?></span>
						</li>

		 
	   
 <?php } ?>
 	</ul>
 	</div>