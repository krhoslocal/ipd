<?php
session_start();
include("includes/dbconn.php");    
include("data/data.php");
include("includes/fusioncharts.php");
?>

<script language="JavaScript" type="text/javascript">
function popup(url,name,windowWidth,windowHeight)
{    
	myleft=(screen.width)?(screen.width-windowWidth)/2:100;	
	mytop=(screen.height)?(screen.height-windowHeight)/2:100;	
	properties = "width="+windowWidth+",height="+windowHeight;
	properties +=",scrollbars=yes, top="+mytop+",left="+myleft;   
	window.open(url,name,properties);
}
</script>

<?php
$kpi_id = $_GET[id];

$txt = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>$txttitle</title>
    <script type='text/javascript' src='script.js'></script>
    <script language='javascript' src='fusioncharts/fusioncharts.js'></script>
    <link rel='stylesheet' href='style.css' type='text/css' media='screen' />
</head>
<body>
<div id='art-main'>
        <div class='art-Sheet'>
            <div class='art-Sheet-tl'></div>
            <div class='art-Sheet-tr'></div>
            <div class='art-Sheet-bl'></div>
            <div class='art-Sheet-br'></div>
            <div class='art-Sheet-tc'></div>
            <div class='art-Sheet-bc'></div>
            <div class='art-Sheet-cl'></div>
            <div class='art-Sheet-cr'></div>
            <div class='art-Sheet-cc'></div>
            <div class='art-Sheet-body'>
                <div class='art-Header'>
                    <div class='art-Header-png'></div>
                    <div class='art-Header-jpeg'></div>
                    <div class='art-Logo'>
					<br><br><br><br><br><br><br><br><br>
                        <div id='slogan-text' class='art-Logo-text'>$txtlogo2</div>
                    </div>
                </div>
                <div class='art-contentLayout'>
                    <div class='art-content'>
                        <div class='art-Post'>
                            <div class='art-Post-body'>
                        <div class='art-Post-inner'>
                                          <div class='art-PostContent'>
                                           <table class='table' width='100%'>
                                               <tr align='center'>
                                                    <td align='center'>
                                                    <div class='art-Block'>
                                                        <div class='art-Block-body'>
                                                            <div class='art-BlockHeader'>
                                                      <div class='l'></div>
                                                              <div class='r'></div>
                                                              <div class='t' align='left'>
                                                           <a href='index.php'>หน้าแรก</a>
														   </div>
                                                          </div>
                                                            <div class='art-BlockContent'>
                                                                <div class='art-PostContent'>";

$sqlp = "SELECT
g.stg_group_id,
g.stg_group_name,
s.stg_id,
s.stg_name,
k.kpi_id,
k.kpi_name,
k.kpi_type,
k.kpi_scale,
k.kpi_tar,
k.kpi_type_data,
k.kpi_update,
data_kpi_province.dp_pop,
data_kpi_province.dp_data,
data_kpi_province.dp_rate
FROM
stg_group AS g
Inner Join stg AS s ON g.stg_group_id = s.stg_grp_id
Inner Join kpi AS k ON s.stg_id = k.kpi_stg_id
Inner Join data_kpi_province ON k.kpi_id = data_kpi_province.dp_kpi
WHERE
data_kpi_province.dp_kpi =  '$kpi_id' ";
$resultstp=mysql_query($sqlp,$link);
$rowstp=mysql_fetch_array($resultstp);
$strXMLp =  recivedata($rowstp[kpi_tar],$rowstp[dp_rate],$rowstp[kpi_type_data],$rowstp[kpi_scale]) ;//เป้าหมาย,ผลงาน,ประเภท(0 มากดี,1 น้อยดี),ค่ามากสุด
$txt .= "$rowstp[stg_group_name] <i>$rowstp[stg_name]</i><br>";
$txt .= "$rowstp[kpi_name]<br>ระดับจังหวัด";
//$txt .= renderChart("fusioncharts/angulargauge.swf", "", $strXMLp, "myChartId$rowdata[kpi_id]", 900, 360, 0, 0);

$txt .= "<div style='font-size:10px'><img src='images/b_views.png' title='".$rowstp[kpi_detail]."' onclick=\"javascript:popup('pop-up.php?id=$rowstp[kpi_id]','',600,250)\" >&nbsp;&nbsp; Update : ".retDatets($rowstp[kpi_update])."</div>";

