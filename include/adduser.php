<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'].'/include/functions.php');

    if (isset($_POST["userinfo"]))
    {
        $userID = $_POST['userinfo'];
        $userName = $_POST['userinfo2'];
        
        $numOfuser = mysqli_query($connect, "SELECT COUNT(userID) FROM user WHERE userID = '" . $userID . "'") or die("쿼리 실패");
        $numRow = mysqli_fetch_row($numOfuser);
        if ($numRow[0] == 0) {
            queryMysql($connect, "INSERT INTO user VALUES('$userID', '$userName')");
        }
        $_SESSION['userID'] = $userID;
        $_SESSION['userName'] = $userName;
        echo "<script>location.replace('/set/theme');</script>";
    }
?>
