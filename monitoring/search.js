var xmlHttp
var type1
var cltype1
var fval1
var lval1
var curval1
var order
var fldno=0
var disptype
var str=""
var bl=""
var pg
var no
var totwidth=0
var logtype
var mnu
var mainpage

/// *************** function for display the sub search category ***************
function navigate(ss)
{
	//alert (ss)
}


function getState(type,cltype,fval,lval,curval)
{ 
	//alert(type);
	//alert(lval);
	//alert(curval);
	if (type!="search category")
 	{
		document.getElementById("w").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>"
	
document.getElementById("w1").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 			  		
		
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }		
		var url="search.php"
		url=url+"?stype="+type
		url=url+"&cltype="+cltype
		url=url+"&fval="+fval
		url=url+"&lval="+lval
		url=url+"&curval="+curval
		url=url+"&orderby="+order		
		url=url+"&keyword="+document.getElementById("txtKeyword").value	
		url=url+"&quali="+document.getElementById("cmbQualification").value.replace("&","|")
		//alert(document.getElementById("cmbQualification").value)
		url=url+"&desig="+document.getElementById("cmbDesignation").value.replace("&","|")
		//alert(logtype)
		if(logtype=="AD")
		{
			url=url+"&company="+document.getElementById("cmbCompany").value.replace("&","|")
			url=url+"&city="+document.getElementById("cmbCity").value
		}
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=searchStateChanged 
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null) 
	}
}
function searchStateChanged() 
{ 
	//alert("ddf")
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
	document.getElementById("w").innerHTML=""
	document.getElementById("w1").innerHTML=""
	//alert(xmlHttp.responseText)
	 document.getElementById("listmembers").innerHTML=xmlHttp.responseText 
	 
	 } 
}
function swap()
{
		document.getElementById("img").src="imghome/button1.gif"	
	
}
function swap1()
{
		document.getElementById("img").src="imghome/button.gif"	
	
}
function moreNews(id)
{
	//var zwindow;
	//zwindow=window.open("viewnews.php?id="+id+"","newwin")
	//zwindow.document.open();
	window.open("viewnews.php?id="+id+"","welcome",'width=600,height=350,left=150,top=50,toolbar=0,location=0,scrollbars=0')
}
function subsearch(type,cltype,fval,lval,curval,orderby,lgtype,page)
{ 
	//alert(type)
	dispmain(page)
	/*
	document.getElementById("w").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>"
	
document.getElementById("w1").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" */
	type1=type
	cltype1=cltype
	fval=fval1
	lval=lval1
	curval=curval1
	order=orderby
	logtype=lgtype
	
	/*
	type1=type
	cltype1=cltype
	fval=fval1
	lval=lval1
	curval=curval1
	order=orderby
	
	if (type!="search category")
 	{
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		switch(type)
		{
			case "name": 
						var url="filter.php"
						break
			case "sname" :
						var url="listmembers.php"
						break
		
		}
		
		
		url=url+"?sid="+Math.random()
		xmlHttp.onreadystatechange=subsearchChanged 
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null) 
	}*/
}
function subsearchChanged() 
{ 
	alert("dd")
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
	 
	 document.getElementById("search").innerHTML=xmlHttp.responseText 
	 disp('','')
	 
	 } 
}
function searchStudent(type)
{ 
		//alert("here")
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		
		var url="search.php"
		url=url+"?stype="+type
		url=url+"&keyword="+document.getElementById("txtKeyword").value
		url=url+"&city="+document.getElementById("cmbcity").value
		url=url+"&school="+document.getElementById("cmbschool").value
		url=url+"&view=1"
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=searchStateChanged 
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null) 

}
function AddCourse(grid)
{
	document.getElementById("addcourse").innerHTML=""
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
	
	var url="addcourse.php"
	url=url+"?grid="+grid
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=courseadded 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null) 
}
function courseadded()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
	
	 document.getElementById("addcourse").innerHTML=xmlHttp.responseText 
	 
	 } 
}
function disp(fil,type)
{
	
	
	//alert("here")
	disptype=type
	xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		
	url="listquali.php"
	url=url+"?fil="+fil
	//url=url+"&path="+path
	//url=url+"&imgid="+imgid
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=show
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function show()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		//alert(document.getElementById("quali").innerHTML)
	
		document.getElementById("quali").innerHTML=xmlHttp.responseText;
	
		dispDesig("","desig")
		//document.getElementById("quali").style.display=""
	}
}
function dispDesig(fil,type)
{
	
	
	//alert("here")
	disptype=type
	xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		
	url="listdesig.php"
	url=url+"?fil="+fil
	//url=url+"&path="+path
	//url=url+"&imgid="+imgid
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=showDesig
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function showDesig()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		//alert(document.getElementById("quali").innerHTML)
		//alert(xmlHttp.responseText)
		document.getElementById("desig").innerHTML=xmlHttp.responseText 
		dispCompany("","company")
		//document.getElementById("quali").style.display=""
	}
}
function dispCompany(fil,type)
{
	
	//alert("here")
	disptype=type
	xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		
	url="listcompany.php"
	url=url+"?fil="+fil
	//url=url+"&path="+path
	//url=url+"&imgid="+imgid
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=showCompany
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function showCompany()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		//alert(document.getElementById("quali").innerHTML)
		//alert(xmlHttp.responseText)
		document.getElementById("company").innerHTML=xmlHttp.responseText 
		dispCity("","city")
		//document.getElementById("quali").style.display=""
	}
}
function dispCity(fil,type)
{
	//alert("here")
	disptype=type
	xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		
	url="listcity.php"
	url=url+"?fil="+fil
	//url=url+"&path="+path
	//url=url+"&imgid="+imgid
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=showCity
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function showCity()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		//alert(document.getElementById("quali").innerHTML)
		//alert(xmlHttp.responseText)
		document.getElementById("city").innerHTML=xmlHttp.responseText 
		getState(type1,cltype1,fval1,lval1,curval1)
		//document.getElementById("quali").style.display=""
	}
}
function showReport()
{
	xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		
	url="report.php"
	//alert('dfd')
	//url=url+"&path="+path
	//url=url+"&imgid="+imgid
	url=url+"?sid="+Math.random()
	xmlHttp.onreadystatechange=dispReport
	xmlHttp.open("GET",url,true)
	//alert(url)
	xmlHttp.send(null)
}
function dispReport()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
		//alert(xmlHttp.responseText )	
		document.getElementById("reports").innerHTML=xmlHttp.responseText 	
		document.getElementById("reports").style.visibility="visible"
	}
}
function addField(val)
{	 
	 var pos=val.indexOf(":")
	 var fldname=val.substr(0,pos)
	 var fldwidth=val.substr(pos+1)
	 totwidth=totwidth+Number(fldwidth)
	 //alert(totwidth)
	 if(totwidth>200)
	 {
		alert("you can't add more fields")
		return
	}
	no=fldno+1
	//alert(val.substr(pos+1))
	
		str="<tr><td valign=top  width='300'><input type=text class=txtbox id=lbl"+fldno+" value='"+fldname+"' readonly size=40><input type=hidden id=lblw"+fldno+" value="+fldwidth+"></td><td width='100'>                    <a href=JavaScript:removeField("+fldno+")><img src='images/delete1.png' alt='remove' border=0> </a></td></tr>"
		
	document.getElementById("fl"+fldno).innerHTML=str
	//bl=bl+document.getElementById("bl"+fldno).innerHTML
	document.getElementById("bl"+fldno).innerHTML="<div id=fl"+no+" ></div><div id=bl"+no+" ></div>"
	fldno=fldno+1

}

