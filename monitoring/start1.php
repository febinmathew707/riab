<?php 
 session_start();
	include("../connectdb/connect.php");
 	mysql_select_db("wavesatlive",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 	
	if(!isset($_SESSION['Logged']))
	{
		Header("Location: home.php");
		die();
	}
	elseif($_SESSION['LogType']!='AD' && $_SESSION['LogType']!='CO' && $_SESSION['LogType']!='RP')
	{
		Header("Location: home.php");
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
<script src="myprintln.js"></script>
<script src="login.js">	

</script>
<link href="../styleSheet/employee.css" type=text/css rel=stylesheet>
<link href="../styleSheet/employee_controls.css" type=text/css rel=stylesheet>
<title>:: Employee Database of PSUs in Kerala :: </title>


<style type="text/css">
<!--
A:link { COLOR: black; TEXT-DECORATION: none; font-weight: normal }
A:visited { COLOR: black; TEXT-DECORATION: none; font-weight: normal }
A:active { COLOR:  #711905; TEXT-DECORATION:none; font-weight: normal }
A:hover { COLOR:  #711905; TEXT-DECORATION: none; font-weight: normal }
-->
</style>
</head>
<?php
/*
echo"
<body topmargin=0 leftmargin=0 marginwidth=0 marginheight=0 bgproperties=fixed bgcolor=#DCD8CC 
onload=subsearch('name','',1,1,1,'First_Name','".$_SESSION["LogType"]."','".$_SESSION["mainpage"]."')  onkeydown=visible(event) 
onclick=hidemenu()> ";*/
echo"
<body topmargin=0 leftmargin=0 marginwidth=0 marginheight=0 bgproperties=fixed bgcolor=#DCD8CC 
onload=dispmain('".$_SESSION['mainpage']."')  onkeydown=visible(event) 
onclick=hidemenu()> ";
?>

 <table border="0" cellpadding="0" marginwidth=0 marginheight=0 cellspacing="0" bgcolor="#DCD8CC" 
 style="border-collapse: collapse"  width="100%" height="100%" bgproperties="fixed" >
 <tr>
 <td width="100%"  valign=top align=center>


 <table border="0" cellpadding="0" marginwidth=0 marginheight=0 cellspacing="0" bgcolor="#DCD8CC" style="border-collapse: collapse"  width="1000"  bgproperties="fixed" >
 <tr>
 <td width=100% height=10 valign=top align=center>
 </td>
 </tr>
 <tr>
 <td width=100%  valign=top align="center">
 <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="938" id="AutoNumber1"  bordercolor="#C4E5F9">
   <tr>
     <td width="100%" valign=top align=left  class="txtleft" >
    <b>&nbsp;&nbsp; Logged as <font color=#000000 size="2"><?php echo $_SESSION['user_name'] ?></font></b>
    &nbsp;&nbsp;&nbsp; <br><br>
    
     <table border=0 cellpadding=0 cellspacing=0  width=100% id=AutoNumber2 height=116 bgcolor=#DCD8CC >
     <tr>
         <td width="100%" height="125" valign="bottom" background="imghome/head.gif">
         <embed width=975 height=125 src='movies/headkerala.swf'>
         </td>
    </tr>
    <tr>
         <td width="100%" height="0" valign="bottom" background="imghome/midle.gif">
         </td>
    </tr>
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
	   
	   <table border=1 cellpadding=0 cellspacing=0  width=100% id=AutoNumber2 height=116  width=100% 
	   >
	   <tr><td valign="top" align=center   
	    width="100%" background="imghome/midle.gif" bgcolor=white>
	   	<table border=1 cellpadding=0 cellspacing=0  width=98% id=AutoNumber2 height=116 bgcolor=#FFFFFF 	   >
	   <tr><td valign=top  bgcolor=white>
	   <?php if ($_SESSION["LogType"]=="AD")
     {
    ?>
	   <script>
	myprintln("<embed width=240 height=550 src='movies/admin_menu.swf' pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>");    
		</script> 
		<?php
		}
		else if($_SESSION["LogType"]=="CO")
     	{
		?>
		<script>
	myprintln("<embed width=240 height=550 src='movies/company_menu.swf' pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>");    
		</script> 
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
	   <td valign=top  bgcolor=white > <br>
	   <span id="main" ></span>
	   </td>
	   	</tr>
		 </table>		
         </td></tr></table>
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
</body>
</html>