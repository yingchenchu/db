<html>
   <head>
      <title> Advertisement Information</title>
   </head>
  
   <body>
   	<form action = "/AllAds" method = "get">
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
		   							<span style='font-weight:bold;'>Name: </span>
		   							
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>Phone Number: </span>
		   							
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>Address: </span>
		   							
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>Email: </span>

		   						</p>";
		   				?>	
               		</p>
               	</tr>

            <tr>
        	</table>      
        </input>
        <button name="mainpage" id="mainpage" value="mainpage"> Go to Main Page </button>
    </form>
   </body>
</html>