/* --- BoxOver ---
/* --- v 1.51 25th July 2005
By Oliver Bryant with help of Matthew Tagg
http://boxover.swazz.org */

if (typeof document.attachEvent!='undefined') {
   window.attachEvent('onload',init);
   document.attachEvent('onmousemove',moveMouse);
   document.attachEvent('onclick',checkMove); }
else {
   window.addEventListener('load',init,false);
   document.addEventListener('mousemove',moveMouse,false);
   document.addEventListener('click',checkMove,false);
}

/* --- These are all global variables used --- */
var oDv=document.createElement("div");
var dvHdr=document.createElement("div");
var dvBdy=document.createElement("div");
var windowlock,boxMove,fixposx,fixposy,lockX,lockY,fixx,fixy,ox,oy,boxLeft,boxRight,boxTop,boxBottom,evt,mouseX,mouseY,boxOpen,totalScrollTop,totalScrollLeft;
boxOpen=false;
ox=10;
oy=10;
lockX=0;
lockY=0;

function init() {
	oDv.appendChild(dvHdr);
	oDv.appendChild(dvBdy);
	oDv.style.position="absolute";
	oDv.style.visibility='hidden';
	document.body.appendChild(oDv);	
}

function defHdrStyle() {
	dvHdr.innerHTML='<img  style="vertical-align:middle"  src="info.gif">&nbsp;&nbsp;'+dvHdr.innerHTML;
	dvHdr.style.fontWeight='bold';
	dvHdr.style.width='150px';
	dvHdr.style.fontFamily='arial';
	dvHdr.style.border='1px solid #A5CFE9';
	dvHdr.style.padding='3';
	dvHdr.style.fontSize='11';
	dvHdr.style.color='#4B7A98';
	dvHdr.style.background='#D5EBF9';
	dvHdr.style.filter='alpha(opacity=85)'; // IE
	dvHdr.style.opacity='0.85'; // Firefox
}

function defBdyStyle() {
	dvBdy.style.borderBottom='1px solid #A5CFE9';
	dvBdy.style.borderLeft='1px solid #A5CFE9';
	dvBdy.style.borderRight='1px solid #A5CFE9';
	dvBdy.style.width='150px';
	dvBdy.style.fontFamily='arial';
	dvBdy.style.fontSize='11';
	dvBdy.style.padding='3';
	dvBdy.style.color='#1B4966';
	dvBdy.style.background='#FFFFFF';
	dvBdy.style.filter='alpha(opacity=85)'; // IE
	dvBdy.style.opacity='0.85'; // Firefox
}

var cnt=0;

function checkElemBO(txt) {
   if ((txt.indexOf('header')>-1)&(txt.indexOf('body')>-1)&(txt.indexOf('[')>-1)&(txt.indexOf('[')>-1))
      return true;
   else
      return false;
}

function scanDOM(curNode) {
	cnt++;
	while(curNode)	{
		if (curNode.title) {
		  if (checkElemBO(curNode.title)) {
   			curNode.boHDR=getParam('(?:[^a-zA-Z]header|^header)',curNode.title);
   			curNode.boBDY=getParam('(?:[^a-zA-Z]body|^body)',curNode.title);
   			curNode.boCSSBDY=getParam('cssbody',curNode.title);			
   			curNode.boCSSHDR=getParam('cssheader',curNode.title);
   			curNode.fixX=parseInt(getParam('fixedrelx',curNode.title));
   			curNode.fixY=parseInt(getParam('fixedrely',curNode.title));
   			curNode.absX=parseInt(getParam('fixedabsx',curNode.title));
   			curNode.absY=parseInt(getParam('fixedabsy',curNode.title));
   			curNode.offY=(getParam('offsety',curNode.title)!='')?parseInt(getParam('offsety',curNode.title)):10;
   			curNode.offX=(getParam('offsetx',curNode.title)!='')?parseInt(getParam('offsetx',curNode.title)):10;
   			if (getParam('doubleclickstop',curNode.title)!='off') {
   				document.all?curNode.attachEvent('ondblclick',pauseBox):curNode.addEventListener('dblclick',pauseBox,false);
   			}	
   			if (getParam('singleclickstop',curNode.title)=='on') {
   				document.all?curNode.attachEvent('onclick',pauseBox):curNode.addEventListener('click',pauseBox,false);
   			}
   			curNode.windowLock=getParam('windowlock',curNode.title).toLowerCase()=='off'?false:true;
   			curNode.title='';
   			curNode.hasbox='true';
   	   }
		}
		scanDOM(curNode.firstChild);
		curNode=curNode.nextSibling;
	}
}

