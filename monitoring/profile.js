var type
var mode
var page
var old
var old1
var disptype
function bypass(lnk,mod)
{
	//alert("jere")
	type=mod
	display(lnk)
}
function display(command)
{	
	//alert("type is"+type)
	
	//alert(type)
	page=command
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
	var url
	
	if(type=="new")
	{
		mode="new"
		switch(command)
		{
			case "personal":
							url="personal.php"
							document.getElementById("wait").innerHTML="<embed src='movieProfile/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
							document.getElementById("wait1").innerHTML="<embed src='movieProfile/waitbottom.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
								
			break
		}
			
	}
	else if(type=="edit")
	{
		mode="edit"
		switch(command)
		{
			case "personal":
							url="editpersonal.php"						
								document.getElementById("wait").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
							
							break
			case "professional":
							url="editprofessional.php"
							document.getElementById("wait").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
							
							break
			case "contact":
							url="editcontact.php"
							document.getElementById("wait").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
							
							break
			case "preferance":
							url="editpreference.php"
							document.getElementById("wait").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
						
							break
			
		}
	}
	
	else if(type=="view")
	{
		mode="view"
		switch(command)
		{
			case "personal":
								url="personal.php"						
								document.getElementById("wait").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
							
							break
			case "professional":
							url="proffessional.php"
							document.getElementById("wait").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
							
							break
			case "contact":
							url="contact.php"
							document.getElementById("wait").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
						
							break
			case "preferance":
							url="preferance.php"
							document.getElementById("wait").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
						
							break
			
		}
	}
	url=url+"?stype="+command

	url=url+"&stat=next"
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=liststudent
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function liststudent() 
{ 	
	
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		//alert(xmlHttp.responseText);
		if(xmlHttp.responseText=="FINISHED")	 
	 	{
			alert("Your request successfully updated")
			//window.location.reload()
			//bypass('general','edit')
		}
		else
		{
	 	
		 document.getElementById("display").innerHTML=xmlHttp.responseText 
			
	 	}
	 	document.getElementById("wait").innerHTML=""
	 	document.getElementById("wait1").innerHTML=""
	 	//document.getElementById("display").innerHTML=xmlHttp.responseText 
	 }
} 
function updateProfessional()
{

	document.getElementById("wait").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
	
	
	
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
	
	
	var url="updateprofessional.php"
	url=url+"?desig="+document.getElementById("txtDesignation").value
	url=url+"&discipline="+document.getElementById("txtDiscipline").value
	url=url+"&company="+document.getElementById("txtCompany").value
	url=url+"&sector="+document.getElementById("txtSector").value
	url=url+"&experience="+document.getElementById("txtExperience").value
	url=url+"&expcurrentorg="+document.getElementById("txtCurrentExpOrg").value
	url=url+"&expcurrentpos="+document.getElementById("txtCurrentExpPos").value	
	url=url+"&sid="+Math.random()
	//alert(url)
	xmlHttp.onreadystatechange=stateChanged 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)

}
function updatePersonal()
{

	document.getElementById("wait").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
	
	
	
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
	
	
	var url="updatepersonal.php"
	url=url+"?fname="+document.getElementById("txtFirstName").value
	url=url+"&lname="+document.getElementById("txtLastName").value
	url=url+"&dofb="+document.getElementById("txtDofB").value
	url=url+"&gender="+document.getElementById("txtSex").value
	url=url+"&religion="+document.getElementById("txtReligion").value
	url=url+"&maritalstatus="+document.getElementById("txtMaritalStatus").value
	url=url+"&area="+document.getElementById("txtArea").value	
	url=url+"&quali="+document.getElementById("txtQuali").value
	url=url+"&sid="+Math.random()
	//alert(url)
	xmlHttp.onreadystatechange=stateChanged 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)

}
function updateContact()
{

	document.getElementById("wait").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
	
	
	
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
	
	
	var url="updatecontact.php"
	url=url+"?email="+document.getElementById("txtEmail").value
	url=url+"&cellphone="+document.getElementById("txtCellPhone").value
	url=url+"&homephone="+document.getElementById("txtHomePhone").value
	url=url+"&add1="+document.getElementById("txtAdd1").value
	url=url+"&add2="+document.getElementById("txtAdd2").value
	url=url+"&add3="+document.getElementById("txtAdd3").value
	url=url+"&city="+document.getElementById("txtCity").value	
	url=url+"&country="+document.getElementById("txtCountry").value
	url=url+"&sid="+Math.random()
	//alert(url)
	xmlHttp.onreadystatechange=stateChanged 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)

}
function updateProfile()
{
	if(document.getElementById("txtFirstName").value=="")
	{
		alert("you should enter the firstname")
		document.frmProfile.txtFirstName.select()
		return
	}
	if(document.getElementById("txtEmail").value=="")
	{
		alert("you should enter the email")
		document.frmProfile.txtEmail.select()
		return
		
	}
	if(checkmail(document.getElementById("txtEmail").value)==false)
	{
		alert("Please Enter valid email")
		document.frmProfile.txtEmail.select()
		return
	}
	//alert(isNaN(txtExperience.value))
	if(isNaN(document.getElementById("txtExp").value)==true)
	{
		alert("Over All Experience should be a number")
		document.frmProfile.txtExp.select()
		return
	}
	if(isNaN(document.getElementById("txtCurrentExpOrg").value)==true)
	{
		alert("Experience in current Organization should be a number")
		document.frmProfile.txtCurrentExpOrg.select()
		return
	}
	if(isNaN(document.getElementById("txtCurrentExpPos").value)==true)
	{
		alert("Experience in current Position should be a number")
		document.frmProfile.txtCurrentExpPos.select()
		return
	}
	//document.getElementById("w").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 	
	
	//document.getElementById("w1").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 	 
	
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }	
	var url="updateprofile.php"
	url=url+"?fname="+document.getElementById("txtFirstName").value
	url=url+"&lname="+document.getElementById("txtLastName").value
	url=url+"&dofb="+document.getElementById("cmbYear").value+"-"+document.getElementById("cmbMonth").value+"-"+document.getElementById("cmbMonth").value
	if(document.getElementById("optGender").checked==true)
	{
		url=url+"&gender=Male"
	}
	else
	{
		url=url+"&gender=Female"
	}
	url=url+"&religion="+document.getElementById("txtReligion").value
	url=url+"&maritalstatus="+document.getElementById("txtMaritalStatus").value
	url=url+"&area="+document.getElementById("txtArea").value	
	url=url+"&quali="+document.getElementById("txtQuali").value
	url=url+"&desig="+document.getElementById("txtDesignation").value
	url=url+"&discipline="+document.getElementById("txtDiscipline").value
	url=url+"&company="+document.getElementById("txtCompany").value
	url=url+"&sector="+document.getElementById("txtSector").value
	url=url+"&experience="+document.getElementById("txtExp").value
	url=url+"&expcurrentorg="+document.getElementById("txtCurrentExpOrg").value
	url=url+"&expcurrentpos="+document.getElementById("txtCurrentExpPos").value
	url=url+"&email="+document.getElementById("txtEmail").value
	url=url+"&cellphone="+document.getElementById("txtCellPhone").value
	url=url+"&homephone="+document.getElementById("txtHomePhone").value
	url=url+"&add1="+document.getElementById("txtAdd1").value
	url=url+"&add2="+document.getElementById("txtAdd2").value
	url=url+"&add3="+document.getElementById("txtAdd3").value
	url=url+"&city="+document.getElementById("txtCity").value	
	url=url+"&country="+document.getElementById("txtCountry").value
	url=url+"&sid="+Math.random()
	//alert(url)
	xmlHttp.onreadystatechange=updated 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)

}
function stateChanged()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		alert(xmlHttp.responseText);
		//document.getElementById("main").innerHTML=xmlHttp.responseText
		display(page)
	}
}
function updated()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		//document.getElementById("w").innerHTML=""
		//document.getElementById("w1").innerHTML=""
		alert(xmlHttp.responseText);
		//document.getElementById("main").innerHTML=xmlHttp.responseText
		document.frmProfile.reset()
		document.frmProfile.txtFirstName.select()
	}
}
function BrowsePhoto(id) 
{ 	
	
	if (isNaN(id))
	{
		alert("Please Upload your profile before updating the photo")
		//bypass('general','new')
		//return false
	}
	else
	{
	old=document.getElementById("loc").innerHTML
	document.getElementById("loc").innerHTML="<form action='upload_file.php?type=photo' method='POST'  enctype='multipart/form-data' 	 id='frmupload' onsubmit='uploaded()' name='frmupload'><table border=0 height=65 width=500 ><tr><td valign=middle align=center width=100% background='images/bgloc.gif' ><input type='file'   name='file' size=35 id='file' >&nbsp;<input type='submit' value='Upload' class='button' ))><input type=button value='X' class='button'onclick=closephoto(old,'loc')></td></tr></table><iframe id='upload_target' name='upload_target' src='' style='width:0;height:0;border:0px solid #fff;' onload='showphoto()'></iframe></form>" 
	}
} 
function changePwd() 
{ 	
	old1=document.getElementById("pwd").innerHTML
	document.getElementById("pwd").innerHTML="<div id=img align=right><br><input type=image src=images/close.png onclick=closephoto(old1,'pwd')>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><font face=verdana size=2>&nbsp;&nbsp;&nbsp;Current Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type='password'   name='txtCurrentPwd' size=40 id='txtCurrentPwd' class=txtbox>&nbsp;&nbsp;&nbsp;<br><br>&nbsp;&nbsp;&nbsp;New Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type='password'   name='txtPassword' size=40 id='txtPassword' class=txtbox><br><br>&nbsp;&nbsp;&nbsp;Confirm Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type='password'   name='txtRePassword' size=35 id='txtRePassword' class=txtbox>&nbsp;&nbsp;<input type=button value='Change' class='button' onclick=changepwd() class=buttton></font>" 
	document.getElementById("pwd").style.visibility="visible"
} 
function closephoto(cmd,type1)
{
	//alert(type)
	document.getElementById(type1).innerHTML=cmd
	document.getElementById(type1).style.visibility="hidden"
}
function uploaded()
{
	document.getElementById("wait").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>"
	document.frmupload.target='upload_target'

}
function showphoto()
{
	if(document.getElementById("file").value!="")
	{
		document.getElementById("wait").innerHTML=""
		window.location.reload()
	}
}
function removeimage()
{
	//alert("here")
	document.getElementById("wait").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>"
	
	url="removefile.php"
	url=url+"?type=photo"
	//url=url+"&path="+path
	//url=url+"&imgid="+imgid
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=remove
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function remove()
{

	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		document.getElementById("wait").innerHTML=""
		//	alert(xmlHttp.responseText)
		if(xmlHttp.responseText =="success")
		{
			window.location.reload()
		}
		else
		{
			alert("Sorry,now your request couldn't be completed please try later")
		}
	 }
}
function changepwd()
{
	if(document.getElementById("txtPassword").value=="")
	{
		alert("Password shouldn't be blank")
		return false
	}
	if(document.getElementById("txtCurrentPwd").value=="")
	{
		alert("Current Password shouldn't be blank")
		return false
	}
	if(document.getElementById("txtPassword").value!=document.getElementById("txtRePassword")
	.value)
	{
		alert("You have Re Entered a different password")
		return false
	}
	document.getElementById("wait").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>"
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
	var url="updatepassword.php"
	url=url+"?currentpwd="+document.getElementById("txtCurrentPwd").value
	url=url+"&newpwd="+document.getElementById("txtPassword").value
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=password
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function password() 
{ 	
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		document.getElementById("wait").innerHTML=""
		alert(xmlHttp.responseText);
		if(xmlHttp.responseText.substr(0,1)=="Y")
		{
			document.location="first.php"
			//document.getElementById("pwd").innerHTML=old1
		}
		//window.location.reload()
		//document.frmprofile.reset()	
	 }
} 

