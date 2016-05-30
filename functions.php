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
echo "this is " . __FILE__ . ": " . __LINE__;
$server = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);// or die(mysqli_error());
echo "this is " . __FILE__ . ": " . __LINE__;
mysqli_select_db($server, $dbname);// or die(mysqli_error());
echo "this is " . __FILE__ . ": " . __LINE__;

function createTable($name, $query) {
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br />";
    echo "this is " . __FILE__ . ": " . __FUNCTION__ . "OK.";
}

function queryMysql($query) {
    $result = mysqli_query($server, $query);// or die(mysqli_error());
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
