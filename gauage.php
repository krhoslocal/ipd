<?php
$kpi_tar = $_GET["kpi_tar"];
$db_rate = $_GET["db_rate"];

$kpi_type_data = $_GET["kpi_type_data"];
$kpi_scale = $_GET["kpi_scale"];

$kpi_radius = $_GET["kpi_radius"];

if ($kpi_radius == 1){
	$kpi_radius = 150;
}
else {
	$kpi_radius = 100;
}
/*
echo $kpi_tar."</br>";
echo $db_rate."</br>";
echo $kpi_type_data."</br>";
echo $kpi_scale."</br>";
*/


//$kpi_type_data = $_GET["kpi_type_data"] ;

//ปรับสีขอบวงใน ของแถบแสดงที่เข็มชี้ ตามมากดี หรือ น้อยดี
if($kpi_type_data=='1'){  // ค่าน้อยดี
	$tar_color1 = '#4bb648' ;  //green
	$tar_color2 = '#e02629' ;    //red
		if($db_rate < $kpi_tar){
			$kpi_color = '#008000';  //Green
		}else{
			$kpi_color = '#ff0000';	//red
		}
}else{  // ค่ามากดี
$tar_color2 = '#4bb648' ;  //green
$tar_color1 = '#e02629' ;    //red

	if($db_rate < $kpi_tar){
		$kpi_color = '#ff0000';	//red
	}else{
		$kpi_color = '#008000';	//Green
	}
}


?>

    <link rel='stylesheet' href='chart/jqwidgets/styles/jqx.base.css' type='text/css' />
    <script type='text/javascript' src='chart/scripts/jquery-1.10.2.min.js'></script>
    <script type='text/javascript' src='chart/jqwidgets/jqxcore.js'></script>
    <script type='text/javascript' src='chart/jqwidgets/jqxchart.js'></script>
    <script type='text/javascript' src='chart/jqwidgets/jqxgauge.js'></script>
	

	    <script type="text/javascript">
        $(document).ready(function () {
            $('#gaugeContainer2').jqxGauge({
                ranges: [{ startValue: 0, endValue: <?php echo $kpi_tar;?>, style: { fill: <?php echo "'".$tar_color1."'";?>, stroke: <?php echo "'".$tar_color1."'";?> }, endWidth: 15, startWidth: 15 },
                         { startValue: <?php echo $kpi_tar;?>, endValue: <?php echo $kpi_scale;?>, style: { fill: <?php echo "'".$tar_color2."'";?>, stroke: <?php echo "'".$tar_color2."'";?> }, endWidth: 15, startWidth: 15 }],
				border: { style: { fill: <?php echo "'".$kpi_color."'";?>, stroke: '#7b8384', 'stroke-width': 1 } },						 
                ticksMinor: { interval: 5, size: '5%' },
                ticksMajor: { interval: 10, size: '9%' },
                value: 0,
                colorScheme: 'scheme05',
				max: <?php echo $kpi_scale;?>,
				radius: <?php echo $kpi_radius;?>,
                caption: { offset: [0, -25], value: <?php echo "'".$db_rate."'";?>, position: 'bottom' },						
                animationDuration: 1200
            });

          $('#gaugeContainer2').jqxGauge('value', <?php echo $db_rate;?>);

        });
    </script>

	<div id="demoWidget" style="position: relative;">
	   <div style="float: left;" id="gaugeContainer2"></div>
        <div id="gaugeValue" style="position: absolute; top: 235px; left: 132px; font-family: Sans-Serif; text-align: center; font-size: 17px; width: 70px;"></div>
     <!--    <div style="margin-left: 60px; float: left;" id="linearGauge"></div> -->
    </div>