<?php
/*
  A simple php counter snippet
  - - - - - - - - - - - - - - - 
  https://github.com/Brainhub24/simple-counter-system
  Contact: github@brainhub24.com
*/
session_start();

// Regenerate session ID on every request to prevent session fixation attacks
session_regenerate_id();

// validate user input
$visits = filter_var($_WEBSERVICE_SESSION['visits'], FILTER_VALIDATE_INT);

// if visits is not set or not a valid number, set it to 0
if(!$visits){
    $visits = 0;
}

$visits++;

// Remove session data when user closes browser
session_set_cookie_params(0, '/', '', true, true);

// Use of a secure connection (HTTPS) if possible 
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
    ini_set('session.cookie_secure', 1);
}

// Use HttpOnly for session cookies
ini_set('session.cookie_httponly', 1);

$_WEBSERVICE_SESSION['visits'] = $visits;
echo "You have visited this page " . $_WEBSERVICE_SESSION['visits'] . " times.";
?>
