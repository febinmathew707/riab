<?php 
 session_start(); ?>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns="http://www.w3.org/TR/REC-html40">
<head>

<meta http-equiv="Content-Language" content="en-us">

<link rel="shortcut icon" href="images/small.gif">
<title>:: State Owned Enterprise Monitor:: </title>
<style type="text/css">
<!--
A:link { COLOR: #EEB9D3; TEXT-DECORATION: none; font-weight: normal }
A:visited { COLOR: #EEB9D3; TEXT-DECORATION: none; font-weight: normal }
A:active { COLOR:  #FFFFFF; TEXT-DECORATION:none; font-weight: normal }
A:hover { COLOR:  #FFFFFF; TEXT-DECORATION: none; font-weight: normal }
-->
</style>
<link href="../styleSheet/style1.css" rel="stylesheet" type="text/css" >
<link href="../styleSheet/home.css" rel="stylesheet" type="text/css" >
<link href="../styleSheet/controls.css" rel="stylesheet" type="text/css" >
<script src="main.js"></script>
<script src="login.js"></script>
<script src="blog.js"></script>
<script src="myprintln.js"></script>
<script src="profile.js"></script>
<script src="forum.js"></script>
<script src="register.js"></script>
</head>
<?php
 if(isset($_SESSION['page'])==false)
 {
 	?>
<body topmargin=0 leftmargin=0 marginwidth=0 marginheight=0 bgproperties='fixed' bgcolor='#000000' 
onload="disp('home')" > 
<?php
}
else
{
	echo "<body topmargin=0 leftmargin=0 marginwidth=0 marginheight=0 bgproperties='fixed' bgcolor='#000000' 
	onload=disp('".$_SESSION['page']."')>";
}
?>
<form name="frmlogin" id="frmloginaccept=" method="post">
 

 
 <table border="0" cellpadding="0" marginwidth=0 marginheight=0 cellspacing="0" bgcolor="#000000" style="border-collapse: collapse"  width="100%" height="100%" bgproperties="fixed" >
 <tr>
 <td width="100%"  valign=top align=center height="100%">
 <table border="0" cellpadding="0" marginwidth=0 marginheight=0 cellspacing="0" bgcolor="#FFFFFF" style="border-collapse: collapse"   bordercolor=black width="1002"  bgproperties="fixed" > 
 <tr>
 <td   valign=top align="left" bgcolor="#000000" colspan="3" width="1002"  >
 <br> 
 <table border="0" cellpadding="0" cellspacing="0"  width="100%" >
   <tr>
     <td width="70%"  align="left" valign="middle" bgcolor="#000000" class="leftnormalwhite">
     	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="index.php"><font size="2">Home </a> | </font></font>
        <?php if(isset($_SESSION['user_name']))
        {
        	?>
    &nbsp;&nbsp; <font color=#90888C size="2"> Logged as <b><?php echo $_SESSION['user_name'] ?></font></b>
    &nbsp;&nbsp;&nbsp; <font color=#FFFFFF size="2"> <a href="start.php"> Go to Account   &nbsp;| </a>  &nbsp;<a href="logout.php"> Logout </a>
     <br><br>  
	 <?php
	 }
	 ?>   
     </td>
	 <td width="30%"  valign="middle" bgcolor="#000000" align=right> 
	 <img src="imghome/logo.gif">
	 <b>    
	 <?php /* if(isset($_SESSION['Logged']))
	 {
		if($_SESSION['Logged']=="Yes")
		{
			echo "Loged as ". $_SESSION['user_name']."      | 
			<a href='logout.php'><font color=white size=2>Logout</font></a>";
		}
		else
		{
			echo"Logged as Guest <b> Register </b>";
		}
	}
	else
	{
		echo"Logged as Guest &nbsp;&nbsp;&nbsp;  <a href=JavaScript:disp('rules')><font color=white size=2>
		<b>Register</b></a> </font> ";
	}*/
	?>	</b>&nbsp;&nbsp;<br>
	 </td>
   </tr>
   <tr>
     <td width="100%"  align="left" valign="bottom" bgcolor="#FFFFFF" colspan=2>
     	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab" width="1002" height="147" id="SOredirect" align="middle" SWLIVECONNECT="true">

            <param name="allowScriptAccess" value="sameDomain" />
            <param name="movie" value="so_redirect.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#FFFFFF" />
		<embed width=1002 height=147 src='movies/head.swf' allowScriptAccess="SOredirect" type="application/x-shockwave-flash" SWLIVECONNECT="true" pluginspage="http://www.adobe.com/go/getflashplayer" /></object></td>
   </tr>
   </table>
 </td>
 </tr> 
 <tr>
 <td valign=top align="left" bgcolor="#FFFFFF"  colspan="3" width="100%"  >
 <table border="0" cellpadding="0" cellspacing="0"  width="100%" >
 <tr>
 <td valign=top align="left" bgcolor="#FFFFFF"  rowspan=2 width="103"  >
<iframe src="menu.html" width="257" height="600" scrolling="no" frameborder="0"></iframe> 
</td> 
 <td   valign=top align="center" bgcolor="#FFFFFF"   > 
 <span id="w"></span>
 <span id="main" align=center></span>
 </form>
<span id="main1" align=center></span>
 <div id="w1"></div>  
   
 </td>
 </tr>
 </table>
 </td>
 </tr>
 <tr>
 <td valign=middle align="right" bgcolor="#D06298"   width=1002  colspan=2 height=30>
 <font face="tahoma" size=2 color=white>
 copyright@2008 all rights reserved &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <a href="http://www.pentagoninfotech.com"> Powered by Pentagon Infotech </a>&nbsp;&nbsp;&nbsp;</font>
 
 </td>
 </tr>
 </table>
 </td>
 </tr>
 
 
 </table>

</body>
</html>