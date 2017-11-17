
<div class="commentar">
	 <div class="commentar-title">
	   <h5> Comments</h5>
	   </div>
	   <div class="commentar-list">
		 <ul>
			
			<?php
			foreach($komen as $r)
			{?>
			<li id="<?=$r->koid;?>">
						  <div class="c-head">
							
							<div class=""><img style="height:40px;width:40px" class="u-img" src="<?=$this->gravatar->get($r->email);?>"/></div><div class="u-c">
						  <span class="c-user"><a href="<?=base_url('profile/'.$r->username);?>">@<?=$r->username?></a></span> 
						  
						  <span class="c-time"><?=pisah_waktu($r->date);?></span>
						<div class="reply">#<?=$r->koid;?></div>
							  </div>
						  </div>
						  <p class="c-isi"><?= $this->bbcode->bbcode_to_html($r->isi);?></p>
						</li>
		<?php }?>
</ul>
 	</div>
 </div>