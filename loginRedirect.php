<?php

include './phpCode/verifyUser.php';
$credentials = new verifyUser();
$formID = $_REQUEST['loginid'];
$formPassword = $_REQUEST['password'];

$result = $credentials->getCredentials($formID, $formPassword, 'user_info',
    'verifyaccess','33GUk2R3cfvaXaly','user_access', 'user_id');
if($result != 0){
    session_start();
    $_SESSION["active"] = $result;
    $_SESSION["id"] = $formID;
    $_SESSION["password"] = $formPassword;
    header('Location: ./index.php');
    exit();
} else {
    header('Location: ./login.php?' . http_build_query(array(
        'failed'=>'true')));
    exit();
}



