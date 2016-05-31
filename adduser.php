<?php // Example 21-6: checkuser.php
require_once 'functions.php';

if (isset($_POST['userID']))
{
    $userID = sanitizeString($_POST['userID']);
    $userName = sanitizeString($_POST['userName']);
    /*
    if (mysqli_num_rows(queryMysql($connect, "SELECT * FROM members
        WHERE user='$userID'")))
        echo "console.log(\"유저가 이미 있음.\");";
    else {
        echo "console.log(__FILE__ . __LINE__ . \"유저 생성 시도.\");";
        queryMysql($connect, "INSERT INTO user VALUES($userID, '$userName')");
        
    }*/
    echo "console.log(__FILE__ . __LINE__ . \"adduser.php의 끝부분 도착.\");";
}
?>
