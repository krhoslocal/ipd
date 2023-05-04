<?php
include("includes/dbconn.php"); 
if (isset($_GET['msg'])) {
	$msg = $_GET['msg'];
	if ($msg == '1') {
		echo "<script>alert('Username หรือ Password ไม่ถูกต้อง');</script>";
	}elseif ($msg == '2')
	{
		echo "<script>alert('กรุณารอให้ผู้ดูแลระบบเปิดให้ใช้งานก่อนครับ');</script>";
	}
}
?>
<!DOCTYPE html>
<HTML>
<HEAD>
  <META CHARSET="utf-8">
  <META http-equiv="X-UA-Compatible" content="IE=edge">
  <TITLE>KRHOS Report-Online | Log in</TITLE>
  <!-- Tell the browser to be responsive to screen width -->
  <META name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <LINK href="https://fonts.googleapis.com/css?family=Kanit:300,400,400i,700&amp;display=fallback" rel="stylesheet">
  <LINK rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <LINK rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <LINK rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style 
  <link rel="stylesheet" href="dist/css/adminlte.min.css">-->
  <LINK rel="stylesheet" href="dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro 
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">-->
  <STYLE type="text/css">
<!--
.style1 {color: #66CCFF}
-->
  </STYLE>
</HEAD>
<BODY class="login-page">
<DIV class="login-box login-card-body">
  <DIV class="card">
      <DIV class="accent-dark">
	  </DIV>
  </DIV>
  <BR>
  <DIV class="card">
    <DIV class="card-body login-card-body" align="center"><B><IMG src="/ipd/images/logo.gif" width="225" height="241"></B><B><br><?php echo $name_system; ?></B><BR>
      <B>
      <P class="login-box-msg">โรงพยาบาลกันทรารมย์</P>
      </B> <B class="text-black-80">
      <P class="login-box-msg">ระบบรายงานและติดตามตัวชีวัด</P>
    </B></DIV>
    <!-- /.login-card-body -->
  </DIV>
  <!-- /.login-logo -->
  <DIV class="card">
    <DIV class="card-body login-card-body">
      <FORM action="login_check.php" method="POST">
        <DIV class="input-group mb-3">
          <INPUT type="text" name="txt_user" class="form-control" PLACEHOLDER="Username">
          <DIV class="input-group-append">
            <DIV class="input-group-text">
              <SPAN class="fas fa-user"></SPAN>
            </DIV>
          </DIV>
        </DIV>
        <DIV class="input-group mb-3">
          <INPUT type="password" name="txt_password" class="form-control" PLACEHOLDER="Password">
          <DIV class="input-group-append">
            <DIV class="input-group-text">
              <SPAN class="fas fa-lock"></SPAN>
            </DIV>
          </DIV>
        </DIV>
        <DIV class="row" align="center">
          
          <!-- /.col -->
          <DIV class="col-4" align="center">
            <BUTTON type="submit" class="btn btn-primary btn-block">Login</BUTTON>
          </DIV>
          <!-- /.col -->
        </DIV>
      </FORM>

     
    

      
    </DIV>
    <!-- /.login-card-body -->
  </DIV>
</DIV>
<!-- /.login-box -->

<!-- jQuery -->
<SCRIPT src="plugins/jquery/jquery.min.js"></SCRIPT>
<!-- Bootstrap 4 -->
<SCRIPT src="plugins/bootstrap/js/bootstrap.bundle.min.js"></SCRIPT>
<!-- AdminLTE App -->
<SCRIPT src="dist/js/adminlte.min.js"></SCRIPT>

</BODY>
</HTML>
