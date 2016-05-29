<!-- just for test api -->

<!DOCTYPE html>
<html>
	<head>
		<title>Travers</title>
<script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/24/11a/intl/ko_ALL/common.js"></script><script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/24/11a/intl/ko_ALL/map.js"></script><script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/24/11a/intl/ko_ALL/util.js"></script><script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/24/11a/intl/ko_ALL/onion.js"></script><script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/24/11a/intl/ko_ALL/stats.js"></script><script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/24/11a/intl/ko_ALL/controls.js"></script><script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/24/11a/intl/ko_ALL/marker.js"></script>
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
	</head>
	<body>
		<div id="map"></div>

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
