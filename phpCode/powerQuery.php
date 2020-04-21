<?php


class powerQuery
{
    //handles all query operations
    private $user;
    private $userPass;
    private $query;
    /**
     * @var mysqli
     */
    private $msqli;

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
    function pQUserInfo($type)
    {
        if($type === 1)
        {
            return $powerQuery = $this->msqli->query($this->query)->fetch_array();
        }
        elseif ($type === 2)
        {
            return $powerQuery = $this->msqli->query($this->query);
        }
    }
}