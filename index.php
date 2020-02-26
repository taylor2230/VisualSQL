<?php
session_start();
if(strlen($_SESSION["active"]) != 36){
    header('Location: login.php');
    session_unset();
    exit();
} else {

    $id = $_REQUEST['id'];
    $pass = $_REQUEST['pss']

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>VisualSQL | Login</title>
    </head>
    <body>
    <div id="top"></div>
    <section id="topcontrols">
        <h1 class="title" id="sitename"><a id="homelink" href="./index.php">VisualSQL</a></h1>
        <h1 class="title" id="sitelogout"><a id="logoutlink" href="./logout.php">Logout</a></h1>
        <section>
            <h3 class="topnav"><a id="opt1" href="">DOCUMENTS</a></h3>
            <h3 class="topnav"><a id="opt2" href="./index%23report.php">VSQL</a></h3>
            <h3 class="topnav"><a id="opt3" href="">ADMIN</a></h3>
        </sec>
    </section>
    <section class="content">
        <p>DB Tables</p>
        <p>Selected Objs (Query)</p>
        <p>Refresh  - Load Content</p>
        <p>DB Table Objs</p>
        <p>Report Generating Area</p>
    </section>
    </body>
    <footer></footer>
    </html>

    <?php

}
