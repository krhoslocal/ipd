<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE); 

include("includes/dbconn.php");    
include("data/data.php");
include("includes/fusioncharts.php");
//include("includes/function.php");
$goal=100;
$scale = 100;
$data_type = 0;
?>

<?php
//if (isset($_SESSION['UserID'])) {
//  $Status = $_SESSION["level"];
//    if ($Status == "0" or $Status == "1") {
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
       <?php include('/Brand_Logo.php'); ?>
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

      <!-- Main content -->
      <section class="content">
        <DIV class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <DIV class="card">
            <DIV class="card-body">
 <DIV class="row">
 <DIV class="col-md col-12">
   <DIV align="center">
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
           </DIV>
          </DIV>
      </DIV>
	  
  
	  
		<DIV class="row">
 		   <DIV class="col-md col-12">
  			 <DIV align="center">

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
                    <DIV class="card">
                        <DIV class="card-header">
                            <H3 class="card-header text-white bg-success">ประมวลผลข้อมูล วันที่ Admit ผู้ป่วย</H3>
                        </DIV>
                        <DIV class="card-body">
                            <DIV class="row">
                                <DIV class="col-md-4">
                                    <LABEL>ค้นหา AN</LABEL>
                                    <DIV class="input-group">
                                        <DIV class="input-group-prepend">
                                            <SPAN class="input-group-text"><I class="far fa-calendar-alt"></I></SPAN>
                                        </DIV>
                                        <INPUT id="_an" type="text" class="input-group-lg" DATA-INPUTMASK-ALIAS="text" DATA-INPUTMASK-INPUTFORMAT="yyyy/mm/dd" DATA-MASK="" INPUTMODE="numeric">
                                    </DIV>
                                </DIV>
                            </DIV>
                            <BR>
                            <DIV class="float-right">
                          <BUTTON onClick="fetch_dataall()" id="btProcess" class="btn btn-primary pull-right ">ประมวลผล</BUTTON>
                        </DIV>
                        </DIV>
                    </DIV>
                </DIV>
            </DIV>
        </DIV>		
		  
		</DIV>
	 </DIV>
 
 
 
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
              
            </DIV>
			
			<DIV class="small-box bg-primary">
              
             
            </DIV>
          </DIV>
		  
          <!-- ./col -->
          <DIV class="col-lg-3 col-6">
            <!-- small box -->
            <DIV class="small-box bg-success">
              
             
             
            </DIV>
          </DIV>
          <!-- ./col -->
          <DIV class="col-lg-3 col-6">
            <!-- small box -->
            <DIV class="small-box bg-warning">
              
              
              
            </DIV>
			
			 <DIV class="small-box bg-warning">
              
              
            </DIV>
          </DIV>
		  
          <!-- ./col -->
          <DIV class="col-lg-3 col-6">
            <!-- small box -->
            <DIV class="small-box bg-danger">
            </DIV>
			
          </DIV>
          <!-- ./col -->
        </DIV>
        <!-- /.row -->
        <!-- Main row -->
          <!--  start project -->
		 <DIV id="show_dataall">
         
	 </DIV>
          <!--   end proj -.

         <div class="container">
        <div class="row">
       
   
      
          right col -->
        </DIV>
        <!-- /.row (main row) -->
		 <!-- include Tag -->
		<?php //include('tag_tab.php'); ?>
		
    </DIV>
	
	
	
	
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

  <?php  include('show_dialog.php'); ?>

  <!-- jQuery -->
  <SCRIPT src="plugins/jquery/jquery.min.js"></SCRIPT>
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
  <SCRIPT src="dist/js/toastr.min.js"></SCRIPT>
  <!-- AdminLTE for demo purposes -->
  <SCRIPT src="dist/js/demo.js"></SCRIPT>
  
  <SCRIPT>
      
//เริ่มเขียน Function 
 //เริ่มเขียน Function 
   
        var input = document.getElementById("_an");
         input.addEventListener("keypress", function(event) {
          // If the user presses the "Enter" key on the keyboard
          if (event.key === "Enter") {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.getElementById("btProcess").click();
          }
        });
 //fetch_dataall();
    function fetch_dataall() {
		var _ian = $("#_an").val();
      	var _dateStart = $("#dateStart").val();
          var _dateEnd = $("#dateEnd").val();
		  console.log(_ian);
		 // sendsms(_ian);
		  console.log(_dateStart);
		  console.log(_dateEnd);
      $.ajax({
        url: './get_data/sql_fetch_ipd.php',
        method: 'GET',
        data:{serach_an:_ian},
        dataType: 'HTML',
        success: function(data) {
          $('#show_dataall').html(data);
        }
      });
    }

    </SCRIPT>
</BODY>

</HTML>
