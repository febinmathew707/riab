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


<script src="profile.js"></script> 

<title>:: Employee Database - Kerala  :: </title>
<style type="text/css">
<!--
A:link { COLOR: black; TEXT-DECORATION: none; font-weight: normal }
A:visited { COLOR: black; TEXT-DECORATION: none; font-weight: normal }
A:active { COLOR:  #B02506; TEXT-DECORATION:none; font-weight: normal }
A:hover { COLOR:  #B02506; TEXT-DECORATION: none; font-weight: normal }
-->
</style>
<link href="../styleSheet/employee.css" type=text/css rel=stylesheet>
<link href="../styleSheet/employee_controls.css" type=text/css rel=stylesheet>
</head>
<?php

echo " <body   topmargin=0 leftmargin=0 marginwidth=0 marginheight=0 bgproperties='fixed'  
 bgcolor='#FFFFFF' onload=bypass('personal','".$_SESSION['type']."')> ";
$sql="SELECT * FROM  employee where Auto_No=".$_SESSION["emp_id"]."";
                 		$result=mysql_query($sql);
                 		$row=mysql_fetch_assoc($result);
?> 
 <table border="0" cellpadding="0" marginwidth=0 marginheight=0 cellspacing="0" bgcolor="#FFFFFF" style="border-collapse: collapse"  width="100%" height="100%" bgproperties="fixed" >
 <tr>
 <td width="100%"  valign=top align=center>
 

 <table border="0" cellpadding="0" marginwidth=0 marginheight=0 cellspacing="0" bgcolor="#FFFFFF" style="border-collapse: collapse"  width="1000" height="610" bgproperties="fixed" >
 <tr>
 <td width=100% height=10 valign=top align=center>
 </td>
 </tr>
 <tr>
 <td width=100% height=100% valign=top align="center">
 <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="938" id="AutoNumber1" height="626" bordercolor="#C4E5F9">
   <tr>
     <td width="100%" valign=top align=center height="580" >
    
     <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2" height="30" bgcolor="#FFFFFF">
       
       <tr>
         <td width="100%" height="47" background="images/link.jpg">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <span style="font-size: 9pt">&nbsp;</span><font face="Verdana" size="1"><b>&nbsp;    
		 <?php if($_SESSION["LogType"]!="EM")
		 	{
		 	?>    
         <a href="index.php">Members List</a>
         </font>
		 <?php 
		 }
		 ?>
		 </td>
       </tr>
       <tr>
         <td width="100%" height="16" valign="top" background="images/bgmiddle.gif">
         <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber3" height="100%">
           <tr>
             <td width="18%" valign="top" align="center">&nbsp;<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="90%" id="AutoNumber6" height="143">
             	
               <tr>
                 <td width="100%" background="images/photobg.gif" height="142" align="center" >
                 <?php
							 		if($row["Photo"]!="")
							 		{
							echo " &nbsp;&nbsp;<a href=javascript:set(".$row["Auto_No"].",'v','personal') 
							   style='text-decoration: none	'><img src='".$row["Photo"]."' 
							   width=112 height=112></a>";
							   
										
									}
									else
									{
										//echo strtoupper(substr($row["Sex"],0,1));
										if(strtoupper(substr($row["Sex"],0,1))=="F")
										{
											echo "<img src='imghome/women.png' border=0>";
										
										}
										else if(strtoupper(substr($row["Sex"],0,1))=="M")
										{
											echo " <img src='images/men.jpg' border=0>";						   
										}
										else 
										{
											echo " <img src='images/men.jpg' border=0>";
										}
										
									}
							 	?>
				 
				 </td>
               </tr>
               <?php  if($_SESSION['type']=="edit")
               {
               ?>
               <tr>
                 <td width="100%"  height="50" align="center" valign=top class="txtcenter">
                 	<a href="JavaScript:BrowsePhoto('')"> change </a> | 
                 	<a href="JavaScript:removeimage('')"> remove </a>
                 </td>
               </tr>
               <tr>
                 <td width="100%"  height="20" align="center" valign=middle class="txtcenter">                 	
                 	<a href="JavaScript:changePwd()"><font color="#922A18">Change Password</font></a>
                 </td>
               </tr>
               <?php
               }
               
               ?>
               <tr>
                 <td width="100%"  height="20" align="center" valign=middle class="txtcenter">
                 	<a href="logout.php"><font color="#922A18">LogOut</font></a><br>                 	
                 </td>
               </tr>
             </table>
             </td>
             <div id="loc" style="position: absolute; z-index: 500;left: 180px; width:400; top:170px; ; ">
			</div>
		
			<div id="pwd" style="position: absolute; z-index: 500;left: 180px; width:500; height:150; top:290px;background-image: url('images/bgpwd.gif'); visibility:hidden ">
			
			</div>
			
             <td width="82%" align="center" valign="top" height=200><br>
             <span id="wait">
					 <embed src='movies/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'></span>&nbsp;&nbsp;&nbsp;
&nbsp;<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="760" id="AutoNumber4" height="163">
               <tr>
                 <td width="760" background="images/innertop.gif" height="49" valign="top">
                 <?php 
                 		$sql="SELECT * FROM  employee where Auto_No=".$_SESSION["emp_id"]."";
                 		$result=mysql_query($sql);
                 		$row=mysql_fetch_assoc($result);
                 	?>
                 <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="760" id="AutoNumber7" height="25">
                   <tr>
                     <td width="300"  class="heading"> &nbsp;
                     <?php  if($_SESSION['type']=="edit")
               		{
               		?>
					 <font color=black>Welcome</font> &nbsp; <?php } echo $row["First_Name"]; ?></td>
					 <td width="332"  class="heading" valign=top>
					 <embed src='movies/tab.swf' width=520 height=25 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'></span>
					 </td>
                     <td width="30" valign="top" align="left"></td>
                   </tr>
                 </table>
                 </td>
               </tr>
               <tr>
                 <td width="760" background="images/innermiddle.gif" height="121" valign="top" 
				 align=center>         <span id="display"></span>
                 </td>
               </tr>

               <tr>
                 <td width="760" background="images/innerbottom.gif" height="35" valign="top" >
				 <span id="wait1"></span></td>
               </tr>

             </table>
             </td>
           </tr>
         </table>
         </td>
       </tr>
       <tr>
         <td width="100%" height="68" valign="top" background="images/bottom.gif">
         &nbsp;</td>
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