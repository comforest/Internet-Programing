<?php // theme.php
   require_once($_SERVER['DOCUMENT_ROOT'].'/include/loginTest.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Set theme | Travers</title>
	<link href='https://fonts.googleapis.com/css?family=Hind' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/static/css/style.css">
	<link rel="stylesheet" type="text/css" href="/static/css/theme_style2.css">
	<link rel="stylesheet" type="text/css" href="/static/css/progress.css">
    <script>
        function cilck_culture_theme() {
            document.getElementById("themeinfo").setAttribute('value', 'culture');
            document.getElementById("themeinfoForm").submit();
        }
        function cilck_shopping_theme() {
            document.getElementById("themeinfo").setAttribute('value', 'shopping');
            document.getElementById("themeinfoForm").submit();
        }
        function cilck_nature_theme() {
            document.getElementById("themeinfo").setAttribute('value', 'nature');
            document.getElementById("themeinfoForm").submit();
        }
        function cilck_trend_theme() {
            document.getElementById("themeinfo").setAttribute('value', 'trend');
            document.getElementById("themeinfoForm").submit();
        }
        function cilck_nothing_theme() {
            document.getElementById("themeinfo").setAttribute('value', 'nothing');
            document.getElementById("themeinfoForm").submit();
        }
    </script>
</head>
<body style="background-color: #f3f3f3;">
	<?php
		require_once '/include/navbar.inc';
	?>
    <form action="/set/date/" method="post" id="themeinfoForm">
            <input type="hidden" name="themeinfo" id="themeinfo" value="">
    </form>
    
    <div class = "progress-box">
    	<img src = "/static/image/theme_pro.png">
    </div>


	<div class="themebox">
		<div class="themeinner" onclick="cilck_culture_theme()">
            <div class="innerimage"><img src="/static/image/culture_theme.png"/></div>
			<div class="innercontent">
				<div> Culture </div>
				<p>
					Experience interesting local culture, history and beauty
				</p>
			</div>
		</div>
		<div class="themeinner" onclick="cilck_shopping_theme()">
			<div class="innerimage"><img id = "shopping_theme" src="/static/image/shopping_theme.png"/></div>
			<div class="innercontent">
				<div> Shopping </div>
				<p>
					Spend money and shop till you drop with the best deals
				</p>
			</div>
		</div>
		<div class="themeinner" onclick="cilck_nature_theme()">
			<div class="innerimage"><img id = "nature_theme" src="/static/image/nature_theme.png"/></div>
			<div class="innercontent">	
				<div> Nature </div>
				<p>
					Spend some quality time with the best of mother nature
				</p>
			</div>
		</div>
		<div class="themeinner" onclick="cilck_trend_theme()">
			<div class="innerimage"><img id = "trend_theme" src="/static/image/trend_theme.png"/></div>
			<div class="innercontent">
				<div> Trend </div>
				<p>
					Get wild and crazy by experiencing hot local trends
				</p>
			</div>
		</div>
	</div>
	<div class="themelower">
		<div> okay, cool </div>
		<!--div onclick="cilck_nothing_theme()"> nah, nevermind</div-->
	</div>
	<p onclick="cilck_nothing_theme()" id = "nevermind">nah, nevermind</p>
</body>
</html>