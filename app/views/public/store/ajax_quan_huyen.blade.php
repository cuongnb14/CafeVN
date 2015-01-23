<ul class="list-unstyled">
	@foreach($districts as $district)
	<li><input onclick="javascript:getPage('/Cafevn/ajax/tim-kiem')" type="checkbox" name="districts[]" value="{{$district->id}}"
		id="d{{$district->id}}"> <label for="d{{$district->id}}">
			{{$district->name}}</label></li> @endforeach
</ul>