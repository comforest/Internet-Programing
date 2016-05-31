<!-- 
작성자 : 성수아
페이지 설명 : php 페이지에서 쓰이는 함수들이 있다.
            header.php가 이 파일을 include하고 있으므로 따로 include 할 필요는 없다.
-->
<?php // functions.php
$dbhost  = 'localhost';
$dbname  = 'travers';
$dbuser  = 'traversapp';
$dbpass  = 'haveagoodtrip';
$appname = "Travers";

echo "check in functions.php";
$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

function createTable($connect, $name, $query) {
    queryMysql($connect, "CREATE TABLE IF NOT EXISTS $name($query)") or die("테이블 생성 실패" . mysqli_error($connect));
}

function queryMysql($connect, $query) {
    if (!$connect) {
        die("!!쿼리를 하고 싶으나 서버 연결 안 됨!!" . mysqli_connect_error());
    }
    $result = mysqli_query($connect, $query, MYSQLI_USE_RESULT) or die("쿼리 실패: $query". mysqli_error($connect));
    return $result;
}

function destroySession() {
    $_SESSION=array();
    
    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
}

function sanitizeString($var) { // 에러 있음. 쓰려면 고쳐야 함!!
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return mysqli_real_escape_string($server, $var);
}


?>
