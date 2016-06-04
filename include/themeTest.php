<?php //themeTest.php

if (!(isset($_POST['themeinfo']) || isset($_SESSION['theme'])))
    echo("<script>location.replace('/set/theme');</script>");
if (isset($_POST['themeinfo'])
    $_SESSION['theme'] = $_POST['themeinfo'];

?>