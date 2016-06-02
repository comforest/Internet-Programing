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
    </head>
    <body>
    	<?php
          require_once 'navbar.inc';
        ?>
		<div class="progress-box">
			<img src="/static/image/progress_theme_orange.png" style="width: 4%;">
			<img src="/static/image/progresslineorange.png" style="width: 10%; margin-bottom: 1.2%;">
			<img src="/static/image/progress_calendar_orange.png" style="width: 3.5%;">
			<img src="/static/image/progresslinegrey.png" style="width: 10%; margin-bottom: 1.2%;">
			<img src="/static/image/progress_accommodation_grey.png" style="width: 4.5%;">
		</div>
        <form action="search.php" method="post" id="datePlaceInfoForm">
        <div class = "datepage_space1">&nbsp </div>
		<div class = "datepage_word">from when?</div>
		<div class="datepage_space2">&nbsp </div>
		<div class = "datepage_word_desktop">till when?</div><br>
        <div class = "datepage_space1">&nbsp </div>
		<div class ="datepage_div">
			<input class="datepage_input" type="text" id="from">
        </div>
		<div class="datepage_space2">&nbsp </div>
		<div class = "datepage_word_mobile"><p style="font-size:1em;"></p>till when?<p style="font-size:1em;"></p></div>
		<div class ="datepage_div">
			<input class="datepage_input" type="text" id="to">
        </div><br>
        </form>
        
        <a href="#"><div class = "datepage_roundclick" onclick="clickLetsDoThis()">ok, next</div></a>
        <a href="#"><div class = "datepage_roundclick2" onclick="clickLetsDoThis()">back please</div></a>
    </body>
</html>


