<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/include/loginTest.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/include/themeTest.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/include/dateTest.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/include/hotelTest.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href='https://fonts.googleapis.com/css?family=Hind' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/static/css/style.css">
	<link rel="stylesheet" type="text/css" href="/static/css/navbar_style.css">
	<link rel="stylesheet" type="text/css" href="/static/css/dialog.css">
	<link rel="stylesheet" type="text/css" href="/static/css/tourlist.css">
	<link rel="stylesheet" type="text/css" href="/static/css/datebar.css">
	<link rel="stylesheet" type="text/css" href="/static/css/tab.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <meta charset="utf-8">
    <style>
    	html, body {
    		height: 100%;
    	}
    	#mapbox {
    		z-index: 1;
    		height: calc(100% - 50px);
    	}
        #map {
            height: 100%;
        }
    </style>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
    <?php
		require_once($_SERVER['DOCUMENT_ROOT']."/include/navbar.inc");
		require_once($_SERVER['DOCUMENT_ROOT']."/include/datebar.inc");
		require_once($_SERVER['DOCUMENT_ROOT']."/include/tourlist.inc");
		require_once($_SERVER['DOCUMENT_ROOT']."/include/tab.inc");
	?>
	<div id="mapbox">
		<div id="map"></div>
	</div>
	<script type="text/javascript">
            var map;

            function loadmarkers() {
                $.getJSON("/static/js/shopping.json", function(json1) {
                    $.each(json1, function(key, data) {
                        var latLng = new google.maps.LatLng(data.LOCATION_Y, data.LOCATION_X);
                        var image = {
                            url: '/static/image/round1.png',
                            size: new google.maps.Size(400, 400),
                            origin: new google.maps.Point(0, 0),
                            anchor: new google.maps.Point(0, 0),
                            scaledSize: new google.maps.Size(60, 60)
                        };
                        
                        var request = {
                            location: new google.maps.LatLng(date.LOCATION_Y, data.LOCATION_X),
                            radius: '100',
                            types: []
                        };
                        
                        var service = new google.maps.places.PlacesService(map);
                        service.nearbySearch(request, function(results, status) {
                            if (status == google.maps.places.PlaceServiceStatus.OK) {
                                for (var i = 0; i < results.length; i++) {
                                    var place = results[i];
                                    var marker = new google.maps.Marker({
                                        map: map,
                                        position: place.geometry.location,
                                        icon: image
                                    });
                                }
                            }
                        });
                    });
                });
            }

            function initialize() {
                var mapOptions = {
                    center: new google.maps.LatLng(37.54, 127.00),
                    scrollwheel: true,
                    zoom: 12
                };
                map = new google.maps.Map(document.getElementById("map"), mapOptions);

                loadmarkers();
            }
            
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCG21Y5X-wARtfSC6WkgO1nxoVU0WwcjwE&signed_in=true&libraries=places&callback=initialize" async defer></script>
</body>
</html>