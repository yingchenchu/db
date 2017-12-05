<html>
	<form action = "/rentStore" method = "post">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
		<div class="form-group">
			Choose a Store
	  		<select class="form-control" name="item_id">
	    		@foreach($stores as $key => $data)
	      			<option value = {{$data->store_id}}  >{{$data->store_name}} Location:{{$data->sl}}</option>
	    		@endforeach
	  		</select>
	
	  		Choose the Date for renting
	  		<input type="date" name = "date" required>
	        <br />
	        <input type="text"  name = "renthour" id="renthour" placeholder = "Rent hours" style = "width : 85px; margin-left:	 10px; margin-top: 1mm;" required/>
	        <br />
		</div>
		<input type = "submit" value="Rent">
	</form>
</html>