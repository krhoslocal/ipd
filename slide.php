<nav class="mt-2">
<?php
	 if ($_SESSION['_tocard'] <>"0") {

        ?>
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>รายงาน<i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <?php
              include("condb.php");
			  $pdo->exec("set names utf8");
              $stmt = $pdo->query("select * from kpi_group where g_card='tocard'");
              
              ?>
              <ul class="nav nav-treeview">
                <?php
              while ($row = $stmt->fetch()) {
                ?>
                <li class="nav-item">
                  <a href="./<?php echo $row['g_link'];?>" class="nav-link" title="<?php echo $row['g_comment'];?>">
                    <i class="nav-icon <?php echo $row['g_icon'];?> "></i>
					
                    <p><?php echo $row['g_name'];?></p>
                  </a>
                </li>
                <?php } ?>
  
          </ul>
 <?php } if ($_SESSION['_toadm']  <>"0"){ ?>
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>ผู้ป่วยใน<i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <?php
              include("condb.php");
			  $pdo->exec("set names utf8");
              $stmt = $pdo->query("select * from kpi_group where g_card='toadm'");
              
              ?>
              <ul class="nav nav-treeview">
                <?php
              while ($row = $stmt->fetch()) {
                ?>
                <li class="nav-item">
                  <a href="./<?php echo $row['g_link'];?>" class="nav-link" title="<?php echo $row['g_comment'];?>">
                    <i class="nav-icon <?php echo $row['g_icon'];?> "></i>
					
                    <p><?php echo $row['g_name'];?></p>
                  </a>
                </li>
                <?php } ?>
  
          </ul>

<?php }?> 
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
<?php
	 if ($_SESSION['_tomaster']  <>"0") {

        ?>
		 

            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>งานเรียกเก็บ<i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <?php
              include("condb.php");
			  $pdo->exec("set names utf8");
              $stmt = $pdo->query("select * from kpi_group where g_card='toclaim'");
              
              ?>
              <ul class="nav nav-treeview">
                <?php
              while ($row = $stmt->fetch()) {
                ?>
                <li class="nav-item">
                  <a href="./<?php echo $row['g_link'];?>" class="nav-link" title="<?php echo $row['g_comment'];?>">
                    <i class="nav-icon <?php echo $row['g_icon'];?> "></i>
					
                    <p><?php echo $row['g_name'];?></p>
                  </a>
                </li>
                <?php } ?>
          	</ul>
<?php } else { ?>


<?php }?>
<?php
	 if ($_SESSION['_tosetting']  <>"0") {
 			  include("condb.php");
			  $pdo->exec("set names utf8");
              $stmt_gmain = $pdo->query("select g_comment from kpi_group where g_card='tosetting' and g_main='1'");
              $gmain_row = $stmt_gmain->fetch();
        ?>
		 

            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p><?php echo $gmain_row['g_comment'];?><i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <?php
              $stmt = $pdo->query("select * from kpi_group where g_card='tosetting' and g_main<>'1'");
              ?>
              <ul class="nav nav-treeview">
                <?php
              while ($row = $stmt->fetch()) {
                ?>
                <li class="nav-item">
                  <a href="./<?php echo $row['g_link'];?>" class="nav-link" title="<?php echo $row['g_comment'];?>">
                    <i class="nav-icon <?php echo $row['g_icon'];?> "></i>
					
                    <p><?php echo $row['g_name'];?></p>
                  </a>
                </li>
                <?php } ?>
          	</ul>
<?php } else { ?>


<?php }?>
		  
		  
             <?php
 if ($_SESSION['username'] == "") {

        ?>
			<li class="nav-item has-treeview menu-open">
                <li class="nav-item">
                  <a href="./login.php?chk=Y" class="nav-link">
                    <i class="fas fa-key"></i>
                    <p>&nbsp;&nbsp;&nbsp;เครื่องมือ Admin</p>
                      <span class="right badge badge-danger">login</span>
                  </a>
                </li>
			</li>
    <?php } else{ ?>


      			<li class="nav-item has-treeview menu-open">
                  <a href="logout.php" class="nav-link">
                    <i class="fas fa-key"></i>
                    <p>       ออกจากระบบ
                      <span class="right badge badge-danger">logout</span>
                    </p>
                  </a>
                </li>


           <!--     <li class="nav-item">
            <a href="kpi_edit.php" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">บันทึกข้อมูลตัวชีวัด</p>
            </a>
          </li>-->
      <?php } ?>
              </ul>
            </li>
   </nav>