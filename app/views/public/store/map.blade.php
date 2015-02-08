@extends("public.layout.place_layout") @section('content')

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
	
	<div id='cssmenu' class="container-fluid">
		<ul>
		   <li ><a href="{{URL::route('quan_cafe', array($place->id))}}">Trang chủ</a></li>
		   <li class='active'><a href="#">Bản đồ</a></li>
		   <li><a href='#'>Album</a></li>
		   <li><a href='#'>Contact</a></li>
		</ul>
	</div>

	<div class="container-fluid map-container">
		<div id="map-canvas" style="width: 100%; height: 380px;"></div>
	</div>
	<div class="container-fluid map-btn form-inline">
		<button id="direction" href="#" class="btn btn-primary btn-sm">Tìm đường đến quán</button>

		 <select class="form-control input-sm" id="select">
          <option value="DRIVING">LÁI XE</option>
          <option>XE BUS</option>
          <option>ĐI BỘ</option>
        </select>

	</div>


</div>
<!-- End .content-container -->
@stop
