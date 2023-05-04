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
if(!$_GET[amphur]){
	$sql = "select amphurcode,amphurname from amphur order by amphurcode asc limit 1";
	$result=mysql_query($sql,$link);
	$row=mysql_fetch_array($result);
	$amphur =$row[amphurcode];}
else{
	$amphur = $_GET[amphur];
}
$selectgroupstg = $_GET[sl_grpstg];
if(!$selectgroupstg){$selectgroupstg = 1;}
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
                                                               ";
$txt .= "  <form id='form1' name='form1' method='get' action=''>
				ระดับอำเภอ กลุ่มตัวชี้วัด <select name='sl_grpstg' id='sl_grpstg' onchange='this.form.submit();' >";											  
$sql = "SELECT
stg.stg_group_id,
stg.stg_group_name,
stg.stg_group_detail,
stg.sth_group_own,
stg.stg_group_status
FROM
stg_group AS stg
WHERE
stg.stg_group_status =  '1'
ORDER BY
stg.stg_group_id ASC";
$result=mysql_query($sql,$link);
while($row=mysql_fetch_array($result)) {
  if($selectgroupstg == $row[stg_group_id]){$sl = "selected='selected'";}else{$sl = "";}
 $txt .= " <option value='$row[stg_group_id]' $sl>$row[stg_group_name]</option>";
}
$txt .=  "  </select> อำเภอ <select name='amphur' id='amphur' onchange='this.form.submit();'>";
$sql = "select amphurcode,amphurname from amphur order by amphurcode asc";
$result=mysql_query($sql,$link);
while($row=mysql_fetch_array($result)) {
  if($amphur == $row[amphurcode]){$sla= "selected='selected'";}else{$sla = "";}
 $txt .= " <option value='$row[amphurcode]' $sla>$row[amphurname]</option>";
}
$txt .= "</select> 
</from>||<a href='index2.php'>view table</a>
                                                              </div>
                                                          </div>
                                                            <div class='art-BlockContent'>
                                                                <div class='art-PostContent'>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>                                                    
                                                    </td>
                                            </tr>
                                            </table>";                                          

$sqlstg="SELECT
stg.stg_id,
stg.stg_grp_id,
stg.stg_name,
stg.stg_detail,
stg.stg_own,
stg.stg_status
FROM
stg
WHERE
stg.stg_status =  '1' AND
stg.stg_grp_id =  $selectgroupstg
ORDER BY
stg.stg_id ASC";

$resultstg=mysql_query($sqlstg,$link);
while($rowstg=mysql_fetch_array($resultstg)) {
	
$txt .= "<table><tr align='center'><td ><font size='4'>$rowstg[stg_name]</font><td></tr></table>"; 
$txt .= "<table class='table' width='100%' bgcolor='CCFFCC' ><tr align='center'>";
$sqldata = "SELECT
k.kpi_id,
k.kpi_name,
k.kpi_detail,
k.kpi_type,
k.kpi_scale,
k.kpi_tar,
k.kpi_type_data,
d.da_pop,
d.da_data,
d.da_rate,
k.kpi_file,
k.kpi_update
FROM
stg AS s
Inner Join kpi AS k ON s.stg_id = k.kpi_stg_id
Inner Join data_kpi_amp AS d ON k.kpi_id = d.da_kpi
WHERE
s.stg_status =  '1' AND
k.kpi_status =  '1' AND
s.stg_grp_id =  '$rowstg[stg_grp_id]' AND
s.stg_id =  '$rowstg[stg_id]' AND
d.da_amp='$amphur'
ORDER BY
k.kpi_order ASC";		
$resultdata=mysql_query($sqldata,$link);
if(mysql_num_rows($resultdata) > 0){
$z=1;
while($rowdata=mysql_fetch_array($resultdata)) {
	//var_dump($rowdata);
	$rowhead[kpi_name]=$rowdata[kpi_name];
	$rowdata[kpi_name]=mb_substr($rowdata[kpi_name],0,30,'utf-8');	//ตัดคำแสดงแสดงหัว

	if($rowdata[kpi_type] != '0'){$linklevel="<a href ='kpioffice.php?id=$rowdata[kpi_id]&amphur=$amphur' title='singleclickstop=[on] header=[หัวข้อ] body=[$rowhead[kpi_name]]'>$rowdata[kpi_name]</a>";}
	else{$linklevel="$rowdata[kpi_name]";}
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

//$txt .= renderChart("fusioncharts/angulargauge.swf", "", $strXML, "myChartId$rowdata[kpi_id]", 300, 150, 0, 0);

$txt .= "<div style='font-size:10px'><img src='images/b_views.png' title='".$rowdata[kpi_detail]."' onclick=\"javascript:popup('pop-up.php?id=$rowdata[kpi_id]','',600,250)\" >&nbsp;&nbsp; Update : ".retDatets($rowdata[kpi_update])."</div>";

$txt .= '<iframe frameBorder="0" width="230" height="230" scrolling="no" src="gauage.php?kpi_tar='.$rowdata[kpi_tar].'&db_rate='.$rowdata[da_rate].'&kpi_type_data='.$rowdata[kpi_type_data].'&kpi_scale='.$rowdata[kpi_scale].'" ></iframe>'; 

//$txt .= "<div><img src='images/b_views.png' title='".$rowdata[kpi_detail]."'>&nbsp;&nbsp; Update : ".retDatets($rowdata[kpi_update])."</div>";
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
}else{$txt .="<td>ยังไม่บันทึกข้อมูลตัวชี้วัด</td></tr>";}
$txt .= "</table>";
}
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
<script src='js/boxOver.js'></script>
</body>
</html>";
echo $txt;

?>