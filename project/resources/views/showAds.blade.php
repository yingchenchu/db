<html>
   	<head>
      <title>Advertisements</title>
   	</head>
 	<body>
		<span style="font-weight:bold; font-size:150%;">Available Advertisements</span>
		<form action = "/AllAds/Search/" method="get">
 		<p>
		   	<td>
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
             <select name='category' id="category">
	             <option value=""           id="0">Please Choose a Category</option>
	             <option value="Buy"        id="1">Buy</option>
	             <option value="Sell"       id="1">Sell</option>
	             <option value="Service"    id="2">Service</option>
	             <option value="Rent"       id="3">Rent</option>
	             <option value="Games"      id="4">Games</option>
	          </select>
              <select name="product" id="product">
                <option value=""                          >Choose Product/Service</option>
                <option value="Clothing"            id="1">Clothing</option>
                <option value="Books"               id="1">Books</option>
                <option value="Electronics"         id="1">Electronics</option>
                <option value="Musical Instruments" id="1">Musical Instruments</option>

                <option value="Tutors"              id="2">Tutors</option>
                <option value="Event Planners"      id="2">Event Planners</option>
                <option value="Photographers"       id="2">Photographers</option>
                <option value="Personal Trainers"   id="2">Personal Trainers</option>

                <option value="Electronics"         id="3">Electronics</option>
                <option value="Car"                 id="3">Car</option>
                <option value="Apartments"          id="3">Apartments</option>
                <option value="Wedding - Dresses"   id="3">Wedding - Dresses</option>


                <option value='Pokemons'            id='4'>Pokemons</option>
                <option value='Diablo'              id='4'>Diablo</option>
                <option value='League of Legend'    id='4'>League of Legend</option>
                <option value='Zelda'               id='4'>Zelda</option>
                <option value='Call of Duty'        id='4'>Call of Duty</option>
                <option value='Counter-Strike:Go'   id='4'>Counter-Strike:Go</option>
              </select>
              <td> Name: </td>
              <input name="user_name" id="user_name"/>
           	</td>
		    <button type="submit" name="Search" id="Search" value="Search"> Search </button>
		</p>
       	</form>
	 		<form action = "/profile/{username}/createAd" method="get">
	   			<button type="create" name="create" id="create"> Create Ad </button>
			</form>
			<form action = "/profile/<?php echo Auth::user()->username ?>" method = "get">
	   			<button type="submit" name="profile" id="profile"> My Profile </button>
			</form>
	   	<?php
	   	foreach($ads as $ad) {
	   		?>
    	<form action = "/ChosenAd/<?php echo $ad->ad_id ?>" method = "get">
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
		   			<button type="View" name="View" id="View" value="View"> View </button>
		   		</div>
		   		
	          	<script>
		            $("#category").change(function() {
		              if ($(this).data('options') === undefined)
		              {
		                $(this).data('options', $('#product option').clone());
		              }
		              var id = $(this).val();
		              var idNumb;
		              if(id === "Sell" || id === "Buy"){
		               idNumb = 1;
		              }
		              else if(id === "Service"){
		               idNumb = 2;
		              }
		              else if(id === "Rent"){
		               idNumb = 3;
		              }
	               	  else if(id === "Games"){
		               idNumb = 4;
		              }
		              else{
		               idNumb = 0;
		              }
		              var options = $(this).data('options').filter('[id=' + idNumb + ']');
		              $('#product').html(options);
		            });
	         	</script>
		   	</div>
	   	</form>
	   	<?php } ?>

    </body>
</html>