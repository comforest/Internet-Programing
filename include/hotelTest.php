<?php // hotelTest.php

if (!(isset($_POST['placeinfo']) || isset($_SESSION['city'])))
    echo("<script>location.replace('/set/theme');</script>");
if (!(isset($_POST['hotelinfo']) || isset($_SESSION['hotel'])))
    echo("<script>location.replace('/set/theme');</script>");

if (isset($_POST['placeinfo']))
    $_SESSION['city'] = $_POST['placeinfo'];
if (isset($_POST['hotelinfo']))
    $_SESSION['hotel'] = $_POST['hotelinfo'];

?>