<?php

/* Cleaning Data */

foreach ($_POST as $key => $value) {
	$_POST[$key] = trim($_POST[$key]);
	$_POST[$key] = stripslashes($_POST[$key]);
	$_POST[$key] = htmlspecialchars($_POST[$key]);
}


/* Variables */

$name     = $_POST['name'];
$email    = $_POST['email'];
$number    = $_POST['number'];
$message_subject  = $_POST['subject'];
$message_text  = $_POST['message'];


/* Email Template */

$email_to = "connorbecker@live.com"; // place your email here
$subject = $message_subject;
$message = "$message_text Message from $name $email $number ";

$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8";
 
mail($email_to, $subject, $message, $headers);

die("Success! Your message has been sent.");

?>