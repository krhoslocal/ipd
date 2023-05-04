<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("condb.php");
//$_GLOBAl['']
$showtxt = "";
   $database2 = "cockpit_ssko";
	$conn2 = mysqli_connect('localhost', 'root', '123456');
    mysqli_select_db($conn2,$database2);
	$sql2 = "select concat(p1,',',p2,',',p3,',',p4,',',p5) as ypass,concat(n1,',',n2,',',n3,',',n4,',',n5) as npass from tmp_graph";

		$query2 = mysqli_query($conn2,$sql2);
		
		while($row2 = mysqli_fetch_array($query2)){
			
	$ok_pass=$row2['ypass'];
	$no_pass=$row2['npass'];
	
		}


		
	?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>One Page KPI</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="favicon.ico" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script type="text/javascript" src="dist/js/freeze-table.js"></script>
  <script>
     $(function() {
        $('.freeze-table').freezeTable({});
     });
  </script>
      </head>
  <tbody>
    <div align="center" id="container" style="width:100%; height:400px;"></div>
    <script>
    Highcharts.chart('container', {
      colors: ['#80ff80','#ffb266','#8bbc21','#1aadce'],
        chart: {
            type: 'column'
        },
        title: {
            text: 'ร้อยละตัวชี้วัดที่ผ่านเกณฑ์'
        },
        subtitle: {
            text: 'สำนักงานสาธารณสุขจังหวัดศรีสะเกษ ปี 2563'
        },
        xAxis: {
            categories: [
                'ตัวชีวัดราย รพ.',
                'ตัวชี้วัดราย สสอ',
                'ตัวชี้วัดราย CUP',
                'ตัวชีวัด รพ.+ CUP',
                'ตัวชีวัด สสอ.+ CUP'
            ],
            crosshair: true
        },



        yAxis: {
            min: 0,
            title: {
                text: 'ร้อยละ'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} % </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
          column: {
            dataLabels: {
            enabled: true
        },
                pointPadding: 0.00,
                borderWidth: 0
            }
        },
        series: [{
            name: 'ผ่าน',
            data: [<?php echo $ok_pass; ?>]

        }, {
            name: 'ไม่ผ่าน',
            data: [<?php echo $no_pass; ?>]

        }]
    });
    </script>

<div class="freeze-table">
<table cellspacing="0" id="table-basic" class="table table-sm table-bordered table-striped">

 <thead>
<!--<table border="1" align="center" id="table1" name="table1"> -->
 <tr>
   <td colspan="33">
   <form action="index.php" method="post">
     <select name="stg_group">
      <option value="101">บริหารทั่วไป</option>
      <option value="201">ทรัพยากรบุคคล</option>
      <option value="301">พัฒนายุทธศาสตร์</option>
      <option value="401">ส่งเสริมสุขภาพ</option>
      <option value="501">พัฒนาคุณภาพและรูปแบบบริการ</option>
      <option value="601">ควบคุมโรค</option>
      <option value="701">ทันตสาธารณสุข</option>
      <option value="801">คุ้มครองผู้บริโภคฯ</option>
      <option value="901">ประกันสุขภาพ</option>
      <option value="110">ศูนย์เทคฯ</option>
      <option value="111">ควบคุมโรคไม่ติดต่อ(NCD)</option>
      <option value="112">อนามัยสิ่งแวดล้อมฯ</option>
      <option value="113">แพทย์แผนไทย</option>
      <option value="114">นิติการ</option>
        <option value="115">กลุ่มงานสาธารณสุขมูลฐานและระบบสุขภาพปฐมภูมิ</option>

    </select>
    <input type="submit" name="submit" value="Submit" />
</form>
<?php echo @$showtxt;?>
     </td>

</tr>

  <tr align="center" bgcolor="skyBlue">
  <td width="22"><strong>kpi_id/<br>template</strong></td>
    <td><strong>หัวข้อ</strong></td>

    <td><strong>เป้า</strong></td>
    <td><strong>ผลงาน</strong></td>
    <td><strong>ร้อยละ</strong></td>
    <td><strong>progress</strong></td>
