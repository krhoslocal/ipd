<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
 <?php 
include "include/config.php";
include "include/function.php";



$url="message=ระบบได้มีการนำเข้า Statment ประจำงวด XXX  โดยเจ้าหน้าที่งานประกันฯ กรุณาตรวจข้อมูล";
echo $url;
$chOne = curl_init();  

curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
// SSL USE 
curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
//POST 
curl_setopt( $chOne, CURLOPT_POST, 1); 
// Message 
curl_setopt( $chOne, CURLOPT_POSTFIELDS, $url); 
//?????????????? ?????? 2 parameter imageThumbnail ???imageFullsize
//curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=Warning Monitor Microtik System&imageThumbnail=http://www.wisadev.com/wp-content/uploads/2016/08/cropped-wisadevLogo.png&imageFullsize=http://www.wisadev.com/wp-content/uploads/2016/08/cropped-wisadevLogo.png"); 
//follow redirects 
curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1); 
//ADD header array 
$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer McjFLLZZzedcFprFmBJFV4sgFLhSAFsyhWklAC7mZjf', ); 
curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
//RETURN 
curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
$result = curl_exec( $chOne ); 

//Check error 
if(curl_error($chOne)) { 
	echo 'error:' . curl_error($chOne); 
} else { 
	$result_ = json_decode($result, true); 
	echo "status : ".$result_['statuss']; 
	echo "messagess : ". $result_['messagess'].$_GET['page']." Is down"; 
	} 
//Close connect 
curl_close( $chOne ); ?>
<body>
</body>
</html>