function getParam(param,list) {
	var reg = new RegExp(param+'\\s*=\\s*\\[\\s*(((\\[\\[)|(\\]\\])|([^\\]\\[]))*)\\s*\\]');
	var res = reg.exec(list);
	var returnvar;
	if(res)
		return res[1].replace('[[','[').replace(']]',']');
	else
		return '';
}

function Left(elem){	
	var x=0;
	if (elem.calcLeft)
		return elem.calcLeft;
	var oElem=elem;
	while(elem){
		 if ((elem.currentStyle)&& (!isNaN(parseInt(elem.currentStyle.borderLeftWidth)))&&(x!=0))
		 	x+=parseInt(elem.currentStyle.borderLeftWidth);
		 x+=elem.offsetLeft;
		 elem=elem.offsetParent;
	  } 
	oElem.calcLeft=x;
	return x;
	}

function Top(elem){
	 var x=0;
	 if (elem.calcTop)
	 	return elem.calcTop;
	 var oElem=elem;
	 while(elem){		
	 	 if ((elem.currentStyle)&& (!isNaN(parseInt(elem.currentStyle.borderTopWidth)))&&(x!=0))
		 	x+=parseInt(elem.currentStyle.borderTopWidth); 
		 x+=elem.offsetTop;
	         elem=elem.offsetParent;
 	 } 
 	 oElem.calcTop=x;
 	 return x;
 	 
}

var ah,ab;
function applyStyles() {
	if(ab)
		oDv.removeChild(dvBdy);
	if (ah)
		oDv.removeChild(dvHdr);
	dvHdr=document.createElement("div");
	dvBdy=document.createElement("div");
	curBoxElem.boCSSBDY?dvBdy.className=curBoxElem.boCSSBDY:defBdyStyle();
	curBoxElem.boCSSHDR?dvHdr.className=curBoxElem.boCSSHDR:defHdrStyle();
	dvHdr.innerHTML=curBoxElem.boHDR;
	dvBdy.innerHTML=curBoxElem.boBDY;
	ah=false;
	ab=false;
	if (curBoxElem.boHDR!='') {		
		oDv.appendChild(dvHdr);
		ah=true;
	}	
	if (curBoxElem.boBDY!=''){
		oDv.appendChild(dvBdy);
		ab=true;
	}	
}

var curSrcElem,iterElem,lastSrcElem,curBoxElem,lastBoxElem, totalScrollLeft, totalScrollTop ;
var ini=false;

