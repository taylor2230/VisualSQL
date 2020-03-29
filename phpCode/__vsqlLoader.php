<?php
include 'verifyUser.php';
$header = explode(" ", $_REQUEST["val"]);
$headerID = $header[0];
$headerPass = $header[1];

$verify = new verifyUser();
$verified = $verify->getCredentials($headerID, $headerPass,'mysql',$headerID, $headerPass, 'user', 'User');
$process = new __vsqlLoader();

$process->loadVSQL($verified, $headerID, $headerPass);

class __vsqlLoader
{
    public function loadVSQL($bool, $log, $pass){
        $mysqli = new mysqli('localhost',$log,$pass);
        function failed(){
            echo '<h3 id="failed">Credentials not found; please contact admin</h3>';
        }

        function createApplication($array, $id){
            function buildForms(){

            }
            function buildList($obj, $class){
                for($i = 0; $i < count($obj);$i++){
                    echo '<li class="' . $class . '"">' . $obj[$i] . '</li>';
                }
            }
            $upperPriv = array('phpmyadmin', 'mysql','performance_schema','user_info');
            $limitedResults = array_values(array_diff($array, $upperPriv));
            if($id === 'admin' or $id === 'root'){
                buildList($array, 'db');
            } else {
                buildList($limitedResults, 'db');
            }

        }

        if($bool === 1){
            $databases = array();
            $result = mysqli_query($mysqli, "SELECT `schema_name` FROM information_schema.schemata");
            while($row = mysqli_fetch_array($result)) {
                array_push($databases, $row['schema_name']);
            }
            createApplication($databases, $log);
        } else {
            failed();
        }
    }
}