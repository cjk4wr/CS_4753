<!-- Database input --> 
<?php

	$db = new mysqli('localhost', 'root', '', 'ecomm');
	if ($db->connect_error):
		die ("Could not connect to db: " . $db->connect_error);
	endif;

	$q = 'select 1 from `userinfo` LIMIT 1';
	$val = $db->query($q);

	if($val !== FALSE) {

		if ($_SERVER["REQUEST_METHOD"] == "POST") {	
    		$email = $_POST["email"];
    		$pass = $_POST["pw"];
    		$name = $_POST["firstname"]. " " . $_POST["lastname"];
    		$address = $_POST["address"] . ", " . $_POST["city"] . ", " . $_POST["state"] . ", " . $_POST["zipcode"];
    		$phone = $_POST["phoneOne"] . $_POST["phoneTwo"] . $_POST["phoneThree"];

    		$query = $db->query("insert into userinfo (email, password, name, address, phone) VALUES ('$email', '$pass', '$name', '$address', '$phone')") or die ("Invalid: " . $db->error);
 		}
	} else {

	$db->query("drop table userinfo");


	$result = $db->query("create table userinfo (email varchar(255) primary key not null, password varchar(255) not null, name varchar(255) not null, address varchar(255) not null, phone int(20) not null)") or die ("Invalid: " . $db->error);

}

	$card = 'select 1 from `cardinfo` LIMIT 1';
	$val2 = $db->query($card);

	if($val2 !== FALSE) {

		if ($_SERVER["REQUEST_METHOD"] == "POST") {	
			$email = $_POST["email"];
			$card = $_POST["ccOne"] . $_POST["ccTwo"] . $_POST["ccThree"] . $_POST["ccFour"];
			$expire = $_POST["date1"] . "/" . $_POST["date2"];
			$cvv = $_POST["CVVcode"];

			$cardquery = $db->query("insert into cardinfo (email, cardnum, expiration, cvv) VALUES ('$email', '$card', '$expire', '$cvv')") or die ("Invalid: " . $db->error);
		}

	} else {

	$db->query("drop table cardinfo");

	echo "failed";

	$result = $db->query("create table cardinfo (email varchar(255), cardnum varchar(16), expiration varchar(255), cvv varchar(3), FOREIGN KEY (email) REFERENCES userinfo(email) ON DELETE CASCADE)") or die ("Invalid: " . $db->error);

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
		<title> Transaction </title>
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
							<h1 id="logo"><a href="index.html">Home</a></h1>

						<!-- Nav -->
							<nav id="nav">
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
									<li><a href="no-sidebar.html">About Us</a></li>
									<li> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </li>
									<!-- ^^ Note: This is here to make headings lined correctly; delete when we uncomment other li -->
									<!-- <li class="break"><a href="right-sidebar.html">Products</a></li> -->
									<!-- a href="left-sidebar.html" -> getting rid of sign up link for now -->
									<li><a href="transaction.php"> &nbsp; &emsp; Subscriptions</a></li>
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
									  	<h3 align="center"><strong> Congratulations! You are now a user! Feel free to browse our website! <strong></h3> <br>
								</header>
								<!-- Originally 3 paragraphs using <p>; commented out b/c unnecessary for us as of now -->
							</article>
					</div>
							<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
							<input type="hidden" name="cmd" value="_s-xclick">
							<table>
								<tr><td><input type="hidden" name="on0" value="Subscriptions">Meal Subscriptions</td></tr><tr><td><select name="os0">
									<option value="Weekly Subscription">Weekly Subscription $9.99 USD</option>
									<option value="Monthly Subscription">Monthly Subscription $29.99 USD</option>
									<option value="Semester long Subscription">Semester long Subscription $99.99 USD</option>
								</select> </td></tr>
							</table>
							<input type="hidden" name="currency_code" value="USD">
							<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
							<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
							<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
							</form>
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
