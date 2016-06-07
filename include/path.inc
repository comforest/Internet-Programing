<!-- 
작성자 : 이호연
페이지 설명 : 경로 보여주기
필요한 css : dialog.css, path.css
 -->
<!-- 경로 목록 -->
<section class="dialog path" id="pathcontainer">
	<section class="dialog_head">
		<a href="#" id="edit" onclick="toggle()">edit</a>
	</section>
	<section class="dialog_body">
<?php
        $connect = mysqli_connect("localhost", "traversapp", "haveagoodtrip", "travers");
        
        // find plan
        $que = "SELECT * FROM plan WHERE userID=".$_SESSION['user_id'];
        $result = mysqli_query($connect, $que);
        $row = mysqli_fetch_array($result);
        $plan_id = $row['planID'];
        
        // if route does not exist, create it
        $que = "SELECT COUNT(*) FROM route WHERE planID='".$plan_id."' AND routeDate='".$_GET['route_date']."'";
        $result = mysqli_query($connect, $que);
        $row = mysqli_fetch_row($result);
        if ($row[0] == 0) {
            $que = "INSERT INTO route (planID, routeDate) VALUES ('".$plan_id."','".$_GET['route_date']."')";
            mysqli_query($connect, $que);
        }
        
        // find route
        $que = "SELECT * FROM route WHERE planID='".$plan_id."' AND routeDate='".$_GET['route_date']."'";
        $result = mysqli_query($connect, $que);
        $row = mysqli_fetch_array($result);
        $route_id = $row['routeID'];
        
        // add place. if place already exist, do nothing.
        $que = "SELECT COUNT(*) FROM place WHERE routeID='".$route_id."' AND googleID='".$_GET['place_id']."'";
        $result = mysqli_query($connect, $que);
        $row = mysqli_fetch_row($result);
        if ($row[0] == 0) {
            $que = "INSERT INTO place (routeID, googleID, visitOrder) VALUES ('".$route_id."','".$_GET['place_id']."','0')";
            mysqli_query($connect, $que);
        }



?>
	</section>
	<section class="dialog_foot">
		<a class="click">list</a>
		<a>map</a>
	</section>
</section>