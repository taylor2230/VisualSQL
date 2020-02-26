<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VisualSQL | Login</title>
</head>
<body>
<div id="top"></div>
<section id="visuals">
    <h1 class="title" id="sitename"><a id="homelink" href="login.php">VisualSQL</a></h1>
</section>
<section id="credentials">
    <form action="loginRedirect.php" method="post">
        <label for="loginid">LOGIN</label><br>
        <input type="text" id="loginid" name="loginid" placeholder="Enter Login ID"><br><br>
        <label for="password">PASSWORD</label><br>
        <input type="password" id="password" name="password" placeholder="Enter Password"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</section>
</body>
<footer>

</footer>
</html>
<?php

?>