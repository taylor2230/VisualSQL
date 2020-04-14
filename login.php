<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VisualSQL | Login</title>
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
    </style>
</head>
<body>
<div id="top">.</div>
<section id="credentials">
    <form action="loginRedirect.php" method="post">
        <h1 class="title" id="sitename"><a id="homelink" href="login.php">VisualSQL</a></h1>
        <?php
        $failedLogin = isset($_REQUEST['failed']);
        if($failedLogin == 'true'){
            echo '<label id="failed-text">Username or Password not found</label>';
        }
        ?>
        <label class="login" for="loginid" id="loginlabel">LOGIN</label><br>
        <input class="login" type="text" id="loginid" name="loginid" placeholder="Enter Login..."><br><br>
        <label class="password" for="password" id="passwordlabel">PASSWORD</label><br>
        <input class="password" type="password" id="password" name="password" placeholder="Enter Password..."><br><br>
        <input type="submit" id="submit" name="submit" value="Log On">
    </form>
</section>
</body>
<footer>

</footer>
</html>
<?php
?>