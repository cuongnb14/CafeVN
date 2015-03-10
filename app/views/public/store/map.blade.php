@extends("public.layout.place_layout") @section('content')

<!-- Google Map -->
<script src="http://maps.googleapis.com/maps/api/js"></script>

<script>
	
	var map;
	var currentPos;
	var placePos;
	var directionsDisplay;
	var directionsService;
	var markerY;
	var markerP;
	
	function findDirection(){
		

	  	var request;		
	  	var travelMode = $('#travel-mode').val();

	  	switch(travelMode) {
	  	case "DRIVING":
	  		request = {
	  		    origin: currentPos,
	  		    destination: placePos,
	  		    travelMode: google.maps.TravelMode.DRIVING 
	  		  };
	  		  break;
	  	case "BUS":
	  		request = {
	  		    origin: currentPos,
	  		    destination: placePos,
	  		    travelMode: google.maps.TravelMode.TRANSIT,
		  		  transitOptions: {
		  		    modes: [google.maps.TransitMode.BUS],
		  		  }
	  		  };
	  		  break;
	  	case "WALKING":
	  		request = {
	  		    origin: currentPos,
	  		    destination: placePos,
	  		    travelMode: google.maps.TravelMode.WALKING 
	  		  };
	  		  break;
	  	}
	  	directionsService = new google.maps.DirectionsService();
	  	 directionsService.route(request, function(result, status) {
	  	    if (status == google.maps.DirectionsStatus.OK) {
	  	      directionsDisplay.setDirections(result);
	  	    } else {

		  	}
	  	  });
	}
	
	function initialize() {
	  placePos = new google.maps.LatLng({{$place->latitude}},{{$place->longitude}});
	  var mapOptions = {
	    zoom: 18,
	    center: placePos
	  };

	   map = new google.maps.Map(document.getElementById('map-canvas'),
	      mapOptions);

	  markerP = new google.maps.Marker({
	    position: placePos,
	    title:"{{$place->name}}",
	    animation: google.maps.Animation.DROP
	   });
	  markerP.setMap(map);

	  directionsDisplay = new google.maps.DirectionsRenderer();
	  directionsDisplay.setMap(map);
	  directionsDisplay.setPanel(document.getElementById('directions-panel'));

	// Try HTML5 geolocation, lay vi tri hien tai
	  if(navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(function(position) {
	      currentPos = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
	      markerY = new google.maps.Marker({
		  	    position: currentPos,
		  	    title:"Vị trí của bạn",
		  	    animation: google.maps.Animation.DROP
		  	   });
		  markerY.setMap(map);
	      findDirection();
	     
	    }, function() {
	     
	    });
	  } else {
	    // Browser doesn't support Geolocation
		    currentPos = placePos;
		    markerY = new google.maps.Marker({
		  	    position: currentPos,
		  	    title:"Vị trí của bạn",
		  	    animation: google.maps.Animation.DROP
		  	   });
		    markerY.setMap(map);
		    findDirection();
	  }
	}

	function loadScript() {
	  var script = document.createElement('script');
	  script.type = 'text/javascript';
	  script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&' +
	      'callback=initialize';
	  document.body.appendChild(script);
	}
	window.onload = loadScript;

	$(document).ready(function(){
		$("#travel-mode").change(function(){
			findDirection();
		});	
	});


</script>

<div class="content-container container-fluid">

	<div id='cssmenu' class="container-fluid">
		<ul>
			<li><a href="{{URL::route('quan_cafe', array($place->id))}}">Trang
					chủ</a></li>
			<li class='active'><a href="#">Bản đồ</a></li>
			<li><a href='#'>Album</a></li>
			<li><a href='#'>Contact</a></li>
		</ul>
	</div>

	<div class="container-fluid map-container">
		<div class="col-md-8">
			<div  id="map-canvas" style="width: 100%; height: 480px;"></div>
			<div class="container-fluid map-btn form-inline">
				<select class="form-control input-sm" id="travel-mode">
					<option value="DRIVING">LÁI XE</option>
					<option value="BUS">XE BUS</option>
					<option value="WALKING">ĐI BỘ</option>
				</select>
			</div>
		</div>
		
		<div class="col-md-4" id="directions-panel"></div>
	</div>
	


</div>
<!-- End .content-container -->
@stop
