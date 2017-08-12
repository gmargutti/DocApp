<?php
require_once ('user.php');
include('DAO/LoginDAO.php');

class LoginControl
{

    function validateLogin(User $user)
    {
        $dao = new LoginDAO();
        $user_Request = $dao->getUser($user);
        if (password_verify($user->getPassword(), $user_Request->getPassword())){
            return true;
        } else {
            return false;
        }
    }
    
    public function register(User $user){
        $dao = new LoginDAO();
        if($dao->userExists($user)){
            //erro - já existente
            echo 'Username is already taken';
        }
        else{
            $user->setPassword(password_hash($user->getPassword(), PASSWORD_BCRYPT));
            $dao->registerUser($user);
        }
    }
}
?>
