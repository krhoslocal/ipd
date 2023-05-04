// JavaScript Document
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};
function Set_Cookie(name, value, expires, path, domain, secure){
     var today=new Date();
     today.setTime(today.getTime());
     if(expires){
          expires = expires*1000*60*60*24;
     };
     var expires_date = new Date(today.getTime() + (expires));
     document.cookie = name + "=" +escape(value) +
          ((expires) ? ";expires=" + expires_date.toGMTString() : "") + 
          ((path) ? ";path=" + path : "") + 
          ((domain) ? ";domain=" + domain : "") +
          ((secure) ? ";secure" : "");
};

function Get_Cookie( name ) {
     var start=document.cookie.indexOf(name+"=");
     var len=start+name.length+1;
     if((!start) && (name!=document.cookie.substring(0, name.length))) {
          return null;
     };
     if (start==-1 ) return null;
     var end=document.cookie.indexOf(";", len);
     if (end==-1) end = document.cookie.length;
     return unescape(document.cookie.substring( len, end ));
};

function deleteCookie(name, path, domain){ 
    if(getCookie(name)){ 
        setCookie(name, '', -30, path, domain); 
    } 
} 

function getposOffset(overlay, offsettype){
  var totaloffset = (offsettype == "left")? overlay.offsetLeft : overlay.offsetTop
  var parentEl = overlay.offsetParent
  while (parentEl != null) {
    totaloffset = (offsettype == "left")? totaloffset + parentEl.offsetLeft : totaloffset + parentEl.offsetTop
    parentEl = parentEl.offsetParent
  }
  return totaloffset
}

var menutimedelay = 0
var menudisplay = ""

function menuoverlay(curobj, subobjstr) {
  if (document.getElementById) {
    if (menudisplay != "" & menudisplay != subobjstr) document.getElementById(menudisplay).style.visibility = "hidden"
    menudisplay = subobjstr
    var subobj = document.getElementById(subobjstr)
    subobj.style.visibility = "visible"
    var xpos = getposOffset(curobj, "left")
    var ypos = getposOffset(curobj, "top")

     /* คำนวณตำแหน่งของเมนูตรงกับด้านล่าง-ซ้าย */
    subobj.style.left = xpos + "px"
    subobj.style.top = ypos + curobj.offsetHeight + 2 + "px"
    
    return false
  }
}

/* หน่วงเวลาเพื่อซ่อนเมนู */
function menudelayHide(lyr) {
  menutimedelay = setTimeout('document.getElementById("'+lyr+'").style.visibility="hidden"', 250)
}

/* หยุดการซ่อนเมนู */
function menuMouseover(lyr) {
  if (menutimedelay > -5) clearTimeout(menutimedelay)
}

/* ซ่อนเมนูทันที */
function menuHide(lyr) {
  document.getElementById(lyr).style.visibility = "hidden"
}

function formsubmit()
{
		var ajaxRequest = Inint_AJAX();
		ajaxRequest.onreadystatechange = function()
		{
			if(ajaxRequest.readyState == 4)
			{
				viewtable();
				var area = document.getElementById('displayresult');
				area.innerHTML =ajaxRequest.responseText;
				document.registration.username.value="";
				document.registration.password.value="";
				document.registration.confirms.value="";
			}
			else
			{
				var area = document.getElementById('displayresult');
				area.innerHTML = "<img src = images/wait.gif>Please wait...";
			}
		}

	// ran = Math.random();
	var  username = document.registration.username.value;
	var password = document.registration.password.value;
	var confirms = document.registration.confirms.value;
	var str = "";
	str+="?username="+username;
	str+="&password="+password;
	str+="&confirms="+confirms;
	var xx = new Date().getTime() + Math.random();
	str+="&var="+xx;
     ajaxRequest.open("GET", "insertdata.php"+str , true);
     ajaxRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); // set Header
     ajaxRequest.send(null); //ส่งค่า
}
function viewtable()
{
	var ajaxRequest = Inint_AJAX();
		ajaxRequest.onreadystatechange = function()
		{
			if(ajaxRequest.readyState == 4)
			{
				var area = document.getElementById('displayresult');
				area.innerHTML = ajaxRequest.responseText;
			}
			else
			{
				var area = document.getElementById('displayresult');
				area.innerHTML = "<img src = images/wait.gif>Please wait...";
			}
		}

		var rstr;
		rstr = Math.random();
		
		var str ;
		str += "var="+rstr
		ajaxRequest.open("GET","query.php?"+str,true);
		ajaxRequest.send(null);
} 

