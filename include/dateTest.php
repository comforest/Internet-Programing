<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/include/functions.php');

    if (!(isset($_POST['dateStartinfo']) || isset($_SESSION['dateStart'])))
        echo("<script>location.replace('/set/theme');</script>");
    if (!(isset($_POST['dateEndinfo']) || isset($_SESSION['dateEnd'])))
        echo("<script>location.replace('/set/theme');</script>");

    if (isset($_POST['dateStartinfo']) 
       && isset($_POST['dateEndinfo'])) {
        $_SESSION['dateStart'] = $_POST['dateStartinfo'];
        $_SESSION['dateEnd'] = $_POST['dateEndinfo'];
        
        //처음 저장하는 유저면 추가, 원래 있던 유저면 정보 업데이트 :
        queryMysql($connect, "INSERT INTO plan (userID, travelStart, travelEnd) VALUES (" . $_SESSION['userID'] . ", " . $_SESSION['dateStart'] . ", " . $_SESSION['dateEnd'] . ") ON DUPLICATE KEY UPDATE travelStart=" . $_SESSION['dateStart'] . ", travelEnd=" . $_SESSION['dateEnd']);
        if (!isset($_SESSION['planID']))
            $_SESSION['planID'] = mysqli_insert_id($connect);
        
    }
?>