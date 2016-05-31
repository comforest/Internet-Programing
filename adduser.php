<?php // Example 21-6: checkuser.php
require_once 'functions.php';

if (isset($_POST['userID']))
{
    $userID = $_POST['userID'];
    $userName = $_POST['userName'];
    
    if (mysqli_num_rows(queryMysql($connect, "SELECT * FROM user WHERE user='$userID'")))
        null;
    else {
        queryMysql($connect, "INSERT INTO user VALUES('$userID', '$userName')");
    }
}
?>
