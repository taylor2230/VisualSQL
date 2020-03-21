<?php

class verifyUser
{
    public function getCredentials($id, $pass){
        set_error_handler (
            function($errno, $errstr, $errfile, $errline) {
                throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
            });
        $db_host = 'localhost';
        $db_user = 'verifyaccess';
        $db_password = '33GUk2R3cfvaXaly';
        $db_database = 'user_info';
        $bool = 0;
        try {
            $mysqli = new mysqli($db_host, $db_user,$db_password, $db_database);
            $query = $mysqli->query("SELECT * from user_access having user_id='" . $id . "'" );
            $userResults = $query->fetch_array();
            $user = $userResults['user_id'];
            $userPass = $userResults['user_password'];
            $userHash = $userResults['unique_hash'];
            echo $user;
            echo $userPass;
            if ($id === $user and $pass === $userPass) {
                $bool = $userHash;
            }
        } catch (Exception $e) {
            return 0;
        }
        return $bool;
    }

}

