<?php // Example 21-6: checkuser.php
require_once 'functions.php';

if (isset($_POST['user']))
{
    $user = sanitizeString($_POST['user']);
    $userName = sanitizeString($_POST['userN']);

    if (mysql_num_rows(queryMysql($connect, "SELECT * FROM members
        WHERE user='$user'")))
        echo("<script>location.replace('theme.php');</script>");
    else
        queryMysql($connect, "INSERT INTO user VALUES('$user', '$userName')");
    echo "this is " . __FILE__ . ": " . __FUNCTION__ . "OK.";
}
?>
