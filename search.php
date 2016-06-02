<!-- 
작성자 : 이호연
페이지 설명 : Serach page
-->
<?php // theme.php
// require_once 'header.php';
// if (!isset($_POST['date']) || !isset($_POST['place']))
//     echo("<script>location.replace('datepage.php');</script>");
// $_SESSION['date'] = $_POST['date'];
// $_SESSION['place'] = $_POST['place'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href='https://fonts.googleapis.com/css?family=Hind' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="static/css/style.css">
	<link rel="stylesheet" type="text/css" href="static/css/navbar_style.css">
	<link rel="stylesheet" type="text/css" href="static/css/dialog.css">
	<link rel="stylesheet" type="text/css" href="static/css/tourlist.css">
	<link rel="stylesheet" type="text/css" href="static/css/datebar.css">
	<link rel="stylesheet" type="text/css" href="static/css/tab.css">
</head>
<body>

	<?php
		require_once("navbar.inc");
		require_once("datebar.inc");
		require_once("tourlist.inc");
		require_once("tab.inc");
	?>

</body>
</html>