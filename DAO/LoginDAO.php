<?php
require_once ("user.php");
require_once ("DAO/ConnMySQL.php");

class LoginDAO
{
    private $mysqlCnx;
    function __construct(){
        $this->mysqlCnx = new ConnMySQL();
    }

    function getUser(User $user)
    {
        $conn = $this->mysqlCnx->getConn();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $user2 = new User($user->getLogin(), $user->getPassword());
        $row = $this->getUserRow($user2);
        if (!is_null($row)) {
            $user2->setPassword($row['Password']);
            $user2->setId($row['ID']);
        }
        else{
            $user2 = new User('', '');
        }
        return $user2;
    }
    
    public function userExists(User $user){
        $conn = $this->mysqlCnx->getConn();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $row = $this->getUserRow($user);
        if(!is_null($row)){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function registerUser(User $user){
        $conn = $this->mysqlCnx->getConn();
        $sql = $conn->prepare("INSERT INTO USER (Username, Password) VALUES (?, ?)");
        $sql->bind_param("ss", $user->getLogin(), $user->getPassword());
        $sql->execute();
    }
    private function getUserRow(User $user){
        $conn = $this->mysqlCnx->getConn();
        $sql = $conn->prepare("SELECT ID, Username, Password from user WHERE Username = ?");
        $login = $user->getLogin();
        $sql->bind_param("s", $login);
        $sql->execute();
        $result = $sql->get_result();
        $row = $result->fetch_assoc();
        $sql->close();
        $result->close();
        $conn->close();
        if (!is_null($row)) {
            return $row;
        }
        else{
            return null;
        }
    }
}
?>
