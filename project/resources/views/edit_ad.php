<html>
   <head>
      <title> Advertisement Information</title>
   </head>
  
   <body>
   	<form action = "/SaveChange/<?php echo $ad->ad_id ?>" method = "get">
 		<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
     		<table>
            	<span style="font-weight:bold; font-size:130%;">Advertisement Information</span>
            	<tr>
               		<p>
  						<?php
		   				echo "	<p>
		   							<span style='font-weight:bold;'>Advertisement Name: </span>
		   							<textarea name='ad_name' id='ad_name'>$ad->ad_name</textarea>
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>Category: </span>
                  					<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js'></script>

				                  	<select name='category' id='category' selected='$ad->category' required='true'>
				                  		 <option value='$ad->category'selected='selected'>$ad->category</option>
					                     <option value='Buy'      id='1'>Buy</option>
					                     <option value='Sell'     id='1'>Sell</option>
					                     <option value='Service'  id='2'>Service</option>
					                     <option value='Rent'     id='3'>Rent</option>
                     					 <option value='Games'    id='4'>Games</option>

				                  	</select>
			                  	</p>
			                  	<p>
		   							<span style='font-weight:bold;'>Product: </span>
		   							<select name='product' id='product' selected='$ad->product' required='true'>
		   								<option value='$ad->product' selected='selected'>$ad->product</option>
					                    <option value='Clothing'            id='1'>Clothing</option>
					                    <option value='Books'               id='1'>Books</option>
					                    <option value='Electronics'         id='1'>Electronics</option>
					                    <option value='Musical Instruments' id='1'>Musical Instruments</option>

					                    <option value='Tutors'              id='2'>Tutors</option>
					                    <option value='Event Planners'      id='2'>Event Planners</option>
					                    <option value='Photographers'       id='2'>Photographers</option>
					                    <option value='Personal Trainers'   id='2'>Personal Trainers</option>

					                    <option value='Electronics'         id='3'>Electronics</option>
					                    <option value='Car'                 id='3'>Car</option>
					                    <option value='Apartments'          id='3'>Apartments</option>
					                    <option value='Wedding - Dresses'   id='3'>Wedding - Dresses</option>

                                        <option value='Pokemons'         	id='4'>Pokemons</option>
					                    <option value='Diablo'              id='4'>Diablo</option>
					                    <option value='League of Legend'    id='4'>League of Legend</option>
					                    <option value='Zelda'   			id='4'>Zelda</option>
					                    <option value='Call of Duty'   		id='4'>Call of Duty</option>
					                    <option value='Counter-Strike:Go'   id='4'>Counter-Strike:Go</option>
					                  </select>
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>Store Type: </span>
				                  	<select name='store_type' id='store_type' required='true'>
				                  		 <option value='$ad->store_type' selected='selected'>$ad->store_type</option>
					                     <option value='Physical'      id='1'>Physical</option>
					                     <option value='Online'        id='2'>Online</option>
				                  	</select>
		   						</p>
		   						
		   						<p>
		   							<span style='font-weight:bold;'>Description: </span>
              						<span>
		   							<textarea name='description' id='description' style='width: 300px; height: 150px;'' maxlength='500' ) required='true'>$ad->description</textarea>
		   							</span>
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>Sale By: </span>
		   							<select name='saleby' id='saleby'>
		   								<option selected='selected'>$ad->saleby</option>
					                    <option value='Owner'>Owner</option>
					                    <option value='Business'>Business</option>
					                </select>
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>Price: </span>
		   							<input type='number' name='price' id='price' value='$ad->price' required='true'/>
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>Posted Date: </span>
		   							<span>$ad->post_date</span>
		   						</p>
		          <script>
		            $('#category').change(function() {
		              if ($(this).data('options') === undefined)
		              {
		                $(this).data('options', $('#product option').clone());
		              }
		              var id = $(this).val();
		              var idNumb;
		              if(id === 'Sell' || id === 'Buy'){
		               idNumb = 1;
		              }
		              else if(id === 'Service'){
		               idNumb = 2;
		              }
		              else if(id === 'Rent'){
		               idNumb = 3;
		              }
		              else if(id == 'Games'){
		               idNumb = 4;
		              }
		              else{
		               idNumb = 0;
		              }
		              var options = $(this).data('options').filter('[id=' + idNumb + ']');
		              $('#product').html(options);
		            });

		              
		            $('#input-area textarea').fadeIn().html('').css('border','1px solid red');
		         </script>";
		   				?>	
		   			</p>
               	</tr>
               	<span style="font-weight:bold; font-size:130%;">Contact Information</span>
            	<tr>
               		<p>
  						<?php
		   				echo "	<p>
		   							<span style='font-weight:bold;'>Email: </span>
		   							<input name='email' id='email' required='true' value='$ad->email'/>
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>Phone Number: </span>
		   							<input name='phonenumber' id='phonenumber' required='true' value='$ad->phonenumber'/>
		   						</p>
		   						<p>
		   							<span style='font-weight:bold;'>Address: </span>
		   							<input name='address' id='address' required='true' value='$ad->address'/>
		   						</p>

					            <p>
					            	<span style='font-weight:bold;'>Province: </span>
					                <select  name='province' id='province'>
					                  <option>$ad->province</option>
					                  <option value='Quebec'    id='1'>Quebec</option>
					                  <option value='Ontario'   id='2'>Ontario</option>
					                </select>
					            </p>
					            <p>
					            	<span style='font-weight:bold;'>City: </span>
					                <select  name='city' id='city'>
					                  <option >$ad->city</option>
					                  <option value='Montreal'      id='1'>Montreal</option>
					                  <option value='Laval'         id='1'>Laval</option>
					                  <option value='Toronto'       id='2'>Toronto</option>
					                  <option value='Ottawa'        id='2'>Ottawa</option>
					                </select>
					            </p>
		   						<script>
		   						$('#province').change(function() {
					              if ($(this).data('options') === undefined)
					              {
					                $(this).data('options', $('#city option').clone());
					              }
					              var id = $(this).val();
					              var idNumb;
					              if(id === 'Quebec'){
					               idNumb = 1;
					              }
					              else{
					               idNumb = 2;
					              }
					              var options = $(this).data('options').filter('[id=' + idNumb + ']');
					              $('#city').html(options);
					            });
		   						</script>";
		   				?>	
               		</p>
               	</tr>

            <tr>
        	</table>      
        </input>
        <button name="save" id="save" onclick="return confirm('Are you sure you want to save the changes?')">Save</button>
    </form>
	<form action = "/profile/<?php echo Auth::user()->username ?>/MyAds" onclick="return confirm('Are you sure you want to cancel the changes?')" method="get">
		<button type="submit" name="cancel" id="cancle">Cancel</button>
	</form>
   </body>
</html>