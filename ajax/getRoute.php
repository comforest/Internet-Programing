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
        $que = "SELECT placeID FROM place WHERE routeID='".$route_id."'";
        $result = mysqli_query($connect, $que);
        $row = mysqli_fetch_row($result);
        
        $rows = array();
        while ($row = mysql_fetch_assoc($result))
            {
                $JSONres = array
                (   
                    "title"     => urlencode($row['title']),
                    "content"   => urlencode($row['content'])
                ); 
                array_push($rows, $JSONres);
            }
        echo (strip_tags(urldecode(json_encode($rows))));
    }
?>