<?php
require 'PHPMailer/PHPMailerAutoload.php';

	$mail = new PHPMailer;

	$mail->isSMTP();                                   // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                            // Enable SMTP authentication
	$mail->Username = 'Insert Email Address';          // SMTP username
	$mail->Password = 'Insert Email Account Password'; // SMTP password
	$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                 // TCP port to connect to

	$mail->setFrom('email@codexworld.com', 'CodexWorld');
	$mail->addReplyTo($email, 'CodexWorld');
	$mail->addAddress('john@gmail.com');   // Add a recipient
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');

	$mail->isHTML(true);  // Set email format to HTML

	$bodyContent = '<h1>Thanks for signing up for CookEZ!</h1>';
	$bodyContent .= '<p>You have successfully signed up for our service.  We hope you enjoy your product.
	  Please let us know if you have any questions or concerns! </p>';

	$mail->Subject = 'Email from Localhost by CodexWorld';
	$mail->Body    = $bodyContent;

	if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    echo 'Message has been sent';
	}
}
// Reply with an empty 200 response to indicate to paypal the IPN was received correctly.
header("HTTP/1.1 200 OK");
?>
