<?php
// send line slert
function convertdate($s){
	$sql = "select concat(left($s,4)+543,substring($s,5,2),right($s,2))";
	$result_q = mysql_query($sql);
	$result = mysql_fetch_array($result_q);
	return $result;
}

function sendsms(){
				echo "<script>
							setTimeout('parent.location='sms_alert/acc_alert.php';',100000);
					</script>";
						  
}	

?>