function moveMouse(e) {   
   if (!ini) {      
      scanDOM(document.body.firstChild);
      ini=true;
   }
	e?evt=e:evt=event;	
	//evt=event;
		
	curSrcElem=evt.target?evt.target:evt.srcElement;
	if ((curSrcElem!=lastSrcElem)&&(!isChild(curSrcElem,dvHdr))&&(!isChild(curSrcElem,dvBdy))){
		
		if (!curSrcElem.boxItem) {
			iterElem=curSrcElem;
			while ((!iterElem.hasbox)&&(iterElem.parentNode))
					iterElem=iterElem.parentNode; 
			curSrcElem.boxItem=iterElem;
			}
		iterElem=curSrcElem.boxItem;
		// This does an additional check to see that everything was initiliased properly.
		if (curSrcElem.boxItem.title)
		  if (checkElemBO(curSrcElem.boxItem.title)) {		      
		      ini=false;
		   }
		if (curSrcElem.boxItem&&curSrcElem.boxItem.hasbox)  {
			lastBoxElem=curBoxElem;
			curBoxElem=iterElem;
			if (curBoxElem!=lastBoxElem) {
				applyStyles();
				oDv.style.visibility='visible';
				fixposx=!isNaN(curBoxElem.fixX)?Left(curBoxElem)+curBoxElem.fixX:curBoxElem.absX;
				fixposy=!isNaN(curBoxElem.fixY)?Top(curBoxElem)+curBoxElem.fixY:curBoxElem.absY;			
				lockX=0;
				lockY=0;
				boxMove=true;
				ox=curBoxElem.offX?curBoxElem.offX:10;
				oy=curBoxElem.offY?curBoxElem.offY:10;
			}
		}
		else if (!isChild(curSrcElem,dvHdr) && !isChild(curSrcElem,dvBdy) && (boxMove))	{
			// The conditional here fixes flickering between tables cells.
			if ((!isChild(curBoxElem,curSrcElem)) || (curSrcElem.tagName!='TABLE')) {
			
			curBoxElem=null;
			oDv.style.visibility='hidden'; }
		}
		lastSrcElem=curSrcElem;
	}
	else if (((isChild(curSrcElem,dvHdr) || isChild(curSrcElem,dvBdy))&&(boxMove))) {
		totalScrollLeft=0;
		totalScrollTop=0;
		
		iterElem=curSrcElem;
		while(iterElem) {
			if(!isNaN(parseInt(iterElem.scrollTop)))
				totalScrollTop+=parseInt(iterElem.scrollTop);
			if(!isNaN(parseInt(iterElem.scrollLeft)))
				totalScrollLeft+=parseInt(iterElem.scrollLeft);
			iterElem=iterElem.parentNode;			
		}
		boxLeft=Left(curBoxElem)-totalScrollLeft;
		boxRight=parseInt(Left(curBoxElem)+curBoxElem.offsetWidth)-totalScrollLeft;
		boxTop=Top(curBoxElem)-totalScrollTop;
		boxBottom=parseInt(Top(curBoxElem)+curBoxElem.offsetHeight)-totalScrollTop;
		doCheck();
	}
	
	if (boxMove&&curBoxElem) {
		// This added to alleviate bug in IE6 w.r.t DOCTYPE
		bodyScrollTop=document.documentElement&&document.documentElement.scrollTop?document.documentElement.scrollTop:document.body.scrollTop;
		bodyScrollLet=document.documentElement&&document.documentElement.scrollLeft?document.documentElement.scrollLeft:document.body.scrollLeft;
		mouseX=evt.pageX?evt.pageX-bodyScrollLet:evt.clientX-document.body.clientLeft;
		mouseY=evt.pageY?evt.pageY-bodyScrollTop:evt.clientY-document.body.clientTop;
		if ((curBoxElem)&&(curBoxElem.windowLock)) {
			mouseY < -oy?lockY=-mouseY-oy:lockY=0;
			mouseX < -ox?lockX=-mouseX-ox:lockX=0;
			mouseY > (document.body.clientHeight-oDv.offsetHeight-oy)?lockY=-mouseY+document.body.clientHeight-oDv.offsetHeight-oy:lockY=lockY;
			mouseX > (document.body.clientWidth-dvBdy.offsetWidth-ox)?lockX=-mouseX-ox+document.body.clientWidth-dvBdy.offsetWidth:lockX=lockX;	
		}
		oDv.style.left=((fixposx)||(fixposx==0))?fixposx:bodyScrollLet+mouseX+ox+lockX+"px";
		oDv.style.top=((fixposy)||(fixposy==0))?fixposy:bodyScrollTop+mouseY+oy+lockY+"px";		
	}
}

function doCheck() {	
	if (   (mouseX < boxLeft)    ||     (mouseX >boxRight)     || (mouseY < boxTop) || (mouseY > boxBottom)) {
		oDv.style.visibility='hidden';
		curBoxElem=null;
	}	
}

function pauseBox(e) {
   e?evt=e:evt=event;
	boxMove=false;
	evt.cancelBubble=true;
}

function isChild(s,d) {
	while(s) {
		if (s==d) 
			return true;
		s=s.parentNode;
	}
	return false;
}

var cSrc;
function checkMove(e) {
	e?evt=e:evt=event;
	cSrc=evt.target?evt.target:evt.srcElement;
	if ((!boxMove)&&(!isChild(cSrc,oDv))) {
		oDv.style.visibility='hidden';
		boxMove=true;
		curBoxElem=null;
	}
}