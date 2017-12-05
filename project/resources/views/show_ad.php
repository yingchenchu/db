<html>
   <head>
      <title> Advertisement Information</title>
   </head>
  
   <body>
   	<form action = "/profile/<?php echo Auth::user()->username ?>/MyAds" method="get">
 		<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
     		<table>
            	<span style="font-weight:bold; font-size:130%;">Advertisement Information</span>
            	<tr>
               		<p>
  						<?php
		   				echo "	<p>
		   							<span style='font-weight:bold;'>Advertisement Name: </span>
		   							<span>$ad->ad_name</span>
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>Category: </span>
		   							<span>$ad->category</span>
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>Store Type: </span>
		   							<span>$ad->store_type</span>
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>Product: </span>
		   							<span>$ad->product</span>
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>Description: </span>
		   							<span>$ad->description</span>
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>Sale By: </span>
		   							<span>$ad->saleby</span>
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>Price: </span>
		   							<span>$ad->price</span>
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>Posted Date: </span>
		   							<span>$ad->post_date</span>
		   						</p>";
		   				?>	
		   			</p>
               	</tr>
               	<span style="font-weight:bold; font-size:130%;">Contact Information</span>
            	<tr>
               		<p>
  						<?php
		   				echo "	<p>
		   							<span style='font-weight:bold;'>Email: </span>
		   							<span>$ad->email</span>
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>Phone Number: </span>
		   							<span>$ad->phonenumber</span>
		   							
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>Address: </span>
		   							<span>$ad->address</span>
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>Province: </span>
		   							<span>$ad->province</span>
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>City: </span>
		   							<span>$ad->city</span>
		   						</p>";
		   				?>	
               		</p>
               	</tr>

            <tr>
        	</table>      
        </input>
        <button name="myads" id="myads">My Ads</button>
    </form>
   </body>
</html>