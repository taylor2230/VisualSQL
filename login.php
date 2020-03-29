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
<section id="visuals">
    <h1 class="title" id="sitename"><a id="homelink" href="login.php">VisualSQL</a></h1>
    <div id="failed">
        <?php
        $failedLogin = isset($_REQUEST['failed']);
        if($failedLogin == 'true'){
            echo '<h3 id="failed-text">Failed Attempt - Username or Password not found</h3>';
        }
        ?>
    </div>
</section>
<section id="credentials">
    <form action="loginRedirect.php" method="post">
        <label class="login" for="loginid" id="loginlabel">LOGIN</label><br>
        <input class="login" type="text" id="loginid" name="loginid" placeholder="Enter Login..."><br><br>
        <label class="password" for="password" id="passwordlabel">PASSWORD</label><br>
        <input class="password" type="password" id="password" name="password" placeholder="Enter Password..."><br><br>
        <input type="submit" id="submit" name="submit" value="Submit">
    </form>
</section>
</body>
<footer>

</footer>
</html>
<?php
?>