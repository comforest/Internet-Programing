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
		    		height: 600px;
		    		width: 60%;
		    		margin-left: 20%;
		    	}
		    </style>
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</head>
	<body>
		<div id="map"></div>

		<script>
			var map;
			var infowindow;

			function initMap() {
			  var pyrmont = {lat: 37.54, lng: 127.00};

			  map = new google.maps.Map(document.getElementById('map'), {
			    center: pyrmont,
			    zoom: 15
			  });

			  infowindow = new google.maps.InfoWindow();

			  var service = new google.maps.places.PlacesService(map);
			  service.nearbySearch({
			    location: pyrmont,
			    radius: 5000,
			    types: []
			  }, callback);
			}

			function callback(results, status, pagination) {
			  if (status === google.maps.places.PlacesServiceStatus.OK) {
			    for (var i = 0; i < results.length; i++) {
			      createMarker(results[i]);
			    }

			    if (pagination.hasNextPage) {
			    	pagination.nextPage();
			    }
			  }
			}

			function createMarker(place) {
			  var placeLoc = place.geometry.location;
			  var marker = new google.maps.Marker({
			    map: map,
			    position: place.geometry.location
			  });

			  google.maps.event.addListener(marker, 'click', function() {
			    infowindow.setContent(place.name);
			    infowindow.open(map, this);
			  });
			}
		</script>

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCG21Y5X-wARtfSC6WkgO1nxoVU0WwcjwE&signed_in=true&libraries=places&callback=initMap" async defer></script>
	</body>
</html>
