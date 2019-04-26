var xmlHttp
var disptype
function showUser(path)
{ 
//alert("path")
if(document.frmlogin.txtuid.value=="")
{
	alert("user id shouldn't be blabnk")
	document.frmlogin.txtuid.select()
	return 
}
if(document.frmlogin.txtpwd.value=="")
{
	alert("password shouldn't be blabnk")
	document.frmlogin.txtpwd.select()
	return 
}
//alert("dd");
document.getElementById("captcha").innerHTML="<table height=80 width=100% border=1 style='border-collapse:collapse' bordercolor='black'><tr><td width=100% height=100% valign=top align=center bgcolor=white><img src='"+path+"'><br><input type=text name='txtcaptcha' id='txtcaptcha' size=50 onkeydown=press(event,this.value) class=txtbox><br><font face=verdana size=1><b>type captcha and press 'Enter' </b></font></td></tr></table>"

}

function press(e,txt)
{
	
	if(e.keyCode==13)
	{
	
			//alert(e.keyCode)
			log1(txt)
		
	}
	else if(e.which==13)
	{
		
			//alert(txt)
			log1(txt)
		
	}			
	
}
function visible(e)
{

	
	if(e.keyCode==27)
	{
	
			//alert(e.keyCode)
			hide()
		
	}
	else if(e.which==27)
	{
			hide()
			//alert(txt)
			
		
	}			
	
}

function log1()
{


//document.getElementById("captcha").innerHTML=""
//document.getElementById("w").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>"
	
 
//alert("hh")
if(document.getElementById("txtuid").value=="")
{
	alert("you should enter the userid")
	document.getElementById("txtuid").select()
	return
}
if(document.getElementById("txtpwd").value=="")
{
	alert("you should enter the password")
	document.getElementById("txtpwd").select()
	return
}
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }


var url="login.php"
url=url+"?usname="+document.frmlogin.txtuid.value
url=url+"&uspass="+document.frmlogin.txtpwd.value
url=url+"&captcha="//+document.frmlogin.txtcaptcha.value
url=url+"&sid="+Math.random()
//alert(url)
xmlHttp.onreadystatechange=stateChanged123 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)

//window.location="login.php"

}
function stateChanged123() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 	//document.getElementById("captcha").innerHTML=""
	//alert(xmlHttp.responseText) 
	 //document.getElementById("test").innerHTML=xmlHttp.responseText	 
 	if (xmlHttp.responseText=="failed")
 	{
		alert("Login Error Plz try again")
		window.location.reload()
		//document.frmlogin.reset()
		//document.getElementById("test").innerHTML="Incorrect User Name or Password" 
	}
	else
	{ 

		switch(xmlHttp.responseText.trim())
		{ 
			case "EM":
					window.location="profile.php"
					break;
			case "AD":
					window.location="start.php"	
					break
			case "CO":
					window.location="start.php"	
					break
			case "RP":
					window.location="start.php"	
					break
			case "MS":
					window.location="monthlyreport.php"	
					break
			case "HR":
					window.location="addemployee.php"	
					break
			default:
					//alert(xmlHttp.responseText)
					window.location.reload()
					//alert(xmlHttp.responseText);
		}

	}
	document.getElementById("w").innerHTML="";
	
	document.frmlogin.reset();

 } 
}
function cancel()
{
	document.frmlogin.reset()
}
function set(id,stat,page)
{
		document.getElementById("w").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>"
	
document.getElementById("w1").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
	xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		
		var url="setprofile.php"
		url=url+"?empid="+id
		url=url+"&stat="+stat
		url=url+"&page="+page
		//alert(url)
		//url=url+"&photo="+photo
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=afterset
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null) 
}
function afterset() 
{ 
	
	
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		//alert(xmlHttp.responseText)
		window.location="profile.php"
		
	 } 
}
function recover1()
{ 
			
		var i
		var str
		for(i=0;i<=document.frmForgot.length-1;i++)
		{
			
			if(document.frmForgot.elements[i].checked==true)
			{
				str=document.frmForgot.elements[i].value
			}
			
		}
		
		if(document.frmForgot.txtdet.value=="")
		{
			
			switch (str)
			{
				case "user" :
							 alert("You should enter your user name")
							 document.frmForgot.txtdet.select()
							 return false
							 break;
			   	case "email" :
			   				alert("You should enter your email id")
			   				document.frmForgot.txtdet.select()
							 return false
							 break;
		    }
						 
		}
		if(document.frmForgot.txtchar.value=="")
		{
			alert("Please enter the characters as shown below")
			document.frmForgot.txtchar.select()
			return false
		}
		
		if (str=="email" && checkmail(document.frmForgot.txtdet.value)==false)
		{
			alert ("Plz enter a valid email id")
			document.frmForgot.txtdet.select()
			return false
		}
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		
		var url="recover.php"
		url=url+"?type="+str
		url=url+"&det="+document.frmForgot.txtdet.value
		url=url+"&captcha="+document.frmForgot.txtchar.value
		//alert(url)
		//url=url+"&photo="+photo
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=afterRecover
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null) 
}
function afterRecover() 
{ 
	
	
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		alert(xmlHttp.responseText)
		switch(xmlHttp.responseText)
		{
			case "FINISHED":
							 alert("Your Account Information has been successfully sent to your email id ")
							 window.location.reload()
							 break;
			case "fc":
							window.location.reload()
							 break;
			case "fu":
							alert("you have entered incorrect username")
							 window.location.reload()
							 break;
			
		}
		
	 } 
}
function change(txt)
{
	//alert(txt)
	if(txt=="Enter Email Id")
	{
		document.getElementById("divSelect").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;"+txt
	}
	else
	{
		document.getElementById("divSelect").innerHTML=txt
	}
}

