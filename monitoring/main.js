var xmlHttp
var disptype
var divname
var region
var pge
function predisp(page,reg)
{
	alert(reg)
	region=reg
	disp(page)
	
}
function disp(page)
{
		pge=page
		//alert(page)
		//document.getElementById("w").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>"
	
//document.getElementById("w1").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
	xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		switch(page)
		{
			case "home":				
						var url="home.php"
						url=url+"?sid="+Math.random()
						break;
			case "aims":				
						var url="aims.php"
						url=url+"?sid="+Math.random()
						break;
		
			case "forum":				
						var url="blogs.php"
						url=url+"?region="+region
						url=url+"&sid="+Math.random()
						break;
			case "addblog":
						var url="addblog.php"
						url=url+"?sid="+Math.random()
						break;	
			
			case "viewblog":
						var url="viewotherblogs.php"
						url=url+"?sid="+Math.random()
						break;
			case "listblog":
						var url="listblog.php"
						url=url+"?sid="+Math.random()
						break;			
			case "changepwd":
						var url="changepwd.php"
						url=url+"?sid="+Math.random()
						break;	
		
			case "addtopic":
						var url="addtopic.php"
						url=url+"?sid="+Math.random()
						break;
			case "rules":
						var url="rules.php"
						url=url+"?sid="+Math.random()
						break;
			case "register":
						var url="register.php"
						url=url+"?sid="+Math.random()
						break;			
			case "editblog":
						edit1("editblog",0)
						return;	
						break;						
			case "kerala":
						var url="keralahome.php"
						url=url+"?sid="+Math.random()
						break;	
			case "stream":
						var url="stream.php"
						url=url+"?sid="+Math.random()
						break;
			case "ad_pwd":
						var url="change_ad_pwd.php"
						url=url+"?sid="+Math.random()
						break;		
			case "liststream":
						var url="liststreams.php"
						url=url+"?sid="+Math.random()
						break;
			case "feedback":
						var url="feedback.php"
						url=url+"?sid="+Math.random()
						break;				
			case "malabarstream":
						//alert("dd")
						var url="malabarstream.php"
						url=url+"?sid="+Math.random()
						break;	
			case "ksidc":	
										
						document.getElementById("w").innerHTML=""
						document.getElementById("w1").innerHTML=""
						var browser=navigator.appName;
						if (browser=="Microsoft Internet Explorer"){
							window.opener=self;		
						}
						alert("dd")
					    //window.open('http://riab-ksidc.webexone.com/login.asp?', 'null', 'location=no,resizable=yes,width=1024,height=600');
						//window.moveTo(0,0);		
						//window.resizeTo(screen.width,screen.height-100);
						//window.location="http://riab-ksidc.webexone.com/login.asp"
						return;
		  	case "kinfra":					
						document.getElementById("w").innerHTML=""
						document.getElementById("w1").innerHTML=""
						var browser=navigator.appName;
						if (browser=="Microsoft Internet Explorer"){
							window.opener=self;		
						}
				//	window.open('http://riab-kinfra.webexone.com/login.asp?', 'null', 'location=no,resizable=yes,width=1024,height=600');
						window.moveTo(0,0);		
						window.resizeTo(screen.width,screen.height-100);
						return;
		   case "soe":					
						document.getElementById("w").innerHTML=""
						document.getElementById("w1").innerHTML=""
						var browser=navigator.appName;
						if (browser=="Microsoft Internet Explorer"){
							window.opener=self;		
						}
				//	window.open('http://soemonitor.webexone.com/login.asp?', 'null', 'location=no,resizable=yes,width=1024,height=600');
						window.moveTo(0,0);		
						window.resizeTo(screen.width,screen.height-100);
						return;
						
		
															
		}
		
		//alert(url)
		//url=url+"&photo="+photo
		
		xmlHttp.onreadystatechange=afterdisp
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null) 
}
function edit1(page,id)
{
		//alert(page)
		document.getElementById("w").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>"
	
document.getElementById("w1").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
	xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		switch(page)
		{
			case "editblog":				
						var url="editblog.php"
						break;
			
		}
		
		//alert(url)
		//url=url+"&photo="+photo
		url=url+"?id="+id
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=maindisplayed1
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null) 
}
function afterdisp()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		//alert(document.getElementById("quali").innerHTML)
		//alert(xmlHttp.responseText)
		document.body.scrollTop=0
		//document.getElementById("w").innerHTML=""
		//document.getElementById("w1").innerHTML=""
		if (pge!="profile")
		{
			document.getElementById("main").innerHTML=xmlHttp.responseText
			document.getElementById("main1").innerHTML=""
		}
		else
		{
			document.getElementById("main1").innerHTML=xmlHttp.responseText
			document.getElementById("main").innerHTML=""
		} 
		
		//document.getElementById("quali").style.display=""
	}
}
function swap(img,div,page,id)
{
	var len
	var type
	divname=div
	//alert(img)
	len=document.getElementById(img).src.length-7
	//alert(document.getElementById(img).src.substr(len,7))
	if(document.getElementById(img).src.substr(len,7)=="add.gif")
	{
		//document.getElementById(img).src=document.getElementById(img).src.substr(0,30)+"minus.gif"
		document.getElementById(img).src="images/minus.gif"	
		type="expand"	
	}
	else
	{
		document.getElementById(img).src="images/add.gif"	
		type="collapse"
	}
		
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
			
	var url=page				
	
	//alert(url)
	//url=url+"&photo="+photo
	url=url+"?id="+id
	url=url+"&type="+type
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=dispmore
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null) 
}


