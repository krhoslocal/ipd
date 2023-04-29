<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE); 

include("includes/dbconn.php");    
include("data/data.php");
include("includes/fusioncharts.php");
$goal=100;
$scale = 100;
$data_type = 0;


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $titleweb; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- leo style 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    -->

    
    <!-- start graph  -->

  <script type='text/javascript' src='script.js'></script>
    <script language='javascript' src='fusioncharts/fusioncharts.js'></script>
 

<!-- end graph  -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" class="nav-link">หน้าหลัก</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <?php
        if ($_SESSION['username'] != "") {
          echo  "<li class=\"nav-item\">";
         
          echo "<p class=\"text-success\">";
          echo "สวัสดี คุณ  : " . $_SESSION['mem_name'];
          echo "</p>";
         
          echo "</li>";
          // echo "สวัดี คุณ".$_SESSION['mem_name'];
        }

        ?>
        
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo $txttitle; ?></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

          <!---
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      -->
        </div>

        <!-- Sidebar Menu -->
        <?php include('/slide.php'); ?>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
         
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="card">
            <div class="card-body">
 <div class="row">
 <div class="col-md col-12">
   <div align="center">
    <?php
    $g_no=$_GET['g_no'];
    include("condb.php");
		   ///แก้ไข
         // $sqlp = "select  kpi_group.g_no,kpi_group.g_name as g_name,
        //  count(*) as total_kpi,
         // sum(if(flag_result='1',1,0)) as kpi_pass,
         // sum(if(flag_result !='1',1,0)) as kpi_nopass,
         //(sum(if(flag_result='1',1,0)) * 100)/count(*) as percent,
         // now() as kpi_update
         // from kpi INNER JOIN  kpi_group on kpi.kpi_group=kpi_group.g_no WHERE kpi_group='$g_no'";
		// include("condb.php");
			  $pdo->exec("set names utf8");
             // $stmt = $pdo->query("select * from kpi_group");
					$sqlp = $pdo->query("select * from ipd_paperless.kpi_group b WHERE b.g_no='$g_no'");
				
//$resultstp=mysqli_query($,$sqlp);
//$rowstp=mysqli_fetch_array($resultstp);
$row_q = $sqlp->fetch();
$txt = "<div align='center'><h3>".$row_q['g_comment']."</h3></div><br>";
$txt .= "<table width='100%'>";
$txt .= "<tr align='center'><td align='center'>";

$strXMLp =  recivedata($goal,$rowstp['percent'],0,$scale) ;//เป้าหมาย,ผลงาน,ประเภท(0 มากดี,1 น้อยดี),ค่ามากสุด
//$txt .= "$rowstp[stg_group_name] <i>$rowstp[stg_name]</i><br>";


//$txt .= renderChart("fusioncharts/angulargauge.swf", "", $strXMLp, "myChartId$rowdata[kpi_id]", 900, 360, 0, 0);

$txt .= "<div align='center' style='font-size:10px'> Update : ".retDatets($rowstp['kpi_update'])."</div>";

//$txt .= '<iframe frameBorder="0" width="320" height="320" scrolling="no" src="gauage.php?kpi_tar='.$goal.'&db_rate='.$rowstp['percent'].'&kpi_type_data='.$data_type.'&kpi_scale='.$scale.'&kpi_radius=1" ></iframe>'; 

$txt .="</td></tr></table>";  
  echo $txt;
