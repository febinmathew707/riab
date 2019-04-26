<?php session_start(); 
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

<link rel="shortcut icon" href="images/small.gif">
<title>:: State Owned Enterprise Monitor:: </title>
<style type="text/css">
<!--
A:link { COLOR: #F38400; TEXT-DECORATION: none; font-weight: normal }
A:visited { COLOR: #F38400; TEXT-DECORATION: none; font-weight: normal }
A:active { COLOR:  #F38400; TEXT-DECORATION:none; font-weight: normal }
A:hover { COLOR:  #45ADD2; TEXT-DECORATION: none; font-weight: normal }
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
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/modal-message.js"></script>
<script type="text/javascript" src="js/ajax-dynamic-content.js"></script>
<script src="AC_OETags.js" language="javascript"></script>
<script language="JavaScript" type="text/javascript">
<!--
// -----------------------------------------------------------------------------
// Globals
// Major version of Flash required
var requiredMajorVersion = 8;
// Minor version of Flash required
var requiredMinorVersion = 0;
// Minor version of Flash required
var requiredRevision = 0;
// -----------------------------------------------------------------------------
// -->
</script>
</head>
<?php
 if(isset($_SESSION['page'])==false)
 {
 	?>
<body topmargin=0 leftmargin=0 marginwidth=0 marginheight=0 bgproperties='fixed' bgcolor='#DBDBDB' 
onload="disp('kerala')" > 
<?php
}
else
{
	echo "<body topmargin=0 leftmargin=0 marginwidth=0 marginheight=0 bgproperties='fixed' bgcolor='#DBDBDB' 
	onload=disp('".$_SESSION['page']."')>";
	//echo $_SESSION['page'];
}
?>
<form name="frmlogin" id="frmloginaccept=" method="post">
 

 
 <table border="0" cellpadding="0" marginwidth=0 marginheight=0 cellspacing="0" bgcolor="#DBDBDB" style="border-collapse: collapse"  width="100%" height="100%" bgproperties="fixed" >
 <tr>
 <td width="100%"  valign=top align=center height="100%">
 <table border="0" cellpadding="0" marginwidth=0 marginheight=0 cellspacing="0" bgcolor="#FFFFFF" style="border-collapse: collapse"   bordercolor=black width="1002"  bgproperties="fixed" > 
 <tr>
 <td   valign=top align="left" bgcolor="#DBDBDB" colspan="3" width="1002"  > <br> 
 <table border="0" cellpadding="0" cellspacing="0"  width="100%" >
   
   <tr>
     <td width="100%"  align="left" valign="bottom" bgcolor="#FFFFFF" colspan=2>
     	<table border="0" cellpadding="0" cellspacing="0" width="995">
      <tbody><tr>
        <td colspan="3" scope="row" height="12"></td>
        </tr>
      <tr>
        <td scope="row" width="21">&nbsp;</td>
        <td scope="row" width="853"><!--<img src="images/RIAb.jpg" width="215" height="97"  />--><img src="soemoniter.php_files/logo.jpg" width="108" height="79"></td>
        <td scope="row" width="121"><!--<img src="images/logo.jpg" width="108" height="79" />--><a href="http://industriesministerkerala.gov.in/" target="_blank"><img src="soemoniter.php_files/govt.jpg" border="0" width="164" height="84"></a></td>
      </tr>
      <tr>
        <td colspan="3" scope="row" height="12"></td>
        </tr>
    </tbody></table>
	<table background="soemoniter.php_files/menu-bg.jpg" border="0" cellpadding="0" cellspacing="0" width="995">
      <tbody><tr>
        <td scope="row" width="9">&nbsp;</td>
        <td scope="row" width="87">
                 <a href="http://www.invismultimedia.com/riab/index.php">
                 <img src="soemoniter.php_files/home1.jpg" name="Image3" id="Image3"  border="0" width="87" height="35"></a>
               </td>
        <td scope="row" width="5">&nbsp;</td>
        <td scope="row" width="127">
                <a href="http://www.invismultimedia.com/riab/slpe-websites.php">
                <img src="soemoniter.php_files/slpe1.jpg" name="Image3" id="Image3"  border="0" width="70" height="35"></a>
              </td>
        <td scope="row" width="5">&nbsp;</td>
        <td scope="row" width="127">
        <img src="soemoniter.php_files/seo-monitor01.jpg" height="35">        </td>
        <td scope="row" width="7">&nbsp;</td>
        <td scope="row" width="186">
                <a href="http://industriesministerkerala.gov.in/" target="_blank">
                <img src="soemoniter.php_files/industries-departments1.jpg" name="Image3" id="Image3" border="0" width="186" height="35"></a>
               </td>
        <td scope="row" width="6">&nbsp;</td>
        <td scope="row" width="124">
        
                <a href="http://www.invismultimedia.com/riab/gallery.php">
                <img src="soemoniter.php_files/gallery%25201.jpg" name="Image3" id="Image3"  border="0" width="88" height="35"></a>
               </td>
        <td scope="row" width="5">&nbsp;</td>
        <td scope="row" width="155">
                <a href="http://www.invismultimedia.com/riab/reference-material.php">
                <img src="soemoniter.php_files/reference%252001.jpg" name="Image3" id="Image3"  border="0" width="179" height="35"></a>
               
        
       <!-- <a href="http://riab.org/papernov09.pdf" target="_blank" onmouseover="MM_swapImage('Image7','','images/ACG01.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="images/ACG1.jpg" name="Image7" width="155" height="35" border="0" id="Image7" /></a>-->        </td>
        <td scope="row" width="4">&nbsp;</td>
        <td scope="row" width="275">
                <a href="http://www.invismultimedia.com/riab/contact-us.php">
                <img src="soemoniter.php_files/contact1.jpg" name="Image3" id="Image3"  border="0" width="88" height="35"></a>
               </td>
      </tr>
    </tbody></table>	
	</td>
   </tr>
   </table>
 </td>
 </tr> 
 <tr>
 <td valign=top align="left" bgcolor="#FFFFFF"  colspan="3" width="100%"  >
 <table border="0" cellpadding="0" cellspacing="0"  width="100%" >
 <tr>
 <td valign=top align="left" bgcolor="#FFFFFF"  rowspan=2 width="103"  >

</td> 
 <td   valign=top align="center" bgcolor="#FFFFFF"   > 
 <?php
 		if(isset($_SESSION["hitcounter"])==false)
 		{
			$strsql="UPDATE hitcounter set counter=counter+1";
			mysql_query($strsql);
			$strsql="select counter from hitcounter";
			$result=mysql_query($strsql);
			$row=mysql_fetch_row($result);
			$_SESSION["hitcounter"]=$row[0];			
		}
		echo "<div align='right' class='txtright1'><b><font color=red>hits# ".$_SESSION["hitcounter"]."</font></b>&nbsp;&nbsp;&nbsp;</div>";
 ?>
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
 <td valign=middle align="right" bgcolor="#45ADD2"   width=1002  colspan=2 height=30>
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