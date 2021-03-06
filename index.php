<?php
session_start();
$_SESSION['login'] = $_SESSION['email']; 
$_SESSION['pw'] = $_SESSION['pw'];
$_SESSION['loggedin'] = false;
$_SESSION['website']= "index.php";

if(!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	$_SESSION['check'] = false;
}else{
	$_SESSION['loggedin'] = true;
}


?>
<!DOCTYPE HTML>
<!--
	Telephasic by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>CookEZ</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body class="homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<div id="header" class="container">

						<!-- Logo -->
							<h1 id="logo"><a href="index.php">Home</a></h1>

						<!-- Nav -->
						
							<nav id="nav">
								<?php if($_SESSION['loggedin'] === true) { ?>
									<a href="logout.php"><button name="logout" type = "button" style="position:absolute; left:92%; top:15px; background-color:white; font-family: 'Source Sans Pro', sans-serif;">Logout</button></a>
								<?php } ?>
								<ul>
										<!--
										<a href="#">Menu</a>
										<ul>
											<li><a href="#">Lorem ipsum dolor</a></li>
											<li><a href="#">Magna phasellus</a></li>
											<li><a href="#">Etiam dolore nisl</a></li>
											<li>
												<a href="#">Phasellus consequat</a>
												<ul>
													<li><a href="#">Lorem ipsum dolor</a></li>
													<li><a href="#">Phasellus consequat</a></li>
													<li><a href="#">Magna phasellus</a></li>
													<li><a href="#">Etiam dolore nisl</a></li>
												</ul>
											</li>
											<li><a href="#">Veroeros feugiat</a></li>
										</ul>
									</li>
									-->
									<li><a href="about.php">About Us</a></li>
									<li> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </li>
									<!-- ^^ Note: This is here to make headings lined correctly; delete when we uncomment other li -->
									<!-- <li class="break"><a href="right-sidebar.html">Products</a></li> -->
									<!-- a href="left-sidebar.html" -> getting rid of sign up link for now -->
									<?php if($_SESSION['loggedin'] == true) { ?>
										<li><a href="members.php">Members</a></li>
									<?php }else{ ?>
										<li><a href="login.php">Sign in</a></li>
									<?php } ?>
								</ul>
							</nav>

					</div>

					<!-- Hero -->
						<section id="hero" class="container">
							<header>
								<h2> CookEZ </h2>
							</header>
							<p> You can cook, too! </p>
							<!-- In the future, can make this a link to the products page;; commented for now
							<ul class="actions">
								<li><a href="#" class="button">Get this party started</a></li>
							</ul>
						-->
						</section>

				</div>

			<!-- Features 1 -->
				<div class="wrapper">
					<div class="container">
						<div class="row">
							<section class="6u 12u(narrower) feature">
								<div class="image-wrapper first">
									<a href="#" class="image featured first"><img src="images/computer.png" alt="" width="100" height="250" /></a>
								</div>
								<header>
									<h2> You Order. </h2>
								</header>
								<p>Use our simple product page to choose what meal you would like to eat.  We change our meal menu weekly and try our best to create a variety of different foods to add each time.</p>
								<!--
								<ul class="actions">
									<li><a href="#" class="button">Elevate my awareness</a></li>
								</ul>
							-->
							</section>
							<section class="6u 12u(narrower) feature">
								<div class="image-wrapper">
									<a href="#" class="image featured"><img src="images/deliver.png" alt="" width="100" height="250" /></a>
								</div>
								<header>
									<h2> We Deliver. </h2>
								</header>
								<p>As soon as you order your meal, our company will deliver the food you want within thirty minutes.  If we don't arrive in time, you get your money back!  You'll order your food and be able to eat it in an hour.</p>
								<!--
								<ul class="actions">
									<li><a href="#" class="button">Elevate my awareness</a></li>
								</ul>
							-->
							</section>
						</div>
					</div>
				</div>

			<!-- Promo (Commenting out for now) 
							<div id="promo-wrapper">
					<section id="promo">
						<h2>Neque semper magna et lorem ipsum adipiscing</h2>
						<a href="#" class="button">Breach the thresholds</a>
					</section>
				</div>
				-->


			<!-- Features 2 -->
				<div class="wrapper">
					<section class="container">
						<header class="major">
							<h2>Our Values</h2>
						</header>
						<div class="row features">
							<section class="4u 24u(narrower) feature">
								<div class="image-wrapper first">
									<a href="#" class="image featured"><img src="images/heart.png" height=189px alt="" /></a>
								</div>
								<p><strong>We value people’s health.</strong></p>
								<p>People want to eat healthy meals, but don’t have the time to prep because of their daily busy schedule. No need to miss out! We are here to provide this fast and quick service.</p>
							</section>
							<section class="4u 24u(narrower) feature">
								<div class="image-wrapper">
									<a href="#" class="image featured"><img src="images/clock.gif" height=200px alt="" /></a>
								</div>
								<p><strong>We value people’s time.</strong></p> 
								<p>Not only do we provide a meal that is simple, but we also provide fresh ingredients that are washed, prepped, and ready to be cooked when it is time to eat!</p>
							</section>
							<section class="4u 24u(narrower) feature">
								<div class="image-wrapper">
									<a href="#" class="image featured"><img src="images/basket-of-vegetables.png" height=189px width=200px alt="" /></a>
								</div>
								<p><strong>We value our products.</strong></p>
								<p>We inspect and make sure our ingredients are nutritious and fresh in order to always serve you with high quality products.</p>
							</section>
						</div>
						<!--
						<ul class="actions major">
							<li><a href="#" class="button">Elevate my awareness</a></li>
						</ul>
					-->
					</section>
				</div>

			<!-- Footer -->
				<div id="footer-wrapper">
					<div id="footer" class="container">
						<header class="major">
							<h2>Give us feedback!</h2>
							<p>Feel free to leave us a message here! We'll reply as fast as we can!</p>
						</header>
						<div class="row">
							<section class="6u 12u(narrower)">
								<form method="post" action="#">
									<div class="row 50%">
										<div class="6u 12u(mobile)">
											<input name="name" placeholder="Name" type="text" />
										</div>
										<div class="6u 12u(mobile)">
											<input name="email" placeholder="Email" type="text" />
										</div>
									</div>
									<div class="row 50%">
										<div class="12u">
											<textarea name="message" placeholder="Message"></textarea>
										</div>
									</div>
									<div class="row 50%">
										<div class="12u">
											<ul class="actions">
												<li><input type="submit" value="Send Message" /></li>
												<li><input type="reset" value="Clear form" /></li>
											</ul>
										</div>
									</div>
								</form>
							</section>
							<!-- Icons for social media;; commented out for now
							<section class="6u 12u(narrower)">
								<div class="row 0%">
									<ul class="divided icons 6u 12u(mobile)">
										<li class="icon fa-twitter"><a href="#"><span class="extra">twitter.com/</span>untitled</a></li>
										<li class="icon fa-facebook"><a href="#"><span class="extra">facebook.com/</span>untitled</a></li>
										<li class="icon fa-dribbble"><a href="#"><span class="extra">dribbble.com/</span>untitled</a></li>
									</ul>
									<ul class="divided icons 6u 12u(mobile)">
										<li class="icon fa-instagram"><a href="#"><span class="extra">instagram.com/</span>untitled</a></li>
										<li class="icon fa-youtube"><a href="#"><span class="extra">youtube.com/</span>untitled</a></li>
										<li class="icon fa-pinterest"><a href="#"><span class="extra">pinterest.com/</span>untitled</a></li>
									</ul>
								</div>
							</section>
						-->
						</div>
					</div>
					<div id="copyright" class="container">
						<ul class="menu">
							<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</div>
				</div>

		</div>

		<!-- Scripts -->

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>