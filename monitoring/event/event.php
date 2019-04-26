<?
session_start();
if($allow_script)
{
header("Content-type: text/javascript");
?>
<script language="JavaScript">
var xmlHttp
var type1
var cltype1
var fval1
var lval1
var altype=1
var evtype=1
var statype=1
var tvtype=1
var comtype=1
var vwcomtype=1
var relvid=1
var morevid=1
var curval1
var order
var id
var ind=0
var arr =new Array()


function getState(type,cltype,fval,lval,curval)
{ 
	//alert(fval);
	//alert(lval);
	//alert(curval);
	if (type!="search category")
 	{
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		
		var url="setsessions.php"
		url=url+"?stype="+type
		url=url+"&cltype="+cltype
		url=url+"&fval="+fval
		url=url+"&lval="+lval
		url=url+"&curval="+curval
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=stateChanged 
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null) 
	}
}
function getStateRb(type,cltype,fval,lval,curval)
{ 
	//alert(fval);
	//alert(lval);
	//alert(curval);
	if (type!="search category")
 	{
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		
		var url="setsessions.php"
		url=url+"?stype="+type
		url=url+"&cltype="+cltype
		url=url+"&fval="+fval
		url=url+"&lval="+lval
		url=url+"&curval="+curval
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=stateChangedRb 
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null) 
	}
}
function filt(type,val)
{ 
	//showvideo("","list")
	//alert(lval);
	//alert(curval);
	//alert(val)
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		
		var url="main.php"
		url=url+"?type="+type
		url=url+"&val="+val
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=showlist 
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null) 
	
}
function press(e,txt)
{
	//alert (txt)
	switch(txt)
	{
		case "search":
			if(window.event==13)
			{
			
					filt("cap",document.getElementById("txtSearch").value)
				
			}
			else if(e.which==13)
			{
				
					filt("cap",document.getElementById("txtSearch").value)
				
			}
			break;
			
	}
}
function mail1(e,mes)
{
	//alert(mes)
	if(window.event==13)
			{			
					sendmail(document.getElementById("txtemail").value,mes)
				
			}
			else if(e.which==13)
			{
					//alert(mes)
					sendmail(document.getElementById("txtemail").value,mes)
				
			}
}
function stateChanged()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		showvideo("","list")
	 } 
}
function stateChangedRb()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		showvideo("","listRb")
	 } 
}
function afterfilt()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		
	 } 
}
function list()
{
	window.location.reload()
}
function showlist() 
{ 
	//alert(xmlHttp.readyState)
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		//alert(xmlHttp.responseText)
		//alert("dd")
	 document.getElementById("disp").innerHTML=xmlHttp.responseText 
	 showvideo("","list")
	 } 
}
function showvideo(path,page)
{
	//alert (path)

	xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		switch(page)
		{
			case "video":
				var url="showvideo.php"
				url=url+"?path="+path
				url=url+"&sid="+Math.random()
				xmlHttp.onreadystatechange=videodisplayed 
				break;
			case "list":
				var url="displist.php"
				url=url+"?path="+path
				url=url+"&sid="+Math.random()
				xmlHttp.onreadystatechange=searchStateChanged 
				break;
			case "listRb":
				var url="displistRb.php"
				url=url+"?path="+path
				url=url+"&sid="+Math.random()
				xmlHttp.onreadystatechange=searchStateChanged 
				break;
		}		
		
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null) 
}
function saveNews()
{
	//alert(document.frmnews.txtHeading.value)
	if(document.frmnews.txtHeading.value=="")
	{
		alert("plz enter the news heading")
		document.frmnews.txtHeading.select()
		return false
	}
	if(document.frmnews.txtFName.value=="")
	{
		alert("plz enter the file name")
		document.frmnews.txtFName.select()
		return false
	}
	check=1
	document.frmnews.target='upload_target_album'

}
function newsSaved()
{
	//
	//
	//alert(document.getElementById("file").value)
	//alert(check)
	if(check==1)
	{
		alert ("your request Successfully updated")
		check=0
		document.frmnews.reset()
		//display("Add Events")
	}
}
function searchStateChanged() 
{ 
	//alert(xmlHttp.readyState)
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		//alert(xmlHttp.responseText)
		//alert("dd")
	 document.getElementById("list").innerHTML=xmlHttp.responseText 
	 } 
}
function videodisplayed() 
{ 
	//alert(xmlHttp.readyState)
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		//alert(xmlHttp.responseText)
		//alert("dd")
	 document.getElementById("disp").innerHTML=xmlHttp.responseText 
	 } 
}
function showmain(type)
{
	//alert(type)
	switch(type)
		{
			case "events":
							url="eventhome.php"
							break
		
		}
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
	url=url+"?stype="+type
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=mainshow
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function mainshow() 
{ 	
	
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		document.getElementById("main").innerHTML=xmlHttp.responseText 
		//alert(page)
	    //display(page)
	 }
}
function predisp(str)
{
	display(str.substr(13,str.length-17))
}
function link(no,type)
{
	id=no
	display(type)
}
function display(command)
{
		//alert(command)
		page=command
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		switch(command)
		{
			case "Add Events":
							url="addevent.php"
							url=url+"?stype="+command
							url=url+"&sid="+Math.random()
							//alert(url)
							xmlHttp.onreadystatechange=liststudent
							xmlHttp.open("GET",url,true)
							xmlHttp.send(null)
							break
			case "View Events":
							url="viewevent.php"
							url=url+"?stype="+command
							url=url+"&sid="+Math.random()
							//alert(url)
							xmlHttp.onreadystatechange=liststudent
							xmlHttp.open("GET",url,true)
							xmlHttp.send(null)
							break;
			case "List Events":
							url="listevent.php"
							url=url+"?stype="+command
							url=url+"&fDay="+document.getElementById("cmbFDay").value
							url=url+"&fMonth="+document.getElementById("cmbFMonth").value
							url=url+"&fYear="+document.getElementById("cmbFYear").value
							url=url+"&tDay="+document.getElementById("cmbTDay").value
							url=url+"&tMonth="+document.getElementById("cmbTMonth").value
							url=url+"&tYear="+document.getElementById("cmbTYear").value
							url=url+"&all="+document.getElementById("chkall").checked.toString()
							url=url+"&sid="+Math.random()
							//alert(url)
							xmlHttp.onreadystatechange=showevents
							xmlHttp.open("GET",url,true)
							xmlHttp.send(null)
							break;
			case "EditEvent":
							url="editevent.php"
							url=url+"?stype="+command
							url=url+"&id="+id
							url=url+"&sid="+Math.random()
							//alert(url)
							xmlHttp.onreadystatechange=liststudent
							xmlHttp.open("GET",url,true)
							xmlHttp.send(null)
							break;
			case "DeleteEvent":
							//alert("dd")
							url="deleteEvent.php"
							url=url+"?stype="+command
							url=url+"&id="+id
							url=url+"&sid="+Math.random()
							//alert(url)
							xmlHttp.onreadystatechange=liststudent
							xmlHttp.open("GET",url,true)
							xmlHttp.send(null)
							break;
		default:
					return
		}
	
	
	
	
}
function liststudent() 
{ 	
	
	//alert(xmlHttp.readyState)
	
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		//alert(xmlHttp.responseText.length)
		if(xmlHttp.responseText.length==9)	 
	 	{
			alert("Your Details successfully updated")
			window.location.reload()
			//bypass('general','edit')
		}
		else
		{
	 	
			 document.getElementById("sub").innerHTML=xmlHttp.responseText 
			 //alert(xmlHttp.responseText)
			 //window.location.reload()
	 	}
	 	//document.getElementById("display").innerHTML=xmlHttp.responseText 
	 }
} 
function showevents() 
{ 	
		//alert(xmlHttp.readyState)
	
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 	 	
		document.getElementById("show").innerHTML=xmlHttp.responseText 		
	 }
} 
function expand(str)
{
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
	
	switch(str)
	{
		case "albums":
					if (altype==1)
					{
						document.getElementById("al").innerHTML="<img src='images/mvalbums.gif'><input type='image' src='images/arrow1.gif' onclick=expand('albums')>"
					document.getElementById("albums").innerHTML="<table height=310 width=290 border=0><tr><td height=300     width=394 valign=middle align=center background='images/expbg.gif'><iframe src='displistalbums.php' height=230 width=250 scrolling=auto frameborder=0></iframe></td></tr>"
					altype=0
					}
					else
					{
						document.getElementById("al").innerHTML="<img src='images/mvalbums.gif'><input type='image' src='images/arrow.gif' onclick=expand('albums')>"
						document.getElementById("albums").innerHTML=""
						altype=1
					}
		break;
		case "events":
					if (evtype==1)
					{
						document.getElementById("ev").innerHTML="<img src='images/mvevents.gif'><input type='image' src='images/arrow1.gif' onclick=expand('events')>"
					document.getElementById("events").innerHTML="<table height=310 width=290 border=0><tr><td height=300     width=394 valign=middle align=center background='images/expbg.gif'><iframe src='displistevents.php' height=230 width=250 scrolling=auto frameborder=0></iframe></td></tr>"
					evtype=0
					}
					else
					{
						document.getElementById("ev").innerHTML="<img src='images/mvevents.gif'><input type='image' src='images/arrow.gif' onclick=expand('events')>"
						document.getElementById("events").innerHTML=""
						evtype=1
					}
		break;
		case "stage":
					if (statype==1)
					{
						document.getElementById("st").innerHTML="<img src='images/mvstageshow.gif'><input type='image' src='images/arrow1.gif' onclick=expand('stage')>"
					document.getElementById("stage").innerHTML="<table height=245 width=250 border=0><tr><td height=245     width=200 valign=top align=left background='images/expbg.gif'></td></tr>"
					statype=0
					}
					else
					{
						document.getElementById("st").innerHTML="<img src='images/mvstageshow.gif'><input type='image' src='images/arrow.gif' onclick=expand('stage')>"
						document.getElementById("stage").innerHTML=""
						statype=1
					}
		break;
		case "tv":
					if (tvtype==1)
					{
						document.getElementById("tvp").innerHTML="<img src='images/mvtv.gif'><input type='image' src='images/arrow1.gif' onclick=expand('tv')>"
					document.getElementById("tv").innerHTML="<table height=245 width=250 border=0><tr><td height=245     width=200 valign=top align=left background='images/expbg.gif'></td></tr>"
					tvtype=0
					}
					else
					{
						document.getElementById("tvp").innerHTML="<img src='images/mvtv.gif'><input type='image' src='images/arrow.gif' onclick=expand('tv')>"
						document.getElementById("tv").innerHTML=""
						tvtype=1
					}
		case "addcomment":
					if (comtype==1)
					{
					document.getElementById("imgcomment").src="images/arrow1.gif"	
					document.getElementById("AddComment").innerHTML="<table height=100% width=70% border=0><tr><td height=100% width=100% valign=top align=left class=txtleft> name <input type=text name='txtname' id='txtname' class=txtboxblack size=90 maxlength=99></td></tr><tr><td height=100% width=100% valign=top align=left class=txtleft>comment<br><textarea name='txtcomment' id='txtcomment' class=txtboxblack rows=5 cols=90></textarea></td></tr><tr><td height=100% width=100% valign=top align=center ><input type='image' src='images/post.gif' border=0   id='post' onmouseover=swap('images/post1.gif','post') onmouseout=swap1('images/post.gif','post') onclick=save()></td></tr></table>"
					comtype=0
					}
					else
					{
						document.getElementById("imgcomment").src="images/arrow.gif"
						document.getElementById("AddComment").innerHTML=""
						comtype=1
					}
				
		break;
		case "viewcomment":
					if (vwcomtype==1)
					{
					document.getElementById("imgvwcomment").src="images/arrow1.gif"	
						
						var url="viewcomments.php"						
						url=url+"?sid="+Math.random()
						xmlHttp.onreadystatechange=commentdisp 
						xmlHttp.open("GET",url,true)
						xmlHttp.send(null) 
						vwcomtype=0
					}
					else
					{
						document.getElementById("imgvwcomment").src="images/arrow.gif"
						document.getElementById("ViewComment").innerHTML=""
						vwcomtype=1
					}
		break;
		case "relatedvideo":
					
					if (relvid==1)
					{
						
					document.getElementById("imgrelatedvideo").src="images/arrow1.gif"	
						
						var url="relvideos.php"						
						url=url+"?sid="+Math.random()
						xmlHttp.onreadystatechange=reldisp 
						xmlHttp.open("GET",url,true)
						xmlHttp.send(null) 
						relvid=0
					}
					else
					{
						document.getElementById("imgrelatedvideo").src="images/arrow.gif"
						document.getElementById("relatedvideo").innerHTML=""
						relvid=1
					}
		break;
		case "morevideo":
					
					if (morevid==1)
					{
					document.getElementById("imgmorevideo").src="images/arrow1.gif"	
						
						var url="displist1.php"						
						url=url+"?sid="+Math.random()
						xmlHttp.onreadystatechange=moredisp 
						xmlHttp.open("GET",url,true)
						xmlHttp.send(null) 
						morevid=0
					}
					else
					{
						document.getElementById("imgmorevideo").src="images/arrow.gif"
						document.getElementById("morevideo").innerHTML=""
						morevid=1
					}
	}
	
}
function commentdisp() 
{ 	
	
	//alert(xmlHttp.readyState)
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		document.getElementById("ViewComment").innerHTML=xmlHttp.responseText
	}
}
function reldisp() 
{ 	
	
	//alert(xmlHttp.readyState)
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		document.getElementById("relatedvideo").innerHTML="<iframe src='disprel.php' height=250 width=310 frameborder=0 scrollbar=auto>"
	}
}
function moredisp() 
{ 	
	
	//alert(xmlHttp.readyState)
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		document.getElementById("morevideo").innerHTML="<iframe src='displist1.php' height=250 width=300 frameborder=0 scrollbar=auto>"
	}
}
function swap(strpath,strtarget)
{
	//alert(strpath)
	document.getElementById(strtarget).src=strpath
}
function swap1(strpath,strtarget)
{
	
	//alert(strpath)
	document.getElementById(strtarget).src=strpath
}
function save()
{ 
	
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		
		var url="updatecomment.php"
		url=url+"?desc="+document.getElementById("txtcomment").value
		url=url+"&name="+document.getElementById("txtname").value
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=saved 
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null) 
	
}
function saved() 
{ 	
	
	//alert(xmlHttp.readyState)
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		alert(xmlHttp.responseText)
		document.getElementById("txtcomment").value=""
	}
}
function semail()
{
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		 {
		 alert ("Browser does not support HTTP Request")
		 return
		 }
		
		var url="email.php"
		url=url+"?sid="+Math.random()
		xmlHttp.onreadystatechange=aftersend 
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null) 
	
}
function aftersend() 
{ 	
		//alert(xmlHttp.readyState)
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		//alert(xmlHttp.responseText)
		document.getElementById("send").innerHTML=xmlHttp.responseText
	}
}
function sendmail(to,mes)
{
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
	//alert(mes)
	if(to=="")
	{
		alert ("to address shouldn't be blank")
		return false;
	}
	if(checkmail(to)==false)
	{
		alert("please enter a valid email address")
		return false
	}
	
		var url="mailsend.php"
			url=url+"?to="+to
			url=url+"&subject=Video Link from WaveSatLive.com"
			url=url+"&message="+mes
			url=url+"&header=from"
			url=url+"&sid="+Math.random()
			xmlHttp.onreadystatechange=liststudent1
			xmlHttp.open("GET",url,true)
			xmlHttp.send(null)
}
function checkmail(src) 
{
  var regex =/^[a-zA-Z0-9._-]+@([a-zA-Z0-9.-]+\.)+[a-zA-Z0-9.-]{2,4}$/;
  return regex.test(src);
}
function liststudent1() 
{ 	
	
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		//alert(xmlHttp.responseText)
		if(xmlHttp.responseText=="FINISHED")	 
	 	{
			alert("Your request successfully updated")
		}
	}
}
function cleardiv(div)
{
	
	document.getElementById(div).innerHTML=""
}
function assign(id,val)
{
	//alert(id)
	if (val==true)
	{
		arr[ind]=id
		ind=ind+1
	}
	else
	{
		var p
		for(i=0;i<arr.length;i++)
		{
			if (id==arr[i])
			{
				p=i
				break;
			}
		}
		arr.splice(p,1)
		ind=arr.length
	}	
	//alert(arr)
}
function delSelEvents()
{
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }	
		var url="eventDeleted.php"
		url=url+"?arr="+arr	
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=eventDeleted
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null)
}
function eventDeleted() 
{ 	
	
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		if(xmlHttp.responseText=="FINISHED")	 
	 	{
			alert("Your request successfully updated")
			window.location.reload()
		}
		
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
</script>
<?
$allow_script = false;
}
?> 