function loadpage(module,value1,value2,farmerid,farmer_id,landID,landIDlist) {
var req=Inint_AJAX();
Set_Cookie( 'module' , module );
//alert(module);
     //แสดง icon คอยการ load ก่อนเลยถ้ามีการเรียกใช้ AJAX
     document.getElementById("content_area").innerHTML='<div id="wait" align="center"><img src="images/wait.gif" alt="" /><br /><br />กำลังโหลด...</div>';
     req.onreadystatechange = function () {
          if (req.readyState==4) {
               if (req.status==200) 
               {
					if(module=='RegisLand.php')
					 {
					 	dochange('province',-1);
						dochange('amphur',-1);
					 }
					 if(module=='regisLoan.php')
					 {
					 	dochangeOcc('type',-1);
					 	dochangeOcc('type2',-1);
					 	dochangeOcc('type3',-1);
					 	dochangeOcc('wtype',-1);
					 	dochangeOcc('wtype2',-1);
					 	dochangeOcc('wtype3',-1);
					 }
					 if(module=='searchLStatus.php')
					 {
					 	dochange('province',49); 
						//dochange('amphur',-1);
						dochangecode('slcode',-1);
					 }
					 if(module=='newplangFM.php')
					 {
						Set_Cookie('farmerid',farmerid);
						dochange('amphur','-1');
					 	
					 }
					 if(module=='editFM.php')
					 {
						 dochange('province','-1');	
					 }
					 if(module=='newFM.php')
					 {
						dochange('province',-1);
						dochange('amphur',-1);
					 }
                    var data=req.responseText; //รับค่ากลับมา
                    document.getElementById("content_area").innerHTML=data; //แสดงผล แทนรูปรอโหลด			 
               }
          }
     };
	 if(module=='newplangFM.php')
	 {
	 	Set_Cookie('farmerid',farmerid);
	 }
	 if(module=='showDetail.php')
	 {
	 	Set_Cookie('value1',value1);
	 }
	 if(module=='ULStatus.php')
	 {
	 	Set_Cookie('landIDlist',landIDlist);
	 }
	  if(module=='regisLoan.php')
	 {
	 	Set_Cookie('value1',value1);
		Set_Cookie('value2',value2);
		Set_Cookie('farmerid',farmerid);
		Set_Cookie('farmer_id',farmer_id);
		Set_Cookie('landID',landID);
	 }	 
	 if(module=='EditregisLoan.php')
	 {
	 	Set_Cookie('value1',value1);
		Set_Cookie('value2',value2);
		Set_Cookie('farmerid',farmerid);
		Set_Cookie('farmer_id',farmer_id);
		Set_Cookie('landID',landID);
	 }
	 if(module=='editLand.php')
	 {
		Set_Cookie('value1',value1);
		Set_Cookie('value2',value2);
		Set_Cookie('landID',landID);
		Set_Cookie('farmerid',farmerid);
		//alert(farmerid);
	 }
	 if(module=='editFM.php')
	 {
		 Set_Cookie('farmer_id',farmer_id);
	 }
	 if(module=='viewLand.php')
	 {
		Set_Cookie('value1',value1);
		Set_Cookie('value2',value2);
		Set_Cookie('farmerid',farmerid);
		Set_Cookie('landID',landID);
	 }
	 if(module=='viewLDetail.php')
	 {
		Set_Cookie('value1',value1);
		Set_Cookie('value2',value2);
	 }
	 if(module == 'logout.php')
	 {
	 	//deleteCookie(active);
	 	//Set_Cookie('active','',-60*60*30);
		//Set_Cookie('username','',-60*60*30);
		//Set_Cookie('password','',-60*60*30);
		//Set_Cookie('type','',-60*60*30);
		//Set_Cookie('module','',-60*60*30);
	 }
     req.open("GET", module+"?value1="+value1+"&value2="+value2+"&farmerid="+farmerid+"&farmer_id="+farmer_id+"&landID="+landID+"&landIDlist="+landIDlist+"&url=" + new Date().getTime() + Math.random(), true);
     req.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); // set Header
     //req.setRequestHeader("charset","tis-620"); // set Header
     req.send(null); //ส่งค่า
}

