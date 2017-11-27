<?php
// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
// If you are using Composer (recommended)
require 'vendor/autoload.php';

// ++++ Change: Renamed from email to pr_email distinguish from other emails that might be added later ++++
function emailToken($emailLink, $email){
	$emailLink = "http:" . $emailLink;	
	$emailLinkStr = '<a href"' . $emailLink . '">'. $emailLink . '</a>';

	<?php
	$from = new SendGrid\Email(null, "app77969467@heroku.com");
	// subject
	$subject = 'MGA Password Reset Request';
	// receipient email from forgotpassword page
	$to = new SendGrid\Email(null, $email);

	// message
	$message = '
	<html>
	<head>
	  <title>MGA Survey Password Reset Request</title>
	</head>
	<body>
	  <p>We received your request to reset your password.<br/>
		 To reset your password, click on the button below (or copy/paste the URL into your browser). <br/> 
	  </p>
	 <p>'.
	 $emailLinkStr
	 .'</p>
	</body>
	</html>
	';

	$content = new SendGrid\Content("text/plain", $message);

	$mail = new SendGrid\Mail($from, $subject, $to, $content);

	$apiKey = getenv('MGA_SENDING');
	$sg = new \SendGrid($apiKey);

	$response = $sg->client->mail()->send()->post($mail);
	echo $response->statusCode();
	echo $response->headers();
	echo $response->body();
}
?>