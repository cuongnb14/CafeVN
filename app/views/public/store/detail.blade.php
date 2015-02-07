@extends("public.layout.main_layout") @section('content')

<!-- Google Map -->
<script src="http://maps.googleapis.com/maps/api/js"></script>

<script>
	
	var map;
	var currentPos;
	var placePos;
	var directionsDisplay;
	var directionsService;
	

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

	  directionsDisplay = new google.maps.DirectionsRenderer();
	  directionsDisplay.setMap(map);
	
	}

	function loadScript() {
	  var script = document.createElement('script');
	  script.type = 'text/javascript';
	  script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&' +
	      'callback=initialize';
	  document.body.appendChild(script);
	  
	}
	window.onload = loadScript;

	function findDirection(){
		var marker = new google.maps.Marker({
	  	    position: currentPos,
	  	    title:"Vị trí của bạn",
	  	    animation: google.maps.Animation.DROP
	  	   });
	  	 marker.setMap(map);
	  	 map.setCenter(currentPos);

	  	var request = {
  		    origin: currentPos,
  		    destination: placePos,
  		    travelMode: google.maps.TravelMode.DRIVING 
  		  };

	  	directionsService = new google.maps.DirectionsService();
	  	 directionsService.route(request, function(result, status) {
	  	    if (status == google.maps.DirectionsStatus.OK) {
	  	      directionsDisplay.setDirections(result);
	  	    } else {

		  	}
	  	  });
	 
	}

	function direction(){
		// Try HTML5 geolocation
		  if(navigator.geolocation) {
		    navigator.geolocation.getCurrentPosition(function(position) {
		      currentPos = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
		      findDirection();
		     
		    }, function() {
		      //handleNoGeolocation(true);
		    });
		  } else {
		    // Browser doesn't support Geolocation
			    currentPos = placePos;
			    findDirection();
		  }
	}

	$(document).ready(function(){
		$('#direction').click(function(){
			direction();		
		});
	});


</script>

<div class="content-container container-fluid">
	<h1 class="d-name">{{$place->name}}</h1>

	<div class="container-fluid map-container">
		<div id="map-canvas" style="width: 100%; height: 380px;"></div>
	</div>
	<div class="container-fluid map-btn">
		<button id="direction" href="#" class="btn btn-primary btn-sm">Tìm đường đến đây</button>
	</div>



	<div class="box d-introduce">
		<h3 class="box-title">Giới thiệu</h3>
		<div class="box-body">
			<p>{{$place->introduce}}</p>
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
