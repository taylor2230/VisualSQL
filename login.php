<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VisualSQL | Login</title>
    <style>
        @import "css/login.css";
        @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
    </style>
</head>
<body>
<div id="top">.</div>
<section id="visuals">
    <h1 class="title" id="sitename"><a id="homelink" href="login.php">VisualSQL</a></h1>
</section>
<section id="credentials">
    <form action="loginRedirect.php" method="post">
        <label class="login" for="loginid" id="loginlabel">LOGIN</label><br>
        <input class="login" type="text" id="loginid" name="loginid" placeholder="Required"><br><br>
        <label class="password" for="password" id="passwordlabel">PASSWORD</label><br>
        <input class="password" type="password" id="password" name="password" placeholder="Required"><br><br>
        <input type="submit" id="submit" name="submit" value="Submit">
    </form>
</section>
</body>
<footer>

</footer>
</html>
<?php

?>