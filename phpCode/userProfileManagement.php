<?php
include './powerQuery.php';

$header = explode(" ", $_REQUEST["val"]);

$passedUser = $header[0];
$passedPassword = $header[1];
$passedThird = $header[2];
$passedRequest = $header[3];
if($passedRequest === 'update')
{
    $update = new updateAccount($passedUser, $passedPassword, $passedThird);
    $update->sendUpdate();
} elseif ($passedRequest === 'create')
{
    $newUser = explode("~", $passedThird);
    $create = new createAccount($passedUser, $passedPassword, $newUser[0], $newUser[1]);
    $create->sendNewAccount();
} elseif ($passedRequest === 'delete')
{
    $delete = new deleteAccount($passedUser, $passedPassword, $passedThird);
    $delete->sendDelete();
}
class query
{
    private $query;
    private $user;
    private $password;

    public function __construct($user, $password, $query)
    {
        $this->user = $user;
        $this->password = $password;
        $this->query = $query;
    }
    function query($type)
    {
        try{
            $powerQuery = new powerQuery($this->user,$this->password,$this->query);
            return $powerQuery->pQUserInfo($type);
        }
        catch(Exception $e)
        {
            return 'error';
        }
    }
}
class userProfileManagement
{
    protected $user;
    protected $password;

    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

}
class createAccount
{
    private $newUser;
    private $newUserPassword;
    private $user;
    private $password;
    
    public function __construct($user, $password, $newUser, $newUserPassword)
    {
        $this->user = $user;
        $this->password = $password;
        $this->newUser = $newUser;
        $this->newUserPassword = $newUserPassword;
    }
    function sendNewAccount()
    {
        $firstCheck = "SELECT user_id from user_info.user_access where user_id='$this->newUser'";
        $pQ = new query($this->user, $this->password, $firstCheck);
        if($pQ->query(1) === null)
        {
            $query = "INSERT INTO user_info.user_access (user_id, user_password) VALUES ('$this->newUser', '$this->newUserPassword')";
            $pQTwo = new query($this->user, $this->password,$query);
            if($pQTwo->query(2) === TRUE)
            {
                echo 'User Created';
            } else {
                echo 'User unable to be created; review User_Info';
            }
        } else {
            echo 'User ID already exists; please enter a different ID';
        }
    }

}
class deleteAccount
{
    private $user;
    private $password;
    private $userDelete;

    public function __construct($user, $password, $userDelete)
    {
        $this->user = $user;
        $this->password = $password;
        $this->userDelete = $userDelete;
    }
    function sendDelete()
    {
        $firstCheck = "SELECT user_id from user_info.user_access where user_id='$this->userDelete'";
        $pQ = new query($this->user, $this->password,$firstCheck);
        if($pQ->query(1)[0] === $this->userDelete)
        {
            $query = "DELETE FROM user_info.user_access WHERE user_id='$this->userDelete'";
            $pQTwo = new query($this->user, $this->password,$query);
            if($pQTwo->query(2) === TRUE)
            {
                echo 'User Deleted';
            } else {
                echo 'User unable to be deleted; review User_Info';
            }
        } else {
            echo 'User ID not found; please enter a different ID';
        }
    }

}
class updateAccount
{
    private $newPassword;
    private $password;
    private $user;

    public function __construct($user, $password, $newPassword)
    {
        $this->user = $user;
        $this->password = $password;
        $this->newPassword = $newPassword;
    }
    function sendUpdate()
    {
        $firstCheck = "SELECT user_password from user_info.user_access where user_id = '$this->user'";
        $pQ = new query('verifyaccess','33GUk2R3cfvaXaly',$firstCheck);
        if($pQ->query(1)[0] !== $this->newPassword)
        {
            $query = "UPDATE user_info.user_access SET user_password = '$this->newPassword' WHERE user_id = '$this->user'";
            $pQTwo = new query('verifyaccess','33GUk2R3cfvaXaly',$query);
            if($pQTwo->query(2) === TRUE)
            {
                echo 'Password Updated';
            } else {
                echo 'Password unable to be updated; review tables';
            }
        } else {
            echo 'Password matches current password; please enter a different password';
        }
    }
}