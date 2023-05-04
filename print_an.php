<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE); 

include("includes/dbconn.php");    
include("data/data.php");
include("includes/fusioncharts.php");
$goal=100;
$scale = 100;
$data_type = 0;

$_ian = $_GET['an_input'];


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


  <SCRIPT type='text/javascript' src='script.js'></SCRIPT>
    <SCRIPT language='javascript' src='fusioncharts/fusioncharts.js'></SCRIPT>
 

<!-- end graph onload=javascript:window.print()  -->
</HEAD>

<BODY id="main" onload=javascript:window.print()>
<?php
include("condb.php");
$pdo->exec("set names utf8");
                    // $stmt = $pdo->query("select * from kpi_group");
                    $sqlp = $pdo->query("SELECT if(a.STATUS='SIPD1','ส่ง Admit','ยังไมบันทึกAdmit') AS status,
	a.an,a.hn,pt.getFullname(a.hn) AS fullname,(SELECT wd.roomname FROM hos.roomno wd WHERE wd.roomcode=a.now_ward)AS sendward, pt.getAge(a.hn) as age,(SELECT cc.Name from hos.insclasses cc WHERE cc.CODE=a.ptclass LIMIT 1)AS ptclass from ipd.ipd a WHERE a.an='$_ian'");




                    //$resultstp=mysqli_query($,$sqlp);
                    //$rowstp=mysqli_fetch_array($resultstp);
                    $row_q = $sqlp->fetch();
                    $row_q_n = $sqlp->rowCount();

?>
</span>
  <TR>
    <TD width="100%" height="50%">
	<TABLE width="100%" height="38%" border="0" cellpadding="0" cellspacing="0">
      <TR>
        <TD width="164"><P class="style6">HN: <?php echo $row_q['hn']; ?> AN:<?php echo $row_q['an']; ?><BR />
                  <?php echo $row_q['fullname']; ?><BR />
          อายุ : <?php echo $row_q['age']; ?> ปี <?php echo $row_q['sendward']; ?><BR />
          <?php echo $row_q['sendward']; ?></P></TD>
         <TD width="164"><P class="style6">HN: <?php echo $row_q['hn']; ?> AN:<?php echo $row_q['an']; ?><BR />
                  <?php echo $row_q['fullname']; ?><BR />
          อายุ : <?php echo $row_q['age']; ?> ปี <BR />
          <?php echo $row_q['sendward']; ?></P></TD>
        <TD width="176" valign="top"><P class="style6">HN: <?php echo $row_q['hn']; ?> AN:<?php echo $row_q['an']; ?><BR />
                  <?php echo $row_q['fullname']; ?> <BR />
          อายุ : <?php echo $row_q['age']; ?> ปี <BR />
        </P></TD>
        <TD width="169" valign="top"><P align="right" class="style6">HN: <?php echo $row_q['hn']; ?> AN:<?php echo $row_q['an']; ?><BR />
                  <?php echo $row_q['fullname']; ?><BR />
          อายุ : <?php echo $row_q['age']; ?> ปี <BR />
          <?php echo $row_q['sendward']; ?></P></TD>
        <TD width="163" valign="top"><P align="right" class="style6">HN: <?php echo $row_q['hn']; ?> AN:<?php echo $row_q['an']; ?><BR />
                  <?php echo $row_q['fullname']; ?> <BR />
          อายุ : <?php echo $row_q['age']; ?> ปี <BR />
          <?php echo $row_q['sendward']; ?></P></TD>
      </TR>
    </TABLE>
  </TD>
  </TR>
  <TR>
    <TD valign="center">
	  <?php for ($i=1; $i<=3; $i++){ ?>
        <TABLE width="100%" height="0%" border="0" cellpadding="0" cellspacing="0" >
         <TR align="left" height="50">
	 	   <TD width="52%" height="55" align="left" valign="top">HN: <?php echo $row_q['hn']; ?>&nbsp;&nbsp; AN:<?php echo $row_q['an']; ?> <?php echo $row_q['sendward']; ?> <SPAN class="style6"><?php echo $row_q['fullname']; ?></SPAN> <SPAN class="style6">อายุ : <?php echo $row_q['age']; ?> ปี </SPAN></TD>
		 	
		   <TD width="52%" valign="top">HN: <?php echo $row_q['hn']; ?>&nbsp;&nbsp; AN:<?php echo $row_q['an']; ?> <?php echo $row_q['sendward']; ?> <SPAN class="style6"><?php echo $row_q['fullname']; ?></SPAN> <SPAN class="style6">อายุ : <?php echo $row_q['age']; ?> ปี </SPAN></TD>
		 </TR>

      </TABLE>
      <?php
  };
	  ?>
    </TD>
	
  </TR>
 <TR>
    <TD valign="top">
	  <?php for ($i=1; $i<=2; $i++){ ?>
        <TABLE width="100%" height="0%" border="0" cellpadding="0" cellspacing="0" >
         <TR align="left" height="50">
	 	   <TD width="52%" height="60" align="left" valign="top"> HN: <?php echo $row_q['hn']; ?>&nbsp;&nbsp; AN:<?php echo $row_q['an']; ?> <?php echo $row_q['sendward']; ?><BR>
 	       <SPAN class="style6"><?php echo $row_q['fullname']; ?></SPAN> <SPAN class="style6">อายุ : <?php echo $row_q['age']; ?> ปี </SPAN></TD>
		 	
		   <TD width="52%" valign="top">HN: <?php echo $row_q['hn']; ?>&nbsp;&nbsp; AN:<?php echo $row_q['an']; ?> <?php echo $row_q['sendward']; ?><BR>
             <SPAN class="style6"><?php echo $row_q['fullname']; ?></SPAN> <SPAN class="style6">อายุ : <?php echo $row_q['age']; ?> ปี </SPAN></TD>
		 </TR>

      </TABLE>
      <?php
  };
	  ?>
    </TD>
	
  </TR>
 <TR>
    <TD valign="top">
	  <?php for ($i=1; $i<=3; $i++){ ?>
        <TABLE width="100%" height="0%" border="0" cellpadding="0" cellspacing="0" >
         <TR align="left" height="50">
	 	   <TD width="52%" height="60" align="left" valign="top">HN: <?php echo $row_q['hn']; ?>&nbsp;&nbsp; AN:<?php echo $row_q['an']; ?> <?php echo $row_q['sendward']; ?><BR>
             <SPAN class="style6"><?php echo $row_q['fullname']; ?></SPAN> <SPAN class="style6">อายุ : <?php echo $row_q['age']; ?> ปี </SPAN></TD>
		 	
		   <TD width="52%" valign="top">HN: <?php echo $row_q['hn']; ?>&nbsp;&nbsp; AN:<?php echo $row_q['an']; ?> <?php echo $row_q['sendward']; ?><BR>
             <SPAN class="style6"><?php echo $row_q['fullname']; ?></SPAN> <SPAN class="style6">อายุ : <?php echo $row_q['age']; ?> ปี </SPAN></TD>
		 </TR>

      </TABLE>
      <?php
  };
	  ?>
    </TD>
	
  </TR>
 <TR>
    <TD valign="top">
	  <?php for ($i=1; $i<=3; $i++){ ?>
        <TABLE width="100%" height="0%" border="0" cellpadding="0" cellspacing="0" >
         <TR align="left" height="50">
	 	   <TD width="52%" height="60" align="left" valign="top">HN: <?php echo $row_q['hn']; ?>&nbsp;&nbsp; AN:<?php echo $row_q['an']; ?> <?php echo $row_q['sendward']; ?><BR>
             <SPAN class="style6"><?php echo $row_q['fullname']; ?></SPAN> <SPAN class="style6">อายุ : <?php echo $row_q['age']; ?> ปี </SPAN></TD>
		 	
		   <TD width="52%" valign="top">HN: <?php echo $row_q['hn']; ?>&nbsp;&nbsp; AN:<?php echo $row_q['an']; ?> <?php echo $row_q['sendward']; ?><BR>
             <SPAN class="style6"><?php echo $row_q['fullname']; ?></SPAN> <SPAN class="style6">อายุ : <?php echo $row_q['age']; ?> ปี </SPAN></TD>
		 </TR>

      </TABLE>
      <?php
  };
	  ?>
    </TD>
	
  </TR>
<TR height="10">
</TR>
  <TR>
    <TD valign="center">
	  <?php for ($i=1; $i<=11; $i++){ ?>
        <TABLE width="100%" height="0%" border="0" cellpadding="0" cellspacing="0" >
         <TR align="left" height="50">
	 	   <TD width="52%" height="60" align="left" valign="top">HN: <?php echo $row_q['hn']; ?>&nbsp;&nbsp; AN:<?php echo $row_q['an']; ?> <?php echo $row_q['sendward']; ?><BR>
             <SPAN class="style6"><?php echo $row_q['fullname']; ?></SPAN> <SPAN class="style6">อายุ : <?php echo $row_q['age']; ?> ปี </SPAN></TD>
		 	
		   <TD width="52%" valign="top">HN: <?php echo $row_q['hn']; ?>&nbsp;&nbsp; AN:<?php echo $row_q['an']; ?> <?php echo $row_q['sendward']; ?><BR>
             <SPAN class="style6"><?php echo $row_q['fullname']; ?></SPAN> <SPAN class="style6">อายุ : <?php echo $row_q['age']; ?> ปี </SPAN></TD>
		 </TR>

      </TABLE>
      <?php
  };
	  ?>
    </TD>
	
  </TR>


</BODY>
</body>

</HTML>