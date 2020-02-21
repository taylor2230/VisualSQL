<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VisualSQL | Login</title>
</head>
<body>
<div id="top"></div>
<div id="visuals">
    <h1 class="title" id="sitename"><a id="linktext" href="login.php">VisualSQL</a></h1>
</div>
<div id="credentials">
    <form action="loginRedirect.php" method="post">
        <label for="loginid">LOGIN</label><br>
        <input type="text" id="loginid" name="loginid" placeholder="Enter Login ID"><br><br>
        <label for="password">PASSWORD</label><br>
        <input type="password" id="password" name="password" placeholder="Enter Password"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>
</body>
</html>
<?php

?>