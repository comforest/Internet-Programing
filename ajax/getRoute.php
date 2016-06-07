<?php
    if ( isset($_GET['user_id']) && isset($_GET['route_date']) ) {
        $connect = mysqli_connect("localhost", "traversapp", "haveagoodtrip", "travers");
        
        // find plan
        $que = "SELECT * FROM plan WHERE userID=".$_GET['user_id'];
        $result = mysqli_query($connect, $que);
        $row = mysqli_fetch_array($result);
        $plan_id = $row['planID'];
        
        // find route
        $que = "SELECT * FROM route WHERE planID='".$plan_id."' AND routeDate='".$_GET['route_date']."'";
        $result = mysqli_query($connect, $que);
        $row = mysqli_fetch_array($result);
        $route_id = $row['routeID'];
        
        // get list of places
        $que = "SELECT * FROM place WHERE routeID='".$route_id."'";
        $result = mysqli_query($connect, $que);

        $rows = array();
        while ($row = mysqli_fetch_array($result)) {
            $data = array(
                'placeID' => $row['placeID'],
                'googleID' => $row['googleID'],
                'name' => $row['name'],
                'lat' => $row['lat'],
                'lng' => $row['lng']
            );
            array_push($rows, $data);
        }
        echo (strip_tags(json_encode($rows)));
    }
?>