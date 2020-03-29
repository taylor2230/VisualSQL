<?php

class verifyUser
{
    public function getCredentials($id, $pass, $database, $databaseUser, $databasePassword, $table, $where){
        set_error_handler (
            function($errno, $errstr, $errfile, $errline) {
                throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
            });
        $db_host = 'localhost';
        $db_user = $databaseUser;
        $db_password = $databasePassword;
        $db_database = $database;
        $bool = 0;
        try {
            $mysqli = new mysqli($db_host, $db_user, $db_password, $db_database);
            $userResults = $mysqli->query("SELECT * from $table having $where ='" . $id . "'" )->fetch_array();
            if($table === 'user_access'){
                $user = $userResults['user_id'];
                $userPass = $userResults['user_password'];
                $userHash = $userResults['unique_hash'];
            } else if($table === 'user'){
                $user = $userResults['User'];
                $userPass = $userResults['Password'];
                $userHash = 1;
            }

            if($table === 'user_access'){
                if ($id === $user and $pass === $userPass) {
                    $bool = $userHash;
                }
            } else if($table === 'user'){
                if ($id === $user) {
                    $bool = $userHash;
                }
            }
        } catch (Exception $e) {
            return 0;
        }
        return $bool;
    }

}

