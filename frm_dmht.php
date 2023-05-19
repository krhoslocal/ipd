<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE); 

include("includes/dbconn.php");    
include("data/data.php");
include("includes/fusioncharts.php");
$goal=100;
$scale = 100;
$data_type = 0;
$today = date("Y-m-d");
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
          <A href="index.php" class="nav-link">หน้าหลัก3</A>
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

        <DIV class="info">
          <A href="#" class="d-block">Alexander Pierce</A>
        </DIV>
 
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
            <DIV class="badge-pill">
		
			</DIV>
		 </DIV>
 
	  <DIV class="card">
		<DIV class="card-body">
		
		<DIV class="container-fluid">
            <DIV class="row">
                <DIV class="col-md-12">
                    <DIV class="card">
                        <DIV class="card-header">
                            <H3 class="card-header text-white bg-warning">ประมวลผลข้อมูล </H3>
                        </DIV>
                        <DIV class="card-body">
                            <DIV class="row">
                                <DIV class="col-md-4">
									  <LABEL>วันที่เริ่มต้น: (วัน/เดือน/ปี พ.ศ.)</LABEL>
					
									  <DIV class="input-group">
										<DIV class="input-group-prepend">
										  <SPAN class="input-group-text"><I class="far fa-calendar-alt"></I></SPAN>
										</DIV>
										<INPUT type="text" id="dateStart" value="<?php echo $today; ?>" class="form-control" DATA-INPUTMASK-ALIAS="datetime" DATA-INPUTMASK-INPUTFORMAT="yyyy-mm-dd" DATA-MASK="" IM-INSERT="true">
									  </DIV>
									  <!-- /.input group -->
									</DIV>
<?php
	 $QQ2_dm_day = $pdo->query("SELECT COUNT(DISTINCT(b.hn)) as c_dm,sum(if(cc.claim_code_response='200',1,0)) AS c_co FROM claim_moph.target b LEFT JOIN claim_moph.claim_dmht_data cc ON cc.hn=b.hn AND cc.visit_date=b.regdate AND RIGHT(cc.seq,1)=b.frequency where b.type_group='DM' and regdate=curdate()");
          $row_QQ2dm_day = $QQ2_dm_day->fetch();
          $QQ2_ht_day = $pdo->query("SELECT COUNT(DISTINCT(b.hn)) as c_dm,sum(if(cc.claim_code_response='200',1,0)) AS c_co FROM claim_moph.target b LEFT JOIN claim_moph.claim_dmht_data cc ON cc.hn=b.hn AND cc.visit_date=b.regdate AND RIGHT(cc.seq,1)=b.frequency where b.type_group='HT'  and regdate=curdate()");
          $row_QQ2ht_day = $QQ2_ht_day->fetch();
