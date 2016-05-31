<!-- 
작성자 : 김기현
페이지 설명 : 날짜 및 숙박 검색
필요한 css : datepage.css
 -->
<?php // theme.php
require_once 'header.php';
$_SESSION['theme'] = $_POST['themeinfo'];
?>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Date Page</title>
        <link href='https://fonts.googleapis.com/css?family=Hind' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="stylesheet" type="text/css" href="static/css/datepage.css">
        <style type = "text/css">
        a{text-decoration:none}
        </style>
        <script>
            function clickLetsDoThis() {
                document.getElementById('datePlaceInfoForm').submit();
            }
        </script>
    </head>
    <body>
        <br><br>
        <a href="theme.php"><div class = "datapage_back">&lt; back </div></a><br>
        
        <form action="???.php" method="post" id="datePlaceInfoForm">
        <p style= "text-align: center;">When is your trip?</p>
            <div class ="datepage_div">
                <a href="#"><img src="static/image/calendar_grey.png"></a>
                <input type="text" name = "date">
            </div><br>
            <p style= "text-align: center">Where will you stay?</p>
            <div class = "datepage_div">
                <a href="#"><img src="static/image/accomodation_grey.png"></a>
                <input type="text" name="place">
            </div><br>
        </form>
        <a href="#"><div class = "datepage_roundclick" onclick="clickLetsDoThis()">let's do this</div></a>
    </body>
	<footer>
	</footer>
</html>


