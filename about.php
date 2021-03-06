<?php
session_start();
$_SESSION['login'] = $_SESSION['email']; 
$_SESSION['pw'] = $_SESSION['pw'];
$_SESSION['loggedin'] = false;
$_SESSION['website']= "about.php";

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
		<title>About Us</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<div id="header" class="container">

						<!-- Logo -->
							<h1 id="logo"><a href="index.php">Home</a></h1>

						<!-- Nav -->
							<nav id="nav">
								<?php if($_SESSION['loggedin'] === true) { ?>
									<form method="post" action="about.php">
										<a href="logout.php"><button name="logout" type = "button" style="position:absolute; left:92%; top:15px; background-color:white; font-family: 'Source Sans Pro', sans-serif;">Logout</button></a>
									</form>
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
									<?php if($_SESSION['loggedin'] === true) { ?>
									<li><a href="members.php">Members</a></li>
									<?php } else { ?>  										
									<li><a href="login.php">Sign in</a></li>
									<?php }?>
								</ul>
							</nav>

					</div>
				</div>

			<!-- Main -->
				<div class="wrapper">
					<div class="container" id="main">

						<!-- Content -->
							<article id="content">
								<header>
									<h2>About Us</h2>
								</header>
								<!-- Originally 3 paragraphs using <p>; commented out b/c unnecessary for us as of now -->
							</article>

						<div class="row features">
							<section class="3u 12u(narrower) feature">
								<div class="image-wrapper first">
									<a href="#" class="image featured"><img src="images/Cook.jpg" alt="" /></a>
								</div>
								<header>
									<h3>What do we do?</h3>
								</header>
								<p>At CookEZ, we provide our customers with the resources they need in order to cook fast and easy meals.  Customers can easily order simple meals of their choice from our website.  Then, we will deliver the ingredients within 30 minutes. Overall, our main goal here is to guide you so that you can cook, too.</p>
								<!-- <ul class="actions">
									<li><a href="#" class="button">Elevate my awareness</a></li>
								</ul> -->
							</section>
							<section class="3u 12u(narrower) feature">
								<div class="image-wrapper">
									<a href="#" class="image featured"><img src="images/benefit.jpg" alt="" /></a>
								</div>
								<header>
									<h3>How do we benefit people?</h3>
								</header>
								<p>We want you to become healthier and more time efficient! In addition, we give 5% of our profit to charity, and any remaining ingredients are also donated!</p>
								<!-- <ul class="actions">
									<li><a href="#" class="button">Elevate my awareness</a></li>
								</ul> -->
							</section>
							<section class="3u 12u(narrower) feature">
								<div class="image-wrapper">
									<a href="#" class="image featured"><img src="images/value.jpg" alt="" /></a>
								</div>
								<header>
									<h3>What are our values?</h3>
								</header>
								<p>We value people's health, time, and our products. We want to provide a fresh, simple, and healthy meals to those who don't have time due to their daily busy schedules. </p>
								<!-- <ul class="actions">
									<li><a href="#" class="button">Elevate my awareness</a></li>
								</ul> -->
							</section>
							<section class="3u 12u(narrower) feature">
								<div class="image-wrapper">
									<a href="#" class="image featured"><img src="images/prep.jpg" alt="" /></a>
								</div>
								<header>
									<h3>What does our slogan mean?</h3>
								</header>
								<p>Don’t think you can cook? We believe that no matter who you are, if you have the necessary ingredients, tools, and instructions, you can make tasty, healthy, and easy meals quickly so that cooking doesn’t have to be another source of stress. </p>
								<!-- <ul class="actions">
									<li><a href="#" class="button">Elevate my awareness</a></li>
								</ul> -->
							</section>
						</div>

					</div>
						<?php if($_SESSION['loggedin'] === false) { ?>
								<div class="actions" >
									<a href="signup.php" class="button signup_button">Sign Up Now!</a>
								</div>
						<?php } ?>
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