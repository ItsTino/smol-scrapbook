<?php
//Good login echo goodlogin
//Bad login echo badlogin
//Prompt user to retry authing
//Set session variable on goodlogin
require_once('../app/globalFuncs.php');
require_once('../app/config.php');
session_start();

$currentPass = $loginpassword;
$tryPass = $_POST['password'];

if ($tryPass === $currentPass) {
    $_SESSION['authState'] = 'logged_in';
    $_SESSION['authTime'] = date('Y/m/d H:i:s');
    $_SESSION['uuid'] = uuidv4();
    echo 'goodlogin';
} else {    
    //clear any existing session vars
    $_SESSION = array();
    session_destroy();
    echo 'badlogin';
}