function dispmore()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		//alert(document.getElementById("quali").innerHTML)
		//alert(xmlHttp.responseText)		
		document.getElementById(divname).innerHTML=xmlHttp.responseText 
		
		//document.getElementById("quali").style.display=""
	}
}
function dispStream(val)
{
		//alert(val)
		document.getElementById("w").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>"
	
document.getElementById("w1").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
	xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		switch(val)
		{
			case "kso":				
						var url="ksostream.php"
						break;
			
		}		
		//alert(url)
		//url=url+"&photo="+photo
		url=url+"?sid="+Math.random()
		xmlHttp.onreadystatechange=streamShow
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null) 
}
function streamShow()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		//alert(document.getElementById("quali").innerHTML)
		//alert(xmlHttp.responseText)
		document.getElementById("w").innerHTML=""
		document.getElementById("w1").innerHTML=""		
		document.getElementById("stream").innerHTML=xmlHttp.responseText 
		
		//document.getElementById("quali").style.display=""
	}
}
function del1(tbl,fld,val)
{
	if(confirm("Are you sure to remove??")==true)
	{
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
				
		var url="delete_new.php"				
		
		//alert(url)
		//url=url+"&photo="+photo
		url=url+"?tbl="+tbl
		url=url+"&fld="+fld
		url=url+"&value="+val
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=afterdelete
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null) 
	}
}
function afterdelete()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		alert(xmlHttp.responseText)	 
		dispmain("listblog")
		//document.getElementById("main").innerHTML=xmlHttp.responseText
		//document.getElementById("quali").style.display=""
	}
}
function maindisplayed1()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
		//document.getElementById("w").innerHTML=""
		document.getElementById("w").innerHTML=""
		document.getElementById("w1").innerHTML=""
		document.getElementById("main").innerHTML=xmlHttp.responseText	
		if(mainpage=="listemployees")
		{
			disp('','')
		}
		//alert(document.getElementById("main").innerHTML)
		
	}
}
function openWindow()
{
	//alert(window.menubar)

//window.location="first.php"
	//alert("dd")

	
window.open('http://riab-ksidc.webexone.com/login.asp?','null','width=900,height=750,toolbar=no,scrollbars=no,location=no,resizable =yes');
//window.moveTo(0,0);
//window.resizeTo(screen.width,screen.height-100);
//self.close();*/
}
function saveFeedback()
{
		
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
				
		var url="updatefeedback.php"				
		
		//alert(url)
		//url=url+"&photo="+photo	
		if(document.getElementById("txtname").value=="")
		{
			alert("name shouldn't be blank")
			document.getElementById("txtname").select()
			return false
			
		}
		if(document.getElementById("txtemail").value=="")
		{
			alert("email shouldn't be blank")
			document.getElementById("txtemail").select()
			return false
			
		}
		if(document.getElementById("txtdesc").value=="")
		{
			alert("Description shouldn't be blank")
			document.getElementById("txtdesc").select()
			return false
			
		}
		//alert(url)
		if(checkmail(document.getElementById("txtemail").value)==false)
		{
			alert("please enter a valid email address")
			document.getElementById("txtemail").select()
			return false
			
		}
		
		url=url+"?name="+document.getElementById("txtname").value
		url=url+"&email="+document.getElementById("txtemail").value
		url=url+"&desc="+document.getElementById("txtdesc").value
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=feedbacksaved
		xmlHttp.open("GET",url,true)
		//alert(url)
		xmlHttp.send(null) 
	
}
function feedbacksaved()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
		alert(xmlHttp.responseText)
		//document.getElementById("main").innerHTML=xmlHttp.responseText
		document.getElementById("txtname").value=""
		document.getElementById("txtemail").value=""
		document.getElementById("txtdesc").value=""
		document.getElementById("txtname").select()
		//document.getElementById("frmFeedback").reset();
		
	}
}
 function checkmail(src) 
{
  var regex =/^[a-zA-Z0-9._-]+@([a-zA-Z0-9.-]+\.)+[a-zA-Z0-9.-]{2,4}$/;
  return regex.test(src);
}
//////////////////////////////////////////////////
function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}
