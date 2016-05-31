<!-- just for test api -->

<!DOCTYPE html>
<html>
	<head>
			<title>Travers</title>
			<script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/24/11a/intl/ko_ALL/common.js"></script>
			<script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/24/11a/intl/ko_ALL/map.js"></script>
			<script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/24/11a/intl/ko_ALL/util.js"></script>
			<script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/24/11a/intl/ko_ALL/onion.js"></script>
			<script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/24/11a/intl/ko_ALL/stats.js"></script>
			<script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/24/11a/intl/ko_ALL/controls.js"></script>
			<script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/24/11a/intl/ko_ALL/marker.js"></script>
			<meta name="viewport" content="initial-scale=1.0">
    		<meta charset="utf-8">
		    <style>
		    	html, body {
		    		height: 100%;
		    		margin: 0;
		    		padding: 0;
		      	}
		    	#map {
		    		height: 100%;
		    	}
		    </style>
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</head>
	<body>
		<h1>Map1</h1>
		<div id="map1" style="height: 400px; width: 60%; margin-left: 20%;"></div>
		<h1>Map2</h1>
		<div id="map2" style="height: 400px; width: 60%; margin-left: 20%;"></div>

		<script>
			function initMap1() {
				var map1 = new google.maps.Map(document.getElementById('map1'), {
					center: {lat: -34.397, lng: 150.644},
			    	zoom: 8
				});
			}
    	</script>
		<script>
			function initMap2() {
				var chicago = {lat: 41.85, lng: -87.65};
				var indianapolis = {lat: 39.79, lng: -86.14};

				var map2 = new google.maps.Map(document.getElementById('map2'), {
					center: chicago,
					zoom: 7
				});

				var directionsDisplay = new google.maps.DirectionsRenderer({
					map: map2
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

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCG21Y5X-wARtfSC6WkgO1nxoVU0WwcjwE&callback=initMap1" async defer></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCG21Y5X-wARtfSC6WkgO1nxoVU0WwcjwE&callback=initMap2" async defer></script>
	</body>
</html>
