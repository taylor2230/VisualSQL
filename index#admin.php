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
        <link rel="stylesheet" type="text/css" href="./css/index%23admin.css">
        <link rel="stylesheet" type="text/css" href="css/header.css">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
        </style>
        <script src="./javascriptCode/__adminClient.js"></script>
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
        <?php
            $hasAccess = array("admin","professor");
            if($_SESSION["id"] === $hasAccess[0] or $_SESSION["id"] === $hasAccess[1])
            {
                echo '<input id="pass" type="password" placeholder="Confirm your database password..." name="password" autocomplete="off">';
                echo '<label id="cred-label">Delete User:</label>';
                echo '<input id="user" type="user" placeholder="Enter the user id to delete..." name="user" autocomplete="off">';
                echo '<button id="submit" onclick="passInfo(2)">Remove User</button>';
                echo '<label id="cred-label-2">Add User:</label>';
                echo '<input id="user-2" type="user" placeholder="Enter the user id to create..." name="user" autocomplete="off">';
                echo '<input id="pass-3" type="password" placeholder="Enter the password of the user..." name="password" autocomplete="off">';
                echo '<button id="submit-2" onclick="passInfo(1)">Add User</button>';
                echo '<div id="response"></div>';
            } else {
                echo '<div id="response">You do not have access rights to this site; please see administrator</div>';
            }
        ?>
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