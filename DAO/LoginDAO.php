<?php
require_once("user.php");
require_once("DAO/ConnMySQL.php");
class LoginDAO{

function getUser($user){
  $mysqlCnx = new ConnMySQL();
  $conn = $mysqlCnx->getConn();
  if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
  }
  $sql = $conn->prepare("SELECT password from user WHERE username = ?");
  $login = $user->getLogin();
  $sql->bind_param("s", $login);
  $sql->execute();
  $sql->bind_result($password);
  $sql->fetch();
  $user->setPassword($password);
  $sql->close();
  $conn->close();
  return $user;
}

}
 ?>