function chkValid(f){
		if (f.ser_no.value==''){
			  alert("กรุณากรอกลำดับผู้มารับบริการ");
			  f.ser_no.focus();
	} else if (f.cardW0.value==''){
			  alert("กรุณากรอกเลขบัตรประชาชน");
			  f.cardW0.focus();
		} else if (f.cardW1.value==''){
			  alert("กรุณากรอกเลขบัตรประชาชน");
			  f.cardW1.focus();
	} else if (f.cardW2.value==''){
			  alert("กรุณากรอกเลขบัตรประชาชน");
			  f.cardW2.focus();
		} else if (f.cardW3.value==''){
			  alert("กรุณากรอกเลขบัตรประชาชน");
			  f.cardW3.focus();
		} else if (f.cardW4.value==''){
			  alert("กรุณากรอกเลขบัตรประชาชน");
			  f.cardW4.focus();
	  		} else 		if (f.ser_no.value==''){
			  alert("กรุณากรอกลำดับผู้มารับบริการ");
			  f.ser_no.focus();
	} else if (f.title.value=='0'){
			  alert("กรุณาระบุคำนำหน้าของเกษตร");
			 f.title.focus();
		} else if (f.fname.value==''){
			  alert("กรุณากรอกชื่อของเกษตร");
			 f.fname.focus();
		} else if (f.lname.value==''){
			  alert("กรุณากรอกนามสกุลของเกษตร");
			 f.lname.focus();
		} else if (f.age.value==''){
			  alert("กรุณาอายุของเกษตร");
			 f.age.focus();
		} else if (f.address.value==''){
			  alert("กรุณาที่อยู่ของเกษตร");
			 f.address.focus();
		} else if (f.province.value==''){
			  alert("กรุณาเลือกจังหวัด");
			 f.province.focus();
		} else if (f.amphur.value==''||f.amphur.value==0){
			  alert("กรุณาระบุ อำเภอ");
			f.amphur.focus();
		}	else if (f.tumbon.value==''){
			  alert("กรุณาระบุ ตำบล ");
			 tam_open();
	/*	}  else  if (f.chk_id[].value==''){
			  alert("กรุณาระบุ คลินิก ที่จะเข้าบริการ");
			  f.chk_id[].focus();*/
		}   else {
			return true;
		}
		return false;
	}
	
function dochange(src,val,prov,amp,tam)
	{
		//alert(val1);
		var req = Inint_AJAX();
		req.onreadystatechange = function()
		{
		if(req.readyState==4)
			{
			if(req.status==200)
				{
				//alert(val+prov+amp+tam);
				document.getElementById(src).innerHTML = req.responseText //รับค่ากลับมา
				}
			}
		};
		req.open("GET","province.php?data="+src+"&val="+val+"&prov="+prov+"&amp="+amp+"&tam="+tam);
		req.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=tis-620");
		req.send(null);
	}

function dochangecode(selectcode,code)
{
	var req = Inint_AJAX();
		req.onreadystatechange = function()
		{
		if(req.readyState==4)
			{
			if(req.status==200)
				{
				//alert(code);
				document.getElementById(selectcode).innerHTML = req.responseText //รับค่ากลับมา
				}
			}
		};
		req.open("GET","search_showsubcode.php?data="+selectcode+"&val="+code+"&url=" + new Date().getTime() + Math.random(), true);
		req.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=tis-620");
		req.send(null);
}

function dochangeOcc(src,type,detail)
{
	var req = Inint_AJAX();
		req.onreadystatechange = function()
		{
		if(req.readyState==4)
			{
			if(req.status==200)
				{
				//alert(code);
				document.getElementById(src).innerHTML = req.responseText //รับค่ากลับมา
				}
			}
		};
		//alert(src+" "+type+" "+detail)
		req.open("GET","showOcc.php?data="+src+"&val="+type+"&detail="+detail+"&url=" + new Date().getTime() + Math.random(), true);
		req.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=tis-620");
		req.send(null);
}

function NumberOnly()
{
		//alert(event.keyCode);
		if(event.keyCode < 48 || event.keyCode > 57)
			return false;						
}
function checkland(plang,rawang)
{
		//alert(plang);alert(rawang);alert(form);
		var req = Inint_AJAX();
		req.onreadystatechange = function()
		{
			if(req.readyState == 4)
			{
				var area = document.getElementById('displayresult');
				area.innerHTML = req.responseText;
				document.form1.plang.value="";
				document.form1.rawang.value="";
			}
			else
			{
				var area = document.getElementById('displayresult');
				area.innerHTML = "<center><img src = images/wait.gif><br> กำลังค้นหา...</center>";
			}
		}
		req.open("GET","checkland.php?plang="+plang+"&rawang="+rawang+"&ran"+ new Date().getTime() + Math.random());
		req.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=tis-620");
		req.send(null);
}

