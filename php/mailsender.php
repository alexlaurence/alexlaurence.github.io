<?php

// Return JSON responses
header('Content-Type: application/json');

        // The destination email is provided via environment variable so that it
        // is not exposed in the repository.  Set CONTACT_EMAIL in the hosting
        // environment to the address that should receive contact form
        // submissions.
        $emailTo = getenv('CONTACT_EMAIL');
        if (!$emailTo) {
                // Abort if the variable is not configured.
                echo json_encode(false);
                return;
        }
	
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=utf-8\r\n";
	$headers .= "From: ".$_POST['crtEmail']."\r\n";
	
	if (!isset($_POST['crtSubject'])) {
		$subject = "Contact form message"; // Enter your subject here
	} else {
		$subject = $_POST['crtSubject'];
	}
	
	reset($_POST);
	
	$body = "";
	$body .= "<p><b>Name: </b>".$_POST['crtName']."</p>";
	$body .= "<p><b>Email: </b>".$_POST['crtEmail']."</p>";
	$body .= "<p><b>Subject: </b>".$subject."</p>";
	$body .= "<p><b>Message: </b>".$_POST['crtMessage']."</p>";	
	
	if( mail($emailTo, $subject, $body, $headers) ){
		$mail_sent = true;
	} else {
		$mail_sent = false;
	}	
	if(!isset($resp)){
		echo json_encode($mail_sent);
	}
?>