<?php
session_start();
if($_SESSION["active"] !='placeholder'){
    header('Location: login.php');
    session_unset();
    exit();
}

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>VisualSQL | Login</title>
    </head>
    <body>
    <div id="top"></div>
    <div id="visuals">
        <h1 class="title" id="sitename"><a id="linktext" href="./index.php">VisualSQL</a></h1>
    </div>

    </body>
    </html>

<?php
echo 'main page loaded congrats';
echo $_SESSION['active'];
