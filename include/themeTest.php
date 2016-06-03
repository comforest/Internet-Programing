<?php //themeTest.php

if (!isset($_POST['themeinfo']))
    echo("<script>location.replace('/set/theme.php');</script>");
$_SESSION['theme'] = $_POST['themeinfo'];

?>