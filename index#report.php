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
        <link rel="stylesheet" type="text/css" href="./css/index%23report.css">
        <link rel="stylesheet" type="text/css" href="./css/header.css">
        <script type="text/javascript" src="./javascriptCode/__vsqlClient.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
    <section class="content" id="content">
        <div id="vsql-login">
            <label id="cred-label">VSQL Login:</label>
            <input id="log" type="text" placeholder="Login..." name="login" autocomplete="off">
            <input id="pass" type="password" placeholder="Password..." name="password" autocomplete="off">
        </div>
        <div id="vsql">

        </div>
    </section>
    </body>
    <footer></footer>
    <script>
        $("#pass").keyup(function(event) {
            if (event.keyCode === 13) {
                usr = document.getElementById("log").value;
                ps = document.getElementById("pass").value
                sendInfo(usr, ps);
            }
        });
    </script>
    </html>
    <?php

}


/* This page will have unique DB login credentials required implementing the class of accessData */