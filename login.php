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
									<li><a href="no-sidebar.html">About Us</a></li>
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
											<h2>Login In</h2>
										</header>
											<form method="post" action="members.php">
												<!-- To make it refresh on same page, <?php echo $_SERVER['PHP_SELF']; ?> -->
												<ul class="errorMessages"></ul>
												Email Address: <br>
												<input type="email" name="email" placeholder="example@email.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" title="Please use format example@email.com" required><br>
												Password: <br>
												<input type="password" name="pw" placeholder="Password" pattern=".{6,}" title="Please make password at least 6 characters." required><br>
												<br>						
												<input style="left:0%;" type= submit class="button signup_button" value="Sign Up">
										
											</form>
									</article>
								</div>

							</div>
							<div class="4u 12u(narrower)">

								<!-- Sidebar -->
									<section id="sidebar" style="position: absolute; left:67%;">
										<section>
											<header>
												<h3>Not a Member?</h3>
											</header>
											<ul class="actions">
												<li><a href="signup.php" class="button">Sign Up here</a></li>
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