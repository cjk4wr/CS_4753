<?php
require 'PHPMailer/PHPMailerAutoload.php';
include 'transaction.php'
	$mail = new PHPMailer;

	$mail->isSMTP();                                   // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                            // Enable SMTP authentication
	$mail->Username = 'CookEZalerts@gmail.com';          // SMTP username
	$mail->Password = 'c00kezalerts'; // SMTP password
	$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                 // TCP port to connect to

	$mail->setFrom('CookEZalerts@gmail.com', 'CookEZ');
	//$mail->addReplyTo($email, 'CodexWorld');
	$mail->addReplyTo('CookEZalerts@gmail.com', 'CookEZ');
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
?>
