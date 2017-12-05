<html>
   <head>
      <title> PROFILE</title>
   </head>
  
   <body>
   		<form action = "/profile/<?php echo $user->username ?>/createAd" method="get">

 		<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
     		<table>
            	<span style="font-weight:bold; font-size:130%;">User Profile</span>
            	<tr>
               		<p>
  						<?php
		   				echo "	<p>
		   							<span style='font-weight:bold;'>Username </span>
		   							<span>$user->username</span>
		   						</p>

		   						<p>
		   							<span style='font-weight:bold;'>Province: </span>
		   							<span>$user->province</span>
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>City </span>
		   							<span>$user->city</span>
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>Membership Plan </span>
		   							<span>$user->membership_plan_expiry</span>
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>Promotion Package</span>
		   							<span>$user->package</span>
		   						</p>
		   				"?>	
		   			</p>
               	</tr>
        	</table>      
       			<button type="create" name="create" id="create">Create Ad </button>
		</form>
		<form action = "/profile/<?php echo $user->username ?>/MyAds" method="get">
			<button type="view" name="view" id="view">View My Ads</button>
		</form>
		<form action = "/profile_<?php echo $user->id ?>/membership" method="get">
			<button type="view" name="view" id="view">Buy a membership</button>
		</form>
   </body>
</html>