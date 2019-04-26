<?php session_start(); 
	include("../connectdb/connect.php");
 	mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$_SESSION["mainpage"]="createcomaccount";
?>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2" height="116" bgcolor="#FFFFFF">    
	    <tr>
         <td width="100%" height="300" valign="middle" background="" align=center>
         <form name="frmcreateaccount">
         <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" 
		 id="AutoNumber1" height="216">
  <tr>
     <td width="100%" align="left"   height="39" valign=top>	 
	 <font face=verdana color=black size=2>&nbsp; &nbsp;<b> Create Company Account</b></font>
	 </td>
   </tr>
	 <tr>
     <td width="100%" align="center"   height="63" valign="top" background="images/createaccountmiddle.gif">
     	<table border="1" cellspacing="0" style="border-collapse: collapse" bordercolor="#E2E0E0" width="85%" 
		 id="AutoNumber1" bgcolor="#FFFFFF" cellpadding="4">
	<tr >
     <td width="51%" align="right" height="23" class="txtright">
     <font color="#000000">Name</font></td>
     <td width="2%" height="23">:</td>
     <td width="47%" height="23" >
    
       <input type="text" name="txtname" size="50" id="txtname" class=txtbox >
     </td>
   </tr>
   <tr >
     <td width="51%" align="right" height="23" class="txtright">
     <font color="#000000">Designation</font></td>
     <td width="2%" height="23">:</td>
     <td width="47%" height="23" >
    
       <input type="text" name="txtdesig" size="35" id="txtdesig" class=txtbox >
     </td>
   </tr>
	 <tr >
     <td width="51%" align="right" height="23" class="txtright">
     <font color="#000000">User Id</font></td>
     <td width="2%" height="23">:</td>
     <td width="47%" height="23" >
    
       <input type="text" name="txtuid" size="35" id="txtuid" class=txtbox >
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
     <select name="cmbCompany" id="cmbCompany" class=combo1>   
	 <option value=0 selected> ------------------- select company ---------------- </option>  
    <?php 
    	$strsql="select * from emp_company group by Company_Name";
    	$result=mysql_query($strsql);
    	while($row=mysql_fetch_array($result))
    	{
			echo"<option value='".$row["company_id"]."'>".$row["company_name"]."</option>";
		}
    ?>
    </select>
&nbsp;</td>
   </tr>
   <tr>
     <td width="51%" height="27" class="txtright">&nbsp;</td>
     <td width="2%" height="27"></td>
     <td width="47%" height="27"><input type="button" value="create" onclick="create()"></td>
   </tr>
   </table>
     </td>
     </tr>     
   <tr>
     <td width="100%" align="right"  ></td>
   </tr>   
   <div id="re"></div>
   <div id="w"></div>
 </table>
 </form>
		 </td>
       </tr>       
       
       
     </table>