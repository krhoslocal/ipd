<?php
session_start();
header('Content-Type: application/json; charset=utf8');

// $url_gen = 'https://cvp1.moph.go.th/token?Action=get_moph_access_token&user=3330300561034&password_hash=BD3E770402B718DC7D4804BB13489CF73C3E3AE8F26AA6C4CBB911F91C060878&hospital_code=10928';
// 		$url = 'https://cvp1.moph.go.th/api/SendMessageTraget';
//        $ch_gen = curl_init($url_gen);       
//        curl_setopt($ch_gen, CURLOPT_SSL_VERIFYHOST, 0); 
//        curl_setopt($ch_gen, CURLOPT_SSL_VERIFYPEER, 0);
//        curl_setopt($ch_gen, CURLOPT_POST, 1);                                                                  
//        curl_setopt($ch_gen, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
//        curl_setopt($ch_gen, CURLOPT_POSTFIELDS, $data_string);                                                                  
//        curl_setopt($ch_gen, CURLOPT_RETURNTRANSFER, true);                                                                      
//        curl_setopt($ch_gen, CURLOPT_HTTPHEADER, array(                                                                          
//            'Content-Type: application/json')                                                                       
//        );
		
//        curl_setopt($ch_gen, CURLOPT_SSLVERSION, 'all');                                                                                                                                                                                                                
//         //$api_key = curl_exec($ch_gen);
        $api_key = $_SESSION['_api_key'];

$action = $_GET['action'];		
if ($action == "DM") {

$silind_id = $_GET['ilind_id'];
$silind_regdate = $_GET['ilind_regdate'];	
$ssidilind_hn = $_GET['ilind_hn'];
include('../includes/dbcon.php');	
//$sqlp = $pdo->query('SELECT * FROM claim_moph.target a WHERE a.regdate=2022-12-29 AND a.hn=0000697');
//$row_q = $sqlp->fetch();
$query_smsg = "SELECT concat(a.regdate,'-',paa.hn,'-',claim_moph._gettypedm(a.hn,a.regdate)) AS seq,
		paa.hn AS hn,
		replace(paa.cardid,'-','') AS pid,
		claim_moph._gettypedm(a.hn,a.regdate) AS id_type,
		paa.pttitle AS title,
		paa.ptfname AS fname,
		paa.ptlname AS lname,
		paa.ptoccupat AS occupa,
		right(paa.married,'1') AS marriage,
		paa.ptdob AS dob,
		right(paa.ptsex,'1') AS sex,
		paa.ptnation AS nation,
		'1' AS uuc,
		(SELECT aa.codehos FROM hosdata.confighos aa LIMIT 1) AS hcode,
		(SELECT aa.nameHos FROM hosdata.confighos aa LIMIT 1) AS hospital_name,
		CONCAT(a.regdate,' ',a.timereg) AS visit_date_time,
		a.dxtype,a.diag,a.labcode,a.namelab,a.result_lab,a.type_group
	 FROM claim_moph.target a
	 left join pt.pt paa ON paa.hn=a.hn
		WHERE a.regdate='$silind_regdate' AND a.hn='$ssidilind_hn' AND type_group='DM'";
	$r_smsg = mysqli_query($dbnurse,$query_smsg);
	$row_r_smsg = mysqli_fetch_array($r_smsg);

$data = array(
			 			 	'seq'=> $row_r_smsg['seq'],
							'hn'=> $row_r_smsg['hn'],
							'pid'=> $row_r_smsg['pid'],
    'id_type' => '1',
							'title'=> $row_r_smsg['title'],
							'fname'=> $row_r_smsg['fname'],
							'lname'=> $row_r_smsg['lname'],
							'occupa'=> $row_r_smsg['occupa'],
							'marriage'=> $row_r_smsg['marriage'],
							'dob'=> $row_r_smsg['dob'],
							'sex'=> $row_r_smsg['sex'],
							'nation'=> $row_r_smsg['nation'],
							'uuc'=> '1',
							'hcode'=> $row_r_smsg['hcode'],
							'hospital_name'=> $row_r_smsg['hospital_name'],
							'visit_date_time'=> $row_r_smsg['visit_date_time'],
							'is_used_dm'=> '1',
							'is_used_ht'=> '0',
							'diagnosis' => [array(
									'dx_date_time' => $row_r_smsg['visit_date_time'],
									'icd10' => $row_r_smsg['diag'],
									'dx_type' => $row_r_smsg['dxtype']

							)],
							'claim_services' => [array(
									'name'=> $row_r_smsg['namelab'],
									'code'=> $row_r_smsg['labcode'],
									'lab_result'=> $row_r_smsg['result_lab']
							
							)]
					);


  $data_string_exi =  json_encode($data, JSON_UNESCAPED_UNICODE);   

        $url = 'https://claim-nhso.moph.go.th/api/v1/opd/service-admissions/dmht';
        $ch = curl_init($url);       
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 400);                                                                   
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                   
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

		$data_string_p = json_encode($result);
		

	$data_string = json_decode($result,true, JSON_UNESCAPED_UNICODE);
    $transaction_uid_e = $data_string[data][transaction_uid];
		if($data_string[status] == '200'){	 
			 $sql = "REPLACE INTO claim_moph.claim_dmht_data (seq, hn, visit_date, pid, id_type, uuc, hcode, hospital_name, visit_date_time, is_used_dm, transaction_uid, claim_code_response, claim_text_response, claim_datetime, claim_date, seq_ref) VALUES ('$row_r_smsg[seq]',
			 	'$row_r_smsg[hn]',
				'$row_r_smsg[visit_date_time]',
				'$row_r_smsg[pid]',
				'1',
				'1',
				'$row_r_smsg[hcode]',
				'$row_r_smsg[hospital_name]',
				'$row_r_smsg[visit_date_time]',
				'1',
				'$transaction_uid_e',
				'$data_string[status]',
				'$data_string[message_th]',
				'$row_r_smsg[visit_date_time]',
				'$row_r_smsg[visit_date_time]',
				'$row_r_smsg[seq]')";
		$query_g = mysqli_query($dbnurse,$sql);
		}else{
		
		$sql = "REPLACE INTO claim_moph.claim_dmht_data (seq, hn, visit_date, pid, id_type, uuc, hcode, hospital_name, visit_date_time, is_used_dm, transaction_uid, claim_code_response, claim_text_response, claim_datetime, claim_date, seq_ref) VALUES ('$row_r_smsg[seq]',
			 	'$row_r_smsg[hn]',
				'$row_r_smsg[visit_date_time]',
				'$row_r_smsg[pid]',
				'1',
				'1',
				'$row_r_smsg[hcode]',
				'$row_r_smsg[hospital_name]',
				'$row_r_smsg[visit_date_time]',
				'1',
				'$transaction_uid_e',
				'$data_string[status]',
				'$data_string[message_th]',
				'$row_r_smsg[visit_date_time]',
				'$row_r_smsg[visit_date_time]',
				'$row_r_smsg[seq]')";
			$query_g = mysqli_query($dbnurse,$sql);
		}
		mysqli_close();
