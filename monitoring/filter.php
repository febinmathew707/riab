<?php //session_start(); 

	include("../connectdb/connect.php");
 	mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	
?>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="500" id="AutoNumber4" height="10">
               <tr>
               	 <td width="20" height="24" class="txtleftwhite">&nbsp;</td>
                 <td width="94" height="24" class="txtleftwhite">Name</td>
                 <td width="386" height="24" colspan=2><input type="text" name="txtKeyword" 
				 id="txtKeyword" 
				 size="53" class="txtboxgrey"></td>
                 
               </tr>
               <tr>
               	 <td width="20" height="24" class="txtleftwhite">&nbsp;&nbsp;</td>
                 <td width="94" height="24" class="txtleftwhite">Qualification</td>
                 <td width="263" height="24">
				 <input type="text" name="cmbQualification" id="cmbQualification" size="50" 
				 class="txtboxgrey" readonly="readonly">
				 </td>
				 <td width="123" height="24" class="txtleftwhite">
				 <input type="image" src="images/arrow.gif" width="18" height="21" 
				 onclick="view('quali')" onblur="hide()"></td>
               </tr>
               <tr>
               	<td width="20" height="24" class="txtleftwhite">&nbsp;</td>
                 <td width="94" height="24" class="txtleftwhite">Designation</td>
                 <td width="263" height="24">
				 <input type="text" name="cmbDesignation" id="cmbDesignation" size="50" 
				 class="txtboxgrey"></td>
				 <td width="123" height="24" class="txtleftwhite">
				 <input type="image" src="images/arrow.gif" width="18" height="21"
				 onclick="view('desig')" onblur="hide()" ></td>
               </tr>
               <tr>
                <td width="20" height="25" class="txtleftwhite">&nbsp;</td>
                 <td width="94" height="24" class="txtleftwhite">Company</td>
                 <td width="263" height="24">
				 <input type="text" name="cmbCompany" id="cmbCompany" size="50" class="txtboxgrey">
				 
				 </td>
				 <td width="123" height="24" class="txtleftwhite" align="left">
                 <input type="image" src="images/arrow.gif" width="18" height="21" 
				 onclick="view('company')" onblur="hide()"></td>
               </tr>
               <tr>
               <td width="500" valign="middle" align="left" colspan=4 height=23>
               <table width="500" height=17 cellpadding=0 cellspacing="0" border=0 
			   style="border-collapse: collapse" bordercolor="#111111">
               <tr>
                <td width="32" height="17" class="txtleftwhite"></td>
                 <td width="94" height="17" class="txtleftwhite" valign="top">City</td>
                 <td width="173" height="17" align=left>
				 <input type="text" name="cmbCity" id="cmbCity" size="31" class="txtboxgrey">			 
				 </td>	
				 <td width="26" height="17" align=left>				 
				 <input type="image" src="images/arrow.gif" width="18" height="21" 
				 onclick="view('city')" onblur="hide()">
				 </td>			 
				 <td width="170"  class="txtleftwhite" valign="bottom" height="17">
				 
				 <input type="image" src="imghome/button1.gif" onclick="getState('name','',1,1,1)"
				 onmouseover="swap1()" onmouseout="swap()" id="img" width="80" height="30"></td>
               </tr>
               
             </table>
             </td>
             </tr>
             </table>