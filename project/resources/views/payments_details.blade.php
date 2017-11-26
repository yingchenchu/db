<html>

@foreach($details as $key => $data)
    <tr>    
      <th>{{$data->user_id}}</th>
      <th>{{$data->card_details}}</th>
      <th>{{$data->payment_date}}</th>
      <th>{{$data->amount}}</th>
    </tr>
@endforeach

</html>


