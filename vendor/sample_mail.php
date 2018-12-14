<?php 
//app/sample_mail.php
require 'autoload.php';

require 'phpmailer/phpmailer/src/PHPMailer.php';
require 'phpmailer/phpmailer/src/Exception.php';
require 'autoload.php';
// use PHPMailer\PHPMailer;
// use PHPMailer\Exception;

// require 'phpmailer/phpmailer/src/PHPMailer.php';

$mail = new PHPMailer\PHPMailer\PHPMailer(true);

$staff_email = "csp2ecommerce@gmail.com"; //where the email is coming from
$users_email = $_SESSION["email"]; //where the email will go
$email_subject = "Little Potted Friends: Order Confirmation";
$email_body = "<h3>Reference Number: ". $_SESSION["transaction_code"] ."</h3>";

try{
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->Username = $staff_email;
	$mail->Password = "capstone2";
	$mail->SMTPSecure = "tls";
	$mail->Port = 587;
	$mail->setFrom($staff_email, "Little Potted Friends");
	$mail->addAddress($users_email);
	$mail->isHTML(true);
	$mail->Subject = $email_subject;
	$mail->Body = $email_body;
	$mail->send();

	echo "You will receive an email confirmation at " . $_SESSION["email"]; //for testing purposes only, should be thrown to confirmation.php
} catch (Exception $e){
	echo "Message sending failed".''.$mail->ErrorInfo;
}

 ?>