?>

                                <DIV class="col-md-4">
                                    <LABEL>วันที่สิ้นสุด: (วัน/เดือน/ปี พ.ศ.)</LABEL>
                                    <DIV class="input-group">
                                        <DIV class="input-group-prepend">
                                            <SPAN class="input-group-text"><I class="far fa-calendar-alt"></I></SPAN>
                                        </DIV>
                                        <INPUT type="text" id="dateEnd" value="<?php echo $today; ?>" class="form-control" DATA-INPUTMASK-ALIAS="datetime" DATA-INPUTMASK-INPUTFORMAT="yyyy-mm-dd" DATA-MASK="" IM-INSERT="true">
                                    </DIV>
                                </DIV>
                              <DIV class="col-md-4" align="center">
                                <DIV align="center" class="card-header text-white bg-success"><LABEL class="font-weight-light">เลือกประเภทเบิกเคลม</LABEL></DIV>
                                                <!--  <DIV class="small-box bg-success">
                                  <DIV class="inner">
                                    <H3 align="center"><?php echo $row_QQ2dm_day['c_dm'].'/'.$row_QQ2dm_day['c_co']; ?></H3>
                      
                                    <P>DM Per Day</P>
                                    <H3 align="center"><?php echo $row_QQ2dm_day['c_dm'].'/'.$row_QQ2dm_day['c_co']; ?></H3>
                                  </DIV>
                                  <DIV class="icon">
                                    <I class="ion ion-person-add"></I>
                                  </DIV>
                                  <A href="#" DATA-TOGGLE="modal" DATA-TARGET="#_showdata_dm_perday" class="small-box-footer">More info <I class="fas fa-arrow-circle-right"></I></A>
                                  </DIV>-->
								  <BR>
								  				<DIV class="icheck-success d-inline">
                                                    <INPUT type="radio" name="r1" checked="" value="DM"  id="radioSuccess1">
                                                    <LABEL for="radioSuccess1">DM
                                                    </LABEL>
                                                </DIV>
										
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												 <DIV class="icheck-success d-inline">
                                                    <INPUT type="radio" name="r1" value="HT"  id="radioSuccess2" >
                                                    <LABEL for="radioSuccess2">HT
                                                    </LABEL>
                                                </DIV>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<DIV class="icheck-success d-inline">
                                                    <INPUT type="radio"  name="r1" value="DT" id="radioSuccess3" >
                                                    <LABEL for="radioSuccess3"> DT
                                                    </LABEL>
                                                </DIV>
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<DIV class="icheck-success d-inline">
                                                    <INPUT type="radio" name="r1" value="EPI" id="radioSuccess4" >
                                                    <LABEL for="radioSuccess4"> EPI
                                                    </LABEL>
                                                </DIV>
													
                                </DIV>
								     
											
													<!--<DIV class="small-box bg-yellow">
																		  <DIV class="inner">
																		  <H3 align="center"><?php echo $row_QQ2ht_day['c_dm'].'/'.$row_QQ2ht_day['c_co']; ?></H3>
																<P>HT Per Day</P>
												<DIV class="row">
												<DIV class="col-md-6">
													<H3 align="center"><?php echo $row_QQ2ht_day['c_dm']; ?></H3>
												</DIV>
												<DIV class="col-md-6">
												  <H3 align="center"><?php echo $row_QQ2ht_day['c_co']; ?></H3>
												</DIV>
												</DIV>
											  </DIV>
											  <DIV class="icon">
												<I class="ion ion-person-add"></I>
											  </DIV>
												 <A href="#" DATA-TOGGLE="modal" DATA-TARGET="#_showdata_ht_perday" class="small-box-footer">More info <I class="fas fa-arrow-circle-right"></I></A>
											  </DIV>-->
											  
									
                            	</DIV>

							      <DIV class="col-md-24" align="left">
												<DIV class="card-header">
													<H3 class="card-header text-white bg-info"> 
														<a href="https://claim-nhso.moph.go.th/nhso/" target="_blank"><BUTTON id="bt_link" class="btn btn-danger btn-lg float-right">เว็บ Moph</BUTTON></a>&nbsp;&nbsp;&nbsp;
														<BUTTON onClick="fetch_dataall()" id="btProcess" class="btn btn-warning btn-lg float-right">ประมวลผล</BUTTON></H3>
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
		  
		  <nav>
			  <DIV class="nav nav-tabs" id="nav-tab" ROLE="tablist">
				<A class="nav-item nav-link active" id="nav-home-tab" DATA-TOGGLE="tab" href="#nav-home" ROLE="tab" ARIA-CONTROLS="nav-home" ARIA-SELECTED="true">ข้อมูลทั้งหมด</A>
				<A class="nav-item nav-link" id="nav-profile-tab" DATA-TOGGLE="tab" href="#nav-profile" ROLE="tab" ARIA-CONTROLS="nav-profile" ARIA-SELECTED="false">ข้อมูลรอการตรวจสอบ</A>
				<A class="nav-item nav-link" id="nav-contact-tab" DATA-TOGGLE="tab" href="#nav-contact" ROLE="tab" ARIA-CONTROLS="nav-contact" ARIA-SELECTED="false">ข้อมูลผ่านการตรวจสอบพร้อมส่ง</A>
				<A class="nav-item nav-link" id="nav-error-error" DATA-TOGGLE="tab" href="#nav-error" ROLE="tab" ARIA-CONTROLS="nav-contact" ARIA-SELECTED="false">ข้อมูลส่งเบิกเรียบร้อย</A>
			  </DIV>
			</nav>
			<DIV class="tab-content" id="nav-tabContent">
			  <DIV class="tab-pane fade show active" id="nav-home" ROLE="tabpanel" ARIA-LABELLEDBY="nav-home-tab">
			  		<DIV id="show_dataall"></DIV>
			  </DIV>
			  <DIV class="tab-pane fade" id="nav-profile" ROLE="tabpanel" ARIA-LABELLEDBY="nav-profile-tab">
			  		<DIV id="show_data_error1"></DIV>
			  </DIV>
			  <DIV class="tab-pane fade" id="nav-contact" ROLE="tabpanel" ARIA-LABELLEDBY="nav-contact-tab">
			  		<DIV id="show_data_complate"></DIV>
			  </DIV>
			  <DIV class="tab-pane fade" id="nav-error" ROLE="tabpanel" ARIA-LABELLEDBY="nav-error-error">
			  		<DIV id="show_data_complate_send"></DIV>
			  </DIV>
			</DIV>
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
// $(document).ready(){


 
 $(function(){
 		$("#dateStart").inputmask({
			mask:'9999-99-99',
			placeholder: 'yyyy-mm-dd',
 			showMaskOnHover: true,
  			showMaskOnFocus: true,
		}) ;
		$("#dateEnd").inputmask({
			mask:'9999-99-99',
			placeholder: 'yyyy-mm-dd',
 			showMaskOnHover: true,
  			showMaskOnFocus: true,
		})	
})
	

