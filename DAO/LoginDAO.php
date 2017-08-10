<?php
require_once ("user.php");
require_once ("DAO/ConnMySQL.php");

class LoginDAO
{

    function getUser(User $user)
    {
        $mysqlCnx = new ConnMySQL();
        $conn = $mysqlCnx->getConn();
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }
        $user2 = new User($user->getLogin(), $user->getPw());
        $sql = $conn->prepare("SELECT ID, Username, Password from user WHERE Username = ?");
        $login = $user->getLogin();
        $sql->bind_param("s", $login);
        $sql->execute();
        $result = $sql->get_result();
        $row = $result->fetch_assoc();
        if (!is_null($row)) {
            $user2->setPassword($row['Password']);
            $user2->setId($row['ID']);
        }
        else{
            $user2 = new User('', '');
        }
        $sql->close();
        $result->close();
        $conn->close();
        return $user2;
    }
}
?>
