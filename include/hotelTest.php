<?php // hotelTest.php

if (!isset($_POST['placeinfo']))
    echo("<script>location.replace('theme.php');</script>");
$_SESSION['place'] = $_POST['placeinfo'];

?>