//เริ่มเขียน Function 
 //เริ่มเขียน Function 

    //fetch_dataall();
	
    function fetch_dataall() {
      	var _dateStart = $("#dateStart").val();
          var _dateEnd = $("#dateEnd").val();
		  var _typeservice = $("input[name='r1']:checked").val();
		  console.log(_dateStart);
		  console.log(_dateEnd);
		  console.log(_typeservice);
      $.ajax({
        url: './get_data/sql_fetch_dmht.php',
        method: 'GET',
        data:{startdate:_dateStart, enddate:_dateEnd, typeservice:_typeservice, tab:1},
        dataType: 'HTML',
        success: function(data) {
          $('#show_dataall').html(data);
		  //$('#show_data_error1').html(data_error);
        }
      });
	  $.ajax({
        url: './get_data/sql_fetch_dmht.php',
        method: 'GET',
        data:{startdate:_dateStart, enddate:_dateEnd, typeservice:_typeservice, tab:2},
        dataType: 'HTML',
        success: function(data) {
          $('#show_data_error1').html(data);
		  //$('#show_data_error1').html(data_error);
        }
      });
	    $.ajax({
        url: './get_data/sql_fetch_dmht.php',
        method: 'GET',
        data:{startdate:_dateStart, enddate:_dateEnd, typeservice:_typeservice, tab:3},
        dataType: 'HTML',
        success: function(data) {
          $('#show_data_complate').html(data);
		  //$('#show_data_error1').html(data_error);
        }
      });
	  $.ajax({
        url: './get_data/sql_fetch_dmht.php',
        method: 'GET',
        data:{startdate:_dateStart, enddate:_dateEnd, typeservice:_typeservice, tab:4},
        dataType: 'HTML',
        success: function(data) {
          $('#show_data_complate_send').html(data);
		  //$('#show_data_error1').html(data_error);
        }
      });
    }

$(document).on('click','.chk_error',function(event){
        event.preventDefault();
			var _itype = $(this).attr('data_type');
             var _iregdate = $(this).attr('data_regdate');
             var _ihn = $(this).attr('data_hn');
			 console.log(_itype);
          console.log(_iregdate);
		  console.log(_ihn);
	    $('#_showdata_note').modal('show');

          $.ajax({
            url: './get_data/sql_fetch_note.php',
            method: 'GET',
            data:{data_type:_itype, data_regdate:_iregdate, data_hn:_ihn},
            dataType: 'HTML',
            success: function(data) {
              $('#show_data_note').html(data);
          //$('#show_data_error1').html(data_error);
            }
          });
		  
	})	

 $(document).on('click','.chk_mophic',function(event){
        event.preventDefault();
			var _itype = $(this).attr('data_type');
             var _iregdate = $(this).attr('data_regdate');
             var _ihn = $(this).attr('data_hn');
			 console.log(_itype);
          console.log(_iregdate);
		  console.log(_ihn);


       // if (confirm("คุณต้องการส่งข้อมูล  Moph Claim?")) {
            $.ajax({
                url:"./get_moph/get_moph_dmht.php",
                method:"GET",
                data:{action:_itype, ilind_regdate:_iregdate, ilind_hn:_ihn},
                success:function(data_string){
						//fetch_dataall();
                    if(data_string.status == 200)
                    {
						console.log(data_string.transaction_uid);
                        toastr.success(data_string.message_th, 'SUCCESS');
                         //fetch_dataall();
					}
                    else
                    {
						console.log(data_string);
                        toastr.error(data_string.message_th, 'info!');
						// fetch_dataall();
                    }
                }
            });
        //}
       // else
       // {
       //     return false;
       // }
    })
	$(document).on('click','.chk_mophic_epi',function(event){
        event.preventDefault();
			var _itype = $(this).attr('data_type');
             var _iregdate = $(this).attr('data_regdate');
             var _ihn = $(this).attr('data_hn');
			 var _ivacince = $(this).attr('data_code_vac');
			console.log(_itype);
      console.log(_iregdate);
		  console.log(_ihn);
		  console.log(_ivacince);


       // if (confirm("คุณต้องการส่งข้อมูล  Moph Claim?")) {
            $.ajax({
                url:"./get_moph/get_moph_dmht.php",
                method:"GET",
                data:{action:_itype, ilind_regdate:_iregdate, ilind_hn:_ihn, ivacince:_ivacince},
                success:function(data_string){
						//fetch_dataall();
                    if(data_string.status == 200)
                    {
						console.log(data_string.transaction_uid);
                        toastr.success(data_string.message_th, 'SUCCESS');
                         //fetch_dataall();
					}
                    else
                    {
						console.log(data_string);
                        toastr.error(data_string.message_th, 'info!');
						// fetch_dataall();
                    }
                }
            });
        //}
       // else
       // {
       //     return false;
       // }
    })
	
    var input = document.getElementById("_dateEnd");
         input.addEventListener("keypress", function(event) {
          // If the user presses the "Enter" key on the keyboard
          if (event.key === "Enter") {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.getElementById("btProcess").click();
          }
        });

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