function check_cardid(cardid,requestland)
{
	//alert(requestland);
	var req = Inint_AJAX();
	req.onreadystatechange = function()
	{
		if(req.readyState == 4)
		{
			var area = document.getElementById('displayresult');
			area.innerHTML = req.responseText;
		}
		else
		{
			var area = document.getElementById('displayresult');
			area.innerHTML = "<center><img src = images/wait.gif><br> กำลังค้นหา...</center>";
		}
	}
	if(requestland=='searchview')
	{
		req.open("GET","checkidview.php?cardid="+cardid+"&page="+requestland+"&ran="+ new Date().getTime() + Math.random());
	req.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=tis-620");
	req.send(null);
	}
	else
	{
	req.open("GET","checkid.php?cardid="+cardid+"&page="+requestland+"&ran="+ new Date().getTime() + Math.random());
	req.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=tis-620");
	req.send(null);
	}
}
function checklstatus(province,samp,sdist,svill,ckcode,cksub,selectcode,slcode,slsub)
{
	var req = Inint_AJAX();
	req.onreadystatechange = function()
	{
		if(req.readyState == 4)
		{
			var area = document.getElementById('displayresult');
			area.innerHTML = req.responseText;
		}
		else
		{
			var area = document.getElementById('displayresult');
			area.innerHTML = "<div id=\"wait\" align=\"center\"><img src = images/wait.gif><br><br> กำลังค้นหา...</div>";
		}
	}
	req.open("GET","searchLStatusRS.php?province="+province+"&samp="+samp+"&sdist="+sdist+"&svill="+svill+"&ckcode="+ckcode+"&cksub="+cksub+"&selectcode="+selectcode+"&slcode="+slcode+"&slsub="+slsub+"&ran="+ new Date().getTime() + Math.random());
	req.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=tis-620");
	req.send(null);
}

function UpdateLStatus(code,subcode1,subcode2,subcode3,subcode4,subcode5,landID)
{
	//alert(code+subcode1+subcode2+subcode3+subcode4+subcode5+" "+landID)
	var req = Inint_AJAX();
	req.onreadystatechange = function()
	{
		if(req.readyState == 4)
		{
			var area = document.getElementById('displayresult');
			area.innerHTML = req.responseText;
		}
		else
		{
			var area = document.getElementById('displayresult');
			area.innerHTML = "<div id=\"wait\" align=\"center\"><img src = images/wait.gif><br><br> กำลังค้นหา...</div>";
		}
	}
	req.open("GET","ULStatusRS.php?code="+code+"&sc1="+subcode1+"&sc2="+subcode2+"&sc3="+subcode3+"&sc4="+subcode4+"&sc5="+subcode5+"&landID="+landID+"&ran="+ new Date().getTime() + Math.random());
	req.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=tis-620");
	req.send(null);
}

function checkData(v1,v2)
{
	document.getElementById("error").style.display='none';
	if (form1.plang.value=='') 
		{
			document.getElementById("error").style.display='';
			document.getElementById("error").innerHTML="<center><font color=\"#FF0000\" face=\"MS Sans Serif\">กรุณาใส่แปลงที่ดิน</center></font>";
			form1.plang.focus();
			return false;
		}
	else if(form1.rawang.value=='')
		{
			document.getElementById("error").style.display='';
			document.getElementById("error").innerHTML="<center><font color=\"#FF0000\" face=\"MS Sans Serif\">กรุณาใส่แปลงที่ดิน</center>กรุณาใส่ระวางที่ดิน</center></font>";
			form1.rawang.focus();
			return false;
		}
		checkland(v1,v2);
}
function showSearch(ck,id)
{			
	var obj=document.getElementById('tr'+id);
	var obj3=document.getElementById('trcardid');
	var obj2=document.getElementById('trfname');
	var obj1=document.getElementById('trplangrawang');
	obj1.style.display='none';
	obj2.style.display='none';
	obj3.style.display='none';
		if (ck=="nonesl") { 
			obj1.style.display='none';
			obj2.style.display='none';
			obj3.style.display='none';
		} 
		else if(ck)
		{
		obj.style.display='';
		}
		else
		{ 
		obj.style.display='none';
		}
}

