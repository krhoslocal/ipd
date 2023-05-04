<?php
include('../includes/dbcon.php');
$_startdate = $_GET['startdate'];
$_enddate = $_GET['enddate'];

$sql = '';
$data ='';
$sql = 'SELECT * FROM claim_moph.claim_dmht_data a WHERE a.visit_date BETWEEN "'.$_startdate.'" AND  "'.$_enddate.'" and a.claim_code_response="200" and a.is_used_dm="1" group by hn order by a.visit_date ASC';


$query = mysqli_query($dbnurse,$sql);
$data .= '<div class="card">
            <div class="card-body">
              <table id="showdata_ht_perday" class="table table-bordered table-striped dataTable dtr-inline">
	       		 <thead>
                  <tr align="center">
				  <th style="width: 10%">No.
                    </th>
				  <th style="width: 15%">วันที่รับบริการ
                    </th>
					<th style="width: 10%">hn
                    </th>
					<th style="width: 25%">ลำดับจากระบบ
                    </th>
				  <th style="width: 25%">เลขยืนยันจากระบบ
                    </th>
                    <th style="width: 15%">สภานะส่งเบิก
                    </th>
                    <th style="width: 15%">สภานะส่งเบิก
                    </th>
					 <th style="width: 15%">วันที่เปลี่ยนแปลง
                    </th>
                    
                  </tr>
                </thead>
                <tbody>';
if (mysqli_num_rows($query) > 0) 
{
	$i=1;
	while ($row = mysqli_fetch_array($query)) {
		$data .= '<tr>
					<td>'.$i.'</td>
					<td>'.$row['visit_date'].'</td>
					<td>'.$row['hn'].'</td>
					<td>'.$row['seq'].'</td>
					<td>'.$row['transaction_uid'].'</td>
					<td>'.$row['claim_code_response'].'</td>
					<td>'.$row['claim_text_response'].'</td>
					<td>'.$row['claim_datetime'].'</td>	
				</tr>';
				$i++;
	}
}
else
{	     
	$data .= '<tr><td colspan="8" align="center">ไม่มีข้อมูล</td></tr>';
}
$data .= '</tbody></table></div></div>
			<div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>';

echo $data;
?>