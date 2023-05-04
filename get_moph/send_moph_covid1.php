<?php
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
		$data = array('hospital'=>array(
    'hospital_code'=> '10928',
    'hospital_name'=> '??????????,?.',
    'his_identifier'=> 'HIMPro HIS V.2.64'
  ));
?>
