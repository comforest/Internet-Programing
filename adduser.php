<?php // adduser.php
require_once 'functions.php';

if (isset($_POST["userinfo"]))
{
    $userID = $_POST['userinfo'];
    $userName = $_POST['userinfo2'];
    echo "check1!";
    $numOfuser = queryMysql($connect, "SELECT * FROM user WHERE userID='$userID'");
    echo "usernum:" . (string)$numOfuser;
    if (mysqli_num_rows($numOFuser) == 0) {
        queryMysql($connect, "INSERT INTO user VALUES('$userID', '$userName')");
        echo "check2";
    }
    echo "check3!";
    echo "<script>location.replace('theme.php');</script>";
}
?>
