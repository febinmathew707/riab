<?php
	
	include("../connectdb/connect.php");
 	mysql_select_db("soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	} 
	$_SESSION["mainpage"]="changecopwd";
	
?><center>
<div id="changepwd">
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber2" height="116" bgcolor="#FFFFFF">    
   
	    <tr>
         <td width="100%"  valign="middle" background="" align=center>
         <table border="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber1" >
 	 <tr>
     <td width="100%" align="left"  background="" height="50" valign="top">   <br />
  	 
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face=verdana color=black size=2><b> Change Password</b></font>
     </td>
   </tr>
	 <tr>
     <td width="100%" align="left"   height="63" valign="top" >    
	 <form name="frmCompany" method="POST" > 	
     	<table border="0" cellpadding="5" cellspacing="5" style="border-collapse: collapse; margin-left:50px;" bordercolor="#111111" 
		 width="70%">
          <tr>
            <td width="33%" class="txtleft">Current Password</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft">&nbsp;<input type=password class=txtbox size="50" name="txtCurrentPwd" 
			id="txtCurrentPwd"></td>
          </tr>
          <tr>
            <td width="33%" class="txtleft">New Password</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft">&nbsp;<input type=password class=txtbox size="50" name="txtPassword"
			id="txtPassword"></td>
          </tr>
          <tr>
            <td width="33%" class="txtleft">Retype Password</td>
            <td width="2%" class="txtleft">:</td>
            <td width="65%" class="txtleft">&nbsp;<input type=password class=txtbox size="50" name="txtRePassword"
			id="txtRePassword"></td>
          </tr> 
          <tr>
            <td width="100%" align=center colspan="3"><input type=button value="update" class=button
			onclick="javascript:changepwd()">&nbsp;
            <input type=button value="clear" class=button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
            <div id="w"></div>
            <div id="wait"></div>
            <div id="pwd"></div>
          </tr>
        </table>
        
       			
        
        </form>
        &nbsp;</td>
     </tr>     
 </table>
		 </td>
       </tr> 
</table>
</div>
<div id="listcom">

</div>
<div id="w1"></div>

    
</center>