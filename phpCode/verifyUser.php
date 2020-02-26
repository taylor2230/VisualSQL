<?php

class verifyUser
{
    public function getCredentials($id, $pass){
        set_error_handler (
            function($errno, $errstr, $errfile, $errline) {
                throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
            });
        $bool = 0;
        try {

            $mysqli = new mysqli("localhost", $id, $pass, "user_info");
            $query = $mysqli->query("SELECT * from user_info.user_access having user_id='" . $id . "'");
            $userResults = $query->fetch_array();
            $user = $userResults['user_id'];
            $userPass = $userResults['user_password'];
            $userHash = $userResults['unique_hash'];
            if ($id === $user and $pass === $userPass) {
                $bool = $userHash;
            }
        } catch (Exception $e) {
            return 0;
        }
        return $bool;
    }

}

