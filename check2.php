<?php 

session_start();

// Retrieving email and password from the session
$userCredentials = $_SESSION['user_credentials'];

// Accessing individual values
$email = $userCredentials['email'];
$password = $userCredentials['password'];

echo "Email: $email, Password: $password";



?>