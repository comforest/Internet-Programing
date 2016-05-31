<?php // Example 21-6: checkuser.php
require_once 'functions.php';

if (isset($_POST['userID']))
{
    $userID = $_POST['userID'];
    $userName = $_POST['userName'];
    
    echo "SELECT * FROM user WHERE userID='$userID'";
    $numOfuser = queryMysql($connect, "SELECT * FROM user WHERE userID='$userID'");
    echo "user수" . $numOfuser;
    if (mysqli_num_rows($numOfuser) == 0) {
        queryMysql($connect, "INSERT INTO user VALUES('$userID', '$userName')");
    }
}
?>
