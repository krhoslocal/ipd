<?php
header('Content-Type: application/json; charset=tis-620');
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

$data = array(
   'hospital'=>array(
    'hospital_code'=> '10928',
    'hospital_name'=> '??????????,???.',
    'his_identifier'=> 'HIMPro HIS V.2.64'
  ),
   'patient'=>array(
   	'cid'=> '1339700025549',
    'passport_no'=> '',
    'hn'=> '0126587',
    'patient_guid'=> '{e0645970-5e1f-4e2d-95b1-9eb52fc2d025}',
    'prefix'=> '???',
    'first_name'=> '??',
    'last_name'=> '?????',
    'prefix_eng'=> '',
    'first_name_eng'=> '',
    'middle_name_eng'=> '',
    'last_name_eng'=> '',
    'gender'=> '1',
    'birth_date'=> '2004-11-10',
    'address'=> '38/1  ??????????????????',
    'moo'=> '11',
    'road'=> '',
    'chw_code'=> '33',
    'amp_code'=> '03',
    'tmb_code'=> '01',
    'address_full_thai'=> '38/1  ?????????????????? ???? 11 ??????? ??????????????? ???????????????',
    'address_full_english'=> '38/1 Koh Kaew Pattana Community Moo 11, Dun Subdistrict, Kantrarom District, Sisaket Province',
    'nationality'=> '099',
    'mobile_phone'=> '-',
    'home_phone'=> '',
    'drug_allergy'=> array(
        'report_date'=> '2549-09-21',
        'medication_name'=> '???????????????',
        'symptom'=> '???????????????? ??????? ?????????(4 ??. 2564)'
    	)
	),
	'immunization_plan'=>[array(
      'vaccine_code'=> 'C19',
      'immunization_plan_ref_code'=> '89944',
      'treatment_plan_name'=> 'Vaccine COVID-19',
      'practitioner_license_number'=> '',
      'practitioner_name'=> '?????????  ????????????',
      'practitioner_role'=> '?????????????',
      'vaccine_ref_name'=> 'COVID-19(PFIZER)',
      'schedule'=> [array
        (
            'immunization_plan_schedule_ref_code'=> '357330',
            'schedule_date'=> '2023-03-29',
            'treatment_number'=> '1',
            'schedule_description'=>'??? Vaccine COVID-19 ???????',
            'complete'=>'Y',
            'visit_date'=>'2023-03-29'
        )
     ]
    )],
	'visit'=> array(
    'visit_guid'=> '{32ff1ae6-1d5b-4207-872d-5bf7de7de3df}',
    'visit_ref_code'=> '56119959',
    'visit_datetime'=> '2023-03-29T08:58:00.000z',
    'claim_fund_pcode'=> 'UC',
    'visit_observation'=> array(
      'systolic_blood_pressure'=> '121',
      'diastolic_blood_pressure'=> '69',
      'body_weight_kg'=> '57.0',
      'body_height_cm'=> '165.0',
      'temperature'=> '36.2'
    ),
		'visit_immunization'=> [array
		  (
			'visit_immunization_ref_code'=> '533142',
			'immunization_datetime'=> '2023-03-29T08:58:00.000z',
			'vaccine_code'=> 'C19',
			'lot_number'=> 'GG3683',
			'expiration_date'=> '2023-04-20',
			'vaccine_note'=> '',
			'vaccine_ref_name'=> 'COVID-19(PFIZER)',
			'vaccine_manufacturer_id'=> '6',
			'vaccine_manufacturer'=> 'Pfizer, BioNTech',
			'serial_no'=> '109282566022100052',
			'vaccine_plan_no'=> '1',
			'vaccine_route_name'=> '????????????????? (Intramuscular)',
			'practitioner'=> array(
			  'license_number'=> '',
			  'name'=> '?????????  ????????????',
			  'role'=> '?????????????'
			),
			'immunization_plan_ref_code'=> '89944',
			'immunization_plan_schedule_ref_code'=> '357330'
		  )
	   ],
		'visit_immunization_reaction'=> [array(
		  'visit_immunization_reaction_ref_code'=> '693460',
		  'visit_immunization_ref_code'=> '533142',
		  'report_datetime'=> '2023-03-29T09:26:30.000Z',
		  'reaction_detail_text'=> '',
		  'vaccine_reaction_type_id'=> '0',
		  'reaction_date'=> '2023-03-29',
		  'vaccine_reaction_stage_id'=> '1',
		  'vaccine_reaction_symptom_id'=> '99'
		)],
	  'appointment'=> [array(
		  'appointment_ref_code'=> '693461',
		  'appointment_datetime'=> '2023-03-29T09:26:30.000Z',
		  'appointment_note'=> '',
		  'appointment_cause'=> '??????????????-19 ??????? 2',
		  'provis_aptype_code'=> 'C19',
		  'practitioner'=> array(
			'license_number'=> '?62391',
			'Name'=> '??.?????????? ??????',
			'role'=> '?????'
		  )
		)]
   )
 );

  $data_string_exi =  json_encode($data, JSON_UNESCAPED_UNICODE);  
echo $data_string_exi;
break; 

        $url = 'https://cvp1.moph.go.th/api/UpdateImmunization';
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
    
curl_close($ch);  
echo json_encode($data_string);
?>