<td><strong><a href='index_am.php?am=23'>รพ.ศก</a></strong></td>
    <td><strong><a href='index_am.php?am=01'>ม</a></strong></td>
    <td><strong><a href='index_am.php?am=02'>ยช</a></strong></td>
    <td><strong><a href='index_am.php?am=03'>กร</a></strong></td>
    <td><strong><a href='index_am.php?am=04'>กล</a></strong></td>
    <td><strong><a href='index_am.php?am=05'>ขข</a></strong></td>
    <td><strong><a href='index_am.php?am=06'>พบ</a></strong></td>
    <td><strong><a href='index_am.php?am=07'>ปก</a></strong></td>
    <td><strong><a href='index_am.php?am=08'>ขห</a></strong></td>
    <td><strong><a href='index_am.php?am=09'>รษ</a></strong></td>
    <td><strong><a href='index_am.php?am=10'>อท</a></strong></td>
    <td><strong><a href='index_am.php?am=11'>บบ</a></strong></td>
    <td><strong><a href='index_am.php?am=12'>หท</a></strong></td>
    <td><strong><a href='index_am.php?am=13'>นค</a></strong></td>
    <td><strong><a href='index_am.php?am=14'>ศร</a></strong></td>
    <td><strong><a href='index_am.php?am=15'>นก</a></strong></td>
    <td><strong><a href='index_am.php?am=16'>วห</a></strong></td>
    <td><strong><a href='index_am.php?am=17'>ภส</a></strong></td>
    <td><strong><a href='index_am.php?am=18'>มจ</a></strong></td>
    <td><strong><a href='index_am.php?am=19'>บจ</a></strong></td>
    <td><strong><a href='index_am.php?am=20'>พย</a></strong></td>
    <td><strong><a href='index_am.php?am=21'>พศ</a></strong></td>
    <td><strong><a href='index_am.php?am=22'>ศล</a></strong></td>

  </tr>
</thead>
</tbody>
  <?php
  /*  $query = "select k.num_kpi,c.kpi_id,dp_kpi,c.kpi_name ,d.dp_pop,d.dp_data,d.dp_rate,c.kpi_tar,c.kpi_type as kpi_type,k.PA as pa,k.insp as insp ,k.qof as qof,k.stg20 as stg20 ,k.sp as sp
  from  cockpit62.data_kpi_province d
  RIGHT  JOIN ww.kpi_group k on d.dp_kpi=k.kpi_id
  INNER JOIN kpi c on k.kpi_id=c.kpi_id
  ORDER BY k.no_id asc"; */

$query = "select * from
(select k.kpi_id,dp_kpi,k.kpi_detail as kpi_name ,d.dp_pop,d.dp_data,d.dp_rate,k.kpi_tar,k.kpi_type_data as kpi_type,k.chk_non_evalue
  from  data_kpi_province d
  right JOIN kpi k on d.dp_kpi=k.kpi_id  where k.type_kpi='m'
  ORDER BY k.kpi_id asc) a LEFT JOIN

