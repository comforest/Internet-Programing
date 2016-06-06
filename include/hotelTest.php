<?php
    if (!(isset($_POST['cityinfo']) || isset($_SESSION['city'])))
        echo("<script>location.replace('/set/theme');</script>");
    if (!(isset($_POST['hotelinfo']) || isset($_SESSION['hotel'])))
        echo("<script>location.replace('/set/theme');</script>");

    if (isset($_POST['cityinfo']) && isset($_POST['hotelinfo'])) {
        $_SESSION['hotelCity'] = $_POST['cityinfo'];
        $_SESSION['hotel'] = $_POST['hotelinfo'];
        $_SESSION['hotelID'] = $_POST['hotelIDinfo'];
        
        //처음 저장하는 유저면 추가, 원래 있던 유저면 정보 업데이트 :
        queryMysql($connect, "KEY UPDATE  planID=" . $_SESSION['planID'] .  "hotelID=" . $_SESSION['hotelID']);
    }
?>