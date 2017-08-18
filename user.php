<?php
  class User
  {
    private $login = "";
    private $password = "";
    private $id = 0;
    private $token = "";
    function __construct($user_login = "", $user_pw = "")
    {
      $this->login = $user_login === NULL ? "" : $user_login;
      $this->password = $user_pw === NULL ? "" : $user_pw;
      $this->id = 0;
    }
    function setLogin($user_login){
      $this->login = $user_login === NULL ? "" : $user_login;
    }
    function setPassword($user_pw){
      $this->password = $user_pw === NULL ? "" : $user_pw;
    }
    function getLogin(){
      return $this->login;
    }
    function getPassword(){
      return $this->password;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setToken($token){
        $this->token = $token;
    }
    public function getToken(){
        return $this->token;
    }
  }
?>
