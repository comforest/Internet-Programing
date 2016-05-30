<?php
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
$query = "CREATE TABLE user(userID INT UNSIGNED PRIMARY KEY,
            userName VARCHAR(30),
            INDEX(userName(6)))";
mysqli_query($connect, $query) or die("쿼리 실패: $query". mysqli_error($connect));
mysqli_close($connect);
?>