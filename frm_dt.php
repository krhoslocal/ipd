<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

include("includes/dbconn.php");
include("data/data.php");
include("includes/fusioncharts.php");
$goal = 100;
$scale = 100;
$data_type = 0;
?>

<?php
if (isset($_SESSION['mem_id'])) {
  $Status = $_SESSION["level"];
    if ($Status == "0" or $Status == "1") {
?>

<!DOCTYPE html>
<HTML>

<HEAD>
  <META CHARSET="utf-8">
  <META http-equiv="X-UA-Compatible" content="IE=edge">
  <TITLE><?php echo $titleweb; ?></TITLE>
  <!-- Tell the browser to be responsive to screen width -->
  <META name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <LINK rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <LINK rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <LINK rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <LINK rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <LINK rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <LINK rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <LINK rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <LINK rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <LINK rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <LINK href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <LINK rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <LINK rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <LINK rel="stylesheet" href="dist/css/toastr.min.css">
  
  <!--leo style 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    -->


  <!-- start graph  -->

  <SCRIPT type='text/javascript' src='script.js'></SCRIPT>
  <SCRIPT language='javascript' src='fusioncharts/fusioncharts.js'></SCRIPT>


  <!-- end graph  -->
</HEAD>

<BODY class="hold-transition sidebar-mini layout-fixed">
  <DIV class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <UL class="navbar-nav">
        <LI class="nav-item">
          <A class="nav-link" DATA-WIDGET="pushmenu" href="#" ROLE="button"><I class="fas fa-bars"></I></A>
        </LI>
        <LI class="nav-item d-none d-sm-inline-block">
          <A href="index.php" class="nav-link">หน้าหลัก</A>
        </LI>
        <LI class="nav-item d-none d-sm-inline-block">
          <A href="#" class="nav-link">Contact</A>
        </LI>
      </UL>

      <!-- SEARCH FORM -->
      <FORM class="form-inline ml-3">
        <DIV class="input-group input-group-sm">
          <INPUT class="form-control form-control-navbar" type="search" PLACEHOLDER="Search" ARIA-LABEL="Search">
          <DIV class="input-group-append">
            <BUTTON class="btn btn-navbar" type="submit">
              <I class="fas fa-search"></I>
            </BUTTON>
          </DIV>
        </DIV>
      </FORM>

      <!-- Right navbar links -->
      <UL class="navbar-nav ml-auto">

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

      </UL>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <A href="index.php" class="brand-link">
        <IMG src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <SPAN class="brand-text font-weight-light"><?php echo $txttitle; ?></SPAN>
      </A>

      <!-- Sidebar -->
      <DIV class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <DIV class="user-panel mt-3 pb-3 mb-3 d-flex">

          <!---
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      -->
        </DIV>

        <!-- Sidebar Menu -->
        <?php include('/slide.php'); ?>
        <!-- /.sidebar-menu -->
      </DIV>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <DIV class="content-wrapper">
      <!-- Content Header (Page header) -->
      <DIV class="content-header">
        <DIV class="container-fluid">

        </DIV><!-- /.container-fluid -->
      </DIV>
      <!-- /.content-header -->




      <!-- Main content เงื่อนไข การประมวลผล -->
      <section class="content">
        <DIV class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <DIV class="card">
            <DIV class="card-body">
              <DIV class="row">
                <DIV class="col-md col-12">
                  <DIV align="center">
                    <?php
                    $g_no = $_GET['g_no'];
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
                    $row_q_n = $sqlp->rowCount();


                    $txt = "<div align='center'><h3>" . $row_q['g_comment'] . "</h3></div><br>";
                    $txt .= "<table width='100%'>";
                    $txt .= "<tr align='center'><td align='center'>";

                    $strXMLp =  recivedata($goal, $rowstp['percent'], 0, $scale); //เป้าหมาย,ผลงาน,ประเภท(0 มากดี,1 น้อยดี),ค่ามากสุด
                    //$txt .= "$rowstp[stg_group_name] <i>$rowstp[stg_name]</i><br>";


                    //$txt .= renderChart("fusioncharts/angulargauge.swf", "", $strXMLp, "myChartId$rowdata[kpi_id]", 900, 360, 0, 0);

                    $txt .= "<div align='center' style='font-size:10px'> Update : " . retDatets($rowstp['kpi_update']) . "</div>";

                    //$txt .= '<iframe frameBorder="0" width="320" height="320" scrolling="no" src="gauage.php?kpi_tar='.$goal.'&db_rate='.$rowstp['percent'].'&kpi_type_data='.$data_type.'&kpi_scale='.$scale.'&kpi_radius=1" ></iframe>'; 

                    $txt .= "</td></tr></table>";
                    echo $txt;
                    ?>
                  </DIV>
                </DIV>
              </DIV>



              

            </DIV>
          </DIV>

          <DIV class="card">
            <DIV class="card-body">

              <DIV class="container-fluid">
                <DIV class="row">
                  <DIV class="col-md-12">
                    		
							
							<DIV class="container-fluid">
            <DIV class="row">
                <DIV class="col-md-12">
                    <DIV class="card">
                        <DIV class="card-header">
                            <H3 class="card-title">ตรวจสอบข้อมูลก่อนการประมวลผล 16 แฟ้ม</H3>
                        </DIV>
                        <DIV class="card-body">
                            <DIV class="row">
                                <DIV class="col-md-4">
                                    <LABEL>วันที่เริ่มต้น: (วัน/เดือน/ปี พ.ศ.)</LABEL>
                                    <DIV class="input-group">
                                        <DIV class="input-group-prepend">
                                            <SPAN class="input-group-text"><I class="far fa-calendar-alt"></I></SPAN>
                                        </DIV>
                                        <INPUT id="dateStart" type="text" class="form-control">
                                    </DIV>
                                </DIV>
                                <DIV class="col-md-4">
                                    <LABEL>วันที่สิ้นสุด: (วัน/เดือน/ปี พ.ศ.)</LABEL>
                                    <DIV class="input-group">
                                        <DIV class="input-group-prepend">
                                            <SPAN class="input-group-text"><I class="far fa-calendar-alt"></I></SPAN>
                                        </DIV>
                                        <INPUT id="dateEnd"  type="text" class="form-control" >
                                    </DIV>
                                </DIV>
                                <DIV class="col-md-4">
								   
                                    		<LABEL class="toast-bottom-right">ประเภทข้อมูลประมวลผล</LABEL>
									
                                    <DIV class="row">
                                        <DIV class="col-sm-3">
                                            <DIV class="form-group clearfix">
                                                <DIV class="icheck-success d-inline">
                                                    <INPUT type="radio" name="r1" checked="" value="dm"  id="radioSuccess1">
                                                    <LABEL for="radioSuccess1">DM/HT
                                                    </LABEL>
                                                </DIV>
                                            </DIV>
                                        </DIV>
										<DIV class="col-sm-3">
                                            <DIV class="form-group clearfix">
                                                <DIV class="icheck-success d-inline">
                                                    <INPUT type="radio" name="r1" value="ht"  id="radioSuccess2">
                                                    <LABEL for="radioSuccess2">DM/HT
                                                    </LABEL>
                                                </DIV>
                                            </DIV>
                                        </DIV>
                                        <DIV class="col-sm-2">
                                            <DIV class="form-group clearfix">
                                                <DIV class="icheck-success d-inline">
                                                    <INPUT type="radio" name="r1" value="dt" id="radioSuccess3">
                                                    <LABEL for="radioSuccess3"> DT
                                                    </LABEL>
                                                </DIV>
                                            </DIV>
                                        </DIV>
										<DIV class="col-sm-2">
                                            <DIV class="form-group clearfix">
                                                <DIV class="icheck-success d-inline">
                                                    <INPUT type="radio" name="r1" value="epi" id="radioSuccess4">
                                                    <LABEL for="radioSuccess4"> EPI
                                                    </LABEL>
                                                </DIV>
                                            </DIV>
                                        </DIV>
                                        <DIV class="col-md-12" align="right">
                                            <BUTTON onClick="fetch_dataall()" id="btProcess" class="btn btn-primary float-right">ประมวลผล</BUTTON>
                                        </DIV>
                                    </DIV>
                                </DIV>
                            </DIV>
                        </DIV>
                    </DIV>
                </DIV>
            </DIV>
        </DIV>
							
							
                  </DIV>
                </DIV>
              </DIV>

            </DIV>
          </DIV>



          <?php
          $QQ2 = $pdo->query("SELECT COUNT(*) as c_dm FROM claim_moph.claim_dmht_data b");
          $row_QQ2 = $QQ2->fetch();
          $QQ2_true = $pdo->query("SELECT COUNT(*) as c_dm FROM claim_moph.claim_dmht_data b where b.transaction_uid<>''");
          $row_true_QQ2 = $QQ2_true->fetch();
          $QQ2_dm = $pdo->query("SELECT COUNT(*) as c_dm FROM claim_moph.target b where b.type_group='DM'");
          $row_QQ2dm = $QQ2_dm->fetch();
          $QQ2_ht = $pdo->query("SELECT COUNT(*) as c_dm FROM claim_moph.target b where b.type_group='HT'");
          $row_QQ2ht = $QQ2_ht->fetch();

          $QQ2_dm_day = $pdo->query("SELECT COUNT(DISTINCT(hn)) as c_dm FROM claim_moph.target b where b.type_group='DM' and regdate=curdate()");
          $row_QQ2dm_day = $QQ2_dm_day->fetch();
          $QQ2_ht_day = $pdo->query("SELECT COUNT(DISTINCT(hn)) as c_dm FROM claim_moph.target b where b.type_group='HT'  and regdate=curdate()");
          $row_QQ2ht_day = $QQ2_ht_day->fetch();
          ?>
          <DIV class="card">
            <DIV class="card-body">
              <!-- Main content -->
              <section class="content">
                <DIV class="container-fluid">
                  <!-- Small boxes (Stat box) -->
                  <DIV class="row">
                    <DIV class="col-lg-3 col-6">
                      <!-- small box -->
                      <DIV class="small-box bg-info">
                        <DIV class="inner">
                          <H3><?php echo $row_QQ2['c_dm']; ?></H3>

                          <P>เบิกเคลม Dm HT ทั้งหมด</P>
                        </DIV>
                        <DIV class="icon">
                          <I class="ion ion-bag"></I>
                        </DIV>
                        <A href="#" class="small-box-footer">More info <I class="fas fa-arrow-circle-right"></I></A>
                      </DIV>

                      <DIV class="small-box bg-primary">
                        <DIV class="inner">
                          <H3><?php echo $row_true_QQ2['c_dm']; ?></H3>

                          <P>เบิกเคลม เข้าตามเงื่อนไข</P>
                        </DIV>
                        <DIV class="icon">
                          <I class="ion ion-bag"></I>
                        </DIV>
                        <A href="#" class="small-box-footer">More info <I class="fas fa-arrow-circle-right"></I></A>
                      </DIV>
                    </DIV>

                    <!-- ./col -->
                    <DIV class="col-lg-3 col-6">
                      <!-- small box -->
                      <DIV class="small-box bg-success">
                        <DIV class="inner">
                          <H3>53<SUP style="font-size: 20px">%</SUP></H3>

                          <P>DM</P>
                        </DIV>
                        <DIV class="icon">
                          <I class="ion ion-stats-bars"></I>
                        </DIV>
                        <A href="#" class="small-box-footer">More info <I class="fas fa-arrow-circle-right"></I></A>
                      </DIV>
                    </DIV>
                    <!-- ./col -->
                    <DIV class="col-lg-3 col-6">
                      <!-- small box -->
                      <DIV class="small-box bg-warning">
                        <DIV class="inner">
                          <H3><?php echo $row_QQ2dm_day['c_dm']; ?></H3>

                          <P>DM Per Day</P>
                        </DIV>
                        <DIV class="icon">
                          <I class="ion ion-person-add"></I>
                        </DIV>
                        <A href="#" DATA-TOGGLE="modal" DATA-TARGET="#_showdata_dm_perday" class="small-box-footer">More info <I class="fas fa-arrow-circle-right"></I></A>
                      </DIV>

                      <DIV class="small-box bg-warning">
                        <DIV class="inner">
                          <H3><?php echo $row_QQ2ht_day['c_dm']; ?></H3>

                          <P>HT Per Day</P>
                        </DIV>
                        <DIV class="icon">
                          <I class="ion ion-person-add"></I>
                        </DIV>
                        <A href="#" DATA-TOGGLE="modal" DATA-TARGET="#_showdata_ht_perday" class="small-box-footer">More info <I class="fas fa-arrow-circle-right"></I></A>
                      </DIV>
                    </DIV>

                    <!-- ./col -->
                    <DIV class="col-lg-3 col-6">
                      <!-- small box -->
                      <DIV class="small-box bg-danger">
                        <DIV class="inner">
                          <H3><?php echo $row_QQ2dm['c_dm']; ?></H3>

                          <P>ทะเบียนเป้าหมาย DM เข้ารับการรักษา</P>
                        </DIV>
                        <DIV class="icon">
                          <I class="ion ion-pie-graph"></I>
                        </DIV>
                        <A href="#" class="small-box-footer">More info <I class="fas fa-arrow-circle-right"></I></A>
                      </DIV>
                      <DIV class="small-box bg-danger">
                        <DIV class="inner">
                          <H3><?php echo $row_QQ2ht['c_dm']; ?></H3>

                          <P>ทะเบียนเป้าหมาย HT เข้ารับการรักษา</P>
                        </DIV>
                        <DIV class="icon">
                          <I class="ion ion-pie-graph"></I>
                        </DIV>
                        <A href="#" DATA-TOGGLE="modal" DATA-TARGET="#_showdata_ht" class="small-box-footer">More info <I class="fas fa-arrow-circle-right"></I></A>
                      </DIV>
                    </DIV>
                    <!-- ./col -->
                  </DIV>
                  <!-- /.row -->
                  <!-- Main row -->
                  <?php

                  $g_no = $_GET['g_no'];
                  if ($g_no == '1') {
                    $stmt = $pdo->query("SELECT if(a.STATUS='SIPD1','ส่ง Admit','ยังไมบันทึกAdmit') AS status,
	a.an,
	a.hn,pt.getFullname(a.hn) AS fullname,(SELECT wd.roomname FROM hos.roomno wd WHERE wd.roomcode=a.sendward)AS sendward, pt.getAge(a.hn) as age,
	(SELECT cc.Name from hos.insclasses cc WHERE cc.CODE=a.ptclass LIMIT 1)AS ptclass
	from ipd.ipd a 
		WHERE a.dateadm BETWEEN '2021-01-01' AND CURDATE()  ORDER BY a.dateadm DESC LIMIT 500");
                  ?>
                    <!--  start project -->
                    <DIV class="card">
                      <DIV class="card-body">
                        <TABLE id="example1" class="table table-bordered table-striped">
                          <THEAD>
                            <TR align="center">
                              <TH style="width: 12%">
                                สถานะ Admit
                              </TH>
                              <TH style="width: 10%">AN
                              </TH>
                              <TH style="width: 10%">HN
                              </TH>
                              <TH style="width: 20%">ชื่อ-นามสกุล
                              </TH>
                              <TH style="width: 5%">อายุ
                              </TH>
                              <TH style="width: 25%">สิทธิการรักษา
                              </TH>
                              <TH style="width: 10%">Ward admit
                              </TH>
                              <TH style="width: 20%" class="text-center">พิมพ์ Sticker
                              </TH>

                            </TR>
                          </THEAD>
                          <TBODY>
                            <?php
                            while ($row = $stmt->fetch()) {
                            ?>
                              <TR>
                                <TD><A href="#" class="btn btn-warning btn-sm" DATA-TOGGLE="modal" DATA-TARGET="#_status_admit">
                                    <?php echo $row["status"]; ?></A>
                                </TD>
                                <TD>
                                  <BUTTON id="get_an" type="button" class="btn btn-danger"><?php echo $row["an"]; ?></BUTTON>
                                </TD>
                                <TD>
                                  <?php echo $row["hn"]; ?>
                                </TD>
                                <TD>
                                  <?php echo $row["fullname"]; ?>
                                </TD>
                                <TD align="center">
                                  <?php echo $row["age"] . ' ปี'; ?>
                                </TD>
                                <TD>
                                  <?php echo $row["ptclass"]; ?>
                                </TD>
                                <TD>
                                  <?php echo $row["sendward"]; ?>
                                </TD>
                                <TD><A href="#" class="btn btn-primary btn-sm" DATA-TOGGLE="modal" DATA-TARGET="#_print_admit">
                                    พิมพ์เอกสาร
                                  </A>
                                </TD>

                              </TR>
                            <?php
                            }
                            ?>
                          </TBODY>
                        </TABLE>
                      </DIV>
                    </DIV>
                  <?php
                  };
                  if ($g_no == '3') {
                  };
                  if ($g_no == '4') {
                    $stmt_dt = $pdo->query("SELECT * FROM claim_moph.claim_dt_data a");
                  ?>
                    <DIV class="card">
                      <DIV class="card-body">
                        <TABLE id="dmht" class="table table-bordered table-striped">
                          <THEAD>
                            <TR align="center">
                              <TH style="width: 1%">
                              </TH>
                              <TH style="width: 12%">hn
                              </TH>
                              <TH style="width: 10%">visit_date
                              </TH>
                              <TH style="width: 10%">pid
                              </TH>
                              <TH style="width: 20%">fullname
                              </TH>

                              <TH style="width: 25%">visit_date_time
                              </TH>
                              <TH style="width: 25%">DM
                              </TH>
                              <TH style="width: 25%">HT
                              </TH>
                              <TH style="width: 10%">transaction_uid
                              </TH>
                              <TH style="width: 10%">claim_text_response
                              </TH>
                              <TH style="width: 10%">claim_datetime
                              </TH>
                              <TH style="width: 20%" class="text-center">พิมพ์ Sticker
                              </TH>
                              <TH style="width: 20%" class="text-center">พิมพ์ Sticker
                              </TH>

                            </TR>
                          </THEAD>
                          <TBODY>
                            <?php
                            while ($row = $stmt_dt->fetch()) {
                            ?>
                              <TR>
                                <TD>
                                </TD>
                                <TD><A href="#" class="btn btn-warning btn-sm" DATA-TOGGLE="modal" DATA-TARGET="#_status_admit">
                                    <?php echo $row["hn"]; ?></A>
                                </TD>
                                <TD>
                                  <BUTTON id="get_an" type="button" class="btn btn-danger"><?php echo $row["visit_date"]; ?></BUTTON>
                                </TD>
                                <TD>
                                  <?php echo $row["pid"]; ?>
                                </TD>
                                <TD>
                                  <?php echo $row["fullname"]; ?>
                                </TD>

                                <TD>
                                  <?php echo $row["visit_date_time"]; ?>
                                </TD>
                                <TD>
                                  <?php echo $row["Dm"]; ?>
                                </TD>
                                <TD>
                                  <?php echo $row["ht"]; ?>
                                </TD>
                                <TD>
                                  <?php echo $row["transaction_uid"]; ?>
                                </TD>
                                <TD>
                                  <?php echo $row["claim_text_response"]; ?>
                                </TD>
                                <TD>
                                  <?php echo $row["claim_datetime"]; ?>
                                </TD>
                                <TD>
                                  <?php echo $row["claim_datetime"]; ?>
                                </TD>
                                <TD><A href="#" class="btn btn-primary btn-sm" DATA-TOGGLE="modal" DATA-TARGET="#_print_admit">
                                    พิมพ์เอกสาร
                                  </A>
                                </TD>

                              </TR>
                            <?php
                            }
                            ?>
                          </TBODY>
                        </TABLE>
                      </DIV>
                    </DIV>
                  <?php
                  };
                  if ($g_no == '5') {
                    $stmt_dt = $pdo->query("SELECT * FROM claim_moph.claim_dt_data a;");
                  ?>
                    <DIV class="card">
                      <DIV class="card-body">
                        <TABLE id="dmht" class="table table-bordered table-striped">
                          <THEAD>
                            <TR align="center">
                              <TH style="width: 1%">
                              </TH>
                              <TH style="width: 12%">hn
                              </TH>
                              <TH style="width: 10%">visit_date
                              </TH>
                              <TH style="width: 10%">pid
                              </TH>
                              <TH style="width: 20%">fullname
                              </TH>

                              <TH style="width: 25%">visit_date_time
                              </TH>
                              <TH style="width: 25%">DM
                              </TH>
                              <TH style="width: 25%">HT
                              </TH>
                              <TH style="width: 10%">transaction_uid
                              </TH>
                              <TH style="width: 10%">claim_text_response
                              </TH>
                              <TH style="width: 10%">claim_datetime
                              </TH>
                              <TH style="width: 20%" class="text-center">พิมพ์ Sticker
                              </TH>
                              <TH style="width: 20%" class="text-center">พิมพ์ Sticker
                              </TH>

                            </TR>
                          </THEAD>
                          <TBODY>
                            <?php
                            while ($row = $stmt_dt->fetch()) {
                            ?>
                              <TR>
                                <TD>
                                </TD>
                                <TD><A href="#" class="btn btn-warning btn-sm" DATA-TOGGLE="modal" DATA-TARGET="#_status_admit">
                                    <?php echo $row["hn"]; ?></A>
                                </TD>
                                <TD>
                                  <BUTTON id="get_an" type="button" class="btn btn-danger"><?php echo $row["visit_date"]; ?></BUTTON>
                                </TD>
                                <TD>
                                  <?php echo $row["pid"]; ?>
                                </TD>
                                <TD>
                                  <?php echo $row["fullname"]; ?>
                                </TD>

                                <TD>
                                  <?php echo $row["visit_date_time"]; ?>
                                </TD>
                                <TD>
                                  <?php echo $row["Dm"]; ?>
                                </TD>
                                <TD>
                                  <?php echo $row["ht"]; ?>
                                </TD>
                                <TD>
                                  <?php echo $row["transaction_uid"]; ?>
                                </TD>
                                <TD>
                                  <?php echo $row["claim_text_response"]; ?>
                                </TD>
                                <TD>
                                  <?php echo $row["claim_datetime"]; ?>
                                </TD>
                                <TD>
                                  <?php echo $row["claim_datetime"]; ?>
                                </TD>
                                <TD><A href="#" class="btn btn-primary btn-sm" DATA-TOGGLE="modal" DATA-TARGET="#_print_admit">
                                    พิมพ์เอกสาร
                                  </A>
                                </TD>

                              </TR>
                            <?php
                            }
                            ?>
                          </TBODY>

                        </TABLE>
                      </DIV>
                    </DIV>
                  <?php
                  };
                  ?>
                  <!--   end proj -.

         <div class="container">
        <div class="row">
       
   
      
          right col -->
                </DIV>
                <!-- /.row (main row) -->
                <!-- include Tag -->
			
				
				
                <?php //include('tag_tab.php'); ?>

            </DIV>

            <DIV id="show_dataall"></DIV>




          </DIV><!-- /.container-fluid -->
      </section>


      <!-- /.content -->
    </DIV>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </DIV>

  <!-- ./wrapper -->

  <?php include('show_dialog.php'); ?>

  <!-- jQuery -->
  <SCRIPT src="plugins/jquery/jquery.min.js"></SCRIPT>
  <SCRIPT src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></SCRIPT>

  <!-- jQuery UI 1.11.4 -->
  <SCRIPT src="plugins/jquery-ui/jquery-ui.min.js"></SCRIPT>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <SCRIPT>
    $.widget.bridge('uibutton', $.ui.button)
  </SCRIPT>
  <!-- Bootstrap 4 -->
  <SCRIPT src="plugins/bootstrap/js/bootstrap.bundle.min.js"></SCRIPT>
  <!-- ChartJS -->
  <SCRIPT src="plugins/chart.js/Chart.min.js"></SCRIPT>
  <!-- Sparkline -->
  <SCRIPT src="plugins/sparklines/sparkline.js"></SCRIPT>
  <!-- JQVMap -->
  <SCRIPT src="plugins/jqvmap/jquery.vmap.min.js"></SCRIPT>
  <SCRIPT src="plugins/jqvmap/maps/jquery.vmap.usa.js"></SCRIPT>
  <!-- jQuery Knob Chart -->
  <SCRIPT src="plugins/jquery-knob/jquery.knob.min.js"></SCRIPT>
  <!-- daterangepicker -->
  <SCRIPT src="plugins/moment/moment.min.js"></SCRIPT>
  <SCRIPT src="plugins/daterangepicker/daterangepicker.js"></SCRIPT>
  <!-- Tempusdominus Bootstrap 4 -->
  <SCRIPT src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></SCRIPT>
  <!-- Summernote -->
  <SCRIPT src="plugins/summernote/summernote-bs4.min.js"></SCRIPT>
  <!-- overlayScrollbars -->
  <SCRIPT src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></SCRIPT>
  <!-- DataTables -->
  <SCRIPT src="plugins/datatables/jquery.dataTables.min.js"></SCRIPT>
  <SCRIPT src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></SCRIPT>
  <SCRIPT src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></SCRIPT>
  <SCRIPT src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></SCRIPT>
  <!-- AdminLTE App -->
  <SCRIPT src="dist/js/adminlte.js"></SCRIPT>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <SCRIPT src="dist/js/pages/dashboard.js"></SCRIPT>
  <!-- sweetalert2 -->
  <SCRIPT src="dist/js/jquery.inputmask.js"></SCRIPT>
  <!-- inputmask -->
  <SCRIPT src="dist/js/toastr.min.js"></SCRIPT>
  <!-- AdminLTE for demo purposes -->
  <SCRIPT src="dist/js/demo.js"></SCRIPT>
  <SCRIPT src="dist/js/inputmask.js"></SCRIPT>
  <SCRIPT src="dist/js/bindings/inputmask.binding.js"></SCRIPT>
  <SCRIPT>
  
 
 $(function(){
 		$("#dateStart").inputmask({
			mask:'9999-99-99',
			placeholder: '#',
 			showMaskOnHover: true,
  			showMaskOnFocus: true,
		}) ;
		$("#dateEnd").inputmask({
			mask:'9999-99-99',
			placeholder: '#',
 			showMaskOnHover: true,
  			showMaskOnFocus: true,
		})	
})

    $(function() {
	
		 $("#tables_ipd").DataTable({
					 "responsive": true,
					"autoWidth": false,
					"ordering": true,
					"lengthChange": true,
		  });
				  
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
  </SCRIPT>


  <SCRIPT>
    //เริ่มเขียน Function 
    //fetch_dataall();

    function fetch_dataall() {
      	var _dateStart = $("#dateStart").val();
          var _dateEnd = $("#dateEnd").val();
		  var _tab = '1';
		  console.log(_dateStart);
		  console.log(_dateEnd);
      $.ajax({
        url: './get_data/sql_fetch_dmht.php',
        method: 'GET',
        data:{startdate:_dateStart, enddate:_dateEnd, tab:_tab},
        dataType: 'HTML',
        success: function(data) {
          $('#show_dataall').html(data);
        }
      });
    }



    $(document).on('click', '.chk_mophic', function(event) {
      event.preventDefault();
      var _itype = $(this).attr('data_type');
      var _iregdate = $(this).attr('data_regdate');
      var _ihn = $(this).attr('data_hn');
      console.log(_itype);
      console.log(_iregdate);
      console.log(_ihn);


      if (confirm("คุณต้องการส่งข้อมูล  Moph Claim?")) {
        $.ajax({
          url: "./get_moph/get_moph_dmht.php",
          method: "GET",
          data: {
            action: _itype,
            ilind_regdate: _iregdate,
            ilind_hn: _ihn
          },
          success: function(data_string) {
            if (data_string.status == 200) {
              toastr.success(data_string.message_th, 'SUCCESS');
              // fetch_data(iqdepno);
            } else {
              toastr.error(data_string.message_th, 'ERROR!');
            }
          }
        });
      } else {
        return false;
      }
    })

    
  </SCRIPT>
</BODY>

</HTML>
<?php
  }else{
    header("location: ./login.php?chk=Y");
  }
// if session not LIKE Admin
}else{
  header("location: ./login.php?chk=Y");
}
// if not have session
?>