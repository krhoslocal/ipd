<?php

session_start();
unset($_SESSION['username']);
unset( $_SESSION['mem_name']);
unset( $_SESSION['level']);
unset( $_SESSION['loggedin']);
header("Location:index.php");

?>