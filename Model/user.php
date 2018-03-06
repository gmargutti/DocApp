<?php

class User
{

    private $login = "";

    private $password = "";

    private $id = 0;

    private $token = "";

    private $nome = "";

    private $dataNascimento = "";

    private $RG = 0;

    private $CPF = 0;

    private $logradouro = "";

    function __construct($user_login = "", $user_pw = "", $user_Token = "", $user_Nome = "", $user_DataNascimento = "", $user_RG = 0, $user_CPF = 0, $user_Logradouro = "")
    {
        $this->login = $user_login === NULL ? "" : $user_login;
        $this->password = $user_pw === NULL ? "" : $user_pw;
        $this->id = 0;
        $this->token = $user_Token;
        $this->nome = $user_Nome;
        $this->dataNascimento = $user_DataNascimento;
        $this->RG = $user_RG;
        $this->CPF = $user_CPF;
        $this->logradouro = $user_Logradouro;
    }

    function setLogin($user_login)
    {
        $this->login = $user_login === NULL ? "" : $user_login;
    }

    function setPassword($user_pw)
    {
        $this->password = $user_pw === NULL ? "" : $user_pw;
    }

    function getLogin()
    {
        return $this->login;
    }

    function getPassword()
    {
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

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function getRG()
    {
        return $this->RG;
    }

    public function getCPF()
    {
        return $this->CPF;
    }

    public function getLogradouro()
    {
        return $this->logradouro;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function setRG($RG)
    {
        $this->RG = $RG;
    }

    public function setCPF($CPF)
    {
        $this->CPF = $CPF;
    }

    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }
}
?>
