<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/include/functions.php');

    if (!(isset($_POST['dateStartinfo']) || isset($_SESSION['dateStart'])))
        echo("<script>location.replace('/set/theme');</script>");
    if (!(isset($_POST['dateEndinfo']) || isset($_SESSION['dateEnd'])))
        echo("<script>location.replace('/set/theme');</script>");

    echo("시작");
    echo($_SESSION['theme']);
    echo($_POST['dateStartinfo']);
    echo("시작");
    if (isset($_POST['dateStartinfo']) 
       && isset($_POST['dateEndinfo'])) {
        $_SESSION['dateStart'] = $_POST['dateStartinfo'];
        $_SESSION['dateEnd'] = $_POST['dateEndinfo'];
        
        echo("디비에 저장을 시작해볼까?");
        //처음 저장하는 유저면 추가, 원래 있던 유저면 정보 업데이트 :
        $numOfuser = mysqli_query($connect, "SELECT COUNT(userID) FROM plan WHERE userID = '" . $userID . "'") or die("쿼리 실패");
        $numRow = mysqli_fetch_row($numOfuser);
        /*
        if ($numRow[0] == 0) {
            echo("플랜을 새로 추가!");
            mysqli_query($connect, "INSERT INTO plan (userID, travelStart, travelEnd) VALUES (" . $_SESSION['userID'] . ", " . $_SESSION['dateStart'] . ", " . $_SESSION['dateEnd']) or die("쿼리 실패". mysqli_error($connect));
            $_SESSION['planID'] = mysqli_insert_id($connect) or die("insert id에서 에러");
            echo("<script>console.log($_SESSION['planID']);</script>");
        } else {
            //echo("플랜을 업데이트!");
            $planResult = queryMysql($connect, "SELECT planID FROM plan WHERE userID = '" . $userID . "'");
            $planRow = mysqli_fetch_row($planResult);
            queryMysql($connect, "KEY UPDATE planID=" . $planRow['planID'] . ", travelStart=" . $_SESSION['dateStart'] . ", travelEnd=" . $_SESSION['dateEnd']);
        }        */
    }
?>