$txt .= '<iframe frameBorder="0" width="320" height="320" scrolling="no" src="gauage.php?kpi_tar='.$rowstp[kpi_tar].'&db_rate='.$rowstp[dp_rate].'&kpi_type_data='.$rowstp[kpi_type_data].'&kpi_scale='.$rowstp[kpi_scale].'&kpi_radius=1" ></iframe>'; 

$txt .="                                                      </div>
                                                            </div>
                                                        </div>
                                                    </div>                                                    
                                                    </td>
                                            </tr>
                                            </table>";                                          


$txt .= "<table><tr align='center'><td ><font size='4'>$rowstp[stg_name]</font><td></tr></table>"; 
$txt .= "<table class='table' width='100%' bgcolor='CCFFCC' ><tr align='center'>";
$sqldata = "SELECT
amphur.amphurname,
amphur.amphurcode,
kpi.kpi_id,
kpi.kpi_type,
kpi.kpi_scale,
kpi.kpi_tar,
kpi.kpi_type_data,
kpi.kpi_update,
data_kpi_amp.da_pop,
data_kpi_amp.da_data,
data_kpi_amp.da_rate
FROM
amphur
Left Join data_kpi_amp ON amphur.amphurcode = data_kpi_amp.da_amp
Inner Join kpi ON data_kpi_amp.da_kpi = kpi.kpi_id
WHERE
kpi.kpi_id =  '$kpi_id'
ORDER BY data_kpi_amp.da_amp";		
$resultdata=mysql_query($sqldata,$link);
if(mysql_num_rows($resultdata) > 0){
$z=1;
while($rowdata=mysql_fetch_array($resultdata)) {
	if($rowdata[kpi_type] == '2'){$linklevel="<a href ='kpioffice.php?id=$kpi_id&amphur=$rowdata[amphurcode]'>$rowdata[amphurname]</a>";}
	else{$linklevel="$rowdata[amphurname]";}
$txt .= "<td width='33%' valign='top'>
            <div class='art-Block'>
            <div class='art-Block-body'>
            <div class='art-BlockHeader'>
            <div class='l'></div>
            <div class='r'></div>
            <div class='t'><center>$linklevel</center></div>
            </div>
            <div class='art-BlockContent'>
            <div class='art-PostContent' >                                                               
            <div align='center'>";
$strXML =  recivedata($rowdata[kpi_tar],$rowdata[da_rate],$rowdata[kpi_type_data],$rowdata[kpi_scale]) ;//เป้าหมาย,ผลงาน,ประเภท(0 มากดี,1 น้อยดี),ค่ามากสุด

//$txt .= renderChart("fusioncharts/angulargauge.swf", "", $strXML, "myChartId$rowdata[amphurcode]", 300, 150, 0, 0);

$txt .= "<div style='font-size:10px'><img src='images/b_views.png' title='".$rowdata[kpi_detail]."' onclick=\"javascript:popup('pop-up.php?id=$rowdata[kpi_id]','',600,250)\" >&nbsp;&nbsp; Update : ".retDatets($rowdata[kpi_update])."</div>";

$txt .= '<iframe frameBorder="0" width="230" height="230" scrolling="no" src="gauage.php?kpi_tar='.$rowdata[kpi_tar].'&db_rate='.$rowdata[da_rate].'&kpi_type_data='.$rowdata[kpi_type_data].'&kpi_scale='.$rowdata[kpi_scale].'" ></iframe>'; 

$txt .= "</div>
          </div>
          </div>
          </div>
          </div>   
          </td>   ";                                              
        if(($z)%3==0){$txt .="</tr>";}
        else{}
         $z++; 
 }          
}else{$txt .="<td>ยังไม่บันทึกข้อมูลตัวชี้วัดระดับอำเภอ</td></tr>";}
$txt .= "</table>";
//ปิดยุทธศาสตร์
$txt .= " </div><div class='cleared'></div>
                        </div>
                        
                                <div class='cleared'></div>
                            </div>
                        </div>
                                             </div>
                </div>
                <div class='cleared'></div>
				
				<div class='art-Footer'>
                    <div class='art-Footer-inner'>
                        <div class='art-Footer-text'>
						$foottext
                        </div>
                    </div>
                    <div class='art-Footer-background'></div>
                </div>
				
                <div class='cleared'></div>
            </div>
        </div>
        <div class='cleared'></div>
      
    </div>

</body>
</html>";
echo $txt;

?>