(select

da_kpi,
sum(case WHEN da_amp='3301' then da_rate else 0 END) as amp3301,
sum(case WHEN da_amp='3301' then da_pop else 0 END) as p01,
sum(case WHEN da_amp='3302' then da_rate else 0 END) as amp3302,
sum(case WHEN da_amp='3302' then da_pop else 0 END) as p02,
sum(case WHEN da_amp='3303' then da_rate else 0 END) as amp3303,
sum(case WHEN da_amp='3303' then da_pop else 0 END) as p03,
sum(case WHEN da_amp='3304' then da_rate else 0 END) as amp3304,
sum(case WHEN da_amp='3304' then da_pop else 0 END) as p04,
sum(case WHEN da_amp='3305' then da_rate else 0 END) as amp3305,
sum(case WHEN da_amp='3305' then da_pop else 0 END) as p05,
sum(case WHEN da_amp='3306' then da_rate else 0 END) as amp3306,
sum(case WHEN da_amp='3306' then da_pop else 0 END) as p06,
sum(case WHEN da_amp='3307' then da_rate else 0 END) as amp3307,
sum(case WHEN da_amp='3307' then da_pop else 0 END) as p07,
sum(case WHEN da_amp='3308' then da_rate else 0 END) as amp3308,
sum(case WHEN da_amp='3308' then da_pop else 0 END) as p08,
sum(case WHEN da_amp='3309' then da_rate else 0 END) as amp3309,
sum(case WHEN da_amp='3309' then da_pop else 0 END) as p09,
sum(case WHEN da_amp='3310' then da_rate else 0 END) as amp3310,
sum(case WHEN da_amp='3310' then da_pop else 0 END) as p10,
sum(case WHEN da_amp='3311' then da_rate else 0 END) as amp3311,
sum(case WHEN da_amp='3311' then da_pop else 0 END) as p11,
sum(case WHEN da_amp='3312' then da_rate else 0 END) as amp3312,
sum(case WHEN da_amp='3312' then da_pop else 0 END) as p12,
sum(case WHEN da_amp='3313' then da_rate else 0 END) as amp3313,
sum(case WHEN da_amp='3313' then da_pop else 0 END) as p13,
sum(case WHEN da_amp='3314' then da_rate else 0 END) as amp3314,
sum(case WHEN da_amp='3314' then da_pop else 0 END) as p14,
sum(case WHEN da_amp='3315' then da_rate else 0 END) as amp3315,
sum(case WHEN da_amp='3315' then da_pop else 0 END) as p15,
sum(case WHEN da_amp='3316' then da_rate else 0 END) as amp3316,
sum(case WHEN da_amp='3316' then da_pop else 0 END) as p16,
sum(case WHEN da_amp='3317' then da_rate else 0 END) as amp3317,
sum(case WHEN da_amp='3317' then da_pop else 0 END) as p17,
sum(case WHEN da_amp='3318' then da_rate else 0 END) as amp3318,
sum(case WHEN da_amp='3318' then da_pop else 0 END) as p18,
sum(case WHEN da_amp='3319' then da_rate else 0 END) as amp3319,
sum(case WHEN da_amp='3319' then da_pop else 0 END) as p19,
sum(case WHEN da_amp='3320' then da_rate else 0 END) as amp3320,
sum(case WHEN da_amp='3320' then da_pop else 0 END) as p20,
sum(case WHEN da_amp='3321' then da_rate else 0 END) as amp3321,
sum(case WHEN da_amp='3321' then da_pop else 0 END) as p21,
sum(case WHEN da_amp='3322' then da_rate else 0 END) as amp3322,
sum(case WHEN da_amp='3322' then da_pop else 0 END) as p22,
sum(case WHEN da_amp='3323' then da_rate else 0 END) as amp3323,
sum(case WHEN da_amp='3323' then da_pop else 0 END) as p23
  from data_kpi_amp a group by da_kpi  ) b on a.dp_kpi=b.da_kpi
