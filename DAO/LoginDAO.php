<?php
require_once("user.php");
require_once("DAO/ConnMySQL.php");
class LoginDAO{

function getUser(User $user){
  $mysqlCnx = new ConnMySQL();
  $conn = $mysqlCnx->getConn();
  if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
  }
  $user2 = new User($user->getLogin(), $user->getPw());
  $sql = $conn->prepare("SELECT password from user WHERE username = ?");
  $login = $user->getLogin();
  $sql->bind_param("s", $login);
  $sql->execute();
  $sql->bind_result($password);
  $sql->fetch();
  $user2->setPassword($password);
  $sql->close();
  $conn->close();
  return $user2;
}

}
 ?>
