<?php // hotelTest.php

if (!isset($_POST['placeinfo']))
    echo("<script>location.replace('/set/theme.php');</script>");
$_SESSION['place'] = $_POST['placeinfo'];

?>