<?php
$hostname_dbnurse = "192.168.52.1";
$database_dbnurse = "que_card";
$username_dbnurse = "kriangsak_admin";
$password_dbnurse = "qazwsxedc123";
$dbnurse = mysqli_connect($hostname_dbnurse, $username_dbnurse, $password_dbnurse) or trigger_error(mysqli_error(),E_USER_ERROR); 
mysqli_select_db($dbnurse,$database_dbnurse);
mysqli_set_charset($dbnurse,"utf8");
date_default_timezone_set("Asia/Bangkok");

?>