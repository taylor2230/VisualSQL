<?php
$header = explode(" ", $_REQUEST["val"]);
$dbName = $header[0];
$usrID = $header[1];
$usrPass = $header[2];
$requestType = $header[3]; //for correct constructor
$requestTable = $header[4];
$requestFields = $header[5];

$initializeRequest = new motherload($dbName,$usrID,$usrPass,$requestType,$requestTable,$requestFields);
return $initializeRequest->getFunction();
class motherload
{
    function __construct($requestedDB ,$user ,$userPass ,$requestedFunction ,$requestedTable, $requestedFields)
    {
        $this->requestedDB = $requestedDB;
        $this->user = $user;
        $this->userPass = $userPass;
        $this->requestedFunction = $requestedFunction;
        $this->requestedTable = $requestedTable;
        $this->requestedFields = $requestedFields;
    }
    function getFunction()
    {
        if($this->requestedFunction === 'table'){
            $a =  new accessDBTables($this->requestedDB, $this->user, $this->userPass);
            $a->buildTables();
        } elseif ($this->requestedFunction === 'fields'){
            $b = new accessDBTablesFields($this->requestedDB,  $this->user, $this->userPass, $this->requestedTable);
            $b->buildFields();
        } elseif ($this->requestedFunction === 'data'){
            echo $this->requestedFields;
        }
        return null;
    }
}
class accessDBTables
{
    //return database's tables
     function __construct($requestedDB ,$user , $userPass)
     {
        $this->requestedDB = $requestedDB;
        $this->user = $user;
        $this->userPass = $userPass;
     }
     function returnTables()
     {
         $query = "select TABLE_NAME from information_schema.TABLES where TABLE_SCHEMA = '$this->requestedDB'";
         $powerQuery = new powerQuery($this->user,$this->userPass,$query);
         return $powerQuery->pQ();
     }
     function buildTables()
     {

         $tables = $this->returnTables();
         echo '<li id="table-header">Available Tables</li>';
         for($i = 0; $i < count($tables); $i++)
         {
             echo '<li class="table-list"><a href="#" target="_self" onclick="processTableSelection(this.innerText);nextElementUnHide(this);">' . $tables[$i][0] . '</a></li>';
         }
     }

}
class accessDBTablesFields
{
    //return table's fields
    function __construct($requestedDB ,$user , $userPass, $requestedTable)
    {
        $this->requestedDB = $requestedDB;
        $this->user = $user;
        $this->userPass = $userPass;
        $this->requestTable = $requestedTable;
    }
    function returnFields()
    {
        $query = "select * from $this->requestedDB.$this->requestTable";
        $powerQuery = new powerQuery($this->user,$this->userPass,$query);
        return $powerQuery->pQFields();
    }
    function buildFields()
    {
        $fields = $this->returnFields();
        echo '<li id="fields-header">Available Fields</li>';
        for($i = 0; $i < count($fields); $i++)
        {
            echo '<li class="field-list"><a href="#" target="_self" onclick="fieldBuilder(this.innerText)">' . $fields[$i]->name . '</a></li>';
        }
    }
}
class returnTableFieldData
{
    //return fields' data
    function __construct($requestedDB ,$user , $userPass, $requestedTable, $requestedFields)
    {
        $this->requestedDB = $requestedDB;
        $this->user = $user;
        $this->userPass = $userPass;
        $this->requestTable = $requestedTable;
        $this->requestedFields = $requestedFields;
    }
    function returnData()
    {

    }
    function buildData()
    {

    }
}
class powerQuery
{
    //handles all query operations
    function __construct($user, $userPass, $query)
    {
        $this->user = $user;
        $this->userPass = $userPass;
        $this->query = $query;
        $this->msqli = new mysqli('localhost', $this->user, $this->userPass);
    }
    function pQ()
    {
        return $powerQuery = $this->msqli->query($this->query)->fetch_all();

    }
    function pQFields()
    {
        return $powerQuery = $this->msqli->query($this->query)->fetch_fields();
    }
}