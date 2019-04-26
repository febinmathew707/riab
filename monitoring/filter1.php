<?php 

 //session_start(); 

	include("../connectdb/connect.php");
 	mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	
?>

<table border="0" cellpadding="1" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber4" height="10">
               <tr>
               	 <td width="4%" height="24" class="txtleftwhite">&nbsp;</td>
                 <td width="20%" height="24" class="txtleftwhite">Name</td>
                 <td width="74%" height="24"><input type="text" name="txtKeyword" id="txtKeyword" size="50" class="txtboxgrey"></td>
               </tr>
               <tr>
               	 <td width="4%" height="24" class="txtleftwhite">&nbsp;</td>
                 <td width="20%" height="24" class="txtleftwhite">Qualification</td>
                 <td width="74%" height="24"><select name="cmbQualification" id="cmbQualification"
				 class="combogrey" name="cmbQualification">
				 <option value=""></option>
                 <?php
                 		$sql="SELECT MAX(Qualification) from employee group by Qualification";
                 		$result=mysql_query($sql);
                 		while($row=mysql_fetch_row($result))
                 		{
                 			$str=str_replace("'","`",$row[0]);
                 			echo"<option value='".$str."'>
                  ".substr($row[0],0,41)." </option>";
                 		}
                ?>
                <option value="All">------------------------------ All ---------------------------
				</option>
				</select></td>
               </tr>
               <tr>
               	<td width="4%" height="24" class="txtleftwhite">&nbsp;</td>
                 <td width="20%" height="24" class="txtleftwhite">Designation</td>
                 <td width="74%" height="24"><select name="cmbDesignation" class="combogrey" 
				 id="cmbDesignation">
				 <option value=""></option>
                 <?php                 		
                 		$sql="SELECT MAX(Designation) from employee group by Designation";
                 		$result=mysql_query($sql);
                 		while($row=mysql_fetch_row($result))
                 		{
                 		
                 			$str=str_replace("'","`",$row[0]);
                 			echo"<option value='".$str."'>
                  ".substr($row[0],0,40)." </option>";
                 		}
                ?>
                <option value="All">-------------------------------- All ---------------------------
				</option>
				</select></td>
               </tr>
               <tr>
                <td width="4%" height="25" class="txtleftwhite">&nbsp;</td>
                 <td width="20%" height="24" class="txtleftwhite">Company</td>
                 <td width="74%" height="24"><select name="cmbCompany" id="cmbCompany" 
				 class="combogrey">
				 <option value=""></option>
                 <?php
                 		$sql="SELECT MAX(Company_Name) from employee group by Company_Name";
                 		$result=mysql_query($sql);
                 		while($row=mysql_fetch_row($result))
                 		{
                 		
                 			$str=str_replace("'","`",$row[0]);
                 			echo"<option value='".$str."'>
                  ".substr($row[0],0,40)." </option>";
                 		}
                 		
                ?>						
				<option value="All">-------------------------------- All ---------------------------
				</option>
				</select></td>
               </tr>
               <tr>
               <td width=100% valign="middle" align="left" colspan=3 height=23>
               <table width="100%" height=11 cellpadding=0 cellspacing="0" border=0 style="border-collapse: collapse" bordercolor="#111111">
               <tr>
                <td width="4%" height="9" class="txtleftwhite"></td>
                 <td width="17%" height="9" class="txtleftwhite" valign="top">City</td>
                 <td width="36%" height="9" align=left valign="top">
				 <select name="cmbCity" id="cmbCity" class="combogrey">
				 <option value=""></option>
				<?php
                 		$sql="SELECT MAX(City) from employee group by City";
                 		$result=mysql_query($sql);
                 		while($row=mysql_fetch_row($result))
                 		{
                 		
                 			echo"<option value='".$row[0]."'>
                 ".substr($row[0],0,30)." </option>";
                 		}
                 		
                ?>						
				<option value="All">------------------ All ------------------
				</option>
				 </select> 
				 </td>
				 <td width="28%"  class="txtleftwhite" valign="bottom">
				 
				 <input type="image" src="imghome/button1.gif" onclick="getState('name','',1,1,1)"
				 onmouseover="swap1()" onmouseout="swap()" id="img"></td>
               </tr>
               
             </table>
             </td>
             </tr>
             </table>