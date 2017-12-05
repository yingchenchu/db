<h> Payment Transaction Successfully Completed <br></h>

<?php 
	if ($type == "ad"){ ?>

	<p> Please select a rating for the purchase <p>

	<form action="/ad_<?php echo $ad_id ?>/submitRating" method="get">
	  <input type="radio" name="rating" value="1"> 1 star 
	  <input type="radio" name="rating" value="2"> 2 star
	  <input type="radio" name="rating" value="3"> 3 star
	  <input type="radio" name="rating" value="3"> 4 star
	  <input type="radio" name="rating" value="3"> 5 star <br><br>

	  <input type="submit" value="Submit rating">
	</form>

<?php } ?>

<a href = "/main">Click Here</a> to go back