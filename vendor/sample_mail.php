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
$users_email = "csp2ecommerce@gmail.com"; //where the email will go
$email_subject = "CSP2 Order Confirmation";
$email_body = "<h3>Reference Number: D8KCKAIK6UT4JWFI5RMKOTJGR1ZOSL55UPIF</h3>";

try{
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->Username = $staff_email;
	$mail->Password = "capstone2";
	$mail->SMTPSecure = "tls";
	$mail->Port = 587;
	$mail->setFrom($staff_email, "Company Name");
	$mail->addAddress($users_email);
	$mail->isHTML(true);
	$mail->Subject = $email_subject;
	$mail->Body = $email_body;
	$mail->send();

	echo "Message has been sent"; //for testing purposes only, should be thrown to confirmation.php
} catch (Exception $e){
	echo "Message sending failed".''.$mail->ErrorInfo;
}

 ?>