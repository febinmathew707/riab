<tr>
         <td width="100%" height="113" valign="top" background="imghome/body.gif">
         <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber3" height="193" >
           <tr>
             <td width="47%" height="53">&nbsp;</td>
             <td width="53%" height="53">&nbsp;</td>

           </tr>
           <tr>
             <td width="47%" height="141">&nbsp;</td>
             <td width="53%" height="141" align="left" valign="top" class="txtleftwhite">
             
            
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="500" id="AutoNumber4" height="10">
               <tr>
               	 <td width="20" height="24" class="txtleftwhite">&nbsp;</td>
                 <td width="94" height="24" class="txtleftwhite" onclick="hide()">Name</td>
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
				 onmouseup="view('quali')" ></td>
               </tr>
               <tr>
               	<td width="20" height="24" class="txtleftwhite">&nbsp;</td>
                 <td width="94" height="24" class="txtleftwhite">Designation</td>
                 <td width="263" height="24">
				 <input type="text" name="cmbDesignation" id="cmbDesignation" size="50" 
				 class="txtboxgrey"></td>
				 <td width="123" height="24" class="txtleftwhite">
				 <input type="image" src="images/arrow.gif" width="18" height="21"
				 onclick="view('desig')"  ></td>
               </tr>
               <tr>
                <td width="20" height="25" class="txtleftwhite">&nbsp;</td>
                 <td width="94" height="24" class="txtleftwhite">Company</td>
                 <td width="263" height="24">
				 <input type="text" name="cmbCompany" id="cmbCompany" size="50" class="txtboxgrey">
				 
				 </td>
				 <td width="123" height="24" class="txtleftwhite" align="left">
                 <input type="image" src="images/arrow.gif" width="18" height="21" 
				 onclick="view('company')" ></td>
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
				  >
				 </td>			 
				 <td width="170"  class="txtleftwhite" valign="bottom" height="17">
				 
				 <input type="image" src="imghome/button1.gif" onclick="getState('name','',1,1,1)"
				 onmouseover="swap1()" onmouseout="swap()" id="img" width="80" height="30"></td>
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
       <tr>
       	<form action="login.php" method="POST" name="frmlogin"  >
         <td width="100%" height="46" valign="top" background="" class="txtleft">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <font face="Verdana" size="4"><b><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Featured List</b></font>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		User Id : <input type="text" name="txtuid" size=15 class="txtbox">&nbsp;&nbsp;&nbsp;
		Password : <input type="password" name="txtpwd" size=15 class="txtbox">
		&nbsp;&nbsp;<input type="button" value="login" onclick="return showUser('captcha/captcha.php')">				<span id="w"></span> 
		</td>
		</form>
		<div id="captcha" style="position: absolute; z-index: 500;left: 210px; width:400; top:430px; ; ">
		</div>
	<span id="quali" style="position: absolute; z-index: 500;left:585px; width:303; top:283px; height:200 ; overflow:scroll; visibility:hidden; " ></span>
		<span id="desig" style="position: absolute; z-index: 500;left:585px; width:303; top:308px; height:200 ; overflow:scroll;visibility:hidden;"></span>
		<span id="company" style="position: absolute; z-index: 500;left:585px; width:303; top:331px; height:200 ; overflow:scroll;visibility:hidden;"></span>
		<span id="city" style="position: absolute; z-index: 500;left:580px; width:220; top:358px; height:200 ; overflow:scroll;visibility:hidden;"></span>
       </tr>
       <tr onMouseOver="this.bgColor ='#C0C0C0'">
         <td width="100%" height="170" valign="top" background="" align=center >
         <div id="listmembers" ></div>
         </td>
       </tr>