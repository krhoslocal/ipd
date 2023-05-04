<?php
header('Content-Type: application/json; charset=utf8');
$url_gen = 'https://cvp1.moph.go.th/token?Action=get_moph_access_token&user=3330300561034&password_hash=BD3E770402B718DC7D4804BB13489CF73C3E3AE8F26AA6C4CBB911F91C060878&hospital_code=10928';
		//$url = 'https://cvp1.moph.go.th/api/SendMessageTraget';
        $ch_gen = curl_init($url_gen);       
        curl_setopt($ch_gen, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt($ch_gen, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch_gen, CURLOPT_POST, 1);                                                                  
        curl_setopt($ch_gen, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
        curl_setopt($ch_gen, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch_gen, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch_gen, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json')                                                                       
        );
		
        curl_setopt($ch_gen, CURLOPT_SSLVERSION, 'all');                                                                                                                                                                                                                
        $api_key = curl_exec($ch_gen);

$action = $_GET['action'];		
if ($action == "getstatus") {
$stransaction_uid = $_GET['transaction_uid'];	
include('../includes/dbcon.php');	
//$sqlp = $pdo->query('SELECT * FROM claim_moph.target a WHERE a.regdate=2022-12-29 AND a.hn=0000697');
//$row_q = $sqlp->fetch();
$query_smsg = "SELECT a.hn,a.visit_date,a.is_used_dm,a.is_used_ht,a.transaction_uid
	 FROM claim_moph.claim_dmht_data a
		WHERE a.transaction_uid='$stransaction_uid'";
	$r_smsg = mysqli_query($dbnurse,$query_smsg);
	$row_r_smsg = mysqli_fetch_array($r_smsg);

        $url = 'https://claim-nhso.moph.go.th/api/v1/opd/service-transactions/'.$row_r_smsg['transaction_uid'].'/status';
        $ch = curl_init($url);       
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 400);                                                                   
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                   
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string_exi);    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                              
            'Content-Type: application/json',
			'Authorization: Bearer '.$api_key)                                                                       
        );
        curl_setopt($ch, CURLOPT_SSLVERSION, 'all');                                                                                                                   
                                                                                                                            
        $result = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);

		//$data_string_p = json_encode($result);
		

	$data_string = json_decode($result,true);
   // $transaction_uid_e = $data_string[data][status_th];	
		mysqli_close();
curl_close($ch);  

//end loop if
}

			echo $data_string['data']['transaction_uid'];
			//echo $get_token;				

?>