function checkButton(formname,optvalue)
{
	if(formname=='asset')
	{
		var obj = document.asset;
		switch (optvalue)
		{
			case 'cardid' :
				obj.cardid1.focus();
				//var cardid = obj.cardid1.value+obj.cardid2.value+obj.cardid3.value+obj.cardid4.value+obj.cardid5.value ;
				if(obj.cardid1.value==''){ alert('กรุณากรอกข้อมูลด้วยครับ'); obj.cardid1.focus() }
				else if(obj.cardid2.value==''){ alert('กรุณากรอกข้อมูลด้วยครับ'); obj.cardid2.focus() }
				else if(obj.cardid3.value==''){ alert('กรุณากรอกข้อมูลด้วยครับ'); obj.cardid3.focus() }
				else if(obj.cardid4.value==''){ alert('กรุณากรอกข้อมูลด้วยครับ'); obj.cardid4.focus() }
				else if(obj.cardid5.value==''){ alert('กรุณากรอกข้อมูลด้วยครับ'); obj.cardid5.focus() }
				else { RecievValue('asscardid'); }
				break;
			case 'fname' :
				if(obj.fname.value+obj.lname.value=='') { alert('กรุณากรอกชื่อด้วย');obj.fname.focus() } 
				else { RecievValue('assfname') }
				break;
			case 'plangrawang' :
				if(obj.plang.value+obj.rawang.value=='') { alert('กรุณากรอกแปลง-ระวางที่ดินด้วย'); obj.plang.focus() }
				else { RecievValue('asspr') }
				break;
		}		
	}
	if(formname=='search')
	{
		var obj = document.search;
		switch (optvalue)
		{
			case 'cardid' :
				obj.cardid1.focus();
				var cardid = obj.cardid1.value+obj.cardid2.value+obj.cardid3.value+obj.cardid4.value+obj.cardid5.value ;
				if(cardid==''){ alert('กรุณากรอกข้อมูลด้วยครับ'); obj.cardid1.focus() } 
				else { check_cardid(cardid,'search'); }
				break;
			case 'fname' :
				if(obj.fname.value+obj.lname.value=='') { alert('กรุณากรอกชื่อด้วย');obj.fname.focus() } 
				else { RecievValue('name') }
				break;
			case 'plangrawang' :
				if(obj.plang.value+obj.rawang.value=='') { alert('กรุณากรอกแปลง-ระวางที่ดินด้วย'); obj.plang.focus() }
				else { RecievValue('plangrawang') }
				break;
		}		
	}
	if(formname=='searchview')
	{
		var obj = document.searchview;
		switch (optvalue)
		{
			case 'cardid' :
				obj.cardid1.focus();
				var cardid = obj.cardid1.value+obj.cardid2.value+obj.cardid3.value+obj.cardid4.value+obj.cardid5.value ;
				if(cardid==''){ alert('กรุณากรอกข้อมูลด้วยครับ'); obj.cardid1.focus() } 
				else { check_cardid(cardid,'searchview'); }
				break;
			case 'fname' :
				if(obj.fname.value+obj.lname.value=='') { alert('กรุณากรอกชื่อด้วย');obj.fname.focus() } 
				else { RecievValue('nameview') }
				break;
			case 'plangrawang' :
				if(obj.plang.value+obj.rawang.value=='') { alert('กรุณากรอกแปลง-ระวางที่ดินด้วย'); obj.plang.focus() }
				else { RecievValue('plangrawangview') }
				break;
		}		
	}
}

