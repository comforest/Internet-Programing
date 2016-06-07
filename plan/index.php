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
	<link rel="stylesheet" type="text/css" href="/static/css/datebar.css">
	<link rel="stylesheet" type="text/css" href="/static/css/path.css">
	<link rel="stylesheet" type="text/css" href="/static/css/plan.css"> 
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="/static/js/path.js"></script>
	<style type="text/css">
		#map {
			height: 100%;
			width: 100%;
		}
	</style>
</head>
<body>
	<input type="hidden" name="selected_date" id="selected_date" value="2016-06-07">
    <input type="hidden" name="session_userID" id="session_userID" value="<?php echo $_SESSION['userID']; ?>">
	<?php
		require_once($_SERVER['DOCUMENT_ROOT']."/include/navbar.inc");
    ?>
    <div class="plancontainer">
	<?php
		require_once($_SERVER['DOCUMENT_ROOT']."/include/datebar2.inc");
		require_once($_SERVER['DOCUMENT_ROOT']."/include/path.inc");
	?>
		<div class="mapbox-lg">
			<div id="map"></div>
		</div>
    </div>
    <script>
		function initMap() {
			var start = new google.maps.LatLng(37.534, 126.9725);
			var finish = new google.maps.LatLng(37.5734, 127.0160);

			var map = new google.maps.Map(document.getElementById('map'), {
				center: start,
				zoom: 7
			});

			var directionsDisplay = new google.maps.DirectionsRenderer({
				map: map
			});

            var waypts = [
            {    
                location: {lat:37.5657, lng:126.9750}
            }
            ];
			var request = {
				destination: finish,
				origin: start,
				travelMode: google.maps.TravelMode.DRIVING,
                waypoints: waypts,
                optimizeWaypoints: true
			};

			var directionsService = new google.maps.DirectionsService();
			directionsService.route(request, function(response, status) {
				if (status == google.maps.DirectionsStatus.OK) {
					directionsDisplay.setDirections(response);
				}
				console.log(response);
			});
		}
        
        function refreshMap() {
			$.each(path_list, function(key, data){
				addMarker(map, new google.maps.LatLng(data.lat, data.lng));
			});
		}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCG21Y5X-wARtfSC6WkgO1nxoVU0WwcjwE&callback=initMap" async defer></script>
</body>
</html>