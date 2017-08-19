<?php
set_include_path("F:/PHP/DocApp");
include 'Control/LoginControl.php';
session_start();
if(isset($_COOKIE['Data'])){
    $loginControl = new LoginControl();
    $data = explode('$', $_COOKIE['Data'], 2);
    if($loginControl->validateToken(intval($data[0]), $data[1])){
        $_SESSION['logged'] = true;
        header('Location: ' . $_SESSION['from']);
        die();
    }
    else{
        $_SESSION['logged'] = false;
        header('Location: ' . $_SESSION['from']);
        die();
    }
} else{
    $_SESSION['logged'] = false;
    header('Location: ' . $_SESSION['from']);
    die();
}
?>