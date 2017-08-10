<?php
require_once ('user.php');
require_once ('DAO/LoginDAO.php');

class LoginControl
{

    function validateLogin(User $user)
    {
        $dao = new LoginDAO();
        $user_Request = $dao->getUser($user);
        if($user->getPw() == $user_Request->getPw()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
