<!-- 
작성자 : 이호연
페이지 설명 : Plan page
-->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href='https://fonts.googleapis.com/css?family=Hind' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="static/css/style.css">
	<link rel="stylesheet" type="text/css" href="static/css/navbar_style.css">
	<link rel="stylesheet" type="text/css" href="static/css/dialog.css">
	<link rel="stylesheet" type="text/css" href="static/css/datebar.css">
	<link rel="stylesheet" type="text/css" href="static/css/path.css">
	<link rel="stylesheet" type="text/css" href="static/css/plan.css">    
	<style type="text/css">
		#map {
			height: 100%;
			width: 100%;
		}
	</style>   
</head>
<body>
	<?php
		require_once("navbar.inc");
    ?>
    <div class="plancontainer">
	<?php
		require_once("datebar.inc");
		require_once("path.inc");
	?>
		<div class="mapbox-lg">
			<div id="map"></div>
		</div>
    </div>
    <script>
		function initMap() {
			var chicago = {lat: 41.85, lng: -87.65};
			var indianapolis = {lat: 39.79, lng: -86.14};

			var map = new google.maps.Map(document.getElementById('map'), {
				center: chicago,
				zoom: 7
			});

			var directionsDisplay = new google.maps.DirectionsRenderer({
				map: map
			});

			var request = {
				destination: indianapolis,
				origin: chicago,
				travelMode: google.maps.TravelMode.DRIVING
			};

			var directionsService = new google.maps.DirectionsService();
			directionsService.route(request, function(response, status) {
				if (status == google.maps.DirectionsStatus.OK) {
					directionsDisplay.setDirections(response);
				}
			});
		}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCG21Y5X-wARtfSC6WkgO1nxoVU0WwcjwE&callback=initMap" async defer></script>
</body>
</html>