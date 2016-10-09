<!-- Database input --> 
<!-- Note for Christine need self served validation -->
<?php

	$db = new mysqli('localhost', 'root', '', 'ecomm');
	if ($db->connect_error):
		die ("Could not connect to db: " . $db->connect_error);
	endif;

	$q = 'select 1 from `UserInfo` LIMIT 1';
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

	$db->query("drop table UserInfo");

	$result = $db->query("create table UserInfo (email varchar(255) primary key not null, password varchar(255) not null, name varchar(255) not null, address varchar(255) not null, phone int(20) not null)") or die ("Invalid: " . $db->error);

}
?>

<!--
	Telephasic by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<!DOCTYPE HTML>
<html>
	<head>
		<title>Sign Up</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->

		<script type="text/javascript">
		function autoFormAdvance(afterNumChars,currentFormId,nextFormId) {
		if(document.getElementById(currentFormId).value.length==afterNumChars) {
			document.getElementById(nextFormId).focus();
			}
		}
		</script>

		<script type="text/javascript">
		$(function() {
    	var createAllErrors = function() {
        var form = $(this);
        var errorList = $('ul.errorMessages', form);
        
        var showAllErrorMessages = function() {
            errorList.empty();
            
            //Find all invalid fields within the form.
            form.find(':invalid').each(function(index, node) {

                //Find the field's corresponding label
                var label = $('label[for=' + node.id + ']');

                //Opera incorrectly does not fill the validationMessage property.
                var message = node.validationMessage || 'Invalid value.';
                errorList
                    .show()
                    .append('<li><span>' + label.html() + '</span> ' + message + '</li>');
            });
        };
        
        $('input[type=submit], button', form).on('click', showAllErrorMessages);
        $('input[type=text]', form).on('keypress', function(event) {
            //keyCode 13 is Enter
            if (event.keyCode == 13) {
                showAllErrorMessages();
            }
        });
    };
    
    $('form').each(createAllErrors);
});

</script>
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
									<li><a href="signup.php">Sign up</a></li>
								</ul>
							</nav>

					</div>
				</div>

			<!-- Main -->
				<div class="wrapper">
					<div class="container" id="main">
						<!-- Content -->
							<article id="content" class="feature">
								<header>
									<h2>Registration</h2>
								</header>
								<!-- Originally 3 paragraphs using <p>; commented out b/c unnecessary for us as of now -->
							</article>
					</div>
					<?php 
					if ($_SERVER["REQUEST_METHOD"] == "POST") {	
						?>
  						<h3><strong> &nbsp; &nbsp; Congrats! You are now a user! Feel free to browse our website! <strong></h3> <br>
  						<?php
  					}
  						?>
						<div class="container">
							<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
								<ul class="errorMessages"></ul>
								Email Address: <br>
								<input type="email" name="email" placeholder="example@email.com" required><br>
								Password: <br>
								<input type="password" name="pw" placeholder="Password" pattern=".{6,}" title="Please make password at least 6 characters." required><br>
								<br>
								<h2 class="feature">Information</h2> <br> <br>

								<div style="display: inline-block; width:470px; margin-right: 15px">
									First Name: <br>
									<input type="text" name="firstname" placeholder="First Name" pattern="[A-Za-z]+" title="Please use letters." required>
								</div>
								<div style="display: inline-block; width:470px;" >
									Last Name:<br>
									<input style="display: inline-block; width:470px;"  type="text" name="lastname" placeholder="Last Name" pattern="[A-Za-z]+" title="Please use letters." required><br>
								</div>
								<div style="clear:both;"></div><br>

								Address Line 1: <br>
								<input type="text" name="address" placeholder="Address Line 1" required><br>
								
								<div style="display: inline-block; width:483px; margin-right: 10px">
									City: <br>
									<input type="text" name="city" placeholder="City" pattern="[A-Za-z]+" title="Please use letters." required><br>
								</div>
								<div style="display: inline-block; width:300px; margin-right: 10px">
									State: <br>
								<select name = "state" required>
									<option value="AL">AL</option>
									<option value="AK">AK</option>
									<option value="AZ">AZ</option>
									<option value="AR">AR</option>
									<option value="CA">CA</option>
									<option value="CO">CO</option>
									<option value="CT">CT</option>
									<option value="DE">DE</option>
									<option value="DC">DC</option>
									<option value="FL">FL</option>
									<option value="GA">GA</option>
									<option value="HI">HI</option>
									<option value="ID">ID</option>
									<option value="IL">IL</option>
									<option value="IN">IN</option>
									<option value="IA">IA</option>
									<option value="KS">KS</option>
									<option value="KY">KY</option>
									<option value="LA">LA</option>
									<option value="ME">ME</option>
									<option value="MD">MD</option>
									<option value="MA">MA</option>
									<option value="MI">MI</option>
									<option value="MN">MN</option>
									<option value="MS">MS</option>
									<option value="MO">MO</option>
									<option value="MT">MT</option>
									<option value="NE">NE</option>
									<option value="NV">NV</option>
									<option value="NH">NH</option>
									<option value="NJ">NJ</option>
									<option value="NM">NM</option>
									<option value="NY">NY</option>
									<option value="NC">NC</option>
									<option value="ND">ND</option>
									<option value="OH">OH</option>
									<option value="OK">OK</option>
									<option value="OR">OR</option>
									<option value="PA">PA</option>
									<option value="RI">RI</option>
									<option value="SC">SC</option>
									<option value="SD">SD</option>
									<option value="TN">TN</option>
									<option value="TX">TX</option>
									<option value="UT">UT</option>
									<option value="VT">VT</option>
									<option value="VA">VA</option>
									<option value="WA">WA</option>
									<option value="WV">WV</option>
									<option value="WI">WI</option>
									<option value="WY">WY</option>
								</select><br>
								</div>
								<div style="display: inline-block; width:150px;">
									Zip Code: <br>
									<input type="text" name="zipcode" maxlength="5" size="5" pattern="[0-9]{5}" placeholder="Zip Code" title="Please use a 5-digit number." required><br>
								</div>
								<div style="clear:both;"></div>

								Phone Number: <br>
								<!-- <input type="text" name="phone" placeholder="(###)###-####"><br> -->
								<div >
									<input style="float:left; display:inline-block; width:80px; margin:5px;" type="text" onkeyup="autoFormAdvance(3,'areaCode','phonePre')" name="phoneOne" id="areaCode" maxlength="3" size="3" pattern="[0-9]{3}" placeholder="###" title="Please use a 3-digit number." required/>
									<input style="float:left; display:inline-block; width:80px; margin:5px;" type="text" onkeyup="autoFormAdvance(3,'phonePre','phoneSuf')" name="phoneTwo" id="phonePre" maxlength="3" size="3" pattern="[0-9]{3}" placeholder="###" title="Please use a 3-digit number." required/>
									<input style="float:left; display:inline-block; width:80px; margin:5px;" type="text" name="phoneThree" id="phoneSuf" maxlength="4" size="4" pattern="[0-9]{4}" placeholder="####" title="Please use a 4-digit number." required/>
								</div>
								<div style="clear:both;"></div>
								<input type= submit class="button signup_button" value="Sign Up">
							</form>

							<!-- <a href="signup.html" class="button signup_button">Sign Up Now!</a> -->
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