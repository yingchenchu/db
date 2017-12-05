<html>
   	<head>
      <title>Advertisements</title>
   	</head>
 	<body>
		<span style="font-weight:bold; font-size:150%;">My Advertisements</span>
 		<p>
			<form action = "/profile/<?php echo Auth::user()->username ?>" method = "get">
	   			<button type="submit" name="profile" id="profile"> My Profile </button>
			</form>
			<form action = "/AllAds" method = "get">
	   			<button name="mainpage" id="mainpage">Go to Main Page</button>
			</form>
		</p>
	   	<?php
	   	foreach($ads as $ad) {
	   		?>
		   <div class="row" style="padding-top: 20px;">
		   		<div class="col-sm-3" style="padding: 5px; border: 1px solid #222; text-align: center;">
		   			<p>
		   				<?php
		   				echo "<span style='font-weight:bold;'>". $ad->category. "</span>";
		   				echo '<text>: </text>';
		   				echo $ad->ad_name;
		   				echo '<span style="font-weight:bold;">. Product/Service: </span>';
		   				echo $ad->product;
		   				echo '<span style="font-weight:bold;">. By </span>';
		   				echo $ad->saleby;
		   				echo '<span style="font-weight:bold;">. Store: </span>';
		   				echo $ad->store_type;
		   				echo '<span style="font-weight:bold;">. Price: </span>';
		   				echo $ad->price;
		   				?>	
		   			</p>
					<span style="float:left; width: 50px">
					    <form action='/ChosenAd/<?php echo $ad->ad_id ?>' method='get'>           
					        <input type='submit' value='View' />      
					    </form>   
					</span>
					<span style="float:left; width: 150px">
					    <form action='/Edit/<?php echo $ad->ad_id ?>' method='get'>     
					        <input type='submit' value='Edit' />       
					    </form>
					</span>
					<span style="float:left; width: 0px">
					    <form action='/Delete/<?php echo $ad->ad_id ?>' method='get'>     
					        <input type='submit' value='Delete' onclick="return confirm('Are you sure you want to delete this ad?')"/>       
					    </form>
					</span>
				</div>
	   		</div>
		<?php } ?>

    </body>
</html>