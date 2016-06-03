<?php //themeTest.php

if (!isset($_POST['themeinfo']))
    echo("<script>location.replace('/set/theme');</script>");
$_SESSION['theme'] = $_POST['themeinfo'];

?>