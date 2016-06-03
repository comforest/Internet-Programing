<?php
// require_once 'header.php';
// if (!isset($_POST['date']) || !isset($_POST['place']))
//     echo("<script>location.replace('datepage.php');</script>");
// $_SESSION['date'] = $_POST['date'];
// $_SESSION['place'] = $_POST['place'];
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
	<meta name="viewport" content="initial-scale=1.0">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <meta charset="utf-8">
    <style>
    	html, body {
    		height: 100%;
    	}
    	#mapbox, #map {
    		z-index: -10;
    		position: absolute;
    		top: 50px;
    		bottom: 0px;
    		left: 0px;
    		right: 0px;
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
            
            function initialize() {
                var mapOptions = {
                    center: new google.maps.LatLng(37.54, 127.00),
                    zoom: 12
                };
                map = new google.maps.Map(document.getElementById("map"), mapOptions); 

                loadmarkers();
            }

            function loadmarkers() {
                $.getJSON("/static/js/shopping.json", function(json1) {
                    $.each(json1, function(key, data) {
                        var latLng = new google.maps.LatLng(data.LOCATION_Y, data.LOCATION_X);
                        var marker = new google.maps.Marker({
                            position: latLng,
                            title: data.title,
                            map:map
                        });
                    });
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCG21Y5X-wARtfSC6WkgO1nxoVU0WwcjwE&signed_in=true&libraries=places&callback=initialize" async defer></script>
</body>
</html>