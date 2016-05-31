<?php // theme.php
    require_once 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>thema page</title>
	<link href='https://fonts.googleapis.com/css?family=Hind' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="static/css/style.css">
	<link rel="stylesheet" type="text/css" href="static/css/theme_style.css">
    <script>
        document.getElementById("culture_theme")
            .onclick("function() {
                document.getElementById("themeinfo").setAttribute('value', 'culture');
                document.getElementById("themeinfoForm").submit();
        }");
        document.getElementById("shopping_theme")
            .onclick("function() {
                document.getElementById("themeinfo").setAttribute('value', 'shopping');
                document.getElementById("themeinfoForm").submit();
        }");
        document.getElementById("nature_theme")
            .onclick("function() {
                document.getElementById("themeinfo").setAttribute('value', 'nature');
                document.getElementById("themeinfoForm").submit();
        }");
        document.getElementById("trend_theme")
            .onclick("function() {
                document.getElementById("themeinfo").setAttribute('value', 'trend');
                document.getElementById("themeinfoForm").submit();
        }");
    </script>
</head>
<body style="background-color: #f3f3f3;">
    <form action="datepage.php" method="post" id="themeinfoForm">
            <input type="hidden" name="userinfo" id="themeinfo" value="">
    </form>
	<div class="themeupper">Set the theme for your travel</div>
	<div class="themebox">
		<div class="themeinner">
            <div class="innerimage"><img id = "culture_theme" src="static/image/culture_theme.png"/></div>
			<div class="innercontent">
				<div> Culture </div>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit
				</p>
			</div>
		</div>
		<div class="themeinner">
			<div class="innerimage"><img id = "shopping_theme" src="static/image/shopping_theme.png"/></div>
			<div class="innercontent">
				<div> Shopping </div>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit
				</p>
			</div>
		</div>
		<div class="themeinner">
			<div class="innerimage"><img id = "nature_theme" src="static/image/nature_theme.png"/></div>
			<div class="innercontent">	
				<div> Nature </div>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit
				</p>
			</div>
		</div>
		<div class="themeinner">
			<div class="innerimage"><img id = "trend_theme" src="static/image/trend_theme.png"/></div>
			<div class="innercontent">
				<div> Trend </div>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit
				</p>
			</div>
		</div>
	</div>
	<div class="themelower">
		<div> okay, cool </div>
		<div> nah, nevermind</div>
	</div>
</body>
</html>