/*
fucntion show()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 		
		document.getElementById(disptype).innerHTML=xmlHttp.responseText	
	 }
}*/
function checkmail(src) 
{
  var regex =/^[a-zA-Z0-9._-]+@([a-zA-Z0-9.-]+\.)+[a-zA-Z0-9.-]{2,4}$/;
  return regex.test(src);
}
function updatePreferanceUser()
{
	
	document.getElementById("wait").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
	
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
	//alert(document.getElementById("chkTraining").checked)
	
	var url="updatePreferenceUser.php"
	url=url+"?worknature="+document.getElementById("txtWorkNature").value
	url=url+"&training="+document.getElementById("chkTraining").checked
	url=url+"&field="+document.getElementById("chkField").checked
	url=url+"&preference="+document.getElementById("chkPreference").checked
	url=url+"&sid="+Math.random()
	//alert(url)
	xmlHttp.onreadystatechange=stateChanged 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)

}
function updatePreferenceMD()
{
	
	document.getElementById("wait").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
	
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
	
	
	var url="updatePreferenceMD.php"
	url=url+"?behavioral="+document.getElementById("txtBehavioral").value
	url=url+"&skill="+document.getElementById("txtSkill").value
	url=url+"&sid="+Math.random()
	//alert(url)
	xmlHttp.onreadystatechange=stateChanged 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)

}
function dispmonthlyReport()
{	
	

	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
	if(document.getElementById("cmbMonth").value==0)
	{
		return
	}
	if(document.getElementById("cmbYear").value==0)
	{
		return
	}
		document.getElementById("w").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>"
	var url="monthlyreportdetails.php"
	url=url+"?company="+document.getElementById("cmbCompany").value
	url=url+"&month="+document.getElementById("cmbMonth").value
	url=url+"&year="+document.getElementById("cmbYear").value
	url=url+"&sid="+Math.random()
	//alert(url)
	xmlHttp.onreadystatechange=reportdisplayed 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)

}
function reportdisplayed()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 	
		document.getElementById("w").innerHTML=""
		document.getElementById("disp").innerHTML=xmlHttp.responseText
	
	}
	
}
function listReport()
{
	xmlHttp=GetXmlHttpObject()
	var typ
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }	
	var url="listReportDetails.php"	
	url=url+"?company="+document.getElementById("cmbCompany").value
	url=url+"&finyear="+document.getElementById("cmbYear").value
	url=url+"&month="+document.getElementById("cmbMonth").value
	url=url+"&status="+document.getElementById("cmbStatus").value
	url=url+"&sid="+Math.random()	
	xmlHttp.onreadystatechange=ReportListed 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null) 
}
function ReportListed()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
		document.getElementById("listRpt").innerHTML=xmlHttp.responseText
		
		
	}
}
function verifyReport(id)
{
	xmlHttp=GetXmlHttpObject()
	var typ
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }	
	var url="updateReportStatus.php"	
	url=url+"?id="+id
	url=url+"&status="+document.getElementById("cmbStatus").value
	url=url+"&sid="+Math.random()	
	xmlHttp.onreadystatechange=updateStatus 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null) 
}
function updateStatus()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
		alert(xmlHttp.responseText)	
		//document.getElementById("result").innerHTML=xmlHttp.responseText	
		window.location.reload()
		//dispmain('monthlyreport')
	}
}
/////////////////////////////////////////

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