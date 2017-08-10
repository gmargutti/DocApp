<?php
  class User
  {
    private $login = "";
    private $password = "";
    private $id = 0;
    function __construct($user_login, $user_pw)
    {
      $this->login = $user_login === NULL ? "" : $user_login;
      $this->password = $user_pw === NULL ? "" : $user_pw;
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
    function getPw(){
      return $this->password;
    }
    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    
  }
?>
