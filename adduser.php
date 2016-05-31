<?php // Example 21-6: checkuser.php
require_once 'functions.php';

if (isset($_POST['userID']))
{
    $userID = (int) $_POST['userID'];
    $userName = $_POST['userName'];
    
    if (mysqli_num_rows($connect, queryMysql($connect, "SELECT * FROM members WHERE user='$userID'")))
        null;                                                                                                                                                                                                                                                                                                                                                                                                                     
    else {
        queryMysql($connect, "INSERT INTO user VALUES($userID, '$userName')");
    }
}
?>
