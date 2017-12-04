<html>
<form action = "/paymentList" method = "post">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            		<input type = "submit" value="Backup">
</form>

<h1>Payment Details</h1>
@foreach($details as $key => $data)
    <tr>    
      <th>{{$data->user_id}}</th>
      <th>{{$data->card_details}}</th>
      <th>{{$data->payment_date}}</th>
      <th>{{$data->amount}}</th>
    </tr>
@endforeach

</html>


