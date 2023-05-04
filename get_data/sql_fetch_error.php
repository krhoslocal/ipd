<?php
include('../includes/dbcon.php');
$_iserach_an = $_GET['serach_an'];
$_startdate = $_GET['startdate'];
$_enddate = $_GET['enddate'];

$sql = '';
$data ='';
$sql = 'SELECT if(a.STATUS="SIPD1","ส่ง Admit","ยังไมบันทึกAdmit") AS status,
	a.an,
	a.hn,pt.getFullname(a.hn) AS fullname,(SELECT wd.roomname FROM hos.roomno wd WHERE wd.roomcode=a.sendward)AS sendward, pt.getAge(a.hn) as age,
	(SELECT cc.Name from hos.insclasses cc WHERE cc.CODE=a.ptclass LIMIT 1)AS ptclass
	from ipd.ipd a 
		WHERE a.an="'.$_iserach_an.'"  ORDER BY a.dateadm DESC LIMIT 1';


$query = mysqli_query($dbnurse,$sql);
$data .= '<div class="card">
            <div class="card-body">
              <table id="tables_ipd" class="table table-bordered table-striped">
                <thead>
                  <tr align="center">
                    <th style="width: 12%">
                      สถานะ Admit
                    </th>
                    <th style="width: 10%">AN
                    </th>
                    <th style="width: 10%">HN
                    </th>
                    <th style="width: 20%">ชื่อ-นามสกุล
                    </th>
					 <th style="width: 5%">อายุ
                    </th>
					 <th style="width: 25%">สิทธิการรักษา
                    </th>
                    <th style="width: 10%">Ward admit
                    </th>
                    <th style="width: 20%" class="text-center">พิมพ์ Sticker
                    </th>
                  </tr>
                </thead>
                <tbody>';
if (mysqli_num_rows($query) > 0) 
{
	$i=1;
	while ($row = mysqli_fetch_array($query)) {
		$data .= '<tr>
                      <td><a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#_status_admit">
					  	'.$row['status'].'</a>
                      </td>
                      <td>
					  <button id="get_an" type="button" class="btn btn-danger">'.$row['an'].'</button>
                      </td>
                      <td>
                         '.$row['hn'].'
                      </td>
                     	 <td>
                          '.$row['fullname'].' 
                 		</td>
				 <td align="center">
                       '.$row['age'].' ปี
                 </td>
				 <td>
                      '.$row['ptclass'].'
                 </td>
                 <td>
                 	'.$row['sendward'].'
                 </td>
                 <td><a href="print_an.php?an_input='.$row['an'].'" target="_blank" class="btn btn-primary btn-sm">
     			            พิมพ์เอกสาร
				 </a>
                 </td>
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
          </div>
		  $(function() {
     <script>
	  
	  $("#tables_ipd").DataTable({
         "responsive": true,
        "autoWidth": false,
		"ordering": true,
		"lengthChange": true,
      });
	</script>';

echo $data;
?>