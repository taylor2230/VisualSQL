<?php

include './phpCode/verifyUser.php';
$credentials = new verifyUser();
$formID = $_REQUEST['loginid'];
$formPassword = $_REQUEST['password'];

$result = $credentials->getCredentials($formID,$formPassword);
if($result != 0){
    session_start();
    $_SESSION["active"] = $result;
    header('Location: ./index.php?' . http_build_query(array(
            'id' => $formID,
            'pss' => $formPassword)));
    exit();
} else {
    header('Location: ./login.php');
    exit();
}



