<?php
$host = "122.154.141.230";
$user = "root";
$pwd = "std_18tables";
$db = "cockpit57";
global $link;
$link = mysql_connect($host,$user,$pwd) or die ("Could not connect to MySQL");
//mysql_query("SET NAMES tis620",$link);
mysql_query("SET NAMES UTF8",$link);
mysql_select_db($db,$link) or die ("Could not select $db database");	

//----ค่ากำหนด
$titleweb = "cockpit by kriwoot 0.01"; //

$txttitle="Cockpit PROV Ver 1.5";
$txtlogo1="COCKPIT";
$txtlogo2="ระบบข้อมูลตัวชี้วัดสำนักงานสาธารณสุขจังหวัดอำนาจเจริญ ปี ๒๕๕๗";
$provincecode = "37";
if(!$_SESSION['username']){
	$cklogin = "<a href='login.php'>Login</a>";
}else{
	$cklogin = "<a href='logout.php'>Logout</a>";
	$userlogin = "User Login : <b>".$_SESSION['namesur']."</b><br>";
}
if($_SESSION['level'] == '4'){
	$menulevel = "| <a href='admin.php'>Admin</a> | <a href='strategy.php'>member</a>";
	$topmenu ="<a href='index.php'>หน้าแรก</a> | <a href='admin.php'>กลุ่มหลักตัวชี้วัด</a> 
						| <a href='strategy.php'>กลุ่มตัวชี้วัด</a> | <a href='kpi.php'>ตัวชี้วัด </a>| <a href='output.php'>บันทึกผลงาน </a> | <a href='member.php'>ผู้ใช้งาน</a>";
}else if($_SESSION['level'] == '3'){
	$menulevel = "| <a href='strategy.php'>member</a>";
	$topmenu ="<a href='index.php'>หน้าแรก</a> | <a href='strategy.php'>กลุ่มตัวชี้วัด</a> | <a href='kpi.php'>ตัวชี้วัด</a> | <a href='output.php'>บันทึกผลงาน </a>";
}else if($_SESSION['level'] == '2'){
	$menulevel = "| <a href='index.php'>output</a>";
	$topmenu ="<a href='index.php'>หน้าแรก</a> | <a href='output.php'>บันทึกผลงาน </a>";
}else{
	$menulevel = "";
}
$foottext = "<p>$userlogin<a href='index.php'>Home</a>$menulevel | $cklogin<br />
                                พัฒนาโดย : เขตบริการสุขภาพที่ ๑๐ และ ๘ </p>";

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
	$result=mysql_query($sql);
	$rs=mysql_fetch_array($result);
	$n = $rs[m];
	return $n;
}
function getMembername($name){
	$sql = "SELECT username,CONCAT(title,fname,' ',lname) AS surname FROM user WHERE username='$name'";
	$result=mysql_query($sql);
	$rs=mysql_fetch_array($result);
	$n = $rs[surname];
	return $n;	
}

function getAmphurname($ampcode){
	$sql = "SELECT amphurname FROM amphur WHERE amphurcode='$ampcode'";
	$result=mysql_query($sql);
	$rs=mysql_fetch_array($result);
	$n = $rs[amphurname];
	return $n;	
}

?>