curl_close($ch);  

//end loop if
}elseif ($action == "HT"){

$silind_id = $_GET['ilind_id'];
$silind_regdate = $_GET['ilind_regdate'];	
$ssidilind_hn = $_GET['ilind_hn'];
include('../includes/dbcon.php');	
$query_smsg = "SELECT concat(a.regdate,'-',paa.hn,'-',a.frequency) AS seq,
		paa.hn AS hn,
		replace(paa.cardid,'-','') AS pid,
		'1' AS id_type,
		paa.pttitle AS title,
		paa.ptfname AS fname,
		paa.ptlname AS lname,
		paa.ptoccupat AS occupa,
		right(paa.married,'1') AS marriage,
		paa.ptdob AS dob,
		right(paa.ptsex,'1') AS sex,
		paa.ptnation AS nation,
		'1' AS uuc,
		(SELECT aa.codehos FROM hosdata.confighos aa LIMIT 1) AS hcode,
		(SELECT aa.nameHos FROM hosdata.confighos aa LIMIT 1) AS hospital_name,
		CONCAT(a.regdate,' ',a.timereg) AS visit_date_time,
		a.dxtype,a.diag,a.type_group,
		if((SELECT labcode FROM claim_moph.target_lab bb WHERE bb.regdate=a.regdate AND bb.hn=a.hn AND bb.type_group='HT' AND labcode='32001') IS NULL,'0',(SELECT labcode FROM claim_moph.target_lab bb WHERE bb.regdate=a.regdate AND bb.hn=a.hn AND bb.type_group='HT' AND labcode='32001')) AS labcode_po,
		if((SELECT namelab FROM claim_moph.target_lab bb WHERE bb.regdate=a.regdate AND bb.hn=a.hn AND bb.type_group='HT' AND labcode='32001') IS NULL,'0',(SELECT namelab FROM claim_moph.target_lab bb WHERE bb.regdate=a.regdate AND bb.hn=a.hn AND bb.type_group='HT' AND labcode='32001')) AS namelab_po,
		if((SELECT result_lab FROM claim_moph.target_lab bb WHERE bb.regdate=a.regdate AND bb.hn=a.hn AND bb.type_group='HT' AND labcode='32001') IS NULL,'0',(SELECT result_lab FROM claim_moph.target_lab bb WHERE bb.regdate=a.regdate AND bb.hn=a.hn AND bb.type_group='HT' AND labcode='32001')) AS result_lab_po,
		if((SELECT labcode FROM claim_moph.target_lab bb WHERE bb.regdate=a.regdate AND bb.hn=a.hn AND bb.type_group='HT' AND labcode='32202') IS NULL,'0',(SELECT labcode FROM claim_moph.target_lab bb WHERE bb.regdate=a.regdate AND bb.hn=a.hn AND bb.type_group='HT' AND labcode='32202')) AS labcode_cr,
		if((SELECT namelab FROM claim_moph.target_lab bb WHERE bb.regdate=a.regdate AND bb.hn=a.hn AND bb.type_group='HT' AND labcode='32202') IS NULL,'0',(SELECT namelab FROM claim_moph.target_lab bb WHERE bb.regdate=a.regdate AND bb.hn=a.hn AND bb.type_group='HT' AND labcode='32202')) AS namelab_cr,
		if((SELECT result_lab FROM claim_moph.target_lab bb WHERE bb.regdate=a.regdate AND bb.hn=a.hn AND bb.type_group='HT' AND labcode='32202') IS NULL,'0',(SELECT result_lab FROM claim_moph.target_lab bb WHERE bb.regdate=a.regdate AND bb.hn=a.hn AND bb.type_group='HT' AND labcode='32202')) AS result_lab_cr
	 FROM claim_moph.target a
	 left join pt.pt paa ON paa.hn=a.hn
		WHERE a.regdate='$silind_regdate' AND a.hn='$ssidilind_hn' AND type_group='HT'";
	$r_smsg = mysqli_query($dbnurse,$query_smsg);
	$row_r_smsg = mysqli_fetch_array($r_smsg);
	$data = array(
			 			 	'seq'=> $row_r_smsg['seq'],
							'hn'=> $row_r_smsg['hn'],
							'pid'=> $row_r_smsg['pid'],
							'id_type'=> '1',
							'title'=> $row_r_smsg['title'],
							'fname'=> $row_r_smsg['fname'],
							'lname'=> $row_r_smsg['lname'],
							'occupa'=> $row_r_smsg['occupa'],
							'marriage'=> $row_r_smsg['marriage'],
							'dob'=> $row_r_smsg['dob'],
							'sex'=> $row_r_smsg['sex'],
							'nation'=> $row_r_smsg['nation'],
							'uuc'=> '1',
							'hcode'=> $row_r_smsg['hcode'],
							'hospital_name'=> $row_r_smsg['hospital_name'],
							'visit_date_time'=> $row_r_smsg['visit_date_time'],
							'is_used_dm'=> '0',
							'is_used_ht'=> '1',
							'diagnosis' => [array(
									'dx_date_time' => $row_r_smsg['visit_date_time'],
									'icd10' => $row_r_smsg['diag'],
									'dx_type' => $row_r_smsg['dxtype']

							)],
							'claim_services' => [
							  array(
									'name'=> $row_r_smsg['namelab_po'],
									'code'=> '32103',
									'lab_result'=> $row_r_smsg['result_lab_po']
							),array(
									'name'=> $row_r_smsg['namelab_cr'],
									'code'=> $row_r_smsg['labcode_cr'],
									'lab_result'=> $row_r_smsg['result_lab_cr']
							)]
			);



  $data_string_exi =  json_encode($data, JSON_UNESCAPED_UNICODE); 

        $url = 'https://claim-nhso.moph.go.th/api/v1/opd/service-admissions/dmht';
        $ch = curl_init($url);       
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 400);                                                                   
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                   
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

		$data_string_p = json_encode($result);
		

	$data_string = json_decode($result,true, JSON_UNESCAPED_UNICODE);
    $transaction_uid_e = $data_string[data][transaction_uid];
		if($data_string[status] == '200'){	 
			 $sql = "REPLACE INTO claim_moph.claim_dmht_data (seq, hn, visit_date, pid, id_type, uuc, hcode, hospital_name, visit_date_time, is_used_ht, transaction_uid, claim_code_response, claim_text_response, claim_datetime, claim_date, seq_ref) VALUES ('$row_r_smsg[seq]',
			 	'$row_r_smsg[hn]',
				'$row_r_smsg[visit_date_time]',
				'$row_r_smsg[pid]',
				'1',
				'1',
				'$row_r_smsg[hcode]',
				'$row_r_smsg[hospital_name]',
				'$row_r_smsg[visit_date_time]',
				'1',
				'$transaction_uid_e',
				'$data_string[status]',
				'$data_string[message_th]',
				'$row_r_smsg[visit_date_time]',
				'$row_r_smsg[visit_date_time]',
				'$row_r_smsg[seq]')";
		$query_g = mysqli_query($dbnurse,$sql);

		}else{
		
		$sql = "REPLACE INTO claim_moph.claim_dmht_data (seq, hn, visit_date, pid, id_type, uuc, hcode, hospital_name, visit_date_time, is_used_ht, transaction_uid, claim_code_response, claim_text_response, claim_datetime, claim_date, seq_ref) VALUES ('$row_r_smsg[seq]',
			 	'$row_r_smsg[hn]',
				'$row_r_smsg[visit_date_time]',
				'$row_r_smsg[pid]',
				'1',
				'1',
				'$row_r_smsg[hcode]',
				'$row_r_smsg[hospital_name]',
				'$row_r_smsg[visit_date_time]',
				'1',
				'$transaction_uid_e',
				'$data_string[status]',
				'$data_string[message_th]',
				'$row_r_smsg[visit_date_time]',
				'$row_r_smsg[visit_date_time]',
				'$row_r_smsg[seq]')";
			$query_g = mysqli_query($dbnurse,$sql);

		}
		mysqli_close();
curl_close($ch);
}
echo json_encode($data_string);
