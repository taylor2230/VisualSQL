<?php
session_start();
if(strlen($_SESSION["active"]) != 36){
    header('Location: login.php');
    session_unset();
    exit();
} else {
    echo 'page loaded';
}


/* This page will have unique DB login credentials required implementing the class of accessData */