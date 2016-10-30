<!--EComm Milestone

- Make sure expiration date year is greater than 16
- do we need to check for current date? (maybe a check on php: if(year == 16) check month or call error))
- 
-->

<!-- Database input --> 
<?php

$string = "Congratulations! You are now a user! Feel free to browse our website!";
$cardissue = false;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {	
		if($_POST["date2"] == '16' && $_POST["date1"] < '12') {
			$string = "There seems to be an issue with your card information. Please press the back button and confirm your card has not expired.";
			$cardissue = true;
		}
		if($_POST["date2"] < '16') {
			$string = "There seems to be an issue with your card information. Please press the back button and confirm your card has not expired.";
			$cardissue = true;
		}
	}

	$db = new mysqli('localhost', 'root', '', 'ecomm');
	if ($db->connect_error):
		die ("Could not connect to db: " . $db->connect_error);
	endif;

	$q = 'select 1 from `userinfo` LIMIT 1';
	$val = $db->query($q);

	if($val !== FALSE) {
		if ($_SERVER["REQUEST_METHOD"] == "POST" && $cardissue == false) {	
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

	$email = $_POST["email"];
    		$pass = $_POST["pw"];
    		$name = $_POST["firstname"]. " " . $_POST["lastname"];
    		$address = $_POST["address"] . ", " . $_POST["city"] . ", " . $_POST["state"] . ", " . $_POST["zipcode"];
    		$phone = $_POST["phoneOne"] . $_POST["phoneTwo"] . $_POST["phoneThree"];

    		$query = $db->query("insert into userinfo (email, password, name, address, phone) VALUES ('$email', '$pass', '$name', '$address', '$phone')") or die ("Invalid: " . $db->error);


}

	$card = 'select 1 from `cardinfo` LIMIT 1';
	$val2 = $db->query($card);

	if($val2 !== FALSE) {

		if ($_SERVER["REQUEST_METHOD"] == "POST" && $cardissue == false) {	

			$email = $_POST["email"];
			$card = $_POST["ccOne"] . $_POST["ccTwo"] . $_POST["ccThree"] . $_POST["ccFour"];
			$expire = $_POST["date1"] . "/" . $_POST["date2"];
			$cvv = $_POST["CVVcode"];

			$cardquery = $db->query("insert into cardinfo (email, cardnum, expiration, cvv) VALUES ('$email', '$card', '$expire', '$cvv')") or die ("Invalid: " . $db->error);
		}

	} else {

	$db->query("drop table cardinfo");

	$result = $db->query("create table cardinfo (email varchar(255), cardnum varchar(16), expiration varchar(255), cvv varchar(3), FOREIGN KEY (email) REFERENCES userinfo(email) ON DELETE CASCADE)") or die ("Invalid: " . $db->error);

	$email = $_POST["email"];
			$card = $_POST["ccOne"] . $_POST["ccTwo"] . $_POST["ccThree"] . $_POST["ccFour"];
			$expire = $_POST["date1"] . "/" . $_POST["date2"];
			$cvv = $_POST["CVVcode"];

			$cardquery = $db->query("insert into cardinfo (email, cardnum, expiration, cvv) VALUES ('$email', '$card', '$expire', '$cvv')") or die ("Invalid: " . $db->error);
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
									 <h3 align="center"><strong> <?php echo $string; ?> <strong></h3>
								</header>
								<!-- Originally 3 paragraphs using <p>; commented out b/c unnecessary for us as of now -->
							</article>
					</div>
							<?php if($cardissue == false) {?>
						<h3 align="center"><strong> Subscriptions <strong></h3> <br>
						<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
						<input type="hidden" name="cmd" value="_xclick">
						<input type="hidden" name="business" value="cjk4wr-facilitator@virginia.edu">
						<input type="hidden" name="lc" value="US">
						<input type="hidden" name="item_name" value="Subscriptions">
						<input type="hidden" name="button_subtype" value="services">
						<input type="hidden" name="custom" value="<?= $email ?>"/>
						<input type="hidden" name="no_note" value="0">
						<input type="hidden" name="currency_code" value="USD">
						<input type="hidden" name="tax_rate" value="10.000">
						<input type="hidden" name="shipping" value="3.00">
						<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
						<div class="container 50%">
						<table>
						<tr><td><input type="hidden" name="on0" value="Subscriptions"></td></tr><tr><td><select name="os0">
							<option value="Weekly Subscription">Weekly Subscription $9.99 USD</option>
							<option value="Monthly Subscription">Monthly Subscription $29.99 USD</option>
							<option value="Semester long Subscription">Semester long Subscription $99.99 USD</option>
						</select> </td></tr>
						</table>
						<body style="text-align:center">
						<input type="hidden" name="currency_code" value="USD">
						<input type="hidden" name="option_select0" value="Weekly Subscription">
						<input type="hidden" name="option_amount0" value="9.99">
						<input type="hidden" name="option_select1" value="Monthly Subscription">
						<input type="hidden" name="option_amount1" value="29.99">
						<input type="hidden" name="option_select2" value="Semester long Subscription">
						<input type="hidden" name="option_amount2" value="99.99">
						<input type="hidden" name="option_index" value="0">
						<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" onClick="mailer()" alt="PayPal - The safer, easier way to pay online!">
						<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
						</form>
							<?php } ?>
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

			<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    		<script language="javascript">
        	function mailer() {
            $.ajax({
                type: "GET",
                url: "mailer.php" ,
                data: { h: "michael" }
            });
        }
    </script>

	</body>
</html>