?>
           </div>
          </div>
      </div>
	  
  
	  
		<div class="row">
 		   <div class="col-md col-12">
  			 <div align="center">

		    </div>
          </div>
      </div>  
	  
    </div>
 </div>
 
	  <div class="card">
		<div class="card-body">
		
		<div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-header text-white bg-success">ตรวจสอบข้อมูล</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>วันที่เริ่มต้น:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input id="dateStart" value="01/12/2565" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>วันที่สิ้นสุด:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input id="dateEnd" value="23/12/2565" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="float-right">
                                <button onClick="runProcess()" id="btProcess" class="btn btn-primary pull-right ">ค้นหา</button>
                                <button onClick="exportF16()" id="bt-export-16file" class="btn btn-success pull-right">ส่งออก 16 แฟ้ม</button>
                                <button onClick="exportAPI()" id="bt-send-api" class="btn btn-info pull-right">ส่ง 16 แฟ้ม API</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>		
		  
		</div>
	 </div>
 
 
 
        <?php
			$QQ2 = $pdo->query("SELECT COUNT(*) as c_dm FROM claim_moph.claim_dmht_data b");
			$row_QQ2 = $QQ2->fetch();
			$QQ2_true = $pdo->query("SELECT COUNT(*) as c_dm FROM claim_moph.claim_dmht_data b where b.transaction_uid<>''");
			$row_true_QQ2 = $QQ2_true->fetch();
			$QQ2_dm = $pdo->query("SELECT COUNT(*) as c_dm FROM claim_moph.target b where b.type_group='DM'");
			$row_QQ2dm = $QQ2_dm->fetch();
			$QQ2_ht = $pdo->query("SELECT COUNT(*) as c_dm FROM claim_moph.target b where b.type_group='HT'");
			$row_QQ2ht = $QQ2_ht->fetch();
			
			$QQ2_dm_day = $pdo->query("SELECT COUNT(*) as c_dm FROM claim_moph.target b where b.type_group='DM' and regdate=curdate()");
			$row_QQ2dm_day = $QQ2_dm_day->fetch();
			$QQ2_ht_day = $pdo->query("SELECT COUNT(*) as c_dm FROM claim_moph.target b where b.type_group='HT'  and regdate=curdate()");
			$row_QQ2ht_day = $QQ2_ht_day->fetch();
		?>
           <div class="card">
              <div class="card-body">
        			<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $row_QQ2['c_dm']; ?></h3>

                <p>เบิกเคลม Dm HT ทั้งหมด</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
			
			<div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $row_true_QQ2['c_dm']; ?></h3>

                <p>เบิกเคลม เข้าตามเงื่อนไข</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
		  
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>DM</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $row_QQ2dm_day['c_dm']; ?></h3>

                <p>DM Per Day</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" data-toggle="modal" data-target="#_showdata_dm_perday" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
			
			 <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $row_QQ2ht_day['c_dm']; ?></h3>

                <p>HT Per Day</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" data-toggle="modal" data-target="#_showdata_ht_perday" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
		  
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $row_QQ2dm['c_dm']; ?></h3>

                <p>ทะเบียนเป้าหมาย DM เข้ารับการรักษา</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
			<div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $row_QQ2ht['c_dm']; ?></h3>

                <p>ทะเบียนเป้าหมาย HT เข้ารับการรักษา</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" data-toggle="modal" data-target="#_showdata_ht" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
          <?php
          
          //$pdo->exec("set names utf8");
          $g_no=$_GET['g_no'];
          //แก้ไข query นี้
					//$stmt = $pdo->query("select g.g_no,g.g_name,k.* from kpi k INNER JOIN kpi_group g on k.kpi_group=g.g_no where k.kpi_group='$g_no'");
          //$stmt -> execute();
	if($g_no=='1'){	
	$stmt = $pdo->query("SELECT if(a.STATUS='SIPD1','ส่ง Admit','ยังไมบันทึกAdmit') AS status,
	a.an,
	a.hn,pt.getFullname(a.hn) AS fullname,(SELECT wd.roomname FROM hos.roomno wd WHERE wd.roomcode=a.sendward)AS sendward, pt.getAge(a.hn) as age,
	(SELECT cc.Name from hos.insclasses cc WHERE cc.CODE=a.ptclass LIMIT 1)AS ptclass
	from ipd.ipd a 
		WHERE a.dateadm BETWEEN '2021-01-01' AND CURDATE()  ORDER BY a.dateadm DESC LIMIT 500");
          ?>
          <!--  start project -->
          <div class="card">
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
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
                <tbody>
                  <?php
                  while ($row = $stmt->fetch()) {
                  ?>
                    <tr>
                      <td><a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#_status_admit">
					  	<?php echo $row["status"]; ?></a>
                      </td>
                      <td>
					  <button id="get_an" type="button" class="btn btn-danger"><?php echo $row["an"]; ?></button>
                      </td>
                      <td>
                        <?php echo $row["hn"]; ?>
                      </td>
                      <td>
                     <?php echo $row["fullname"]; ?> 
                 </td>
				 <td align="center">
                     <?php echo $row["age"].' ปี'; ?> 
                 </td>
				 <td>
                     <?php echo $row["ptclass"]; ?> 
                 </td>
                 <td>
                 <?php echo $row["sendward"]; ?> 
                 </td>
                 <td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#_print_admit">
     			            พิมพ์เอกสาร
				 </a>
                 </td>
                 
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
	<?php 	  
	};
	if($g_no=='3'){
	$stmt = $pdo->query("SELECT a.hn,a.visit_date,a.pid,CONCAT(a.title,'',a.fname,'  ',a.lname) AS fullname,a.hospital_name,a.visit_date_time,
	if(a.is_used_dm=1,'DM','N') AS Dm, if(a.is_used_ht=1,'HT','N') AS ht,a.transaction_uid,a.claim_text_response,a.claim_datetime
	FROM claim_moph.claim_dmht_data a ");
	?>
	<div class="card">
            <div class="card-body">
              <table id="dmht" class="table table-bordered table-striped">
                <thead>
                  <tr align="center">
				  	<th style="width: 1%">
                    </th>
                    <th style="width: 12%">hn
                    </th>
                    <th style="width: 10%">visit_date
                    </th>
                    <th style="width: 10%">pid
                    </th>
                    <th style="width: 20%">fullname
                    </th>
					 
					 <th style="width: 25%">visit_date_time
                    </th>
					<th style="width: 25%">DM
                    </th>
					<th style="width: 25%">HT
                    </th>
                    <th style="width: 10%">transaction_uid
                    </th>
					<th style="width: 10%">claim_text_response
                    </th>
					<th style="width: 10%">claim_datetime
                    </th>
                    <th style="width: 20%" class="text-center">พิมพ์ Sticker
                    </th>
					<th style="width: 20%" class="text-center">พิมพ์ Sticker
                    </th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row = $stmt->fetch()) {
                  ?>
                    <tr>
						<td>
                      </td>
                      <td><a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#_status_admit">
					  	<?php echo $row["hn"]; ?></a>
                      </td>
                      <td>
					  <button id="get_an" type="button" class="btn btn-danger"><?php echo $row["visit_date"]; ?></button>
                      </td>
                      <td>
                        <?php echo $row["pid"]; ?>
                      </td>
                      <td>
                     <?php echo $row["fullname"]; ?> 
                 </td>
				 
				 <td>
                     <?php echo $row["visit_date_time"]; ?> 
                 </td>
				 <td>
                     <?php echo $row["Dm"]; ?> 
                 </td>
				 <td>
                     <?php echo $row["ht"]; ?> 
                 </td>
				 <td>
                     <?php echo $row["transaction_uid"]; ?> 
                 </td>
				 <td>
                     <?php echo $row["claim_text_response"]; ?> 
                 </td>
				 <td>
                     <?php echo $row["claim_datetime"]; ?> 
                 </td>
                 <td>
                 <?php echo $row["claim_datetime"]; ?> 
                 </td>
                 <td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#_print_admit">
     			            พิมพ์เอกสาร
				 </a>
                 </td>
                 
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
	<?php	
	};
	?>
          <!--   end proj -.

         <div class="container">
        <div class="row">
       
   
      
          right col -->
        </div>
        <!-- /.row (main row) -->
    </div>
  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  
  <!-- ./wrapper -->

  <?php include('show_dialog.php'); ?>

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- DataTables -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
		"ordering": true,
		"lengthChange": false,
      });
	  $("#dmht").DataTable({
        "responsive": true,
        "autoWidth": false,
		"ordering": true,
		"lengthChange": false,
      });
	  $("#showdata_dm_perday").DataTable({
        "responsive": true,
        "autoWidth": false,
		"ordering": true,
		"lengthChange": false,
      });
	  $("#showdata_ht_perday").DataTable({
        "responsive": true,
        "autoWidth": false,
		"ordering": true,
		"lengthChange": false,
      });
      $('#example2').DataTable({
        "paging": true,
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  
  
  <script>
        $(function() {
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            $('[data-mask]').inputmask()

            $('#ofc').addClass('menu-open ');
            $('#ofc-opd').addClass('menu-open');
            $('#ofc-opd-audit').addClass('active bg-purple');

        })

        var isOpd = true;
        radioJob = "";
        function selectMainClass() {
            var _mainClass = $('#select-main-class').val();
            $.get("/File16/getSubClass?mainClass=" + _mainClass[0], function(data) {
                $('#ptclass').bootstrapDualListbox('removeAllLabel');
                var subclassOption = "";
                for (var i = 0; i < data.length; i++) {
                    subclassOption += "<option value=\"" + data[i].CODE + "\">" + data[i].name + "</option>";

                }
                $('#ptclass').html(subclassOption);
                $('#ptclass').bootstrapDualListbox('refresh');
            });
        }

        function convertToEnDate(thDate) {
            var d = thDate.split("/");
            var dd = d[0];
            var mm = d[1];
            var yy = Number(d[2]);
            return (yy - 543) + "-" + mm + "-" + dd;
        }

        function exportAPI() {
            $('#modal-overlay').modal('show');

            var dataType = ["OP"];
            var jsonBody = {};
            jsonBody.path = f16_filename;
            jsonBody.main_ins = "OFC";
            jsonBody.data_type = dataType;
            jsonBody.op_refer = false;
            jsonBody.import_dup = false;
            jsonBody.assign_to_me = true;
            console.log(jsonBody);
            $.ajaxSetup({
                headers: {
                    'Content-Type': 'application/json; charset=UTF-8'
                }
            });

            $.post("/file16/sendF16ToApi", JSON.stringify(jsonBody), function(data) {
                console.log(data);
                window.setTimeout(function() {
                    $('#modal-overlay').modal('hide');

                    alert(data.message);

                }, 500);
            }).fail(function() {
                window.setTimeout(function() {
                    $('#modal-overlay').modal('hide');

                    alert("เกิดข้อผิดพลาด ไม่สามารถส่งผ่าน API ได้!");
                    window.open("/file16/download?filename=" + f16_filename, "_blank");

                }, 500);
            });
        }

        var f16_filename = "";


        function exportF16() {
            var _dateStart = convertToEnDate($("#dateStart").val());
            var _dateEnd = convertToEnDate($("#dateEnd").val());

            if ($("#dateStart").val() == "") {
                alert("กรุณาระบุวันที่เริ่มต้น");
                return;
            }

            if ($("#dateEnd").val() == "") {
                alert("กรุณาระบุวันที่สิ้นสุด");
                return;
            }

            $('#modal-overlay').modal('show');

            $.get("/File16/exportF16ByJob?job=" + "ofc" + "&dateStart=" + _dateStart + "&dateEnd=" + _dateEnd, function(data) {
                f16_filename = data.filename;

                window.setTimeout(function() {
                    $('#modal-overlay').modal('hide');

                    $('#bt-send-api').removeAttr("disabled");

                    window.setTimeout(function() {
                        var r = confirm("ประมวลผลเรียบร้อย ต้องการส่งผ่าน API เลยหรือไม่?");
                        if (r == true) {
                            exportAPI();
                        } else {
                            window.open("/file16/download?filename=" + data.filename, "_blank");
                        }
                    }, 500);
                }, 500);

            });
        }

        function runProcess() {
            var _dateStart = convertToEnDate($("#dateStart").val());
            var _dateEnd = convertToEnDate($("#dateEnd").val());

            if ($("#dateStart").val() == "") {
                alert("กรุณาระบุวันที่เริ่มต้น");
                return;
            }

            if ($("#dateEnd").val() == "") {
                alert("กรุณาระบุวันที่สิ้นสุด");
                return;
            }

            $('#modal-overlay').modal('show');

            $.get("/File16/getcmF16byJob?job=" + "ofc" + "&dateStart=" + _dateStart + "&dateEnd=" + _dateEnd, function(data) {
                tableBuilder(0, "table1", data.header[0], data.result.Table);
                tableBuilder(1, "table2", data.header[1], data.result.Table1);
                console.log(data.discription);
                $("#discription").html(data.discription);
                $('#bt-export-16file').removeAttr('disabled');

                window.setTimeout(function() {
                    $('#modal-overlay').modal('hide');
                }, 500);


            });
        }

        function changePtclass(visit_type, regdate, hn, frequency, ptclass) {
            $('#edit-pt-class-visit-type').val(visit_type);
            $('#edit-pt-class-regdate').val(regdate);
            $('#edit-pt-class-hn').val(hn);
            $('#edit-pt-class-frequency').val(frequency);
            console.log(regdate);
            $("#chang-pt-class").val(ptclass).trigger('change');
            $('#modal-ptclass').modal('show');
        }

        function updatePtClass() {
            var visit_tyep = $('#edit-pt-class-visit-type').val();
            var regdate = $('#edit-pt-class-regdate').val();
            var hn = $('#edit-pt-class-hn').val();
            var frequency = $('#edit-pt-class-frequency').val();
            var new_ptclass = $('#chang-pt-class').val();
            var d = regdate.split("-");
            var new_date = ((Number(d[2]) - 543) + "-" + d[1] + "-" + d[0]).toString();
            console.log(new_date);
            $.get("/file16/updatePtclass?visit_type=" + visit_tyep + "&regdate=" + new_date + "&hn=" + hn + "&frequency=" + frequency + "&ptclass_no=" + new_ptclass, function() {
                alert("เปลี่ยนสิทธิ์เรียบร้อยแล้ว อาจจะต้อง reflash page ถึงจะเห็นการเปลี่ยนแปลง");
                $('#modal-ptclass').modal('hide');
            });
        }

        function editEdc(type, regdate, hn, frequency, btn) {
            var row = btn.parentNode.parentNode;
            var r = row.getElementsByTagName("td");
            $('#edc-cid').val(r[7].innerText);
            $('#edc-fullname').val(r[6].innerText);
            $('#edc-hn').val(r[3].innerText);
            $('#edc-gl-code').val(r[1].innerText);
            $('#edc-ptclass').val(r[10].innerText);
            $('#edc-cost').val(r[11].innerText);

            $('#edc-type').val(type);

            $('#edc-regdate').val(regdate);
            $('#edc-frequency').val(frequency);

            $('#modal-edit-edc').modal('show');
        }

        function saveEdc() {
            var type = $('#edc-type').val();
            var regdate = convertToEngDate($('#edc-regdate').val());
            var hn = $('#edc-hn').val();
            var frequency = $('#edc-frequency').val();
            var edcno = $('#edc-app-code').val();
            var terminalno = $('#edc-terminal-no').val();
            var merchantno = $('#edc-merchant-no').val();

            $.get("/ofc/saveEdc?type=" + type + "&regdate=" + regdate + "&hn=" + hn + "&frequency=" + frequency + "&edcno=" + edcno + "&terminalno=" + terminalno + "&merchantno=" + merchantno, function() {
                $('#edc-app-code').val("");
                $('#edc-terminal-no').val("");
                $('#edc-merchant-no').val("");
                $('#modal-edit-edc').modal('hide');
            });
        }

        function convertToEngDate(thDate) {
            var d = thDate.split("-");
            var dd = d[0];
            var mm = d[1];
            var yy = Number(d[2]) - 543;
            return yy + "-" + mm + "-" + dd;
        }

        function tableBuilder(index, tableId, tableHeader, tableData) {
            $("#example" + (index + 1)).DataTable().destroy();
            var headerHtml = "<tr>";
            for (var i = 0; i < tableHeader.length; i++) {
                headerHtml += "<th>" + tableHeader[i] + "</th>";
            }
            headerHtml += "</tr>";
            $("#" + tableId + "-header").html(headerHtml);
            $("#" + tableId + "-foot").html(headerHtml);
            var bodyHtml = "";
            for (var i = 0; i < tableData.length; i++) {
                bodyHtml += "<tr>";
                for (var j = 0; j < tableHeader.length; j++) {
                    if (tableHeader[j] == "hn") {
                        bodyHtml += "<td><button onclick=\"editEdc('" + tableData[i].unit + "','" + tableData[i].regdate + "','" + tableData[i].hn + "','" + tableData[i].visit + "',this)\" class=\"btn btn-xs btn-primary\">" + tableData[i][tableHeader[j].toString()] + "</button></td>";
                    } else {
                        bodyHtml += "<td>" + tableData[i][tableHeader[j].toString()] + "</td>";

                    }
                }
                bodyHtml += "</tr>";
            }
            $("#" + tableId + "-body").html(bodyHtml);

            $("#example" + (index + 1)).DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["excel", "print"]
            }).buttons().container().appendTo("#example" + (index + 1) + "_wrapper .col-md-6:eq(0)");
        }

        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({ gutterPixels: 3 });
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })


    </script>
</body>

</html>