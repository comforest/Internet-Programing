<?php // header.php
session_start();
echo __FILE__ .": " . __LINE__;
require_once 'functions.php';
require_once 'dbsetup.php';
echo "this is " . __FILE__ . ": " . __LINE__ . "OK.";
if (isset($_SESSION['user'])) {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = " ($user)";
}
else $loggedin = FALSE; 
echo "this is " . __FILE__ . ": " . __LINE__ . "OK.";
?>

<!DOCTYPE html>

<html>

	<head>
		<title>Travers :: Login</title>
		<meta charset = "utf-8">
		<meta name = "viewport" content = "width-device, initial-scale = 1" >
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link href='https://fonts.googleapis.com/css?family=Hind' rel='stylesheet' type='text/css'>
		<link rel = "stylesheet" href = "static/css/index_style.css">
		<link rel="stylesheet" type="text/css" href="https://ddo7jzca0m2vt.cloudfront.net/unify/css/plugins.css">
		<link rel="stylesheet" href="static/css/font-awesome.min.css">
	</head>

	<body>
		<script>
            // This is called with the results from from FB.getLoginStatus().
            function statusChangeCallback(response) {
                console.log('statusChangeCallback');
                console.log(response);
                // The response object is returned with a status field that lets the
                // app know the current login status of the person.
                // Full docs on the response object can be found in the documentation
                // for FB.getLoginStatus().
                if (response.status === 'connected') {
                    // Logged into your app and Facebook.
                    testAPI();
                    var userID = "";
                    var userName = "";
                    FB.api('/me', function(response) {
                        userID = response.id;
                        userName = response.name;
                    });
                    params = "user=" + userID + "%userName=" + userName;
                    request = new ajaxRequest();
                    request.open("POST", "adduser.php", true);
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    request.setRequestHeader("Content-length", params.length);
                    request.setRequestHeader("Connection", "close");

                    request.onreadystatechange = function() {
                        if (this.readyState == 4)
                            if (this.status == 200)
                                if (this.responseText != null)
                                    document.getElementById('status').innerHTML = this.responseText;
                    }
                    request.send(params);
                    location.replace('theme.php');
                    
                } else if (response.status === 'not_authorized') {
                    // The person is logged into Facebook, but not your app.
                    document.getElementById('status').innerHTML = 'Please log ' +
                    'into this app.';
                } else {
                    // The person is not logged into Facebook, so we're not sure if
                    // they are logged into this app or not.
                    document.getElementById('status').innerHTML = 'Please log ' +
                    'into Facebook.';
                }
            }

            // This function is called when someone finishes with the Login
            // Button.  See the onlogin handler attached to it in the sample
            // code below.
            function checkLoginState() {
                FB.getLoginStatus(function(response) {
                    statusChangeCallback(response);
                });
            }

            window.fbAsyncInit = function() {
                FB.init({
                    appId      : '242716299430774',
                    cookie     : true,  // enable cookies to allow the server to access 
                                        // the session
                    xfbml      : true,  // parse social plugins on this page
                    version    : 'v2.2' // use version 2.2
                });

            // Now that we've initialized the JavaScript SDK, we call 
            // FB.getLoginStatus().  This function gets the state of the
            // person visiting this page and can return one of three states to
            // the callback you provide.  They can be:
            //
            // 1. Logged into your app ('connected')
            // 2. Logged into Facebook, but not your app ('not_authorized')
            // 3. Not logged into Facebook and can't tell if they are logged into
            //    your app or not.
            //
            // These three cases are handled in the callback function.

                FB.getLoginStatus(function(response) {
                    statusChangeCallback(response);
                });

            };

            // Load the SDK asynchronously
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

            // Here we run a very simple test of the Graph API after login is
            // successful.  See statusChangeCallback() for when this call is made.
            function testAPI() {
                console.log('Welcome!  Fetching your information.... ');
                FB.api('/me', function(response) {
                    console.log('Successful login for: ' + response.name);
                    document.getElementById('status').innerHTML =
                    'Thanks for logging in, ' + response.id + '!';
                });
            }
            function ajaxRequest() {
                try { var request = new XMLHttpRequest() }
                catch(e1) {
                    try { request = new ActiveXObject("Msxml2.XMLHTTP"); }
                    catch(e2) {
                        try { request = new ActiveXObject("Microsoft.XMLHTTP"); }
                        catch(e3) {
                            request = false;
                }   }   }
                return request;
            }
        </script>
		<section class = "jumbotron">
			<div class = "container text-center">

				<nav class = "nav navbar-default">
					<div class = "container-fluid">
						<div class = "navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
        					<span class="sr-only">Toggle navigation</span>
        					<span class="icon-bar"></span>
        					<span class="icon-bar"></span>
        					<span class="icon-bar"></span>
      						</button>
							<a class = "navbar-brand" href = "#"><img src = "static/image/logo_white.png" id = "logo_img" class = "img-responsive"/></a>
						</div>
						<div class="collapse navbar-collapse" id=".navbar-collapse">
						<ul class = "nav navbar-nav navbar-right">
							<li><a href = "#"><p>About</p></a></li>
						</ul>
						</div>
					</div>
				</nav>

				<div class = "main-text">
					<h1>Travel traversly</h1>
					<p>Only three steps for an epic travel experience</p>
                    <fb:login-button scope="public_profile,email" onlogin="checkLoginState();" class="btn btn-default" id = "fb_login" data-max-rows="1" data-size="xlarge" data-show-faces="false" data-auto-logout-link="false">
				      <span><img src = "static/image/fb.png" id = "fb"/></span>Login with facebook
				    </fb:login-button>
				</div>
			</div>
		</section>

		<section class = "container text-center" id = "set">
			<div class = "row" id = "theme_row">
				<div class = "col-sm-3 col-xs-6">
					<div class = "thumbnail slideanim">
						<img src = "static/image/culture_theme.png">
					</div>
				</div>
				<div class = "col-sm-3 col-xs-6">
					<div class = "thumbnail slideanim">
						<img src = "static/image/shopping_theme.png">
					</div>
				</div>
				<div class = "col-sm-3 col-xs-6">
					<div class = "thumbnail slideanim">
						<img src = "static/image/nature_theme.png">
					</div>
				</div>
				<div class = "col-sm-3 col-xs-6">
					<div class = "thumbnail slideanim">
						<img src = "static/image/trend_theme.png">
					</div>
				</div>
			</div>

			<br/><br/>
			<h1>Set</h1>
			<p>We know that every people seek different things when they travel.</p>
			<p>So we let you set the theme for your adventure.</p>
		</section>

		<section class = "container" id = "add">
			<h1>Add</h1>
			<p>We give you a list of interesting places.<br/>Then you add those that you like.<br/>Yup, it's that simple.</p>
			<img src = "static/image/clipone.png" class = "img-responsive slideanim" alt = "Responsive image" id = "clip1">
			<img src = "static/image/cliptwo.png" class = "img-responsive slideanim" alt = "Responsive image" id = "clip2">
		</section>

		<section class = "container text-center" id = "plan">
			<h1>Plan</h1>
			<p>Then we plan your trip from the places you've added.<br/>So that you don't have to.</p>
			<div class "row">
				<div class = "col-sm-2 col-sm-offset-1 col-xs-12">
					<img src = "static/image/round1.png" class = "img-responsive slideanim" alt = "Responsive image" id = "round1">
				</div>
				<div class = "col-sm-2 col-xs-12">
					<img src = "static/image/walk.png" class = "img-responsive slideanim" alt = "Responsive image" id = "walk_icon">
				</div>
				<div class = "col-sm-2 col-xs-12">
					<img src = "static/image/round2.png" class = "img-responsive slideanim" alt = "Responsive image" id = "round2">
				</div>
				<div class = "col-sm-2 col-xs-12">
					<img src = "static/image/subway.png" class = "img-responsive slideanim" alt = "Responsive image" id = "subway_icon">
				</div>
				<div class = "col-sm-2 col-xs-12">
					<img src = "static/image/round3.png" class = "img-responsive slideanim" alt = "Responsive image" id = "round3">
				</div>
			</div>
		</section>

		<footer>
			<div class = "container text-center">
				<a href="#top" title="To Top">
	    			<span class="glyphicon glyphicon-chevron-up" id = "arrow_top"></span>
	  			</a>
				<p> &copy; Travers, 2016</p>
			</div>
		</footer>



		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://ddo7jzca0m2vt.cloudfront.net/unify/plugins/back-to-top.js"></script>
 <script>
  			
 $(document).ready(function(){
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})


 </script>

	</body>

</html>