function RecievValue(formfor)
{
   	var theForm = document.forms[0]
	var alertText = ""
	   for(i=0; i<theForm.elements.length; i++){	   
	   
	   alertText += "&" + theForm.elements[i].name
	
	      if(theForm.elements[i].type == "hidden" ||theForm.elements[i].type == "text" || theForm.elements[i].type == "textarea" || theForm.elements[i].type == "button"){
	      alertText += "=" + theForm.elements[i].value
	      }
	      else if(theForm.elements[i].type == "checkbox"){
	      alertText += "=" + theForm.elements[i].checked 	       
	      }
	      else if(theForm.elements[i].type=="radio" && theForm.elements[i].checked){
	      alertText += "=" + theForm.elements[i].value
	      }
	      else if(theForm.elements[i].type == "select-one"){
	      alertText += "=" + theForm.elements[i].options[theForm.elements[i].selectedIndex].value
	      }
	      //alert(alertText)
	   }
	  // alert(formfor+alertText)
	   SendValue(formfor,alertText);
	   //Set_Cookie('value1',alertText)
} 
function SendValue(formfor1,value)
{
	var ajaxRequest = Inint_AJAX();
		ajaxRequest.onreadystatechange = function()
		{
			if(ajaxRequest.readyState == 4)
			{
				//viewLandData();
				var area = document.getElementById('displayresult');
				area.innerHTML =ajaxRequest.responseText;
			}
			else
			{
				var area = document.getElementById('displayresult');
				area.innerHTML = "<div align = center><img src = images/wait.gif><br><br>Please wait...</div>";
			}
		}
	if(formfor1=='registration')
	{
		ajaxRequest.open("GET", "RegisLandResult.php?xx=00"+value+new Date().getTime() + Math.random() , true);
     	ajaxRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); // set Header
     	ajaxRequest.send(null); //ส่งค่า
	}
	if(formfor1=='sendcheckland')
	{
		ajaxRequest.open("GET", "checklandRs.php?xx=00"+value+new Date().getTime() + Math.random() , true);
     	ajaxRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); // set Header
     	ajaxRequest.send(null); //ส่งค่า
	}
	if(formfor1=='sendbank')
	{
		ajaxRequest.open("GET", "sendbankRs.php?xx=00"+value+new Date().getTime() + Math.random() , true);
     	ajaxRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); // set Header
     	ajaxRequest.send(null); //ส่งค่า
	}
	if(formfor1=='regisLoan')
	{
		ajaxRequest.open("GET", "RegisLoanResult.php?xx=00"+value+new Date().getTime() + Math.random() , true);
     	ajaxRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); // set Header
     	ajaxRequest.send(null); //ส่งค่า
	}
	if(formfor1=='EditregisLoan')
	{
		ajaxRequest.open("GET", "EditRLResult.php?xx=00"+value+new Date().getTime() + Math.random() , true);
     	ajaxRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); // set Header
     	ajaxRequest.send(null); //ส่งค่า
	}
	if(formfor1=='cardid')
	{
		ajaxRequest.open("GET", "checkid.php?xx=00"+value+new Date().getTime() + Math.random() , true);
     	ajaxRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); // set Header
     	ajaxRequest.send(null); //ส่งค่า
	}
	if(formfor1=='name')
	{
		ajaxRequest.open("GET", "checkname.php?xx=00"+value+new Date().getTime() + Math.random() , true);
     	ajaxRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); // set Header
     	ajaxRequest.send(null); //ส่งค่า
	}
	if(formfor1=='nameview')
	{
		ajaxRequest.open("GET", "checknameview.php?xx=00"+value+new Date().getTime() + Math.random() , true);
     	ajaxRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); // set Header
     	ajaxRequest.send(null); //ส่งค่า
	}
	if(formfor1=='plangrawang')
	{
		ajaxRequest.open("GET", "checkland.php?xx=00"+value+new Date().getTime() + Math.random() , true);
     	ajaxRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); // set Header
     	ajaxRequest.send(null); //ส่งค่า
	}
	if(formfor1=='plangrawangview')
	{
		ajaxRequest.open("GET", "checklandview.php?xx=00"+value+new Date().getTime() + Math.random() , true);
     	ajaxRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); // set Header
     	ajaxRequest.send(null); //ส่งค่า
	}
	if(formfor1=='asscardid')
	{
		ajaxRequest.open("GET", "asscardid.php?xx=00"+value+new Date().getTime() + Math.random() , true);
     	ajaxRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); // set Header
     	ajaxRequest.send(null); //ส่งค่า
	}
	if(formfor1=='assfname')
	{
		ajaxRequest.open("GET", "assname.php?xx=00"+value+new Date().getTime() + Math.random() , true);
     	ajaxRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); // set Header
     	ajaxRequest.send(null); //ส่งค่า
	}
	if(formfor1=='asspr')
	{
		ajaxRequest.open("GET", "asspr.php?xx=00"+value+new Date().getTime() + Math.random() , true);
     	ajaxRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); // set Header
     	ajaxRequest.send(null); //ส่งค่า
	}
	if(formfor1=='editLand')
	{
		ajaxRequest.open("GET", "EditLandResult.php?xx=00"+value+new Date().getTime() + Math.random() , true);
     	ajaxRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); // set Header
     	ajaxRequest.send(null); //ส่งค่า
	}
	if(formfor1=='newFM')
	{
		ajaxRequest.open("GET", "newFMResult.php?xx=00"+value+new Date().getTime() + Math.random() , true);
     	ajaxRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); // set Header
     	ajaxRequest.send(null); //ส่งค่า
	}
	if(formfor1=='editFM')
	{
		ajaxRequest.open("GET", "editFMResult.php?xx=00"+value+new Date().getTime() + Math.random() , true);
     	ajaxRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); // set Header
     	ajaxRequest.send(null); //ส่งค่า
	}
	if(formfor1=='newplangFM')
	{
		ajaxRequest.open("GET", "newplangFMResult.php?xx=00"+value+new Date().getTime() + Math.random() , true);
     	ajaxRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); // set Header
     	ajaxRequest.send(null); //ส่งค่า
	}
}

