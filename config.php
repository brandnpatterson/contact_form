<?php
function _e($string) {
	return htmlentities($string, ENT_QUOTES, 'UTF-8', false);
}
// headers
$headers = "From: smtp.gmail.com\r\n";
$headers .= "Reply-To: brandnpatterson@gmail.com\r\n";
$headers .= "CC: brandnpatterson@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
// template
$template = [
	'subject' => 'Reciept for Lessons',
	'whitelist' => ['name', 'email', 'starting_date', 'ending_date']
];
// create errors array
$errors = $fields = [];
// check for errors
if (!empty($_POST)) {
	if (!empty($_POST['email']) && ! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors[] = 'That is not a valid email address';
	}
	foreach ($template['whitelist'] as $key) {
		$fields[$key] = $_POST[$key];
	}
	foreach ($fields as $key => $value) {
		if (empty($value)) {
			$errors[] = 'Please enter your ' . $key;
		}
	}
	// create variables to use in message
	$starting_date = $fields['starting_date'];
	$ending_date = $fields['ending_date'];
	$send_to = $fields['name'];
	$template['email'] = $fields['email'];
	// message to be sent
	$template['message'] = "
		<h3>Thanks for your payment, $send_to!</h3>
		<h4>You've paid for lessons for the following dates:</h4>
		<h4>Starting: $starting_date</h4>
		<h4>Ending: $ending_date</h4>
		<p>Brandon Patterson</p>
		<p>(979) 236-4789</p>
	";
	if (empty($errors)) {
		$sent = mail($template['email'], $template['subject'], $template['message'], $headers);
	}
}
