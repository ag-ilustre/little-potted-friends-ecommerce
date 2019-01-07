<?php 
//app/sample_mail.php
require 'autoload.php';

require 'phpmailer/phpmailer/src/PHPMailer.php';
require 'phpmailer/phpmailer/src/Exception.php';
require 'autoload.php';
// use PHPMailer\PHPMailer;
// use PHPMailer\Exception;

// require 'phpmailer/phpmailer/src/PHPMailer.php';

//get dateOfOrder
$purchaseDate = $_SESSION["purchase_date"];
$purchaseDate = date("D, M j, Y, g:i:s"); 
$mail = new PHPMailer\PHPMailer\PHPMailer(true);

$staff_email = "csp2ecommerce@gmail.com"; //where the email is coming from
$users_email = $_SESSION["email"]; //where the email will go -- TEST EMAIL!
// $users_email = $_SESSION["email"]; //where the email will go
$email_subject = "Order Being Processed: ". $_SESSION["transaction_code"];
$email_body = "<p>Dear <strong>" . $_SESSION["firstname"] . "</strong>,<br>

<p>Your Order <strong>" . $_SESSION["transaction_code"] . "</strong> has been placed on " . $purchaseDate .
" via " . $_SESSION["paymentMode"] . ". You will receive another email after your item(s) has been shipped.</p>

<p><strong>Note:</strong><br>
<p>Make sure that the information you provided in your order follows the required format:</p>

<p><strong>Name</strong> – First and Last Name</p>
<p><strong>Shipping Address</strong> – House Number, Building and Street Name, Province, City/Municipality, and Barangay</p>
<p>In the event that the information you provided is incomplete, you may place a new order with the correct and complete details and cancel the initial order, if still within the processing stage. Incorrect or incomplete details can result in the cancellation of order.</p>

<p>To view your order details, please <a href='https://mighty-mesa-84319.herokuapp.com/app/views/login.php'>log in</a> to your account.</p>

<p>We hope to see you again soon!</p>
<a href='https://tinyurl.com/LittlePottedFriends'><p><strong>LittlePottedFriends.com</strong></p></a>";


//echo ORDER SUMMARY, DELIVERY DATE, DELIVERY ADDRESS





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