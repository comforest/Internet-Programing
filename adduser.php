<?php // Example 21-6: checkuser.php
require_once 'functions.php';

if (isset($_POST['userID']))
{
    $userID = $_POST['userID'];
    $userName = $_POST['userName'];
    
    $numOfuser = queryMysql($connect, "SELECT * FROM `user` WHERE `userID`='$userID'");
    if (mysqli_num_rows($numOfuser) == 0) {
        queryMysql($connect, "INSERT INTO `user` VALUES('$userID', '$userName')");
    }
}
?>
