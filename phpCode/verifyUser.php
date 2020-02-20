<?php
$a = new verifyUser();
$usr = $_REQUEST['loginid'];
$pswrd = $_REQUEST['password'];
$a->getCredentials($_REQUEST['loginid'],$_REQUEST['password']);

if($a == 1){
    header("Location: http://localhost/VisualSQL/index.php");
    exit;
}
class verifyUser
{
    public function getCredentials($id, $pass){
        $bool = false;
        $mysqli = new mysqli("localhost", $id, $pass, "user_info");
        $query = $mysqli->query("SELECT user_id,user_password from user_info.user_access having user_id='".$id."'");
        $userResults = $query->fetch_array();
        $user = $userResults['user_id'];
        $userPass = $userResults['user_password'];
        if($id === $user and $pass === $userPass){
            $bool = true;
        }
        return (bool) $bool;
    }
}
