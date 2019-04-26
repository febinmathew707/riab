<?php session_start();
	include("../connectdb/connect.php");
 	mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 	
	if(!isset($_SESSION['Logged']))
	{
		Header("Location: first.php");
		die();
	}
	elseif($_SESSION['LogType']!='AD' && $_SESSION['LogType']!='CO' && $_SESSION['LogType']!='RP')
	{
		Header("Location: first.php");
		die();
	}
?>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns="http://www.w3.org/TR/REC-html40">
<head>

<meta http-equiv="Content-Language" content="en-us">

<script src="search.js"></script>
<script src="profile.js"></script>
<script src="update.js"></script>
<script src="report.js"></script>
<script src="blog.js"></script>
<script src="main.js"></script>
<script src="myprintln.js"></script>
<script src="login.js">	

</script>
<link href="../styleSheet/employee.css" type=text/css rel=stylesheet>
<link href="../styleSheet/home.css" type=text/css rel=stylesheet>
<link href="../styleSheet/employee_controls.css" type=text/css rel=stylesheet>
<title>:: Monthly monitoring  of PSUs - Kerala :: </title>


<style type="text/css">
<!--
A:link { COLOR: #649FA1; TEXT-DECORATION: none; font-weight: normal }
A:visited { COLOR: #649FA1; TEXT-DECORATION: none; font-weight: normal }
A:active { COLOR:  #898687; TEXT-DECORATION:none; font-weight: normal }
A:hover { COLOR:  #898687; TEXT-DECORATION: none; font-weight: normal }
-->
</style>
</head>


 <table border="0" cellpadding="0" marginwidth=0 marginheight=0 cellspacing="0" bgcolor="#DBDBDB" 
 style="border-collapse: collapse"  width="100%" height="100%" bgproperties="fixed" >
 <tr>
 <td width="100%"  valign=top align=center>


 <table border="0" cellpadding="0" marginwidth=0 marginheight=0 cellspacing="0" bgcolor="#DBDBDB" style="border-collapse: collapse"  width="1000"  bgproperties="fixed" >
 <tr>
 <td width=100% height=10 valign=top align=center>
 </td>
 </tr>
 <tr>
 <td width=100%  valign=top align="center">
 <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="938" id="AutoNumber1"  bordercolor="#C4E5F9" bgcolor="#FFFFFF">
   <tr>
     <td width="100%" valign=top align=left  class="txtleft" >
      &nbsp;&nbsp; <font color=#000000 size="2"> Logged as <b><?php echo $_SESSION['user_name'] ?></font></b>
    &nbsp;&nbsp;&nbsp; <font color=#FFFFFF size="2"> <a href="logout.php"> Logout </a> <br><br>
    
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

    
     <table border=0 cellpadding=0 cellspacing=0  width=100% id=AutoNumber2  >
    
   
     <!--
     <?php if ($_SESSION["LogType"]=="AD")
     {
     	?>
       <tr>
         <td width="100%" height="125" valign="bottom" background="imghome/head.gif">		 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		 		        
		 <input type="image" src="imghome/master.gif" onclick="JavaScript:menu('master','master')"> 
		 <input type="image" src="imghome/actions.gif" onclick="JavaScript:menu('actions','actions')"> 
		 <input type="image" src="imghome/reports.gif" onclick="JavaScript:menu('report','report')">
         </td>
       </tr> 
	   <tr>
         <td width="100%" height=20 background="imghome/midle.gif" valign="bottom" bgcolor=white >
         </td>
        </tr>    
	  <?php
	  }	  
	  elseif($_SESSION["LogType"]=="CO") 
     	{
     	?>  
		 <tr>
         <td width="100%" height="125" valign="bottom" background="imghome/head.gif">		 
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		 		        
		 <input type="image" src="imghome/master.gif" onclick="JavaScript:menu('masterco','master')"> 
		 <input type="image" src="imghome/actions.gif" onclick="JavaScript:menu('actionsco','actions')"> 
		 <input type="image" src="imghome/reports.gif" onclick="JavaScript:menu('reportco','report')">
         </td>
       </tr>
	   <tr>
         <td width="100%" height=20 background="imghome/midle.gif" valign="bottom" bgcolor=white >
         </td>
        </tr>  
		    
	  
	   <?php
	   }
	   elseif($_SESSION["LogType"]=="RP") 
	   {
     	?>  
		 <tr>
         <td width="100%" height="125" valign="bottom" background="imghome/head.gif" align="center">
		 		 
		  
	 </td>
	 </tr>  
	 <tr>
         <td width="100%" valign="bottom"  align="center" background="imghome/midle.gif">
		<table width=98% cellpadding="0" cellspacing="0" bgcolor="#F5F3F3" height=50>
		  <tr>
		  <td valign=middle width=25%>     
    
    <font face="Verdana" size="2">
    <a href="JavaScript:dispmain('fvariablelist')">&nbsp;&nbsp; Consolidated Report1  </font></td> 
    <td valign=middle width=25%> 
    <font face="Verdana" size="2">
    <a href="JavaScript:dispmain('svariablelist')">&nbsp;&nbsp; Consolidated Report2</font></td>
    
   <td valign=middle width=25%>  
    <font face="Verdana" size="2">
    <a href="JavaScript:dispmain('lossinc')">&nbsp;&nbsp; Loss Making Units</font></td>
    
    <td valign=middle width=205%>  
    <font face="Verdana" size="2">
    <a href="JavaScript:dispmain('profitmaking')">&nbsp;&nbsp; Profit Making Units</font></td> 
	 </tr>
	<tr>
   <td valign=middle width=25%> 
    <font face="Verdana" size="2">
    <a href="JavaScript:dispmain('overall')">&nbsp;&nbsp; Overall Performance</font></td>   
    
	
    <td valign=middle width=25%> 
    <font face="Verdana" size="2">
    <a href="JavaScript:dispmain('increprofit')">&nbsp;&nbsp; Units that increased Profit</font></td>
    
    <td valign=middle width=25%> 
    <font face="Verdana" size="2">
    <a href="JavaScript:dispmain('increloss')">&nbsp;&nbsp; Units with increase in Losses</font></td>    
    
    <td valign=middle width=25%> 
    
    <font face="Verdana" size="2">
    <a href="JavaScript:dispmain('pf')">&nbsp;&nbsp; Major Defaulters to PF</font></td>  
    
  	</tr>
  	</table>    
  	</td>
  	</tr>
	   <?php
	   }
	   ?>		
	    -->
	   </table>
	   
	  
	   <span id="master" style="position: absolute; z-index: 500;left:268px; width:207; top:148px; height:200 ; overflow:auto;visibility:hidden;"></span>
	   <span id="report" style="position: absolute; z-index: 500;left:710px; width:217; top:148px; height:320 ; overflow:auto;visibility:hidden;"></span>
	   <span id="actions" style="position: absolute; z-index: 500;left:480px; width:237; top:148px; height:320 ; overflow:auto;visibility:hidden;"></span>
	   
	   <table border=0 cellpadding=0 cellspacing=0  width="927" id=AutoNumber2 height=116  width=100% 
	   >
	   <tr><td valign="top" align=center   
	    width="100%"  bgcolor=white>
	   	<table border=0 cellpadding=0 cellspacing=0  width=98% id=AutoNumber2 height=116 bgcolor=#FFFFFF 	   >
	   <tr>
	   <td valign=top  bgcolor="#FFFFFF"  align=left class="txtleft">
	
	   <?php 
	          
	   if ($_SESSION["LogType"]=="AD")
     {
    ?>
	  <embed width=240 height=550 src='movies/admin_menu.swf' pluginspage='http://www.macromedia.com/go/getflashplayer' 
      pluginspage='http://www.macromedia.com/go/getflashplayer'>
		<?php
		}
		else if($_SESSION["LogType"]=="CO")
     	{
		?>
		<!-- <script>
	myprintln("<embed width=240 height=550 src='movies/company_menu.swf' pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>");    
		</script>  -->
    <a href="#" onclick="dispmain('productmaster')">Product Master</a></br>
    <a href="#" onclick="dispmain('turnovermaster')">Turnover Master</a></br>
    <a href="#" onclick="dispmain('changecopwd')">Change Password</a></br>
    <a href="#" onclick="dispmain('editcompany')">Change Company Details</a></br>
    <a href="#" onclick="dispmain('createmsaccount')">Create Office Account</a></br>
    <a href="#" onclick="dispmain('listsupaccount')">List Office Account</a></br>
    <a href="logout.php">LogOut</a></br>
    <a href="monthlyreport.php">Monthly Report</a>
		<?php
		}		
		else if($_SESSION["LogType"]=="RP")
     	{
		?>
		<script>
	myprintln("<embed width=240 height=550 src='movies/report_menu.swf' pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>");    
		</script> 
		<?php
		}
		?>
	   </td>
	   <td valign=top  bgcolor=white width="80%" > 
       <?php
	  // echo "sfsfsf".$_SESSION["LogType"];
	   ?>
	   <span id="w"></span>
	   <span id="main" ></span>
	   </td>
	   	</tr>
		 </table>		
         </td></tr></table>
         <tr>
         <td width="100%" height="58" valign="top" >
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
</body>
</html>