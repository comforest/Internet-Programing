<?php // Example 21-6: checkuser.php
require_once 'functions.php';

if (isset($_POST['userID']))
{
    $userID = sanitizeString($_POST['userID']);
    $userName = sanitizeString($_POST['userName']);
    queryMysql($connect, "SELECT * FROM members WHERE user='$userID'");
    /*if (mysqli_num_rows(queryMysql($connect, "SELECT * FROM members WHERE user='$userID'")))
        null;
    else {
        queryMysql($connect, "INSERT INTO user VALUES($userID, '$userName')");
        
    }*/
}
?>
