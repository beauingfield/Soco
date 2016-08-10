<?php
header("Content-type: application/json");
function is_valid_email ($email)
{
    $qtext = '[^\\x0d\\x22\\x5c\\x80-\\xff]';
    $dtext = '[^\\x0d\\x5b-\\x5d\\x80-\\xff]';
    $atom = '[^\\x00-\\x20\\x22\\x28\\x29\\x2c\\x2e\\x3a-\\x3c'.
                '\\x3e\\x40\\x5b-\\x5d\\x7f-\\xff]+';
    $quoted_pair = '\\x5c\\x00-\\x7f';
    $domain_literal = "\\x5b($dtext|$quoted_pair)*\\x5d";
    $quoted_string = "\\x22($qtext|$quoted_pair)*\\x22";
    $domain_ref = $atom;
    $sub_domain = "($domain_ref|$domain_literal)";
    $word = "($atom|$quoted_string)";
    $domain = "$sub_domain(\\x2e$sub_domain)*";
    $local_part = "$word(\\x2e$word)*";
    $addr_spec = "$local_part\\x40$domain";

    return preg_match("!^$addr_spec$!", $email) ? true : false;
}
include('phone_raw.php');

// Get Mail Settings
require_once 'Mail.php';


//Switch between form types:

// Set up SMTP
$from = "Shannon Corrigan <shannon@thorntonparkrg.com>";
$to = (empty($_POST['mailTo'])) ? 'shannon@thorntonparkrg.com' : $_POST['mailTo'];

// Fill out the general Forms for the mail.
$host = 'smtpout.secureserver.net';
$username = "joel@thorntonparkrg.com";
$password = "S0coTPRG";

// SMTP Settings
$smtp = Mail::factory(
	'smtp',
	array(
		'host' => $host,
        'port' => 25,
		'auth' => true,
		'username' => $username,
		'password' => $password
	)
);

$validatePhone = new Phones;

$formType = $_POST['formType'];
$name = $_POST['formName'];
$email =  $_POST['formEmail'];
$message = $_POST['formMessage'];

if(empty($name)){
	$error['formName'] = 'Your name is required';
}

if(empty($message)){
	$error['formMessage'] = 'Your message is required';
}

if(empty($email)){
	$error['formEmail'] = 'Your email is required';
} else {
	if(!is_valid_email($email)){
		$error['formEmail'] = 'A correct email address is required.';
	}
}

if($formType == 'reservation'){

	$phone = $_POST['reservationphone'];

	if(empty($phone)){
		$error['reservationphone'] = 'Your phone number is required.';
	} else {
		if(strlen($phone) < 10 || !$validatePhone->validatePhone($phone, array('all'))) {
			$error['reservationphone'] = "Please enter a valid US 10-digit phone number";
		}
	}

}

// Check if there are errors
if(isset($error)) {
	$error['error'] = 1;
	echo json_encode($error);
} else {

	$Message = "The following person filled out a form on the website. \n\n";
	$Message .= "Name: $name \n";
	$Message .= "Email: $email \n";
	if($formType == 'reservation'){
		$Message .= "Phone: $phone \n";
	}

	$Message .= 'Message:' . $message;
	$subject = ($formType == 'Reservation') ? 'Filled out reservation form.' : 'Filled out contact form.';

	//$to = 'joel@ascentus.com'; // For Testing Purposes
	$headers = array('From' => $from,
		'To' => $to,
		'Subject' => $subject
	);

	$Sent = $smtp->send($to, $headers, $Message);
	$MailStatus = array();

	if(!PEAR::isError($Sent)) {
		$MailStatus['mail'] = 'sent';
		echo json_encode($MailStatus);
	} else {
		$MailStatus['mail'] = $Sent->getMessage();
		echo json_encode($MailStatus);
	}
}
?>