function MM_openBrWindow(theURL,winName,features,inputname) { //v2.0
	var inptype = inputname; 
	alert(theURL+'?id='+inptype);
	window.open(theURL+'?id='+inptype,winName,features).focus();
}
var win = null;

function popupwindow(filename, windowname, w, h) {
  var winl = (screen.width-w)/2;
  var wint = (screen.height-h)/2;
  if (winl < 0) winl = 0;
  if (wint < 0) wint = 0;
  var settings = 'height=' + h + ',';
  settings += 'width=' + w + ',';
  settings += 'top=' + wint + ',';
  settings += 'left=' + winl + ',';
  settings += 'resizable=0, scrollbars=0, status=0,toolbar=0, menubars=0, location=0';
  win = window.open(filename, windowname, settings);
  win.window.focus();
}
function doclick(name,value)
{
	//alert(name);
	var obj=document.getElementById('c'+name);
	var obj1=document.getElementById('sc'+name);
	var obj2=document.getElementById('sc2'+name);
	var obj3=document.getElementById('sc3'+name);
	var obj4=document.getElementById('sc4'+name);
	var obj5=document.getElementById('sc5'+name);
	if(this.value=='+')
		{ 
			this.value='-'; 
			obj.style.display='';
			obj1.style.display='';
			obj2.style.display='';
			obj3.style.display='';
			obj4.style.display='';
			obj5.style.display='';
		}
	else 
		{ 
			this.value='+'; 
			obj.style.display='none';
			obj1.style.display='none';
			obj2.style.display='none';
			obj3.style.display='none';
			obj4.style.display='none';
			obj5.style.display='none';
		}
}

function doSubmitland()
		{
			var stuid_all='';
			for (i=1; i <=document.getElementById('boxchecked').value; i++){
				var el = document.getElementById('check'+i);
					if (el.checked) {
					if (stuid_all!='') stuid_all+=','+el.value; else stuid_all=el.value;
				}
			}
			 if (stuid_all=="") stuid_all=0;
			document.getElementById('landID_ck').value=stuid_all;
			//alert(document.getElementById('landID_ck').value);
		var req = Inint_AJAX();
		req.onreadystatechange = function()
		{
			if(req.readyState == 4)
			{
				Set_Cookie('module','ULStatus.php');
				var area = document.getElementById('displayresult');
				area.innerHTML = req.responseText;
			}
			else
			{
				var area = document.getElementById('displayresult');
				area.innerHTML = "<center><img src = images/wait.gif><br> กำลังค้นหา...</center>";
			}
		}
		Set_Cookie('landIDlsit',stuid_all);
		req.open("GET","ULStatus.php?landIDlist="+stuid_all+"&xx="+ new Date().getTime() + Math.random());
		req.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=tis-620");
		req.send(null);			
		}

function CA(isO,noHL)
	{
	for (var i=1;i<=document.getElementById('boxchecked').value;i++)
		{
		var e=document.getElementById('check'+i);
				if (isO != 1) e.checked=document.getElementById('chall').checked;
		}		
	}

function CCA(CB,noHL)
	{
	var TB=TO=0;
	for (var i=1;i<=document.getElementById('boxchecked').value;i++)	
		{
		var e=document.getElementById('check'+i);
			TB++;
			if (e.checked) TO++;
		}
	document.getElementById('chall').checked=(TO==TB)?true:false;
	}

