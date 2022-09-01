<?php

class Login
{

    static function logedin()
    {
        return isset($_SESSION['login']) ? true : false;
    }
    static function logout()
    {
        // session_destroy();
        unset($_SESSION['login']);

        // setcookie("remember", true, time()-1, '/');
        header('Location: ' . HOME_URL);
        die();
    }
}
