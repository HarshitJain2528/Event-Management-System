<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
} 
	include('vendor/autoload.php');
	// init configuration
	$clientID = '618853684118-0eph083ro3b26gi91uagjrc4ouo1e3mn.apps.googleusercontent.com';
	$clientSecret = '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';
	$redirectUri = 'http://localhost/event_management/events.php';

	// create Client Request to access Google API
	$client = new Google_Client();
	$client->setClientId($clientID);
	$client->setClientSecret($clientSecret);
	$client->setRedirectUri($redirectUri);
	$client->addScope("email");
	$client->addScope("profile");
?>