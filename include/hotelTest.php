<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/include/functions.php');

    if (!(isset($_POST['cityinfo']) || isset($_SESSION['city']))) {
        echo("<script>alert(\"No city\");</script>");
        echo("<script>location.replace('/set/theme');</script>");
    }
    if (!(isset($_POST['hotelinfo']) || isset($_SESSION['hotel']))) {
        echo("<script>alert(\"No hotel\");</script>");
        echo("<script>location.replace('/set/theme');</script>");
    }

    if (isset($_POST['cityinfo']) && isset($_POST['hotelinfo'])) {
        $_SESSION['hotelCity'] = $_POST['cityinfo'];
        $_SESSION['hotel'] = $_POST['hotelinfo'];
        $_SESSION['hotelID'] = $_POST['hotelIDinfo'];
        
        // 처음 저장하는 유저면 추가, 원래 있던 유저면 정보 업데이트 :
        queryMysql($connect, "UPDATE plan set hotelID= '" . $_SESSION['hotelID'] . "' WHERE planID=" . $_SESSION['planID']);
    }
?>