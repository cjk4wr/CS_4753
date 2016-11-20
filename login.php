<?php
	$db = new mysqli('localhost', 'root', '', 'ecomm');
	if ($db->connect_error):
		die ("Could not connect to db: " . $db->connect_error);
	endif;

session_start();
$_SESSION['email'] = $_POST["email"];
$_SESSION['pw'] = $_POST["pw"];
$_SESSION['check'] = $_SESSION['check'];
$checks = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {	
	$email = $_POST["email"];
    $pass = $_POST["pw"];

	$verify = "select * from `userinfo` where email='$email' and password='$pass'";
	$val = $db->query($verify);

	if ($val->num_rows == 0) {
    	$checks = false;
	}
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
		<title>Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body class="right-sidebar">
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
									<li><a href="about.php">About Us</a></li>
									<li> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </li>
									<!-- ^^ Note: This is here to make headings lined correctly; delete when we uncomment other li -->
									<!-- <li class="break"><a href="right-sidebar.html">Products</a></li> -->
									<!-- a href="left-sidebar.html" -> getting rid of sign up link for now -->
									<li><a href="signup.php">Sign up</a></li>
								</ul>
							</nav>

					</div>
				</div>

			<!-- Main -->
				<div class="wrapper" >
					<div class="container" id="main">
						<div class="row 150%">
							<div class="8u 12u(narrower)">
								<div style="padding-right:80px; border-right: thick solid #bfbfbf;">
								<!-- Content -->
									<article id="content" class="feature">
										<header>
											<h2>Login</h2>
										</header>
										<?php
											if(	$_SESSION['check'] == false) { ?>
												<p style="color:red"> *You are not authorized to visit that page. Please login. </p>
											<?php
											}
										if($_SERVER["REQUEST_METHOD"] == "POST") {
												 if($checks == false ) { ?>
												 <p style="color:red"> *There was an issue with your credentials. Please try again. </p>
											<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
												<ul class="errorMessages"></ul>
												Email Address: <br>
												<input type="email" name="email" placeholder="example@email.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" title="Please use format example@email.com" required><br>
												Password: <br>
												<input type="password" name="pw" placeholder="Password" pattern=".{6,}" title="Please make password at least 6 characters." required><br>
												<br>						
												<input style="left:0%;" type= submit class="button signup_button" value="Login">
											</form> 
											<?php 
										} else { 
										 header('Location: members.php');
											exit;
										 }
										} else { ?>
											<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
												<ul class="errorMessages"></ul>
												Email Address: <br>
												<input type="email" name="email" placeholder="example@email.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" title="Please use format example@email.com" required><br>
												Password: <br>
												<input type="password" name="pw" placeholder="Password" pattern=".{6,}" title="Please make password at least 6 characters." required><br>
												<br>						
												<input style="left:0%;" type= submit class="button signup_button" value="Login">
											</form>
											<?php } ?>
									</article>
								</div>

							</div>
							<div class="4u 12u(narrower)">

								<!-- Sidebar -->
									<section id="sidebar" style="position: absolute; left:68%; padding-top:90px">
										<section>
												<h3>Not a Member?</h3>
											<ul class="actions" style="position: absolute; left:15px;">
												<li><a href="signup.php" class="button">Sign Up</a></li>
											</ul>
										</section>
									</section>

							</div>
						</div>
					</div>
				</div>

			<!-- Footer -->
				<div id="footer-wrapper">
					<div id="footer" class="container">

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