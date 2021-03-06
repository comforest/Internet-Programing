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
    <link rel="stylesheet" type="text/css" href="/static/css/detailView.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="/static/js/tourList.js"></script>
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
    <input type="hidden" name="selected_date" id="selected_date" value="2016-06-07">
    <?php
        echo '<input type="hidden" name="session_userID" id="session_userID" value="'.$_SESSION['userID'].'">';
    ?>
    <?php
		require_once($_SERVER['DOCUMENT_ROOT']."/include/navbar.inc");
		require_once($_SERVER['DOCUMENT_ROOT']."/include/datebar.inc");
		require_once($_SERVER['DOCUMENT_ROOT']."/include/tourlist.inc");
        require_once($_SERVER['DOCUMENT_ROOT']."/include/detailView.inc");
		require_once($_SERVER['DOCUMENT_ROOT']."/include/tab.inc");
	?>
    <div onclick="currentLocation()" id="geo"><img src="/static/image/geo.png"/></div>
	<div id="mapbox">
		<div id="map"></div>
	</div>
	<script type="text/javascript">
            var map;
            var index_count = 0;
            var place_list = [];
            var mode = "all";
            
            function createMarker(place) {
                var placeLoc = place.geometry.location;
                var image = {
                    url: '/static/image/marker_culture.png',
                    size: new google.maps.Size(500, 500),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(0, 0),
                    scaledSize: new google.maps.Size(50, 50)
                };
                var marker = new google.maps.Marker({
                    map: map,
                    position: placeLoc,
                    icon: image
                });
                
                google.maps.event.addListener(marker, 'click', function() {
                    console.log("이름: " + place.name + ", 위치: {" + place.geometry.location.lat + "," + place.geometry.location.lng + "}, 고유번호: " + place.place_id);                    
                    showDetail(place);
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
                
                place_list = [];
                $("#dialog_body").html("");
                index_count = 0;
                
                var address = {
                  "all":   "/static/js/formatted json/shopping.json",
                  "shopping": "/static/js/formatted json/shopping.json",
                  "historic": "/static/js/formatted json/historic site.json",
                  "trend": "/static/js/formatted json/trend.json",
                  "nature": "/static/js/formatted json/nature.json"
                };
                
                $.getJSON(address[mode], function(json1) {
                    
                    $.each(json1, function(key, data) {
                        if (key == 40) {
                            return false;
                        }
                        
                        createMarker(data);
                        
                        pre_html = $("#dialog_body").html();
                        pre_html += "<article class=\"dialog_article\" data-place-index=" + index_count + ">";
			            if (data.photos) {
                            pre_html += "<img src=\"https://maps.googleapis.com/maps/api/place/photo?maxwidth=800&photoreference=" + data.photos[0].photo_reference + "&key=AIzaSyAYOKpuX6_Y9muKZCB4rBX7xiBCJKAJ2RQ\">";
                        } else {
                            pre_html += "<img src=\"/static/image/sampleImage.jpg\">";
                        }
			            pre_html += "<h1>" + data.name + "</h1>";
			            pre_html += "<p>" + data.formatted_address + "</p>";
                        pre_html += "<div style=\"clear: both;\"></div>";
		                pre_html += "</article>";
                        $("#dialog_body").html(pre_html);
                        
                        place_list.push(data);
                        index_count += 1;
                    });
                });
            }
            
            function currentLocation() {
                var watchID = navigator.geolocation.watchPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    map.setCenter(pos);
                }, function() {
                    
                });
            }
        </script>
        <script type="text/javascript" src="/static/js/attraction.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCG21Y5X-wARtfSC6WkgO1nxoVU0WwcjwE&signed_in=true&libraries=places&callback=initialize&language=en" async defer></script>
</body>
</html>