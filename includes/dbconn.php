<?php

$host = "192.168.52.1";

$user = "kriangsak_admin";

$pwd = "qazwsxedc123";

global $name_system; 
$name_system = "Kantharraom Hospital";

$db = "ipd_paperless";
$provincecode = "33";
$provincename = "ศรีสะเกษ";

//by toei
global $date;
$date = "20180930000000";

//$db = "z_data";
global $link;
//$link = mysql_connect($host,$user,$pwd) or die ("Could not connect to MySQL");

$link = mysqli_connect($host,$user,$pwd,$db);

//mysql_query("SET NAMES tis620",$link);
mysqli_query($link,"SET NAMES utf8");
//mysql_select_db($link,$db) or die ("Could not select $db database");	

//----ค่ากำหนด
$titleweb = "ระบบติดตาม KPI รพ.กันทรารมย์"; //

global $txttitle;
$txttitle="KPI System";


$hcon = 350;
$todays = date("Y-m-d");
$dtimenow = date("Y-m-d H:i:s");
$ThaiMonth = array( "มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
$ThaiSubMonth = array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");

function retDatets($add){ //แปลงค่าวันที่ จาก 2009-12-01  เป็น  01/12/2552  
		$strd = substr($add,8,2);
		$strm = substr($add,5,2);
		$stryT = substr($add,0,4);
		$stry = $stryT + 543;
		$str = $strd."/".$strm."/".$stry;
		return $str;
}
 
 function retDate($add){ //แปลงค่าวันที่ จาก 01/12/2552 เป็น 2009-12-01
		$strd = substr($add,0,2);
		$strm = substr($add,3,2);
		$stryT = substr($add,6,4);
		$stry = $stryT - 543;
		$str = $stry."-".$strm."-".$strd;
		return $str;
}
function txtStatus($st){
	if($st == '0'){return "ปิด";}	
	if($st == '1'){return "เปิด";}	
}
//ระดับตัวชี้วัด
function levelstg($ls){
	if($ls == '0'){return "จังหวัด";}
	if($ls == '1'){return "อำเภอ";}
	if($ls == '2'){return "หน่วยงาน";}		
}
//ค่าดี
function goodvalue($id){
	if($id == '0'){return "มาก";}
	if($id == '1'){return "น้อย";}
}
function getKpiId(){
	$sql = "select max(kpi_id) as m from kpi";
	$result=mysqli_query($link,$sql);
	$rs=mysqli_fetch_array($result);
	$n = $rs[m];
	return $n;
}
function getMembername($name){
	$sql = "SELECT username,CONCAT(title,fname,' ',lname) AS surname FROM user WHERE username='$name'";
	$result=mysqli_query($link,$sql);
	$rs=mysqli_fetch_array($result);
	$n = $rs[surname];
	return $n;	
}

function getAmphurname($ampcode){
	$sql = "SELECT amphurname FROM amphur WHERE amphurcode='$ampcode'";
	$result=mysqli_query($link,$sql);
	$rs=mysqli_fetch_array($result);
	$n = $rs[amphurname];
	return $n;	
}

?>
