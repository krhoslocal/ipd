<?php
require_once("condb.php");
$user=$_POST['txt_user'];
$passwd=$_POST['txt_password'];

$stmt = $pdo->prepare("select * from tb_member where mem_user = ? and  mem_password = ?");

$stmt->execute([$user, $passwd]);

$row = $stmt->fetch();

if($stmt->rowCount() == 1 ){
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $row['mem_user'];
    $_SESSION['mem_id'] = $row['mem_id'];
    $_SESSION['mem_name'] = $row['mem_name'];
    $_SESSION['level'] = $row['mem_level'];
	$_SESSION['level'] = $row['mem_level'];
	$_SESSION['_tocard'] = $row['_tocard'];
	$_SESSION['_toadm'] = $row['_toadm'];
	$_SESSION['_tomaster'] = $row['_tomaster'];
    header("Location: index2.php?g_no=3");
}else{
    header("Location: login.php?msg=1");
}


?>