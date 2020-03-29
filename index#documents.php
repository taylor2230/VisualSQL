<?php
session_start();
if(strlen($_SESSION["active"]) != 36){
    header('Location: login.php');
    session_unset();
    exit();
} else {

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>VisualSQL | Main Page</title>
        <link rel="stylesheet" type="text/css" href="./css/index%23documents.css">
        <link rel="stylesheet" type="text/css" href="css/header.css">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
        </style>
    </head>
    <body>
    <section id="top">
        <a class="toplinks" id="homelink" href="index.php">VisualSQL&nbsp&nbsp</a>
    </section>
    <section class="toplinks-sub">
        <a  id="opt1" href="./index%23documents.php">DOCUMENTS</a>
        <a  id="opt2" href="./index%23report.php">VSQL</a>
        <a  id="opt3" href="./index%23admin.php">ADMIN</a>
        <a  id="opt4" href="./index%23account.php">ACCOUNT</a>
        <a  id="opt5" href="./logout.php">LOGOUT</a>
    </section>
    <section class="content">

    </section>
    </body>
    <footer></footer>
    </html>
    <?php
}


/* This page will have unique DB login credentials required implementing the class of accessData */