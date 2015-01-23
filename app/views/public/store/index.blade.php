@extends("public.layout.main_layout")
@section('content')

<div class="content-container container-fluid">
	<div class="col-md-3 sidebar">
	
		<div class="panel panel-default">
			<div class="panel-heading">Địa điểm</div>
			<div class="panel-body">
				<select class="form-control input-sm" id="provinces" onchange="javascript:getDistricts()">
					<option value="0">Chọn tỉnh/ thành phố</option>
				@foreach($provinces as $province)
					<option value="{{$province->id}}">{{$province->name}}</option>
				@endforeach
				</select>
				<div id="list-district">
					
				</div>
			</div>
		</div>
	
		<div class="panel panel-default">
			<div class="panel-heading">Dịch vụ</div>
			<div class="panel-body">
				<ul class="list-unstyled">
				@foreach($services as $service)
					<li>
						<input type="checkbox" name="service[]" value="{{$service->id}}" id="s{{$service->id}}">
						<label for="s{{$service->id}}"> {{$service->name}}</label>
					</li>
				@endforeach
				</ul>
			</div>
		</div>


		<div class="panel panel-default">
			<div class="panel-heading">Mục đích</div>
			<div class="panel-body">
				<ul class="list-unstyled">
					@foreach($purports as $purport)
					<li>
						<input type="checkbox" name="purport[]" value="{{$purport->id}}" id="p{{$purport->id}}">
						<label for="p{{$purport->id}}"> {{$purport->name}}</label>
					</li>
					@endforeach

					
				</ul>
			</div>
		</div>

	</div>
	<div class="col-md-9 main-content">
		<div class="box">
			<h3 class="box-title">Danh sách quán</h3>
			<div class="box-body" id="list-place">
				@foreach($places as $place)
				<div class="place col-md-6">
					<div class="thumnail col-md-4">
						<a href="{{URL::route('quan_cafe',$place->id)}}"><img src="{{asset('/public/assets/mutidata/avatar_cafe/cf-'.$place->id.'.jpg')}}" width="100%" height="100%"></a>
					</div>
					<div class="description col-md-8">
						<h3 class="name-place">
							<a class="link_name" href="{{URL::route('quan_cafe',$place->id)}}">{{$place->name}}</a> <a href="#" class="link_map"><i class="fa fa-map-marker"></i></a>
						</h3>
						<p class="address">3f Tăng Bạt Hổ, Tp. Đà Lạt, Lâm Đồng, Việt
							Nam</p>
						<p class="info">Ai đó đã cần một sản</p>
					</div>
				</div>
				@endforeach
				
				{{$places->links()}}
			</div>
		</div>
	</div>
</div>


</div>
<!-- End .content-container -->
@stop
