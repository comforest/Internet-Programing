<?php
    if ( isset($_GET['user_id']) && isset($_GET['place_id']) && isset($_GET['route_date']) ) {
        $connect = mysqli_connect("localhost", "traversapp", "haveagoodtrip", "travers");
        
        // find plan
        $que = "SELECT * FROM plan WHERE userID=".$_GET['user_id'];
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
    }
?>