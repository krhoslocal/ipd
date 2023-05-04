<?php
include('../includes/dbcon.php');
$_idata_type = $_GET['data_type'];
$_idata_regdate = $_GET['data_regdate'];
$_idata_hn = $_GET['data_hn'];

$sql = '';
$data ='';
$sql = 'SELECT a.visit_date,a.hn,a.seq,a.claim_code_response,a.claim_text_response,a.transaction_uid
FROM claim_moph.claim_dmht_data a 
WHERE a.hn="'.$_idata_hn.'" AND a.visit_date="'.$_idata_regdate.'"';

$query = mysqli_query($dbnurse,$sql);

$data .= '<div class="card">
            <div class="card-body">
              <table id="tables_note" class="table table-bordered table-striped">
                <thead>
                  <tr align="center">
                    <th style="width: 12%">
                    visit_date
                    </th>
                    <th style="width: 10%">HN
                    </th>
                    <th style="width: 10%">Result
                    </th>
                    <th style="width: 10%">claim_text
                    </th>
                    
                  </tr>
                </thead>
                <tbody>';
    if (mysqli_num_rows($query) > 0) 
{
	$i=1;
	while ($row = mysqli_fetch_array($query)) {
		$data .= '<tr>
                        <td>
                            '.$row['visit_date'].'
                        </td>
                        <td>
                        '.$row['hn'].' 
                        </td>
                     	 <td>
                            '.$row['claim_code_response'].' 
                 		</td>
                        <td>
                            '.$row['claim_text_response'].'
                        </td>
                    </tr>';
				$i++;
	}
}
else
{	     
	$data .= '<tr><td colspan="8" align="center">ไม่มีข้อมูล</td></tr>';
}

echo $data;
?>