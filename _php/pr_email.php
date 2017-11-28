<?php
// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
// If you are using Composer (recommended)
require 'vendor/autoload.php';

// ++++ Change: Renamed from email to pr_email distinguish from other emails that might be added later ++++
function emailToken($emailLink, $email){
	$emailLink = "http:" . $emailLink;	
	$emailLinkStr = '<a href"' . $emailLink . '">'. $emailLink . '</a>';

	$from = new SendGrid\Email("Mga Survey support", "app77969467@heroku.com");
	// subject
	$subject = 'MGA Password Reset Request';
	// receipient email from forgotpassword page
	$to = new SendGrid\Email(null, $email);

	// message
	$content = new SendGrid\Content("test/html","
	<html>
	<head>
	  <title>MGA Survey Password Reset Request</title>
	</head>
	<body>
	  <p>We received your request to reset your password.<br/>
		 To reset your password, click on the button below (or copy/paste the URL into your browser). <br/> 
	  </p>
	 <p>".
	 $emailLinkStr
	 ."</p>
	</body>
	</html>"
	);

$mail = new SendGrid\Mail($to, $subject, $from, $content);
$apiKey = getenv('MGA_SENDING');
$sg = new \SendGrid($apiKey);
$response = $sg->client->mail()->send()->post($mail);
//echo $response->statusCode();
//print_r($response->headers());
//echo $response->body();
}
?>