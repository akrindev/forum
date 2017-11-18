


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
				echo pisah_waktu($user->date);
				echo "</span> ";
				if($user->banned == 'n')
				{
					echo "<a class=\"text-danger\">banned</a>";
				}
				else
				{
					echo "<a class=\"text-danger\">bebaskan</a>";
				}
				echo "</div>";
			}
			?>
	
			</div>
	
	  </div><!--container-->

	</main>
	
		