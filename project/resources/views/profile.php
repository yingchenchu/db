<html>
   <head>
      <title> PROFILE</title>
   </head>
  
   <body>
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
		   							<span>$user->membership_plan</span>
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>Promotion Package</span>
		   							<span>$user->package</span>
		   						</p>
		   				"?>	
		   			</p>
               	</tr>
        	</table>      
       
   </body>
</html>