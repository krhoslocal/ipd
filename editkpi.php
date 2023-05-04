<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include("authen.php");
$obj = new auThen();
$obj->chkLogin();


$target=$_POST['kpi_target'];
$result = $_POST['kpi_result'];
$rate = $_POST['kpi_rate'];
$tar = $_POST['kpi_tar'];
$scale = $_POST['kpi_scale'];
$id=$_POST['kpi_id'];
$kpi_type_data=$_POST['kpi_type_data'];

if($kpi_type_data=='0'){
    if($rate >= $target){
        $flag_update='1';
    }else{
        $flag_update='0';
    }
}else{
    if($rate <= $target){
        $flag_update='1';
    }else{
        $flag_update='0';
    }
}

include("condb.php");
$sql = "UPDATE kpi SET kpi_data=?, kpi_result=?, kpi_rate=?, kpi_tar=?, kpi_scale=?,flag_result=? WHERE kpi_id=?";
try {
$pdo->prepare($sql)->execute([$target, $result, $rate, $tar, $scale, $flag_update,$id]);
} catch (PDOException $ex) {
    echo  $ex->getMessage();
}

header('Location: kpi_edit.php');
?>