<html>
<div class="form-group">
  {!! Form::Label('Stores', 'Stores:') !!}
  <select class="form-control" name="item_id">
    @foreach($stores as $key => $data)
      <option value="{{$stores->storename}}">{{$data->store_name}}</option>
    @endforeach
  </select>
</div>


</html>