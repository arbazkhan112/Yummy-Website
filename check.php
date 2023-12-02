<?php 

    // page1.php
session_start();
$email = "arbaz";
$password = "khan";

$_SESSION['user_credentials'] = array(
  'email' => $email,
  'password' => $password
);


?>