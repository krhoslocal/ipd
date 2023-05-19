<?php
require_once("condb.php");
$user=$_POST['txt_user'];
$passwd=$_POST['txt_password'];

$stmt = $pdo->prepare("SELECT a.*,a.p_moph_encode AS gen_key from tb_member AS a WHERE a.mem_user = ? and  a.mem_password = ?");
$stmt_version = $pdo->prepare("SELECT * from rb_version where v_no='1'");


$stmt->execute([$user, $passwd]);
$stmt_version->execute();
//-----
$row = $stmt->fetch();
$_getrow = $stmt_version->fetch();

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
    $_SESSION['_p_moph'] = $row['gen_key'];
    $_SESSION['_cid'] = $row['cid'];


    $_SESSION['_version'] = $_getrow['v_version'];
    $_SESSION['_namesystem'] = $_getrow['v_name_system'];

    $url_gen = 'https://cvp1.moph.go.th/token?Action=get_moph_access_token&user=3330300561034&password_hash=BD3E770402B718DC7D4804BB13489CF73C3E3AE8F26AA6C4CBB911F91C060878&hospital_code=10928';
		//$url = 'https://cvp1.moph.go.th/api/SendMessageTraget';
        $ch_gen = curl_init($url_gen);       
        curl_setopt($ch_gen, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt($ch_gen, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch_gen, CURLOPT_POST, 1);                                                                  
        curl_setopt($ch_gen, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch_gen, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch_gen, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch_gen, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json')                                                                       
        );
		
        curl_setopt($ch_gen, CURLOPT_SSLVERSION, 'all');                                                                                                                                                                                                                
        $api_key = curl_exec($ch_gen);

        $url_gen_public = 'https://cvp1.moph.go.th/token?Action=get_public_key';
		//$url = 'https://cvp1.moph.go.th/api/SendMessageTraget';
        $ch_gen_public = curl_init($url_gen_public);       
        curl_setopt($ch_gen_public, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt($ch_gen_public, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch_gen_public, CURLOPT_POST, 1);                                                                  
        curl_setopt($ch_gen_public, CURLOPT_CUSTOMREQUEST, "POST");                                                                  
        curl_setopt($ch_gen_public, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch_gen_public, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json')                                                                       
        );
		
        curl_setopt($ch_gen_public, CURLOPT_SSLVERSION, 'all');                                                                                                                                                                                                                
        curl_exec($ch_gen_public);

        $_SESSION['_api_key'] = $api_key;

        
        
    header("Location: index2.php?g_no=3");
}else{
    header("Location: login.php?msg=1");
}
