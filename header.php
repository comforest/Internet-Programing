<!-- 
작성자 : 성수아
페이지 기능 : 1. php문서의 처음 부분에 포함하면 세션을 시작하고 
            세션에서 유저 정보등을 받아와 변수들에 저장.
            2. 로그인 상태가 아니면 로그인 페이지로 돌아간다.
-->

<?php // header.php
session_start();
require_once 'functions.php';

if (isset($_SESSION['userID'])) {
        echo "setted.";
} else {
    echo "fail.";
}
/*if (!isset($_SESSION['userID'])) {
    echo("<script>location.replace('index.php');</script>");
}*/
?>