function removeField(no){
	document.getElementById("fl"+no).innerHTML=""
}
function clear(no){
	document.getElementById(no).style.visibility="hidden"
}
function createReport()
{
	
	xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }	
		 if(document.getElementById("txtName").value=="")
	{
		alert("plz provide a name for report template")
		return
	}	
	url="updatereport.php"
	
	url=url+"?fld0="+document.getElementById("lbl0").value
	url=url+"&fldw0="+document.getElementById("lblw0").value
	for(i=1;i<=no-1;i++)
	{
		ss="lbl"+i
		dd="lblw"+i
		url=url+"&fld"+i+"="+document.getElementById(ss).value
		url=url+"&fldw"+i+"="+document.getElementById(dd).value
		//alert(url)
	}
	var tot=no-1
	url=url+"&tot="+tot
	url=url+"&rptname="+document.getElementById("txtName").value
	url=url+"&sid="+Math.random()
	//alert(url)
	xmlHttp.onreadystatechange=ReportCreated
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function ReportCreated()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
		alert(xmlHttp.responseText)	
		//window.open("showreport.php?rpt_id="+xmlHttp.responseText)
		printReport(xmlHttp.responseText)
		//document.getElementById("report").innerHTML=xmlHttp.responseText 	
		//document.getElementById("report").style.visibility="visible"
	}
}
function printReport(rptid)
{
	//alert(rptid)
	if(rptid!="" && rptid!=0)
	{
	//window.open("showreport.php?rpt_id="+rptid)
		window.location="showreport.php?rpt_id="+rptid
	}
	else
	{
		alert("please select a template")
	}
	/*
	xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		
	url="showreport.php"
	//alert('dfd')
	//url=url+"&path="+path
	//url=url+"&imgid="+imgid
	url=url+"?sid="+Math.random()
	xmlHttp.onreadystatechange=dispReport
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
	*/
}
function deleteaccount(id)
{
	//alert(id)
	if(confirm("Are you sure to delete this account")==true)
	{
		 
	
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }	
	
	var url="deleteaccount.php"
	url=url+"?acid="+id
	url=url+"&sid="+Math.random()
	//alert(url)
	xmlHttp.onreadystatechange=accountdeleted 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
	}
}
function accountdeleted()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
		alert(xmlHttp.responseText)	
		//window.open("showreport.php?rpt_id="+xmlHttp.responseText)
		window.location.reload()
		//document.getElementById("report").innerHTML=xmlHttp.responseText 	
		//document.getElementById("report").style.visibility="visible"
	}
}
function disp1(str)
{		
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }	
	 document.getElementById("w").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>"
	
