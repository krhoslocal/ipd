<?php

class auThen
{
    public function chkLogin()
    {
        session_start();
        if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = True)) {
            header('Location: login.html');
            exit;
        }
    }


}

?>