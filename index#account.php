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
        <title>VisualSQL | Account</title>
        <link rel="stylesheet" type="text/css" href="./css/index%23account.css">
        <link rel="stylesheet" type="text/css" href="css/header.css">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
        </style>
        <script src="javascriptCode/__accountClient.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
        <?php
            echo '<a id="opt6" href="#">USER: <a id="current-user">'.$_SESSION["id"].'</a></a>'
        ?>
    </section>
    <section class="content">
        <div id="credentials">
            <label id="cred-label">Change Password:</label>
            <input id="pass" type="password" placeholder="Current Password..." name="current password" autocomplete="off">
            <input id="pass-new" type="password" placeholder="New Password..." name="new password" autocomplete="off">
            <button id="submit" onclick="passInfo()">Update Password</button>
            <div id="response"></div>
        </div>
    </section>
    </body>
    <footer></footer>
    <script>
        $("#pass").keyup(function(event) {
            if (event.keyCode === 13) {
                passInfo();
            }
        });
    </script>
    </html>
    <?php
}


/* This page will have unique DB login credentials required implementing the class of accessData */