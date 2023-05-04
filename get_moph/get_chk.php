<?php
header('Content-Type: application/json; charset=tis-620');
include_once('../includes/dbconn.php');

$url_gen = 'https://cvp1.moph.go.th/token?Action=get_moph_access_token&user=3330300561034&password_hash=BD3E770402B718DC7D4804BB13489CF73C3E3AE8F26AA6C4CBB911F91C060878&hospital_code=10928';
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
		
        curl_setopt($ch, CURLOPT_SSLVERSION, 'all');                                                                                                                                                                                                                        
        $api_key = curl_exec($ch_gen);



$itransaction_uid ='';
$itransaction_uid = $_GET['transaction_uid'];
    $url = 'https://claim-nhso.moph.go.th/api/v1/opd/service-transactions/'.$itransaction_uid.'/status';
        $ch = curl_init($url);       
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);                                                                  
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',
			'Authorization: Bearer '.$api_key                                                                             
           )                                                                       
        );
        curl_setopt($ch, CURLOPT_SSLVERSION, 'all');                                                                                                                   
                                                                                                                            
        $result = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);

    $data_string = json_decode($result,true, JSON_UNESCAPED_UNICODE);
    //echo $data_string[data];

    if($data_string[status] == '200')
                { 
                    include('../includes/dbcon.php');
                    $_itransaction_uid = $data_string[data][transaction_uid];
                    $_ipid = $data_string[data][pid];
                    $_iresult = $data_string[data][status];
                    $_istatus_th = $data_string[data][status_th];
                    $sql = "REPLACE INTO claim_moph.target_confirm (transaction_uid, pid, status, status_thai) VALUES ('$_itransaction_uid', '$_ipid', '$_iresult','$_istatus_th');";
                    //echo $sql;
                    mysqli_query($dbnurse,$sql);
                    echo "true";
                } else { 
                    echo "false";
	            } 
	curl_close($ch);
    
	?>