document.getElementById("w1").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
	switch(str)
	{
		case "Create Password":
								var url="createpassword.php"
								break
		case "Send Password":
								var url="sendemail.php"
								break
		case "sendcompassword":
								var url="sendcompassword.php"
								break
	}
	
	
	url=url+"?sid="+Math.random()
	//alert(url)
	xmlHttp.onreadystatechange=res 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
	
}
function res()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
		document.getElementById("w").innerHTML=""	
		document.getElementById("w1").innerHTML="" 
		alert(xmlHttp.responseText)	
		
	}
}
function menu(mnuname,divname)
{
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }	
	 mnu=divname
	switch(mnuname)
	{
		case "master":
						var url="mnumaster.htm"
						document.getElementById("report").style.visibility="hidden"
						document.getElementById("actions").style.visibility="hidden"
						break
		case "report":
						var url="mnureport.htm"
						document.getElementById("master").style.visibility="hidden"
						document.getElementById("actions").style.visibility="hidden"
						break
		case "actions":
						var url="mnuactions.php"
						document.getElementById("master").style.visibility="hidden"
						document.getElementById("report").style.visibility="hidden"
						break
		case "masterco":
						var url="mnumasterco.htm"
						document.getElementById("report").style.visibility="hidden"
						document.getElementById("actions").style.visibility="hidden"
						break
		case "actionsco":
						var url="mnuactionsco.htm"
						document.getElementById("report").style.visibility="hidden"
						document.getElementById("actions").style.visibility="hidden"
						break
		case "reportco":
						var url="mnureportco.htm"
						document.getElementById("report").style.visibility="hidden"
						document.getElementById("actions").style.visibility="hidden"
						break
						
	}
	
	
	url=url+"?sid="+Math.random()
	//alert(url)
	xmlHttp.onreadystatechange=dispmenu 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function dispmenu()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
		//alert(xmlHttp.responseText)
		//document.getElementById(mnu).style.left=268
		document.getElementById(mnu).innerHTML=xmlHttp.responseText	
		document.getElementById(mnu).style.visibility="visible"		
		
	}
}
function hidemenu()
{
	document.getElementById("master").style.visibility="hidden"
	document.getElementById("report").style.visibility="hidden"
	document.getElementById("actions").style.visibility="hidden"
}
function dispmain(str)
{
	//alert(str)
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }	
	 mainpage=str
	 document.getElementById("w").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>"
	
