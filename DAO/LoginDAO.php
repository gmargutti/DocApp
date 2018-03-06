<?php
require_once ("Model/user.php");
require_once ("DAO/ConnMySQL.php");

class LoginDAO
{

    private $mysqlCnx;

    function __construct()
    {
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
        if (! is_null($row)) {
            $user2->setPassword($row['Password']);
            $user2->setId($row['ID']);
            $user2->setToken($row['Token']);
            $user2->setNome($row['Nome']);
        } else {
            $user2 = new User('', '');
        }
        return $user2;
    }

    public function userExists(User $user)
    {
        $conn = $this->mysqlCnx->getConn();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $row = $this->getUserRow($user);
        if (! is_null($row)) {
            return true;
        } else {
            return false;
        }
    }

    public function registerUser(User $user)
    {
        $conn = $this->mysqlCnx->getConn();
        $sql = $conn->prepare("INSERT INTO user (Username, Password, Token, Nome, DataNascimento, RG, CPF, Logradouro) VALUES (?, ?, ?, ? , ?, ?, ?, ?)");
        $user_login = $user->getLogin();
        $user_Password = $user->getPassword();
        $user_Token = $user->getToken();  
        $user_Nome = $user->getNome();
        $user_DataNascimento = $user->getDataNascimento();
        $user_RG = $user->getRG();
        $user_CPF = $user->getCPF();
        $user_Logradouro = $user->getLogradouro();
        $sql->bind_param("sssssiis", $user_login, $user_Password, $user_Token, $user_Nome, $user_DataNascimento, $user_RG, $user_CPF, $user_Logradouro);
        $sql->execute();
        $sql->close();
        $conn->close();
    }

    private function getUserRow(User $user)
    {
        $conn = $this->mysqlCnx->getConn();
        $sql = $conn->prepare("SELECT ID, Username, Password, Token, Nome from user WHERE Username = ?");
        $login = $user->getLogin();
        $sql->bind_param("s", $login);
        $sql->execute();
        $result = $sql->get_result();
        $row = $result->fetch_assoc();
        $sql->close();
        $result->close();
        $conn->close();
        if (! is_null($row)) {;
            return $row;
        } else {
            return null;
        }
    }

    public function updateToken(int $id, string $newToken)
    {
        $conn = $this->mysqlCnx->getConn();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $sql = $conn->prepare("UPDATE user SET Token = ? WHERE ID = ?");
        $sql->bind_param("si", $newToken, $id);
        $sql->execute();
        $sql->close();
        $conn->close();
    }

    public function getToken(int $id)
    {
        $conn = $this->mysqlCnx->getConn();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $sql = $conn->prepare("SELECT Token, Nome FROM user WHERE ID = ?");
        $sql->bind_param("s", $id);
        $sql->execute();
        $result = $sql->get_result();
        $row = $result->fetch_assoc();
        $sql->close();
        $result->close();
        $conn->close();
        if (! is_null($row)) {;
        return $row;
        } else {
            return null;
        }
    }

    public function updateTokenByLogin(User $user, string $newToken)
    {
        $conn = $this->mysqlCnx->getConn();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $sql = $conn->prepare("UPDATE user SET Token = ? WHERE Username = ?");
        $sql->bind_param("ss", $newToken, $user->getLogin());
        $sql->execute();
    }
    
    public function getSitePages(){
        $conn = $this->mysqlCnx->getConn();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $sql = $conn->prepare("SELECT Description, URI FROM site_pages WHERE Parent = 0");
        $sql->execute();
        $result = $sql->get_result();
        while(($row = $result->fetch_assoc()) !== NULL){
            $rows[] = $row;
        }
        $sql->close();
        $result->close();
        $conn->close();
        if (! is_null($rows)) {;
        return $rows;
        } else {
            return null;
        }
    }
}
?>
