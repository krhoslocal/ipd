<?php echo "<?xml version=\"1.0\" encoding=\"utf-8\"?".">"; ?>	 <div>
		  <a href="index.php" class="brand-link">
			<img src="../dist/img/AdminLTELogo.png" alt="HCM_CLAIM" class="brand-image img-circle width="50" height="50" 
			style="opacity: 1.0">
			<span class="brand-text font-weight-light">HCM_CLAIM</span>
		  </a><br />
		  <UL class="navbar-nav ml-auto">

        <?php
        if ($_SESSION['username'] != "") {
          echo  "<li class=\"nav-item\">";
         
          echo "<p3 class=\"text-success\">";
          echo "สวัสดี คุณ  : " . $_SESSION['mem_name'];
          echo "</p>";
         
          echo "</li>";
          // echo "สวัดี คุณ".$_SESSION['mem_name'];
        }

        ?>
        
      </UL>
		  
      </div>