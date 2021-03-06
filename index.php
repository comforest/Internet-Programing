<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'].'/include/functions.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/include/dbsetup.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Travers</title>
        <meta charset = "utf-8">
        <meta name = "viewport" content = "width-device, initial-scale = 1" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Hind' rel='stylesheet' type='text/css'>
        <link rel = "stylesheet" href = "/static/css/index_style.css">
        <link rel="stylesheet" type="text/css" href="https://ddo7jzca0m2vt.cloudfront.net/unify/css/plugins.css">
        <link rel="stylesheet" href="/static/css/font-awesome.min.css">
    </head>
    <body>
        <script type="text/javascript" src="/static/js/loginFB.js"></script>
        <form action="/include/adduser.php" method="post" id="userinfoForm">
            <input type="hidden" name="userinfo" id="userinfo" value="">
            <input type="hidden" name="userinfo2" id="userinfo2" value="">
        </form>
        <section class = "jumbotron">
            <div class = "container text-center">
                <nav class = "nav navbar-default">
                    <div class = "container-fluid">
                            <a class = "navbar-brand" href = "#"><img src = "static/image/logo_white.png" id = "logo_img" class = "img-responsive"/></a>
                        <ul class = "nav navbar-nav navbar-right pull-right about">
                            <li><a href = "/about/index.html"><p>About</p></a></li>
                        </ul>
                    </div>
                </nav>
                <div class = "main-text">
                    <h1>Traversify your trip</h1>
                    <p>Only three steps for an epic travel experience</p>
                    <fb:login-button scope="public_profile,email" onlogin="checkLoginState();" class="btn btn-default" id = "fb_login" data-max-rows="1" data-size="xlarge" data-show-faces="false" data-auto-logout-link="false">
                      <span><img src = "/static/image/fb.png" id = "fb"/></span>Login with facebook
                    </fb:login-button>
                </div>
            </div>
        </section>
        <section class = "container text-center" id = "set">
            <div class = "row" id = "theme_row">
                <div class = "col-sm-3 col-xs-6">
                    <div class = "thumbnail slideanim">
                        <img src = "/static/image/culture_theme.png">
                    </div>
                </div>
                <div class = "col-sm-3 col-xs-6">
                    <div class = "thumbnail slideanim">
                        <img src = "/static/image/shopping_theme.png">
                    </div>
                </div>
                <div class = "col-sm-3 col-xs-6">
                    <div class = "thumbnail slideanim">
                        <img src = "/static/image/nature_theme.png">
                    </div>
                </div>
                <div class = "col-sm-3 col-xs-6">
                    <div class = "thumbnail slideanim">
                        <img src = "/static/image/trend_theme.png">
                    </div>
                </div>
            </div>
            <br/><br/>
            <h1>Set</h1>
            <p>We know that every people seek different things when they travel.</p>
            <p>So we let you set the theme for your adventure.</p>
        </section>
        <section class = "container" id = "add">
            <h1>Attraction</h1>
            <p>We give you a list of interesting places.<br/>Then you add those that you like.<br/>Yup, it's that simple.</p>
            <img src = "static/image/clipone.png" class = "img-responsive slideanim" alt = "Responsive image" id = "clip1">
            <img src = "static/image/cliptwo.png" class = "img-responsive slideanim" alt = "Responsive image" id = "clip2">
        </section>
        <section class = "container text-center" id = "plan">
            <h1>Plan</h1>
            <p>Then we plan your trip from the places you've added.<br/>So that you don't have to.</p>
            <div class = "row">
                <div class = "col-sm-2 col-sm-offset-1 col-xs-12">
                    <img src = "/static/image/round1.png" class = "img-responsive slideanim" alt = "Responsive image" id = "round1">
                </div>
                <div class = "col-sm-2 col-xs-12">
                    <img src = "/static/image/walk.png" class = "img-responsive slideanim" alt = "Responsive image" id = "walk_icon">
                </div>
                <div class = "col-sm-2 col-xs-12">
                    <img src = "/static/image/round2.png" class = "img-responsive slideanim" alt = "Responsive image" id = "round2">
                </div>
                <div class = "col-sm-2 col-xs-12">
                    <img src = "/static/image/subway.png" class = "img-responsive slideanim" alt = "Responsive image" id = "subway_icon">
                </div>
                <div class = "col-sm-2 col-xs-12">
                    <img src = "/static/image/round3.png" class = "img-responsive slideanim" alt = "Responsive image" id = "round3">
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
