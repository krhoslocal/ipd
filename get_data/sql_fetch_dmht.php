<?php
include('../includes/dbcon.php');
$_tab = $_GET['tab'];
$_startdate = $_GET['startdate'];
$_enddate = $_GET['enddate'];
$_itypeservice = $_GET['typeservice'];


if($_itypeservice =='EPI'){
//------------------
	if($_tab  =='1'){
$sql = '';
$data ='';
$sql = 'SELECT a.regdate,a.hn,pt.getCid(a.hn) as cid,pt.getFullname(a.hn) AS fullname,a.thocode AS code_vac,a.lot_number,(SELECT if(cc.hn<>"","1","0") AS chk FROM claim_moph.claim_epi_data cc WHERE cc.visit_date=a.regdate AND cc.pid=(pt.getCid(a.hn)) AND cc.vac_moph_code=a.thocode AND cc.claim_code_response="200" limit 1) as chk,(SELECT if(cd.hn<>"","1","0") AS chk FROM nhso.nhso_authen cd WHERE cd.authen_date=a.regdate AND cd.cid=pt.getCid(a.hn) LIMIT 1) as chk_authen,a.namedrug as namedrug FROM claim_moph.target_epi a WHERE a.regdate BETWEEN "'.$_startdate.'" AND "'.$_enddate.'"  GROUP BY regdate,hn,thocode';

$query = mysqli_query($dbnurse,$sql);
$data .= '<div class="card">
            <div class="card-body">
              <table id="tables_ipd" class="table table-bordered table-borderless table-striped">
                <thead>
                  <tr align="center">
				  	<th style="width: 12%">Claim
                    </th>
					<th style="width: 12%">chk_authen
                    </th>
					<th style="width: 12%">MOPH Clim
                    </th>
				  	<th style="width: 5%">No.
                    </th>
                    <th style="width: 12%">regdate
                    </th>
                    <th style="width: 5%">HN
                    </th>
					 <th style="width: 13%">CID
                    </th>
                    <th style="width: 25%">fullname
                    </th>
                    <th style="width: 25%">code_vac
                    </th>
					<th style="width: 25%">lot_number
                    </th>
					 <th style="width: 15%">namedrug
                    </th>
					 
                  </tr>
                </thead>
                <tbody>';
if (mysqli_num_rows($query) > 0) 
{
	$i=1;
	while ($row = mysqli_fetch_array($query)) {
		$data .= '<tr>
						<td valign="middle" align="center">';
		            if( $row['chk'] <>'') {
		$data .='<span class="ui-icon ace-icon fa fa-check fa-3x green"></span> ';
					} else{
	    $data .='<span class="ui-icon ace-icon fa fa-spinner fa-spin fa-3x green"></span>'; 
					};
        $data .='</td>
				  <td valign="middle" align="center">';
				 	if( $row['chk_authen'] <>'') { 
		$data .='<span class="ui-icon ace-icon fa fa-check fa-3x green"></span>';
					} else{
		$data .='<span class="ui-icon ace-icon fa fa-spinner fa-spin fa-3x green"></span>';
				};
        $data .='</td><td valign="middle" align="center">';
					if( $row['chk'] <>'') {
		$data .='<a href="#" class="btn btn-success btn-sm" >Detial</a>';
					} else{
		$data .='<div class="action-buttons">
							<a class="red chk_mophic_epi" data_type="'.$_itypeservice.'" data_regdate="'.$row['regdate'].'" data_hn="'.$row['hn'].'" data_code_vac="'.$row['code_vac'].'"> 
                                    <button type="button" class="btn btn-warning">ส่งข้อมูล "'.$_itypeservice.'"</button>
                            </a></div></td>';
						};	
        $data .='<td align="center" valign="bottom"> 
					  	'.$i.'
                      </td>
                      <td>
					  	'.$row['regdate'].'
                      </td>
                      <td>
					   '.$row['hn'].'
                      </td>
					  <td>
					  '.$row['cid'].'
                      </td>
                      <td>
                        '.$row['fullname'].'
                      </td>
                      <td>
                     '.$row['code_vac'].' 
                 </td>
				 <td>
				 	'.$row['lot_number'].'
                 </td>
				 <td align="center">
				 	'.$row['namedrug'].'
                 </td>
                    </tr>';
				$i++;
	}
}
else
{	     
	$data .= '<tr><td colspan="11" align="center">ไม่มีข้อมูล</td></tr>';
}
$data .='</tbody></table></div></div>
			<div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close_dm</button>
          </div>';
$data .='
	   <script>
		$(function() {
	
		 $("#tables_ipd").DataTable({
					 "responsive": true,
					"autoWidth": false,
					"ordering": true,
					"lengthChange": true,
		  });
		})
</script>		
	';	  
echo $data;
}
if($_tab  == '2'){
$sql = '';
$data ='';
$sql = 'SELECT * FROM (SELECT a.regdate,a.hn,pt.getCid(a.hn) as cid,pt.getFullname(a.hn) AS fullname,a.thocode AS vc_code,a.lot_number,a.d_exp,(SELECT if(cc.hn<>"","1","0") AS chk FROM claim_moph.claim_epi_data cc WHERE cc.visit_date=a.regdate AND cc.pid=(pt.getCid(a.hn)) AND cc.vac_moph_code=a.thocode AND cc.claim_code_response="200" limit 1) as chk,(SELECT if(cd.hn<>"","1","0") AS chk FROM nhso.nhso_authen cd WHERE cd.authen_date=a.regdate AND cd.cid=pt.getCid(a.hn) LIMIT 1) as chk_authen FROM claim_moph.target_epi a WHERE a.regdateBETWEEN "'.$_startdate.'" AND "'.$_enddate.'") AS dataq WHERE dataq.chk IS null GROUP BY regdate,hn,vc_code';

$query = mysqli_query($dbnurse,$sql);
$data .= '<div class="card">
            <div class="card-body">
              <table id="tables_error" class="table table-bordered table-striped">
                <thead>
                  <tr align="center">
				  	<th style="width: 12%">Claim
                    </th>
					<th style="width: 12%">chk_authen
                    </th>
					<th style="width: 12%">MOPH Clim
                    </th>
				  	<th style="width: 5%">No.
                    </th>
                    <th style="width: 12%">regdate
                    </th>
                    <th style="width: 5%">HN
                    </th>
					 <th style="width: 13%">CID
                    </th>
                    <th style="width: 50%">fullname
                    </th>
                    <th style="width: 25%">code_vac
                    </th>
					<th style="width: 25%">lot_number
                    </th>
					 <th style="width: 15%">regdate
                    </th>
					</th>
					 <th style="width: 15%">note
                    </th>
					 
                  </tr>
                </thead>
                <tbody>';
if (mysqli_num_rows($query) > 0) 
{
	$i=1;
	while ($row = mysqli_fetch_array($query)) {
		$data .= '<tr>
						<td valign="middle" align="center">';
		            if( $row['chk'] <>'') {
		$data .='<span class="ui-icon ace-icon fa fa-check fa-3x green"></span> ';
					} else{
	    $data .='<span class="ui-icon ace-icon fa fa-spinner fa-spin fa-3x green"></span>'; 
					};
        $data .='</td>
				  <td valign="middle" align="center">';
				 	if( $row['chk_authen'] <>'') { 
		$data .='<span class="ui-icon ace-icon fa fa-check fa-3x green"></span>';
					} else{
		$data .='<span class="ui-icon ace-icon fa fa-spinner fa-spin fa-3x green"></span>';
				};
        $data .='</td><td valign="middle" align="center">';
					if( $row['chk'] <>'') {
		$data .='<a href="#" class="btn btn-success btn-sm" >Detial</a>';
					} else{
		$data .='<div class="action-buttons">
							<a class="red chk_mophic_epi" data_type="'.$_itypeservice.'" data_regdate="'.$row['regdate'].'" data_hn="'.$row['hn'].'" data_code_vac="'.$row['vc_code'].'"> 
                                    <button type="button" class="btn btn-warning">ส่งข้อมูล "'.$_itypeservice.'"</button>
                            </a></div></td>';
						};	
        $data .='<td align="center" valign="bottom"> 
					  	'.$i.'
                      </td>
                      <td>
					  	'.$row['regdate'].'
                      </td>
                      <td>
					   '.$row['hn'].'
                      </td>
					  <td>
					  '.$row['cid'].'
                      </td>
                      <td>
                        '.$row['fullname'].'
                      </td>
                      <td>
                     '.$row['code_vac'].' 
                 </td>
				 <td>
				 	'.$row['lot_number'].'
                 </td>
				 <td align="center">
				 	'.$row['regdate'].'
                 </td>
				 <td align="center">
				 	'.$row['note'].'
                 </td>
                    </tr>';
				$i++;
	}
}
else
{	     
	$data .= '<tr><td colspan="12" align="center">ไม่มีข้อมูล Tag2</td></tr>';
}
$data .='</tbody></table></div></div>
			<div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close_dm2</button>
          </div>';
$data .='
	   <script>
		$(function() {
	
		 $("#tables_error").DataTable({
					 "responsive": true,
					"autoWidth": false,
					"ordering": true,
					"lengthChange": true,
		  });
		})
</script>		
	';	  
echo $data;
}
if($_tab  == '3'){
$sql = '';
$data ='';
$sql = 'SELECT a.regdate,
	a.hn,
	pt.getCid(a.hn) as cid,
	pt.getFullname(a.hn) AS fullname,
	a.thocode AS code_vac,
	a.lot_number,
	(SELECT if(cc.hn<>"","1","0") AS chk FROM claim_moph.claim_epi_data cc WHERE cc.visit_date=a.regdate AND cc.pid=(pt.getCid(a.hn)) AND cc.vac_moph_code=a.thocode AND cc.claim_code_response="200" limit 1) as chk,
	(SELECT if(cd.hn<>"","1","0") AS chk FROM nhso.nhso_authen cd WHERE cd.authen_date=a.regdate AND cd.cid=pt.getCid(a.hn) LIMIT 1) as chk_authen
FROM claim_moph.target_epi a 
WHERE a.regdate BETWEEN "'.$_startdate.'" AND "'.$_enddate.'"  GROUP BY regdate,hn,thocode';

$query = mysqli_query($dbnurse,$sql);
$data .= '<div class="card">
            <div class="card-body">
              <table id="tables_complat" class="table table-bordered table-striped">
                <thead>
                  <tr align="center">
				  	<th style="width: 12%">Claim
                    </th>
					<th style="width: 12%">chk_authen
                    </th>
					<th style="width: 12%">MOPH Clim
                    </th>
				  	<th style="width: 5%">No.
                    </th>
                    <th style="width: 12%">regdate
                    </th>
                    <th style="width: 5%">HN
                    </th>
					 <th style="width: 13%">CID
                    </th>
                    <th style="width: 50%">fullname
                    </th>
                    <th style="width: 25%">code_vac
                    </th>
					<th style="width: 25%">lot_number
                    </th>
					 <th style="width: 15%">regdate
                    </th>
					 
                  </tr>
                </thead>
                <tbody>';
if (mysqli_num_rows($query) > 0) 
{
	$i=1;
	while ($row = mysqli_fetch_array($query)) {
		$data .= '<tr>
						<td valign="middle" align="center">';
		            if( $row['chk'] <>'') {
		$data .='<span class="ui-icon ace-icon fa fa-check fa-3x green"></span> ';
					} else{
	    $data .='<span class="ui-icon ace-icon fa fa-spinner fa-spin fa-3x green"></span>'; 
					};
        $data .='</td>
				  <td valign="middle" align="center">';
				 	if( $row['chk_authen'] <>'') { 
		$data .='<span class="ui-icon ace-icon fa fa-check fa-3x green"></span>';
					} else{
		$data .='<span class="ui-icon ace-icon fa fa-spinner fa-spin fa-3x green"></span>';
				};
        $data .='</td><td valign="middle" align="center">';
					if( $row['chk'] <>'') {
		$data .='<a href="#" class="btn btn-success btn-sm" >Detial</a>';
					} else{
		$data .='<div class="action-buttons">
							<a class="red chk_mophic_epi" data_type="'.$_itypeservice.'" data_regdate="'.$row['regdate'].'" data_hn="'.$row['hn'].'" data_code_vac="'.$row['code_vac'].'"> 
                                    <button type="button" class="btn btn-warning">ส่งข้อมูล "'.$_itypeservice.'"</button>
                            </a></div></td>';
						};	
        $data .='<td align="center" valign="bottom"> 
					  	'.$i.'
                      </td>
                      <td>
					  	'.$row['regdate'].'
                      </td>
                      <td>
					   '.$row['hn'].'
                      </td>
					  <td>
					  '.$row['cid'].'
                      </td>
                      <td>
                        '.$row['fullname'].'
                      </td>
                      <td>
                     '.$row['code_vac'].' 
                 </td>
				 <td>
				 	'.$row['lot_number'].'
                 </td>
				 <td align="center">
				 	'.$row['regdate'].'
                 </td>
                    </tr>';
				$i++;
	}
}
else
{	     
	$data .= '<tr><td colspan="11" align="center">ไม่มีข้อมูล</td></tr>';
}
$data .='</tbody></table></div></div>
			<div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close_dm2</button>
          </div>';
		  
$data .='
	   <script>
		$(function() {
	
		 $("#tables_complat").DataTable({
					 "responsive": true,
					"autoWidth": false,
					"ordering": true,
					"lengthChange": true,
					"count": true,
		  });
		})
</script>		
	';	  
echo $data;
}
if($_tab  == '4'){
$sql = '';
$data ='';
$sql = 'SELECT a.regdate,a.hn,pt.getFullname(a.hn) AS fullname,a.namelab,a.result_lab,a.regdate,a.type_group,pt.getCid(a.hn) as cid,(SELECT if(cc.hn<>"","1","0") AS chk FROM claim_moph.claim_dmht_data cc WHERE cc.visit_date=a.regdate AND cc.pid=(pt.getCid(a.hn)) and cc.claim_code_response="200" limit 1) as chk,(SELECT if(cd.hn<>"","1","0") AS chk FROM nhso.nhso_authen cd WHERE cd.authen_date=a.regdate AND cd.cid=pt.getCid(a.hn) LIMIT 1) as chk_authen,pt.getCid(a.hn) as cid
   ,b.transaction_uid 
	FROM claim_moph.target a
	left JOIN claim_moph.claim_dmht_data b ON b.claim_date=a.regdate AND b.hn=a.hn
	WHERE a.regdate BETWEEN "'.$_startdate.'" AND "'.$_enddate.'" AND a.type_group="'.$_itypeservice.'" AND b.transaction_uid IS NOT null GROUP BY regdate,hn,namelab';

$query = mysqli_query($dbnurse,$sql);
$data .= '<div class="card">
            <div class="card-body">
              <table id="tables_send" class="table table-bordered table-striped">
                <thead>
                  <tr align="center">
				  	<th style="width: 12%">Claim
                    </th>
					<th style="width: 12%">chk_authen
                    </th>
					<th style="width: 12%">MOPH Clim
                    </th>
				  	<th style="width: 5%">No.
                    </th>
                    <th style="width: 12%">regdate
                    </th>
                    <th style="width: 5%">HN
                    </th>
					 <th style="width: 13%">CID
                    </th>
                    <th style="width: 50%">fullname
                    </th>
                    <th style="width: 25%">namelab
                    </th>
					<th style="width: 25%">result
                    </th>
					 <th style="width: 15%">regdate
                    </th>
					 
                  </tr>
                </thead>
                <tbody>';
if (mysqli_num_rows($query) > 0) 
{
	$i=1;
	while ($row = mysqli_fetch_array($query)) {
		$data .= '<tr>
						<td valign="middle" align="center">';
		            if( $row['chk'] <>'') {
		$data .='<span class="ui-icon ace-icon fa fa-check fa-3x green"></span> ';
					} else{
	    $data .='<span class="ui-icon ace-icon fa fa-spinner fa-spin fa-3x green"></span>'; 
					};
        $data .='</td>
				  <td valign="middle" align="center">';
				 	if( $row['chk_authen'] <>'') { 
		$data .='<span class="ui-icon ace-icon fa fa-check fa-3x green"></span>';
					} else{
		$data .='<span class="ui-icon ace-icon fa fa-spinner fa-spin fa-3x green"></span>';
				};
        $data .='</td><td valign="middle" align="center">';
					if( $row['chk'] <>'') {
		$data .='<a href="#" class="btn btn-success btn-sm" >Detial</a>';
					} else{
		$data .='<div class="action-buttons">
							<a class="red chk_mophic_epi" data_type="'.$_itypeservice.'" data_regdate="'.$row['regdate'].'" data_hn="'.$row['hn'].'"> 
                                    <button type="button" class="btn btn-warning">ส่งข้อมูล "'.$_itypeservice.'"</button>
                            </a></div></td>';
						};	
        $data .='<td align="center" valign="bottom"> 
					  	'.$i.'
                      </td>
                      <td>
					  	'.$row['regdate'].'
                      </td>
                      <td>
					   '.$row['hn'].'
                      </td>
					  <td>
					  '.$row['cid'].'
                      </td>
                      <td>
                        '.$row['fullname'].'
                      </td>
                      <td>
                     '.$row['namelab'].' 
                 </td>
				 <td>
				 	'.$row['result_lab'].'
                 </td>
				 <td align="center">
				 	'.$row['regdate'].'
                 </td>
                    </tr>';
				$i++;
	}
}
else
{	     
	$data .= '<tr><td colspan="11" align="center">ไม่มีข้อมูล</td></tr>';
}
$data .='</tbody></table></div></div>
			<div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close_dm3</button>
          </div>';
	$data .='
	   <script>
		$(function() {

		  $("#tables_send").DataTable({
					 "responsive": true,
					"autoWidth": false,
					"ordering": true,
					"lengthChange": true,
		  });
		})
</script>		
	';	  
		  
		  
echo $data;
}		
		
//------------------			
}
if($_itypeservice =='DM' or $_itypeservice =='HT' ){
if($_tab  =='1'){
$sql = '';
$data ='';
$sql = 'SELECT a.regdate,a.hn,pt.getFullname(a.hn) AS fullname,a.namelab,a.result_lab,a.regdate,a.type_group,pt.getCid(a.hn) as cid,(SELECT if(cc.hn<>"","1","0") AS chk FROM claim_moph.claim_dmht_data cc WHERE cc.visit_date=a.regdate AND cc.pid=(pt.getCid(a.hn)) and cc.claim_code_response="200" limit 1) as chk,(SELECT if(cd.hn<>"","1","0") AS chk FROM nhso.nhso_authen cd WHERE cd.authen_date=a.regdate AND cd.cid=pt.getCid(a.hn) LIMIT 1) as chk_authen,pt.getCid(a.hn) as cid,claim_moph._gettypedm(a.hn,a.regdate) AS dm_type FROM claim_moph.target a WHERE a.regdate BETWEEN "'.$_startdate.'" AND "'.$_enddate.'" AND a.type_group="'.$_itypeservice.'" GROUP BY regdate,hn';

$query = mysqli_query($dbnurse,$sql);
$data .= '<div class="card">
            <div class="card-body">
              <table id="tables_ipd" class="table table-bordered table-striped">
                <thead>
                  <tr align="center">
				  	<th style="width: 12%">Claim
                    </th>
					<th style="width: 12%">chk_authen
                    </th>
					<th style="width: 12%">MOPH Clim
                    </th>
					<th style="width: 12%">
						select
                    </th>
				  	<th style="width: 5%">No.
                    </th>
                    <th style="width: 12%">regdate
                    </th>
                    <th style="width: 5%">HN
                    </th>
					 <th style="width: 13%">CID
                    </th>
                    <th style="width: 50%">fullname
                    </th>
                    <th style="width: 25%">namelab
                    </th>
					<th style="width: 25%">result
                    </th>
					</th>
					<th style="width: 25%">DM_TYPE
                    </th>
					 <th style="width: 15%">regdate
                    </th>
					 
                  </tr>
                </thead>
                <tbody>';
if (mysqli_num_rows($query) > 0) 
{
	$i=1;
	while ($row = mysqli_fetch_array($query)) {
		$data .= '<tr>
						<td valign="middle" align="center">';
		            if( $row['chk'] <>'') {
		$data .='<span class="ui-icon ace-icon fa fa-check fa-3x green"></span> ';
					} else{
	    $data .='<span class="ui-icon ace-icon fa fa-spinner fa-spin fa-3x green"></span>'; 
					};
        $data .='</td>
				  <td valign="middle" align="center">';
				 	if( $row['chk_authen'] <>'') { 
		$data .='<span class="ui-icon ace-icon fa fa-check fa-3x green"></span>';
					} else{
		$data .='<span class="ui-icon ace-icon fa fa-spinner fa-spin fa-3x green"></span>';
				};
        $data .='</td><td valign="middle" align="center">';
					if( $row['chk'] <>'') {
		$data .='<a href="#" class="btn btn-success btn-sm" >Detial</a>';
					} else{
		$data .='<div class="action-buttons">
							<a class="red chk_mophic" data_type="'.$_itypeservice.'" data_regdate="'.$row['regdate'].'" data_hn="'.$row['hn'].'"> 
                                    <button type="button" class="btn btn-warning">ส่งข้อมูล "'.$_itypeservice.'"</button>
                            </a></div></td>';
						};	
        $data .='<td align="center" valign="bottom"> 
						
                      </td>
                      </td>
					  <td align="center" valign="bottom"> 
					  	'.$i.'
                      </td>
                      <td>
					  	'.$row['regdate'].'
                      </td>
                      <td>
					   '.$row['hn'].'
                      </td>
					  <td>
					  '.$row['cid'].'
                      </td>
                      <td>
                        '.$row['fullname'].'
                      </td>
                      <td>
                     '.$row['namelab'].' 
                 </td>
				 <td>
				 	'.$row['result_lab'].'
                 </td>
				 <td align="center">
				 	'.$row['dm_type'].'
                 </td>
				 <td align="center">
				 	'.$row['regdate'].'
                 </td>
                    </tr>';
				$i++;
	}
}
else
{	     
	$data .= '<tr><td colspan="13" align="center">ไม่มีข้อมูล</td></tr>';
}
$data .='</tbody></table></div></div>
			<div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close_dm</button>
          </div>';
$data .='
	   <script>
		$(function() {
	
		 $("#tables_ipd").DataTable({
					 "responsive": true,
					"autoWidth": false,
					"ordering": true,
					"lengthChange": true,
		  });
		})
</script>		
	';	  
echo $data;
}elseif($_tab  == '2'){
$sql = '';
$data ='';
$sql = 'SELECT * FROM (
SELECT a.regdate,a.hn,pt.getFullname(a.hn) AS fullname,a.namelab,a.result_lab,a.type_group,(SELECT if(cc.hn<>"","1","0") AS chk FROM claim_moph.claim_dmht_data cc WHERE cc.visit_date=a.regdate AND cc.pid=(pt.getCid(a.hn)) and cc.claim_code_response="200" limit 1) as chk,(SELECT if(cd.hn<>"","1","0") AS chk FROM nhso.nhso_authen cd WHERE cd.authen_date=a.regdate AND cd.cid=pt.getCid(a.hn) LIMIT 1) as chk_authen,pt.getCid(a.hn) as cid,(SELECT group_concat(cc.claim_text_response) AS chk FROM claim_moph.claim_dmht_data cc WHERE cc.visit_date=a.regdate AND cc.pid=(pt.getCid(a.hn))) as note,claim_moph._gettypedm(a.hn,a.regdate) AS dm_type 
FROM claim_moph.target a
WHERE a.regdate BETWEEN "'.$_startdate.'" AND "'.$_enddate.'" AND a.type_group="'.$_itypeservice.'") AS dataq WHERE dataq.chk IS null GROUP BY regdate,hn,namelab order by note asc';

$query = mysqli_query($dbnurse,$sql);
$data .= '<div class="card">
            <div class="card-body">
              <table id="tables_error" class="table table-bordered table-striped">
                <thead>
                  <tr align="center">
				  	<th style="width: 12%">Claim
                    </th>
					<th style="width: 12%">chk_authen-DM
                    </th>
					<th style="width: 12%">MOPH Clim
                    </th>
				  	<th style="width: 5%">No.
                    </th>
                    <th style="width: 12%">regdate
                    </th>
                    <th style="width: 5%">HN
                    </th>
					 <th style="width: 13%">CID
                    </th>
                    <th style="width: 50%">fullname
                    </th>
                    <th style="width: 25%">namelab
                    </th>
					<th style="width: 25%">result
                    </th>
					 <th style="width: 15%">regdate
                    </th>
					</th>
					 <th style="width: 15%">DM_TYPE
                    </th>
					</th>
					 <th style="width: 15%">note
                    </th>
					
					 
                  </tr>
                </thead>
                <tbody>';
if (mysqli_num_rows($query) > 0) 
{
	$i=1;
	while ($row = mysqli_fetch_array($query)) {
		$data .= '<tr>
						<td valign="middle" align="center">';
		            if( $row['chk'] <>'') {
		$data .='<span class="ui-icon ace-icon fa fa-check fa-3x green"></span> ';
					} else{
	    $data .='<span class="ui-icon ace-icon fa fa-spinner fa-spin fa-3x green"></span>'; 
					};
        $data .='</td>
				  <td valign="middle" align="center">';
				 	if( $row['chk_authen'] <>'') { 
		$data .='<span class="ui-icon ace-icon fa fa-check fa-3x green"></span>';
					} else{
		$data .='<span class="ui-icon ace-icon fa fa-spinner fa-spin fa-3x green"></span>';
				};
        $data .='</td><td valign="middle" align="center">';
					if( $row['chk'] <>'') {
		$data .='<a href="#" class="btn btn-success btn-sm" >Detial</a>';
					} else{
		$data .='<div class="action-buttons">
							<a class="red chk_mophic" data_type="'.$_itypeservice.'" data_regdate="'.$row['regdate'].'" data_hn="'.$row['hn'].'"> 
                                    <button type="button" class="btn btn-warning">ส่งข้อมูล "'.$_itypeservice.'"</button>
                            </a></div></td>';
						};	
        $data .='<td align="center" valign="bottom"> 
					  	'.$i.'
                      </td>
                      <td>
					  	'.$row['regdate'].'
                      </td>
                      <td>
					   '.$row['hn'].'
                      </td>
					  <td>
					  '.$row['cid'].'
                      </td>
                      <td>
                        '.$row['fullname'].'
                      </td>
                      <td>
                     '.$row['namelab'].' 
                 </td>
				 <td>
				 	'.$row['result_lab'].'
                 </td>
				 <td align="center">
				 	'.$row['regdate'].'
                 </td>
				 <td align="center">
				 	'.$row['dm_type'].'
                 </td>
				 <td align="center">';
				 	if( $row['note'] <>'') {
						$data .='<a class="red chk_error" data_type="'.$_itypeservice.'" data_regdate="'.$row['regdate'].'" data_hn="'.$row['hn'].'"> 
                                    <button type="button" class="btn btn-info">Note</button>
                            </a></div></td>';
					} else{
						$data .='';
						};
			
               $data .='</td>
                    </tr>';
				$i++;
	}
}
else
{	     
	$data .= '<tr><td colspan="13" align="center">ไม่มีข้อมูล</td></tr>';
}
$data .='</tbody></table></div></div>
			<div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close_dm2</button>
          </div>';
$data .='
	   <script>
		$(function() {
	
		 $("#tables_error").DataTable({
					 "responsive": true,
					"autoWidth": false,
					"ordering": true,
					"lengthChange": true,
		  });
		})
</script>		
	';	  
echo $data;
}elseif($_tab  == '3'){
$sql = '';
$data ='';
$sql = 'SELECT a.regdate,a.hn,pt.getFullname(a.hn) AS fullname,a.namelab,a.result_lab,a.regdate,a.type_group,pt.getCid(a.hn) as cid,(SELECT if(cc.hn<>"","1","0") AS chk FROM claim_moph.claim_dmht_data cc WHERE cc.visit_date=a.regdate AND cc.pid=(pt.getCid(a.hn)) and cc.claim_code_response="200" limit 1) as chk,(SELECT if(cd.hn<>"","1","0") AS chk FROM nhso.nhso_authen cd WHERE cd.authen_date=a.regdate AND cd.cid=pt.getCid(a.hn) LIMIT 1) as chk_authen,pt.getCid(a.hn) as cid,claim_moph._gettypedm(a.hn,a.regdate) AS dm_type FROM claim_moph.target a 
INNER JOIN claim_moph.claim_dmht_data b ON b.visit_date=a.regdate AND b.hn=a.hn AND b.claim_code_response="200" WHERE a.regdate BETWEEN "'.$_startdate.'" AND "'.$_enddate.'" AND a.type_group="'.$_itypeservice.'" GROUP BY regdate,hn,namelab';

$query = mysqli_query($dbnurse,$sql);
$data .= '<div class="card">
            <div class="card-body">
              <table id="tables_complat" class="table table-bordered table-striped">
                <thead>
                  <tr align="center">
				  	<th style="width: 12%">Claim
                    </th>
					<th style="width: 12%">chk_authen
                    </th>
					<th style="width: 12%">MOPH Clim
                    </th>
				  	<th style="width: 5%">No.
                    </th>
                    <th style="width: 12%">regdate
                    </th>
                    <th style="width: 5%">HN
                    </th>
					 <th style="width: 13%">CID
                    </th>
                    <th style="width: 50%">fullname
                    </th>
                    <th style="width: 25%">namelab
                    </th>
					<th style="width: 25%">result
                    </th>
					</th>
					<th style="width: 25%">DM_TYPE
                    </th>
					 <th style="width: 15%">regdate
                    </th>
					 
                  </tr>
                </thead>
                <tbody>';
if (mysqli_num_rows($query) > 0) 
{
	$i=1;
	while ($row = mysqli_fetch_array($query)) {
		$data .= '<tr>
						<td valign="middle" align="center">';
		            if( $row['chk'] <>'') {
		$data .='<span class="ui-icon ace-icon fa fa-check fa-3x green"></span> ';
					} else{
	    $data .='<span class="ui-icon ace-icon fa fa-spinner fa-spin fa-3x green"></span>'; 
					};
        $data .='</td>
				  <td valign="middle" align="center">';
				 	if( $row['chk_authen'] <>'') { 
		$data .='<span class="ui-icon ace-icon fa fa-check fa-3x green"></span>';
					} else{
		$data .='<span class="ui-icon ace-icon fa fa-spinner fa-spin fa-3x green"></span>';
				};
        $data .='</td><td valign="middle" align="center">';
					if( $row['chk'] <>'') {
		$data .='<a href="#" class="btn btn-success btn-sm" >Detial</a>';
					} else{
		$data .='<div class="action-buttons">
							<a class="red chk_mophic" data_type="'.$_itypeservice.'" data_regdate="'.$row['regdate'].'" data_hn="'.$row['hn'].'"> 
                                    <button type="button" class="btn btn-warning">ส่งข้อมูล "'.$_itypeservice.'"</button>
                            </a></div></td>';
						};	
        $data .='<td align="center" valign="bottom"> 
					  	'.$i.'
                      </td>
                      <td>
					  	'.$row['regdate'].'
                      </td>
                      <td>
					   '.$row['hn'].'
                      </td>
					  <td>
					  '.$row['cid'].'
                      </td>
                      <td>
                        '.$row['fullname'].'
                      </td>
                      <td>
                     '.$row['namelab'].' 
                 </td>
				 <td>
				 	'.$row['result_lab'].'
                 </td>
				 <td>
				 	'.$row['dm_type'].'
                 </td>
				 <td align="center">
				 	'.$row['regdate'].'
                 </td>
                    </tr>';
				$i++;
	}
}
else
{	     
	$data .= '<tr><td colspan="13" align="center">ไม่มีข้อมูล</td></tr>';
}
$data .='</tbody></table></div></div>
			<div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close_dm2</button>
          </div>';
		  
$data .='
	   <script>
		$(function() {
	
		 $("#tables_complat").DataTable({
					 "responsive": true,
					"autoWidth": false,
					"ordering": true,
					"lengthChange": true,
					"count": true,
		  });
		})
</script>		
	';	  
echo $data;
}elseif($_tab  == '4'){
$sql = '';
$data ='';
$sql = 'SELECT a.regdate,a.hn,pt.getFullname(a.hn) AS fullname,a.namelab,a.result_lab,a.regdate,a.type_group,pt.getCid(a.hn) as cid,(SELECT if(cc.hn<>"","1","0") AS chk FROM claim_moph.claim_dmht_data cc WHERE cc.visit_date=a.regdate AND cc.pid=(pt.getCid(a.hn)) and cc.claim_code_response="200" limit 1) as chk,(SELECT if(cd.hn<>"","1","0") AS chk FROM nhso.nhso_authen cd WHERE cd.authen_date=a.regdate AND cd.cid=pt.getCid(a.hn) LIMIT 1) as chk_authen,pt.getCid(a.hn) as cid
   ,b.transaction_uid,claim_moph._gettypedm(a.hn,a.regdate) AS dm_type 
	FROM claim_moph.target a
	left JOIN claim_moph.claim_dmht_data b ON b.claim_date=a.regdate AND b.hn=a.hn
	WHERE a.regdate BETWEEN "'.$_startdate.'" AND "'.$_enddate.'" AND a.type_group="'.$_itypeservice.'" AND b.transaction_uid IS NOT null GROUP BY regdate,hn,namelab';

$query = mysqli_query($dbnurse,$sql);
$data .= '<div class="card">
            <div class="card-body">
              <table id="tables_send" class="table table-bordered table-striped">
                <thead>
                  <tr align="center">
				  	<th style="width: 12%">Claim
                    </th>
					<th style="width: 12%">chk_authen
                    </th>
					<th style="width: 12%">MOPH Clim
                    </th>
				  	<th style="width: 5%">No.
                    </th>
                    <th style="width: 12%">regdate
                    </th>
                    <th style="width: 5%">HN
                    </th>
					 <th style="width: 13%">CID
                    </th>
                    <th style="width: 50%">fullname
                    </th>
                    <th style="width: 25%">namelab
                    </th>
					<th style="width: 25%">result
                    </th>
					</th>
					<th style="width: 25%">DM_TYPE
                    </th>
					 <th style="width: 15%">regdate
                    </th>
					 
                  </tr>
                </thead>
                <tbody>';
if (mysqli_num_rows($query) > 0) 
{
	$i=1;
	while ($row = mysqli_fetch_array($query)) {
		$data .= '<tr>
						<td valign="middle" align="center">';
		            if( $row['chk'] <>'') {
		$data .='<span class="ui-icon ace-icon fa fa-check fa-3x green"></span> ';
					} else{
	    $data .='<span class="ui-icon ace-icon fa fa-spinner fa-spin fa-3x green"></span>'; 
					};
        $data .='</td>
				  <td valign="middle" align="center">';
				 	if( $row['chk_authen'] <>'') { 
		$data .='<span class="ui-icon ace-icon fa fa-check fa-3x green"></span>';
					} else{
		$data .='<span class="ui-icon ace-icon fa fa-spinner fa-spin fa-3x green"></span>';
				};
        $data .='</td><td valign="middle" align="center">';
					if( $row['chk'] <>'') {
		$data .='<a href="#" class="btn btn-success btn-sm" >Detial</a>';
					} else{
		$data .='<div class="action-buttons">
							<a class="red chk_mophic" data_type="'.$_itypeservice.'" data_regdate="'.$row['regdate'].'" data_hn="'.$row['hn'].'"> 
                                    <button type="button" class="btn btn-warning">ส่งข้อมูล "'.$_itypeservice.'"</button>
                            </a></div></td>';
						};	
        $data .='<td align="center" valign="bottom"> 
					  	'.$i.'
                      </td>
                      <td>
					  	'.$row['regdate'].'
                      </td>
                      <td>
					   '.$row['hn'].'
                      </td>
					  <td>
					  '.$row['cid'].'
                      </td>
                      <td>
                        '.$row['fullname'].'
                      </td>
                      <td>
                     '.$row['namelab'].' 
                 </td>
				 <td>
				 	'.$row['result_lab'].'
                 </td>
				 <td>
				 	'.$row['dm_type'].'
                 </td>
				 <td align="center">
				 	'.$row['regdate'].'
                 </td>
                    </tr>';
				$i++;
	}
}
else
{	     
	$data .= '<tr><td colspan="13" align="center">ไม่มีข้อมูล</td></tr>';
}
$data .='</tbody></table></div></div>
			<div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close_dm3</button>
          </div>';
	$data .='
	   <script>
		$(function() {

		  $("#tables_send").DataTable({
					 "responsive": true,
					"autoWidth": false,
					"ordering": true,
					"lengthChange": true,
		  });
		})
</script>		
	';	  
		  
		  
echo $data;
}
}

?>