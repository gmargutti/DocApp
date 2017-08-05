<?php
require_once("user.php");
class LoginDAO{

function getUser($user){
  $conn = new mysqli('localhost', 'pma', '', 'game_test');
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
