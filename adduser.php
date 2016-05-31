<?php // Example 21-6: checkuser.php
require_once 'functions.php';

if (isset($_POST['userID']))
{
    $userID = sanitizeString($_POST['userID']);
    $userName = sanitizeString($_POST['userName']);
    /*
    echo "this is " . __FILE__ . ": " . __FUNCTION__;
    if(!$connect){
        echo("__FILE__ . ": " . __FUNCTION__" . "mysql 연결 안 됨");
    }
    if (mysqli_num_rows(queryMysql($connect, "SELECT * FROM members
        WHERE user='$userID'")))
        echo("<script>location.replace('theme.php');</script>");
    else
        queryMysql($connect, "INSERT INTO user VALUES($userID, '$userName')");
    echo "this is " . __FILE__ . ": " . __FUNCTION__ . "OK.";*/
}
?>
