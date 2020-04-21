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
        function failed(){
            echo '<h3 id="failed">Credentials not found; please contact admin</h3>';
        }

        try{
            $mysqli = new mysqli('localhost',$log,$pass);
        } catch(Exception $e){
            failed();
        }
        function createApplication($array, $id){
            function buildArea(){
                echo '<div class="table" id="table"></div>';
                echo '<div class="fields" id="fields"></div>';
                echo '<div class="report" id="report"></div>';
            }
            function buildList($obj, $class){
                echo '<div id="query-builder"><label id="query-header">PowerQuery</label></div>';
                echo '<div id="db-group"><li id="db-header">Available Databases</li>';
                for($i = 0; $i < count($obj);$i++){
                    echo '<li class="' . $class . '"><a href="#" target="_self" onclick="processDatabaseSelection(this.innerText);nextElementUnHide(this);">' . $obj[$i] . '</a></li>';
                }
                echo '</div>';
            }
            function sendDatabases($arr, $mod){
                $upperPriv = array('phpmyadmin', 'mysql','performance_schema','user_info');
                $limitedResults = array_values(array_diff($arr, $upperPriv));
                if($mod === 'admin' or $mod === 'root' or $mod === 'professor'){
                    buildList($arr, 'db');
                } else {
                    buildList($limitedResults, 'db');
                }
            }
            sendDatabases($array, $id);
            buildArea();

        }

        if($bool === 1){
            $databases = array();
            $result = mysqli_query($mysqli, "SELECT `schema_name` FROM information_schema.schemata");
            while($row = mysqli_fetch_array($result)) {
                array_push($databases, $row['schema_name']);
            }
            createApplication($databases, $log);
        }
    }
}