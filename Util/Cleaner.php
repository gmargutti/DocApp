<?php 
    class Cleaner{
        public static function clean(){
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION = array();
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                    );
            }
            unset($_COOKIE['Data']);
            setcookie('Data', null, -1, '/');
            session_destroy();
        }
    }
?>