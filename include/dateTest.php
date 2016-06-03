<?php // dateTest.php

if (!isset($_POST['dateinfo']))
    echo("<script>location.replace('/set/theme');</script>");
$_SESSION['dateStart'] = $_POST['dateStartinfo'];
$_SESSION['dateEnd'] = $_POST['dateEndinfo'];

?>