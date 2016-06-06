<?php
    // require_once($_SERVER['DOCUMENT_ROOT'].'/include/loginTest.php');
    // require_once($_SERVER['DOCUMENT_ROOT'].'/include/themeTest.php');
    // require_once($_SERVER['DOCUMENT_ROOT'].'/include/dateTest.php');
    // require_once($_SERVER['DOCUMENT_ROOT'].'/include/hotelTest.php');
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
            
            var testimage = {
                url: '/static/image/round1.png',
                size: new google.maps.Size(400, 400),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(0, 0),
                scaledSize: new google.maps.Size(60, 60)
            };
            
            function createMarker(place) {
                var placeLoc = place.geometry.location;
                var marker = new google.maps.Marker({
                    map: map,
                    position: placeLoc,
                    icon: testimage
                });
                
                google.maps.event.addListener(marker, 'click', function() {
                    console.log("이름: " + place.name + ", 위치: " + place.geometry.location);
                })
            }
            
            function callback(results, status) {
                if (status == google.maps.places.PlacesServiceStatus.OK) {
                    for (var i = 0; i < results.length; i++) {
                        createMarker(results[i]);
                    }
                }
            }
            
            function initialize() {
                var mapOptions = {
                    center: new google.maps.LatLng(37.54, 127.00),
                    scrollwheel: true,
                    zoom: 12
                };
                map = new google.maps.Map(document.getElementById("map"), mapOptions);
                $.getJSON("/static/js/formatted json/shopping.json", function(json1) {
                    
                    $.each(json1, function(key, data) {
                        if (key == 40) {
                            return false;
                        }
                        createMarker(data);
                    });
                    
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCG21Y5X-wARtfSC6WkgO1nxoVU0WwcjwE&signed_in=true&libraries=places&callback=initialize" async defer></script>
</body>
</html>