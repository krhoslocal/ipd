<?php
$host = '192.168.52.1';
$db   = 'ipd_paperless';
$user = 'kriangsak_admin';
$pass = 'qazwsxedc123';


$dsn = "mysql:host=$host;dbname=$db;";

try {
	 
     $pdo = new PDO($dsn, $user, $pass);
	 $pdo->exec("set names utf8");
	
} catch (PDOException $e) {
     throw new PDOException($e->getMessage(), (int)$e->getCode());
}

?>