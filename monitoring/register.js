var xmlHttp
var disptype
var divname
function checkAgreeement()
{
	if(document.getElementById("chkAgree").checked==false)
	{
		alert("You should accept our rules for the registration")
	}
	else
	{
		disp("register")
	}
}
function saveForum(id) 
{ 	
	
		
		if(document.getElementById("txtTitle").value=="")
		{
			alert("You should enter the caption ")
			document.getElementById("txtTitle").select()
			return false;
		}
	
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		var url
		url="updateforum.php"
		url=url+"?title="+document.getElementById("txtTitle").value
		url=url+"&id="+document.getElementById("txtId").value
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=forumsaved
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null)
	
	
}
function forumsaved()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		alert(xmlHttp.responseText)	
		window.location.reload() 
		//document.frmlogin.reset()
		//document.getElementById("main").innerHTML=xmlHttp.responseText
		//document.getElementById("quali").style.display=""
	}
}

function completeRegistration() 
{		
		if(document.getElementById("txtuid").value=="")
		{
			alert("You should enter the username ")
			document.getElementById("txtuid").select()
			return false;
		}
		if(document.getElementById("txtpwd").value=="")
		{
			alert("You should enter the password ")
			document.getElementById("txtpwd").select()
			return false;
		}
		if(document.getElementById("txtpwd").value!=document.getElementById("txtRepwd").value)
		{
			alert("Both the new and confirmation passwords should be same ")
			document.getElementById("txtRepwd").select()
			return false;
		}
		if(document.getElementById("txtemail").value=="")
		{
			alert("You should enter the email ")
			document.getElementById("txtemail").select()
			return false;
		}
		if(checkmail(document.getElementById("txtemail").value)==false)
		{
			alert("please enter a valid email")
			document.getElementById("txtemail").select()
			return false;
		}
		if(document.getElementById("txtemail").value!=document.getElementById("txtReEmail").value)
		{
			alert("Both the new and confirmation email addresses should be same ")
			document.getElementById("txtReEmail").select()
			return false;
		}
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		var url
		url="updateregistration.php"
		url=url+"?userid="+document.getElementById("txtuid").value
		url=url+"&pwd="+document.getElementById("txtpwd").value
		url=url+"&email="+document.getElementById("txtemail").value
		url=url+"&captcha="+document.getElementById("txtcaptcha").value
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=forumsaved
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null)
	
	
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
