@if(count($places) == 0) <h4>Không có quán nào phù hợp</h4> @endif
@foreach($places as $place)
<div class="place col-md-6">
	<div class="thumnail col-md-4">
		<a href="{{URL::route('quan_cafe',$place->id)}}"><img
			src="{{asset('/public/assets/mutidata/avatar_cafe/cf-'.$place->id.'.jpg')}}"
			width="100%" height="100%"></a>
	</div>
	<div class="description col-md-8">
		<h3 class="name-place">
			<a class="link_name" href="{{URL::route('quan_cafe',$place->id)}}">{{$place->name}}</a>
			<a href="{{URL::route('quan_cafe_map',array($place->id))}}" class="link_map"><i class="fa fa-map-marker"></i></a>
		</h3>
		<p class="address">{{CfHelper::getAddress($place->id)}}</p>
		<p class="info">{{CfHelper::cutString($place->introduce)}}</p>
	</div>
</div>
@endforeach {{$places->links()}}
