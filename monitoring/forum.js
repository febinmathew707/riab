var xmlHttp
var disptype
var divname
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
function saveTopic(id) 
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
		url="updatetopic.php"
		url=url+"?title="+document.getElementById("txtTitle").value
		url=url+"&id="+document.getElementById("txtId").value
		url=url+"&forumid="+document.getElementById("cmbForum").value
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=topicsaved
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null)
	
	
}
function topicsaved()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		alert(xmlHttp.responseText)
		document.getElementById("txtTitle").value=""
		document.getElementById("txtId").value=""	
		listTopic('listTopic')
		//window.location.reload() 
		//document.frmlogin.reset()
		//document.getElementById("main").innerHTML=xmlHttp.responseText
		//document.getElementById("quali").style.display=""
	}
}
function editforum(id,val)
{
	document.getElementById("txtTitle").value=val
	document.getElementById("txtId").value=id
}
function edittopic(id,val)
{
	document.getElementById("txtTitle").value=val
	document.getElementById("txtId").value=id
}
function AddComment(id,div)
{
	alert(div)
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
		alert(divname)
		document.getElementById(divname).innerHTML=xmlHttp.responseText
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
	
	alert(div)
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
		alert(xmlHttp.responseText)
		document.getElementById(divname).innerHTML=xmlHttp.responseText 
	}
}
function listTopic(div)
{
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
	divname=div	
	var url="listtopic.php"				
	
	//alert(url)
	//url=url+"&photo="+photo
	url=url+"?forumid="+document.getElementById("cmbForum").value
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=commentdisplayed
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null) 
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
