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

$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
echo "this is " . __FILE__ . ": " . __LINE__;

function createTable($name, $query) {
    echo __FILE__ .": " . __LINE__ . "in createTable()";
    $sql = "CREATE TABLE IF NOT EXISTS $name ( $query )";
    if ($conn->query($sql) === TRUE) {
        echo "Table $name created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
        die("테이블 생성 실패" . mysqli_error($connect));
    }
    //queryMysql("CREATE TABLE IF NOT EXISTS $name($query)") or die("테이블 생성 실패" . mysqli_error($connect));
    echo "Table '$name' created or already exists.<br />";
    echo "this is " . __FILE__ . ": " . __FUNCTION__ . "OK.";
}

function queryMysql($query) {
    if (mysqli_connect_errno()) {
        die("!!쿼리를 하고 싶으나 서버 연결 안 됨!!" . mysqli_connect_error());
    }
    $result = mysqli_query($connect, $query) or die("쿼리 실패: $query". mysqli_error($connect));
    echo "this is " . __FILE__ . ": " . __FUNCTION__ . "OK.";
    return $result;
}

function destroySession() {
    $_SESSION=array();
    
    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
    echo "this is " . __FILE__ . ": " . __FUNCTION__ . "OK.";
}

function sanitizeString($var) {
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    echo "this is " . __FILE__ . ": " . __FUNCTION__ . "OK.";
    return mysqli_real_escape_string($server, $var);
}


?>
