<?php
    echo("<script>console.log('콘솔에 출력');</script>"); require_once($_SERVER['DOCUMENT_ROOT'].'/include/functions.php');

    if (!(isset($_POST['cityinfo']) || isset($_SESSION['city'])))
        echo("<script>location.replace('/set/theme');</script>");
    if (!(isset($_POST['hotelinfo']) || isset($_SESSION['hotel'])))
        echo("<script>location.replace('/set/theme');</script>");

    echo("\n\n 호텔 테스트 시작!");
    if (isset($_POST['cityinfo']) && isset($_POST['hotelinfo'])) {
        $_SESSION['hotelCity'] = $_POST['cityinfo'];
        $_SESSION['hotel'] = $_POST['hotelinfo'];
        $_SESSION['hotelID'] = $_POST['hotelIDinfo'];
        
        echo("호텔 저장 쿼리 전");
        echo($_SESSION['hotelID']);
        //처음 저장하는 유저면 추가, 원래 있던 유저면 정보 업데이트 :
        queryMysql($connect, "UPDATE plan set hotelID= '" . $_SESSION['hotelID'] . "' WHERE planID=" . $_SESSION['planID']);
        echo("호텔 정보도 저장!");
    }
?>