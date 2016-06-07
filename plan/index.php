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
		var map;

		function initMap() {
			var start = new google.maps.LatLng(37.534, 126.9725);
			var finish = new google.maps.LatLng(37.5734, 127.0160);

			map = new google.maps.Map(document.getElementById('map'), {
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
			});
			var directionsDisplay = new google.maps.DirectionsRenderer;
			directionsDisplay.setMap(map);

			$(".oneline").addEventListener('click', function(){
				var arr = document.getElementsByClassName("oneline");
				console.log("clicked!");

				for (i = 0; i < arr.length; i++) {
					if (arr[i].className != "oneline outofrange") {
						arr[i].className = "oneline";
					}
				}
				$(this).className += " dateSelect";

				$("#selected_date").attr("value", t.getAttribute("data-date"));

				var user_id = $("#session_userID").attr("value");

				$.ajax({
					url:"/ajax/getRoute.php",
					type:"get",
					dataType:"json",
					data:{
						user_id:user_id,
						route_date: $("#selected_date").attr("value")
					},
					success:function(result){
						path_list = result;

						var pre_html = "";
						$.each(result, function(key, data) {
							pre_html += '<article class="dialog_article path_article" id="n100">';
							pre_html += '<div class="trashbox">';
							pre_html += '<a href="#" onclick="del("100")"><img src="/static/image/bin_grey.png" class="trash"></a>';
							pre_html += '</div>';
							pre_html += '<div class="namebox">';
							pre_html += '<h1>' + data.name + '</h1>';
							pre_html += '<p class = "time">' + ("" + data.lat).slice(-2) + '</p>';
							pre_html += '</div>';
							pre_html += '<div class="photobox">';
							pre_html += '<img src="/static/image/sampleImage.jpg" class="photo">';
							pre_html += '</div>';
							pre_html += '<div class="updownbox">';
							pre_html += '<div class="buttonwrap">';
							pre_html += '<a href="#" onclick="up("100")"><img src="/static/image/up_button.png"></a>';
							pre_html += '</div>';
							pre_html += '<div class="buttonwrap">';
							pre_html += '<a href="#" onclick="down("100")"><img src="/static/image/down_button.png"></a>';
							pre_html += '</div>';
							pre_html += '</div>';
							pre_html += '</article>';
						});
						$("#path_list_body").html(pre_html);
						
						refreshMap();
					},
					error:function(info, xhr){
						console.log("에러: " + info.status + "\n" + info.responseText);
					}
				});

				calculateAndDisplayRoute(directionsService, directionsDisplay);
			});
		}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCG21Y5X-wARtfSC6WkgO1nxoVU0WwcjwE&callback=initMap&language=en" async defer></script>
</body>
</html>