document.getElementById("w1").innerHTML="<embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
	switch(str)
	{
		case "companymaster":
						var url="companymaster.php"						
						break
		case "finyear":
						var url="finyear.php"
						break
		// REPORTS ////////////////////////
		case "monthlyreport":
						var url="listmonthlyreport.php"
						break
		case "fvariablelist":
						var url="rptManufactReview.php"
						break
		case "svariablelist":
						var url="rptSecondVariableList.php"
						break
		case "lossinc":
						var url="rptlossincunit.php"
						break
		case "profitmaking":
						var url="rptprofitmaking.php"
						break
		case "increloss":
						var url="rptincreloss.php"
						break
		case "increprofit":
						var url="rptincreprofit.php"
						break
		case "pf":
						var url="rptpf.php"
						break
		case "excel":
						var url="rptexcel.php"
						break
		///////////// ACTIONS 
		
		case "createcomaccount":
						var url="createaccount.php"
						break	
		case "listcomaccounts":
						var url="listaccount.php"
						break
		case "listcomaccounts":
						var url="listaccount.php"
						break
		case "listemployees":
						var url="dispallemployees.php"
						break
		////////////// COMPANY MASTER //////////////////
		case "productmaster":
						var url="productmaster.php"
						break
		case "capacitymaster":
						var url="capacitymaster.php"
						break
		case "turnovermaster":
						var url="turnover.php"
						break
		case "addemployee":
						var url="addprofile.php"
						break
		case "createmsaccount":
						var url="createsupaccount.php"
						break
		case "listsupaccount":
						var url="listofficeaccounts.php"
						break
		case "createbill":
						var url="createbill.php"
						break
		case "listbill":
						var url="listbills.php"
						break
		case "changecopwd":
						var url="change_co_pwd.php"
						break
		case "editcompany":
						var url="editcompanymaster.php"
						break
		case "actbudget":
						//alert("dsd")
						var url="actualbudget.php"
						break
		case "revbudget":
						var url="revbudget.php"
						break
		case "createhraccount":
						var url="createhraccount.php"
						break
		case "listhraccount":
						var url="listhraccounts.php"
						break
		case "console3":
						var url="rptconsole1.php"
						break
		case "overall":
						var url="rptoverall.php"
						break
		case "links":
						var url="links.php"
						break
		case "blogs":
						var url="blogs.php"
						break
		case "addblog":
						var url="addblog.php"
						break
		case "listblog":
						var url="listblog.php"
						break
		case "viewblog":
						var url="viewotherblogs.php"
						break
		case "budget":
						var url="rptbudget.php"
						break
		case "report1":
						window.open("report1.pdf")
						return
		case "report2":
						window.open("report2.pdf")
						return
		case "report3":
						window.open("report3.pdf")
						return
		case "report4":
						window.open("report4.pdf")
						return
		case "changepwd":
						var url="change_co_pwd.php"
						break
		case "viewfeedback":
						//alert("here")
						var url="viewfeedback.php"
						break;	
	}
	
	
	
	url=url+"?sid="+Math.random()
	//alert(url)
	xmlHttp.onreadystatechange=maindisplayed 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function maindisplayed()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	console.log(xmlHttp.readyState);
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
function sendBill()
{
	//alert("here")
	disptype=type
	xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		
	url="generatebill.php"
	url=url+"?month="+document.getElementById("cmbMonth").value
	url=url+"&year="+document.getElementById("cmbYear").value
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=BillSend
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function BillSend()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
		alert(xmlHttp.responseText)
		//document.getElementById("main").innerHTML=xmlHttp.responseText
		window.location.reload()		
	}
}
function updateCoPwd()
{
	//alert("here")
	disptype=type
	xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		
	url="company_pwd_changed.php"
	url=url+"?currentpwd="+document.getElementById("txtCurrentPwd").value
	url=url+"&newpwd="+document.getElementById("txtNewPwd").value
	url=url+"&repwd="+document.getElementById("txtRePwd").value
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=pwdChanged
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function pwdChanged()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
		alert(xmlHttp.responseText)
		//document.getElementById("main").innerHTML=xmlHttp.responseText
		//window.location.reload()		
	}
}
function dispProduct()
{
	//alert("here")
	disptype=type
	xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		
	url="editproduct.php"
	url=url+"?finyear="+document.getElementById("cmbFinYear").value	
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=productDisplayed
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function productDisplayed()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
		//alert(xmlHttp.responseText)
		document.getElementById("pro").innerHTML=xmlHttp.responseText
		//window.location.reload()		
	}
}

function dispbudget(type)
{	
	//alert(type)
	var url
	xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
	if(type=="actual")
	{	
		//alert(url)
		url="editbudget.php"
		url=url+"?company="+document.getElementById("cmbCompany").value
	}
	else
	{	
		
		url="editrevbudget.php"		
		url=url+"?company="+document.getElementById("cmbCompany").value		
		url=url+"&finyear="+document.getElementById("cmbFinYear").value
		
	}
	
	url=url+"&sid="+Math.random()
	//alert(url)
	xmlHttp.onreadystatechange=budgetDisplayed
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function dispbudget1(type)
{	
	//alert(type)
	var url
	document.getElementById("budgetdetails").innerHTML=""
	xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
	if(type=="actual")
	{	
		//alert(url)
		url="listbudget.php"
		url=url+"?company="+document.getElementById("cmbCompany").value
	}
	else
	{	
		
		url="listbudget.php"		
		url=url+"?company="+document.getElementById("cmbCompany").value		
		//url=url+"&finyear="+document.getElementById("cmbFinYear").value
		
	}
	
	url=url+"&sid="+Math.random()
	//alert(url)
	xmlHttp.onreadystatechange=budgetDisplayed
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}

function budgetDisplayed()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
		//alert(xmlHttp.responseText)
		document.getElementById("budget").innerHTML=xmlHttp.responseText
		//window.location.reload()		
	}
}
function budDetails(id)
{	
	//alert(type)
	var url
	xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }

		
		url="budgetdetails.php"		
		url=url+"?id="+id		
		//url=url+"&finyear="+document.getElementById("cmbFinYear").value
		
	
	
	url=url+"&sid="+Math.random()
	//alert(url)
	xmlHttp.onreadystatechange=detailsDisplayed
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}

function detailsDisplayed()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
		//alert(xmlHttp.responseText)
		document.getElementById("budgetdetails").innerHTML=xmlHttp.responseText
		//window.location.reload()		
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