<!-- 
작성자 : 이호연
페이지 설명 : Serach page
-->
<?php // theme.php
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
	<link rel="stylesheet" type="text/css" href="static/css/style.css">
	<link rel="stylesheet" type="text/css" href="static/css/navbar_style.css">
	<link rel="stylesheet" type="text/css" href="static/css/dialog.css">
	<link rel="stylesheet" type="text/css" href="static/css/tourlist.css">
	<link rel="stylesheet" type="text/css" href="static/css/datebar.css">
	<link rel="stylesheet" type="text/css" href="static/css/tab.css">
	<meta name="viewport" content="initial-scale=1.0">
    		<meta charset="utf-8">
		    <style>
		    	#map {
		    		height: 100%;
		    		width: 100%;
		    	}
		    </style>
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>

	<?php
		require_once("navbar.inc");
		require_once("datebar.inc");
		require_once("tourlist.inc");
		require_once("tab.inc");
	?>
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

</body>
</html>