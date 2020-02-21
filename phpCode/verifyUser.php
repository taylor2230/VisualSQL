<?php

class verifyUser
{
    public function getCredentials($id, $pass){
        set_error_handler (
            function($errno, $errstr, $errfile, $errline) {
                throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
            });

        $bool = false;
        try {
            $mysqli = new mysqli("localhost", $id, $pass, "user_info");
            $query = $mysqli->query("SELECT user_id,user_password from user_info.user_access having user_id='" . $id . "'");
            $userResults = $query->fetch_array();
            $user = $userResults['user_id'];
            $userPass = $userResults['user_password'];
            if ($id === $user and $pass === $userPass) {
                $bool = true;
            }
        } catch (Exception $e) {
            return false;
        }
        return (bool) $bool;
    }

}

