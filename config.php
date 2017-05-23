<?php

$whitelist = array('name', 'email', 'message');
$email_address = 'brandnpatterson@gmail.com';
$subject = 'New Contact Form Submission';
$headers = array(
	"From: brandonnpatterson@gmail.com",
	"Reply-To: brandonnpatterson@gmail.com",
	"X-Mailer: PHP/" . PHP_VERSION
);
$headers = implode ("\r\n", $headers);

$errors = array();
$fields = array();
$sent = '';

if (!empty($_POST)) {
	// Validate email address
	if (!empty($_POST['email']) && ! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors[] = 'That is not a valid email address.';
	}
	// Perform field whitelisting
	foreach ($whitelist as $key) {
		$fields[$key] = $_POST[$key];
	}
	// Validate field data
	foreach ($fields as $key => $value) {
		if (empty($value)) {
			$errors[] = 'Please enter your ' . $key;
		}
	}
	// Validate math
	if (intval($_POST['human']) !== 7) {
		$errors[] = 'Please enter the correct number.';
	}

	// select message from fields array
	$message = $fields['message'];

	// Check and process
	if (empty($errors)) {
		$sent = mail($email_address, $subject, $message, $headers);
		echo $sent;
	}
}
?>
