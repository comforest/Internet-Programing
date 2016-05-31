<?php // Example 21-6: checkuser.php
require_once 'functions.php';

if (isset($_POST['userinfo']))
{
    $userID = $_POST['userinfo'];
    $userName = $_POST['userinfo2'];
    echo "userID: " . $userID . " userName: " . $userName;
    echo "check! in adduser.php";
    echo __FILE__ . ": " . __LINE__;
    $numOfuser = mysqli_query($connect, "SELECT * FROM user WHERE userID='$userID'", MYSQLI_USE_RESULT) or die("쿼리 실패: $query". mysqli_error($connect));
    echo __FILE__ . ": " . __LINE__;
    // $numOfuser = queryMysql($connect, "SELECT * FROM user WHERE userID='$userID'");
    echo "유저 수: " . $numOfuser;
    echo __FILE__ . ": " . __LINE__;
    if (mysqli_num_rows($numOfuser) == 0) {
        //queryMysql($connect, "INSERT INTO `user` VALUES('$userID', '$numOfuser')");
        mysqli_query($connect, "INSERT INTO `user` VALUES('$userID', '$numOfuser')", MYSQLI_USE_RESULT) or die("쿼리 실패: $query". mysqli_error($connect));
        echo __FILE__ . ": " . __LINE__;
    }
    echo __FILE__ . ": " . __LINE__;
    echo "<script>location.replace('theme.php');</script>"
}
?>
