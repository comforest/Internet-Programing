<!-- 
작성자 : 김기현
페이지 설명 : 날짜 및 숙박 검색
필요한 css : datepage.css
 -->
<?php // datepage.php
/*require_once 'header.php';
if (!isset($_POST['themeinfo']))
    echo("<script>location.replace('theme.php');</script>");
$_SESSION['theme'] = $_POST['themeinfo'];
*/?>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Date Page</title>
        <link href='https://fonts.googleapis.com/css?family=Hind' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="stylesheet" type="text/css" href="static/css/datepage.css">
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" media="all" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
		<script src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js" type="text/javascript"></script>
		<script>
		$(function() {
		  var dates = $( "#from, #to " ).datepicker({
		  dateFormat: 'yy-mm-dd',
		  showMonthAfterYear: true,
		maxDate:'+360d',
		  onSelect: function( selectedDate ) {
			var option = this.id == "from" ? "minDate" : "maxDate",
			  instance = $( this ).data( "datepicker" ),
			  date = $.datepicker.parseDate(
				instance.settings.dateFormat ||
				$.datepicker._defaults.dateFormat,
				selectedDate, instance.settings );
			dates.not( this ).datepicker( "option", option, date );
		  }
		  });
		});
		</script>
        <style type = "text/css">
        a{text-decoration:none}
        </style>
        <script>
            function clickLetsDoThis() {
                if (document.getElementById('date').value == "") {
                    // 경고 메시지 출력 : 디자인이 필요함.
                    console.log("date 없음");
                } else  {
                    document.getElementById('datePlaceInfoForm').submit();
                }
            }
        </script>
    
        <style>
        </style>
    </head>
    <body>
        <br><br>
        
        <!--<form action="search.php" method="post" id="datePlaceInfoForm" style="display: block">
        <p style= "text-align: center;">When is your trip?</p>
            <div class ="datepage_div">
                <a href="#"><img class="image_div" src="static/image/calendar_grey.png"></a>
				<input class="mobile_size" type="text" id="from">
            </div><br>
        </form>-->

        
        <a href="#"><div class = "datepage_roundclick" onclick="clickLetsDoThis()">let's do this</div></a>
    </body>
	<footer>
	</footer>
</html>


