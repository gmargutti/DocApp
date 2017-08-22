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
            $user2->setToken($row['Token']);
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
        $sql = $conn->prepare("INSERT INTO USER_LOGIN (Username, Password, Token) VALUES (?, ?, ?)");
        $user_Login = $user->getLogin();
        $user_Password = $user->getPassword();
        $user_Token = $user->getToken();
        $sql->bind_param("sss", $user_Login, $user_Password, $user_Token);
        $sql->execute();
    }
    private function getUserRow(User $user){
        $conn = $this->mysqlCnx->getConn();
        $sql = $conn->prepare("SELECT ID, Username, Password, Token from USER_LOGIN WHERE Username = ?");
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
    
    public function updateToken(int $id, string $newToken){
        $conn = $this->mysqlCnx->getConn();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $sql = $conn->prepare("UPDATE USER_LOGIN SET Token = ? WHERE ID = ?");
        $sql->bind_param("si", $newToken, $id);     
        $sql->execute();
    }
    
    public function getToken(int $id){
        $conn = $this->mysqlCnx->getConn();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $sql = $conn->prepare("SELECT Token FROM USER_LOGIN WHERE ID = ?");
        $sql->bind_param("s", $id);
        $sql->execute();
        $result = $sql->get_result();
        $row = $result->fetch_assoc();
        return $row['Token'];
    }
    
    public function updateTokenByLogin(User $user, string $newToken){
        $conn = $this->mysqlCnx->getConn();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $sql = $conn->prepare("UPDATE USER_LOGIN SET Token = ? WHERE Username = ?");
        $sql->bind_param("ss", $newToken, $user->getLogin());
        $sql->execute();
    }
}
?>
