<?php

include('/Applications/XAMPP/xamppfiles/htdocs/VisualSQL/phpCode/verifyUser.php');

$credentials = new verifyUser();
$formID = $_REQUEST['loginid'];
$formPassword = $_REQUEST['password'];

$result = $credentials->getCredentials($formID,$formPassword);
if($result === true){
    session_start();
    $_SESSION["active"] = 'placeholder';
    header('Location: index.php');
    exit();
} else {
    header('Location: login.php');
    exit();
}



