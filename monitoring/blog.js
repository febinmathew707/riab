var xmlHttp
var disptype
var divname
function saveBlog(id) 
{ 	
	//alert(id)
	if (isNaN(id))
	{
		alert("Please Upload your profile before updating the photo")
		//bypass('general','new')
		//return false
	}
	else
	{
		
		if(document.getElementById("txtTitle").value=="")
		{
			alert("You should enter the title ")
			return false;
		}
		
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		var url
		url="updateblog.php"
		url=url+"?title="+document.getElementById("txtTitle").value
		url=url+"&desc="+document.getElementById("txtdesc").value
		url=url+"&to="
		url=url+"&tag="
		url=url+"&blid="+id
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=blogsaved
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null)
	
	}
}
function saveComment(id) 
{
	    //alert("dd");
		if(document.getElementById("txtdesc").value=="")
		{
			alert("You should enter the descripgion ")
			return false;
		}
		
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		var url
		url="updatecomment.php"
		//url=url+"?name="+document.getElementById("txtName").value
		url=url+"?desc="+document.getElementById("txtdesc").value
		//url=url+"&email="+document.getElementById("txtEmail").value
		url=url+"&blid="+id
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=blogsaved
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null)	
	
}		 
function blogsaved()
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
function AddComment(id,div)
{
	xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		 divname=div
		var url
		url="addcomment.php"
		url=url+"?id="+id
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=result
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null)
	
}
function result()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		
		//alert(divname)
		document.getElementById(divname).innerHTML=xmlHttp.responseText
		//document.getElementById("quali").style.display=""
	}
}
function reply(id,div)
{
	xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		 divname=div
		var url
		url="reply.php"
		url=url+"?id="+id
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=result
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null)
	
}
function sendmail()
{
	xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		if(document.getElementById("txtTo").value=="")
		{
			alert("To address shouldn't be blank")
			document.getElementById("txtTo").select()
			return 
		}
		if(document.getElementById("txtdesc").value=="")
		{
			alert("To address shouldn't be blank")
			document.getElementById("txtdesc").select()
			return 
		}
		var url
		url="mailsend.php"
		url=url+"?to="+document.getElementById("txtTo").value
		url=url+"&message="+document.getElementById("txtdesc").value
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=mailsend
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null)
	
}
function mailsend()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{		
		//alert(divname)
		alert(xmlHttp.responseText)
		//document.getElementById("quali").style.display=""
	}
}
 function checkmail(src) 
{
  var regex =/^[a-zA-Z0-9._-]+@([a-zA-Z0-9.-]+\.)+[a-zA-Z0-9.-]{2,4}$/;
  return regex.test(src);
}
function dispcomment(id,div)
{
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
	divname=div	
	var url="dispcomments.php"				
	
	//alert(url)
	//url=url+"&photo="+photo
	url=url+"?id="+id
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=commentdisplayed
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null) 
}
function commentdisplayed()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
		//alert(divname)
		document.getElementById(divname).innerHTML=xmlHttp.responseText 
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
