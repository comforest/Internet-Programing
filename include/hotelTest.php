<?php // hotelTest.php

if (!isset($_POST['placeinfo']))
    echo("<script>location.replace('/set/theme');</script>");
$_SESSION['place'] = $_POST['placeinfo'];

?>