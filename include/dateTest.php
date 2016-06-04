<?php // dateTest.php

if (!(isset($_POST['dateStartinfo']) || isset($_SESSION['dateStart'])))
    echo("<script>location.replace('/set/theme');</script>");
if (!(isset($_POST['dateEndinfo']) || isset($_SESSION['dateEnd'])))
    echo("<script>location.replace('/set/theme');</script>");
$_SESSION['dateStart'] = $_POST['dateStartinfo'];
$_SESSION['dateEnd'] = $_POST['dateEndinfo'];

?>