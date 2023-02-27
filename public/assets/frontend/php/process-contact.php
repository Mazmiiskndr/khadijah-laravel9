<?php
	// an email address that will be in the From field of the email.
	$from = 'Demo contact form <demo@domain.com>';
	// an email address that will receive the email with the output of the form
	$sendTo = 'youremail@domain.com';
	// subject of the email
	$subject = 'New message from contact form';
	// form field names and their translations.
	// array variable name => Text to appear in the email
	$fields = array('name' => 'Name', 'email' => 'Email', 'message' => 'Message'); 
	if(count($_POST) == 0) throw new \Exception('Form is empty');
	$emailText = "You have a new message from your contact form\n=============================\n";
	foreach ($_POST as $key => $value) {
		// If the field exists in the $fields array, include it in the email
		if (isset($fields[$key])) {
			$emailText .= "$fields[$key]: $value\n";
		}
	}
	// All the neccessary headers for the email.
	$headers = array('Content-Type: text/plain; charset="UTF-8";',
		'From: ' . $from,
		'Reply-To: ' . $from,
		'Return-Path: ' . $from,
	);
	// Send email
	mail($sendTo, $subject, $emailText, implode("\n", $headers));
?>