order by a.kpi_id asc";

  if(isset($_POST['submit']))
   {

$stg_gr=$_POST['stg_group'];
     /* $query = "select k.num_kpi,c.kpi_id,da_kpi as dp_kpi,c.kpi_name ,d.da_pop as dp_pop,d.da_data as dp_data,d.da_rate as dp_rate,c.kpi_tar,c.kpi_type_data as kpi_type,k.PA as pa,k.insp as insp ,k.qof as qof,k.stg20 as stg20 ,k.sp as sp
     from  cockpit62.data_kpi_amp d
     RIGHT  JOIN ww.kpi_group k on d.da_kpi=k.kpi_id
     INNER JOIN kpi c on k.kpi_id=c.kpi_id
     where da_amp='{$_POST['amp']}' AND $pa ORDER BY k.no_id asc"; */

//echo $query;

$query = "select * from
(select k.kpi_id,dp_kpi,k.kpi_detail as kpi_name ,d.dp_pop,d.dp_data,d.dp_rate,k.kpi_tar,k.kpi_type_data as kpi_type,k.chk_non_evalue
  from  data_kpi_province d
  right JOIN kpi k on d.dp_kpi=k.kpi_id where kpi_stg_id='$stg_gr' and k.type_kpi='m'
  ORDER BY k.kpi_id asc) a LEFT JOIN

(select

da_kpi,
sum(case WHEN da_amp='3301' then da_rate else 0 END) as amp3301,
sum(case WHEN da_amp='3301' then da_pop else 0 END) as p01,
sum(case WHEN da_amp='3302' then da_rate else 0 END) as amp3302,
sum(case WHEN da_amp='3302' then da_pop else 0 END) as p02,
sum(case WHEN da_amp='3303' then da_rate else 0 END) as amp3303,
sum(case WHEN da_amp='3303' then da_pop else 0 END) as p03,
sum(case WHEN da_amp='3304' then da_rate else 0 END) as amp3304,
sum(case WHEN da_amp='3304' then da_pop else 0 END) as p04,
sum(case WHEN da_amp='3305' then da_rate else 0 END) as amp3305,
sum(case WHEN da_amp='3305' then da_pop else 0 END) as p05,
sum(case WHEN da_amp='3306' then da_rate else 0 END) as amp3306,
sum(case WHEN da_amp='3306' then da_pop else 0 END) as p06,
sum(case WHEN da_amp='3307' then da_rate else 0 END) as amp3307,
sum(case WHEN da_amp='3307' then da_pop else 0 END) as p07,
sum(case WHEN da_amp='3308' then da_rate else 0 END) as amp3308,
sum(case WHEN da_amp='3308' then da_pop else 0 END) as p08,
sum(case WHEN da_amp='3309' then da_rate else 0 END) as amp3309,
sum(case WHEN da_amp='3309' then da_pop else 0 END) as p09,
sum(case WHEN da_amp='3310' then da_rate else 0 END) as amp3310,
sum(case WHEN da_amp='3310' then da_pop else 0 END) as p10,
sum(case WHEN da_amp='3311' then da_rate else 0 END) as amp3311,
sum(case WHEN da_amp='3311' then da_pop else 0 END) as p11,
sum(case WHEN da_amp='3312' then da_rate else 0 END) as amp3312,
sum(case WHEN da_amp='3312' then da_pop else 0 END) as p12,
sum(case WHEN da_amp='3313' then da_rate else 0 END) as amp3313,
sum(case WHEN da_amp='3313' then da_pop else 0 END) as p13,
sum(case WHEN da_amp='3314' then da_rate else 0 END) as amp3314,
sum(case WHEN da_amp='3314' then da_pop else 0 END) as p14,
sum(case WHEN da_amp='3315' then da_rate else 0 END) as amp3315,
sum(case WHEN da_amp='3315' then da_pop else 0 END) as p15,
sum(case WHEN da_amp='3316' then da_rate else 0 END) as amp3316,
sum(case WHEN da_amp='3316' then da_pop else 0 END) as p16,
sum(case WHEN da_amp='3317' then da_rate else 0 END) as amp3317,
sum(case WHEN da_amp='3317' then da_pop else 0 END) as p17,
sum(case WHEN da_amp='3318' then da_rate else 0 END) as amp3318,
sum(case WHEN da_amp='3318' then da_pop else 0 END) as p18,
sum(case WHEN da_amp='3319' then da_rate else 0 END) as amp3319,
sum(case WHEN da_amp='3319' then da_pop else 0 END) as p19,
sum(case WHEN da_amp='3320' then da_rate else 0 END) as amp3320,
sum(case WHEN da_amp='3320' then da_pop else 0 END) as p20,
sum(case WHEN da_amp='3321' then da_rate else 0 END) as amp3321,
sum(case WHEN da_amp='3321' then da_pop else 0 END) as p21,
sum(case WHEN da_amp='3322' then da_rate else 0 END) as amp3322,
sum(case WHEN da_amp='3322' then da_pop else 0 END) as p22,
sum(case WHEN da_amp='3323' then da_rate else 0 END) as amp3323,
sum(case WHEN da_amp='3323' then da_pop else 0 END) as p23
  from data_kpi_amp a group by da_kpi  ) b on a.dp_kpi=b.da_kpi
order by a.kpi_id asc";
   }
  $no=1;

  function chk($kpi_type,$kpi_tar,$kpi_data,$pop){
    if($kpi_type=='1'){
      if($pop=='0.00'){
        ?>
  <span class="glyphicon glyphicon-ban-circle"></span>



  <?php
         }else{
      if($kpi_data <= $kpi_tar){

      // echo $img="<img src='s_success.png'>";

      ?>
        <span class="glyphicon glyphicon-ok" style="color:green"></span>

      <?php
      }else{
        //echo $img="<img src='b_drop.png'>";
        ?>
      <span class="glyphicon glyphicon-remove" style="color:red"></span>

        <?php
      }
    }
    }else{
      if($pop=='0.00'){
        ?>
  <span class="glyphicon glyphicon-ban-circle"></span>

<?php
        //    echo $img="<img src='r35.png'>";
         }else{
      if($kpi_data >= $kpi_tar){

?>
  <span class="glyphicon glyphicon-ok" style="color:green"></span>

<?php

      // echo $img="<img src='s_success.png'>";
      }else{
      // echo $img="<img src='b_drop.png'>";
?>
<span class="glyphicon glyphicon-remove" style="color:red"></span>

<?php
      }
    }
}
  }
  if ($result = $mysqli->query($query)or(die(mysqli_error()))) {
    $num_row = mysqli_num_rows($result);
    $showtxt = "<b>จำนวนตัวชีวัดหลัก <font color=green>".$num_row."</font> ตัวชีวัด</b>";
    /* fetch associative array */
	$bgc="";
    while ($row = $result->fetch_assoc()) {

	$kpi_type=$row["kpi_type"];
  $kpi_tar=$row["kpi_tar"];
    $kpi_rate=$row["dp_rate"];
$ck=$row['chk_non_evalue'];
if($ck=='1'){
	$bgc="class=table-warning";
}else{
	$bgc="";
}
      $p1=$row['p01'];
      $p2=$row['p02'];
      $p3=$row['p03'];
      $p4=$row['p04'];
      $p5=$row['p05'];
      $p6=$row['p06'];
      $p7=$row['p07'];
      $p8=$row['p08'];
      $p9=$row['p09'];
      $p10=$row['p10'];
      $p11=$row['p11'];
      $p12=$row['p12'];
      $p13=$row['p13'];
      $p14=$row['p14'];
      $p15=$row['p15'];
      $p16=$row['p16'];
      $p17=$row['p17'];
      $p18=$row['p18'];
      $p19=$row['p19'];
      $p20=$row['p20'];
      $p21=$row['p21'];
      $p22=$row['p22'];
      $p23=$row['p23'];
      $a1=$row['amp3301'];
      $a2=$row['amp3302'];
        $a3=$row['amp3303'];
          $a4=$row['amp3304'];
            $a5=$row['amp3305'];
              $a6=$row['amp3306'];
                $a7=$row['amp3307'];
                  $a8=$row['amp3308'];
                    $a9=$row['amp3309'];
                      $a10=$row['amp3310'];
                        $a11=$row['amp3311'];
                          $a12=$row['amp3312'];
                            $a13=$row['amp3313'];
                              $a14=$row['amp3314'];
                                $a15=$row['amp3315'];
                                  $a16=$row['amp3316'];
                                    $a17=$row['amp3317'];
                                      $a18=$row['amp3318'];
                                        $a19=$row['amp3319'];
                                          $a20=$row['amp3320'];
                                            $a21=$row['amp3321'];
                                              $a22=$row['amp3322'];
                                                $a23=$row['amp3323'];


	if($kpi_type=='1'){
		if($kpi_rate <= $kpi_tar){
      $img2="<img src='n99.png'>";
			$bg_color="bg-success";
    #$bg_color= "<span class='glyphicon glyphicon-align-left' aria-hidden='true'></span>";
			}else{
	 		$bg_color="bg-warning";
		}

    if($row['amp3311'] <= $kpi_tar){
    #  $img="<img src='s_success.png'>";
    $img = "<span class='glyphicon glyphicon-align-left' aria-hidden='true'></span>";
    }else{
    #  $img="<img src='b_drop.png'>";
    $img= "<span class='glyphicon glyphicon-remove-circle'></span>";
    }
	}elseif($kpi_type=='0'){
		if($kpi_rate >= $kpi_tar){
		$bg_color="bg-success";
		}elseif($row['dp_rate']=='0' && $row['dp_pop'] <> '0'){
		 $bg_color="progress-bar bg-danger";
		}else{
			 $bg_color="bg-warning";
		}
	}

?>

  <tr <?php echo $bgc;?>>
    <td align="center"><?php echo $row['kpi_id'];?><br><br>
      <a href='http://203.157.165.36/cockpit_ssko/profile/f<?php echo $row['kpi_id'];?>.pdf' target="_blank"> <span class="glyphicon glyphicon-file" style="color:green"></span></a>


    </td>
    <td><a href="amphur3.php?kpi_id=<?php echo $row['kpi_id'];?>"><?php echo $row['kpi_name'];?></a></td>
    <td align="right"><?php echo number_format($row["dp_pop"]);?></td>
    <td align="right"><?php echo number_format($row["dp_data"]);?></td>
    <td align="right"><?php echo $row["dp_rate"];	?></td>
   <td valign="middle"><!-- Green -->

<div class="progress" style="height: 25px;">
<?php
if($kpi_type==1 && $row["dp_rate"]==0){
$per=100;
$perShow=0.00;
}else{
$per=$row["dp_rate"];
$perShow=$row["dp_rate"];
}
if($kpi_type==0 && $row["dp_rate"]==0 && $row['dp_pop'] != '0'){
$per=100;
$perShow=0.00;
}else{
	if($kpi_type==1 && $row["dp_rate"]==0){
$per=100;
$perShow=0.00;
}else{
$per=$row["dp_rate"];
$perShow=$row["dp_rate"];
}
}

?>
  <div class="progress-bar <?php echo $bg_color;?>" style="width:<?php echo $per;?>%"><?php echo $perShow;?>%</div>
</div>
    </td>
    <td><?php chk($kpi_type,$kpi_tar,$a23,$p23);?></td>
    <td><?php chk($kpi_type,$kpi_tar,$a1,$p1);?></td>
    <td><?php chk($kpi_type,$kpi_tar,$a2,$p2);?></td>
    <td><?php chk($kpi_type,$kpi_tar,$a3,$p3);?></td>
    <td><?php chk($kpi_type,$kpi_tar,$a4,$p4);?></td>
    <td><?php chk($kpi_type,$kpi_tar,$a5,$p5);?></td>
    <td><?php chk($kpi_type,$kpi_tar,$a6,$p6);?></td>
    <td><?php chk($kpi_type,$kpi_tar,$a7,$p7);?></td>
    <td><?php chk($kpi_type,$kpi_tar,$a8,$p8);?></td>
    <td><?php chk($kpi_type,$kpi_tar,$a9,$p9);?></td>
    <td><?php chk($kpi_type,$kpi_tar,$a10,$p10);?></td>
    <td><?php chk($kpi_type,$kpi_tar,$a11,$p11);?></td>
    <td><?php chk($kpi_type,$kpi_tar,$a12,$p12);?></td>
    <td><?php chk($kpi_type,$kpi_tar,$a13,$p13);?></td>
    <td><?php chk($kpi_type,$kpi_tar,$a14,$p14);?></td>
    <td><?php chk($kpi_type,$kpi_tar,$a15,$p15);?></td>
    <td><?php chk($kpi_type,$kpi_tar,$a16,$p16);?></td>
    <td><?php chk($kpi_type,$kpi_tar,$a17,$p17);?></td>
    <td><?php chk($kpi_type,$kpi_tar,$a18,$p18);?></td>
    <td><?php chk($kpi_type,$kpi_tar,$a19,$p19);?></td>
    <td><?php chk($kpi_type,$kpi_tar,$a20,$p20);?></td>
    <td><?php chk($kpi_type,$kpi_tar,$a21,$p21);?></td>
      <td><?php chk($kpi_type,$kpi_tar,$a22,$p22);?></td>

  </tr>

</tbody>
  <?php
  // echo $showtxt;
  $no++;
      }
      echo "<div align=right>". $showtxt."&nbsp;&nbsp;</div>";
    /* free result set */
    $result->free();
}
?>
</table>

</div>
<?php
$mysqli->close();
?>

</body>
</html>
