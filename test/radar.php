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
			var infoWindow;
			var service;

			function initMap() {
			  map = new google.maps.Map(document.getElementById('map'), {
			    center: {lat: 37.55, lng: 127.0},
			    zoom: 15,
			    styles: [{
			      stylers: [{ visibility: 'simplified' }]
			    }, {
			      elementType: 'labels',
			      stylers: [{ visibility: 'off' }]
			    }]
			  });

			  infoWindow = new google.maps.InfoWindow();
			  service = new google.maps.places.PlacesService(map);

			  // The idle event is a debounced event, so we can query & listen without
			  // throwing too many requests at the server.
			  map.addListener('idle', performSearch);
			}

			function performSearch() {
			  var request = {
			    bounds: map.getBounds(),
			    keyword: 'best view'
			  };
			  service.radarSearch(request, callback);
			}

			function callback(results, status) {
			  if (status !== google.maps.places.PlacesServiceStatus.OK) {
			    console.error(status);
			    return;
			  }
			  for (var i = 0, result; result = results[i]; i++) {
			    addMarker(result);
			  }
			}

			function addMarker(place) {
			  var marker = new google.maps.Marker({
			    map: map,
			    position: place.geometry.location,
			    icon: {
			      url: 'http://maps.gstatic.com/mapfiles/circle.png',
			      anchor: new google.maps.Point(10, 10),
			      scaledSize: new google.maps.Size(10, 17)
			    }
			  });

			  google.maps.event.addListener(marker, 'click', function() {
			    service.getDetails(place, function(result, status) {
			      if (status !== google.maps.places.PlacesServiceStatus.OK) {
			        console.error(status);
			        return;
			      }
			      infoWindow.setContent(result.name);
			      infoWindow.open(map, marker);
			    });
			  });
			}
		</script>

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCG21Y5X-wARtfSC6WkgO1nxoVU0WwcjwE&signed_in=true&libraries=places&callback=initMap" async defer></script>
	</body>
</html>