function doClickS1(ck, s0id){
			var obj=document.getElementById("occ"+s0id);
			if (ck) obj.style.display=''; else obj.style.display='none';
		}
function doClickS2(ck, s0id,s1id){
			var obj=document.getElementById("s1occ"+s0id+s1id);
			if (ck) obj.style.display=''; else obj.style.display='none';
		}	
		
function dotabclick(id, page) {
  document.getElementById('content_tab').innerHTML = '<br />&nbsp;&nbsp;<img src="images/wait.gif" alt="loading" /> loading...' //รูปรอโหลด
  var ul = document.getElementById(id).parentNode
  var lilist = ul.getElementsByTagName("li")
  for (var n = 0; n < lilist.length; n++) {
    if (lilist[n].id == id) lilist[n].className="selected"
    else lilist[n].className=""
  }
  var req = Inint_AJAX() //สร้าง Object
  req.open('GET', page, true)
  req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
    if (req.readyState == 4) {
      if (req.status == 200) { //ได้รับการตอบกลับเรียบร้อย
        document.getElementById("content_tab").innerHTML = req.responseText //ข้อความที่ได้รับการตอบกลับ
      }
    }
  }
  req.send(null) //ทำการส่ง
}

function showS14(s14)
{
	var obj=document.getElementById('s14');
	var obj1=document.getElementById('s15');
	var obj2=document.getElementById('occ_old');
		if (s14==1) { 
			obj.style.display='';
		} 
		else if(s14==2)
		{
		obj.style.display='none';
		obj1.style.display='none';
		obj2.style.display='none';
		}
		else
		{ 
		obj.style.display='none';
		obj1.style.display='none';
		obj2.style.display='none';
		}
}
function showS15(s15)
{
	var obj=document.getElementById('s15');
	var obj1=document.getElementById('occ_old');
		if (s15==1) { 
			obj.style.display='';
			obj1.style.display='';
		} 
		else if(s15==2)
		{
		obj.style.display='none';
		obj1.style.display='none';
		}
		else
		{ 
		obj.style.display='';
		obj1.style.display='';
		}
}

function setCookiesOcc(src,value)
{
		Set_Cookie(src,value)
}

function loadlayer(layer,values,page) {
var req=Inint_AJAX();
Set_Cookie( 'layer' , layer );
alert(values); 
var links = layer+".php"; //alert(links);
     //แสดง icon คอยการ load ก่อนเลยถ้ามีการเรียกใช้ AJAX
     document.getElementById(layer).innerHTML='<div id="wait" align="center"><img src="images/wait.gif" alt="" /><br /><br />กำลังโหลด...</div>';
     req.onreadystatechange = function () {
          if (req.readyState==4) {
               if (req.status==200) 
               {
                    var data=req.responseText; //รับค่ากลับมา
                    document.getElementById(layer).innerHTML=data; //แสดงผล แทนรูปรอโหลด			 
               }
          }
     };
     req.open("GET", page+".php"+"?values="+values+"&url=" + new Date().getTime() + Math.random(), true);
     req.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); // set Header
     //req.setRequestHeader("charset","tis-620"); // set Header
     req.send(null); //ส่งค่า
}

function  reportyear(year)
	{
			var req=Inint_AJAX();
			//var links = layer+".php"; //alert(links);
			 //แสดง icon คอยการ load ก่อนเลยถ้ามีการเรียกใช้ AJAX
			 document.getElementById("displayresult").innerHTML='<div id="wait" align="center"><img src="images/wait.gif" alt="" /><br /><br />กำลังโหลด...</div>';
			 req.onreadystatechange = function () {
				  if (req.readyState==4) {
					   if (req.status==200) 
					   {
							var data=req.responseText; //รับค่ากลับมา
							document.getElementById("displayresult").innerHTML=data; //แสดงผล แทนรูปรอโหลด			 
					   }
				  }
			 };
			 req.open("GET", "reportyearRs.php?year="+year+"&url=" + new Date().getTime() + Math.random(), true);
			 req.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); // set Header
			 //req.setRequestHeader("charset","tis-620"); // set Header
			 req.send(null); //ส่งค่า
	}
	
function PopupCenter(pageURL, title,w,h)
	{
		var left = (screen.width/2)-(w/2);
		var top = (screen.height/2)-(h/2);
		var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
	} 