<?php
require_once('user.php');
require_once('DAO/LoginDAO.php');
class LoginControl{
  function validateLogin($user){
    $dao = new LoginDAO();
      //$user_Request = $dao->getUser($user);
      $user_test = new User("gmargutti", "333");
      if($user->getPw() == $user_test->getPw()){
        return true;
      }
      else{
        return false;
      }
  }

}
?>
