<?php

session_start();
$previous = $_SESSION['website'];
$_SESSION['website'] = "members.php";

if($previous === 'signup.php'){
	$_SESSION['login'] = $_SESSION['email']; 
	$_SESSION['pw'] = $_SESSION['pw'];
}else{
	$_SESSION['login']  = $_POST["email"]; 	
	$_SESSION['pw'] = $_POST["pw"];
}
$_SESSION['loggedin'] = false;

$email = $_SESSION['login'];
$pass = $_SESSION['pw'];

// echo var_dump(isset($_SESSION['login']));
// echo $_SESSION['login'];
// echo var_dump(!isset($_SESSION['login']));

if(!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	$_SESSION['check'] = false;
	header('Location: login.php');
}else{
	$_SESSION['loggedin'] = true;
}

	$db = new mysqli('localhost', 'root', '', 'ecomm');
	if ($db->connect_error):
		die ("Could not connect to db: " . $db->connect_error);
	endif;

		$verify = "select name from `userinfo` where email='$email' and password='$pass'";
	$val = $db->query($verify);
	$row = mysqli_fetch_assoc($val);

?>

<!DOCTYPE HTML>
<!--
	Telephasic by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Members</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body class="left-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<div id="header" class="container">

						<!-- Logo -->
							<h1 id="logo"><a href="index.php">Home</a></h1>

						<!-- Nav -->
							<nav id="nav">
								<?php if($_SESSION['loggedin'] == true) { ?>
									<a href="logout.php"><button type = "button" style="position:absolute; left:92%; top:15px; background-color:white; font-family: 'Source Sans Pro', sans-serif;">Logout</button></a>
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
									<li><a href="members.php">Members</a></li>
								</ul>
							</nav>

					</div>
				</div>

			<!-- Main -->
				<div class="wrapper">
					<div class="container" id="main">
						<div class="row 150%">
							<div class="4u 12u(narrower)">

								<!-- Sidebar -->
									<section id="sidebar">
										<section>
											<header>
												<h3>Profile</h3>
											</header>
											<img src="profile.png"> <br>
											<p style="display:inline"> <strong>Name:</strong> <?php echo $row['name'] ?> </p> <br>
											<p style="display:inline"> <strong>Joined on:</strong> Dec 2016</p> <br>
											<br><br>
											<p style="display:inline"> Interested in our products?</p>
											<strong><a href="transaction.php">Buy now!</a></strong>	
										</section>
									</section>
							</div>
							<div class="8u 12u(narrower) important(narrower)">

								<!-- Content -->
									<article id="content">
<!--											<h2>Members Home Page</h2>-->
											<p>We offer many different types of meals, such as American...</p>
											<iframe width="560" height="315" src="https://www.youtube.com/embed/gsb9zz6ljrs" frameborder="0" allowfullscreen></iframe>	
											<p>...Asian...</p>
											<iframe width="560" height="315" src="https://www.youtube.com/embed/86C7oeUOgm8" frameborder="0" allowfullscreen></iframe>
											<p>...Italian... </p>
											<iframe width="560" height="315" src="https://www.youtube.com/embed/Nu5vWE8rRsg" frameborder="0" allowfullscreen></iframe>

											<p> ... and more! Here are some reviews from our satisfied customers! </p>
											<blockquote style="border: 2px solid #666; padding: 10px; background-color: #E7E1E0;"> "CookEZ has provided some of the best service I've ever had! They've made cooking so much more easy and enjoyable for me.  Their recipes cater specifically towards college students, so I get to learn to cook without feeling any burden.  I would highly recommend CookEZ to any beginner (or lazy) chef!" <br><strong> -- Jane Doe, 4th Year student </strong> </blockquote> <br>
											<blockquote style="border: 2px solid #666; padding: 10px; background-color: #E7E1E0;"> "CookEZ is like a Blue Apron without all the fancy stuff or the heavy hit to my wallet.  They have reasonable prices and are perfect for all college students!  It was really easy for me to pick up my meal from Grounds (they can deliver too!!!).  CookEZ has changed my life and I hope it changes yours too." <br><strong> -- John Doe, 2nd Year student</strong> </blockquote>
									</article>
							</div>
						</div>
					</div>
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