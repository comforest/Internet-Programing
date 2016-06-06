<!-- 
작성자 : 김기현
페이지 설명 : 날짜 및 숙박 검색
필요한 css : datepage.css
 -->
<?php // datepage.php

require_once($_SERVER['DOCUMENT_ROOT'].'/include/loginTest.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/include/themeTest.php');

?>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Set date | Travers</title>
        <link href='https://fonts.googleapis.com/css?family=Hind' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="/static/css/style.css">
        <link rel="stylesheet" type="text/css" href="/static/css/datepage.css">
        <link rel="stylesheet" type="text/css" href="/static/css/progress.css">
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="/static/css/navbar_style.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
		<script src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js" type="text/javascript"></script>
		<script>
		$(function() {
            var dates = $( "#dateStartinfo, #dateEndinfo " ).datepicker({
                dateFormat: 'yy-mm-dd',
                showMonthAfterYear: true,
                maxDate:'+360d',
                onSelect: function( selectedDate ) {
                    var option = this.id == "dateStartinfo" ? "minDate" : "maxDate",
                    instance = $( this ).data( "datepicker" ),
                    date = $.datepicker.parseDate(
                    instance.settings.dateFormat ||
                    $.datepicker._defaults.dateFormat,
                    selectedDate, instance.settings );
                    dates.not( this ).datepicker( "option", option, date );
                }
            });
		});
        
        function cilck_okay_next() {
            if (document.getElementById('dateStartinfo').value == "" || document.getElementById('dateEndinfo').value == "") {
                    console.log("날짜를 입력해주세요 경고 띄우기");
            } else {
                console.log(document.getElementById('dateStartinfo').value);
                document.getElementById("dateinfoForm").submit();
            }
        }

        function cilck_back_please() {
            location.replace('/set/theme/');
        }

		</script>
        <style type = "text/css">
            a {
                text-decoration:none;
            }
        </style>
    </head>
    <body>
    	<?php
            require_once($_SERVER['DOCUMENT_ROOT'].'/include/navbar.inc');
        ?>
        <div class = "progress-box">
    		<img src = "/static/image/date_pro.png">
    	</div>
        <form action="/set/hotel/" method="post" id="dateinfoForm">
            <div class = "datepage_space1">&nbsp; </div>
            <div class = "datepage_word">from when?</div>
            <div class="datepage_space2">&nbsp;</div>
            <div class = "datepage_word_desktop">till when?</div><br>
            <div class = "datepage_space1">&nbsp; </div>
            <div class ="datepage_div">
                <input class="datepage_input" type="text" name = "dateStartinfo" id = "dateStartinfo" value = "">
            </div>
            <div class="datepage_space2">&nbsp; </div>
            <div class = "datepage_word_mobile"><p style="font-size:1em;"></p>till when?<p style="font-size:1em;"></p></div>
            <div class ="datepage_div">
                <input class="datepage_input" type="text" name="dateEndinfo" id = "dateEndinfo" value = "">
            </div><br>
        </form>
        <div class = "datepage_roundclick" onclick="cilck_okay_next()">ok, next</div>
        <div class = "datepage_roundclick2" onclick="cilck_back_please()">back please</div>
    </body>
</html>


