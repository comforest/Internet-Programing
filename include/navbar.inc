<header>
	<script type="text/javascript">
		

		function logout_this_app() {
			FB.logout();
			location.replace('/');
		}
		function toggle_visibility(id) {
         var e = document.getElementById(id)
         if (e.style.display == 'block') {
            e.style.display = 'none';
         } else {
            e.style.display = 'block';
         }
      }
	</script>
	<script type="text/javascript" src="/static/js/loginFB.js"></script>
	<ul class = "nav">
		<li>
			<div class="navicon">
				<img src="/static/image/logo.png"/>
			</div>
		</li>
		<li><a href="/set/theme/index.php">Set</a></li>
		<li><a href="/attraction/index.php">Attraction</a></li>
		<li><a href="/plan/index.php">Plan</a></li>
		<li><a href="#" class="userinfoa">
			<div class="userinfo">
				<span onclick="toggle_visibility('logout');">
					<?php
						if (isset($_SESSION['userName'])) {
							echo $_SESSION['userName'];
						}
						else {
							echo 'No Name';
						}
					?>
				</span>
				<img src="/static/image/nature_theme.png"/>
				
			</div></a>
		</li>
	</ul>
	<div class="mobnav">
		<a href=""><div class="navblock">
			<div class="content">Set</div>
		</div></a>
		<a href=""><div class="navblock">
			<div class="content">Add</div>
		</div></a>
		<a href=""><div class="navblock">
			<div class="content">Plan</div>
		</div></a>
		<div class="navblock">
			<div class="content">
				<img src="/static/image/hamburger_nonactive.png" onclick="toggle_visibility('logout');" />
			</div>
		</div>
	</div>
	<div class="logout" id="logout" onclick="logout_this_app()">Log out</div>
</header>