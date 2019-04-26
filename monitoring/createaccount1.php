<?php 


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

<script src="login.js">
	
</script>

<title>:: WAVE SAT  :: </title>

<link href="../styleSheet/cigi.css" type=text/css rel=stylesheet>
<link href="../styleSheet/home.css" type=text/css rel=stylesheet>
<link href="../styleSheet/controls.css" type=text/css rel=stylesheet>

</head>
<body topmargin=0 leftmargin=0 marginwidth=0 marginheight=0 bgproperties="fixed" bgcolor="#FFFFFF"  > 
 <table border="0" cellpadding="0" marginwidth=0 marginheight=0 cellspacing="0" bgcolor="#FFFFFF" style="border-collapse: collapse"  width="100%" height="100%" bgproperties="fixed" >
 <tr>
 <td width="100%"  valign=top align=center>
 <table border="0" cellpadding="0" marginwidth=0 marginheight=0 cellspacing="0" bgcolor="#FFFFFF" style="border-collapse: collapse"  width="1000" height="550" bgproperties="fixed" >
 <tr>
 <td width=100% height=7 valign=top align=center>
 <br>
 <br>
&nbsp;
 <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="90%" id="AutoNumber1" height="216">
  <tr>
     <td width="100%" align="right"  background="images/createaccounttop.gif" height="39"></td>
   </tr>
	 <tr>
     <td width="100%" align="center"   height="63" valign="top" background="images/createaccountmiddle.gif">
     	<table border="1" cellspacing="0" style="border-collapse: collapse" bordercolor="#E2E0E0" width="85%" id="AutoNumber1" bgcolor="#FFFFFF" cellpadding="4">
	 <tr >
     <td width="51%" align="right" height="23" class="txtright">
     <font color="#000000">User Id</font></td>
     <td width="2%" height="23">:</td>
     <td width="47%" height="23" >
    
       <input type="text" name="txtuid" size="35" id="txtuid" class=txtbox>
     </td>
   </tr>
   <tr>
     <td width="51%" align="right" height="23" class="txtright">
     <font color="#000000">Password</font></td>
     <td width="2%" height="23">:</td>
     <td width="47%" height="23">
    
       <input type="password" name="txtpwd" id="txtpwd" size="35" class="txtbox">
&nbsp;</td>
   </tr>
   
   <tr>
     <td width="51%" align="right" height="23" class="txtright">
     <font color="#000000">Company</font></td>
     <td width="2%" height="23">:</td>
     <td width="47%" height="23">
     <select name="cmbCompany" id="cmbCompany">   
	 <option value="" selected> ------------------- select company ---------------- </option>  
    <?php 
    	$strsql="select max(Company_Name) from employee group by Company_Name";
    	$result=mysql_query($strsql);
    	while($row=mysql_fetch_array($result))
    	{
			echo"<option value='".$row[0]."'>".$row[0]."</option>";
		}
    ?>
    </select>
&nbsp;</td>
   </tr>
   <tr>
     <td width="51%" height="27" class="txtright">&nbsp;</td>
     <td width="2%" height="27"></td>
     <td width="47%" height="27"><input type="button" value="Login" onclick="log1()">&nbsp;
     <input type="reset" value="Cancel" onclick="cancel()"></td>
   </tr>
   </table>
     </td>
     </tr>
     
   <tr>
     <td width="100%" align="right"  background="images/createaccountbottom.gif" height="40"></td>
   </tr>


   
   <div id="result"></div>
   <div id="w"></div>
 </table>

 </td>
 </tr>
  </table>
 </table>
</body>
</html>