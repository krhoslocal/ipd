<?php
function  recivedata($target,$data,$type,$maxscale) {
$valuetarget = $target;
$valuedata = $data;
$valuemedian =  $target - 1;
if($type == 0){
 $codev =  'FF654F';
 $codem =   '8BBA00'; 
if ($valuedata >=  $valuetarget) {
$alertcolor = '009999';
}else {
$alertcolor = 'FF3300';
}      
}else{
  $codev =  '8BBA00';
 $codem =   'FF654F';  
if ($valuedata <= $valuetarget) {
$alertcolor = '009999'; 
}else {
$alertcolor = 'FF3300'; 
}  
} 
if($valuedata == 0){$codem =   'FF654F';$alertcolor = 'FF3300';}
$strXML .= "<chart bgAlpha='0' bgColor='FFFFFF' lowerLimit='0' upperLimit='".$maxscale."' numberSuffix='' showBorder='0' basefontColor='FFFFDD' chartTopMargin='25' chartBottomMargin='25' chartLeftMargin='25' chartRightMargin='25' toolTipBgColor='80A905' gaugeFillMix='{dark-10},FFFFFF,{dark-10}' gaugeFillRatio='3'>";
$strXML .= "<colorRange>";
$strXML .= "<color minValue='0' maxValue='".$valuemedian."' code='".$codev."'/>";
$strXML .= "<color minValue='".$valuetarget."' maxValue='".$maxscale."0' code='".$codem."'/>";
$strXML .= "</colorRange>";
$strXML .= "<dials>";
$strXML .= "<dial value='".$valuedata."' rearExtension='10'/>";
$strXML .= "</dials>";
$strXML .= "<trendpoints>";
$strXML .= "<point value='".$valuetarget."' displayValue='".$valuetarget."' fontcolor='FF4400' useMarker='1' dashed='1' dashLen='2' dashGap='2' valueInside='1' />";
$strXML .= "</trendpoints>";
$strXML .= "<!--Rectangles behind the gauge -->";
$strXML .= "<annotations>";
$strXML .= "<annotationGroup id='Grp1' showBelow='1' >";
$strXML .= "<annotation type='rectangle' x='5' y='5' toX='895' toY='365' radius='10' color='".$alertcolor.",333333' showBorder='0' />";
$strXML .= "</annotationGroup>";
$strXML .= "</annotations>";
$strXML .= "<styles>";
$strXML .= "<definition>";
$strXML .= "<style name='RectShadow' type='shadow' strength='3'/>";
$strXML .= "</definition>";
$strXML .= "<application>";
$strXML .= "<apply toObject='Grp1' styles='RectShadow' />";
$strXML .= "</application>";
$strXML .= "</styles>";
$strXML .= "</chart>";
return $strXML;
}

?>