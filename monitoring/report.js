function ManuFactReview()
{ 
	//alert("ddd")
	if(document.getElementById("cmbMonth").value==0)
	{
		alert("you should select a month")
		return
	}
	if(document.getElementById("cmbYear").value==0)
	{
		alert("you should select a year")
		return
	}	
	var yr=document.getElementById("cmbYear").value
	var mth=document.getElementById("cmbMonth").value
	//window.location="manuFactReviewReport.php?year="+yr+"&mth="+mth
	window.open("manuFactReviewReport.php?year="+yr+"&mth="+mth,'','resizable=yes,width=1024,height=600')
	//window.open('http://riab-ksidc.webexone.com/login.asp?');
}
function secondvariable(lnk)
{ 
	/*
	if(document.getElementById("cmbFMonth").value==0)
	{
		alert("you should select From date")
		return
	}
	if(document.getElementById("cmbFYear").value==0)
	{
		alert("you should select From date")
		return
	}
	*/
	//alert(lnk)
	if(document.getElementById("cmbTMonth").value==0)
	{
		alert("you should select To date")
		return
	}
	if(document.getElementById("cmbTYear").value==0)
	{
		alert("you should select To date")
		return
	}
	//var fyr=document.getElementById("cmbFYear").value
	//var fmth=document.getElementById("cmbFMonth").value
	var tyr=document.getElementById("cmbTYear").value
	var tmth=document.getElementById("cmbTMonth").value
	//window.location=lnk+"?tyear="+tyr+"&tmth="+tmth
	window.open(lnk+"?tyear="+tyr+"&tmth="+tmth,'','resizable=yes,width=1024,height=600')
}
function budgetMaster(lnk)
{
	var cmp=document.getElementById("cmbCompany").value
	//window.location=lnk+"?tyear="+tyr+"&tmth="+tmth
	window.open(lnk+"?company_id="+cmp)
}
function permission(id)
{
	if(confirm("Are you sure to give permission for modification")==true)
	{
		document.getElementById("pwd").innerHTML="<br> <font color=white face=verdana size=2>&nbsp;&nbsp;<b>type the password and press enter</font>&nbsp;&nbsp;&nbsp;<input type=password id=txtpwd name=txtpwd class=txtbox size=30 onkeydown=press(event,this.value,"+id+")>"
		document.getElementById("pwd").style.visibility="visible"	
		//alert(id)
	}
}
function press(e,txt,id)
{

	
	if(e.keyCode==13)
	{
	
			//alert(e.keyCode)
			log1(txt,id)
		
	}
	else if(e.which==13)
	{
		
			//alert(txt)
			log1(txt,id)
		
	}			
	
}

function log1(txt,id)
{


xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }


var url="ReModifyReport.php"

url=url+"?pwd="+txt
url=url+"&rptid="+id
url=url+"&sid="+Math.random()
//alert(url)
xmlHttp.onreadystatechange=Remodified 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)

}
function Remodified()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
		//alert(xmlHttp.responseText)	
		window.location.reload()
		
	}
}
////////////////////////////////////////////////////////////////////
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