function checkmail(src) 
{
  var regex =/^[a-zA-Z0-9._-]+@([a-zA-Z0-9.-]+\.)+[a-zA-Z0-9.-]{2,4}$/;
  return regex.test(src);
}

/*
function dispQuali(fil,type1)
{
	

} */


function view(type)
{
	//alert('visible')
	disptype=type
	hide()
	document.getElementById(type).style.visibility="visible"
}
function hide()
{
	//alert(document.getElementById("quali").style.visibility)
	//alert('hide')
		document.getElementById("quali").style.visibility="hidden"
		document.getElementById("desig").style.visibility="hidden"
		document.getElementById("company").style.visibility="hidden"
		document.getElementById("city").style.visibility="hidden"
}
function dispValue(val,txtbox,divbox)
{
	document.getElementById(txtbox).value=val
	document.getElementById(divbox).style.visibility="hidden"
	//alert(divbox)
}
function create()
{
if(document.frmcreateaccount.txtuid.value=="")
{
	alert("plz type userid")
	document.frmcreateaccount.txtuid.select()
	return  
}
if(document.frmcreateaccount.txtpwd.value=="")
{
	alert("plz type password")
	document.frmcreateaccount.txtpwd.select()
	return 
}
if(document.frmcreateaccount.cmbCompany.value==0)
{
	alert("plz select a company")
	return 
}
//document.getElementById("captcha").innerHTML=""
document.getElementById("w1").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>"
	
 
//alert("hh")
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }


var url="accountcreated.php"
url=url+"?usname="+document.frmcreateaccount.txtuid.value
url=url+"&uspass="+document.frmcreateaccount.txtpwd.value
url=url+"&company="+document.frmcreateaccount.cmbCompany.value
url=url+"&name="+document.frmcreateaccount.txtname.value
url=url+"&desig="+document.frmcreateaccount.txtdesig.value
url=url+"&sid="+Math.random()
//alert(url)
xmlHttp.onreadystatechange=created 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)

}
function createSup(comid,type)
{
if(document.frmcreateaccount.txtuid.value=="")
{
	alert("plz type userid")
	document.frmcreateaccount.txtuid.select()
	retrun 
}
if(document.frmcreateaccount.txtpwd.value=="")
{
	alert("plz type password")
	document.frmcreateaccount.txtpwd.select()
	retrun 
}
//document.getElementById("captcha").innerHTML=""
document.getElementById("w1").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>"
	
 
//alert("hh")
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }


var url="supaccountcreated.php"
url=url+"?usname="+document.frmcreateaccount.txtuid.value
url=url+"&uspass="+document.frmcreateaccount.txtpwd.value
url=url+"&name="+document.frmcreateaccount.txtname.value
url=url+"&desig="+document.frmcreateaccount.txtdesig.value
url=url+"&company="+comid
url=url+"&type="+type
url=url+"&sid="+Math.random()
//alert(url)
xmlHttp.onreadystatechange=created 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)

}

function created()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		if(xmlHttp.responseText=="FINISHED")
		{
			alert("account created successfully")
		}
		else
		{
			alert(xmlHttp.responseText)
		}
		document.getElementById("w1").innerHTML=""
		document.frmcreateaccount.reset()
		//window.location="profile.php"
		
	 } 
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
