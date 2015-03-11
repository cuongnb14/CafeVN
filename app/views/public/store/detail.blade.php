@extends("public.layout.place_layout") @section('content')

<!-- Google Map -->
<script src="http://maps.googleapis.com/maps/api/js"></script>

<script>
	
	var map;
	var currentPos;
	var placePos;

	function initialize() {
	  placePos = new google.maps.LatLng({{$place->latitude}},{{$place->longitude}});
	  var mapOptions = {
	    zoom: 18,
	    center: placePos
	  };

	   map = new google.maps.Map(document.getElementById('map-canvas'),
	      mapOptions);

	  var marker = new google.maps.Marker({
	    position: placePos,
	    title:"{{$place->name}}",
	    animation: google.maps.Animation.DROP
	   });
	  marker.setMap(map);

	}

	function loadScript() {
	  var script = document.createElement('script');
	  script.type = 'text/javascript';
	  script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&' +
	      'callback=initialize';
	  document.body.appendChild(script);
	  
	}
	window.onload = loadScript;


</script>

<div class="content-container container-fluid">
	
	<div id='cssmenu' class="container-fluid">
		<ul>
		   <li class='active'><a href='#'>Trang chủ</a></li>
		   <li><a href="{{URL::route('quan_cafe_map', array($place->id))}}">Bản đồ</a></li>
		   <li><a href='#'>Album</a></li>
		   <li><a href='#'>Contact</a></li>
		</ul>
	</div>



	<div class="box d-introduce">
		<h3 class="box-title">Giới thiệu</h3>
		<div class="box-body container-fluid">
			<div class="col-md-7 intro">
				<p>{{$place->introduce}}</p>
			</div>
			<div class="col-md-5 ">
				<div id="map-canvas" style="width: 100%; height: 380px;"></div>
			</div>
			
		</div>
	</div>

	 <div class="panel panel-default">
		<div class="panel-heading">Dịch vụ</div>
		<div class="panel-body">
			<ul class="list-unstyled">
				@foreach($services as $service)
				<li class="col-md-4"><input disabled @if(in_array($service->id,
					$service_sps)) checked @endif type="checkbox" name="service"
					value="{{$service->id}}" id="s{{$service->id}}"> <label
					for="s{{$service->id}}"> {{$service->name}}</label></li>
				@endforeach


			</ul>
		</div>
	</div> 
	

	<div class="panel panel-default">
		<div class="panel-heading">Mục đích</div>
		<div class="panel-body">
			<ul class="list-unstyled">
				@foreach($purports as $purport)
				<li class="col-md-4"><input disabled @if(in_array($purport->id,
					$purport_sps)) checked @endif type="checkbox" name="purport"
					value="{{$purport->id}}" id="p{{$purport->id}}"> <label
					for="p{{$purport->id}}"> {{$purport->name}}</label></li>
				@endforeach


			</ul>
		</div>
	</div>

</div>
<!-- End .content-container -->
@stop
