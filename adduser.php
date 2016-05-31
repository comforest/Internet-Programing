<?php // Example 21-6: checkuser.php
require_once 'functions.php';

if (isset($_POST['userID']))
{
    $userID = (int) sanitizeString($_POST['userID']);
    $userName = sanitizeString($_POST['userName']);
    
    $result = queryMysql($connect, "INSERT INTO user VALUES($userID, '$userName')");
    /*if (!$result)
        die("에러!");
    if (mysqli_num_rows($connect, queryMysql($connect, "SELECT * FROM members WHERE user='$userID'")))
        null;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
    else {
        queryMysql($connect, "INSERT INTO user VALUES($userID, '$userName')");
    }*/
}
?>
