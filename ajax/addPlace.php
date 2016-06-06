<?php
    if (isset($_GET['user_id']) && isset($_GET['place_id'])) {
        $connect = mysqli_connect("localhost", "traversapp", "haveagoodtrip", "travers");
        $que = "SELECT * FROM route WHERE ";
        $result = mysqli_query($connect, $que);
    }
?>