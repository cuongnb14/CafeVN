@extends('admin.layout.main_layout') @section('content')

<!-- Google Map -->
<script src="http://maps.googleapis.com/maps/api/js"></script>

<script>    

	var map;
	var currentPos;
	var markerY;

	function initialize() {
		currentPos = new google.maps.LatLng({{$place->latitude}}, {{$place->longitude}});

	  var mapOptions = {
	    zoom: 15,
	    center: currentPos
	  };

	   map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
	   markerY = new google.maps.Marker({
		  	    position: currentPos,
		  	    title:"Chọn điểm này",
		  	    draggable:true,
		  	    animation: google.maps.Animation.DROP
		  	 });
	   markerY.setMap(map);
	}

	function showMap(){
		$('#map').modal('show');
		window.setTimeout(loadScript,500);
	}

	function loadScript() {
		 
	  var script = document.createElement('script');
	  script.type = 'text/javascript';
	  script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&' +
	      'callback=initialize';
	  document.body.appendChild(script);
	}

	function choseLocation(){
		$('#map').modal('hide');
		$("#lat").val(markerY.position.lat());
		$("#long").val(markerY.position.lng());
	}
</script>


<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Cập nhật quán</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="row main-content">
	<form method="post" action="{{URL::route('ad_post_store_update')}}" enctype="multipart/form-data">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Thông tin quán</h3>
			</div>
			<div class="panel-body">
                
                <div class="row cf-input">
					<input value="{{$place->id}}" id="id"
						name="id" type="hidden" class="form-control input-sm">
				</div>
				
				<div class="row cf-input">
					<label>Icon: </label><input class="form-control input-sm" type="file" id="exampleInputFile">
				</div>
                
				<div class="row cf-input">
					<label>Tên quán: </label><input value="{{$place->name}}" id="name"
						name="name" type="text" class="form-control input-sm">
				</div>

				<div class="row cf-input location">
					<label>Latitude: </label><input value="{{$place->latitude}}"
						id="lat" name="lat" type="text" class="form-control input-sm"> <label>Longitude:
					</label><input value="{{$place->longitude}}" id="long" name="long"
						type="text" class="form-control input-sm">


					<!-- Button trigger modal -->
					<a class="btn btn-primary btn-sm" onclick="javascript:showMap()"> <i
						class="fa fa-map-marker fa-2x"></i>
					</a>
					<!-- Modal -->
					<div class="modal fade" id="map" tabindex="-1" role="dialog"
						aria-labelledby="myModalLabel" aria-hidden="true"
						style="display: none;">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"
										aria-hidden="true">×</button>
									<h4 class="modal-title" id="myModalLabel">Chọn vị trí quán của
										bạn</h4>
								</div>
								<div id="map-canvas" style="width: 100%; height: 480px;"></div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default"
										data-dismiss="modal">Hủy bỏ</button>
									<button type="button" class="btn btn-primary"
										onclick="javascript:choseLocation()">Chọn địa điểm</button>
								</div>
							</div>
							<!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
					</div>
					<!-- /.modal -->



				</div>

				<div class="row cf-input">
					<label>Tỉnh/Thành: </label> <select id="province" name="province"
						class="form-control" onchange="javascript:getDistricts()">
						<option value="0">Chọn tỉnh/thành</option> @foreach($provinces as
						$province)
						<option @if($province->id == $province_id) selected @endif
							value="{{$province->id}}">{{$province->name}}</option>
						@endforeach
					</select>

				</div>

				<div class="row cf-input">
					<label>Quận/Huyện: </label> <select id="district" name="district"
						class="form-control"> @foreach($districts as $district)
						<option @if($place->district_id == $district->id) selected @endif
							value="{{$district->id}}">{{$district->name}}</option>
						@endforeach

					</select>
				</div>

				<div class="row cf-input">
					<label>Đường phố: </label><input value="{{$place->street_address}}"
						name="street" id="street" type="text"
						class="form-control input-sm">
				</div>

				<div class="row cf-input">
					<label>Quốc gia: </label><input value="{{$place->region_address}}"
						id="region" name="region" type="text"
						class="form-control input-sm">
				</div>

				<div class="row cf-input">
					<label>Giới thiệu: </label>
					<textarea class="form-control" id="introduce" name="introduce">{{$place->introduce}}</textarea>
				</div>


			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Mục đích phù hợp</h3>
			</div>
			<div class="panel-body">
				<ul class="list-unstyled">
					@foreach($purports as $purport)
					<li class="col-md-4"><input type="checkbox" name="purport[]"
						@if( in_array($purport->id, $place_purports) ) checked @endif
						value="{{$purport->id}}" id="p{{$purport->id}}"> <label
						for="p{{$purport->id}}"> {{$purport->name}}</label></li>
					@endforeach
				</ul>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Dịch vụ</h3>
			</div>
			<div class="panel-body">
				<ul class="list-unstyled">
					@foreach($services as $service)
					<li class="col-md-4"><input type="checkbox" name="service[]"
						@if( in_array($service->id, $place_services) ) checked @endif
						value="{{$service->id}}" id="s{{$service->id}}"> <label
						for="s{{$service->id}}"> {{$service->name}}</label></li>
					@endforeach


				</ul>
			</div>
		</div>
		<div class="row cf-input">
			<a class="btn btn-default">Hủy bỏ</a>
			<button class="btn btn-default" type="submit">Cập nhật</button>
		</div>
	</form>
</div>
@stop
