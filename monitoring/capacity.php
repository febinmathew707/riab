<?php
	session_start();
	if(!isset($_SESSION['Logged']))
	{
		Header("Location: home.php");
		die();
	}
	elseif($_SESSION['Logged']=='No')
	{
		Header("Location: home.php");
		die();
	}
	include("../connectdb/connect.php");
 	mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
?>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns="http://www.w3.org/TR/REC-html40">
<head>

<meta http-equiv="Content-Language" content="en-us">

<script src="search.js"></script>
<script src="login.js">	
</script>
<script src="update.js"></script>
<link href="../styleSheet/employee.css" type=text/css rel=stylesheet>
<link href="../styleSheet/employee_controls.css" type=text/css rel=stylesheet>
<title>:: Employee Database of PSUs in Kerala :: </title>


<style type="text/css">
<!--
A:link { COLOR: black; TEXT-DECORATION: none; font-weight: normal }
A:visited { COLOR: black; TEXT-DECORATION: none; font-weight: normal }
A:active { COLOR:  #B02506; TEXT-DECORATION:none; font-weight: normal }
A:hover { COLOR:  #B02506; TEXT-DECORATION: none; font-weight: normal }
-->
</style>
</head>
<body topmargin=0 leftmargin=0 marginwidth=0 marginheight=0 bgproperties="fixed" bgcolor="#C0C0C0" 
  > 
  <form name="frmCompany" id="frmCompany" method="POST">
 <table border="0" cellpadding="0" marginwidth=0 marginheight=0 cellspacing="0" bgcolor="#C0C0C0" 
 style="border-collapse: collapse"  width="100%" height="100%" bgproperties="fixed" >
 <tr>
 <td width="100%"  valign=top align=center>


 <table border="0" cellpadding="0" marginwidth=0 marginheight=0 cellspacing="0" bgcolor="#C0C0C0" style="border-collapse: collapse"  width="1000" height="665" bgproperties="fixed" >
 <tr>
 <td width=100% height=10 valign=top align=center>
 </td>
 </tr>
 <tr>
 <td width=100% height=664 valign=top align="center">
 <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="938" id="AutoNumber1" height="626" bordercolor="#C4E5F9">
   <tr>
     <td width="100%" valign=top align=center height="580" >
    
     <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2" height="116" bgcolor="#C0C0C0">
       <tr>
         <td width="100%" height="106" valign="top">
         <img border="0" src="imghome/head.gif" width="942" height="116"></td>
       </tr>
       <tr>
         <td width="100%" height="52" background="imghome/links.gif">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <font face="Verdana" style="font-size: 8pt"><a href="createaccount.php"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
         Create Company Account</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
         List Created Accounts&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <a href="index.php"> List Featured Employees</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
         <a href="logout.php"> Log Out</a></font></td>
       </tr>
	    <tr>
         <td width="100%" height="300" valign="middle" background="" align=center>
         <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber1" height="232">
  <tr>
     <td width="100%" align="right"  background="images/createaccounttop.gif" height="20">
     </td>
   </tr>
	 <tr>
     <td width="100%" align="center"   height="63" valign="top" background="images/createaccountmiddle.gif">
     	
     	
        &nbsp;</td>
     </tr>
     
   <tr>
     <td width="100%" align="right"  background="images/createaccountbottom.gif" height="36"></td>
   </tr>


   
   <div id="re"></div>
   <div id="w"></div>
 </table>

		 </td>
       </tr>
       
       
       <tr>
         <td width="100%" height="58" valign="top" background="imghome/bottom.gif" align=right>
         <span id="w1"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
       </tr>
     </table>
    
     </td>
   </tr>
   
 </table>
 </td>
 </tr>
 </table>
 </td>
 </tr>
 </table>
  </form>
</body>
</html>