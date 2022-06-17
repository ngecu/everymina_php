<?php 

// Google API configuration
define('GOOGLE_CLIENT_ID', '592527780760-6dca6n1u8d9j5r9ae2o8iltlfm07sb5j.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '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');
define('GOOGLE_REDIRECT_URL', 'http://everymina.com');

// Start session
if(!session_id()){
    session_start();
}

// Include Google API client library
require_once 'vendor/autoload.php';
// require_once 'google-api-php-client/Google_Client.php';

// require_once 'google-api-php-client/contrib/Google_Oauth2Service.php';

// Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to EveryMina.com');
$gClient->setClientId(GOOGLE_CLIENT_ID);
$gClient->setClientSecret(GOOGLE_CLIENT_SECRET);
$gClient->setRedirectUri(GOOGLE_REDIRECT_URL);
$gClient->addScope("email");
$gClient->addScope("profile");




$google_oauthV2 = new Google_Service_Oauth2($gClient);




	// connect to database
	$conn = mysqli_connect("localhost", "everymin_user", "sc200/0195/2018", "everymin_everymina");

	if (!$conn) {
		die("Error connecting to database: " . mysqli_connect_error());
	}
    // define global constants
	define ('ROOT_PATH', realpath(dirname(__FILE__)));
	define('BASE_URL', 'https://everymina.com/');
?>