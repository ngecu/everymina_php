<?php 

require_once 'config.php';
	session_unset();

	// Remove token and user data from the session
unset($_SESSION['token']);
unset($_SESSION['userData']);

// Reset OAuth access token
$gClient->revokeToken();

	session_destroy();
	header('Location: login.php');
?>