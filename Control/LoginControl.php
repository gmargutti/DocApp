<?php
require_once ('user.php');
include('DAO/LoginDAO.php');
include 'Util/Random.php';
include 'Util/Time.php';
class LoginControl
{

    function validateLogin(User &$user)
    {
        $dao = new LoginDAO();
        $user_Request = $dao->getUser($user);
        if (password_verify($user->getPassword(), $user_Request->getPassword())){
            $user = $user_Request;
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
            $user->setToken(Random::generateString());
            $dao->registerUser($user);
        }
    }
    
    public function validateToken(int $id, string $token){
        $user = new User();
        $user->setId($id);
        $user->setToken($token);
        $dao = new LoginDAO();
        $db_Token = $dao->getToken($id);
        $valid = false;
        if($db_Token === $token){
            $newToken = Random::generateString();
            $dao->updateToken($id, $newToken);
            setcookie('Data', $id . '$' . $newToken, Time::addTime("m", 1), '/');
            $valid = true;
        }
        return $valid;
    }
    
    public function updateTokenByLogin(User $user){
        $dao = new LoginDAO();
        $newToken = Random::generateString();
        $dao->updateTokenByLogin($user, $newToken);
        setcookie('Data', $user->getId() . '$' . $newToken, Time::addTime("m", 1), '/');
    }
}
?>
